<?php include 'navbar.php'; ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Submit Ticket</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
<div class="container">
    <h1>Submit Ticket</h1>
    <form action="process_ticket.php" method="POST">
        <label for="issue">Ticket Issue:</label><br>
        <textarea id="issue" name="issue" rows="4" required></textarea><br>

        <label for="ticket_type">Ticket Type:</label><br>
        <select id="ticket_type" name="ticket_type" required>
            <option value="">Select Ticket Type</option>
            <option value="1">Complaint</option>
            <option value="2">Feedback</option>
            <option value="3">Issue</option>
        </select><br>

        <input type="submit" value="Submit">
    </form>
</div>
</body>
</html>
