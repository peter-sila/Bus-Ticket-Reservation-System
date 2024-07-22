<?php
//here we connect our file with the reg_log_controller which help us to connect to the database
require_once 'controllers/bookcontroller.php';

// this checks if a user is logged in and if not it redirects to the login page
if (!isset($_SESSION['user_id'])) {
    header('location: login.php');
    exit();
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Seats</title>
    <link rel="stylesheet" href="css/seat.css">
</head>
<body>

    <div class="container">
        <div id="seathead">
            <a href="userbooking.php">back</a>
            <h4>Seat Status</h4>
            <div class="seatstatus">
                <div class="availablebk">
                    <p>Available</p>
                </div><br>
                <div class="bookedbk">
                    <P>Booked</P>
                </div><br>
                <div class="selectedbk">
                    <p>Selected</p>
                </div>
            </div>
            
        </div>
        
        <table id="displayseats">
            <tr>
                <td id="1A" name="1A">1A</td>
                <td id="1B" name="1B">1B</td>
                <td class="space">&nbsp;</td>
                <td id="1C" name="1C">1C</td>
                <td id="1D" name="1D">1D</td>
                
            </tr>
            <tr>
                <td id="2A" name="2A">2A</td>
                <td id="2B" name="2B">2B</td>
                <td class="space">&nbsp;</td>
                <td id="2C" name="2C">2C</td>
                <td id="2D" name="2D">2D</td>         
            </tr>
            <tr> 
                <td class="space">&nbsp;</td>
                <td class="space">&nbsp;</td>
                <td class="space">&nbsp;</td>
                <td id="3C" name="3C">3C</td>
                <td id="3D" name="3D">3D</td>
                                        
            </tr>
            <tr>
                <td id="4A" name="4A">4A</td>  
                <td id="4B" name="4B">4B</td> 
                <td class="space">&nbsp;</td>
                <td id="4C" name="4C">4C</td>
                <td id="4D" name="4D">4D</td>  
            
            </tr>
            <tr>
                <td id="5A" name="5A">5A</td>
                <td id="5B" name="5B">5B</td>
                <td class="space">&nbsp;</td>
                <td id="5C" name="5C">5C</td>
                <td id="5D" name="5D">5D</td>  
                
            </tr>
            <tr>
                <td id="6A" name="6A">6A</td>
                <td id="6B" name="6B">6B</td>  
                <td class="space">&nbsp;</td>
                <td id="6C" name="6C">6C</td>
                <td id="6D" name="6D">6D</td>
                
            </tr>
            <tr>
                <td id="7A" name="7A">7A</td>
                <td id="7B" name="7B">7B</td>
                <td class="space">&nbsp;</td>
                <td id="7C" name="7C">7C</td>
                <td id="7D" name="7D">7D</td>
                
            </tr>
            <tr>
                <td id="8A" name="8A">8A</td>
                <td id="8B" name="8B">8B</td>
                <td class="space">&nbsp;</td>
                <td id="8C" name="8C">8C</td>
                <td id="8D" name="8D">8D</td>
                
            </tr>
            <tr>
                <td id="9A" name="9A">9A</td>
                <td id="9B" name="9B">9B</td>
                <td class="space">&nbsp;</td>
                <td id="9C" name="9C">9C</td>
                <td id="9D" name="9D">9D</td>
                
            </tr>
            <tr>
                <td id="10A" name="10A">10A</td>
                <td id="10B" name="10B">10B</td>
                <td class="space">&nbsp;</td>
                <td id="10C" name="10C">10C</td>
                <td id="10D" name="10D">10D</td>
                
            </tr>

            <tr>
                <td id="11A" name="11A">11A</td> 
                <td id="11B" name="11B">11B</td>
                <td id="11C" name="11C">11C</td>
                <td id="11D" name="11D">11D</td>
                <td id="11E" name="11E">11E</td>
                
            </tr>
        </table>
            
        <div class="seat-total">
            <p>Selected: <span id="selected-seats">0</span></p>
        </div>
        
        <div class="bookseatbtn">
            <button id="bk-seat-btn" name="book-seat-btn">BOOK</button>
        </div>

    </div>
    <script src="javascript/seats.js"></script>
</body>

</html>