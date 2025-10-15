# Sport Ecommerce

## Instalasi

1. Clone repository ini:
    ```bash
    git clone https://github.com/ahmatfauzy/sport-ecommerce.git
    cd sport-ecommerce
    ```
2. Install dependency PHP:
    ```bash
    composer install
    ```
3. Install dependency JavaScript:
    ```bash
    npm install
    ```
4. Salin file konfigurasi environment dan lengkapi value:
    ```bash
    cp .env.example .env
    ```
5. Generate app key dan migrasi database:
    ```bash
    php artisan key:generate
    php artisan migrate
    ```