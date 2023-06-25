<?php 
	session_start();
	if($_SESSION['username'] == null) {
		header('location:../login.php');
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="../assets/icon.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <!-- Boxicons CDN Link -->
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Catshop Admin | Categories</title>
</head>
<body>
   <div class="sidebar">
	<div class="logo-details">
	   <i class="bx bx-category"></i>
	   <span class="logo_name">CatShop</span>
	</div>
	<ul class="nav-links">
	   <li>
		<a href="../admin.php">
		   <i class="bx bx-grid-alt"></i>
		   <span class="links_name">Dashboard</span>
		</a>
	   </li>
	   <li>
		<a href="../categories/categories.php" class="active">
		   <i class="bx bx-box"></i>
		   <span class="links_name">Categories</span>
		</a>
	   </li>
	   <li>
		<a href="../transaction/transaction.php">
		   <i class="bx bx-list-ul"></i>
		   <span class="links_name">Transaction</span>
		</a>
	   </li>
	   <li>
		<a href="../logout.php">
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
		<span class="admin_name">Catshop Admin</span>
	   </div>
	</nav>
	<div class="home-content">
	   <h3>Categories</h3>
	   <button type="button" class="btn btn-tambah">
		<a href="categories-entry.php">Tambah Data</a>
	   </button>
	   <button type="button" class="btn">
		<a href="categories-cetak.php">Cetak</a>
	   </button>
	   <table class="table-data">
            <thead>
              <tr>
                <th style="width: 30%">Photo</th>
                <th>Categories</th>
                <th style="width: 20%">Price</th>
                <th style="width: 30%">Action</th>
              </tr>
            </thead>
            <tbody>
              <?php 
                include '../koneksi.php';
                $sql = "SELECT * FROM tb_categories";
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
                        <img src='../img_categories/$data[photo]' width='200px'>
                      </td>
                      <td>$data[categories]</td>
                      <td>$data[price]</td>
                      <td>
                        <a href=categories-edit.php?id=$data[id]>
                               Edit
                        </a> | 
                        <a href=categories-hapus.php?id=$data[id]>
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
