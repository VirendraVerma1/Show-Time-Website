Group Number = 10
Project Number = 2(Movie Booking System)

Project Link - http://showtimebbd.atwebpages.com/index.php

Team Name= "ShowTime"
Team Members :-
1 - SWARAJ KUMAR	kumarswaraj545@gmail.com
2 - Syed Saif Ali	saifali039@gmail.com
3 - TANYA SRIVASTAVA	tanyasrivastav.2599@gmail.com
4 - VARSHA SINGH	vs968591@gmail.com
5 - VIRENDRA VERMA	pkv555559@bbdec.ac.in

Technologies used:-
Front-end	-	HTML, CSS, JavaScript, Bootstrap4
Back-end	-	PHP
Database	-	MySQL


Any assumptions taken for building the system:-
-User is from INDIA
-User is from Lucknow or Delhi (Limited Data in Database)
-Limited Movies in Database


Responsibilities taken by each team member for building the system:-
-Virendra Verma :	Back-end (PHP, MySQL as Database)
-Swaraj Kumar	:	Front-end (HTML,CSS,Bootstrap4,JavaScript)
-Syed Saif Ali	:	Helping in Frontend
-TANYA SRIVASTAVA:	UI/UX
-VARSHA SINGH	:	UI/UX


Steps to execute the solution
Note for 1st page :-
if(schedule is set on any of the button name Morning, Afternoon,Evening then the encode will be 1,0,0 for morning)
if(schedule is set on any then the encode will be 1,1,1)

stored sessions-
$_SESSION['City']
$_SESSION['Today']
$_SESSION['Schedule1']
$_SESSION['Schedule2']
$_SESSION['Schedule3']
$_SESSION['CurrentDayID']// it will be 0 for today, 1 for tommorow and 2 day after tommorow
$_SESSION['SeatOccupied']// limit to0


Note for 2nd Movie Selection page

stored sessions-
$_SESSION['MovieID']



Note for the blockbuster page :-
schedule boxes encode will be 
blockbustorid_1,blockbustorid_2,blockbustorid_3
blockbustorid_1,blockbustorid_2,blockbustorid_3
and so on

stored in-
$_SESSION['MySchedule']="blockbustorid_1";



Note for the book seat:-
assuming that multiplex don't change their movie every day
total seats 20
you can book only 5 seats using $_SESSION['SeatOccupied']++ to check