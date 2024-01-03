# Use the official MySQL image from Docker Hub
FROM mysql:latest

# Set environment variables
ENV MYSQL_ROOT_PASSWORD=pass
ENV MYSQL_DATABASE=secure_forum
ENV MYSQL_USER=dbuser
ENV MYSQL_PASSWORD=dbpass

# Copy the SQL script to initialize the database
COPY ./database/create_database.sql /docker-entrypoint-initdb.d/

# Expose the default MySQL port
EXPOSE 3306
