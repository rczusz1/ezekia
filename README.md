## Test Ezekia - Robert Czusz

My env (Guidelines)
- Laravel framework v8.x
- Php7.4 
- Codebase is in https://github.com/rczusz1/ezekia


#### To run the project please run as follows:

##### $php artisan migrate OR $php artisan migrate 

//to create the database table :

CREATE TABLE `ezekia_users` (
  `id` int NOT NULL AUTO_INCREMENT,
  `firstname` varchar(45) DEFAULT NULL,
  `lastname` varchar(45) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `hourlyrate` varchar(3) DEFAULT NULL,
  `hourly_rate_currency` varchar(3) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

Then hit following routes:

'/',
'/users', // to list all users created
'/user/create/new', // to access new user creation form
'/get-user/1', // to display entered user details
'/get-user/1/GBP', // to display entered user details with converted hourly rate to the currency requested
'/currency-convert/GBP/USD/100', // to use currency converter as it is where 
                                 // GBP is currency from
                                 // USD is a currency to 
                                 // 100 is amount used for the conversion
 
 
 #### (optional) unittests
 
 #### $vendor/bin/phpunit tests/Unit
 
 
 

