document.addEventListener('DOMContentLoaded', function() {

    function showToggleMenu() {
        const list = document.getElementById('dropdownMenuList');
        list.classList.toggle('show');
    }
    const toggleMenu = document.getElementById('dropdownMenuButton').addEventListener('click', showToggleMenu);

}); 