use newdb;
select * from student;
insert into Student(stdName,stdAge) values ('max',30); 
insert into Student(stdName,stdAge) values ('John',29),('Jack',31); 

update student set stdName='max Payne' where stdId=1;
update student set stdAge=31;
alter table dbo.student 
drop column stdAge;
select * from student;
drop table Student;


