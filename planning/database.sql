DROP check_engine;
CREATE DATABASE check_engine;
USE check_engine;

CREATE TABLE IF NOT EXISTS `user` (
`user_id` int PRIMARY KEY AUTO_INCREMENT,
`username` varchar(100) NOT NULL,
`first_name` varchar(25) NOT NULL,
`last_name` varchar(25) NOT NULL,
`password` varchar(255) NOT NULL,
`email` varchar(25) NOT NULL,
`phone` varchar(14) NOT NULL,
`mpw` int NOT NULL
);

CREATE TABLE IF NOT EXISTS `car` (
`car_id` int PRIMARY KEY AUTO_INCREMENT,
`user_id` int NOT NULL,
`model` varchar(255) NOT NULL,
`year` int NOT NULL,
`make` varchar(255) NOT NULL,
`car_miles` int NOT NULL
);

CREATE TABLE IF NOT EXISTS `oil` (
`oil_id` int PRIMARY KEY AUTO_INCREMENT,
`car_id` int NOT NULL,
`oil_miles` int NOT NULL,
`change_date` date NOT NULL
);

CREATE TABLE IF NOT EXISTS `tire` (
`tire_id` int PRIMARY KEY AUTO_INCREMENT,
`car_id` int NOT NULL,
`mile_rating` int NOT NULL,
`rotation_date` date NOT NULL,
`purchase_date` date NOT NULL
);

CREATE TABLE IF NOT EXISTS `filter` (
`filter_id` int PRIMARY KEY AUTO_INCREMENT,
`car_id` int NOT NULL,
`cabin_mileage` int NOT NULL,
`air_mlieage` int NOT NULL,
`cabin_purchase_date` date NOT NULL,
`air_purchase_date` date NOT NULL
);

CREATE TABLE IF NOT EXISTS `insurance` (
`insurance_id` int PRIMARY KEY AUTO_INCREMENT,
`user_id` int NOT NULL,
`insurance_expiration_date` date NOT NULL,
`insurer` varchar (40)
);



