<?php
    echo $namanya = $_POST['n'];
    echo $jurusannya = $_POST['j'];
    echo $kelaminnya = $_POST['k'];


    //--------------------------------------------------------- AKSI UPLOAD
                    $target_dir = "pasphoto/";
                    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
                    $uploadOk = 1;
                    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

                    // Check if image file is a actual image or fake image
                    if(isset($_POST["submit"])) {
                    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
                    if($check !== false) {
                        echo "File is an image - " . $check["mime"] . ".<br>";
                        $uploadOk = 1;
                    } else {
                        echo "File is not an image.";
                        $uploadOk = 0;
                    }
                    }

                    // Check if file already exists
                    if (file_exists($target_file)) {
                    echo "Sorry, file already exists.";
                    $uploadOk = 0;
                    }

                    // Check file size
                    if ($_FILES["fileToUpload"]["size"] >= 2000000) { #2MB
                    echo "Sorry, your file is too large.";
                    $uploadOk = 0;
                    }

                    // Allow certain file formats
                    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
                    && $imageFileType != "gif" ) {
                    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                    $uploadOk = 0;
                    }
                    
                    
                    // Check if $uploadOk is set to 0 by an error
                    if ($uploadOk == 0) {
                    echo "Sorry, your file was not uploaded.";
                    // if everything is ok, try to upload file
                    } else {
                    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
                        echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
                    } else {
                        echo "Sorry, there was an error uploading your file.";
                    }
                    }
                   
    //---------------------------------------------------------

    include "koneksi.php";
   
    /*INSERT INTO `mahasiswa` 
                (`id`, `nama`, `jurusan`, `jenis_kelamin`) 
             VALUES (NULL, 'Joni', 'J02', 'L');
             */
    $q = "INSERT INTO `mahasiswa` 
                (`id`, `nama`, `jurusan`, `jenis_kelamin`,`nama_file_foto`) 
             VALUES (NULL, '$namanya', '$jurusannya', '$kelaminnya','$target_file')";
    
    echo "<hr>Querynya: $q";

    mysqli_query($conn,$q);
    echo "<h2>Data baru atas nama $namanya sudah ditambahkan ke DBMS</h2>";
?>
<p>
<a href="akses_dbms.php">ke halaman daftar data</a>