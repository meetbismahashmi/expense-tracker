<?php
include "db.php";

// Read all expenses, newest first
$result = $conn->query("SELECT * FROM expenses ORDER BY expense_date DESC");

// Get the running total separately
$totalResult = $conn->query("SELECT SUM(amount) AS total FROM expenses");
$totalRow = $totalResult->fetch_assoc();
$total = $totalRow["total"] ? $totalRow["total"] : 0;
?>

<!DOCTYPE html>
<html>
<head>
    <title>Expense Tracker</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2>My Expenses</h2>

    <a href="add.php">+ Add New Expense</a>

    <h3>Total Spent: $<?php echo number_format($total, 2); ?></h3>

    <table border="1" cellpadding="8">
        <tr>
            <th>Amount</th>
            <th>Category</th>
            <th>Description</th>
            <th>Date</th>
            <th>Action</th>
        </tr>

        <?php while ($row = $result->fetch_assoc()) { ?>
            <tr>
                <td>$<?php echo number_format($row["amount"], 2); ?></td>
                <td><?php echo $row["category"]; ?></td>
                <td><?php echo $row["description"]; ?></td>
                <td><?php echo $row["expense_date"]; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $row["id"]; ?>">Edit</a>
                    |
                    <a href="delete.php?id=<?php echo $row["id"]; ?>"
                       onclick="return confirm('Delete this expense?');">Delete</a>
                </td>
            </tr>
        <?php } ?>

    </table>
</body>
</html>