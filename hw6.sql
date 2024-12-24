create DATABASE homework6;
use homework6;

create table parks
(
    id      int primary key auto_increment,
    address varchar(255)
);

create table cars
(
    id      int primary key auto_increment,
    park_id int,
    model   varchar(255),
    price   float,
    foreign key (park_id) references parks (id)
);

create table drivers
(
    id int primary key auto_increment,
    name   varchar(255),
    car_id int,
    phone  varchar(255),
    foreign key (car_id) references cars (id)
);

create table customers
(
    id    int primary key auto_increment,
    name  varchar(255),
    phone varchar(255)
);

create table orders
(
    id          int primary key auto_increment,
    driver_id   int,
    customer_id int,
    start       text,
    finish      text,
    total       float,
    foreign key (driver_id) references drivers (id),
    foreign key (customer_id) references customers (id)
);
