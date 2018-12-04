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

CREATE TABLE "Student"
(
	student_id serial PRIMARY KEY,
	name VARCHAR,
	email VARCHAR,
	password VARCHAR,
	address VARCHAR,
	date_of_birth DATE,
	create_at TIMESTAMP
);

CREATE TABLE "Enrolled"
(
	student_id INT REFERENCES "Student"(student_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	enrolled_date TIMESTAMP
);

CREATE TABLE "Category"
(
	category_id serial PRIMARY KEY,
	category VARCHAR
);

CREATE TABLE "CourseImage"
(
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	image VARCHAR	
);

CREATE TABLE "CourseRequirement"
(
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	description VARCHAR
);

CREATE TABLE "CourseArchivement"
(
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	description VARCHAR
);

CREATE TABLE "CourseDescription"
(
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	description VARCHAR
);

CREATE TABLE "CourseCategory"
(
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	category_id INT REFERENCES "Category"(category_id)
	ON UPDATE CASCADE ON DELETE CASCADE
);

CREATE TABLE "ClickRecord"
(
	student_id INT REFERENCES "Student"(student_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	category_id INT REFERENCES "Category"(category_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	PRIMARY KEY (student_id, category_id)
);

CREATE TABLE "Vote"
(
	student_id INT REFERENCES "Student"(student_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	rate INT CHECK (rate > 0 AND rate < 5),
	PRIMARY KEY (student_id, course_id)
);

CREATE TABLE "Exam"
(
	exam_id serial PRIMARY KEY,
	course_id INT REFERENCES "Course"(course_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	duration INT
);

CREATE TABLE "ExamResult"
(
	student_id INT REFERENCES "Student"(student_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	exam_id INT REFERENCES "Exam"(exam_id)
	ON UPDATE CASCADE ON DELETE CASCADE,
	mark FLOAT CHECK (mark > 0 AND mark < 10)
);

