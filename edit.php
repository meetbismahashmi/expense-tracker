<?php
include "db.php";

// ----- PART A: Save changes when the form is submitted -----
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id          = $_POST["id"];
    $amount      = $_POST["amount"];
    $category    = $_POST["category"];
    $description = $_POST["description"];
    $date        = $_POST["expense_date"];

    $stmt = $conn->prepare(
        "UPDATE expenses
         SET amount = ?, category = ?, description = ?, expense_date = ?
         WHERE id = ?"
    );
    $stmt->bind_param("ssssi", $amount, $category, $description, $date, $id);
    $stmt->execute();
    $stmt->close();

    header("Location: index.php");
    exit();
}

// ----- PART B: Load the existing expense to fill the form -----
$id = $_GET["id"];
$stmt = $conn->prepare("SELECT * FROM expenses WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$expense = $result->fetch_assoc();
$stmt->close();
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Expense</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>Edit Expense</h2>

    <form method="POST" action="edit.php">
        <!-- hidden field carries the id so the UPDATE knows which row -->
        <input type="hidden" name="id" value="<?php echo $expense["id"]; ?>">

        <label>Amount:</label><br>
        <input type="number" step="0.01" name="amount"
               value="<?php echo $expense["amount"]; ?>" required><br><br>

        <label>Category:</label><br>
        <input type="text" name="category"
               value="<?php echo $expense["category"]; ?>" required><br><br>

        <label>Description:</label><br>
        <input type="text" name="description"
               value="<?php echo $expense["description"]; ?>"><br><br>

        <label>Date:</label><br>
        <input type="date" name="expense_date"
               value="<?php echo $expense["expense_date"]; ?>" required><br><br>

        <button type="submit">Update Expense</button>
    </form>
</body>
</html>