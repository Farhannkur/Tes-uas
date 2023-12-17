<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
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
                <li><a href="index.php">Halaman Utama</a></li>
                <li><a href="edit.php">Edit</a></li>
            </ul>
        </div>

        <div class="content">
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

            if ($result) {
                if ($result->num_rows > 0) {
                    echo "<table border='1'>
                        <tr>
                            <th>Nama</th>
                            <th>Prodi</th>
                            <th>Jenis Kelamin</th>
                            <th>Tanggal Pendaftaran</th>
                            <th>Alamat</th>
                        </tr>";
  
                    while ($row = $result->fetch_assoc()) {
                        echo "<tr>
                            <td>" . $row["nama"] . "</td>
                            <td>" . $row["prodi"] . "</td>
                            <td>" . $row["jenis_kelamin"] . "</td>
                            <td>" . $row["tanggal_pendaftaran"] . "</td>
                            <td>" . $row["alamat"] . "</td>
                            </tr>";
                    }

                    echo "</table>";
                } else {
                    echo "0 results";
                }
            } else {
                echo "Query error: " . $conn->error;
            }

            $conn->close();
            ?>
        </div>
    </div>
    
</body>

<footer> 
        <marquee>Copyright &copy; 2023 All Rights Reserved by PJL</marquee>
    </footer>
</html>

<style>

body {
            font-family: Arial, sans-serif;
            background-color: #E2C799;
            margin: 0; 
            padding: 0; 
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

        .body {
            display: flex;
            justify-content: space-between; 
            padding: 20px;
        }

        

        .sidebar {
            background-color: #C08261;
            color: #fff;
            padding: 20px;
            width: 250px;
            text-align: left;
        }

        .sidebar h2 {
            font-size: 18px;
            margin-bottom: 10px;
            color: black;
        }

        .sidebar ul {
            list-style: none;
            padding: 0;
        }

        .sidebar ul li {
            margin-bottom: 10px;
        }

        .sidebar a {
            text-decoration: none;
            color: #fff;
        }

        .sidebar a:hover {
            text-decoration: underline;
        }

        .content {
           
            
    font-family: "Times New Roman", Times, serif;
    padding: 20px;
    flex: 10;
    margin-left: 20px;
    box-sizing: border-box; 
    border: 10px solid #b56a51;


        }

        footer {
            
    position: fixed;
    bottom: 0;
    width: 100%;
    background-color: #9A3B3B;
    color: white;
    text-align: center;
    padding: 10px;
    margin-bottom: 0; 

        }

        marquee {
            font-size: 18px;
            font-weight: bold;
        }


</style>

