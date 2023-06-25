<?php
session_start();
if ($_SESSION['username'] == null) {
   header('location:../Login.php');
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="#" />
   <link rel="stylesheet" href="../../css/styling_table.css" />
   <!-- Boxicons CDN Link -->
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin | Customers</title>
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
            <a href="../../Masuk Admin/bank/bank.php">
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
            <a href="./product.php">
               <i class="bx bx-box"></i>
               <span class="links_name">Product</span>
            </a>
         </li>
         <li>
            <a href="#">
            <i class='bx bx-shape-triangle' ></i>
               <span class="links_name">Sales</span>
            </a>
         </li>
         <li>
            <a href="../Supplier/supplier.php">
            <i class='bx bx-buildings' ></i>
               <span class="links_name">Supplier</span>
            </a>
         </li>
         <li>
            <a href="#">
            <i class='bx bxs-credit-card-alt' ></i>
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
	      <span class="admin_name">Admin</span>
	   </div>
	</nav>
	<div class="home-content">
   <h3>Daftar Produk</h3>
         <button type="button" class="btn btn-tambah">
            <a href="../Product/entry_product.php">Tambah Data</a>
         </button>
       
	   <table class="table-data">
		<thead>
		   <tr>
			<th scope="col" style="width: 15%">Nama Produk</th>
			<th scope="col" style="width: 20%">Deskripsi</th>
            <th scope="col" style="width: 15%">Harga</th>
            <th scope="col" style="width: 20%">Stok</th></th>
            <th scope="col" style="width: 20%">Action</th></th>
        </tr>
		</thead>
		<tbody>
        <tbody>
               <?php
               include '../../koneksi.php';
               $sql = "SELECT * FROM product";
               $result = mysqli_query($koneksi, $sql);
               if (mysqli_num_rows($result) == 0) {
                  echo "
			   <tr>
				<td colspan='5' style='text-align: center'>Tidak ada data</td>
			   </tr>
			     ";
               } else {
                  while ($data = mysqli_fetch_assoc($result)) {
                     echo "
				  <tr>
				     <td>$data[nama_produk]</td>
				     <td>$data[deskripsi]</td>
				     <td>$data[harga]</td>
				     <td>$data[stok]</td>
                 

				     <td>
                     <a href=product-edit.php?id=$data[id]>Edit</a> |
                     <a href=product-hapus.php?id=$data[id]>Hapus</a>
                  </td>
				   </tr>
				   ";
                  }
               }
               ?>
            </tbody>
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
