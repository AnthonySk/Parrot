document.addEventListener('DOMContentLoaded', function() {

    // --------------------------  NAVBAR TOGGLE MENU  -------------------------- //
    function showToggleMenu() {
        const list = document.getElementById('dropdownMenuList');
        list.classList.toggle('show');
    }
    const toggleMenu = document.getElementById('dropdownMenuButton').addEventListener('click', showToggleMenu);



    // --------------------------  SLIDERS  -------------------------- //
    
    // SLIDER KILOMETER
    const sliderKilometer = document.getElementById('slider-kilometer-range');
    const initialValueKm = [40000, 111000];
    noUiSlider.create(sliderKilometer, {
        start: initialValueKm,
        connect: true,
        step: 100,
        range: {
            'min': 0,
            'max': 150000
        }
    });

    sliderKilometer.noUiSlider.on('update', function (values, handle) {
        document.getElementById('slider-range-km').innerHTML = `${parseInt(values[0])} - ${parseInt(values[1])}`;
    });

    const resetSliderKm = document.getElementById('resetSliderKm');
    resetSliderKm.addEventListener('click', () => {
        sliderKilometer.noUiSlider.set(initialValueKm);
    });

    sliderKilometer.noUiSlider.on('change', valuesFiltered);
    function valuesFiltered() {
        const priceValues = sliderKilometer.noUiSlider.get();

    }





    // SLIDER PRICE
    const sliderPrice = document.getElementById('slider-price-range');
    const initialValuePrice = [200000, 600000];
    noUiSlider.create(sliderPrice, {
        start: initialValuePrice,
        connect: true,
        step: 100,
        range: {
            'min': 0,
            'max': 800000
        }
    });
        // modify sliders
    sliderPrice.noUiSlider.on('update', function (values, handle) {
        document.getElementById('slider-range-price').innerHTML = `${parseInt(values[0])} € - ${parseInt(values[1])} €`;
    });
        // reset
    const resetSliderPrice = document.getElementById('resetSliderPrice');
    resetSliderPrice.addEventListener('click', () => {
        sliderPrice.noUiSlider.set(initialValuePrice);
    });


    // SLIDER YEAR
    const sliderYear = document.getElementById('slider-year-range');
    const initialValueYear = [1970, 2010];
    noUiSlider.create(sliderYear, {
        start: initialValueYear,
        connect: true,
        step: 1,
        range: {
            'min': 1950,
            'max': 2024
        }
    });

    sliderYear.noUiSlider.on('update', function (values, handle) {
        document.getElementById('slider-range-year').innerHTML = `${parseInt(values[0])} - ${parseInt(values[1])}`;
    });
    
    const resetSliderYear = document.getElementById('resetSliderYear');
    resetSliderYear.addEventListener('click', () => {
        sliderYear.noUiSlider.set(initialValueYear);
    });




    // --------------------------  FUNCTION FILTERED DATA  -------------------------- //
    function filteredData() {
        const kilometerValues = sliderKilometer.noUiSlider.get();
        const priceValues = sliderPrice.noUiSlider.get();
        const yearValues = sliderYear.noUiSlider.get();
        console.log('Kilometer Values:', kilometerValues);
        console.log('Price Values:', priceValues);
        console.log('Year Values:', yearValues);
        
        console.log(JSON.stringify({ // en console : {"priceMin":"200000.00","priceMax":"600000.00","kmMin":"40000.00","kmMax":"111000.00","yearMin":"1959.00","yearMax":"2010.00"}
            priceMin: priceValues[0],
            priceMax: priceValues[1],
            kmMin: kilometerValues[0],
            kmMax: kilometerValues[1],
            yearMin: yearValues[0],
            yearMax: yearValues[1]
        }));
        
        fetch('getUsedCarsData.php', {
            method: 'POST',
            headers: {'Content-Type': 'application/json'},
            body: JSON.stringify({
                priceMin: priceValues[0],
                priceMax: priceValues[1],
                kmMin: kilometerValues[0],
                kmMax: kilometerValues[1],
                yearMin: yearValues[0],
                yearMax: yearValues[1]
            }),
        })
        // verification
        .then(response => {
            if (!response.ok) {
                throw new Error('Réponse réseau non ok');
            }
            return response.json(); 
        })
        .then(data => {
            console.log('voici les donnees :', data); // en console : voici les donnees : [] 0
            showCarsFiltered(data);
        })
        .catch(error => console.error('Erreur:', error));
        console.log('fin de la fonction');
    }
    


    // --------------------------  FUNCTION SHOW CARS FILTERED  -------------------------- //
    function showCarsFiltered(cars) {
        const carList = document.getElementById('carList');
        carList.innerHTML = '';
        console.log('reinitialisation ok');
        cars.forEach((car) => {
            const cardCar = document.createElement("div");
            cardCar.classList.add("col", "d-flex", "justify-content-center", "m-2");

            cardCar.innerHTML = `<div class="card usedCardAd"> 
            <img class="card-img-top img-fluid z-0" src="${car.picture}" alt="photo de ${car.brand} ${car.model}">
            <div class="badge z-1 position-absolute p-2">${car.price} €</div>
            <div class="card-body p-1">
                <h3 class="card-title">${car.brand} ${car.model}</h3>
                <p class="card-text">${car.year}</p>
                <p class="card-text">${car.motorisation}</p>
                <p class="card-text">${car.kilometers} km</p>
                <p class="card-text">${car.price} €</p>
                <button class="btn m-2" type="button" data-bs-toggle="collapse" data-bs-target="#collapse_repairServices" aria-expanded="false" aria-controls="collapse">
                    Détails
                </button>
            </div>
        </div>`;
        console.log('fin du foreach');
        carList.appendChild(cardCar);
        })
        
    };



    sliderKilometer.noUiSlider.on('change', filteredData);
    sliderPrice.noUiSlider.on('change', filteredData);
    sliderYear.noUiSlider.on('change', filteredData);


}); 