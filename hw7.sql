# 1
create table routes
(
    id      int primary key auto_increment,
    driver_id int,
    start   text,
    finish  text,
    total   float,
    foreign key (driver_id) references drivers (id)
);
insert into routes (driver_id, start, finish, total) values (1, '2020-01-01 00:00:00', '2020-01-01 01:00:00', 100);
select * from routes;
delete from routes where id = 1;
drop table routes;

# 2
alter table orders MODIFY start datetime;

# 3
insert into customers (name, phone) values ('Alice', '123456');
insert into customers (name, phone) values ('Brian', '123456');
insert into customers (name, phone) values ('Cecil', '123456');
insert into customers (name, phone) values ('Dan', '123456');
insert into customers (name, phone) values ('Ethan', '123456');

insert into cars (model, price) values ('Toyota', '30000');
insert into cars (model, price) values ('Honda', '20000');
insert into cars (model, price) values ('Ford', '10000000000');

insert into parks (address) values ('Address1');
insert into parks (address) values ('Address2');
insert into parks (address) values ('Address3');

insert into drivers (name, car_id, phone) values ('Bob', 2, '123456');
insert into drivers (name, car_id, phone) values ('Charlie', 3, '123456');

insert into orders (driver_id, customer_id, start, finish, total) values (1, 1, '2020-01-01 00:00:00', '2020-01-01 01:00:00', 100);

# 4
alter table orders MODIFY start datetime;
update parks
set address = 'Awesome Address'
where address = 'Address1';

# 5
delete from parks where id = 5;

# 6
select * from parks;
select model from cars;

# 7
select c.name as customer, d.name as driver
from orders
left join drivers d on orders.driver_id = d.id
left join customers c on orders.customer_id = c.id
group by c.name, d.name
order by d.name DESC
limit 2;


# 8
ALTER TABLE orders CHANGE start start_date date;
ALTER TABLE orders ADD currency VARCHAR(255);

# 9
select d.name as driver, c.name as customer, sum(o.total) as total_amount
from orders o
left join drivers d on o.driver_id = d.id
left join customers c on o.customer_id = c.id
group by d.name, c.name
order by total_amount desc
limit 3;
