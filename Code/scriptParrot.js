document.addEventListener('DOMContentLoaded', function() {

        /////// VISITEUR ///////
    // TOGGLE MENU NAVBAR
    function showToggleMenu() {
        const list = document.getElementById('dropdownMenuList');
        list.classList.toggle('show');
    }
    const toggleMenu = document.getElementById('dropdownMenuButton');
    toggleMenu.addEventListener('click', showToggleMenu);



    // SHOW STAR RATING
    const star = document.querySelectorAll('.rating input[type="radio"]');
    star.forEach(input => {
        input.addEventListener('change', function() {

            const ratingValue = parseInt(this.value, 10);
            const stars = document.querySelectorAll('.star');
            console.log(ratingValue);
            // REINITIALIZE STARS
            stars.forEach((star) => {
                star.classList.remove('bi-star-fill');
                star.classList.add('bi-star');
            });

            // COLORED STAR FOR SELECTIONNATED STARS
            for (let i = 0; i < ratingValue; i++) {
                    stars[i].classList.remove('bi-star');
                    stars[i].classList.add('bi-star-fill');
            };
        });
    });



    // SHOW MSG
    const messages = document.querySelectorAll('.message');
    let index = 0;

    function showMessage() {

        messages.forEach((message) => {
            message.classList.add('d-none');
        })

        messages[index].classList.remove('d-none');
        index === messages.length - 1 ? index = 0 : index++;

        setTimeout(showMessage, 5000);
    }

    showMessage();

}); 