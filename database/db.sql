CREATE database namefeeder;
use namefeeder;
 CREATE TABLE users(
    id INT PRIMARY KEY AUTO_INCREMENT,
    first_name VARCHAR(100) NOT NULL,
    last_name VARCHAR(100) NOT NULL,
    email VARCHAR(100) NOT NULL,
    birthday DATE NOT NULL,
    pass VARCHAR(40) NOT NULL
    created_on DATETIME,
    updated_on DATETIME,
    deleted_on DATETIME

 );


