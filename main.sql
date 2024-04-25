-- CREATE DATABASE services

CREATE TABLE users
(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    adder1 VARCHAR(255) NOT NULL,
    age VARCHAR(255) NOT NULL,
    city VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);

CREATE TABLE providers
(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL,
    last_name VARCHAR(255) NOT NULL,
    mail VARCHAR(255) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    adder1 VARCHAR(255) NOT NULL,
    salary VARCHAR(30) NOT NULL,
    age VARCHAR(30) NOT NULL,
    experience VARCHAR(30) NOT NULL,
    city VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    descr VARCHAR(1000), -- Description field for providers
    photo VARCHAR(255),  -- Photo field for providers
    profession VARCHAR(255) NOT NULL
);

CREATE TABLE bookings
(
    id INTEGER UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    provider_id INTEGER UNSIGNED NOT NULL,
    fname VARCHAR(255) NOT NULL,
    lname VARCHAR(255) NOT NULL,
    contact VARCHAR(20) NOT NULL,
    adder VARCHAR(255) NOT NULL,
    date DATE NOT NULL,
    payment VARCHAR(30) NOT NULL,
    queries VARCHAR(255) NOT NULL
);

CREATE TABLE services (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

CREATE TABLE cities (
    id INT AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(255) NOT NULL
);

INSERT INTO services (name) VALUES
('Electrician'),
('Plumber'),
('Cleaning');

INSERT INTO cities (name) VALUES
('Ariana'),
('Béja'),
('Ben Arous'),
('Bizerte'),
('Gabès'),
('Gafsa'),
('Jendouba'),
('Kairouan'),
('Kasserine'),
('Kebili'),
('Kef'),
('Mahdia'),
('Manouba'),
('Medenine'),
('Monastir'),
('Nabeul'),
('Sfax'),
('Sidi Bouzid'),
('Siliana'),
('Sousse'),
('Tataouine'),
('Tozeur'),
('Tunis'),
('Zaghouan');

