<?php
session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
$id = $_GET['id'];
$sql = "DELETE FROM game WHERE id_game = $id";
 
if ($conn->query($sql) === TRUE) {
    header('Location: games.php');
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

} else { 
    header("Location: ../gagal.php"); 
} 
?>