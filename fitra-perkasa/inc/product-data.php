<?php
/**
 * Product Data — static product catalog data
 * Fully bilingual (EN / ID) support for names, titles, descriptions, and categories.
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return all product data keyed by slug.
 * Queries fitra_product CPT first, falls back to hardcoded array.
 *
 * @param string|null $lang Language code ('en' or 'id')
 * @return array
 */
function fitra_get_products( $lang = null ) {
    $active_lang = $lang ? $lang : ( function_exists( 'fitra_get_lang' ) ? fitra_get_lang() : 'en' );

    // ── Try CPT query first ──
    $cpt_products = fitra_get_products_from_cpt( $active_lang );
    if ( ! empty( $cpt_products ) ) {
        return $cpt_products;
    }

    // ── Fallback: hardcoded product data ──
    $img = get_template_directory_uri() . '/assets/images/';

    $products = array(
        // 1. Pipes: Tube, Pipe, Fitting and Valve
        'tube-pipe-fitting-valve' => array(
            'category_en'   => 'Pipes & Fittings',
            'category_id'   => 'Pipa & Sambungan',
            'brand'         => 'INDUSTRIAL PIPING SOLUTIONS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Tube, Pipe, Fitting & Valve',
            'title_id'      => 'Tube, Pipa, Sambungan & Katup',
            'full_title_en' => 'Comprehensive Industrial Piping Systems',
            'full_title_id' => 'Sistem Perpipaan Industri Komprehensif',
            'desc_en'       => 'Complete range of stainless steel and carbon steel tubes, pipes, fittings, and valves for high-pressure and corrosive environments. Our piping solutions meet ASTM, ASME, and API standards for demanding oil & gas, petrochemical, and marine applications.',
            'desc_id'       => 'Rangkaian lengkap pipa baja karbon dan stainless steel (SS304/SS316), tubing presisi, sambungan (fitting), dan katup berstandar ASTM, ASME, dan API untuk lingkungan bertekanan tinggi dan korosif pada industri migas, petrokimia, dan perkapalan.',
            'image'         => $img . 'product-pipes.jpg',
            'gallery'       => array(
                $img . 'product-pipes.jpg',
                $img . 'factory-operations.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'hero-workers.jpg',
                $img . 'svc-mechanical.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Product Piping Catalog', 'name_id' => 'Katalog Produk Sistem Perpipaan', 'type' => 'PDF', 'size' => '5.2 MB' ),
                array( 'name' => 'Material Mill Certificates', 'name_id' => 'Sertifikat Uji Material (Mill Cert)', 'type' => 'PDF', 'size' => '1.8 MB' ),
            ),
            'specs'         => array(
                'PIPE SIZES'       => 'DN15 to DN600 (1/2" to 24")',
                'MATERIALS'        => 'SS304, SS316, Carbon Steel, Alloy Steel',
                'PRESSURE RATING'  => 'Class 150 to Class 2500',
                'STANDARDS'        => 'ASTM A106, ASME B16.9, API 600/602',
                'FITTING TYPES'    => 'Elbow, Tee, Reducer, Cap, Stub End',
                'VALVE TYPES'      => 'Gate, Globe, Check, Ball, Butterfly',
                'CONNECTIONS'      => 'Flanged, Socket Weld, Butt Weld, Threaded',
                'APPLICATIONS'     => 'Oil & Gas, Petrochemical, Marine, Power Plants',
            ),
        ),

        // 2. Pipes: High Pressure Flanges & Forged Fittings
        'flanges-forged-fittings' => array(
            'category_en'   => 'Pipes & Fittings',
            'category_id'   => 'Pipa & Sambungan',
            'brand'         => 'FORGED PRESSURE INTEGRITY',
            'stock'         => 'IN STOCK',
            'title_en'      => 'High Pressure Flanges & Weldolets',
            'title_id'      => 'Flens Tekanan Tinggi & Weldolet',
            'full_title_en' => 'High Pressure Forged Flanges & O-lets',
            'full_title_id' => 'Flens Tempa & Outlet Cabang Tekanan Tinggi',
            'desc_en'       => 'Weld neck, blind, slip-on, socket weld, threaded flanges, and branch outlet fittings (weldolet, sockolet, threadolet). Manufactured from premium forged carbon and alloy steel according to strict ASME B16.5 and B16.11 specifications.',
            'desc_id'       => 'Flens leher las (WNRF), blind flange, slip-on, socket weld, flens berulir, dan fitting outlet cabang (weldolet, sockolet, threadolet) kelas 150# hingga 2500#. Diproduksi dari baja tempa karbon dan baja paduan premium sesuai spesifikasi ASME B16.5 dan B16.11.',
            'image'         => $img . 'product-pipes.jpg',
            'gallery'       => array(
                $img . 'product-pipes.jpg',
                $img . 'factory-operations.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'svc-mechanical.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Flanges Technical Data Sheet', 'name_id' => 'Lembar Data Teknis Flens', 'type' => 'PDF', 'size' => '3.1 MB' ),
                array( 'name' => 'Pressure-Temperature Rating', 'name_id' => 'Rating Tekanan & Temperatur Flens', 'type' => 'PDF', 'size' => '1.5 MB' ),
            ),
            'specs'         => array(
                'FLANGE TYPES'     => 'WNRF, SORF, BLRF, Socket Weld, Lap Joint',
                'PRESSURE CLASS'   => '150#, 300#, 600#, 900#, 1500#, 2500#',
                'MATERIAL GRADES'  => 'ASTM A105, A350 LF2, A182 F304/F316/F11/F22',
                'DIMENSIONAL STD'  => 'ASME B16.5, ASME B16.47 Series A & B',
                'FACING FINISH'    => 'Smooth Finish (Ra 3.2-6.3 µm), RTJ Groove',
                'BRANCH FITTINGS'  => 'Weldolet, Threadolet, Sockolet, Elbolet',
                'CERTIFICATION'    => 'EN 10204 3.1 Mill Certificate & NACE MR0175',
                'APPLICATIONS'     => 'High-Pressure Steam, Hydrocarbon Processing',
            ),
        ),

        // 3. Pipes: Seamless Heat Exchanger Tubing
        'seamless-heat-exchanger-tubing' => array(
            'category_en'   => 'Pipes & Fittings',
            'category_id'   => 'Pipa & Sambungan',
            'brand'         => 'PRECISION TUBULAR TECH',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Seamless Heat Exchanger Tubing',
            'title_id'      => 'Pipa Tubing Seamless Heat Exchanger',
            'full_title_en' => 'Cold Drawn Seamless Boiler & Exchanger Tubes',
            'full_title_id' => 'Pipa Tubing Seamless Boiler & Heat Exchanger Cold Drawn',
            'desc_en'       => 'Precision cold drawn seamless carbon steel, low-alloy, and austenitic stainless steel tubing for heat exchangers, shell & tube condensers, boilers, and superheaters. Tested under high hydraulic pressures with eddy current examination.',
            'desc_id'       => 'Pipa tubing seamless cold drawn presisi berbahan baja karbon, paduan rendah, dan stainless steel austenitik untuk heat exchanger, kondensor shell & tube, boiler, dan superheater. Diuji dengan tekanan hidrolik tinggi dan pemeriksaan eddy current.',
            'image'         => $img . 'product-pipes.jpg',
            'gallery'       => array(
                $img . 'product-pipes.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'factory-operations.jpg',
                $img . 'hero-workers.jpg',
                $img . 'news-workshop.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Tubing Specification Sheet', 'name_id' => 'Spesifikasi Teknis Tubing Seamless', 'type' => 'PDF', 'size' => '2.8 MB' ),
                array( 'name' => 'Heat Treatment & NDT Report', 'name_id' => 'Laporan Heat Treatment & Uji NDT', 'type' => 'PDF', 'size' => '1.9 MB' ),
            ),
            'specs'         => array(
                'OUTSIDE DIAMETER' => '1/4" to 2" (6.35mm to 50.8mm)',
                'WALL THICKNESS'   => '0.035" to 0.165" (BWG 20 to BWG 8)',
                'MATERIAL GRADES'  => 'ASTM A179, ASTM A213 (T11, T22, TP304L, TP316L)',
                'DELIVERY STATE'   => 'Bright Annealed, Normalized & Tempered',
                'TESTING'          => 'Hydrostatic, Eddy Current, Flattening, Flaring',
                'LENGTH'           => 'Up to 24 meters (Straight or U-Bent)',
                'APPLICATIONS'     => 'Refinery Heat Exchangers, Petrochemical Boilers',
            ),
        ),

        // 4. Steels: Steels for Industrial & Construction
        'steels' => array(
            'category_en'   => 'Steel & Plates',
            'category_id'   => 'Baja & Pelat',
            'brand'         => 'STRUCTURAL STEEL SUPPLY',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Steels for Industrial & Construction',
            'title_id'      => 'Baja untuk Industri & Konstruksi',
            'full_title_en' => 'Structural & Industrial Steel Materials',
            'full_title_id' => 'Material Baja Struktural & Industri',
            'desc_en'       => 'Comprehensive inventory of structural, carbon, and stainless steel materials. Available in beams, plates, bars, angles, channels, and custom-cut sections meeting international quality standards for construction and fabrication projects.',
            'desc_id'       => 'Inventaris komprehensif material baja struktural, baja karbon, dan stainless steel. Tersedia dalam bentuk profil balok (WF/H-Beam), pelat kapal, pipa kotak, siku, dan kanal UNP bersertifikat pabrik untuk rancang bangun industri dan fabrikasi berat.',
            'image'         => $img . 'product-steels.jpg',
            'gallery'       => array(
                $img . 'product-steels.jpg',
                $img . 'news-construction.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'hero-workers.jpg',
                $img . 'news-workshop.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Steel Grade Catalog', 'name_id' => 'Katalog Grade & Profil Baja', 'type' => 'PDF', 'size' => '3.6 MB' ),
                array( 'name' => 'Mill Test Certificates', 'name_id' => 'Sertifikat Uji Pabrik (Mill Cert)', 'type' => 'PDF', 'size' => '1.2 MB' ),
            ),
            'specs'         => array(
                'STEEL GRADES'     => 'A36, A572, SS400, S275JR, S355JR',
                'STAINLESS GRADES' => 'SUS304, SUS316, SUS316L, Duplex 2205',
                'PRODUCT FORMS'    => 'H-Beam, I-Beam, Plate, Bar, Angle, Channel',
                'PLATE THICKNESS'  => '3mm to 200mm',
                'BEAM SIZES'       => 'H100×100 to H900×300',
                'SURFACE FINISH'   => 'Hot Rolled, Cold Rolled, Galvanized',
                'STANDARDS'        => 'ASTM, JIS, EN, GB, SNI Certified',
                'APPLICATIONS'     => 'Industrial Construction, Heavy Fabrication',
            ),
        ),

        // 5. Steels: Wear Resistant & Pressure Vessel Plate
        'wear-resistant-boiler-plate' => array(
            'category_en'   => 'Steel & Plates',
            'category_id'   => 'Baja & Pelat',
            'brand'         => 'HEAVY ALLOY ARMOR',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Wear Resistant & Pressure Vessel Plate',
            'title_id'      => 'Pelat Tahan Aus & Bejana Tekan',
            'full_title_en' => 'Abrasion Resistant & Boiler Quality Steel Plates',
            'full_title_id' => 'Pelat Baja Tahan Gesek (Abrasion) & Mutu Boiler',
            'desc_en'       => 'High-hardness abrasion-resistant plates (Hardox equivalent 400/450/500 HBW) for mining chutes and earthmoving machinery, alongside ASTM A516 Gr. 70 normalized boiler plates engineered for elevated and low-temperature pressure vessels.',
            'desc_id'       => 'Pelat baja tahan gesek berkekerasan tinggi (setara Hardox 400/450/500 HBW) untuk chute pertambangan dan alat berat, serta pelat boiler ternormalisasi ASTM A516 Gr. 70 yang dirancang khusus untuk bejana tekan bersuhu tinggi dan rendah.',
            'image'         => $img . 'product-steels.jpg',
            'gallery'       => array(
                $img . 'product-steels.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'news-construction.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Hardness & Impact Test Data', 'name_id' => 'Data Uji Kekerasan & Impak Pelat', 'type' => 'PDF', 'size' => '2.5 MB' ),
                array( 'name' => 'ASME Sec II Part A Compliance', 'name_id' => 'Kepatuhan Standar ASME Bagian II', 'type' => 'PDF', 'size' => '1.7 MB' ),
            ),
            'specs'         => array(
                'WEAR PLATE'       => '400 HBW, 450 HBW, 500 HBW (High Toughness)',
                'BOILER PLATE'     => 'ASTM A516 Grade 70 Normalized, A285 Gr. C',
                'THICKNESS RANGE'  => '6mm to 120mm',
                'WIDTH & LENGTH'   => '1500mm - 3000mm x 6000mm - 12000mm',
                'CHARPY V-NOTCH'   => 'Tested down to -46°C for low temp ductility',
                'WELDABILITY'      => 'Excellent low carbon equivalent (CEV)',
                'APPLICATIONS'     => 'Pressure Vessels, Storage Tanks, Mining Chutes',
            ),
        ),

        // 6. Steels: Heavy Structural Beams & Hollow Sections
        'heavy-structural-beams-channels' => array(
            'category_en'   => 'Steel & Plates',
            'category_id'   => 'Baja & Pelat',
            'brand'         => 'PRIME SECTION MILLS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Heavy Structural Beams & Hollow Sections',
            'title_id'      => 'Balok Struktural Berat & Profil Berongga',
            'full_title_en' => 'Wide Flange Beams & Structural Hollow Profiles',
            'full_title_id' => 'Balok Baja Wide Flange (WF) & Profil Hollow Struktural',
            'desc_en'       => 'Heavy-duty Wide Flange (WF) beams, H-beams, square and rectangular hollow structural sections (SHS/RHS), and heavy equal angles. Fully certified with ultrasonic laminating defect testing for building frames and bridge structures.',
            'desc_id'       => 'Balok baja berat Wide Flange (WF), H-Beam, profil hollow struktural kotak dan persegi (SHS/RHS), serta siku tebal berstandar JIS/ASTM. Tersertifikasi uji cacat ultrasonik untuk rangka bangunan bertingkat, konveyor, dan jembatan.',
            'image'         => $img . 'product-steels.jpg',
            'gallery'       => array(
                $img . 'product-steels.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'news-construction.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'hero-workers.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Structural Profiles Catalog', 'name_id' => 'Katalog Profil Baja Struktural', 'type' => 'PDF', 'size' => '4.2 MB' ),
                array( 'name' => 'SNI 07-7178 Dimension Guide', 'name_id' => 'Panduan Dimensi SNI 07-7178', 'type' => 'PDF', 'size' => '1.4 MB' ),
            ),
            'specs'         => array(
                'BEAM TYPES'       => 'Wide Flange (WF), H-Beam, I-Beam, UNP Channel',
                'HOLLOW SECTIONS'  => 'Square (50x50 to 400x400), Rectangular',
                'STEEL QUALITY'    => 'JIS G3101 SS400, ASTM A36, SM490YA',
                'LENGTHS'          => '6m, 12m standard lengths (Custom cut available)',
                'CERTIFICATION'    => 'SNI Certified & Original Mill Certificate',
                'SURFACE'          => 'Bare Mill Finish, Primer Coated, Hot-Dip Galv',
                'APPLICATIONS'     => 'Conveyor Truss, Offshore Structures, Factory Framing',
            ),
        ),

        // 7. Gaskets: Gasket & Packing
        'gasket-packing' => array(
            'category_en'   => 'Gasket & Seals',
            'category_id'   => 'Gasket & Seal',
            'brand'         => 'INDUSTRIAL SEALING TECH',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Gasket & Packing (Custom Material)',
            'title_id'      => 'Gasket & Packing (Material Kustom)',
            'full_title_en' => 'High-Performance Industrial Sealing Solutions',
            'full_title_id' => 'Solusi Perapatan Industri Kinerja Tinggi',
            'desc_en'       => 'Premium gaskets and packing materials engineered for critical sealing applications. Our range includes spiral wound, ring joint, PTFE, and compressed non-asbestos fiber gaskets suitable for extreme temperatures and pressures in refinery and petrochemical environments.',
            'desc_id'       => 'Material gasket dan packing premium yang dirancang untuk aplikasi perapatan kritis. Meliputi spiral wound gasket (SWG), ring joint (RTJ), PTFE, dan lembaran serat non-asbes tahan temperatur dan tekanan ekstrem di lingkungan kilang dan petrokimia.',
            'image'         => $img . 'product-gasket-bearing.jpg',
            'gallery'       => array(
                $img . 'product-gasket-bearing.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-instrument.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'gearbox-gallery-1.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Gasket Selection Guide', 'name_id' => 'Panduan Pemilihan Gasket Industri', 'type' => 'PDF', 'size' => '2.1 MB' ),
                array( 'name' => 'Material Data Sheets', 'name_id' => 'Lembar Data Material Sealing', 'type' => 'PDF', 'size' => '3.4 MB' ),
            ),
            'specs'         => array(
                'GASKET TYPES'     => 'Spiral Wound (SWG), Ring Joint (RTJ), PTFE Sheet',
                'FILLER MATERIALS' => 'Flexible Graphite, PTFE, Non-Asbestos Fibers',
                'WINDING STRIP'    => 'SS304, SS316L, Monel, Inconel 625',
                'TEMPERATURE'      => '-200°C to +1000°C',
                'PRESSURE'         => 'Up to Class 2500 (PN 420)',
                'SIZES'            => '1/2" to 60" (DN15 to DN1500)',
                'STANDARDS'        => 'ASME B16.20, ASME B16.21, API 601',
                'APPLICATIONS'     => 'Refineries, Chemical Processing, Boiler Manholes',
            ),
        ),

        // 8. Gaskets: Bearing & Sealing
        'bearing-sealing' => array(
            'category_en'   => 'Gasket & Seals',
            'category_id'   => 'Gasket & Seal',
            'brand'         => 'PRECISION BEARING SYSTEMS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Precision Bearings & Rotary Seals',
            'title_id'      => 'Bantalan Presisi (Bearing) & Rotary Seal',
            'full_title_en' => 'Precision Rotation & Friction Management',
            'full_title_id' => 'Manajemen Rotasi & Friksi Presisi Tinggi',
            'desc_en'       => 'High-precision bearings and mechanical seals from world-leading manufacturers. Our inventory includes ball bearings, spherical roller bearings, and specialized rotary oil seals for pumps, compressors, and heavy rotating equipment in industrial applications.',
            'desc_id'       => 'Bantalan (bearing) presisi dan seal mekanikal dari manufaktur terkemuka dunia. Stok kami mencakup deep groove ball bearing, spherical roller bearing, dan oil seal putar untuk pompa, kompresor, dan peralatan rotasi berat industri.',
            'image'         => $img . 'product-gasket-bearing.jpg',
            'gallery'       => array(
                $img . 'product-gasket-bearing.jpg',
                $img . 'gearbox-gallery-1.jpg',
                $img . 'gearbox-gallery-2.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Bearing Engineering Catalog', 'name_id' => 'Katalog Teknik Bantalan (Bearing)', 'type' => 'PDF', 'size' => '4.7 MB' ),
                array( 'name' => 'Seal Compatibility Matrix', 'name_id' => 'Matriks Kompatibilitas Seal Putar', 'type' => 'PDF', 'size' => '2.3 MB' ),
            ),
            'specs'         => array(
                'BEARING TYPES'    => 'Deep Groove, Spherical Roller, Tapered, Cylindrical',
                'BRANDS SUPPLIED'  => 'SKF, NSK, FAG, NTN, Timken',
                'BORE SIZES'       => '10mm to 1000mm',
                'SEAL TYPES'       => 'Radial Oil Seal, V-Ring, Cassette Heavy Seal',
                'SEAL MATERIALS'   => 'NBR, FKM (Viton), PTFE, Silicone',
                'CLEARANCE'        => 'C2, Normal, C3, C4 high-temperature clearance',
                'STANDARDS'        => 'ISO 9001 / DIN Standard Tested',
                'APPLICATIONS'     => 'Electric Motors, Heavy Pulley Assemblies, Turbines',
            ),
        ),

        // 9. Gaskets: High-Temperature Mechanical Cartridge Seals
        'high-temp-mechanical-cartridge-seals' => array(
            'category_en'   => 'Gasket & Seals',
            'category_id'   => 'Gasket & Seal',
            'brand'         => 'FLOWSERVE & BURGMANN SPECS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'High-Temperature Cartridge Seals',
            'title_id'      => 'Cartridge Mechanical Seal Suhu Tinggi',
            'full_title_en' => 'Single & Dual Cartridge Mechanical Seals',
            'full_title_id' => 'Mechanical Seal Cartridge Tunggal & Ganda',
            'desc_en'       => 'Heavy-duty pre-assembled cartridge mechanical seals designed to eliminate installation errors and handle aggressive petrochemical slurries, hazardous hydrocarbons, and thermal fluids up to 400°C without external cooling.',
            'desc_id'       => 'Mechanical seal cartridge siap pasang untuk mencegah kesalahan instalasi dan menangani fluida hidrokarbon berbahaya, slurry abrasif tambang, serta fluida termal hingga 400°C tanpa pendingin eksternal sesuai standar API 682.',
            'image'         => $img . 'product-gasket-bearing.jpg',
            'gallery'       => array(
                $img . 'product-gasket-bearing.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-instrument.jpg',
                $img . 'svc-mechanical.jpg',
                $img . 'gearbox-gallery-2.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Cartridge Seal Dimensions', 'name_id' => 'Dimensi & Ukuran Cartridge Seal', 'type' => 'PDF', 'size' => '3.3 MB' ),
                array( 'name' => 'API 682 Piping Plans Guide', 'name_id' => 'Panduan Rencana Perpipaan API 682', 'type' => 'PDF', 'size' => '2.0 MB' ),
            ),
            'specs'         => array(
                'SEAL CONFIG'      => 'Single Cartridge, Dual Pressurized/Unpressurized',
                'FACE MATERIALS'   => 'Silicon Carbide (SiC), Tungsten Carbide, Carbon',
                'ELASTOMERS'       => 'FFKM (Kalrez), FKM, Metal Bellows (Inconel 718)',
                'MAX TEMPERATURE'  => 'Up to +400°C (+750°F)',
                'PRESSURE LIMIT'   => 'Up to 50 bar (725 psi)',
                'STANDARDS'        => 'API 682 4th Edition / ISO 21049 compliant',
                'APPLICATIONS'     => 'Boiler Feed Pumps, Hydrotreater Bottoms, Slurry',
            ),
        ),

        // 10. Drives: Gear Box Sumitomo
        'gear-box-sumitomo' => array(
            'category_en'   => 'Mechanical Drives',
            'category_id'   => 'Penggerak Mekanikal',
            'brand'         => 'SUMITOMO DRIVE TECHNOLOGIES',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Gear Box (Sumitomo)',
            'title_id'      => 'Gearbox (Sumitomo)',
            'full_title_en' => 'Paramax 9000 Series Gear Drive',
            'full_title_id' => 'Penggerak Gearbox Sumitomo Seri Paramax 9000',
            'desc_en'       => 'Engineered for high torque and rigorous industrial applications, the Sumitomo Paramax 9000 Series delivers unparalleled reliability and performance. Featuring a highly standardized, modular design, these gear units provide optimized thermal capacity and reduced operational noise for demanding continuous duty environments.',
            'desc_id'       => 'Dirancang untuk torsi tinggi dan aplikasi industri berat, Sumitomo Paramax Seri 9000 menghadirkan keandalan dan performa tak tertandingi. Dengan desain modular terstandarisasi, unit gearbox ini menawarkan kapasitas termal optimal dan kebisingan rendah untuk operasional 24/7 di pabrik pupuk dan pertambangan.',
            'image'         => $img . 'product-gearbox.jpg',
            'gallery'       => array(
                $img . 'product-gearbox.jpg',
                $img . 'gearbox-gallery-1.jpg',
                $img . 'gearbox-gallery-2.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-mechanical.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Technical Data Sheet', 'name_id' => 'Lembar Data Teknis Gearbox', 'type' => 'PDF', 'size' => '2.4 MB' ),
                array( 'name' => 'Installation & Maintenance Manual', 'name_id' => 'Buku Panduan Pemasangan & Pemeliharaan', 'type' => 'PDF', 'size' => '8.1 MB' ),
            ),
            'specs'         => array(
                'TORQUE RANGE'     => 'Up to 552,000 Nm (4.88 Million lb-in)',
                'GEAR RATIOS'      => '6.3:1 to 500:1',
                'HOUSING MATERIAL' => 'High-grade cast iron or fabricated steel',
                'GEAR TYPE'        => 'Helical and Bevel-Helical',
                'MOUNTING'         => 'Horizontal, Vertical, Upright',
                'LUBRICATION'      => 'Splash, Forced, or Oil Bath',
                'THERMAL RATING'   => 'Optimized housing with optional cooling fans',
                'APPLICATIONS'     => 'Mining, Conveyors, Mixers, Cranes',
            ),
        ),

        // 11. Drives: Electric Motors & Speed Reducers
        'electric-motors-speed-reducers' => array(
            'category_en'   => 'Mechanical Drives',
            'category_id'   => 'Penggerak Mekanikal',
            'brand'         => 'PREMIUM INDUCTION DRIVES',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Electric Motors & Speed Reducers',
            'title_id'      => 'Motor Listrik & Speed Reducer',
            'full_title_en' => 'IE3 High Efficiency Motors & Planetary Reducers',
            'full_title_id' => 'Motor Listrik Efisiensi Tinggi IE3 & Reduser Planetary',
            'desc_en'       => 'Industrial 3-phase squirrel cage induction electric motors compliant with IEC standards and premium IE3/IE4 efficiency classes. Coupled with helical worm and planetary speed reducers for continuous 24/7 manufacturing lines.',
            'desc_id'       => 'Motor listrik induksi 3-fasa standar IEC dengan kelas efisiensi premium IE3/IE4. Dipadukan dengan speed reducer helical worm dan planetary untuk keandalan jalur produksi manufaktur dan penggerak mesin secara kontinu 24/7.',
            'image'         => $img . 'gearbox-gallery-1.jpg',
            'gallery'       => array(
                $img . 'gearbox-gallery-1.jpg',
                $img . 'gearbox-gallery-2.jpg',
                $img . 'product-gearbox.jpg',
                $img . 'svc-electrical.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Motor Efficiency Curves', 'name_id' => 'Kurva Efisiensi Motor Listrik', 'type' => 'PDF', 'size' => '3.9 MB' ),
                array( 'name' => 'Reducer Mounting Dimensions', 'name_id' => 'Dimensi Dudukan Reduser', 'type' => 'PDF', 'size' => '2.7 MB' ),
            ),
            'specs'         => array(
                'POWER OUTPUT'     => '0.75 kW to 355 kW (1 HP to 475 HP)',
                'EFFICIENCY CLASS' => 'IE3 Premium Efficiency (IEC 60034-30-1)',
                'PROTECTION RATING'=> 'IP55 / IP56 / IP66 Cast Iron Frame',
                'INSULATION'       => 'Class F (Temperature rise Class B)',
                'VOLTAGE RATINGS'  => '380V / 400V / 660V, 50Hz / 60Hz',
                'REDUCER RATIO'    => '1:5 up to 1:1000 planetary reduction',
                'DUTY CYCLE'       => 'Continuous S1 Duty for Mining & Cement',
            ),
        ),

        // 12. Drives: Industrial Flexible Couplings
        'industrial-flexible-couplings' => array(
            'category_en'   => 'Mechanical Drives',
            'category_id'   => 'Penggerak Mekanikal',
            'brand'         => 'TORQUE TRANSMISSION SYSTEMS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Flexible Couplings & Drive Shafts',
            'title_id'      => 'Kopling Fleksibel & Poros Penggerak',
            'full_title_en' => 'Heavy-Duty Torsional Couplings & Universal Shafts',
            'full_title_id' => 'Kopling Torsi Berat & Poros Universal (Drive Shaft)',
            'desc_en'       => 'High-torque grid couplings, gear tooth couplings, elastomeric jaw couplings, and cardan drive shafts engineered to absorb shock loads, damp vibrations, and compensate for angular and parallel shaft misalignments in heavy machinery.',
            'desc_id'       => 'Kopling grid torsi tinggi, kopling gigi (gear coupling), jaw coupling elastomerik, dan poros cardan yang dirancang untuk meredam getaran, menyerap beban kejut, serta mengompensasi ketidaksejajaran poros pada mesin industri berat.',
            'image'         => $img . 'gearbox-gallery-2.jpg',
            'gallery'       => array(
                $img . 'gearbox-gallery-2.jpg',
                $img . 'product-gearbox.jpg',
                $img . 'gearbox-gallery-1.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Coupling Selection Manual', 'name_id' => 'Panduan Pemilihan Kopling Mesin', 'type' => 'PDF', 'size' => '3.0 MB' ),
                array( 'name' => 'Torsional Stiffness Ratings', 'name_id' => 'Rating Kekakuan Torsi Kopling', 'type' => 'PDF', 'size' => '1.6 MB' ),
            ),
            'specs'         => array(
                'COUPLING TYPES'   => 'Taper Grid, Curved Gear, Jaw-Flex, Disc Coupling',
                'TORQUE CAPACITY'  => 'Up to 1,500,000 Nm',
                'BORE CAPABILITY'  => 'Up to 500mm diameter shafts',
                'MISALIGNMENT'     => 'Compensates up to 1.5° angular & 3mm parallel',
                'STANDARDS'        => 'API 671 / ISO 10441 / DIN 740',
                'MATERIALS'        => 'Forged Alloy Steel 42CrMo4, High Tensile Grid',
                'APPLICATIONS'     => 'Ball Mills, Kilns, Centrifugal Compressors',
            ),
        ),

        // 13. Valves: Industrial Control & Isolation Valves
        'industrial-control-isolation-valves' => array(
            'category_en'   => 'Valves & Gauges',
            'category_id'   => 'Katup & Instrumen',
            'brand'         => 'FLOW CONTROL DYNAMICS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Industrial Control & Isolation Valves',
            'title_id'      => 'Katup Kontrol & Isolasi Industri',
            'full_title_en' => 'Engineered Process Control & Severe Service Valves',
            'full_title_id' => 'Katup Kontrol Proses & Layanan Kritis Teruji',
            'desc_en'       => 'High performance trunnion mounted ball valves, triple offset metal-seated butterfly valves, globe control valves, and API 600 cast steel gate valves with pneumatic diaphragm and electric multi-turn actuators for automated pipeline control.',
            'desc_id'       => 'Trunnion mounted ball valve performa tinggi, triple offset butterfly valve metal-seated, globe control valve, dan gate valve baja cor API 600 dengan aktuator diafragma pneumatik atau elektrik untuk otomasi sistem perpipaan dan pabrik.',
            'image'         => $img . 'svc-instrument.jpg',
            'gallery'       => array(
                $img . 'svc-instrument.jpg',
                $img . 'product-pipes.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'svc-mechanical.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Control Valve Sizing Guide', 'name_id' => 'Panduan Sizing Control Valve', 'type' => 'PDF', 'size' => '4.5 MB' ),
                array( 'name' => 'Fire Safe API 607 Certificate', 'name_id' => 'Sertifikat Tahan Api API 607', 'type' => 'PDF', 'size' => '1.8 MB' ),
            ),
            'specs'         => array(
                'VALVE TYPES'      => 'Gate, Globe, Check, Ball, Butterfly, Control',
                'SIZE RANGE'       => 'DN15 to DN1200 (1/2" to 48")',
                'PRESSURE CLASSES' => 'Class 150# through Class 2500# (PN 16 to 420)',
                'BODY MATERIALS'   => 'WCB, LCB, CF8M, CF3M, Duplex, Alloy 20',
                'TRIM DESIGN'      => 'Stellite Hardfaced, Anti-Cavitation Trim',
                'STANDARDS'        => 'API 6D, API 600, API 609, ASME B16.34',
                'ACTUATORS'        => 'Pneumatic Diaphragm, Scotch Yoke, Electric 24V/220V',
                'APPLICATIONS'     => 'Oil Refining, Chemical Storage, Offshore Platforms',
            ),
        ),

        // 14. Valves: Instrumentation Gauges & Manifolds
        'instrumentation-gauges-manifolds' => array(
            'category_en'   => 'Valves & Gauges',
            'category_id'   => 'Katup & Instrumen',
            'brand'         => 'PRECISION PROCESS INSTRUMENTS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Instrumentation Gauges & Manifolds',
            'title_id'      => 'Alat Ukur Instrumen & Manifold',
            'full_title_en' => 'Stainless Steel Gauges & Multi-Port Manifolds',
            'full_title_id' => 'Pressure Gauge Stainless Steel & Manifold Multi-Port',
            'desc_en'       => 'All-stainless steel glycerin-filled pressure gauges, bi-metal thermometers with solid machined thermowells, and precision needle valve manifolds (2-way, 3-way, 5-way) ensuring bubble-tight shutoff and ultra-precise pressure transmission.',
            'desc_id'       => 'Pressure gauge berbahan full stainless steel dengan pengisi gliserin, termometer bimetal dengan thermowell, serta manifold katup jarum (2-way, 3-way, 5-way) berpresisi tinggi untuk transmisi tekanan akurat dan bebas kebocoran.',
            'image'         => $img . 'svc-instrument.jpg',
            'gallery'       => array(
                $img . 'svc-instrument.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-electrical.jpg',
                $img . 'project-management-bg.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Instrument Gauge Specs', 'name_id' => 'Spesifikasi Gauge & Instrumen', 'type' => 'PDF', 'size' => '2.9 MB' ),
                array( 'name' => 'Calibration Certificate Sample', 'name_id' => 'Contoh Sertifikat Kalibrasi Pabrik', 'type' => 'PDF', 'size' => '1.1 MB' ),
            ),
            'specs'         => array(
                'PRESSURE RANGES'  => 'Vacuum (-1 bar) up to 1,600 bar (23,000 psi)',
                'ACCURACY CLASS'   => 'Class 1.0% & Class 0.5% Full Scale',
                'DIAL SIZES'       => '2.5" (63mm), 4" (100mm), 6" (160mm)',
                'WETTED PARTS'     => 'SS316L / Monel / Hastelloy C-276',
                'MANIFOLD TYPES'   => '2-Valve Isolation, 3-Valve & 5-Valve DP Block',
                'CONNECTIONS'      => '1/4" NPT, 1/2" NPT Male/Female',
                'INGRESS'          => 'IP65 / IP67 Weatherproof Solid Front',
                'APPLICATIONS'     => 'Turbine Skid, Custody Transfer, Boiler Drum',
            ),
        ),

        // 15. Valves: Pressure Safety Relief Valves
        'pressure-safety-relief-valves' => array(
            'category_en'   => 'Valves & Gauges',
            'category_id'   => 'Katup & Instrumen',
            'brand'         => 'OVERPRESSURE SAFETY GUARD',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Pressure Safety Relief & Check Valves',
            'title_id'      => 'Katup Pengaman Tekanan (PSV) & Check Valve',
            'full_title_en' => 'ASME VIII Spring-Loaded Safety Relief Valves',
            'full_title_id' => 'Safety Relief Valve Pegas Standar ASME Section VIII',
            'desc_en'       => 'Certified spring-loaded pressure relief and safety valves designed to safeguard boilers, pressurized storage spheres, reactors, and pipelines from hazardous overpressure events. Tested with UV stamp and full capacity discharge reports.',
            'desc_id'       => 'Katup pelepas tekanan dan pengaman (safety valve) bersertifikasi pegas untuk melindungi boiler, tangki bertekanan, reaktor, dan jaringan pipa dari bahaya lonjakan tekanan berlebih. Diuji dengan cap UV dan laporan debit pelepasan penuh.',
            'image'         => $img . 'svc-instrument.jpg',
            'gallery'       => array(
                $img . 'svc-instrument.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'product-pipes.jpg',
                $img . 'svc-mechanical.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Safety Relief Sizing Program', 'name_id' => 'Program Perhitungan Sizing PSV', 'type' => 'PDF', 'size' => '3.5 MB' ),
                array( 'name' => 'ASME UV Stamp Certificate', 'name_id' => 'Sertifikat Cap ASME UV Stamp', 'type' => 'PDF', 'size' => '1.3 MB' ),
            ),
            'specs'         => array(
                'ORIFICE SIZES'    => 'D through T Orifices (API 526)',
                'SET PRESSURE'     => '0.5 bar to 400 bar (7 psi to 6,000 psi)',
                'BONNET TYPES'     => 'Open Lever, Closed Packed Cap, Bellows Balanced',
                'STANDARDS'        => 'ASME Section VIII Div 1, API 526, API 520',
                'BODY MATERIALS'   => 'Carbon Steel WCB, WC6, CF8M Stainless',
                'CHECK VALVE'      => 'Dual Plate Wafer Check, Non-Slam Axial Check',
                'APPLICATIONS'     => 'Steam Boilers, Flare Gas Headers, LPG Spheres',
            ),
        ),

        // 16. Energy: Fuel MIGAS Standard
        'fuel-migas-standard' => array(
            'category_en'   => 'Energy & Fuel',
            'category_id'   => 'Energi & Bahan Bakar',
            'brand'         => 'MIGAS CERTIFIED SOLUTIONS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Fuel & Industrial Lubricants',
            'title_id'      => 'Bahan Bakar & Pelumas Industri',
            'full_title_en' => 'MIGAS-Compliant Fuel & Lubrication Systems',
            'full_title_id' => 'Sistem Bahan Bakar & Pelumasan Standar MIGAS',
            'desc_en'       => 'Industry-compliant fuel and lubrication solutions meeting MIGAS (Minyak dan Gas Bumi) standards. Our certified products include fuel storage systems, dispensing equipment, and industrial lubricants designed for the Indonesian oil & gas sector.',
            'desc_id'       => 'Solusi bahan bakar solar industri (B35/B40) dan pelumas industri yang memenuhi standar Ditjen MIGAS. Menyediakan sistem tangki timbun skid-mounted, flow meter digital, oli hidrolik, dan grease berkualitas tinggi untuk sektor energi dan pertambangan.',
            'image'         => $img . 'product-fuel-migas.jpg',
            'gallery'       => array(
                $img . 'product-fuel-migas.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'hero-bg.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'MIGAS Compliance Certificate', 'name_id' => 'Sertifikat Kepatuhan Standar MIGAS', 'type' => 'PDF', 'size' => '1.6 MB' ),
                array( 'name' => 'Product Specifications Sheet', 'name_id' => 'Lembar Spesifikasi Bahan Bakar & Pelumas', 'type' => 'PDF', 'size' => '3.2 MB' ),
            ),
            'specs'         => array(
                'FUEL TYPES'       => 'Industrial Diesel (B35/B40), High Grade Fuel Oil',
                'STORAGE CAPACITY' => '5,000L to 100,000L skid-mounted tanks',
                'DISPENSING'       => 'Automated digital flow metering & transfer pump',
                'CERTIFICATIONS'   => 'MIGAS Certified, SNI, ISO 9001',
                'LUBRICANTS'       => 'Hydraulic ISO VG 46/68, Heavy Gear Oil 220/320',
                'CLEANLINESS'      => 'Multi-stage coalescing fuel water separation',
                'APPLICATIONS'     => 'Heavy Mining Fleets, Power Generators, Marine Barges',
            ),
        ),

        // 17. Energy: Refinery Spares & Consumables
        'refinery-spares-consumables' => array(
            'category_en'   => 'Energy & Fuel',
            'category_id'   => 'Energi & Bahan Bakar',
            'brand'         => 'REFINERY SPARES LOGISTICS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Refinery Spares & Consumables',
            'title_id'      => 'Suku Cadang & Habis Pakai Kilang',
            'full_title_en' => 'Turnaround Spares & Critical Plant Consumables',
            'full_title_id' => 'Suku Cadang Turnaround & Consumable Kilang Kritis',
            'desc_en'       => 'Fast-lead consumables and turnaround maintenance spares for refineries and petrochemical plants, including ceramic fiber insulation blankets, high-pressure hydraulic filter cartridges, thermowell sensors, and stud bolts conforming to ASTM A193 B7/2H.',
            'desc_id'       => 'Suku cadang dan perlengkapan habis pakai untuk pemeliharaan kilang minyak dan pabrik pupuk saat turnaround (TA), meliputi ceramic fiber blanket, elemen filter hidrolik, sensor thermocouple, serta stud bolt ASTM A193 B7/2H.',
            'image'         => $img . 'factory-operations.jpg',
            'gallery'       => array(
                $img . 'factory-operations.jpg',
                $img . 'hero-workers.jpg',
                $img . 'news-training.jpg',
                $img . 'svc-inspection.jpg',
                $img . 'project-management-bg.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Refinery Spares Inventory Guide', 'name_id' => 'Panduan Inventaris Suku Cadang Kilang', 'type' => 'PDF', 'size' => '3.8 MB' ),
                array( 'name' => 'Turnaround Consumables Kit', 'name_id' => 'Daftar Paket Consumable Turnaround', 'type' => 'PDF', 'size' => '2.1 MB' ),
            ),
            'specs'         => array(
                'BOLTING'          => 'ASTM A193 B7 Stud Bolts with A194 2H Heavy Hex Nuts',
                'COATINGS'         => 'PTFE Xylan Coated, Cadmium Plated, Hot-Dip Galv',
                'INSULATION'       => 'Ceramic Fiber Blanket 1260°C / 1430°C density 128kg',
                'FILTER ELEMENTS'  => 'Hydraulic return line & gas coalescer filter packs',
                'PACKING MATERIAL' => 'Pure exfoliated graphite die-formed rings',
                'CERTIFICATIONS'   => 'EN 10204 3.1 Certified & Batch Tracked',
                'APPLICATIONS'     => 'Refinery Turnarounds, Planned Maintenance Outages',
            ),
        ),

        // 18. Energy: Heavy Fuel Filtration & Turbine Spares
        'heavy-fuel-filtration-turbine-spares' => array(
            'category_en'   => 'Energy & Fuel',
            'category_id'   => 'Energi & Bahan Bakar',
            'brand'         => 'TURBINE POWER SYSTEMS',
            'stock'         => 'IN STOCK',
            'title_en'      => 'Heavy Fuel Filtration & Turbine Spares',
            'title_id'      => 'Filtrasi Bahan Bakar Berat & Suku Cadang Turbin',
            'full_title_en' => 'Centrifugal Fuel Conditioning & Gas Turbine Spares',
            'full_title_id' => 'Sistem Kondisioning Bahan Bakar & Suku Cadang Turbin Gas',
            'desc_en'       => 'Complete fuel conditioning systems, duplex basket strainers, centrifugal separators, and combustion hardware spares for industrial gas and steam turbines. Designed to ensure clean fuel delivery and maximum thermal efficiency.',
            'desc_id'       => 'Sistem pengondisian dan pembersihan bahan bakar sentrifugal, saringan duplex basket, pemisah air-bahan bakar, serta suku cadang turbin gas dan uap untuk memastikan pasokan bahan bakar bersih dan efisiensi termal pembangkit listrik.',
            'image'         => $img . 'project-management-bg.jpg',
            'gallery'       => array(
                $img . 'project-management-bg.jpg',
                $img . 'product-fuel-migas.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'svc-electrical.jpg',
            ),
            'documents'     => array(
                array( 'name' => 'Filtration Performance Curves', 'name_id' => 'Kurva Kinerja Sistem Filtrasi', 'type' => 'PDF', 'size' => '3.4 MB' ),
                array( 'name' => 'Turbine Spares Compatibility', 'name_id' => 'Kompatibilitas Suku Cadang Turbin', 'type' => 'PDF', 'size' => '2.6 MB' ),
            ),
            'specs'         => array(
                'FILTRATION RATING'=> 'Down to 1 micron absolute (Microglass media)',
                'SEPARATION'       => 'Free water removal up to 99.9% efficiency',
                'PRESSURE LOSS'    => '< 0.3 bar clean differential pressure',
                'HOUSING DESIGN'   => 'Duplex switchable design for continuous service',
                'TURBINE SPARES'   => 'Burner nozzles, igniter plugs, thermocouples',
                'STANDARDS'        => 'ISO 4406 Cleanliness Level 15/13/10',
                'APPLICATIONS'     => 'Combined Cycle Power Plants, Industrial Turbines',
            ),
        ),
    );

    // Populate active language fields
    foreach ( $products as $key => &$p ) {
        $p['slug']       = $key;
        $p['category']   = ( $active_lang === 'id' && ! empty( $p['category_id'] ) ) ? $p['category_id'] : ( $p['category_en'] ?? ( $p['category'] ?? '' ) );
        $p['title']      = ( $active_lang === 'id' && ! empty( $p['title_id'] ) ) ? $p['title_id'] : ( $p['title_en'] ?? ( $p['title'] ?? '' ) );
        $p['full_title'] = ( $active_lang === 'id' && ! empty( $p['full_title_id'] ) ) ? $p['full_title_id'] : ( $p['full_title_en'] ?? ( $p['full_title'] ?? '' ) );
        $p['desc']       = ( $active_lang === 'id' && ! empty( $p['desc_id'] ) ) ? $p['desc_id'] : ( $p['desc_en'] ?? ( $p['desc'] ?? '' ) );
        $p['cat_key']    = $p['cat_key'] ?? fitra_get_product_category_key( $p['category_en'] ?? ( $p['category'] ?? '' ) );
    }
    unset( $p );

    return $products;
}

/**
 * Map a product category string to its catalog filter key.
 *
 * @param string $category Category label
 * @return string Filter key: 'pipes', 'steels', 'gaskets', 'drives', 'valves', 'energy', or 'all'
 */
function fitra_get_product_category_key( $category ) {
    $cat = strtolower( trim( (string) $category ) );
    if ( strpos( $cat, 'pipe' ) !== false || strpos( $cat, 'pipa' ) !== false ) {
        return 'pipes';
    }
    if ( strpos( $cat, 'steel' ) !== false || strpos( $cat, 'baja' ) !== false || strpos( $cat, 'pelat' ) !== false || strpos( $cat, 'plate' ) !== false ) {
        return 'steels';
    }
    if ( strpos( $cat, 'gasket' ) !== false || strpos( $cat, 'seal' ) !== false ) {
        return 'gaskets';
    }
    if ( strpos( $cat, 'drive' ) !== false || strpos( $cat, 'penggerak' ) !== false || strpos( $cat, 'gear' ) !== false || strpos( $cat, 'motor' ) !== false || strpos( $cat, 'coupling' ) !== false || strpos( $cat, 'kopling' ) !== false ) {
        return 'drives';
    }
    if ( strpos( $cat, 'valve' ) !== false || strpos( $cat, 'katup' ) !== false || strpos( $cat, 'gauge' ) !== false || strpos( $cat, 'instrumen' ) !== false ) {
        return 'valves';
    }
    if ( strpos( $cat, 'energy' ) !== false || strpos( $cat, 'energi' ) !== false || strpos( $cat, 'fuel' ) !== false || strpos( $cat, 'bakar' ) !== false || strpos( $cat, 'refinery' ) !== false || strpos( $cat, 'kilang' ) !== false ) {
        return 'energy';
    }
    return 'all';
}

/**
 * Get a single product by slug, with aliases and fallbacks.
 *
 * @param string      $slug Product slug or keyword
 * @param string|null $lang Language code ('en' or 'id')
 * @return array|null
 */
function fitra_get_product( $slug, $lang = null ) {
    $products = fitra_get_products( $lang );

    if ( isset( $products[ $slug ] ) ) {
        return $products[ $slug ];
    }

    // Check slug aliases and keywords
    $slug_clean = strtolower( trim( $slug ) );
    
    $alias_map = array(
        'gear-box-sumitomo'                    => array( 'gearbox', 'gear-box', 'sumitomo' ),
        'tube-pipe-fitting-valve'              => array( 'tube', 'pipe', 'pipes', 'piping' ),
        'flanges-forged-fittings'              => array( 'flange', 'flanges', 'weldolet', 'forged' ),
        'seamless-heat-exchanger-tubing'       => array( 'tubing', 'heat-exchanger', 'seamless' ),
        'steels'                               => array( 'steel', 'plate', 'profile' ),
        'wear-resistant-boiler-plate'          => array( 'boiler', 'hardox', 'wear-resistant' ),
        'heavy-structural-beams-channels'      => array( 'beam', 'beams', 'channels', 'wf' ),
        'gasket-packing'                       => array( 'gasket', 'packing', 'swg' ),
        'bearing-sealing'                      => array( 'bearing', 'bearings', 'rotary' ),
        'high-temp-mechanical-cartridge-seals' => array( 'cartridge', 'mechanical-seal', 'seals' ),
        'electric-motors-speed-reducers'       => array( 'motor', 'motors', 'reducer' ),
        'industrial-flexible-couplings'        => array( 'coupling', 'couplings', 'shaft' ),
        'industrial-control-isolation-valves'  => array( 'valve', 'valves', 'control-valve' ),
        'instrumentation-gauges-manifolds'     => array( 'gauge', 'gauges', 'manifold' ),
        'pressure-safety-relief-valves'        => array( 'safety-valve', 'relief-valve', 'check-valve' ),
        'fuel-migas-standard'                  => array( 'fuel', 'migas', 'solar', 'lubricant' ),
        'refinery-spares-consumables'          => array( 'refinery', 'spares', 'consumables' ),
        'heavy-fuel-filtration-turbine-spares' => array( 'turbine', 'filtration', 'filters' ),
    );

    foreach ( $alias_map as $key => $aliases ) {
        if ( in_array( $slug_clean, $aliases, true ) ) {
            return $products[ $key ];
        }
        foreach ( $aliases as $alias ) {
            if ( strpos( $slug_clean, $alias ) !== false ) {
                return $products[ $key ];
            }
        }
    }

    // Default to first product if slug is generic or empty
    return ! empty( $products ) ? reset( $products ) : null;
}

/**
 * Query products from the fitra_product CPT.
 *
 * @param string $lang Language code ('en' or 'id')
 * @return array Products keyed by slug in the same format as the hardcoded array
 */
function fitra_get_products_from_cpt( $lang = 'en' ) {
    if ( ! post_type_exists( 'fitra_product' ) ) {
        return array();
    }

    $args = array(
        'post_type'      => 'fitra_product',
        'post_status'    => 'publish',
        'posts_per_page' => 100,
        'orderby'        => 'menu_order date',
        'order'          => 'ASC',
    );

    // If Polylang is active, filter by language
    if ( function_exists( 'pll_current_language' ) ) {
        $args['lang'] = $lang;
    }

    $posts = get_posts( $args );

    if ( empty( $posts ) ) {
        return array();
    }

    $products = array();
    $img_base = get_template_directory_uri() . '/assets/images/';

    foreach ( $posts as $post ) {
        $slug = get_post_meta( $post->ID, 'product_slug', true );
        if ( empty( $slug ) ) {
            $slug = $post->post_name;
            // Strip language suffix if present
            $slug = preg_replace( '/-id$/', '', $slug );
        }

        $product = fitra_build_product_from_cpt( $post, $img_base );
        $products[ $slug ] = $product;
    }

    return $products;
}

/**
 * Build a product data array from a CPT post, matching the hardcoded format.
 *
 * @param WP_Post $post     The product post object
 * @param string  $img_base Base URL for theme images
 * @return array
 */
function fitra_build_product_from_cpt( $post, $img_base = '' ) {
    if ( empty( $img_base ) ) {
        $img_base = get_template_directory_uri() . '/assets/images/';
    }

    $slug       = get_post_meta( $post->ID, 'product_slug', true ) ?: $post->post_name;
    $slug       = preg_replace( '/-id$/', '', $slug );
    // Category: check taxonomy term first, fallback to legacy meta
    $terms = get_the_terms( $post->ID, 'fitra_product_cat' );
    if ( ! empty( $terms ) && ! is_wp_error( $terms ) ) {
        $first_term = reset( $terms );
        $cat_en     = $first_term->name;
        $cat_label  = function_exists( 'fitra_get_product_cat_name' )
            ? fitra_get_product_cat_name( $first_term )
            : html_entity_decode( $first_term->name, ENT_QUOTES, 'UTF-8' );
    } else {
        $cat_en    = get_post_meta( $post->ID, 'product_category', true ) ?: '';
        $cat_label = get_post_meta( $post->ID, 'product_category_label', true ) ?: $cat_en;
    }
    $brand      = get_post_meta( $post->ID, 'product_brand', true ) ?: '';
    $stock      = get_post_meta( $post->ID, 'product_stock_status', true ) ?: 'IN STOCK';
    $full_title = get_post_meta( $post->ID, 'product_full_title', true ) ?: $post->post_title;
    $desc       = get_post_meta( $post->ID, 'product_description', true ) ?: '';

    // Image: ACF image field > Featured image > fallback
    $image = get_post_meta( $post->ID, 'product_image', true );
    if ( empty( $image ) && has_post_thumbnail( $post->ID ) ) {
        $image = get_the_post_thumbnail_url( $post->ID, 'full' );
    }
    if ( empty( $image ) ) {
        $image = $img_base . 'product-pipes.jpg';
    }

    // Gallery
    $gallery_raw = get_post_meta( $post->ID, 'product_gallery', true );
    $gallery = array();
    if ( ! empty( $gallery_raw ) && is_array( $gallery_raw ) ) {
        $gallery = $gallery_raw;
    } elseif ( ! empty( $gallery_raw ) && is_string( $gallery_raw ) ) {
        $gallery = array_filter( array_map( 'trim', explode( "\n", $gallery_raw ) ) );
    }
    if ( empty( $gallery ) ) {
        $gallery = array( $image );
    }

    // Specs: parse "KEY = VALUE" lines
    $specs_raw = get_post_meta( $post->ID, 'product_specs', true ) ?: '';
    $specs = array();
    if ( ! empty( $specs_raw ) ) {
        $lines = array_filter( array_map( 'trim', explode( "\n", $specs_raw ) ) );
        foreach ( $lines as $line ) {
            $parts = explode( '=', $line, 2 );
            if ( count( $parts ) === 2 ) {
                $specs[ trim( $parts[0] ) ] = trim( $parts[1] );
            }
        }
    }

    // Documents: prefer new structured array, fall back to old text format
    $docs_rows = get_post_meta( $post->ID, 'product_documents_rows', true );
    $documents = array();
    if ( ! empty( $docs_rows ) && is_array( $docs_rows ) ) {
        foreach ( $docs_rows as $row ) {
            if ( ! empty( $row['name'] ) || ! empty( $row['url'] ) ) {
                $documents[] = array(
                    'name' => $row['name'] ?? '',
                    'url'  => $row['url'] ?? '',
                    'type' => $row['type'] ?? 'PDF',
                    'size' => $row['size'] ?? '',
                );
            }
        }
    }
    if ( empty( $documents ) ) {
        $docs_raw = get_post_meta( $post->ID, 'product_documents', true ) ?: '';
        if ( ! empty( $docs_raw ) ) {
            $lines = array_filter( array_map( 'trim', explode( "\n", $docs_raw ) ) );
            foreach ( $lines as $line ) {
                $parts = explode( '|', $line );
                $documents[] = array(
                    'name' => trim( $parts[0] ?? '' ),
                    'url'  => '',
                    'type' => trim( $parts[1] ?? 'PDF' ),
                    'size' => trim( $parts[2] ?? '' ),
                );
            }
        }
    }

    // Determine cat_key from category
    $cat_key = fitra_get_product_category_key( $cat_en );

    return array(
        'slug'       => $slug,
        'category_en'=> $cat_en,
        'category'   => $cat_label,
        'brand'      => $brand,
        'stock'      => $stock,
        'title'      => $post->post_title,
        'full_title' => $full_title,
        'desc'       => $desc,
        'image'      => $image,
        'gallery'    => $gallery,
        'specs'      => $specs,
        'documents'  => $documents,
        'cat_key'    => $cat_key,
    );
}
