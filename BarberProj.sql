create table Customer(CustomersID INT(30) not null AUTO_INCREMENT PRIMARY KEY, CustomerUsername varchar(40), Password varchar(10), Name varchar(40), Email varchar(30));

create table Employee (EmployeeID INT(20) not null AUTO_INCREMENT PRIMARY KEY, EmployeeName varchar(40), Password varchar(10), Hours int, tips varchar(7));

create table Schedule( Date Date PRIMARY KEY, Time Time, EmployeeID INT, FOREIGN KEY(EmployeeID) REFERENCES Employee(EmployeeID));

create table Prices(StyleID INT(40) not null AUTO_INCREMENT PRIMARY KEY, Style varchar(40), Price FLOAT);

create table Reservation(CustomersID INT(30), Name varchar(40), Phone varchar(15), Date Date PRIMARY KEY, Status varchar(100), FOREIGN KEY (CustomersID) REFERENCES Customer(CustomersID));
