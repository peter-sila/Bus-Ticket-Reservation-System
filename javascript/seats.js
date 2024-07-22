document.addEventListener('DOMContentLoaded', function() {
    // Select all seat elements
    const seats = document.querySelectorAll('#displayseats td');

    console.log(seats); // Log the seats to see if they are correctly selected

    // Get the book button element
    const bookButton = document.querySelector('[id="bk-seat-btn"]');

    let selectedSeatsCount = 0; // Rename to selectedSeatsCount to avoid confusion

    // Event listener for seat click
    seats.forEach(seat => {
        seat.addEventListener('click', function() {
            console.log('Seat clicked:', seat.id); // Log to see if the click event is triggered
            if (!seat.classList.contains('booked')) {
                seat.classList.toggle('selected');
                updateSelectedSeats(); // update the count of the number of seats selected
                updateSessionVariable();
                updateBookButtonState();
                updateSelectedSeatNames(); // Update selected seat names when a seat is clicked
            }
        });
    });

    // Event listener for book button click
    bookButton.addEventListener('click', function() {
        // Get the selected seats
        const selectedSeats = document.querySelectorAll('.selected');

        // Check if any seats are selected
        if (selectedSeats.length === 0) {
            alert('Please select at least one seat.');
            return; // Exit the function if no seats are selected
        }

        // Redirect to booking detail page
        window.location.href = 'bookingdetails.php';
    });


    // Function to update selected seats count
    function updateSelectedSeats() {
        selectedSeatsCount = document.querySelectorAll('.selected').length;
        document.getElementById('selected-seats').textContent = selectedSeatsCount;
    }

    // Function to update book button state
    function updateBookButtonState() {
        if (selectedSeatsCount > 0) {
            bookButton.disabled = false; // Enable button if seats are selected
        } else {
            bookButton.disabled = true; // Disable button if no seats are selected
        }
    }

    // Function to update session with seat names
    function updateSelectedSeatNames() {
        // Get the selected seats
        const selectedSeats = document.querySelectorAll('.selected');

        // Extract seat names from selected seats
        const selectedSeatNames = Array.from(selectedSeats).map(seat => seat.id);

        // Send an AJAX request to update the session variable with seat names
        fetch('updateseatnames.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ SelectedSeatNames: selectedSeatNames }), // Send selected seat names as an array
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update session variable with seat names');
            }
        })
        .catch(error => {
            console.error('Error updating session variable with seat names:', error);
        });
    }


    // Function to update session variable
    function updateSessionVariable() {
        // Send an AJAX request to update the session variable
        fetch('updateselectedseats.php', {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
            },
            body: JSON.stringify({ selectedSeatsCount: selectedSeatsCount }),
        })
        .then(response => {
            if (!response.ok) {
                throw new Error('Failed to update session variable');
            }
        })
        .catch(error => {
            console.error('Error updating session variable:', error);
        });
    }
    
    // Fetch booked seats from the database and mark them as booked initially
    fetch('getbookedseats.php')
        .then(response => response.json())
        .then(data => {
            const bookedSeats = data.bookedSeats;

            // Mark booked seats as 'booked'
            bookedSeats.forEach(seatid => {
                const bookedSeat = document.getElementById(`${seatid}`);
                if (bookedSeat) {
                    bookedSeat.classList.add('booked');
                }
            });
        })
        .catch(error => {
            console.error('Error fetching booked seats:', error);
        });
});
