# To-Do List Application

This is a Laravel-based "To-Do List" application that allows users to manage tasks (CRUD), send email notifications, and more.

## Features

- **CRUD Operations**: Add, edit, view, and delete tasks with fields like name, description, priority, status, and due date.
- **Task Filtering**: Filter tasks by priority, status, and due date.
- **Email Notifications**: Sends email reminders 1 day before the task's due date.
- **Multi-User Support**: Each user can log in and manage their own tasks.
- **Public Task Sharing**: Generate public links with access tokens for sharing tasks.
- **Optional Features**:
  - Full edit history of tasks.

## Technologies Used

- **Back-End**: Laravel 11, REST API, Eloquent ORM, MySQL.
- **Front-End**: Laravel Blade templates.
- **Docker**: Dockerfile and docker-compose for containerized setup.
- **Other Tools**: Laravel Queues, Scheduler.

## Running the Application with Docker

1. Clone the repository:
  ```bash
  git clone <repository-url>
  cd <repository-folder>
  ```

2. Create the .env file:
  ```bash
  cp .env.example .env
  ```

3. Build the containers:
  ```bash
  docker-compose build
  ```

4. Start the containers in background:
  ```bash
  docker-compose up -d
  ```

5. Do the migrations:
  ```bash
  docker exec -it laravel_app php artisan migrate
  ```

6. Access the application:
  - Open your browser and navigate to `http://localhost:8000`.

7. Stopping the containers:
  ```bash
  docker-compose down
  ```

## Additional Notes

- Ensure the `.env` file is properly configured for email notifications and database connections.
- Email Notifications Setup
This application uses Mailtrap for testing email notifications. To test email notifications, you need to set up your own Mailtrap credentials in the .env file. Follow these steps:

Sign up for a free Mailtrap account at https://mailtrap.io.
Once logged in, create a new inbox in Mailtrap.
Copy the SMTP credentials from your Mailtrap inbox and update the following fields in your .env file:
  ```bash
  MAIL_MAILER=smtp
  MAIL_HOST=sandbox.smtp.mailtrap.io
  MAIL_PORT=587
  MAIL_USERNAME=<your-mailtrap-username>
  MAIL_PASSWORD=<your-mailtrap-password>
  MAIL_ENCRYPTION=tls
  MAIL_FROM_ADDRESS=your-email@example.com
  MAIL_FROM_NAME="${APP_NAME}"
  ```
**Note**: I used Mailtrap to test email notifications, and it works. However, I have not provided my credentials in this repository. You need to use your own Mailtrap credentials to test this feature.

