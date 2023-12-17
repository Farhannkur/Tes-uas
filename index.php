<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nama = $_POST['nama'] ?? '';
    $prodi = $_POST['prodi'] ?? '';
    $jenisKelamin = $_POST['jenis-kelamin'] ?? '';
    $tanggalPendaftaran = $_POST['tanggal-pendaftaran'] ?? '';
    $alamat = $_POST['alamat'] ?? '';

   
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}


    $sql = "INSERT INTO admin (nama, prodi, jenis_kelamin, tanggal_pendaftaran, alamat)
    VALUES ('$nama', '$prodi', '$jenisKelamin', '$tanggalPendaftaran', '$alamat')";

    if ($conn->query($sql) === TRUE) {
        echo "Data berhasil disimpan";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="form.css">
    <title>HALAMAN FORMULIR</title>
</head>
<body>
    <div class="navbar">
        <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Logo_ITERA.png" alt="Logo ITERA">
    </div>

    <div class="body">
        <div class="sidebar">
            <h2>Menu</h2>
            <ul>
                <li><a href="login.html">Login</a></li>
                <li><a href="data.php">Data</a></li>
                <li><a href="admin.php">Admin</a></li>
            </ul>
        </div>
        
        <div class="container">
            <h1>Pendaftaran Lomba Membaca Puisi</h1>
            <form id="registrationForm" action="index.php" method="post" onsubmit="return validateForm()">
           
                <div class="form-group">
                    <label for="nama">Nama:</label>
                    <input type="text" id="nama" name="nama">
                </div>
                
                <div class="form-group">
                    <label for="prodi">Prodi:</label>
                    <input type="text" id="prodi" name="prodi" required>
                </div>
               
                <div class="form-group">
                    <label for="jenis-kelamin">Jenis Kelamin:</label>
                    <select id="jenis-kelamin" name="jenis-kelamin" required>
                        <option value="Laki-laki">Laki-laki</option>
                        <option value="Perempuan">Perempuan</option>
                    </select>
                </div>

                <div class="form-group">
                    <label for="tanggal-pendaftaran">Tanggal Pendaftaran:</label>
                    <input type="date" id="tanggal-pendaftaran" name="tanggal-pendaftaran" required>
                </div>

                <div class="form-group">
                    <label for="alamat">Alamat:</label>
                    <textarea id="alamat" name="alamat" rows="4" required></textarea>
                </div>
                
                <button type="submit" class="btn-submit" onclick="return confirmSubmit()" value="<?php echo date("h:i:sa"); ?>">Daftar</button>
            </form>
        </div>

        
    </div>

    <div class="hak-cipta"></div>
    
    <footer> 
        <marquee>Copyright &copy; 2023 All Rights Reserved by PJL</marquee>
    </footer>

   
<script src="validasi.js"></script>

</body>
</html>

