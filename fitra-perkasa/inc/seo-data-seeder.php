<?php
/**
 * SEO Data Seeder for Yoast SEO
 *
 * Populates optimized, bespoke SEO titles, meta descriptions, focus keyphrases,
 * canonicals, Open Graph, and Schema settings for all core pages, all 36 products,
 * and all 14 news/event articles in English and Indonesian.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

function fitra_run_seo_seeder() {
    $img_base = get_template_directory_uri() . '/assets/images/';
    $site_url = home_url( '/' );

    // =========================================================================
    // 1. CORE PAGES OPTIMIZATION
    // =========================================================================
    $pages_seo = array(
        // Home (EN)
        6 => array(
            'title'       => 'PT Fitra Perkasa Inti | Industrial Contractor & Engineering Supplier',
            'desc'        => 'PT Fitra Perkasa Inti (FPI) is a premier industrial contractor and supplier in Indonesia, delivering mechanical drives, piping, steel, and engineering solutions.',
            'focuskw'     => 'industrial contractor Indonesia',
            'schema_page' => 'WebPage',
            'og_image'    => $img_base . 'hero-slider-1.jpg',
        ),
        // Home (ID)
        97 => array(
            'title'       => 'PT Fitra Perkasa Inti | Kontraktor Industri & Pemasok Teknik Terkemuka',
            'desc'        => 'PT Fitra Perkasa Inti (FPI) adalah kontraktor industri dan pemasok terpercaya di Indonesia, menyediakan penggerak mekanikal, perpipaan, baja, dan solusi teknik.',
            'focuskw'     => 'kontraktor industri Indonesia',
            'schema_page' => 'WebPage',
            'og_image'    => $img_base . 'hero-slider-1.jpg',
        ),
        // Profile (EN & ID)
        7 => array(
            'title'       => 'Company Profile & Engineering Capability | PT Fitra Perkasa Inti',
            'desc'        => 'Discover PT Fitra Perkasa Inti\'s corporate profile, heavy engineering capabilities, certified quality standards, and industrial client partnerships across Indonesia.',
            'focuskw'     => 'company profile PT Fitra Perkasa Inti',
            'schema_page' => 'AboutPage',
            'og_image'    => $img_base . 'profile-hero-bg.jpg',
        ),
        // Services (EN & ID)
        10 => array(
            'title'       => 'Industrial Services & Engineering Solutions | PT Fitra Perkasa Inti',
            'desc'        => 'Explore our turnkey industrial services: precision mechanical fabrication, equipment overhaul, pipeline installation, and technical engineering support.',
            'focuskw'     => 'industrial engineering services',
            'schema_page' => 'WebPage',
            'og_image'    => $img_base . 'factory-operations.jpg',
        ),
        // Products Catalog (EN & ID)
        12 => array(
            'title'       => 'Industrial Products & Equipment Catalog | PT Fitra Perkasa Inti',
            'desc'        => 'Browse our complete catalog: Sumitomo gearboxes, ASTM pipes, high-pressure valves, precision seals, and structural steels with technical data sheets.',
            'focuskw'     => 'industrial equipment supplier',
            'schema_page' => 'CollectionPage',
            'og_image'    => $img_base . 'product-pipes.jpg',
        ),
        // Events & News (EN & ID)
        33 => array(
            'title'       => 'Industry News & Corporate Events | PT Fitra Perkasa Inti',
            'desc'        => 'Read the latest updates, exhibition highlights, technical webinars, and industry insights from PT Fitra Perkasa Inti.',
            'focuskw'     => 'industrial engineering news Indonesia',
            'schema_page' => 'CollectionPage',
            'og_image'    => $img_base . 'news-exhibition.jpg',
        ),
        // Contact Us (EN & ID)
        44 => array(
            'title'       => 'Contact Us & Request Quotation | PT Fitra Perkasa Inti',
            'desc'        => 'Get in touch with PT Fitra Perkasa Inti for project inquiries, RFQs, and technical support. Head office in Balikpapan. Phone: +62 21 5566 2389.',
            'focuskw'     => 'contact PT Fitra Perkasa Inti',
            'schema_page' => 'ContactPage',
            'og_image'    => $img_base . 'contact-office.jpg',
        ),
        // Duplicate Contact Us (page 45) -> noindex & canonical to /contact/
        45 => array(
            'title'       => 'Contact Us | PT Fitra Perkasa Inti',
            'desc'        => 'Contact PT Fitra Perkasa Inti support and engineering sales.',
            'focuskw'     => 'contact',
            'canonical'   => home_url( '/contact/' ),
            'noindex'     => true,
        ),
        // Duplicate Events & News (page 34) -> noindex & canonical to /news/
        34 => array(
            'title'       => 'Events & News | PT Fitra Perkasa Inti',
            'desc'        => 'PT Fitra Perkasa Inti corporate news and industry events.',
            'focuskw'     => 'news',
            'canonical'   => home_url( '/news/' ),
            'noindex'     => true,
        ),
    );

    foreach ( $pages_seo as $page_id => $seo ) {
        $post = get_post( $page_id );
        if ( ! $post ) continue;

        update_post_meta( $page_id, '_yoast_wpseo_title', $seo['title'] );
        update_post_meta( $page_id, '_yoast_wpseo_metadesc', $seo['desc'] );
        update_post_meta( $page_id, '_yoast_wpseo_focuskw', $seo['focuskw'] );
        update_post_meta( $page_id, '_yoast_wpseo_opengraph-title', $seo['title'] );
        update_post_meta( $page_id, '_yoast_wpseo_opengraph-description', $seo['desc'] );

        if ( ! empty( $seo['og_image'] ) ) {
            update_post_meta( $page_id, '_yoast_wpseo_opengraph-image', $seo['og_image'] );
        }
        if ( ! empty( $seo['schema_page'] ) ) {
            update_post_meta( $page_id, '_yoast_wpseo_schema_page_type', $seo['schema_page'] );
        }
        if ( ! empty( $seo['canonical'] ) ) {
            update_post_meta( $page_id, '_yoast_wpseo_canonical', $seo['canonical'] );
        }
        if ( ! empty( $seo['noindex'] ) ) {
            update_post_meta( $page_id, '_yoast_wpseo_meta-robots-noindex', 1 );
        } else {
            delete_post_meta( $page_id, '_yoast_wpseo_meta-robots-noindex' );
        }
    }

    // =========================================================================
    // 2. INDIVIDUAL PRODUCTS OPTIMIZATION (18 EN + 18 ID)
    // =========================================================================
    $products_data = array(
        'gear-box-sumitomo' => array(
            'en' => array(
                'title'   => 'Sumitomo Industrial Gearbox & Speed Reducers | PT Fitra Perkasa Inti',
                'desc'    => 'High-torque Sumitomo industrial gearboxes and Paramax speed reducers for heavy industrial machinery. Robust casing, custom ratios, and full engineering support.',
                'focuskw' => 'Sumitomo industrial gearbox',
                'image'   => $img_base . 'product-gearbox.jpg',
            ),
            'id' => array(
                'title'   => 'Gearbox Industri Sumitomo & Speed Reducer | PT Fitra Perkasa Inti',
                'desc'    => 'Gearbox industri Sumitomo torsi tinggi dan peredam kecepatan Paramax untuk permesinan berat. Casing kokoh, rasio putaran kustom, dan dukungan teknis lengkap.',
                'focuskw' => 'gearbox industri Sumitomo',
                'image'   => $img_base . 'product-gearbox.jpg',
            ),
        ),
        'tube-pipe-fitting-valve' => array(
            'en' => array(
                'title'   => 'Industrial Pipes, Tubes, Fittings & Valves | PT Fitra Perkasa Inti',
                'desc'    => 'API, ASTM, and ASME certified carbon and stainless steel pipes, high-pressure fittings, and process valves for oil, gas, and power plants.',
                'focuskw' => 'industrial piping fittings valves',
                'image'   => $img_base . 'product-pipes.jpg',
            ),
            'id' => array(
                'title'   => 'Pipa, Tabung, Fitting & Katup Industri | PT Fitra Perkasa Inti',
                'desc'    => 'Pipa baja karbon dan stainless tersertifikasi API & ASTM, sambungan bertekanan tinggi, dan katup proses untuk fasilitas minyak, gas, dan pembangkit listrik.',
                'focuskw' => 'pipa dan fitting industri',
                'image'   => $img_base . 'product-pipes.jpg',
            ),
        ),
        'flanges-forged-fittings' => array(
            'en' => array(
                'title'   => 'High Pressure Forged Flanges & Weldolets | PT Fitra Perkasa Inti',
                'desc'    => 'Precision forged flanges, weldolets, sockolets, and blind flanges meeting ANSI Class 150-2500 for critical industrial piping connections.',
                'focuskw' => 'high pressure flanges weldolets',
                'image'   => $img_base . 'product-flanges.jpg',
            ),
            'id' => array(
                'title'   => 'Flens Tempa Tekanan Tinggi & Weldolet | PT Fitra Perkasa Inti',
                'desc'    => 'Flens tempa presisi, weldolet, sockolet, dan blind flange standar ANSI Class 150-2500 untuk sambungan perpipaan industri bertekanan kritis.',
                'focuskw' => 'flens tekanan tinggi weldolet',
                'image'   => $img_base . 'product-flanges.jpg',
            ),
        ),
        'seamless-heat-exchanger-tubing' => array(
            'en' => array(
                'title'   => 'Seamless Heat Exchanger & Boiler Tubing | PT Fitra Perkasa Inti',
                'desc'    => 'High-efficiency seamless heat exchanger tubes in copper-nickel, stainless, and duplex steel engineered for thermal transfer and chemical resistance.',
                'focuskw' => 'seamless heat exchanger tubing',
                'image'   => $img_base . 'product-pipes.jpg',
            ),
            'id' => array(
                'title'   => 'Pipa Tubing Seamless Heat Exchanger & Boiler | PT Fitra Perkasa Inti',
                'desc'    => 'Tubing seamless tahan korosi berbahan stainless dan duplex steel untuk penukar panas (heat exchanger), kondensor, dan instalasi boiler industri.',
                'focuskw' => 'tubing seamless heat exchanger',
                'image'   => $img_base . 'product-pipes.jpg',
            ),
        ),
        'steels' => array(
            'en' => array(
                'title'   => 'Industrial & Structural Construction Steels | PT Fitra Perkasa Inti',
                'desc'    => 'High-tensile structural steel plates, hollow sections, angles, and bars compliant with ASTM and JIS standards for commercial and industrial construction.',
                'focuskw' => 'industrial construction steel supplier',
                'image'   => $img_base . 'product-steels.jpg',
            ),
            'id' => array(
                'title'   => 'Baja Konstruksi & Pelat Industri Berkualitas | PT Fitra Perkasa Inti',
                'desc'    => 'Pelat baja struktural berkekuatan tinggi, profil baja, dan batangan standar ASTM/JIS untuk konstruksi pabrik, infrastruktur, dan manufaktur berat.',
                'focuskw' => 'baja konstruksi industri',
                'image'   => $img_base . 'product-steels.jpg',
            ),
        ),
        'wear-resistant-boiler-plate' => array(
            'en' => array(
                'title'   => 'Wear Resistant Hardox & Pressure Vessel Plates | PT Fitra Perkasa Inti',
                'desc'    => 'Abrasion-resistant Hardox steel and certified ASTM A516 pressure vessel boiler plates engineered for extreme impact and thermal pressure environments.',
                'focuskw' => 'wear resistant pressure vessel plate',
                'image'   => $img_base . 'product-steels.jpg',
            ),
            'id' => array(
                'title'   => 'Pelat Baja Tahan Aus & Bejana Tekan Boiler | PT Fitra Perkasa Inti',
                'desc'    => 'Baja tahan abrasi sekelas Hardox dan pelat bejana tekan bersertifikasi ASTM A516 untuk lingkungan kerja bertekanan termal dan benturan ekstrem.',
                'focuskw' => 'pelat tahan aus boiler',
                'image'   => $img_base . 'product-steels.jpg',
            ),
        ),
        'heavy-structural-beams-channels' => array(
            'en' => array(
                'title'   => 'Heavy Structural Beams, WF & Hollow Sections | PT Fitra Perkasa Inti',
                'desc'    => 'Wide Flange (WF), H-Beams, and rectangular hollow sections for heavy industrial frameworks, bridge foundations, and industrial plants.',
                'focuskw' => 'heavy structural beams WF H-beam',
                'image'   => $img_base . 'product-steels.jpg',
            ),
            'id' => array(
                'title'   => 'Balok Struktural Berat WF, H-Beam & Profil | PT Fitra Perkasa Inti',
                'desc'    => 'Profil baja Wide Flange (WF), H-Beam, dan pipa berongga kotak untuk konstruksi kerangka pabrik industri, jembatan, dan pondasi beban berat.',
                'focuskw' => 'balok struktural WF H-Beam',
                'image'   => $img_base . 'product-steels.jpg',
            ),
        ),
        'gasket-packing' => array(
            'en' => array(
                'title'   => 'Industrial Gaskets & Spiral Wound Packing | PT Fitra Perkasa Inti',
                'desc'    => 'Custom spiral wound gaskets, graphite packing, and PTFE sealing components designed for extreme pressure and chemical isolation.',
                'focuskw' => 'industrial gaskets spiral wound packing',
                'image'   => $img_base . 'product-gaskets.jpg',
            ),
            'id' => array(
                'title'   => 'Gasket Industri & Spiral Wound Packing Kustom | PT Fitra Perkasa Inti',
                'desc'    => 'Gasket spiral wound, graphite packing, dan komponen seal PTFE tahan tekanan tinggi serta isolasi kimia untuk flens dan sambungan pipa industri.',
                'focuskw' => 'gasket industri packing',
                'image'   => $img_base . 'product-gaskets.jpg',
            ),
        ),
        'bearing-sealing' => array(
            'en' => array(
                'title'   => 'Precision Industrial Bearings & Rotary Seals | PT Fitra Perkasa Inti',
                'desc'    => 'Heavy-duty spherical roller bearings, deep groove ball bearings, and rotary oil seals for continuous rotating machinery in demanding environments.',
                'focuskw' => 'precision industrial bearings rotary seals',
                'image'   => $img_base . 'product-bearings.jpg',
            ),
            'id' => array(
                'title'   => 'Bantalan Presisi Bearing & Rotary Seal Mesin | PT Fitra Perkasa Inti',
                'desc'    => 'Bantalan mesin presisi tinggi (spherical roller & deep groove) serta seal oli rotari tahan panas untuk keandalan permesinan industri berputar terus-menerus.',
                'focuskw' => 'bearing industri presisi',
                'image'   => $img_base . 'product-bearings.jpg',
            ),
        ),
        'high-temp-mechanical-cartridge-seals' => array(
            'en' => array(
                'title'   => 'High-Temperature Mechanical Cartridge Seals | PT Fitra Perkasa Inti',
                'desc'    => 'Dual and single cartridge mechanical seals engineered for high-temperature pumps, slurry handling, and petrochemical fluid containment.',
                'focuskw' => 'cartridge mechanical seal high temperature',
                'image'   => $img_base . 'product-bearings.jpg',
            ),
            'id' => array(
                'title'   => 'Mechanical Seal Cartridge Suhu Tinggi | PT Fitra Perkasa Inti',
                'desc'    => 'Mechanical seal cartridge tunggal dan ganda untuk pompa suhu tinggi, penanganan lumpur, dan isolasi fluida korosif di industri petrokimia.',
                'focuskw' => 'mechanical seal cartridge suhu tinggi',
                'image'   => $img_base . 'product-bearings.jpg',
            ),
        ),
        'electric-motors-speed-reducers' => array(
            'en' => array(
                'title'   => 'Industrial Three-Phase Electric Motors & Reducers | PT Fitra Perkasa Inti',
                'desc'    => 'High-efficiency IE3 three-phase induction electric motors and heavy-duty gear reducers tailored for continuous factory automation.',
                'focuskw' => 'industrial electric motors speed reducers',
                'image'   => $img_base . 'product-gearbox.jpg',
            ),
            'id' => array(
                'title'   => 'Motor Listrik Industri 3-Fasa & Speed Reducer | PT Fitra Perkasa Inti',
                'desc'    => 'Motor listrik induksi 3-fasa efisiensi tinggi (standar IE3) dan speed reducer beban berat untuk otomasi pabrik dan konveyor industri.',
                'focuskw' => 'motor listrik industri 3 fasa',
                'image'   => $img_base . 'product-gearbox.jpg',
            ),
        ),
        'industrial-flexible-couplings' => array(
            'en' => array(
                'title'   => 'Industrial Flexible Couplings & Drive Shafts | PT Fitra Perkasa Inti',
                'desc'    => 'Torsionally flexible jaw, gear, and disc couplings with dynamic balancing for vibration dampening in industrial power transmission.',
                'focuskw' => 'flexible couplings drive shafts',
                'image'   => $img_base . 'product-gearbox.jpg',
            ),
            'id' => array(
                'title'   => 'Kopling Fleksibel Industri & Poros Penggerak | PT Fitra Perkasa Inti',
                'desc'    => 'Kopling fleksibel torsional (gear, disc, jaw) dan poros transmisi dengan peredam getaran untuk transmisi daya mesin industri yang halus.',
                'focuskw' => 'kopling fleksibel poros transmisi',
                'image'   => $img_base . 'product-gearbox.jpg',
            ),
        ),
        'industrial-control-isolation-valves' => array(
            'en' => array(
                'title'   => 'Industrial Process Control & Isolation Valves | PT Fitra Perkasa Inti',
                'desc'    => 'Globe, gate, ball, and automated control valves for precise flow regulation and safety shut-off in chemical, oil, and steam systems.',
                'focuskw' => 'industrial control isolation valves',
                'image'   => $img_base . 'product-valves.jpg',
            ),
            'id' => array(
                'title'   => 'Katup Kontrol & Katup Isolasi Industri | PT Fitra Perkasa Inti',
                'desc'    => 'Katup kontrol otomatis, gate valve, globe valve, dan ball valve untuk regulasi aliran presisi dan penutupan darurat pada sistem uap dan fluida.',
                'focuskw' => 'katup kontrol isolasi industri',
                'image'   => $img_base . 'product-valves.jpg',
            ),
        ),
        'instrumentation-gauges-manifolds' => array(
            'en' => array(
                'title'   => 'Pressure Gauges & Valve Instrument Manifolds | PT Fitra Perkasa Inti',
                'desc'    => 'Stainless steel pressure gauges, differential pressure transmitters, and 2-way/5-way instrument manifolds for accurate process monitoring.',
                'focuskw' => 'pressure gauges instrument manifolds',
                'image'   => $img_base . 'product-valves.jpg',
            ),
            'id' => array(
                'title'   => 'Pressure Gauge Alat Ukur & Manifold Instrumen | PT Fitra Perkasa Inti',
                'desc'    => 'Pengukur tekanan stainless steel, transmitter tekanan diferensial, dan manifold instrumen katup 2-way/5-way untuk pemantauan akurat proses pabrik.',
                'focuskw' => 'pressure gauge instrumen manifold',
                'image'   => $img_base . 'product-valves.jpg',
            ),
        ),
        'pressure-safety-relief-valves' => array(
            'en' => array(
                'title'   => 'Pressure Safety Relief Valves (PSV) & Check Valves | PT Fitra Perkasa Inti',
                'desc'    => 'ASME Section VIII certified pressure safety relief valves (PSV) and non-slam check valves providing failsafe overpressure protection.',
                'focuskw' => 'pressure safety relief valves PSV',
                'image'   => $img_base . 'product-valves.jpg',
            ),
            'id' => array(
                'title'   => 'Katup Pengaman Tekanan PSV & Check Valve | PT Fitra Perkasa Inti',
                'desc'    => 'Pressure Safety Valve (PSV) bersertifikasi ASME VIII dan check valve searah untuk perlindungan failsafe terhadap lonjakan tekanan pipa dan bejana.',
                'focuskw' => 'katup pengaman tekanan PSV',
                'image'   => $img_base . 'product-valves.jpg',
            ),
        ),
        'fuel-migas-standard' => array(
            'en' => array(
                'title'   => 'MIGAS Standard Industrial Fuel & Heavy Lubricants | PT Fitra Perkasa Inti',
                'desc'    => 'Certified B35 industrial diesel fuel, turbine oils, and heavy-duty synthetic lubricants adhering to strict MIGAS Indonesia specifications.',
                'focuskw' => 'industrial fuel lubricants MIGAS',
                'image'   => $img_base . 'product-fuel-migas.jpg',
            ),
            'id' => array(
                'title'   => 'Bahan Bakar Industri Standar MIGAS & Pelumas Berat | PT Fitra Perkasa Inti',
                'desc'    => 'Solar industri B35 resmi dan pelumas sintetis tugas berat standar MIGAS Indonesia untuk operasional genset, turbin, dan armada alat berat.',
                'focuskw' => 'solar industri bahan bakar MIGAS',
                'image'   => $img_base . 'product-fuel-migas.jpg',
            ),
        ),
        'refinery-spares-consumables' => array(
            'en' => array(
                'title'   => 'Petrochemical Refinery Spares & Consumables | PT Fitra Perkasa Inti',
                'desc'    => 'Critical pump impellers, heat exchanger gaskets, catalyst screens, and refinery consumables for turnaround and scheduled maintenance.',
                'focuskw' => 'refinery spare parts consumables',
                'image'   => $img_base . 'factory-operations.jpg',
            ),
            'id' => array(
                'title'   => 'Suku Cadang Kilang Minyak & Barang Habis Pakai | PT Fitra Perkasa Inti',
                'desc'    => 'Impeller pompa kritis, gasket penukar panas, saringan katalis, dan suku cadang habis pakai kilang untuk perawatan terencana (turnaround/overhaul).',
                'focuskw' => 'suku cadang kilang minyak',
                'image'   => $img_base . 'factory-operations.jpg',
            ),
        ),
        'heavy-fuel-filtration-turbine-spares' => array(
            'en' => array(
                'title'   => 'Heavy Fuel Oil (HFO) Filtration & Gas Turbine Spares | PT Fitra Perkasa Inti',
                'desc'    => 'Multi-stage HFO fuel filtration skids, turbine combustion liners, nozzles, and filtration cartridges for power generation plants.',
                'focuskw' => 'heavy fuel filtration turbine spares',
                'image'   => $img_base . 'project-management-bg.jpg',
            ),
            'id' => array(
                'title'   => 'Filtrasi Bahan Bakar Berat HFO & Sparepart Turbin | PT Fitra Perkasa Inti',
                'desc'    => 'Sistem filtrasi bahan bakar berat (HFO/MFO), liner pembakaran turbin gas, nozzle, dan kartrid filter untuk pembangkit listrik industri.',
                'focuskw' => 'filtrasi bahan bakar turbin',
                'image'   => $img_base . 'project-management-bg.jpg',
            ),
        ),
    );

    // Apply Product SEO to fitra_product CPT posts
    foreach ( $products_data as $slug_key => $langs ) {
        // Find English post
        $en_posts = get_posts( array(
            'name'           => $slug_key,
            'post_type'      => 'fitra_product',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
        ) );

        if ( ! empty( $en_posts[0] ) ) {
            $en_id = $en_posts[0]->ID;
            update_post_meta( $en_id, '_yoast_wpseo_title', $langs['en']['title'] );
            update_post_meta( $en_id, '_yoast_wpseo_metadesc', $langs['en']['desc'] );
            update_post_meta( $en_id, '_yoast_wpseo_focuskw', $langs['en']['focuskw'] );
            update_post_meta( $en_id, '_yoast_wpseo_opengraph-title', $langs['en']['title'] );
            update_post_meta( $en_id, '_yoast_wpseo_opengraph-description', $langs['en']['desc'] );
            update_post_meta( $en_id, '_yoast_wpseo_opengraph-image', $langs['en']['image'] );
            update_post_meta( $en_id, '_yoast_wpseo_schema_page_type', 'ItemPage' );
            delete_post_meta( $en_id, '_yoast_wpseo_meta-robots-noindex' );
            if ( empty( get_post_meta( $en_id, 'product_image', true ) ) ) {
                update_post_meta( $en_id, 'product_image', $langs['en']['image'] );
            }
        }

        // Find Indonesian post
        $id_posts = get_posts( array(
            'name'           => $slug_key . '-id',
            'post_type'      => 'fitra_product',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
        ) );

        if ( ! empty( $id_posts[0] ) ) {
            $id_id = $id_posts[0]->ID;
            update_post_meta( $id_id, '_yoast_wpseo_title', $langs['id']['title'] );
            update_post_meta( $id_id, '_yoast_wpseo_metadesc', $langs['id']['desc'] );
            update_post_meta( $id_id, '_yoast_wpseo_focuskw', $langs['id']['focuskw'] );
            update_post_meta( $id_id, '_yoast_wpseo_opengraph-title', $langs['id']['title'] );
            update_post_meta( $id_id, '_yoast_wpseo_opengraph-description', $langs['id']['desc'] );
            update_post_meta( $id_id, '_yoast_wpseo_opengraph-image', $langs['id']['image'] );
            update_post_meta( $id_id, '_yoast_wpseo_schema_page_type', 'ItemPage' );
            delete_post_meta( $id_id, '_yoast_wpseo_meta-robots-noindex' );
            if ( empty( get_post_meta( $id_id, 'product_image', true ) ) ) {
                update_post_meta( $id_id, 'product_image', $langs['id']['image'] );
            }
        }
    }

    // =========================================================================
    // 3. INDIVIDUAL EVENT & NEWS OPTIMIZATION (7 EN + 7 ID)
    // =========================================================================
    $news_data = array(
        'implementasi-teknologi-presisi-tinggi' => array(
            'en' => array(
                'title'   => 'High-Precision Technology in Steel Distribution | PT Fitra Perkasa Inti',
                'desc'    => 'Discover how PT Fitra Perkasa Inti implements automated precision cutting and tracking in international heavy steel distribution.',
                'focuskw' => 'high precision steel distribution technology',
                'image'   => $img_base . 'news-steel-tech.jpg',
            ),
            'id' => array(
                'title'   => 'Teknologi Presisi Tinggi Distribusi Baja Internasional | PT Fitra Perkasa Inti',
                'desc'    => 'Penerapan teknologi pemotongan presisi dan pelacakan digital PT Fitra Perkasa Inti dalam rantai pasok distribusi baja berskala internasional.',
                'focuskw' => 'teknologi presisi distribusi baja',
                'image'   => $img_base . 'news-steel-tech.jpg',
            ),
        ),
        'standar-baru-sertifikasi-kualitas' => array(
            'en' => array(
                'title'   => 'New Quality Certification Standards for Gas Piping | PT Fitra Perkasa Inti',
                'desc'    => 'Analysis of updated ISO and API quality certification standards for industrial gas pipelines and safety compliance in high-pressure networks.',
                'focuskw' => 'industrial gas pipe certification standards',
                'image'   => $img_base . 'news-gas-pipes.jpg',
            ),
            'id' => array(
                'title'   => 'Standar Baru Sertifikasi Kualitas Pipa Industri Gas | PT Fitra Perkasa Inti',
                'desc'    => 'Kepatuhan standar mutu terbaru ISO dan API untuk integritas pipa industri gas bertekanan tinggi demi menjamin keselamatan operasional.',
                'focuskw' => 'sertifikasi pipa industri gas',
                'image'   => $img_base . 'news-gas-pipes.jpg',
            ),
        ),
        'metal-steel-indonesia-2024' => array(
            'en' => array(
                'title'   => 'Metal & Steel Indonesia 2024: Exhibition Highlights | PT Fitra Perkasa Inti',
                'desc'    => 'PT Fitra Perkasa Inti showcases advanced industrial gearboxes and high-pressure piping solutions at the annual Metal & Steel Indonesia 2024.',
                'focuskw' => 'Metal Steel Indonesia 2024 exhibition',
                'image'   => $img_base . 'news-exhibition.jpg',
            ),
            'id' => array(
                'title'   => 'Pameran Metal & Steel Indonesia 2024: Partisipasi FPI | PT Fitra Perkasa Inti',
                'desc'    => 'Partisipasi PT Fitra Perkasa Inti di ajang pameran industri tahunan Metal & Steel Indonesia 2024, menampilkan solusi mekanikal dan baja terdepan.',
                'focuskw' => 'pameran Metal Steel Indonesia 2024',
                'image'   => $img_base . 'news-exhibition.jpg',
            ),
        ),
        'ekspansi-jaringan-logistik-timur-tengah' => array(
            'en' => array(
                'title'   => 'Logistics Network Expansion to Middle East | PT Fitra Perkasa Inti',
                'desc'    => 'PT Fitra Perkasa Inti expands its supply chain and B2B industrial procurement network to the Middle East industrial and energy corridor.',
                'focuskw' => 'industrial logistics expansion Middle East',
                'image'   => $img_base . 'news-logistics.jpg',
            ),
            'id' => array(
                'title'   => 'Ekspansi Jaringan Logistik Industri ke Timur Tengah | PT Fitra Perkasa Inti',
                'desc'    => 'Langkah strategis PT Fitra Perkasa Inti memperluas jaringan logistik dan rantai pasok material industri berat ke koridor Timur Tengah.',
                'focuskw' => 'ekspansi logistik industri Timur Tengah',
                'image'   => $img_base . 'news-logistics.jpg',
            ),
        ),
        'webinar-inovasi-material-infrastruktur' => array(
            'en' => array(
                'title'   => 'Webinar: Material Innovations in Infrastructure | PT Fitra Perkasa Inti',
                'desc'    => 'Key insights from our technical webinar exploring low-carbon high-strength alloys and sustainable materials in modern infrastructure.',
                'focuskw' => 'sustainable infrastructure material innovation webinar',
                'image'   => $img_base . 'news-webinar.jpg',
            ),
            'id' => array(
                'title'   => 'Webinar: Inovasi Material Infrastruktur Berkelanjutan | PT Fitra Perkasa Inti',
                'desc'    => 'Rangkuman webinar teknis FPI mengenai pemanfaatan material paduan baja rendah karbon dan inovasi teknik untuk infrastruktur hijau berkelanjutan.',
                'focuskw' => 'webinar inovasi material infrastruktur',
                'image'   => $img_base . 'news-webinar.jpg',
            ),
        ),
        'laporan-keberlanjutan-2023-komitmen-net-zero' => array(
            'en' => array(
                'title'   => '2023 Sustainability Report: Net Zero Pathway | PT Fitra Perkasa Inti',
                'desc'    => 'Review PT Fitra Perkasa Inti\'s 2023 Sustainability Report highlighting ESG milestones, energy efficiency, and industrial Net Zero targets.',
                'focuskw' => 'Fitra Perkasa sustainability report 2023',
                'image'   => $img_base . 'news-sustainability.jpg',
            ),
            'id' => array(
                'title'   => 'Laporan Keberlanjutan 2023: Komitmen Net Zero FPI | PT Fitra Perkasa Inti',
                'desc'    => 'Publikasi Laporan Keberlanjutan 2023 PT Fitra Perkasa Inti yang menjabarkan target ESG, efisiensi energi, dan komitmen menuju emisi Net Zero.',
                'focuskw' => 'laporan keberlanjutan 2023 Net Zero',
                'image'   => $img_base . 'news-sustainability.jpg',
            ),
        ),
        'forum-pemimpin-industri-logistik-asia-2024' => array(
            'en' => array(
                'title'   => 'Asia Logistics Leaders Forum 2024 Participation | PT Fitra Perkasa Inti',
                'desc'    => 'FPI leadership joins regional discussions on resilient maritime procurement and supply chain digitalization at the Asia Logistics Leaders Forum 2024.',
                'focuskw' => 'Asia Logistics Industry Leaders Forum 2024',
                'image'   => $img_base . 'news-forum.jpg',
            ),
            'id' => array(
                'title'   => 'Forum Pemimpin Industri Logistik Asia 2024 | PT Fitra Perkasa Inti',
                'desc'    => 'Kehadiran jajaran direksi FPI pada Forum Pemimpin Industri Logistik Asia 2024 membahas ketahanan pengadaan maritim dan digitalisasi rantai pasok.',
                'focuskw' => 'Forum Pemimpin Industri Logistik Asia',
                'image'   => $img_base . 'news-forum.jpg',
            ),
        ),
    );

    foreach ( $news_data as $slug_key => $langs ) {
        // English post
        $en_posts = get_posts( array(
            'name'           => $slug_key,
            'post_type'      => 'fitra_news',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
        ) );

        if ( ! empty( $en_posts[0] ) ) {
            $en_id = $en_posts[0]->ID;
            update_post_meta( $en_id, '_yoast_wpseo_title', $langs['en']['title'] );
            update_post_meta( $en_id, '_yoast_wpseo_metadesc', $langs['en']['desc'] );
            update_post_meta( $en_id, '_yoast_wpseo_focuskw', $langs['en']['focuskw'] );
            update_post_meta( $en_id, '_yoast_wpseo_opengraph-title', $langs['en']['title'] );
            update_post_meta( $en_id, '_yoast_wpseo_opengraph-description', $langs['en']['desc'] );
            update_post_meta( $en_id, '_yoast_wpseo_opengraph-image', $langs['en']['image'] );
            update_post_meta( $en_id, '_yoast_wpseo_schema_article_type', 'NewsArticle' );
            delete_post_meta( $en_id, '_yoast_wpseo_meta-robots-noindex' );
        }

        // Indonesian post
        $id_posts = get_posts( array(
            'name'           => $slug_key . '-id',
            'post_type'      => 'fitra_news',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
        ) );

        if ( ! empty( $id_posts[0] ) ) {
            $id_id = $id_posts[0]->ID;
            update_post_meta( $id_id, '_yoast_wpseo_title', $langs['id']['title'] );
            update_post_meta( $id_id, '_yoast_wpseo_metadesc', $langs['id']['desc'] );
            update_post_meta( $id_id, '_yoast_wpseo_focuskw', $langs['id']['focuskw'] );
            update_post_meta( $id_id, '_yoast_wpseo_opengraph-title', $langs['id']['title'] );
            update_post_meta( $id_id, '_yoast_wpseo_opengraph-description', $langs['id']['desc'] );
            update_post_meta( $id_id, '_yoast_wpseo_opengraph-image', $langs['id']['image'] );
            update_post_meta( $id_id, '_yoast_wpseo_schema_article_type', 'NewsArticle' );
            delete_post_meta( $id_id, '_yoast_wpseo_meta-robots-noindex' );
        }
    }

    echo "SEO Seeder executed successfully!\n";
}
