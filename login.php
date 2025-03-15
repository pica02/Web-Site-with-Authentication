<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Login</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <div class="welcome">
            <h1>Benvenuto nel nostro E-commerce</h1>
        </div>
        <nav>
            <ul>
                <li><a href="index.php">Home</a></li>
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

    <div class="container">
        <div class="form-container">
            <h2>Accedi al tuo account</h2>
            <?php
            // Verifica se il parametro GET error è impostato e mostra il messaggio di errore appropriato
            if (isset($_GET['error']) && $_GET['error'] === 'invalid_credentials') {
                echo "<p style='color: red; text-align: center;'>Credenziali non valide. Riprova.</p>";
            }
            ?>
            <form action="php/auth.php" method="post">
                <div class="input-group">
                    <label for="username">Username:</label>
                    <input type="text" id="username" name="username" required>
                </div>
                <div class="input-group">
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                </div>
                <button type="submit" class="btn">Login</button>
            </form>
            <p>Non hai un account? <a href="register.html">Registrati</a></p>
        </div>
    </div>
</body>
</html>
