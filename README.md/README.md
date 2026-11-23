# XPremo - Online Store (Native PHP)

A full e-commerce storefront built with plain PHP and MySQL (no framework). The
storefront is an Arabic (RTL) online store with product departments, discounts,
a shopping cart, checkout, customer accounts, and an admin dashboard for
managing products and orders.

## Features

### Storefront
- Product catalog organized by departments (home appliances, phones, clothes, electronics, and more)
- Featured offers and discount sliders (Swiper.js)
- Product category pages and product sliders
- Shopping cart: add, view, and remove items
- Order confirmation flow
- Customer registration and login
- Newsletter signup section

### Admin dashboard
- Add new products with image upload
- Update order status
- Sidebar-based dashboard layout

## Tech Stack 

- PHP (PDO) with MySQL
- HTML, CSS, JavaScript
- Swiper.js, Font Awesome

## Getting Started

1. Clone the repository and place it in your local server root (XAMPP, WAMP, or similar).
2. Create a MySQL database. The default connection settings live in `config/db.php`
   (database name `task`, user `root`, empty password). Adjust them to match your setup.
3. Create the required tables (a SQL dump is not included; the schema can be inferred
   from the queries in `config/functions.php` and the cart/checkout files).
4. Start Apache and MySQL, then open the project in your browser.

## Project Structure

```text
config/        Database connection (PDO) and shared helper functions
cart/          Add, view, and remove cart items
Dashbord/      Admin dashboard (add products, update order status)
layout/        Shared header and footer
uploads/       Uploaded product images
index.php      Storefront home page
```
