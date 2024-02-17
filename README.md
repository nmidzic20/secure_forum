# secure_forum
A highly secure web messaging board made for Security of Information Systems course. In reality, created with various security flaws for the purposes of API penetration testing.

# Instructions
- You must have php installed
- Open a terminal and `cd` into the directory
- Run `php -S localhost:8000` (you can substitute 8000 with any other available port)
- Open localhost:8000 in your browser

Instead of running with php, another alternative is to run with XAMPP (in this case the project should be placed in `htdocs` directory).

  If you want to create a local database, put your credentials for database in `database/db_config.php` file and in terminal run `php database/create_database.php`. Alternatively, read instructions below for creating a Docker database.

# Docker
- Install Docker
- From project root directory, run `docker-compose up --build -d`

  It is enough to run this command only once when the project is first installed. The command will create Docker container for MySQL database with initial data. The Docker container should be started each time before running the web application.

