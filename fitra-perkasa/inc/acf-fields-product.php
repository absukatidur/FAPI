<?php
/**
 * ACF Field Group: Product Fields
 *
 * Registers all ACF fields for the 'fitra_product' Custom Post Type
 * using acf_add_local_field_group() so fields are defined in code, not the database.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Register ACF field group for Products.
 */
function fitra_acf_product_fields() {
    if ( ! function_exists( 'acf_add_local_field_group' ) ) {
        return;
    }

    acf_add_local_field_group( array(
        'key'      => 'group_fitra_product',
        'title'    => __( 'Product Information', 'fitra-perkasa' ),
        'fields'   => array(

            // ── Tab: General ──
            array(
                'key'   => 'field_prod_tab_general',
                'label' => __( 'General', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_product_category',
                'label'         => __( 'Product Category', 'fitra-perkasa' ),
                'name'          => 'product_category',
                'type'          => 'select',
                'instructions'  => __( 'Select the product category for catalog filtering.', 'fitra-perkasa' ),
                'required'      => 1,
                'choices'       => array(
                    'Pipes & Fittings'  => 'Pipes & Fittings / Pipa & Sambungan',
                    'Steel & Plates'    => 'Steel & Plates / Baja & Pelat',
                    'Gasket & Seals'    => 'Gasket & Seals / Gasket & Seal',
                    'Mechanical Drives' => 'Mechanical Drives / Penggerak Mekanikal',
                    'Valves & Gauges'   => 'Valves & Gauges / Katup & Instrumen',
                    'Energy & Fuel'     => 'Energy & Fuel / Energi & Bahan Bakar',
                ),
                'default_value' => '',
                'return_format' => 'value',
            ),
            array(
                'key'           => 'field_product_category_label',
                'label'         => __( 'Category Display Label', 'fitra-perkasa' ),
                'name'          => 'product_category_label',
                'type'          => 'text',
                'instructions'  => __( 'Localized category label shown on frontend. Example: "Pipa & Sambungan" (ID) or "Pipes & Fittings" (EN).', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_product_brand',
                'label'         => __( 'Brand', 'fitra-perkasa' ),
                'name'          => 'product_brand',
                'type'          => 'text',
                'instructions'  => __( 'Brand or product line label. Example: "SUMITOMO DRIVE TECHNOLOGIES"', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_product_stock_status',
                'label'         => __( 'Stock Status', 'fitra-perkasa' ),
                'name'          => 'product_stock_status',
                'type'          => 'select',
                'instructions'  => __( 'Current availability status.', 'fitra-perkasa' ),
                'choices'       => array(
                    'IN STOCK'  => 'IN STOCK',
                    'OUT OF STOCK' => 'OUT OF STOCK',
                    'ON ORDER'  => 'ON ORDER',
                ),
                'default_value' => 'IN STOCK',
            ),

            // ── Tab: Content ──
            array(
                'key'   => 'field_prod_tab_content',
                'label' => __( 'Content', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_product_full_title',
                'label'         => __( 'Full Title', 'fitra-perkasa' ),
                'name'          => 'product_full_title',
                'type'          => 'text',
                'instructions'  => __( 'Extended descriptive title shown on detail page header.', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_product_description',
                'label'         => __( 'Description', 'fitra-perkasa' ),
                'name'          => 'product_description',
                'type'          => 'textarea',
                'instructions'  => __( 'Main product description shown on detail page and catalog card.', 'fitra-perkasa' ),
                'required'      => 1,
                'rows'          => 5,
            ),

            // ── Tab: Images ──
            array(
                'key'   => 'field_prod_tab_images',
                'label' => __( 'Images', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_product_image',
                'label'         => __( 'Primary Image', 'fitra-perkasa' ),
                'name'          => 'product_image',
                'type'          => 'image',
                'instructions'  => __( 'Main product image. If empty, the theme default image will be used.', 'fitra-perkasa' ),
                'required'      => 0,
                'return_format' => 'url',
                'preview_size'  => 'medium',
            ),
            array(
                'key'           => 'field_product_gallery',
                'label'         => __( 'Gallery Images', 'fitra-perkasa' ),
                'name'          => 'product_gallery',
                'type'          => 'gallery',
                'instructions'  => __( 'Up to 5 gallery images for the product detail page.', 'fitra-perkasa' ),
                'required'      => 0,
                'return_format' => 'url',
                'min'           => 0,
                'max'           => 5,
                'preview_size'  => 'thumbnail',
            ),

            // ── Tab: Specifications ──
            array(
                'key'   => 'field_prod_tab_specs',
                'label' => __( 'Specifications', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_product_specs',
                'label'         => __( 'Technical Specifications', 'fitra-perkasa' ),
                'name'          => 'product_specs',
                'type'          => 'textarea',
                'instructions'  => __( 'One specification per line. Format: KEY = VALUE. Example: TORQUE RANGE = Up to 552,000 Nm', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 10,
            ),
            // ── Tab: Card Display ──
            array(
                'key'   => 'field_prod_tab_card',
                'label' => __( 'Card Display', 'fitra-perkasa' ),
                'name'  => '',
                'type'  => 'tab',
            ),
            array(
                'key'           => 'field_product_card_tag',
                'label'         => __( 'Card Tag Label', 'fitra-perkasa' ),
                'name'          => 'product_card_tag',
                'type'          => 'text',
                'instructions'  => __( 'Tag label on the product card in catalog grid. Example: "[ DRIVES ] HEAVY GEARBOX"', 'fitra-perkasa' ),
                'required'      => 0,
            ),
            array(
                'key'           => 'field_product_card_specs',
                'label'         => __( 'Card Spec Pills', 'fitra-perkasa' ),
                'name'          => 'product_card_specs',
                'type'          => 'textarea',
                'instructions'  => __( 'One pill per line for the catalog card. Example: Sumitomo Paramax (line break) High Torque Ratio', 'fitra-perkasa' ),
                'required'      => 0,
                'rows'          => 3,
            ),
        ),
        'location'  => array(
            array(
                array(
                    'param'    => 'post_type',
                    'operator' => '==',
                    'value'    => 'fitra_product',
                ),
            ),
        ),
        'menu_order'            => 0,
        'position'              => 'normal',
        'style'                 => 'default',
        'label_placement'       => 'top',
        'instruction_placement' => 'label',
        'active'                => true,
    ) );
}
add_action( 'acf/init', 'fitra_acf_product_fields' );
