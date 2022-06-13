CREATE TABLE IF NOT EXISTS `INSTRUCTOR`(
  `staff_id` int(11) NOT NULL,
  `unit_code` varchar(128) NOT NULL,
  PRIMARY KEY (staff_id, unit_code)
);

