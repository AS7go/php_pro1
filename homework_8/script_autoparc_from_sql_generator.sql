create table customers
(
    id      bigint auto_increment
        primary key,
    email   varchar(150) not null,
    name    varchar(50)  not null,
    surname varchar(75)  not null,
    constraint email
        unique (email)
);

create table parks
(
    id            int auto_increment
        primary key,
    serial_number varchar(16)  not null,
    address       varchar(255) not null,
    constraint serial_number
        unique (serial_number)
);

create table cars
(
    id      bigint auto_increment
        primary key,
    park_id int                        null,
    model   varchar(50)                not null,
    year    year                       not null,
    price   float unsigned default '0' null,
    constraint cars_ibfk_1
        foreign key (park_id) references parks (id)
            on delete set null
);

create index park_id
    on cars (park_id);

create table drivers
(
    id         bigint auto_increment
        primary key,
    cars_id    bigint       null,
    LICENSE_ID varchar(16)  not null,
    full_name  varchar(150) not null,
    birthday   date         not null,
    constraint LICENSE_ID
        unique (LICENSE_ID),
    constraint drivers_ibfk_1
        foreign key (cars_id) references cars (id)
            on delete set null
);

create index cars_id
    on drivers (cars_id);

create table orders
(
    id                  bigint unsigned auto_increment
        primary key,
    customer_id         bigint       null,
    driver_id           bigint       null,
    first_address       varchar(255) not null,
    destination_address varchar(255) not null,
    constraint orders_ibfk_1
        foreign key (customer_id) references customers (id)
            on delete set null,
    constraint orders_ibfk_2
        foreign key (driver_id) references drivers (id)
            on delete set null
);

create index customer_id
    on orders (customer_id);

create index driver_id
    on orders (driver_id);


