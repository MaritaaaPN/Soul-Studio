<?php 
	include 'koneksi.php';

	session_start();
	if($_SESSION['email'] == null) {
		header('location:login.php');
	}

	// Menghitung jumlah data di artist
	$sql_artist = "SELECT COUNT(*) as total_artist FROM tb_artist";
	$result_artist = $koneksi->query($sql_artist);
	$total_artist = $result_artist->fetch_assoc()['total_artist'];
	//Menghitung jumlah data di artwork
	$sql_artwork = "SELECT COUNT(*) as total_artwork FROM tb_artwork";
	$result_artwork = $koneksi->query($sql_artwork);
	$total_artwork = $result_artwork->fetch_assoc()['total_artwork'];
	//Menghitung jumlah data di exhibition
	$sql_exhibition = "SELECT COUNT(*) as total_exhibition FROM tb_exhibition";
	$result_exhibition = $koneksi->query($sql_exhibition);
	$total_exhibition = $result_exhibition->fetch_assoc()['total_exhibition'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8" />
	<link rel="icon" href="assets/SOUL1.png" />
	<link rel="stylesheet" href="css/admin.css" />
	<link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
	<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<meta name="viewport" content="width=device-width, initial-scale=1.0" />
	<title>Soul Studio</title>
</head>

<body>
	<div class="sidebar">
		<div class="logo-details">
		<i class='bx bxs-spray-can'></i>
			<span class="logo_name">Soul Studio</span>
		</div>
		<ul class="nav-links">
			<li>
				<a href="#" class="active">
				<i class='bx bxs-dashboard' ></i>
					<span class="links_name">Dashboard</span>
				</a>
			</li>
			<li>
				<a href="artist/artist.php">
				<i class='bx bxs-user-rectangle'></i>
					<span class="links_name">Artist</span>
				</a>
			</li>
			<li>
				<a href="artworks/artwork.php">
				<i class='bx bxs-palette'></i>
					<span class="links_name">Artworks</span>
				</a>
			</li>
			<li>
				<a href="exhibition/exhibition.php">
				<i class='bx bxs-store-alt'></i>
					<span class="links_name">Exhibition</span>
				</a>
			</li>
			<li>
				<a href="logout.php">
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
				<span class="dashboard">Dashboard</span>
			</div>
			<div class="profile-details">
				<span class="admin_name">Soul Admin</span>
			</div>
		</nav>
		<div class="home-content">
   <h2 id="text">
      <?php 
        echo $_SESSION['email'];
      ?>
   </h2>
   <h3 id="date"></h3>

   <div class="cardBox">
        <div class="card">
            <div>
				<div class="numbers"><?php echo $total_artist; ?></div>
					<div class="cardName">Artist</div>
				</div>
				<div class="iconBx">
				<i class='bx bxs-user-rectangle'></i>
				</div>
            </div>
        <div class="card">
            <div>
                <div class="numbers"><?php echo $total_artwork; ?></div>
                    <div class="cardName">Artwork</div>
                </div>
                 <div class="iconBx">
				 <i class='bx bxs-palette'></i>
                </div>
            </div>
		<div class="card">
            <div>
				<div class="numbers"><?php echo $total_exhibition; ?></div>
					<div class="cardName">Exhibition</div>
				</div>
				<div class="iconBx">
				<i class='bx bxs-store-alt'></i>
				</div>
            </div>
        </div>
    </div>
</div>
	</section>
	<script>
		let sidebar = document.querySelector(".sidebar");
		let sidebarBtn = document.querySelector(".sidebarBtn");
		sidebarBtn.onclick = function() {
			sidebar.classList.toggle("active");
			if (sidebar.classList.contains("active")) {
				sidebarBtn.classList.replace("bx-menu", "bx-menu-alt-right");
			} else sidebarBtn.classList.replace("bx-menu-alt-right", "bx-menu");
		};

		function myFunction() {
			const months = ["Januari", "Februari", "Maret", "April", "Mei",
				"Juni", "Juli", "Agustus", "September",
				"Oktober", "November", "Desember"
			];
			const days = ["Minggu", "Senin", "Selasa", "Rabu", "Kamis",
				"Jumat", "Sabtu"
			];
			let date = new Date();
			jam = date.getHours();
			tanggal = date.getDate();
			hari = days[date.getDay()];
			bulan = months[date.getMonth()];
			tahun = date.getFullYear();
			let m = date.getMinutes();
			let s = date.getSeconds();
			m = checkTime(m);
			s = checkTime(s);
			document.getElementById("date").innerHTML = `${hari}, ${tanggal} ${bulan} ${tahun}, ${jam}:${m}:${s}`;
			requestAnimationFrame(myFunction);
		}

		function checkTime(i) {
			if (i < 10) {
				i = "0" + i;
			}
			return i;
		}
		window.onload = function() {
			let date = new Date();
			jam = date.getHours();
			if (jam >= 4 && jam <= 10) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Pagi,");
			} else if (jam >= 11 && jam <= 14) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Siang,");
			} else if (jam >= 15 && jam <= 18) {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Sore,");
			} else {
				document.getElementById("text").insertAdjacentText("afterbegin", "Selamat Malam,");
			}
			myFunction();
		};
	</script>

<style>
    .cardBox {
	position: relative;
	width: 100%;
	padding: 20px;
	display: grid;
	grid-template-columns: repeat(3, 1fr);
	grid-gap: 50px;
  }
  
  .cardBox .card {
	position: relative;
	padding: 20px;
	border-radius: 20px;
	display: flex;
	justify-content: space-between;	
	cursor: pointer;
	box-shadow: 0 10px 25px rgba(0, 0, 0, 0.20);
  }
  
  .cardBox .card .numbers {
	position: relative;
	font-weight: 500;
	font-size: 2.5rem;
  }
  
  .cardBox .card .cardName {
	font-size: 1.3rem;
	margin-top: 5px;
  }
  
  .cardBox .card .iconBx {
	font-size: 4.5rem;
	color: #62858d;
  }

  .cardBox .card:hover {
	background: #c7c0e9;
  }
  </style>

</body>

</html>
