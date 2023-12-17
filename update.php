<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "admin";


$conn = new mysqli($servername, $username, $password, $dbname);


if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
  
    $nama = $_POST['nama'];
    $prodi = $_POST['prodi'];
    $jenis_kelamin = $_POST['jenis_kelamin'];
    $tanggal_pendaftaran = $_POST['tanggal_pendaftaran'];
    $alamat = $_POST['alamat'];

   
    $query = "UPDATE admin SET 
    nama='$nama', 
    prodi='$prodi', 
    jenis_kelamin='$jenis_kelamin', 
    alamat='$alamat' 
    WHERE tanggal_pendaftaran='$tanggal_pendaftaran'";


    if (mysqli_query($conn, $query)) {
        header("Location: data.php");
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>
