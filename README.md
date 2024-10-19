
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
\xampp\htdocs
```

Then, create a new Laravel project in ```Command Prompt```

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
2. Create a new database named
```bash
laraveluser
```

### Step 4: Open the Project in VS Code
Open your newly created project **laravelUser** in **Visual Studio Code**.

### Step 5: Migrate the Database
Run the following commands in the terminal within your project directory:

```bash
php artisan migrate
```

The Bootstrap and Vue scaffolding provided by Laravel is located in the ```laravel/ui``` Composer package, which may be installed using Composer:
```bash
composer require laravel/ui
```

Once the ```laravel/ui``` package has been installed, you must install the frontend scaffolding using the ```ui``` Artisan command:
```bash
// Generate login / registration scaffolding...
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

### Step 7: Download the provided code
Download the provided code files and paste them into the appropriate directories of your ```laravelUser```. Ensure all necessary files are in ```replace``` for the application to function correctly.

```bash
\xampp\htdocs\laravelUser
```

### Step 8: Migrate Database Again
Run the migration command again:

```bash
php artisan migrate
```

### Step 9: Create Storage Link
If the `public/storage` link already exists, remove it and recreate it:

```bash
php artisan storage:link
```

If you encounter an existing link issue, run:

```bash
rm public/storage
php artisan storage:link
```

### Step 10: Serve the Application
Finally, start the local development server:

```bash
php artisan serve
```
Open another terminal for the ```npm run dev``` command will process the instructions in your ```vite.config.js``` file.
```bash
npm run dev
```

Your application should now be accessible at `http://localhost:8000`.


# Laravel User Project Features

This Laravel User Project encompasses several key features developed through a series of assessments, showcasing user management and advanced functionalities. 

### Assessment 1: Basic User Management and Authentication
- **User Authentication**: Utilizes Laravel's built-in authentication system for secure access.
- **CRUD Operations**: Implements Create, Read, Update, and Delete functionalities for user management.
- **Soft Delete**: Includes functionality to soft delete users, with pages for listing, restoring, and permanently deleting soft-deleted users.
- **User Avatars**: Supports photo uploads for user profiles, with forms designed for handling file uploads.

### Assessment 2: Advanced User Management
- **Service Pattern Implementation**: Introduces a service class to manage user-related operations, encapsulating business logic.
- **Validation**: Implements input validation using dedicated request classes to ensure data integrity.
- **Unit Testing**: Develops unit tests to cover key functionalities, enhancing the reliability of the user service.

### Assessment 3: Extended Features
- **User Addresses**: Manages user addresses, allowing multiple addresses per user through a one-to-many relationship.
- **Event and Listener**: Implements an event system to trigger actions when a user is created or updated, with a listener handling address storage automatically.

These features demonstrate a robust implementation of user management within a Laravel application, ensuring secure and efficient handling of user data.



