CREATE DATABASE bus_reservation;

USE bus_reservation;

CREATE TABLE buses (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    departure VARCHAR(100) NOT NULL,
    destination VARCHAR(100) NOT NULL,
    date DATE NOT NULL,
    time TIME NOT NULL,
    seats INT NOT NULL
);
