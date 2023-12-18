<?php

namespace Database\Seeders;

use App\Models\Classification;
use App\Models\SubClassification;
use Illuminate\Database\Seeder;

class SubClassificationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $classifications = [
            'Perencanaan Arsitektur',
            'Perencanaan Rekayasa',
            'Perencanaan Penataan Ruang',
            'Pengawasan Arsitektur',
            'Pengawasan Rekayasa',
            'Pengawasan Penataan Ruang',
            'Konsultansi Spesialis',
            'Konsultansi Lainnya',

            // BANGUNAN GEDUNG

            'Bangunan Gedung',
            'Bangunan Sipil',
            'Instalasi Mekanikal dan Elektrikal',
            'Jasa Pelaksanaan Lainnya',
            'Jasa Pelaksanaan Spesialis',
            'Jasa Pelaksanaan Keterampilan',
            'Jasa Konstruksi Terintegrasi',
        ];
        $subclassifications = [
            [
                'code' => [
                    'AR101',
                    'AR102',
                    'AR103',
                    'AR104',
                    'AR105',
                ],
                'name' => [
                    'Jasa Nasihat dan Pra Desain Arsitektural',
                    'Jasa Desain Arsitektural',
                    'Jasa Penilai Perawatan dan Kelayakan Bangunan Gedung',
                    'Jasa Desain Interior',
                    'Jasa Arsitektur lainnya',
                ],
                'description' => [
                    'Jasa asistensi, nasehat, dan rekomendasi mengenai arsitektural dan hal-hal yang terkait dengan arsitektural. Termasuk didalamnya melaksanakan kajian pendahuluan tentang isu-isu seperti site philosopi, tujuan dari pembangunan, tinjauan lingkungan dan iklim, kebutuhan hunian, batasan biaya, analisa pemilihan lokasi, penjadwalan pelaksanaan konstruksi, dan isu lain yang mempengaruhi desain dan konstruksi dari suatu proyek. Jasa ini meliputi tidak hanya proyek konstruksi yang baru namun dapat meliputi nasihat mengenai metode dalam melaksanakan perawatan, renovasi, restorasi, atau recycling dari bangunan, atau penentuan nilai dan kualitas dari bangunan atau nasihat arsitektural lainnya',
                    'Jasa desain arsitektural untuk bangunan dan struktur lainnya, dapat meliputi satu atau kombinasi dari kegiatan sebagai berikut: 1. Jasa desain skematik yang meliputi penentuan (bersama dengan klien) batasan
                    anggaran dan penjadwalan waktu; serta menyiapkan sketsa yang meliputi floor
                    plans, site plans, dan exterior views; 2. Jasa desain pembangunan yang meliputi ilustrasi presisi dari konsep desain dalam hal siting plan, bentuk dan material yang akan digunakan, struktur, sistem mekanikal dan elektrikal, dan kemungkinan biaya konstruksi; dan
                    Jasa desain akhir yang meliputi spesifikasi tertulis dan gambar yang cocok untuk digunakan sebagai detail dari pelaksanaan tender dan konstruksi, dan juga nasihat ahli kepada klien pada saat evaluasi tender.',
                    'Jasa penelitian, nasehat dan rekomendasi yang berkaitan dengan masalah arsitektural dan hal berikut:
                    1. cara untuk melaksanakan pemeliharaan bangunan, renovasi gedung, dan jasa
                    restorasi bangunan gedung;
                    2. penilaian kelayakan bangunan gedung termasuk juga didalamnya bangunan
                    yang terkena musibah kebakaran;
                    3. tata cara penilaian usia bangunan; dan
                    4. tatacara pembongkaran (demolisi) bangunan gedung
                    Tidak berkaitan dengan proyek konstruksi baru dan penambahan bangunan baru',
                    '1. Jasa desain interior seperti perencanaan dan perancangan ruangan interior untuk kebutuhan fisik, estetik dan fungsi;
                    2. Penggambaran desain untuk dekorasi interior; dan 3. Dekorasi interior termasuk penyempurnaan jendela dan gudang',
                    'Semua jasa yang membutuhkan keahlian arsitek seperti penyiapan promotional material dan presentasi serta as built drawings. Termasuk juga sebagai representasi lapangan saat fase konstruksi, pembuatan manual operasi dan lain sebagainya.',
                ],
            ],
            [
                'code' => [
                    'RE101',
                    'RE102',
                    'RE103',
                    'RE104',
                    'RE105',
                    'RE106',
                    'RE107',
                    'RE108',
                ],
                'name' => [
                    'Jasa Nasehat dan Konsultansi Rekayasa Teknik',
                    'Jasa Desain Rekayasa untuk Konstruksi Pondasi serta Struktur Bangunan',
                    'Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Air',
                    'Jasa Desain Rekayasa untuk Pekerjaan Teknik Sipil Transportasi',
                    'Jasa Desain Rekayasa untuk Pekerjaan Mekanikal dan
                    Elektrikal Dalam Bangunan',
                    'Jasa Desain Rekayasa untuk Proses Industrial dan Produksi',
                    'Jasa Nasehat dan
                    Konsultansi Jasa
                    Rekayasa Konstruksi',
                    'Jasa Desain Rekayasa Lainnya',
                ],
                'description' => [
                    'Rekomendasi, nasihat dan asistensi mengenai rekayasa teknik, termasuk didalamnya melaksanakan studi kelayakan dan dampak dari proyek contohnya antara lain:
                    1. Studi dampak topografi dan geologi dalam desain, konstruksi dan biaya dari
                    jalan, saluran pipa dan infrastruktur transportasi lainnya;
                    2. Studi dari kualitas atau kecocokan material yang akan digunakan dalam proyek
                    konstruksi dan dampaknya dalam desain, serta konstruksi dan biaya jika
                    menggunakan material yang berbeda;
                    3. Studi dampak lingkungan dari proyek konstruksi; dan
                    4. Studi keuntungan efesiensi produksi sebagai dampak dari penggunaan
                    alternatif proses, teknologi dan layout.
                    Ruang lingkup dari jasa ini tidak selalu terkait dengan proyek konstruksi namun dapat juga meliputi penilaian dari struktur bangunan dan instalasi mekanikal dan elektrikal, testimoni ahli dalam kasus litigation serta memberikan asistensi kepada pemerintah dalam penyusunan peraturan perundangan.',
                    'Jasa desain rekayasa struktur untukthe load bearing framework dari bangunan perumahan dan komersial, bangunan institusi dan industrial. Jasa desain ini meliputi satu atau kombinasi dari kegiatan berikut:
                    1. Estimasi biaya, spesifikasi dan rencana pendahuluan untuk mendefinisikan
                    konsep desain teknik;
                    2. Rencana akhir, spesifikasi dan estimasi biaya termasuk didalamnya gambar
                    kerja, spesifikasi material yang digunakan, metode instalasi, batasan waktu dan spesifikasi yang dibutuhkan untuk keperluan tender dan konstruksi serta nasihat ahli untuk klient pada saat evaluasi dan penerimaan tender; dan
                    3. Jasa yang diberikan pada saat fase konstruksi',
                    'Jasa pembuatan desain rekayasa (engineering) untuk pekerjaan rekayasa sipil keairan seperti dam, catchment basins, sistem irigasi, pekerjaan pengendalian banjir, pelabuhan, pekerjaan penyaluran air dan sanitasi serta sistem saluran air limbah industri. Jasa Desain meliputi salah satu dari kombinasi layanan berikut: perencanaan awal, estimasi biaya dan spesifikasi dalam rangka menterjemahkan konsep desain teknis; perencanaan akhir, estimasi biaya dan spesifikasi termasuk gambar teknik, spesifikasi material yang akan digunakan, metode pemasangan, batasan waktu dan spesifikasi teknis lainnya yang dibutuhkan untuk keperluan tender; layanan pada saat fase konstruksi.',
                    'Jasa pembuatan desain rekayasa (engineering) untuk pekerjaan rekayasa sipil transportasi seperti jembatan, jalan layang, dan jalan raya. Jasa Desain meliputi salah satu dari kombinasi layanan berikut: perencanaan awal, estimasi biaya dan spesifikasi dalam rangka menterjemahkan konsep desain teknis, perencanaan akhir, estimasi biaya dan spesifikasi termasuk gambar teknik, spesifikasi material yang akan digunakan, metode pemasangan, batasan waktu dan spesifikasi teknis lainnya yang dibutuhkan untuk keperluan tender layanan pada saat fase konstruksi. Termasuk di dalamnya jasa pembuatan desain structural health monitoring system untuk bentang jembatan.',
                    'Jasa pembuatan desain rekayasa (engineering) mekanikal dan elektrikal untuk sistem energi, sistem penerangan, sistem alarm kebakaran, sistem komunikasi dan sistem eletrikal lainnya untuk semua jenis bangunan dan atau sistem pemanas ruangan, ventilasi, pendingin ruangan lemari pendingin dan pemasangan mekanikal lainnya untuk semua jenis bangunan. Jasa Desain meliputi salah satu dari kombinasi layanan berikut : perencanaan awal, estimasi biaya dan spesifikasi dalam rangka menterjemahkan konsep desain teknis; perencanaan akhir, estimasi biaya dan spesifikasi termasuk gambar teknik, spesifikasi material yang akan digunakan, metode pemasangan, batasan waktu dan spesifikasi teknis lainnya yang dibutuhkan untuk keperluan tender layanan pada saat fase konstruksi.',
                    'Jasa desain teknik untuk proses produksi, prosedur dan fasilitas produksi. Termasuk didalamnya jasa desain yang berkaitan dengan metode pemotongan, handling dan transportasi logistik dan layout lokasi antara lain layout pembangunan pertambangan dan konstruksi bawah tanah, gabungan pelaksanaan sipil, instalasi mekanikal dan elektrikal lokasi pertambangan bawah tanah termasuk didalamnya hoists, kompresor, stasiun pompa, crushers, conveyor dan sistem handling limbah, prosedur recovery dari minyak dan gas, konstruksi, instalasi dan perawatan dari peralatan pengeboran, fasilitas penyimpanan . Jasa desain meliputi satu atau kombinasi dari beberapa kegiatan antara lain:
                    1. Estimasi biaya, spesifikasi dan rencana pendahuluan untuk mendefinisikan
                    konsep desain teknik;
                    2. Rencana akhir, spesifikasi dan estimasi biaya termasuk didalamnya gambar
                    kerja, spesifikasi material yang digunakan, metode instalasi, batasan waktu dan spesifikasi yang dibutuhkan untuk keperluan tender dan konstruksi serta nasihat ahli untuk klien pada saat evaluasi dan penerimaan tender; dan
                    3. Jasa yang diberikan saat fase konstruksi',
                    'Jasa konsultansi di bidang jasa konstruksi yang meliputi jasa nasihat dalam pembinaan usaha dan kelembagaan, pembinaan penyelenggaraan dan pembinaan investasi konstruksi serta pembinaan kompetensi dan keahlian Tenaga Kerja Konstruksi oleh Pemerintah baik Pemerintah Pusat maupun Pemerintah Daerah. Termasuk jasa penelitian dan pengembangan bidang konstruksi.',
                    'Jasa desain rekayasa khusus lainnya. Termasuk desain rekayasa akustik dan vibrasi, sistem pengendalian lalu-lintas, pengembangan prototype dan desain detail dari produk baru serta jasa desain rekayasa khusus lainnya.',
                ],
            ],
            [
                'code' => [
                    'PR101',
                    'PR102',
                    'PR103',
                    'PR104',
                ],
                'name' => [
                    'Jasa Perencanaan dan Perancangan Perkotaan',
                    'Jasa Perencanaan Wilayah',
                    'Jasa Perencanaan
                    dan Perancangan
                    lingkungan bangunan
                    dan lansekap',
                    'Jasa Pengembangan Pemanfaatan Ruang',
                ],
                'description' => [
                    'Jasa perencanaan tata ruang (mencakup darat, laut, udara, dan di dalam bumi) perkotaan,jasa perancangan bagian perkotaan, termasuk juga jasa pengkajian dan jasa penasehatandalam penataan ruang perkotaan',
                    'Jasa perencanaan tata ruang (mencakup darat, laut, udara, dan di dalam bumi) wilayahnasional, pulau, provinsi, kabupaten, dan kota, termasuk juga jasa pengkajian dan jasapenasehatan dalam penataan ruang wilayah yang didalamnya dapat meliputi kawasan koridor pulau, kawasan strategis nasional/provinsi/kabupaten/kota,kawasan andalan, dan kawasan permukiman termasuk ruang terbuka publik/terbuka hijau',
                    'Jasa pembuatan desain dan rencana dari aesthetic landscapinguntuk taman, lahankomersial dan permukiman. Meliputi penyiapan rencana lapangan, gambar kerja,spesifikasi dan estimasi biaya untuk pengembangan lahan yang menggambarkan konturtanah, tanaman yang akan ditanam, dan fasilitas lain seperti tempat pejalan kaki, pagar,dan area parkir. Termasuk juga didalamnya jasa inspeksi dari pekerjaan selama konstruksi, jasa pengkajian dan penasehatan penataan lingkungan bangunan dan lansekap.',
                    'Jasa perumusan kebijakan strategis operasionalisasi rencana tata ruang (mencakup darat,laut, udara, dan di dalam bumi), jasa pemrograman pemanfaatan ruang perkotaan, wilayah,kawasan/lingkungan, termasuk juga jasa manajemen mitigasi dan adaptasi bencana dankerusakan lingkungan, fasilitasi kemitraan dan pelembagaan dalam penyelenggaraanpenataan ruang.',
                ],
            ],
            [
                'code' => [
                    'AR201',
                ],
                'name' => [
                    'Jasa PengawasAdministrasi Kontrak',
                ],
                'description' => [
                    'Jasa asistensi teknis dan nasihat selama fase konstruksi untuk memastikan struktur terbangun sama dengan gambar teknis final beserta spesifikasinya. Jasa ini meliputi jasa yang disediakan baik di kantor maupun di lapangan seperti inspeksi teknis konstruksi, penyiapan laporan kemajuan, penerbitan sertifikat untuk pembayaran ke penyedia jasa pelaksana konstruksi, memberikan panduan kepada penyedia jasa dan/atau pengguna jasa dalam hal interpretasi terhadap dokumen kontrak dan jasa nasihat lain dalam aspek teknikal selama proses konstruksi.Termasuk didalamnya juga jasa yang diberikan setelah selesainya proses konstruksi yang meliputi penilaian pada konstruksi dan instruksi mengenai koreksi pengukuran yang harus dilakukan selama periode 12 bulan setelah selesainya proses konstruksi.',
                ],
            ],
            [
                'code' => [
                    'RE201',
                    'RE202',
                    'RE203',
                    'RE204',
                ],
                'name' => [
                    'Jasa Pengawas
                    Pekerjaan Konstruksi
                    Bangunan Gedung',
                    'Jasa Pengawas Pekerjaan Konstruksi Teknik Sipil Transportasi',
                    'Jasa Pengawas
                    Pekerjaan Konstruksi
                    Teknik Sipil Air',
                    'Jasa Pengawas Pekerjaan Konstruksi dan Instalasi Proses dan Fasilitas Industri',
                ],
                'description' => [
                    'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi bangunan gedung untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain. Meliputi jasa yang diberikan di kantor maupun di lapangan seperti pengkajian shop drawings, kunjungan secara periodik ke lapangan untuk mengukur progress dan kualitas pekerjaan, memberikan panduan kepada klien dan penyedia jasa pelaksana konstruksi dalam menginterpretasikan dokumen kontrak dan nasihat lain dalam hal teknikal selama proses kontruksi bangunan gedung.',
                    'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi infrastruktur sipil transportasi seperti jalan raya, jembatan, jalan bebas hambatan dan sebagainya untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain. Meliputi jasa yang diberikan di kantor maupun di lapangan seperti pengkajian shop drawings, kunjungan secara periodik kelapangan untuk mengukur progress dan kualitas pekerjaan, memberikan panduan kepada klient dan kontraktor dalam menginterpretasikan dokumen kontrak dan nasihat lain dalam hal teknikal selama proses kontruksi infrastruktur sipil transportasi.',
                    'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi infrastruktur sipil keairan seperti dam, catchment basins, sistem irigasi, pekerjaan pengendalian banjir, pelabuhan, pekerjaan penyaluran air dan sanitasi serta sistem saluran air limbah industri, untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain . Meliputi jasa yang diberikan di kantor maupun di lapangan seperti pengkajian shop drawings, kunjungan secara periodik kelapangan untuk mengukur progres dan kualitas pekerjaan, memberikan panduan kepada klient dan kontraktor dalam menginterpretasikan dokumen kontrak dan nasihat lain dalam hal teknikal selama proses kontruksi infrastruktur sipil keairan.',
                    'Jasa asistensi teknis dan nasihat selama fase pelaksanaan konstruksi dan instalasi proses dan fasilitas industri untuk memastikan pekerjaan konstruksi yang sedang dilaksanakan sudah sesuai dengan final desain, meliputi kunjungan secara periodik kelapangan untuk mengukur progres dan kualitas pekerjaan.',
                ],
            ],
            [
                'code' => [
                    'PR201',
                ],
                'name' => [
                    'Jasa Pengawas dan PengendaliPenataan Ruang',
                ],
                'description' => [
                    'Jasa pengawasan teknis penyelenggaraan penataan ruang, jasa audit pemanfaatan ruang,dan pengaturan zonasi, termasuk juga jasa pengkajian dan penasehatan dalampengawasan dan pengendalian penataan ruang.',
                ],
            ],
            [
                'code' => [
                    'SP301',
                    'SP302',
                    'SP303',
                    'SP304',
                    'SP305',
                    'SP306',
                    'SP307',
                    'SP308',
                ],
                'name' => [
                    'Jasa Pembuatan Prospektus Geologi
                    dan Geofisika',
                    'Jasa Survey bawah
                    Tanah',
                    'Jasa Survey Permukaan Tanah',
                    'Jasa Pembuatan Peta',
                    'Jasa Pengujian dan Analisa Komposisi dan Tingkat kemurnian',
                    'Jasa Pengujian dan Analisa Parameter fisikal',
                    'Jasa Pengujian dan
                    Analisa Sistem
                    Mekanikal dan
                    Elektrikal',
                    'Jasa Inspeksi
                    Teknikal',
                ],
                'description' => [
                    'Jasa konsultansi geologi, geofisika dan geo kimia yang berhubungan dengan kandungan mineral, minyak dan gas serta air bawah tanah dengan melakukan studi parameter terhadap bumi dan formasi batu dan struktur',
                    'Jasa pengambilan data pada formasi dibawah permukaan bumi dengan metode lainnya termasuk didalamnya pengukuran seismograf, gravimeter, magnetometer, dan metode survey bawah permukaan lainnya.',
                    'Jasa pengambilan informasi dari bentuk posisi dan/atau lapisan dari permukaan bumi dengan menggunakan metode lain, termasuk transit, fotogrameter dan survey hydrograf untuk tujuan persiapan pembuatan peta.',
                    'Terdiri dari perisapan dan revisi dari segala jenis peta (jalan, cadastral, topografi, dan planimeter).',
                    'Jasa pengujian dan analisa dari parameter kimia dan biologi material seperti udara, air, dan limbah (limbah rumah tangga dan industri), minyak, metal, mineral dan zat kimia. Termasuk didalamnya jasa pengujian dan analisa yang berhubungan dengan mikrobiologi, biokimiawi, bakteriologi, dan sebagainya.',
                    'Jasa pengujian dan analisa parameter fisikal seperti kekuatan, keringkihan, konduktivitas elektriksitas dan radioaktivitas dari material seperti metal, plastik, tekstil, kayu,kaca, beton, dan material lainnya. Termasuk didalamnya pengujian daya tarik, kekerasan, impact resistance, ketahanan fatique, serta efek temperatur tinggi.',
                    'Jasa Pengujian dan analisa dari karakteristik permesinan lengkap, motor, mobil, peralatan dan penerapan, peralatan komunikasi, dan peralatan lainnya yang berhubungan dengan mekanikal dan elektrikal.',
                    'Jasa Pengujian dan Analisa dari teknikalyang tidak mempengaruhi objek yang dilakukan pengujian, Termasuk didalamnya radiografi, magnetic, dan pengujian ultrasonic dari komponen mesin dan struktur yang dilakukan untuk mengidentifikasi cacat produk. Pengujian ini dilakukan langsung di lapangan.',
                ],
            ],
            [
                'code' => [
                    'KL401',
                    'KL402',
                    'KL403',
                    'KL404',
                    'KL405',
                    'KL406',
                    'KL407',
                    'KL408',
                    'KL409',
                ],
                'name' => [
                    'Jasa Konsultansi Lingkungan',
                    'Jasa Konsultansi Estimasi Nilai Lahan dan Bangunan',
                    'Jasa Manajemen Proyek Terkait Konstruksi Bangunan',
                    'Jasa Manajemen
                    Proyek Terkait
                    Konstruksi Pekerjaan
                    Teknik Sipil
                    Transportasi',
                    'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan Teknik Sipil Keairan',
                    'Jasa Manajemen Proyek Terkait Konstruksi Pekerjaan Teknik Sipil Lainnya',
                    'Jasa Manajemen
                    Proyek Terkait
                    Konstruksi Pekerjaan konstruksi proses dan fasilitas industrial',
                    'Jasa Manajemen
                    Proyek Terkait
                    Konstruksi Pekerjaan Sistem kendali lalu lintas',
                    'Jasa Rekayasa (Engineering) terpadu'
                ],
                'description' => [
                    'Jasa konsultansi yang mencakup kegiatan pengolahan air bersih, penyehatan lingkungan permukiman, serta nasihat pengelolaan persampahan.',
                    'Jasa konsultansi yang dengan metode tertentu melakukan estimasi terhadap nilai dari suatu lahan dan/atau bangunan (baik bangunan gedung maupun bangunan sipil). Termasuk didalamnya memberikan rekomendasi perencanaan pembebasan lahan untuk proyek konstruksi.',
                    'Jasa konstruksi menyeluruh di bidang sipil bangunan gedung antara lain bangunan hunian, dan bangunan bukan hunian seperti bangunan industri, pertanian dan komersial dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                    'Jasa konstruksi menyeluruh di bidang sipil transportasi antara lain jalan bebas hambatan, jalan raya, jalan, jalan kereta api, landasan pacu pesawat, jembatan, jalan layang, terowongan dan jalan bawah tanah, dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                    'Jasa konstruksi menyeluruh di bidang sipil keairan antara lain pelabuhan, saluran air, bendungan, irigasi dan pekerjaan air lainnya dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                    'Jasa konstruksi menyeluruh di bidang sipil lainnya antara lain pemipaan, kabel komunikasi dan listrik, jarak jauh, pemipaan lokal dan kabel dan pekerjaan yang terkait olahraga outdoor dan fasilitas rekreasi dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                    'Jasa konstruksi menyeluruh di bidang konstruksi industri dan proses antara lain pertambangan, konstruksi pembangkit tenaga listrik, kimia dan fasilitas terkait, konstruksi untuk manufaktur, dan otomasi proses industri dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                    'Jasa konstruksi menyeluruh di bidang sistem kontrol lalu lintas antara lain sistem kontrol lalu lintas untuk transportasi darat, udara dan laut dimana tanggungjawab atas keberhasilan penyelesaian proyek atas nama pengguna jasa (klien), termasuk didalamnya pengorganisasian pembiayaan dan desain, undangan tender, dan pelaksanaan manajemen termasuk fungsi-fungsi kontrol.',
                    'Jasa enjiniring terpadu untuk pembangunan proyek-proyek konstruksi dengan layanan yang diberikan secara terpadu meliputi:
                    1. perencanaan dan studi pra-investasi;
                    2. pembuatan desain awal dan desain final;
                    3. pembuatan estimasi biaya dan jadwal pelaksanaan proyek;
                    4. pelaksanaan inspeksi dan penerimaan pekerjaaan sesuai kontrak ; dan
                    5. pelayanan teknis, seperti pemilihan dan pelatihan personil dan penyediaan
                    operasi serta pemeliharaan manual beserta jasa-jasa teknik lain yang
                    diberikan kepada klien.
                    Layanan enjiniring terpadu dapat diberikan untuk seluruh pekerjaan berikut:
                    1. Jalan bebas hambatan (highways), jalan raya (streets), jalan (roads), jalan kereta api, landas pacu pesawat;
                    2. Jembatan, jalan layang, terowongan dan jalan bawah tanah;
                    3. Pelabuhan, saluran air, bendungan, irigasi dan pekerjaan air lainnya;
                    4. Pemipaan, kabel komunikasi dan jalur tenaga (power lines) jarak jauh;
                    5. Pemipaan lokal dan kabel dan pekerjaan yang terkait;
                    6. Fasilitas olah raga outdoor dan fasilitas rekreasi;
                    7. Konstruksi bangunan hunian dan bangunan bukan hunian seperti bangunan
                    industri, komersial atau pertanian
                    8. Industrial plant dan proses serta manufaktur;
                    9. Konstruksi pembangkit tenaga (power plant); dan
                    10. Bangunan modifikasi dari bangunan diatas',

                ],
            ],

            // BANGUNAN GEDUNG
            [
                'code' => [
                    'BG001',
                    'BG002',
                    'BG003',
                    'BG004',
                    'BG005',
                    'BG006',
                    'BG007',
                    'BG008',
                    'BG009',
                ],
                'name' => [
                    'Jasa Pelaksana Konstruksi Bangunan Hunian Tunggal dan Kopel',
                    'Jasa Pelaksana Konstruksi Bangunan Multi atau Banyak Hunian',
                    'Jasa Pelaksana
                    Konstruksi Bangunan Gudang dan Industri',
                    'Jasa Pelaksana
                    Konstruksi Bangunan
                    Komersial',
                    'Jasa Pelaksana konstruksi bangunan hiburan publik',
                    'Jasa Pelaksana Konstruksi Bangunan Hotel, Restoran , dan Bangunan Serupa Lainnya',
                    'Jasa Pelaksana Konstruksi Bangunan Pendidikan',
                    'Jasa Pelaksana Konstruksi Bangunan Kesehatan',
                    'Jasa Pelaksana
                    Konstruksi Bangunan
                    Gedung Lainnya',
                ],
                'description' => [
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, serta peningkatan) dari bangunan perumahan yang terdiri dari satu atau dua tempat tinggal maksimum 2 lantai.',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan serta peningkatan) dari bangunan perumahan bertingkat tinggi yang lebih dari 2 lantai.',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari bangunan gudang dan bangunan Industri',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari bangunan dengan tujuan komersial seperti bangunan perkantoran, bangunan BANK, Garasi parkir, stasiun pengisian bahan bakar, terminal kendaraan umum serta bangunan stasiun kereta api, bangunan pusat perbelanjaan',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari bangunan hiburan publik seperti bioskop, hall konser, nightclubs.',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari hotel, motel, restoran dan bangunan yang serupa lainnya.',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari bangunan pendidikan seperti sekolah, universitas, perpustakaan dan museum termasuk juga laboratorium penelitian',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari bangunan kesehatan seperti rumah sakit dan sanotarium',
                    'Pekerjaan Pelaksanaan (termasuk didalamnya pembangunan baru, penambahan, peningkatan serta pekerjaan renovasi) dari bangunan lainnya seperti, rumah ibadah dan penjara.',

                ],
            ],
            [
                'code' => [
                    'SI001',
                    'SI002',
                    'SI003',
                    'SI004',
                    'SI005',
                    'SI006',
                    'SI007',
                    'SI008',
                    'SI009',
                    'SI010',
                    'SI011',
                    'SI012',
                ],
                'name' => [
                    'JJasa Pelaksana
                    Konstruksi Saluran
                    Air, Pelabuhan, Dam, dan Prasarana Sumber Daya Air Lainnya',
                    'Jasa Pelaksana
                    Konstruksi Instalasi Pengolahan Air Minum
                    dan Air Limbah Serta Bangunan Pengolahan Sampah.',
                    'Jasa Pelaksana
                    Konstruksi Jalan Raya
                    ( kecuali Jalan
                    Layang),Jalan, Rel
                    Kereta Api, dan
                    Landas Pacu Bandara',
                    'Jasa Pelaksana Konstruksi Jembatan, Jalan Layang, Terowongan dan Subways',
                    'Jasa Pelaksana Konstruksi Perpipaan Air Minum Jarak Jauh',
                    'Jasa Pelaksana Konstruksi Perpipaan Air Limbah Jarak Jauh',
                    'Jasa Pelaksana
                    Konstruksi Perpipaan
                    Minyak dan Gas Jarak
                    Jauh',
                    'Jasa Pelaksana
                    Konstruksi Perpipaan
                    Air Minum Lokal',
                    'Jasa Pelaksana Konstruksi Perpipaan Air Limbah Lokal',
                    'Jasa Pelaksana Konstruksi Perpipaan Minyak dan Gas Lokal',
                    'Jasa pelaksana Konstruksi bangunan stadion untuk olahraga outdoor',
                    'Jasa Pelaksana KonstruksiBangunan Fasilitas Olah Raga
                    Indoor dan Fasilitas Rekreasi',

                ],
                'description' => [
                    '1. Pekerjaan pelaksanaan pembangunan, pemeliharaan dan perbaikan bangunan bendungan (dam), bendung (weir), embung, pintu air, talang, check dam, tanggul dan saluran pengendali banjir termasuk drainase perkotaan beserta bangunan pelengkapnya, tanggul laut, krib, viaduk dan sarana dan/atau
                    prasarana sumber daya air lainnya;
                    2. Pekerjaan pelaksanaan pembangunan, pemeliharaan dan perbaikan konstruksi
                    jaringan saluran air, sistem irigasi (kanal), reservoir (waduk) dan drainase
                    irigasi; dan
                    3. Pekerjaan pelaksanaan pembangunan, pemeliharaan dan perbaikan dermaga,
                    sarana pelabuhan, penahan gelombang dan sejenisnya. Termasuk konstruksi jalan air atau terusan, pelabuhan dan sarana jalur sungai, dok (pangkalan), lock (panama canal lock, Hoover Dam) dan lain-lain.',
                    'Pekerjaan pelaksanaan pembangunan, pemeliharaan dan perbaikan instalasi pengolahan air minum, bangunan menara air dan reservoir air beserta bangunan pelengkap air minum lainnya, instalasi pengolahan air limbah beserta bangunan pelengkap air limbah lainnya, bangunan Tempat Pembuangan Akhir Sampah beserta bangunan pelengkapnya.',
                    'Pekerjaan pelaksanaan pembangunan, peningkatan, pemeliharaan dan perbaikan jalan, jalan raya (kecuali Jalan layang) dan jalan tol termasuk juga jalan untuk pejalan kaki, rel kereta api, dan landas pacu bandara.',
                    '1. Pekerjaan pelaksanaan pembangunan, peningkatan, pemeliharaan dan perbaikan jembatan dan jalan layang; dan
                    2. Pelaksanaan pembangunan, peningkatan, pemeliharaan dan perbaikan bangunan terowongan di bawah permukaan air, di bukit atau pegunungan dan di bawah permukaan tanah.',
                    'Pekerjaan pelaksanaan instalasi, peningkatan, pemeliharaan dan perbaikan jaringan pipa untuk distribusi air bersih jarak jauh antar pulau dan atau di bawah permukaan laut.',
                    'Pekerjaan pelaksanaan instalasi, peningkatan, pemeliharaan dan perbaikan jaringan pipa untuk distribusi air limbah jarak jauh antar pulau dan atau di bawah permukaan laut.',
                    'Pekerjaan pelaksanaan instalasi, peningkatan, pemeliharaan dan perbaikan pipa jaringan untuk distribusi minyak dan gas jarak jauh antar pulau dan atau di bawah permukaan laut.',
                    'Pekerjaan pelaksanaan instalasi, peningkatan, pemeliharaan dan perbaikan jaringan pipa untuk distribusi air minum yang bersifat lokal dan untuk jarak yang dekat.',
                    'Pekerjaan pelaksanaan instalasi, peningkatan, pemeliharaan dan perbaikan jaringan pipa untuk distribusi air limbah yang bersifat lokal dan untuk jarak yang dekat.',
                    'pekerjaan pelaksanaan instalasi, peningkatan, pemeliharaan dan perbaikan jaringan pipa untuk distribusi air minyak dan gas yang bersifat lokal dan untuk jarak yang dekat.',
                    'Pekerjaan pelaksana untuk konstruksi stadium dan olahraga lapangan yang biasanya dimainkan di tempat terbuka (open air) seperti sepakbola, baseball, rugby, lintasan balap mobil dan motor serta lintasan pacu kuda.',
                    'Pekerjaan pelaksana untuk olahraga lainnya serta instalasi fasilitas rekreasi, olah raga yang dimaksud lebih banyak merupakan olahraga indoor yang membutuhkan ruang yang lebih kecil untuk penonton seperti lapangan basket, hockey, lapangan tenis, hall senam, dan ring tinju dan fasilitas taman rekreasi.'
                ],
            ],
            [
                'code' => [
                    'MK001',
                    'MK002',
                    'MK003',
                    'MK004',
                    'MK005',
                    'MK006',
                    'MK007',
                    'MK008',
                    'MK009',
                    'MK010',
                    'EL001',
                    'EL002',
                    'EL003',
                    'EL004',
                    'EL005',
                    'EL006',
                    'EL007',
                    'EL008',
                    'EL009',
                    'EL010',
                    'EL011',
                ],
                'name' => [
                    'Jasa pelaksana
                    konstruksi
                    pemasangan
                    pendingin udara (Air
                    Conditioner), pemanas dan ventilasi',
                    'Jasa Pelaksana konstruksi Pemasangan Pipa Air (Plumbing) dalam Bangunan dan Salurannya',
                    'Jasa Pelaksana Konstruksi Pemasangan Pipa Gas dalam Bangunan',
                    'Jasa Pelaksana Konstruksi Insulasi dalam Bangunan',
                    'Jasa Pelaksana
                    Konstruksi
                    Pemasangan Lift dan tangga berjalan',
                    'Jasa Pelaksana Konstruksi Pertambangan dan Manufaktur',
                    'Jasa Pelaksana Konstruksi Instalasi Thermal, Bertekanan, Minyak, Gas, Geothermal (Pekerjaan Rekayasa)',
                    'Jasa Pelaksana
                    Konstruksi Instalasi
                    Alat Angkut dan Alat
                    Angkat',
                    'Jasa Pelaksana
                    Konstruksi Instalasi
                    Perpipaan, Gas,
                    Energi (Pekerjaan rekayasa)',
                    'Jasa Pelaksana Konstruksi Instalasi Fasilitas Produksi, Penyimpanan Minyak dan Gas( Pekerjaan Rekayasa)',
                    'Jasa Pelaksana Konstruksi Instalasi Pembangkit Tenaga Listrik Semua Daya',
                    'Jasa Pelaksana
                    Konstruksi Instalasi Pembangkit Tenaga
                    Listrik Daya
                    Maksimum 10MW',
                    'Jasa Pelaksana
                    Konstruksi Instalasi
                    Pembangkit Tenaga
                    Listrik Energi Baru dan terbarukan',
                    'Jasa Pelaksana Konstruksi Instalasi Jaringan Transmisi Tenaga Listrik Tegangan Tinggi/ Ekstra Tegangan Tinggi',
                    'Jasa Pelaksana Konstruksi Jaringan Transmisi Telekomunikasi dan/atau Telepon',
                    'Jasa Pelaksana
                    Konstruksi Jaringan
                    Distribusi Tenaga
                    Listrik Tegangan
                    Menengah',
                    'Jasa Pelaksana
                    Konstruksi Instalasi Jaringan Distribusi Tenaga Listrik Tegangan Rendah',
                    'Jasa Pelaksana Konstruksi Instalasi Jaringan Distribusi Telekomunikasi dan/atau Telepon',
                    'Jasa Pelaksana Konstruksi Instalasi Sistem Kontrol dan Instrumentasi',
                    'Jasa Pelaksana
                    Konstruksi Instalasi
                    Tenaga Listrik Gedung
                    dan Pabrik',
                    'Jasa Pelaksana Konstruksi Instalasi Elektrikal Lainnya',
                ],
                'description' => [
                    'Pekerjaan pelaksana pemasangan dan perawatan yang meliputi pemanasan elektrik maupun non-elektrik, ventilasi, lemari pendingin, atau peralatan AC, pekerjaan ducting dan pekerjaan metal lebaran yang dilakukan secara terintegrasi dari pekerjaan tersebut.',
                    'Pekerjaan pelaksana pemasangan dan perawatan yang meliputi: 1. sistem perpipaan utama air panas dan dingin, instalasi sprinkler, pipa air kotor,
                    pipa drain; 2. perlengkapan saniter; dan
                    sistem pemadam kebakaran',
                    'Pekerjaan pelaksana pemasangan dan perawatan pipa untuk gas, oksigen di rumah sakit dan peralatan pengoperasian gas lainnya',
                    'Pekerjaan pelaksana pemasangan dan perawatan yang meliputi: 1. insulasi thermal termasuk bahan isolasi penahan panas untuk dinding luar; 2. insulasi thermal untuk pipa air panas dan dingin, ketel uap dan saluran
                    pembuangan; 3. insulasi suara; dan
                    insulasi anti kebakaran',
                    'Pekerjaan konstruksi pemasangan lift dan eskalator serta jalan pejalan kaki yang dapat bergerak juga termasuk pekerjaan konstruksi perlengkapan keselamatan dari kebakaran (contohnya tangga darurat).',
                    'Pekerjaan pelaksana pemasangan dan perawatan fasilitas pertambangan dan manufaktur termasuk seperti loading and discharging stations, winding shafts, chemical plants,iron foundaries, blast furnaces dan coke oven',
                    'Pekerjaan pelaksana pemasangan dan perawatan dari: 1. anjungan lepas pantai (platform); dan 2. fasilitas produksi, penyimpanan minyak dan gas lainnya',
                    'Pekerjaan pelaksana pemasangan dan perawatan dari konstruksi alat angkut dan angkat serta conveyor.',
                    'Pekerjaan pelaksana pemasangan dan perawatan dari: 1. pipa minyak, gas dan energi di darat; dan 2. pipa minyak, gas dan energi di bawah laut.',
                    'Pekerjaan pelaksana pemasangan dan perawatan dari: 1.fabrikasi fasilitas produksi, penyimpanan minyak dan gas didarat dan lepas
                    pantai; 2. fabrikasi bejana tekan (pressure vessel) dan tangki; 3. fabrikasi boiler; dan 4. fabrikasi module.',
                    'Pekerjaan pemasangan dan perawatan elektromekanik dan kelistrikan pembangkit tenaga listrik semua daya.',
                    'Jasa pelaksana instalasi dan perawatan elektromekanik dan instalasi kelistrikan pembangkit tenaga listrik dengan daya maksimum 10 MW / unit.',
                    'Jasa pelaksana instalasi dan perawatan pembangkit tenaga listrik energi baru dan terbarukan antara lain : surya, angin (bayu), micro hydro, gelombang laut',
                    '1.Jasa pelaksana instalasi dan perawatan jaringan transmisi tenaga listrik tegangan tinggi / ektra tegangan tinggi termasuk instalasi gardu induk; dan
                    2.Jasa pelaksana instalasi dan perawatan jaringan transmisi tenaga listrik dibawah atau diatas tanah dan dibawah lautan.',
                    '1. Jasa pelaksana instalasi dan perawatan jaringan transmisi telekomunikasi dan atau telepon diatas permukaan tanah, termasuk pekerjaan untuk menara transmisi telekomunikasi; dan
                    2. Jasa pelaksana instalasi dan perawatan jaringan transmisi telekomunikasi dan atau telepon dibawah tanah atau dibawah lautan',
                    'Jasa pelaksana instalasi dan perawatan jaringan distribusi tenaga listrik tegangan menengah, termasuk untuk jalur listrik kereta api, instalasi listrik gardu hubung dan gardu-gardu distribusi',
                    'Jasa pelaksana instalasi dan perawatan jaringan distribusi tenaga listrik tegangan rendah dan penerangan jalan umum.',
                    '1. Jasa pelaksana instalasi dan perawatan jaringan distribusi telekomunikasi dan/ atau telepon termasuk jasa pelaksana untuk menara distribusi telekomunikasi;
                    2. Jasa Pelaksana instalasi dan perawatan stasiun telekomunikasi dan antena untuk distribusi telekomunikasi; dan Jasa Pelaksana instalasi dan perawatan untuk jalur kabel televise untuk dibawah permukaan tanah.',
                    'Jasa pelaksana pemasangan instalasi kontrol dan instrumentasi untuk sistem pengendali tenaga listrik.',
                    '1. Jasa pelaksanan instalasi dan perawatan listrik di dalam dan diluar gedung, pabrik maupun jaringan konstruksi;
                    2. Jasa pelaksana instalasi dan perawatan listrik dan peralatan untuk sistem tenaga listrik darurat;
                    3. Jasa pelaksana instalasi dan perawatan alat pembatas daya listrik dan meteran listrik; 4. Jasa pelaksana instalasi dan perawatan alarm kebakaran;
                    5. Jasa pelaksana instalasi dan perawatan alarm pencurian;
                    6. Jasa pelaksana instalasi dan perawatan antena segala Macam type antena
                    termasuk antena satelit dan jalur televisi kabel didalam gedung;
                    7. Jasa pelaksanainstalasi dan perawatanpenangkalpetir; dan
                    Jasa pelaksana instalasi dan perawatan listrik Khusus seperti instalasi listrik kapal, instalasi Listrik tahan api dan sejenisnya.',
                    'Jasa pelaksana pemasangan dan perawatan untuk sistem penerangan dan tanda untuk jalan, rel kereta api, bandara, pelabuhan dan sejenis.',
                ],
            ],
            [
                'code' => [
                    'PL001',
                    'PL002',
                    'PL003',
                    'PL004',
                ],
                'name' => [
                    'Jasa Penyewaan Alat Konstruksi dan Pembongkaran
                    Bangunan atau
                    Pekerjaan Sipil
                    Lainnya dengan
                    Operator',
                    'Jasa Pelaksana
                    Perakitan dan Pemasangan Konstruksi Prafabrikasi untuk Konstruksi Bangunan Gedung',
                    'Jasa Pelaksana Perakitan dan Pemasangan Konstruksi
                    Prafabrikasi untuk Konstruksi Jalan dan Jembatan Serta Rel Kereta Api',
                    'Jasa Pelaksana
                    Perakitan dan
                    Pemasangan
                    Konstruksi
                    Prafabrikasi untuk
                    Konstruksi Prasarana Sumber Daya Air, Irigasi, Dermaga, Pelabuhan, Persungaian, Pantai serta Bangunan Pengolahan Air Bersih, Limbah dan Sampah (Insinerator)'
                ],
                'description' => [
                    'Jasa peminjaman dan penyewaan yang berhubungan dengan peralatan dengan operator untuk konstruksi atau penghancuran dan jasa operasional yang disediakan dengan operator.',
                    'Pekerjaan khusus pemasangan bangunan konstruksi prafabrikasi yang langsung dilakukan di lokasi konstruksi yang bahan utamanya dari beton untuk beberapa bagian pracetak dari bangunan gedung kecuali pekerjaan pemasangan komponen pracetak baja.',
                    'Pekerjaan khusus pemasangan bangunan konstruksi prafabrikasi yang langsung dilakukan di lokasi konstruksi yang bahan utamanya dari beton untuk beberapa bagian pracetak dari konstruksi jalan, jembatan dan rel kereta api kecuali pekerjaan pemasangan komponen pracetak baja',
                    'Pekerjaan khusus pemasangan bangunan konstruksi prafabrikasi yang langsung dilakukan dilokasi konstruksi yang bahan utamanya dari beton untuk beberapa bagian pracetak dari konstruksi prasarana sumber daya air, irigasi, dermaga, pelabuhan, persungaian, pantai serta bangunan pengolahan air bersih dan limbah, kecuali pekerjaan pemasangan komponen pracetak baja.'
                ],
            ],
            [
                'code' => [
                    'SP001',
                    'SP002',
                    'SP003',
                    'SP004',
                    'SP005',
                    'SP006',
                    'SP007',
                    'SP008',
                    'SP009',
                    'SP010',
                    'SP011',
                    'SP012',
                    'SP013',
                    'SP014',
                    'SP015',
                    'SP016',
                ],
                'name' => [
                    'Pekerjaan Penyelidikan Lapangan',
                    'Pekerjaan Pembongkaran',
                    'Pekerjaan Penyiapan dan Pematangan Tanah/Lokasi',
                    'Pekerjaan Tanah, Galian dan Timbunan',
                    'Pekerjaan Persiapan Lapangan untuk Pertambangan',
                    'Pekerjaan Perancah',
                    'Pekerjaan Pondasi, Termasuk Pemancangannya',
                    'Pekerjaan Pengeboran Sumur Air Tanah Dalam.',
                    'Pekerjaan Atap dan Kedap Air (waterproofing)',
                    'Pekerjaan Beton',
                    'Pekerjaan Baja dan Pemasangannya, Termasuk Pengelasan',
                    'Pekerjaan Pemasangan Batu',
                    'Pekerjaan Konstruksi Khusus Lainnya',
                    'Pekerjaan Pengaspalan dengan Rangkaian Peralatan Khusus',
                    'Pekerjaan Lansekap/ Pertamanan',
                    'Pekerjaan Perawatan Bangunan Gedung',
                ],
                'description' => [
                    'Pekerjaan penyelidikan lapangan bertujuan mengidentifikasi lokasi yang tepat untuk proyek konstruksidan untuk pekerjaan demarkasi, contohnya demarkasi dari suatu area lokal dimana satu atau lebih tahapan atau proses besar dari pekerjaan konstruksi sedang berjalan.',
                    'Pekerjaan penghancuran bangunan atau struktur lainnya seperti jalan dan jalan layang, mencakup juga penjualan material yang didapat dari hasil operasi penghancuran',
                    'Pekerjaan penyiapan yang bertujuan agar lahan siap untuk dipergunakan untuk pekerjaan konstruksi selanjutnya, termasuk didalamnya blasting, testdrilling, dan pekerjaan pemindahan batu-batuan.',
                    'Pekerjaan penggalian dan penimbunan, pekerjaan pemindahan tanah, grading of construction sites, trench digging.',
                    'Pekerjaan terowongan dan pembangunan lainnya serta pekerjaan persiapan untuk properti mineral dan situsnya, kecuali untuk minyak dan gas. Contohnya pelayanan insidental konstruksi untuk pertambangan minyak dan gas',
                    'Pemasangan perancah bangunan dan pekerjaan dismantling.',
                    'Pekerjaan konstruksi khusus pondasi dan pekerjaan pile driving serta pekerjaan lain yang berkaitan.',
                    'Pekerjaan konstruksi khusus yang melibatkan pengeboran dan penggalian sumber air, instalasi dan pekerjaan perbaikan dari pompa sumur dan sistem pemipaan.',
                    'Pekerjaan konstruksi khusus yang melibatkan instalasi atap, guttering dan spouting, roof shingling dan pekerjaan atap metal. Pekerjaan pengecatan atap, termasuk didalamnya pekerjaan water-proofing untuk bangunan.',
                    'Pekerjaan konstruksi khusus yang melibatkan pembetonan, concrete pouring dan pekerjaan concretelainnya termasuk didalamnya aspal dan semen portland pada proyek konstruksi',
                    'Pekerjaan konstruksi khusus yang meliputi penekukan baja, pekerjaan konstruksi terhadap rangka baja, pekerjaan pemasangan komponen baja untuk bangunan ataupun untuk struktur lain seperti jembatan, crane yang bekerja pada ketinggian, menara transmisi listrik serta pekerjaan reinforcing baja baik yang dibeli atau diproduksi sendiri termasuk juga pekerjaan pengelasan baja',
                    'Pekerjaan konstruksi khusus yang melibatkan pemasangan blok batu, pengesetan batu dan pekerjaan batu lainnya.',
                    'Pekerjaan konstruksikhusus lain seperti penggalian kuburan dan perpindahan rumah.',
                    'Pekerjaan Pengaspalan dengan menggunakan peralatan produksi campuran aspal termasuk transportasi hasil campuran aspal hingga penggelaran dan pemadatan dengan peralatan khusus di lokasi pekerjaan.',
                    'Pekerjaan khusus pembuatan taman, seperti taman kota, tanaman dan pohon pelindung jalan.',
                    'Pekerjaan pemeliharaan bangunan gedung, tidak termasuk pekerjaan yang melakukan perubahan terhadap struktur bangunan.',
                ],
            ],
            [
                'code' => [
                    'KT001',
                    'KT002',
                    'KT003',
                    'KT004',
                    'KT005',
                    'KT006',
                    'KT007',
                    'KT008',
                    'KT009',
                    'KT010',
                    'KT011',
                ],
                'name' => [
                    'Pekerjaan Kaca dan Pemasangan Kaca Jendela',
                    'Pekerjaan Plesteran',
                    'Pekerjaan Pengecatan',
                    'Pekerjaan Pemasangan Keramik Lantai dan Dinding',
                    'Pekerjaan Pemasangan Lantai Lain, Penutupan Dinding dan Pemasangan Wall paper',
                    'Pekerjaan Kayu dan atau penyambungan Kayu dan Material Lain',
                    'Pekerjaan Dekorasi dan Pemasangan Interior',
                    'Pekerjaan pemasangan ornamen',
                    'Pekerjaan Pemasangan Gipsum',
                    'Pekerjaan Pemasangan plafon akustik (accoustic ceiling)',
                    'Pemasangan curtain wall',
                ],
                'description' => [
                    'Pekerjaan konstruksi khusus material kaca, cermin, dan produk-produk berbahan kaca, serta pekerjaan instalasi jendela kaca.',
                    'Pekerjaan konstruksi khususdari plester interior dan exterior ataustucco dan pekerjaan dry wall yang berhubungan deingan instalasi dinding papan, yang biasanya adalah bahan gypsum.',
                    'Pekerjaan konstruksi khusus pengecatan dan pekerjaan konstruksi yang berhubungan dengan interior dan exterior bangunan dan pekerjaan pengecatan dari struktur berat (rekayasa teknik). Tidak termasuk pengecatan atap bangunan',
                    'Pekerjaan konstruksi khusus pemasangan dan pegesetan keramik, dinding beton, dinding potongan batu, serta lantai ubin.',
                    'Pekerjaan konstruksi khusus pemasangan karpet, linoleum, ubin aspal, lantai elastis, parquet, dan lantai berbahan kayu keras lainnya.',
                    'Pekerjaan konstruksi khusus yang berhubungan dengan pekerjaan pengrajin kayu, pembentukan bentuk kayu dan pemasanganlemari di lokasi konstruksi.',
                    'Pekerjaan konstruksi khusus pemasangan terazzo, interior marbel, granit dan pekerjaan batu tulis.',
                    'Pekerjaan konstruksi khusus untuk komponen logam lembaran fabrikasi khusus, pekerjaan dekorasi besi dan baja, serta pengerjaan ornament dan arsitektur logam',
                    'Pekerjaan konstruksi khusus untuk komponen panel gypsum seperti pemasangan dinding partisi dalam bangunan gedung yang menggunakan panel gypsum, pemasangan plafon dalam bangunan gedung yang menggunakan panel gypsum.',
                    'Pekerjaan konstruksi khusus untuk pemasangan plafon akustik pada ruangan di dalam bangunan gedung. Bahan penutup plafond akustik berbentuk panel yang diletakkan atau dijepit pada rangka metal yang bentuk grid (kotak-kotak).',
                    'Pekerjaan konstruksi khusus untuk menutup sisi-sisi bagian luar gedung bertingkat. Bahan penutup bangunan merupakan bahan non struktural dan ringan, yang berfungsi sebagai pemisah antara bagian dalam dan luar gedung. Pemasangan curtain wall padaumumnya terdiri dari rangka allumunium dan bahan penutup berupa kaca, panel metal atau GRC (Glassfibre Reinforce Concrete)',
                ],
            ],
            [
                'code' => [
                    'TI501',
                    'TI502',
                    'TI503',
                    'TI504',
                    'TI505',
                ],
                'name' => [
                    'Jasa Terintegrasi Untuk Infrastruktrur Tranportasi',
                    'Jasa Terintegrasi Untuk Konstruksi Sumber Daya Air, Penyaluran Air dan Pekerjaan Sanitasi',
                    'Jasa Terintegrasi Untuk Konstruksi Manufaktur',
                    'Jasa Terintegrasi Untuk Konstruksi Fasilitas Minyak dan Gas',
                    'Jasa Terintegrasi Untuk Konstruksi Bangunan Gedung',
                ],
                'description' => [
                    'Jasa konstruksi terintegrasi untuk konstruksi dari infrastruktur transportasi (turnkey projects). Termasuk didalamnya perencanaan dan studi sebelum investasi, pembuatan pre-elimary dan final desain, estimasi biaya, penjadwal konstruksi, inspeksi dan penerimaan dari kontrak termasuk jasa teknikal seperti seleksi dan pelatihan personiil dan operasional dan pembuatan manual pemiliharaan dan jasa teknikal lainnya yang disediakan untuk klient yang membentuk jasa perencanaan, pelaksanaan dan pengawasan utuh untuk proyek terima jadi termasuk didalamnya kegiatan yang dilakukan secara terintegrasi antara perencanaan, pengadaan, dan pelaksanaan terima jadi (engineering, procurement, construction).',
                    'Jasa konstruksi terintegrasi untuk konstruksi dari infrastruktur keairan dan sanitasi. Termasuk didalamnya perencanaan dan studi sebelum investasi, pembuatan pre-elimary dan final desain, estimasi biaya, penjadwal konstruksi, inspeksi dan penerimaan dari kontrak termasuk jasa teknikal seperti seleksi dan pelatihan personiil dan operasional dan pembuatan manual pemiliharaan dan jasa teknikal lainnya yang disediakan untuk klient yang membentuk jasa perencanaan, pelaksanaan dan pengawasan utuh untuk proyek terima jadi termasuk didalamnya kegiatan yang dilakukan secara terintegrasi antara perencanaan, pengadaan, dan pelaksanaan terima jadi (engineering, procurement, construction).',
                    'Jasa konstruksi terintegrasi untuk konstruksi dari fasilitas manufaktur. Termasuk didalamnya perencanaan dan studi sebelum investasi, pembuatan pre- elimary dan final desain, estimasi biaya, penjadwal konstruksi, inspeksi dan penerimaan dari kontrak termasuk jasa teknikal seperti seleksi dan pelatihan personiil dan operasional dan pembuatan manual pemiliharaan dan jasa teknikal lainnya yang disediakan untuk klient yang membentuk jasa perencanaan, pelaksanaan dan pengawasan utuh untuk proyek terima jadi termasuk didalamnya kegiatan yang dilakukan secara terintegrasi antara perencanaan, pengadaan, dan pelaksanaan terima jadi (engineering, procurement, construction).',
                    'Jasa Konstruksi terintegrasi Untuk Konstruksi Fasilitas Minyak dan Gas. Termasuk didalamnya perencanaan dan studi sebelum investasi, pembuatan pre- elimary dan final desain, estimasi biaya, penjadwal konstruksi, inspeksi dan penerimaan dari kontrak termasuk jasa teknikal seperti seleksi dan pelatihan personiil dan operasional dan pembuatan manual pemiliharaan dan jasa teknikal lainnya yang disediakan untuk klient yang membentuk jasa perencanaan, pelaksanaan dan pengawasan utuh untuk proyek terima jadi termasuk didalamnya kegiatan yang dilakukan secara terintegrasi antara perencanaan, pengadaan, dan pelaksanaan terima jadi (engineering, procurement, construction).',
                    'Jasa Konstruksi Terintegrasi Untuk Konstruksi Bangungan Gedung. Termasuk didalamnya perencanaan dan studi sebelum investasi, pembuatan pre-elimary dan final desain, estimasi biaya, penjadwal konstruksi, inspeksi dan penerimaan dari kontrak termasuk jasa teknikal seperti seleksi dan pelatihan personiil dan operasional dan pembuatan manual pemiliharaan dan jasa teknikal lainnya yang disediakan untuk klient yang membentuk jasa perencanaan, pelaksanaan dan pengawasan utuh untuk proyek terima jadi termasuk didalamnya kegiatan yang dilakukan secara terintegrasi antara perencanaan, pengadaan, dan pelaksanaan terima jadi (engineering, procurement, construction).',
                ],
            ],

        ];

        foreach ($classifications as $k => $classification) {
            $id = Classification::query()->create(['name' => $classification])->id;
            foreach ($subclassifications[$k]['code'] as $key => $code) {
                SubClassification::query()->create([
                    'classification_id' => $id,
                    'name' => $subclassifications[$k]['name'][$key],
                    'code' => $code,
                    'description' => $subclassifications[$k]['description'][$key],
                ]);
            }
        }
    }
}
