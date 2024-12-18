document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById("travelForm");
    const tripType = form.elements["trip-type"];
    const classSelection = document.getElementById("classSelection");
    const numberOfPeople = form.elements["people"];
    const departureCity = document.getElementById("departure-city");
    const arrivalCity = document.getElementById("arrival-city");
    const scanPriceButton = document.querySelector(".scanPrice");
    const nextButton = document.querySelector(".next-button"); // Add Next button
    const priceDisplay = document.getElementById("priceDisplay");
    const currencySelection = document.getElementById("currencySelection");
    const travelTimeDisplay = document.getElementById("travelTimeDisplay");
    const promoDisplay = document.getElementById("promoDisplay");
    const infoMessage = document.getElementById("infoMessage");

    // Ticket modal elements
    const ticketFirstName = document.getElementById("ticket-first-name");
    const ticketLastName = document.getElementById("ticket-last-name");
    const ticketTripType = document.getElementById("ticket-trip-type");
    const ticketPeople = document.getElementById("ticket-people");
    const ticketTotalPrice = document.getElementById("ticket-total-price");

    let totalPrice = 0; // Store the total price

    // Set base prices and distances
    const basePrices = {
        economy: 100,
        business: 200,
    };

    const distances = {
        "Eastern province(Zambia)": 800,
        "Western province(Zambia)": 600,
        "Southern province(Zambia)": 500,
    };

    const currencyRates = {
        EUR: 0.92,
        GBP: 0.75,
        ZMW: 25.00,
    };

    // Function to calculate estimated travel time (hours) based on distance
    function calculateTravelTime(distance) {
        const averageSpeed = 500;
        return (distance / averageSpeed).toFixed(2);
    }

    // Function to apply promo or discount
    function applyPromo(tripType, people) {
        if (tripType === "round-trip" && people > 3) {
            return "Group discount applied: 10% off for 4+ people on round trips!";
        }
        return "";
    }

    // Function to display info messages (e.g., warnings)
    function displayInfoMessage(departure, arrival) {
        if (departure === arrival) {
            return "Warning: Departure and Arrival cities cannot be the same!";
        }
        return "";
    }

    // Function to calculate and display the price
    function calculatePrice() {
        const selectedTripType = form.querySelector('input[name="trip-type"]:checked').value;
        const selectedClass = classSelection.value;
        const selectedPeople = parseInt(numberOfPeople.value, 10);
        const selectedDepartureCity = departureCity.value;
        const selectedArrivalCity = arrivalCity.value;
        const selectedCurrency = currencySelection.value;

        const distance = distances[selectedArrivalCity] || 500;

        let basePrice = basePrices[selectedClass] || 100;

        if (selectedTripType === "round-trip") {
            basePrice *= 2;
        }

        totalPrice = basePrice * selectedPeople * (distance / 1000);

        const promoMessage = applyPromo(selectedTripType, selectedPeople);
        promoDisplay.textContent = promoMessage;

        const infoMessageText = displayInfoMessage(selectedDepartureCity, selectedArrivalCity);
        infoMessage.textContent = infoMessageText;

        if (selectedCurrency !== "USD") {
            totalPrice *= currencyRates[selectedCurrency];
        }

        priceDisplay.innerHTML = `
            <strong>Total Price:</strong> ${selectedCurrency} ${totalPrice.toFixed(2)}<br>
            <strong>Breakdown:</strong> ${selectedPeople} people, ${selectedTripType === "round-trip" ? "Round Trip" : "One-Way"}<br>
            Class: ${selectedClass.charAt(0).toUpperCase() + selectedClass.slice(1)}, Distance: ${distance} km
        `;

        const travelTime = calculateTravelTime(distance);
        travelTimeDisplay.textContent = `Estimated Travel Time: ${travelTime} hours`;
    }

    // Event listener for the "Scan Price" button
    scanPriceButton.addEventListener("click", function (event) {
        event.preventDefault();
        calculatePrice();
    });

    // Event listener to update price dynamically when currency changes
    currencySelection.addEventListener("change", function () {
        calculatePrice();
    });

    // Event listener for the "Next" button
    nextButton.addEventListener("click", function () {
        // Update ticket modal with calculated values
        ticketFirstName.textContent = "John"; // Replace with user input if available
        ticketLastName.textContent = "Doe"; // Replace with user input if available
        ticketTripType.textContent = form.querySelector('input[name="trip-type"]:checked').value;
        ticketPeople.textContent = numberOfPeople.value;
        ticketTotalPrice.textContent = `${currencySelection.value} ${totalPrice.toFixed(2)}`;

        // Show the ticket modal (Bootstrap modal example)
        $("#ticketModal").modal("show");
    });
});
