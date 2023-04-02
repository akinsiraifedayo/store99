CREATE DATABASE juniorproduct;

USE juniorproduct;

CREATE TABLE products (
  id INT AUTO_INCREMENT PRIMARY KEY,
  sku VARCHAR(255) NOT NULL,
  name VARCHAR(255) NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  product_type VARCHAR(255) NOT NULL,
  product_attributes TEXT NOT NULL
);