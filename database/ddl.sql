DROP TABLE IF EXISTS users;
CREATE TABLE users(
                    id INTEGER primary key AUTOINCREMENT ,
                    firstname text not null,
                    lastname text  not null,
                    email text unique ,
                    contact text unique ,
                    sexe check (sexe in ('f','m','M','F')),
                    password text not null,
                    password_confirme text ,
                    birth_day date,
                    role varchar check (role in ('client','admin')) not null
                     );