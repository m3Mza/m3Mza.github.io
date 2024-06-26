
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mirkova Kujna | Registracija</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="nalozi.css">
    <link rel="icon" href="slike/ikonica.ico" type="image/x-icon">
</head>
<body>

<!-- SVG responzivna kriva-->

    <div class="svg-kontejner">
      <svg viewbox="0 0 800 400" class="svg">
        <path id="curve" fill="#50c6d8" d="M 800 300 Q 400 350 0 300 L 0 0 L 800 0 L 800 300 Z">
        </path>
      </svg>
    </div>
  
<header>
    <h1>Kreacija Naloga, listaj dole 📝</h1>
</header>

<main>


    <!-- Navigacioni meni koji iskace -->
    <section class="fiksirani-meni">
        <nav>
            <ul>
                <li><a href="index.html">POČETNA</a></li>
                <li><a href="recepti.html">RECEPTI</a></li>
                <li><a href="kontakt.html">INFO</a></li>
                <li class="account-dropdown">
                    <a href="#" class="account-toggle"><img src="slike/nalog.svg" alt="Dropdown za nalog" class="account-icon"></a>
                    <ul class="dropdown-menu">
                        <li><a href="kreiraj-nalog.php">Kreiraj nalog</a></li>
                        <!-- Ovde dodajes jos opcija za nalog -->
                    </ul>
                </li>
            </ul>
        </nav>
    </section>

    <div class="gazda-kontejner">
    <div class="forma-kontejner">
        <form action="registracija.php" method="POST" class="forma">
            <div class="forma-grupa">
                <label for="username">Korisnicko ime:</label>
                <input type="text" id="username" name="username" required>
            </div>
            <div class="forma-grupa">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="forma-grupa">
                <label for="lozinka">Lozinka:</label>
                <input type="password" id="lozinka" name="lozinka" required>
            </div>
            <div class="forma-grupa">
                <input type="submit" value="Registruj Se!">
            </div>
        </form>
    </div>
</div>


</main>


<footer>
    <div class="footer-content">
      <div class="footer-logo">
        <img src="slike/logo.png" alt="Mirkova Kujna Logo">
      </div>
      <div>
        <br><br><br>
        <div class="footer-linkovi">
          <a href="index.html">POČETNA</a>
          <a href="recepti.html">RECEPTI</a>
          <a href="kontakt.html">INFO</a>
        </div>
      </div>
      <div class="footer-info">
        <br><br><br>
        <small>Mirkova Kujna, 2024.</small>
        <small>Lokacija: Zrenjanin</small>
        <small>EMAIL: mimamirkop@gmail.com</small>
        <a href="https://www.instagram.com/nikonigde21/"><small>Instagram</small></a>
      </div>
    </div>
  </footer>
  

  

<script src="script.js"></script>    
</body>



</html>