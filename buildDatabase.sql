CREATE DATABASE addressBook;

USE addressBook;

CREATE TABLE master_name (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    date_added DATETIME,
    date_modified DATETIME,
    first_name VARCHAR(75),
    last_name VARCHAR(75)
);

CREATE TABLE address (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    master_id INT NOT NULL,
    date_added DATETIME,
    date_modified DATETIME,
    address VARCHAR(255),
    city VARCHAR(30),
    state CHAR(2),
    zipcode VARCHAR(10),
    type ENUM ('home','work','other')
);

CREATE TABLE phone (
    id INT NOT NULL PRIMARY KEY AUTO_INCREMENT,
    master_id INT NOT NULL,
    date_added DATETIME,
    date_modified DATETIME,
    tel_number VARCHAR(25),
    type ENUM ('home','work','cell','other'),
    canText BIT

);

CREATE TABLE email (
    id INT NOT NULL PRIMARY KE AUTO_INCREMENT,
    master_id INT NOT NULL,
    date_added DATETIME,
    date_modified DATETIME,
    email varchar(150),
    type ENUM ('personal','work','other')
)