<?php
global $connection;
include 'navbar.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\config_session.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\signup_view.inc.php';
require_once 'C:\Users\Cosmin\IdeaProjects\oppdrag_uke_12\login_system\PROPER_PHP_LogIN_SignUP_Form\includes\login_view.inc.php';
include 'db_connection.php';
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $email = $_POST['email'];
    $message = $_POST['message'];

    // Insert contact form submission into database
    $query = "INSERT INTO contact_form_submissions (email, message) VALUES ('$email', '$message')";

    if (mysqli_query($connection, $query)) {
        // Contact form submitted successfully
        echo "<script>alert('Message sent successfully. We will get back to you soon.');</script>";
        echo "<script>window.location.href = 'contact_support.php';</script>"; // Redirect back to contact support page
    } else {
        // Error in contact form submission
        echo "<script>alert('Error: " . mysqli_error($connection) . "');</script>";
        echo "<script>window.location.href = 'contact_support.php';</script>"; // Redirect back to contact support page
    }
}

mysqli_close($connection);

