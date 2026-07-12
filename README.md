# PlayNexus

[![Laravel](https://img.shields.io/badge/Laravel-12-red.svg)](https://laravel.com)
[![Bootstrap](https://img.shields.io/badge/Bootstrap-5-purple.svg)](https://getbootstrap.com)
[![PHP](https://img.shields.io/badge/PHP-8.2+-blue.svg)](https://php.net)
[![License](https://img.shields.io/badge/License-MIT-green.svg)](LICENSE)

PlayNexus is a premium Laravel-based gaming platform featuring a futuristic dark theme with glassmorphism UI, neon glow effects in purple, blue, and cyan colors, and interactive browser games. Experience esports-style design with smooth animations, responsive layouts, and a modern gaming interface.

## ✨ Features

- **Futuristic UI**: Dark theme with glassmorphism cards, neon glows, and premium shadows
- **Interactive Games**: Tic Tac Toe, Quiz Challenge, Snake Arena, Word Scramble
- **Leaderboards**: Global and game-specific rankings with real-time updates
- **Dashboard**: User stats, recent scores, and performance tracking
- **Responsive Design**: Fully responsive for mobile and desktop using Bootstrap 5
- **Authentication**: Secure user registration, login, and profile management
- **Smooth Animations**: Hover effects, page transitions, and floating particles
- **Modern Typography**: Gaming-focused fonts and gradient text effects

## 🛠 Tech Stack

- **Backend**: Laravel 12 (PHP 8.2+)
- **Frontend**: Bootstrap 5, HTML5, CSS3, JavaScript
- **Database**: MySQL
- **Build Tools**: Vite, NPM
- **Styling**: Custom CSS with glassmorphism and neon effects

## 📋 Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and NPM
- MySQL or compatible database
- Git

## 🚀 Installation

1. **Clone the repository**
   ```bash
   git clone https://github.com/imitiyaj7860SP/PlayNexus.git
   cd PlayNexus
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment setup**
   ```bash
   cp .env.example .env
   php artisan key:generate
   ```

5. **Database configuration**
   - Create a MySQL database
   - Update `.env` file with your database credentials:
     ```
     DB_CONNECTION=mysql
     DB_HOST=127.0.0.1
     DB_PORT=3306
     DB_DATABASE=playnexus
     DB_USERNAME=your_username
     DB_PASSWORD=your_password
     ```

6. **Run migrations and seeders**
   ```bash
   php artisan migrate
   php artisan db:seed
   ```

7. **Build assets**
   ```bash
   npm run build
   # or for development
   npm run dev
   ```

8. **Start the application**
   ```bash
   php artisan serve
   ```

Visit `http://localhost:8000` to access PlayNexus!

## 🎮 Usage

- **Guest Play**: Start playing games immediately without registration
- **User Registration**: Create an account to track scores and access leaderboards
- **Games**: Choose from various browser-based games
- **Dashboard**: View your stats, recent scores, and rankings
- **Profile**: Manage your account and view achievements

## 🧪 Testing

Run the test suite:

```bash
php artisan test
```

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## 📝 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 👨‍💻 Author

**Imtiyaj Shaikh**  
- GitHub: [@imitiyaj7860SP](https://github.com/imitiyaj7860SP)

## 🙏 Acknowledgments

- Laravel Framework
- Bootstrap 5
- Font Awesome for icons
- Gaming community for inspiration

---

**PlayNexus** - The Ultimate Gaming Platform 🎮