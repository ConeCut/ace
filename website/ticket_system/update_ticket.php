<?php
global $connection;
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php';

// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $ticketId = $_POST['ticket_id'];
    $ticketIssue = $_POST['ticket_issue'];
    $ticketStatus = $_POST['ticket_status'];

    // Update ticket in the database
    $query = "UPDATE ticket SET ticket_issue = '$ticketIssue', ticket_status = '$ticketStatus' WHERE id = $ticketId";

    if (mysqli_query($connection, $query)) {
        // Ticket updated successfully
        echo "<script>alert('Ticket updated successfully.');</script>";
        echo "<script>window.location.href = 'admin_tickets.php';</script>"; // Redirect to admin tickets page
    } else {
        // Error in updating ticket
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
        echo "<script>window.location.href = 'admin_tickets.php';</script>"; // Redirect back to admin tickets page
    }
}


