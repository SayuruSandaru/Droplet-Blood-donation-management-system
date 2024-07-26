# Blood Donation Management System

A web application for managing blood donation requests and donor information.

## Table of Contents

- [Introduction](#introduction)
- [Features](#features)
- [Installation](#installation)
- [Usage](#usage)
- [Technologies](#technologies)
- [Contributing](#contributing)
- [License](#license)

## Introduction

The Blood Donation Management System is designed to streamline the process of managing blood donation requests and donor information. This web application allows users to request blood, manage donor information, and view requests.

## Features

- User authentication and session management
- Request blood donations with required details
- Manage donor information
- View and process blood donation requests

## Installation

To install and run the Blood Donation Management System locally, follow these steps:

1. **Clone the repository:**

   ```bash
   git clone https://github.com/your-username/blood-donation-management.git
   cd blood-donation-management
   ```

2. **Set up the database:**

   - Create a MySQL database named `blood_bank_database`.
   - Import the provided SQL script (`database.sql`) located in the `SQL` folder to set up the necessary tables:

   ```bash
   mysql -u your_username -p blood_bank_database < SQL/database.sql
   ```

3. **Configure the database connection:**

   - Update the `DbConnector.php` file with your database credentials.

4. **Open the project in an IDE:**

   - Open the project in NetBeans or any other IDE of your choice.

5. **Run the application:**

   - Ensure you have PHP and a web server (e.g., XAMPP) installed.
   - Place the project files in your web server's root directory (e.g., `htdocs` for XAMPP).
   - Start your web server and navigate to `http://localhost/blood-donation-management` in your web browser.

## Usage

1. **Login:**

   - Navigate to the login page and enter your credentials to access the admin portal.

2. **Request Blood:**

   - Use the `Request Blood` form to submit a blood donation request with the required details.

3. **Manage Donors:**

   - Access the `Add Donor` section to add new donors to the system.
   - View the list of donors in the `Donor List` section.

4. **View Requests:**

   - Access the `Requests` section to view and process blood donation requests.

## Technologies

- **Frontend:**
  - HTML, CSS, Bootstrap 5
- **Backend:**
  - PHP
- **Database:**
  - MySQL
