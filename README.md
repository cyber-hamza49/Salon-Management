# BarberX - Salon Management System

BarberX is a premium grooming salon management system designed to streamline business operations while enhancing the customer experience. Established in February 2025, BarberX provides high-quality grooming services including haircuts, manicures, pedicures, facials, hair dyeing, and skin treatments.

## ✨ About BarberX

BarberX Salon is a premium recognized grooming destination committed to redefining modern self-care with expert techniques, top-quality products, and a luxury experience tailored for every client. Our platform efficiently manages appointments, inventory, staff, and payments while providing real-time notifications and online booking capabilities.

## 🚀 Features

### Appointment & Booking System
- Seamless appointment booking based on stylist availability
- Real-time calendar integration to ensure accurate scheduling
- Automated email notifications for booking confirmations
- View available time slots for different stylists

### Payment & Invoice Management
- Secure payment processing via Stripe integration
- Automated invoice generation with downloadable PDF format
- Complete transaction history for both customers and administrators

### Inventory Management
- Real-time product inventory tracking
- Low-stock alerts and notifications for timely replenishment
- Record supplier information and cost details

### Role-Based Access Control
- Different user roles with distinct access permissions:
  - **Admin**: Complete system control and management
  - **Stylist**: Schedule and service management
  - **Receptionist**: Appointment handling and client management
  - **Customer**: Booking appointments and profile management

### Client Management
- Centralized client database with comprehensive profiles
- Service history tracking and preference recording
- Easy search and management functionality

### Analytics & Reporting
- Generate reports on stylist commission 
- Track staff performance and commission calculations

## 🛠️ Technology Stack

| Component | Technologies |
|-----------|-------------|
| Frontend | HTML, CSS, JavaScript, Bootstrap |
| Backend | Laravel (PHP) |
| Database | MySQL |
| Authentication | Laravel Auth |
| Payment Gateway | Stripe |
| Notifications | SMTP Email Service |
| Document Generation | Laravel DOMPDF |
| Report Generation | maatwebsite/excel |

## 📋 Installation Guide

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js & NPM (For Authentication)
- MySQL (Database)
- Windows OS (recommended)
- Packages (maatwebsite/excel, barryvdh/laravel-dompdf)

### Installation Steps

1. **Clone the repository**
   ```bash
   git clone https://github.com/cyber-hamza49/Salon-Management.git
   cd Salon-Management
   ```

2. **Install dependencies**
   ```bash
   composer install
   npm install
   ```

3. **Strip Payment 
   Update database credentials and Stripe API keys in the `.env` file

4. **Run migrations and seed database**
   ```bash
   php artisan migrate
   ```

5. **Launch application**
   ```bash
   php artisan serve
   npm run dev 
   ```
   
   Access the application at [http://127.0.0.1:8000](http://127.0.0.1:8000)

## 💻 User Interface

The system includes dedicated interfaces for:

- **Customer Portal**: Service browsing, appointment booking, and payment processing
- **Stylist Dashboard**: Appointment management, commission tracking, and availability settings
- **Receptionist Panel**: Client management, appointment scheduling, and stylist availability tracking
- **Admin Console**: Full system management including user accounts, services, and reporting

## 🤝 Contributing

Contributions are welcome! Please feel free to submit a Pull Request.

## 📄 License

Copyright (C) 2025 Muhammad Hamza.  
All Rights Reserved.  

This software is proprietary and confidential.  
Unauthorized copying, distribution, or modification of this software is strictly prohibited. 

## 📞 Contact

**Developer:** Muhammad Hamza  
**GitHub:** [@cyber-hamza49](https://github.com/cyber-hamza49)  
**WhatsApp:** [Chat on WhatsApp](https://wa.me/923433918549)
---

⭐ Star this repository if you find it useful!
