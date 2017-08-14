@echo off
call composer install
call cd database
call del galaxy_world.sqlite
call sqlite3 galaxy_world.sqlite ""
call cd ..
call php artisan migrate --seed
call start php artisan serve
start "" http://localhost:8000
pause