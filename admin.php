<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>HALAMAN ADMIN</title>
    <style>

        body {
            position: fixed;
            font-family: Arial, sans-serif;
            background-image: url('https://www.itera.ac.id/wp-content/uploads/2021/06/Gerbang-ITERA-web.jpg');
        }

        table {
            border-collapse: collapse;
            width: 100%;
            margin-bottom: 20px; 
        }

        th, td {
            border: 1px solid #dddddd;
            text-align: left;
            padding: 8px;
        }

        th {
            background-color: #f2f2f2;
        }


        .back-btn {
            position: fixed;
            bottom: 10px;
            right: 10px;
            padding: 10px 20px;
            background-color: #f2f2f2;
            border: 1px solid #dddddd;
            border-radius: 5px;
            cursor: pointer;
        }

        .back-btn:hover {
        background-color: #3498db;
        color: #fff; 
    }

    </style>
</head>
<body>

<?php

require_once 'DataHandler.php';
$dataHandler = new DataHandler();
$dataHandler->fetchData();
$dataHandler->closeConnection();
?>

<a href="index.php" class="back-btn">Kembali</a>

</body>
</html>

