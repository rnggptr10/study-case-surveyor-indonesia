<?php

return [
    [
        'situasi' => 'Anggota tim akhir-akhir ini tidak merespons pendekatan Anda yang bersahabat. Mereka tampak tidak peduli, dan kinerjanya menurun drastis.',
        'options' => [
            ['text' => 'Tekankan pentingnya mengikuti prosedur dan menyelesaikan tugas dengan baik.', 'style' => 'Telling'],
            ['text' => 'Sediakan waktu jika tim ingin bicara, tapi jangan memaksa.', 'style' => 'Participating'],
            ['text' => 'Ajak bicara untuk cari tahu masalahnya, lalu tetapkan target bersama.', 'style' => 'Selling'],
            ['text' => 'Biarkan saja, jangan terlibat dulu.', 'style' => 'Delegating'],
        ],
    ],
    [
        'situasi' => 'Kinerja tim sedang membaik. Anda sudah memastikan mereka mengetahui tugas dan standar kerja yang diharapkan.',
        'options' => [
            ['text' => 'Tetap jaga komunikasi baik dan ingatkan tim soal tanggung jawab kerja.', 'style' => 'Selling'],
            ['text' => 'Biarkan saja berjalan seperti biasa tanpa tindakan tambahan.', 'style' => 'Delegating'],
            ['text' => 'Tunjukkan apresiasi agar tim merasa dihargai dan dilibatkan.', 'style' => 'Participating'],
            ['text' => 'Tekankan kembali pentingnya target dan tenggat waktu.', 'style' => 'Telling'],
        ],
    ],
    [
        'situasi' => 'Seorang anggota tim baru tampak sangat antusias tapi belum paham cara kerja yang benar.',
        'options' => [
            ['text' => 'Tegaskan aturan dan instruksi kerja dengan jelas.', 'style' => 'Telling'],
            ['text' => 'Biarkan dia mencoba sendiri, lalu beri evaluasi.', 'style' => 'Delegating'],
            ['text' => 'Dukung semangatnya dan beri panduan sambil berjalan.', 'style' => 'Selling'],
            ['text' => 'Ajak berdiskusi agar ia menemukan caranya sendiri.', 'style' => 'Participating'],
        ],
    ],
    [
        'situasi' => 'Tim Anda sedang semangat dan punya ide baru, tapi implementasinya sering tidak tepat sasaran.',
        'options' => [
            ['text' => 'Dengarkan ide mereka dan beri arahan teknis.', 'style' => 'Selling'],
            ['text' => 'Biarkan mereka coba dulu, lalu evaluasi hasilnya.', 'style' => 'Delegating'],
            ['text' => 'Diskusikan ide bersama agar bisa diperbaiki bersama-sama.', 'style' => 'Participating'],
            ['text' => 'Ingatkan untuk selalu ikuti SOP yang berlaku.', 'style' => 'Telling'],
        ],
    ],
    [
        'situasi' => 'Anggota tim Anda sangat andal dan terbiasa mengambil keputusan sendiri dalam tugasnya.',
        'options' => [
            ['text' => 'Berikan kepercayaan penuh dan hanya pantau sesekali.', 'style' => 'Delegating'],
            ['text' => 'Berikan arahan teknis dan dorong pencapaian lebih tinggi.', 'style' => 'Selling'],
            ['text' => 'Tanyakan pendapat mereka dalam pengambilan keputusan.', 'style' => 'Participating'],
            ['text' => 'Tegaskan kembali peran dan target yang harus dicapai.', 'style' => 'Telling'],
        ],
    ],
    [
        'situasi' => 'Tim sedang menghadapi tenggat waktu penting dan beberapa anggota masih belum mengerti tugasnya.',
        'options' => [
            ['text' => 'Berikan instruksi yang tegas dan jelas.', 'style' => 'Telling'],
            ['text' => 'Ajak berdiskusi untuk membagi tugas secara efisien.', 'style' => 'Participating'],
            ['text' => 'Motivasi mereka sambil memberi arahan langkah demi langkah.', 'style' => 'Selling'],
            ['text' => 'Percayakan pada mereka dan biarkan bekerja sesuai gaya masing-masing.', 'style' => 'Delegating'],
        ],
    ],
    [
        'situasi' => 'Seorang anggota tim sudah lama bekerja, namun akhir-akhir ini tampak tidak termotivasi.',
        'options' => [
            ['text' => 'Beri ruang untuk menyelesaikan masalah sendiri.', 'style' => 'Delegating'],
            ['text' => 'Diskusikan masalah dan bantu cari solusinya.', 'style' => 'Participating'],
            ['text' => 'Dorong kembali motivasi dengan target dan arahan.', 'style' => 'Selling'],
            ['text' => 'Tekankan kembali pentingnya komitmen kerja.', 'style' => 'Telling'],
        ],
    ],
    [
        'situasi' => 'Anggota tim sering bertanya dan tampak tidak yakin dengan tugasnya, meskipun sudah diberi pengarahan.',
        'options' => [
            ['text' => 'Berikan panduan ulang dan cek pemahamannya.', 'style' => 'Telling'],
            ['text' => 'Libatkan dalam diskusi untuk membangun kepercayaan diri.', 'style' => 'Participating'],
            ['text' => 'Motivasi dan beri contoh agar dia bisa belajar lebih baik.', 'style' => 'Selling'],
            ['text' => 'Biarkan dia belajar dengan cara sendiri.', 'style' => 'Delegating'],
        ],
    ],
    [
        'situasi' => 'Tim Anda baru menyelesaikan proyek besar dengan sukses.',
        'options' => [
            ['text' => 'Berikan mereka tanggung jawab penuh untuk proyek selanjutnya.', 'style' => 'Delegating'],
            ['text' => 'Beri apresiasi dan diskusikan proyek berikutnya bersama.', 'style' => 'Participating'],
            ['text' => 'Beri tantangan baru dengan arahan dan dukungan.', 'style' => 'Selling'],
            ['text' => 'Tentukan tugas baru dan pastikan mereka mengikuti standar.', 'style' => 'Telling'],
        ],
    ],
    [
        'situasi' => 'Anda memimpin tim baru yang belum memiliki pengalaman kerja sama.',
        'options' => [
            ['text' => 'Berikan instruksi dan struktur kerja yang ketat.', 'style' => 'Telling'],
            ['text' => 'Tanyakan pendapat untuk membangun kebersamaan.', 'style' => 'Participating'],
            ['text' => 'Dorong kerja tim dengan bimbingan aktif.', 'style' => 'Selling'],
            ['text' => 'Biarkan mereka mencari cara kerja terbaik sendiri.', 'style' => 'Delegating'],
        ],
    ],
    [
        'situasi' => 'Tim Anda terdiri dari anggota berpengalaman dan memiliki relasi kerja yang baik.',
        'options' => [
            ['text' => 'Percayakan keputusan kepada mereka.', 'style' => 'Delegating'],
            ['text' => 'Libatkan mereka dalam menyusun strategi baru.', 'style' => 'Participating'],
            ['text' => 'Dorong ide-ide mereka dan beri arahan umum.', 'style' => 'Selling'],
            ['text' => 'Ingatkan kembali peran dan tanggung jawab masing-masing.', 'style' => 'Telling'],
        ],
    ],
    [
        'situasi' => 'Ada perubahan besar dalam organisasi yang membuat tim Anda merasa tidak pasti.',
        'options' => [
            ['text' => 'Tegaskan arah dan keputusan yang perlu diambil.', 'style' => 'Telling'],
            ['text' => 'Diskusikan perubahan dan dengarkan kekhawatiran tim.', 'style' => 'Participating'],
            ['text' => 'Bimbing mereka memahami perubahan dan manfaatnya.', 'style' => 'Selling'],
            ['text' => 'Biarkan mereka menyesuaikan diri secara alami.', 'style' => 'Delegating'],
        ],
    ],
];

