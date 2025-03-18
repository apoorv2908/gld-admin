// webroot/js/location-dropdown.js
document.addEventListener("DOMContentLoaded", function() {
    const countryDropdown = document.getElementById('country-dropdown');
    const stateDropdown = document.getElementById('state-dropdown');
    const cityDropdown = document.getElementById('city-dropdown');

    const API_KEY = 'YOUR_API_KEY'; // Replace with your API key
    const BASE_URL = 'https://api.countrystatecity.in/v1/';

    const countryCode = document.getElementById('country-code').value;
    const stateCode = document.getElementById('state-code').value;
    const cityName = document.getElementById('city-name').value;

    function fetchCountries() {
        fetch(`${BASE_URL}countries`, {
            headers: {
                "X-CSCAPI-KEY": API_KEY
            }
        })
        .then(response => response.json())
        .then(data => {
            countryDropdown.innerHTML = '<option value="">Select Country</option>';
            data.forEach(country => {
                const selected = country.iso2 === countryCode ? 'selected' : '';
                countryDropdown.innerHTML += `<option value="${country.iso2}" ${selected}>${country.name}</option>`;
            });
            if (countryCode) fetchStates(countryCode, stateCode, cityName);
        });
    }

    function fetchStates(countryCode, selectedStateCode = '', selectedCityName = '') {
        fetch(`${BASE_URL}countries/${countryCode}/states`, {
            headers: {
                "X-CSCAPI-KEY": API_KEY
            }
        })
        .then(response => response.json())
        .then(data => {
            stateDropdown.innerHTML = '<option value="">Select State</option>';
            data.forEach(state => {
                const selected = state.iso2 === selectedStateCode ? 'selected' : '';
                stateDropdown.innerHTML += `<option value="${state.iso2}" ${selected}>${state.name}</option>`;
            });
            if (selectedStateCode) fetchCities(countryCode, selectedStateCode, selectedCityName);
        });
    }

    function fetchCities(countryCode, stateCode, selectedCityName = '') {
        fetch(`${BASE_URL}countries/${countryCode}/states/${stateCode}/cities`, {
            headers: {
                "X-CSCAPI-KEY": API_KEY
            }
        })
        .then(response => response.json())
        .then(data => {
            cityDropdown.innerHTML = '<option value="">Select City</option>';
            data.forEach(city => {
                const selected = city.name === selectedCityName ? 'selected' : '';
                cityDropdown.innerHTML += `<option value="${city.name}" ${selected}>${city.name}</option>`;
            });
        });
    }

    countryDropdown.addEventListener('change', function() {
        const countryCode = this.value;
        if (countryCode) {
            fetchStates(countryCode);
        } else {
            stateDropdown.innerHTML = '<option value="">Select State</option>';
            cityDropdown.innerHTML = '<option value="">Select City</option>';
        }
    });

    stateDropdown.addEventListener('change', function() {
        const countryCode = countryDropdown.value;
        const stateCode = this.value;
        if (countryCode && stateCode) {
            fetchCities(countryCode, stateCode);
        } else {
            cityDropdown.innerHTML = '<option value="">Select City</option>';
        }
    });

    // Initialize the country dropdown on page load
    fetchCountries();
});
