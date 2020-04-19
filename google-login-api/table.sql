CREATE TABLE IF NOT EXISTS `google_users` (
  `google_id` decimal(21,0) NOT NULL,
  `google_name` varchar(255) NOT NULL,
  `google_email` varchar(255) NOT NULL,
  `google_link` varchar(255) NOT NULL,
  `google_picture_link` varchar(255) NOT NULL,
  PRIMARY KEY (`google_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;