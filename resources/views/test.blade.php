<?php
// Jika formulir disubmit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil nilai dari input tanggal
    $tanggal = $_POST['tanggal'];

    // Memecah tanggal menjadi bagian-bagian (tahun, bulan, hari)
    [$tahun, $bulan, $hari] = explode('-', $tanggal);

    // Menampilkan tahun
    echo 'Tahun yang dipilih: ' . $tahun;
}
?>
<!DOCTYPE html>
<html>

<head>
    <title>Form Tanggal</title>
</head>

<body>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label for="tanggal">Pilih Tanggal:</label>
        <input type="date" id="tanggal" name="tanggal">
        <button type="submit">Submit</button>
    </form>
</body>

</html>
