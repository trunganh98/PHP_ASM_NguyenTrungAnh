CREATE database asm;

create table users(
id int(10) not null primary key auto_increment,
username varchar(12) not null unique ,
password varchar (100) not null,
fullname varchar (32),
address varchar(64)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;


create table products(
productID int(10) not null primary key auto_increment,
productName varchar (20) not null unique ,
price int(10) not null,
company varchar(32),
nameImage varchar(32)
)ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

insert into products values ('', 'ASUS ROG STRIX G99', 9999, 'ASUS', 'ROG-STRIX-G.jpg');
update products set productName = 'ASUS ROG STRIX G99', company = 'ASUS', price = 9000, nameImage='ROG-STRIX-G.jpg' where productID = 1;
insert into users values('', 'trunganh','123456','Nguyen Trung Anh', 'HN');