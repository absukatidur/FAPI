<?php
/**
 * Product Data — static product catalog data
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return all product data keyed by slug.
 */
function fitra_get_products() {
    $img = get_template_directory_uri() . '/assets/images/';

    return array(
        // 1. Pipes: Tube, Pipe, Fitting and Valve
        'tube-pipe-fitting-valve' => array(
            'category'     => 'Pipes & Fittings',
            'brand'        => 'INDUSTRIAL PIPING SOLUTIONS',
            'stock'        => 'IN STOCK',
            'title'        => 'Tube, Pipe, Fitting & Valve',
            'full_title'   => 'Comprehensive Industrial Piping Systems',
            'desc'         => 'Complete range of stainless steel and carbon steel tubes, pipes, fittings, and valves for high-pressure and corrosive environments. Our piping solutions meet ASTM, ASME, and API standards for demanding oil & gas, petrochemical, and marine applications.',
            'image'        => $img . 'product-pipes.jpg',
            'gallery'      => array(
                $img . 'product-pipes.jpg',
                $img . 'factory-operations.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'hero-workers.jpg',
                $img . 'svc-mechanical.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Product Piping Catalog', 'type' => 'PDF', 'size' => '5.2 MB' ),
                array( 'name' => 'Material Mill Certificates', 'type' => 'PDF', 'size' => '1.8 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Pipes & Fittings',
            'brand'        => 'FORGED PRESSURE INTEGRITY',
            'stock'        => 'IN STOCK',
            'title'        => 'High Pressure Flanges & Weldolets',
            'full_title'   => 'High Pressure Forged Flanges & O-lets',
            'desc'         => 'Weld neck, blind, slip-on, socket weld, threaded flanges, and branch outlet fittings (weldolet, sockolet, threadolet). Manufactured from premium forged carbon and alloy steel according to strict ASME B16.5 and B16.11 specifications.',
            'image'        => $img . 'product-pipes.jpg',
            'gallery'      => array(
                $img . 'product-pipes.jpg',
                $img . 'factory-operations.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'svc-mechanical.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Flanges Technical Data Sheet', 'type' => 'PDF', 'size' => '3.1 MB' ),
                array( 'name' => 'Pressure-Temperature Rating', 'type' => 'PDF', 'size' => '1.5 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Pipes & Fittings',
            'brand'        => 'PRECISION TUBULAR TECH',
            'stock'        => 'IN STOCK',
            'title'        => 'Seamless Heat Exchanger Tubing',
            'full_title'   => 'Cold Drawn Seamless Boiler & Exchanger Tubes',
            'desc'         => 'Precision cold drawn seamless carbon steel, low-alloy, and austenitic stainless steel tubing for heat exchangers, shell & tube condensers, boilers, and superheaters. Tested under high hydraulic pressures with eddy current examination.',
            'image'        => $img . 'product-pipes.jpg',
            'gallery'      => array(
                $img . 'product-pipes.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'factory-operations.jpg',
                $img . 'hero-workers.jpg',
                $img . 'news-workshop.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Tubing Specification Sheet', 'type' => 'PDF', 'size' => '2.8 MB' ),
                array( 'name' => 'Heat Treatment & NDT Report', 'type' => 'PDF', 'size' => '1.9 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Steel & Plates',
            'brand'        => 'STRUCTURAL STEEL SUPPLY',
            'stock'        => 'IN STOCK',
            'title'        => 'Steels for Industrial & Construction',
            'full_title'   => 'Structural & Industrial Steel Materials',
            'desc'         => 'Comprehensive inventory of structural, carbon, and stainless steel materials. Available in beams, plates, bars, angles, channels, and custom-cut sections meeting international quality standards for construction and fabrication projects.',
            'image'        => $img . 'product-steels.jpg',
            'gallery'      => array(
                $img . 'product-steels.jpg',
                $img . 'news-construction.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'hero-workers.jpg',
                $img . 'news-workshop.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Steel Grade Catalog', 'type' => 'PDF', 'size' => '3.6 MB' ),
                array( 'name' => 'Mill Test Certificates', 'type' => 'PDF', 'size' => '1.2 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Steel & Plates',
            'brand'        => 'HEAVY ALLOY ARMOR',
            'stock'        => 'IN STOCK',
            'title'        => 'Wear Resistant & Pressure Vessel Plate',
            'full_title'   => 'Abrasion Resistant & Boiler Quality Steel Plates',
            'desc'         => 'High-hardness abrasion-resistant plates (Hardox equivalent 400/450/500 HBW) for mining chutes and earthmoving machinery, alongside ASTM A516 Gr. 70 normalized boiler plates engineered for elevated and low-temperature pressure vessels.',
            'image'        => $img . 'product-steels.jpg',
            'gallery'      => array(
                $img . 'product-steels.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'news-construction.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Hardness & Impact Test Data', 'type' => 'PDF', 'size' => '2.5 MB' ),
                array( 'name' => 'ASME Sec II Part A Compliance', 'type' => 'PDF', 'size' => '1.7 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Steel & Plates',
            'brand'        => 'PRIME SECTION MILLS',
            'stock'        => 'IN STOCK',
            'title'        => 'Heavy Structural Beams & Hollow Sections',
            'full_title'   => 'Wide Flange Beams & Structural Hollow Profiles',
            'desc'         => 'Heavy-duty Wide Flange (WF) beams, H-beams, square and rectangular hollow structural sections (SHS/RHS), and heavy equal angles. Fully certified with ultrasonic laminating defect testing for building frames and bridge structures.',
            'image'        => $img . 'product-steels.jpg',
            'gallery'      => array(
                $img . 'product-steels.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'news-construction.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'hero-workers.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Structural Profiles Catalog', 'type' => 'PDF', 'size' => '4.2 MB' ),
                array( 'name' => 'SNI 07-7178 Dimension Guide', 'type' => 'PDF', 'size' => '1.4 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Gasket & Seals',
            'brand'        => 'INDUSTRIAL SEALING TECH',
            'stock'        => 'IN STOCK',
            'title'        => 'Gasket & Packing (Custom Material)',
            'full_title'   => 'High-Performance Industrial Sealing Solutions',
            'desc'         => 'Premium gaskets and packing materials engineered for critical sealing applications. Our range includes spiral wound, ring joint, PTFE, and compressed non-asbestos fiber gaskets suitable for extreme temperatures and pressures in refinery and petrochemical environments.',
            'image'        => $img . 'product-gasket-bearing.jpg',
            'gallery'      => array(
                $img . 'product-gasket-bearing.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-instrument.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'gearbox-gallery-1.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Gasket Selection Guide', 'type' => 'PDF', 'size' => '2.1 MB' ),
                array( 'name' => 'Material Data Sheets', 'type' => 'PDF', 'size' => '3.4 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Gasket & Seals',
            'brand'        => 'PRECISION BEARING SYSTEMS',
            'stock'        => 'IN STOCK',
            'title'        => 'Precision Bearings & Rotary Seals',
            'full_title'   => 'Precision Rotation & Friction Management',
            'desc'         => 'High-precision bearings and mechanical seals from world-leading manufacturers. Our inventory includes ball bearings, spherical roller bearings, and specialized rotary oil seals for pumps, compressors, and heavy rotating equipment in industrial applications.',
            'image'        => $img . 'product-gasket-bearing.jpg',
            'gallery'      => array(
                $img . 'product-gasket-bearing.jpg',
                $img . 'gearbox-gallery-1.jpg',
                $img . 'gearbox-gallery-2.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Bearing Engineering Catalog', 'type' => 'PDF', 'size' => '4.7 MB' ),
                array( 'name' => 'Seal Compatibility Matrix', 'type' => 'PDF', 'size' => '2.3 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Gasket & Seals',
            'brand'        => 'FLOWSERVE & BURGMANN SPECS',
            'stock'        => 'IN STOCK',
            'title'        => 'High-Temperature Cartridge Seals',
            'full_title'   => 'Single & Dual Cartridge Mechanical Seals',
            'desc'         => 'Heavy-duty pre-assembled cartridge mechanical seals designed to eliminate installation errors and handle aggressive petrochemical slurries, hazardous hydrocarbons, and thermal fluids up to 400°C without external cooling.',
            'image'        => $img . 'product-gasket-bearing.jpg',
            'gallery'      => array(
                $img . 'product-gasket-bearing.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-instrument.jpg',
                $img . 'svc-mechanical.jpg',
                $img . 'gearbox-gallery-2.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Cartridge Seal Dimensions', 'type' => 'PDF', 'size' => '3.3 MB' ),
                array( 'name' => 'API 682 Piping Plans Guide', 'type' => 'PDF', 'size' => '2.0 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Mechanical Drives',
            'brand'        => 'SUMITOMO DRIVE TECHNOLOGIES',
            'stock'        => 'IN STOCK',
            'title'        => 'Gear Box (Sumitomo)',
            'full_title'   => 'Paramax 9000 Series Gear Drive',
            'desc'         => 'Engineered for high torque and rigorous industrial applications, the Sumitomo Paramax 9000 Series delivers unparalleled reliability and performance. Featuring a highly standardized, modular design, these gear units provide optimized thermal capacity and reduced operational noise for demanding continuous duty environments.',
            'image'        => $img . 'product-gearbox.jpg',
            'gallery'      => array(
                $img . 'product-gearbox.jpg',
                $img . 'gearbox-gallery-1.jpg',
                $img . 'gearbox-gallery-2.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-mechanical.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Technical Data Sheet', 'type' => 'PDF', 'size' => '2.4 MB' ),
                array( 'name' => 'Installation & Maintenance Manual', 'type' => 'PDF', 'size' => '8.1 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Mechanical Drives',
            'brand'        => 'PREMIUM INDUCTION DRIVES',
            'stock'        => 'IN STOCK',
            'title'        => 'Electric Motors & Speed Reducers',
            'full_title'   => 'IE3 High Efficiency Motors & Planetary Reducers',
            'desc'         => 'Industrial 3-phase squirrel cage induction electric motors compliant with IEC standards and premium IE3/IE4 efficiency classes. Coupled with helical worm and planetary speed reducers for continuous 24/7 manufacturing lines.',
            'image'        => $img . 'gearbox-gallery-1.jpg',
            'gallery'      => array(
                $img . 'gearbox-gallery-1.jpg',
                $img . 'gearbox-gallery-2.jpg',
                $img . 'product-gearbox.jpg',
                $img . 'svc-electrical.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Motor Efficiency Curves', 'type' => 'PDF', 'size' => '3.9 MB' ),
                array( 'name' => 'Reducer Mounting Dimensions', 'type' => 'PDF', 'size' => '2.7 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Mechanical Drives',
            'brand'        => 'TORQUE TRANSMISSION SYSTEMS',
            'stock'        => 'IN STOCK',
            'title'        => 'Flexible Couplings & Drive Shafts',
            'full_title'   => 'Heavy-Duty Torsional Couplings & Universal Shafts',
            'desc'         => 'High-torque grid couplings, gear tooth couplings, elastomeric jaw couplings, and cardan drive shafts engineered to absorb shock loads, damp vibrations, and compensate for angular and parallel shaft misalignments in heavy machinery.',
            'image'        => $img . 'gearbox-gallery-2.jpg',
            'gallery'      => array(
                $img . 'gearbox-gallery-2.jpg',
                $img . 'product-gearbox.jpg',
                $img . 'gearbox-gallery-1.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Coupling Selection Manual', 'type' => 'PDF', 'size' => '3.0 MB' ),
                array( 'name' => 'Torsional Stiffness Ratings', 'type' => 'PDF', 'size' => '1.6 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Valves & Gauges',
            'brand'        => 'FLOW CONTROL DYNAMICS',
            'stock'        => 'IN STOCK',
            'title'        => 'Industrial Control & Isolation Valves',
            'full_title'   => 'Engineered Process Control & Severe Service Valves',
            'desc'         => 'High performance trunnion mounted ball valves, triple offset metal-seated butterfly valves, globe control valves, and API 600 cast steel gate valves with pneumatic diaphragm and electric multi-turn actuators for automated pipeline control.',
            'image'        => $img . 'svc-instrument.jpg',
            'gallery'      => array(
                $img . 'svc-instrument.jpg',
                $img . 'product-pipes.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'svc-mechanical.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Control Valve Sizing Guide', 'type' => 'PDF', 'size' => '4.5 MB' ),
                array( 'name' => 'Fire Safe API 607 Certificate', 'type' => 'PDF', 'size' => '1.8 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Valves & Gauges',
            'brand'        => 'PRECISION PROCESS INSTRUMENTS',
            'stock'        => 'IN STOCK',
            'title'        => 'Instrumentation Gauges & Manifolds',
            'full_title'   => 'Stainless Steel Gauges & Multi-Port Manifolds',
            'desc'         => 'All-stainless steel glycerin-filled pressure gauges, bi-metal thermometers with solid machined thermowells, and precision needle valve manifolds (2-way, 3-way, 5-way) ensuring bubble-tight shutoff and ultra-precise pressure transmission.',
            'image'        => $img . 'svc-instrument.jpg',
            'gallery'      => array(
                $img . 'svc-instrument.jpg',
                $img . 'factory-operations.jpg',
                $img . 'svc-electrical.jpg',
                $img . 'project-management-bg.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Instrument Gauge Specs', 'type' => 'PDF', 'size' => '2.9 MB' ),
                array( 'name' => 'Calibration Certificate Sample', 'type' => 'PDF', 'size' => '1.1 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Valves & Gauges',
            'brand'        => 'OVERPRESSURE SAFETY GUARD',
            'stock'        => 'IN STOCK',
            'title'        => 'Pressure Safety Relief & Check Valves',
            'full_title'   => 'ASME VIII Spring-Loaded Safety Relief Valves',
            'desc'         => 'Certified spring-loaded pressure relief and safety valves designed to safeguard boilers, pressurized storage spheres, reactors, and pipelines from hazardous overpressure events. Tested with UV stamp and full capacity discharge reports.',
            'image'        => $img . 'svc-instrument.jpg',
            'gallery'      => array(
                $img . 'svc-instrument.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'product-pipes.jpg',
                $img . 'svc-mechanical.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Safety Relief Sizing Program', 'type' => 'PDF', 'size' => '3.5 MB' ),
                array( 'name' => 'ASME UV Stamp Certificate', 'type' => 'PDF', 'size' => '1.3 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Energy & Fuel',
            'brand'        => 'MIGAS CERTIFIED SOLUTIONS',
            'stock'        => 'IN STOCK',
            'title'        => 'Fuel & Industrial Lubricants',
            'full_title'   => 'MIGAS-Compliant Fuel & Lubrication Systems',
            'desc'         => 'Industry-compliant fuel and lubrication solutions meeting MIGAS (Minyak dan Gas Bumi) standards. Our certified products include fuel storage systems, dispensing equipment, and industrial lubricants designed for the Indonesian oil & gas sector.',
            'image'        => $img . 'product-fuel-migas.jpg',
            'gallery'      => array(
                $img . 'product-fuel-migas.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'project-management-bg.jpg',
                $img . 'hero-bg.jpg',
                $img . 'factory-operations.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'MIGAS Compliance Certificate', 'type' => 'PDF', 'size' => '1.6 MB' ),
                array( 'name' => 'Product Specifications Sheet', 'type' => 'PDF', 'size' => '3.2 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Energy & Fuel',
            'brand'        => 'REFINERY SPARES LOGISTICS',
            'stock'        => 'IN STOCK',
            'title'        => 'Refinery Spares & Consumables',
            'full_title'   => 'Turnaround Spares & Critical Plant Consumables',
            'desc'         => 'Fast-lead consumables and turnaround maintenance spares for refineries and petrochemical plants, including ceramic fiber insulation blankets, high-pressure hydraulic filter cartridges, thermowell sensors, and stud bolts conforming to ASTM A193 B7/2H.',
            'image'        => $img . 'factory-operations.jpg',
            'gallery'      => array(
                $img . 'factory-operations.jpg',
                $img . 'hero-workers.jpg',
                $img . 'news-training.jpg',
                $img . 'svc-inspection.jpg',
                $img . 'project-management-bg.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Refinery Spares Inventory Guide', 'type' => 'PDF', 'size' => '3.8 MB' ),
                array( 'name' => 'Turnaround Consumables Kit', 'type' => 'PDF', 'size' => '2.1 MB' ),
            ),
            'specs'        => array(
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
            'category'     => 'Energy & Fuel',
            'brand'        => 'TURBINE POWER SYSTEMS',
            'stock'        => 'IN STOCK',
            'title'        => 'Heavy Fuel Filtration & Turbine Spares',
            'full_title'   => 'Centrifugal Fuel Conditioning & Gas Turbine Spares',
            'desc'         => 'Complete fuel conditioning systems, duplex basket strainers, centrifugal separators, and combustion hardware spares for industrial gas and steam turbines. Designed to ensure clean fuel delivery and maximum thermal efficiency.',
            'image'        => $img . 'project-management-bg.jpg',
            'gallery'      => array(
                $img . 'project-management-bg.jpg',
                $img . 'product-fuel-migas.jpg',
                $img . 'hero-port-crane.jpg',
                $img . 'svc-electrical.jpg',
            ),
            'documents'    => array(
                array( 'name' => 'Filtration Performance Curves', 'type' => 'PDF', 'size' => '3.4 MB' ),
                array( 'name' => 'Turbine Spares Compatibility', 'type' => 'PDF', 'size' => '2.6 MB' ),
            ),
            'specs'        => array(
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
}

/**
 * Get a single product by slug, with aliases and fallbacks.
 */
function fitra_get_product( $slug ) {
    $products = fitra_get_products();

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
    return reset( $products );
}
