# Networking-Project-using-VM-and-PUTTY
This repository contains a setup of a LAMP stack (Linux, Apache, MySQL, PHP) with a sample PHP web application that collects user data and supports file uploads. 
The server is configured on a CentOS virtual machine using VirtualBox with NAT and bridged networking. 
A cloned DB server handles MySQL separately, demonstrating multi-VM architecture using VirtualBox.

## Setup Steps

1. **VM Configuration:**
   - Web server created using VirtualBox (headless start)
   - Bridged + NAT networking configured
   - DB server cloned from web server VM

2. **Installations on Web Server:**
   ```bash
   yum install httpd -y
   dnf module list php
   dnf module -y enable php:8.1
   dnf module -y install php:8.1/common
   yum install mysql -y
   yum install php-mysqli -y

3. **Start Apache and disable firewall:**
   ```bash
   systemctl enable --now httpd
   setenforce 0
   systemctl stop firewalld
   
4. **Project File:**
   File path: /var/www/html/main.php
   PHP form inserts user data into MySQL and uploads file to /var/udc/uploads/

5. **MySQL DB (on DB server):**

    Host: 192.168.0.153
    
    Database: udc
    
    User: udc123
    
    Password: Root@123
