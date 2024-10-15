document.getElementById('reservation-form').addEventListener('submit', function(event) {
    event.preventDefault();
    
    const departure = document.getElementById('departure').value;
    const destination = document.getElementById('destination').value;
    const date = document.getElementById('date').value;

    fetch('db.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
        },
        body: JSON.stringify({ departure, destination, date }),
    })
    .then(response => response.json())
    .then(data => {
        let resultDiv = document.getElementById('result');
        if (data.length > 0) {
            resultDiv.innerHTML = '<h3>Available Buses:</h3><ul>' + data.map(bus => `<li>${bus.name} - ${bus.time} - ${bus.seats} seats available</li>`).join('') + '</ul>';
        } else {
            resultDiv.innerHTML = '<h3>No buses available.</h3>';
        }
    })
    .catch(error => console.error('Error:', error));
});
