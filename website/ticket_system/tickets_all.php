<?php global $connection;
include 'navbar.php'; ?>
<?php
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php';

// Fetch all tickets for the user from the database
$userId = $_SESSION['user_id'];
$query = "SELECT * FROM ticket WHERE user_id = $userId";
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Your Ticket Status</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Your Ticket Status</h1>

    <?php
    // Display ticket status for each ticket
    while ($row = mysqli_fetch_assoc($result)) {
        echo "<div class='ticket-status'>";
        echo "<h2>Ticket Number: " . $row['ticket_nr'] . "</h2>";
        echo "<p><strong>Description:</strong> " . $row['ticket_issue'] . "</p>";
        echo "<p><strong>Status:</strong> " . $row['ticket_status'] . "</p>";
        // Add more details as needed
        echo "</div>";
    }
    ?>

</div>

<!-- Footer -->
<div class="footer">
    <p>&copy; 2024 Your Company</p>
</div>
</body>
</html>
