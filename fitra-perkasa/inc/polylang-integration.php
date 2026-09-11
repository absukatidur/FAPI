<?php
/**
 * Polylang Integration & Automated Post Translator
 * Bridges Polylang with Fitra Perkasa theme and provides 1-click automatic translation in WP-Admin.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Ensure Polylang post types & settings are active for posts and pages.
 */
function fitra_ensure_polylang_settings() {
    if ( ! function_exists( 'PLL' ) ) {
        return;
    }

    $options = get_option( 'polylang' );
    if ( ! is_array( $options ) ) {
        return;
    }

    $needs_update = false;

    // Ensure Polylang manages CPTs and 'post', but NOT 'page'
    // This prevents Polylang from intercepting theme page templates
    $required_post_types = array( 'post', 'fitra_product', 'fitra_news' );
    if ( empty( $options['post_types'] ) || $options['post_types'] !== $required_post_types ) {
        $options['post_types'] = $required_post_types;
        $needs_update = true;
    }

    // Register fitra_news_type taxonomy with Polylang
    $required_taxonomies = array( 'fitra_news_type' );
    if ( empty( $options['taxonomies'] ) || $options['taxonomies'] !== $required_taxonomies ) {
        $options['taxonomies'] = $required_taxonomies;
        $needs_update = true;
    }

    // Ensure default language is set to 'en'
    if ( empty( $options['default_lang'] ) || $options['default_lang'] !== 'en' ) {
        $options['default_lang'] = 'en';
        $needs_update = true;
    }

    if ( $needs_update ) {
        update_option( 'polylang', $options );
    }
}
add_action( 'admin_init', 'fitra_ensure_polylang_settings' );
add_action( 'init', 'fitra_ensure_polylang_settings', 5 );

/**
 * Register Theme Strings into Polylang String Translations table.
 */
function fitra_register_polylang_strings() {
    if ( ! function_exists( 'pll_register_string' ) ) {
        return;
    }

    $strings = array(
        'nav_home'          => 'Home',
        'nav_profile'       => 'Profile',
        'nav_services'      => 'Services',
        'nav_products'      => 'Products',
        'nav_news'          => 'Events & News',
        'nav_contact'       => 'Contact Us',
        'nav_rfq'           => 'RFQ PORTAL',
        'btn_read_more'     => 'Read More',
        'btn_view_detail'   => 'View Detail',
        'btn_submit'        => 'Submit',
        'btn_request_quote' => 'Request Quotation',
        'footer_brand_desc' => 'Leading industrial contractor specialising in precision engineering, manufacturing support, and large-scale infrastructure solutions.',
        'footer_head_office'=> 'HEAD OFFICE',
        'footer_workshop'   => 'WORKSHOP',
        'footer_quick_links'=> 'QUICK LINKS',
        'footer_rights'     => 'ALL RIGHTS RESERVED.',
    );

    foreach ( $strings as $key => $default_val ) {
        pll_register_string( $key, $default_val, 'Fitra Perkasa Theme', false );
    }
}
add_action( 'init', 'fitra_register_polylang_strings', 20 );

/**
 * Translate a string using MyMemory Translation API.
 *
 * @param string $text Text to translate
 * @param string $target_lang Target language code ('en' or 'id')
 * @param string $source_lang Source language code ('id' or 'en')
 * @return string
 */
function fitra_translate_text_api( $text, $target_lang = 'en', $source_lang = 'id' ) {
    $text = trim( $text );
    if ( empty( $text ) ) {
        return '';
    }

    // Normalize language codes
    $sl = ( strtolower( $source_lang ) === 'id' ) ? 'id' : 'en';
    $tl = ( strtolower( $target_lang ) === 'en' ) ? 'en' : 'id';

    if ( $sl === $tl ) {
        return $text;
    }

    // Split text into chunks if it's very long (> 500 chars) to stay within API limit per request
    if ( mb_strlen( $text ) > 500 ) {
        $paragraphs = explode( "\n", $text );
        $translated_paragraphs = array();

        foreach ( $paragraphs as $paragraph ) {
            $p_trimmed = trim( $paragraph );
            if ( empty( $p_trimmed ) ) {
                $translated_paragraphs[] = '';
                continue;
            }
            $translated_paragraphs[] = fitra_translate_text_api( $p_trimmed, $tl, $sl );
        }

        return implode( "\n", $translated_paragraphs );
    }

    $url = add_query_arg(
        array(
            'q'        => $text,
            'langpair' => "{$sl}|{$tl}",
        ),
        'https://api.mymemory.translated.net/get'
    );

    $response = wp_remote_get(
        $url,
        array(
            'timeout'   => 12,
            'user-agent' => 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) FitraPerkasaTheme/1.0',
        )
    );

    if ( is_wp_error( $response ) ) {
        return $text;
    }

    $body = wp_remote_retrieve_body( $response );
    $data = json_decode( $body, true );

    if ( isset( $data['responseData']['translatedText'] ) && ! empty( $data['responseData']['translatedText'] ) ) {
        $translated = html_entity_decode( $data['responseData']['translatedText'], ENT_QUOTES | ENT_HTML5, 'UTF-8' );
        // Check for error responses returned as text
        if ( stripos( $translated, 'QUERY LENGTH LIMIT EXCEEDED' ) === false ) {
            return $translated;
        }
    }

    return $text;
}

/**
 * Add Polylang Auto-Translator Metabox in WP-Admin Post Editor.
 * Works for 'post', 'fitra_product', and 'fitra_news' post types.
 */
function fitra_add_polylang_auto_translate_metabox() {
    $screens = array( 'post', 'fitra_product', 'fitra_news' );
    foreach ( $screens as $screen ) {
        add_meta_box(
            'fitra_polylang_auto_translate',
            __( '⚡ Auto-Translate with Polylang', 'fitra-perkasa' ),
            'fitra_render_polylang_metabox',
            $screen,
            'side',
            'high'
        );
    }
}
add_action( 'add_meta_boxes', 'fitra_add_polylang_auto_translate_metabox' );

/**
 * Render the Auto-Translate Metabox on post edit screen.
 */
function fitra_render_polylang_metabox( $post ) {
    wp_nonce_field( 'fitra_auto_translate_nonce', 'fitra_at_nonce' );

    $from_post_id = 0;
    if ( isset( $_GET['from_post'] ) ) {
        $from_post_id = absint( $_GET['from_post'] );
    }

    // Check if this post is a translation of an existing post
    if ( ! $from_post_id && function_exists( 'pll_get_post_translations' ) ) {
        $translations = pll_get_post_translations( $post->ID );
        $current_lang = function_exists( 'pll_get_post_language' ) ? pll_get_post_language( $post->ID ) : '';
        foreach ( $translations as $lang => $trans_id ) {
            if ( $trans_id && $trans_id !== $post->ID ) {
                $from_post_id = $trans_id;
                break;
            }
        }
    }

    $source_post = $from_post_id ? get_post( $from_post_id ) : null;
    $source_lang = $source_post && function_exists( 'pll_get_post_language' ) ? pll_get_post_language( $source_post->ID ) : 'id';
    $target_lang = function_exists( 'pll_get_post_language' ) ? ( pll_get_post_language( $post->ID ) ?: ( $_GET['new_lang'] ?? 'en' ) ) : 'en';

    ?>
    <div class="fitra-at-box" style="padding: 6px 0;">
        <p style="font-size: 13px; color: #475569; margin-top: 0; line-height: 1.5;">
            <?php if ( $source_post ) : ?>
                Terjemahkan artikel secara otomatis dari: <strong><?php echo esc_html( get_the_title( $source_post->ID ) ); ?></strong> (<?php echo strtoupper( esc_html( $source_lang ) ); ?> &rarr; <?php echo strtoupper( esc_html( $target_lang ) ); ?>).
            <?php else : ?>
                Terjemahkan judul dan isi postingan ini secara otomatis ke bahasa lain menggunakan AI/API.
            <?php endif; ?>
        </p>

        <button type="button" class="button button-primary button-large" id="fitra-btn-auto-translate" style="width: 100%; display: flex; align-items: center; justify-content: center; gap: 6px; background: #e8611a; border-color: #d15312; font-weight: 600;">
            <span class="dashicons dashicons-translation" style="margin-top: 2px;"></span>
            <span id="fitra-at-btn-text">⚡ Terjemahkan Otomatis</span>
        </button>

        <div id="fitra-at-status" style="margin-top: 10px; font-size: 12px; display: none;"></div>

        <input type="hidden" id="fitra-source-post-id" value="<?php echo esc_attr( $from_post_id ); ?>">
        <input type="hidden" id="fitra-target-lang" value="<?php echo esc_attr( $target_lang ); ?>">
        <input type="hidden" id="fitra-source-lang" value="<?php echo esc_attr( $source_lang ); ?>">
    </div>

    <script>
    document.addEventListener('DOMContentLoaded', function() {
        var btn = document.getElementById('fitra-btn-auto-translate');
        var status = document.getElementById('fitra-at-status');
        var btnText = document.getElementById('fitra-at-btn-text');

        if (!btn) return;

        btn.addEventListener('click', function(e) {
            e.preventDefault();
            btn.disabled = true;
            btnText.textContent = 'Menerjemahkan... ⏳';
            status.style.display = 'block';
            status.style.color = '#3b82f6';
            status.textContent = 'Sedang memproses terjemahan via API...';

            var sourcePostId = document.getElementById('fitra-source-post-id').value;
            var targetLang = document.getElementById('fitra-target-lang').value;
            var sourceLang = document.getElementById('fitra-source-lang').value;

            // Get current editor title & content if no source post
            var currentTitle = '';
            var currentContent = '';

            var titleInput = document.getElementById('title') || document.querySelector('.editor-post-title__input');
            if (titleInput) {
                currentTitle = titleInput.value || titleInput.textContent || '';
            }

            var wpEditor = window.wp && window.wp.data ? window.wp.data.select('core/editor') : null;
            if (wpEditor) {
                currentContent = wpEditor.getEditedPostContent();
                currentTitle = currentTitle || wpEditor.getEditedPostAttribute('title');
            }

            var formData = new FormData();
            formData.append('action', 'fitra_ajax_auto_translate');
            formData.append('nonce', document.getElementById('fitra_at_nonce').value);
            formData.append('source_post_id', sourcePostId);
            formData.append('target_lang', targetLang);
            formData.append('source_lang', sourceLang);
            formData.append('current_title', currentTitle);
            formData.append('current_content', currentContent);

            fetch(ajaxurl, {
                method: 'POST',
                body: formData
            })
            .then(function(res) { return res.json(); })
            .then(function(data) {
                btn.disabled = false;
                btnText.textContent = '⚡ Terjemahkan Otomatis';

                if (data.success && data.data) {
                    var transTitle = data.data.title;
                    var transContent = data.data.content;

                    // 1. Gutenberg Block Editor
                    if (window.wp && window.wp.data && window.wp.data.dispatch) {
                        var dispatch = window.wp.data.dispatch('core/editor');
                        if (dispatch) {
                            if (transTitle) dispatch.editPost({ title: transTitle });
                            if (transContent && window.wp.blocks) {
                                var blocks = window.wp.blocks.parse(transContent);
                                dispatch.resetBlocks(blocks);
                            }
                        }
                    }

                    // 2. Classic Editor
                    if (titleInput) {
                        titleInput.value = transTitle;
                    }
                    if (typeof tinymce !== 'undefined' && tinymce.get('content')) {
                        tinymce.get('content').setContent(transContent);
                    } else {
                        var contentTextarea = document.getElementById('content');
                        if (contentTextarea) contentTextarea.value = transContent;
                    }

                    status.style.color = '#10b981';
                    status.innerHTML = '<strong>Berhasil!</strong> Judul dan konten telah diterjemahkan ke bahasa ' + targetLang.toUpperCase() + ' ✓';
                } else {
                    status.style.color = '#ef4444';
                    status.textContent = data.data && data.data.message ? data.data.message : 'Terjemahan gagal, silakan coba lagi.';
                }
            })
            .catch(function(err) {
                btn.disabled = false;
                btnText.textContent = '⚡ Terjemahkan Otomatis';
                status.style.color = '#ef4444';
                status.textContent = 'Terjadi kesalahan koneksi saat menerjemahkan.';
            });
        });
    });
    </script>
    <?php
}

/**
 * AJAX Handler for Auto-Translation.
 */
function fitra_ajax_auto_translate() {
    check_ajax_referer( 'fitra_auto_translate_nonce', 'nonce' );

    $source_post_id = isset( $_POST['source_post_id'] ) ? absint( $_POST['source_post_id'] ) : 0;
    $target_lang    = isset( $_POST['target_lang'] ) ? sanitize_text_field( wp_unslash( $_POST['target_lang'] ) ) : 'en';
    $source_lang    = isset( $_POST['source_lang'] ) ? sanitize_text_field( wp_unslash( $_POST['source_lang'] ) ) : 'id';
    $current_title  = isset( $_POST['current_title'] ) ? sanitize_text_field( wp_unslash( $_POST['current_title'] ) ) : '';
    $current_content= isset( $_POST['current_content'] ) ? wp_unslash( $_POST['current_content'] ) : '';

    $title_to_translate   = '';
    $content_to_translate = '';

    if ( $source_post_id ) {
        $source = get_post( $source_post_id );
        if ( $source ) {
            $title_to_translate   = $source->post_title;
            $content_to_translate = $source->post_content;
        }
    }

    if ( empty( $title_to_translate ) ) {
        $title_to_translate = $current_title;
    }
    if ( empty( $content_to_translate ) ) {
        $content_to_translate = $current_content;
    }

    if ( empty( $title_to_translate ) && empty( $content_to_translate ) ) {
        wp_send_json_error( array( 'message' => 'Tidak ada teks untuk diterjemahkan. Masukkan judul atau isi terlebih dahulu.' ) );
    }

    $translated_title   = fitra_translate_text_api( $title_to_translate, $target_lang, $source_lang );
    $translated_content = fitra_translate_text_api( $content_to_translate, $target_lang, $source_lang );

    wp_send_json_success( array(
        'title'   => $translated_title,
        'content' => $translated_content,
    ) );
}
add_action( 'wp_ajax_fitra_ajax_auto_translate', 'fitra_ajax_auto_translate' );
