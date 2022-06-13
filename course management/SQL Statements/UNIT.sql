CREATE TABLE IF NOT EXISTS `UNIT` (
  `unit_code` varchar(128) NOT NULL,
  `unit_name` varchar(128) NOT NULL,
  `coordinator` varchar(128) NOT NULL,
  `semester` int(4) NOT NULL,
  `campus_id` int(4) NOT NULL,
  `description` varchar(1024),
   PRIMARY KEY (unit_code, semester, campus_id),
   CONSTRAINT FK_unit_campus FOREIGN KEY (campus_id) REFERENCES CAMPUS(campus_id),
   CONSTRAINT FK_unit_sem FOREIGN KEY (semester) REFERENCES SEMESTER(semester_id)
);

