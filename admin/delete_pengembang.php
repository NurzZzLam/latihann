<?php
session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
$id = $_GET['id'];
$sql = "DELETE FROM pengembang WHERE id_pengembang = $id";
 
if ($conn->query($sql) === TRUE) {
    header('Location: pengembang.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else { 
    header("Location: ../gagal.php"); 
} 
?>