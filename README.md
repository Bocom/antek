# Antek

Snippet manager built using [Laravel 9](https://laravel.com/docs/9.x).

## Requirements

- PHP 8+
- Node 16+ (Pinned with [Volta](https://volta.sh))
- [pnpm](https://pnpm.io)
- A database of some kind (SQLite is fine, Docker defaults to MariaDB)
- [Meilisearch](https://meilisearch.com) for searching
- A [Torchlight](https://torchlight.dev) token for code highlighting (Optional, but recommended)
- [just](https://github.com/casey/just) (Optional)

## Getting Started

### With `just`

```shell
> just setup
```

Make additional changes to your `.env` file, like adding a Torchlight token, setting the desired application environment or [setting up SQLite](https://laravel.com/docs/9.x/database#sqlite-configuration).

Run database migrations.

```shell
> php artisan migrate
```

Build frontend assets (or start the dev server).

```shell
> pnpm build # or `pnpm dev` to start the dev server
```

### Manual Setup

```shell
> composer install
> cp .env.example .env
> php artisan key:generate
> touch database/database.sqlite # Put full path to this file in .env's `DB_DATABASE` variable
> php artisan migrate
> pnpm install
> pnpm build # Or `pnpm dev` to start the dev server
```

### Docker

**NOTE:** This Docker setup is not suitable for development out-of-the box yet.

This section uses [just](https://github.com/casey/just) to simplify the commands, but it's not a requirement. Just look in the `justfile` for the appropriate commands.

Clone the repository and run the following command to install the necessary dependencies, create a `.env` file, generate an app key and build frontend dependencies.

```shell
> just docker-setup
```

Make additional changes to your `.env` file, like adding a Torchlight token or setting the desired application environment.

Run the following command to build the Docker application image.

```shell
> just docker-build
```

Start the containers by running the following command.

```shell
> just start
```

Finally, run the database migrations.

```shell
> just migrate # Add --force if you're running the container in production mode
```
