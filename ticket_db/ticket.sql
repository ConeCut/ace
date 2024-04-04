create table ticket_db.ticket
(
    id              int auto_increment
        primary key,
    user_id         int          not null,
    ticket_issue    varchar(255) null,
    ticket_nr       int          not null,
    ticket_status   varchar(255) not null,
    user_email      varchar(255) not null,
    user_username   varchar(255) not null,
    ticket_solution varchar(255) null,
    constraint user_id_fk
        foreign key (user_id) references ticket_db.users (id)
);

