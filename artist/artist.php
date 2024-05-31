<?php
session_start();
if ($_SESSION['email'] == null) {
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
	<title>Soul Studio| Artist</title>
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
			<h3>Artist</h3>
			<button type="button" class="btn btn-tambah">
				<a href="artist-entry.php">Tambah Data</a>
			</button>
			<button type="button" class="btn btn-render">
				<a href="artist-cetak.php">Cetak Data</a>
			</button>
			<table class="table-data">
				<thead>
					<tr>
						<th scope="col" style="width: 15%">Nama</th>
                        <th scope="col" style="width: 15%">Tanggal Lahir</th>
						<th scope="col" style="width: 10%">Kebangsaan</th>
						<th scope="col" style="width: 10%">Gaya Seni</th>
                        <th scope="col" style="width: 25%">Biografi</th>
						<th scope="col" style="width: 25%">Action</th>
					</tr>
				</thead>
				<tbody>
				<?php
					include '../koneksi.php';
					$sql = "SELECT * FROM tb_artist";
					$result = mysqli_query($koneksi, $sql);
					if (mysqli_num_rows($result) == 0) {
						echo "
			   <tr>
				<td colspan='6' align='center'>
                           Data Kosong
                        </td>
			   </tr>
				";
					}
					while ($data = mysqli_fetch_assoc($result)) {
						echo "
                    <tr>
					  <td>$data[nama]</td>
                      <td>$data[lahir]</td>
					  <td>$data[bangsa]</td>
                      <td>$data[gaya]</td>
					  <td>$data[bio]</td>
                      <td >
                        <a class='btn-edit' href=artist-edit.php?id=$data[id]>
                               Edit
                        </a> | 
                        <a class='btn-delete' href=artist-hapus.php?id=$data[id]>
                            Hapus
                        </a>
						<a>
                         <a class='btn_detail'  onclick='showDetails(\"$data[nama]\", \"$data[lahir]\", \"$data[bangsa]\", \"$data[gaya]\", \"$data[bio]\")'>
						 Detail
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

		function showDetails(nama, lahir, bangsa, gaya, bio) {
         alert(`Nama: ${nama}\nTanggal Lahir: ${lahir}\nKebangsaan: ${bangsa}\nGaya Seni: ${gaya}\nBiografi: ${bio}`);
      }
	</script>
</body>

</html>
