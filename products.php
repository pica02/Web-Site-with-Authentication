<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Prodotti</title>
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
    <main>
        <div class="search-bar">
            <form action="search_results.html" method="get" class="search-bar">
                <input type="text" name="query" placeholder="Cerca prodotti...">
                <button type="submit">Cerca</button>
            </form>
        </div>
    </header>
            </main>
            <div class="main-container">
    <?php
            // Verifica se l'utente è amministratore
            if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
                echo '<div class="container">
        <div class="form-container">
            <form id="add-product-form">
                <label for="product_name">Nome Prodotto:</label>
                <input type="text" id="product_name" name="product_name" required><br><br>

                <label for="product_description">Descrizione Prodotto:</label><br>
                <textarea id="product_description" name="product_description" rows="4" cols="50" required></textarea><br><br>

                <label for="product_price">Prezzo Prodotto:</label>
                <input type="number" id="product_price" name="product_price" step="0.01" min="0" required><br><br>

                <label for="fileToUpload">Carica immagine:</label>
                <input type="file" name="product_image" id="fileToUpload" required><br><br>

                <button type="button" onclick="addProduct()">Aggiungi Prodotto</button>
            </form>
        </div>

        <div class="form-container">
            <h2>Anteprima Prodotto</h2>
            <div class="product-preview">
                <img id="product-image-preview" src="#" alt="Anteprima Immagine Prodotto">
                <h3 id="product-name-preview">Nome Prodotto</h3>
                <p id="product-description-preview">Descrizione Prodotto</p>
                <p id="product-price-preview">Prezzo: €0.00</p>
            </div>
        </div>
        </div>';
            }
            ?>


        <h1 style="display: flex; text-align: center; justify-content: center;">Prodotti</h1>
        
        
        <div class = products>
        <div class="product-list">
                <div class="product">
                    <img src="t-shirt.png" alt="Prodotto 1">
                    <h3>Prodotto 1</h3>
                    <p>Descrizione del prodotto 1</p>
                    <button onclick="addToCart('Prodotto 1', 10.99)">Aggiungi al carrello</button>
                    <button onclick="removeProduct(this)">Rimuovi</button>
                </div>
                <div class="product">
                    <img src="t-shirt.png" alt="Prodotto 2">
                    <h3>Prodotto 2</h3>
                    <p>Descrizione del prodotto 2</p>
                    <button onclick="addToCart('Prodotto 2', 15.99)">Aggiungi al carrello</button>
                    <button onclick="removeProduct(this)">Rimuovi</button>
                </div>
                <div class="product">
                    <img src="t-shirt.png"  alt="Prodotto 3">
                    <h3>Prodotto 3</h3>
                    <p>Descrizione del prodotto 3</p>
                    <button onclick="addToCart('Prodotto 3', 20.49)">Aggiungi al carrello</button>
                    <button onclick="removeProduct(this)">Rimuovi</button>
                </div>
                <div class="product">
                    <img src="t-shirt.png" alt="Prodotto 1">
                    <h3>Prodotto 1</h3>
                    <p>Descrizione del prodotto 1</p>
                    <button onclick="addToCart('Prodotto 1', 10.99)">Aggiungi al carrello</button>
                    <button onclick="removeProduct(this)">Rimuovi</button>
                </div>
                <div class="product">
                    <img src="t-shirt.png" alt="Prodotto 2">
                    <h3>Prodotto 2</h3>
                    <p>Descrizione del prodotto 2</p>
                    <button onclick="addToCart('Prodotto 2', 15.99)">Aggiungi al carrello</button>
                    <button onclick="removeProduct(this)">Rimuovi</button>
                </div>
                <div class="product">
                    <img src="t-shirt.png"  alt="Prodotto 3">
                    <h3>Prodotto 3</h3>
                    <p>Descrizione del prodotto 3</p>
                    <button onclick="addToCart('Prodotto 3', 20.49)">Aggiungi al carrello</button>
                    <button onclick="removeProduct(this)">Rimuovi</button>
                </div>
                
            </div>
            </div>
        <h1 style="display: flex; text-align: center; justify-content: center;">Carrello</h1>
        <div class = products>
        <div class="product-list">
        <div class="cart" id="cart">
            Carrello:
            <ul id="cart-items">
            <!-- Qui verranno visualizzati i prodotti aggiunti -->
            </ul>
            <p>Totale: <span id="cart-total">0.00</span> EUR</p>
            <button onclick="checkout()">Procedi al Checkout</button>
            </div>
            </div>
            </div>
            </div>
            </div>
            </div>
        <?php
        if (isset($_SESSION['is_admin']) && $_SESSION['is_admin']) {
            echo '<a href="admin.php" class="button">Gestisci Prodotti</a>';
        }
        ?>
    </main>
<script>
    // Carica i prodotti salvati all'avvio della pagina
document.addEventListener("DOMContentLoaded", function() {
    loadProducts();

    // Aggiungi event listener al form per gestire l'aggiunta di un nuovo prodotto
    document.getElementById('add-product-form').addEventListener('submit', function(event) {
        event.preventDefault();
        addProduct();
    });

    // Aggiorna l'anteprima del prodotto in tempo reale
    document.getElementById('product_name').addEventListener('input', updatePreview);
    document.getElementById('product_description').addEventListener('input', updatePreview);
    document.getElementById('product_price').addEventListener('input', updatePreview);
    document.getElementById('fileToUpload').addEventListener('change', updateImagePreview);
});

// Funzione per rimuovere un prodotto
function removeProduct(button) {
    var productDiv = button.parentNode; // Ottiene il genitore del pulsante cliccato

    // Rimuove il prodotto dal DOM
    productDiv.parentNode.removeChild(productDiv);

    // Aggiorna localStorage (esempio di implementazione)
    var productName = productDiv.querySelector('h3').textContent;
    var products = JSON.parse(localStorage.getItem('products')) || [];

    // Filtra l'array per rimuovere il prodotto corrispondente
    products = products.filter(function(product) {
        return product.name !== productName;
    });

    // Aggiorna localStorage con la nuova lista di prodotti
    localStorage.setItem('products', JSON.stringify(products));
}


// Funzione per caricare i prodotti salvati dal localStorage e visualizzarli
function loadProducts() {
    var products = JSON.parse(localStorage.getItem('products')) || [];

    products.forEach(function(product) {
        displayProduct(product);
    });
}

// Funzione per aggiungere un prodotto
function addProduct() {
    var productName = document.getElementById('product_name').value;
    var productDescription = document.getElementById('product_description').value;
    var productPrice = parseFloat(document.getElementById('product_price').value);
    var productImage = document.getElementById('fileToUpload').files[0];

    // Validazione
    if (!productName || !productDescription || !productPrice || !productImage || !productImage.type.startsWith('image/')) {
        alert('Completa tutti i campi correttamente per aggiungere il prodotto.');
        return;
    }

    // Salvare il prodotto nel localStorage
    var product = {
        name: productName,
        description: productDescription,
        price: productPrice.toFixed(2),
        image: URL.createObjectURL(productImage)
    };

    // Recupera l'elenco dei prodotti salvati o inizializza un array vuoto
    var products = JSON.parse(localStorage.getItem('products')) || [];

    // Aggiungi il nuovo prodotto alla lista
    products.push(product);

    // Salva l'elenco aggiornato nel localStorage
    localStorage.setItem('products', JSON.stringify(products));

    // Aggiorna l'interfaccia utente per visualizzare il prodotto aggiunto
    displayProduct(product);

    // Resetta il form
    document.getElementById('add-product-form').reset();
}

// Funzione per visualizzare un singolo prodotto nell'interfaccia utente
function displayProduct(product) {
    // Creazione del nuovo elemento prodotto
    var productElement = document.createElement('div');
    productElement.classList.add('product');

    var imgElement = document.createElement('img');
    imgElement.alt = product.name;
    imgElement.style.maxWidth = '100%';
    imgElement.style.borderRadius = '5px';
    imgElement.style.marginBottom = '10px';
    imgElement.src = product.image;
    productElement.appendChild(imgElement);

    var nameElement = document.createElement('h3');
    nameElement.textContent = product.name;
    productElement.appendChild(nameElement);

    var descriptionElement = document.createElement('p');
    descriptionElement.textContent = product.description;
    productElement.appendChild(descriptionElement);

    var priceElement = document.createElement('p');
    priceElement.textContent = 'Prezzo: €' + product.price;
    productElement.appendChild(priceElement);

    // Creazione del pulsante "Aggiungi al carrello" con addEventListener
    var buttonAddToCart = document.createElement('button');
    buttonAddToCart.textContent = 'Aggiungi al carrello';
    buttonAddToCart.addEventListener('click', function() {
       addToCart(product.name, parseFloat(product.price));
    });
    productElement.appendChild(buttonAddToCart);

    var buttonRemove = document.createElement('button');
    buttonRemove.textContent = 'Rimuovi';
    buttonRemove.addEventListener('click', function() {
        removeProduct(product.name);
    });
    productElement.appendChild(buttonRemove);

    // Aggiungi il nuovo prodotto alla lista
    var productList = document.querySelector('.product-list');
    productList.appendChild(productElement);
}

// Funzione per aggiornare l'anteprima dell'immagine
function updateImagePreview() {
    const file = document.getElementById('fileToUpload').files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const img = document.getElementById('product-image-preview');
            img.src = e.target.result;
            img.style.display = 'block';
        }
        reader.readAsDataURL(file);
    } else {
        document.getElementById('product-image-preview').src = '';
        document.getElementById('product-image-preview').style.display = 'none';
    }
}

// Funzione per aggiornare l'anteprima del prodotto
function updatePreview() {
    document.getElementById('product-name-preview').textContent = document.getElementById('product_name').value;
    document.getElementById('product-description-preview').textContent = document.getElementById('product_description').value;
    const price = document.getElementById('product_price').value;
    document.getElementById('product-price-preview').textContent = price ? `Prezzo: €${parseFloat(price).toFixed(2)}` : 'Prezzo: €0.00';
}
</script>


</body>
</html>