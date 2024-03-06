use newdb;

create table Student(
stdId int identity(1,1) primary key,
stdName nvarchar(500),
stdAge int
);
select * from Student;

alter table dbo.Student
add stdSex nvarchar(10) not null,stdFacId int ;--adds 2 column in Student table
select * from Student;

alter table dbo.Student
drop column stdFacId,stdSex;
select * from Student;




