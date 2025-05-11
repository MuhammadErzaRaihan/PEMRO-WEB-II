<?php
function getConnection() {
    $host = "localhost";
    $user = "root";
    $pass = "";
    $db = "perpus_db";  
    $conn = new mysqli($host, $user, $pass, $db);
    if ($conn->connect_error) {
        die("Koneksi gagal: " . $conn->connect_error);
    }
    return $conn;
}
