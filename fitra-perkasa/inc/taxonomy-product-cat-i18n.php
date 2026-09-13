<?php
/**
 * Product Category Taxonomy — Bilingual (EN / ID) Support
 *
 * Adds an "Indonesian Name" custom field to the Add/Edit Category screens
 * for the `fitra_product_cat` taxonomy.  The value is stored as term meta
 * (`name_id`) and retrieved via the helper function below.
 *
 * Also seeds the default Indonesian translations for the six built-in
 * categories (runs once, guarded by option `fitra_product_cat_i18n_seeded_v1`).
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/* ──────────────────────────────────────────────────────────────────────────
   1. Helper: get the right-language name for a fitra_product_cat term
   ────────────────────────────────────────────────────────────────────────── */

/**
 * Return the display name for a product category term in the current (or
 * specified) language.
 *
 *  - ID lang : returns the `name_id` term meta if set, falls back to EN name.
 *  - EN lang : returns the standard term name (HTML-entity-decoded).
 *
 * @param WP_Term $term The taxonomy term object.
 * @param string|null $lang Language code ('en'|'id'). Defaults to fitra_get_lang().
 * @return string Plain-text category name for the requested language.
 */
function fitra_get_product_cat_name( $term, $lang = null ) {
    if ( null === $lang ) {
        $lang = function_exists( 'fitra_get_lang' ) ? fitra_get_lang() : 'en';
    }

    // WordPress stores term names with HTML entities; decode for plain-text use.
    $en_name = html_entity_decode( $term->name, ENT_QUOTES, 'UTF-8' );

    if ( $lang === 'id' ) {
        $id_name = get_term_meta( $term->term_id, 'name_id', true );
        if ( ! empty( $id_name ) ) {
            return $id_name;
        }
    }

    return $en_name;
}

/* ──────────────────────────────────────────────────────────────────────────
   2. Admin: Add "Indonesian Name" field to the Add New Category form
   ────────────────────────────────────────────────────────────────────────── */

function fitra_product_cat_add_form_fields() {
    ?>
    <div class="form-field term-name-id-wrap">
        <label for="term-name-id"><?php esc_html_e( 'Indonesian Name (Nama Indonesia)', 'fitra-perkasa' ); ?></label>
        <input type="text" name="term_meta_name_id" id="term-name-id" value="">
        <p><?php esc_html_e( 'Category label shown when the site language is Indonesian. Example: Pipa &amp; Sambungan', 'fitra-perkasa' ); ?></p>
    </div>
    <?php
}
add_action( 'fitra_product_cat_add_form_fields', 'fitra_product_cat_add_form_fields' );

/* ──────────────────────────────────────────────────────────────────────────
   3. Admin: Add "Indonesian Name" field to the Edit Category form
   ────────────────────────────────────────────────────────────────────────── */

function fitra_product_cat_edit_form_fields( $term ) {
    $id_name = get_term_meta( $term->term_id, 'name_id', true );
    ?>
    <tr class="form-field term-name-id-wrap">
        <th scope="row">
            <label for="term-name-id"><?php esc_html_e( 'Indonesian Name (Nama Indonesia)', 'fitra-perkasa' ); ?></label>
        </th>
        <td>
            <input type="text" name="term_meta_name_id" id="term-name-id"
                   value="<?php echo esc_attr( $id_name ); ?>">
            <p class="description">
                <?php esc_html_e( 'Category label shown when the site language is Indonesian. Example: Pipa &amp; Sambungan', 'fitra-perkasa' ); ?>
            </p>
        </td>
    </tr>
    <?php
}
add_action( 'fitra_product_cat_edit_form_fields', 'fitra_product_cat_edit_form_fields', 10 );

/* ──────────────────────────────────────────────────────────────────────────
   4. Save the Indonesian Name when a term is created or updated
   ────────────────────────────────────────────────────────────────────────── */

function fitra_product_cat_save_term_meta( $term_id ) {
    if ( ! isset( $_POST['term_meta_name_id'] ) ) {
        return;
    }
    // Verify nonce if editing via standard form (WP provides one implicitly)
    $id_name = sanitize_text_field( wp_unslash( $_POST['term_meta_name_id'] ) );
    update_term_meta( $term_id, 'name_id', $id_name );
}
add_action( 'created_fitra_product_cat', 'fitra_product_cat_save_term_meta' );
add_action( 'edited_fitra_product_cat',  'fitra_product_cat_save_term_meta' );

/* ──────────────────────────────────────────────────────────────────────────
   5. Seed default Indonesian translations for the six built-in categories
      Runs once, guarded by option `fitra_product_cat_i18n_seeded_v1`.
   ────────────────────────────────────────────────────────────────────────── */

function fitra_seed_product_cat_i18n() {
    if ( ! taxonomy_exists( 'fitra_product_cat' ) ) {
        return;
    }
    if ( get_option( 'fitra_product_cat_i18n_seeded_v1' ) ) {
        return;
    }

    // slug => Indonesian name
    $translations = array(
        'pipes-fittings'   => 'Pipa & Sambungan',
        'steel-plates'     => 'Baja & Pelat',
        'gasket-seals'     => 'Gasket & Seal',
        'mechanical-drives'=> 'Penggerak Mekanikal',
        'valves-gauges'    => 'Katup & Instrumen',
        'energy-fuel'      => 'Energi & Bahan Bakar',
    );

    foreach ( $translations as $slug => $id_name ) {
        $term = get_term_by( 'slug', $slug, 'fitra_product_cat' );
        if ( $term && ! is_wp_error( $term ) ) {
            update_term_meta( $term->term_id, 'name_id', $id_name );
        }
    }

    update_option( 'fitra_product_cat_i18n_seeded_v1', true );
}
// Priority 25 — after taxonomy (6) and seeder (20) have run
add_action( 'init', 'fitra_seed_product_cat_i18n', 25 );
