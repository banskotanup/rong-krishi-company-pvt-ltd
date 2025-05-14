# 🌾 Rong Krishi Company Pvt. Ltd.

A comprehensive web application developed using Laravel, designed to manage and streamline the operations of Rong Krishi Company Pvt. Ltd. This platform facilitates efficient handling of agricultural products, inventory, sales, and customer interactions.

## 🚀 Features

- **Product Management**: Add, update, and categorize agricultural products.
- **Inventory Tracking**: Monitor stock levels and manage inventory efficiently.
- **Sales Management**: Record sales transactions and generate invoices.
- **Customer Management**: Maintain customer records and purchase histories.
- **User Authentication**: Secure login and role-based access control.
- **Responsive Design**: Optimized for various devices and screen sizes.

## 📦 Installation

1. **Clone the repository:**

   ```bash
   git clone https://github.com/banskotanup/rong-krishi-company-pvt-ltd.git
   cd rong-krishi-company-pvt-ltd
   ```

2. **Install dependencies:**

   ```bash
   composer install
   npm install
   ```

3. **Environment setup:**

   - Copy `.env.example` to `.env`:

     ```bash
     cp .env.example .env
     ```

   - Generate application key:

     ```bash
     php artisan key:generate
     ```

4. **Database setup:**

   - Configure your database settings in the `.env` file.
   - Run migrations:

     ```bash
     php artisan migrate
     ```

5. **Build assets:**

   ```bash
   npm run dev
   ```

6. **Start the development server:**

   ```bash
   php artisan serve
   ```

7. **Access the application:**

   Navigate to `http://localhost:8000` in your browser.

## 🛠️ Technologies Used

- [Laravel](https://laravel.com/)
- [PHP](https://www.php.net/)
- [MySQL](https://www.mysql.com/) or [SQLite](https://www.sqlite.org/index.html)
- [Tailwind CSS](https://tailwindcss.com/)
- [Vite](https://vitejs.dev/)
- [JavaScript](https://developer.mozilla.org/en-US/docs/Web/JavaScript)

## 📁 Project Structure

```plaintext
rong-krishi-company-pvt-ltd/
├── app/
├── bootstrap/
├── config/
├── database/
├── public/
├── resources/
│   ├── css/
│   ├── js/
│   └── views/
├── routes/
├── storage/
├── tests/
├── .env.example
├── artisan
├── composer.json
├── package.json
├── tailwind.config.js
├── vite.config.js
└── ...
```

## 🤝 Contributing

Contributions are welcome! Please follow these steps:

1. **Fork the repository**

2. **Create a new branch:**

   ```bash
   git checkout -b feature/YourFeature
   ```

3. **Make your changes and commit them:**

   ```bash
   git commit -m "Add your message here"
   ```

4. **Push to the branch:**

   ```bash
   git push origin feature/YourFeature
   ```

5. **Open a pull request**

## 📄 License

This project is open-source and available under the [MIT License](LICENSE).
