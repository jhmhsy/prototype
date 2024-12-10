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
