<?php
global $connection;
include 'navbar.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php';

// Function to generate a unique 6-digit ticket number
function generateTicketNumber($connection) {
    // Generate a random 6-digit number
    $ticketNumber = rand(100000, 999999);

    // Check if the generated number already exists in the database
    $query = "SELECT COUNT(*) AS count FROM ticket WHERE ticket_nr = '$ticketNumber'";
    $result = mysqli_query($connection, $query);
    $row = mysqli_fetch_assoc($result);
    $count = $row['count'];

    // If the generated number already exists, generate a new one recursively
    if ($count > 0) {
        return generateTicketNumber($connection);
    } else {
        return $ticketNumber;
    }
}

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $userId = $_SESSION['user_id']; // Assuming you have a session variable for user ID
    $userEmail = $_SESSION['user_email']; // Assuming you have a session variable for user email
    $userUsername = $_SESSION['user_username']; // Assuming you have a session variable for user username
    $ticketIssue = $_POST['issue'];
    $ticketType = $_POST['ticket_type']; // Assuming you have a form field for selecting ticket type

    // Generate a unique 6-digit ticket number
    $ticketNumber = generateTicketNumber($connection);

    // Insert ticket into database
    $query = "INSERT INTO ticket (user_id, ticket_issue, ticket_nr, ticket_status, user_email, user_username, ticket_type_id) 
              VALUES ('$userId', '$ticketIssue', '$ticketNumber', 'Pending', '$userEmail', '$userUsername', '$ticketType')";

    if (mysqli_query($connection, $query)) {
        // Ticket submitted successfully
        echo "<script>alert('Ticket submitted successfully.');</script>";
        echo "<script>window.location.href = 'ticket_status.php';</script>"; // Redirect to ticket status page
    } else {
        // Error in ticket submission
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
        echo "<script>window.location.href = 'submit_ticket.php';</script>"; // Redirect back to submit ticket page
    }
}

mysqli_close($connection);
?>

