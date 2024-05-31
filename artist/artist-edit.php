<?php
  include '../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'artist.php';
      </script>
    ";
  }

  $sql = "SELECT * FROM tb_artist WHERE id = '$id'";
  $result = mysqli_query($koneksi, $sql);
  $data = mysqli_fetch_assoc($result);

	session_start();
	if($_SESSION['email'] == null) {
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
   <title>Soul Admin | Artist Entry</title>
</head>
<body>
<div class="sidebar">
		<div class="logo-details">
		<i class='bx bxs-spray-can'></i>
			<span class="logo_name">Soul Studio</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="../admin.php" class="active">
				<i class='bx bxs-dashboard' ></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="../artist/artist.php">
				<i class='bx bxs-user-rectangle'></i>
					<span class="links_name">Artist</span>
				</a>
			</li>
			<li>
				<a href="../artworks/artwork.php">
				<i class='bx bxs-palette'></i>
					<span class="links_name">Artworks</span>
				</a>
			</li>
			<li>
				<a href="../exhibition/exhibition.php">
				<i class='bx bxs-store-alt'></i>
					<span class="links_name">Exhibition</span>
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
		<span class="admin_name">Soul Admin</span>
	   </div>
	</nav>
	<div class="home-content">
	   <h3>Input Artist</h3>
	   <div class="form-login">
		<form
              action="artist-proses.php"
              method="post"
              enctype="multipart/form-data"
            >
               <input type="hidden" name="id" value="<?= $data['id'] ?>">
               <label for="nama">Nama</label>
               <input
                 class="input"
                 type="text"
                 name="nama"
                 id="nama"
                 placeholder="nama"
                 value="<?= $data['nama'] ?>"
               />
               <label for="lahir">Tanggal Lahir</label>
               <input
                 class="input"
                 type="date"
                 name="lahir"
                 id="lahir"
                 placeholder="lahir"
                 value="<?= $data['lahir'] ?>"
               />
               <label for="bangsa">Kebangsaan</label>
               <input
                 class="input"
                 type="text"
                 name="bangsa"
                 id="bangsa"
                 placeholder="bangsa"
                 value="<?= $data['bangsa'] ?>"
               />
                <label for="gaya">Gaya Seni</label>
                <input
                  class="input"
                  type="text"
                  name="gaya"
                  id="gaya"
                  placeholder="gaya"
                  value="<?= $data['gaya']?>"
                />
                <label for="bio">Biografi</label>
                <input
                  class="input"
                  type="text"
                  name="bio"
                  id="bio"
                  placeholder="bio"
                  value="<?= $data['bio']?>"
                />
               <button type="submit" class="btn btn-simpan" name="edit">
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
