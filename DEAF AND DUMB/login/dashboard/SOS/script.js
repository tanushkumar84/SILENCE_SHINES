const map = L.map('map').setView([51.505, -0.09], 13); // Initializes map with initial coordinates and zoom level

L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    maxZoom: 19,
    attribution: '© <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
}).addTo(map); // Sets map data source and associates with map

let marker, circle, zoomed;

navigator.geolocation.watchPosition(success, error);

function success(pos) {
    const lat = pos.coords.latitude;
    const lng = pos.coords.longitude;
    const accuracy = pos.coords.accuracy;

    if (marker) {
        map.removeLayer(marker);
        map.removeLayer(circle);
    }

    marker = L.marker([lat, lng]).addTo(map);
    circle = L.circle([lat, lng], { radius: accuracy }).addTo(map);

    if (!zoomed) {
        zoomed = map.fitBounds(circle.getBounds());
    }

    map.setView([lat, lng]);

    document.getElementById('output').innerText = `
    User coordinates: 
    Latitude ${lat}.
    Longitude ${lng}.
    Estimation accurate within ${Math.round(accuracy)} metres.`;

    // Automatically send the location when the page loads
    sendLocation(lat, lng);
}

function error(err) {
    if (err.code === 1) {
        alert("Please allow geolocation access");
    } else {
        alert("Cannot get current location");
    }
}

function sendLocation(latitude, longitude) {
    const subject = "My Location";
    const body = `Latitude: ${latitude}, Longitude: ${longitude}`;
    const url = `mailto:saumilgupta1400@gmail.com,ksood0207@gmail.com,karanpathakji113@gmail.com?subject=${encodeURIComponent(subject)}&body=${encodeURIComponent(body)}`;
    window.location.href = url;
}
