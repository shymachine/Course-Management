CREATE TABLE IF NOT EXISTS `STUDENT` (
  `student_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL,
  `address` varchar(128),
  `dob` date,
  `course_name` varchar(256),
  `user_id` varchar(128),
  `campus_id` int(4),
  PRIMARY KEY (student_id),
  CONSTRAINT FK_userid FOREIGN KEY(user_id) REFERENCES USERS(user_id),
  CONSTRAINT FK_campus FOREIGN KEY(campus_id) REFERENCES CAMPUS(campus_id)
);
