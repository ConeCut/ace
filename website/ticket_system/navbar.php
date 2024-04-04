<?php
global $connection;
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php'; // Include database connection

// Check if the user is logged in
if (!isset($_SESSION['user_id'])) {
    echo 'log in first';
}
else {
// Fetch is_admin value for the logged-in user from the database
    $userId = $_SESSION['user_id'];
    $query = "SELECT is_admin FROM users WHERE id = $userId";
    $result = mysqli_query($connection, $query);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $isAdmin = $row['is_admin'];
    } else {
        // Error handling: unable to fetch is_admin value
        $isAdmin = false;
    }
}
?>

<div class="navbar">
    <a href="index.php">Home</a>
    <a href="submit_ticket.php">Submit Ticket</a>
    <a href="ticket_status.php">Ticket Status</a>
    <a href="tickets_all.php">All Tickets</a>
    <?php
    // Display admin page link only if user is admin
    if (isset($_SESSION['user_id']) && $isAdmin == 1) {
        echo '<a href="admin_tickets.php">Admin Tickets</a>';
    } else{
        echo '';
    }
    ?>
</div>
