<?php
// Inisialisasi variabel untuk menampung error dan status sukses [cite: 79, 80]
$postErrors = []; 
$postSuccess = false; 

// Mengecek apakah form disubmit dengan method POST [cite: 81]
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    
    // Mengambil dan membersihkan data inputan menggunakan trim() [cite: 82, 83, 84, 85]
    $tanggal    = trim($_POST['tanggal'] ?? '');
    $jenis      = trim($_POST['jenis'] ?? '');
    $nominal    = trim($_POST['nominal'] ?? '');
    $keterangan = trim($_POST['keterangan'] ?? '');

    // Validasi sederhana (memastikan data tidak kosong) 
    if ($tanggal === '') {
        $postErrors[] = 'Tanggal transaksi wajib diisi.';
    }
    if ($jenis === '') {
        $postErrors[] = 'Jenis transaksi wajib dipilih.';
    }
    if ($nominal === '') {
        $postErrors[] = 'Nominal wajib diisi.';
    }
    if ($keterangan === '') {
        $postErrors[] = 'Keterangan wajib diisi.';
    }

    // Jika tidak ada error, set status sukses menjadi true [cite: 99, 100, 101]
    if (empty($postErrors)) {
        $postSuccess = true;
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Hasil Proses Keuangan</title>
</head>
<body>
    <h2>Hasil Pemrosesan Data Keuangan</h2>

    <?php if (!empty($postErrors)): ?>
        <div class="error" style="color: red;">
            <strong>Validasi gagal:</strong>
            <ul>
                <?php foreach ($postErrors as $error): ?>
                    <li><?= htmlspecialchars($error, ENT_QUOTES, 'UTF-8') ?></li>
                <?php endforeach; ?>
            </ul>
        </div>
    <?php endif; ?>

    <?php if ($postSuccess): ?>
        <div class="success" style="color: green;">
            <p>Data berhasil disimpan!</p>
        </div>
        <div class="result">
            <strong>Detail Transaksi:</strong><br>
            Tanggal: <?= htmlspecialchars($tanggal, ENT_QUOTES, 'UTF-8') ?><br>
            Jenis: <?= htmlspecialchars($jenis, ENT_QUOTES, 'UTF-8') ?><br>
            Nominal: Rp <?= number_format((float)$nominal, 0, ',', '.') ?><br>
            Keterangan: <?= htmlspecialchars($keterangan, ENT_QUOTES, 'UTF-8') ?>
        </div>
    <?php endif; ?>

    <br>
    <a href="form_keuangan.php">Kembali ke Form</a>

</body>
</html>