<?php 
	session_start();
	if($_SESSION['email'] == null) {
		header('location:../login.php');
	}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="../assets/SOUL1.png" />
	<link rel="stylesheet" href="../css/admin.css" />
	<!-- Boxicons CDN Link -->
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Soul Studio | Artworks Entry</title>
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
				<span class="name">Soul Admin</span>
			</div>
		</nav>
		<div class="home-content">
			<h3>Input Artwork</h3>
			<div class="form-login">
				<form action="artwork-proses.php" method="post" enctype="multipart/form-data">
                    <label for="judul">Judul Artwork</label>
					<input class="input" type="text" name="judul" id="judul" placeholder="judul" />
					<label for="artist">Artist</label>
					<input class="input" type="text" name="artist" id="artist" placeholder="artist" />
					<label for="kategori">Kategori Artwork</label>
					<input class="input" type="text" name="kategori" id="kategori" placeholder="kategori" />
					<label for="deskripsi">Deskripsi</label>
					<input class="input" type="text" name="deskripsi" id="deskripsi" placeholder="deskripsi" />
					<label for="foto">Foto Artwork</label>
					<input type="file" name="photo" id="photo" style="margin-bottom: 20px" />
					<button type="submit" class="btn btn-simpan" name="simpan">
						Simpan
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
