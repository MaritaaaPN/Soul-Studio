<!DOCTYPE html>
<html lang="en">

<head>
   <meta charset="UTF-8" /> 
   <link rel="icon" href="../assets/SOUL1.png" />
   <link rel="stylesheet" href="../css/admin.css" />
   <!-- Boxicons CDN Link -->
   <link href="https://unpkg.com/boxicons@2.0.7/css/boxicons.min.css" rel="stylesheet" />
   <meta name="viewport" content="width=device-width, initial-scale=1.0" />
   <title>Soul Studio | Exhibition</title>
</head>

<body>
   <div class="sidebar">
      <div class="logo-details">
         <i class="bx bx-category"></i>
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
         <h3>Exhibition</h3>
         <table class="table-data">
            <thead>
               <tr>
                  <th>Nama</th>
                  <th>Lokasi</th>
                  <th>Deskripsi</th>
                  <th>Status</th>
                  <th>Action</th>
               </tr>
            </thead>
            <tbody>
               <tr>
                  <td>Van Gogh and the Sunflowers</td>
                  <td>Van Gogh Museum, Amsterdam</td>
                  <td>
                     Pameran ini menampilkan berbagai lukisan bunga matahari karya Van Gogh, 
                     memberikan wawasan mendalam tentang teknik, inspirasi, dan pengaruhnya.
                  </td>
                  <td>
                     <p class="Ada">Success</p>
                  </td>
                  <td>
                     <button class="btn_detail"
                        onclick="showDetails('10-12-2024', 'Marita Putri Nabila', 'Starry Night Over the Rhône', 'Seni Lukis', 'Success')">Detail</button>
                  </td>
               </tr>
               <!-- Add more rows as needed -->
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
      function showDetails(tanggal, nama, kategori, status) {
         alert(`Tanggal: ${tanggal}\nNama: ${nama}\nJudul: ${judul}\nKategori: ${kategori}\nStatus: ${status}`);
      }
   </script>
</body>
