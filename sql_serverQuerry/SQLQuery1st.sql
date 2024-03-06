create database mydb;
drop database mydb;

create database olddb;
exec sp_renamedb 'olddb' , 'newdb';

use newdb;
select @@SERVERNAME;
select @@VERSION;

create table faculty(
fId int not NULL unique,
fName nvarchar(50) not null unique
);
exec sp_rename 'dbo.faculty' ,'fac';--rename the table faculty

drop table fac;--delete table fac


