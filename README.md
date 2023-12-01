## Developer Comment

Still not completed but uploaded it anyway. I need more time to do it perfectly

# Laravel App Readme

## Setting Up

1. Clone the repository to your local machine:
   git clone https://github.com/your-username/your-laravel-app.git

2. Navigate to the project directory:
   cd your-laravel-app

3. Install dependencies:
   composer install

4. Create a copy of the `.env.example` file and rename it to `.env`:
   cp .env.example .env

5. Update the `.env` file with your database settings.

6. Generate the application key:
   php artisan key:generate

7. Run database migrations:
   php artisan migrate

8. Seed the database (optional):
   php artisan db:seed

9. Serve the application:
   php artisan serve

   Your Laravel app should now be accessible at `http://localhost:8000`.

## User Types

The system supports two user types:

1. **User:**
   - The default user type upon registration.
   - Access all user functionalities upon login.

2. **Pharmacist:**
   - To experience pharmacist functionalities:
     - Manually change the `user_type` in the database to "pharmacist."
     - Log in to the system as a pharmacist.

## Developer Comment

This version is a work in progress, and while it has been uploaded for sharing, perfection is still underway. Additional time is needed to enhance and complete the application. Contributions and feedback are welcome.
