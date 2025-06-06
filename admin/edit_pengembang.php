<?php
session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
    $id = $_GET['id'];
    $result = $conn->query("SELECT * FROM pengembang WHERE id_pengembang = $id");
    $row = $result->fetch_assoc();
    
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $nama = $_POST['nama_pengembang'];
        $alamat = $_POST['alamat'];
        $nomor = $_POST['nomor_telepon'];
    
        $sql = "UPDATE pengembang SET 
                nama_pengembang='$nama',   
                alamat='$alamat', 
                nomor_telepon='$nomor' 
                WHERE id_pengembang=$id";
    
        if ($conn->query($sql) === TRUE) {
            header('Location: pengembang.php');
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
        <h1 class="h2">Pengembang</h1>
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

      <h2> Edit Data Pengembang</h2>
      <form method="POST" action=""> 
    <div class="mb-3">
        <label for="exampleInputEmail1" class="form-label">Nama Pengembang</label>
        <input type="text" name="nama_pengembang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value="<?= $row['nama_pengembang']; ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Alamat</label>
        <input type="text" name="alamat" class="form-control" id="exampleInputPassword1" value="<?= $row['alamat']; ?>">
    </div>
    <div class="mb-3">
        <label for="exampleInputPassword1" class="form-label">Nomor</label>
        <input type="text" name="nomor_telepon" class="form-control" id="exampleInputPassword1" value="<?= $row['nomor_telepon']; ?>">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
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