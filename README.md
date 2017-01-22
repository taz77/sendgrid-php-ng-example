# sendgrid-php-example

This is an example of using the [SendGrid NG PHP library](https://github.com/taz77/sendgrid-php-ng).

Use this code as a kick start to your own application or to test the library and your account.

## Usage

```bash
git clone https://github.com/taz77/sendgrid-php-ng-example
cd sendgrid-php-example
cp .env.example .env
composer install
php -f sendgrid-php-example.php
php -f smtp-php-example.php
```
Make sure to set username, password and recipient in the `.env` file. If you're not sure why they're stored in the `.env` file you can read up on it [here](http://12factor.net/config).
