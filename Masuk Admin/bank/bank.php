<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:../Login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../../css/styling_table.css" />
   <!-- Boxicons CDN Link -->
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin | Bank Terintegrasi</title>
</head>
<body>
<div class="sidebar">
      <div class="logo-details">
         <i class='bx bx-dollar-circle'></i>
         <span class="logo_name">PeelDIme</span>
      </div>
      <ul class="nav-links">
         <li>
            <a href="../../admin.php" class="active">
               <i class="bx bx-grid-alt"></i>
               <span class="links_name">Dashboard</span>
            </a>
         </li>
         <li>
            <a href="../bank/bank.php">
               <i class='bx bxs-bank'></i>
               <span class="links_name">Bank</span>
            </a>
         </li>
         <li>
            <a href="../Customers/customers.php">
               <i class='bx bx-user-voice'></i>
               <span class="links_name">Customers</span>
            </a>
         </li>
         <li>
            <a href="../Product/product.php">
               <i class="bx bx-box"></i>
               <span class="links_name">Product</span>
            </a>
         </li>
         <li>
            <a href="#">
               <i class='bx bx-shape-triangle'></i>
               <span class="links_name">Sales</span>
            </a>
         </li>
         <li>
            <a href="../../Masuk Admin/Supplier/supplier.php">
               <i class='bx bx-buildings'></i>
               <span class="links_name">Supplier</span>
            </a>
         </li>
         <li>
            <a href="#">
               <i class='bx bxs-credit-card-alt'></i>
               <span class="links_name">Transaction</span>
            </a>
         </li>
         <li>
            <a href="../Masuk Admin/karyawan/Karyawan.php">
               <i class='bx bxs-user-badge'></i>
               <span class="links_name">Karyawan</span>
            </a>
         </li>
         <li>
            <a href="#">
               <i class='bx bx-bar-chart-alt-2'></i>
               <span class="links_name">Report</span>
            </a>
         </li>
         <li>
            <a href="../../logout.php">
               <i class="bx bx-log-out"></i>
               <span class="links_name">Log out</span>
            </a>
         </li>
      </ul>
   </div>
   <section class="home-section">
	<nav>
	   <div class="sidebar-button">
		<i class="bx bx-menu sidebarBtn"></i>
	   </div>
	   <div class="profile-details">
		<span class="admin_name"> Admin</span>
	   </div>
	</nav>
	<div class="home-content">
	   <h3>Bank Terintegrasi</h3>
	   <button type="button" class="btn btn-tambah">
		<a href="../bank/entry_Bank.php">Tambah Data</a>
	   </button>
	   <button type="button" class="btn">
		<a href="../bank/bank-cetak.php">Cetak</a>
	   </button>
	   <table class="table-data">
            <thead>
              <tr>
                <th style="width: 30%">Photo</th>
                <th>Keterangan</th>
                <th style="width: 20%">Tahun</th>
                <th style="width: 30%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include '../../koneksi.php';
                $sql = "SELECT * FROM tb_bank";
                $result = mysqli_query($koneksi, $sql);
		    if(mysqli_num_rows($result) == 0) {
			echo "
			   <tr>
				<td colspan='4' align='center'>
                           Data Kosong
                        </td>
			   </tr>
				";
		    }
                while($data = mysqli_fetch_assoc($result)) {
                  echo "
                    <tr>
                      <td>
                        <img src='../../img_bank/$data[photo]' width='200px'>
                      </td>
                      <td>$data[nama_bank]</td>
                      <td>$data[tahun]</td>
                      <td>
                        <a href=bank-edit.php?id=$data[id]>
                               Edit
                        </a> | 
                        <a href=bank-hapus.php?id=$data[id]>
                            Hapus
                        </a>
                      </td>
                    </tr>
                  ";
                }
              ?>
            </tbody>
          </table>
	</div>
   </section>
   <script>
	let sidebar = document.querySelector(".sidebar");
	let sidebarBtn = document.querySelector(".sidebarBtn");
	sidebarBtn.onclick = function () {
	   sidebar.classList.toggle("active");
	   if (sidebar.classList.contains("active")) {
		sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
	   } else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
	   };
   </script>
</body>
</html>
