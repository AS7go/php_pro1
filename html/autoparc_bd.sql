CREATE DATABASE autoparc;

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