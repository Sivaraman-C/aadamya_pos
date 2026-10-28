# Aadamya POS System - API Documentation

## Table of Contents
- [Introduction](#introduction)
- [API Base URL](#api-base-url)
- [Authentication](#authentication)
- [Response Format](#response-format)
- [Error Handling](#error-handling)
- [Endpoints](#endpoints)
- [Examples](#examples)

---

## Introduction

Aadamya POS System is a comprehensive Point of Sale management system built with CodeIgniter 3. This API documentation covers all available endpoints for managing products, customers, orders, and inventory.

**API Version:** 1.0.0  
**Last Updated:** 2025-09-01

---

## API Base URL

```
http://localhost/aadamya_pos/
or
https://yourdomain.com/aadamya_pos/
```

Set your base URL in `.env` file:
```
BASE_URL=http://localhost/aadamya_pos/
```

---

## Authentication

### Session-Based Authentication
The API uses CodeIgniter session-based authentication. Credentials are managed via user login.

### Required Headers
```
Content-Type: application/json
X-Requested-With: XMLHttpRequest (for AJAX requests)
```

---

## Response Format

All API responses follow a standard JSON format:

### Success Response (200)
```json
{
  "status": "success",
  "code": 200,
  "message": "Operation completed successfully",
  "data": {
    "id": 1,
    "name": "Sample Product"
  }
}
```

### Error Response
```json
{
  "status": "error",
  "code": 400,
  "message": "Validation error occurred",
  "errors": {
    "field_name": ["Error message"]
  }
}
```

### Pagination Response
```json
{
  "status": "success",
  "data": [...],
  "pagination": {
    "total": 100,
    "per_page": 10,
    "current_page": 1,
    "last_page": 10
  }
}
```

---

## Error Handling

### Common Error Codes

| Code | Message | Description |
|------|---------|-------------|
| 200 | Success | Request processed successfully |
| 400 | Bad Request | Invalid request parameters |
| 401 | Unauthorized | Authentication required |
| 403 | Forbidden | Insufficient permissions |
| 404 | Not Found | Resource not found |
| 422 | Unprocessable Entity | Validation failed |
| 500 | Internal Server Error | Server error |

---

## Endpoints

### 1. Authentication Endpoints

#### Admin Registration
```
POST /registerAdmin
Content-Type: application/json

{
  "name": "Admin Name",
  "email": "admin@example.com",
  "password": "SecurePassword123",
  "confirm_password": "SecurePassword123",
  "contact": "+1234567890"
}
```

**Response:**
```json
{
  "status": "success",
  "message": "Admin registered successfully"
}
```

---

#### Admin Login
```
POST /signinAdmin
Content-Type: application/json

{
  "email": "admin@example.com",
  "password": "SecurePassword123"
}
```

**Response:**
```json
{
  "status": "success",
  "data": {
    "id": 1,
    "name": "Admin Name",
    "email": "admin@example.com"
  }
}
```

---

#### Admin Logout
```
POST /adminLogout
```

---

#### OTP Verification
```
POST /adminVerify
Content-Type: application/json

{
  "otp": "123456"
}
```

---

### 2. Customer Endpoints

#### Create Customer
```
POST /createCustomer
Content-Type: application/json

{
  "customerName": "John Doe",
  "Contact": "+1234567890",
  "Address": "123 Main Street",
  "City": "New York",
  "Country": "USA"
}
```

**Response:**
```json
{
  "status": "success",
  "message": "Customer created successfully",
  "data": {
    "id": 1,
    "name": "John Doe"
  }
}
```

---

#### Get All Customers
```
GET /api/customers
```

**Response:**
```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "name": "John Doe",
      "contact": "+1234567890",
      "address": "123 Main Street",
      "city": "New York",
      "country": "USA"
    }
  ]
}
```

---

### 3. Product Endpoints

#### Get All Products
```
GET /api/products
```

**Query Parameters:**
- `category` (optional): Filter by category
- `page` (optional): Page number (default: 1)
- `per_page` (optional): Items per page (default: 20)

**Response:**
```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "product_name": "Apple AirPods Pro",
      "category": "Headset",
      "brand": "Apple",
      "quantity": 10,
      "unit_price": 25000,
      "final_price": 21600,
      "image": "url"
    }
  ],
  "pagination": {
    "total": 50,
    "per_page": 20,
    "current_page": 1
  }
}
```

---

#### Get Products by Category
```
GET /api/products/category/{category}
```

**Categories:**
- Headset
- Mobile
- Laptop
- Watch

**Response:**
```json
{
  "status": "success",
  "data": [...]
}
```

---

#### Get Product Details
```
GET /api/products/{product_id}
```

**Response:**
```json
{
  "status": "success",
  "data": {
    "id": 1,
    "product_name": "Apple AirPods Pro",
    "category": "Headset",
    "brand": "Apple",
    "quantity": 10,
    "cost_price": 23499,
    "unit_price": 25000,
    "discount": 10,
    "final_price": 21600,
    "image": "url"
  }
}
```

---

### 4. POS/Sales Endpoints

#### Load POS Dashboard
```
GET /Pointofsales
```

**Response Returns:**
- Category counts
- All products
- Products by category (electronics, phones, laptops, watches)

---

#### Process Payment
```
POST /paymentComplete
Content-Type: application/json

{
  "order_id": 1,
  "amount": 27500,
  "payment_method": "Razorpay",
  "transaction_id": "razorpay_12345"
}
```

**Response:**
```json
{
  "status": "success",
  "message": "Payment processed successfully",
  "invoice_number": "INV-20250901-1234"
}
```

---

#### Save Order with Items
```
POST /save_order_with_items
Content-Type: application/json

{
  "order": {
    "customer_id": 1,
    "customer_name": "John Doe",
    "contact": "+1234567890",
    "subtotal": 50000,
    "discount": 5000,
    "shipping": 500,
    "tax": 8100,
    "grand_total": 53600,
    "invoice_number": "INV-20250901-1234"
  },
  "items": [
    {
      "product_id": 1,
      "product_name": "Apple AirPods Pro",
      "quantity": 2,
      "price": 25000,
      "total": 50000
    }
  ]
}
```

**Response:**
```json
{
  "status": "success",
  "message": "Order saved and stock updated successfully",
  "order_id": 1,
  "invoice_number": "INV-20250901-1234"
}
```

---

### 5. Inventory/Stock Endpoints

#### Get Stock Levels
```
GET /api/stock/levels
```

**Response:**
```json
{
  "status": "success",
  "data": [
    {
      "product_id": 1,
      "product_name": "Apple AirPods Pro",
      "current_quantity": 10,
      "min_stock_level": 5,
      "reorder_quantity": 50,
      "status": "good"
    }
  ]
}
```

---

#### Get Low Stock Items
```
GET /low-stock
```

**Response:**
```json
{
  "status": "success",
  "data": [
    {
      "id": 1,
      "product_name": "Product Name",
      "quantity": 2,
      "min_stock_level": 5
    }
  ]
}
```

---

### 6. Dashboard Endpoints

#### Admin Dashboard
```
GET /dashboard
```

**Response:**
```json
{
  "status": "success",
  "data": {
    "total_sales": 500000,
    "total_orders": 50,
    "total_customers": 25,
    "low_stock_items": 5,
    "recent_orders": [...]
  }
}
```

---

#### Sales Dashboard
```
GET /sales_dashboard
```

**Response:**
```json
{
  "status": "success",
  "data": {
    "daily_sales": 25000,
    "weekly_sales": 150000,
    "monthly_sales": 500000,
    "top_products": [...]
  }
}
```

---

#### Categories Chart Data
```
GET /CatogriesChart
```

**Response:**
```json
{
  "status": "success",
  "data": {
    "Headset": 15,
    "Mobile": 12,
    "Laptop": 8,
    "Watch": 5
  }
}
```

---

### 7. Reports Endpoints

#### Generate Sales Report
```
GET /api/reports/sales
Query Parameters:
  - start_date: YYYY-MM-DD
  - end_date: YYYY-MM-DD
  - format: pdf|csv|json (default: json)
```

---

#### Generate Inventory Report
```
GET /api/reports/inventory
Query Parameters:
  - format: pdf|csv|json (default: json)
```

---

#### Generate Customer Report
```
GET /api/reports/customers
Query Parameters:
  - format: pdf|csv|json (default: json)
```

---

## Examples

### Complete Order Flow Example

#### Step 1: Get all products
```bash
curl -X GET "http://localhost/aadamya_pos/api/products" \
  -H "Content-Type: application/json"
```

#### Step 2: Create/Select Customer
```bash
curl -X POST "http://localhost/aadamya_pos/createCustomer" \
  -H "Content-Type: application/json" \
  -d '{
    "customerName": "John Doe",
    "Contact": "+1234567890",
    "Address": "123 Main Street",
    "City": "New York",
    "Country": "USA"
  }'
```

#### Step 3: Complete Payment
```bash
curl -X POST "http://localhost/aadamya_pos/paymentComplete" \
  -H "Content-Type: application/json" \
  -d '{
    "order_id": 1,
    "amount": 27500,
    "payment_method": "cash"
  }'
```

#### Step 4: Save Order
```bash
curl -X POST "http://localhost/aadamya_pos/save_order_with_items" \
  -H "Content-Type: application/json" \
  -d '{
    "order": {
      "customer_id": 1,
      "customer_name": "John Doe",
      "contact": "+1234567890",
      "subtotal": 50000,
      "discount": 0,
      "shipping": 0,
      "tax": 8100,
      "grand_total": 58100,
      "invoice_number": "INV-20250901-0001"
    },
    "items": [
      {
        "product_id": 1,
        "quantity": 2,
        "price": 25000
      }
    ]
  }'
```

---

## Rate Limiting

Currently, the API does not have rate limiting. For production environments, it's recommended to implement rate limiting at the server level.

---

## Webhooks

Not currently implemented. Future versions may include webhook support for order notifications.

---

## Support

For API issues or questions, please contact: support@aadamya.com

---

**API Version:** 1.0.0  
**Last Updated:** September 1, 2025
