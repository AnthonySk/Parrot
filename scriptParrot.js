console.log("Le script est bien chargé et exécuté.");



function modifyInput() {
    console.log("Fonction modifyInput appelée");
    const select = document.getElementById('champRepairService').value;
    console.log("Valeur de select :", select);
    const text = document.querySelector('.text');
    const file = document.querySelector('.file');
    console.log("Éléments text et file :", text, file);

    if (select === 'picture') {
        console.log("Option 'picture' sélectionnée");
        file.classList.remove('d-none');
        text.classList.add('d-none');
    } else {
        console.log("Autre option sélectionnée");
        text.classList.remove('d-none');
        file.classList.add('d-none');
    }
}

const selectElement = document.getElementById('champRepairService');
selectElement.addEventListener('change', modifyInput);
