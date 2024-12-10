# Gym One Application

<p align="center">
  <a href="https://gymonedanao.com" class="logo">
    CHECK OUT OUR WEBSITE HERE
  </a>
</p>

## About Gym One

Gym One is a comprehensive web application designed to streamline your fitness journey. Built on the Laravel framework, it offers a range of features to enhance your gym experience, including session booking, membership management, and real-time updates.

### Key Features

- **Session Booking**: Easily reserve your spot in classes with just a few clicks.
- **Membership Management**: Manage your membership details and billing information effortlessly.
- **Real-time Updates**: Stay informed with the latest class schedules and availability.
- **QR Code Scanning**: Utilize QR code technology for quick check-ins and access.

## Learning and Support

Gym One is built on Laravel, a web application framework with expressive, elegant syntax. To get started with Laravel, explore the extensive [documentation](https://laravel.com/docs) and video tutorials available on [Laracasts](https://laracasts.com).

## Contributing

Thank you for considering contributing to the Gym One application! Please review our [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct) and contribution guidelines in the Laravel documentation.

## Security Vulnerabilities

If you discover a security vulnerability within Gym One, please send an e-mail to the development team. All security vulnerabilities will be promptly addressed.

## License

The Gym One application is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).

---

This README provides a brief overview of the Gym One application, highlighting its main features and providing links to resources for further learning and contribution. For more detailed information, please refer to the application's documentation.

# Prerequisites

Before starting, ensure the following tools are installed:

### XAMPP

Download: https://www.apachefriends.org/
Install and start the Apache and MySQL services using the XAMPP Control Panel.

### Composer

Download: https://getcomposer.org/

### Node.js and npm

Download: https://nodejs.org/

#Visual Studio Code (VSCode)
Download: https://code.visualstudio.com/

# Installation Steps

### Install Dependencies

`composer install `

### Install JavaScript and CSS dependencies:

`npm install `

### Set Up the Environment File

`cp .env.example .env `

### Update .env with your database details:

DB_CONNECTION=mysql  
DB_HOST=127.0.0.1  
DB_PORT=3306  
DB_DATABASE=gym_system  
DB_USERNAME=root  
DB_PASSWORD=

### Set Up the Database

Open phpMyAdmin at http://localhost/phpmyadmin.
Create a new database named gym_system.
Run migrations to create database tables:
`php artisan migrate`

### Generate a New Application Key

`php artisan key:generate `

### Compile Frontend Assets

`npm run dev `

### Start the Development Server

`php artisan serve `

Your project is now set up and running locally!

---

# Tech Stack

### Frontend

- **HTML5**: The backbone for structuring the content and layout of the web pages.
- **Tailwind CSS**: A utility-first CSS framework that allows for rapid custom styling and responsive design.
- **Alpine.js**: A lightweight JavaScript framework that adds interactivity and dynamic behavior without the overhead of larger frameworks.
- **JavaScript**: Handles frontend logic and enhances user experience with interactive elements and client-side functionalities.

### Backend

- **Laravel**: A powerful PHP framework for building secure, scalable web applications with elegant syntax and robust features.
- **PHP**: The server-side scripting language that powers the backend, delivering dynamic content and logic.

### Database

- **MySQL**: A relational database management system (RDBMS) for storing and managing structured data.

### Version Control

- **Git**: For version control, ensuring collaboration and tracking changes.
- **GitHub**: A platform for hosting code repositories, managing projects, and collaborating with other developers.

### Development Tools

- **XAMPP**: A local development environment for running Apache, MySQL, and PHP.
- **Composer**: Dependency management tool for PHP, used to install and manage Laravel packages and other PHP dependencies.
- **Node.js & npm**: JavaScript runtime and package manager used for handling frontend dependencies and build tools.
- **Visual Studio Code (VSCode)**: A versatile code editor with powerful extensions and features for PHP, JavaScript, and Laravel development.

---

# Overview

**Gymone** is an integrated web-based fitness gym management system designed to optimize and automate gym operations. By digitizing key processes, Gymone enables gym staff to concentrate on delivering exceptional service while the system efficiently handles administrative tasks.

# Key Features

### 1. User Management

- **Three-tiered access system**
  - **Users**: Regular gym members with basic access.
  - **Staff**: Handles daily operations like check-ins and subscriptions.
  - **Admins**: Manages system settings, reports, and user access.

### 2. Membership Management

- **Online registration and account creation**
- **Real-time tracking of membership durations**
- **Automatic subscription status updates and reminders**
- **Flexible membership types and service subscriptions**

### 3. Member Services

- **Monthly service subscriptions**
- **Locker rentals**
- **Treadmill access**
- **QR code-based check-ins and service tracking**

### 4. Administrative Tools

- **Comprehensive dashboard with key metrics**
- **Member overview and management**
- **Service and subscription tracking**
- **Sales and membership reports**
- **Product inventory management**

### 5. Automated Notifications

- **Account verification emails**
- **Subscription status updates**
- **Membership expiration reminders**

### 6. Advanced Search and Filtering

- **Member search by name, ID, email**
- **QR code scanning for quick member lookup**
- **Service status filtering** (active, pre-paid, due, etc.)

---

# Technical Specifications

### Platform

- **Web-based application**
- Accessible via modern web browsers
- Hosted at: [https://gymonedanao.com/](https://gymonedanao.com/)

### User Interface

- **Responsive design**
- Navigation sections: Home, Features, Pricing, Contacts, My Services
- Profile management with security and display options

### Security and Access Control

#### Role-Based Access

- Customizable user roles and permissions
- Granular control over system access
- Secure login and account verification process

### Continuous Development

- Ongoing improvements to features
- Planned expansions for equipment tracking and event management

---

# Getting Started

1. Visit [https://gymonedanao.com/](https://gymonedanao.com/)
2. Register a new account
3. Verify your email
4. Complete membership registration
5. Start using gym services!
