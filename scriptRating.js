document.addEventListener('DOMContentLoaded', function() {


// SHOW STAR RATING bi bi-star-fill
    // Ajout d'écouteurs d'événements 'change' à chaque input radio
    document.querySelectorAll('.rating input[type="radio"]').forEach(input => {
        input.addEventListener('change', function() {
            // Récupère tous les labels jusqu'à la valeur sélectionnée
            let ratingValue = parseInt(this.value, 10);
            let stars = document.querySelectorAll('.blueStar');
            
            // Réinitialise toutes les étoiles
            stars.forEach((star) => {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            });

            // Remplit les étoiles jusqu'à la valeur sélectionnée
            for (let i = 0; i < ratingValue; i++) {
                if (stars[i]) { // Ajoutez cette vérification pour s'assurer que stars[i] existe
                    stars[i].classList.remove('bi-star');
                    stars[i].classList.add('bi-star-fill');
                } else {
                    console.log('stars n existe pas');
                }
            }
        });
    });

}); 