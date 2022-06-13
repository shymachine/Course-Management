CREATE TABLE IF NOT EXISTS `ENROL`(
  `student_id` int(11) NOT NULL,
  `unit_code` varchar(128) NOT NULL,
  PRIMARY KEY (student_id, unit_code)
);

