<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Data</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #F5CCA0;
            padding: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #000;
            padding: 8px;
           
        }

        th {
            background-color: #8B4513; 
            color: white;
        }

        a.button {
            background-color: #8B4513; 
            color: white;
            padding: 10px 20px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            border-radius: 5px;
            margin-top: 11px;
        }

        a.button:hover {
            background-color: #A0522D; 
        }

        .navbar {
        background-color: #9A3B3B;
        padding: 20px;
        display: flex;
        justify-content: space-between;
        align-items: center;
        }

        .logo {
            max-width: 100px;
        }


            footer {
                position: fixed;
                bottom: 0px;
                width: 100%;
                background-color: #9A3B3B;
                color: white;
                text-align: center;
                padding: 10px;
                margin: 0 auto; 
   
            }

            marquee {
            
                font-size: 18px; 
                font-weight: bold; 
            }
    </style>

     <div class="navbar">
        <img class="logo" src="https://upload.wikimedia.org/wikipedia/commons/e/ef/Logo_ITERA.png" alt="Logo ITERA">
    </div>

</head>
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

$sql = "SELECT * FROM admin";
$result = $conn->query($sql);

if ($result && $result->num_rows > 0) {
    ?>
    <table border='1'>
        <tr>
            <th>Nama</th>
            <th>Prodi</th>
            <th>Jenis Kelamin</th>
            <th>Tanggal Pendaftaran</th>
            <th>Alamat</th>
            <th>Edit</th>
            <th>Hapus</th>
        </tr>
        <?php
        while ($row = $result->fetch_assoc()) {
            ?>
            <tr>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["prodi"] ?></td>
                <td><?= $row["jenis_kelamin"] ?></td>
                <td><?= $row["tanggal_pendaftaran"] ?></td>
                <td><?= $row["alamat"] ?></td>
                <td><a href='rename.php?nama=<?= urlencode($row["nama"]) ?>' style='color: initial;' onmouseover='this.style.color="brown"' onmouseout='this.style.color="initial"'>Edit</a></td>
                <td><a href='hapus.php?nama=<?= urlencode($row["nama"]) ?>' style='color: initial;' onmouseover='this.style.color="brown"' onmouseout='this.style.color="initial"' onclick='return confirm("Apakah Anda yakin ingin menghapus?")'>Hapus</a></td>

            </tr>
        <?php
        }
        ?>
    </table>

    <?php
} else {
    echo "0 results";
}

$conn->close();
?>
    
    <a href="index.php" class="button">Kembali ke Halaman Utama</a>
</body>

    <footer> 
        <marquee>Copyright &copy; 2023 All Rights Reserved by PJL</marquee>
    </footer>
</html>

