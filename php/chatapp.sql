DROP DATABASE IF EXISTS `chat` ;
create DATABASE chat; 
use chat;

CREATE TABLE  `conversation` (
  `conversation_id` INT NOT NULL AUTO_INCREMENT,
  `conversation_title` VARCHAR(40) NOT NULL,
  `conversation_created_at` DATETIME NOT NULL, 
  PRIMARY KEY (`conversation_id`));

CREATE TABLE `messages` (
  `msg_id` int(11)NOT NULL AUTO_INCREMENT ,
  `incoming_msg_id` int(255) NOT NULL,
  `outgoing_msg_id` int(255) NOT NULL,
  `msg` varchar(1000) NOT NULL,
PRIMARY KEY (`msg_id`)); 

CREATE TABLE `users` (
  `user_id` int(11)NOT NULL AUTO_INCREMENT,
  `unique_id` int(255) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `img` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
    PRIMARY KEY (`user_id`)
);

-- tabela czasów uzydkownika 

CREATE TABLE  `user_time` (
  `ut_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` int(11)NOT NULL,
  `unique_id` int(255) NULL,
  `login_data` VARCHAR(45) NOT NULL,
  `login_time` VARCHAR(45) NOT NULL,
  `logout_data` VARCHAR(45) NOT NULL,
  `logout_time` VARCHAR(45) NOT NULL,
   PRIMARY KEY (`ut_id`),
   FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`)
  );

-- klasy // do wpisania ręcznie 

CREATE TABLE  `class` (
`class_id` INT NOT NULL AUTO_INCREMENT,
`class_name` varchar(250) NOT NULL, 
 `notes` varchar(255) , 
PRIMARY KEY (`class_id`));

-- nauczycieli 
CREATE TABLE `teachers` (
  `teacher_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` int(11)NOT NULL,
  `unique_id` int(255) NOT NULL,  
  `subject_id` INT NOT NULL,
   `notes` varchar(255) , 
    PRIMARY KEY (`teacher_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`));
    FOREIGN KEY (`subject_id`) REFERENCES `subject`(`subject_id`));

-- uczen
CREATE TABLE  `students` (
  `student_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` int(11)NOT NULL,
  `unique_id` int(255) NOT NULL,  
  `class_id` INT NOT NULL, 
  `notes` varchar(255) , 
  PRIMARY KEY (`student_id`),
  FOREIGN KEY (`class_id`) REFERENCES `class`(`class_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`));

-- uczen
CREATE TABLE  `admin` (
  `admin_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` int(11)NOT NULL,
  `unique_id` int(255) NOT NULL, 
  `notes` varchar(255) , 
  PRIMARY KEY (`admin_id`),
  FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`));

-- verfikacja przez admina 

 CREATE TABLE  `user_verification` (
  `uv_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` int(11)NOT NULL,
  `unique_id` int(255) NOT NULL,
  `verification_status` VARCHAR(45) NOT NULL,
  `created_at` VARCHAR(45) NOT NULL,
  `admin_id` INT NOT NULL,
   PRIMARY KEY (`uv_id`),
 FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`),
 FOREIGN KEY (`admin_id`) REFERENCES `admin`(`admin_id`)

);

-- wychowawca
CREATE TABLE `educator` (
  `teacher_id` INT NOT NULL AUTO_INCREMENT,
  `user_id` int(11)NOT NULL,
  `unique_id` int(255) NOT NULL,  
  `class_id` INT NOT NULL,
   `notes` varchar(255) , 
    PRIMARY KEY (`teacher_id`),
    FOREIGN KEY (`class_id`) REFERENCES `class`(`class_id`),
    FOREIGN KEY (`user_id`) REFERENCES `users`(`user_id`));


    -- przedmiot
  CREATE TABLE `subject` (
  `subject_id` INT NOT NULL AUTO_INCREMENT,
   `name` varchar(255), 
    PRIMARY KEY (`subject_id`));