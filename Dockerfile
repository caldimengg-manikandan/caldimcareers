# Use official PHP 8.2 CLI image
FROM php:8.2-cli

# Install system dependencies and PHP extensions for MySQL handling
RUN apt-get update && apt-get install -y \
    libzip-dev \
    unzip \
    && docker-php-ext-install pdo pdo_mysql zip

# Set the working directory
WORKDIR /app

# Copy the entire project to the container's working directory
COPY . /app

# Expose the port Render expects to route to
EXPOSE 8000

# Run the built-in PHP web server using the custom router
CMD ["php", "-S", "0.0.0.0:8000", "router.php"]
