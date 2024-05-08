<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Home</title>
    <link rel="icon" href="assets/SOUL1.png" />
    <link rel="stylesheet" href="css/style.css" />
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@400..700&display=swap" rel="stylesheet">
</head>

<body>
    <header>
        <div class="jumbotron">
            <img src="assets/SOUL1.png" alt="" />
            <h2>Awaken Your Artistic Soul</h2>
            <p>Bersiaplah Untuk Memulai Perjalanan Seni Anda dan Temukan Kedalaman Kreativitas Dalam Diri</p>
            <nav>
                <ul>
                    <li>
                        <a href="login.php">Login</a>
                    </li>
                    <li>
                        <a href="index.php">Home</a>
                    </li>
                    <li>
                        <a href="#">Menu</a>
                    </li>
                    <li>
                        <a href="#">Categories</a>
                    </li>
                    <li>
                        <a href="#">About Me</a>
                    </li>
                </ul>
            </nav>
        </div>
    </header>

    <main>
        <section class="gallery">
            <div class="carousel">
                <div class="cards-container">
                    <div class="card">
                        <img src="assets/lukis1.jpg" alt="" />
                    </div>

                    <div class="card">
                        <img src="assets/senilukis.jpg" alt="" />
                    </div>

                    <div class="card">
                        <img src="assets/lukis3.jpeg" alt="" />
                    </div>

                    <div class="card">
                        <img src="assets/lukis4.jpeg" alt="" />
                    </div>

                    <div class="card">
                        <img src="assets/lukis5.jpeg" alt="" />
                    </div>

                    <div class="card">
                        <img src="assets/lukis6.jpeg" alt="" />
                    </div>

                    <button class="prev" onclick="moveCarousel(-1)">❮</button>
                    <button class="next" onclick="moveCarousel(1)">❯</button>
                </div>
            </div>
        </section>

        <section class="description">
            <div class="cards-container">
                <div class="card">
                    <h1 align="center">Welcome to Soul Studio</h1>
                    <p align="center">Soul Studio adalah ruang kreatif yang didedikasikan untuk membangkitkan jiwa melalui seni. Kami mengajak Anda semua untuk bergabung bersama kami dalam perjalanan artistik ini. Silahkan klik tombol di bawah untuk bersiap memulai perjalanan yang sesungguhnya.</p>
                </div>
            </div>
            <div class="button-container">
                <div class="button">
                    <input
                      id="getStartedButton"
                      type="button"
                      class="button"
                      name="btn_proses"
                      value="Let's Start The Journey" />
                </div>
            </div>
        </section>
    </main>

    <footer>
        <h4>&copy; Soul Studio 2024</h4>
    </footer>

    <!-- Script DOM -->
    <script>
        // Mengambil elemen tombol "Get Started" dari DOM
        const getStartedButton = document.getElementById('getStartedButton');

        // Menambahkan event listener untuk menangani klik pada tombol "Get Started"
        getStartedButton.addEventListener('click', function() {
            
            // Alert Box
            alert('Welcome to Soul Studio! Let\'s start your artistic journey.');

            // Confirm Box
            var confirmation = confirm('Are you ready to dive into the world of art?');
            if (confirmation) {
                alert('Great! Let\'s get started.');
            } else {
                alert('No problem! Take your time.');
            }

            // Prompt Box
            var name = prompt('Please enter your name:');
            if (name !== null && name !== '') {
                alert('Nice to meet you, ' + name + '! Enjoy your journey at Soul Studio.');
            } else {
                alert('No worries! Feel free to explore anonymously.');
            }
        });

        var currentIndex = 0;
        var cards = document.querySelectorAll('.card');

        function moveCarousel(n) {
            currentIndex += n;
            showCards();
        }

        function showCards() {
            var visibleCards = 3; // Menentukan jumlah kartu yang ditampilkan
            var lastIndex = cards.length - visibleCards;

            if (currentIndex < 0) {
                currentIndex = 0;
            } else if (currentIndex > lastIndex) {
                currentIndex = lastIndex;
            }

            var translateValue = -currentIndex * (cards[0].offsetWidth + 20); // Menghitung nilai translasi
            document.querySelector('.cards-container').style.transform = 'translateX(' + translateValue + 'px)';
        }
    </script>
</body>
</html>

