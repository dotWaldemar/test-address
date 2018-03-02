# Test work (Order address)

## Installation

1. Cloning git repository

```bash
git clone https://github.com/dotWaldemar/test-address.git
```

2. Create `.env` from `.env.example` and change settings to db

3. Install all packages
```bash
composer install
```

4. Generate key

```bash
php artisan key:generate
```

5. Create tables in DB

```bash
php artisan migrate
```

Installation complete! :clap: