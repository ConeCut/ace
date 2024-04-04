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

// Process form submission for modifying tickets
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $ticketId = $_POST['ticket_id'];
    $ticketIssue = $_POST['ticket_issue'];
    $ticketStatus = $_POST['ticket_status'];
    $ticketSolution = $_POST['ticket_solution'];

    // Update ticket in the database
    $updateQuery = "UPDATE ticket SET ticket_issue = '$ticketIssue', ticket_status = '$ticketStatus', ticket_solution = '$ticketSolution' WHERE id = $ticketId";
    if (mysqli_query($connection, $updateQuery)) {
        // Ticket updated successfully
        echo "<script>alert('Ticket updated successfully.');</script>";
    } else {
        // Error updating ticket
        echo "<script>alert('Error updating ticket: " . mysqli_error($connection) . "');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Page</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<div class="container">
    <h1>Admin Page - Manage Tickets</h1>
    <table>
        <tr>
            <th>Ticket ID</th>
            <th>User ID</th>
            <th>User Name</th>
            <th>Ticket Issue</th>
            <th>Ticket Status</th>
            <th>Ticket Solution</th>
            <th>Action</th>
        </tr>
        <?php
        // Display tickets
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<tr>";
            echo "<form action='' method='POST'>";
            echo "<td>" . $row['id'] . "<input type='hidden' name='ticket_id' value='" . $row['id'] . "'></td>";
            echo "<td>" . $row['user_id'] . "</td>";
            echo "<td>" . $row['user_username'] . "</td>";
            echo "<td><input type='text' name='ticket_issue' value='" . $row['ticket_issue'] . "'></td>";
            echo "<td><input type='text' name='ticket_status' value='" . $row['ticket_status'] . "'></td>";
            echo "<td><input type='text' name='ticket_solution' value='" . $row['ticket_solution'] . "'></td>";
            echo "<td><button type='submit'>Update</button></td>";
            echo "</form>";
            echo "</tr>";
        }
        ?>
    </table>
</div>

</body>
</html>
