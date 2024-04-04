<?php
global $connection;
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php';
include 'navbar.php'; // Include navbar at the top

// Check if the user is logged in and is an admin
if (!isset($_SESSION['user_id'])) {
    header("Location: index.php"); // Redirect non-logged-in users to the homepage
    exit();
}

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
    header('Location: index.php');
}

// Fetch all tickets
$query = "SELECT * FROM ticket";
$result = mysqli_query($connection, $query);

// Process search query
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($connection, $_GET['search']); // Sanitize input
    $query = "SELECT * FROM ticket WHERE ticket_nr LIKE '%$search%' OR ticket_issue LIKE '%$search%' OR user_username LIKE '%$search%'";
} else {
    // Fetch all tickets if no search query is provided
    $query = "SELECT * FROM ticket";
}
$result = mysqli_query($connection, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Tickets</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Admin Tickets</h1>
    <!-- Search form -->
    <form action="" method="GET">
        <input type="text" name="search" placeholder="Search tickets..." value="<?php echo isset($_GET['search']) ? htmlspecialchars($_GET['search']) : ''; ?>">
        <input type="submit" value="Search">
    </form>
    <br>

    <!-- Display tickets -->
    <table>
        <tr>
            <th>Ticket Number</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Ticket Issue</th>
            <th>Status</th>
        </tr>
        <?php
        // Display tickets
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<td>" . $row['ticket_nr'] . "</td>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['user_username'] . "</td>";
            echo "<td>" . $row['ticket_issue'] . "</td>";
            echo "<td>" . $row['ticket_status'] . "</td>";
            // Add more cells with ticket details as needed
            echo "</tr>";
        }
        ?>
    </table>
</div>
</body>
</html>
