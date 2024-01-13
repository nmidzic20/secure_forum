# secure_forum
A highly secure web messaging board made for Security of Information Systems course.

# Instructions
- You must have php installed
- Open a terminal and `cd` into the directory
- Run `php -S localhost:8000` (you can substitute 8000 with any other available port)
- Open localhost:8000 in your browser
- to create a database, put your credentials for database in `database/db_config.php` file and in terminal run `php database/create_database.php`

# Docker
- Install Docker
- from project root directory, run `docker-compose up --build -d`

  This will create Docker database, which you can start each time before running the web application.
