document.addEventListener('DOMContentLoaded', function() {

        /////// CONNECTÉ ///////


    // HIDE INPUT
    function hideInputModify() {
        const inputToDisplay = document.querySelectorAll('.toHide');
        inputToDisplay.forEach((element) => {
        element.style.display = 'none';
        });
    }
    hideInputModify();



    // MODIFY EMPLOYEE
    function modifyEmployee() {
        // VALUE SELECT
        const employee_value = document.getElementById('champEmployee').value;

        // INPUT TO HIDE/DISPLAY
        const new_value_firstname = document.getElementById('new_value_first_name');
        const new_value_lastname = document.getElementById('new_value_last_name');
        const new_value_role = document.getElementById('new_value_role');
        const new_value_address = document.getElementById('new_value_address');
        const new_value_birthdate = document.getElementById('new_value_birthdate');
        const new_value_mail = document.getElementById('new_value_mail');
        const new_value_password = document.getElementById('new_value_password');
        
        // INPUT IN ARRAY
        const valueSelectEmployee = {
            'first_name' : [new_value_lastname, new_value_role, new_value_address, new_value_birthdate, new_value_mail, new_value_password],
            'last_name' : [ new_value_firstname, new_value_role, new_value_address, new_value_birthdate, new_value_mail, new_value_password],
            'role' : [new_value_lastname, new_value_firstname, new_value_address, new_value_birthdate, new_value_mail, new_value_password],
            'address' : [new_value_lastname, new_value_firstname, new_value_role, new_value_birthdate, new_value_mail, new_value_password],
            'birthdate' : [new_value_lastname, new_value_firstname, new_value_role, new_value_address, new_value_mail, new_value_password],
            'mail' : [new_value_lastname, new_value_firstname, new_value_role, new_value_address, new_value_birthdate, new_value_password],
            'password' : [new_value_lastname, new_value_firstname, new_value_role, new_value_address, new_value_birthdate, new_value_mail]
        };

        // REINITIALIZE INPUT'S DISPLAY
        const displayInput = [new_value_firstname, new_value_lastname, new_value_role, new_value_address, new_value_birthdate, new_value_mail, new_value_password];
        displayInput.forEach((eachInput) => {
            eachInput.style.display = '';
        });

        // HIDE ALL INPUT EXCEPT SELECT
        if (valueSelectEmployee[employee_value]) {
            valueSelectEmployee[employee_value].forEach((input) => {
                input.style.display = 'none';
            })
        }
    }

    const employee = document.getElementById('champEmployee');
    employee.addEventListener('change', modifyEmployee);



    // MODIFY REPAIR SERVICES
    function modifyRepairServices() {
        // VALUE SELECT
        const repairService_value = document.getElementById('champRepairService').value;
        

        // INPUT TO HIDE/DISPLAY
        const new_value_name = document.getElementById('new_value_name');
        const new_value_price = document.getElementById('new_value_price_repairService');
        const new_value_describe = document.getElementById('new_value_describe');
        const new_value_file = document.getElementById('new_value_file_repairService');
        
        // INPUT IN ARRAY
        const valueSelectRepairService = {
            'name' : [new_value_price, new_value_describe, new_value_file],
            'price' : [new_value_name, new_value_describe, new_value_file],
            'description' : [new_value_name, new_value_price, new_value_file],
            'picture' : [new_value_name, new_value_price, new_value_describe]
        };

        // REINITIALIZE INPUT'S DISPLAY
        const displayInput = [new_value_name, new_value_price, new_value_describe, new_value_file];
        displayInput.forEach((eachInput) => {
            eachInput.style.display = '';
        });

        // HIDE ALL INPUT EXCEPT SELECT
        if (valueSelectRepairService[repairService_value]) {
            valueSelectRepairService[repairService_value].forEach(input => {
                input.style.display = 'none';
            });
        };
    }

    const repairService = document.getElementById('champRepairService');
    repairService.addEventListener('change', modifyRepairServices);



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

        for (let input of inputYear) {
            input.setAttribute('max', currentYear);
        }
    }
    getCurrentYear();



    // MODIFY USEDCAR
    function modifyUsedCar() {
        
        // VALUE SELECT
        const usedCar_value = document.getElementById('champUsedCar').value;

        // // INPUT TO HIDE/DISPLAY
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
        
        // INPUT IN ARRAY
        const valueSelectCar = {
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
        };
        
        // REINITIALIZE INPUT'S DISPLAY
        const displayInput = [new_value_brand, new_value_model, new_value_color, new_value_description, new_value_motorisation, new_value_gearbox, new_value_kilometers, new_value_price, new_value_year, new_value_file];
        displayInput.forEach((eachInput) => {
            eachInput.style.display = '';
        });

        // HIDE ALL INPUT EXCEPT SELECT
        if (valueSelectCar[usedCar_value]) {
            valueSelectCar[usedCar_value].forEach(input => {
                input.style.display = 'none';
            });
        };
    }
    
    const usedCar = document.getElementById('champUsedCar');
    usedCar.addEventListener('change', modifyUsedCar);



}); 