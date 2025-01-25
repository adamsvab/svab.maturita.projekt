CREATE SCHEMA IF NOT EXISTS eshop
DEFAULT CHARACTER SET utf8
collate = utf8_czech_ci;

USE eshop;


CREATE TABLE IF NOT EXISTS users (
  id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
  name VARCHAR(20) NOT NULL,
  surname VARCHAR(30) NOT NULL,
  email VARCHAR(50) NOT NULL UNIQUE,
  password VARCHAR(50) NOT NULL,
  role ENUM('customer', 'admin') DEFAULT 'customer' NOT NULL
  )
ENGINE = InnoDB;




CREATE TABLE IF NOT EXISTS products (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
name VARCHAR(50) NOT NULL UNIQUE,
image VARCHAR(50),
description TEXT(200) NOT NULL,
price DECIMAL(20, 2) NOT NULL
)
ENGINE = InnoDB;


CREATE TABLE orders (
    id INT PRIMARY KEY NOT NULL AUTO_INCREMENT ,
    user_id INT NOT NULL,
    total_price DECIMAL(20, 2) NOT NULL,
    state ENUM('new', 'sent') DEFAULT 'new' NOT NULL,
	city VARCHAR(50) NOT NULL,
    street VARCHAR(50) NOT NULL,
    house_number INT NOT NULL,
    postcode INT NOT NULL,
    created_at DATETIME DEFAULT NOW(), 
    FOREIGN KEY (user_id) REFERENCES users(id)
)
ENGINE = InnoDB;


CREATE TABLE order_items (
    id INT AUTO_INCREMENT PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    quantity INT NOT NULL,
    price DECIMAL(20, 2) NOT NULL,
    FOREIGN KEY (order_id) REFERENCES orders(id),
    FOREIGN KEY (product_id) REFERENCES products(id)
)
ENGINE = InnoDB;

-- novy table kosik (rozpracovaný)
CREATE TABLE IF NOT EXISTS cart (
id INT PRIMARY KEY NOT NULL AUTO_INCREMENT,
user_id INT NOT NULL,
product_id INT NOT NULL,
quantiti INT NOT NULL DEFAULT '1',
FOREIGN KEY (user_id) REFERENCES users(id),
FOREIGN KEY (product_id) REFERENCES products(id)
)
ENGINE = InnoDB;

INSERT INTO users (name, surname, email, password, role)
VALUES ('Adam', 'Šváb', 'adam.dl@seznam.cz', md5('12345'), 'admin');

INSERT INTO products (name, image, description, price)
VALUES ('iPhone 16 128GB černá', 'images/iphone16.webp', 'Mobilní telefon - 6,1" Super Retina XDR OLED, operační paměť 8 GB, vnitřní paměť 128 GB, procesor Apple A18 Bionic, fotoaparát: 48Mpx hlavní + 12Mpx širokoúhlý, GPS, NFC, LTE, 5G, USB-C, voděodolný, baterie 3561 mAh, iOS', '23990'),
	   ('iPhone 16 Pro 128GB černý titan', 'images/iphone16pro.webp', 'Mobilní telefon - 6,3" Super Retina XDR OLED, operační paměť 8 GB, vnitřní paměť 128 GB, procesor Apple A18 Pro, fotoaparát: 48Mpx hlavní + 48Mpx širokoúhlý + 12Mpx teleobjektiv, GPS, NFC, LTE, 5G, USB-C, voděodolný, baterie 3582 mAh, iOS', '29990'),
       ('iPhone 16 Pro Max 256GB bílý titan', 'images/iphone16promax.webp', 'Mobilní telefon - 6,9" Super Retina XDR OLED, operační paměť 8 GB, vnitřní paměť 256 GB, procesor Apple A18 Pro, fotoaparát: 48Mpx hlavní + 48Mpx širokoúhlý + 12Mpx teleobjektiv, GPS, NFC, LTE, 5G, USB-C, voděodolný, baterie 4685 mAh, iOS', '35990'),
       ('iPhone 15 128GB černá', 'images/iphone15.webp', 'Mobilní telefon - 6,1" Super Retina XDR OLED, operační paměť 6 GB, vnitřní paměť 128 GB, procesor Apple A16 Bionic, fotoaparát: 48Mpx hlavní + 12Mpx širokoúhlý, GPS, NFC, LTE, 5G, USB-C, voděodolný, iOS', '19990'),
       ('iPhone 15 Pro 128GB přírodní titan', 'images/iphone15pro.webp', 'Mobilní telefon - 6,1" Super Retina XDR OLED, operační paměť 8 GB, vnitřní paměť 128 GB, procesor Apple A17 Pro, fotoaparát: 48Mp hlavní + 12Mpx širokoúhlý + 12Mpx teleobjektiv, GPS, NFC, LTE, 5G, USB-C, voděodolný, iOS', '26990'),
	   ('iPhone 15 Pro Max 512GB černý titan', 'images/iphone15promax.webp', 'Mobilní telefon - 6,7" Super Retina XDR OLED, operační paměť 8 GB, vnitřní paměť 512 GB, procesor Apple A17 Pro, fotoaparát: 48Mpx hlavní + 12Mpx širokoúhlý + 12Mpx teleobjektiv, GPS, NFC, LTE, 5G, USB-C, voděodolný, iOS', '38990'),
       ('iPhone 14 128GB černá', 'images/iphone14.webp', 'Mobilní telefon - 6,1" OLED, vnitřní paměť 128 GB, procesor Apple A15 Bionic, fotoaparát: 12Mpx hlavní + 12Mpx širokoúhlý, přední kamera 12Mpx, GPS, NFC, LTE, 5G, Lightning port, voděodolný, iOS', '14990'),
       ('iPhone 14 Pro 256GB černá', 'images/iphone14pro.webp', 'Mobilní telefon - 6,1" OLED, vnitřní paměť 256 GB, procesor Apple A16 Bionic, fotoaparát: 48Mpx hlavní + 12Mpx širokoúhlý + 12Mpx teleobjektiv, GPS, NFC, LTE, 5G, Lightning port, voděodolný, iOS', '21990'),
       ('iPhone 14 Pro Max 512GB stříbrná', 'images/iphone14promax.webp', 'Mobilní telefon - 6,7" OLED, vnitřní paměť 512 GB, procesor Apple A16 Bionic, fotoaparát: 48Mpx hlavní + 12Mpx širokoúhlý + 12Mpx teleobjektiv, GPS, NFC, LTE, 5G, Lightning port, voděodolný, iOS', '38990');

INSERT INTO orders (user_id, total_price, city, street, house_number, postcode)
VALUES ('2', '43980','Tišnov','Dlouhá', 1758, '6001' ),
	   ('3', '35990','Čebín', 'Husitská', '65', '65878');

INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES ('1', '1','1','23990'),
	   ('1', '4','1', '19990');
       
INSERT INTO order_items (order_id, product_id, quantity, price)
VALUES ('2', '3','1','35990');
	   


CREATE VIEW admin_panel AS
SELECT orders.id, users.name, users.surname, orders.created_at, orders.state FROM orders INNER JOIN users 
ON orders.user_id = users.id;



select * from users;
select * from products; 
select * from orders;
select * from order_items;
select * from admin_panel;







