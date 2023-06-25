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

  $sql = "SELECT * FROM customers WHERE id = '$id'";
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
			rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Admin | Bank</title>
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
	   <h3>Hapus Data</h3>
         <div class="form-login">
              <h4>Ingin Menghapus Data ?</h4>
              <form action="inputbank-proses.php" method="post">
                 <input type="hidden" name="id" value="<?= $data['id'] ?>">
                 <button type="submit" class="btn" name="hapus" style="margin-top: 50px;">
                    Yes
                 </button>
                 <button type="submit" class="btn" name="tidak">
                    No
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
