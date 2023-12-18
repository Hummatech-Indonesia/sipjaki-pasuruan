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
