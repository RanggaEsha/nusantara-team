<!DOCTYPE html>
<html>
<head>

    <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 20px;
    }

    h1 {
      color: #333;
    }

    p {
      margin-bottom: 10px;
    }

    span {
      font-weight: bold;
    }
  </style>

  <title>Other HTML</title>
</head>
<body>
  <h1>Checkout Details</h1>
  <p>Nama: <span id="namaDetailLabel"></span></p>
  <p>Email: <span id="emailDetailLabel"></span></p>
  <p>Alamat: <span id="alamatDetailLabel"></span></p>
  <p>Metode Pengiriman: <span id="metodePengirimanLabel"></span></p>
  <p>Metode Pembayaran: <span id="metodePembayaranLabel"></span></p>
  <p>Total Harga: Rp. <span id="totalHargaLabel"></span></p>

  <script>
    // Retrieve the data from local storage
    const nama = localStorage.getItem("nama");
    const email = localStorage.getItem("email");
    const alamat = localStorage.getItem("alamat");
    const metodePengiriman = localStorage.getItem("metodePengiriman");
    const metodePembayaran = localStorage.getItem("metodePembayaran");
    const totalHarga = localStorage.getItem("totalHarga");

    // Update the HTML elements with the retrieved data
    document.getElementById("namaDetailLabel").textContent = nama;
    document.getElementById("emailDetailLabel").textContent = email;
    document.getElementById("alamatDetailLabel").textContent = alamat;
    document.getElementById("metodePengirimanLabel").textContent = metodePengiriman;
    document.getElementById("metodePembayaranLabel").textContent = metodePembayaran;
    document.getElementById("totalHargaLabel").textContent = totalHarga;

    // Clear the local storage
    localStorage.clear();
  </script>
</body>
</html>
