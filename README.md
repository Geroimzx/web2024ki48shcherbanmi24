# Overview

This repository contains code for websites made in programming languages ​​HTML, CSS, JS, PHP and that use a MySQL database. The first site is a business card, and the second, according to the task, is a DDOS site

## Student Task Information

![image](https://github.com/Geroimzx/web2024ki48shcherbanmi24/assets/27133327/67f3cb01-25f2-4eb6-a529-a48ea2ae722b)

| Number | Student               | Task                                |
|--------|-----------------------|-------------------------------------|
| 24     | Shcherban Mykhailo   | DDOS      |

# About technology and program languages

## HTML (HyperText Markup Language):
- Markup language for creating the structure of web pages.
- Uses tags to define elements and their properties.

## CSS (Cascading Style Sheets):
- Style language for formatting and defining the appearance of web pages.
- Used to specify colors, fonts, sizes, and positioning of elements.

## JavaScript (JS):
- Scripting programming language for implementing dynamic interactions on web pages.
- Enables content manipulation, event handling, and user interaction.

## PHP:
- Server-side programming language for building dynamic websites and applications.
- Used for form processing, database operations, and content generation.

## Ajax (Asynchronous JavaScript and XML):
- Technique for asynchronously exchanging data between the browser and server.
- Allows updating parts of a page without full reload.

## MySQL:
- Relational Database Management System (RDBMS).
- Used for storing and managing data on the server.

# Task 2 details
Create a simple website business card with your personal data or information about your project. Use POST and GET methods to navigate pages or send forms to the server. Use AJAX method to load parts of the page depending on user inputs.

# Task 3 details
Deploy site to hosting.

# Project Business Card
This project aims to create a simple website business card, showcasing personal data, my expierences, information about my projects and contact information. The website employs various technologies and methods for enhanced user interaction.

# Access the Website
The website is deployed and accessible on hosting. You can explore the Business Card by following this link: http://mski48.atwebpages.com/

# How to Run the Project
### Instructions to Set Up a Local Server with XAMPP, Add Files, and Configure MySQL Database

#### Step 1: Install XAMPP

1. Download XAMPP from the official website: [XAMPP Downloads](https://www.apachefriends.org/index.html).
2. Follow the installation instructions for your operating system (Windows, macOS, or Linux).

#### Step 2: Start XAMPP Server

1. Open XAMPP Control Panel.
2. Start the Apache server by clicking the "Start" button next to "Apache."

#### Step 3: Create Project Folder

1. Create a folder for your project in the "htdocs" directory within the XAMPP installation folder. For example, create a folder named "project-business-card."

#### Step 4: Add Project Files

1. Place the HTML, PHP, CSS, JavaScript, and other relevant files in the "project-business-card" folder.

#### Step 5: Configure MySQL Database

1. Open XAMPP Control Panel.
2. Start the MySQL server by clicking the "Start" button next to "MySQL."

#### Step 6: Access phpMyAdmin

1. Open your web browser and go to `http://localhost/phpmyadmin/`.
2. Click on the "New" button to create a new database. Name it, for example, "business_card_db."

#### Step 7: Create Database Table

1. Inside the newly created database, click on the "SQL" tab.
2. Execute the following SQL command to create a "messages" table:

```sql
CREATE TABLE messages (
    name TEXT NOT NULL,
    email TEXT NOT NULL,
    message TEXT NOT NULL,
    date TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
```

#### Step 8: Update PHP Database Configuration

1. In your PHP files, locate the file 'form.php' for database configuration.
2. Update the database connection parameters (hostname, username, password, and database name) accordingly.
   
Example:

```php
<?php
$hostname = "localhost";
$username = "root";
$password = "";
$database = "business_card_db";

$conn = new mysqli($hostname, $username, $password, $database);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Other code....
?>
```

#### Step 9: Access Your Project

1. Open your web browser and go to `http://localhost/project-business-card/` (adjust the URL based on your project folder name).
2. Explore your website and test the functionality.

Now, you have successfully set up a local server with XAMPP, added project files, and configured a MySQL database with a "messages" table.
