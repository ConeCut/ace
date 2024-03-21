
```
   +--------------+       +--------------+
   |    Users     |       |    Tickets   |
   +--------------+       +--------------+
   | id (PK)      |       | id (PK)      |
   | username     |       | user_id (FK) |
   | email        |-------| ticket_number|
   | password     |       | ticket_status|
   +--------------+       | user_email   |
                          | user_username|
                          | ticket_type  |
                          +--------------+
```

In this visual representation:

- The Users table has fields for `id` (Primary Key), `username`, `email`, and `password`.
- The Tickets table has fields for `id` (Primary Key), `user_id` (Foreign Key referencing the `id` column in the Users table), `ticket_number`, `ticket_status`, `user_email`, `user_username`, and `ticket_type`.

Lines connecting the `user_id` field in the Tickets table to the `id` field in the Users table represent the foreign key relationship between the two tables. Each ticket is associated with a user via the `user_id` field.