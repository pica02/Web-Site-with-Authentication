<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>E-commerce</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/script.js" defer></script>
</head>
<body>
<header>
    <div class="welcome">
        <h1>Benvenuto nel nostro E-commerce</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            
            <?php
            // Verifica se l'utente è amministratore
            session_start(); // Inizia la sessione all'inizio del documento
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
                echo '<li><a href="admin.php">Admin</a></li>';
            }
            ?>
            
            <li><a href="products.php">Prodotti</a></li>
            <li>
                <?php
                // Verifica se l'utente è loggato
                if (isset($_SESSION['username'])) {
                    echo '<a href="php/logout.php">Logout</a>';
                } else {
                    echo '<a href="login.php">Login</a>';
                }
                ?>
            </li>  
        </ul>
    </nav>
    <div class="search-bar">
        <form action="search_results.html" method="get" class="search-bar">
            <input type="text" name="query" placeholder="Cerca prodotti...">
            <button type="submit">Cerca</button>
        </form>
    </div>
</header>


    <?php
    if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
        echo '<div class="admin-panel">
                <p>Benvenuto amministratore!</p>
              </div>';
    }
    ?>

    <main>
        <div class="banner">
            <h2>Offerte Speciali!</h2>
            <p>Scopri le nostre offerte imperdibili.</p>
        </div>
        <div class="products">
            <h2>Prodotti in evidenza</h2>
            <div class="product-list">
                <div class="product">
                    <img src="prodott.jpg" alt="Prodotto 1">
                    <h3>Prodotto 1</h3>
                    <p>Descrizione del prodotto 1</p>
                    <span>Prezzo: 10,99</span>
                    <button onclick="addToCart('Prodotto 1', 10.99)">Aggiungi al carrello</button>
                </div>
                <div class="product">
                    <img src="prodott.jpg" alt="Prodotto 2">
                    <h3>Prodotto 2</h3>
                    <p>Descrizione del prodotto 2</p>
                    <span>Prezzo: 15,99</span>
                    <button onclick="addToCart('Prodotto 2', 15.99)">Aggiungi al carrello</button>
                </div>
                <div class="product">
                    <img src="prodott.jpg"  alt="Prodotto 3">
                    <h3>Prodotto 3</h3>
                    <p>Descrizione del prodotto 3</p>
                    <span>Prezzo: 20,49</span>
                    <button onclick="addToCart('Prodotto 3', 20.49)">Aggiungi al carrello</button>
                </div>
            </div>
            <div class="cart" id="cart">
            Carrello:
            <ul id="cart-items">
            <!-- Qui verranno visualizzati i prodotti aggiunti -->
            </ul>
            <p>Totale: <span id="cart-total">0.00</span> EUR</p>
            <button onclick="checkout()">Procedi al Checkout</button>
            </div>
        </div>
        <div class="reviews">
            <h2>Recensioni dei Clienti</h2>
            <div class="review-slider">
                <div class="review" id="review1">"Ottimo prodotto! Lo consiglio a tutti." - Marco</div>
                <div class="review" id="review2">"Servizio eccellente e spedizione veloce." - Laura</div>
                <div class="review" id="review3">"Qualità superiore, sono molto soddisfatto." - Giovanni</div>
                <div class="review" id="review4">"Prezzi competitivi e vasta scelta." - Anna</div>
                <div class="review" id="review5">"Esperienza di acquisto fantastica." - Luca</div>
            </div>
            <button onclick="prevReview()">&#10094;</button>
            <button onclick="nextReview()">&#10095;</button>
        </div>
    </main>
    <footer>
        <div class="footer-content">
            <div class="footer-section">
                <h3>Contatti</h3>
                <p>Indirizzo: Via Roma, 123, 50100 Firenze, Italia</p>
                <p>Telefono: +39 055 123456</p>
                <p>Email: info@ecommerce.it</p>
            </div>
            <div class="footer-section">
                <h3>Link Utili</h3>
                <ul>
                    <li><a href="#">Privacy Policy</a></li>
                    <li><a href="#">Termini e Condizioni</a></li>
                    <li><a href="#">Contattaci</a></li>
                </ul>
            </div>
        </div>
    </footer>
</body>
</html>

