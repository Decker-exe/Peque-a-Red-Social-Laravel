CREATE DATABASE IF NOT EXISTS  web;
use web;
CREATE TABLE IF NOT EXISTS users(
	id int(255) auto_increment not null , 
	role varchar (20), 
	name varchar(100), 
	surname varchar(100),
        password varchar(100),
	direction varchar(100), 
	email varchar(100), 
	created_at datetime, 
	updated_at datetime, 
	remember_token varchar(255), 
	CONSTRAINT pk_user PRIMARY KEY(id) 
)ENGINE=Innodb;

CREATE TABLE IF NOT EXISTS publication( 
	id int(255) auto_increment not null , 
	user_id int(255) not null, 
	description varchar(255), 
	created_at datetime, 
	updated_at datetime, 
        image_path varchar(255),
        tipo varchar(255),
        descriptionL TEXT,
	CONSTRAINT pk_publication PRIMARY KEY(id), 
	CONSTRAINT fk_publication_user FOREIGN KEY(user_id) REFERENCES users(id)  
)ENGINE=Innodb;

CREATE TABLE IF NOT EXISTS Comment( 
	id int(255) auto_increment not null , 
	user_id int(255) not null, 
	publication_id int(255) not null, 
	content varchar(255), 
	created_at datetime, 
	updated_at datetime,
        valor int(255),
	CONSTRAINT pk_comment PRIMARY KEY(id), 
	CONSTRAINT fk_comment_user FOREIGN KEY(user_id) REFERENCES users(id), 
	CONSTRAINT fk_comment_publication FOREIGN KEY(publication_id) REFERENCES publication(id) 
)ENGINE=Innodb;


CREATE TABLE IF NOT EXISTS star(
	id int(255) auto_increment not null , 
	user_id int(255) not null, 
	publication_id int(255) not null, 
	created_at datetime, 
	updated_at datetime, 
	CONSTRAINT pk_star PRIMARY KEY(id), 
	CONSTRAINT fk_star_user FOREIGN KEY(user_id) REFERENCES users(id), 
	CONSTRAINT fk_star_publication FOREIGN KEY(publication_id) REFERENCES publication(id) 
)ENGINE=Innodb;

