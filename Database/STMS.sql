USE STMS;
DROP TABLE contact_form;
DROP TABLE faculty_exam;
DROP TABLE student_subject_exam;
DROP TABLE result;
DROP TABLE exam;
DROP TABLE subject;
DROP TABLE student;
DROP TABLE course;
DROP TABLE class;
DROP TABLE faculty;
DROP TABLE department;
DROP TABLE college;
DROP TABLE log_in;
DROP TABLE user;
DROP TABLE roles;

CREATE TABLE roles(
    role_id INTEGER PRIMARY KEY,
    role_name VARCHARACTER(20),
    role_descp TEXT
);
DESCRIBE roles;
INSERT INTO roles VALUES(1,'admin','Admin has access to each and every data in the system');
INSERT INTO roles VALUES(2,'faculty','Faculty uploads the marks of the students into the database and generate results');
INSERT INTO roles VALUES(3,'student','Student can see their marks by signing in.');

CREATE TABLE user(
    user_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    u_name VARCHARACTER(40),
    photo_path TEXT,
    gender char(10),
    dob DATE,
    address TEXT,
    phone_no VARCHARACTER(20),
    email VARCHARACTER(30)
);
DESCRIBE user;

INSERT INTO user VALUES(1,'Anand Doijode','/res/1.png','Male','2000-06-09','Kasba Peth, Pune',1234567890,'anand@mail.com');
INSERT INTO user VALUES(2,'Yash Kadyan','/res/2.png','Male','1998-08-12','Mahesh Society, Bibwewadi, Pune-411037',7894561230,'yash@mail.com');
INSERT INTO user VALUES(3,'Pratik Sonsale','/res/3.png','Male','1999-07-16','Sonchafa Society, Dhanori Pune-411015',7412589630,'pratik@mail.com');
INSERT INTO user VALUES(4,'John Doe','/res/4.png','Male','2000-12-22','San Fracisco, USA', 7532152059,'john@mail.com');
INSERT INTO user VALUES(5,'Jane Miles','/res/5.png','Female','2000-05-28','Los Angeles, USA', 9815107349,'jane@mail.com');
INSERT INTO user VALUES(6,'Tushar Jadhav','/res/6.png','Male','1985-02-16','Satara, Maharashtra', 7319568403,'tushar@mail.com');
INSERT INTO user VALUES(7,'Om Shinde','/res/7.png','Male','1971-03-31','Pune, Maharashtra', 8182865490,'omshinde@mail.com');
INSERT INTO user VALUES(8,'Mayuri Karve','/res/8.png','Female','1995-11-29','Mumbai, Maharashtra', 7412589630,'mayurishinde@mail.com');
INSERT INTO user VALUES(9,'Yogita Karade','/res/9.png','Female','1999-05-15','Beed, Maharashtra', 7531594680,'yogi.karad@mail.com');

INSERT INTO user VALUES(10,'Emma Olsen','/res/10.png','Female','2000-12-01','Wyoming, USA', 7531540908,'emma.olsen@mail.com');

select * from user;

CREATE TABLE log_in(
    login_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    username VARCHARACTER(255),
    pass varchar(255),      /*To store passwords we are going to make use of a MYSQL function named as md5()*/
    role_id INT REFERENCES roles(role_id) ON DELETE CASCADE ON UPDATE SET NULL,
    user_id INT REFERENCES user(user_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE log_in;

INSERT INTO log_in VALUES(1,'anand@mail.com',md5('anand@123'),1,1);
INSERT INTO log_in VALUES(2,'yash@mail.com',md5('yash@123'),1,2);
INSERT INTO log_in VALUES(3,'pratik@mail.com',md5('pratik@123'),1,3);
INSERT INTO log_in VALUES(4,'student1@mail.com',md5('student1@123'),3,4);
INSERT INTO log_in VALUES(5,'teacher1@mail.com',md5('teacher1@123'),2,5);
INSERT INTO log_in VALUES(6,'teacher2@mail.com',md5('teacher2@123'),2,6);
INSERT INTO log_in VALUES(7,'teacher3@mail.com',md5('teacher3@123'),2,7);
INSERT INTO log_in VALUES(8,'student2@mail.com',md5('student2@123'),3,8);
INSERT INTO log_in VALUES(9,'student3@mail.com',md5('student3@123'),3,9);

INSERT INTO log_in VALUES(10,'student4@mail.com',md5('student4@123'),3,10);

select * from log_in;

CREATE TABLE college(
    college_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    college_name VARCHAR(50) NOT NULL,
    college_address TEXT
);
DESCRIBE college;

INSERT INTO college VALUES(1,"Fergusson College", "FC Road, Shivajinagar, Pune 04.");
INSERT INTO college VALUES(2,"NMV Junior College", "Bajirao Road, Appa Balwant Chowk, Pune 02.");

CREATE TABLE department(
    dept_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    dept_name VARCHAR(30) NOT NULL,
    college_id INTEGER REFERENCES college(college_id) ON DELETE CASCADE ON UPDATE SET NULL,
    no_of_classroom INTEGER,
    no_of_computer INTEGER,
    no_of_bench INTEGER
);
DESCRIBE department;

INSERT INTO department VALUES (1, "Computer Science", 1,3,80,80);
INSERT INTO department VALUES (2, "Data Science", 1,2,80,80);
INSERT INTO department VALUES (3, "IMCA", 1,2,80,80);
INSERT INTO department VALUES (4, "Computer Application", 1,3,80,80);
INSERT INTO department VALUES (5, "Physics", 2,2,60,60);
INSERT INTO department VALUES (6, "Chemistry", 2,2,60,60);
INSERT INTO department VALUES (7, "Biology", 2,2,60,60);

CREATE TABLE faculty(
    faculty_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    user_id INTEGER REFERENCES user(user_id) ON DELETE CASCADE ON UPDATE SET NULL,
    dept_id INTEGER REFERENCES department(dept_id) ON DELETE CASCADE ON UPDATE SET NULL,
    college_id INTEGER REFERENCES college(college_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE faculty;

INSERT INTO faculty VALUES (1,5,1,1);
INSERT INTO faculty VALUES (2,6,2,1);
INSERT INTO faculty VALUES (3,7,1,1);

CREATE TABLE class(
    class_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    class_name VARCHARACTER(255) NOT NULL,
    dept_id INTEGER REFERENCES department(dept_id) ON DELETE CASCADE ON UPDATE SET NULL,
    f_id INTEGER REFERENCES faculty(f_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE class;

INSERT INTO class VALUES (1,"CS01",1,1);
INSERT INTO class VALUES (2,"CS02",1,6);
INSERT INTO class VALUES (3,"DS01",2,6);

CREATE TABLE course(
    course_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    c_name VARCHARACTER(255) NOT NULL,
    c_duration INTEGER NOT NULL,
    c_desciption TEXT,
    dept_id INTEGER REFERENCES department(dept_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE course;

INSERT INTO course VALUES(1,"Master in Computer Science",2,"Only for students who have successfully passed BCS course",1);
INSERT INTO course VALUES(2,"Master in Data Science",2,"All the concepts related to Data are taught in this course. For e.g. Big Data, Data Mining, etc.",2);
INSERT INTO course VALUES(3,"Master in Computer Applications",2,"Anyone with BSC degree can apply",4);
INSERT INTO course VALUES(4,"Master in IMCA",3,"Anyone with BSC degree can apply",3);
INSERT INTO course VALUES(5,"Bachelor in Computer Science",3,"Only for students who have successfully passed BCS course",1);
INSERT INTO course VALUES(6,"Bachelor in Computer Applications",3,"Anyone with BSC degree can apply",4);
INSERT INTO course VALUES(7,"Master in Biology",3,"Anyone with BSC degree can apply",7  );

CREATE TABLE student(
    PRN INTEGER PRIMARY KEY NOT NULL AUTO_INCREMENT,
    roll_no INTEGER,
    semester INTEGER NOT NULL,
    user_id INTEGER REFERENCES user(user_id) ON DELETE CASCADE ON UPDATE SET NULL,
    dept_id INTEGER REFERENCES department(dept_id) ON DELETE CASCADE ON UPDATE SET NULL,
    college_id INTEGER REFERENCES college(college_id) ON DELETE CASCADE ON UPDATE SET NULL,
    course_id INTEGER REFERENCES course(course_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE student;
ALTER TABLE student AUTO_INCREMENT=101; /* To start indexing from 101 */

INSERT INTO student VALUES(500101,101,1,4,1,1,1);
INSERT INTO student VALUES(500102,102,1,8,1,1,1);
INSERT INTO student VALUES(500103,103,1,9,1,1,1);

INSERT INTO student VALUES(500104,201,1,10,2,1,2);

CREATE TABLE subject(
    sub_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    sub_name VARCHAR(255) NOT NULL,
    semester INTEGER NOT NULL,
    f_id INTEGER REFERENCES faculty(f_id) ON DELETE CASCADE ON UPDATE SET NULL,
    course_id INTEGER REFERENCES course(course_id) ON DELETE CASCADE ON UPDATE SET NULL 
);
DESCRIBE subject;

INSERT INTO subject VALUES (1,"C Programming",1,1,5);
INSERT INTO subject VALUES (2,"Java Programming",5,3,5);
INSERT INTO subject VALUES (3,"DBMS",1,1,5);
INSERT INTO subject VALUES (4,"Computational Geometry",2,NULL,5);
INSERT INTO subject VALUES (5,"Calculus",2,NULL,5);
INSERT INTO subject VALUES (6,"Operating System Internals",1,1,1);
INSERT INTO subject VALUES (7,"Data Mining and Data Warehousing",1,1,1);    

CREATE TABLE exam(
    exam_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    exam_name VARCHARACTER(255) NOT NULL,
    total_marks INTEGER NOT NULL,
    duration INTEGER NULL,
    date_of_exam DATE,
    descr TEXT
);
DESCRIBE exam;
INSERT INTO exam VALUES (1,"CE-I Part 1",10,NULL,NULL,"Home Assignment/Seminar/Research Paper Review/Test 10 Marks");
INSERT INTO exam VALUES (2,"CE-I Part 2",15,NULL,NULL,"Home Assignment/Seminar/Research Paper Review/Test 15 Marks");
INSERT INTO exam VALUES (3,"CE-I ",25,NULL,NULL,"CE-I 25 Marks (10+15)marks");
INSERT INTO exam VALUES (4,"CE-II ",25,30,NULL,"Online Exam(MCQ) 25 Marks");
INSERT INTO exam VALUES (5,"ESE",50,120,NULL,"End Semester Examination");

CREATE TABLE result(
    r_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    PRN INTEGER REFERENCES student(PRN) ON DELETE CASCADE ON UPDATE SET NULL,
    sub_id INTEGER REFERENCES subject(sub_id) ON DELETE CASCADE ON UPDATE SET NULL,
    exam_id INTEGER REFERENCES exam(exam_id) ON DELETE CASCADE ON UPDATE SET NULL,
    score INTEGER NOT NULL,
    uploaded_on DATETIME
);
DESCRIBE result;

CREATE TABLE student_subject_exam(
    s_id INTEGER REFERENCES student(s_id) ON DELETE CASCADE ON UPDATE SET NULL,
    sub_id INTEGER REFERENCES subject(sub_id) ON DELETE CASCADE ON UPDATE SET NULL,
    exam_id INTEGER REFERENCES exam(exam_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE student_subject_exam;

CREATE TABLE faculty_exam(
    f_id INTEGER REFERENCES faculty(f_id) ON DELETE CASCADE ON UPDATE SET NULL,
    exam_id INTEGER REFERENCES exam(exam_id) ON DELETE CASCADE ON UPDATE SET NULL
);
DESCRIBE faculty_exam;

CREATE TABLE contact_form (
    cf_id INTEGER PRIMARY KEY AUTO_INCREMENT,
    mail VARCHAR(50),
    sub VARCHAR(50),
    msg TEXT,
    name VARCHAR(50),
    date DATETIME
);
