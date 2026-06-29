# Expense Tracker

A full-stack web application for tracking personal expenses, built with PHP,
MySQL, and a HTML/CSS/JavaScript frontend. Supports complete CRUD operations
with a live running total and category-based records.

## Features

- **Add** expenses with amount, category, description, and date
- **View** all expenses in a clean table, sorted by most recent
- **Edit** any existing expense through a pre-filled form
- **Delete** expenses with a JavaScript confirmation prompt
- **Running total** of all spending, calculated directly in the database
- Responsive, styled interface

## Tech Stack

- **Backend:** PHP
- **Database:** MySQL
- **Frontend:** HTML, CSS, JavaScript

## Concepts Demonstrated

- **Full CRUD operations** (Create, Read, Update, Delete) across a real database
- **Prepared statements** for all queries to prevent SQL injection
- **Three-tier architecture:** separation of database, backend logic, and frontend
- **SQL aggregation** (`SUM`) to compute totals efficiently in the database
- **Reusable database connection** following the DRY principle
- **Correct monetary storage** using SQL `DECIMAL` instead of floats
- **GET vs POST** request handling and post-action redirects

## Database Setup

Create the database and table in phpMyAdmin:

```sql
CREATE DATABASE expense_db;

USE expense_db;

CREATE TABLE expenses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    amount DECIMAL(10,2) NOT NULL,
    category VARCHAR(50) NOT NULL,
    description VARCHAR(255),
    expense_date DATE NOT NULL
);
```

## How to Run
1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Place the project folder inside `xampp/htdocs/`.
3. Create the database and table using the SQL above.
4. Open `http://localhost/expense_tracker/` in your browser.

## Project Structure
expense_tracker/

├── db.php        # Database connection (shared by all pages)

├── index.php     # View all expenses + running total (Read)

├── add.php       # Add a new expense (Create)

├── edit.php      # Edit an existing expense (Update)

├── delete.php    # Delete an expense (Delete)

└── style.css     # Styling
## Possible Improvements

- Filter expenses by category or date range
- Monthly spending summary with a chart
- User accounts with login authentication
- Export expenses to CSV

1. Install [XAMPP](https://www.apachefriends.org/) and start **Apache** and **MySQL**.
2. Place the project folder inside `xampp/htdocs/`.
3. Create the database and table using the SQL above.
4. Open `http://localhost/expense_tracker/` in your browser.

## Project Structure
