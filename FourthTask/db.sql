# CREATE DATABASE eTask;
CREATE TABLE users (
user_id INT NOT NULL AUTO_INCREMENT,
first_name varchar ( 50 ) NOT NULL ,
last_name varchar ( 50 ) NOT NULL ,
email varchar(50),
PRIMARY KEY ( user_id )
) ENGINE=INNODB;


CREATE TABLE products(
product_id INT NOT NULL AUTO_INCREMENT,
name varchar ( 50 ) NOT NULL ,
description varchar ( 50 ) ,
price DECIMAL(13,2) NOT NULL,
PRIMARY KEY ( product_id )
) ENGINE=INNODB;

CREATE TABLE orders (
order_id INT NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
sum DECIMAL(13,2) NOT NULL,
order_date timestamp NOT NULL ,
PRIMARY KEY ( order_id ),
FOREIGN KEY (user_id) REFERENCES users(user_id)
) ENGINE=INNODB;

CREATE TABLE order_products (
order_product_id INT NOT NULL AUTO_INCREMENT,
order_id INT not null,
product_id int not null,
qty int,
PRIMARY KEY ( order_product_id ),
FOREIGN KEY (order_id) REFERENCES orders(order_id),
FOREIGN KEY (product_id) REFERENCES products(product_id)
) ENGINE=INNODB;