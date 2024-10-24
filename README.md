# Bookify Bus Booking System

This Laravel project allows users to search for available buses on different dates and visually select seats to book. The system provides an admin interface to manage buses, including creating custom seat layouts for each bus. User authentication is handled through session variables, and the project uses MySQL as the database.

## Features

### User Features
- **Bus Search:** Users can search for buses available on specific dates.
- **Visual Seat Layout:** The system displays a visual layout of available seats for users to choose from.
- **Seat Booking:** Users can select and book available seats.
- **Payment Processing:** Once seats are selected, users can proceed to payment.
- **User Authentication:** Users need to log in to book tickets, and their session is managed using Laravel's session system.
- **Booking History:** Users can view their previous bookings.

### Admin Features
- **Add New Buses:** Admins can insert new buses with custom seat layouts.
- **Manage Buses:** Admins can manage existing buses, update seat availability, and monitor bookings.

## Technologies Used

- **Framework:** Laravel 10
- **Frontend:** Blade templates, Tailwind CSS
- **Backend:** PHP 8.x
- **Database:** MySQL
- **Authentication:** Session-based login system
- **AJAX & JavaScript:** Used for real-time seat selection and other dynamic user interactions

## Installation

### Prerequisites

- PHP 8.x or later
- Composer
- MySQL
- Node.js & npm (for frontend assets and Tailwind CSS)



## Steps to Clone and Run This Project on Your Local Machine

### Prerequisites

- **PHP 8.x** or later
- **Composer** (Dependency Manager for PHP)
- **MySQL** (Database)
- **Node.js** and **npm** (for managing frontend assets and Tailwind CSS)

### 1. Clone the repository:
Open your terminal and run the following command to clone the project:
```bash
git clone https://github.com/your-username/bus-booking-system.git
cd bus-booking-system
composer install
npm install
cp .env.example .env
```
# Update .env with database configureation
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=your-database-name
DB_USERNAME=your-username
DB_PASSWORD=your-password

```bash
php artisan key:generate
php artisan migrate
npm run dev
php artisan serve
```

## Also a sample databse is attached.Import it to your mysql database and run the project 
