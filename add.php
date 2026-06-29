<?php
include "db.php";

// This block runs ONLY when the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $amount      = $_POST["amount"];
    $category    = $_POST["category"];
    $description = $_POST["description"];
    $date        = $_POST["expense_date"];

    // Prepared statement: safe way to insert data
    $stmt = $conn->prepare(
        "INSERT INTO expenses (amount, category, description, expense_date)
         VALUES (?, ?, ?, ?)"
    );
    $stmt->bind_param("dsss", $amount, $category, $description, $date);

    if ($stmt->execute()) {
        echo "Expense added successfully!";
    } else {
        echo "Error: " . $stmt->error;
    }
    $stmt->close();
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Expense</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Add New Expense</h2>

    <form method="POST" action="add.php">
        <label>Amount:</label><br>
        <input type="number" step="0.01" name="amount" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category" required><br><br>

        <label>Description:</label><br>
        <input type="text" name="description"><br><br>

        <label>Date:</label><br>
        <input type="date" name="expense_date" required><br><br>

        <button type="submit">Add Expense</button>
    </form>
</body>
</html>