use MTQExample;

insert into STUDENT(Lastname, Firstname, Major, GradYear) values ("Abama",	"Al", "COMP SCI B.S.", 2011);
insert into STUDENT(Lastname, Firstname, Major, GradYear) values ("Banks","Robin","ACCOUNTING",2013);
insert into STUDENT(Lastname, Firstname, Major, GradYear) values ("Chance","Slim","GENERAL MGMT",201);


insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (1, "Database Applications", "CS", 257, "Lowrie");
insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (3, "Computer Organziation", "CS", 272, "Lowrie"); 
insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (2, "Computer Science I", "CS", 101, "Ames");

insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (4, "Chinese I", "SL", 009, "Zhang");
insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (5, "Russian II", "SL", 004, "Lapitsky");

insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (6, "Atlantic Worlds I", "HS", 011, "Chill");
insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (7, "Europe in the World II", "HS", 042, "Spagnoli");

insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (8, "Multivariable Calculus", "MT", 202, "Reed");

insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (9, "Biology I", "BI", 101, "O''Connor");
insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (10, "Biology II", "BI", 102, "O''Connor");
insert into COURSE(CourseID, Title, DeptCode, Number, Prof) values (11, "Biology III", "BI", 202, "O''Connor");


insert into ENROLL(StudentID, CourseID, Grade) values (1, 1, "A");
insert into ENROLL(StudentID, CourseID, Grade) values (2, 1, "A");
insert into ENROLL(StudentID, CourseID, Grade) values (3, 1, "A");

insert into ENROLL(StudentID, CourseID, Grade) values (1, 2, "F");
insert into ENROLL(StudentID, CourseID, Grade) values (2, 2, "B");
insert into ENROLL(StudentID, CourseID, Grade) values (3, 2, "B");
	
insert into ENROLL(StudentID, CourseID, Grade) values (1, 2, "A");	
insert into ENROLL(StudentID, CourseID, Grade) values (2, 2, "A");	
insert into ENROLL(StudentID, CourseID, Grade) values (3, 2, "A");	

insert into ENROLL(StudentID, CourseID, Grade) values (1, 5, "A");
insert into ENROLL(StudentID, CourseID, Grade) values (2, 5, "C");
insert into ENROLL(StudentID, CourseID, Grade) values (3, 5, "C");

insert into ENROLL(StudentID, CourseID, Grade) values (1, 8, "C+");
insert into ENROLL(StudentID, CourseID, Grade) values (2, 8, "C+");
insert into ENROLL(StudentID, CourseID, Grade) values (3, 8, "C+");
