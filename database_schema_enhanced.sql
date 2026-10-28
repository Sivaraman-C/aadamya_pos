-- Aadamya POS System - Enhanced Database Schema
-- This schema includes proper primary keys, foreign keys, indexes, and constraints
-- Generated: 2025-09-01

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

-- =====================================================
-- Database: `aadamya_pos`
-- =====================================================

-- =====================================================
-- Table: `register_seller`
-- Purpose: Store seller/admin user information
-- =====================================================
CREATE TABLE IF NOT EXISTS `register_seller` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `login_oauth_uid` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `name` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  `contact_no` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `image` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `password` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `mobile_otp` VARCHAR(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `otp_generation_time` DATETIME,
  `otp_expiration_time` DATETIME,
  `mobile_verified_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'inactive',
  `email_verified` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'inactive',
  `status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_email` (`email`),
  KEY `idx_status` (`status`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `customer`
-- Purpose: Store customer information
-- =====================================================
CREATE TABLE IF NOT EXISTS `customer` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci UNIQUE,
  `address` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `city` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `state` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `country` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `postal_code` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `customer_type` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'retail',
  `status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_contact` (`contact`),
  KEY `idx_email` (`email`),
  KEY `idx_status` (`status`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `product`
-- Purpose: Store product inventory information
-- =====================================================
CREATE TABLE IF NOT EXISTS `product` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `product_name` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `category` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `brand` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `sku` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci UNIQUE,
  `quantity` INT NOT NULL DEFAULT 0,
  `min_stock_level` INT DEFAULT 10,
  `reorder_quantity` INT DEFAULT 50,
  `cost_price` DECIMAL(12, 2) NOT NULL,
  `unit_price` DECIMAL(12, 2) NOT NULL,
  `discount_percentage` DECIMAL(5, 2) DEFAULT 0,
  `final_price` DECIMAL(12, 2) NOT NULL,
  `image` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `description` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `supplier_id` INT,
  `status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_category` (`category`),
  KEY `idx_brand` (`brand`),
  KEY `idx_sku` (`sku`),
  KEY `idx_status` (`status`),
  KEY `idx_quantity` (`quantity`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `orders`
-- Purpose: Store order information
-- =====================================================
CREATE TABLE IF NOT EXISTS `orders` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `customer_id` INT NOT NULL,
  `customer_name` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `order_date` TIMESTAMP NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `subtotal` DECIMAL(12, 2) NOT NULL,
  `discount` DECIMAL(12, 2) DEFAULT 0,
  `discount_percentage` DECIMAL(5, 2) DEFAULT 0,
  `shipping` DECIMAL(12, 2) DEFAULT 0,
  `tax` DECIMAL(12, 2) DEFAULT 0,
  `grand_total` DECIMAL(12, 2) NOT NULL,
  `invoice_number` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  `payment_method` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'cash',
  `payment_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'pending',
  `transaction_id` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `order_status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'completed',
  `notes` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  KEY `idx_invoice_number` (`invoice_number`),
  KEY `idx_customer_id` (`customer_id`),
  KEY `idx_order_date` (`order_date`),
  KEY `idx_payment_status` (`payment_status`),
  KEY `idx_order_status` (`order_status`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `order_items`
-- Purpose: Store individual items in each order
-- =====================================================
CREATE TABLE IF NOT EXISTS `order_items` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `order_id` INT NOT NULL,
  `product_id` INT NOT NULL,
  `product_name` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `price` DECIMAL(12, 2) NOT NULL,
  `quantity` INT NOT NULL DEFAULT 1,
  `discount_percentage` DECIMAL(5, 2) DEFAULT 0,
  `discount_amount` DECIMAL(12, 2) DEFAULT 0,
  `total` DECIMAL(12, 2) NOT NULL,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  KEY `idx_order_id` (`order_id`),
  KEY `idx_product_id` (`product_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `stock_transactions`
-- Purpose: Track all inventory changes
-- =====================================================
CREATE TABLE IF NOT EXISTS `stock_transactions` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `product_id` INT NOT NULL,
  `transaction_type` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `quantity_change` INT NOT NULL,
  `previous_quantity` INT NOT NULL,
  `new_quantity` INT NOT NULL,
  `reference_id` INT,
  `reference_type` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `remarks` TEXT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_by` INT,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`product_id`) REFERENCES `product` (`id`) ON DELETE RESTRICT ON UPDATE CASCADE,
  KEY `idx_product_id` (`product_id`),
  KEY `idx_transaction_type` (`transaction_type`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `supplier`
-- Purpose: Store supplier information
-- =====================================================
CREATE TABLE IF NOT EXISTS `supplier` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `name` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `contact_person` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `email` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `phone` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `city` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `state` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `country` VARCHAR(120) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `postal_code` VARCHAR(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `status` VARCHAR(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci DEFAULT 'active',
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_status` (`status`),
  KEY `idx_email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `payment_methods`
-- Purpose: Store payment method settings
-- =====================================================
CREATE TABLE IF NOT EXISTS `payment_methods` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `method_name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL UNIQUE,
  `description` VARCHAR(360) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `config` JSON,
  `is_active` BOOLEAN DEFAULT true,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  `updated_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  KEY `idx_is_active` (`is_active`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- =====================================================
-- Table: `audit_log`
-- Purpose: Track system activities and changes
-- =====================================================
CREATE TABLE IF NOT EXISTS `audit_log` (
  `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  `user_id` INT,
  `action` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `table_name` VARCHAR(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `record_id` INT,
  `old_values` JSON,
  `new_values` JSON,
  `ip_address` VARCHAR(45) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `user_agent` VARCHAR(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci,
  `created_at` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  KEY `idx_user_id` (`user_id`),
  KEY `idx_action` (`action`),
  KEY `idx_created_at` (`created_at`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Insert sample payment methods
INSERT IGNORE INTO `payment_methods` (`method_name`, `description`, `is_active`) VALUES
('Cash', 'Cash Payment', true),
('Card', 'Credit/Debit Card', true),
('Online Transfer', 'Bank Transfer', true),
('Razorpay', 'Razorpay Payment Gateway', true),
('UPI', 'UPI Payment', true),
('Cheque', 'Cheque Payment', true);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
COMMIT;
