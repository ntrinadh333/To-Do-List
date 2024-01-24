# To-Do-List
In this web application user can register and login to add tasks.And can remove the tasks tasks after after completion.
All the tasks will be stored in the mysql database.Whenever the task is marked as completed then automatically it will be deleted 
in the database.

Installations Required :
1. A Browser Ex: Chrome , bing etc..
2. Xampp server
3. IDE (visual studio code)
4. mysql workbench

Steps to Run this web project.

1. Clone this project from the github / download the zip file and extract it.
2. Make sure that you've downloaded the xampp server application in your machine.
3. open the xampp control panel and run the apache server.
4. Now keep all the extracted files of the project in htdocs folder.
   htdocs folder location :
   - open xampp folder (not control panel)
   - you'll identify a folder named htdocs in it.
   - open it and add a new folder named **To-do list** and place all the extracted files in that folder.
5. Now open mysql workbench and execute the following queries.
   - create database taskmanager;
   - use taskmanager;
   - CREATE TABLE users (
      id INT AUTO_INCREMENT PRIMARY KEY,
      username VARCHAR(255) NOT NULL,
      password VARCHAR(255) NOT NULL,
      full_name VARCHAR(255) NOT NULL,
      email VARCHAR(255) NOT NULL
      );
   - CREATE TABLE tasks (
      task_id INT AUTO_INCREMENT PRIMARY KEY,
      user_id INT,
      task_name VARCHAR(255) NOT NULL,
      task_description TEXT,
      task_status INT(50),
      FOREIGN KEY (user_id) REFERENCES users(id)
      );
6. Make sure that user and root of your database are correct in the config.php file .
   In my case it user = root , password = root , host = localhost:3306 (mysql).
7. check whether your apache server is startes or not in xampp.
8. now open your browser and type (http://localhost/taskmanager/index.html)
9. You'll able to see the index page and options provided to login and register.
10. Explore the site !!!

    
     
