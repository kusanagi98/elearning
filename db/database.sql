CREATE TABLE "Admin"
(
    admin_id serial NOT NULL,
    name character varying(50),
    email character varying UNIQUE,
    password character varying,
    address character varying,
    level character(2),
    create_at timestamp without time zone,
    CONSTRAINT "Admin_pkey" PRIMARY KEY (admin_id)
);


CREATE TABLE "Teacher"
(
    teacher_id serial PRIMARY KEY,
    name VARCHAR,
    phone VARCHAR,
    email VARCHAR UNIQUE,
    password VARCHAR,
    address VARCHAR,
    certificate VARCHAR,
    created_at TIMESTAMP
);



