# Claybrook Zoo RMS & Website with Account management for Sponsors

This project is Laravel based and has been done as part of CSY3013 - Software Engineering course for the University of Northampton.

This project has laravel homestead as a dependency, so it can be run on any machine using a virtual machine.

# Instructions for running this project

All commands done using power shell:

1. cd into the cloned project root directory
2. ```git checkout evaluation```
3. open ```Homestead.yaml``` and replace ```'C:\Users\ifrim\Desktop\test\claybrook_rms'``` to match the path of the cloned project
4. add the ip from the top of ```Homestead.yaml``` file to your windows host file (in ```C://Windows/system32/drivers/etc```) at the bottom, it will ask for admin permissions to save. Should look like this when added: ```192.168.10.10 homestead.test```
5. ```vagrant up```
6. ```vagrant ssh```
7. ```cd code```
8. ```composer update```
9. minimize terminal (will reuse later) and open project with favourite IDE and run ```npm install```
10. Go back to the terminal which is connected to vagrant and run the following commands:

	1. ```php artisan migrate --path="database/migrations/table"``` from your favourite IDE
	2. ```php artisan migrate --path="database/migrations/relationships"```
	3. ```php artisan db:seed```
	
To connect to db using workbench use 192.168.10.10 [user => homestead, password => secret].

Finally open browser and go to homestead.test

RMS at homestead.test/admin (user: adam@claybrook.com, password: password)