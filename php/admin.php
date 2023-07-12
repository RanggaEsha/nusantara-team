<?php
if(isset($_POST['submit'])){
    $target_dir = "../Daftarbuku/promo";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Cek apakah file gambar
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Cek apakah file sudah ada
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Cek ukuran file
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Cek ekstensi file yang diizinkan
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0 karena terdapat error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // Jika semua kondisi terpenuhi, maka unggah file
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];

            // Tambahkan elemen <li> baru ke dalam <ul>
            $new_card = '<li class="card2">
                            <div class="img"><img src="'.$target_file.'" alt="img" draggable="false"></div>
                            <h2>'.$title.'</h2>
                            <p>'.$author.'</p>
                            <span>'.$price.'</span>
                        </li>';

            $file_path = './index.php'; // Ubah sesuai dengan path file HTML Anda

            $html_content = file_get_contents($file_path);
            $position = strpos($html_content, '<ul class="carouselcard">') + strlen('<ul class="carouselcard">');
            $new_content = substr_replace($html_content, $new_card, $position, 0);

            file_put_contents($file_path, $new_content);

            echo "The file ". htmlspecialchars(basename($_FILES["fileToUpload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>

<!DOCTYPE html>
<html>
<head>

<style>
    
</style>

  <link rel="stylesheet" href="../css/formupload.css">
  <title>Upload File</title>
</head>
<body>




<!-- SideBar -->
<nav class="nav">
    <a class="index" href="index.php"><h3 href="index.php">Home</h3></a>
    <ul>
      <li><a href="#promo-section">Form Upload Buku Promo</a></li>
      <li><a href="#bestseller-section">Form Upload Buku Best Seller</a></li>
      <li><a href="#delete-section">Delete Product</a></li>
      <li><a href="#bestseller-section">Form Upload Buku Best Seller</a></li>
    </ul>
  </nav>
  
  <div class="navbar-toggle">
    <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="black">
      <path d="M0 0h24v24H0z" fill="none"/>
      <path d="M3 18h18v-2H3v2zM3 6v2h18V6H3zm0 7h18v-2H3v2z"/>
    </svg>
  </div>

  <section class="formupload" id="promo-section">
  <h2>Form Upload Buku Promo</h2>
  <div class="form-box">
    <div class="form-value">
      <form action="feature.php" method="post" enctype="multipart/form-data">
        <div class="inputbox">
          <ion-icon name="mail-outline"></ion-icon>
          <label for="title">Judul:</label>
          <input type="text" name="title" id="title" required><br><br>
          
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="author">Penulis:</label>
          <input type="text" name="author" id="author" required><br><br>
          
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="price"><i class="fa-solid fa-rupiah-sign"></i>Harga:</label>
          <input type="text" name="price" id="price" required pattern="[0-9]+" title="Harga harus berupa angka"><br><br>
          
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="file" name="fileToUpload" id="fileToUpload" required><br><br>
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="deskripsi">Deskripsi:</label>
          <textarea name="deskripsi" id="deskripsi" required maxlength="20000"></textarea><br><br>
          
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="kategori">Kategori:</label>
          <select name="kategori" id="kategori" required>
            <option value="">Pilih kategori</option>
            <option value="kategori1">Komedi</option>
            <option value="kategori2">Religi</option>
            <option value="kategori3">Fantasy</option>
            <option value="kategori3">Action</option>
            <!-- Tambahkan opsi lain sesuai kebutuhan -->
          </select>
      </div>

        <button type="submit" value="Upload" name="submit">Submit Promo</button>
      </form>
    </div>
  </div>
</section>

<!--------------------  Fitur Upload Buku Best Seller  ----------------------->

<section class="formupload" id="bestseller-section">
  <h2>Form Upload Buku Best Seller</h2>
  <div class="form-box">
    <div class="form-value">
      <form action="feature.php" method="POST" enctype="multipart/form-data">
        <div class="inputbox">
          <ion-icon name="mail-outline"></ion-icon>
          <label for="title">Judul:</label>
          <input type="text" name="title_bestseller" id="title" required><br><br>
          
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="author">Penulis:</label>
          <input type="text" name="author_bestseller" id="author" required><br><br>
         
        </div>
        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="price">Harga:</label>
          <input type="text" name="price_bestseller" id="price" required pattern="[0-9]+" title="Harga harus berupa angka"><br><br>
          
          <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <input type="file" name="fileToUpload_bestseller" id="fileToUpload_bestseller" required><br><br>
        </div>

        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
           <label for="deskripsi">Deskripsi:</label>
          <textarea name="deskripsi_bestseller" id="deskripsi" required maxlength="20000"></textarea><br><br>
         
        </div>

        <div class="inputbox">
          <ion-icon name="lock-closed-outline"></ion-icon>
          <label for="kategori">Kategori:</label>
          <select name="kategori_bestseller" id="kategori" required>
            <option value="">Pilih kategori</option>
            <option value="kategori1">Komedi</option>
            <option value="kategori2">Religi</option>
            <option value="kategori3">Fantasy</option>
            <option value="kategori3">Action</option>
            <!-- Tambahkan opsi lain sesuai kebutuhan -->
          </select>
      </div>
        
        
        <button type="submit" value="Upload" name="submit_bestseller">Submit Bestseller</button>
      </form>
    </div>
  </div>
</section>



<!--------------------  Akfir Fitur Upload Buku Best Seller  ----------------------->

<!--------------------  FITUR DELETE  ----------------------->

  <?php
// Assuming you have already established a database connection

// Function to delete a book from the database
function deleteBook($bookId, $table)
{
    // Your deleteBook function code here
    include 'koneksi.php';

    // Create a new PDO instance
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

    // Prepare the SQL statement to delete the book
    $stmt = $pdo->prepare("DELETE FROM $table WHERE id = :bookId");
    $stmt->bindParam(':bookId', $bookId);
    $stmt->execute();

    // Check if the deletion was successful
    if ($stmt->rowCount() > 0) {
        $response = array(
            'status' => 'success',
            'message' => 'Book deleted successfully.'
        );
    } else {
        $response = array(
            'status' => 'error',
            'message' => 'Failed to delete the book.'
        );
    }

    return $response;
}

// Fetch the book data from the database
include '../php/koneksi.php';

// Create a new PDO instance
$pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

// Prepare the SQL statement to fetch books
$stmtBooks = $pdo->prepare("SELECT * FROM books");
$stmtBooks->execute();
$books = $stmtBooks->fetchAll(PDO::FETCH_ASSOC);

// Prepare the SQL statement to fetch promo books
$stmtPromoBooks = $pdo->prepare("SELECT * FROM buku_promo");
$stmtPromoBooks->execute();
$promoBooks = $stmtPromoBooks->fetchAll(PDO::FETCH_ASSOC);

// Handle delete book action
if (isset($_GET['action']) && $_GET['action'] === 'delete' && isset($_GET['id'])) {
    $bookId = $_GET['id'];
    $table = $_GET['table']; // Assuming you have a 'table' parameter in the URL specifying the table name
    $deleteResponse = deleteBook($bookId, $table);

    // Convert the response to JSON and pass it to the JavaScript code
    echo '<script>';
    echo 'var deleteResponse = ' . json_encode($deleteResponse) . ';';
    echo '</script>';
}
?>


  <section class="delete" id="delete-section">
    <h1>Buku Best Seller</h1>
    <div class="book-container">
        <?php foreach ($promoBooks as $book): ?>
            <div class="book-card">
                <img src="<?php echo $book['image']; ?>" alt="Book Image">
               
                <h2><?php echo $book['judul']; ?></h2>
                <p><?php echo $book['author']; ?></p>
                <span><?php echo $book['price']; ?></span>
                <p>
                    <a href="?action=delete&id=<?php echo $book['id']; ?>&table=buku_promo">Delete</a>
                </p>
            </div>
        <?php endforeach; ?>
    </div>
</section>

<section class="delete" id="bestseller-section">
<h1 class="headerbook">Buku Best Seller</h1>
    <div class="book-container">
        <?php foreach ($books as $buku): ?>
            <div class="book-card">
                <img src="<?php echo $buku['image']; ?>" alt="Book Image">
        
                <h2><?php echo $buku['title']; ?></h2>
                <p><?php echo $buku['author']; ?></p>
                <span><?php echo $buku['price']; ?></span>
                <p>
                    <button><a href="?action=delete&id=<?php echo $buku['id']; ?>&table=books">Delete</a></button>
                </p>
            </div>
            
        <?php endforeach; ?>
    </div>
</section>


<section>

            

</section>
  <!-- Sisanya sesuai dengan kode yang sudah ada -->


  


  <script>
  const navbar = document.querySelector('.nav');
  const navbarToggle = document.querySelector('.navbar-toggle');
  const initialToggleTop = parseFloat(getComputedStyle(navbarToggle).top);

  navbarToggle.addEventListener('click', function() {
    navbar.classList.toggle('open');
  });

  window.addEventListener('scroll', function() {
    const scrollPos = window.scrollY;

    if (scrollPos > 0) {
      navbarToggle.style.top = initialToggleTop + scrollPos + 'px';
    } else {
      navbarToggle.style.top = initialToggleTop + 'px';
    }
  });
</script>


</body>
</html>
