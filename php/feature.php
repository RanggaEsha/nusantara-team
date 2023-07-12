<?php
include 'koneksi.php';
// Assuming you have already established a database connection

if (isset($_POST['submit'])) {
    $target_dir_promo = "../Daftarbuku/Promo/";
    $target_dir_bestseller = "../Daftarbuku/Bestseller/";

    $target_file_promo = $target_dir_promo . basename($_FILES["fileToUpload"]["name"]);
    $target_file_bestseller = $target_dir_bestseller . basename($_FILES["fileToUpload"]["name"]);

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file_promo, PATHINFO_EXTENSION));

    // Cek apakah file gambar
    if (isset($_POST["submit"])) {
        $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Cek ukuran file
    if ($_FILES["fileToUpload"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Cek ekstensi file yang diizinkan
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0 karena terdapat error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file_promo)) {
            $title = $_POST['title'];
            $author = $_POST['author'];
            $price = $_POST['price'];
            $desc = $_POST['deskripsi'];
            $kategori = $_POST['kategori']; // Menambahkan kategori

            // Assuming you have already established a database connection

            // Create a new PDO instance
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Prepare the SQL statement
            $stmt = $pdo->prepare("INSERT INTO buku_promo (judul, author, price, image, kategori ,deskripsi) VALUES (:title, :author, :price, :image, :kategori ,:deskripsi)");

            // Bind the parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':deskripsi', $desc);
            $stmt->bindParam(':image', $target_file_promo);
            $stmt->bindParam(':kategori', $kategori); // Menambahkan kategori

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Menampilkan pop-up menggunakan JavaScript
                echo '<script>alert("File Berhasil Di Upload.");</script>';
            } else {
                echo "Sorry, there was an error uploading your file to the database.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

if (isset($_POST['submit_bestseller'])) {
    $target_dir_bestseller = "../Daftarbuku/Bestseller/";
    $target_file_bestseller = $target_dir_bestseller . basename($_FILES["fileToUpload_bestseller"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file_bestseller, PATHINFO_EXTENSION));

    // Cek apakah file gambar
    if (isset($_POST["submit_bestseller"])) {
        $check = getimagesize($_FILES["fileToUpload_bestseller"]["tmp_name"]);
        if ($check !== false) {
            echo "File is an image - " . $check["mime"] . ".";
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Cek ukuran file
    if ($_FILES["fileToUpload_bestseller"]["size"] > 500000000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Cek ekstensi file yang diizinkan
    if ($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif") {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Cek jika $uploadOk bernilai 0 karena terdapat error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload_bestseller"]["tmp_name"], $target_file_bestseller)) {
            $title = $_POST['title_bestseller'];
            $author = $_POST['author_bestseller'];
            $price = $_POST['price_bestseller'];
            $deskripsi = $_POST['deskripsi_bestseller'];
            $kategori = $_POST['kategori_bestseller']; // Menambahkan kategori

            // Assuming you have already established a database connection

            // Create a new PDO instance
            $pdo = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);

            // Prepare the SQL statement
            $stmt = $pdo->prepare("INSERT INTO books (title, author, price, image,kategori, deskripsi) VALUES (:title, :author, :price, :image,:kategori, :deskripsi)");

            // Bind the parameters
            $stmt->bindParam(':title', $title);
            $stmt->bindParam(':author', $author);
            $stmt->bindParam(':price', $price);
            $stmt->bindParam(':image', $target_file_bestseller);
            $stmt->bindParam(':deskripsi', $deskripsi);
            $stmt->bindParam(':kategori', $kategori); // Menambahkan kategori

            // Execute the prepared statement
            if ($stmt->execute()) {
                // Menampilkan pop-up menggunakan JavaScript
                echo '<script>alert("File Berhasil Di Upload.");</script>';
            } else {
                echo "Sorry, there was an error uploading your file to the database.";
            }
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Redirect ke halaman lain setelah penghapusan berhasil
echo "<script>window.location.href = 'buathalaman.php';</script>";
exit;
?>
