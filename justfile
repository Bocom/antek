set windows-shell := ["pwsh.exe", "-c"]

alias up := start
alias down := stop

# Build assets
build:
    ./node_modules/.bin/vite build

# Start Docker container
start:
    docker-compose up -d

# Stop Docker container
stop:
    docker-compose stop

# Destroy Docker container and volumes
destroy:
    docker-compose down --volumes

# Install PHP and Node dependencies
install:
    composer install
    pnpm install

# Run database migrations in Docker container
migrate *FLAGS:
    docker compose exec app php artisan migrate {{FLAGS}}

# Start a `sh` session in app container
shell:
    docker compose exec app sh

setup: install
    cp .env.example .env
    php artisan key:generate

docker-build:
    docker-compose build

docker-setup: install && build
    cp .env.docker .env
    php artisan key:generate