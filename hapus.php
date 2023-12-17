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
    
    
    $query = "DELETE FROM admin WHERE nama = '$nama'";
    
    if (mysqli_query($conn, $query)) {
        header("Location: data.php"); 
        exit();
    } else {
        echo "Error: " . $query . "<br>" . mysqli_error($conn);
    }
}
?>


