<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Pencatatan Keuangan</title>
</head>
<body>
    <h2>Aplikasi Pencatatan Keuangan Sederhana</h2>
    
    <form method="POST" action="proses_keuangan.php">
        
        <label for="tanggal">Tanggal Transaksi:</label><br>
        <input id="tanggal" name="tanggal" type="date">
        <br><br>

        <label for="jenis">Jenis Transaksi:</label><br>
        <select id="jenis" name="jenis">
            <option value="Pemasukan">Pemasukan</option>
            <option value="Pengeluaran">Pengeluaran</option>
        </select>
        <br><br>

        <label for="nominal">Nominal:</label><br>
        <input id="nominal" name="nominal" type="number" placeholder="Contoh: 50000">
        <br><br>

        <label for="keterangan">Keterangan:</label><br>
        <input id="keterangan" name="keterangan" type="text" placeholder="Contoh: Beli makan siang">
        <br><br>

        <button type="submit" name="simpan">Simpan Data</button>

    </form>
</body>
</html>