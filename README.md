
<p align="center">
    <a href="https://laravel.com" target="_blank">
        <img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo">
    </a>
</p>

# Laravel User Project Setup Instructions

Follow these steps to set up the Laravel project on your local machine:

### Prerequisites
- Install **XAMPP** and **Composer** on your machine.

### Step 1: Create a New Laravel Project
Open your command line interface (CMD) and navigate to the `htdocs` directory of your XAMPP installation:

```bash
cd C:\xampp\htdocs
```

Then, create a new Laravel project:

```bash
laravel new laravelUser
```

### Step 2: Choose Options During Installation
When prompted, choose the following options:
- **Would you like to install a starter kit?**
  ```
  none
  ```

- **Which database will your application use?**
  ```
  mysql
  ```

- **Default database updated. Would you like to run the default database migrations? (yes/no)**
  ```
  no
  ```

### Step 3: Create a New Database
1. Open **phpMyAdmin** by navigating to `http://localhost/phpmyadmin` in your web browser.
2. Create a new database named **laraveluser**.

### Step 4: Open the Project in VS Code
Open your newly created project in **Visual Studio Code**.

### Step 5: Migrate the Database
Run the following commands in the terminal within your project directory:

```bash
php artisan migrate
composer require laravel/ui
php artisan ui bootstrap --auth
```

When prompted:
- **The [Controller.php] file already exists. Do you want to replace it?**
  ```
  yes
  ```

### Step 6: Install NPM Dependencies
Run the following command to install NPM dependencies:

```bash
npm install
```

### Step 7: Migrate Database Again
Run the migration command again:

```bash
php artisan migrate
```

### Step 8: Create Storage Link
If the `public/storage` link already exists, remove it and recreate it:

```bash
php artisan storage:link
```

If you encounter an existing link issue, run:

```bash
rm public/storage
php artisan storage:link
```

### Step 9: Serve the Application
Finally, start the local development server:

```bash
php artisan serve
```

Your application should now be accessible at `http://localhost:8000`.
```

Feel free to paste this directly into your README file! Let me know if you need any more help.
