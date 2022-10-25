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

Clone the repository and run the following command to install then necessary dependencies, create a `.env` file and generate an app key.

```shell
> just setup
```

Make changes to your `.env` file if necessary.

Run the following command to build the assets and the application Docker image.

```shell
> just build
```

Start the containers by running the following command.

```shell
> just start
```

Finally, run the database migrations.

```shell
> just migrate # Add --force if you're running the container in production mode
```
