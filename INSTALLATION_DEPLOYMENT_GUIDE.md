# Aadamya POS System - Installation & Deployment Guide

## Table of Contents
1. [System Requirements](#system-requirements)
2. [Pre-Installation Checklist](#pre-installation-checklist)
3. [Installation Steps](#installation-steps)
4. [Development Deployment](#development-deployment)
5. [Production Deployment](#production-deployment)
6. [Database Migration](#database-migration)
7. [Troubleshooting](#troubleshooting)
8. [Post-Installation Security](#post-installation-security)

---

## System Requirements

### Server Requirements
- **OS:** Linux/Ubuntu 18.04+, Windows Server 2012+, or macOS 10.12+
- **Web Server:** Apache 2.4+ with mod_rewrite enabled, or Nginx 1.12+
- **PHP Version:** 7.4+ (Recommended: 8.0+)
- **MySQL/MariaDB:** 5.7+ or 8.0+
- **Memory:** Minimum 512MB RAM (Recommended: 2GB+)
- **Storage:** Minimum 1GB free space (Recommended: 5GB+)

### PHP Extensions Required
```
- mysqli (MySQL improved)
- json
- gd (for image processing)
- curl
- openssl
- zip
- mbstring
- fileinfo
```

### Composer
- Composer 2.0+ (Required for dependency management)

---

## Pre-Installation Checklist

### Local Development Setup
- [ ] PHP 7.4+ installed
- [ ] MySQL/MariaDB installed and running
- [ ] Git installed
- [ ] Composer installed
- [ ] Text editor or IDE (VS Code, PhpStorm, etc.)

### Production Setup
- [ ] Dedicated Linux server with root/sudo access
- [ ] SSH key pair configured
- [ ] Web server (Apache/Nginx) installed
- [ ] PHP 7.4+ installed with required extensions
- [ ] MySQL/MariaDB server running
- [ ] SSL certificate (Let's Encrypt recommended)
- [ ] Firewall configured
- [ ] Backup system in place

---

## Installation Steps

### Step 1: Clone the Repository

```bash
# Navigate to your web root
cd /var/www/html

# Clone the repository
git clone <repository-url> aadamya_pos
cd aadamya_pos
```

### Step 2: Install PHP Dependencies

```bash
# Install composer dependencies
composer install

# Verify installation
composer dump-autoload
```

### Step 3: Create Environment Configuration

```bash
# Copy .env.example to .env
cp .env.example .env

# Edit .env with your settings
nano .env
# or
vim .env
```

### Step 4: Configure Database Credentials

Edit `.env` file and update database settings:

```env
# DATABASE CONFIGURATION
DB_DRIVER=mysqli
DB_HOSTNAME=localhost
DB_USERNAME=aadamya_user
DB_PASSWORD=your_secure_password
DB_DATABASE=aadamya_pos
DB_CHARSET=utf8mb4
DB_COLLATION=utf8mb4_general_ci
```

### Step 5: Create Database

```bash
# Login to MySQL
mysql -u root -p

# Run these commands in MySQL
CREATE DATABASE aadamya_pos CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
CREATE USER 'aadamya_user'@'localhost' IDENTIFIED BY 'your_secure_password';
GRANT ALL PRIVILEGES ON aadamya_pos.* TO 'aadamya_user'@'localhost';
FLUSH PRIVILEGES;
EXIT;
```

### Step 6: Import Database Schema

```bash
# Import the original database
mysql -u aadamya_user -p aadamya_pos < aadamya_pos.sql

# Optional: Import enhanced schema
mysql -u aadamya_user -p aadamya_pos < database_schema_enhanced.sql
```

### Step 7: Set File Permissions

```bash
# Set proper permissions
chmod -R 755 /var/www/html/aadamya_pos
chmod -R 777 /var/www/html/aadamya_pos/application/logs
chmod -R 777 /var/www/html/aadamya_pos/application/cache
chmod -R 777 /var/www/html/aadamya_pos/uploads (if exists)
chmod -R 777 /var/www/html/aadamya_pos/backups (if exists)

# Set Apache user ownership
sudo chown -R www-data:www-data /var/www/html/aadamya_pos
```

### Step 8: Configure Web Server

#### For Apache:

Ensure `.htaccess` is configured correctly (already included):

```apache
<IfModule mod_rewrite.c>
    RewriteEngine On
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteRule ^(.*)$ index.php/$1 [L]
</IfModule>
```

Create virtual host:

```bash
sudo nano /etc/apache2/sites-available/aadamya_pos.conf
```

Add:
```apache
<VirtualHost *:80>
    ServerName yourdomain.com
    ServerAlias www.yourdomain.com
    ServerAdmin admin@yourdomain.com
    
    DocumentRoot /var/www/html/aadamya_pos
    
    <Directory /var/www/html/aadamya_pos>
        AllowOverride All
        Require all granted
    </Directory>
    
    ErrorLog ${APACHE_LOG_DIR}/aadamya_pos_error.log
    CustomLog ${APACHE_LOG_DIR}/aadamya_pos_access.log combined
</VirtualHost>
```

Enable:
```bash
sudo a2enmod rewrite
sudo a2ensite aadamya_pos
sudo apache2ctl configtest
sudo systemctl restart apache2
```

#### For Nginx:

Create server block:

```bash
sudo nano /etc/nginx/sites-available/aadamya_pos
```

Add:
```nginx
server {
    listen 80;
    server_name yourdomain.com www.yourdomain.com;
    root /var/www/html/aadamya_pos;

    index index.php index.html;

    location ~ \.php$ {
        include snippets/fastcgi-php.conf;
        fastcgi_pass unix:/var/run/php/php8.0-fpm.sock;
    }

    location ~ /\.ht {
        deny all;
    }
    
    error_log /var/log/nginx/aadamya_pos_error.log;
    access_log /var/log/nginx/aadamya_pos_access.log;
}
```

Enable and test:
```bash
sudo ln -s /etc/nginx/sites-available/aadamya_pos /etc/nginx/sites-enabled/
sudo nginx -t
sudo systemctl restart nginx
```

### Step 9: Verify Installation

```bash
# Test database connection
php -r "
\$mysqli = new mysqli('localhost', 'aadamya_user', 'password', 'aadamya_pos');
if (\$mysqli->connect_error) {
    die('DB Connection Failed: ' . \$mysqli->connect_error);
}
echo 'Database connected successfully!';
\$mysqli->close();
"

# Check PHP version
php -v

# Check installed extensions
php -m | grep -E 'mysqli|json|gd|curl|openssl'
```

### Step 10: Access Application

Open your browser and navigate to:
```
http://localhost/aadamya_pos
or
https://yourdomain.com
```

---

## Development Deployment

### For Local Development

```bash
# 1. Clone repository
git clone <repository> aadamya_pos
cd aadamya_pos

# 2. Install dependencies
composer install

# 3. Configure .env
cp .env.example .env
# Edit .env with local settings

# 4. Create local database
# Run MySQL commands above

# 5. Import schema
mysql -u root -p aadamya_pos < aadamya_pos.sql

# 6. Set permissions
chmod -R 755 .
chmod -R 777 application/logs application/cache

# 7. Start development server (optional)
php -S localhost:8000

# Access at http://localhost:8000
```

### Using Docker (Optional)

Create `docker-compose.yml`:

```yaml
version: '3.8'

services:
  web:
    image: php:8.0-apache
    ports:
      - "80:80"
    volumes:
      - ./:/var/www/html
    environment:
      - APACHE_DOCUMENT_ROOT=/var/www/html
    depends_on:
      - db

  db:
    image: mysql:8.0
    environment:
      MYSQL_DATABASE: aadamya_pos
      MYSQL_USER: aadamya_user
      MYSQL_PASSWORD: password
      MYSQL_ROOT_PASSWORD: root_password
    volumes:
      - db_data:/var/lib/mysql
    ports:
      - "3306:3306"

volumes:
  db_data:
```

Run:
```bash
docker-compose up -d
docker-compose exec db mysql -uroot -proot_password aadamya_pos < aadamya_pos.sql
```

---

## Production Deployment

### Pre-Production Checklist
- [ ] Update `.env` with production credentials
- [ ] Set `CI_ENVIRONMENT` to `production`
- [ ] Install SSL certificate (Let's Encrypt)
- [ ] Configure firewall
- [ ] Set up backup system
- [ ] Configure logging
- [ ] Set up monitoring
- [ ] Configure email service
- [ ] Test payment gateway integration
- [ ] Load test application
- [ ] Security audit complete

### Deployment Steps

```bash
# 1. SSH into server
ssh root@your-server-ip

# 2. Navigate to web directory
cd /var/www/html

# 3. Clone and setup
git clone <repository> aadamya_pos
cd aadamya_pos
composer install --no-dev --optimize-autoloader

# 4. Configure production .env
cp .env.example .env
nano .env
# Set:
#   CI_ENVIRONMENT=production
#   DB_HOSTNAME=your-db-host
#   DB_USERNAME=aadamya_user
#   DB_PASSWORD=strong_password
#   DB_DATABASE=aadamya_pos
#   BASE_URL=https://yourdomain.com/

# 5. Setup database
mysql -h your-db-host -u admin -p < aadamya_pos.sql

# 6. Set permissions
sudo chown -R www-data:www-data /var/www/html/aadamya_pos
chmod -R 755 /var/www/html/aadamya_pos
chmod -R 777 /var/www/html/aadamya_pos/application/{logs,cache}

# 7. Configure HTTPS
sudo certbot certonly --standalone -d yourdomain.com

# 8. Restart web server
sudo systemctl restart apache2  # or nginx

# 9. Verify
curl https://yourdomain.com
```

### Performance Optimization

```bash
# Enable compression (Apache)
echo 'mod_deflate.so' | sudo tee -a /etc/apache2/mods-enabled/deflate.conf

# Enable caching
sudo a2enmod expires
sudo a2enmod headers

# Set proper cache headers
echo '
<FilesMatch "\\.(jpg|jpeg|png|gif|ico|css|js)$">
    Header set Cache-Control "max-age=31536000, public"
</FilesMatch>
' | sudo tee -a /etc/apache2/sites-available/aadamya_pos.conf
```

---

## Database Migration

### Backup Database

```bash
# Backup current database
mysqldump -u aadamya_user -p aadamya_pos > backup_$(date +%Y%m%d_%H%M%S).sql

# Backup to specific location
mysqldump -u aadamya_user -p aadamya_pos > /backups/aadamya_pos_backup.sql
```

### Restore Database

```bash
# Restore from backup
mysql -u aadamya_user -p aadamya_pos < backup_20250901_120000.sql

# Restore with progress
pv backup.sql | mysql -u aadamya_user -p aadamya_pos
```

### Migration to Enhanced Schema

```bash
# 1. Backup current database
mysqldump -u aadamya_user -p aadamya_pos > backup_before_migration.sql

# 2. Apply enhanced schema
mysql -u aadamya_user -p aadamya_pos < database_schema_enhanced.sql

# 3. Migrate data (if needed)
# Contact support for migration scripts
```

---

## Troubleshooting

### Database Connection Error

```
Error: SQLSTATE[HY000] [2002] No such file or directory
```

**Solution:**
```bash
# Check MySQL is running
sudo systemctl status mysql
sudo systemctl start mysql

# Verify credentials
mysql -u aadamya_user -p -h localhost
```

### Permission Denied Error

```
Warning: file_put_contents(...): failed to open stream
```

**Solution:**
```bash
# Fix permissions
sudo chown -R www-data:www-data /var/www/html/aadamya_pos
chmod -R 755 application
chmod -R 777 application/logs application/cache
```

### White Screen of Death

**Solution:**
```bash
# Check error logs
tail -f application/logs/*

# Enable debug mode in .env
CI_ENVIRONMENT=development

# Check PHP errors
php -l index.php
```

### Composer Error

```bash
# Clear composer cache
composer clear-cache

# Reinstall dependencies
rm -rf vendor composer.lock
composer install
```

---

## Post-Installation Security

### 1. Update Configuration

```env
# In .env
CI_ENVIRONMENT=production
CSRF_PROTECTION=true
SESSION_SECURE=true
ENCRYPTION_KEY=generate_secure_key_here
```

### 2. Generate Encryption Key

```bash
php -r "echo bin2hex(random_bytes(32));" > /dev/stdout
# Copy the output to ENCRYPTION_KEY in .env
```

### 3. Set File Permissions

```bash
# Production permissions
find . -type f -exec chmod 644 {} \;
find . -type d -exec chmod 755 {} \;
chmod 600 .env
chmod 777 application/logs application/cache
```

### 4. Remove Unnecessary Files

```bash
# Remove from production
rm -rf tests
rm -rf README.md
rm -rf .git .gitignore
rm -rf composer.json composer.lock
rm .env.example
```

### 5. Setup HTTPS

```bash
# Install SSL certificate
sudo certbot certonly --standalone -d yourdomain.com

# Configure auto-renewal
sudo certbot renew --dry-run
sudo certbot renew  # Runs daily via cron
```

### 6. Configure Firewall

```bash
# UFW firewall
sudo ufw enable
sudo ufw allow 22/tcp
sudo ufw allow 80/tcp
sudo ufw allow 443/tcp
sudo ufw default deny incoming
sudo ufw default allow outgoing
```

### 7. Set Up Monitoring

```bash
# Monitor logs
tail -f application/logs/*

# Monitor system
htop
iostat -x 1
```

### 8. Configure Backups

```bash
# Daily backup script (cron)
0 2 * * * /var/scripts/backup_aadamya_pos.sh

# Create backup script
#!/bin/bash
DATE=$(date +%Y%m%d_%H%M%S)
BACKUP_DIR="/backups/aadamya_pos"
mkdir -p $BACKUP_DIR

mysqldump -u aadamya_user -p$DB_PASSWORD aadamya_pos > $BACKUP_DIR/db_$DATE.sql
tar -czf $BACKUP_DIR/files_$DATE.tar.gz /var/www/html/aadamya_pos

# Keep only last 30 days
find $BACKUP_DIR -name "*.sql" -mtime +30 -delete
find $BACKUP_DIR -name "*.tar.gz" -mtime +30 -delete
```

---

## Support & Additional Resources

- **Documentation:** See included .md files
- **API Reference:** API_DOCUMENTATION.md
- **Issues:** Create an issue on GitHub
- **Email:** support@aadamya.com

---

**Last Updated:** September 1, 2025
