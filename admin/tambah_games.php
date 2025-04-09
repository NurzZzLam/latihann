<?php

session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
     
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama_game'];
        $versi = $_POST['versi'];
        $rilis = $_POST['rilis'];
    
        $sql = "INSERT INTO game (id_game, nama_game, versi, rilis) VALUES ('','$nama', '$versi', '$rilis')";
    
        if ($conn->query($sql) === TRUE) {
            header('Location: games.php');
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }
?>

<?php
include "header.php";
?>

<div class="container-fluid">
  <div class="row">
    <?php
  include "menu.php";
  ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Games</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
          <div class="btn-group me-2">
            <button type="button" class="btn btn-sm btn-outline-secondary">Share</button>
            <button type="button" class="btn btn-sm btn-outline-secondary">Export</button>
          </div>
          <button type="button" class="btn btn-sm btn-outline-secondary dropdown-toggle d-flex align-items-center gap-1">
            <svg class="bi" aria-hidden="true"><use xlink:href="#calendar3"/></svg>
            This week
          </button>
        </div>
      </div>

      <h2> Tambah Games</h2>
      <form method="POST" action=""> 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Games</label>
        <input type="text" name="nama_game" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Versi</label>
        <input type="text" name="Versi" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Rilis</label>
        <input type="date" name="nomor_telepon" class="form-control" id="exampleInputPassword1" required>
    </div>
    <div class="d-flex">    
                            <a href="games.php" class="btn btn-secondary me-3"> Kembali</a>
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>
    </form>
    </main>
  </div>
</div>
<script defer src="../assets/dist/js/bootstrap.bundle.min.js" integrity="sha384-k6d4wzSIapyDyv1kpU366/PK5hCdSbCRGRCMv+eplOQJWyd1fbcAu9OCUj5zNLiq"></script>

    <script defer src="https://cdn.jsdelivr.net/npm/chart.js@4.3.2/dist/chart.umd.js" integrity="sha384-eI7PSr3L1XLISH8JdDII5YN/njoSsxfbrkCTnJrzXt+ENP5MOVBxD+l6sEG4zoLp" crossorigin="anonymous"></script><script defer src="dashboard.js"></script></body>
</html>
<?php
    } else { 
        header("Location: ../gagal.php"); 
    } 
?>