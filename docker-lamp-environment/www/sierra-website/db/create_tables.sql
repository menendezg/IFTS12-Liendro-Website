CREATE TABLE persons (
    person_id INTEGER PRIMARY KEY,
    name TEXT,
    surname TEXT,
    dni INTEGER,
    genre TEXT,
    phone_number INTEGER,
    email TEXT
); 

CREATE TABLE users (
    user_id INTEGER PRIMARY KEY,
    username TEXT NOT NULL,
    password TEXT NOT NULL,
    is_administrator INTEGER NOT NULL,
    person_id INTEGER,
    FOREIGN KEY (person_id)
        REFERENCES persons(person_id)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE TABLE cars (
    car_id INTEGER PRIMARY KEY,
    brand TEXT,
    model TEXT,
    color TEXT,
    patent TEXT,
    doors INTEGER,
    status TEXT,
    person_id INTEGER,
    FOREIGN KEY (person_id)
        REFERENCES persons(person_id)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);

CREATE TABLE turns (
    turn_id INTEGER PRIMARY KEY,
    person_id INTEGER,
    date TEXT,
    status TEXT,
    FOREIGN KEY (person_id)
        REFERENCES persons(person_id)
        ON DELETE CASCADE
        ON UPDATE NO ACTION
);
