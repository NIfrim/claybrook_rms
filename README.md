# Claybrook Zoo RMS & Website with Account management for Sponsors

This project is Laravel based and has been done as part of CSY3013 - Software Engineering course for the University of Northampton.

This project has laravel homestead as a dependency, so it can be run on any machine using a virtual machine. It requires you to have Vagrant, VirtualBox, and nodejs installed on your machine.

# Instructions for running this project

All commands done using power shell:

1. cd into the cloned project root directory
2. ```git checkout evaluation```
3. open ```Homestead.yaml``` and replace ```'C:\Users\ifrim\Desktop\test\claybrook_rms'``` to match the path of where you the cloned project
4. ```vagrant up```
5. ```vagrant ssh```
6. ```cd code```
7. ```composer update```
8. ```php artisan migrate --path="database/migrations/tables"```
9. ```php artisan migrate --path="database/migrations/relationships"```
10. ```php artisan db:seed```
11. minimize terminal and open project with favourite IDE and run ```npm install```
	
To connect to db using workbench use 192.168.10.10 which is the ip in ```Homestead.yaml``` [user => homestead, password => secret].

RMS at http://192.168.10.10/admin (user: admin@claybrook.com, password: letmein)
Website at http://192.168.10.10
