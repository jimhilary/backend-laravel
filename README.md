1 . open your browser and search for gitpod   https://www.gitpod.io/flex-or-classic
use the classic option and go to new workspace create a new terminal
on the terminal write   git clone https://github.com/jimhilary/backend-laravel.git
 execute the following codes in other ;
 - cd backend
 - composer install
 - cp .env.example .env
 - php artisan key:generate       # a successful comment should pop up in the terminal
 - php artisan migrate            # yes option to create the database
 - npm install
 - php artisan serve           # To finally run the  laravel-backend



 
