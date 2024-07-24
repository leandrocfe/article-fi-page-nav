## Filament Article

### Navigating Filament Pages with Previous and Next Buttons

Previous and next navigation buttons within Filament pages. These buttons, designed as Filament Header Actions, can seamlessly navigate through ViewPages and EditPages.

### Installation

Clone the repo locally:

```sh
git clone https://github.com/leandrocfe/article-fi-page-nav.git && cd article-fi-page-nav
```

Install PHP dependencies:

```sh
composer install
```

Setup configuration:

```sh
cp .env.example .env
```

Generate application key:

```sh
php artisan key:generate
```
_Configure the variables in the `.env` file according to your local environment._

### Database
Run database migrations:

```sh
php artisan migrate --seed
```

### Storage

Storage link:

```sh
php artisan storage:link
```

### Usage

After the project has been built, start Laravel's local development server using the Laravel's Artisan CLI serve command:
```bash
php artisan serve
```
The application will be accessible on

```bash
http://localhost:8000/admin
```

or access the project url configured according to your local environment

```bash
http://article-fi-page-nav.test/admin
```

## Tests

You may run the following command in your terminal:

```bash
./vendor/bin/pest
```

## Contributing
Pull requests are welcome. For major changes, please open an issue first to discuss what you would like to change.

Please make sure to update tests as appropriate.

## License
[MIT](https://choosealicense.com/licenses/mit/)

