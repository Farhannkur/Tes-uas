<?php

class DataHandler {
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname = "admin";
    private $conn;

    public function __construct() {
        
        $this->conn = new mysqli($this->servername, $this->username, $this->password, $this->dbname);

       
        if ($this->conn->connect_error) {
            die("Koneksi gagal: " . $this->conn->connect_error);
        }
    }

    public function fetchData() {
        $sql = "SELECT * FROM admin";
        $result = $this->conn->query($sql);

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
            echo "Query error: " . $this->conn->error;
        }
    }

    public function closeConnection() {
       
        $this->conn->close();
    }
}


$dataHandler = new DataHandler();


$dataHandler->fetchData();

$dataHandler->closeConnection();


?>
