# SWT 22022 - Practical for Internet Application Development

## Overview
This repository contains all practical lab work and assignments completed for the **SWT 22022 - Internet Application Development** course at the university. The project demonstrates proficiency in full-stack web development using PHP, MySQL, JavaScript, HTML, and CSS.

## Course Information
- **Course Code**: SWT 22022
- **Course Title**: Practical for Internet Application Development
- **Duration**: June 2024 - November 2024
- **Student ID**: SEU_IS_20_ICT_084

## Technologies Used
- **Backend**: PHP
- **Database**: MySQL
- **Frontend**: HTML5, CSS3, JavaScript
- **Server**: Apache/XAMPP
- **Version Control**: Git

## Project Structure

### Lab Sheets Overview

#### Lab Sheet 01 (2024.06.03)
Introduction to PHP basics and syntax

#### Lab Sheet 02 (2024.06.05)
- PHP fundamentals
- Variables and data types
- Control structures
- Files: `Ex01.php`, `Ex02_1.php`, `Ex02_2.php`, `Ex03_1.php`, `Ex03_2.php`, `Ex03_3.php`, `Ex04.php`, `Ex05.php`

#### Lab Sheet 03 (2024.06.10)
**Database Connectivity**
- MySQL database connection
- CRUD operations
- Database design
- Files: `DatabasesConnection.php`, `faculty.sql`, `Students.php`

#### Lab Sheet 04 (2024.06.12)
**JavaScript Integration**
- DOM manipulation
- Event handling
- AJAX basics
- Client-side validation

#### Lab Sheet 05 (2024.06.19)
**Session and Cookie Management**
- Session handling (`session.php`)
- User authentication (`login.php`, `logout.php`, `profile.php`)
- Cookie implementation (`cookies.php`, `preferred_color.php`)

#### Lab Sheet 06 (2024.06.24)
**File Operations and Advanced JavaScript**
- File handling in PHP
- Advanced JavaScript techniques
- AJAX implementation

#### Lab Sheet 07 (2024.06.26)
**Student Management System**
- Add student functionality
- Database operations
- RESTful API concepts
- Files: `add_student.php`, `get_students.php`, `Student.php`, `DatabaseConnection.php`

#### Lab Sheet 08 (2024.07.01)
Advanced web development concepts

#### Lab Sheet 09 (2024.07.04)
**Dashboard Development**
- User dashboard interface
- Database integration
- Files: `dashboard.html`, `index.html`, `sql.sql`

#### Lab Sheet 10 (2024.07.08)
**Full-Stack Application**
- Complete application structure
- Separate CSS, PHP, and JavaScript modules
- Database layer implementation

#### Lab Sheets 11-26
Continued advanced topics in web development including:
- Framework integration
- Security best practices
- Performance optimization
- Modern web standards

### Assignment (2024.07.10)
**Book Management System (ICT084)**

Complete CRUD application for book management:
- **Database**: `SEU_IS_20_ICT_084.sql`
- **Core Files**:
  - `BookICT084.php` - Book class/model
  - `DatabaseConnectionICT084.php` - Database connection handler
  - `insert.php` - Create new book records
  - `read.php` - Read/display books
  - `update.php` - Update existing books
  - `delete.php` - Delete book records
- **Frontend**: `index.html`, `style.css`, `script.js`

**Features**:
- Full CRUD operations
- Database connectivity
- Input validation
- Responsive design
- Error handling

## Key Learning Outcomes

### Backend Development
- PHP syntax and fundamentals
- Database design and MySQL
- Server-side validation
- Session and cookie management
- File operations
- RESTful API development
- Object-oriented PHP

### Frontend Development
- HTML5 semantic markup
- CSS3 styling and layouts
- JavaScript DOM manipulation
- AJAX and asynchronous operations
- Form validation
- Responsive web design

### Database Management
- MySQL database design
- SQL queries (SELECT, INSERT, UPDATE, DELETE)
- Database normalization
- Foreign key relationships
- Data integrity

### Security & Best Practices
- SQL injection prevention
- XSS protection
- Session security
- Input sanitization
- Password hashing

## Installation & Setup

### Prerequisites
- XAMPP/WAMP/LAMP server
- PHP 7.4 or higher
- MySQL 5.7 or higher
- Modern web browser

### Setup Instructions

1. **Clone the repository**
   ```bash
   git clone [repository-url]
   cd "SWT 22022-Practical for Internet Application Development"
   ```

2. **Start Apache and MySQL**
   - Open XAMPP Control Panel
   - Start Apache and MySQL services

3. **Import Database**
   - Navigate to `http://localhost/phpmyadmin`
   - Create a new database
   - Import relevant SQL files from lab sheets

4. **Configure Database Connection**
   - Update database credentials in connection files:
     - `DatabaseConnection.php`
     - `DatabaseConnectionICT084.php`

5. **Access the Application**
   - Place project in `htdocs` folder
   - Navigate to `http://localhost/[project-folder]`

## Database Configuration

Default database settings (update as needed):
```php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "your_database_name";
```

## Usage Examples

### Creating Database Connection
```php
<?php
include 'DatabaseConnection.php';
// Your database operations here
?>
```

### CRUD Operations
```php
// Create
$sql = "INSERT INTO table_name (column1, column2) VALUES (?, ?)";

// Read
$sql = "SELECT * FROM table_name WHERE condition";

// Update
$sql = "UPDATE table_name SET column1 = ? WHERE id = ?";

// Delete
$sql = "DELETE FROM table_name WHERE id = ?";
```

## Assignment Highlights

The **Book Management System** (Assignment ICT084) demonstrates:
- Complete MVC architecture
- Prepared statements for SQL injection prevention
- AJAX for dynamic content loading
- Responsive UI design
- Error handling and validation
- RESTful API endpoints

## Project Timeline
- **Start Date**: June 3, 2024
- **End Date**: November 6, 2024
- **Total Lab Sheets**: 26+
- **Major Assignment**: 1 (Book Management System)

## Folder Structure
```
├── 01.Lab sheet 01/          # PHP Basics
├── 02.Lab sheet 02/          # PHP Fundamentals
├── 03.Lab sheet 03/          # Database Connectivity
├── 04.Lab sheet 04/          # JavaScript Integration
├── 05.Lab sheet 05/          # Sessions & Cookies
├── 06.Lab sheet 06/          # File Operations
├── 07.Lab sheet 07/          # Student Management
├── 08.Lab sheet 08/          # Advanced Concepts
├── 09.Lab sheet 09/          # Dashboard Development
├── 10.Lab sheet 10/          # Full-Stack Application
├── 11.Assignment/            # Book Management System
├── 12-26.Lab sheets/         # Advanced Topics
└── README.md                 # This file
```

## Contributing
This is a personal academic project. No contributions are expected.

## License
This project is submitted as part of university coursework. All rights reserved.

## Contact
- **Student ID**: SEU_IS_20_ICT_084
- **Course**: SWT 22022 - Internet Application Development
- **Institution**: [Your University Name]

## Acknowledgments
- Course instructors and teaching assistants
- University resources and documentation
- PHP and MySQL communities

---

**Note**: This repository contains educational material completed as part of university coursework. The code is intended for learning purposes and demonstrates progressive skill development throughout the course duration.
