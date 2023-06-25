<?php 
  include '../../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
    <script>
    alert('Tidak ada ID yang Terdeteksi');
    window.location = 'customers.php';
    </script>
    ";
  }
  
  $sql = "SELECT * FROM customer WHERE id = '$id'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);
  
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
			rel="stylesheet"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin | Customers Edit</title>
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
	   <h3>Input Customers</h3>
	   <div class="form-login">
		<form action="customers-proses.php" method="post">
               <input type="hidden" name="id" value="<?= $data['id'] ?>">
			<label for="nama">Nama Toko</label>
			<input
			   class="input"
			   type="text"
			   name="nama_toko"
			   id="nama"
			   placeholder="Nama Toko"
                     value="<?= $data['nama_toko'] ?>"
			/>
			<label for="email"></label>
			<input
			   class="input"
			   type="text"
			   name="email"
			   id="email"
			   placeholder="Tahun"
                     value="<?= $data['email'] ?>"
			/>
			<label for="telp">Telp</label>
			<input
			   class="input"
			   type="text"
			   name="telp"
			   id="telp"
			   placeholder="Telp"
                     value="<?= $data['Telp'] ?>"
			/>
			<label for="alamat">Alamat</label>
			<input
               class="input"
			   type="text"
			   name="alamat"
			   id="alamat"
               placeholder="Telp"
                     value="<?= $data['Alamat'] ?>"
			/>

            <label for="tgl">Tanggal</label>
			<input
             class="input"
			   type="date"
			   name="tgl"
			   id="tgl"
			   style="margin-bottom: 20px"
                     value="<?= $data['tanggal'] ?>"
			/>

		      <button type="submit" class="btn btn-simpan" name="edit"> 
                <!-- // tetep name edit -->
			   Edit
			</button>
		</form>
	   </div>
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
