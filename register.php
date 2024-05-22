<!DOCTYPE html>
<html lang="en">
<head>
  <title>Register</title>
  <link rel="icon" href="assets/SOUL1.png" />
  <link rel="stylesheet" href="css/lore.css" />
</head>
<body>
  <div class="container">
    <header>
      <div class="lore-box">
        <div class="logo">
          <img src="assets/SOUL1.png" alt="" />
        </div>
        <h2>REGISTER</h2>
        <form action="register-proses.php" method="post">
          <div class="user-box">
            <input type="text" name="nama" required="">
            <label>Full Name</label>
          </div>
          <div class="user-box">
            <input type="email" name="email" required="">
            <label for="email">Email Address</label>
          </div>
          <div class="user-box">
            <input type="text" name="username" required="">
            <label for="username">Username</label>
          </div>
          <div class="user-box">
            <input type="password" name="password" required="">
            <label>Password</label>
          </div>
          <input type="submit" name="register" value="Register"> 
        </form>
        
      </div>
    </header>
  </div>
  <footer>
    <h4>&copy; Soul Studio 2024</h4>
  </footer>

  <script>
    // Asyncronous, Web Storages (Local Storages), Promise
    async function submitForm() {
      var nama = document.getElementById("nama").value;
      var email = document.getElementById("email").value;
      var username = document.getElementById("username").value;
      var password = document.getElementById("password").value;

      // Alert jika terdapat kolom yang kosong
      if (nama.trim() === "" || email.trim() === "" || username.trim() === "" || password.trim() === "") {
        alert("Please Fill Out All Fields!");
        return;
      }

      // Promise untuk konfirmasi proses register
      var confirmation = confirm("Are You Sure You Want To Register?");
      if (confirmation) {
        await new Promise(resolve => setTimeout(resolve, 1000)); // Simulasi proses register dengan delay 1 detik
        alert("Registration Successful!");

        // Local Storages untuk penyimpanan data pengguna
        localStorage.setItem("nama", nama);
        localStorage.setItem("email", email);
        localStorage.setItem("username", username);
        localStorage.setItem("password", password);

        // Redirect menuju halaman Login
        window.location.href = "login.php"; 
      }
    }
  </script>
  
</body>
</html>
