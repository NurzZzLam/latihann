<?php

session_start();
if(isset($_SESSION['username'])) {

include '../koneksi.php';
 
$result = $conn->query("SELECT * FROM users");
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
        <h1 class="h2">Users</h1>
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

      <h2>Daftar Users</h2>
      <div class="btn-toolbar mb-2">
                            <a class="btn btn-primary" href="tambah_users.php">Tambah</a>
                        </div>
      <div class="table-responsive small">
        <table class="table table-striped table-sm">
          <thead>
            <tr>
              <th scope="col">No</th>
              <th scope="col">Username</th>
              <th scope="col">Password</th>
              <th scope="col">Level</th>
              <th scope="col">Foto</th>
              <th scope="col">Aksi</th>
            </tr>
          </thead>
          <tbody>  
            <?php $no = 1;
             while($row = mysqli_fetch_array($result)){ ?>
                <tr>
             <td><?= $no++ ?></td>
             <td><?= $row['username']; ?></td>
             <td><?= $row['password']; ?></td>  
             <td><?= $row['level']; ?></td>
             <td><?= $row['foto']; ?></td>
             <td>
             <a href="edit_users.php?id=<?= $row['username']; ?>">Edit</a> |
             <a href="delete_users.php?id=<?= $row['username']; ?>" Onclick="return confirm('Yakin ingin menghapus?')">Hapus</a>
             </td>     
            </tr>                              
            <?php } ?>                   
          </tbody>
         </table>
      </div>
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