<!DOCTYPE html>
<html lang="en">	
<head>
   <meta charset="UTF-8" />
   <link rel="icon" href="#" />
   <link rel="stylesheet" href="../css/styling.css" />
   <!-- Boxicons CDN Link -->
   <link
	href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css"
			rel="stylesheet"/>
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title> Admin | Entry Karyawan</title>
</head>
<body>
   <div class="sidebar">
	<div class="logo-details">
	   <i class="bx bx-category"></i>
	   <span class="logo_name">PeelDime</span>
	</div>
	<ul class="nav-links">
          <li>
           <a href="./dasboard.php" class="active">
              <i class="bx bx-grid-alt"></i>
              <span class="links_name">Dashboard</span>
           </a>
          </li>
          <li>
           <a href="./bank/bank.php">
              <i class="bx bx-box"></i>
              <span class="links_name">Bank</span>
           </a>
          </li>
          <li>
           <a href="#">
              <i class="bx bx-box"></i>
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
              <i class="bx bx-box"></i>
              <span class="links_name">Sales</span>
           </a>
          </li>
          <li>
           <a href="#">
              <i class="bx bx-box"></i>
              <span class="links_name">Supplier</span>
           </a>
          </li>
          <li>
           <a href="#">
              <i class="bx bx-box"></i>
              <span class="links_name">Sales</span>
           </a>
          </li>
          <li>
             <a href="./karyawan/Karyawan.php">
               <i class='bx bxs-user-badge'></i>
              <span class="links_name">Transaction</span>
           </a>
          </li>
          <li>
           <a href="#">
              <i class="bx bx-log-out"></i>
              <span class="links_name">Report</span>
           </a>
          </li>
          <li>
            <a href="#">
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
	   <h3>Input Anggota</h3>
	   <div class="form-login">
	   <form action="./karyawan-proses.php" method="post">
		   <label for="nama">Nama</label>
		   <input class="input" type="text" name="nama"
				id="nama" placeholder="Nama" />
		   <label for="jenis">Jabatan</label>
		   <input class="input" type="text" name="jabatan"
				id="jabatan" placeholder="Jabatan" />
		   <label for="tanggal">Tanggal Masuk</label>
		   <input class="input" type="text" name="tanggal"
				id="Tanggal" placeholder="Tanggal Masuk" />
		   <label for="telp">No Telp</label>
		   <input class="input" type="date" name="telp"
				id="telp" style="margin-bottom: 20px" />
		   <button type="submit" class="btn btn-simpan" 
                        name="simpan">
			      Simpan
		   </button>
		</form>
	   </div>
	</div>
   </section>
</body>
</html>
