<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="../assets/SOUL1.png" />
	<link rel="stylesheet" href="../css/admin.css" />
	<!-- Boxicons CDN Link -->
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Soul Studio | Artist Entry</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<i class="bx bx-artworks"></i>
			<span class="logo_name">Soul Studio</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="../admin.php" class="active">
					<i class="bx bx-grid-alt"></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
            <li>
				<a href="../artist/artist.php">
					<i class="bx bx-box"></i>
					<span class="links_name">Artist</span>
				</a>
			</li>
			<li>
				<a href="../artworks/artworks.php">
					<i class="bx bx-box"></i>
					<span class="links_name">Artworks</span>
				</a>
			</li>
			<li>
				<a href="../exhibition/exhibition.php">
					<i class="bx bx-list-ul"></i>
					<span class="links_name">Exhibition</span>
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
				<span class="name">Admin</span>
			</div>
		</nav>
		<div class="home-content">
			<h3>Input Artist</h3>
			<div class="form-login">
				<form action="">
                    <label for="nama">Nama</label>
					<input class="input" type="text" name="nama" id="nama" placeholder="nama" />
					<label for="lahir">Tanggal Lahir</label>
					<input class="input" type="text" name="lahir" id="lahir" placeholder="lahir" />
					<label for="bangsa">Kebangsaan</label>
					<input class="input" type="text" name="bangsa" id="bangsa" placeholder="bangsa" />
                    <label for="bio">Biografi</label>
					<input class="input" type="text" name="bio" id="bio" placeholder="bio" />
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
