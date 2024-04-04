create table ticket_db.users
(
    id       int auto_increment
        primary key,
    username varchar(255) not null,
    pwd      varchar(255) not null,
    email    varchar(255) not null
);

