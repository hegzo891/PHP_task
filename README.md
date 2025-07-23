## Registration Form

## This is a simple PHP registration form that allows users to register with their name, email, and password.

### Features

- Client-side validation for required fields.
- jQuery AJAX request to submit the form without reloading the page.
- Server-side PHP script that:

  - Validates input data.
  - Checks for existing email addresses.
  - Validates password strength.
  - Hashes passwords before storing them.
  - Stores user data in a MySQL database.

---

### Prerequisites

- XAMPP
- Basic knowledge of PHP and MySQL.

---

### How to Run

1. Copy the project folder to the `htdocs` directory of your XAMPP installation.
   Example: `Application:\xampp\htdocs\Registration_form`

2. Start **Apache** and **MySQL** from the XAMPP Control Panel.

3. Make sure you have a MySQL database named `registration_db`.
   You can create it using phpMyAdmin or the MySQL command line.

   Example:

   ```sql
   CREATE DATABASE registration_db;
   ```

4. Open your browser and navigate to:

   ```
   http://localhost/index.php
   ```

5. Fill out the form and submit it. The form data will be stored in the `users` table.

---

### Project Structure

```
PHP_task/
│
├── index.html
├── register.php
├── db.php

```

---

### Notes

- The database connection uses the default MySQL user `root` with password `your password`. Update these values in `db.php` if needed.
- The table `users` will be created automatically if it does not exist.
- Passwords are securely hashed using `password_hash`.

---

### Security Tips

- Always change the database password for production.
- Use prepared statements (already included) to prevent SQL injection.
- Consider adding CSRF protection for real-world projects.
