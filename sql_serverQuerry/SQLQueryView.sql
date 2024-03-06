use newdb; 

create table Student(
stdId int primary key identity(1,1),
stdName nvarchar(50) not null,
sdtAge int not null 
);


select * from Student;
insert into Student(stdName,sdtAge) values ('Niraj',20),('Ram',21),('Sham',24) ;
insert into Student(stdName,sdtAge) values ('Raj',20);
create view Student_view 
as
select stdName,stdId,sdtAge from Student;

select * from dbo.Student_view;






select sdtAge from Student;

delete from student 
where stdId>1000;





