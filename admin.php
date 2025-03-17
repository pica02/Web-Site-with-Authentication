<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Gestione Prodotti</title>
    <link rel="stylesheet" href="css/style.css">
    <script src="js/newProducts.js"></script>
</head>
<body>

<header>
    <div class="welcome">
        <h1>Gestione Prodotti</h1>
    </div>
    <nav>
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="products.php">Prodotti</a></li>
            <li><a href="cart.php">Carrello</a></li>
        </ul>
    </nav>

    <label for="product_category">Categoria:</label>
      <select id="product_category" name="product_category">
        <option value="elettronica">Elettronica</option>
        <option value="abbigliamento">Abbigliamento</option>
        <option value="cibo">Cibo</option>
      </select>

    <div class="search-bar">
        <form action="search_results.html" method="get" class="search-bar">
            <input type="text" name="query" placeholder="Cerca prodotti...">
            <button type="submit">Cerca</button>
        </form>
    </div>
</header>

<main>
    <div class="container">
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


        <label for='currency'>Valuta</label>
          <select id='currency' onchange='updateCurrency()>
              <option value='$'></option>
              <option value='£'></option>
          </select>


        <script>
            // Aggiungi event listener agli input per aggiornare l'anteprima in tempo reale
document.getElementById('product_name').addEventListener('input', updatePreview);
document.getElementById('product_description').addEventListener('input', updatePreview);
document.getElementById('product_price').addEventListener('input', updatePreview);
document.getElementById('fileToUpload').addEventListener('change', updateImagePreview);

// Funzione per aggiornare l'anteprima del prodotto
function updatePreview() {
    document.getElementById('product-name-preview').textContent = document.getElementById('product_name').value;
    document.getElementById('product-description-preview').textContent = document.getElementById('product_description').value;
    const price = document.getElementById('product_price').value;
    document.getElementById('product-price-preview').textContent = price ? `Prezzo: €${parseFloat(price).toFixed(2)}` : 'Prezzo: €0.00';
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

            function updateCurrency(){
                const currency = document.getElementById('currency');
                const price = document.getElementById('product_price');
                document.getElementById('product-price-preview').textContent = 'Prezzo: ${currency}.{parseFloat(price).toFixed(2)}' : 'Prezzo ${currency} 0.00'
            }
        </script>
        

</main>
</body>
</html>



