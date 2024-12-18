document.getElementById('searchForm').addEventListener('submit', function (e) {
    e.preventDefault();

    const loadingBar = document.getElementById('loadingBar');
    loadingBar.style.display = 'block';

    const circle = document.querySelector('.progress-ring__circle');
    const radius = circle.r.baseVal.value;
    const circumference = 2 * Math.PI * radius;

    circle.style.strokeDasharray = `${circumference} ${circumference}`;
    circle.style.strokeDashoffset = `${circumference}`;

    setTimeout(() => {
        circle.style.strokeDashoffset = '0'; 
    }, 50); 

    setTimeout(function () {
        loadingBar.style.display = 'none';

        const fromCity = document.getElementById('from').value.trim();
        const toCity = document.getElementById('to').value.trim();
        const departureDateInput = document.getElementById('departureDate').value;
        const returnDateInput = document.getElementById('returnDate').value;

        if (!fromCity || !toCity) {
            alert("Please enter both departure and arrival cities.");
            return;
        }

        // Optional date parsing if the user enters a date
        const departureDate = departureDateInput ? new Date(departureDateInput) : null;
        const returnDate = returnDateInput ? new Date(returnDateInput) : null;

        // Validate date order: if both dates are entered, return date must be after departure date
        if (departureDate && returnDate && returnDate < departureDate) {
            alert("Please enter a return date that is after the departure date.");
            return;
        }

    const mockFlights = [
    { from: 'Lusaka', to: 'Livingstone', price: 'ZMW 3500', departure: '2024-10-24', return: '2024-10-25', duration: '1h 30min', stops: 'Non-stop', flightOptions: ['ProFlight Zambia'], image: 'Photos/ProFlight.jfif' },
    { from: 'Lusaka', to: 'Livingstone', price: 'ZMW 4000', departure: '2024-10-29', return: '2024-11-01', duration: '1h 30min', stops: 'Non-stop', flightOptions: ['Zambian Airways'], image: 'Photos/zed airways.jfif' },
    { from: 'Lusaka', to: 'Livingstone', price: 'ZMW 4200', departure: '2024-11-02', return: '2024-11-05', duration: '1h 30min', stops: 'Non-stop', flightOptions: ['Travel Agent'], image: 'Photos/Travel-img.jfif' },
    { from: 'USA', to: 'Zambia', price: 'ZMW 35000', departure: '2024-12-25', return: '2024-12-30', duration: '18h 10min', stops: '3-stops', flightOptions: ['Fly Emirates', 'Zambian Airways'], image: 'photos/ndola.jpg' },
    { from: 'South Africa', to: 'Eastern', price: 'ZMW 18000', departure: '2024-12-25', return: '2025-01-01', duration: '5h 15min', stops: '1 stop', flightOptions: ['ProFlight', 'South Africa Airways'], image: 'photos/sa_airways.jpg' },
    { from: 'Lusaka', to: 'Ndola', price: 'ZMW 2500', departure: '2024-11-05', return: '2024-11-12', duration: '1h 15min', stops: 'Non-stop', flightOptions: ['ProFlight Zambia'], image: 'photos/ndola.jpg' },
    { from: 'Lusaka', to: 'Cape Town', price: 'ZMW 50000', departure: '2024-11-15', return: '2024-11-22', duration: '5h 30min', stops: '1 stop', flightOptions: ['Fly Emirates', 'South African Airways'], image: 'photos/cape_town.jpg' },
    { from: 'Lusaka', to: 'New York', price: 'ZMW 75000', departure: '2024-12-01', return: '2024-12-15', duration: '20h 45min', stops: '2-stops', flightOptions: ['Delta Airlines', 'American Airlines'], image: 'photos/new_york.jpg' },
    { from: 'Lusaka', to: 'Harare', price: 'ZMW 1800', departure: '2024-11-10', return: '2024-11-14', duration: '1h 10min', stops: 'Non-stop', flightOptions: ['Air Zimbabwe'], image: 'photos/harare.jpg' },
    { from: 'Livingstone', to: 'Victoria Falls', price: 'ZMW 1200', departure: '2024-10-30', return: '2024-10-31', duration: '30min', stops: 'Non-stop', flightOptions: ['Zambezi Airlines'], image: 'photos/victoria_falls.jpg' },
    { from: 'Lusaka', to: 'Dubai', price: 'ZMW 90000', departure: '2024-12-20', return: '2025-01-05', duration: '10h 0min', stops: '1 stop', flightOptions: ['Fly Emirates'], image: 'photos/dubai.jpg' },
    { from: 'Johannesburg', to: 'Lusaka', price: 'ZMW 3500', departure: '2024-11-25', return: '2024-12-02', duration: '1h 50min', stops: 'Non-stop', flightOptions: ['South African Airways'], image: 'photos/lusaka.jpg' }
];

        const searchResults = mockFlights.filter(flight => {
            const flightDepartureDate = new Date(flight.departure);
            const flightReturnDate = flight.return ? new Date(flight.return) : null;

            const fromMatch = flight.from.toLowerCase() === fromCity.toLowerCase();
            const toMatch = flight.to.toLowerCase() === toCity.toLowerCase();

            // Match dates only if input dates are provided, otherwise ignore
            const departureMatch = !departureDate || flightDepartureDate >= departureDate;
            const returnMatch = !returnDate || (flightReturnDate && flightReturnDate >= returnDate);

            return fromMatch && toMatch && departureMatch && returnMatch;
        });

        const resultsContainer = document.getElementById('searchResults');
        resultsContainer.innerHTML = '';

        if (searchResults.length > 0) {
            searchResults.forEach(result => {
                result.flightOptions.forEach(flightOption => {
                    const resultCard = document.createElement('div');
                    resultCard.className = 'search-result-card';

                    resultCard.innerHTML = `
                        <div class="search-result-image">
                            <img src="${result.image}" alt="${result.to}">
                        </div>
                        <div class="search-result-content">
                            <h4><i class="fas fa-map-marker-alt"></i> ${result.from} to ${result.to}</h4>
                            <p><i class="far fa-calendar-alt"></i> Departure: ${result.departure}</p>
                            <p><i class="fas fa-plane-arrival"></i> Return: ${result.return || 'N/A'}</p>
                            <p><i class="fas fa-clock"></i> Duration: ${result.duration}</p>
                            <p><i class="fas fa-exchange-alt"></i> Stops: ${result.stops}</p>
                            <p><i class="fas fa-plane"></i> Flight: ${flightOption}</p>
                            <h5 class="search-result-amount"><i class="fas fa-coins"></i> Price: ${result.price}</h5>
                            <a href="details-page.html?flight=${flightOption}&from=${result.from}&to=${result.to}&departure=${result.departure}" class="view-details-btn">View Details</a>
                        </div>
                    `;
                    resultsContainer.appendChild(resultCard);
                });
            });
        } else {
            resultsContainer.innerHTML = '<p class="no-flights-found"><i class="fas fa-exclamation-circle"></i> No flights found matching your search criteria.</p>';
        }
    }, 3000);
});
