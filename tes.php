<?php
// Mengambil data terbaru dari database (sesuaikan dengan kebutuhan Anda)
include './php/koneksi.php';

// Memeriksa koneksi
if ($koneksi->connect_error) {
    die("Koneksi ke database gagal: " . $koneksi->connect_error);
}

// Menyiapkan kueri SELECT dengan mengurutkan berdasarkan ID secara menurun (terbaru) dan membatasi hasil hanya 1 baris
$sql = "SELECT * FROM invoice ORDER BY id DESC LIMIT 1";

// Menjalankan kueri SELECT
$result = $koneksi->query($sql);

// Memeriksa apakah ada data yang ditemukan
if ($result->num_rows > 0) {
    // Menampilkan data
    while ($row = $result->fetch_assoc()) {
        echo "Nama: " . $row['nama'] . "<br>";
        echo "Alamat: " . $row['alamat'] . "<br>";
        echo "Phone: " . $row['phone'] . "<br>";
        echo "Metode Pengiriman: " . $row['metode_pengiriman'] . "<br>";
        echo "Metode Pembayaran: " . $row['metode_pembayaran'] . "<br>";
        echo "Total Harga: " . $row['total_harga'] . "<br>";
        echo "<br>";
    }
} else {
    echo "Tidak ada data yang ditemukan.";
}

// Menutup koneksi ke database
$koneksi->close();
?>
