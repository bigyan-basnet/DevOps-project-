CREATE DATABASE IF NOT EXISTS car_rental_database;
USE car_rental_database;

-- -----------------------------
-- Table: user_registration
-- -----------------------------
CREATE TABLE user_registration (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  first_name VARCHAR(50) NOT NULL,
  middle_name VARCHAR(50),
  last_name VARCHAR(50) NOT NULL,
  username VARCHAR(50) NOT NULL UNIQUE,
  is_admin BOOLEAN NOT NULL DEFAULT 0,
  password VARCHAR(255) NOT NULL, -- hashed password
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO user_registration 
  (first_name, middle_name, last_name, username, is_admin, password) 
VALUES 
  ('Bigyan', 'Bahadur', 'Basnet', 'bigyan', 0, '$2y$10$hashedpasswordexample1'),
  ('Chetan', 'Raj', 'Bhagat', 'chetan', 0, '$2y$10$hashedpasswordexample2'),
  ('Admin', 'Admin', 'Admin', 'admin', 1, '$2y$10$hashedpasswordexample3');

-- -----------------------------
-- Table: car
-- -----------------------------
CREATE TABLE car (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  car_year INT NOT NULL,
  car_model VARCHAR(80) NOT NULL,
  car_colour VARCHAR(40) NOT NULL,
  rental_price DECIMAL(10,2) NOT NULL,
  booked BOOLEAN NOT NULL DEFAULT FALSE,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO car 
  (car_year, car_model, car_colour, rental_price, booked) 
VALUES
  (2016, 'Lamborghini', 'Silver', 50.00, 0),
  (1999, 'Rolls Royce', 'Gold', 80.00, 0),
  (2009, 'Lamborghini', 'Black', 44.00, 0),
  (2019, 'TATA', 'Blue', 45.00, 0),
  (2015, 'BMW', 'Black', 80.00, 0);

-- -----------------------------
-- Table: booking
-- -----------------------------
CREATE TABLE booking (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  booking_date DATETIME NOT NULL DEFAULT CURRENT_TIMESTAMP,
  total DECIMAL(10,2) NOT NULL,
  car_id INT NOT NULL,
  username VARCHAR(50) NOT NULL,
  no_of_days INT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (car_id) REFERENCES car(ID) ON DELETE CASCADE,
  FOREIGN KEY (username) REFERENCES user_registration(username) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO booking 
  (total, car_id, username, no_of_days) 
VALUES
  (2200.00, 1, 'admin', 44),
  (2200.00, 1, 'admin', 44),
  (250.00, 3, 'admin', 5);

-- -----------------------------
-- Table: contact
-- -----------------------------
CREATE TABLE contact (
  ID INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(50) NOT NULL,
  email VARCHAR(50) NOT NULL,
  subject VARCHAR(255) NOT NULL,
  message TEXT NOT NULL,
  created_at DATETIME DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO contact 
  (name, email, subject, message) 
VALUES
  ('Bigyan', 'bigya@gmail.com', 'Query', 'Sample message content');

