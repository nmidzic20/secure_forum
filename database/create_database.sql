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

-- Create comment table
CREATE TABLE IF NOT EXISTS comment (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    topic_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    date_of_comment TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topic(id),
    FOREIGN KEY (user_id) REFERENCES user(id)
);

INSERT INTO user (username, email, password) 
VALUES
    ('admin', 'admin@gmail.com', '123456'),
    ('user', 'user@gmail.com', '123456'),
    ('johndoe', 'johndoe@gmail.com', '123456');

INSERT INTO topic (title, content)
VALUES
    ('Android is better with Kotlin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc.'),
    ('Android is better with Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl.'),
    ('Android is better with Flutter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl.');

INSERT INTO comment (content, topic_id, user_id)
VALUES
    ('Great post, thanks for sharing!', 1, 2),
    ('I agree with you!', 1, 3),
    ('I disagree with you!', 1, 1),
    ('I think you are wrong, because you are wrong!', 2, 1),
    ('I think you are wrong, because you are wrong!', 3, 1);

