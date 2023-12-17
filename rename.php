<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5CCA0; 
            color: white;
            margin: 0;
      
        }

        h2 {
            color: black; 
        }

        form {
            background-color: #994D1C; 
            padding: 15px;
            border-radius: 2px;
            display: block;
            margin-top: 0em;
        }

        .form-group {
        margin-bottom: 15px;
        margin-right : 13px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
        }

        .form-group input {
            width: calc(100% - 1px); 
            padding: 5px;
            border-radius: 3px;
            border: 1px solid #ccc;
        }


        input[type="text"],
        input[type="submit"] {
            margin-bottom: 20px;
            padding: 5px;
        }

        input[type="submit"] {
            background-color: #8B4513; 
            color: white;
            border: none;
            padding: 10px 20px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #A0522D; 
        }

        .kembali {
            display: inline-block;
            padding: 10px;
            background-color: #A0522D; 
            color: white;
            text-decoration: none;
            border-radius: 1px;
            margin-top: 30px;
            margin-left : 10px;
        }

        .kembali:hover {
            background-color: #8B4513; 
        }

        .navbar {
        background-color: #6B240C;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .logo {
            max-width: 100px;
        }
        .By-pjl {
           
            padding: 30px; 
            display: flex;
            justify-content: space-between;
            align-items: center;
            text-align: center;
        }


        footer {
            background-color: #6B240C; 
            color: white; 
            text-align: center; 
            padding: 10px; 
            margin-top : 42px;
        }

        marquee {
        
            font-size: 18px; 
            font-weight: bold; 
        }
    </style>

</head>
<div class="navbar">
        <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Logo_ITERA.png" alt="Logo ITERA">
    </div>
<body>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


if ($_SERVER["REQUEST_METHOD"] == "GET") {
    $nama = $_GET['nama'];
    $query = "SELECT * FROM admin WHERE nama = '$nama'";
    $result = mysqli_query($conn, $query);

    if ($result) {
        $data = mysqli_fetch_assoc($result);
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Rename Data</title>
           
        </head>
        <body>
            <h2>Rename Data</h2>
           
            <form action="update.php" method="POST">
    <div class="form-group">
        <label for="nama">Nama:</label>
        <input type="text" id="nama" name="nama" value="<?= $data['nama']; ?>">
    </div>
    <div class="form-group">
        <label for="prodi">Prodi:</label>
        <input type="text" id="prodi" name="prodi" value="<?= $data['prodi']; ?>">
    </div>
    <div class="form-group">
        <label for="jenis_kelamin">Jenis Kelamin:</label>
        <input type="text" id="jenis_kelamin" name="jenis_kelamin" value="<?= $data['jenis_kelamin']; ?>">
    </div>
    <div class="form-group">
        <label for="tanggal_pendaftaran">Tanggal Pendaftaran:</label>
        <input type="text" id="tanggal_pendaftaran" name="tanggal_pendaftaran" value="<?= $data['tanggal_pendaftaran']; ?>">
    </div>
    <div class="form-group">
        <label for="alamat">Alamat:</label>
        <input type="text" id="alamat" name="alamat" value="<?= $data['alamat']; ?>">
    </div>
    <input type="submit" value="Update">
</form>

            <a href="edit.php" class="kembali">Kembali</a>
        </body>
        </html>
        <?php
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
        die();
    }
} else {
    echo "Nama tidak ditemukan";
}
?>
  
</body>
<div class="By-pjl"></div>
    
    <footer> 
        <marquee>Copyright &copy; 2023 All Rights Reserved by PJL</marquee>
    </footer>
</html>

