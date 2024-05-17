<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
	<meta charset="UTF-8" /> 
	<link rel="icon" href="../assets/SOUL1.png" />
	<link rel="stylesheet" href="../css/admin.css" />
	<!-- Boxicons CDN Link -->
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Soul Studio| Artworks</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
			<i class="bx bx-artwork"></i>
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
				<span class="admin_name">Admin</span>
			</div>
		</nav>
		<div class="home-content">
			<h3>Artworks</h3>
			<button type="button" class="btn btn-tambah">
				<a href="artworks-entry.php">Tambah Data</a>
			</button>
			<table class="table-data">
				<thead>
					<tr>
						<th scope="col" style="width: 20%">Foto Artwork</th>
                        <th scope="col" style="width: 20%">Judul</th>
                        <th>Kategori</th>
						<th scope="col" style="width: 30%">Deskripsi</th>
						<th scope="col" style="width: 20%">Action</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><img src="../assets/senilukis.jpg" alt="" /></td>
						<td>Starry Night Over the Rhône</td>
                        <td>Seni Lukis</td>
						<td>Lukisan tersebut berjudul Starry Night Over the Rhône, adalah karya dari Vincent van Gogh, 
                            seorang pelukis Belanda yang terkenal dengan gaya Impresionisme dan Post-Impresionisme.
                            Lukisan ini menunjukkan karakteristik Impresionisme, seperti penggunaan warna yang cerah dan 
                            sapuan kuas yang terlihat, namun juga menunjukkan ciri khas Van Gogh, seperti penggunaan bentuk 
                            yang tidak realistis dan fokus pada ekspresi.</td>
						<td>
							<button class="btn-edit" onclick="editCategory()">Edit</button>
							<button class="btn-delete" onclick="deleteCategory()">Hapus</button>
						</td>
					</tr>
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
