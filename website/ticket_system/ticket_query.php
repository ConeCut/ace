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

    // Query to count the total number of unsolved tickets in front of the user
    $queryTotalUnsolved = "SELECT COUNT(*) AS total_unsolved_tickets FROM ticket WHERE ticket_status != 'Solved' AND user_id != $userId";
    $resultTotalUnsolved = mysqli_query($connection, $queryTotalUnsolved);

    // Query to count the user's unsolved tickets
    $queryUserUnsolved = "SELECT COUNT(*) AS user_unsolved_tickets FROM ticket WHERE ticket_status != 'Solved' AND user_id = $userId";
    $resultUserUnsolved = mysqli_query($connection, $queryUserUnsolved);

    // Query to count the user's solved tickets
    $queryUserSolved = "SELECT COUNT(*) AS user_solved_tickets FROM ticket WHERE ticket_status = 'Solved' AND user_id = $userId";
    $resultUserSolved = mysqli_query($connection, $queryUserSolved);

    if ($resultTotalUnsolved && mysqli_num_rows($resultTotalUnsolved) > 0 && $resultUserUnsolved && mysqli_num_rows($resultUserUnsolved) > 0 && $resultUserSolved && mysqli_num_rows($resultUserSolved) > 0) {
        $rowTotalUnsolved = mysqli_fetch_assoc($resultTotalUnsolved);
        $totalUnsolvedTickets = $rowTotalUnsolved['total_unsolved_tickets'];

        $rowUserUnsolved = mysqli_fetch_assoc($resultUserUnsolved);
        $userUnsolvedTickets = $rowUserUnsolved['user_unsolved_tickets'];

        $rowUserSolved = mysqli_fetch_assoc($resultUserSolved);
        $userSolvedTickets = $rowUserSolved['user_solved_tickets'];

        echo "<table>";
        echo "<tr><th>Total Unsolved Tickets currently in front of you</th><th>Your Unsolved Tickets</th><th>Your Solved Tickets</th></tr>";
        echo "<tr>";
        echo "<td>$totalUnsolvedTickets</td>";
        echo "<td>$userUnsolvedTickets</td>";
        echo "<td>$userSolvedTickets</td>";
        echo "</tr>";
        echo "</table>";

        echo "<form action='tickets_all.php' method='get'>";
        echo "<button>Go Back to See All Your Tickets</button>";
        echo "</form>";
    } else {
        echo "<p>No tickets found.</p>";
    }

    mysqli_close($connection);
    ?>
</div>
</body>
</html>
