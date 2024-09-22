# Garage Management System

The Garage Management System is a web application developed to manage vehicle services, scheduling, and user interactions. This project is built using PHP and CodeIgniter framework, providing an intuitive user interface for administrators and regular users alike.

## Project Features
- **Admin Management:** Admins can manage vehicles, service records, and users.
- **User Scheduling:** Users can book services, view their service history, and receive updates.
- **User Types:**
  - **Admin User:**
    - Username: `admin`
    - Password: `admin`
  - **Test User:**
    - Username: `test`
    - Password: `test`

## Prerequisites

- **PHP Version:** 5.6 or newer (recommended)
- **Database:** MySQL (or compatible)
- **Web Server:** Apache or Nginx

## Installation Instructions

### 1. Clone the Repository
git clone https://github.com/your-repo/garage-management.git  
cd garage-management

### 2. Setup the Database
- Create a new database in MySQL called `garage`.
- Import the `garage.sql` file located in the project root.

  mysql -u your-username -p your-password garage < garage.sql

### 3. Configure the Database Connection
- Open the `application/config/database.php` file.
- Update the database credentials to match your local environment:

  'hostname' => 'localhost',  
  'username' => 'your-db-username',  
  'password' => 'your-db-password',  
  'database' => 'garage',

### 4. Run the Application Locally
1. Start your local development server (Apache or Nginx).
2. Ensure the document root is pointing to the `public` folder in the CodeIgniter project.
3. Access the application by navigating to:

   http://localhost/garage-management

### 5. Admin & Test Users
- **Admin User:**
  - Username: `admin`
  - Password: `admin`
- **Test User:**
  - Username: `test`
  - Password: `test`

### 6. File Permissions
Ensure that the following directories are writable:
- `application/cache/`
- `application/logs/`

### 7. Optional Configurations
- Adjust the `base_url` in `application/config/config.php` to match your local environment:

  $config['base_url'] = 'http://localhost/garage-management/';

## License
This project is open-source and available under the [MIT License](LICENSE).

## Support and Resources
- [CodeIgniter Documentation](https://codeigniter.com/docs)
- For any issues or feature requests, feel free to open an issue in the repository.

## Acknowledgement
Thanks to the CodeIgniter community and the open-source contributors for their support and contributions to the project.
