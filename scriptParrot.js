document.addEventListener('DOMContentLoaded', function() {
    console.log('script chargé');
    function showToggleMenu() {
        const list = document.getElementById('dropdownMenuList');
        list.classList.toggle('show');
    }
    const toggleMenu = document.getElementById('dropdownMenuButton').addEventListener('click', showToggleMenu);
    
    console.log('toggle menu ok');
    // MODIFY REPAIR SERVICES
    function modifyInput() {

        const selectValue = document.getElementById('champRepairService').value;
        const text = document.querySelector('.text');
        const file = document.querySelector('.file');

        if (selectValue === 'picture') {
            file.classList.remove('d-none');
            text.classList.add('d-none');
        } else {
            text.classList.remove('d-none');
            file.classList.add('d-none');
        }
    }

    const selectRepairService = document.getElementById('champRepairService');
    selectRepairService.addEventListener('change', modifyInput);

    // CHOICE SCHEDULES
    const choice = document.getElementById('durationChoice');
    function choiceDuration() {
        const houry_start_opt = document.getElementById('houry_start_opt');
        const houry_end_opt = document.getElementById('houry_end_opt');
        if (choice.checked === true) {
            houry_start_opt.classList.add('d-none');
            houry_end_opt.classList.add('d-none');
        } else {
            houry_start_opt.classList.remove('d-none');
            houry_end_opt.classList.remove('d-none');
        }
    }
    choice.addEventListener('change', choiceDuration);



    // GET THIS YEAR -> YEAR MAX for USEDCAR
    const inputYear = document.querySelectorAll('.getThisYear');
    function getCurrentYear() {
        let currentYear = new Date().getFullYear();

        for (let i = 0; i < inputYear.length; i++ ) {
            inputYear[i].setAttribute('max', currentYear);
        }
    }
    inputYear.forEach(function(eachInput) {
        eachInput.addEventListener('input', getCurrentYear);
    });

    // HIDE INPUT
    function hideInputCar() {
        const inputToDisplay = document.querySelectorAll('.toHide');
        inputToDisplay.forEach((element) => {
        element.style.display = 'none';
        });
    }

    hideInputCar();

    // MODIFY USEDCAR

    function modifyUsedCar() {
        // select value
        const usedCar_value = document.getElementById('champUsedCar').value;
        // input toHide/toDisplay
        const new_value_brand = document.getElementById('new_value_brand');
        const new_value_model = document.getElementById('new_value_model');
        const new_value_color = document.getElementById('new_value_color');
        const new_value_description = document.getElementById('new_value_description');

        const new_value_motorisation = document.getElementById('new_value_motorisation');
        const new_value_gearbox = document.getElementById('new_value_gearbox');

        const new_value_kilometers = document.getElementById('new_value_kilometers');
        const new_value_price = document.getElementById('new_value_price');
        const new_value_year = document.getElementById('new_value_year');
        const new_value_file = document.getElementById('new_value_file');
        
        // input in array
        const valueSelect = {
            'brand' : [new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file],
            'model' : [new_value_brand, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file],
            'color' : [new_value_brand, new_value_model, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file],
            'description' : [new_value_brand, new_value_model, new_value_color, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file],
            'motorisation' : [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file],
            'gearbox' : [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_kilometers, new_value_price, new_value_year, new_value_file],
            'kilometers' : [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_price, new_value_year, new_value_file],
            'price' : [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_year, new_value_file],
            'year' : [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_file],
            'picture' : [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year],
        }
        
        // reinitialisation des displays
        const value = [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file];
        console.log(value);
        value.forEach((eachValue) => {
            eachValue.style.display = '';
        })

        // boucle pour cacher les elements selon la clé du tableau choisie
        if (valueSelect[usedCar_value]) {
            valueSelect[usedCar_value].forEach(element => {
                element.style.display = 'none';
            })
        }
    }
    
    const usedCar = document.getElementById('champUsedCar');
    usedCar.addEventListener('change', modifyUsedCar);


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