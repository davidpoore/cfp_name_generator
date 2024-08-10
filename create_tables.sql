-- DROP, CREATE, and INSERT STATEMENTS

-- drop db for idempotency of sql script
DROP DATABASE IF EXISTS cf_players;

-- create database
CREATE DATABASE cf_players;

USE cf_players;

-- create tables
CREATE TABLE first_names (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255)
);

CREATE TABLE last_names (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255)
);

CREATE TABLE positions (
  id INT AUTO_INCREMENT PRIMARY KEY,
  name VARCHAR(255)
);
