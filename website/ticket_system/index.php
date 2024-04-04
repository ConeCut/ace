<?php
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ticket System</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>

<?php
include 'navbar.php';

if (isset($_SESSION['user_id'])) {
    output_username();
    ?>

    <h1>Tell us your concern and we will try to fix it!</h1>

<button class="index_btn" onclick="window.location.href = '../ticket_system/contact_support.php'">Contact Support</button>

    <br>
    <h1>Submit a ticket down below!</h1>

    <button class="index_btn" onclick="window.location.href = '../ticket_system/submit_ticket.php'">Submit</button>

    <h1>Check status on your tickets!</h1>

    <button class="index_btn" onclick="window.location.href = '../ticket_system/ticket_status.php'">All Ticket Status</button>

    <h1>See your number in the query here!</h1>

    <button class="index_btn" onclick="window.location.href = '../ticket_system/ticket_query.php'">Ticket Query</button>

    <?php
} else {
    ?>
    <h1>Please log in to submit a ticket, so we can help you!</h1>
    <button class="index_btn" onclick="window.location.href = '../../../oppdrag_uke_12/login_system/PROPER_PHP_LogIN_SignUP_Form/index.php'">Log in or create account</button>
    <?php
}
?>
</body>
</html>
