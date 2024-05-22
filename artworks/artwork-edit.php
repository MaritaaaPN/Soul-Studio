<?php
  include '../koneksi.php';
  $id = $_GET['id'];
  if(!isset($_GET['id'])) {
    echo "
      <script>
        alert('Tidak ada ID yang Terdeteksi');
        window.location = 'artwork.php';
      </script>
    ";
  }

  $sql = "SELECT * FROM tb_artwork WHERE id = '$id'";
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
   <title>Soul Admin | Artwork Entry</title>
</head>
<body>
   <div class="sidebar">
	<div class="logo-details">
	   <i class="bx bx-category"></i>
	   <span class="logo_name">Soul Studio</span>
	</div>
	<ul class="nav-links">
	   <li>
		<a href="../admin.php">
		   <i class="bx bx-grid-alt"></i>
		   <span class="links_name">Dashboard</span>
		</a>
	   </li>
	   <li>
		<a href="../artist/artist.php" class="active">
		   <i class="bx bx-box"></i>
		   <span class="links_name">Artist</span>
		</a>
	   </li>
	   <li>
		<a href="../artworks/artwork.php">
		   <i class="bx bx-list-ul"></i>
		   <span class="links_name">Artwork</span>
		</a>
	   </li>
       <li>
		<a href="../exhibition/exhibition.php">
		   <i class="bx bx-list-ul"></i>
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
	   <h3>Input Artwork</h3>
	   <div class="form-login">
		<form
              action="artwork-proses.php"
              method="post"
              enctype="multipart/form-data"
            >
               <input type="hidden" name="id" value="<?= $data['id'] ?>">
               <input type="hidden" name="photoLama" value="<?= $data['photo'] ?>">
               <label for="judul">Judul Artwork</label>
               <input
                 class="input"
                 type="text"
                 name="judul"
                 id="judul"
                 placeholder="judul"
                 value="<?= $data['judul'] ?>"
               />
               <label for="artist">Artist</label>
               <input
                 class="input"
                 type="text"
                 name="artist"
                 id="artist"
                 placeholder="artist"
                 value="<?= $data['artist'] ?>"
               />
               <label for="kategori">Kategori</label>
               <input
                 class="input"
                 type="text"
                 name="kategori"
                 id="kategori"
                 placeholder="kategori"
                 value="<?= $data['kategori'] ?>"
               />
                <label for="deskripsi">Deskripsi</label>
                <input
                  class="input"
                  type="text"
                  name="deskripsi"
                  id="deskripsi"
                  placeholder="deskripsi"
                  value="<?= $data['deskripsi']?>"
                />
               <label for="photo">Photo</label>
               <img src="../img_artwork/<?= $data['photo'] ?>" alt="" width="200px">
               <input
                 type="file"
                 name="photo"
                 id="photo"
                 style="margin-bottom: 20px"
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
