CREATE TABLE IF NOT EXISTS `LECTURETIMETABLE`(
  `unit_code` varchar(128) NOT NULL,
  `location_id` varchar(128) NOT NULL,
  PRIMARY KEY (unit_code, location_id)
);

