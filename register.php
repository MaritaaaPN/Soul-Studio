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
        <form id="registerForm">
          <div class="user-box">
            <input type="text" id="nama" name="" required="">
            <label>Full Name</label>
          </div>
          <div class="user-box">
            <input type="email" id="email" name="" required="">
            <label for="email">Email Address</label>
          </div>
          <div class="user-box">
            <input type="username" id="username" name="" required="">
            <label for="username">Username</label>
          </div>
          <div class="user-box">
            <input type="password" id="password" name="" required="">
            <label>Password</label>
          </div>
          <div class="user-box">
            <input type="password" id="confirmPassword" name="" required="">
            <label>Confirm Password</label>
          </div>
          <input type="submit" name="" value="Register" onClick="submitForm()">
        </form>
        <div class="login-link">
          <a href="login.php">Login Here</a>
        </div>
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
      var confirmPassword = document.getElementById("confirmPassword").value;
      // Alert jika terdapat kolom yang kosong
      if (nama.trim() === "" || email.trim() === "" || username.trim() === "" || password.trim() === "" || confirmPassword.trim() === "") {
        alert("Please Fill Out All Fields!");
        return;
      }
      // Alert jika confirmPassword tidak cocok dengan password yang dimasukkan
      if (password !== confirmPassword) {
        alert("Passwords do not match!");
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