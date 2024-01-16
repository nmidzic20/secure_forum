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
    auth_token VARCHAR(255),
    super_user BOOLEAN DEFAULT FALSE,
    date_of_registration TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

-- Create topic table
CREATE TABLE IF NOT EXISTS topic (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    title VARCHAR(255) NOT NULL,
    content TEXT NOT NULL,
    file_path VARCHAR(255),
    user_id INT UNSIGNED NOT NULL,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

-- Create comment table
CREATE TABLE IF NOT EXISTS comment (
    id INT UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    content TEXT NOT NULL,
    file_path VARCHAR(255),
    topic_id INT UNSIGNED NOT NULL,
    user_id INT UNSIGNED NOT NULL,
    date_of_comment TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (topic_id) REFERENCES topic(id) ON DELETE CASCADE,
    FOREIGN KEY (user_id) REFERENCES user(id) ON DELETE CASCADE
);

INSERT INTO user (username, email, password) 
VALUES
    ('admin', 'admin@gmail.com', '123456'),
    ('user', 'user@gmail.com', '123456'),
    ('johndoe', 'johndoe@gmail.com', '123456');

INSERT INTO topic (title, content, file_path, user_id)
VALUES
    ('Android is better with Kotlin', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc.', NULL, 1),
    ('Android is better with Java', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl. Donec euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl.', 'user_uploads/1.png', 2),
    ('Android is better with Flutter', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla euismod, nisl vitae aliquam ultricies, nunc nisl aliquet nunc, vitae aliquam nisl nunc vitae nisl.', 'user_uploads/2.exe', 2);

INSERT INTO comment (content, file_path, topic_id, user_id)
VALUES
    ('Great post, thanks for sharing!', NULL, 1, 2),
    ('I agree with you!', 'user_uploads/1.png', 1, 3),
    ('I disagree with you!', 'user_uploads/2.exe', 1, 1),
    ('I think you are wrong, because you are wrong!', NULL, 2, 1),
    ('I think you are wrong, because you are wrong!', NULL, 3, 1);

