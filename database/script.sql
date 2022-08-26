create table tickets
(
    id          int auto_increment
        primary key,
    unique_id   varchar(255)                       null,
    subject     varchar(255)                       null,
    description text                               not null,
    author      varchar(100)                       null,
    created_on  datetime default CURRENT_TIMESTAMP null,
    updated_on  datetime default CURRENT_TIMESTAMP null,
    priority    varchar(20)                        null,
    status      varchar(20)                        null
);

create table users
(
    id       int auto_increment
        primary key,
    username varchar(100) not null,
    email    varchar(100) not null,
    password varchar(255) not null,
    constraint username
        unique (username)
);


