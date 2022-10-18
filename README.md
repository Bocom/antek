# Antek

Snippet manager built using Laravel 9.

## Requirements

- PHP 8+
- A database of some kind (SQLite is fine)
- [Meilisearch](https://meilisearch.com) for searching
- A [Torchlight](https://torchlight.dev) token for code highlighting

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
