# shapesNcolors
Assessment for ALPHV

Things i use (i guess?) : <br>
    -   Laravel <br>
    -   Tailwindcss <br>
    -   jQuery <br>
    -   Laravel Breeze (for auth) <br>
    -   Datatables (for table, ajax request) <br>
    -   Laravel Spatie (for roles & permissions) <br>

Live view (until there is no more?) :- don't have one because free hosting doesn't support cli commands

Highlight Features : User & Admin portal

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

<h1> Preview </h1>

<div> 
    <h3>Login Page</h3> <br>
    <img src="https://github.com/takippu/shapesNcolors/assets/70655268/e8cd3d39-93ab-416c-af37-f07b7ae2caac">
    <h3>Register Page</h3> <br>
    <img src="https://github.com/takippu/shapesNcolors/assets/70655268/5086f6cf-8290-4c6f-9c49-51e149af587c">
    <h3>View Data Page</h3> <br>
    <img src="https://github.com/takippu/shapesNcolors/assets/70655268/0e233aba-35a9-4648-aa8a-aecaf3a7e0b0">
    <h3>Manage Data Page</h3> <br>
    <img src="https://github.com/takippu/shapesNcolors/assets/70655268/26de4033-0e54-4c44-b3c0-abce9ff490ae">
    <h3>Add New Data Page</h3> <br>
    <img src="https://github.com/takippu/shapesNcolors/assets/70655268/792f7da6-621f-4ff6-a2eb-1a0e7558787b">

</div>
