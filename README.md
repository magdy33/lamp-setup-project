# LAMP Setup and Website Deployment

## Steps

1. **Install Required Packages**:
    - Used the following command:
      ```bash
      sudo apt-get update
      sudo apt-get install apache2 mysql-server php libapache2-mod-php php-mysql
      ```

2. **Configure Apache**:
    - Verified by creating a simple `index.html` file in `/var/www/html`.

3. **Website Setup**:
    - Replaced `index.html` with `index.php`.
    - Content of `index.php`:
      ```php
      <?php
      echo "Hello World!";
      echo "Your IP is: " . $_SERVER['REMOTE_ADDR'];
      echo "Current time: " . date('Y-m-d H:i:s');
      ?>
      ```
    - Tested PHP functionality by accessing the server IP.

4. **MySQL Configuration**:
    - Secured MySQL installation using `mysql_secure_installation`.
    - Created database `web_db` and user `web_user` with the following commands:
      ```sql
      CREATE DATABASE web_db;
      CREATE USER 'web_user'@'localhost' IDENTIFIED BY 'StrongPassword123';
      GRANT ALL PRIVILEGES ON web_db.* TO 'web_user'@'localhost';
      FLUSH PRIVILEGES;
      ```

5. **Dynamic Website**:
    - Modified `index.php` to show the visitor’s IP address and the current time.

6. **Made Publicly Accessible**:
    - Configured the firewall to allow HTTP (port 80) and HTTPS (port 443) traffic:
      ```bash
      sudo ufw allow 80/tcp
      sudo ufw allow 443/tcp
      ```
    - Obtained a public IP for the server and linked it to a custom domain using DNS A records.
    - Verified access by visiting `http://your-domain.com`.

## Repository Structure
- `/var/www/html/`
  - `index.php`: Main PHP file displaying visitor IP and time.
  - `.gitignore`: Excludes sensitive files like `config.php`, `.env`, and `*.sql`.



/var/www/html ├── .gitignore ├── README.md ├── index.php



## Repository Structure
- `/var/www/html/`
  - `.gitignore`: Excludes sensitive files like `config.php`, `.env`, and `*.sql`.
  - `README.md`: Documentation of the LAMP setup and deployment steps.
  - `index.php`: Main PHP file displaying visitor IP and time.

**Directory Tree:**
```plaintext
/var/www/html
├── .gitignore
├── README.md
├── index.php



