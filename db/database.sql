CREATE TABLE "Admin"
(
    admin_id serial NOT NULL,
    name character varying(50),
    email character varying UNIQUE,
    password character varying,
    address character varying,
    level character(2),
    create_at timestamp,
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

CREATE TABLE "Course"
(
	course_id serial PRIMARY KEY,
	name VARCHAR,
	description VARCHAR,
	fee INT,
	created_at TIMESTAMP
);

CREATE TABLE "AssignTeacher"
(
	teacher_id INT,
	course_id INT,
	assigned_date TIMESTAMP,
	PRIMARY KEY (teacher_id, course_id),
	FOREIGN KEY (teacher_id) REFERENCES "Teacher"(teacher_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	FOREIGN KEY (course_id) REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE
);


