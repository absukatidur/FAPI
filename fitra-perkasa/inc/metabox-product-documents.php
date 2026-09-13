<?php
/**
 * Product Documents — Repeatable File Upload UI inside Dedicated Documents Tab
 *
 * Hooks into the ACF field rendering to inject a user-friendly repeatable
 * document upload section inside the product Specifications tab.
 *
 * Enforces a strict 10 MB maximum file size limit on:
 * 1. Client-side media picker selection
 * 2. Media uploader drop/upload queue
 * 3. WordPress upload pre-filter hook (server-side)
 * 4. Post-save database validation (server-side)
 *
 * Data is stored in `product_documents_rows` post meta as a serialized array.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

// 10 MB in bytes: 10 * 1024 * 1024 = 10,485,760
define( 'FITRA_PRODUCT_DOC_MAX_BYTES', 10485760 );

/**
 * Enqueue WordPress Media uploader on product edit screens.
 */
function fitra_enqueue_media_for_products( $hook ) {
    if ( ! in_array( $hook, array( 'post.php', 'post-new.php' ), true ) ) {
        return;
    }
    $screen = get_current_screen();
    if ( $screen && $screen->post_type === 'fitra_product' ) {
        wp_enqueue_media();
    }
}
add_action( 'admin_enqueue_scripts', 'fitra_enqueue_media_for_products' );

/**
 * Set WordPress upload size limit to 10 MB for media upload UI.
 */
function fitra_set_max_upload_size( $size ) {
    return FITRA_PRODUCT_DOC_MAX_BYTES; // 10 MB = 10,485,760 bytes
}
add_filter( 'upload_size_limit', 'fitra_set_max_upload_size' );

/**
 * Enforce maximum 10 MB upload size limit for product files via WP upload prefilter.
 */
function fitra_limit_product_file_upload_size( $file ) {
    $is_product_context = false;

    // Check referer URL
    $referer = wp_get_referer();
    if ( $referer && ( strpos( $referer, 'fitra_product' ) !== false || strpos( $referer, 'post_type=fitra_product' ) !== false ) ) {
        $is_product_context = true;
    }

    // Check post_id parameter in media upload request
    if ( ! empty( $_REQUEST['post_id'] ) && get_post_type( (int) $_REQUEST['post_id'] ) === 'fitra_product' ) {
        $is_product_context = true;
    }

    if ( $is_product_context ) {
        if ( isset( $file['size'] ) && $file['size'] > FITRA_PRODUCT_DOC_MAX_BYTES ) {
            $file_size_mb = round( $file['size'] / ( 1024 * 1024 ), 2 );
            $file['error'] = sprintf(
                __( 'Ukuran berkas (%1$s MB) melebihi batas maksimum 10 MB untuk produk. Silakan pilih atau kompres berkas agar tidak melebihi 10 MB. / File size (%1$s MB) exceeds the maximum 10 MB limit.', 'fitra-perkasa' ),
                $file_size_mb
            );
        }
    }

    return $file;
}
add_filter( 'wp_handle_upload_prefilter', 'fitra_limit_product_file_upload_size' );

/**
 * Render the Documents UI inside the Specifications ACF tab.
 */
function fitra_render_documents_after_specs( $field ) {
    global $post;
    if ( ! $post || get_post_type( $post->ID ) !== 'fitra_product' ) {
        return;
    }

    $rows = get_post_meta( $post->ID, 'product_documents_rows', true );
    if ( ! is_array( $rows ) || empty( $rows ) ) {
        $rows = array();
        // Auto-migrate from old text format on first load
        $old = get_post_meta( $post->ID, 'product_documents', true );
        if ( ! empty( $old ) ) {
            $lines = array_filter( array_map( 'trim', explode( "\n", $old ) ) );
            foreach ( $lines as $line ) {
                $parts = explode( '|', $line );
                $rows[] = array(
                    'name' => trim( $parts[0] ?? '' ),
                    'url'  => '',
                    'type' => trim( $parts[1] ?? 'PDF' ),
                    'size' => trim( $parts[2] ?? '' ),
                );
            }
        }
    }

    wp_nonce_field( 'fitra_docs_save', 'fitra_docs_nonce' );
    ?>
    <style>
        .fitra-docs-section {
            margin-top: 5px; padding-top: 5px;
        }
        .fitra-docs-section-title {
            font-size: 14px; font-weight: 700; color: #1e293b;
            margin: 0 0 4px 0; display: flex; align-items: center; gap: 8px;
        }
        .fitra-docs-badge-limit {
            background: #fee2e2; color: #dc2626; border: 1px solid #fecaca;
            font-size: 11px; font-weight: 700; padding: 2px 8px; border-radius: 9999px;
            text-transform: uppercase; letter-spacing: 0.5px;
        }
        .fitra-docs-section-desc {
            font-size: 12px; color: #64748b; margin: 0 0 12px 0;
        }
        .fitra-docs-list { margin-bottom: 12px; }
        .fitra-docs-item {
            background: #f8fafc; border: 1px solid #e2e8f0; border-radius: 6px;
            padding: 14px 16px; margin-bottom: 10px; position: relative;
        }
        .fitra-docs-item:hover { border-color: #cbd5e1; background: #f1f5f9; }
        .fitra-docs-item-header {
            display: flex; align-items: center; gap: 10px; margin-bottom: 10px;
        }
        .fitra-docs-item-icon {
            width: 36px; height: 36px; background: #e8611a; color: #fff;
            border-radius: 6px; display: flex; align-items: center; justify-content: center;
            font-weight: 700; font-size: 11px; flex-shrink: 0; line-height: 1;
        }
        .fitra-docs-item-title {
            font-weight: 600; color: #1e293b; font-size: 14px; flex: 1;
        }
        .fitra-docs-item-remove {
            background: #fee2e2; color: #dc2626; border: 1px solid #fecaca;
            border-radius: 4px; cursor: pointer; padding: 4px 10px; font-size: 12px;
            font-weight: 500; position: absolute; top: 10px; right: 10px; line-height: 1.4;
        }
        .fitra-docs-item-remove:hover { background: #fecaca; }
        .fitra-docs-fields {
            display: grid; grid-template-columns: 1fr 1fr; gap: 10px;
        }
        .fitra-docs-field { display: flex; flex-direction: column; gap: 4px; }
        .fitra-docs-field.full-width { grid-column: 1 / -1; }
        .fitra-docs-field label {
            font-size: 12px; font-weight: 600; color: #475569; text-transform: uppercase;
            letter-spacing: 0.3px;
        }
        .fitra-docs-field input[type="text"] {
            width: 100%; padding: 7px 10px; border: 1px solid #cbd5e1;
            border-radius: 4px; font-size: 13px; box-sizing: border-box;
        }
        .fitra-docs-field input[type="text"]:focus {
            border-color: #e8611a; box-shadow: 0 0 0 1px #e8611a; outline: none;
        }
        .fitra-docs-field input[readonly] {
            background: #f1f5f9; color: #64748b;
        }
        .fitra-docs-url-wrap {
            display: flex; gap: 6px; align-items: stretch;
        }
        .fitra-docs-url-wrap input { flex: 1; }
        .fitra-docs-upload-btn {
            background: #334155; color: #fff; border: none; border-radius: 4px;
            cursor: pointer; padding: 7px 14px; font-size: 12px; font-weight: 600;
            white-space: nowrap; line-height: 1.4;
        }
        .fitra-docs-upload-btn:hover { background: #1e293b; }
        .fitra-docs-preview-btn {
            background: #dbeafe; color: #1d4ed8; border: 1px solid #bfdbfe;
            border-radius: 4px; cursor: pointer; padding: 7px 10px; font-size: 12px;
            font-weight: 500; white-space: nowrap; text-decoration: none;
            display: inline-flex; align-items: center; line-height: 1.4;
        }
        .fitra-docs-preview-btn:hover { background: #bfdbfe; }
        .fitra-docs-add {
            background: #e8611a; color: #fff; border: none; border-radius: 4px;
            cursor: pointer; padding: 8px 16px; font-size: 13px; font-weight: 600;
        }
        .fitra-docs-add:hover { background: #d15312; }
        .fitra-docs-hint {
            color: #64748b; font-size: 12px; margin-top: 6px; font-style: italic;
        }
        .fitra-docs-empty {
            text-align: center; padding: 24px; color: #94a3b8; font-style: italic;
            border: 2px dashed #e2e8f0; border-radius: 8px; margin-bottom: 12px;
        }
        .fitra-docs-file-status { font-size: 11px; margin-top: 2px; }
        .fitra-docs-file-status.has-file { color: #16a34a; font-weight: 500; }
        .fitra-docs-file-status.no-file { color: #94a3b8; }
        .fitra-docs-file-status.error { color: #dc2626; font-weight: 600; }
    </style>

    <div class="fitra-docs-section">
        <h3 class="fitra-docs-section-title">
            📁 <?php esc_html_e( 'Downloadable Documents & Files', 'fitra-perkasa' ); ?>
            <span class="fitra-docs-badge-limit"><?php esc_html_e( 'Maks. 10 MB / File', 'fitra-perkasa' ); ?></span>
        </h3>
        <p class="fitra-docs-section-desc">
            <?php esc_html_e( 'Upload PDF technical data sheets, catalogs, certificates, and other downloadable files. Ukuran berkas maksimum adalah 10 MB per file.', 'fitra-perkasa' ); ?>
        </p>

        <div class="fitra-docs-list" id="fitra-docs-list">
            <?php if ( ! empty( $rows ) ) : ?>
                <?php foreach ( $rows as $i => $row ) :
                    $has_url  = ! empty( $row['url'] );
                    $type_str = strtoupper( substr( $row['type'] ?? 'PDF', 0, 4 ) );
                ?>
                <div class="fitra-docs-item" data-index="<?php echo $i; ?>">
                    <div class="fitra-docs-item-header">
                        <div class="fitra-docs-item-icon"><?php echo esc_html( $type_str ); ?></div>
                        <div class="fitra-docs-item-title"><?php echo esc_html( $row['name'] ?: __( 'Document', 'fitra-perkasa' ) ); ?></div>
                    </div>
                    <button type="button" class="fitra-docs-item-remove" onclick="fitraRemoveDocRow(this)" title="<?php esc_attr_e( 'Remove this document', 'fitra-perkasa' ); ?>">✕ <?php esc_html_e( 'Remove', 'fitra-perkasa' ); ?></button>

                    <div class="fitra-docs-fields">
                        <div class="fitra-docs-field full-width">
                            <label><?php esc_html_e( 'Document Name / Title', 'fitra-perkasa' ); ?></label>
                            <input type="text" name="fitra_docs[<?php echo $i; ?>][name]"
                                   value="<?php echo esc_attr( $row['name'] ?? '' ); ?>"
                                   placeholder="<?php esc_attr_e( 'e.g. Technical Data Sheet', 'fitra-perkasa' ); ?>"
                                   oninput="fitraUpdateDocLabel(this)">
                        </div>
                        <div class="fitra-docs-field full-width">
                            <label><?php esc_html_e( 'File (Upload or paste URL — Maksimal 10 MB)', 'fitra-perkasa' ); ?></label>
                            <div class="fitra-docs-url-wrap">
                                <input type="text" name="fitra_docs[<?php echo $i; ?>][url]"
                                       value="<?php echo esc_attr( $row['url'] ?? '' ); ?>"
                                       placeholder="<?php esc_attr_e( 'Click "Upload File" to select a file (Max 10 MB) →', 'fitra-perkasa' ); ?>"
                                       class="fitra-docs-url-input"
                                       oninput="fitraUpdateFileStatus(this)">
                                <button type="button" class="fitra-docs-upload-btn" onclick="fitraUploadFile(this)">
                                    📎 <?php esc_html_e( 'Upload File', 'fitra-perkasa' ); ?>
                                </button>
                                <?php if ( $has_url ) : ?>
                                <a href="<?php echo esc_url( $row['url'] ); ?>" target="_blank" class="fitra-docs-preview-btn" title="<?php esc_attr_e( 'Open file in new tab', 'fitra-perkasa' ); ?>">↗ <?php esc_html_e( 'Preview', 'fitra-perkasa' ); ?></a>
                                <?php endif; ?>
                            </div>
                            <span class="fitra-docs-file-status <?php echo $has_url ? 'has-file' : 'no-file'; ?>">
                                <?php echo $has_url ? '✓ ' . esc_html__( 'File attached', 'fitra-perkasa' ) : esc_html__( 'No file uploaded yet — click Upload File (Max 10 MB)', 'fitra-perkasa' ); ?>
                            </span>
                        </div>
                        <div class="fitra-docs-field">
                            <label><?php esc_html_e( 'File Type (auto-detected)', 'fitra-perkasa' ); ?></label>
                            <input type="text" name="fitra_docs[<?php echo $i; ?>][type]"
                                   value="<?php echo esc_attr( $row['type'] ?? 'PDF' ); ?>"
                                   readonly>
                        </div>
                        <div class="fitra-docs-field">
                            <label><?php esc_html_e( 'File Size (auto-detected, maks. 10 MB)', 'fitra-perkasa' ); ?></label>
                            <input type="text" name="fitra_docs[<?php echo $i; ?>][size]"
                                   value="<?php echo esc_attr( $row['size'] ?? '' ); ?>"
                                   readonly>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            <?php else : ?>
                <div class="fitra-docs-empty" id="fitra-docs-empty">
                    <?php esc_html_e( 'No documents added yet. Click "Add Document" to upload PDF data sheets, certificates, or other files (Max 10 MB).', 'fitra-perkasa' ); ?>
                </div>
            <?php endif; ?>
        </div>

        <button type="button" class="fitra-docs-add" onclick="fitraAddDocRow()">
            + <?php esc_html_e( 'Add Document', 'fitra-perkasa' ); ?>
        </button>
    </div>

    <script>
    var fitraDocIndex = <?php echo max( count( $rows ), 0 ); ?>;
    var FITRA_MAX_FILE_BYTES = 10 * 1024 * 1024; // 10 MB

    function fitraAddDocRow() {
        var list = document.getElementById('fitra-docs-list');
        var empty = document.getElementById('fitra-docs-empty');
        if (empty) empty.remove();

        var idx = fitraDocIndex;
        var div = document.createElement('div');
        div.className = 'fitra-docs-item';
        div.setAttribute('data-index', idx);
        div.innerHTML =
            '<div class="fitra-docs-item-header">' +
                '<div class="fitra-docs-item-icon">PDF</div>' +
                '<div class="fitra-docs-item-title"><?php echo esc_js( __( 'New Document', 'fitra-perkasa' ) ); ?></div>' +
            '</div>' +
            '<button type="button" class="fitra-docs-item-remove" onclick="fitraRemoveDocRow(this)" title="<?php echo esc_js( __( 'Remove', 'fitra-perkasa' ) ); ?>">✕ <?php echo esc_js( __( 'Remove', 'fitra-perkasa' ) ); ?></button>' +
            '<div class="fitra-docs-fields">' +
                '<div class="fitra-docs-field full-width">' +
                    '<label><?php echo esc_js( __( 'Document Name / Title', 'fitra-perkasa' ) ); ?></label>' +
                    '<input type="text" name="fitra_docs[' + idx + '][name]" value="" placeholder="<?php echo esc_js( __( 'e.g. Technical Data Sheet', 'fitra-perkasa' ) ); ?>" oninput="fitraUpdateDocLabel(this)">' +
                '</div>' +
                '<div class="fitra-docs-field full-width">' +
                    '<label><?php echo esc_js( __( 'File (Upload or paste URL — Maksimal 10 MB)', 'fitra-perkasa' ) ); ?></label>' +
                    '<div class="fitra-docs-url-wrap">' +
                        '<input type="text" name="fitra_docs[' + idx + '][url]" value="" placeholder="<?php echo esc_js( __( 'Click "Upload File" to select a file (Max 10 MB) →', 'fitra-perkasa' ) ); ?>" class="fitra-docs-url-input" oninput="fitraUpdateFileStatus(this)">' +
                        '<button type="button" class="fitra-docs-upload-btn" onclick="fitraUploadFile(this)">📎 <?php echo esc_js( __( 'Upload File', 'fitra-perkasa' ) ); ?></button>' +
                    '</div>' +
                    '<span class="fitra-docs-file-status no-file"><?php echo esc_js( __( 'No file uploaded yet — click Upload File (Max 10 MB)', 'fitra-perkasa' ) ); ?></span>' +
                '</div>' +
                '<div class="fitra-docs-field">' +
                    '<label><?php echo esc_js( __( 'File Type (auto-detected)', 'fitra-perkasa' ) ); ?></label>' +
                    '<input type="text" name="fitra_docs[' + idx + '][type]" value="PDF" readonly>' +
                '</div>' +
                '<div class="fitra-docs-field">' +
                    '<label><?php echo esc_js( __( 'File Size (auto-detected, maks. 10 MB)', 'fitra-perkasa' ) ); ?></label>' +
                    '<input type="text" name="fitra_docs[' + idx + '][size]" value="" readonly>' +
                '</div>' +
            '</div>';
        list.appendChild(div);
        fitraDocIndex++;
        div.querySelector('input[name*="[name]"]').focus();
    }

    function fitraRemoveDocRow(btn) {
        var item = btn.closest('.fitra-docs-item');
        if (item) item.remove();
        var list = document.getElementById('fitra-docs-list');
        if (list.querySelectorAll('.fitra-docs-item').length === 0) {
            var emptyDiv = document.createElement('div');
            emptyDiv.className = 'fitra-docs-empty';
            emptyDiv.id = 'fitra-docs-empty';
            emptyDiv.textContent = '<?php echo esc_js( __( 'No documents added yet. Click "Add Document" to upload PDF data sheets, certificates, or other files (Max 10 MB).', 'fitra-perkasa' ) ); ?>';
            list.appendChild(emptyDiv);
        }
    }

    function fitraUpdateDocLabel(input) {
        var item = input.closest('.fitra-docs-item');
        if (item) {
            var title = item.querySelector('.fitra-docs-item-title');
            title.textContent = input.value || '<?php echo esc_js( __( 'Document', 'fitra-perkasa' ) ); ?>';
        }
    }

    function fitraUpdateFileStatus(input) {
        var item = input.closest('.fitra-docs-item');
        if (!item) return;
        var status = item.querySelector('.fitra-docs-file-status');
        var wrap = item.querySelector('.fitra-docs-url-wrap');
        var oldPreview = wrap.querySelector('.fitra-docs-preview-btn');
        if (oldPreview) oldPreview.remove();

        if (input.value.trim()) {
            status.className = 'fitra-docs-file-status has-file';
            status.textContent = '✓ <?php echo esc_js( __( 'File attached', 'fitra-perkasa' ) ); ?>';
            var a = document.createElement('a');
            a.href = input.value;
            a.target = '_blank';
            a.className = 'fitra-docs-preview-btn';
            a.title = '<?php echo esc_js( __( 'Open file in new tab', 'fitra-perkasa' ) ); ?>';
            a.innerHTML = '↗ <?php echo esc_js( __( 'Preview', 'fitra-perkasa' ) ); ?>';
            wrap.appendChild(a);
        } else {
            status.className = 'fitra-docs-file-status no-file';
            status.textContent = '<?php echo esc_js( __( 'No file uploaded yet — click Upload File (Max 10 MB)', 'fitra-perkasa' ) ); ?>';
        }
    }

    function fitraUploadFile(btn) {
        var item = btn.closest('.fitra-docs-item');
        var urlInput = item.querySelector('.fitra-docs-url-input');
        var sizeInput = item.querySelector('input[name*="[size]"]');
        var typeInput = item.querySelector('input[name*="[type]"]');
        var nameInput = item.querySelector('input[name*="[name]"]');
        var status = item.querySelector('.fitra-docs-file-status');
        var iconEl = item.querySelector('.fitra-docs-item-icon');

        var fileFrame = wp.media({
            title: '<?php echo esc_js( __( 'Select or Upload Document (Maximum: 10 MB)', 'fitra-perkasa' ) ); ?>',
            button: { text: '<?php echo esc_js( __( 'Use This File', 'fitra-perkasa' ) ); ?>' },
            multiple: false,
            library: { type: '' }
        });

        // Intercept upload queue if files are added directly in media frame
        fileFrame.on('uploader:ready', function() {
            if (fileFrame.uploader && fileFrame.uploader.uploader) {
                fileFrame.uploader.uploader.bind('FilesAdded', function(up, files) {
                    for (var i = files.length - 1; i >= 0; i--) {
                        if (files[i].size > FITRA_MAX_FILE_BYTES) {
                            var sizeMb = (files[i].size / (1024 * 1024)).toFixed(2);
                            alert('Berkas "' + files[i].name + '" (' + sizeMb + ' MB) melebihi batas maksimum 10 MB!\n\nFile exceeds the 10 MB limit and was rejected.');
                            up.removeFile(files[i]);
                        }
                    }
                });
            }
        });

        // Intercept file selection from Media Library
        fileFrame.on('select', function() {
            var attachment = fileFrame.state().get('selection').first().toJSON();

            // Check file size in bytes
            var bytes = attachment.filesize || (attachment.fileLength ? parseInt(attachment.fileLength) : 0);
            if (!bytes && attachment.filesizeInBytes) {
                bytes = parseInt(attachment.filesizeInBytes);
            }

            if (bytes > FITRA_MAX_FILE_BYTES) {
                var sizeFormatted = (bytes / (1024 * 1024)).toFixed(2) + ' MB';
                alert('Peringatan: Ukuran berkas melebihi batas maksimum 10 MB!\n\nUkuran berkas yang dipilih: ' + sizeFormatted + '\nBatas maksimum: 10 MB\n\nSilakan pilih atau unggah berkas dengan ukuran maksimal 10 MB.');
                status.className = 'fitra-docs-file-status error';
                status.textContent = '✕ ' + '<?php echo esc_js( __( 'Ditolak: Ukuran berkas melebihi batas maksimum 10 MB', 'fitra-perkasa' ) ); ?> (' + sizeFormatted + ')';
                return;
            }

            urlInput.value = attachment.url;
            fitraUpdateFileStatus(urlInput);

            if (attachment.filesizeHumanReadable) {
                sizeInput.value = attachment.filesizeHumanReadable;
            } else if (bytes) {
                var mb = (bytes / (1024 * 1024)).toFixed(1);
                sizeInput.value = mb + ' MB';
            }

            var ext = 'PDF';
            if (attachment.subtype) {
                ext = attachment.subtype.toUpperCase();
            } else if (attachment.filename) {
                var fileParts = attachment.filename.split('.');
                if (fileParts.length > 1) {
                    ext = fileParts.pop().toUpperCase();
                }
            }
            typeInput.value = ext;
            if (iconEl) {
                iconEl.textContent = ext.substring(0, 4);
            }

            if (!nameInput.value.trim() && attachment.title) {
                nameInput.value = attachment.title;
                fitraUpdateDocLabel(nameInput);
            }
        });

        fileFrame.open();
    }
    </script>
    <?php
}
add_action( 'acf/render_field/key=field_product_specs', 'fitra_render_documents_after_specs', 20 );

/**
 * Save Documents data on post save with server-side 10 MB size validation.
 */
function fitra_save_documents_metabox( $post_id ) {
    if ( ! isset( $_POST['fitra_docs_nonce'] ) || ! wp_verify_nonce( $_POST['fitra_docs_nonce'], 'fitra_docs_save' ) ) {
        return;
    }
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return;
    }
    if ( get_post_type( $post_id ) !== 'fitra_product' ) {
        return;
    }
    if ( ! current_user_can( 'edit_post', $post_id ) ) {
        return;
    }

    $docs_rows = array();
    if ( ! empty( $_POST['fitra_docs'] ) && is_array( $_POST['fitra_docs'] ) ) {
        foreach ( $_POST['fitra_docs'] as $row ) {
            $name = sanitize_text_field( wp_unslash( $row['name'] ?? '' ) );
            $url  = esc_url_raw( wp_unslash( $row['url'] ?? '' ) );
            $type = sanitize_text_field( wp_unslash( $row['type'] ?? 'PDF' ) );
            $size = sanitize_text_field( wp_unslash( $row['size'] ?? '' ) );

            if ( ! empty( $name ) || ! empty( $url ) ) {
                // Server-side validation: ensure attached file does not exceed 10 MB
                if ( ! empty( $url ) ) {
                    $attachment_id = attachment_url_to_postid( $url );
                    if ( $attachment_id ) {
                        $file_path = get_attached_file( $attachment_id );
                        if ( $file_path && file_exists( $file_path ) ) {
                            $actual_size = filesize( $file_path );
                            if ( $actual_size > FITRA_PRODUCT_DOC_MAX_BYTES ) {
                                // Skip files that exceed 10 MB
                                continue;
                            }
                        }
                    } elseif ( ! empty( $size ) && preg_match( '/([\d\.]+)\s*MB/i', $size, $matches ) ) {
                        if ( (float) $matches[1] > 10.0 ) {
                            // Skip files whose declared size exceeds 10 MB
                            continue;
                        }
                    }
                }

                $docs_rows[] = array(
                    'name' => $name,
                    'url'  => $url,
                    'type' => $type,
                    'size' => $size,
                );
            }
        }
    }

    update_post_meta( $post_id, 'product_documents_rows', $docs_rows );

    // Keep legacy text format in sync for backward compatibility
    $text_lines = array();
    foreach ( $docs_rows as $row ) {
        if ( ! empty( $row['name'] ) ) {
            $text_lines[] = $row['name'] . ' | ' . $row['type'] . ' | ' . $row['size'];
        }
    }
    update_post_meta( $post_id, 'product_documents', implode( "\n", $text_lines ) );
}
add_action( 'save_post', 'fitra_save_documents_metabox' );
