-- Create database if not exists
CREATE DATABASE IF NOT EXISTS secure_forum;

-- Use the secure_forum database
USE secure_forum;

-- Create user table
CREATE TABLE IF NOT EXISTS user (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(30) NOT NULL,
    email VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    date_of_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create topic table
CREATE TABLE IF NOT EXISTS topic (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    file_path VARCHAR(255)
);

INSERT INTO user (username, email, password) 
VALUES ('admin', 'admin@gmail.com', '123456');

INSERT INTO user (username, email, password) 
VALUES ('user', 'user@gmail.com', '123456');

INSERT INTO user (username, email, password) 
VALUES ('johndoe', 'johndoe@gmail.com', '123456');

