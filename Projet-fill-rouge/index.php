<?php
// 1. Appel l fichier d connexion
require 'connexion.php';

// 2. Requête bsh n-jibou ga3 l-wasafat
// Zdna hna ORDER BY id_recette bsh y-jou m-rthebin nishan bhal l-gdim
$sql = "SELECT * FROM recette ORDER BY id_recette ASC";
$resultat = $pdo->query($sql);
$recettes = $resultat->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>By Aicha - Menu Dynamic</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <h1>By Aicha - Accueil</h1>
    
    <nav>
        <p>
            <a href="index.html">Accueil</a> | 
            <a href="#menu-section">Menu</a> | 
            <a href="#contact-section">Contact</a> | 
            <a href="#favoris">Favoris</a>
        </p>
    </nav>
    
    <div id="accueil" style="text-align: center;">
        <img src="Capture d'écran 2026-05-14 091152.png" alt="Enfants qui cuisinent" width="600">
    </div>

    <div id="menu-section">
        <h2>Menu</h2>

        <?php 
        // 3. Boucle bsh n-stfow l-wasafat dynamic mn la base de données
        // $index ghadi n-htafo bih bsh n-gaddo l-id dyal l-bouton "suivie"
        foreach($recettes as $index => $recette){ 
            
            // Hna n-shoufo chnou hiya l-wasfa lli jaya mn b3d bsh n-3tiw l-id l l-bouton
            $nextIndex = $index + 1;
            $nextId = isset($recettes[$nextIndex]) ? "recipe-" . $recettes[$nextIndex]['id_recette'] : "contact-section";
            ?>
            
            <div class="recipe-section" id="recipe-<?php echo $recette['id_recette']; ?>">
                <h3><?php echo htmlspecialchars($recette['titre_recette']); ?></h3>
                
                <p><strong>Ingrédients :</strong><br>
                <?php echo nl2br(htmlspecialchars($recette['ingredients'])); ?></p>
                
                <p><strong>Préparation :</strong><br>
                <?php echo nl2br(htmlspecialchars($recette['preparation'])); ?></p>
                
                <img src="<?php echo htmlspecialchars($recette['image_url']); ?>" alt="<?php echo htmlspecialchars($recette['titre_recette']); ?>" width="200">
                <br>
                
                <button class="btn-next" data-next="<?php echo $nextId; ?>">suivie</button>
            </div>
            <br>
            
        <?php } ?>
    </div>

    <br><br>

    <div class="contact-container" id="contact-section">
        <div class="contact-header">Contact</div>
    
        <img src="Capture d'écran 2026-05-19 120127.png" alt="Toque Chef" class="deco-icon icon-hat">
        <img src="../Capture d'écran 2026-05-19 115503.png" alt="Rouleau" class="deco-icon icon-roller">
        <img src="../Capture d'écran 2026-05-19 120055.png" alt="Fouet" class="deco-icon icon-whisk">
        <img src="Capture d'écran 2026-05-19 115551.png" alt="Poche à douille" class="deco-icon icon-bag">
    
        <div class="contact-card">
            <h2>Contacter_nous</h2>
            <div class="contact-info click-wa" style="cursor: pointer;">
                whatsapp: 0777522707
            </div>
            <div class="contact-info click-fb" style="cursor: pointer;">
                Faecebook: dhimin aicha
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            // Action d l-bouton "suivie"
            const buttons = document.querySelectorAll('.btn-next');
            buttons.forEach(button => {
                button.addEventListener('click', function() {
                    const nextSectionId = this.getAttribute('data-next');
                    const nextSection = document.getElementById(nextSectionId);
                    if (nextSection) {
                        nextSection.scrollIntoView({ behavior: 'smooth', block: 'start' });
                    }
                });
            });

            // Action d WhatsApp
            const whatsappBtn = document.querySelector('.click-wa');
            if (whatsappBtn) {
                whatsappBtn.addEventListener('click', function() {
                    window.open('https://wa.me/212777522707', '_blank');
                });
            }

            // Action d Facebook
            const facebookBtn = document.querySelector('.click-fb');
            if (facebookBtn) {
                facebookBtn.addEventListener('click', function() {
                    window.open('https://www.facebook.com/search/top?q=dhimin%20aicha', '_blank');
                });
            }
        });
    </script>
</body>
</html>

