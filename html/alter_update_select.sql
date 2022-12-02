# CREATE DATABASE autoparc;

# >>>>> 1. Видалення однієї з таблиць

DROP TABLE orders;
DROP TABLE customers;
DROP TABLE drivers;
DROP TABLE cars;
DROP TABLE parks;

# >>>>> 2. Модифікація поля таблиці (наприклад, поле типу datetime, стало date (або зміна імені поля) )

# Переименовываем поле LICENSE_ID в LICENSE таблицы drivers и обратно
ALTER TABLE autoparc.drivers
    CHANGE COLUMN LICENSE_ID LICENSE VARCHAR(16) NOT NULL ;

ALTER TABLE autoparc.drivers
    CHANGE COLUMN LICENSE LICENSE_ID VARCHAR(16) NOT NULL ;

# Переименовываем поле birthday в data таблицы drivers и обратно
ALTER TABLE autoparc.drivers
    CHANGE COLUMN birthday data VARCHAR(16) NOT NULL ;

ALTER TABLE autoparc.drivers
    CHANGE COLUMN data birthday VARCHAR(16) NOT NULL ;

# Меняем VARCHAR(111) <--> VARCHAR(150)
ALTER TABLE autoparc.drivers
    CHANGE COLUMN full_name full_name VARCHAR(111) NOT NULL ;

ALTER TABLE autoparc.drivers
    CHANGE COLUMN full_name full_name VARCHAR(150) NOT NULL ;

# >>>>> 3. Заповнення кожної таблиці хоча б по 3-5 записів

INSERT INTO cars
(park_id, model, year, price)
VALUES
(1, 'VM Jetta', 2012, 35),
(1, 'VM T5', 2015, 47),
(1, 'Skoda Octavia', 2019, 55),
(2, 'Elantra', 2017, 40),
(2, 'Kia soul', 2019, 50),
(2, 'Skoda Octavia', 2019, 55),
(3, 'Kia soul', 2019, 50),
(3, 'Mercedes-Benz', 2017, 60),
(3, 'Mercedes-Benz', 2019, 65),
(4, 'VM Jetta', 2012, 35),
(4, 'VM T5', 2015, 47),
(5, 'Elantra', 2017, 40),
(5, 'Skoda Octavia', 2019, 55),
(5, 'Skoda Octavia', 2019, 65),
(5, 'Mercedes-Benz', 2019, 65),
(5, 'Mercedes-Benz', 2017, 60);


INSERT INTO customers
(email, name, surname)
VALUES
    ('ej1@gmail.com', 'Ethan', 'Johnson'),
    ('he2@gmail.com', 'Harry', 'Evans'),
    ('hw3@gmail.com', 'Harry', 'Wilson'),
    ('ea4@gmail.com', 'Emily', 'Adamson'),
    ('lk5@gmail.com', 'Lily', 'King');


INSERT INTO drivers
(cars_id, LICENSE_ID, full_name, birthday)
VALUES
    (1, 'license#1', 'Oliver Grant', '1997-07-10'),
    (2, 'license#2', 'Harry Martin', '1990-11-5'),
    (3, 'license#3', 'Thomas Gibson', '2000-03-07'),
    (4, 'license#4', 'Oscar Peters', '2001-02-08'),
    (5, 'license#5', 'William Davis', '1995-05-09');


INSERT INTO orders
(customer_id, driver_id, first_address, destination_address)
VALUES
    (1, 1, 'firs_addr 1', 'second_addr 2'),
    (2, 3, 'firs_addr 3', 'second_addr 4'),
    (3, 5, 'firs_addr 8', 'second_addr 10'),
    (4, 4, 'firs_addr 7', 'second_addr 12'),
    (5, 2, 'firs_addr 15', 'second_addr 20'),
    (3, 3, 'firs_addr 15', 'second_addr 20'),
    (1, 5, 'firs_addr 15', 'second_addr 20');


INSERT INTO parks
(serial_number, address)
VALUES
    ('#1', 'addres 1'),
    ('#2', 'addres 2'),
    ('#3', 'addres 3'),
    ('#4', 'addres 4'),
    ('#5', 'addres 5');


# >>>>> 4. Модифікації будь-якого запису (наприклад, змінити серійний номер автопарку)

UPDATE drivers SET full_name = 'Daniel Oscar' WHERE id=3;
UPDATE drivers SET full_name = 'Thomas Martin' WHERE id=4;
UPDATE drivers SET full_name = 'Thomas Oscar' WHERE id=5;
UPDATE drivers SET birthday = '2000-11-11' WHERE id=5;
UPDATE autoparc.drivers SET LICENSE_ID = 'license#7', full_name = 'Li Martin', birthday = '2001-03-07' WHERE id = 4;
UPDATE autoparc.drivers SET LICENSE_ID = 'license#12' WHERE id = 5;

UPDATE orders SET first_address = 'f_a_11', destination_address = 's_a_22' WHERE id = 8;
UPDATE orders SET first_address = 'f_a_5', destination_address = 's_a_1' WHERE id = 9;
UPDATE orders SET customer_id='3',driver_id='5', first_address = 'f_a_7', destination_address = 's_a_2' WHERE id = 2;

# >>>>> 5. Видалення запису з таблиці

DELETE FROM cars WHERE id=15;

# >>>>> 6. Ну і пару різних запитів до бази даних (маю на увазі SELECT)

SELECT * FROM cars WHERE model IN ('Skoda Octavia','Mercedes-Benz');

SELECT * FROM cars WHERE price BETWEEN 30 AND 47;

SELECT model, COUNT(id) as pole_new, SUM(price) as summ
FROM cars
WHERE price > 39
GROUP BY model
HAVING pole_new >2
ORDER BY pole_new;

SELECT c.email, o.first_address AS point_a, o.destination_address AS point_b, d.full_name
FROM customers AS c, orders AS o, drivers AS d
WHERE c.id = o.customer_id AND o.driver_id=d.id;

SELECT c.email AS customer, COUNT(o.id) AS travels
FROM customers AS c, orders AS o
WHERE c.id = o.customer_id
GROUP BY customer;

# >>>>> 7. 1-2 приклади Join запиту

SELECT c.name, c.email AS customer, COUNT(o.id) AS travels
FROM customers AS c
         LEFT JOIN orders o ON c.id = o.customer_id
GROUP BY customer
HAVING travels = 1
ORDER BY travels;

SELECT c.name, c.email AS customer, COUNT(o.id) AS travels
FROM customers AS c
         RIGHT JOIN orders o ON c.id = o.customer_id
GROUP BY customer;

SELECT c.name, c.surname, c.email AS customer, COUNT(o.id) AS count_id
FROM customers AS c
         INNER JOIN orders o ON c.id = o.customer_id
GROUP BY customer;

SELECT pa.address AS park, COUNT(ca.id) AS count_id
FROM parks AS pa
         INNER JOIN cars ca ON ca.park_id = pa.id
GROUP BY park;

# >>>>> 8. Додати/змінити колонку за допомогою команди ALTER TABLE

    ALTER TABLE autoparc.parks
    ADD COLUMN new_col VARCHAR(250) NOT NULL AFTER address;

ALTER TABLE autoparc.parks
    CHANGE COLUMN new_col other_col VARCHAR(250) NOT NULL ;

ALTER TABLE autoparc.parks
DROP COLUMN other_col;

# =====================================================================

CREATE TABLE  parks(
                       id INT PRIMARY KEY AUTO_INCREMENT,
                       serial_number VARCHAR(16) NOT NULL UNIQUE,
                       address VARCHAR(255) NOT NULL
);

CREATE TABLE cars(
                     id BIGINT PRIMARY KEY AUTO_INCREMENT,
                     park_id INT,
                     model VARCHAR(50) NOT NULL,
                     year YEAR NOT NULL,
                     price FLOAT(11) UNSIGNED DEFAULT 0,

                     FOREIGN KEY (park_id) REFERENCES parks(id) ON DELETE SET NULL
);

CREATE TABLE drivers
(
    id         BIGINT PRIMARY KEY AUTO_INCREMENT,
    cars_id    BIGINT,
    LICENSE_ID VARCHAR(16)  NOT NULL UNIQUE,
    full_name  VARCHAR(150) NOT NULL,
    birthday   DATE         NOT NULL,

    FOREIGN KEY (cars_id) REFERENCES cars (id) ON DELETE SET NULL
);

CREATE TABLE customers(
                          id BIGINT PRIMARY KEY AUTO_INCREMENT,
                          email VARCHAR(150) NOT NULL UNIQUE,
                          name VARCHAR(50) NOT NULL,
                          surname VARCHAR(75) NOT NULL
);

CREATE TABLE orders(
                       id BIGINT UNSIGNED PRIMARY KEY AUTO_INCREMENT,
                       customer_id BIGINT,
                       driver_id BIGINT,
                       first_address VARCHAR(255) NOT NULL,
                       destination_address VARCHAR(255) NOT NULL,

                       FOREIGN KEY (customer_id) REFERENCES customers(id) ON DELETE SET NULL,
                       FOREIGN KEY (driver_id) REFERENCES drivers(id) ON DELETE SET NULL
);