CREATE DATABASE moviewave;
USE moviewave;

CREATE TABLE users (
  username VARCHAR(20) NOT NULL,
  email VARCHAR(100) NOT NULL,
  pass VARCHAR(20) NOT NULL,
  aboutme VARCHAR(3000) NULL,
  PRIMARY KEY(username)
);

CREATE TABLE movies (
	id INT NOT NULL AUTO_INCREMENT,
	movieName VARCHAR(30) NOT NULL,
	movieYear YEAR NOT NULL,
	genre VARCHAR(30) NOT NULL,
	actors VARCHAR(250) NOT NULL,
	description VARCHAR(250) NOT NULL,
	PRIMARY KEY(id)
);

CREATE TABLE comments (
	id INT NOT NULL AUTO_INCREMENT,
	rate INT NOT NULL,
	content VARCHAR(250) NULL,
	username VARCHAR(20) NOT NULL,
	movie_id INT NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (username) REFERENCES users(username),
	FOREIGN KEY (movie_id) REFERENCES movies(id)
);

CREATE TABLE favorites (
	id INT NOT NULL AUTO_INCREMENT,
	movie_id INT NOT NULL,
	username VARCHAR(20) NOT NULL,
	PRIMARY KEY(id),
	FOREIGN KEY (username) REFERENCES users(username),
	FOREIGN KEY (movie_id) REFERENCES movies(id)
);