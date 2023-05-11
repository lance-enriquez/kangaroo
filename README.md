<h1 align="center">Kangaroo</h1>
<h5 align="center">by: Lorenzo Enriquez</h5>

## Installation:
- Download and install the following:
  - <i style="color: green">composer</i>
  - <i style="color: green">nodejs</i>
  - <i style="color: green">node package manage (npm)</i>
- Go to the root directory of the project and run via terminal:
  - <i style="color: green">composer install</i>
  - <i style="color: green">npm install</i>
  - <i style="color: green">npm run dev</i>
- Copy the .env.example file in the same root directory as:
  - <i style="color: green">.env</i>
- Update the contents of <i style="color: green">.env</i>:
  - <i style="color: green">DB_HOST</i>
  - <i style="color: green">DB_PORT</i>
  - <i style="color: green">DB_USERNAME</i>
  - <i style="color: green">DB_PASSWORD</i>
- Run the following command/s:
  - <i style="color: green">php artisan key:generate</i>
  - <i style="color: green">php artisan migrate</i>
    - It will prompt you to create a database named <i style="color: green">kangaroo_db</i>
    - Type <i style="color: green">yes</i>
- Go to your browser and visit the URL set in the .env file attribute <i style="color: green">APP_URL</i>.
- The app should load on your screen.

