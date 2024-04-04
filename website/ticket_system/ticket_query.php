<?php global $connection;
include 'navbar.php'; ?>
<?php
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ticket Query</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Ticket Query</h1>
    <?php

    // Assuming you have a session variable for user ID
    $userId = $_SESSION['user_id'];

    // Query to fetch the ticket number for the logged-in user
    $query = "SELECT ticket_nr FROM ticket WHERE user_id = $userId";
    $result = mysqli_query($connection, $query);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $ticketNumber = $row['ticket_nr'];
        echo "<p>Your ticket number is: $ticketNumber</p>";
    } else {
        echo "<p>No tickets found for your account.</p>";
    }

    mysqli_close($connection);
    ?>
</div>
</body>
</html>
