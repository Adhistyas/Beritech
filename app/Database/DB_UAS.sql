CREATE DATABASE IF NOT EXISTS beritech CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE beritech;

CREATE TABLE users (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  username VARCHAR(50) NOT NULL UNIQUE,
  email VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);

CREATE TABLE categories (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(100) NOT NULL,
  slug VARCHAR(120) NOT NULL UNIQUE,
  created_at DATETIME NULL,
  updated_at DATETIME NULL
);

CREATE TABLE articles (
  id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
  category_id INT UNSIGNED NOT NULL,
  title VARCHAR(200) NOT NULL,
  slug VARCHAR(220) NOT NULL UNIQUE,
  author VARCHAR(100) NOT NULL,
  content TEXT NOT NULL,
  image VARCHAR(255) NULL,
  status ENUM('draft', 'published') NOT NULL DEFAULT 'published',
  published_at DATE NOT NULL,
  created_at DATETIME NULL,
  updated_at DATETIME NULL,
  KEY category_id (category_id),
  CONSTRAINT fk_articles_category FOREIGN KEY (category_id) REFERENCES categories (id) ON DELETE CASCADE ON UPDATE CASCADE
);


INSERT INTO users (name, username, email, password, created_at, updated_at) VALUES
('Administrator', 'admin', 'admin@beritech.com', '$2b$10$k35hhAt78DWgX9m45kMKguzNqG.msmAlNlqAo5n4BsSVvOLGyjS62', NOW(), NOW());

INSERT INTO categories (name, slug, created_at, updated_at) VALUES
('Gadget', 'gadget', NOW(), NOW()),
('Aplikasi & Software', 'aplikasi-software', NOW(), NOW()),
('Kecerdasan Buatan', 'kecerdasan-buatan', NOW(), NOW()),
('Startup', 'startup', NOW(), NOW()),
('Internet & Jaringan', 'internet-jaringan', NOW(), NOW()),
('Sains Digital', 'sains-digital', NOW(), NOW());
