<?php
/**
 * News & Event Data — static catalog for news articles and events
 *
 * @package FitraPerkasa
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit;
}

/**
 * Return all news & event articles keyed by slug.
 * Queries fitra_news CPT first, falls back to hardcoded array.
 */
function fitra_get_news_articles() {
    // ── Try CPT query first ──
    $cpt_articles = fitra_get_news_from_cpt();
    if ( ! empty( $cpt_articles ) ) {
        return $cpt_articles;
    }

    // ── Fallback: hardcoded news data ──
    $img = get_template_directory_uri() . '/assets/images/';

    return array(
        // Featured Article (Sorotan Utama)
        'implementasi-teknologi-presisi-tinggi' => array(
            'slug'          => 'implementasi-teknologi-presisi-tinggi',
            'type'          => 'berita',
            'category'      => fitra_t_val( 'CORPORATE UPDATES', 'PEMBARUAN KORPORAT' ),
            'date'          => fitra_t_val( 'DEC 12, 2024', '12 DES 2024' ),
            'badge'         => fitra_t_val( 'MAIN HIGHLIGHT', 'SOROTAN UTAMA' ),
            'title'         => fitra_t_val( 'Implementation of High-Precision Technology in International Steel Distribution', 'Implementasi Teknologi Presisi Tinggi pada Distribusi Baja Internasional' ),
            'author'        => array(
                'name'   => 'Darmawan Santoso',
                'role'   => fitra_t_val( 'Chief Operations Officer', 'Chief Operations Officer' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'factory-operations.jpg',
            'pullquote'     => fitra_t_val( 'As part of PT Fitra Perkasa Inti\'s commitment to global efficiency, we introduced an AI-based tracking and logistics management system to ensure world-class construction material distribution accuracy.', 'Sebagai bagian dari komitmen PT Fitra Perkasa Inti terhadap efisiensi global, kami memperkenalkan sistem pelacakan dan manajemen logistik berbasis AI untuk memastikan akurasi distribusi material konstruksi kelas dunia.' ),
            'section1_title'=> fitra_t_val( 'Digital Transformation in Heavy Industry', 'Transformasi Digital di Sektor Heavy Industry' ),
            'section1_p1'   => fitra_t_val( 'Traditional steel and equipment industries often face challenges regarding supply chain transparency and delivery timeliness. In a fast-moving era, any delay can have systemic impacts on large infrastructure projects. PT Fitra Perkasa Inti sees this challenge as an opportunity to integrate high-precision technology into every distribution node.', 'Industri baja tradisional sering kali menghadapi tantangan dalam hal transparansi rantai pasok dan presisi waktu pengiriman. Dalam era globalisasi yang semakin cepat, keterlambatan sekecil apa pun dapat berdampak sistemik pada proyek infrastruktur skala besar. PT Fitra Perkasa Inti melihat tantangan ini sebagai peluang untuk mengintegrasikan teknologi presisi tinggi ke dalam setiap simpul distribusi kami.' ),
            'section1_p2'   => fitra_t_val( 'This step is not merely following trends, but a fundamental operational requirement. With significant international trade volume, manual systems are no longer sufficient to uphold the quality standards we promise our partners.', 'Langkah ini bukan sekadar mengikuti tren, melainkan kebutuhan operasional mendasar. Dengan volume perdagangan internasional yang mencapai ratusan ribu ton per tahun, sistem manual tidak lagi memadai untuk menjaga standar kualitas yang kami janjikan kepada mitra global.' ),
            'features_title'=> fitra_t_val( 'Core Pillars of the New System', 'Pilar Utama Sistem Baru' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Real-time Quality Monitoring', 'Pemantauan Kualitas Real-time' ),
                    'desc'  => fitra_t_val( 'IoT sensors on containers monitor humidity and temperature to prevent steel corrosion during transit.', 'Sensor IoT yang terpasang pada setiap kontainer memantau kelembaban dan suhu untuk mencegah korosi pada baja selama perjalanan laut.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( 'Automated Loading Precision', 'Presisi Pemuatan Otomatis' ),
                    'desc'  => fitra_t_val( 'Robotic cargo handling reduces risk of physical material damage by up to 98% compared to conventional methods.', 'Penggunaan robotik kargo yang mengurangi risiko kerusakan fisik pada material hingga 98% dibandingkan metode konvensional.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( 'Predictive Logistics', 'Logistik Prediktif' ),
                    'desc'  => fitra_t_val( 'AI algorithms analyze shipping routes and global weather patterns to proactively predict and mitigate delays.', 'Algoritma AI menganalisis rute pengiriman dan kondisi cuaca global untuk memprediksi serta memitigasi potensi penundaan secara proaktif.' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Impact on Stakeholders', 'Dampak bagi Stakeholder' ),
            'section2_p1'   => fitra_t_val( 'For our clients in the construction and industrial sectors, this precision delivers project schedule certainty. No more machine downtime due to delayed materials or supplies arriving below technical specifications.', 'Bagi klien kami di sektor konstruksi dan otomotif, presisi ini berarti kepastian jadwal proyek. Tidak ada lagi downtime mesin akibat material yang belum tiba atau material yang datang dalam kondisi di bawah standar spesifikasi teknis.' ),
            'quote'         => fitra_t_val( 'Investing in technology is investing in customer trust. PT Fitra Perkasa Inti provides operational continuity guarantees for our partners worldwide.', 'Investasi pada teknologi adalah investasi pada kepercayaan pelanggan. PT Fitra Perkasa Inti menyediakan jaminan keberlanjutan operasional bagi mitra-mitra kami di seluruh dunia.' ),
            'quote_author'  => fitra_t_val( 'MANAGEMENT BOARD, PT FITRA PERKASA INTI', 'DEWAN DIREKSI, PT FITRA PERKASA INTI' ),
            'section2_p2'   => fitra_t_val( 'Moving forward, PT Fitra Perkasa Inti plans to expand blockchain implementation to ensure end-to-end material traceability, supporting transparent green industry initiatives.', 'Kedepannya, PT Fitra Perkasa Inti berencana untuk memperluas implementasi blockchain guna memastikan ketertelusuran (traceability) sumber material, mendukung inisiatif industri hijau yang lebih transparan dan bertanggung jawab secara lingkungan.' ),
        ),

        // 1. Standar Baru Sertifikasi Kualitas
        'standar-baru-sertifikasi-kualitas' => array(
            'slug'          => 'standar-baru-sertifikasi-kualitas',
            'type'          => 'berita',
            'category'      => fitra_t_val( 'QUALITY STANDARDS', 'STANDAR KUALITAS' ),
            'date'          => fitra_t_val( 'MAY 08, 2024', '08 MEI 2024' ),
            'badge'         => fitra_t_val( 'NEWS', 'BERITA' ),
            'title'         => fitra_t_val( 'New Quality Certification Standards for Industrial Gas Pipes', 'Standar Baru Sertifikasi Kualitas untuk Pipa Industri Gas' ),
            'author'        => array(
                'name'   => 'Ir. Hendra Wijaya',
                'role'   => fitra_t_val( 'Head of Quality Assurance', 'Kepala Penjaminan Mutu' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'product-pipes.jpg',
            'pullquote'     => fitra_t_val( 'We recently updated our technical inspection protocols to meet the latest ISO standards in energy infrastructure distribution.', 'Kami baru saja memperbarui protokol inspeksi teknis kami untuk memenuhi standar ISO terbaru dalam distribusi infrastruktur energi.' ),
            'section1_title'=> fitra_t_val( 'Upgraded Pressure & Integrity Testing Protocols', 'Peningkatan Protokol Pengujian Tekanan & Integritas' ),
            'section1_p1'   => fitra_t_val( 'To meet the stringent reliability demands of the oil and gas industry, we have updated non-destructive testing (NDT), ultrasonic examination, and radiographic testing standards for all carbon steel and stainless steel industrial piping product lines.', 'Dalam rangka memenuhi kebutuhan industri minyak dan gas yang kian menuntut keandalan tinggi, kami telah memperbarui standar pengujian nondestructive testing (NDT), ultrasonic examination, dan pengujian radiografi untuk semua lini produk perpipaan baja karbon dan stainless steel.' ),
            'section1_p2'   => fitra_t_val( 'This new certification guarantees all pipe materials can withstand hydraulic loads up to Class 2500 rating without risk of micro-fissures or stress corrosion cracking.', 'Sertifikasi baru ini menjamin seluruh material pipa mampu menahan beban hidrolik hingga rating Class 2500 tanpa risiko micro-fissure atau korosi tegangan.' ),
            'features_title'=> fitra_t_val( 'New Protocol Advantages', 'Keunggulan Protokol Baru' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Automated Hydrostatic Testing', 'Hydrostatic Testing Otomatis' ),
                    'desc'  => fitra_t_val( 'Digital pressure recording system calibrated by independent KAN-accredited testing laboratories.', 'Pengujian tekanan dengan sistem pencatatan digital terkalibrasi laboratorium independen terakreditasi KAN.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( '100% Batch Number Traceability', 'Traceability Nomor Batch 100%' ),
                    'desc'  => fitra_t_val( 'Each pipe segment includes barcode identification tied directly to verified digital mill certificates.', 'Tiap segmen pipa dilengkapi barcode identifikasi material mill certificate yang dapat diverifikasi secara online.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( 'NACE MR0175 Compliance', 'Kepatuhan NACE MR0175' ),
                    'desc'  => fitra_t_val( 'Meets strict sulfide stress cracking resistance requirements for sour gas production environments.', 'Memenuhi persyaratan ketat ketahanan sulfide stress cracking untuk lingkungan gas asam (sour gas).' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Commitment to Safety Standards', 'Komitmen Terhadap Standar Keselamatan' ),
            'section2_p1'   => fitra_t_val( 'These standards are implemented across all our warehouses and fabrication hubs to deliver engineering confidence for EPC contractors across Indonesia.', 'Standar ini diimplementasikan di seluruh warehouse dan pusat fabrikasi kami guna memberikan kepastian teknis bagi kontraktor EPC migas dan petrokimia di Indonesia.' ),
            'quote'         => fitra_t_val( 'Piping safety and reliability are foundational to large-scale energy operations without downtime.', 'Keamanan dan keandalan pipa adalah fondasi utama keberhasilan operasi energi skala besar tanpa downtime.' ),
            'quote_author'  => fitra_t_val( 'ENGINEERING & QA TEAM, PT FITRA PERKASA INTI', 'TIM ENGINEERING & QA, FITRA PERKASA INTI' ),
            'section2_p2'   => fitra_t_val( 'This update solidifies our standing as a trusted industrial gas piping procurement partner in national strategic projects.', 'Langkah ini mengukuhkan posisi kami sebagai mitra pengadaan pipa industri gas terpercaya di seluruh proyek strategis nasional.' ),
        ),

        // 2. Metal & Steel Indonesia 2024
        'metal-steel-indonesia-2024' => array(
            'slug'          => 'metal-steel-indonesia-2024',
            'type'          => 'acara',
            'category'      => fitra_t_val( 'INDUSTRY EXPO', 'PAMERAN INDUSTRI' ),
            'date'          => fitra_t_val( 'JUN 24, 2024', '24 JUN 2024' ),
            'badge'         => fitra_t_val( 'EVENT', 'ACARA' ),
            'title'         => fitra_t_val( 'Metal & Steel Indonesia 2024: Annual Industrial Exhibition', 'Metal & Steel Indonesia 2024: Pameran Industri Tahunan' ),
            'author'        => array(
                'name'   => 'Siti Rahmawati',
                'role'   => fitra_t_val( 'Head of Corporate Communications', 'Kepala Komunikasi Korporat' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'news-workshop.jpg',
            'pullquote'     => fitra_t_val( 'Join our team of experts at Booth A12 for in-depth discussions regarding material procurement solutions for construction projects.', 'Bergabunglah dengan tim ahli kami di Booth A12 untuk diskusi mendalam mengenai solusi pengadaan material untuk proyek konstruksi.' ),
            'section1_title'=> fitra_t_val( 'Meeting Place for Metal & Construction Industry Leaders', 'Ajang Pertemuan Pemimpin Industri Logam & Konstruksi' ),
            'section1_p1'   => fitra_t_val( 'Metal & Steel Indonesia 2024 is Southeast Asia\'s prominent platform connecting steel manufacturers, industrial component distributors, and infrastructure contractors.', 'Pameran Metal & Steel Indonesia 2024 merupakan platform terbesar di Asia Tenggara yang menghubungkan produsen baja, distributor komponen industri, dan kontraktor infrastruktur.' ),
            'section1_p2'   => fitra_t_val( 'At this year\'s expo, we showcase supply chain technology innovations and a wide range of products including wide flange beams, mechanical seals, and precision bearings.', 'Pada pameran tahun ini, kami menampilkan inovasi teknologi rantai pasok material dan showcase produk terbaru termasuk wide flange beams, mechanical seals, dan precision bearings.' ),
            'features_title'=> fitra_t_val( 'Booth Agenda & Consultation', 'Agenda Booth & Konsultasi' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Live Laser Alignment Demos', 'Live Demo Laser Alignment' ),
                    'desc'  => fitra_t_val( 'Hands-on demonstration of high-precision gearbox shaft and coupling alignment by our mechanical services team.', 'Demonstrasi langsung teknik penyelarasan poros gearbox dan kopling presisi tinggi oleh tim mekanikal.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( 'Project Specification Consulting', 'Konsultasi Spesifikasi Proyek' ),
                    'desc'  => fitra_t_val( 'One-on-one sessions with certified piping and structural engineers for project tender requirements.', 'Sesi tatap muka bersama certified piping & structural engineers untuk kebutuhan tender proyek.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( 'Fast-Track Delivery Program', 'Peluncuran Program Fast-Track Delivery' ),
                    'desc'  => fitra_t_val( 'Express shipment schemes for critical plant turnaround and emergency maintenance supplies.', 'Skema pengiriman ekspres untuk material kritis maintenance dan turnaround pabrik.' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Attendance Information', 'Informasi Kehadiran' ),
            'section2_p1'   => fitra_t_val( 'The exhibition takes place at Hall A, Jakarta International Expo (JIExpo) Kemayoran from 09:00 to 18:00 WIB.', 'Pameran berlangsung di Hall A, Jakarta International Expo (JIExpo) Kemayoran mulai pukul 09.00 hingga 18.00 WIB.' ),
            'quote'         => fitra_t_val( 'Industry collaboration is key to accelerating modern, globally competitive infrastructure development.', 'Kolaborasi industri adalah kunci percepatan pembangunan infrastruktur modern yang berdaya saing global.' ),
            'quote_author'  => fitra_t_val( 'METAL & STEEL INDONESIA COMMITTEE', 'PANITIA METAL & STEEL INDONESIA 2024' ),
            'section2_p2'   => fitra_t_val( 'Visit our booth to obtain exclusive technical catalogs and dedicated project procurement packages.', 'Kunjungi booth kami dan dapatkan katalog teknis eksklusif serta penawaran paket pengadaan proyek khusus.' ),
        ),

        // 3. Ekspansi Jaringan Logistik ke Wilayah Timur Tengah
        'ekspansi-jaringan-logistik-timur-tengah' => array(
            'slug'          => 'ekspansi-jaringan-logistik-timur-tengah',
            'type'          => 'berita',
            'category'      => fitra_t_val( 'GLOBAL EXPANSION', 'EKSPANSI GLOBAL' ),
            'date'          => fitra_t_val( 'MAY 02, 2024', '02 MEI 2024' ),
            'badge'         => fitra_t_val( 'NEWS', 'BERITA' ),
            'title'         => fitra_t_val( 'Expansion of Logistics Network to the Middle East Region', 'Ekspansi Jaringan Logistik ke Wilayah Timur Tengah' ),
            'author'        => array(
                'name'   => 'Darmawan Santoso',
                'role'   => fitra_t_val( 'Chief Operations Officer', 'Chief Operations Officer' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'hero-port-crane.jpg',
            'pullquote'     => fitra_t_val( 'PT Fitra Perkasa Inti strengthens strategic partnerships with major port operators to accelerate material transit times.', 'PT Fitra Perkasa Inti memperkuat kemitraan strategis dengan operator pelabuhan utama untuk mempercepat waktu transit material.' ),
            'section1_title'=> fitra_t_val( 'Opening a High-Efficiency Shipping Corridor', 'Membuka Koridor Pengiriman Material Berdaya Saing Tinggi' ),
            'section1_p1'   => fitra_t_val( 'This maritime route expansion connects major Indonesian port hubs directly to the UAE and Saudi Arabia, cutting shipping lead times by up to 35%.', 'Ekspansi rute logistik maritim ini menghubungkan hub pelabuhan utama di Indonesia langsung ke Uni Emirat Arab dan Arab Saudi, memangkas lead time pengiriman baja dan komponen industri hingga 35%.' ),
            'section1_p2'   => fitra_t_val( 'Through partnerships with international container terminals, all critical cargo is protected in climate-controlled units.', 'Melalui kemitraan dengan operator terminal peti kemas berstandar internasional, seluruh kargo diproteksi dengan climate-controlled container.' ),
            'features_title'=> fitra_t_val( 'New Corridor Advantages', 'Keuntungan Koridor Baru' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Faster Transit Times', 'Transit Time Lebih Cepat' ),
                    'desc'  => fitra_t_val( 'Reduction in sailing duration from 22 days down to 14 days via direct non-transshipment routing.', 'Pengurangan durasi pelayaran dari 22 hari menjadi 14 hari berkat rute pelayaran langsung non-transshipment.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( 'Bonded Warehousing Hub', 'Hub Pergudangan Berikat' ),
                    'desc'  => fitra_t_val( 'Bonded storage facility in Jebel Ali Free Zone ensuring fast stock readiness for Middle Eastern projects.', 'Fasilitas penyimpanan berikat di Jebel Ali Free Zone untuk kesiapan stok cepat proyek Timur Tengah.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( 'Digital Customs Clearance', 'Digital Custom Clearance' ),
                    'desc'  => fitra_t_val( 'Single-window customs integration speeding container release from docks to site facilities.', 'Integrasi kepabeanan satu pintu mempercepat pelepasan kargo dari dermaga ke lokasi proyek konstruksi.' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Supporting the Regional Energy Sector', 'Mendukung Sektor Energi Regional' ),
            'section2_p1'   => fitra_t_val( 'This strategic move directly addresses surging demands for industrial pipes and mechanical transmission gear in regional refinery and exploration projects.', 'Langkah strategis ini merespons peningkatan kebutuhan material pipa dan komponen transmisi mekanik di proyek eksplorasi dan kilang gas regional.' ),
            'quote'         => fitra_t_val( 'International logistics efficiency is a competitive edge delivering real, tangible value to our enterprise partners.', 'Efisiensi logistik internasional adalah keunggulan kompetitif yang memberikan nilai tambah nyata bagi para mitra kami.' ),
            'quote_author'  => fitra_t_val( 'BOARD OF DIRECTORS, FITRA PERKASA INTI', 'DIREKSI FITRA PERKASA INTI' ),
            'section2_p2'   => fitra_t_val( 'We continue to broaden our supply chain reach so contractors obtain assured materials on-time and within exact tolerances.', 'Kami terus memperluas jangkauan rantai pasok agar para kontraktor mendapatkan kepastian material tepat waktu dan tepat mutu.' ),
        ),

        // 4. Webinar: Inovasi Material untuk Infrastruktur Berkelanjutan
        'webinar-inovasi-material-infrastruktur' => array(
            'slug'          => 'webinar-inovasi-material-infrastruktur',
            'type'          => 'acara',
            'category'      => fitra_t_val( 'VIRTUAL SEMINAR', 'SEMINAR VIRTUAL' ),
            'date'          => fitra_t_val( 'JUL 15, 2024', '15 JUL 2024' ),
            'badge'         => fitra_t_val( 'EVENT', 'ACARA' ),
            'title'         => fitra_t_val( 'Webinar: Material Innovation for Sustainable Infrastructure', 'Webinar: Inovasi Material untuk Infrastruktur Berkelanjutan' ),
            'author'        => array(
                'name'   => 'Dr. Ir. Bagus Pratama',
                'role'   => fitra_t_val( 'Senior Materials Consultant', 'Konsultan Material Senior' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'news-training.jpg',
            'pullquote'     => fitra_t_val( 'Panel discussion with civil engineering experts on the selection of corrosion-resistant steel types for coastal environments.', 'Diskusi panel dengan pakar teknik sipil mengenai pemilihan jenis baja yang tahan korosi untuk lingkungan pesisir dan proyek.' ),
            'section1_title'=> fitra_t_val( 'Tackling Maritime Corrosion Challenges', 'Menjawab Tantangan Korosi Lingkungan Maritim' ),
            'section1_p1'   => fitra_t_val( 'Port jetties, long-span bridges, and offshore platforms demand metal materials with exceptional degradation resistance.', 'Pembangunan dermaga, jembatan bentang panjang, dan fasilitas lepas pantai membutuhkan pemilihan material logam dengan ketahanan degradasi tinggi.' ),
            'section1_p2'   => fitra_t_val( 'This interactive webinar explores duplex stainless steel vs hot-dip galvanizing alongside comprehensive life-cycle cost analyses.', 'Webinar interaktif ini mengupas tuntas komparasi duplex stainless steel vs pelapisan galvanis hot-dip serta analisis siklus hidup (life cycle cost) infrastruktur.' ),
            'features_title'=> fitra_t_val( 'Key Discussion Topics', 'Topik Bahasan Utama' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Salt Corrosion Metallurgy', 'Metalurgi Korosi Garam' ),
                    'desc'  => fitra_t_val( 'Understanding pitting and crevice corrosion mechanisms on marine structures.', 'Pemahaman mekanisme pitting corrosion dan crevice corrosion pada struktur lepas pantai.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( 'Modern Port Case Studies', 'Studi Kasus Pelabuhan Modern' ),
                    'desc'  => fitra_t_val( 'High-strength steel performance evaluations on contemporary container terminals.', 'Evaluasi performa baja berkekuatan tinggi (high-strength steel) pada dermaga peti kemas kontemporer.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( 'Weather-Resistant Steel ROI', 'Perhitungan ROI Material Tahan Cuaca' ),
                    'desc'  => fitra_t_val( 'Calculation models for scheduled maintenance savings over a 30-year operational lifecycle.', 'Metode kalkulasi penghematan biaya pemeliharaan berkala selama masa operasional 30 tahun.' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Registration & Certification', 'Pendaftaran & Sertifikasi' ),
            'section2_p1'   => fitra_t_val( 'The webinar is open and free for civil engineering professionals, planning consultants, and material academics.', 'Webinar terbuka gratis bagi para praktisi rekayasa sipil, konsultan perencana, dan akademisi teknik material di seluruh Indonesia.' ),
            'quote'         => fitra_t_val( 'Choosing the right material at the design phase is the key to sustainable, resilient green infrastructure.', 'Memilih material yang tepat di tahap desain adalah kunci ketahanan infrastruktur hijau berkelanjutan untuk generasi mendatang.' ),
            'quote_author'  => fitra_t_val( 'NATIONAL ENGINEERING WEBINAR COMMITTEE', 'PANITIA WEBINAR TEKNIK NASIONAL' ),
            'section2_p2'   => fitra_t_val( 'Full attendees will receive an official e-certificate and a practical guide module for corrosion-resistant steel specification.', 'Peserta yang hadir penuh akan mendapatkan e-certificate dan modul komprehensif pedoman pemilihan material baja tahan korosi.' ),
        ),

        // 5. Laporan Keberlanjutan 2023
        'laporan-keberlanjutan-2023-komitmen-net-zero' => array(
            'slug'          => 'laporan-keberlanjutan-2023-komitmen-net-zero',
            'type'          => 'berita',
            'category'      => fitra_t_val( 'SUSTAINABILITY', 'KEBERLANJUTAN' ),
            'date'          => fitra_t_val( 'APR 25, 2024', '25 APR 2024' ),
            'badge'         => fitra_t_val( 'NEWS', 'BERITA' ),
            'title'         => fitra_t_val( 'Sustainability Report 2023: Fitra Perkasa Net Zero Commitment', 'Laporan Keberlanjutan 2023: Komitmen Net Zero Fitra Perkasa' ),
            'author'        => array(
                'name'   => 'Ayu Lestari, S.T.',
                'role'   => fitra_t_val( 'Sustainability & ESG Lead', 'Ketua ESG & Keberlanjutan' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'product-steels.jpg',
            'pullquote'     => fitra_t_val( 'Comprehensive review of company efforts to reduce carbon footprint throughout transportation and packaging processes.', 'Tinjauan komprehensif mengenai upaya perusahaan dalam mengurangi jejak karbon selama proses transportasi dan pengemasan.' ),
            'section1_title'=> fitra_t_val( 'Decarbonizing the Heavy Industry Supply Chain', 'Dekarbonisasi Rantai Pasok Industri Berat' ),
            'section1_p1'   => fitra_t_val( 'The 2023 Sustainability Report outlines a 24% reduction in Scope 1 and Scope 2 emissions achieved via route efficiency and solar rooftop installation.', 'Laporan Keberlanjutan 2023 menguraikan capaian pengurangan emisi Scope 1 dan Scope 2 sebesar 24% melalui efisiensi armada distribusi dan transisi energi solar rooftop pada fasilitas pergudangan kami.' ),
            'section1_p2'   => fitra_t_val( 'This initiative aligns with national net zero trajectories while helping corporate clients satisfy their own ESG mandates.', 'Inisiatif ini sejalan dengan target nasional menuju Net Zero Emission dan mendukung klien korporat dalam mencapai target ESG mereka.' ),
            'features_title'=> fitra_t_val( '2023 Key Achievements', 'Capaian Kunci 2023' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Solar Power at Main Workshop', 'Solar Power di Workshop Utama' ),
                    'desc'  => fitra_t_val( 'Rooftop solar systems generate 40% of daily electricity needed for assembly and testing activities.', 'Pembangkit PLTS atap memasok 40% kebutuhan listrik harian operasional perakitan dan fabrikasi.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( 'Euro 5 Low-Emission Fleet', 'Armada Truk Rendah Emisi Euro 5' ),
                    'desc'  => fitra_t_val( 'Modernized ground transport vehicles with enhanced fuel efficiency and reduced exhaust emissions.', 'Peremajaan armada logistik darat dengan konsumsi bahan bakar lebih hemat dan emisi gas buang minim.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( '100% Scrap Metal Recycling', 'Program Daur Ulang Scrap Logam 100%' ),
                    'desc'  => fitra_t_val( 'All off-cuts and metal shavings return to partnered smelters for a closed-loop recycling lifecycle.', 'Seluruh potongan material baja dan besi dikembalikan ke pabrik peleburan mitra untuk siklus daur ulang tertutup.' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Strategic Roadmap 2024–2028', 'Rencana Strategis 2024–2028' ),
            'section2_p1'   => fitra_t_val( 'We continue expanding green procurement certifications and independent carbon audit procedures for all core products.', 'Kami terus memperluas program sertifikasi green procurement dan audit jejak karbon independen untuk setiap lini produk.' ),
            'quote'         => fitra_t_val( 'Sustainability is no longer an optional add-on, but an essential principle of modern, ethical industrial enterprise.', 'Keberlanjutan bukan lagi opsi sampingan, melainkan prinsip inti operasi bisnis industri modern yang beretika.' ),
            'quote_author'  => fitra_t_val( 'BOARD OF COMMISSIONERS, FITRA PERKASA INTI', 'DEWAN KOMISARIS FITRA PERKASA INTI' ),
            'section2_p2'   => fitra_t_val( 'The full annual report is available to the public to reinforce transparent corporate governance.', 'Laporan lengkap dapat diunduh secara publik untuk mendukung transparansi tata kelola perusahaan yang bertanggung jawab.' ),
        ),

        // 6. Forum Pemimpin Industri Logistik Asia 2024
        'forum-pemimpin-industri-logistik-asia-2024' => array(
            'slug'          => 'forum-pemimpin-industri-logistik-asia-2024',
            'type'          => 'acara',
            'category'      => fitra_t_val( 'LEADERSHIP SUMMIT', 'KTT KEPEMIMPINAN' ),
            'date'          => fitra_t_val( 'AUG 05, 2024', '05 AGT 2024' ),
            'badge'         => fitra_t_val( 'EVENT', 'ACARA' ),
            'title'         => fitra_t_val( 'Asia Logistics Industry Leaders Forum 2024', 'Forum Pemimpin Industri Logistik Asia 2024' ),
            'author'        => array(
                'name'   => 'Darmawan Santoso',
                'role'   => fitra_t_val( 'Chief Operations Officer', 'Chief Operations Officer' ),
                'avatar' => $img . 'hero-workers.jpg',
            ),
            'image'         => $img . 'hero-workers.jpg',
            'pullquote'     => fitra_t_val( 'Exclusive C-suite meeting discussing global supply chain resilience and the future of commodity trade in Asia.', 'Pertemuan eksklusif tingkat C-suite untuk membahas ketahanan rantai pasok global dan masa depan perdagangan komoditas di Asia.' ),
            'section1_title'=> fitra_t_val( 'Navigating Global Supply Disruptions', 'Navigasi Disrupsi Pasokan Global' ),
            'section1_p1'   => fitra_t_val( 'Hosted at the Singapore Tech Center, this summit gathered over 200 top executives across manufacturing, marine transit, and energy logistics.', 'Forum bergengsi yang diselenggarakan di Singapore Tech Center ini mempertemukan lebih dari 200 eksekutif puncak dari sektor manufaktur, perkapalan, dan distribusi energi se-Asia Pasifik.' ),
            'section1_p2'   => fitra_t_val( 'Discussions emphasized raw material diversification, smart contract digitalization, and robotic warehousing to counter market volatility.', 'Diskusi berfokus pada diversifikasi sumber bahan mentah, digitalisasi kontrak logistik, dan otomasi pergudangan pintar untuk mengantisipasi volatilitas pasar.' ),
            'features_title'=> fitra_t_val( 'Exclusive Panel Sessions', 'Sesi Panel Eksklusif' ),
            'features'      => array(
                array(
                    'icon'  => 'check',
                    'title' => fitra_t_val( 'Geopolitics & Steel Supply', 'Geopolitik & Rantai Pasok Baja' ),
                    'desc'  => fitra_t_val( 'Analysis of tariff shifts and subsidy structures on worldwide commodity procurement rates.', 'Analisis dampak tarif impor dan kebijakan subsidi energi terhadap harga komoditas konstruksi internasional.' ),
                ),
                array(
                    'icon'  => 'robot',
                    'title' => fitra_t_val( 'Autonomous Warehousing Tech', 'Otomasi Pergudangan Mandiri' ),
                    'desc'  => fitra_t_val( 'Inspection drones and robotic automated guided vehicles in major transshipment hub terminals.', 'Penerapan drone inspeksi inventori dan robotic pallet truck di pelabuhan transshipment modern.' ),
                ),
                array(
                    'icon'  => 'analytics',
                    'title' => fitra_t_val( 'ASEAN Multilateral Partnerships', 'Kemitraan Multilateral ASEAN' ),
                    'desc'  => fitra_t_val( 'Forging regional coalitions to accelerate friction-free cross-border cargo transit across member states.', 'Membangun konsorsium regional untuk percepatan arus barang bebas hambatan antar negara anggota ASEAN.' ),
                ),
            ),
            'section2_title'=> fitra_t_val( 'Conference Outcomes', 'Partisipasi & Hasil Konferensi' ),
            'section2_p1'   => fitra_t_val( 'The PT Fitra Perkasa Inti delegation presented operational strategies from the Indonesian archipelago on maintaining remote-site logistics uninterrupted.', 'Delegasi PT Fitra Perkasa Inti aktif membagikan pengalaman operasional di kepulauan Indonesia dalam menjaga kelancaran distribusi proyek terpencil.' ),
            'quote'         => fitra_t_val( 'Connectivity and trust are the foundational pillars sustaining Asia\'s industrial supply network.', 'Konektivitas dan kepercayaan adalah dua pilar terpenting dalam menjaga rantai pasok industri Asia tetap tangguh.' ),
            'quote_author'  => fitra_t_val( 'COMMUNITY LEAD, ASIA LOGISTICS COUNCIL', 'KETUA KOMUNITAS, DEWAN LOGISTIK ASIA' ),
            'section2_p2'   => fitra_t_val( 'The summit\'s advisory recommendations will feed directly into the 2025 Asian Manufacturing Logistics Roadmap.', 'Hasil rekomendasi forum akan dituangkan dalam roadmap ketahanan logistik industri manufaktur Asia 2025.' ),
        ),
    );
}

/**
 * Get a single news article by slug with fallback.
 * Queries fitra_news CPT first, then hardcoded, then WP posts.
 */
function fitra_get_news_article( $slug ) {
    // ── Try CPT query first ──
    if ( ! empty( $slug ) && post_type_exists( 'fitra_news' ) ) {
        $cpt_article = fitra_get_single_news_from_cpt( $slug );
        if ( $cpt_article ) {
            return $cpt_article;
        }
    }

    // ── Fallback: hardcoded articles ──
    $articles = fitra_get_news_articles();

    if ( ! empty( $slug ) && isset( $articles[ $slug ] ) ) {
        return $articles[ $slug ];
    }

    $slug_clean = strtolower( trim( $slug ?? '' ) );

    // Check slug keywords in catalog
    if ( ! empty( $slug_clean ) ) {
        foreach ( $articles as $key => $article ) {
            if ( strpos( $key, $slug_clean ) !== false || strpos( $slug_clean, $key ) !== false ) {
                return $article;
            }
        }

        // Check if there is a real WordPress database post (legacy 'post' type)
        $db_posts = get_posts( array(
            'name'           => $slug_clean,
            'post_type'      => 'post',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
        ) );

        if ( ! empty( $db_posts ) ) {
            $post = $db_posts[0];
            $img  = get_template_directory_uri() . '/assets/images/';
            $cats = get_the_category( $post->ID );
            $cat_name = ! empty( $cats ) ? $cats[0]->name : fitra_t_val( 'NEWS', 'BERITA' );
            $thumb    = get_the_post_thumbnail_url( $post->ID, 'full' ) ?: ( $img . 'factory-operations.jpg' );

            return array(
                'slug'          => $post->post_name,
                'type'          => 'berita',
                'category'      => strtoupper( $cat_name ),
                'date'          => get_the_date( 'd M Y', $post ),
                'badge'         => strtoupper( $cat_name ),
                'title'         => get_the_title( $post ),
                'author'        => array(
                    'name'   => get_the_author_meta( 'display_name', $post->post_author ) ?: 'Tim Editorial',
                    'role'   => 'Corporate Communications',
                    'avatar' => $img . 'hero-workers.jpg',
                ),
                'image'         => $thumb,
                'pullquote'     => get_the_excerpt( $post ) ?: wp_trim_words( wp_strip_all_tags( $post->post_content ), 30 ),
                'section1_title'=> fitra_t_val( 'Article Details', 'Ulasan Artikel' ),
                'section1_p1'   => apply_filters( 'the_content', $post->post_content ),
                'section1_p2'   => '',
                'features_title'=> fitra_t_val( 'Key Highlights', 'Sorotan Utama' ),
                'features'      => array(),
                'section2_title'=> '',
                'section2_p1'   => '',
                'quote'         => '',
                'quote_author'  => '',
                'section2_p2'   => '',
            );
        }
    }

    // Default to the featured story
    return reset( $articles );
}

/**
 * Query news articles from the fitra_news CPT.
 *
 * @return array Articles keyed by slug in the same format as the hardcoded array
 */
function fitra_get_news_from_cpt() {
    if ( ! post_type_exists( 'fitra_news' ) ) {
        return array();
    }

    $lang = function_exists( 'fitra_get_lang' ) ? fitra_get_lang() : 'en';

    $args = array(
        'post_type'      => 'fitra_news',
        'post_status'    => 'publish',
        'posts_per_page' => 100,
        'orderby'        => 'date',
        'order'          => 'DESC',
    );

    if ( function_exists( 'pll_current_language' ) ) {
        $args['lang'] = $lang;
    }

    $posts = get_posts( $args );

    if ( empty( $posts ) ) {
        return array();
    }

    $articles = array();
    foreach ( $posts as $post ) {
        $article = fitra_build_news_from_cpt( $post );
        $slug = $article['slug'];
        $articles[ $slug ] = $article;
    }

    return $articles;
}

/**
 * Get a single news article from the CPT by slug.
 *
 * @param string $slug Article slug
 * @return array|null
 */
function fitra_get_single_news_from_cpt( $slug ) {
    $lang = function_exists( 'fitra_get_lang' ) ? fitra_get_lang() : 'en';

    // Try exact slug match
    $args = array(
        'post_type'      => 'fitra_news',
        'post_status'    => 'publish',
        'posts_per_page' => 1,
        'name'           => $slug,
    );

    if ( function_exists( 'pll_current_language' ) ) {
        $args['lang'] = $lang;
    }

    $posts = get_posts( $args );

    // If not found, try with the original slug stored in meta
    if ( empty( $posts ) ) {
        $args_meta = array(
            'post_type'      => 'fitra_news',
            'post_status'    => 'publish',
            'posts_per_page' => 1,
            'meta_key'       => '_news_original_slug',
            'meta_value'     => $slug,
        );
        if ( function_exists( 'pll_current_language' ) ) {
            $args_meta['lang'] = $lang;
        }
        $posts = get_posts( $args_meta );
    }

    if ( empty( $posts ) ) {
        return null;
    }

    return fitra_build_news_from_cpt( $posts[0] );
}

/**
 * Build a news article data array from a CPT post, matching the hardcoded format.
 *
 * @param WP_Post $post The news post object
 * @return array
 */
function fitra_build_news_from_cpt( $post ) {
    $img_base = get_template_directory_uri() . '/assets/images/';

    $slug = get_post_meta( $post->ID, '_news_original_slug', true );
    if ( empty( $slug ) ) {
        $slug = $post->post_name;
        $slug = preg_replace( '/-id$/', '', $slug );
    }

    // Image: ACF/meta > Featured image > fallback
    $image = get_post_meta( $post->ID, '_news_image_url', true );
    if ( empty( $image ) && has_post_thumbnail( $post->ID ) ) {
        $image = get_the_post_thumbnail_url( $post->ID, 'full' );
    }
    if ( empty( $image ) ) {
        $image = $img_base . 'factory-operations.jpg';
    }

    // Author
    $author_name = get_post_meta( $post->ID, 'news_author_name', true ) ?: 'Tim Editorial';
    $author_role = get_post_meta( $post->ID, 'news_author_role', true ) ?: 'Corporate Communications';

    // Features: parse "icon|title|description" lines
    $features_raw = get_post_meta( $post->ID, 'news_features', true ) ?: '';
    $features = array();
    if ( ! empty( $features_raw ) ) {
        $lines = array_filter( array_map( 'trim', explode( "\n", $features_raw ) ) );
        foreach ( $lines as $line ) {
            $parts = explode( '|', $line, 3 );
            $features[] = array(
                'icon'  => trim( $parts[0] ?? 'check' ),
                'title' => trim( $parts[1] ?? '' ),
                'desc'  => trim( $parts[2] ?? '' ),
            );
        }
    }

    // Event badge
    $event_day   = get_post_meta( $post->ID, 'news_event_day', true );
    $event_month = get_post_meta( $post->ID, 'news_event_month', true );
    $event_badge = null;
    if ( ! empty( $event_day ) && ! empty( $event_month ) ) {
        $event_badge = array( 'day' => $event_day, 'month' => $event_month );
    }

    // Determine type from taxonomy
    $terms = wp_get_post_terms( $post->ID, 'fitra_news_type', array( 'fields' => 'slugs' ) );
    $type = ( ! empty( $terms ) && ! is_wp_error( $terms ) ) ? $terms[0] : 'berita';

    return array(
        'slug'          => $slug,
        'type'          => $type,
        'category'      => get_post_meta( $post->ID, 'news_category_label', true ) ?: '',
        'date'          => get_post_meta( $post->ID, 'news_date_display', true ) ?: get_the_date( 'd M Y', $post ),
        'badge'         => get_post_meta( $post->ID, 'news_badge', true ) ?: '',
        'meta_left'     => get_post_meta( $post->ID, 'news_meta_left', true ) ?: '',
        'title'         => $post->post_title,
        'desc'          => get_post_meta( $post->ID, 'news_featured_desc', true ) ?: '',
        'author'        => array(
            'name'   => $author_name,
            'role'   => $author_role,
            'avatar' => $img_base . 'hero-workers.jpg',
        ),
        'image'         => $image,
        'pullquote'     => get_post_meta( $post->ID, 'news_pullquote', true ) ?: '',
        'section1_title'=> get_post_meta( $post->ID, 'news_section1_title', true ) ?: '',
        'section1_p1'   => get_post_meta( $post->ID, 'news_section1_p1', true ) ?: '',
        'section1_p2'   => get_post_meta( $post->ID, 'news_section1_p2', true ) ?: '',
        'features_title'=> get_post_meta( $post->ID, 'news_features_title', true ) ?: '',
        'features'      => $features,
        'section2_title'=> get_post_meta( $post->ID, 'news_section2_title', true ) ?: '',
        'section2_p1'   => get_post_meta( $post->ID, 'news_section2_p1', true ) ?: '',
        'quote'         => get_post_meta( $post->ID, 'news_quote', true ) ?: '',
        'quote_author'  => get_post_meta( $post->ID, 'news_quote_author', true ) ?: '',
        'section2_p2'   => get_post_meta( $post->ID, 'news_section2_p2', true ) ?: '',
        'event_badge'   => $event_badge,
        'link'          => home_url( '/news/' . $slug . '/' ),
        'link_text'     => function_exists( 'fitra_t_val' ) ? fitra_t_val( 'Read More', 'Baca Selengkapnya' ) : 'Read More',
    );
}
