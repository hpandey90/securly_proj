This application enables an administrator to extract information about kids, schools and clubs.
The application can be started after deployment by typing the following URL http://localhost/securly/ . The localhost is the host server on which the application is deployed and can be changed to other host. Once the above URL is entered you can see a login screen which requires username and password for a user to login. The default username and password is "admin" and "admin" respectively. 
Once the user log in successfully into the application then the page is redirected to dashboard page where an admin can perform search on the basis of email and club name. Also, the user can find connection between two kids using their email address. The admin can also view past executed query for the current session(until a page is refreshed) and click on any past query to perform the search again without typing in the query keywords again.  

Below is the schema of database - 
mysql> desc admin;
+-----------+--------------+------+-----+---------+----------------+
| Field     | Type         | Null | Key | Default | Extra          |
+-----------+--------------+------+-----+---------+----------------+
| id        | int(10)      | NO   | PRI | NULL    | auto_increment |
| user_name | varchar(50)  | YES  |     | NULL    |                |
| pwd       | varchar(100) | YES  |     | NULL    |                |
+-----------+--------------+------+-----+---------+----------------+

mysql> desc students;
+----------+-------------+------+-----+---------+-------+
| Field    | Type        | Null | Key | Default | Extra |
+----------+-------------+------+-----+---------+-------+
| school   | varchar(16) | YES  |     | NULL    |       |
| club     | varchar(17) | YES  |     | NULL    |       |
| kid      | varchar(14) | YES  |     | NULL    |       |
| kidEmail | varchar(18) | YES  |     | NULL    |       |
+----------+-------------+------+-----+---------+-------+