# 🧺 FreshWash - Online Laundry Service

<div align="center">

![FreshWash Logo](images/logo4.png)

**Professional Laundry Services Delivered to Your Doorstep**

[![PHP](https://img.shields.io/badge/PHP-8.0+-777BB4?style=for-the-badge&logo=php&logoColor=white)](https://php.net/)
[![MySQL](https://img.shields.io/badge/MySQL-8.0+-4479A1?style=for-the-badge&logo=mysql&logoColor=white)](https://www.mysql.com/)
[![HTML5](https://img.shields.io/badge/HTML5-E34F26?style=for-the-badge&logo=html5&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/HTML)
[![CSS3](https://img.shields.io/badge/CSS3-1572B6?style=for-the-badge&logo=css3&logoColor=white)](https://developer.mozilla.org/en-US/docs/Web/CSS)
[![JavaScript](https://img.shields.io/badge/JavaScript-F7DF1E?style=for-the-badge&logo=javascript&logoColor=black)](https://developer.mozilla.org/en-US/docs/Web/JavaScript)
[![License](https://img.shields.io/badge/License-MIT-green.svg?style=for-the-badge)](LICENSE)

[🚀 Live Demo](#) • [📖 Documentation](#features) • [🛠️ Installation](#getting-started) • [📞 Contact](#contact)

</div>

---

## ✨ Overview

FreshWash is a comprehensive web-based laundry service management system that connects customers with professional laundry services. Built with modern web technologies, it provides a seamless experience for customers, drivers, and administrators.

### 🎯 Key Features

- **🛍️ Multi-User Platform**: Customer, Driver, and Admin portals
- **📱 Responsive Design**: Works perfectly on all devices
- **💳 Payment Integration**: Multiple payment methods (Card, Cash, PayPal)
- **🚚 Real-time Tracking**: Order status and delivery tracking
- **🎨 Modern UI/UX**: Beautiful, intuitive interface with animations
- **🔒 Secure Authentication**: User registration and login system
- **📊 Admin Dashboard**: Complete management system
- **📞 Customer Support**: Built-in feedback and contact systems

---

## 🚀 Features

### 👥 User Management
- **Customer Portal**: Registration, login, profile management
- **Driver Portal**: Driver registration, login, profile management  
- **Admin Dashboard**: Complete user and order management
- **Secure Authentication**: Password protection and session management

### 🧺 Service Types
- **Washing**: Professional washing with premium detergents
- **Dry Cleaning**: Delicate fabric care and professional pressing
- **Ironing**: Steam ironing for wrinkle-free clothes
- **Wash & Fold**: Complete laundry service with neat folding

### 💳 Payment System
- **Multiple Payment Methods**: Credit/Debit cards, Cash, PayPal
- **Secure Transactions**: Encrypted payment processing
- **Order Management**: Track payments and order status

### 🚚 Delivery System
- **Pickup & Delivery**: Door-to-door service
- **Driver Management**: Assign and track delivery drivers
- **Real-time Updates**: Order status notifications
- **Scheduling**: Flexible pickup and delivery times

### 📊 Admin Features
- **User Management**: Manage customers and drivers
- **Order Management**: Track and manage all orders
- **Delivery Management**: Assign drivers and track deliveries
- **Feedback Management**: Handle customer feedback and reviews
- **Analytics**: View business statistics and reports

---

## 🛠️ Technologies Used

| Category | Technology |
|----------|------------|
| **Backend** | PHP 8.0+ |
| **Database** | MySQL 8.0+ |
| **Frontend** | HTML5, CSS3, JavaScript (ES6+) |
| **Styling** | Custom CSS with modern design principles |
| **Icons** | Font Awesome 6.4.0 |
| **Fonts** | Inter, Poppins (Google Fonts) |
| **Animations** | AOS (Animate On Scroll) |
| **Server** | Apache/Nginx |

---

## 📁 Project Structure

```
Online-Laundry-Service/
├── 📁 Admin dashboard/          # Admin panel files
│   ├── admin_index.php         # Admin dashboard main page
│   ├── admin_login.php         # Admin login
│   ├── manage_users.php        # User management
│   ├── manage_orders.php       # Order management
│   ├── manage_delivery.php     # Delivery management
│   ├── manage_feedback.php     # Feedback management
│   └── settings.php            # Admin settings
├── 📁 css/                     # Stylesheets
│   ├── index.css              # Main page styling
│   ├── admin_dashboard.css    # Admin panel styles
│   ├── service.css            # Service page styles
│   ├── order.css              # Order page styles
│   └── [other CSS files]      # Component-specific styles
├── 📁 js/                      # JavaScript files
│   ├── slider.js              # Hero slider functionality
│   ├── admin_dashboard.js     # Admin panel scripts
│   ├── order.js               # Order management scripts
│   └── [other JS files]       # Component-specific scripts
├── 📁 images/                  # Project assets
│   ├── logo4.png              # Company logo
│   ├── [service images]       # Service-related images
│   └── [UI elements]          # Interface elements
├── 🌐 index.php               # Main landing page
├── 🛍️ order.php              # Order placement page
├── 🧺 service.php             # Services showcase
├── 👤 login.php               # User login
├── 📝 signup.php              # User registration
├── 💳 payment.php             # Payment processing
├── 🚚 driverregister.php      # Driver registration
├── 📊 db_connect.php          # Database connection
└── 🗄️ online_laundry_complete.sql  # Database schema
```

---

## 🚀 Getting Started

### Prerequisites

- **Web Server**: Apache 2.4+ or Nginx 1.18+
- **PHP**: 8.0 or higher
- **MySQL**: 8.0 or higher
- **Web Browser**: Modern browser with JavaScript enabled

### Installation Steps

1. **Clone the Repository**
   ```bash
   git clone https://github.com/yourusername/Online-Laundry-Service.git
   cd Online-Laundry-Service
   ```

2. **Set Up Web Server**
   - Copy files to your web server directory (e.g., `htdocs/` for XAMPP)
   - Ensure PHP and MySQL are properly configured

3. **Database Setup**
   ```sql
   # Import the database schema
   mysql -u your_username -p your_database < online_laundry_complete.sql
   ```

4. **Configure Database Connection**
   ```php
   // Edit db_connect.php with your database credentials
   $host = 'localhost';
   $dbname = 'your_database_name';
   $username = 'your_username';
   $password = 'your_password';
   ```

5. **Access the Application**
   - Open your web browser
   - Navigate to `http://localhost/Online-Laundry-Service/`
   - Start exploring the application!

### 🧪 Testing

- **Customer Test**: Use `create_test_user.php` to create test accounts
- **Admin Access**: Default admin credentials (check database)
- **Driver Test**: Register as a driver through the driver portal

---

## 🎨 UI/UX Features

### Modern Design Elements
- **Gradient Text Effects**: Eye-catching typography
- **Smooth Animations**: AOS (Animate On Scroll) integration
- **Hover Effects**: Interactive elements with smooth transitions
- **Responsive Grid**: Mobile-first design approach
- **Custom Icons**: Font Awesome integration
- **Parallax Effects**: Engaging visual elements

### Color Scheme
- **Primary**: Professional blues and whites
- **Accent**: Warm oranges and yellows
- **Success**: Green for positive actions
- **Warning**: Orange for alerts
- **Error**: Red for errors

---

## 🔧 Configuration

### Environment Variables
```php
// Database Configuration (db_connect.php)
define('DB_HOST', 'localhost');
define('DB_NAME', 'your_database');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');

// Application Settings
define('SITE_URL', 'http://localhost/Online-Laundry-Service/');
define('ADMIN_EMAIL', 'admin@freshwash.com');
```

### Customization Options
- **Logo**: Replace `images/logo4.png`
- **Colors**: Modify CSS variables in respective stylesheets
- **Services**: Update service details in `service.php`
- **Payment**: Configure payment gateways in `payment.php`

---

## 📱 Screenshots

<div align="center">

### 🏠 Homepage
![Homepage](images/admin%20web.png)

### 🛍️ Order Management
![Order Page](images/placeOrder.jpg)

### 👨‍💼 Admin Dashboard
![Admin Dashboard](images/admin3.jpg)

### 📱 Mobile Responsive
![Mobile View](images/customer.webp)

</div>

---

## 🤝 Contributing

We welcome contributions! Please follow these steps:

1. **Fork the repository**
2. **Create a feature branch**: `git checkout -b feature/AmazingFeature`
3. **Commit your changes**: `git commit -m 'Add some AmazingFeature'`
4. **Push to the branch**: `git push origin feature/AmazingFeature`
5. **Open a Pull Request**

### Development Guidelines
- Follow PHP PSR-12 coding standards
- Use meaningful commit messages
- Test thoroughly before submitting
- Update documentation as needed

---

## 🐛 Bug Reports

If you find a bug, please create an issue with:
- **Bug description**: Clear explanation of the problem
- **Steps to reproduce**: Detailed reproduction steps
- **Expected behavior**: What should happen
- **Actual behavior**: What actually happens
- **Environment**: Browser, OS, PHP version
- **Screenshots**: If applicable

---

## 📄 License

This project is licensed under the **MIT License** - see the [LICENSE](LICENSE) file for details.

```
MIT License

Copyright (c) 2024 FreshWash

Permission is hereby granted, free of charge, to any person obtaining a copy
of this software and associated documentation files (the "Software"), to deal
in the Software without restriction, including without limitation the rights
to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
copies of the Software, and to permit persons to whom the Software is
furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all
copies or substantial portions of the Software.
```

---

## 👨‍💻 Developer

**Ihsas** - *Full Stack Developer*

- **Email**: [mohamedihsas001@gmail.com](mailto:mohamedihsas001@gmail.com)
- **GitHub**: [@ihsas](https://github.com/Ihsas01)
- **LinkedIn**: [Ihsas](https://linkedin.com/in/ihsas)

### 🙏 Acknowledgments

- **Font Awesome** for beautiful icons
- **Google Fonts** for typography
- **AOS Library** for smooth animations
- **Open Source Community** for inspiration and support

---

<div align="center">

**⭐ Star this repository if you found it helpful!**

**🔄 Check back for updates and new features!**

**📞 Questions? Feel free to reach out!**

</div> 