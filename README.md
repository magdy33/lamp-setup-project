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
    - Verified access by visiting `ec2-54-208-161-254.compute-1.amazonaws.com`
    - or using the IP  54.208.161.254 .
    - if the DNS dosenot work please try to open it in incognito mode

**Directory Tree:**
```plaintext
/var/www/html
├── .gitignore
├── README.md
├── index.php


## Repository Structure
- `/var/www/html/`
  - `.gitignore`: Excludes sensitive files like `config.php`, `.env`, and `*.sql`.
  - `README.md`: Documentation of the LAMP setup and deployment steps.
  - `index.php`: Main PHP file displaying visitor IP and time.




##===========================================================================================##

## Networking Basics

### 1. IP Address
- An **IP Address** (Internet Protocol Address) is a numerical label assigned to each device connected to a computer network.
- **Purpose**:
  - Identifies a device on a network.
  - Facilitates communication between devices on a network (like sending and receiving data).
- Example: `192.168.1.1` (IPv4) or `2001:0db8:85a3:0000:0000:8a2e:0370:7334` (IPv6).

### 2. MAC Address
- A **MAC Address** (Media Access Control Address) is a unique identifier assigned to a network interface card (NIC) of a device.
- **Purpose**:
  - Identifies devices at the hardware level within a local network (Layer 2 of OSI model).
  - Used for communication within the same network segment.
- **Differences from an IP Address**:
  - **MAC Address** is hardware-based and remains constant, while an **IP Address** is software-based and can change (e.g., assigned by a DHCP server).
  - Example of a MAC Address: `00:1A:2B:3C:4D:5E`.

### 3. Switches, Routers, and Routing Protocols
- **Switch**:
  - A device that connects devices within a local network (LAN) and uses MAC addresses to forward data.
  - Operates at Layer 2 (Data Link Layer) of the OSI model.
- **Router**:
  - A device that connects multiple networks and routes data packets between them.
  - Operates at Layer 3 (Network Layer) of the OSI model.
- **Routing Protocols**:
  - Algorithms used by routers to determine the best path for forwarding packets across a network.
  - Examples: OSPF (Open Shortest Path First), BGP (Border Gateway Protocol), RIP (Routing Information Protocol).

### 4. Remote Connection to Cloud Instance
- To connect to a cloud-based Linux instance from a remote machine, follow these steps:
  1. **Ensure SSH is Installed**:
     - Check if SSH is installed on your local machine.
     - For Linux/macOS:
       ```bash
       ssh -V
       ```
     - For Windows, use a terminal like PowerShell or an SSH client like PuTTY.
  2. **Obtain Your Cloud Instance’s Public IP Address**:
     - Retrieve the instance's public IP address from your cloud provider's dashboard.
  3. **Connect Using SSH**:
     - Use the following command:
       ```bash
       ssh -i /path/to/private-key.pem username@public-ip
       ```
     - Replace `/path/to/private-key.pem` with the path to your private key file, `username` with the Linux user (e.g., `ubuntu`), and `public-ip` with your instance’s IP address.
  4. **Verify Connectivity**:
     - Once connected, you should see a terminal prompt for the remote server.

