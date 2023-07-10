
<?php
if (isset($_GET['total'])) {
  $total = $_GET['total'];

  // Retrieve selected items from URL parameter if available
  $selectedItems = array();
  if (isset($_GET['items'])) {
    $selectedItems = json_decode($_GET['items'], true);
  }
?>

<!DOCTYPE html>
<html>
<head>

<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
      <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;display=swap" rel="stylesheet">
    <!-- MDB -->
      <link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.2.0/mdb.min.css" rel="stylesheet">
    
    <!-- Carousel -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
      <title>Infinite card2 Slider JavaScript | CodingNepal</title>
      <!-- CSS -->
        <link rel="stylesheet" href="../css/style.css">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Fontawesome Link for Icons -->
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css">
      <script src="../js/script.js" defer></script>
      
      <script src="../js/script3.js" defer></script>

<style>
    
  </style>
  <title>Checkout</title>
</head>
<body>

<!-- Navbar Atas -->
<nav class="navbar navbar-expand-lg navbar-dark nv-atas-color">
  <div class="container">
    <a class="navbar-brand" href="../php/index.php">
      <img src="path/to/logo.png" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
      Your Brand
    </a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav mx-auto">
        <!-- Hapus menu Home, About, dan Services -->
      </ul>
          <form class="d-flex navbar-form" action="./search.php" method="POST">
               <div class="input-group">
                  <input class="form-control form-control-lg" type="search" name="search_query" placeholder="Search" aria-label="Search">
                  <button class="btn btn-outline-light" type="submit" name="search_submit">Search</button>
               </div>
          </form>
      <!-- Float Login -->
    <!-- Button trigger modal -->
    <!-- Buton Daftar 
    <a type="button" class="btn btn-secondary " href="./daftar.html">
      Daftar
    </a>
  -->

  <div class="d-flex align-items-center"> <!-- Tambahkan elemen div untuk mengelompokkan ikon dan tombol login -->
  <a href="keranjang.php" class="text-decoration-none text-light">
  <i class="fas fa-shopping-cart me-2"></i>
</a> <!-- Tambahkan ikon keranjang di sini, ganti kelas ikon dengan yang sesuai -->
    <button type="button" class="btn btn-login-color" data-bs-toggle="modal" data-bs-target="#exampleModal">
    
    </button>
    </div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5 text-center mx-auto p-2 fs-2" style="width: 800px;" id="exampleModalLabel">Login</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
          <form>
              <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label">Email address</label>
                <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
              </div>
              <div class="mb-3">
                <label for="exampleInputPassword1" class="form-label">Password</label>
                <input type="password" class="form-control" id="exampleInputPassword1">
              </div>
              <div class="text-center">
                  <a>Belum punya akun? </a><a href="./daftar.html" class="text-primary fs-8">Daftar</a>
              </div>
            </form>
      </div>
      <div class="modal-footer text-center mx-auto">
        <button type="button" class="btn btn-primary">Login</button>
      </div>
    </div>
  </div>
</div>
    </div>
  </div>
</nav>





    <!--
  <h1>Checkout</h1>

  <h2>Selected Items:</h2>
  <ul>
    <?php foreach ($selectedItems as $item): ?>
      <li>
        <strong><?php echo $item['judul']; ?></strong><br>
        <img src="<?php echo $item['gambar']; ?>"><br>
        Harga: <?php echo $item['harga']; ?><br>
        Jumlah: <?php echo $item['jumlah']; ?><br>
        Subtotal: <?php echo $item['subtotal']; ?>
      </li>
    <?php endforeach; ?>
  </ul>
    -->


    
<div class="main-container-keranjang">
        <div class="checkout">
            <h3>Checkout</h3>
        </div>
        <div class="checkout">
            <h2>Alamat</h2>
        </div>
       

        

<div class="alamat-invoice">

  <div class="label-container">
    <label for="nama">Nama:</label>
    <span id="namaLabel"></span>
  </div>
  <div class="label-container">
    <label for="email">Email:</label>
    <span id="emailLabel"></span>
  </div>
  <div class="label-container">
    <label for="alamat">Alamat:</label>
    <span id="alamatLabel"></span>
  </div>

</div>

<div class="alamat-invoice">
    <div class="button-container">
    <button class="open-modal-button" onclick="openModal()">Masukkan Alamat</button>
  </div>
</div>

  <div id="myModal" class="modal-alamat">
    <div class="modal-content-alamat">
      <span class="close" onclick="closeModal()">&times;</span>
      <form>
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" oninput="updateLabel('nama')" /><br><br>
    
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" oninput="updateLabel('email')" /><br><br>
    
        <label for="pesan">Alamat:</label>
        <input type="text" id="alamat" name="alamat" oninput="updateLabel('alamat')"></textarea><br><br>
    
        <button type="button" onclick="closeModal()">Tutup</button>
      </form>
    </div>
  </div>


  <div class="isi">
    <p>Produk</p>
    <p>Harga</p>
    <p>Kuantitas</p>
    <p>Total Harga</p>
  </div>
  

  <div id="keranjang-container">
  <?php foreach ($selectedItems as $item): ?>
      <div class="container-judul">
        <h3 style="text-align: left;"><?php echo $item['judul']; ?></h3>
        <hr>
      </div>
      <div class="container-isi">
        <div class="sub-container-keranjang">
          <img src="<?php echo $item['gambar']; ?>">
        </div>
        <div class="sub-container-keranjang">
          <p class="harga">Harga = <?php echo $item['harga']; ?><br></p>
        </div>
        <div class="sub-container-keranjang3">
            <p class="jumlah">Jumlah : <?php echo $item['jumlah']; ?></p>
        </div>
        <div class="sub-container-keranjang">
            <p class="subtotal">Subtotal = <?php echo $item['subtotal']; ?></p>
        </div>
      </div>
    <?php endforeach; ?>
  </div>
</div>

  <div class="container-invoice">
  <h2>Total Harga: Rp. <?php echo number_format($total, 0, ".", "."); ?></h2>
  </div>
  <!-- Add your checkout form or payment gateway integration here -->

  <script>
    var modal = document.getElementById("myModal");

    function openModal() {
      modal.style.display = "block";
    }

    function closeModal() {
      modal.style.display = "none";
    }

    function updateLabel(field) {
      var value = document.getElementById(field).value;
      var label = document.getElementById(field + "Label");
      label.innerHTML = value;
    }

    function tombolClicked() {
      // Fungsi ini akan dijalankan saat tombol diklik
      alert("Tombol diklik!");
    }

    window.onclick = function(event) {
      if (event.target == modal) {
        modal.style.display = "none";
      }
    }
  </script>


</body>
</html>

<?php
} else {
  
}
