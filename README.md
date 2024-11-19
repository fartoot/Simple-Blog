<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

# Simple Blog using Laravel

A simple blog application built with Laravel, featuring categories, tags, about, contact, and privacy pages. Includes an admin dashboard for managing posts, categories, and tags.

🌐 [Live Demo](https://simple-blog-laravel.vercel.app/)

⚠️ **Disclaimer**: This project is not ready for production use.

## Features

- 📝 Blog posts
- 🏷️ Categories and tags organization
- 👤 User authentication
- 📊 Admin dashboard
- 📱 Responsive design
- 📄 Static pages (About, Contact, Privacy)
- 💻 Content management system

## Screenshots

### Public Pages
[Homepage Screenshot]
[Blog Post Screenshot]
[Categories Page Screenshot]
[Tags Page Screenshot]

### Admin Dashboard
[Dashboard Overview Screenshot]
[Posts Management Screenshot]
[Categories Management Screenshot]
[Tags Management Screenshot]

## Admin Features

- Full CRUD operations for:
  - Posts
  - Categories
  - Tags
- Analytics dashboard

## Tech Stack

- **Framework**: Laravel
- **Deployment**: Vercel
- **Database**: MySQL
- **Frontend**: Blade Templates, TailwindCSS
- **Authentication**: Laravel Breeze

## Installation

1. Clone the repository
```bash
git clone https://github.com/yourusername/simple-blog.git
```

2. Install dependencies
```bash
composer install
npm install
```

3. Configure environment variables
```bash
cp .env.example .env
```

4. Generate application key
```bash
php artisan key:generate
```

5. Run migrations
```bash
php artisan migrate
```

6. Start the development server
```bash
php artisan serve
```