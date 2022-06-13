CREATE TABLE IF NOT EXISTS `USERS`(
  `user_id` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` varchar(128) NOT NULL,
  PRIMARY KEY (user_id)
);

