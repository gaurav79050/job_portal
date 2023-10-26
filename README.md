# Job Portal

A simple web-based job portal connecting employers and job seekers.

## Features

### Employers
- Registration, login, and profile editing.
- Post and manage job listings.
- View application statistics.

### Job Seekers
- Registration, login, and profile editing.
- SCan apply for jobs.

Mail server

MAIL_MAILER=smtp
MAIL_HOST=sandbox.smtp.mailtrap.io
MAIL_PORT=2525
MAIL_USERNAME=7fac1558cb7ae3
MAIL_PASSWORD=9c6fd0537d36d5
MAIL_ENCRYPTION=TLS
MAIL_FROM_ADDRESS=test@gmail.com
MAIL_FROM_NAME=Gaurav

## Project Setup
- Clone this repository.
- Install project dependencies using Composer: `composer install`
- Configure your environment variables: `.env`
- Run migrations: `php artisan migrate`
- Start the development server: `php artisan serve`
- Access the application in your web browser: `http://localhost:8000`

