CREATE TABLE IF NOT EXISTS `STAFF` (
  `staff_id` int(11) NOT NULL,
  `first_name` varchar(128) NOT NULL,
  `last_name` varchar(128) NOT NULL,
  `email_address` varchar(128) NOT NULL,
  `phone_number` varchar(128) NOT NULL,
  `highest_degree` varchar(128) NOT NULL,
  `specialization` varchar(128) NOT NULL,
  `address` varchar(128),
  `dob` date,
  `available_days` varchar(128),
  `available_time` varchar(256),
  `campus_id` int(4),
  `user_id` varchar(128),
  PRIMARY KEY (staff_id),
  CONSTRAINT FK_userid FOREIGN KEY(user_id) REFERENCES USERS(user_id),
  CONSTRAINT FK_campus FOREIGN KEY(campus_id) REFERENCES CAMPUS(campus_id)
);

