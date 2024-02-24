# shapesNcolors
Assessment for ALPHV

Things i use (i guess?) :
    -   Laravel <br>
    -   Tailwindcss <br>
    -   jQuery <br>
    -   Laravel Breeze (for auth) <br>
    -   Datatables (for table, ajax request) <br>

Live view (until there is no more?) :- don't have one because free hosting doesn't support cli commands

Instructions to run the app
==================

1) Clone the repo inside any folder you would like using
	> git clone https://github.com/takippu/shapesNcolors.git
2) Open the cloned folder (might be 'shapesNcolors') using VSCode or Terminal (CMD)
3) Run "composer install" to install any dependencies
4) Run "npm install" to install any dependencies
5) Run "cp .env.example .env" to copy and paste .env file
6) Run "php artisan key:generate" to generate app key
7) Optional : Change database name (or other configs) in .env file, default is laravel
8) Run "php artisan migrate" to migrate the database
9) Run "php artisan db:seed" to seed all and "php artisan db:seed --class=PermissionsSeeder" to seed for users
10) Next, run "npm run dev"
11) Then, open a new Terminal(or CMD) and run "php artisan serve"
12) Open the address that was given (usually like this)

    php artisan serve

    INFO  Server running on [http://127.0.0.1:8000].  

    Press Ctrl+C to stop the server

13) Open http://127.0.0.1:8000 , and you are good to go!


>Info : A user was seeded at step 9, so you can use this credential which is, email: admin@example.com pass: password
