CREATE TABLE IF NOT EXISTS `TUTORIAL` (
  `location_id` varchar(128) NOT NULL,
  `location_name` varchar(128) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `campus_id` int(4) NOT NULL,
   PRIMARY KEY (location_id),
   CONSTRAINT FK_tutor FOREIGN KEY (staff_id) REFERENCES STAFF(staff_id),
   CONSTRAINT FK_tut_campus FOREIGN KEY (campus_id) REFERENCES CAMPUS(campus_id)
);

