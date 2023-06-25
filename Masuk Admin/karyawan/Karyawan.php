<?php
session_start();
if ($_SESSION['username'] == null) {
   header('location:Login.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="#" />
   <link rel="stylesheet" href="../css/styling.css" />
   <!-- Boxicons CDN Link -->
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin | Karyawan</title>
</head>
   <body>
	<div class="sidebar">
      <div class="logo-details">
         <i class='bx bx-dollar-circle'></i>
         <span class="logo_name">PeelDime</span>
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
            <a href="../Customers/costomers.php">
               <i class='bx bx-user-voice'></i>
               <span class="links_name">Customers</span>
            </a>
         </li>
         <li>
            <a href="#">
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
            <a href="#">
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
            <a href="../karyawan/Karyawan.php">
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
            <a href="./logout.php">
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
		<h3>Anggota</h3>
		<button type="button" class="btn btn-tambah">
		   <a href="entry_karyawan.php">Tambah Data</a>
		</button>
		<table class="table-data">
		   <thead>
			<tr>
			  <th style="width: 20%">Nama</th>
			  <th>Jabatan</th>
			  <th style="width: 20%">Tanggal Masuk</th>
			  <th style="width: 20%">No_Telp</th>
			  <th>Action</th>
			</tr>
		   </thead>
		   <tbody>
			<tr>
			   <td>Hagrid</td>
			   <td>Admin 1</td>
			   <td>13-05-2020</td>
			   <td>085-956-3247-032</td>
			   <td><a href="">Edit</a> | <a href="">Hapus</a></td>
			</tr>
		   </tbody>
		</table>
	   </div>
	</section>
</body>
</html>
