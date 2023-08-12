CREATE DATABASE IF NOT EXISTS notennest;
USE notennest;

CREATE TABLE IF NOT EXISTS manufacturer (
    id int PRIMARY KEY NOT NULL,
    name varchar(50) NOT NULL
);

CREATE TABLE IF NOT EXISTS inventory (
    id int PRIMARY KEY NOT NULL,
    name varchar(50) NOT NULL,
    description varchar(400),
    manufacturerID int NOT NULL,
    available boolean NOT NULL,
    price float,
    FOREIGN KEY (manufacturerID) REFERENCES manufacturer(id)
);

CREATE TABLE IF NOT EXISTS inquiries (
    id int NOT NULL PRIMARY KEY,
    email varchar(30) NOT NULL,
    subject varchar(50) NOT NULL,
    message varchar(400) NOT NULL
);