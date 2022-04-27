#
# TABLE STRUCTURE FOR: alumni_events
#

DROP TABLE IF EXISTS `alumni_events`;

CREATE TABLE `alumni_events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` text NOT NULL,
  `event_for` varchar(100) NOT NULL,
  `session_id` int(11) NOT NULL,
  `class_id` varchar(255) NOT NULL,
  `section` varchar(255) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `note` text NOT NULL,
  `photo` varchar(255) NOT NULL,
  `is_active` int(11) NOT NULL,
  `event_notification_message` text NOT NULL,
  `show_onwebsite` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: alumni_students
#

DROP TABLE IF EXISTS `alumni_students`;

CREATE TABLE `alumni_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `current_email` varchar(255) NOT NULL,
  `current_phone` varchar(255) NOT NULL,
  `occupation` text NOT NULL,
  `address` text NOT NULL,
  `student_id` int(11) NOT NULL,
  `photo` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `alumni_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: attendence_type
#

DROP TABLE IF EXISTS `attendence_type`;

CREATE TABLE `attendence_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `key_value` varchar(50) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Present', '<b class=\"text text-success\">P</b>', 'yes', '2016-06-23 11:11:37', '0000-00-00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Late With Excuse', '<b class=\"text text-warning\">E</b>', 'no', '2018-05-29 01:19:48', '0000-00-00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Late', '<b class=\"text text-warning\">L</b>', 'yes', '2016-06-23 11:12:28', '0000-00-00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Absent', '<b class=\"text text-danger\">A</b>', 'yes', '2016-10-11 04:35:40', '0000-00-00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Holiday', 'H', 'yes', '2016-10-11 04:35:01', '0000-00-00');
INSERT INTO `attendence_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (6, 'Half Day', '<b class=\"text text-warning\">F</b>', 'yes', '2016-06-23 11:12:28', '0000-00-00');


#
# TABLE STRUCTURE FOR: book_issues
#

DROP TABLE IF EXISTS `book_issues`;

CREATE TABLE `book_issues` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `book_id` int(11) DEFAULT NULL,
  `duereturn_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `is_returned` int(11) DEFAULT '0',
  `member_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: books
#

DROP TABLE IF EXISTS `books`;

CREATE TABLE `books` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `book_title` varchar(100) NOT NULL,
  `book_no` varchar(50) NOT NULL,
  `isbn_no` varchar(100) NOT NULL,
  `subject` varchar(100) DEFAULT NULL,
  `rack_no` varchar(100) NOT NULL,
  `publish` varchar(100) DEFAULT NULL,
  `author` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `perunitcost` float(10,2) DEFAULT NULL,
  `postdate` date DEFAULT NULL,
  `description` text,
  `available` varchar(10) DEFAULT 'yes',
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: categories
#

DROP TABLE IF EXISTS `categories`;

CREATE TABLE `categories` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: certificates
#

DROP TABLE IF EXISTS `certificates`;

CREATE TABLE `certificates` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `certificate_name` varchar(100) NOT NULL,
  `certificate_text` text NOT NULL,
  `left_header` varchar(100) NOT NULL,
  `center_header` varchar(100) NOT NULL,
  `right_header` varchar(100) NOT NULL,
  `left_footer` varchar(100) NOT NULL,
  `right_footer` varchar(100) NOT NULL,
  `center_footer` varchar(100) NOT NULL,
  `background_image` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `created_for` tinyint(1) NOT NULL COMMENT '1 = staff, 2 = students',
  `status` tinyint(1) NOT NULL,
  `header_height` int(11) NOT NULL,
  `content_height` int(11) NOT NULL,
  `footer_height` int(11) NOT NULL,
  `content_width` int(11) NOT NULL,
  `enable_student_image` tinyint(1) NOT NULL COMMENT '0=no,1=yes',
  `enable_image_height` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `certificates` (`id`, `certificate_name`, `certificate_text`, `left_header`, `center_header`, `right_header`, `left_footer`, `right_footer`, `center_footer`, `background_image`, `created_at`, `updated_at`, `created_for`, `status`, `header_height`, `content_height`, `footer_height`, `content_width`, `enable_student_image`, `enable_image_height`) VALUES (1, 'Sample Transfer Certificate', 'This is certify that <b>[name]</b> has born on [dob]  <br> and have following details [present_address] [guardian] [created_at] [admission_no] [roll_no] [class] [section] [gender] [admission_date] [category] [cast] [father_name] [mother_name] [religion] [email] [phone] .<br>We wish best of luck for future endeavors.', 'Reff. No.....1111111.........', 'To Whomever It May Concern', 'Date: _10__/_10__/__2019__', '.................................<br>admin', '.................................<br>principal', '.................................<br>admin', 'sampletc121.png', '2019-12-21 08:14:34', '0000-00-00', 2, 1, 360, 400, 480, 810, 1, 230);


#
# TABLE STRUCTURE FOR: chat_connections
#

DROP TABLE IF EXISTS `chat_connections`;

CREATE TABLE `chat_connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `chat_user_one` int(11) NOT NULL,
  `chat_user_two` int(11) NOT NULL,
  `ip` varchar(30) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_user_one` (`chat_user_one`),
  KEY `chat_user_two` (`chat_user_two`),
  CONSTRAINT `chat_connections_ibfk_1` FOREIGN KEY (`chat_user_one`) REFERENCES `chat_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_connections_ibfk_2` FOREIGN KEY (`chat_user_two`) REFERENCES `chat_users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `chat_connections` (`id`, `chat_user_one`, `chat_user_two`, `ip`, `time`, `created_at`, `updated_at`) VALUES (1, 1, 2, NULL, NULL, '2021-10-01 15:28:49', NULL);


#
# TABLE STRUCTURE FOR: chat_messages
#

DROP TABLE IF EXISTS `chat_messages`;

CREATE TABLE `chat_messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `chat_user_id` int(11) NOT NULL,
  `ip` varchar(30) NOT NULL,
  `time` int(11) NOT NULL,
  `is_first` int(1) DEFAULT '0',
  `is_read` int(1) NOT NULL DEFAULT '0',
  `chat_connection_id` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `chat_user_id` (`chat_user_id`),
  KEY `chat_connection_id` (`chat_connection_id`),
  CONSTRAINT `chat_messages_ibfk_1` FOREIGN KEY (`chat_user_id`) REFERENCES `chat_users` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_messages_ibfk_2` FOREIGN KEY (`chat_connection_id`) REFERENCES `chat_connections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `chat_messages` (`id`, `message`, `chat_user_id`, `ip`, `time`, `is_first`, `is_read`, `chat_connection_id`, `created_at`) VALUES (1, 'you are now connected on chat', 2, '', 0, 1, 0, 1, NULL);
INSERT INTO `chat_messages` (`id`, `message`, `chat_user_id`, `ip`, `time`, `is_first`, `is_read`, `chat_connection_id`, `created_at`) VALUES (2, 'Salam', 2, '', 0, 0, 0, 1, '2021-10-01 23:28:58');


#
# TABLE STRUCTURE FOR: chat_users
#

DROP TABLE IF EXISTS `chat_users`;

CREATE TABLE `chat_users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_type` varchar(20) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `create_staff_id` int(11) DEFAULT NULL,
  `create_student_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `staff_id` (`staff_id`),
  KEY `student_id` (`student_id`),
  KEY `create_staff_id` (`create_staff_id`),
  KEY `create_student_id` (`create_student_id`),
  CONSTRAINT `chat_users_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_users_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_users_ibfk_3` FOREIGN KEY (`create_staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  CONSTRAINT `chat_users_ibfk_4` FOREIGN KEY (`create_student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `chat_users` (`id`, `user_type`, `staff_id`, `student_id`, `create_staff_id`, `create_student_id`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'staff', 1, NULL, NULL, NULL, 0, '2021-10-01 15:28:49', NULL);
INSERT INTO `chat_users` (`id`, `user_type`, `staff_id`, `student_id`, `create_staff_id`, `create_student_id`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'staff', 5, NULL, 1, NULL, 0, '2021-10-01 15:28:49', NULL);


#
# TABLE STRUCTURE FOR: class_sections
#

DROP TABLE IF EXISTS `class_sections`;

CREATE TABLE `class_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `section_id` (`section_id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 1, 'no', '2021-09-30 01:54:42', NULL);
INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_active`, `created_at`, `updated_at`) VALUES (2, 1, 2, 'no', '2021-09-30 01:55:16', NULL);
INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_active`, `created_at`, `updated_at`) VALUES (3, 2, 3, 'no', '2021-09-30 01:55:27', NULL);
INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_active`, `created_at`, `updated_at`) VALUES (4, 2, 4, 'no', '2021-09-30 01:55:27', NULL);
INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_active`, `created_at`, `updated_at`) VALUES (5, 3, 5, 'no', '2021-09-30 01:55:37', NULL);
INSERT INTO `class_sections` (`id`, `class_id`, `section_id`, `is_active`, `created_at`, `updated_at`) VALUES (6, 3, 6, 'no', '2021-09-30 01:55:37', NULL);


#
# TABLE STRUCTURE FOR: class_teacher
#

DROP TABLE IF EXISTS `class_teacher`;

CREATE TABLE `class_teacher` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `staff_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: classes
#

DROP TABLE IF EXISTS `classes`;

CREATE TABLE `classes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class` varchar(60) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Year 1', 'no', '2021-09-30 01:54:42', NULL);
INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Year 2', 'no', '2021-09-30 01:55:27', NULL);
INSERT INTO `classes` (`id`, `class`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Year 3', 'no', '2021-09-30 01:55:37', NULL);


#
# TABLE STRUCTURE FOR: complaint
#

DROP TABLE IF EXISTS `complaint`;

CREATE TABLE `complaint` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_type` varchar(255) NOT NULL,
  `source` varchar(15) NOT NULL,
  `name` varchar(100) NOT NULL,
  `contact` varchar(15) NOT NULL,
  `email` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `description` text NOT NULL,
  `action_taken` varchar(200) NOT NULL,
  `assigned` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: complaint_type
#

DROP TABLE IF EXISTS `complaint_type`;

CREATE TABLE `complaint_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `complaint_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: content_for
#

DROP TABLE IF EXISTS `content_for`;

CREATE TABLE `content_for` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role` varchar(50) DEFAULT NULL,
  `content_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `content_id` (`content_id`),
  KEY `user_id` (`user_id`),
  CONSTRAINT `content_for_ibfk_1` FOREIGN KEY (`content_id`) REFERENCES `contents` (`id`) ON DELETE CASCADE,
  CONSTRAINT `content_for_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: contents
#

DROP TABLE IF EXISTS `contents`;

CREATE TABLE `contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `is_public` varchar(10) DEFAULT 'No',
  `class_id` int(11) DEFAULT NULL,
  `cls_sec_id` int(10) NOT NULL,
  `file` varchar(250) DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: custom_field_values
#

DROP TABLE IF EXISTS `custom_field_values`;

CREATE TABLE `custom_field_values` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `belong_table_id` int(11) DEFAULT NULL,
  `custom_field_id` int(11) DEFAULT NULL,
  `field_value` longtext,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `custom_field_id` (`custom_field_id`),
  CONSTRAINT `custom_field_values_ibfk_1` FOREIGN KEY (`custom_field_id`) REFERENCES `custom_fields` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: custom_fields
#

DROP TABLE IF EXISTS `custom_fields`;

CREATE TABLE `custom_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `belong_to` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `bs_column` int(10) DEFAULT NULL,
  `validation` int(11) DEFAULT '0',
  `field_values` text,
  `show_table` varchar(100) DEFAULT NULL,
  `visible_on_table` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: department
#

DROP TABLE IF EXISTS `department`;

CREATE TABLE `department` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `department_name` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (1, 'Admin', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (2, 'Accounts', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (3, 'Teaching Faculty', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (4, 'Science', 'yes');
INSERT INTO `department` (`id`, `department_name`, `is_active`) VALUES (5, 'Library', 'yes');


#
# TABLE STRUCTURE FOR: disable_reason
#

DROP TABLE IF EXISTS `disable_reason`;

CREATE TABLE `disable_reason` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reason` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: dispatch_receive
#

DROP TABLE IF EXISTS `dispatch_receive`;

CREATE TABLE `dispatch_receive` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference_no` varchar(50) NOT NULL,
  `to_title` varchar(100) NOT NULL,
  `address` varchar(500) NOT NULL,
  `note` varchar(500) NOT NULL,
  `from_title` varchar(200) NOT NULL,
  `date` varchar(20) NOT NULL,
  `image` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `type` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: email_config
#

DROP TABLE IF EXISTS `email_config`;

CREATE TABLE `email_config` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `email_type` varchar(100) DEFAULT NULL,
  `smtp_server` varchar(100) DEFAULT NULL,
  `smtp_port` varchar(100) DEFAULT NULL,
  `smtp_username` varchar(100) DEFAULT NULL,
  `smtp_password` varchar(100) DEFAULT NULL,
  `ssl_tls` varchar(100) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `email_config` (`id`, `email_type`, `smtp_server`, `smtp_port`, `smtp_username`, `smtp_password`, `ssl_tls`, `is_active`, `created_at`) VALUES (1, 'sendmail', NULL, NULL, NULL, NULL, NULL, '', '2020-02-28 06:46:03');


#
# TABLE STRUCTURE FOR: enquiry
#

DROP TABLE IF EXISTS `enquiry`;

CREATE TABLE `enquiry` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `reference` varchar(20) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `follow_up_date` date NOT NULL,
  `note` text NOT NULL,
  `source` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `assigned` varchar(100) NOT NULL,
  `class` int(11) NOT NULL,
  `no_of_child` varchar(11) DEFAULT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: enquiry_type
#

DROP TABLE IF EXISTS `enquiry_type`;

CREATE TABLE `enquiry_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_type` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: events
#

DROP TABLE IF EXISTS `events`;

CREATE TABLE `events` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `event_title` varchar(200) NOT NULL,
  `event_description` varchar(300) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `event_type` varchar(100) NOT NULL,
  `event_color` varchar(200) NOT NULL,
  `event_for` varchar(100) NOT NULL,
  `role_id` int(11) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `events` (`id`, `event_title`, `event_description`, `start_date`, `end_date`, `event_type`, `event_color`, `event_for`, `role_id`, `is_active`) VALUES (1, 'Appointment with Parents', '', '2021-10-05 00:00:00', '2021-10-05 00:00:00', 'task', '#000', '1', 7, 'no');


#
# TABLE STRUCTURE FOR: exam_group_class_batch_exam_students
#

DROP TABLE IF EXISTS `exam_group_class_batch_exam_students`;

CREATE TABLE `exam_group_class_batch_exam_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_group_class_batch_exam_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_session_id` int(11) NOT NULL,
  `roll_no` int(6) NOT NULL DEFAULT '0',
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_group_class_batch_exam_id` (`exam_group_class_batch_exam_id`),
  KEY `student_id` (`student_id`),
  KEY `student_session_id` (`student_session_id`),
  CONSTRAINT `exam_group_class_batch_exam_students_ibfk_1` FOREIGN KEY (`exam_group_class_batch_exam_id`) REFERENCES `exam_group_class_batch_exams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_class_batch_exam_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_class_batch_exam_students_ibfk_3` FOREIGN KEY (`student_session_id`) REFERENCES `student_session` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_group_class_batch_exam_subjects
#

DROP TABLE IF EXISTS `exam_group_class_batch_exam_subjects`;

CREATE TABLE `exam_group_class_batch_exam_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_group_class_batch_exams_id` int(11) DEFAULT NULL,
  `subject_id` int(10) NOT NULL,
  `date_from` date NOT NULL,
  `time_from` time NOT NULL,
  `duration` varchar(50) NOT NULL,
  `room_no` varchar(100) DEFAULT NULL,
  `max_marks` float(10,2) DEFAULT NULL,
  `min_marks` float(10,2) DEFAULT NULL,
  `credit_hours` float(10,2) DEFAULT '0.00',
  `date_to` datetime DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_group_class_batch_exams_id` (`exam_group_class_batch_exams_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `exam_group_class_batch_exam_subjects_ibfk_1` FOREIGN KEY (`exam_group_class_batch_exams_id`) REFERENCES `exam_group_class_batch_exams` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_class_batch_exam_subjects_ibfk_2` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_group_class_batch_exams
#

DROP TABLE IF EXISTS `exam_group_class_batch_exams`;

CREATE TABLE `exam_group_class_batch_exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam` varchar(250) DEFAULT NULL,
  `session_id` int(10) NOT NULL,
  `date_from` date DEFAULT NULL,
  `date_to` date DEFAULT NULL,
  `description` text,
  `exam_group_id` int(11) DEFAULT NULL,
  `is_publish` int(1) DEFAULT '0',
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_group_id` (`exam_group_id`),
  CONSTRAINT `exam_group_class_batch_exams_ibfk_1` FOREIGN KEY (`exam_group_id`) REFERENCES `exam_groups` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_group_exam_connections
#

DROP TABLE IF EXISTS `exam_group_exam_connections`;

CREATE TABLE `exam_group_exam_connections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_group_id` int(11) DEFAULT NULL,
  `exam_group_class_batch_exams_id` int(11) DEFAULT NULL,
  `exam_weightage` float(10,2) DEFAULT '0.00',
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_group_id` (`exam_group_id`),
  KEY `exam_group_class_batch_exams_id` (`exam_group_class_batch_exams_id`),
  CONSTRAINT `exam_group_exam_connections_ibfk_1` FOREIGN KEY (`exam_group_id`) REFERENCES `exam_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_exam_connections_ibfk_2` FOREIGN KEY (`exam_group_class_batch_exams_id`) REFERENCES `exam_group_class_batch_exams` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_group_exam_results
#

DROP TABLE IF EXISTS `exam_group_exam_results`;

CREATE TABLE `exam_group_exam_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_group_class_batch_exam_student_id` int(11) NOT NULL,
  `exam_group_class_batch_exam_subject_id` int(11) DEFAULT NULL,
  `attendence` varchar(10) DEFAULT NULL,
  `get_marks` float(10,2) DEFAULT '0.00',
  `note` text,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `exam_group_student_id` int(11) DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_group_class_batch_exam_subject_id` (`exam_group_class_batch_exam_subject_id`),
  KEY `exam_group_student_id` (`exam_group_student_id`),
  KEY `exam_group_class_batch_exam_student_id` (`exam_group_class_batch_exam_student_id`),
  CONSTRAINT `exam_group_exam_results_ibfk_1` FOREIGN KEY (`exam_group_class_batch_exam_subject_id`) REFERENCES `exam_group_class_batch_exam_subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_exam_results_ibfk_2` FOREIGN KEY (`exam_group_student_id`) REFERENCES `exam_group_students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_exam_results_ibfk_3` FOREIGN KEY (`exam_group_class_batch_exam_student_id`) REFERENCES `exam_group_class_batch_exam_students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_group_students
#

DROP TABLE IF EXISTS `exam_group_students`;

CREATE TABLE `exam_group_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_group_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `student_session_id` int(10) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_group_id` (`exam_group_id`),
  KEY `student_id` (`student_id`),
  CONSTRAINT `exam_group_students_ibfk_1` FOREIGN KEY (`exam_group_id`) REFERENCES `exam_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `exam_group_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_groups
#

DROP TABLE IF EXISTS `exam_groups`;

CREATE TABLE `exam_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `exam_type` varchar(250) DEFAULT NULL,
  `description` text,
  `is_active` int(11) DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_results
#

DROP TABLE IF EXISTS `exam_results`;

CREATE TABLE `exam_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `attendence` varchar(10) NOT NULL,
  `exam_schedule_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `get_marks` float(10,2) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `exam_schedule_id` (`exam_schedule_id`),
  KEY `student_id` (`student_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exam_schedules
#

DROP TABLE IF EXISTS `exam_schedules`;

CREATE TABLE `exam_schedules` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `exam_id` int(11) DEFAULT NULL,
  `teacher_subject_id` int(11) DEFAULT NULL,
  `date_of_exam` date DEFAULT NULL,
  `start_to` varchar(50) DEFAULT NULL,
  `end_from` varchar(50) DEFAULT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `full_marks` int(11) DEFAULT NULL,
  `passing_marks` int(11) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `teacher_subject_id` (`teacher_subject_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: exams
#

DROP TABLE IF EXISTS `exams`;

CREATE TABLE `exams` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `sesion_id` int(11) NOT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: expense_head
#

DROP TABLE IF EXISTS `expense_head`;

CREATE TABLE `expense_head` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_category` varchar(50) DEFAULT NULL,
  `description` text,
  `is_active` varchar(255) DEFAULT 'yes',
  `is_deleted` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: expenses
#

DROP TABLE IF EXISTS `expenses`;

CREATE TABLE `expenses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exp_head_id` int(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `documents` varchar(255) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'yes',
  `is_deleted` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fee_groups
#

DROP TABLE IF EXISTS `fee_groups`;

CREATE TABLE `fee_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(200) DEFAULT NULL,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `fee_groups` (`id`, `name`, `is_system`, `description`, `is_active`, `created_at`) VALUES (1, 'Year1', 0, '', 'no', '2021-09-30 05:23:32');
INSERT INTO `fee_groups` (`id`, `name`, `is_system`, `description`, `is_active`, `created_at`) VALUES (2, 'Year 2', 0, '', 'no', '2021-09-30 05:23:39');
INSERT INTO `fee_groups` (`id`, `name`, `is_system`, `description`, `is_active`, `created_at`) VALUES (3, 'Year 3', 0, '', 'no', '2021-09-30 05:23:45');
INSERT INTO `fee_groups` (`id`, `name`, `is_system`, `description`, `is_active`, `created_at`) VALUES (4, 'Year 4', 0, '', 'no', '2021-09-30 05:23:52');
INSERT INTO `fee_groups` (`id`, `name`, `is_system`, `description`, `is_active`, `created_at`) VALUES (5, 'Balance Master', 1, NULL, 'no', '2021-09-30 05:48:18');


#
# TABLE STRUCTURE FOR: fee_groups_feetype
#

DROP TABLE IF EXISTS `fee_groups_feetype`;

CREATE TABLE `fee_groups_feetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_session_group_id` int(11) DEFAULT NULL,
  `fee_groups_id` int(11) DEFAULT NULL,
  `feetype_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `fine_type` varchar(50) NOT NULL DEFAULT 'none',
  `due_date` date DEFAULT NULL,
  `fine_percentage` float(10,2) NOT NULL DEFAULT '0.00',
  `fine_amount` float(10,2) NOT NULL DEFAULT '0.00',
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fee_session_group_id` (`fee_session_group_id`),
  KEY `fee_groups_id` (`fee_groups_id`),
  KEY `feetype_id` (`feetype_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `fee_groups_feetype_ibfk_1` FOREIGN KEY (`fee_session_group_id`) REFERENCES `fee_session_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_groups_feetype_ibfk_2` FOREIGN KEY (`fee_groups_id`) REFERENCES `fee_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_groups_feetype_ibfk_3` FOREIGN KEY (`feetype_id`) REFERENCES `feetype` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_groups_feetype_ibfk_4` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (1, 1, 1, 1, 15, '5000.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:24:21');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (2, 1, 1, 2, 15, '2000.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:24:55');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (3, 1, 1, 3, 15, '500.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:25:10');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (4, 1, 1, 4, 15, '200.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:25:27');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (5, 1, 1, 5, 15, '50.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:25:50');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (6, 2, 2, 1, 15, '5000.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:26:10');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (7, 2, 2, 2, 15, '2200.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:26:24');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (8, 2, 2, 3, 15, '500.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:26:37');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (9, 2, 2, 4, 15, '200.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:26:51');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (10, 2, 2, 5, 15, '50.00', 'none', '0000-00-00', '0.00', '0.00', 'no', '2021-09-30 05:27:01');
INSERT INTO `fee_groups_feetype` (`id`, `fee_session_group_id`, `fee_groups_id`, `feetype_id`, `session_id`, `amount`, `fine_type`, `due_date`, `fine_percentage`, `fine_amount`, `is_active`, `created_at`) VALUES (11, 3, 5, 8, 15, NULL, 'none', '2021-09-30', '0.00', '0.00', 'no', '2021-09-30 05:48:18');


#
# TABLE STRUCTURE FOR: fee_receipt_no
#

DROP TABLE IF EXISTS `fee_receipt_no`;

CREATE TABLE `fee_receipt_no` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fee_session_groups
#

DROP TABLE IF EXISTS `fee_session_groups`;

CREATE TABLE `fee_session_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `fee_groups_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `fee_groups_id` (`fee_groups_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `fee_session_groups_ibfk_1` FOREIGN KEY (`fee_groups_id`) REFERENCES `fee_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `fee_session_groups_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

INSERT INTO `fee_session_groups` (`id`, `fee_groups_id`, `session_id`, `is_active`, `created_at`) VALUES (1, 1, 15, 'no', '2021-09-30 05:24:21');
INSERT INTO `fee_session_groups` (`id`, `fee_groups_id`, `session_id`, `is_active`, `created_at`) VALUES (2, 2, 15, 'no', '2021-09-30 05:26:10');
INSERT INTO `fee_session_groups` (`id`, `fee_groups_id`, `session_id`, `is_active`, `created_at`) VALUES (3, 5, 15, 'no', '2021-09-30 05:48:18');


#
# TABLE STRUCTURE FOR: feecategory
#

DROP TABLE IF EXISTS `feecategory`;

CREATE TABLE `feecategory` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `category` varchar(50) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: feemasters
#

DROP TABLE IF EXISTS `feemasters`;

CREATE TABLE `feemasters` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `feetype_id` int(11) NOT NULL,
  `class_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `description` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: fees_discounts
#

DROP TABLE IF EXISTS `fees_discounts`;

CREATE TABLE `fees_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `fees_discounts_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `fees_discounts` (`id`, `session_id`, `name`, `code`, `amount`, `description`, `is_active`, `created_at`) VALUES (1, 15, 'Siblings', '001', '100.00', '', 'no', '2021-09-30 05:47:42');


#
# TABLE STRUCTURE FOR: fees_reminder
#

DROP TABLE IF EXISTS `fees_reminder`;

CREATE TABLE `fees_reminder` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reminder_type` varchar(10) DEFAULT NULL,
  `day` int(2) DEFAULT NULL,
  `is_active` int(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `fees_reminder` (`id`, `reminder_type`, `day`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'before', 2, 0, '2020-02-28 06:38:32', NULL);
INSERT INTO `fees_reminder` (`id`, `reminder_type`, `day`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'before', 5, 0, '2020-02-28 06:38:36', NULL);
INSERT INTO `fees_reminder` (`id`, `reminder_type`, `day`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'after', 2, 0, '2020-02-28 06:38:40', NULL);
INSERT INTO `fees_reminder` (`id`, `reminder_type`, `day`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'after', 5, 0, '2020-02-28 06:38:44', NULL);


#
# TABLE STRUCTURE FOR: feetype
#

DROP TABLE IF EXISTS `feetype`;

CREATE TABLE `feetype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `feecategory_id` int(11) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (1, 0, NULL, 'Admission Fee', '1010', 'no', '2021-09-30 05:20:44', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (2, 0, NULL, 'Tuition Fee', '1011', 'no', '2021-09-30 05:20:59', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (3, 0, NULL, 'Laboratory Fee', '1012', 'no', '2021-09-30 05:21:17', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (4, 0, NULL, 'Computer Lab Fee', '1013', 'no', '2021-09-30 05:21:33', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (5, 0, NULL, 'Library Fee', '1014', 'no', '2021-09-30 05:21:43', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (6, 0, NULL, 'Transport Fee', '1015', 'no', '2021-09-30 05:23:03', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (7, 0, NULL, 'Hostel Fee', '1016', 'no', '2021-09-30 05:23:16', NULL, '');
INSERT INTO `feetype` (`id`, `is_system`, `feecategory_id`, `type`, `code`, `is_active`, `created_at`, `updated_at`, `description`) VALUES (8, 1, NULL, 'Previous Session Balance', 'Previous Session Balance', 'no', '2021-09-30 05:48:18', NULL, '');


#
# TABLE STRUCTURE FOR: follow_up
#

DROP TABLE IF EXISTS `follow_up`;

CREATE TABLE `follow_up` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `enquiry_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `next_date` date NOT NULL,
  `response` text NOT NULL,
  `note` text NOT NULL,
  `followup_by` varchar(200) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: front_cms_media_gallery
#

DROP TABLE IF EXISTS `front_cms_media_gallery`;

CREATE TABLE `front_cms_media_gallery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `image` varchar(300) DEFAULT NULL,
  `thumb_path` varchar(300) DEFAULT NULL,
  `dir_path` varchar(300) DEFAULT NULL,
  `img_name` varchar(300) DEFAULT NULL,
  `thumb_name` varchar(300) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `file_type` varchar(100) NOT NULL,
  `file_size` varchar(100) NOT NULL,
  `vid_url` text NOT NULL,
  `vid_title` varchar(250) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: front_cms_menu_items
#

DROP TABLE IF EXISTS `front_cms_menu_items`;

CREATE TABLE `front_cms_menu_items` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu_id` int(11) NOT NULL,
  `menu` varchar(100) DEFAULT NULL,
  `page_id` int(11) NOT NULL,
  `parent_id` int(11) NOT NULL,
  `ext_url` text,
  `open_new_tab` int(11) DEFAULT '0',
  `ext_url_link` text,
  `slug` varchar(200) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `description` text,
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `front_cms_menu_items` (`id`, `menu_id`, `menu`, `page_id`, `parent_id`, `ext_url`, `open_new_tab`, `ext_url_link`, `slug`, `weight`, `publish`, `description`, `is_active`, `created_at`) VALUES (1, 1, 'Home', 1, 0, NULL, NULL, NULL, 'home', 1, 0, NULL, 'no', '2019-12-02 15:11:50');
INSERT INTO `front_cms_menu_items` (`id`, `menu_id`, `menu`, `page_id`, `parent_id`, `ext_url`, `open_new_tab`, `ext_url_link`, `slug`, `weight`, `publish`, `description`, `is_active`, `created_at`) VALUES (2, 1, 'Contact Us', 76, 0, NULL, NULL, NULL, 'contact-us', 4, 0, NULL, 'no', '2019-12-02 15:11:52');
INSERT INTO `front_cms_menu_items` (`id`, `menu_id`, `menu`, `page_id`, `parent_id`, `ext_url`, `open_new_tab`, `ext_url_link`, `slug`, `weight`, `publish`, `description`, `is_active`, `created_at`) VALUES (3, 1, 'Complain', 2, 0, NULL, NULL, NULL, 'complain', 3, 0, NULL, 'no', '2019-12-02 15:11:52');
INSERT INTO `front_cms_menu_items` (`id`, `menu_id`, `menu`, `page_id`, `parent_id`, `ext_url`, `open_new_tab`, `ext_url_link`, `slug`, `weight`, `publish`, `description`, `is_active`, `created_at`) VALUES (4, 1, 'Admission', 0, 0, '1', NULL, 'http://yourschoolurl.com/online_admission', 'admssion', 2, 0, NULL, 'no', '2019-12-21 08:33:00');


#
# TABLE STRUCTURE FOR: front_cms_menus
#

DROP TABLE IF EXISTS `front_cms_menus`;

CREATE TABLE `front_cms_menus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `menu` varchar(100) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `description` text,
  `open_new_tab` int(10) NOT NULL DEFAULT '0',
  `ext_url` text NOT NULL,
  `ext_url_link` text NOT NULL,
  `publish` int(11) NOT NULL DEFAULT '0',
  `content_type` varchar(10) NOT NULL DEFAULT 'manual',
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `front_cms_menus` (`id`, `menu`, `slug`, `description`, `open_new_tab`, `ext_url`, `ext_url_link`, `publish`, `content_type`, `is_active`, `created_at`) VALUES (1, 'Main Menu', 'main-menu', 'Main menu', 0, '', '', 0, 'default', 'no', '2018-04-20 07:54:49');
INSERT INTO `front_cms_menus` (`id`, `menu`, `slug`, `description`, `open_new_tab`, `ext_url`, `ext_url_link`, `publish`, `content_type`, `is_active`, `created_at`) VALUES (2, 'Bottom Menu', 'bottom-menu', 'Bottom Menu', 0, '', '', 0, 'default', 'no', '2018-04-20 07:54:55');


#
# TABLE STRUCTURE FOR: front_cms_page_contents
#

DROP TABLE IF EXISTS `front_cms_page_contents`;

CREATE TABLE `front_cms_page_contents` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_id` int(11) DEFAULT NULL,
  `content_type` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `page_id` (`page_id`),
  CONSTRAINT `front_cms_page_contents_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `front_cms_pages` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: front_cms_pages
#

DROP TABLE IF EXISTS `front_cms_pages`;

CREATE TABLE `front_cms_pages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `page_type` varchar(10) NOT NULL DEFAULT 'manual',
  `is_homepage` int(1) DEFAULT '0',
  `title` varchar(250) DEFAULT NULL,
  `url` varchar(250) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `slug` varchar(200) DEFAULT NULL,
  `meta_title` text,
  `meta_description` text,
  `meta_keyword` text,
  `feature_image` varchar(200) NOT NULL,
  `description` longtext,
  `publish_date` date NOT NULL,
  `publish` int(10) DEFAULT '0',
  `sidebar` int(10) DEFAULT '0',
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=77 DEFAULT CHARSET=utf8;

INSERT INTO `front_cms_pages` (`id`, `page_type`, `is_homepage`, `title`, `url`, `type`, `slug`, `meta_title`, `meta_description`, `meta_keyword`, `feature_image`, `description`, `publish_date`, `publish`, `sidebar`, `is_active`, `created_at`) VALUES (1, 'default', 1, 'Home', 'page/home', 'page', 'home', '', '', '', '', '<p>home page</p>', '0000-00-00', 1, NULL, 'no', '2019-12-02 08:23:47');
INSERT INTO `front_cms_pages` (`id`, `page_type`, `is_homepage`, `title`, `url`, `type`, `slug`, `meta_title`, `meta_description`, `meta_keyword`, `feature_image`, `description`, `publish_date`, `publish`, `sidebar`, `is_active`, `created_at`) VALUES (2, 'default', 0, 'Complain', 'page/complain', 'page', 'complain', 'Complain form', '                                                                                                                                                                                    complain form                                                                                                                                                                                                                                ', 'complain form', '', '<p>[form-builder:complain]</p>', '0000-00-00', 1, NULL, 'no', '2019-11-13 03:16:36');
INSERT INTO `front_cms_pages` (`id`, `page_type`, `is_homepage`, `title`, `url`, `type`, `slug`, `meta_title`, `meta_description`, `meta_keyword`, `feature_image`, `description`, `publish_date`, `publish`, `sidebar`, `is_active`, `created_at`) VALUES (54, 'default', 0, '404 page', 'page/404-page', 'page', '404-page', '', '                                ', '', '', '<html>\r\n<head>\r\n <title></title>\r\n</head>\r\n<body>\r\n<p>404 page found</p>\r\n</body>\r\n</html>', '0000-00-00', 0, NULL, 'no', '2018-05-18 07:46:04');
INSERT INTO `front_cms_pages` (`id`, `page_type`, `is_homepage`, `title`, `url`, `type`, `slug`, `meta_title`, `meta_description`, `meta_keyword`, `feature_image`, `description`, `publish_date`, `publish`, `sidebar`, `is_active`, `created_at`) VALUES (76, 'default', 0, 'Contact us', 'page/contact-us', 'page', 'contact-us', '', '', '', '', '<section class=\"contact\">\r\n<div class=\"container\">\r\n<div class=\"row\">\r\n<h2 class=\"col-md-12 col-sm-12\">Send In Your Query</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"col-md-12 col-sm-12\">[form-builder:contact_us]<!--./row--></div>\r\n<!--./col-md-12--></div>\r\n<!--./row--></div>\r\n<!--./container--></section>\r\n\r\n<div class=\"col-md-4 col-sm-4\">\r\n<div class=\"contact-item\"><img src=\"http://192.168.1.81/repos/smartschool/uploads/gallery/media/pin.svg\" />\r\n<h3>Our Location</h3>\r\n\r\n<p>350 Fifth Avenue, 34th floor New York NY 10118-3299 USA</p>\r\n</div>\r\n<!--./contact-item--></div>\r\n<!--./col-md-4-->\r\n\r\n<div class=\"col-md-4 col-sm-4\">\r\n<div class=\"contact-item\"><img src=\"http://192.168.1.81/repos/smartschool/uploads/gallery/media/phone.svg\" />\r\n<h3>CALL US</h3>\r\n\r\n<p>E-mail : info@abcschool.com</p>\r\n\r\n<p>Mobile : +91-9009987654</p>\r\n</div>\r\n<!--./contact-item--></div>\r\n<!--./col-md-4-->\r\n\r\n<div class=\"col-md-4 col-sm-4\">\r\n<div class=\"contact-item\"><img src=\"http://192.168.1.81/repos/smartschool/uploads/gallery/media/clock.svg\" />\r\n<h3>Working Hours</h3>\r\n\r\n<p>Mon-Fri : 9 am to 5 pm</p>\r\n\r\n<p>Sat : 9 am to 3 pm</p>\r\n</div>\r\n<!--./contact-item--></div>\r\n<!--./col-md-4-->\r\n\r\n<div class=\"col-md-12 col-sm-12\">\r\n<div class=\"mapWrapper fullwidth\"><iframe frameborder=\"0\" height=\"500\" marginheight=\"0\" marginwidth=\"0\" scrolling=\"no\" src=\"http://maps.google.com/maps?f=q&source=s_q&hl=EN&q=time+square&aq=&sll=40.716558,-73.931122&sspn=0.40438,1.056747&ie=UTF8&rq=1&ev=p&split=1&radius=33.22&hq=time+square&hnear=&ll=37.061753,-95.677185&spn=0.438347,0.769043&z=9&output=embed\" width=\"100%\"></iframe></div>\r\n</div>', '0000-00-00', 0, NULL, 'no', '2019-05-04 08:46:41');


#
# TABLE STRUCTURE FOR: front_cms_program_photos
#

DROP TABLE IF EXISTS `front_cms_program_photos`;

CREATE TABLE `front_cms_program_photos` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `program_id` int(11) DEFAULT NULL,
  `media_gallery_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `program_id` (`program_id`),
  CONSTRAINT `front_cms_program_photos_ibfk_1` FOREIGN KEY (`program_id`) REFERENCES `front_cms_programs` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: front_cms_programs
#

DROP TABLE IF EXISTS `front_cms_programs`;

CREATE TABLE `front_cms_programs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) DEFAULT NULL,
  `slug` varchar(255) DEFAULT NULL,
  `url` text,
  `title` varchar(200) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `event_start` date DEFAULT NULL,
  `event_end` date DEFAULT NULL,
  `event_venue` text,
  `description` text,
  `is_active` varchar(10) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `meta_title` text NOT NULL,
  `meta_description` text NOT NULL,
  `meta_keyword` text NOT NULL,
  `feature_image` text NOT NULL,
  `publish_date` date NOT NULL,
  `publish` varchar(10) DEFAULT '0',
  `sidebar` int(10) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: front_cms_settings
#

DROP TABLE IF EXISTS `front_cms_settings`;

CREATE TABLE `front_cms_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `theme` varchar(50) DEFAULT NULL,
  `is_active_rtl` int(10) DEFAULT '0',
  `is_active_front_cms` int(11) DEFAULT '0',
  `is_active_sidebar` int(1) DEFAULT '0',
  `logo` varchar(200) DEFAULT NULL,
  `contact_us_email` varchar(100) DEFAULT NULL,
  `complain_form_email` varchar(100) DEFAULT NULL,
  `sidebar_options` text NOT NULL,
  `whatsapp_url` varchar(255) NOT NULL,
  `fb_url` varchar(200) NOT NULL,
  `twitter_url` varchar(200) NOT NULL,
  `youtube_url` varchar(200) NOT NULL,
  `google_plus` varchar(200) NOT NULL,
  `instagram_url` varchar(200) NOT NULL,
  `pinterest_url` varchar(200) NOT NULL,
  `linkedin_url` varchar(200) NOT NULL,
  `google_analytics` text,
  `footer_text` varchar(500) DEFAULT NULL,
  `fav_icon` varchar(250) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `front_cms_settings` (`id`, `theme`, `is_active_rtl`, `is_active_front_cms`, `is_active_sidebar`, `logo`, `contact_us_email`, `complain_form_email`, `sidebar_options`, `whatsapp_url`, `fb_url`, `twitter_url`, `youtube_url`, `google_plus`, `instagram_url`, `pinterest_url`, `linkedin_url`, `google_analytics`, `footer_text`, `fav_icon`, `created_at`) VALUES (1, 'material_pink', NULL, NULL, NULL, NULL, '', '', '[\"news\",\"complain\"]', '', '', '', '', '', '', '', '', '', '', '', '2020-02-28 06:48:32');


#
# TABLE STRUCTURE FOR: general_calls
#

DROP TABLE IF EXISTS `general_calls`;

CREATE TABLE `general_calls` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) NOT NULL,
  `contact` varchar(12) NOT NULL,
  `date` date NOT NULL,
  `description` varchar(500) NOT NULL,
  `follow_up_date` date NOT NULL,
  `call_dureation` varchar(50) NOT NULL,
  `note` text NOT NULL,
  `call_type` varchar(20) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: grades
#

DROP TABLE IF EXISTS `grades`;

CREATE TABLE `grades` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam_type` varchar(250) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `point` float(10,1) DEFAULT NULL,
  `mark_from` float(10,2) DEFAULT NULL,
  `mark_upto` float(10,2) DEFAULT NULL,
  `description` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: homework
#

DROP TABLE IF EXISTS `homework`;

CREATE TABLE `homework` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `class_id` int(11) NOT NULL,
  `section_id` int(11) NOT NULL,
  `session_id` int(10) NOT NULL,
  `homework_date` date NOT NULL,
  `submit_date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `subject_group_subject_id` int(11) DEFAULT NULL,
  `subject_id` int(11) NOT NULL,
  `description` text,
  `create_date` date NOT NULL,
  `evaluation_date` date NOT NULL,
  `document` varchar(200) NOT NULL,
  `created_by` int(11) NOT NULL,
  `evaluated_by` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_group_subject_id` (`subject_group_subject_id`),
  CONSTRAINT `homework_ibfk_1` FOREIGN KEY (`subject_group_subject_id`) REFERENCES `subject_group_subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: homework_evaluation
#

DROP TABLE IF EXISTS `homework_evaluation`;

CREATE TABLE `homework_evaluation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `homework_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `date` date NOT NULL,
  `status` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hostel
#

DROP TABLE IF EXISTS `hostel`;

CREATE TABLE `hostel` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_name` varchar(100) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `address` text,
  `intake` int(11) DEFAULT NULL,
  `description` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: hostel_rooms
#

DROP TABLE IF EXISTS `hostel_rooms`;

CREATE TABLE `hostel_rooms` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `hostel_id` int(11) DEFAULT NULL,
  `room_type_id` int(11) DEFAULT NULL,
  `room_no` varchar(200) DEFAULT NULL,
  `no_of_bed` int(11) DEFAULT NULL,
  `cost_per_bed` float(10,2) DEFAULT '0.00',
  `title` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: id_card
#

DROP TABLE IF EXISTS `id_card`;

CREATE TABLE `id_card` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(100) NOT NULL,
  `school_name` varchar(100) NOT NULL,
  `school_address` varchar(500) NOT NULL,
  `background` varchar(100) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `sign_image` varchar(100) NOT NULL,
  `header_color` varchar(100) NOT NULL,
  `enable_admission_no` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_student_name` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_class` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_fathers_name` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_mothers_name` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_address` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_phone` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_dob` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `enable_blood_group` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  `status` tinyint(1) NOT NULL COMMENT '0=disable,1=enable',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `id_card` (`id`, `title`, `school_name`, `school_address`, `background`, `logo`, `sign_image`, `header_color`, `enable_admission_no`, `enable_student_name`, `enable_class`, `enable_fathers_name`, `enable_mothers_name`, `enable_address`, `enable_phone`, `enable_dob`, `enable_blood_group`, `status`) VALUES (1, 'Sample Student Identity Card', 'Mount Carmel School', '110 Kings Street, CA  Phone: 456542 Email: mount@gmail.com', 'samplebackground12.png', 'samplelogo12.png', 'samplesign12.png', '#595959', 1, 1, 1, 1, 0, 1, 1, 1, 1, 1);


#
# TABLE STRUCTURE FOR: income
#

DROP TABLE IF EXISTS `income`;

CREATE TABLE `income` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `inc_head_id` varchar(11) DEFAULT NULL,
  `name` varchar(50) DEFAULT NULL,
  `invoice_no` varchar(200) NOT NULL,
  `date` date DEFAULT NULL,
  `amount` float DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'yes',
  `is_deleted` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `documents` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: income_head
#

DROP TABLE IF EXISTS `income_head`;

CREATE TABLE `income_head` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `income_category` varchar(255) DEFAULT NULL,
  `description` varchar(255) DEFAULT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT 'yes',
  `is_deleted` varchar(255) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (1, 'Admission Fee', '', 'yes', 'no', '2021-09-30 10:16:24', NULL);
INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (2, 'Tuition Fee', '', 'yes', 'no', '2021-09-30 10:16:33', NULL);
INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (3, 'Laboratory Fee', '', 'yes', 'no', '2021-09-30 10:16:44', NULL);
INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (4, 'Library Fee', '', 'yes', 'no', '2021-09-30 10:16:54', NULL);
INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (5, 'Computer Lab Fee', '', 'yes', 'no', '2021-09-30 10:17:15', NULL);
INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (6, 'Transport Fee', '', 'yes', 'no', '2021-09-30 10:17:24', NULL);
INSERT INTO `income_head` (`id`, `income_category`, `description`, `is_active`, `is_deleted`, `created_at`, `updated_at`) VALUES (7, 'Hostel Fee', '', 'yes', 'no', '2021-09-30 10:17:32', NULL);


#
# TABLE STRUCTURE FOR: item
#

DROP TABLE IF EXISTS `item`;

CREATE TABLE `item` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_category_id` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `unit` varchar(100) NOT NULL,
  `item_photo` varchar(225) DEFAULT NULL,
  `description` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  `item_store_id` int(11) DEFAULT NULL,
  `item_supplier_id` int(11) DEFAULT NULL,
  `quantity` int(100) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: item_category
#

DROP TABLE IF EXISTS `item_category`;

CREATE TABLE `item_category` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `item_category` varchar(255) NOT NULL,
  `is_active` varchar(255) NOT NULL DEFAULT 'yes',
  `description` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: item_issue
#

DROP TABLE IF EXISTS `item_issue`;

CREATE TABLE `item_issue` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `issue_type` varchar(15) DEFAULT NULL,
  `issue_to` varchar(100) DEFAULT NULL,
  `issue_by` varchar(100) DEFAULT NULL,
  `issue_date` date DEFAULT NULL,
  `return_date` date DEFAULT NULL,
  `item_category_id` int(11) DEFAULT NULL,
  `item_id` int(11) DEFAULT NULL,
  `quantity` int(10) NOT NULL,
  `note` text NOT NULL,
  `is_returned` int(2) NOT NULL DEFAULT '1',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `is_active` varchar(10) DEFAULT 'no',
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `item_category_id` (`item_category_id`),
  CONSTRAINT `item_issue_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `item_issue_ibfk_2` FOREIGN KEY (`item_category_id`) REFERENCES `item_category` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: item_stock
#

DROP TABLE IF EXISTS `item_stock`;

CREATE TABLE `item_stock` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `item_id` int(11) DEFAULT NULL,
  `supplier_id` int(11) DEFAULT NULL,
  `symbol` varchar(10) NOT NULL DEFAULT '+',
  `store_id` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `purchase_price` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `attachment` varchar(250) DEFAULT NULL,
  `description` text NOT NULL,
  `is_active` varchar(10) DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `item_id` (`item_id`),
  KEY `supplier_id` (`supplier_id`),
  KEY `store_id` (`store_id`),
  CONSTRAINT `item_stock_ibfk_1` FOREIGN KEY (`item_id`) REFERENCES `item` (`id`) ON DELETE CASCADE,
  CONSTRAINT `item_stock_ibfk_2` FOREIGN KEY (`supplier_id`) REFERENCES `item_supplier` (`id`) ON DELETE CASCADE,
  CONSTRAINT `item_stock_ibfk_3` FOREIGN KEY (`store_id`) REFERENCES `item_store` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: item_store
#

DROP TABLE IF EXISTS `item_store`;

CREATE TABLE `item_store` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `item_store` varchar(255) NOT NULL,
  `code` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: item_supplier
#

DROP TABLE IF EXISTS `item_supplier`;

CREATE TABLE `item_supplier` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `item_supplier` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `contact_person_name` varchar(255) NOT NULL,
  `contact_person_phone` varchar(255) NOT NULL,
  `contact_person_email` varchar(255) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: languages
#

DROP TABLE IF EXISTS `languages`;

CREATE TABLE `languages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `language` varchar(50) DEFAULT NULL,
  `short_code` varchar(255) NOT NULL,
  `country_code` varchar(255) NOT NULL,
  `is_deleted` varchar(10) NOT NULL DEFAULT 'yes',
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=92 DEFAULT CHARSET=utf8;

INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Azerbaijan', 'az', 'az', 'no', 'no', '2019-11-20 04:23:12', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Albanian', 'sq', 'al', 'no', 'no', '2019-11-20 04:42:42', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Amharic', 'am', 'am', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'English', 'en', 'us', 'no', 'no', '2019-11-20 04:38:50', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Arabic', 'ar', 'sa', 'no', 'no', '2019-11-20 04:47:28', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (7, 'Afrikaans', 'af', 'af', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (8, 'Basque', 'eu', 'es', 'no', 'no', '2019-11-20 04:54:10', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (11, 'Bengali', 'bn', 'in', 'no', 'no', '2019-11-20 04:41:53', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (13, 'Bosnian', 'bs', 'bs', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (14, 'Welsh', 'cy', 'cy', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (15, 'Hungarian', 'hu', 'hu', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (16, 'Vietnamese', 'vi', 'vi', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (17, 'Haitian (Creole)', 'ht', 'ht', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (18, 'Galician', 'gl', 'gl', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (19, 'Dutch', 'nl', 'nl', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (21, 'Greek', 'el', 'gr', 'no', 'no', '2019-11-20 05:12:08', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (22, 'Georgian', 'ka', 'ge', 'no', 'no', '2019-11-20 05:11:40', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (23, 'Gujarati', 'gu', 'in', 'no', 'no', '2019-11-20 04:39:16', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (24, 'Danish', 'da', 'dk', 'no', 'no', '2019-11-20 05:03:25', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (25, 'Hebrew', 'he', 'il', 'no', 'no', '2019-11-20 05:13:50', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (26, 'Yiddish', 'yi', 'il', 'no', 'no', '2019-11-20 05:25:33', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (27, 'Indonesian', 'id', 'id', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (28, 'Irish', 'ga', 'ga', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (29, 'Italian', 'it', 'it', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (30, 'Icelandic', 'is', 'is', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (31, 'Spanish', 'es', 'es', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (33, 'Kannada', 'kn', 'kn', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (34, 'Catalan', 'ca', 'ca', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (36, 'Chinese', 'zh', 'cn', 'no', 'no', '2019-11-20 05:01:48', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (37, 'Korean', 'ko', 'kr', 'no', 'no', '2019-11-20 05:19:09', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (38, 'Xhosa', 'xh', 'ls', 'no', 'no', '2019-11-20 05:24:39', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (39, 'Latin', 'la', 'la', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (40, 'Latvian', 'lv', 'lv', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (41, 'Lithuanian', 'lt', 'lt', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (43, 'Malagasy', 'mg', 'mg', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (44, 'Malay', 'ms', 'ms', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (45, 'Malayalam', 'ml', 'ml', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (46, 'Maltese', 'mt', 'mt', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (47, 'Macedonian', 'mk', 'mk', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (48, 'Maori', 'mi', 'nz', 'no', 'no', '2019-11-20 05:20:27', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (49, 'Marathi', 'mr', 'in', 'no', 'no', '2019-11-20 04:39:51', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (51, 'Mongolian', 'mn', 'mn', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (52, 'German', 'de', 'de', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (53, 'Nepali', 'ne', 'ne', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (54, 'Norwegian', 'no', 'no', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (55, 'Punjabi', 'pa', 'in', 'no', 'no', '2019-11-20 04:40:16', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (57, 'Persian', 'fa', 'ir', 'no', 'no', '2019-11-20 05:21:17', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (59, 'Portuguese', 'pt', 'pt', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (60, 'Romanian', 'ro', 'ro', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (61, 'Russian', 'ru', 'ru', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (62, 'Cebuano', 'ceb', 'ph', 'no', 'no', '2019-11-20 04:59:12', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (64, 'Sinhala', 'si', 'si', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (65, 'Slovakian', 'sk', 'sk', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (66, 'Slovenian', 'sl', 'sl', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (67, 'Swahili', 'sw', 'ke', 'no', 'no', '2019-11-20 05:21:57', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (68, 'Sundanese', 'su', 'sd', 'no', 'no', '2019-12-03 04:06:57', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (70, 'Thai', 'th', 'th', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (71, 'Tagalog', 'tl', 'tl', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (72, 'Tamil', 'ta', 'in', 'no', 'no', '2019-11-20 04:40:53', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (74, 'Telugu', 'te', 'in', 'no', 'no', '2019-11-20 04:41:15', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (75, 'Turkish', 'tr', 'tr', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (77, 'Uzbek', 'uz', 'uz', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (79, 'Urdu', 'ur', 'pk', 'no', 'no', '2019-11-20 05:23:57', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (80, 'Finnish', 'fi', 'fi', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (81, 'French', 'fr', 'fr', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (82, 'Hindi', 'hi', 'in', 'no', 'no', '2019-11-20 04:36:34', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (84, 'Czech', 'cs', 'cz', 'no', 'no', '2019-11-20 05:02:36', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (85, 'Swedish', 'sv', 'sv', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (86, 'Scottish', 'gd', 'gd', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (87, 'Estonian', 'et', 'et', 'no', 'no', '2019-11-20 04:24:23', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (88, 'Esperanto', 'eo', 'br', 'no', 'no', '2019-11-20 21:49:18', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (89, 'Javanese', 'jv', 'id', 'no', 'no', '2019-11-20 05:18:29', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (90, 'Japanese', 'ja', 'jp', 'no', 'no', '2019-11-20 05:14:39', '0000-00-00');
INSERT INTO `languages` (`id`, `language`, `short_code`, `country_code`, `is_deleted`, `is_active`, `created_at`, `updated_at`) VALUES (91, 'Polish', 'pl', 'pl', 'no', 'no', '2020-06-14 20:25:27', NULL);


#
# TABLE STRUCTURE FOR: leave_types
#

DROP TABLE IF EXISTS `leave_types`;

CREATE TABLE `leave_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `type` (`type`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (1, 'Sick Leave', 'yes');
INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (2, 'Leave', 'yes');
INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (3, 'Holidays Leave', 'yes');
INSERT INTO `leave_types` (`id`, `type`, `is_active`) VALUES (4, 'Absent', 'yes');


#
# TABLE STRUCTURE FOR: lesson
#

DROP TABLE IF EXISTS `lesson`;

CREATE TABLE `lesson` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `subject_group_subject_id` int(11) NOT NULL,
  `subject_group_class_sections_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `subject_group_subject_id` (`subject_group_subject_id`),
  KEY `subject_group_class_sections_id` (`subject_group_class_sections_id`),
  CONSTRAINT `lesson_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lesson_ibfk_2` FOREIGN KEY (`subject_group_subject_id`) REFERENCES `subject_group_subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `lesson_ibfk_3` FOREIGN KEY (`subject_group_class_sections_id`) REFERENCES `subject_group_class_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `lesson` (`id`, `session_id`, `subject_group_subject_id`, `subject_group_class_sections_id`, `name`, `created_at`) VALUES (1, 15, 2, 1, 'Physics', '2021-10-04 10:50:29');


#
# TABLE STRUCTURE FOR: libarary_members
#

DROP TABLE IF EXISTS `libarary_members`;

CREATE TABLE `libarary_members` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `library_card_no` varchar(50) DEFAULT NULL,
  `member_type` varchar(50) DEFAULT NULL,
  `member_id` int(11) DEFAULT NULL,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: logs
#

DROP TABLE IF EXISTS `logs`;

CREATE TABLE `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `message` text,
  `record_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `action` varchar(50) DEFAULT NULL,
  `ip_address` varchar(50) DEFAULT NULL,
  `platform` varchar(50) DEFAULT NULL,
  `agent` varchar(50) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=990 DEFAULT CHARSET=utf8;

INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (1, 'Record updated On settings id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-27 13:36:37', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (2, 'Record updated On settings id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-27 13:37:30', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (3, 'Record updated On settings id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-27 13:40:57', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (4, 'New Record inserted On roles id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 07:47:07', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (5, 'New Record inserted On roles id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 07:47:20', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (6, 'New Record inserted On roles id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 07:47:27', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (7, 'New Record inserted On roles id 11', 11, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 07:47:56', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (8, 'New Record inserted On sections id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:53:29', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (9, 'New Record inserted On sections id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:53:38', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (10, 'New Record inserted On sections id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:53:47', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (11, 'New Record inserted On sections id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:53:59', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (12, 'New Record inserted On sections id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:54:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (13, 'New Record inserted On sections id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:54:21', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (14, 'New Record inserted On subject groups id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:54:42', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (15, 'Record updated On classes id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:55:16', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (16, 'New Record inserted On subject groups id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:55:27', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (17, 'New Record inserted On subject groups id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 08:55:37', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (18, 'New Record inserted On students id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (19, 'New Record inserted On  student session id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (20, 'New Record inserted On users id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (21, 'New Record inserted On users id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (22, 'Record updated On students id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (23, 'New Record inserted On students id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (24, 'New Record inserted On  student session id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (25, 'New Record inserted On users id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (26, 'New Record inserted On users id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (27, 'Record updated On students id 2', 2, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (28, 'New Record inserted On students id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (29, 'New Record inserted On  student session id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (30, 'New Record inserted On users id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (31, 'New Record inserted On users id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (32, 'Record updated On students id 3', 3, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (33, 'New Record inserted On students id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (34, 'New Record inserted On  student session id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (35, 'New Record inserted On users id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (36, 'New Record inserted On users id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (37, 'Record updated On students id 4', 4, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (38, 'New Record inserted On students id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (39, 'New Record inserted On  student session id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (40, 'New Record inserted On users id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (41, 'New Record inserted On users id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (42, 'Record updated On students id 5', 5, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (43, 'New Record inserted On students id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (44, 'New Record inserted On  student session id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (45, 'New Record inserted On users id 11', 11, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (46, 'New Record inserted On users id 12', 12, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (47, 'Record updated On students id 6', 6, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (48, 'New Record inserted On students id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (49, 'New Record inserted On  student session id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (50, 'New Record inserted On users id 13', 13, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (51, 'New Record inserted On users id 14', 14, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (52, 'Record updated On students id 7', 7, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (53, 'New Record inserted On students id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (54, 'New Record inserted On  student session id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (55, 'New Record inserted On users id 15', 15, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (56, 'New Record inserted On users id 16', 16, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (57, 'Record updated On students id 8', 8, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (58, 'New Record inserted On students id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (59, 'New Record inserted On  student session id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (60, 'New Record inserted On users id 17', 17, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (61, 'New Record inserted On users id 18', 18, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (62, 'Record updated On students id 9', 9, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (63, 'New Record inserted On students id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (64, 'New Record inserted On  student session id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (65, 'New Record inserted On users id 19', 19, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (66, 'New Record inserted On users id 20', 20, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (67, 'Record updated On students id 10', 10, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (68, 'New Record inserted On students id 11', 11, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (69, 'New Record inserted On  student session id 11', 11, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (70, 'New Record inserted On users id 21', 21, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (71, 'New Record inserted On users id 22', 22, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (72, 'Record updated On students id 11', 11, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (73, 'New Record inserted On students id 12', 12, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (74, 'New Record inserted On  student session id 12', 12, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (75, 'New Record inserted On users id 23', 23, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (76, 'New Record inserted On users id 24', 24, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (77, 'Record updated On students id 12', 12, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (78, 'New Record inserted On students id 13', 13, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (79, 'New Record inserted On  student session id 13', 13, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (80, 'New Record inserted On users id 25', 25, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (81, 'New Record inserted On users id 26', 26, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (82, 'Record updated On students id 13', 13, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (83, 'New Record inserted On students id 14', 14, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (84, 'New Record inserted On  student session id 14', 14, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (85, 'New Record inserted On users id 27', 27, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (86, 'New Record inserted On users id 28', 28, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (87, 'Record updated On students id 14', 14, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (88, 'New Record inserted On students id 15', 15, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (89, 'New Record inserted On  student session id 15', 15, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (90, 'New Record inserted On users id 29', 29, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (91, 'New Record inserted On users id 30', 30, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (92, 'Record updated On students id 15', 15, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (93, 'New Record inserted On students id 16', 16, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (94, 'New Record inserted On  student session id 16', 16, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (95, 'New Record inserted On users id 31', 31, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (96, 'New Record inserted On users id 32', 32, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (97, 'Record updated On students id 16', 16, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (98, 'New Record inserted On students id 17', 17, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (99, 'New Record inserted On  student session id 17', 17, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (100, 'New Record inserted On users id 33', 33, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (101, 'New Record inserted On users id 34', 34, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (102, 'Record updated On students id 17', 17, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (103, 'New Record inserted On students id 18', 18, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (104, 'New Record inserted On  student session id 18', 18, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (105, 'New Record inserted On users id 35', 35, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (106, 'New Record inserted On users id 36', 36, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (107, 'Record updated On students id 18', 18, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (108, 'New Record inserted On students id 19', 19, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (109, 'New Record inserted On  student session id 19', 19, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (110, 'New Record inserted On users id 37', 37, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (111, 'New Record inserted On users id 38', 38, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (112, 'Record updated On students id 19', 19, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (113, 'New Record inserted On students id 20', 20, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (114, 'New Record inserted On  student session id 20', 20, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (115, 'New Record inserted On users id 39', 39, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (116, 'New Record inserted On users id 40', 40, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (117, 'Record updated On students id 20', 20, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (118, 'New Record inserted On students id 21', 21, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (119, 'New Record inserted On  student session id 21', 21, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (120, 'New Record inserted On users id 41', 41, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (121, 'New Record inserted On users id 42', 42, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (122, 'Record updated On students id 21', 21, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (123, 'New Record inserted On students id 22', 22, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (124, 'New Record inserted On  student session id 22', 22, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (125, 'New Record inserted On users id 43', 43, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (126, 'New Record inserted On users id 44', 44, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (127, 'Record updated On students id 22', 22, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (128, 'New Record inserted On students id 23', 23, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (129, 'New Record inserted On  student session id 23', 23, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (130, 'New Record inserted On users id 45', 45, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (131, 'New Record inserted On users id 46', 46, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (132, 'Record updated On students id 23', 23, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (133, 'New Record inserted On students id 24', 24, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (134, 'New Record inserted On  student session id 24', 24, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (135, 'New Record inserted On users id 47', 47, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (136, 'New Record inserted On users id 48', 48, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (137, 'Record updated On students id 24', 24, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:14', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (138, 'New Record inserted On students id 25', 25, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (139, 'New Record inserted On  student session id 25', 25, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (140, 'New Record inserted On users id 49', 49, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (141, 'New Record inserted On users id 50', 50, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (142, 'Record updated On students id 25', 25, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (143, 'New Record inserted On students id 26', 26, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (144, 'New Record inserted On  student session id 26', 26, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (145, 'New Record inserted On users id 51', 51, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (146, 'New Record inserted On users id 52', 52, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (147, 'Record updated On students id 26', 26, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (148, 'New Record inserted On students id 27', 27, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (149, 'New Record inserted On  student session id 27', 27, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (150, 'New Record inserted On users id 53', 53, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (151, 'New Record inserted On users id 54', 54, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (152, 'Record updated On students id 27', 27, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (153, 'New Record inserted On students id 28', 28, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (154, 'New Record inserted On  student session id 28', 28, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (155, 'New Record inserted On users id 55', 55, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (156, 'New Record inserted On users id 56', 56, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (157, 'Record updated On students id 28', 28, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (158, 'New Record inserted On students id 29', 29, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (159, 'New Record inserted On  student session id 29', 29, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (160, 'New Record inserted On users id 57', 57, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (161, 'New Record inserted On users id 58', 58, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (162, 'Record updated On students id 29', 29, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (163, 'New Record inserted On students id 30', 30, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (164, 'New Record inserted On  student session id 30', 30, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (165, 'New Record inserted On users id 59', 59, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (166, 'New Record inserted On users id 60', 60, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (167, 'Record updated On students id 30', 30, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (168, 'New Record inserted On students id 31', 31, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (169, 'New Record inserted On  student session id 31', 31, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (170, 'New Record inserted On users id 61', 61, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (171, 'New Record inserted On users id 62', 62, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (172, 'Record updated On students id 31', 31, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (173, 'New Record inserted On students id 32', 32, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (174, 'New Record inserted On  student session id 32', 32, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (175, 'New Record inserted On users id 63', 63, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (176, 'New Record inserted On users id 64', 64, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (177, 'Record updated On students id 32', 32, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (178, 'New Record inserted On students id 33', 33, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (179, 'New Record inserted On  student session id 33', 33, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (180, 'New Record inserted On users id 65', 65, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (181, 'New Record inserted On users id 66', 66, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (182, 'Record updated On students id 33', 33, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (183, 'New Record inserted On students id 34', 34, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (184, 'New Record inserted On  student session id 34', 34, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (185, 'New Record inserted On users id 67', 67, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (186, 'New Record inserted On users id 68', 68, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (187, 'Record updated On students id 34', 34, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (188, 'New Record inserted On students id 35', 35, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (189, 'New Record inserted On  student session id 35', 35, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (190, 'New Record inserted On users id 69', 69, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (191, 'New Record inserted On users id 70', 70, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (192, 'Record updated On students id 35', 35, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (193, 'New Record inserted On students id 36', 36, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (194, 'New Record inserted On  student session id 36', 36, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (195, 'New Record inserted On users id 71', 71, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (196, 'New Record inserted On users id 72', 72, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (197, 'Record updated On students id 36', 36, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (198, 'New Record inserted On students id 37', 37, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (199, 'New Record inserted On  student session id 37', 37, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (200, 'New Record inserted On users id 73', 73, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (201, 'New Record inserted On users id 74', 74, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (202, 'Record updated On students id 37', 37, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (203, 'New Record inserted On students id 38', 38, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (204, 'New Record inserted On  student session id 38', 38, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (205, 'New Record inserted On users id 75', 75, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (206, 'New Record inserted On users id 76', 76, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (207, 'Record updated On students id 38', 38, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (208, 'New Record inserted On students id 39', 39, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (209, 'New Record inserted On  student session id 39', 39, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (210, 'New Record inserted On users id 77', 77, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (211, 'New Record inserted On users id 78', 78, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (212, 'Record updated On students id 39', 39, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (213, 'New Record inserted On students id 40', 40, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (214, 'New Record inserted On  student session id 40', 40, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (215, 'New Record inserted On users id 79', 79, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (216, 'New Record inserted On users id 80', 80, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (217, 'Record updated On students id 40', 40, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (218, 'New Record inserted On students id 41', 41, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (219, 'New Record inserted On  student session id 41', 41, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (220, 'New Record inserted On users id 81', 81, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (221, 'New Record inserted On users id 82', 82, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (222, 'Record updated On students id 41', 41, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (223, 'New Record inserted On students id 42', 42, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (224, 'New Record inserted On  student session id 42', 42, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (225, 'New Record inserted On users id 83', 83, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (226, 'New Record inserted On users id 84', 84, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (227, 'Record updated On students id 42', 42, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (228, 'New Record inserted On students id 43', 43, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (229, 'New Record inserted On  student session id 43', 43, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (230, 'New Record inserted On users id 85', 85, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (231, 'New Record inserted On users id 86', 86, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (232, 'Record updated On students id 43', 43, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (233, 'New Record inserted On students id 44', 44, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (234, 'New Record inserted On  student session id 44', 44, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (235, 'New Record inserted On users id 87', 87, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (236, 'New Record inserted On users id 88', 88, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (237, 'Record updated On students id 44', 44, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (238, 'New Record inserted On students id 45', 45, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (239, 'New Record inserted On  student session id 45', 45, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (240, 'New Record inserted On users id 89', 89, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (241, 'New Record inserted On users id 90', 90, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (242, 'Record updated On students id 45', 45, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (243, 'New Record inserted On students id 46', 46, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (244, 'New Record inserted On  student session id 46', 46, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (245, 'New Record inserted On users id 91', 91, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (246, 'New Record inserted On users id 92', 92, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (247, 'Record updated On students id 46', 46, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (248, 'New Record inserted On students id 47', 47, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (249, 'New Record inserted On  student session id 47', 47, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (250, 'New Record inserted On users id 93', 93, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (251, 'New Record inserted On users id 94', 94, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (252, 'Record updated On students id 47', 47, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (253, 'New Record inserted On students id 48', 48, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (254, 'New Record inserted On  student session id 48', 48, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (255, 'New Record inserted On users id 95', 95, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (256, 'New Record inserted On users id 96', 96, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (257, 'Record updated On students id 48', 48, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (258, 'New Record inserted On students id 49', 49, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (259, 'New Record inserted On  student session id 49', 49, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (260, 'New Record inserted On users id 97', 97, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (261, 'New Record inserted On users id 98', 98, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (262, 'Record updated On students id 49', 49, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (263, 'New Record inserted On students id 50', 50, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (264, 'New Record inserted On  student session id 50', 50, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (265, 'New Record inserted On users id 99', 99, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (266, 'New Record inserted On users id 100', 100, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (267, 'Record updated On students id 50', 50, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (268, 'New Record inserted On students id 51', 51, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (269, 'New Record inserted On  student session id 51', 51, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (270, 'New Record inserted On users id 101', 101, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (271, 'New Record inserted On users id 102', 102, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (272, 'Record updated On students id 51', 51, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (273, 'New Record inserted On students id 52', 52, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (274, 'New Record inserted On  student session id 52', 52, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (275, 'New Record inserted On users id 103', 103, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (276, 'New Record inserted On users id 104', 104, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (277, 'Record updated On students id 52', 52, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (278, 'New Record inserted On students id 53', 53, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (279, 'New Record inserted On  student session id 53', 53, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (280, 'New Record inserted On users id 105', 105, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (281, 'New Record inserted On users id 106', 106, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (282, 'Record updated On students id 53', 53, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (283, 'New Record inserted On students id 54', 54, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (284, 'New Record inserted On  student session id 54', 54, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (285, 'New Record inserted On users id 107', 107, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (286, 'New Record inserted On users id 108', 108, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (287, 'Record updated On students id 54', 54, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (288, 'New Record inserted On students id 55', 55, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (289, 'New Record inserted On  student session id 55', 55, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (290, 'New Record inserted On users id 109', 109, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (291, 'New Record inserted On users id 110', 110, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (292, 'Record updated On students id 55', 55, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (293, 'New Record inserted On students id 56', 56, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (294, 'New Record inserted On  student session id 56', 56, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (295, 'New Record inserted On users id 111', 111, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (296, 'New Record inserted On users id 112', 112, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (297, 'Record updated On students id 56', 56, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (298, 'New Record inserted On students id 57', 57, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (299, 'New Record inserted On  student session id 57', 57, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (300, 'New Record inserted On users id 113', 113, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (301, 'New Record inserted On users id 114', 114, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (302, 'Record updated On students id 57', 57, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (303, 'New Record inserted On students id 58', 58, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (304, 'New Record inserted On  student session id 58', 58, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (305, 'New Record inserted On users id 115', 115, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (306, 'New Record inserted On users id 116', 116, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (307, 'Record updated On students id 58', 58, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (308, 'New Record inserted On students id 59', 59, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (309, 'New Record inserted On  student session id 59', 59, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (310, 'New Record inserted On users id 117', 117, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (311, 'New Record inserted On users id 118', 118, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (312, 'Record updated On students id 59', 59, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (313, 'New Record inserted On students id 60', 60, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (314, 'New Record inserted On  student session id 60', 60, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (315, 'New Record inserted On users id 119', 119, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (316, 'New Record inserted On users id 120', 120, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (317, 'Record updated On students id 60', 60, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (318, 'New Record inserted On students id 61', 61, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (319, 'New Record inserted On  student session id 61', 61, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (320, 'New Record inserted On users id 121', 121, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (321, 'New Record inserted On users id 122', 122, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (322, 'Record updated On students id 61', 61, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (323, 'New Record inserted On students id 62', 62, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (324, 'New Record inserted On  student session id 62', 62, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (325, 'New Record inserted On users id 123', 123, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (326, 'New Record inserted On users id 124', 124, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (327, 'Record updated On students id 62', 62, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (328, 'New Record inserted On students id 63', 63, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (329, 'New Record inserted On  student session id 63', 63, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (330, 'New Record inserted On users id 125', 125, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (331, 'New Record inserted On users id 126', 126, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (332, 'Record updated On students id 63', 63, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (333, 'New Record inserted On students id 64', 64, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (334, 'New Record inserted On  student session id 64', 64, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (335, 'New Record inserted On users id 127', 127, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (336, 'New Record inserted On users id 128', 128, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (337, 'Record updated On students id 64', 64, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (338, 'New Record inserted On students id 65', 65, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (339, 'New Record inserted On  student session id 65', 65, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (340, 'New Record inserted On users id 129', 129, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (341, 'New Record inserted On users id 130', 130, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (342, 'Record updated On students id 65', 65, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (343, 'New Record inserted On students id 66', 66, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (344, 'New Record inserted On  student session id 66', 66, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (345, 'New Record inserted On users id 131', 131, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (346, 'New Record inserted On users id 132', 132, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (347, 'Record updated On students id 66', 66, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (348, 'New Record inserted On students id 67', 67, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (349, 'New Record inserted On  student session id 67', 67, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (350, 'New Record inserted On users id 133', 133, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (351, 'New Record inserted On users id 134', 134, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (352, 'Record updated On students id 67', 67, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (353, 'New Record inserted On students id 68', 68, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (354, 'New Record inserted On  student session id 68', 68, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (355, 'New Record inserted On users id 135', 135, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (356, 'New Record inserted On users id 136', 136, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (357, 'Record updated On students id 68', 68, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (358, 'New Record inserted On students id 69', 69, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (359, 'New Record inserted On  student session id 69', 69, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (360, 'New Record inserted On users id 137', 137, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (361, 'New Record inserted On users id 138', 138, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (362, 'Record updated On students id 69', 69, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (363, 'New Record inserted On students id 70', 70, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (364, 'New Record inserted On  student session id 70', 70, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (365, 'New Record inserted On users id 139', 139, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (366, 'New Record inserted On users id 140', 140, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (367, 'Record updated On students id 70', 70, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (368, 'New Record inserted On students id 71', 71, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (369, 'New Record inserted On  student session id 71', 71, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (370, 'New Record inserted On users id 141', 141, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (371, 'New Record inserted On users id 142', 142, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (372, 'Record updated On students id 71', 71, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (373, 'New Record inserted On students id 72', 72, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (374, 'New Record inserted On  student session id 72', 72, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (375, 'New Record inserted On users id 143', 143, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (376, 'New Record inserted On users id 144', 144, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (377, 'Record updated On students id 72', 72, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (378, 'New Record inserted On students id 73', 73, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (379, 'New Record inserted On  student session id 73', 73, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (380, 'New Record inserted On users id 145', 145, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (381, 'New Record inserted On users id 146', 146, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (382, 'Record updated On students id 73', 73, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (383, 'New Record inserted On students id 74', 74, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (384, 'New Record inserted On  student session id 74', 74, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (385, 'New Record inserted On users id 147', 147, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (386, 'New Record inserted On users id 148', 148, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (387, 'Record updated On students id 74', 74, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:02:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (388, 'New Record inserted On students id 75', 75, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (389, 'New Record inserted On  student session id 75', 75, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (390, 'New Record inserted On users id 149', 149, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (391, 'New Record inserted On users id 150', 150, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (392, 'Record updated On students id 75', 75, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (393, 'New Record inserted On students id 76', 76, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (394, 'New Record inserted On  student session id 76', 76, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (395, 'New Record inserted On users id 151', 151, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (396, 'New Record inserted On users id 152', 152, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (397, 'Record updated On students id 76', 76, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (398, 'New Record inserted On students id 77', 77, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (399, 'New Record inserted On  student session id 77', 77, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (400, 'New Record inserted On users id 153', 153, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (401, 'New Record inserted On users id 154', 154, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (402, 'Record updated On students id 77', 77, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (403, 'New Record inserted On students id 78', 78, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (404, 'New Record inserted On  student session id 78', 78, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (405, 'New Record inserted On users id 155', 155, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (406, 'New Record inserted On users id 156', 156, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (407, 'Record updated On students id 78', 78, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (408, 'New Record inserted On students id 79', 79, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (409, 'New Record inserted On  student session id 79', 79, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (410, 'New Record inserted On users id 157', 157, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (411, 'New Record inserted On users id 158', 158, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (412, 'Record updated On students id 79', 79, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (413, 'New Record inserted On students id 80', 80, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (414, 'New Record inserted On  student session id 80', 80, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (415, 'New Record inserted On users id 159', 159, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (416, 'New Record inserted On users id 160', 160, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (417, 'Record updated On students id 80', 80, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (418, 'New Record inserted On students id 81', 81, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (419, 'New Record inserted On  student session id 81', 81, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (420, 'New Record inserted On users id 161', 161, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (421, 'New Record inserted On users id 162', 162, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (422, 'Record updated On students id 81', 81, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (423, 'New Record inserted On students id 82', 82, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (424, 'New Record inserted On  student session id 82', 82, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (425, 'New Record inserted On users id 163', 163, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (426, 'New Record inserted On users id 164', 164, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (427, 'Record updated On students id 82', 82, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (428, 'New Record inserted On students id 83', 83, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (429, 'New Record inserted On  student session id 83', 83, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (430, 'New Record inserted On users id 165', 165, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (431, 'New Record inserted On users id 166', 166, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (432, 'Record updated On students id 83', 83, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (433, 'New Record inserted On students id 84', 84, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (434, 'New Record inserted On  student session id 84', 84, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (435, 'New Record inserted On users id 167', 167, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (436, 'New Record inserted On users id 168', 168, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (437, 'Record updated On students id 84', 84, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (438, 'New Record inserted On students id 85', 85, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (439, 'New Record inserted On  student session id 85', 85, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (440, 'New Record inserted On users id 169', 169, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (441, 'New Record inserted On users id 170', 170, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (442, 'Record updated On students id 85', 85, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (443, 'New Record inserted On students id 86', 86, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (444, 'New Record inserted On  student session id 86', 86, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (445, 'New Record inserted On users id 171', 171, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (446, 'New Record inserted On users id 172', 172, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (447, 'Record updated On students id 86', 86, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (448, 'New Record inserted On students id 87', 87, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (449, 'New Record inserted On  student session id 87', 87, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (450, 'New Record inserted On users id 173', 173, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (451, 'New Record inserted On users id 174', 174, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (452, 'Record updated On students id 87', 87, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (453, 'New Record inserted On students id 88', 88, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (454, 'New Record inserted On  student session id 88', 88, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (455, 'New Record inserted On users id 175', 175, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (456, 'New Record inserted On users id 176', 176, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (457, 'Record updated On students id 88', 88, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (458, 'New Record inserted On students id 89', 89, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (459, 'New Record inserted On  student session id 89', 89, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (460, 'New Record inserted On users id 177', 177, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (461, 'New Record inserted On users id 178', 178, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (462, 'Record updated On students id 89', 89, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (463, 'New Record inserted On students id 90', 90, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (464, 'New Record inserted On  student session id 90', 90, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (465, 'New Record inserted On users id 179', 179, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (466, 'New Record inserted On users id 180', 180, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (467, 'Record updated On students id 90', 90, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (468, 'New Record inserted On students id 91', 91, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (469, 'New Record inserted On  student session id 91', 91, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (470, 'New Record inserted On users id 181', 181, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (471, 'New Record inserted On users id 182', 182, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (472, 'Record updated On students id 91', 91, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (473, 'New Record inserted On students id 92', 92, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (474, 'New Record inserted On  student session id 92', 92, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (475, 'New Record inserted On users id 183', 183, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (476, 'New Record inserted On users id 184', 184, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (477, 'Record updated On students id 92', 92, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (478, 'New Record inserted On students id 93', 93, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (479, 'New Record inserted On  student session id 93', 93, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (480, 'New Record inserted On users id 185', 185, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (481, 'New Record inserted On users id 186', 186, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (482, 'Record updated On students id 93', 93, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (483, 'New Record inserted On students id 94', 94, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (484, 'New Record inserted On  student session id 94', 94, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (485, 'New Record inserted On users id 187', 187, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (486, 'New Record inserted On users id 188', 188, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (487, 'Record updated On students id 94', 94, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (488, 'New Record inserted On students id 95', 95, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (489, 'New Record inserted On  student session id 95', 95, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (490, 'New Record inserted On users id 189', 189, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (491, 'New Record inserted On users id 190', 190, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (492, 'Record updated On students id 95', 95, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (493, 'New Record inserted On students id 96', 96, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (494, 'New Record inserted On  student session id 96', 96, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (495, 'New Record inserted On users id 191', 191, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (496, 'New Record inserted On users id 192', 192, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (497, 'Record updated On students id 96', 96, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (498, 'New Record inserted On students id 97', 97, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (499, 'New Record inserted On  student session id 97', 97, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (500, 'New Record inserted On users id 193', 193, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (501, 'New Record inserted On users id 194', 194, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (502, 'Record updated On students id 97', 97, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (503, 'New Record inserted On students id 98', 98, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (504, 'New Record inserted On  student session id 98', 98, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (505, 'New Record inserted On users id 195', 195, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (506, 'New Record inserted On users id 196', 196, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (507, 'Record updated On students id 98', 98, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (508, 'New Record inserted On students id 99', 99, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (509, 'New Record inserted On  student session id 99', 99, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (510, 'New Record inserted On users id 197', 197, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (511, 'New Record inserted On users id 198', 198, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (512, 'Record updated On students id 99', 99, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (513, 'New Record inserted On students id 100', 100, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (514, 'New Record inserted On  student session id 100', 100, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (515, 'New Record inserted On users id 199', 199, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (516, 'New Record inserted On users id 200', 200, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (517, 'Record updated On students id 100', 100, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (518, 'New Record inserted On students id 101', 101, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (519, 'New Record inserted On  student session id 101', 101, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (520, 'New Record inserted On users id 201', 201, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (521, 'New Record inserted On users id 202', 202, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (522, 'Record updated On students id 101', 101, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (523, 'New Record inserted On students id 102', 102, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (524, 'New Record inserted On  student session id 102', 102, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (525, 'New Record inserted On users id 203', 203, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (526, 'New Record inserted On users id 204', 204, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (527, 'Record updated On students id 102', 102, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (528, 'New Record inserted On students id 103', 103, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (529, 'New Record inserted On  student session id 103', 103, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (530, 'New Record inserted On users id 205', 205, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (531, 'New Record inserted On users id 206', 206, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (532, 'Record updated On students id 103', 103, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (533, 'New Record inserted On students id 104', 104, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (534, 'New Record inserted On  student session id 104', 104, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (535, 'New Record inserted On users id 207', 207, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (536, 'New Record inserted On users id 208', 208, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (537, 'Record updated On students id 104', 104, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (538, 'New Record inserted On students id 105', 105, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (539, 'New Record inserted On  student session id 105', 105, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (540, 'New Record inserted On users id 209', 209, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (541, 'New Record inserted On users id 210', 210, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (542, 'Record updated On students id 105', 105, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (543, 'New Record inserted On students id 106', 106, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (544, 'New Record inserted On  student session id 106', 106, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (545, 'New Record inserted On users id 211', 211, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (546, 'New Record inserted On users id 212', 212, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (547, 'Record updated On students id 106', 106, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (548, 'New Record inserted On students id 107', 107, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (549, 'New Record inserted On  student session id 107', 107, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (550, 'New Record inserted On users id 213', 213, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (551, 'New Record inserted On users id 214', 214, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (552, 'Record updated On students id 107', 107, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (553, 'New Record inserted On students id 108', 108, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (554, 'New Record inserted On  student session id 108', 108, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (555, 'New Record inserted On users id 215', 215, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (556, 'New Record inserted On users id 216', 216, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (557, 'Record updated On students id 108', 108, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (558, 'New Record inserted On students id 109', 109, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (559, 'New Record inserted On  student session id 109', 109, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (560, 'New Record inserted On users id 217', 217, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (561, 'New Record inserted On users id 218', 218, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (562, 'Record updated On students id 109', 109, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (563, 'New Record inserted On students id 110', 110, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (564, 'New Record inserted On  student session id 110', 110, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (565, 'New Record inserted On users id 219', 219, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (566, 'New Record inserted On users id 220', 220, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (567, 'Record updated On students id 110', 110, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (568, 'New Record inserted On students id 111', 111, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (569, 'New Record inserted On  student session id 111', 111, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (570, 'New Record inserted On users id 221', 221, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (571, 'New Record inserted On users id 222', 222, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (572, 'Record updated On students id 111', 111, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (573, 'New Record inserted On students id 112', 112, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (574, 'New Record inserted On  student session id 112', 112, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (575, 'New Record inserted On users id 223', 223, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (576, 'New Record inserted On users id 224', 224, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (577, 'Record updated On students id 112', 112, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (578, 'New Record inserted On students id 113', 113, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (579, 'New Record inserted On  student session id 113', 113, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (580, 'New Record inserted On users id 225', 225, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (581, 'New Record inserted On users id 226', 226, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (582, 'Record updated On students id 113', 113, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (583, 'New Record inserted On students id 114', 114, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (584, 'New Record inserted On  student session id 114', 114, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (585, 'New Record inserted On users id 227', 227, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (586, 'New Record inserted On users id 228', 228, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (587, 'Record updated On students id 114', 114, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (588, 'New Record inserted On students id 115', 115, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (589, 'New Record inserted On  student session id 115', 115, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (590, 'New Record inserted On users id 229', 229, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (591, 'New Record inserted On users id 230', 230, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (592, 'Record updated On students id 115', 115, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (593, 'New Record inserted On students id 116', 116, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (594, 'New Record inserted On  student session id 116', 116, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (595, 'New Record inserted On users id 231', 231, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (596, 'New Record inserted On users id 232', 232, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (597, 'Record updated On students id 116', 116, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (598, 'New Record inserted On students id 117', 117, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (599, 'New Record inserted On  student session id 117', 117, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (600, 'New Record inserted On users id 233', 233, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (601, 'New Record inserted On users id 234', 234, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (602, 'Record updated On students id 117', 117, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (603, 'New Record inserted On students id 118', 118, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (604, 'New Record inserted On  student session id 118', 118, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (605, 'New Record inserted On users id 235', 235, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (606, 'New Record inserted On users id 236', 236, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (607, 'Record updated On students id 118', 118, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (608, 'New Record inserted On students id 119', 119, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (609, 'New Record inserted On  student session id 119', 119, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (610, 'New Record inserted On users id 237', 237, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (611, 'New Record inserted On users id 238', 238, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (612, 'Record updated On students id 119', 119, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (613, 'New Record inserted On students id 120', 120, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (614, 'New Record inserted On  student session id 120', 120, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (615, 'New Record inserted On users id 239', 239, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (616, 'New Record inserted On users id 240', 240, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (617, 'Record updated On students id 120', 120, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (618, 'New Record inserted On students id 121', 121, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (619, 'New Record inserted On  student session id 121', 121, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (620, 'New Record inserted On users id 241', 241, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (621, 'New Record inserted On users id 242', 242, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (622, 'Record updated On students id 121', 121, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (623, 'New Record inserted On students id 122', 122, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (624, 'New Record inserted On  student session id 122', 122, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (625, 'New Record inserted On users id 243', 243, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (626, 'New Record inserted On users id 244', 244, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (627, 'Record updated On students id 122', 122, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (628, 'New Record inserted On students id 123', 123, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (629, 'New Record inserted On  student session id 123', 123, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (630, 'New Record inserted On users id 245', 245, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (631, 'New Record inserted On users id 246', 246, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (632, 'Record updated On students id 123', 123, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (633, 'New Record inserted On students id 124', 124, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (634, 'New Record inserted On  student session id 124', 124, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (635, 'New Record inserted On users id 247', 247, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (636, 'New Record inserted On users id 248', 248, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (637, 'Record updated On students id 124', 124, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:03:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (638, 'New Record inserted On students id 125', 125, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (639, 'New Record inserted On  student session id 125', 125, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (640, 'New Record inserted On users id 249', 249, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (641, 'New Record inserted On users id 250', 250, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (642, 'Record updated On students id 125', 125, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (643, 'New Record inserted On students id 126', 126, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (644, 'New Record inserted On  student session id 126', 126, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (645, 'New Record inserted On users id 251', 251, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (646, 'New Record inserted On users id 252', 252, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (647, 'Record updated On students id 126', 126, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (648, 'New Record inserted On students id 127', 127, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (649, 'New Record inserted On  student session id 127', 127, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (650, 'New Record inserted On users id 253', 253, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (651, 'New Record inserted On users id 254', 254, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (652, 'Record updated On students id 127', 127, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (653, 'New Record inserted On students id 128', 128, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (654, 'New Record inserted On  student session id 128', 128, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (655, 'New Record inserted On users id 255', 255, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (656, 'New Record inserted On users id 256', 256, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (657, 'Record updated On students id 128', 128, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (658, 'New Record inserted On students id 129', 129, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (659, 'New Record inserted On  student session id 129', 129, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (660, 'New Record inserted On users id 257', 257, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (661, 'New Record inserted On users id 258', 258, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (662, 'Record updated On students id 129', 129, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (663, 'New Record inserted On students id 130', 130, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (664, 'New Record inserted On  student session id 130', 130, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (665, 'New Record inserted On users id 259', 259, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (666, 'New Record inserted On users id 260', 260, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (667, 'Record updated On students id 130', 130, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (668, 'New Record inserted On students id 131', 131, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (669, 'New Record inserted On  student session id 131', 131, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (670, 'New Record inserted On users id 261', 261, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (671, 'New Record inserted On users id 262', 262, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (672, 'Record updated On students id 131', 131, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (673, 'New Record inserted On students id 132', 132, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (674, 'New Record inserted On  student session id 132', 132, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (675, 'New Record inserted On users id 263', 263, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (676, 'New Record inserted On users id 264', 264, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (677, 'Record updated On students id 132', 132, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (678, 'New Record inserted On students id 133', 133, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (679, 'New Record inserted On  student session id 133', 133, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (680, 'New Record inserted On users id 265', 265, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (681, 'New Record inserted On users id 266', 266, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (682, 'Record updated On students id 133', 133, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (683, 'New Record inserted On students id 134', 134, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (684, 'New Record inserted On  student session id 134', 134, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (685, 'New Record inserted On users id 267', 267, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (686, 'New Record inserted On users id 268', 268, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (687, 'Record updated On students id 134', 134, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (688, 'New Record inserted On students id 135', 135, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (689, 'New Record inserted On  student session id 135', 135, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (690, 'New Record inserted On users id 269', 269, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (691, 'New Record inserted On users id 270', 270, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (692, 'Record updated On students id 135', 135, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (693, 'New Record inserted On students id 136', 136, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (694, 'New Record inserted On  student session id 136', 136, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (695, 'New Record inserted On users id 271', 271, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (696, 'New Record inserted On users id 272', 272, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (697, 'Record updated On students id 136', 136, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (698, 'New Record inserted On students id 137', 137, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (699, 'New Record inserted On  student session id 137', 137, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (700, 'New Record inserted On users id 273', 273, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (701, 'New Record inserted On users id 274', 274, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (702, 'Record updated On students id 137', 137, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (703, 'New Record inserted On students id 138', 138, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (704, 'New Record inserted On  student session id 138', 138, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (705, 'New Record inserted On users id 275', 275, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (706, 'New Record inserted On users id 276', 276, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (707, 'Record updated On students id 138', 138, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (708, 'New Record inserted On students id 139', 139, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (709, 'New Record inserted On  student session id 139', 139, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (710, 'New Record inserted On users id 277', 277, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (711, 'New Record inserted On users id 278', 278, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (712, 'Record updated On students id 139', 139, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (713, 'New Record inserted On students id 140', 140, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (714, 'New Record inserted On  student session id 140', 140, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (715, 'New Record inserted On users id 279', 279, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (716, 'New Record inserted On users id 280', 280, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (717, 'Record updated On students id 140', 140, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (718, 'New Record inserted On students id 141', 141, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (719, 'New Record inserted On  student session id 141', 141, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (720, 'New Record inserted On users id 281', 281, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (721, 'New Record inserted On users id 282', 282, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (722, 'Record updated On students id 141', 141, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (723, 'New Record inserted On students id 142', 142, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (724, 'New Record inserted On  student session id 142', 142, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (725, 'New Record inserted On users id 283', 283, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (726, 'New Record inserted On users id 284', 284, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (727, 'Record updated On students id 142', 142, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (728, 'New Record inserted On students id 143', 143, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (729, 'New Record inserted On  student session id 143', 143, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (730, 'New Record inserted On users id 285', 285, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (731, 'New Record inserted On users id 286', 286, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (732, 'Record updated On students id 143', 143, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (733, 'New Record inserted On students id 144', 144, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (734, 'New Record inserted On  student session id 144', 144, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (735, 'New Record inserted On users id 287', 287, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (736, 'New Record inserted On users id 288', 288, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (737, 'Record updated On students id 144', 144, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (738, 'New Record inserted On students id 145', 145, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (739, 'New Record inserted On  student session id 145', 145, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (740, 'New Record inserted On users id 289', 289, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (741, 'New Record inserted On users id 290', 290, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (742, 'Record updated On students id 145', 145, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (743, 'New Record inserted On students id 146', 146, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (744, 'New Record inserted On  student session id 146', 146, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (745, 'New Record inserted On users id 291', 291, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (746, 'New Record inserted On users id 292', 292, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (747, 'Record updated On students id 146', 146, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (748, 'New Record inserted On students id 147', 147, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (749, 'New Record inserted On  student session id 147', 147, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (750, 'New Record inserted On users id 293', 293, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (751, 'New Record inserted On users id 294', 294, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (752, 'Record updated On students id 147', 147, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (753, 'New Record inserted On students id 148', 148, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (754, 'New Record inserted On  student session id 148', 148, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (755, 'New Record inserted On users id 295', 295, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (756, 'New Record inserted On users id 296', 296, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (757, 'Record updated On students id 148', 148, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (758, 'New Record inserted On students id 149', 149, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (759, 'New Record inserted On  student session id 149', 149, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (760, 'New Record inserted On users id 297', 297, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (761, 'New Record inserted On users id 298', 298, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (762, 'Record updated On students id 149', 149, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 09:04:12', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (763, 'New Record inserted On  student attendences id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (764, 'New Record inserted On  student attendences id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (765, 'New Record inserted On  student attendences id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (766, 'New Record inserted On  student attendences id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (767, 'New Record inserted On  student attendences id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (768, 'New Record inserted On  student attendences id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (769, 'New Record inserted On  student attendences id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (770, 'New Record inserted On  student attendences id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (771, 'New Record inserted On  student attendences id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (772, 'New Record inserted On  student attendences id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (773, 'New Record inserted On  student attendences id 11', 11, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (774, 'New Record inserted On  student attendences id 12', 12, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (775, 'New Record inserted On  student attendences id 13', 13, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (776, 'New Record inserted On  student attendences id 14', 14, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (777, 'New Record inserted On  student attendences id 15', 15, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (778, 'New Record inserted On  student attendences id 16', 16, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (779, 'New Record inserted On  student attendences id 17', 17, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (780, 'New Record inserted On  student attendences id 18', 18, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (781, 'New Record inserted On  student attendences id 19', 19, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (782, 'New Record inserted On  student attendences id 20', 20, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (783, 'New Record inserted On  student attendences id 21', 21, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (784, 'New Record inserted On  student attendences id 22', 22, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (785, 'New Record inserted On  student attendences id 23', 23, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (786, 'New Record inserted On  student attendences id 24', 24, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (787, 'New Record inserted On  student attendences id 25', 25, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (788, 'New Record inserted On  student attendences id 26', 26, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (789, 'New Record inserted On  student attendences id 27', 27, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (790, 'New Record inserted On  student attendences id 28', 28, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (791, 'New Record inserted On  student attendences id 29', 29, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (792, 'New Record inserted On  student attendences id 30', 30, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (793, 'New Record inserted On  student attendences id 31', 31, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (794, 'New Record inserted On  student attendences id 32', 32, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (795, 'New Record inserted On  student attendences id 33', 33, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (796, 'New Record inserted On  student attendences id 34', 34, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (797, 'New Record inserted On  student attendences id 35', 35, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (798, 'New Record inserted On  student attendences id 36', 36, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (799, 'New Record inserted On  student attendences id 37', 37, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (800, 'New Record inserted On  student attendences id 38', 38, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (801, 'New Record inserted On  student attendences id 39', 39, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (802, 'New Record inserted On  student attendences id 40', 40, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (803, 'New Record inserted On  student attendences id 41', 41, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (804, 'New Record inserted On  student attendences id 42', 42, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (805, 'New Record inserted On  student attendences id 43', 43, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (806, 'New Record inserted On  student attendences id 44', 44, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (807, 'New Record inserted On  student attendences id 45', 45, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (808, 'New Record inserted On  student attendences id 46', 46, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (809, 'New Record inserted On  student attendences id 47', 47, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (810, 'New Record inserted On  student attendences id 48', 48, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (811, 'New Record inserted On  student attendences id 49', 49, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:13:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (812, 'New Record inserted On  student attendences id 50', 50, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (813, 'New Record inserted On  student attendences id 51', 51, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (814, 'New Record inserted On  student attendences id 52', 52, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (815, 'New Record inserted On  student attendences id 53', 53, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (816, 'New Record inserted On  student attendences id 54', 54, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (817, 'New Record inserted On  student attendences id 55', 55, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (818, 'New Record inserted On  student attendences id 56', 56, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (819, 'New Record inserted On  student attendences id 57', 57, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (820, 'New Record inserted On  student attendences id 58', 58, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (821, 'New Record inserted On  student attendences id 59', 59, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (822, 'New Record inserted On  student attendences id 60', 60, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (823, 'New Record inserted On  student attendences id 61', 61, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (824, 'New Record inserted On  student attendences id 62', 62, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (825, 'New Record inserted On  student attendences id 63', 63, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (826, 'New Record inserted On  student attendences id 64', 64, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (827, 'New Record inserted On  student attendences id 65', 65, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (828, 'New Record inserted On  student attendences id 66', 66, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (829, 'New Record inserted On  student attendences id 67', 67, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (830, 'New Record inserted On  student attendences id 68', 68, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (831, 'New Record inserted On  student attendences id 69', 69, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (832, 'New Record inserted On  student attendences id 70', 70, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (833, 'New Record inserted On  student attendences id 71', 71, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (834, 'New Record inserted On  student attendences id 72', 72, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (835, 'New Record inserted On  student attendences id 73', 73, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (836, 'New Record inserted On  student attendences id 74', 74, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:25', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (837, 'New Record inserted On  student attendences id 75', 75, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (838, 'New Record inserted On  student attendences id 76', 76, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (839, 'New Record inserted On  student attendences id 77', 77, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (840, 'New Record inserted On  student attendences id 78', 78, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (841, 'New Record inserted On  student attendences id 79', 79, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (842, 'New Record inserted On  student attendences id 80', 80, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (843, 'New Record inserted On  student attendences id 81', 81, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (844, 'New Record inserted On  student attendences id 82', 82, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (845, 'New Record inserted On  student attendences id 83', 83, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (846, 'New Record inserted On  student attendences id 84', 84, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (847, 'New Record inserted On  student attendences id 85', 85, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (848, 'New Record inserted On  student attendences id 86', 86, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (849, 'New Record inserted On  student attendences id 87', 87, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (850, 'New Record inserted On  student attendences id 88', 88, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (851, 'New Record inserted On  student attendences id 89', 89, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (852, 'New Record inserted On  student attendences id 90', 90, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (853, 'New Record inserted On  student attendences id 91', 91, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (854, 'New Record inserted On  student attendences id 92', 92, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (855, 'New Record inserted On  student attendences id 93', 93, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (856, 'New Record inserted On  student attendences id 94', 94, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (857, 'New Record inserted On  student attendences id 95', 95, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (858, 'New Record inserted On  student attendences id 96', 96, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (859, 'New Record inserted On  student attendences id 97', 97, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (860, 'New Record inserted On  student attendences id 98', 98, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (861, 'New Record inserted On  student attendences id 99', 99, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:14:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (862, 'New Record inserted On  student attendences id 100', 100, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (863, 'New Record inserted On  student attendences id 101', 101, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (864, 'New Record inserted On  student attendences id 102', 102, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (865, 'New Record inserted On  student attendences id 103', 103, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (866, 'New Record inserted On  student attendences id 104', 104, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (867, 'New Record inserted On  student attendences id 105', 105, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (868, 'New Record inserted On  student attendences id 106', 106, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (869, 'New Record inserted On  student attendences id 107', 107, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (870, 'New Record inserted On  student attendences id 108', 108, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (871, 'New Record inserted On  student attendences id 109', 109, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (872, 'New Record inserted On  student attendences id 110', 110, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (873, 'New Record inserted On  student attendences id 111', 111, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (874, 'New Record inserted On  student attendences id 112', 112, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (875, 'New Record inserted On  student attendences id 113', 113, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (876, 'New Record inserted On  student attendences id 114', 114, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (877, 'New Record inserted On  student attendences id 115', 115, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (878, 'New Record inserted On  student attendences id 116', 116, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (879, 'New Record inserted On  student attendences id 117', 117, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (880, 'New Record inserted On  student attendences id 118', 118, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (881, 'New Record inserted On  student attendences id 119', 119, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (882, 'New Record inserted On  student attendences id 120', 120, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (883, 'New Record inserted On  student attendences id 121', 121, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (884, 'New Record inserted On  student attendences id 122', 122, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (885, 'New Record inserted On  student attendences id 123', 123, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (886, 'New Record inserted On  student attendences id 124', 124, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (887, 'New Record inserted On  student attendences id 125', 125, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (888, 'New Record inserted On  student attendences id 126', 126, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (889, 'New Record inserted On  student attendences id 127', 127, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (890, 'New Record inserted On  student attendences id 128', 128, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (891, 'New Record inserted On  student attendences id 129', 129, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (892, 'New Record inserted On  student attendences id 130', 130, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (893, 'New Record inserted On  student attendences id 131', 131, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (894, 'New Record inserted On  student attendences id 132', 132, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (895, 'New Record inserted On  student attendences id 133', 133, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (896, 'New Record inserted On  student attendences id 134', 134, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (897, 'New Record inserted On  student attendences id 135', 135, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (898, 'New Record inserted On  student attendences id 136', 136, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (899, 'New Record inserted On  student attendences id 137', 137, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (900, 'New Record inserted On  student attendences id 138', 138, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (901, 'New Record inserted On  student attendences id 139', 139, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (902, 'New Record inserted On  student attendences id 140', 140, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (903, 'New Record inserted On  student attendences id 141', 141, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (904, 'New Record inserted On  student attendences id 142', 142, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (905, 'New Record inserted On  student attendences id 143', 143, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (906, 'New Record inserted On  student attendences id 144', 144, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (907, 'New Record inserted On  student attendences id 145', 145, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (908, 'New Record inserted On  student attendences id 146', 146, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (909, 'New Record inserted On  student attendences id 147', 147, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (910, 'New Record inserted On  student attendences id 148', 148, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (911, 'New Record inserted On  student attendences id 149', 149, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:15:35', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (912, 'New Record inserted On  fee type id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:19:48', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (913, 'New Record inserted On  fee type id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:20:11', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (914, 'Record updated On  fee type id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:20:44', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (915, 'Record updated On  fee type id 2', 2, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:20:59', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (916, 'New Record inserted On  fee type id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:21:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (917, 'New Record inserted On  fee type id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:21:33', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (918, 'New Record inserted On  fee type id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:21:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (919, 'New Record inserted On  fee type id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:23:03', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (920, 'New Record inserted On  fee type id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:23:16', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (921, 'New Record inserted On  fee groups id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:23:32', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (922, 'New Record inserted On  fee groups id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:23:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (923, 'New Record inserted On  fee groups id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:23:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (924, 'New Record inserted On  fee groups id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:23:52', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (925, 'New Record inserted On  fee groups feetype id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:24:21', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (926, 'New Record inserted On  fee groups feetype id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:24:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (927, 'New Record inserted On  fee groups feetype id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:25:10', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (928, 'New Record inserted On  fee groups feetype id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:25:27', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (929, 'New Record inserted On  fee groups feetype id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:25:50', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (930, 'New Record inserted On  fee groups feetype id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:26:10', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (931, 'New Record inserted On  fee groups feetype id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:26:24', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (932, 'New Record inserted On  fee groups feetype id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:26:37', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (933, 'New Record inserted On  fee groups feetype id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:26:51', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (934, 'New Record inserted On  fee groups feetype id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 12:27:01', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (935, 'New Record inserted On  fees discounts id 1', 1, 1, 'Insert', '111.119.187.34', 'Windows 10', 'Firefox 92.0', '2021-09-30 12:47:42', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (936, 'New Record inserted On  income head   id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:16:24', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (937, 'New Record inserted On  income head   id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:16:33', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (938, 'New Record inserted On  income head   id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:16:44', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (939, 'New Record inserted On  income head   id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:16:54', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (940, 'New Record inserted On  income head   id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:17:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (941, 'New Record inserted On  income head   id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:17:24', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (942, 'New Record inserted On  income head   id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:17:32', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (943, 'New Record inserted On subjects id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:25:52', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (944, 'New Record inserted On subjects id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:26:16', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (945, 'New Record inserted On subjects id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:26:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (946, 'New Record inserted On subjects id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:27:01', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (947, 'New Record inserted On subjects id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:27:17', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (948, 'New Record inserted On subjects id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:27:34', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (949, 'New Record inserted On subjects id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:27:49', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (950, 'New Record inserted On subjects id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:28:04', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (951, 'New Record inserted On subjects id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:28:19', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (952, 'New Record inserted On subject groups id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:29:41', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (953, 'New Record inserted On subject groups id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:30:38', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (954, 'New Record inserted On  staff designation id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:32:24', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (955, 'New Record inserted On  staff designation id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:32:32', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (956, 'New Record inserted On  staff designation id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:32:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (957, 'New Record inserted On  staff designation id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:32:46', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (958, 'New Record inserted On  staff designation id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:32:55', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (959, 'New Record inserted On  staff designation id 6', 6, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:33:04', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (960, 'New Record inserted On  staff designation id 7', 7, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:33:32', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (961, 'New Record inserted On  staff designation id 8', 8, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:33:53', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (962, 'New Record inserted On  staff designation id 9', 9, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:34:01', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (963, 'New Record inserted On  staff designation id 10', 10, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:34:08', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (964, 'New Record inserted On  staff designation id 11', 11, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:34:21', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (965, 'New Record inserted On  staff designation id 12', 12, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:34:31', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (966, 'New Record inserted On  staff designation id 13', 13, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:34:40', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (967, 'New Record inserted On  staff designation id 14', 14, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:34:50', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (968, 'New Record inserted On  staff designation id 15', 15, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:35:10', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (969, 'New Record inserted On department id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:35:24', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (970, 'New Record inserted On department id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:35:30', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (971, 'New Record inserted On department id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:35:38', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (972, 'New Record inserted On department id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:35:45', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (973, 'New Record inserted On department id 5', 5, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:35:57', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (974, 'New Record inserted On leave types id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:36:43', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (975, 'New Record inserted On leave types id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:36:50', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (976, 'New Record inserted On leave types id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:36:59', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (977, 'New Record inserted On leave types id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-09-30 17:37:05', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (978, 'Record updated On settings id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-01 09:00:15', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (979, 'Record updated On settings id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-01 09:00:52', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (980, 'Record updated On settings id 1', 1, 1, 'Update', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-01 09:01:07', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (981, 'New Record inserted On  questions id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:18:01', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (982, 'New Record inserted On  questions id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:19:16', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (983, 'New Record inserted On lesson id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:50:29', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (984, 'New Record inserted On topic id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:51:39', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (985, 'New Record inserted On staff payslip id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:58:22', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (986, 'New Record inserted On payslip allowance id 1', 1, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:58:22', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (987, 'New Record inserted On payslip allowance id 2', 2, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:58:22', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (988, 'New Record inserted On payslip allowance id 3', 3, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:58:22', NULL);
INSERT INTO `logs` (`id`, `message`, `record_id`, `user_id`, `action`, `ip_address`, `platform`, `agent`, `time`, `created_at`) VALUES (989, 'New Record inserted On payslip allowance id 4', 4, 1, 'Insert', '82.0.18.148', 'Windows 10', 'Opera 79.0.4143.61', '2021-10-04 17:58:22', NULL);


#
# TABLE STRUCTURE FOR: messages
#

DROP TABLE IF EXISTS `messages`;

CREATE TABLE `messages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) DEFAULT NULL,
  `message` text,
  `send_mail` varchar(10) DEFAULT '0',
  `send_sms` varchar(10) DEFAULT '0',
  `is_group` varchar(10) DEFAULT '0',
  `is_individual` varchar(10) DEFAULT '0',
  `is_class` int(10) NOT NULL DEFAULT '0',
  `group_list` text,
  `user_list` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: migrations
#

DROP TABLE IF EXISTS `migrations`;

CREATE TABLE `migrations` (
  `version` bigint(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: multi_class_students
#

DROP TABLE IF EXISTS `multi_class_students`;

CREATE TABLE `multi_class_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_id` (`student_id`),
  KEY `student_session_id` (`student_session_id`),
  CONSTRAINT `multi_class_students_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `multi_class_students_ibfk_2` FOREIGN KEY (`student_session_id`) REFERENCES `student_session` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: notification_roles
#

DROP TABLE IF EXISTS `notification_roles`;

CREATE TABLE `notification_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `send_notification_id` int(11) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `send_notification_id` (`send_notification_id`),
  KEY `role_id` (`role_id`),
  CONSTRAINT `notification_roles_ibfk_1` FOREIGN KEY (`send_notification_id`) REFERENCES `send_notification` (`id`) ON DELETE CASCADE,
  CONSTRAINT `notification_roles_ibfk_2` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: notification_setting
#

DROP TABLE IF EXISTS `notification_setting`;

CREATE TABLE `notification_setting` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(100) DEFAULT NULL,
  `is_mail` varchar(10) DEFAULT '0',
  `is_sms` varchar(10) DEFAULT '0',
  `is_notification` int(11) NOT NULL DEFAULT '0',
  `display_notification` int(11) NOT NULL DEFAULT '0',
  `display_sms` int(11) NOT NULL DEFAULT '1',
  `template` longtext NOT NULL,
  `variables` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8;

INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (1, 'student_admission', '1', '0', 0, 0, 1, 'Dear {{firstname}} {{lastname}} your admission is confirm in Class: {{class}} Section:  {{section}} for Session: {{current_session_name}} for more detail contact System Admin\r\n{{firstname}} {{lastname}} {{class}} {{section}} {{admission_no}} {{roll_no}} {{admission_date}} {{mobileno}} {{email}} {{dob}} {{guardian_name}} {{guardian_relation}} {{guardian_phone}} {{father_name}} {{father_phone}} {{blood_group}} {{mother_name}} {{gender}} {{guardian_email}}', '{{firstname}}  {{lastname}}  {{class}}  {{section}}  {{admission_no}}  {{roll_no}}  {{admission_date}}   {{mobileno}}  {{email}}  {{dob}}  {{guardian_name}}  {{guardian_relation}}  {{guardian_phone}}  {{father_name}}  {{father_phone}}  {{blood_group}}  {{mother_name}}  {{gender}}  {{guardian_email}} {{current_session_name}}', '2020-02-01 01:58:40');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (2, 'exam_result', '1', '0', 0, 1, 1, 'Dear {{student_name}} - {{exam_roll_no}}, your {{exam}} result has been published.', '{{student_name}} {{exam_roll_no}} {{exam}}', '2020-06-15 11:47:47');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (3, 'fee_submission', '1', '0', 0, 1, 1, 'Dear parents, we have received  Fees Amount {{fee_amount}} for  {{firstname}} {{lastname}}  by Your School Name', ' {{firstname}} {{lastname}} {{class}} {{section}} {{fine_type}} {{fine_percentage}} {{fine_amount}} {{fee_group_name}} {{type}} {{code}} {{email}} {{contact_no}} {{invoice_id}} {{sub_invoice_id}} {{due_date}} {{amount}} {{fee_amount}}', '2020-02-08 10:23:20');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (4, 'absent_attendence', '1', '0', 0, 1, 1, 'Absent Notice :{{firstname}} {{lastname}}  was absent on date {{date}} in period {{subject_name}} {{subject_code}} {{subject_type}} from Your School Name', '{{firstname}} {{lastname}} {{mobileno}} {{email}} {{father_name}} {{father_phone}} {{father_occupation}} {{mother_name}} {{mother_phone}} {{guardian_name}} {{guardian_phone}} {{guardian_occupation}} {{guardian_email}} {{date}} {{current_session_name}}             {{time_from}} {{time_to}} {{subject_name}} {{subject_code}} {{subject_type}} ', '2020-02-08 10:33:13');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (5, 'login_credential', '1', '0', 0, 0, 1, 'Hello {{display_name}} your login details for Url: {{url}} Username: {{username}}  Password: {{password}}', '{{url}} {{display_name}} {{username}} {{password}}', '2020-02-08 08:55:33');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (6, 'homework', '1', '0', 0, 1, 1, 'New Homework has been created for {{student_name}} at {{homework_date}} for the class {{class}} {{section}} {{subject}}. kindly submit your homework before {{submit_date}} .Thank you', '{{homework_date}} {{submit_date}} {{class}} {{section}} {{subject}} {{student_name}}', '2020-02-08 08:55:33');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (7, 'fees_reminder', '1', '0', 0, 1, 1, 'Dear parents, please pay fee amount Rs.{{due_amount}} of {{fee_type}} before {{due_date}} for {{firstname}} {{lastname}} from smart school (ignore if you already paid)', '{{fee_type}}{{fee_code}}{{due_date}}{{firstname}} {{lastname}}{{school_name}}{{fee_amount}}{{due_amount}}{{deposit_amount}}', '2020-02-08 08:55:33');
INSERT INTO `notification_setting` (`id`, `type`, `is_mail`, `is_sms`, `is_notification`, `display_notification`, `display_sms`, `template`, `variables`, `created_at`) VALUES (8, 'forgot_password', '1', '0', 0, 0, 0, 'Dear  {{name}} , \r\n       Recently a request was submitted to reset password for your account. If you didn\'t make the request, just ignore this email. Otherwise you can reset your password using this link <a href=\'{{resetPassLink}}\'>Click here to reset your password</a>,\r\nif you\'re having trouble clicking the password reset button, copy and paste the URL below into your web browser.\r\n{{resetPassLink}}\r\n Regards,\r\n {{school_name}}', '{{fee_type}}{{fee_code}}{{due_date}}{{firstname}} {{lastname}}{{school_name}}{{fee_amount}}{{due_amount}}{{deposit_amount}}', '2020-09-24 02:12:34');


#
# TABLE STRUCTURE FOR: online_admissions
#

DROP TABLE IF EXISTS `online_admissions`;

CREATE TABLE `online_admissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `admission_no` varchar(100) DEFAULT NULL,
  `roll_no` varchar(100) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `rte` varchar(20) NOT NULL DEFAULT 'No',
  `image` varchar(100) DEFAULT NULL,
  `mobileno` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `cast` varchar(50) NOT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `current_address` text,
  `permanent_address` text,
  `category_id` int(11) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `school_house_id` int(11) DEFAULT NULL,
  `blood_group` varchar(200) NOT NULL,
  `vehroute_id` int(11) NOT NULL,
  `hostel_room_id` int(11) NOT NULL,
  `adhar_no` varchar(100) DEFAULT NULL,
  `samagra_id` varchar(100) DEFAULT NULL,
  `bank_account_no` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `ifsc_code` varchar(100) DEFAULT NULL,
  `guardian_is` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_phone` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_phone` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_relation` varchar(100) DEFAULT NULL,
  `guardian_phone` varchar(100) DEFAULT NULL,
  `guardian_occupation` varchar(150) NOT NULL,
  `guardian_address` text,
  `guardian_email` varchar(100) NOT NULL,
  `father_pic` varchar(200) NOT NULL,
  `mother_pic` varchar(200) NOT NULL,
  `guardian_pic` varchar(200) NOT NULL,
  `is_enroll` int(255) DEFAULT '0',
  `previous_school` text,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `note` varchar(200) NOT NULL,
  `measurement_date` date DEFAULT NULL,
  `app_key` text,
  `document` text,
  `disable_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_section_id` (`class_section_id`),
  CONSTRAINT `online_admissions_ibfk_1` FOREIGN KEY (`class_section_id`) REFERENCES `class_sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: onlineexam
#

DROP TABLE IF EXISTS `onlineexam`;

CREATE TABLE `onlineexam` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `exam` text,
  `attempt` int(11) NOT NULL,
  `exam_from` date DEFAULT NULL,
  `exam_to` date DEFAULT NULL,
  `time_from` time DEFAULT NULL,
  `time_to` time DEFAULT NULL,
  `duration` time NOT NULL,
  `passing_percentage` float NOT NULL DEFAULT '0',
  `description` text,
  `session_id` int(11) DEFAULT NULL,
  `publish_result` int(11) NOT NULL DEFAULT '0',
  `is_active` varchar(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `onlineexam_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: onlineexam_attempts
#

DROP TABLE IF EXISTS `onlineexam_attempts`;

CREATE TABLE `onlineexam_attempts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onlineexam_student_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `onlineexam_student_id` (`onlineexam_student_id`),
  CONSTRAINT `onlineexam_attempts_ibfk_1` FOREIGN KEY (`onlineexam_student_id`) REFERENCES `onlineexam_students` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: onlineexam_questions
#

DROP TABLE IF EXISTS `onlineexam_questions`;

CREATE TABLE `onlineexam_questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) DEFAULT NULL,
  `onlineexam_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `is_active` varchar(1) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `onlineexam_id` (`onlineexam_id`),
  KEY `question_id` (`question_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `onlineexam_questions_ibfk_1` FOREIGN KEY (`onlineexam_id`) REFERENCES `onlineexam` (`id`) ON DELETE CASCADE,
  CONSTRAINT `onlineexam_questions_ibfk_2` FOREIGN KEY (`question_id`) REFERENCES `questions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `onlineexam_questions_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: onlineexam_student_results
#

DROP TABLE IF EXISTS `onlineexam_student_results`;

CREATE TABLE `onlineexam_student_results` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onlineexam_student_id` int(11) NOT NULL,
  `onlineexam_question_id` int(11) NOT NULL,
  `select_option` varchar(10) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `onlineexam_student_id` (`onlineexam_student_id`),
  KEY `onlineexam_question_id` (`onlineexam_question_id`),
  CONSTRAINT `onlineexam_student_results_ibfk_1` FOREIGN KEY (`onlineexam_student_id`) REFERENCES `onlineexam_students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `onlineexam_student_results_ibfk_2` FOREIGN KEY (`onlineexam_question_id`) REFERENCES `onlineexam_questions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: onlineexam_students
#

DROP TABLE IF EXISTS `onlineexam_students`;

CREATE TABLE `onlineexam_students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `onlineexam_id` int(11) DEFAULT NULL,
  `student_session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `onlineexam_id` (`onlineexam_id`),
  KEY `student_session_id` (`student_session_id`),
  CONSTRAINT `onlineexam_students_ibfk_1` FOREIGN KEY (`onlineexam_id`) REFERENCES `onlineexam` (`id`) ON DELETE CASCADE,
  CONSTRAINT `onlineexam_students_ibfk_2` FOREIGN KEY (`student_session_id`) REFERENCES `student_session` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: payment_settings
#

DROP TABLE IF EXISTS `payment_settings`;

CREATE TABLE `payment_settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payment_type` varchar(200) NOT NULL,
  `api_username` varchar(200) DEFAULT NULL,
  `api_secret_key` varchar(200) NOT NULL,
  `salt` varchar(200) NOT NULL,
  `api_publishable_key` varchar(200) NOT NULL,
  `api_password` varchar(200) DEFAULT NULL,
  `api_signature` varchar(200) DEFAULT NULL,
  `api_email` varchar(200) DEFAULT NULL,
  `paypal_demo` varchar(100) NOT NULL,
  `account_no` varchar(200) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `gateway_mode` int(11) NOT NULL COMMENT '0 Testing, 1 live',
  `paytm_website` varchar(255) NOT NULL,
  `paytm_industrytype` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (1, 'paypal', NULL, '', '', '', NULL, NULL, NULL, 'FALSE', '', 'no', 0, '', '', '2020-02-28 06:31:52', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (2, 'stripe', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-02-28 06:29:05', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (3, 'payu', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-02-28 06:29:02', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (4, 'ccavenue', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-02-28 06:28:57', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (5, 'paystack', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-02-28 06:20:04', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (6, 'instamojo', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-02-28 06:29:50', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (7, 'razorpay', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-02-28 06:21:08', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (9, 'paytm', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-06-14 22:38:11', NULL);
INSERT INTO `payment_settings` (`id`, `payment_type`, `api_username`, `api_secret_key`, `salt`, `api_publishable_key`, `api_password`, `api_signature`, `api_email`, `paypal_demo`, `account_no`, `is_active`, `gateway_mode`, `paytm_website`, `paytm_industrytype`, `created_at`, `updated_at`) VALUES (10, 'midtrans', NULL, '', '', '', NULL, NULL, NULL, '', '', 'no', 0, '', '', '2020-06-14 22:38:11', NULL);


#
# TABLE STRUCTURE FOR: payslip_allowance
#

DROP TABLE IF EXISTS `payslip_allowance`;

CREATE TABLE `payslip_allowance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `payslip_id` int(11) NOT NULL,
  `allowance_type` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `staff_id` int(11) NOT NULL,
  `cal_type` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `payslip_allowance` (`id`, `payslip_id`, `allowance_type`, `amount`, `staff_id`, `cal_type`) VALUES (1, 1, 'House Rent Allowance', '2500', 2, 'positive');
INSERT INTO `payslip_allowance` (`id`, `payslip_id`, `allowance_type`, `amount`, `staff_id`, `cal_type`) VALUES (2, 1, 'Travelling Allowance', '1000', 2, 'positive');
INSERT INTO `payslip_allowance` (`id`, `payslip_id`, `allowance_type`, `amount`, `staff_id`, `cal_type`) VALUES (3, 1, 'Performance Allowance', '500', 2, 'positive');
INSERT INTO `payslip_allowance` (`id`, `payslip_id`, `allowance_type`, `amount`, `staff_id`, `cal_type`) VALUES (4, 1, 'Advances Re-Payment', '1500', 2, 'negative');


#
# TABLE STRUCTURE FOR: permission_category
#

DROP TABLE IF EXISTS `permission_category`;

CREATE TABLE `permission_category` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `perm_group_id` int(11) DEFAULT NULL,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) DEFAULT NULL,
  `enable_view` int(11) DEFAULT '0',
  `enable_add` int(11) DEFAULT '0',
  `enable_edit` int(11) DEFAULT '0',
  `enable_delete` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=247 DEFAULT CHARSET=utf8;

INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (1, 1, 'Student', 'student', 1, 1, 1, 1, '2019-10-23 22:42:03');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (2, 1, 'Import Student', 'import_student', 1, 0, 0, 0, '2018-06-22 03:17:19');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (3, 1, 'Student Categories', 'student_categories', 1, 1, 1, 1, '2018-06-22 03:17:36');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (4, 1, 'Student Houses', 'student_houses', 1, 1, 1, 1, '2018-06-22 03:17:53');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (5, 2, 'Collect Fees', 'collect_fees', 1, 1, 0, 1, '2018-06-22 03:21:03');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (6, 2, 'Fees Carry Forward', 'fees_carry_forward', 1, 0, 0, 0, '2018-06-26 17:18:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (7, 2, 'Fees Master', 'fees_master', 1, 1, 1, 1, '2018-06-26 17:18:57');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (8, 2, 'Fees Group', 'fees_group', 1, 1, 1, 1, '2018-06-22 03:21:46');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (9, 3, 'Income', 'income', 1, 1, 1, 1, '2018-06-22 03:23:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (10, 3, 'Income Head', 'income_head', 1, 1, 1, 1, '2018-06-22 03:22:44');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (11, 3, 'Search Income', 'search_income', 1, 0, 0, 0, '2018-06-22 03:23:00');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (12, 4, 'Expense', 'expense', 1, 1, 1, 1, '2018-06-22 03:24:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (13, 4, 'Expense Head', 'expense_head', 1, 1, 1, 1, '2018-06-22 03:23:47');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (14, 4, 'Search Expense', 'search_expense', 1, 0, 0, 0, '2018-06-22 03:24:13');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (15, 5, 'Student / Period Attendance', 'student_attendance', 1, 1, 1, 0, '2019-11-28 18:19:05');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (20, 6, 'Marks Grade', 'marks_grade', 1, 1, 1, 1, '2018-06-22 03:25:25');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (21, 7, 'Class Timetable', 'class_timetable', 1, 0, 1, 0, '2019-11-23 20:05:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (23, 7, 'Subject', 'subject', 1, 1, 1, 1, '2018-06-22 03:32:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (24, 7, 'Class', 'class', 1, 1, 1, 1, '2018-06-22 03:32:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (25, 7, 'Section', 'section', 1, 1, 1, 1, '2018-06-22 03:31:10');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (26, 7, 'Promote Student', 'promote_student', 1, 0, 0, 0, '2018-06-22 03:32:47');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (27, 8, 'Upload Content', 'upload_content', 1, 1, 0, 1, '2018-06-22 03:33:19');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (28, 9, 'Books List', 'books', 1, 1, 1, 1, '2019-11-23 17:37:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (29, 9, 'Issue Return', 'issue_return', 1, 0, 0, 0, '2019-11-23 17:37:18');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (30, 9, 'Add Staff Member', 'add_staff_member', 1, 0, 0, 0, '2018-07-02 04:37:00');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (31, 10, 'Issue Item', 'issue_item', 1, 1, 1, 1, '2019-11-28 23:39:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (32, 10, 'Add Item Stock', 'item_stock', 1, 1, 1, 1, '2019-11-23 17:39:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (33, 10, 'Add Item', 'item', 1, 1, 1, 1, '2019-11-23 17:39:39');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (34, 10, 'Item Store', 'store', 1, 1, 1, 1, '2019-11-23 17:40:41');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (35, 10, 'Item Supplier', 'supplier', 1, 1, 1, 1, '2019-11-23 17:40:49');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (37, 11, 'Routes', 'routes', 1, 1, 1, 1, '2018-06-22 03:39:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (38, 11, 'Vehicle', 'vehicle', 1, 1, 1, 1, '2018-06-22 03:39:36');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (39, 11, 'Assign Vehicle', 'assign_vehicle', 1, 1, 1, 1, '2018-06-26 21:39:20');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (40, 12, 'Hostel', 'hostel', 1, 1, 1, 1, '2018-06-22 03:40:49');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (41, 12, 'Room Type', 'room_type', 1, 1, 1, 1, '2018-06-22 03:40:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (42, 12, 'Hostel Rooms', 'hostel_rooms', 1, 1, 1, 1, '2018-06-24 23:23:03');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (43, 13, 'Notice Board', 'notice_board', 1, 1, 1, 1, '2018-06-22 03:41:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (44, 13, 'Email', 'email', 1, 0, 0, 0, '2019-11-25 22:20:37');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (46, 13, 'Email / SMS Log', 'email_sms_log', 1, 0, 0, 0, '2018-06-22 03:41:23');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (53, 15, 'Languages', 'languages', 0, 1, 0, 0, '2018-06-22 03:43:18');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (54, 15, 'General Setting', 'general_setting', 1, 0, 1, 0, '2018-07-05 02:08:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (55, 15, 'Session Setting', 'session_setting', 1, 1, 1, 1, '2018-06-22 03:44:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (56, 15, 'Notification Setting', 'notification_setting', 1, 0, 1, 0, '2018-07-05 02:08:41');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (57, 15, 'SMS Setting', 'sms_setting', 1, 0, 1, 0, '2018-07-05 02:08:47');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (58, 15, 'Email Setting', 'email_setting', 1, 0, 1, 0, '2018-07-05 02:08:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (59, 15, 'Front CMS Setting', 'front_cms_setting', 1, 0, 1, 0, '2018-07-05 02:08:55');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (60, 15, 'Payment Methods', 'payment_methods', 1, 0, 1, 0, '2018-07-05 02:08:59');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (61, 16, 'Menus', 'menus', 1, 1, 0, 1, '2018-07-08 20:50:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (62, 16, 'Media Manager', 'media_manager', 1, 1, 0, 1, '2018-07-08 20:50:26');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (63, 16, 'Banner Images', 'banner_images', 1, 1, 0, 1, '2018-06-22 03:46:02');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (64, 16, 'Pages', 'pages', 1, 1, 1, 1, '2018-06-22 03:46:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (65, 16, 'Gallery', 'gallery', 1, 1, 1, 1, '2018-06-22 03:47:02');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (66, 16, 'Event', 'event', 1, 1, 1, 1, '2018-06-22 03:47:20');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (67, 16, 'News', 'notice', 1, 1, 1, 1, '2018-07-03 01:39:34');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (68, 2, 'Fees Group Assign', 'fees_group_assign', 1, 0, 0, 0, '2018-06-22 03:20:42');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (69, 2, 'Fees Type', 'fees_type', 1, 1, 1, 1, '2018-06-22 03:19:34');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (70, 2, 'Fees Discount', 'fees_discount', 1, 1, 1, 1, '2018-06-22 03:20:10');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (71, 2, 'Fees Discount Assign', 'fees_discount_assign', 1, 0, 0, 0, '2018-06-22 03:20:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (73, 2, 'Search Fees Payment', 'search_fees_payment', 1, 0, 0, 0, '2018-06-22 03:20:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (74, 2, 'Search Due Fees', 'search_due_fees', 1, 0, 0, 0, '2018-06-22 03:20:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (77, 7, 'Assign Class Teacher', 'assign_class_teacher', 1, 1, 1, 1, '2018-06-22 03:30:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (78, 17, 'Admission Enquiry', 'admission_enquiry', 1, 1, 1, 1, '2018-06-22 03:51:24');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (79, 17, 'Follow Up Admission Enquiry', 'follow_up_admission_enquiry', 1, 1, 0, 1, '2018-06-22 03:51:39');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (80, 17, 'Visitor Book', 'visitor_book', 1, 1, 1, 1, '2018-06-22 03:48:58');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (81, 17, 'Phone Call Log', 'phone_call_log', 1, 1, 1, 1, '2018-06-22 03:50:57');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (82, 17, 'Postal Dispatch', 'postal_dispatch', 1, 1, 1, 1, '2018-06-22 03:50:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (83, 17, 'Postal Receive', 'postal_receive', 1, 1, 1, 1, '2018-06-22 03:50:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (84, 17, 'Complain', 'complaint', 1, 1, 1, 1, '2018-07-03 01:40:55');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (85, 17, 'Setup Font Office', 'setup_font_office', 1, 1, 1, 1, '2018-06-22 03:49:24');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (86, 18, 'Staff', 'staff', 1, 1, 1, 1, '2018-06-22 03:53:31');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (87, 18, 'Disable Staff', 'disable_staff', 1, 0, 0, 0, '2018-06-22 03:53:12');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (88, 18, 'Staff Attendance', 'staff_attendance', 1, 1, 1, 0, '2018-06-22 03:53:10');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (90, 18, 'Staff Payroll', 'staff_payroll', 1, 1, 0, 1, '2018-06-22 03:52:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (93, 19, 'Homework', 'homework', 1, 1, 1, 1, '2018-06-22 03:53:50');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (94, 19, 'Homework Evaluation', 'homework_evaluation', 1, 1, 0, 0, '2018-06-26 20:07:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (96, 20, 'Student Certificate', 'student_certificate', 1, 1, 1, 1, '2018-07-06 03:41:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (97, 20, 'Generate Certificate', 'generate_certificate', 1, 0, 0, 0, '2018-07-06 03:37:16');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (98, 20, 'Student ID Card', 'student_id_card', 1, 1, 1, 1, '2018-07-06 03:41:28');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (99, 20, 'Generate ID Card', 'generate_id_card', 1, 0, 0, 0, '2018-07-06 03:41:49');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (102, 21, 'Calendar To Do List', 'calendar_to_do_list', 1, 1, 1, 1, '2018-06-22 03:54:41');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (104, 10, 'Item Category', 'item_category', 1, 1, 1, 1, '2018-06-22 03:34:33');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (106, 22, 'Quick Session Change', 'quick_session_change', 1, 0, 0, 0, '2018-06-22 03:54:45');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (107, 1, 'Disable Student', 'disable_student', 1, 0, 0, 0, '2018-06-24 23:21:34');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (108, 18, ' Approve Leave Request', 'approve_leave_request', 1, 0, 1, 1, '2020-10-05 01:56:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (109, 18, 'Apply Leave', 'apply_leave', 1, 1, 0, 0, '2019-11-28 16:47:46');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (110, 18, 'Leave Types ', 'leave_types', 1, 1, 1, 1, '2018-07-02 03:17:56');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (111, 18, 'Department', 'department', 1, 1, 1, 1, '2018-06-25 20:57:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (112, 18, 'Designation', 'designation', 1, 1, 1, 1, '2018-06-25 20:57:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (113, 22, 'Fees Collection And Expense Monthly Chart', 'fees_collection_and_expense_monthly_chart', 1, 0, 0, 0, '2018-07-03 00:08:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (114, 22, 'Fees Collection And Expense Yearly Chart', 'fees_collection_and_expense_yearly_chart', 1, 0, 0, 0, '2018-07-03 00:08:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (115, 22, 'Monthly Fees Collection Widget', 'Monthly fees_collection_widget', 1, 0, 0, 0, '2018-07-03 00:13:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (116, 22, 'Monthly Expense Widget', 'monthly_expense_widget', 1, 0, 0, 0, '2018-07-03 00:13:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (117, 22, 'Student Count Widget', 'student_count_widget', 1, 0, 0, 0, '2018-07-03 00:13:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (118, 22, 'Staff Role Count Widget', 'staff_role_count_widget', 1, 0, 0, 0, '2018-07-03 00:13:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (122, 5, 'Attendance By Date', 'attendance_by_date', 1, 0, 0, 0, '2018-07-03 01:42:29');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (123, 9, 'Add Student', 'add_student', 1, 0, 0, 0, '2018-07-03 01:42:29');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (126, 15, 'User Status', 'user_status', 1, 0, 0, 0, '2018-07-03 01:42:29');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (127, 18, 'Can See Other Users Profile', 'can_see_other_users_profile', 1, 0, 0, 0, '2018-07-03 01:42:29');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (128, 1, 'Student Timeline', 'student_timeline', 0, 1, 0, 1, '2018-07-05 01:08:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (129, 18, 'Staff Timeline', 'staff_timeline', 0, 1, 0, 1, '2018-07-05 01:08:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (130, 15, 'Backup', 'backup', 1, 1, 0, 1, '2018-07-08 21:17:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (131, 15, 'Restore', 'restore', 1, 0, 0, 0, '2018-07-08 21:17:17');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (134, 1, 'Disable Reason', 'disable_reason', 1, 1, 1, 1, '2019-11-26 23:39:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (135, 2, 'Fees Reminder', 'fees_reminder', 1, 0, 1, 0, '2019-10-24 17:39:49');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (136, 5, 'Approve Leave', 'approve_leave', 1, 0, 0, 0, '2019-10-24 17:46:44');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (137, 6, 'Exam Group', 'exam_group', 1, 1, 1, 1, '2019-10-24 18:02:34');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (141, 6, 'Design Admit Card', 'design_admit_card', 1, 1, 1, 1, '2019-10-24 18:06:59');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (142, 6, 'Print Admit Card', 'print_admit_card', 1, 0, 0, 0, '2019-11-23 16:57:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (143, 6, 'Design Marksheet', 'design_marksheet', 1, 1, 1, 1, '2019-10-24 18:10:25');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (144, 6, 'Print Marksheet', 'print_marksheet', 1, 0, 0, 0, '2019-10-24 18:11:02');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (145, 7, 'Teachers Timetable', 'teachers_time_table', 1, 0, 0, 0, '2019-11-29 19:52:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (146, 14, 'Student Report', 'student_report', 1, 0, 0, 0, '2019-10-24 18:27:00');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (147, 14, 'Guardian Report', 'guardian_report', 1, 0, 0, 0, '2019-10-24 18:30:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (148, 14, 'Student History', 'student_history', 1, 0, 0, 0, '2019-10-24 18:39:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (149, 14, 'Student Login Credential Report', 'student_login_credential_report', 1, 0, 0, 0, '2019-10-24 18:39:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (150, 14, 'Class Subject Report', 'class_subject_report', 1, 0, 0, 0, '2019-10-24 18:39:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (151, 14, 'Admission Report', 'admission_report', 1, 0, 0, 0, '2019-10-24 18:39:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (152, 14, 'Sibling Report', 'sibling_report', 1, 0, 0, 0, '2019-10-24 18:39:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (153, 14, 'Homework Evaluation Report', 'homehork_evaluation_report', 1, 0, 0, 0, '2019-11-23 18:04:24');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (154, 14, 'Student Profile', 'student_profile', 1, 0, 0, 0, '2019-10-24 18:39:07');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (155, 14, 'Fees Statement', 'fees_statement', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (156, 14, 'Balance Fees Report', 'balance_fees_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (157, 14, 'Fees Collection Report', 'fees_collection_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (158, 14, 'Online Fees Collection Report', 'online_fees_collection_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (159, 14, 'Income Report', 'income_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (160, 14, 'Expense Report', 'expense_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (161, 14, 'PayRoll Report', 'payroll_report', 1, 0, 0, 0, '2019-10-30 17:23:22');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (162, 14, 'Income Group Report', 'income_group_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (163, 14, 'Expense Group Report', 'expense_group_report', 1, 0, 0, 0, '2019-10-24 18:55:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (164, 14, 'Attendance Report', 'attendance_report', 1, 0, 0, 0, '2019-10-24 19:08:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (165, 14, 'Staff Attendance Report', 'staff_attendance_report', 1, 0, 0, 0, '2019-10-24 19:08:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (174, 14, 'Transport Report', 'transport_report', 1, 0, 0, 0, '2019-10-24 19:13:56');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (175, 14, 'Hostel Report', 'hostel_report', 1, 0, 0, 0, '2019-11-26 23:51:53');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (176, 14, 'Audit Trail Report', 'audit_trail_report', 1, 0, 0, 0, '2019-10-24 19:16:39');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (177, 14, 'User Log', 'user_log', 1, 0, 0, 0, '2019-10-24 19:19:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (178, 14, 'Book Issue Report', 'book_issue_report', 1, 0, 0, 0, '2019-10-24 19:29:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (179, 14, 'Book Due Report', 'book_due_report', 1, 0, 0, 0, '2019-10-24 19:29:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (180, 14, 'Book Inventory Report', 'book_inventory_report', 1, 0, 0, 0, '2019-10-24 19:29:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (181, 14, 'Stock Report', 'stock_report', 1, 0, 0, 0, '2019-10-24 19:31:28');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (182, 14, 'Add Item Report', 'add_item_report', 1, 0, 0, 0, '2019-10-24 19:31:28');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (183, 14, 'Issue Item Report', 'issue_item_report', 1, 0, 0, 0, '2019-11-28 20:48:06');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (185, 23, 'Online Examination', 'online_examination', 1, 1, 1, 1, '2019-11-23 16:54:50');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (186, 23, 'Question Bank', 'question_bank', 1, 1, 1, 1, '2019-11-23 16:55:18');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (187, 6, 'Exam Result', 'exam_result', 1, 0, 0, 0, '2019-11-23 16:58:50');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (188, 7, 'Subject Group', 'subject_group', 1, 1, 1, 1, '2019-11-23 17:34:32');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (189, 18, 'Teachers Rating', 'teachers_rating', 1, 0, 1, 1, '2019-11-23 20:12:54');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (190, 22, 'Fees Awaiting Payment Widegts', 'fees_awaiting_payment_widegts', 1, 0, 0, 0, '2019-11-23 17:52:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (191, 22, 'Conveted Leads Widegts', 'conveted_leads_widegts', 1, 0, 0, 0, '2019-11-23 17:58:24');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (192, 22, 'Fees Overview Widegts', 'fees_overview_widegts', 1, 0, 0, 0, '2019-11-23 17:57:41');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (193, 22, 'Enquiry Overview Widegts', 'enquiry_overview_widegts', 1, 0, 0, 0, '2019-12-01 22:06:09');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (194, 22, 'Library Overview Widegts', 'book_overview_widegts', 1, 0, 0, 0, '2019-11-30 18:13:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (195, 22, 'Student Today Attendance Widegts', 'today_attendance_widegts', 1, 0, 0, 0, '2019-12-02 21:57:45');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (196, 6, 'Marks Import', 'marks_import', 1, 0, 0, 0, '2019-11-23 18:02:11');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (197, 14, 'Student Attendance Type Report', 'student_attendance_type_report', 1, 0, 0, 0, '2019-11-23 18:06:32');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (198, 14, 'Exam Marks Report', 'exam_marks_report', 1, 0, 0, 0, '2019-11-23 18:11:15');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (200, 14, 'Online Exam Wise Report', 'online_exam_wise_report', 1, 0, 0, 0, '2019-11-23 18:18:14');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (201, 14, 'Online Exams Report', 'online_exams_report', 1, 0, 0, 0, '2019-11-28 19:48:05');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (202, 14, 'Online Exams Attempt Report', 'online_exams_attempt_report', 1, 0, 0, 0, '2019-11-28 19:46:24');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (203, 14, 'Online Exams Rank Report', 'online_exams_rank_report', 1, 0, 0, 0, '2019-11-23 18:22:25');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (204, 14, 'Staff Report', 'staff_report', 1, 0, 0, 0, '2019-11-23 18:25:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (205, 6, 'Exam', 'exam', 1, 1, 1, 1, '2019-11-23 21:55:48');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (207, 6, 'Exam Publish', 'exam_publish', 1, 0, 0, 0, '2019-11-23 22:15:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (208, 6, 'Link Exam', 'link_exam', 1, 0, 1, 0, '2019-11-23 22:15:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (210, 6, 'Assign / View student', 'exam_assign_view_student', 1, 0, 1, 0, '2019-11-23 22:15:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (211, 6, 'Exam Subject', 'exam_subject', 1, 0, 1, 0, '2019-11-23 22:15:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (212, 6, 'Exam Marks', 'exam_marks', 1, 0, 1, 0, '2019-11-23 22:15:04');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (213, 15, 'Language Switcher', 'language_switcher', 1, 0, 0, 0, '2019-11-23 22:17:11');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (214, 23, 'Add Questions in Exam ', 'add_questions_in_exam', 1, 0, 1, 0, '2019-11-27 18:38:57');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (215, 15, 'Custom Fields', 'custom_fields', 1, 0, 0, 0, '2019-11-28 21:08:35');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (216, 15, 'System Fields', 'system_fields', 1, 0, 0, 0, '2019-11-24 17:15:01');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (217, 13, 'SMS', 'sms', 1, 0, 0, 0, '2018-06-22 03:40:54');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (219, 14, 'Student / Period Attendance Report', 'student_period_attendance_report', 1, 0, 0, 0, '2019-11-28 19:19:31');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (220, 14, 'Biometric Attendance Log', 'biometric_attendance_log', 1, 0, 0, 0, '2019-11-26 22:59:16');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (221, 14, 'Book Issue Return Report', 'book_issue_return_report', 1, 0, 0, 0, '2019-11-26 23:30:23');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (222, 23, 'Assign / View Student', 'online_assign_view_student', 1, 0, 1, 0, '2019-11-27 21:20:22');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (223, 14, 'Rank Report', 'rank_report', 1, 0, 0, 0, '2019-11-28 19:30:21');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (224, 25, 'Chat', 'chat', 1, 0, 0, 0, '2019-11-28 21:10:28');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (226, 22, 'Income Donut Graph', 'income_donut_graph', 1, 0, 0, 0, '2019-11-28 22:00:33');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (227, 22, 'Expense Donut Graph', 'expense_donut_graph', 1, 0, 0, 0, '2019-11-28 22:01:10');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (228, 9, 'Import Book', 'import_book', 1, 0, 0, 0, '2019-11-28 23:21:01');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (229, 22, 'Staff Present Today Widegts', 'staff_present_today_widegts', 1, 0, 0, 0, '2019-11-28 23:48:00');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (230, 22, 'Student Present Today Widegts', 'student_present_today_widegts', 1, 0, 0, 0, '2019-11-28 23:47:42');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (231, 26, 'Multi Class Student', 'multi_class_student', 1, 1, 1, 1, '2020-10-05 01:56:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (232, 27, 'Online Admission', 'online_admission', 1, 0, 1, 1, '2019-12-01 23:11:10');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (233, 15, 'Print Header Footer', 'print_header_footer', 1, 0, 0, 0, '2020-02-11 19:02:02');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (234, 28, 'Manage Alumni', 'manage_alumni', 1, 1, 1, 1, '2020-06-01 20:15:46');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (235, 28, 'Events', 'events', 1, 1, 1, 1, '2020-05-28 14:48:52');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (236, 29, 'Manage Lesson Plan', 'manage_lesson_plan', 1, 1, 1, 0, '2020-05-28 15:17:37');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (237, 29, 'Manage Syllabus Status', 'manage_syllabus_status', 1, 0, 1, 0, '2020-05-28 15:20:11');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (238, 29, 'Lesson', 'lesson', 1, 1, 1, 1, '2020-05-28 15:20:11');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (239, 29, 'Topic', 'topic', 1, 1, 1, 1, '2020-05-28 15:20:11');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (240, 14, 'Syllabus Status Report', 'syllabus_status_report', 1, 0, 0, 0, '2020-05-28 16:17:54');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (241, 14, 'Teacher Syllabus Status Report', 'teacher_syllabus_status_report', 1, 0, 0, 0, '2020-05-28 16:17:54');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (242, 14, 'Alumni Report', 'alumni_report', 1, 0, 0, 0, '2020-06-07 16:59:54');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (243, 15, 'Student Profile Update', 'student_profile_update', 1, 0, 0, 0, '2020-08-20 22:36:33');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (244, 14, 'Student Gender Ratio Report', 'student_gender_ratio_report', 1, 0, 0, 0, '2020-08-22 05:37:51');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (245, 14, 'Student Teacher Ratio Report', 'student_teacher_ratio_report', 1, 0, 0, 0, '2020-08-22 05:42:27');
INSERT INTO `permission_category` (`id`, `perm_group_id`, `name`, `short_code`, `enable_view`, `enable_add`, `enable_edit`, `enable_delete`, `created_at`) VALUES (246, 14, 'Daily Attendance Report', 'daily_attendance_report', 1, 0, 0, 0, '2020-08-22 05:43:16');


#
# TABLE STRUCTURE FOR: permission_group
#

DROP TABLE IF EXISTS `permission_group`;

CREATE TABLE `permission_group` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `is_active` int(11) DEFAULT '0',
  `system` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8;

INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (1, 'Student Information', 'student_information', 1, 1, '2019-03-15 02:30:22');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (2, 'Fees Collection', 'fees_collection', 1, 0, '2020-06-10 17:51:35');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (3, 'Income', 'income', 1, 0, '2020-05-31 18:57:39');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (4, 'Expense', 'expense', 1, 0, '2019-03-15 02:06:22');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (5, 'Student Attendance', 'student_attendance', 1, 0, '2018-07-02 00:48:08');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (6, 'Examination', 'examination', 1, 0, '2018-07-10 19:49:08');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (7, 'Academics', 'academics', 1, 1, '2018-07-02 00:25:43');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (8, 'Download Center', 'download_center', 1, 0, '2018-07-02 00:49:29');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (9, 'Library', 'library', 1, 0, '2018-06-28 04:13:14');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (10, 'Inventory', 'inventory', 1, 0, '2018-06-26 17:48:58');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (11, 'Transport', 'transport', 1, 0, '2018-06-27 00:51:26');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (12, 'Hostel', 'hostel', 1, 0, '2018-07-02 00:49:32');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (13, 'Communicate', 'communicate', 1, 0, '2018-07-02 00:50:00');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (14, 'Reports', 'reports', 1, 1, '2018-06-26 20:40:22');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (15, 'System Settings', 'system_settings', 1, 1, '2018-06-26 20:40:28');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (16, 'Front CMS', 'front_cms', 1, 0, '2018-07-09 22:16:54');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (17, 'Front Office', 'front_office', 1, 0, '2018-06-26 20:45:30');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (18, 'Human Resource', 'human_resource', 1, 1, '2018-06-26 20:41:02');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (19, 'Homework', 'homework', 1, 0, '2018-06-26 17:49:38');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (20, 'Certificate', 'certificate', 1, 0, '2018-06-27 00:51:29');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (21, 'Calendar To Do List', 'calendar_to_do_list', 1, 0, '2019-03-15 02:06:25');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (22, 'Dashboard and Widgets', 'dashboard_and_widgets', 1, 1, '2018-06-26 20:41:17');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (23, 'Online Examination', 'online_examination', 1, 0, '2020-05-31 19:25:36');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (25, 'Chat', 'chat', 1, 0, '2019-11-23 16:54:04');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (26, 'Multi Class', 'multi_class', 1, 0, '2019-11-27 05:14:14');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (27, 'Online Admission', 'online_admission', 1, 0, '2019-11-26 19:42:13');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (28, 'Alumni', 'alumni', 1, 0, '2020-05-28 17:26:38');
INSERT INTO `permission_group` (`id`, `name`, `short_code`, `is_active`, `system`, `created_at`) VALUES (29, 'Lesson Plan', 'lesson_plan', 1, 0, '2020-06-06 22:38:30');


#
# TABLE STRUCTURE FOR: permission_student
#

DROP TABLE IF EXISTS `permission_student`;

CREATE TABLE `permission_student` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `short_code` varchar(100) NOT NULL,
  `system` int(11) NOT NULL,
  `student` int(11) NOT NULL,
  `parent` int(11) NOT NULL,
  `group_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8;

INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (1, 'Fees', 'fees', 0, 1, 1, 2, '2020-06-10 17:51:35');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (2, 'Class Timetable', 'class_timetable', 1, 1, 1, 7, '2020-05-30 12:57:50');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (3, 'Homework', 'homework', 0, 1, 1, 19, '2020-05-31 19:49:14');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (4, 'Download Center', 'download_center', 0, 1, 1, 8, '2020-05-31 19:52:49');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (5, 'Attendance', 'attendance', 0, 1, 1, 5, '2020-05-31 19:57:18');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (7, 'Examinations', 'examinations', 0, 1, 1, 6, '2020-05-31 19:59:50');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (8, 'Notice Board', 'notice_board', 0, 1, 1, 13, '2020-05-31 20:00:35');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (11, 'Library', 'library', 0, 1, 1, 9, '2020-05-31 20:02:37');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (12, 'Transport Routes', 'transport_routes', 0, 1, 1, 11, '2020-05-31 20:51:30');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (13, 'Hostel Rooms', 'hostel_rooms', 0, 1, 1, 12, '2020-05-31 20:52:27');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (14, 'Calendar To Do List', 'calendar_to_do_list', 0, 1, 1, 21, '2020-05-31 20:53:18');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (15, 'Online Examination', 'online_examination', 0, 1, 1, 23, '2020-06-10 22:20:01');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (16, 'Teachers Rating', 'teachers_rating', 0, 1, 1, 0, '2020-05-31 21:49:58');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (17, 'Chat', 'chat', 0, 1, 1, 25, '2020-05-31 21:53:06');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (18, 'Multi Class', 'multi_class', 1, 1, 1, 26, '2020-05-30 12:56:52');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (19, 'Lesson Plan', 'lesson_plan', 0, 1, 1, 29, '2020-06-06 22:38:30');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (20, 'Syllabus Status', 'syllabus_status', 0, 1, 1, 29, '2020-06-06 22:38:30');
INSERT INTO `permission_student` (`id`, `name`, `short_code`, `system`, `student`, `parent`, `group_id`, `created_at`) VALUES (23, 'Apply Leave', 'apply_leave', 0, 1, 1, 0, '2020-06-10 22:20:23');


#
# TABLE STRUCTURE FOR: print_headerfooter
#

DROP TABLE IF EXISTS `print_headerfooter`;

CREATE TABLE `print_headerfooter` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `print_type` varchar(255) NOT NULL,
  `header_image` varchar(255) NOT NULL,
  `footer_content` text NOT NULL,
  `created_by` int(11) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `print_headerfooter` (`id`, `print_type`, `header_image`, `footer_content`, `created_by`, `entry_date`) VALUES (1, 'staff_payslip', 'header_image.jpg', 'This payslip is computer generated hence no signature is required.', 1, '2020-02-28 08:41:08');
INSERT INTO `print_headerfooter` (`id`, `print_type`, `header_image`, `footer_content`, `created_by`, `entry_date`) VALUES (2, 'student_receipt', 'header_image.jpg', 'This receipt is computer generated hence no signature is required.', 1, '2020-02-28 08:40:58');


#
# TABLE STRUCTURE FOR: question_answers
#

DROP TABLE IF EXISTS `question_answers`;

CREATE TABLE `question_answers` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `option_id` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: question_options
#

DROP TABLE IF EXISTS `question_options`;

CREATE TABLE `question_options` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question_id` int(11) NOT NULL,
  `option` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: questions
#

DROP TABLE IF EXISTS `questions`;

CREATE TABLE `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_id` int(11) DEFAULT NULL,
  `question` text,
  `opt_a` text,
  `opt_b` text,
  `opt_c` text,
  `opt_d` text,
  `opt_e` text,
  `correct` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `questions_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `questions` (`id`, `subject_id`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `opt_e`, `correct`, `created_at`, `updated_at`) VALUES (1, 1, '<p>Q.1  How many sections in Tenses.?</p>', '<p>12</p>', '<p>3</p>', '<p>4</p>', '<p>2</p>', '<p>6</p>\r\n', 'opt_a', '2021-10-04 10:18:01', NULL);
INSERT INTO `questions` (`id`, `subject_id`, `question`, `opt_a`, `opt_b`, `opt_c`, `opt_d`, `opt_e`, `correct`, `created_at`, `updated_at`) VALUES (2, 1, '<p>Q.   How many colours in Pakistan Flag, </p>', '<p>2</p>', '<p>1</p>', '<p>4</p>', '<p>3</p>', '<p>5</p>\r\n', 'opt_a', '2021-10-04 10:19:16', NULL);


#
# TABLE STRUCTURE FOR: read_notification
#

DROP TABLE IF EXISTS `read_notification`;

CREATE TABLE `read_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `parent_id` int(10) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `notification_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: reference
#

DROP TABLE IF EXISTS `reference`;

CREATE TABLE `reference` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `reference` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: roles
#

DROP TABLE IF EXISTS `roles`;

CREATE TABLE `roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `slug` varchar(150) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `is_system` int(1) NOT NULL DEFAULT '0',
  `is_superadmin` int(11) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (1, 'Admin', NULL, 0, 1, 0, '2018-06-30 08:39:11', '0000-00-00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (2, 'Teacher', NULL, 0, 1, 0, '2018-06-30 08:39:14', '0000-00-00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (3, 'Accountant', NULL, 0, 1, 0, '2018-06-30 08:39:17', '0000-00-00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (4, 'Librarian', NULL, 0, 1, 0, '2018-06-30 08:39:21', '0000-00-00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (6, 'Receptionist', NULL, 0, 1, 0, '2018-07-01 22:39:03', '0000-00-00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (7, 'Super Admin', NULL, 0, 1, 1, '2018-07-11 07:11:29', '0000-00-00');
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (8, 'CEO', NULL, 0, 0, 0, '2021-09-30 00:47:07', NULL);
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (9, 'Chairman', NULL, 0, 0, 0, '2021-09-30 00:47:20', NULL);
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (10, 'Director', NULL, 0, 0, 0, '2021-09-30 00:47:27', NULL);
INSERT INTO `roles` (`id`, `name`, `slug`, `is_active`, `is_system`, `is_superadmin`, `created_at`, `updated_at`) VALUES (11, 'Partner', NULL, 0, 0, 0, '2021-09-30 00:47:56', NULL);


#
# TABLE STRUCTURE FOR: roles_permissions
#

DROP TABLE IF EXISTS `roles_permissions`;

CREATE TABLE `roles_permissions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `perm_cat_id` int(11) DEFAULT NULL,
  `can_view` int(11) DEFAULT NULL,
  `can_add` int(11) DEFAULT NULL,
  `can_edit` int(11) DEFAULT NULL,
  `can_delete` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=1470 DEFAULT CHARSET=utf8;

INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (10, 1, 17, 1, 1, 1, 1, '2018-07-06 02:48:56');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (11, 1, 78, 1, 1, 1, 1, '2018-07-02 17:49:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (23, 1, 12, 1, 1, 1, 1, '2018-07-06 02:45:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (24, 1, 13, 1, 1, 1, 1, '2018-07-06 02:48:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (26, 1, 15, 1, 1, 1, 0, '2019-11-27 16:47:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (28, 1, 19, 1, 1, 1, 0, '2018-07-02 04:31:10');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (30, 1, 76, 1, 1, 1, 0, '2018-07-02 04:31:10');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (31, 1, 21, 1, 0, 1, 0, '2019-11-25 21:51:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (32, 1, 22, 1, 1, 1, 1, '2018-07-02 04:32:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (34, 1, 24, 1, 1, 1, 1, '2019-11-27 23:35:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (43, 1, 32, 1, 1, 1, 1, '2018-07-06 03:22:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (44, 1, 33, 1, 1, 1, 1, '2018-07-06 03:22:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (45, 1, 34, 1, 1, 1, 1, '2018-07-06 03:23:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (46, 1, 35, 1, 1, 1, 1, '2018-07-06 03:24:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (47, 1, 104, 1, 1, 1, 1, '2018-07-06 03:23:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (48, 1, 37, 1, 1, 1, 1, '2018-07-06 03:25:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (49, 1, 38, 1, 1, 1, 1, '2018-07-08 22:15:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (58, 1, 52, 1, 1, 0, 1, '2018-07-08 20:19:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (61, 1, 55, 1, 1, 1, 1, '2018-07-02 02:24:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (67, 1, 61, 1, 1, 0, 1, '2018-07-08 22:59:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (68, 1, 62, 1, 1, 0, 1, '2018-07-08 22:59:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (69, 1, 63, 1, 1, 0, 1, '2018-07-08 20:51:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (70, 1, 64, 1, 1, 1, 1, '2018-07-08 20:02:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (71, 1, 65, 1, 1, 1, 1, '2018-07-08 20:11:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (72, 1, 66, 1, 1, 1, 1, '2018-07-08 20:13:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (73, 1, 67, 1, 1, 1, 1, '2018-07-08 20:14:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (74, 1, 79, 1, 1, 0, 1, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (75, 1, 80, 1, 1, 1, 1, '2018-07-06 02:41:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (76, 1, 81, 1, 1, 1, 1, '2018-07-06 02:41:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (78, 1, 83, 1, 1, 1, 1, '2018-07-06 02:41:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (79, 1, 84, 1, 1, 1, 1, '2018-07-06 02:41:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (80, 1, 85, 1, 1, 1, 1, '2018-07-11 17:16:00');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (87, 1, 92, 1, 1, 1, 1, '2018-06-25 20:33:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (94, 1, 82, 1, 1, 1, 1, '2018-07-06 02:41:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (120, 1, 39, 1, 1, 1, 1, '2018-07-06 03:26:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (156, 1, 9, 1, 1, 1, 1, '2019-11-27 16:45:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (157, 1, 10, 1, 1, 1, 1, '2019-11-27 16:45:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (159, 1, 40, 1, 1, 1, 1, '2019-11-29 17:49:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (160, 1, 41, 1, 1, 1, 1, '2019-12-01 22:43:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (161, 1, 42, 1, 1, 1, 1, '2019-11-29 17:49:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (169, 1, 27, 1, 1, 0, 1, '2019-11-28 23:15:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (178, 1, 54, 1, 0, 1, 0, '2018-07-05 02:09:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (179, 1, 56, 1, 0, 1, 0, '2019-11-29 17:49:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (180, 1, 57, 1, 0, 1, 0, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (181, 1, 58, 1, 0, 1, 0, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (182, 1, 59, 1, 0, 1, 0, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (183, 1, 60, 1, 0, 1, 0, '2019-11-29 17:59:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (190, 1, 105, 1, 0, 0, 0, '2018-07-02 04:13:25');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (199, 1, 75, 1, 0, 0, 0, '2018-07-02 04:19:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (201, 1, 14, 1, 0, 0, 0, '2018-07-02 04:22:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (203, 1, 16, 1, 0, 0, 0, '2018-07-02 04:24:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (204, 1, 26, 1, 0, 0, 0, '2018-07-02 04:32:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (206, 1, 29, 1, 0, 0, 0, '2018-07-02 04:43:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (207, 1, 30, 1, 0, 0, 0, '2018-07-02 04:43:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (208, 1, 31, 1, 1, 1, 1, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (215, 1, 50, 1, 0, 0, 0, '2018-07-02 05:04:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (216, 1, 51, 1, 0, 0, 0, '2018-07-02 05:04:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (222, 1, 1, 1, 1, 1, 1, '2019-11-27 15:55:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (227, 1, 91, 1, 0, 0, 0, '2018-07-02 18:49:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (230, 10, 53, 0, 1, 0, 0, '2018-07-02 20:52:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (231, 10, 54, 0, 0, 1, 0, '2018-07-02 20:52:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (232, 10, 55, 1, 1, 1, 1, '2018-07-02 20:58:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (233, 10, 56, 0, 0, 1, 0, '2018-07-02 20:52:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (235, 10, 58, 0, 0, 1, 0, '2018-07-02 20:52:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (236, 10, 59, 0, 0, 1, 0, '2018-07-02 20:52:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (239, 10, 1, 1, 1, 1, 1, '2018-07-02 21:16:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (241, 10, 3, 1, 0, 0, 0, '2018-07-02 21:23:56');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (242, 10, 2, 1, 0, 0, 0, '2018-07-02 21:24:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (243, 10, 4, 1, 0, 1, 1, '2018-07-02 21:31:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (245, 10, 107, 1, 0, 0, 0, '2018-07-02 21:36:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (246, 10, 5, 1, 1, 0, 1, '2018-07-02 21:38:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (247, 10, 7, 1, 1, 1, 1, '2018-07-02 21:42:07');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (248, 10, 68, 1, 0, 0, 0, '2018-07-02 21:42:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (249, 10, 69, 1, 1, 1, 1, '2018-07-02 21:49:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (250, 10, 70, 1, 0, 0, 1, '2018-07-02 21:52:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (251, 10, 72, 1, 0, 0, 0, '2018-07-02 21:56:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (252, 10, 73, 1, 0, 0, 0, '2018-07-02 21:56:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (253, 10, 74, 1, 0, 0, 0, '2018-07-02 21:58:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (254, 10, 75, 1, 0, 0, 0, '2018-07-02 21:58:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (255, 10, 9, 1, 1, 1, 1, '2018-07-02 22:02:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (256, 10, 10, 1, 1, 1, 1, '2018-07-02 22:03:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (257, 10, 11, 1, 0, 0, 0, '2018-07-02 22:03:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (258, 10, 12, 1, 1, 1, 1, '2018-07-02 22:08:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (259, 10, 13, 1, 1, 1, 1, '2018-07-02 22:08:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (260, 10, 14, 1, 0, 0, 0, '2018-07-02 22:08:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (261, 10, 15, 1, 1, 1, 0, '2018-07-02 22:11:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (262, 10, 16, 1, 0, 0, 0, '2018-07-02 22:12:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (263, 10, 17, 1, 1, 1, 1, '2018-07-02 22:14:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (264, 10, 19, 1, 1, 1, 0, '2018-07-02 22:15:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (265, 10, 20, 1, 1, 1, 1, '2018-07-02 22:18:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (266, 10, 76, 1, 0, 0, 0, '2018-07-02 22:21:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (267, 10, 21, 1, 1, 1, 0, '2018-07-02 22:22:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (268, 10, 22, 1, 1, 1, 1, '2018-07-02 22:25:00');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (269, 10, 23, 1, 1, 1, 1, '2018-07-02 22:27:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (270, 10, 24, 1, 1, 1, 1, '2018-07-02 22:27:49');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (271, 10, 25, 1, 1, 1, 1, '2018-07-02 22:27:49');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (272, 10, 26, 1, 0, 0, 0, '2018-07-02 22:28:25');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (273, 10, 77, 1, 1, 1, 1, '2018-07-02 22:29:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (274, 10, 27, 1, 1, 0, 1, '2018-07-02 22:30:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (275, 10, 28, 1, 1, 1, 1, '2018-07-02 22:33:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (276, 10, 29, 1, 0, 0, 0, '2018-07-02 22:34:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (277, 10, 30, 1, 0, 0, 0, '2018-07-02 22:34:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (278, 10, 31, 1, 0, 0, 0, '2018-07-02 22:34:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (279, 10, 32, 1, 1, 1, 1, '2018-07-02 22:35:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (280, 10, 33, 1, 1, 1, 1, '2018-07-02 22:36:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (281, 10, 34, 1, 1, 1, 1, '2018-07-02 22:38:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (282, 10, 35, 1, 1, 1, 1, '2018-07-02 22:38:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (283, 10, 104, 1, 1, 1, 1, '2018-07-02 22:40:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (284, 10, 37, 1, 1, 1, 1, '2018-07-02 22:42:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (285, 10, 38, 1, 1, 1, 1, '2018-07-02 22:43:56');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (286, 10, 39, 1, 1, 1, 1, '2018-07-02 22:45:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (287, 10, 40, 1, 1, 1, 1, '2018-07-02 22:47:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (288, 10, 41, 1, 1, 1, 1, '2018-07-02 22:48:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (289, 10, 42, 1, 1, 1, 1, '2018-07-02 22:49:31');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (290, 10, 43, 1, 1, 1, 1, '2018-07-02 22:51:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (291, 10, 44, 1, 0, 0, 0, '2018-07-02 22:52:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (292, 10, 46, 1, 0, 0, 0, '2018-07-02 22:52:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (293, 10, 50, 1, 0, 0, 0, '2018-07-02 22:52:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (294, 10, 51, 1, 0, 0, 0, '2018-07-02 22:52:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (295, 10, 60, 0, 0, 1, 0, '2018-07-02 22:55:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (296, 10, 61, 1, 1, 1, 1, '2018-07-02 22:56:52');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (297, 10, 62, 1, 1, 1, 1, '2018-07-02 22:58:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (298, 10, 63, 1, 1, 0, 0, '2018-07-02 22:59:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (299, 10, 64, 1, 1, 1, 1, '2018-07-02 23:00:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (300, 10, 65, 1, 1, 1, 1, '2018-07-02 23:02:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (301, 10, 66, 1, 1, 1, 1, '2018-07-02 23:02:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (302, 10, 67, 1, 0, 0, 0, '2018-07-02 23:02:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (303, 10, 78, 1, 1, 1, 1, '2018-07-03 21:10:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (307, 1, 126, 1, 0, 0, 0, '2018-07-03 02:26:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (310, 1, 119, 1, 0, 0, 0, '2018-07-03 03:15:00');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (311, 1, 120, 1, 0, 0, 0, '2018-07-03 03:15:00');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (315, 1, 123, 1, 0, 0, 0, '2018-07-03 03:27:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (317, 1, 124, 1, 0, 0, 0, '2018-07-03 03:29:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (320, 1, 47, 1, 0, 0, 0, '2018-07-03 04:01:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (321, 1, 121, 1, 0, 0, 0, '2018-07-03 04:01:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (369, 1, 102, 1, 1, 1, 1, '2019-12-01 22:02:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (372, 10, 79, 1, 1, 0, 0, '2018-07-03 21:10:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (373, 10, 80, 1, 1, 1, 1, '2018-07-03 21:23:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (374, 10, 81, 1, 1, 1, 1, '2018-07-03 21:23:50');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (375, 10, 82, 1, 1, 1, 1, '2018-07-03 21:26:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (376, 10, 83, 1, 1, 1, 1, '2018-07-03 21:27:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (377, 10, 84, 1, 1, 1, 1, '2018-07-03 21:30:26');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (378, 10, 85, 1, 1, 1, 1, '2018-07-03 21:32:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (379, 10, 86, 1, 1, 1, 1, '2018-07-03 21:46:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (380, 10, 87, 1, 0, 0, 0, '2018-07-03 21:49:49');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (381, 10, 88, 1, 1, 1, 0, '2018-07-03 21:51:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (382, 10, 89, 1, 0, 0, 0, '2018-07-03 21:51:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (383, 10, 90, 1, 1, 0, 1, '2018-07-03 21:55:01');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (384, 10, 91, 1, 0, 0, 0, '2018-07-03 21:55:01');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (385, 10, 108, 1, 1, 1, 1, '2018-07-03 21:57:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (386, 10, 109, 1, 1, 1, 1, '2018-07-03 21:58:26');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (387, 10, 110, 1, 1, 1, 1, '2018-07-03 22:02:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (388, 10, 111, 1, 1, 1, 1, '2018-07-03 22:03:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (389, 10, 112, 1, 1, 1, 1, '2018-07-03 22:05:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (390, 10, 127, 1, 0, 0, 0, '2018-07-03 22:05:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (391, 10, 93, 1, 1, 1, 1, '2018-07-03 22:07:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (392, 10, 94, 1, 1, 0, 0, '2018-07-03 22:08:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (394, 10, 95, 1, 0, 0, 0, '2018-07-03 22:08:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (395, 10, 102, 1, 1, 1, 1, '2018-07-03 22:11:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (396, 10, 106, 1, 0, 0, 0, '2018-07-03 22:11:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (397, 10, 113, 1, 0, 0, 0, '2018-07-03 22:12:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (398, 10, 114, 1, 0, 0, 0, '2018-07-03 22:12:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (399, 10, 115, 1, 0, 0, 0, '2018-07-03 22:18:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (400, 10, 116, 1, 0, 0, 0, '2018-07-03 22:18:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (401, 10, 117, 1, 0, 0, 0, '2018-07-03 22:19:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (402, 10, 118, 1, 0, 0, 0, '2018-07-03 22:19:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (434, 1, 125, 1, 0, 0, 0, '2018-07-06 02:59:26');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (435, 1, 96, 1, 1, 1, 1, '2018-07-08 18:03:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (445, 1, 48, 1, 0, 0, 0, '2018-07-06 04:49:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (446, 1, 49, 1, 0, 0, 0, '2018-07-06 04:49:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (461, 1, 97, 1, 0, 0, 0, '2018-07-08 18:00:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (462, 1, 95, 1, 0, 0, 0, '2018-07-08 18:18:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (464, 1, 86, 1, 1, 1, 1, '2019-11-27 23:39:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (474, 1, 130, 1, 1, 0, 1, '2018-07-09 03:56:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (476, 1, 131, 1, 0, 0, 0, '2018-07-08 21:53:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (479, 2, 47, 1, 0, 0, 0, '2018-07-09 23:47:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (480, 2, 105, 1, 0, 0, 0, '2018-07-09 23:47:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (482, 2, 119, 1, 0, 0, 0, '2018-07-09 23:47:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (483, 2, 120, 1, 0, 0, 0, '2018-07-09 23:47:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (486, 2, 16, 1, 0, 0, 0, '2018-07-09 23:47:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (493, 2, 22, 1, 0, 0, 0, '2018-07-11 17:20:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (504, 2, 95, 1, 0, 0, 0, '2018-07-09 23:47:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (513, 3, 72, 1, 0, 0, 0, '2018-07-10 00:07:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (517, 3, 75, 1, 0, 0, 0, '2018-07-10 00:10:38');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (527, 3, 89, 1, 0, 0, 0, '2018-07-10 00:18:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (529, 3, 91, 1, 0, 0, 0, '2018-07-10 00:18:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (549, 3, 124, 1, 0, 0, 0, '2018-07-10 00:22:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (557, 6, 82, 1, 1, 1, 1, '2019-11-30 18:48:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (558, 6, 83, 1, 1, 1, 1, '2019-11-30 18:49:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (559, 6, 84, 1, 1, 1, 1, '2019-11-30 18:49:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (575, 6, 44, 1, 0, 0, 0, '2018-07-10 00:35:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (576, 6, 46, 1, 0, 0, 0, '2018-07-10 00:35:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (578, 6, 102, 1, 1, 1, 1, '2019-11-30 18:52:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (594, 3, 125, 1, 0, 0, 0, '2018-07-10 00:58:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (595, 3, 48, 1, 0, 0, 0, '2018-07-10 00:58:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (596, 3, 49, 1, 0, 0, 0, '2018-07-10 00:58:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (617, 2, 17, 1, 1, 1, 1, '2018-07-10 23:55:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (618, 2, 19, 1, 1, 1, 0, '2018-07-10 23:55:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (620, 2, 76, 1, 1, 1, 0, '2018-07-10 23:55:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (622, 2, 121, 1, 0, 0, 0, '2018-07-10 23:56:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (625, 1, 28, 1, 1, 1, 1, '2019-11-28 23:19:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (628, 6, 22, 1, 0, 0, 0, '2018-07-11 17:23:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (634, 4, 102, 1, 1, 1, 1, '2019-11-30 18:03:00');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (662, 1, 138, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (663, 1, 139, 1, 1, 1, 1, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (664, 1, 140, 1, 1, 1, 1, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (669, 1, 145, 1, 0, 0, 0, '2019-11-25 21:51:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (677, 1, 153, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (690, 1, 166, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (691, 1, 167, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (692, 1, 168, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (693, 1, 170, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (694, 1, 172, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (695, 1, 173, 1, 0, 0, 0, '2019-10-31 19:28:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (720, 1, 216, 1, 0, 0, 0, '2019-11-25 22:24:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (728, 1, 185, 1, 1, 1, 1, '2019-11-27 19:50:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (729, 1, 186, 1, 1, 1, 1, '2019-11-27 19:49:07');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (730, 1, 214, 1, 0, 1, 0, '2019-11-27 18:47:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (732, 1, 198, 1, 0, 0, 0, '2019-11-25 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (733, 1, 199, 1, 0, 0, 0, '2019-11-25 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (734, 1, 200, 1, 0, 0, 0, '2019-11-25 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (735, 1, 201, 1, 0, 0, 0, '2019-11-25 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (736, 1, 202, 1, 0, 0, 0, '2019-11-25 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (737, 1, 203, 1, 0, 0, 0, '2019-11-25 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (739, 1, 218, 1, 0, 0, 0, '2019-11-26 23:36:31');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (743, 1, 218, 1, 0, 0, 0, '2019-11-26 23:36:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (747, 1, 2, 1, 0, 0, 0, '2019-11-27 15:56:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (748, 1, 3, 1, 1, 1, 1, '2019-11-27 15:56:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (749, 1, 4, 1, 1, 1, 1, '2019-11-27 15:56:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (751, 1, 128, 0, 1, 0, 1, '2019-11-27 15:57:01');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (752, 1, 132, 1, 0, 1, 1, '2019-11-27 16:02:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (754, 1, 134, 1, 1, 1, 1, '2019-11-27 16:18:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (755, 1, 5, 1, 1, 0, 1, '2019-11-27 16:35:07');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (756, 1, 6, 1, 0, 0, 0, '2019-11-27 16:35:25');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (757, 1, 7, 1, 1, 1, 1, '2019-11-27 16:36:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (758, 1, 8, 1, 1, 1, 1, '2019-11-27 16:37:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (760, 1, 68, 1, 0, 0, 0, '2019-11-27 16:38:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (761, 1, 69, 1, 1, 1, 1, '2019-11-27 16:39:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (762, 1, 70, 1, 1, 1, 1, '2019-11-27 16:39:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (763, 1, 71, 1, 0, 0, 0, '2019-11-27 16:39:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (764, 1, 72, 1, 0, 0, 0, '2019-11-27 16:40:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (765, 1, 73, 1, 0, 0, 0, '2019-11-27 16:43:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (766, 1, 74, 1, 0, 0, 0, '2019-11-27 16:43:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (768, 1, 11, 1, 0, 0, 0, '2019-11-27 16:45:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (769, 1, 122, 1, 0, 0, 0, '2019-11-27 16:52:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (771, 1, 136, 1, 0, 0, 0, '2019-11-27 16:55:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (772, 1, 20, 1, 1, 1, 1, '2019-11-27 21:06:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (773, 1, 137, 1, 1, 1, 1, '2019-11-27 17:46:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (774, 1, 141, 1, 1, 1, 1, '2019-11-27 17:59:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (775, 1, 142, 1, 0, 0, 0, '2019-11-27 16:56:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (776, 1, 143, 1, 1, 1, 1, '2019-11-27 17:59:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (777, 1, 144, 1, 0, 0, 0, '2019-11-27 16:56:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (778, 1, 187, 1, 0, 0, 0, '2019-11-27 16:56:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (779, 1, 196, 1, 0, 0, 0, '2019-11-27 16:56:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (781, 1, 207, 1, 0, 0, 0, '2019-11-27 16:56:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (782, 1, 208, 1, 0, 1, 0, '2019-11-27 17:10:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (783, 1, 210, 1, 0, 1, 0, '2019-11-27 17:34:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (784, 1, 211, 1, 0, 1, 0, '2019-11-27 17:38:23');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (785, 1, 212, 1, 0, 1, 0, '2019-11-27 17:42:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (786, 1, 205, 1, 1, 1, 1, '2019-11-27 17:42:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (787, 1, 222, 1, 0, 1, 0, '2019-11-27 18:36:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (788, 1, 77, 1, 1, 1, 1, '2019-11-27 23:22:10');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (789, 1, 188, 1, 1, 1, 1, '2019-11-27 23:26:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (790, 1, 23, 1, 1, 1, 1, '2019-11-27 23:34:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (791, 1, 25, 1, 1, 1, 1, '2019-11-27 23:36:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (792, 1, 127, 1, 0, 0, 0, '2019-11-27 23:41:25');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (794, 1, 88, 1, 1, 1, 0, '2019-11-27 23:43:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (795, 1, 90, 1, 1, 0, 1, '2019-11-27 23:46:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (796, 1, 108, 1, 0, 1, 0, '2019-11-28 16:49:01');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (797, 1, 109, 1, 1, 0, 0, '2019-11-28 16:38:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (798, 1, 110, 1, 1, 1, 1, '2019-11-28 16:49:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (799, 1, 111, 1, 1, 1, 1, '2019-11-28 16:49:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (800, 1, 112, 1, 1, 1, 1, '2019-11-28 16:49:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (801, 1, 129, 0, 1, 0, 1, '2019-11-28 16:49:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (802, 1, 189, 1, 0, 1, 1, '2019-11-28 16:59:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (806, 2, 133, 1, 0, 1, 0, '2019-11-28 17:34:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (810, 2, 1, 1, 1, 1, 1, '2019-11-29 19:54:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (813, 1, 133, 1, 0, 1, 0, '2019-11-28 17:39:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (817, 1, 93, 1, 1, 1, 1, '2019-11-28 17:56:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (825, 1, 87, 1, 0, 0, 0, '2019-11-28 17:56:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (829, 1, 94, 1, 1, 0, 0, '2019-11-28 17:57:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (836, 1, 146, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (837, 1, 147, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (838, 1, 148, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (839, 1, 149, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (840, 1, 150, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (841, 1, 151, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (842, 1, 152, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (843, 1, 154, 1, 0, 0, 0, '2019-11-28 18:13:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (862, 1, 155, 1, 0, 0, 0, '2019-11-28 19:07:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (863, 1, 156, 1, 0, 0, 0, '2019-11-28 19:07:52');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (864, 1, 157, 1, 0, 0, 0, '2019-11-28 19:08:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (874, 1, 158, 1, 0, 0, 0, '2019-11-28 19:14:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (875, 1, 159, 1, 0, 0, 0, '2019-11-28 19:14:31');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (876, 1, 160, 1, 0, 0, 0, '2019-11-28 19:14:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (878, 1, 162, 1, 0, 0, 0, '2019-11-28 19:15:58');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (879, 1, 163, 1, 0, 0, 0, '2019-11-28 19:16:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (882, 1, 164, 1, 0, 0, 0, '2019-11-28 19:25:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (884, 1, 165, 1, 0, 0, 0, '2019-11-28 19:25:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (886, 1, 197, 1, 0, 0, 0, '2019-11-28 19:25:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (887, 1, 219, 1, 0, 0, 0, '2019-11-28 19:26:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (889, 1, 220, 1, 0, 0, 0, '2019-11-28 19:26:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (932, 1, 204, 1, 0, 0, 0, '2019-11-28 20:43:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (933, 1, 221, 1, 0, 0, 0, '2019-11-28 20:45:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (934, 1, 178, 1, 0, 0, 0, '2019-11-28 20:45:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (935, 1, 179, 1, 0, 0, 0, '2019-11-28 20:45:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (936, 1, 161, 1, 0, 0, 0, '2019-11-28 20:45:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (937, 1, 180, 1, 0, 0, 0, '2019-11-28 20:45:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (938, 1, 181, 1, 0, 0, 0, '2019-11-28 20:49:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (939, 1, 182, 1, 0, 0, 0, '2019-11-28 20:49:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (940, 1, 183, 1, 0, 0, 0, '2019-11-28 20:49:56');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (941, 1, 174, 1, 0, 0, 0, '2019-11-28 20:50:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (943, 1, 176, 1, 0, 0, 0, '2019-11-28 20:52:10');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (944, 1, 177, 1, 0, 0, 0, '2019-11-28 20:52:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (945, 1, 53, 0, 1, 0, 0, '2019-11-28 20:54:52');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (946, 1, 215, 1, 0, 0, 0, '2019-11-28 21:01:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (947, 1, 213, 1, 0, 0, 0, '2019-11-28 21:07:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (974, 1, 224, 1, 0, 0, 0, '2019-11-28 21:32:52');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (979, 1, 225, 1, 0, 0, 0, '2019-11-28 21:45:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (982, 2, 225, 1, 0, 0, 0, '2019-11-28 21:47:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1026, 1, 135, 1, 0, 1, 0, '2019-11-28 23:02:12');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1031, 1, 228, 1, 0, 0, 0, '2019-11-28 23:21:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1083, 1, 175, 1, 0, 0, 0, '2019-11-29 17:37:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1086, 1, 43, 1, 1, 1, 1, '2019-11-29 17:49:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1087, 1, 44, 1, 0, 0, 0, '2019-11-29 17:49:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1088, 1, 46, 1, 0, 0, 0, '2019-11-29 17:49:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1089, 1, 217, 1, 0, 0, 0, '2019-11-29 17:49:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1090, 1, 98, 1, 1, 1, 1, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1091, 1, 99, 1, 0, 0, 0, '2019-11-29 18:30:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1092, 1, 223, 1, 0, 0, 0, '2019-11-29 18:32:51');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1103, 2, 205, 1, 1, 1, 1, '2019-11-29 18:56:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1105, 2, 23, 1, 0, 0, 0, '2019-11-29 18:56:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1106, 2, 24, 1, 0, 0, 0, '2019-11-29 18:56:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1107, 2, 25, 1, 0, 0, 0, '2019-11-29 18:56:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1108, 2, 77, 1, 0, 0, 0, '2019-11-29 18:56:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1119, 2, 117, 1, 0, 0, 0, '2019-11-29 18:56:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1123, 3, 8, 1, 1, 1, 1, '2019-11-29 23:46:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1125, 3, 69, 1, 1, 1, 1, '2019-11-30 00:00:49');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1126, 3, 70, 1, 1, 1, 1, '2019-11-30 00:04:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1130, 3, 9, 1, 1, 1, 1, '2019-11-30 00:14:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1131, 3, 10, 1, 1, 1, 1, '2019-11-30 00:16:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1134, 3, 35, 1, 1, 1, 1, '2019-11-30 00:25:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1135, 3, 104, 1, 1, 1, 1, '2019-11-30 00:25:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1140, 3, 41, 1, 1, 1, 1, '2019-11-30 00:37:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1141, 3, 42, 1, 1, 1, 1, '2019-11-30 00:37:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1142, 3, 43, 1, 1, 1, 1, '2019-11-30 00:42:06');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1151, 3, 87, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1152, 3, 88, 1, 1, 1, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1153, 3, 90, 1, 1, 0, 1, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1154, 3, 108, 1, 0, 1, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1155, 3, 109, 1, 1, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1156, 3, 110, 1, 1, 1, 1, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1157, 3, 111, 1, 1, 1, 1, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1158, 3, 112, 1, 1, 1, 1, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1159, 3, 127, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1160, 3, 129, 0, 1, 0, 1, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1161, 3, 102, 1, 1, 1, 1, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1162, 3, 106, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1163, 3, 113, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1164, 3, 114, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1165, 3, 115, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1166, 3, 116, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1167, 3, 117, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1168, 3, 118, 1, 0, 0, 0, '2019-11-29 19:23:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1171, 2, 142, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1172, 2, 144, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1179, 2, 212, 1, 0, 1, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1183, 2, 148, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1184, 2, 149, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1185, 2, 150, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1186, 2, 151, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1187, 2, 152, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1188, 2, 153, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1189, 2, 154, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1190, 2, 197, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1191, 2, 198, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1192, 2, 199, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1193, 2, 200, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1194, 2, 201, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1195, 2, 202, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1196, 2, 203, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1197, 2, 219, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1198, 2, 223, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1199, 2, 213, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1201, 2, 230, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1204, 2, 214, 1, 0, 1, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1206, 2, 224, 1, 0, 0, 0, '2019-11-29 19:36:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1208, 2, 2, 1, 0, 0, 0, '2019-11-29 19:55:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1210, 2, 143, 1, 1, 1, 1, '2019-11-29 19:57:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1211, 2, 145, 1, 0, 0, 0, '2019-11-29 19:57:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1214, 2, 3, 1, 1, 1, 1, '2019-11-29 20:03:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1216, 2, 4, 1, 1, 1, 1, '2019-11-29 20:32:56');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1218, 2, 128, 0, 1, 0, 1, '2019-11-29 20:37:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1220, 3, 135, 1, 0, 1, 0, '2019-11-30 00:08:56');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1231, 3, 190, 1, 0, 0, 0, '2019-11-29 20:44:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1232, 3, 192, 1, 0, 0, 0, '2019-11-29 20:44:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1233, 3, 226, 1, 0, 0, 0, '2019-11-29 20:44:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1234, 3, 227, 1, 0, 0, 0, '2019-11-29 20:44:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1235, 3, 224, 1, 0, 0, 0, '2019-11-29 20:44:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1236, 2, 15, 1, 1, 1, 0, '2019-11-29 20:54:25');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1239, 2, 122, 1, 0, 0, 0, '2019-11-29 20:57:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1240, 2, 136, 1, 0, 0, 0, '2019-11-29 20:57:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1242, 6, 217, 1, 0, 0, 0, '2019-11-29 21:00:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1243, 6, 224, 1, 0, 0, 0, '2019-11-29 21:00:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1245, 2, 20, 1, 1, 1, 1, '2019-11-29 21:01:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1246, 2, 137, 1, 1, 1, 1, '2019-11-29 21:02:40');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1248, 2, 141, 1, 1, 1, 1, '2019-11-29 21:04:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1250, 2, 187, 1, 0, 0, 0, '2019-11-29 21:11:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1252, 2, 207, 1, 0, 0, 0, '2019-11-29 21:21:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1253, 2, 208, 1, 0, 1, 0, '2019-11-29 21:22:00');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1255, 2, 210, 1, 0, 1, 0, '2019-11-29 21:22:58');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1256, 2, 211, 1, 0, 1, 0, '2019-11-29 21:24:03');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1257, 2, 21, 1, 0, 0, 0, '2019-11-29 21:32:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1259, 2, 188, 1, 0, 0, 0, '2019-11-29 21:34:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1260, 2, 27, 1, 0, 0, 0, '2019-11-29 21:36:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1262, 2, 43, 1, 1, 1, 1, '2019-11-29 21:39:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1263, 2, 44, 1, 0, 0, 0, '2019-11-29 21:41:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1264, 2, 46, 1, 0, 0, 0, '2019-11-29 21:41:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1265, 2, 217, 1, 0, 0, 0, '2019-11-29 21:41:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1266, 2, 146, 1, 0, 0, 0, '2019-11-29 21:46:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1267, 2, 147, 1, 0, 0, 0, '2019-11-29 21:47:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1269, 2, 164, 1, 0, 0, 0, '2019-11-29 21:51:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1271, 2, 109, 1, 1, 0, 0, '2019-11-29 22:03:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1272, 2, 93, 1, 1, 1, 1, '2019-11-29 22:07:25');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1273, 2, 94, 1, 1, 0, 0, '2019-11-29 22:07:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1275, 2, 102, 1, 1, 1, 1, '2019-11-29 22:11:22');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1277, 2, 196, 1, 0, 0, 0, '2019-11-29 22:15:01');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1278, 2, 195, 1, 0, 0, 0, '2019-11-29 22:19:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1279, 2, 185, 1, 1, 1, 1, '2019-11-29 22:21:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1280, 2, 186, 1, 1, 1, 1, '2019-11-29 22:22:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1281, 2, 222, 1, 0, 1, 0, '2019-11-29 22:24:30');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1283, 3, 5, 1, 1, 0, 1, '2019-11-29 23:43:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1284, 3, 6, 1, 0, 0, 0, '2019-11-29 23:43:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1285, 3, 7, 1, 1, 1, 1, '2019-11-29 23:44:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1286, 3, 68, 1, 0, 0, 0, '2019-11-29 23:46:58');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1287, 3, 71, 1, 0, 0, 0, '2019-11-30 00:05:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1288, 3, 73, 1, 0, 0, 0, '2019-11-30 00:05:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1289, 3, 74, 1, 0, 0, 0, '2019-11-30 00:06:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1290, 3, 11, 1, 0, 0, 0, '2019-11-30 00:16:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1291, 3, 12, 1, 1, 1, 1, '2019-11-30 00:19:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1292, 3, 13, 1, 1, 1, 1, '2019-11-30 00:22:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1294, 3, 14, 1, 0, 0, 0, '2019-11-30 00:22:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1295, 3, 31, 1, 1, 1, 1, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1297, 3, 37, 1, 1, 1, 1, '2019-11-30 00:28:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1298, 3, 38, 1, 1, 1, 1, '2019-11-30 00:29:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1299, 3, 39, 1, 1, 1, 1, '2019-11-30 00:30:07');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1300, 3, 40, 1, 1, 1, 1, '2019-11-30 00:32:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1301, 3, 44, 1, 0, 0, 0, '2019-11-30 00:44:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1302, 3, 46, 1, 0, 0, 0, '2019-11-30 00:44:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1303, 3, 217, 1, 0, 0, 0, '2019-11-30 00:44:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1304, 3, 155, 1, 0, 0, 0, '2019-11-30 00:44:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1305, 3, 156, 1, 0, 0, 0, '2019-11-30 00:45:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1306, 3, 157, 1, 0, 0, 0, '2019-11-30 00:45:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1307, 3, 158, 1, 0, 0, 0, '2019-11-30 00:46:07');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1308, 3, 159, 1, 0, 0, 0, '2019-11-30 00:46:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1309, 3, 160, 1, 0, 0, 0, '2019-11-30 00:46:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1313, 3, 161, 1, 0, 0, 0, '2019-11-30 00:48:26');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1314, 3, 162, 1, 0, 0, 0, '2019-11-30 00:48:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1315, 3, 163, 1, 0, 0, 0, '2019-11-30 00:48:48');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1316, 3, 164, 1, 0, 0, 0, '2019-11-30 00:49:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1317, 3, 165, 1, 0, 0, 0, '2019-11-30 00:49:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1318, 3, 174, 1, 0, 0, 0, '2019-11-30 00:49:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1319, 3, 175, 1, 0, 0, 0, '2019-11-30 00:49:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1320, 3, 181, 1, 0, 0, 0, '2019-11-30 00:50:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1321, 3, 86, 1, 1, 1, 1, '2019-11-30 00:54:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1322, 4, 28, 1, 1, 1, 1, '2019-11-30 17:52:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1324, 4, 29, 1, 0, 0, 0, '2019-11-30 17:53:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1325, 4, 30, 1, 0, 0, 0, '2019-11-30 17:53:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1326, 4, 123, 1, 0, 0, 0, '2019-11-30 17:54:26');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1327, 4, 228, 1, 0, 0, 0, '2019-11-30 17:54:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1328, 4, 43, 1, 1, 1, 1, '2019-11-30 17:58:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1332, 4, 44, 1, 0, 0, 0, '2019-11-30 17:59:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1333, 4, 46, 1, 0, 0, 0, '2019-11-30 17:59:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1334, 4, 217, 1, 0, 0, 0, '2019-11-30 17:59:16');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1335, 4, 178, 1, 0, 0, 0, '2019-11-30 17:59:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1336, 4, 179, 1, 0, 0, 0, '2019-11-30 18:00:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1337, 4, 180, 1, 0, 0, 0, '2019-11-30 18:00:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1338, 4, 221, 1, 0, 0, 0, '2019-11-30 18:00:46');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1339, 4, 86, 1, 0, 0, 0, '2019-11-30 18:01:02');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1341, 4, 106, 1, 0, 0, 0, '2019-11-30 18:05:21');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1342, 1, 107, 1, 0, 0, 0, '2019-11-30 18:06:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1343, 4, 117, 1, 0, 0, 0, '2019-11-30 18:10:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1344, 4, 194, 1, 0, 0, 0, '2019-11-30 18:11:35');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1348, 4, 230, 1, 0, 0, 0, '2019-11-30 18:19:15');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1350, 6, 1, 1, 0, 0, 0, '2019-11-30 18:35:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1351, 6, 21, 1, 0, 0, 0, '2019-11-30 18:36:29');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1352, 6, 23, 1, 0, 0, 0, '2019-11-30 18:36:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1353, 6, 24, 1, 0, 0, 0, '2019-11-30 18:37:05');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1354, 6, 25, 1, 0, 0, 0, '2019-11-30 18:37:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1355, 6, 77, 1, 0, 0, 0, '2019-11-30 18:38:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1356, 6, 188, 1, 0, 0, 0, '2019-11-30 18:38:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1357, 6, 43, 1, 1, 1, 1, '2019-11-30 18:40:44');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1358, 6, 78, 1, 1, 1, 1, '2019-11-30 18:43:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1360, 6, 79, 1, 1, 0, 1, '2019-11-30 18:44:39');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1361, 6, 80, 1, 1, 1, 1, '2019-11-30 18:45:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1362, 6, 81, 1, 1, 1, 1, '2019-11-30 18:47:50');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1363, 6, 85, 1, 1, 1, 1, '2019-11-30 18:50:43');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1364, 6, 86, 1, 0, 0, 0, '2019-11-30 18:51:10');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1365, 6, 106, 1, 0, 0, 0, '2019-11-30 18:52:55');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1366, 6, 117, 1, 0, 0, 0, '2019-11-30 18:53:08');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1394, 1, 106, 1, 0, 0, 0, '2019-12-01 22:20:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1395, 1, 113, 1, 0, 0, 0, '2019-12-01 22:20:59');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1396, 1, 114, 1, 0, 0, 0, '2019-12-01 22:21:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1397, 1, 115, 1, 0, 0, 0, '2019-12-01 22:21:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1398, 1, 116, 1, 0, 0, 0, '2019-12-01 22:21:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1399, 1, 117, 1, 0, 0, 0, '2019-12-01 22:22:04');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1400, 1, 118, 1, 0, 0, 0, '2019-12-01 22:22:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1402, 1, 191, 1, 0, 0, 0, '2019-12-01 22:23:34');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1403, 1, 192, 1, 0, 0, 0, '2019-12-01 22:23:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1404, 1, 193, 1, 0, 0, 0, '2019-12-01 22:23:58');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1405, 1, 194, 1, 0, 0, 0, '2019-12-01 22:24:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1406, 1, 195, 1, 0, 0, 0, '2019-12-01 22:24:20');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1408, 1, 227, 1, 0, 0, 0, '2019-12-01 22:25:47');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1410, 1, 226, 1, 0, 0, 0, '2019-12-01 22:31:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1411, 1, 229, 1, 0, 0, 0, '2019-12-01 22:32:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1412, 1, 230, 1, 0, 0, 0, '2019-12-01 22:32:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1413, 1, 190, 1, 0, 0, 0, '2019-12-01 22:43:41');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1414, 2, 174, 1, 0, 0, 0, '2019-12-01 22:54:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1415, 2, 175, 1, 0, 0, 0, '2019-12-01 22:54:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1418, 2, 232, 1, 0, 1, 1, '2019-12-01 23:11:27');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1419, 2, 231, 1, 0, 0, 0, '2019-12-01 23:12:28');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1420, 1, 231, 1, 0, 0, 0, '2019-12-01 23:19:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1421, 1, 232, 1, 0, 1, 1, '2019-12-01 23:19:32');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1422, 3, 32, 1, 1, 1, 1, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1423, 3, 33, 1, 1, 1, 1, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1424, 3, 34, 1, 1, 1, 1, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1425, 3, 182, 1, 0, 0, 0, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1426, 3, 183, 1, 0, 0, 0, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1427, 3, 189, 1, 0, 1, 1, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1428, 3, 229, 1, 0, 0, 0, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1429, 3, 230, 1, 0, 0, 0, '2019-12-01 23:30:37');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1430, 4, 213, 1, 0, 0, 0, '2019-12-01 23:32:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1432, 4, 224, 1, 0, 0, 0, '2019-12-01 23:32:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1433, 4, 195, 1, 0, 0, 0, '2019-12-02 21:57:53');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1434, 4, 229, 1, 0, 0, 0, '2019-12-02 21:58:19');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1436, 6, 213, 1, 0, 0, 0, '2019-12-02 22:10:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1437, 6, 191, 1, 0, 0, 0, '2019-12-02 22:10:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1438, 6, 193, 1, 0, 0, 0, '2019-12-02 22:10:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1439, 6, 230, 1, 0, 0, 0, '2019-12-02 22:10:11');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1440, 2, 106, 1, 0, 0, 0, '2020-01-24 21:21:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1441, 2, 107, 1, 0, 0, 0, '2020-02-11 19:10:13');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1442, 2, 134, 1, 1, 1, 1, '2020-02-11 19:12:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1443, 1, 233, 1, 0, 0, 0, '2020-02-11 19:21:57');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1444, 2, 86, 1, 0, 0, 0, '2020-02-11 19:22:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1445, 3, 233, 1, 0, 0, 0, '2020-02-11 20:51:17');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1446, 1, 234, 1, 1, 1, 1, '2020-06-01 14:51:09');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1447, 1, 235, 1, 1, 1, 1, '2020-05-29 16:17:01');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1448, 1, 236, 1, 1, 1, 0, '2020-05-29 16:17:52');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1449, 1, 237, 1, 0, 1, 0, '2020-05-29 16:18:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1450, 1, 238, 1, 1, 1, 1, '2020-05-29 16:19:52');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1451, 1, 239, 1, 1, 1, 1, '2020-05-29 16:22:10');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1452, 2, 236, 1, 1, 1, 0, '2020-05-29 16:40:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1453, 2, 237, 1, 0, 1, 0, '2020-05-29 16:40:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1454, 2, 238, 1, 1, 1, 1, '2020-05-29 16:40:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1455, 2, 239, 1, 1, 1, 1, '2020-05-29 16:40:33');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1456, 2, 240, 1, 0, 0, 0, '2020-05-28 13:51:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1457, 2, 241, 1, 0, 0, 0, '2020-05-28 13:51:18');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1458, 1, 240, 1, 0, 0, 0, '2020-06-07 11:30:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1459, 1, 241, 1, 0, 0, 0, '2020-06-07 11:30:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1460, 1, 242, 1, 0, 0, 0, '2020-06-07 11:30:42');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1461, 2, 242, 1, 0, 0, 0, '2020-06-11 15:45:24');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1462, 3, 242, 1, 0, 0, 0, '2020-06-14 15:46:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1463, 6, 242, 1, 0, 0, 0, '2020-06-14 15:48:14');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1464, 1, 243, 1, 0, 0, 0, '2020-09-11 23:05:45');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1465, 1, 109, 1, 1, 0, 0, '2020-09-20 23:33:50');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1466, 1, 108, 1, 1, 1, 1, '2020-09-20 23:50:36');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1467, 1, 244, 1, 0, 0, 0, '2020-09-20 23:59:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1468, 1, 245, 1, 0, 0, 0, '2020-09-20 23:59:54');
INSERT INTO `roles_permissions` (`id`, `role_id`, `perm_cat_id`, `can_view`, `can_add`, `can_edit`, `can_delete`, `created_at`) VALUES (1469, 1, 246, 1, 0, 0, 0, '2020-09-20 23:59:54');


#
# TABLE STRUCTURE FOR: room_types
#

DROP TABLE IF EXISTS `room_types`;

CREATE TABLE `room_types` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `room_type` varchar(200) DEFAULT NULL,
  `description` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: sch_settings
#

DROP TABLE IF EXISTS `sch_settings`;

CREATE TABLE `sch_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `biometric` int(11) DEFAULT '0',
  `biometric_device` text,
  `email` varchar(100) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `address` text,
  `lang_id` int(11) DEFAULT NULL,
  `languages` varchar(500) NOT NULL,
  `dise_code` varchar(50) DEFAULT NULL,
  `date_format` varchar(50) NOT NULL,
  `time_format` varchar(255) NOT NULL,
  `currency` varchar(50) NOT NULL,
  `currency_symbol` varchar(50) NOT NULL,
  `is_rtl` varchar(10) DEFAULT 'disabled',
  `is_duplicate_fees_invoice` int(1) DEFAULT '0',
  `timezone` varchar(30) DEFAULT 'UTC',
  `session_id` int(11) DEFAULT NULL,
  `cron_secret_key` varchar(100) NOT NULL,
  `currency_place` varchar(50) NOT NULL DEFAULT 'before_number',
  `class_teacher` varchar(100) NOT NULL,
  `start_month` varchar(40) NOT NULL,
  `attendence_type` int(10) NOT NULL DEFAULT '0',
  `image` varchar(100) DEFAULT NULL,
  `admin_logo` varchar(255) NOT NULL,
  `admin_small_logo` varchar(255) NOT NULL,
  `theme` varchar(200) NOT NULL DEFAULT 'default.jpg',
  `fee_due_days` int(3) DEFAULT '0',
  `adm_auto_insert` int(1) NOT NULL DEFAULT '1',
  `adm_prefix` varchar(50) NOT NULL DEFAULT 'ssadm19/20',
  `adm_start_from` varchar(11) NOT NULL,
  `adm_no_digit` int(10) NOT NULL DEFAULT '6',
  `adm_update_status` int(11) NOT NULL DEFAULT '0',
  `staffid_auto_insert` int(11) NOT NULL DEFAULT '1',
  `staffid_prefix` varchar(100) NOT NULL DEFAULT 'staffss/19/20',
  `staffid_start_from` varchar(50) NOT NULL,
  `staffid_no_digit` int(11) NOT NULL DEFAULT '6',
  `staffid_update_status` int(11) NOT NULL DEFAULT '0',
  `is_active` varchar(255) DEFAULT 'no',
  `online_admission` int(1) DEFAULT '0',
  `is_blood_group` int(10) NOT NULL DEFAULT '1',
  `is_student_house` int(10) NOT NULL DEFAULT '1',
  `roll_no` int(11) NOT NULL DEFAULT '1',
  `category` int(11) NOT NULL,
  `religion` int(11) NOT NULL DEFAULT '1',
  `cast` int(11) NOT NULL DEFAULT '1',
  `mobile_no` int(11) NOT NULL DEFAULT '1',
  `student_email` int(11) NOT NULL DEFAULT '1',
  `admission_date` int(11) NOT NULL DEFAULT '1',
  `lastname` int(11) NOT NULL,
  `student_photo` int(11) NOT NULL DEFAULT '1',
  `student_height` int(11) NOT NULL DEFAULT '1',
  `student_weight` int(11) NOT NULL DEFAULT '1',
  `measurement_date` int(11) NOT NULL DEFAULT '1',
  `father_name` int(11) NOT NULL DEFAULT '1',
  `father_phone` int(11) NOT NULL DEFAULT '1',
  `father_occupation` int(11) NOT NULL DEFAULT '1',
  `father_pic` int(11) NOT NULL DEFAULT '1',
  `mother_name` int(11) NOT NULL DEFAULT '1',
  `mother_phone` int(11) NOT NULL DEFAULT '1',
  `mother_occupation` int(11) NOT NULL DEFAULT '1',
  `mother_pic` int(11) NOT NULL DEFAULT '1',
  `guardian_relation` int(11) NOT NULL DEFAULT '1',
  `guardian_email` int(11) NOT NULL DEFAULT '1',
  `guardian_pic` int(11) NOT NULL DEFAULT '1',
  `guardian_address` int(11) NOT NULL DEFAULT '1',
  `current_address` int(11) NOT NULL DEFAULT '1',
  `permanent_address` int(11) NOT NULL DEFAULT '1',
  `route_list` int(11) NOT NULL DEFAULT '1',
  `hostel_id` int(11) NOT NULL DEFAULT '1',
  `bank_account_no` int(11) NOT NULL DEFAULT '1',
  `national_identification_no` int(11) NOT NULL DEFAULT '1',
  `local_identification_no` int(11) NOT NULL DEFAULT '1',
  `rte` int(11) NOT NULL DEFAULT '1',
  `previous_school_details` int(11) NOT NULL DEFAULT '1',
  `student_note` int(11) NOT NULL DEFAULT '1',
  `upload_documents` int(11) NOT NULL DEFAULT '1',
  `staff_designation` int(11) NOT NULL DEFAULT '1',
  `staff_department` int(11) NOT NULL DEFAULT '1',
  `staff_last_name` int(11) NOT NULL DEFAULT '1',
  `staff_father_name` int(11) NOT NULL DEFAULT '1',
  `staff_mother_name` int(11) NOT NULL DEFAULT '1',
  `staff_date_of_joining` int(11) NOT NULL DEFAULT '1',
  `staff_phone` int(11) NOT NULL DEFAULT '1',
  `staff_emergency_contact` int(11) NOT NULL DEFAULT '1',
  `staff_marital_status` int(11) NOT NULL DEFAULT '1',
  `staff_photo` int(11) NOT NULL DEFAULT '1',
  `staff_current_address` int(11) NOT NULL DEFAULT '1',
  `staff_permanent_address` int(11) NOT NULL DEFAULT '1',
  `staff_qualification` int(11) NOT NULL DEFAULT '1',
  `staff_work_experience` int(11) NOT NULL DEFAULT '1',
  `staff_note` int(11) NOT NULL DEFAULT '1',
  `staff_epf_no` int(11) NOT NULL DEFAULT '1',
  `staff_basic_salary` int(11) NOT NULL DEFAULT '1',
  `staff_contract_type` int(11) NOT NULL DEFAULT '1',
  `staff_work_shift` int(11) NOT NULL DEFAULT '1',
  `staff_work_location` int(11) NOT NULL DEFAULT '1',
  `staff_leaves` int(11) NOT NULL DEFAULT '1',
  `staff_account_details` int(11) NOT NULL DEFAULT '1',
  `staff_social_media` int(11) NOT NULL DEFAULT '1',
  `staff_upload_documents` int(11) NOT NULL DEFAULT '1',
  `mobile_api_url` tinytext NOT NULL,
  `app_primary_color_code` varchar(20) DEFAULT NULL,
  `app_secondary_color_code` varchar(20) DEFAULT NULL,
  `app_logo` varchar(250) DEFAULT NULL,
  `student_profile_edit` int(1) NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `lang_id` (`lang_id`),
  KEY `session_id` (`session_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `sch_settings` (`id`, `name`, `biometric`, `biometric_device`, `email`, `phone`, `address`, `lang_id`, `languages`, `dise_code`, `date_format`, `time_format`, `currency`, `currency_symbol`, `is_rtl`, `is_duplicate_fees_invoice`, `timezone`, `session_id`, `cron_secret_key`, `currency_place`, `class_teacher`, `start_month`, `attendence_type`, `image`, `admin_logo`, `admin_small_logo`, `theme`, `fee_due_days`, `adm_auto_insert`, `adm_prefix`, `adm_start_from`, `adm_no_digit`, `adm_update_status`, `staffid_auto_insert`, `staffid_prefix`, `staffid_start_from`, `staffid_no_digit`, `staffid_update_status`, `is_active`, `online_admission`, `is_blood_group`, `is_student_house`, `roll_no`, `category`, `religion`, `cast`, `mobile_no`, `student_email`, `admission_date`, `lastname`, `student_photo`, `student_height`, `student_weight`, `measurement_date`, `father_name`, `father_phone`, `father_occupation`, `father_pic`, `mother_name`, `mother_phone`, `mother_occupation`, `mother_pic`, `guardian_relation`, `guardian_email`, `guardian_pic`, `guardian_address`, `current_address`, `permanent_address`, `route_list`, `hostel_id`, `bank_account_no`, `national_identification_no`, `local_identification_no`, `rte`, `previous_school_details`, `student_note`, `upload_documents`, `staff_designation`, `staff_department`, `staff_last_name`, `staff_father_name`, `staff_mother_name`, `staff_date_of_joining`, `staff_phone`, `staff_emergency_contact`, `staff_marital_status`, `staff_photo`, `staff_current_address`, `staff_permanent_address`, `staff_qualification`, `staff_work_experience`, `staff_note`, `staff_epf_no`, `staff_basic_salary`, `staff_contract_type`, `staff_work_shift`, `staff_work_location`, `staff_leaves`, `staff_account_details`, `staff_social_media`, `staff_upload_documents`, `mobile_api_url`, `app_primary_color_code`, `app_secondary_color_code`, `app_logo`, `student_profile_edit`, `created_at`, `updated_at`) VALUES (1, 'Hira Model School', 0, '', 'yourschoolemail@domain.com', '03219733652', 'Main Swabi Road Jehangira', 4, '[\"4\"]', '121020', 'm/d/Y', '12-hour', 'USD', '$', 'disabled', 0, 'UTC', 15, '', 'after_number', 'no', '4', 0, '1.png', '1.png', '1.png', 'default.jpg', 60, 0, '', '', 0, 1, 0, '', '', 0, 1, 'no', 0, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', '#424242', '#eeeeee', '1.png', 0, '2021-09-27 06:40:57', NULL);


#
# TABLE STRUCTURE FOR: school_houses
#

DROP TABLE IF EXISTS `school_houses`;

CREATE TABLE `school_houses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `house_name` varchar(200) NOT NULL,
  `description` varchar(400) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: sections
#

DROP TABLE IF EXISTS `sections`;

CREATE TABLE `sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section` varchar(60) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

INSERT INTO `sections` (`id`, `section`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Year 1 A', 'no', '2021-09-30 01:53:29', NULL);
INSERT INTO `sections` (`id`, `section`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Year 1 B', 'no', '2021-09-30 01:53:38', NULL);
INSERT INTO `sections` (`id`, `section`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Year 2 A', 'no', '2021-09-30 01:53:47', NULL);
INSERT INTO `sections` (`id`, `section`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Year 2 B', 'no', '2021-09-30 01:53:59', NULL);
INSERT INTO `sections` (`id`, `section`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Year 3 A', 'no', '2021-09-30 01:54:12', NULL);
INSERT INTO `sections` (`id`, `section`, `is_active`, `created_at`, `updated_at`) VALUES (6, 'Year 3 B', 'no', '2021-09-30 01:54:21', NULL);


#
# TABLE STRUCTURE FOR: send_notification
#

DROP TABLE IF EXISTS `send_notification`;

CREATE TABLE `send_notification` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(50) DEFAULT NULL,
  `publish_date` date DEFAULT NULL,
  `date` date DEFAULT NULL,
  `message` text,
  `visible_student` varchar(10) NOT NULL DEFAULT 'no',
  `visible_staff` varchar(10) NOT NULL DEFAULT 'no',
  `visible_parent` varchar(10) NOT NULL DEFAULT 'no',
  `created_by` varchar(60) DEFAULT NULL,
  `created_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: sessions
#

DROP TABLE IF EXISTS `sessions`;

CREATE TABLE `sessions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session` varchar(60) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (7, '2016-17', 'no', '2017-04-19 23:42:19', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (11, '2017-18', 'no', '2017-04-19 23:41:37', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (13, '2018-19', 'no', '2016-08-24 12:26:44', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (14, '2019-20', 'no', '2016-08-24 12:26:55', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (15, '2020-21', 'no', '2016-09-30 22:28:08', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (16, '2021-22', 'no', '2016-09-30 22:28:20', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (18, '2022-23', 'no', '2016-09-30 22:29:02', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (19, '2023-24', 'no', '2016-09-30 22:29:10', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (20, '2024-25', 'no', '2016-09-30 22:29:18', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (21, '2025-26', 'no', '2016-09-30 22:30:10', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (22, '2026-27', 'no', '2016-09-30 22:30:18', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (23, '2027-28', 'no', '2016-09-30 22:30:24', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (24, '2028-29', 'no', '2016-09-30 22:30:30', '0000-00-00');
INSERT INTO `sessions` (`id`, `session`, `is_active`, `created_at`, `updated_at`) VALUES (25, '2029-30', 'no', '2016-09-30 22:30:37', '0000-00-00');


#
# TABLE STRUCTURE FOR: sms_config
#

DROP TABLE IF EXISTS `sms_config`;

CREATE TABLE `sms_config` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(50) NOT NULL,
  `name` varchar(100) NOT NULL,
  `api_id` varchar(100) NOT NULL,
  `authkey` varchar(100) NOT NULL,
  `senderid` varchar(100) NOT NULL,
  `contact` text,
  `username` varchar(150) DEFAULT NULL,
  `url` varchar(150) DEFAULT NULL,
  `password` varchar(150) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'disabled',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: source
#

DROP TABLE IF EXISTS `source`;

CREATE TABLE `source` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff
#

DROP TABLE IF EXISTS `staff`;

CREATE TABLE `staff` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `employee_id` varchar(200) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `department` int(11) DEFAULT '0',
  `designation` int(11) DEFAULT '0',
  `qualification` varchar(200) NOT NULL,
  `work_exp` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `father_name` varchar(200) NOT NULL,
  `mother_name` varchar(200) NOT NULL,
  `contact_no` varchar(200) NOT NULL,
  `emergency_contact_no` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `dob` date NOT NULL,
  `marital_status` varchar(100) NOT NULL,
  `date_of_joining` date NOT NULL,
  `date_of_leaving` date NOT NULL,
  `local_address` varchar(300) NOT NULL,
  `permanent_address` varchar(200) NOT NULL,
  `note` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `password` varchar(250) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `account_title` varchar(200) NOT NULL,
  `bank_account_no` varchar(200) NOT NULL,
  `bank_name` varchar(200) NOT NULL,
  `ifsc_code` varchar(200) NOT NULL,
  `bank_branch` varchar(100) NOT NULL,
  `payscale` varchar(200) NOT NULL,
  `basic_salary` varchar(200) NOT NULL,
  `epf_no` varchar(200) NOT NULL,
  `contract_type` varchar(100) NOT NULL,
  `shift` varchar(100) NOT NULL,
  `location` varchar(100) NOT NULL,
  `facebook` varchar(200) NOT NULL,
  `twitter` varchar(200) NOT NULL,
  `linkedin` varchar(200) NOT NULL,
  `instagram` varchar(200) NOT NULL,
  `resume` varchar(200) NOT NULL,
  `joining_letter` varchar(200) NOT NULL,
  `resignation_letter` varchar(200) NOT NULL,
  `other_document_name` varchar(200) NOT NULL,
  `other_document_file` varchar(200) NOT NULL,
  `user_id` int(11) NOT NULL,
  `is_active` int(11) NOT NULL,
  `verification_code` varchar(100) NOT NULL,
  `disable_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `employee_id` (`employee_id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (1, '9000', 0, 0, 0, '', '', 'Super Admin', '', '', '', '', '', 'info@1pixelcoding.com', '2020-01-01', '', '0000-00-00', '0000-00-00', '', '', '', '', '$2y$10$R.jn9BRSBXhGSPrjTGo7S.aTHp4JwxIo1Oiw2eGb6iR/az/fEM7zK', 'Male', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 0, 1, '', NULL);
INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (2, '1', 0, 3, 9, 'MSC', 'Teaching', 'Iqbal ', 'Shah', 'Rasool Shah', '', '3219766639', '3219766639', 'iqbal@yopmal.com', '0000-00-00', 'Married', '0000-00-00', '0000-00-00', 'Mohalla Aba Khel Nowshera City', 'Mohalla Aba Khel Nowshera City', '', '', '$2y$10$M3aZOKcTfKBOaYMiHe6XBeW6GDLmClc3JnUhpvkzieEq2fczSga3G', 'Male', '', '', '', '', '', '16', '25200', '', 'Permenant', 'Morning', 'Jehangira', '', '', '', '', '', '', '', '', '', 2, 1, '', NULL);
INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (3, '2', 0, 3, 9, 'MSC', 'Teaching', 'Munawar', 'Kamal', 'Kamal Khan', '', '3456677055', '3456677055', 'kamal@yopmail.com', '0000-00-00', 'Married', '0000-00-00', '0000-00-00', 'Mohalla Khato Khel Nowshera City', 'Mohalla Khato Khel Nowshera City', '', '', '$2y$10$UxaMCd/UrlOU7bzQLSjN0uYnp/5SkYmHGc5IKKps5xMW0XCgqJ2Km', 'Male', '', '', '', '', '', '16', '25200', '', 'Permenant', 'Morning', 'Jehangira', '', '', '', '', '', '', '', '', '', 2, 1, '', NULL);
INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (4, '3', 0, 3, 9, 'MSC', 'Teaching', 'Aseem ', 'Khan', 'Naseeb Khan', '', '3489668855', '3489668855', 'aseem@yopmail.com', '0000-00-00', 'Married', '0000-00-00', '0000-00-00', 'Village and Post Office Wattar, Nowshera', 'Village and Post Office Wattar, Nowshera', '', '', '$2y$10$hke7xypsDWepRFQLYiko4.w4CpKlv5h.jI9iGGfzG95ZpEVISrO2i', 'Male', '', '', '', '', '', '16', '20100', '', 'Permenant', 'Morning', 'Jehangira', '', '', '', '', '', '', '', '', '', 2, 1, '', NULL);
INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (5, '4', 0, 3, 9, 'MSC', 'Teaching', 'Zaka', 'Ullah', 'Atta Ullah Khan', '', '3416420635', '3416420635', 'zaka@yopmail.com', '0000-00-00', 'Married', '0000-00-00', '0000-00-00', 'Railway Phattak, Korona, Akora Khattak, Nowshera', 'Railway Phattak, Korona, Akora Khattak, Nowshera', '', '', '$2y$10$trEVGMIRUIZnVDRGTceQ1.XT1CjaltXM3zD9o3NGoA6yQm1WAXTx6', 'Male', '', '', '', '', '', '16', '19800', '', 'Permenant', 'Morning', 'Jehangira', '', '', '', '', '', '', '', '', '', 2, 1, '', NULL);
INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (6, '5', 0, 3, 9, 'MSC', 'Teaching', 'Irshad', 'Azeem', 'Azeem Khan', '', '3216477253', '3216477253', 'irshad@yopmail.com', '0000-00-00', 'Married', '0000-00-00', '0000-00-00', 'Mohalla Zwani Khel, Nowshera City', 'Mohalla Zwani Khel, Nowshera City', '', '', '$2y$10$FW8x1cDZGccJG2j7456vweiSWxeM/ZsWLhxorMiJuBKn.ym7Mcmhy', 'Male', '', '', '', '', '', '16', '21350', '', 'Permenant', 'Morning', 'Jehangira', '', '', '', '', '', '', '', '', '', 2, 1, '', NULL);
INSERT INTO `staff` (`id`, `employee_id`, `lang_id`, `department`, `designation`, `qualification`, `work_exp`, `name`, `surname`, `father_name`, `mother_name`, `contact_no`, `emergency_contact_no`, `email`, `dob`, `marital_status`, `date_of_joining`, `date_of_leaving`, `local_address`, `permanent_address`, `note`, `image`, `password`, `gender`, `account_title`, `bank_account_no`, `bank_name`, `ifsc_code`, `bank_branch`, `payscale`, `basic_salary`, `epf_no`, `contract_type`, `shift`, `location`, `facebook`, `twitter`, `linkedin`, `instagram`, `resume`, `joining_letter`, `resignation_letter`, `other_document_name`, `other_document_file`, `user_id`, `is_active`, `verification_code`, `disable_at`) VALUES (7, '6', 0, 3, 9, 'MSC', 'Teaching', 'Zafar ', 'Iqbal', 'Iqbal Muhammad', '', '3416542278', '3416542278', 'zafar@yopmail.com', '0000-00-00', 'Married', '0000-00-00', '0000-00-00', 'Mohalla Afzal Abad, Khandari, Nowshera', 'Mohalla Afzal Abad, Khandari, Nowshera', '', '', '$2y$10$w/83kjiM6h2NcfnkpSZV9OphWzoAbt6cJmBWK8Jm/kx6rUPhqJ81S', 'Male', '', '', '', '', '', '16', '18250', '', 'Permenant', 'Morning', 'Jehangira', '', '', '', '', '', '', '', '', '', 2, 1, '', NULL);


#
# TABLE STRUCTURE FOR: staff_attendance
#

DROP TABLE IF EXISTS `staff_attendance`;

CREATE TABLE `staff_attendance` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `date` date NOT NULL,
  `staff_id` int(11) NOT NULL,
  `staff_attendance_type_id` int(11) NOT NULL,
  `remark` varchar(200) NOT NULL,
  `is_active` int(11) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_staff_attendance_staff` (`staff_id`),
  KEY `FK_staff_attendance_staff_attendance_type` (`staff_attendance_type_id`),
  CONSTRAINT `FK_staff_attendance_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_staff_attendance_staff_attendance_type` FOREIGN KEY (`staff_attendance_type_id`) REFERENCES `staff_attendance_type` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_attendance_type
#

DROP TABLE IF EXISTS `staff_attendance_type`;

CREATE TABLE `staff_attendance_type` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `type` varchar(200) NOT NULL,
  `key_value` varchar(200) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

INSERT INTO `staff_attendance_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'Present', '<b class=\"text text-success\">P</b>', 'yes', '0000-00-00 00:00:00', '0000-00-00');
INSERT INTO `staff_attendance_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Late', '<b class=\"text text-warning\">L</b>', 'yes', '0000-00-00 00:00:00', '0000-00-00');
INSERT INTO `staff_attendance_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Absent', '<b class=\"text text-danger\">A</b>', 'yes', '0000-00-00 00:00:00', '0000-00-00');
INSERT INTO `staff_attendance_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Half Day', '<b class=\"text text-warning\">F</b>', 'yes', '2018-05-06 18:56:16', '0000-00-00');
INSERT INTO `staff_attendance_type` (`id`, `type`, `key_value`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Holiday', 'H', 'yes', '0000-00-00 00:00:00', '0000-00-00');


#
# TABLE STRUCTURE FOR: staff_designation
#

DROP TABLE IF EXISTS `staff_designation`;

CREATE TABLE `staff_designation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `designation` varchar(200) NOT NULL,
  `is_active` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8;

INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (1, 'Principal', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (2, 'V Principal', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (3, 'Accountant', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (4, 'A Accountant', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (5, 'Office Manager', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (6, 'Office Assistant', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (7, 'Administrator', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (8, 'Science Teacher', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (9, 'Teacher', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (10, 'Librarian', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (11, 'P T Teacher', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (12, 'Course Co-Ordinator ', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (13, 'Peon', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (14, 'Computer Operator', 'yes');
INSERT INTO `staff_designation` (`id`, `designation`, `is_active`) VALUES (15, 'Cashier ', 'yes');


#
# TABLE STRUCTURE FOR: staff_leave_details
#

DROP TABLE IF EXISTS `staff_leave_details`;

CREATE TABLE `staff_leave_details` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `alloted_leave` varchar(100) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_staff_leave_details_staff` (`staff_id`),
  KEY `FK_staff_leave_details_leave_types` (`leave_type_id`),
  CONSTRAINT `FK_staff_leave_details_leave_types` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_staff_leave_details_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_leave_request
#

DROP TABLE IF EXISTS `staff_leave_request`;

CREATE TABLE `staff_leave_request` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `leave_type_id` int(11) NOT NULL,
  `leave_from` date NOT NULL,
  `leave_to` date NOT NULL,
  `leave_days` int(11) NOT NULL,
  `employee_remark` varchar(200) NOT NULL,
  `admin_remark` varchar(200) NOT NULL,
  `status` varchar(100) NOT NULL,
  `applied_by` varchar(200) NOT NULL,
  `document_file` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_staff_leave_request_staff` (`staff_id`),
  KEY `FK_staff_leave_request_leave_types` (`leave_type_id`),
  CONSTRAINT `FK_staff_leave_request_leave_types` FOREIGN KEY (`leave_type_id`) REFERENCES `leave_types` (`id`),
  CONSTRAINT `FK_staff_leave_request_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_payroll
#

DROP TABLE IF EXISTS `staff_payroll`;

CREATE TABLE `staff_payroll` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `basic_salary` int(11) NOT NULL,
  `pay_scale` varchar(200) NOT NULL,
  `grade` varchar(50) NOT NULL,
  `is_active` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_payslip
#

DROP TABLE IF EXISTS `staff_payslip`;

CREATE TABLE `staff_payslip` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `basic` float NOT NULL,
  `total_allowance` float NOT NULL,
  `total_deduction` float NOT NULL,
  `leave_deduction` int(11) NOT NULL,
  `tax` varchar(200) NOT NULL,
  `net_salary` float NOT NULL,
  `status` varchar(100) NOT NULL,
  `month` varchar(200) NOT NULL,
  `year` varchar(200) NOT NULL,
  `payment_mode` varchar(200) NOT NULL,
  `payment_date` date NOT NULL,
  `remark` varchar(200) NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_staff_payslip_staff` (`staff_id`),
  CONSTRAINT `FK_staff_payslip_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `staff_payslip` (`id`, `staff_id`, `basic`, `total_allowance`, `total_deduction`, `leave_deduction`, `tax`, `net_salary`, `status`, `month`, `year`, `payment_mode`, `payment_date`, `remark`) VALUES (1, 2, '25200', '4000', '1500', 0, '300', '27400', 'generated', 'August', '2021', '', '2021-10-04', '');


#
# TABLE STRUCTURE FOR: staff_rating
#

DROP TABLE IF EXISTS `staff_rating`;

CREATE TABLE `staff_rating` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `rate` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` int(11) NOT NULL COMMENT '0 decline, 1 Approve',
  `entrydt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `FK_staff_rating_staff` (`staff_id`),
  CONSTRAINT `FK_staff_rating_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: staff_roles
#

DROP TABLE IF EXISTS `staff_roles`;

CREATE TABLE `staff_roles` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `role_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `role_id` (`role_id`),
  KEY `staff_id` (`staff_id`),
  CONSTRAINT `FK_staff_roles_roles` FOREIGN KEY (`role_id`) REFERENCES `roles` (`id`) ON DELETE CASCADE,
  CONSTRAINT `FK_staff_roles_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (1, 7, 1, 0, '2021-09-07 15:40:29', NULL);
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (2, 2, 2, 0, '2021-10-01 02:16:09', NULL);
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (3, 2, 3, 0, '2021-10-01 02:16:09', NULL);
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (4, 2, 4, 0, '2021-10-01 02:16:09', NULL);
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (5, 2, 5, 0, '2021-10-01 02:16:09', NULL);
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (6, 2, 6, 0, '2021-10-01 02:16:09', NULL);
INSERT INTO `staff_roles` (`id`, `role_id`, `staff_id`, `is_active`, `created_at`, `updated_at`) VALUES (7, 2, 7, 0, '2021-10-01 02:16:09', NULL);


#
# TABLE STRUCTURE FOR: staff_timeline
#

DROP TABLE IF EXISTS `staff_timeline`;

CREATE TABLE `staff_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `staff_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `timeline_date` date NOT NULL,
  `description` varchar(300) NOT NULL,
  `document` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`),
  KEY `FK_staff_timeline_staff` (`staff_id`),
  CONSTRAINT `FK_staff_timeline_staff` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_applyleave
#

DROP TABLE IF EXISTS `student_applyleave`;

CREATE TABLE `student_applyleave` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) NOT NULL,
  `from_date` date NOT NULL,
  `to_date` date NOT NULL,
  `apply_date` date NOT NULL,
  `status` int(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `docs` text NOT NULL,
  `reason` text NOT NULL,
  `approve_by` int(11) NOT NULL,
  `request_type` int(11) NOT NULL COMMENT '0 student,1 staff',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_attendences
#

DROP TABLE IF EXISTS `student_attendences`;

CREATE TABLE `student_attendences` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `biometric_attendence` int(1) NOT NULL DEFAULT '0',
  `date` date DEFAULT NULL,
  `attendence_type_id` int(11) DEFAULT NULL,
  `remark` varchar(200) NOT NULL,
  `biometric_device_data` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `attendence_type_id` (`attendence_type_id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (1, 24, 0, '2021-09-30', 4, 'Absent', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (2, 23, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (3, 22, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (4, 21, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (5, 20, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (6, 19, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (7, 18, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (8, 17, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (9, 16, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (10, 15, 0, '2021-09-30', 4, 'Absent', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (11, 14, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (12, 13, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (13, 12, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (14, 11, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (15, 10, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (16, 9, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (17, 8, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (18, 7, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (19, 6, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (20, 5, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (21, 4, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (22, 3, 0, '2021-09-30', 4, 'Sick Leave', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (23, 2, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (24, 1, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:17', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (25, 49, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (26, 48, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (27, 47, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (28, 46, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (29, 45, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (30, 44, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (31, 43, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (32, 42, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (33, 41, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (34, 40, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (35, 39, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (36, 38, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (37, 37, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (38, 36, 0, '2021-09-30', 6, 'Urgent Work', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (39, 35, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (40, 34, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (41, 33, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (42, 32, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (43, 31, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (44, 30, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (45, 29, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (46, 28, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (47, 27, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (48, 26, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (49, 25, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:13:43', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (50, 74, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (51, 73, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (52, 72, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (53, 71, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (54, 70, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (55, 69, 0, '2021-09-30', 3, 'Urgent Work', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (56, 68, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (57, 67, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (58, 66, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (59, 65, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (60, 64, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (61, 63, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (62, 62, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (63, 61, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (64, 60, 0, '2021-09-30', 4, 'Sick Leave', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (65, 59, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (66, 58, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (67, 57, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (68, 56, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (69, 55, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (70, 54, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (71, 53, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (72, 52, 0, '2021-09-30', 6, 'Parents Request', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (73, 51, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (74, 50, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:25', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (75, 99, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (76, 98, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (77, 97, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (78, 96, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (79, 95, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (80, 94, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (81, 93, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (82, 92, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (83, 91, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (84, 90, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (85, 89, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (86, 88, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (87, 87, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (88, 86, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (89, 85, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (90, 84, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (91, 83, 0, '2021-09-30', 4, 'Sick Leave', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (92, 82, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (93, 81, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (94, 80, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (95, 79, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (96, 78, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (97, 77, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (98, 76, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (99, 75, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:14:45', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (100, 124, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (101, 123, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (102, 122, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (103, 121, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (104, 120, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (105, 119, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (106, 118, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (107, 117, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (108, 116, 0, '2021-09-30', 4, 'Absent', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (109, 115, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (110, 114, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (111, 113, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (112, 112, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (113, 111, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (114, 110, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (115, 109, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (116, 108, 0, '2021-09-30', 4, 'Sick Leave', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (117, 107, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (118, 106, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (119, 105, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (120, 104, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (121, 103, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (122, 102, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (123, 101, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (124, 100, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:15', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (125, 149, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (126, 148, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (127, 147, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (128, 146, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (129, 145, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (130, 144, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (131, 143, 0, '2021-09-30', 4, 'Absent', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (132, 142, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (133, 141, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (134, 140, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (135, 139, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (136, 138, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (137, 137, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (138, 136, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (139, 135, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (140, 134, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (141, 133, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (142, 132, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (143, 131, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (144, 130, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (145, 129, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (146, 128, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (147, 127, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (148, 126, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);
INSERT INTO `student_attendences` (`id`, `student_session_id`, `biometric_attendence`, `date`, `attendence_type_id`, `remark`, `biometric_device_data`, `is_active`, `created_at`, `updated_at`) VALUES (149, 125, 0, '2021-09-30', 1, '', NULL, 'no', '2021-09-30 05:15:35', NULL);


#
# TABLE STRUCTURE FOR: student_doc
#

DROP TABLE IF EXISTS `student_doc`;

CREATE TABLE `student_doc` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `title` varchar(200) DEFAULT NULL,
  `doc` varchar(200) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_edit_fields
#

DROP TABLE IF EXISTS `student_edit_fields`;

CREATE TABLE `student_edit_fields` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

#
# TABLE STRUCTURE FOR: student_fees
#

DROP TABLE IF EXISTS `student_fees`;

CREATE TABLE `student_fees` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `feemaster_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT NULL,
  `amount_discount` float(10,2) NOT NULL,
  `amount_fine` float(10,2) NOT NULL DEFAULT '0.00',
  `description` text,
  `date` date DEFAULT NULL,
  `payment_mode` varchar(50) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_fees_deposite
#

DROP TABLE IF EXISTS `student_fees_deposite`;

CREATE TABLE `student_fees_deposite` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_fees_master_id` int(11) DEFAULT NULL,
  `fee_groups_feetype_id` int(11) DEFAULT NULL,
  `amount_detail` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_fees_master_id` (`student_fees_master_id`),
  KEY `fee_groups_feetype_id` (`fee_groups_feetype_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_fees_discounts
#

DROP TABLE IF EXISTS `student_fees_discounts`;

CREATE TABLE `student_fees_discounts` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `fees_discount_id` int(11) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'assigned',
  `payment_id` varchar(50) DEFAULT NULL,
  `description` text,
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `fees_discount_id` (`fees_discount_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_fees_master
#

DROP TABLE IF EXISTS `student_fees_master`;

CREATE TABLE `student_fees_master` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `is_system` int(1) NOT NULL DEFAULT '0',
  `student_session_id` int(11) DEFAULT NULL,
  `fee_session_group_id` int(11) DEFAULT NULL,
  `amount` float(10,2) DEFAULT '0.00',
  `is_active` varchar(10) NOT NULL DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `fee_session_group_id` (`fee_session_group_id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (1, 1, 18, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (2, 1, 22, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (3, 1, 21, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (4, 1, 16, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (5, 1, 10, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (6, 1, 19, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (7, 1, 14, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (8, 1, 8, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (9, 1, 3, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (10, 1, 11, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (11, 1, 2, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (12, 1, 15, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (13, 1, 7, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (14, 1, 4, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (15, 1, 23, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (16, 1, 17, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (17, 1, 20, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (18, 1, 12, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (19, 1, 6, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (20, 1, 24, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (21, 1, 1, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (22, 1, 5, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (23, 1, 13, 3, '50.00', 'no', '2021-09-30 05:48:18');
INSERT INTO `student_fees_master` (`id`, `is_system`, `student_session_id`, `fee_session_group_id`, `amount`, `is_active`, `created_at`) VALUES (24, 1, 9, 3, '50.00', 'no', '2021-09-30 05:48:18');


#
# TABLE STRUCTURE FOR: student_session
#

DROP TABLE IF EXISTS `student_session`;

CREATE TABLE `student_session` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `student_id` int(11) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `hostel_room_id` int(11) NOT NULL,
  `vehroute_id` int(10) DEFAULT NULL,
  `transport_fees` float(10,2) NOT NULL DEFAULT '0.00',
  `fees_discount` float(10,2) NOT NULL DEFAULT '0.00',
  `is_active` varchar(255) DEFAULT 'no',
  `is_alumni` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `student_id` (`student_id`),
  KEY `class_id` (`class_id`),
  KEY `section_id` (`section_id`),
  CONSTRAINT `student_session_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_session_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_session_ibfk_3` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_session_ibfk_4` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (1, 15, 1, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (2, 15, 2, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (3, 15, 3, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (4, 15, 4, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (5, 15, 5, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (6, 15, 6, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (7, 15, 7, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (8, 15, 8, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (9, 15, 9, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (10, 15, 10, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (11, 15, 11, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (12, 15, 12, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (13, 15, 13, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (14, 15, 14, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (15, 15, 15, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (16, 15, 16, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (17, 15, 17, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (18, 15, 18, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (19, 15, 19, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (20, 15, 20, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (21, 15, 21, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (22, 15, 22, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (23, 15, 23, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (24, 15, 24, 1, 1, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:14', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (25, 15, 25, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (26, 15, 26, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (27, 15, 27, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (28, 15, 28, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (29, 15, 29, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (30, 15, 30, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (31, 15, 31, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (32, 15, 32, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (33, 15, 33, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (34, 15, 34, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (35, 15, 35, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (36, 15, 36, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (37, 15, 37, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (38, 15, 38, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (39, 15, 39, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (40, 15, 40, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (41, 15, 41, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (42, 15, 42, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (43, 15, 43, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (44, 15, 44, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (45, 15, 45, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (46, 15, 46, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (47, 15, 47, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (48, 15, 48, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (49, 15, 49, 1, 2, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:35', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (50, 15, 50, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (51, 15, 51, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (52, 15, 52, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (53, 15, 53, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (54, 15, 54, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (55, 15, 55, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (56, 15, 56, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (57, 15, 57, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (58, 15, 58, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (59, 15, 59, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (60, 15, 60, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (61, 15, 61, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (62, 15, 62, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (63, 15, 63, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (64, 15, 64, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (65, 15, 65, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (66, 15, 66, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (67, 15, 67, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (68, 15, 68, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (69, 15, 69, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (70, 15, 70, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (71, 15, 71, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (72, 15, 72, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (73, 15, 73, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (74, 15, 74, 2, 3, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:02:55', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (75, 15, 75, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (76, 15, 76, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (77, 15, 77, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (78, 15, 78, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (79, 15, 79, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (80, 15, 80, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (81, 15, 81, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (82, 15, 82, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (83, 15, 83, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (84, 15, 84, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (85, 15, 85, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (86, 15, 86, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (87, 15, 87, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (88, 15, 88, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (89, 15, 89, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (90, 15, 90, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (91, 15, 91, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (92, 15, 92, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (93, 15, 93, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (94, 15, 94, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (95, 15, 95, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (96, 15, 96, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (97, 15, 97, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (98, 15, 98, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (99, 15, 99, 2, 4, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (100, 15, 100, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (101, 15, 101, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (102, 15, 102, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (103, 15, 103, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (104, 15, 104, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (105, 15, 105, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (106, 15, 106, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (107, 15, 107, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (108, 15, 108, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (109, 15, 109, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (110, 15, 110, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (111, 15, 111, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (112, 15, 112, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (113, 15, 113, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (114, 15, 114, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (115, 15, 115, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (116, 15, 116, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (117, 15, 117, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (118, 15, 118, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (119, 15, 119, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (120, 15, 120, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (121, 15, 121, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (122, 15, 122, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (123, 15, 123, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (124, 15, 124, 3, 5, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:03:39', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (125, 15, 125, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (126, 15, 126, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (127, 15, 127, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (128, 15, 128, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (129, 15, 129, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (130, 15, 130, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (131, 15, 131, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (132, 15, 132, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (133, 15, 133, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (134, 15, 134, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (135, 15, 135, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (136, 15, 136, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (137, 15, 137, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (138, 15, 138, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (139, 15, 139, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (140, 15, 140, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (141, 15, 141, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (142, 15, 142, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (143, 15, 143, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (144, 15, 144, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (145, 15, 145, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (146, 15, 146, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (147, 15, 147, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (148, 15, 148, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);
INSERT INTO `student_session` (`id`, `session_id`, `student_id`, `class_id`, `section_id`, `route_id`, `hostel_room_id`, `vehroute_id`, `transport_fees`, `fees_discount`, `is_active`, `is_alumni`, `created_at`, `updated_at`) VALUES (149, 15, 149, 3, 6, 0, 0, NULL, '0.00', '0.00', 'no', 0, '2021-09-30 02:04:12', NULL);


#
# TABLE STRUCTURE FOR: student_sibling
#

DROP TABLE IF EXISTS `student_sibling`;

CREATE TABLE `student_sibling` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) DEFAULT NULL,
  `sibling_student_id` int(11) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_subject_attendances
#

DROP TABLE IF EXISTS `student_subject_attendances`;

CREATE TABLE `student_subject_attendances` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_session_id` int(11) DEFAULT NULL,
  `subject_timetable_id` int(11) DEFAULT NULL,
  `attendence_type_id` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `remark` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `attendence_type_id` (`attendence_type_id`),
  KEY `student_session_id` (`student_session_id`),
  KEY `subject_timetable_id` (`subject_timetable_id`),
  CONSTRAINT `student_subject_attendances_ibfk_1` FOREIGN KEY (`attendence_type_id`) REFERENCES `attendence_type` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_subject_attendances_ibfk_2` FOREIGN KEY (`student_session_id`) REFERENCES `student_session` (`id`) ON DELETE CASCADE,
  CONSTRAINT `student_subject_attendances_ibfk_3` FOREIGN KEY (`subject_timetable_id`) REFERENCES `subject_timetable` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: student_timeline
#

DROP TABLE IF EXISTS `student_timeline`;

CREATE TABLE `student_timeline` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `student_id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `timeline_date` date NOT NULL,
  `description` varchar(200) NOT NULL,
  `document` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: students
#

DROP TABLE IF EXISTS `students`;

CREATE TABLE `students` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parent_id` int(11) NOT NULL,
  `admission_no` varchar(100) DEFAULT NULL,
  `roll_no` varchar(100) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `firstname` varchar(100) DEFAULT NULL,
  `lastname` varchar(100) DEFAULT NULL,
  `rte` varchar(20) DEFAULT NULL,
  `image` varchar(100) DEFAULT NULL,
  `mobileno` varchar(100) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `city` varchar(100) DEFAULT NULL,
  `pincode` varchar(100) DEFAULT NULL,
  `religion` varchar(100) DEFAULT NULL,
  `cast` varchar(50) DEFAULT NULL,
  `dob` date DEFAULT NULL,
  `gender` varchar(100) DEFAULT NULL,
  `current_address` text,
  `permanent_address` text,
  `category_id` varchar(100) DEFAULT NULL,
  `route_id` int(11) NOT NULL,
  `school_house_id` int(11) NOT NULL,
  `blood_group` varchar(200) NOT NULL,
  `vehroute_id` int(11) NOT NULL,
  `hostel_room_id` int(11) NOT NULL,
  `adhar_no` varchar(100) DEFAULT NULL,
  `samagra_id` varchar(100) DEFAULT NULL,
  `bank_account_no` varchar(100) DEFAULT NULL,
  `bank_name` varchar(100) DEFAULT NULL,
  `ifsc_code` varchar(100) DEFAULT NULL,
  `guardian_is` varchar(100) NOT NULL,
  `father_name` varchar(100) DEFAULT NULL,
  `father_phone` varchar(100) DEFAULT NULL,
  `father_occupation` varchar(100) DEFAULT NULL,
  `mother_name` varchar(100) DEFAULT NULL,
  `mother_phone` varchar(100) DEFAULT NULL,
  `mother_occupation` varchar(100) DEFAULT NULL,
  `guardian_name` varchar(100) DEFAULT NULL,
  `guardian_relation` varchar(100) DEFAULT NULL,
  `guardian_phone` varchar(100) DEFAULT NULL,
  `guardian_occupation` varchar(150) NOT NULL,
  `guardian_address` text,
  `guardian_email` varchar(100) DEFAULT NULL,
  `father_pic` varchar(200) NOT NULL,
  `mother_pic` varchar(200) NOT NULL,
  `guardian_pic` varchar(200) NOT NULL,
  `is_active` varchar(255) DEFAULT 'yes',
  `previous_school` text,
  `height` varchar(100) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `measurement_date` date NOT NULL,
  `dis_reason` int(11) NOT NULL,
  `note` varchar(200) DEFAULT NULL,
  `dis_note` text NOT NULL,
  `app_key` text,
  `parent_app_key` text,
  `disable_at` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=150 DEFAULT CHARSET=utf8;

INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (1, 2, '156', '156', '0000-00-00', 'Siraj Ullah ', '', '', NULL, '3339945031', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Baghbanan Sikandari Mardan ', 'Moh: Baghbanan Sikandari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Inayat Ullah ', '3339945031', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (2, 4, '157', '157', '0000-00-00', 'Muhammad Aizaz Ali Shah ', '', '', NULL, '3005715339', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Khitab Abad Bala Ghari Mardan', 'Moh: Khitab Abad Bala Ghari Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Yousaf Ali ', '3005715339', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (3, 6, '158', '158', '0000-00-00', 'Miraj Ud Din', '', '', NULL, '3038294121', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Gul Bahar Kass Koroona Mardan ', 'Moh: Gul Bahar Kass Koroona Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Yahya', '3038294121', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (4, 8, '159', '159', '0000-00-00', 'Muhammad Zahoor ', '', '', NULL, '3013101924', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Masjidi Pakistan Guajarat Mardan ', 'Moh: Masjidi Pakistan Guajarat Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Nasir ', '3013101924', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (5, 10, '160', '160', '0000-00-00', 'Syed Ikram Ali Shah', '', '', NULL, '3149961657', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Sugar Mill Takht Bhai Mardan ', 'Sugar Mill Takht Bhai Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Syed Abdul Aziz Hashimi ', '3149961657', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (6, 12, '161', '161', '0000-00-00', 'Shehzad Ali ', '', '', NULL, '3136727181', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Deen Bahar Colony Sarwar Abad takhat Bhai Mardan ', 'Moh: Deen Bahar Colony Sarwar Abad takhat Bhai Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ali Rahman ', '3136727181', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (7, 14, '162', '162', '0000-00-00', 'Muhammad Sajjad Alam ', '', '', NULL, '3009058802', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Bahram dheri Kutub Garh Takht Bhai Mardan ', 'Moh: Bahram dheri Kutub Garh Takht Bhai Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Ghaffar ', '3009058802', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (8, 16, '163', '163', '0000-00-00', 'Junaid Khan ', '', '', NULL, '3369597700', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Taweez Gul Kalli Mardan ', 'Taweez Gul Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sarfarosh ', '3369597700', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (9, 18, '164', '164', '0000-00-00', 'Uzair Muhammad Khan ', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Tila Muhammad Khan ', '3459141512', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (10, 20, '165', '165', '0000-00-00', 'Awal Sher ', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ikram ', '3459141512', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (11, 22, '166', '166', '0000-00-00', 'Muhammad Aasim ', '', '', NULL, '3018860261', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Mukhtyar Abad Ismaila Swabi ', 'Mukhtyar Abad Ismaila Swabi ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Liaqat Ali ', '3018860261', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (12, 24, '167', '167', '0000-00-00', 'Shah Faisal Nisar ', '', '', NULL, '3078446116', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Zafar Khil Bakhshali Mardan ', 'Moh: Zafar Khil Bakhshali Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nisar Ahmad ', '3078446116', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (13, 26, '168', '168', '0000-00-00', 'Usman Zada ', '', '', NULL, '3135756733', '', NULL, NULL, NULL, 'Islam', 'Afghan `', '0000-00-00', 'Male', 'Irigation Colony Bala Ghari Mardan ', 'Irigation Colony Bala Ghari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sahib Zada ', '3135756733', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (14, 28, '169', '169', '0000-00-00', 'Inzamam', '', '', NULL, '3009052527', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Babani Mardan ', 'Babani Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nadar Khan ', '3009052527', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (15, 30, '170', '170', '0000-00-00', 'Muhammad Owais ', '', '', NULL, '3348459666', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Noorman Khil Par Hoti Mardan ', 'Moh: Noorman Khil Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Munir ', '3348459666', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (16, 32, '171', '171', '0000-00-00', 'Awais Khan Lodhi ', '', '', NULL, '3059410804', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Bar Kandy Baghdad Mardan ', 'Moh: Bar Kandy Baghdad Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sabz Ali Khan ', '3059410804', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (17, 34, '172', '172', '0000-00-00', 'Saeed Shah ', '', '', NULL, '3028179548', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Noor Man Khail Par Hoti Mardan ', 'Moh: Noor Man Khail Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Wilayat Shah ', '3028179548', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (18, 36, '173', '173', '0000-00-00', 'Adnan Khan ', '', '', NULL, '3038617210', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Saeed Abad No1 Kass Koroona Mardan ', 'Moh: Saeed Abad No1 Kass Koroona Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Faqir Taj ', '3038617210', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (19, 38, '174', '174', '0000-00-00', 'Azhar Khan ', '', '', NULL, '3018906380', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Garib Abad Swabi Road Mardan ', 'Moh: Garib Abad Swabi Road Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Roohul Amin ', '3018906380', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (20, 40, '175', '175', '0000-00-00', 'Shafiq Islam ', '', '', NULL, '3149399661', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Cheel Banda Katlang Mardan ', 'Cheel Banda Katlang Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Sher ', '3149399661', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (21, 42, '176', '176', '0000-00-00', 'Asad Khan ', '', '', NULL, '3326645520', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Satar Koroona Dagai Shah Mardan ', 'Moh: Satar Koroona Dagai Shah Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Zarin Taj ', '3326645520', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (22, 44, '177', '177', '0000-00-00', 'Adnan Khan ', '', '', NULL, '3339892702', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Sher Abad Par Hoti Mardan ', 'Moh: Sher Abad Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Hakeem Dad Khan ', '3339892702', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (23, 46, '178', '178', '0000-00-00', 'Rizwan Ullah ', '', '', NULL, '3459336424', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Purdil Abad Par Hoti Mardan ', 'Moh: Purdil Abad Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdullah ', '3459336424', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (24, 48, '179', '179', '0000-00-00', 'Sikandar Nisar ', '', '', NULL, '3038266864', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Zafar Khail Bakhshali Mardan ', 'Moh: Zafar Khail Bakhshali Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nisar Ahmad ', '3038266864', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:14', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (25, 50, '180', '180', '0000-00-00', 'Fayyaz Khan ', '', '', NULL, '3339843575', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Bako Dheri Mardan ', 'Bako Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Dost Muhammad ', '3339843575', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (26, 52, '181', '181', '0000-00-00', 'Sami Ullah ', '', '', NULL, '3449196153', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Fatma Mardan ', 'Fatma Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Taj Wali Khan ', '3449196153', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (27, 54, '182', '182', '0000-00-00', 'Muhammad Sohail ', '', '', NULL, '3149917023', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Baghbanan Mardan ', 'Moh: Baghbanan Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Amir Muhammad ', '3149917023', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (28, 56, '183', '183', '0000-00-00', 'Rohail Nadar ', '', '', NULL, '3009052527', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Babaini Mardan ', 'Babaini Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nadar Khan ', '3009052527', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (29, 58, '184', '184', '0000-00-00', 'Ghani Subhan ', '', '', NULL, '3339852768', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Khaista Khan Fatma Mardan ', 'Moh: Khaista Khan Fatma Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nazir Ur Rehman ', '3339852768', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (30, 60, '185', '185', '0000-00-00', 'Muhammad Irsal ', '', '', NULL, '3009178792', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Daggar par Hoti Mardan ', 'Moh: Daggar par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Shah Faisal ', '3009178792', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (31, 62, '186', '186', '0000-00-00', 'Aamir Sohail ', '', '', NULL, '3442276146', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Koz Cham Alo Katlang Mardan ', 'Moh: Koz Cham Alo Katlang Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Said Nawab ', '3442276146', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (32, 64, '187', '187', '0000-00-00', 'Faisal Khan ', '', '', NULL, '3369597700', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Taweez Gul Kalli Mardan ', 'Taweez Gul Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sarfarosh ', '3369597700', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (33, 66, '188', '188', '0000-00-00', 'Shah Sawar ', '', '', NULL, '3005738952', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Sada Bahar Par Hoti Mardan ', 'Moh: Sada Bahar Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Diyar Khan ', '3005738952', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (34, 68, '189', '189', '0000-00-00', 'Zeeshan Ahmad ', '', '', NULL, '3025349075', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Bar Kandi Baghdada Mardan ', 'Moh: Bar Kandi Baghdada Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Sher ', '3025349075', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (35, 70, '190', '190', '0000-00-00', 'Ahson Wadah ', '', '', NULL, '3009175997', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'New cantt Colony Mardan ', 'New cantt Colony Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Altaf ', '3009175997', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (36, 72, '191', '191', '0000-00-00', 'Hamza Hassan ', '', '', NULL, '3005735452', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Shehzad Mir Bijli Ghar Mardan ', 'Moh: Shehzad Mir Bijli Ghar Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Hassan Gul ', '3005735452', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (37, 74, '192', '192', '0000-00-00', 'Danyal Khan ', '', '', NULL, '3342000367', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Noorman Khail Par Hoti Mardan ', 'Moh: Noorman Khail Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Javed Khan ', '3342000367', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (38, 76, '193', '193', '0000-00-00', 'Noman Khan ', '', '', NULL, '3319237653', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Sultan Mahmood Mardan ', 'Moh: Sultan Mahmood Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Aleem Khan ', '3319237653', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (39, 78, '194', '194', '0000-00-00', 'Salman Hameed ', '', '', NULL, '3159763031', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Saeed Abad No6 Kass Koroona Mardan ', 'Moh: Saeed Abad No6 Kass Koroona Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Fazal Hameed ', '3159763031', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (40, 80, '195', '195', '0000-00-00', 'Asif Sultan ', '', '', NULL, '3348475915', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Farm Koroona Swabi Road Mardan ', 'Farm Koroona Swabi Road Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sultan Muhammad ', '3348475915', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (41, 82, '196', '196', '0000-00-00', 'Nasrullah ', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Malak Abad Bako Dheri Mardan ', 'Malak Abad Bako Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Ghaffar ', '3459141512', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (42, 84, '197', '197', '0000-00-00', 'M. Zeeshan Sadiq', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam ', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Sadiq ', '3459141512', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (43, 86, '198', '198', '0000-00-00', 'Mehran Zamir ', '', '', NULL, '3469360726', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Kati Ghari Katlang ', 'Kati Ghari Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Roshan Zamir ', '3469360726', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (44, 88, '199', '199', '0000-00-00', 'Muhammad Tariq ', '', '', NULL, '3469361559', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Brudg Hujra Fatma Mardan ', 'Brudg Hujra Fatma Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Momin Khan ', '3469361559', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (45, 90, '200', '200', '0000-00-00', 'Junaid Iqbal ', '', '', NULL, '3449171798', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bagh Koroona Sikandari Mardan ', 'Bagh Koroona Sikandari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Javed Iqbal ', '3449171798', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (46, 92, '201', '201', '0000-00-00', 'Abdul Haseeb', '', '', NULL, '3339861346', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Shaiekh Kali Mardan ', 'Shaiekh Kali Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Wahid Said ', '3339861346', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (47, 94, '202', '202', '0000-00-00', 'Muhammad Zeeshan Safi', '', '', NULL, '3005721178', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Yahya Jadid Mardan', 'Yahya Jadid Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Amjid Khan ', '3005721178', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (48, 96, '203', '203', '0000-00-00', 'Usama ', '', '', NULL, '3439593299', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Surkh Dheri Mardan ', 'Surkh Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Masal Khan ', '3439593299', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (49, 98, '204', '204', '0000-00-00', 'Nasir ', '', '', NULL, '3439593299', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Surkh Dheri Mardan ', 'Surkh Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Sadiq ', '3439593299', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:35', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (50, 100, '205', '205', '0000-00-00', 'Muhammad Zeeshan Sadiq ', '', '', NULL, '3439593299', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Sadiq ', '3439593299', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (51, 102, '206', '206', '0000-00-00', 'Zeeshan ', '', '', NULL, '3068185706', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bako Dheri Mardan ', 'Bako Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sher Zada', '3068185706', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (52, 104, '207', '207', '0000-00-00', 'Muhammad Siddique', '', '', NULL, '3435374767', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Sarband Mardan ', 'Sarband Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Khalid Khan ', '3435374767', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (53, 106, '208', '208', '0000-00-00', 'Sayed Izaz Ahmad ', '', '', NULL, '3128343472', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Yaqoob Khil Garhi Kapur Mardan ', 'Yaqoob Khil Garhi Kapur Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sayed Abdur Rashid ', '3128343472', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (54, 108, '209', '209', '0000-00-00', 'Fazl-e-Akbar', '', '', NULL, '3459356784', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Khitab Abad Bala Ghari Mardan ', 'Khitab Abad Bala Ghari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Wali Muhammad ', '3459356784', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (55, 110, '210', '210', '0000-00-00', 'Khwaja Muhammad ', '', '', NULL, '3035073818', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Jhunghara Mardan ', 'Jhunghara Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Usman ', '3035073818', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (56, 112, '211', '211', '0000-00-00', 'Ihsan Ullah ', '', '', NULL, '3455235820', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Tawoos Mardan ', 'Tawoos Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ahmad Nabi ', '3455235820', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (57, 114, '212', '212', '0000-00-00', 'Sana Ullah ', '', '', NULL, '3348409348', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Yahya Jadeed Mardan ', 'Yahya Jadeed Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sarwar Khan ', '3348409348', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (58, 116, '213', '213', '0000-00-00', 'Muhammad Ibrahim ', '', '', NULL, '3469313848', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Madmood Abad ', 'Madmood Abad ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Aurang Zeb ', '3469313848', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (59, 118, '214', '214', '0000-00-00', 'Arsalan Hameedi ', '', '', NULL, '3009308827', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Degan Khil Mardan ', 'Degan Khil Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Hameed ', '3009308827', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (60, 120, '215', '215', '0000-00-00', 'Saiful Islam ', '', '', NULL, '3023517838', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Par Jalsiwal Bakhshali Mardan ', 'Par Jalsiwal Bakhshali Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nisar Gul ', '3023517838', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (61, 122, '216', '216', '0000-00-00', 'Shah Zaman ', '', '', NULL, '3018181080', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Toot Kalli Mardan ', 'Toot Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sabir Zaman ', '3018181080', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (62, 124, '217', '217', '0000-00-00', 'Zabar Dast Khan ', '', '', NULL, '3065063817', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Kara Mar maina Mardan ', 'Kara Mar maina Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Saeed Khan ', '3065063817', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (63, 126, '218', '218', '0000-00-00', 'Muhammad Nouman Khan ', '', '', NULL, '3005721163', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Shamsi Road Bagh Colony Mardan ', 'Shamsi Road Bagh Colony Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Naeem Khan ', '3005721163', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (64, 128, '219', '219', '0000-00-00', 'Hayan ', '', '', NULL, '3159970154', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Siakndari Mardan ', 'Siakndari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Majeed ', '3159970154', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (65, 130, '220', '220', '0000-00-00', 'Muhammad Luqman ', '', '', NULL, '3159175959', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Street 2 Sec: C House 178 Shiekh Maltoon Mardan ', 'Street 2 Sec: C House 178 Shiekh Maltoon Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Umar Khitab ', '3159175959', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (66, 132, '221', '221', '0000-00-00', 'Adnan ', '', '', NULL, '3469831402', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Akhtar Abad Bala Ghari Mardan', 'Akhtar Abad Bala Ghari Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Wazir Muhammad ', '3469831402', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (67, 134, '222', '222', '0000-00-00', 'Junaid Khan ', '', '', NULL, '3478668508', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Khuday Noor Kalli Mardan ', 'Khuday Noor Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Khaista Gul ', '3478668508', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (68, 136, '223', '223', '0000-00-00', 'Fawad Naseem ', '', '', NULL, '3005717233', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Haji Anwar Kalli Mardan ', 'Haji Anwar Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Naseem Khan ', '3005717233', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (69, 138, '224', '224', '0000-00-00', 'Salman Wali ', '', '', NULL, '3025682902', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bagh Colony Par Hoti mardan ', 'Bagh Colony Par Hoti mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Wali Rehman ', '3025682902', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (70, 140, '225', '225', '0000-00-00', 'Sheraz ', '', '', NULL, '3134445758', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Yaqoob Khan Kass Koroona Mardan ', 'Moh: Yaqoob Khan Kass Koroona Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ilyas Khan ', '3134445758', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (71, 142, '226', '226', '0000-00-00', 'Zeeshan Ullah ', '', '', NULL, '3005718404', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Panj Peer New Baghdada Mardan ', 'Moh: Panj Peer New Baghdada Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Wasi Ullah ', '3005718404', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (72, 144, '227', '227', '0000-00-00', 'Mehran Khan ', '', '', NULL, '3025300144', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Jadoon Abad Sikandari Mardan ', 'Moh: Jadoon Abad Sikandari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ihsan Ullah ', '3025300144', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (73, 146, '228', '228', '0000-00-00', 'Muhammad Idrees ', '', '', NULL, '3018331575', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Faram Koroona Mardan ', 'Faram Koroona Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Tariq Muhammad ', '3018331575', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (74, 148, '229', '229', '0000-00-00', 'Zeeshan Ahmad Khan ', '', '', NULL, '3018193587', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Qazi Sab Gujar Ghari Mardan ', 'Moh: Qazi Sab Gujar Ghari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Mir Ahmad Khan ', '3018193587', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:02:55', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (75, 150, '230', '230', '0000-00-00', 'Muhammad Umair ', '', '', NULL, '3139600808', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Saeed Colony Baghdada Mardan ', 'Saeed Colony Baghdada Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Kaleem Ullah ', '3139600808', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (76, 152, '231', '231', '0000-00-00', 'Menhaj Ud Din ', '', '', NULL, '3348460322', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Hafizan Par Hoti Mardan ', 'Moh: Hafizan Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Taj Ud Din ', '3348460322', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (77, 154, '232', '232', '0000-00-00', 'Hamza Akbar ', '', '', NULL, '3348442833', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Yakh Koi Akhoon Baba Mardan ', 'Moh: Yakh Koi Akhoon Baba Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Shafqat Akbar ', '3348442833', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (78, 156, '233', '233', '0000-00-00', 'Muhammad Ali Askar ', '', '', NULL, '3065725720', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Panderi Bakhshali Mardan ', 'Moh: Panderi Bakhshali Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Reshad Ali ', '3065725720', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (79, 158, '234', '234', '0000-00-00', 'Muhammad Farooq', '', '', NULL, '3005735503', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Yaqoob Khan mardan ', 'Moh: Yaqoob Khan mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ayaz Gul ', '3005735503', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (80, 160, '235', '235', '0000-00-00', 'Sultan Said ', '', '', NULL, '3009303390', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Moh: Sada Bahar Par Hoti Mardan ', 'Moh: Sada Bahar Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nooran Said ', '3009303390', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (81, 162, '236', '236', '0000-00-00', 'Aizaz Alam ', '', '', NULL, '3329433342', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Ghari Ismail Zai Mardan ', 'Ghari Ismail Zai Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Awal Dad ', '3329433342', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (82, 164, '237', '237', '0000-00-00', 'Rifaq Khan ', '', '', NULL, '3449200933', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Karim dad Mardan ', 'Karim dad Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Ijaz ', '3449200933', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (83, 166, '238', '238', '0000-00-00', 'Muhmmad Suhaib ', '', '', NULL, '3005714304', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'moh: Sada bahar hosai mardan', 'moh: Sada bahar hosai mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Faiz Muhammad Fayaz', '3005714304', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (84, 168, '239', '239', '0000-00-00', 'Sana Ullah', '', '', NULL, '3459354989', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Tour dher Wal Bakshali Mardan', 'Tour dher Wal Bakshali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Riayat Ullah', '3459354989', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (85, 170, '240', '240', '0000-00-00', 'Sajjad Khan', '', '', NULL, '3035363757', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Gharib Abad Dubai Ada Mardan', 'Gharib Abad Dubai Ada Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Farhad Muhammad', '3035363757', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (86, 172, '241', '241', '0000-00-00', 'Azaz Ullah', '', '', NULL, '3469361534', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Badar Banda Katlang Mardan', 'Moh: Badar Banda Katlang Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Jehanzeb Khan', '3469361534', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (87, 174, '242', '242', '0000-00-00', 'Muhammad', '', '', NULL, '3015746342', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Dost Muhammad Mohib Banda Mardan', 'Moh: Dost Muhammad Mohib Banda Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Anwar Khitab', '3015746342', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (88, 176, '243', '243', '0000-00-00', 'Hizar Hayat', '', '', NULL, '3025712779', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh:Mohtasib Baba Bakshali Mardan', 'Moh:Mohtasib Baba Bakshali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sher Farzand', '3025712779', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (89, 178, '244', '244', '0000-00-00', 'Hidayat Ur Rehman', '', '', NULL, '3068790150', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Pandheri Bakshali Mardan', 'Moh: Pandheri Bakshali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Akbar Khan', '3068790150', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (90, 180, '245', '245', '0000-00-00', 'Iltaf Hussain', '', '', NULL, '3143017631', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Swabi Road Shah Dand Baba Mardan', 'Swabi Road Shah Dand Baba Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nazeer Muhammad', '3143017631', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (91, 182, '246', '246', '0000-00-00', 'Suhaib ', '', '', NULL, '3005718936', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Jamsheed Khan ', '3005718936', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (92, 184, '247', '247', '0000-00-00', 'Muhammad Aasim ', '', '', NULL, '3005718936', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bako dheri bakhshali road Mardan.', 'Bako dheri bakhshali road Mardan.', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Jamsheed Khan ', '3005718936', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (93, 186, '248', '248', '0000-00-00', 'Hamid Ali Shah ', '', '', NULL, '3419197363', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Hilal Said ', '3419197363', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (94, 188, '249', '249', '0000-00-00', 'Mazhar Fawad ', '', '', NULL, '3468195602', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Fazal Hanan ', '3468195602', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (95, 190, '250', '250', '0000-00-00', 'Sohail ', '', '', NULL, '3369561071', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bakal Khil Ghari Ismail Zai Mardan ', 'Bakal Khil Ghari Ismail Zai Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Younas ', '3369561071', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (96, 192, '251', '251', '0000-00-00', 'Faseehullah', '', '', NULL, '3139505094', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Baba Jumat Kot Dolat Zai ', 'Moh: Baba Jumat Kot Dolat Zai ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Hukamdad ', '3139505094', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (97, 194, '252', '252', '0000-00-00', 'Sajid Shah', '', '', NULL, '3449990306', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'MOh: Fatih Abad Par Hoti Mardan ', 'MOh: Fatih Abad Par Hoti Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Biradar', '3449990306', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (98, 196, '253', '253', '0000-00-00', 'Mazhar Fawad', '', '', NULL, '3468193602', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Yahya Jadeed Katlang Road Shankar Mardan', 'Yahya Jadeed Katlang Road Shankar Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Fazal Hanan', '3468193602', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (99, 198, '254', '254', '0000-00-00', 'Suhaib', '', '', NULL, '3005718936', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bako Dheri Mardan ', 'Bako Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Jamshed Khan ', '3005718936', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (100, 200, '255', '255', '0000-00-00', 'Muhammad Asim ', '', '', NULL, '3005718936', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bako Dheri Mardan ', 'Bako Dheri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Jamshed Khan ', '3005718936', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (101, 202, '256', '256', '0000-00-00', 'Hamid Ali Shah ', '', '', NULL, '3419197363', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Sheekh Kalli Katlang Road Mardan ', 'Sheekh Kalli Katlang Road Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Hilal Said ', '3419197363', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (102, 204, '257', '257', '0000-00-00', 'Muhammad Abbas ', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Gareeb Abad ', 'Gareeb Abad ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Bahadar Khan ', '3459141512', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (103, 206, '258', '258', '0000-00-00', 'Muslim Khan ', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Fazal Abad New Road Mardan ', 'Fazal Abad New Road Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Salamat Khan ', '3459141512', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (104, 208, '259', '259', '0000-00-00', 'Mohammad Imran', '', '', NULL, '3468887058', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Bara Cham Babane Mardan', 'Bara Cham Babane Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Said Mohammad Shah', '3468887058', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (105, 210, '260', '260', '0000-00-00', 'Suleman Khan ', '', '', NULL, '3009393674', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Noor Abad Burseri Mardan ', 'Noor Abad Burseri Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Abdul Kareem ', '3009393674', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (106, 212, '261', '261', '0000-00-00', 'Zeeshan Khan ', '', '', NULL, '3442828151', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Bul Abad Katlang Mardan ', 'Bul Abad Katlang Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Amjad', '3442828151', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (107, 214, '262', '262', '0000-00-00', 'Asad Ali ', '', '', NULL, '3459357775', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Ajab Gul Kalli Mardan ', 'Ajab Gul Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Hussain ', '3459357775', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (108, 216, '263', '263', '0000-00-00', 'Muhammad Sohail ', '', '', NULL, '3149917023', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Baghbannan Sikandari Mardan ', 'Baghbannan Sikandari Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Amir Muhammad ', '3149917023', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (109, 218, '264', '264', '0000-00-00', 'Faisal Khan ', '', '', NULL, '3369597700', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Tazeez Gul Kalli Mardan ', 'Tazeez Gul Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sarfarosh ', '3369597700', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (110, 220, '265', '265', '0000-00-00', 'Salman Khan ', '', '', NULL, '3429618337', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Neher Chowk Mardan ', 'Neher Chowk Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Jehangir Khan ', '3429618337', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (111, 222, '266', '266', '0000-00-00', 'Junaid Khan ', '', '', NULL, '3369597700', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Taweez Gul Kalli Mardan ', 'Taweez Gul Kalli Mardan ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sarfarosh ', '3369597700', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (112, 224, '267', '267', '0000-00-00', 'Muhammad Haroon', '', '', NULL, '3149090231', '', NULL, NULL, NULL, 'Islam', 'Afghan ', '0000-00-00', 'Male', 'Behram Khil Shehbaz Ghari ', 'Behram Khil Shehbaz Ghari ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Nisar Muhamad ', '3149090231', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (113, 226, '268', '268', '0000-00-00', 'Syed Tanveer Ali Shah', '', '', NULL, '0342-8142643', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Saidaan Garhi Mardan', 'Saidaan Garhi Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Shamsher Ali', '0342-8142643', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (114, 228, '269', '269', '0000-00-00', 'Adnan Khan', '', '', NULL, '0300-5721698', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Purdal Abad Mardan', 'Moh: Purdal Abad Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Gul Zada', '0300-5721698', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (115, 230, '270', '270', '0000-00-00', 'Midrarullah', '', '', NULL, '0313-9038612', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Zafar Khel Bakhshali Mardan', 'Zafar Khel Bakhshali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Anwarullah', '0313-9038612', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (116, 232, '271', '271', '0000-00-00', 'Syed Nadar Ali Shah', '', '', NULL, '0301-5506044', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Village Kunj Katlang ', 'Village Kunj Katlang ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Amjid Ali', '0301-5506044', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (117, 234, '272', '272', '0000-00-00', 'Mudasir Hussain', '', '', NULL, '0311-9160655', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Shahdand Lund Khwar Takht Bhai ', 'Shahdand Lund Khwar Takht Bhai ', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Tila Muhammad', '0311-9160655', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (118, 236, '273', '273', '0000-00-00', 'Muhammad Tayyab ', '', '', NULL, '0301-5733080', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Shahbaz Killi Nissatta Road Mardan', 'Shahbaz Killi Nissatta Road Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Khurshid', '0301-5733080', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (119, 238, '274', '274', '0000-00-00', 'Muhammad Naqeeb', '', '', NULL, '0300-9737673', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'New Bajawar Kalley Par Hoti Mardan', 'New Bajawar Kalley Par Hoti Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Taimoor Khan', '0300-9737673', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (120, 240, '275', '275', '0000-00-00', 'Muhammad Talha', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Saeed Coloney Mardan', 'Saeed Coloney Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Asadullah', '3459141512', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (121, 242, '276', '276', '0000-00-00', 'Muhammad Ishaq', '', '', NULL, '0344-9166968', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Delawar Banda Fazli Abad Takht Bhai', 'Delawar Banda Fazli Abad Takht Bhai', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Yousaf Khan', '0344-9166968', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (122, 244, '277', '277', '0000-00-00', 'Uzair Bacha', '', '', NULL, '0345-9337468', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Saeed Abad Mardan', 'Saeed Abad Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muntazim Shah', '0345-9337468', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (123, 246, '278', '278', '0000-00-00', 'Jalal Akbar', '', '', NULL, '0336-9109658', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Shankar Mardan', 'Shankar Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Ali Akbar', '0336-9109658', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (124, 248, '279', '279', '0000-00-00', 'Ansar Ali', '', '', NULL, '0300-5713113', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Kamaramar Maina Garyala Mardan', 'Kamaramar Maina Garyala Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Farzand Ali', '0300-5713113', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:03:39', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (125, 250, '280', '280', '0000-00-00', 'Muhammad Ismail', '', '', NULL, '0300-9056004', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Shahdand Baba Par Hoti Mardan', 'Shahdand Baba Par Hoti Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Khurshed Anwar', '0300-9056004', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (126, 252, '281', '281', '0000-00-00', 'Khurram Khan', '', '', NULL, '0344-9150913', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Tatan Garyala Mardan', 'Moh: Tatan Garyala Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Riaz Ali', '0344-9150913', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (127, 254, '282', '282', '0000-00-00', 'Muhammad Yaseen ', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Pandehri Bakhsahli Mardan', 'Pandehri Bakhsahli Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Reshad Ali', '3459141512', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (128, 256, '283', '283', '0000-00-00', 'Taimoor Khan', '', '', NULL, '0346-93252378', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Nazim Abad Sikandari Mardan', 'Nazim Abad Sikandari Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Zubair', '0346-93252378', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (129, 258, '284', '284', '0000-00-00', 'Attiq Ur Rahman', '', '', NULL, '0345-9333443', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'New Islamabad Par Hoti Mardan', 'New Islamabad Par Hoti Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Fazl Ur Rahman', '0345-9333443', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (130, 260, '285', '285', '0000-00-00', 'Asad Ali', '', '', NULL, '0344-9573278', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Pir Khel Shahbaz Garhi Mardan.', 'Pir Khel Shahbaz Garhi Mardan.', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Riaz', '0344-9573278', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (131, 262, '286', '286', '0000-00-00', 'Muhammad Yaseen', '', '', NULL, '0313-9743357', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Pandheri Bala Bakhshali Mardan', 'Pandheri Bala Bakhshali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Minjawar Khan', '0313-9743357', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (132, 264, '287', '287', '0000-00-00', 'Musa Khan', '', '', NULL, '0333-9845401', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'New Road Kass kuroona Mardan', 'New Road Kass kuroona Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sabz Ali Khan', '0333-9845401', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (133, 266, '288', '288', '0000-00-00', 'Khaista Umar', '', '', NULL, '0313-8031666', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Char Banda Ghareeb Abad Mardan', 'Char Banda Ghareeb Abad Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Fazal Umar', '0313-8031666', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (134, 268, '289', '289', '0000-00-00', 'Shaaban', '', '', NULL, '0300-5667777', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Saidaan Mohib Banda Mardan', 'Saidaan Mohib Banda Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Syed Saeed Anwar', '0300-5667777', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (135, 270, '290', '290', '0000-00-00', 'Talha Ahmad Quraishi', '', '', NULL, '0311-9000205', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Malik Abdul Ghani Sikandari Mardan', 'Moh: Malik Abdul Ghani Sikandari Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Gulzar Ahmad Quraishi', '0311-9000205', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (136, 272, '291', '291', '0000-00-00', 'Shah Faisal', '', '', NULL, '0300-5739300', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Pir Shah Said Mardan Khas Mardan', 'Pir Shah Said Mardan Khas Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Farukh Nihad', '0300-5739300', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (137, 274, '292', '292', '0000-00-00', 'Siddique Khan', '', '', NULL, '0312-9176257', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Shahedan Mardan', 'Shahedan Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Bacha Hussain', '0312-9176257', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (138, 276, '293', '293', '0000-00-00', 'Qazi Masood Shah', '', '', NULL, '0346-9362679', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Center Coloney Street # 3 Baghdada Mardan', 'Center Coloney Street # 3 Baghdada Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Anwar Khan', '0346-9362679', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (139, 278, '294', '294', '0000-00-00', 'Zeeshan Naeem', '', '', NULL, '0314-9217944', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Hafiz Abad Mardan', 'Hafiz Abad Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Naeem', '0314-9217944', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (140, 280, '295', '295', '0000-00-00', 'Muhammad Bilal', '', '', NULL, '0313-5180164', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Saeed # 5 Kass Kuroona Mardan', 'Moh: Saeed # 5 Kass Kuroona Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Noor Muhammad', '0313-5180164', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (141, 282, '296', '296', '0000-00-00', 'Adnan Hayat', '', '', NULL, '0332-8590475', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Al Habib Sikandari Mardan', 'Moh: Al Habib Sikandari Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Hayat', '0332-8590475', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (142, 284, '297', '297', '0000-00-00', 'Anaf Shah', '', '', NULL, '3459141512', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Jadoon Abad Babaini Mardan', 'Jadoon Abad Babaini Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Munawar Shah', '3459141512', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (143, 286, '298', '298', '0000-00-00', 'Raza Ahmad', '', '', NULL, '0311-8688878', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Bala Garhi Mardan', 'Bala Garhi Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Muhammad Ismail', '0311-8688878', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (144, 288, '299', '299', '0000-00-00', 'Said Ghawas', '', '', NULL, '0333-9889214', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Chail Banda Mardan', 'Chail Banda Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Sohrab Khan', '0333-9889214', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (145, 290, '300', '300', '0000-00-00', 'Hizar Ahmad', '', '', NULL, '0301-8390153', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Bokhi Kot Ismail Zai Mardan', 'Moh: Bokhi Kot Ismail Zai Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Saadullah Khan', '0301-8390153', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (146, 292, '301', '301', '0000-00-00', 'Abbas Ali', '', '', NULL, '0313-9673794', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Akhundzadgan Jungara Mardan', 'Akhundzadgan Jungara Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Rishad Ali', '0313-9673794', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (147, 294, '302', '302', '0000-00-00', 'Muhammad Junaid', '', '', NULL, '0302-8391721', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Muhtasib Baba Bakhshali Mardan', 'Muhtasib Baba Bakhshali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Taj Muhammad Khan', '0302-8391721', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (148, 296, '303', '303', '0000-00-00', 'Mansoor Ahmad', '', '', NULL, '0300-5733494', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Moh: Loharan par hoti mardan', 'Moh: Loharan par hoti mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Hazrat Hussain', '0300-5733494', 'Employee', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);
INSERT INTO `students` (`id`, `parent_id`, `admission_no`, `roll_no`, `admission_date`, `firstname`, `lastname`, `rte`, `image`, `mobileno`, `email`, `state`, `city`, `pincode`, `religion`, `cast`, `dob`, `gender`, `current_address`, `permanent_address`, `category_id`, `route_id`, `school_house_id`, `blood_group`, `vehroute_id`, `hostel_room_id`, `adhar_no`, `samagra_id`, `bank_account_no`, `bank_name`, `ifsc_code`, `guardian_is`, `father_name`, `father_phone`, `father_occupation`, `mother_name`, `mother_phone`, `mother_occupation`, `guardian_name`, `guardian_relation`, `guardian_phone`, `guardian_occupation`, `guardian_address`, `guardian_email`, `father_pic`, `mother_pic`, `guardian_pic`, `is_active`, `previous_school`, `height`, `weight`, `measurement_date`, `dis_reason`, `note`, `dis_note`, `app_key`, `parent_app_key`, `disable_at`, `created_at`, `updated_at`) VALUES (149, 298, '304', '304', '0000-00-00', 'Abdullah', '', '', NULL, '0334-8441767', '', NULL, NULL, NULL, 'Islam', 'Afghan', '0000-00-00', 'Male', 'Ijara Kali Mardan', 'Ijara Kali Mardan', '', 0, 0, 'O+', 0, 0, '', '', '', '', '', '', 'Mukamil Shah', '0334-8441767', 'Business', '', '', '', '', '', '', '', '', '', '', '', '', 'yes', '', '', '', '0000-00-00', 0, '', '', NULL, NULL, '0000-00-00', '2021-09-30 02:04:12', NULL);


#
# TABLE STRUCTURE FOR: subject_group_class_sections
#

DROP TABLE IF EXISTS `subject_group_class_sections`;

CREATE TABLE `subject_group_class_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_group_id` int(11) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `description` text,
  `is_active` int(11) DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_section_id` (`class_section_id`),
  KEY `subject_group_id` (`subject_group_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `subject_group_class_sections_ibfk_1` FOREIGN KEY (`class_section_id`) REFERENCES `class_sections` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_group_class_sections_ibfk_2` FOREIGN KEY (`subject_group_id`) REFERENCES `subject_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_group_class_sections_ibfk_3` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

INSERT INTO `subject_group_class_sections` (`id`, `subject_group_id`, `class_section_id`, `session_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 1, 15, NULL, 0, '2021-09-30 10:29:41', NULL);
INSERT INTO `subject_group_class_sections` (`id`, `subject_group_id`, `class_section_id`, `session_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (2, 1, 2, 15, NULL, 0, '2021-09-30 10:29:41', NULL);
INSERT INTO `subject_group_class_sections` (`id`, `subject_group_id`, `class_section_id`, `session_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (3, 2, 3, 15, NULL, 0, '2021-09-30 10:30:38', NULL);
INSERT INTO `subject_group_class_sections` (`id`, `subject_group_id`, `class_section_id`, `session_id`, `description`, `is_active`, `created_at`, `updated_at`) VALUES (4, 2, 4, 15, NULL, 0, '2021-09-30 10:30:38', NULL);


#
# TABLE STRUCTURE FOR: subject_group_subjects
#

DROP TABLE IF EXISTS `subject_group_subjects`;

CREATE TABLE `subject_group_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `subject_group_id` int(11) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `subject_group_id` (`subject_group_id`),
  KEY `session_id` (`session_id`),
  KEY `subject_id` (`subject_id`),
  CONSTRAINT `subject_group_subjects_ibfk_1` FOREIGN KEY (`subject_group_id`) REFERENCES `subject_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_group_subjects_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_group_subjects_ibfk_3` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8;

INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (1, 1, 15, 1, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (2, 1, 15, 4, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (3, 1, 15, 5, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (4, 1, 15, 6, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (5, 1, 15, 7, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (6, 1, 15, 8, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (7, 1, 15, 9, '2021-09-30 10:29:41');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (8, 2, 15, 1, '2021-09-30 10:30:38');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (9, 2, 15, 2, '2021-09-30 10:30:38');
INSERT INTO `subject_group_subjects` (`id`, `subject_group_id`, `session_id`, `subject_id`, `created_at`) VALUES (10, 2, 15, 3, '2021-09-30 10:30:38');


#
# TABLE STRUCTURE FOR: subject_groups
#

DROP TABLE IF EXISTS `subject_groups`;

CREATE TABLE `subject_groups` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(250) DEFAULT NULL,
  `description` text,
  `session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `subject_groups_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

INSERT INTO `subject_groups` (`id`, `name`, `description`, `session_id`, `created_at`) VALUES (1, 'Science Group', '', 15, '2021-09-30 10:29:41');
INSERT INTO `subject_groups` (`id`, `name`, `description`, `session_id`, `created_at`) VALUES (2, 'Arts Group', '', 15, '2021-09-30 10:30:38');


#
# TABLE STRUCTURE FOR: subject_syllabus
#

DROP TABLE IF EXISTS `subject_syllabus`;

CREATE TABLE `subject_syllabus` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `topic_id` int(11) NOT NULL,
  `session_id` int(11) NOT NULL,
  `created_by` int(11) NOT NULL,
  `created_for` int(11) NOT NULL,
  `date` date NOT NULL,
  `time_from` varchar(255) NOT NULL,
  `time_to` varchar(255) NOT NULL,
  `presentation` text NOT NULL,
  `attachment` text NOT NULL,
  `lacture_youtube_url` varchar(255) NOT NULL,
  `lacture_video` varchar(255) NOT NULL,
  `sub_topic` text NOT NULL,
  `teaching_method` text NOT NULL,
  `general_objectives` text NOT NULL,
  `previous_knowledge` text NOT NULL,
  `comprehensive_questions` text NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `topic_id` (`topic_id`),
  KEY `session_id` (`session_id`),
  KEY `created_by` (`created_by`),
  KEY `created_for` (`created_for`),
  CONSTRAINT `subject_syllabus_ibfk_1` FOREIGN KEY (`topic_id`) REFERENCES `topic` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_syllabus_ibfk_2` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_syllabus_ibfk_3` FOREIGN KEY (`created_by`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_syllabus_ibfk_4` FOREIGN KEY (`created_for`) REFERENCES `staff` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: subject_timetable
#

DROP TABLE IF EXISTS `subject_timetable`;

CREATE TABLE `subject_timetable` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `day` varchar(20) DEFAULT NULL,
  `class_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `subject_group_id` int(11) DEFAULT NULL,
  `subject_group_subject_id` int(11) DEFAULT NULL,
  `staff_id` int(11) DEFAULT NULL,
  `time_from` varchar(20) DEFAULT NULL,
  `time_to` varchar(20) DEFAULT NULL,
  `room_no` varchar(20) DEFAULT NULL,
  `session_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `class_id` (`class_id`),
  KEY `section_id` (`section_id`),
  KEY `subject_group_id` (`subject_group_id`),
  KEY `subject_group_subject_id` (`subject_group_subject_id`),
  KEY `staff_id` (`staff_id`),
  KEY `session_id` (`session_id`),
  CONSTRAINT `subject_timetable_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `classes` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_timetable_ibfk_2` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_timetable_ibfk_3` FOREIGN KEY (`subject_group_id`) REFERENCES `subject_groups` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_timetable_ibfk_4` FOREIGN KEY (`subject_group_subject_id`) REFERENCES `subject_group_subjects` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_timetable_ibfk_5` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`id`) ON DELETE CASCADE,
  CONSTRAINT `subject_timetable_ibfk_6` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: subjects
#

DROP TABLE IF EXISTS `subjects`;

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(100) DEFAULT NULL,
  `code` varchar(100) NOT NULL,
  `type` varchar(100) NOT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (1, 'English', '1111', 'theory', 'no', '2021-09-30 10:25:52', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (2, 'Computer Science', '1112', 'theory', 'no', '2021-09-30 10:26:16', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (3, 'Computer Science Practical', '1113', 'practical', 'no', '2021-09-30 10:26:43', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (4, 'Physics Theory', '1114', 'theory', 'no', '2021-09-30 10:27:01', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (5, 'Physics Practical', '1115', 'practical', 'no', '2021-09-30 10:27:17', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (6, 'Chemistry Theory', '1116', 'theory', 'no', '2021-09-30 10:27:34', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (7, 'Chemistry Practical', '1117', 'practical', 'no', '2021-09-30 10:27:49', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (8, 'Biology Theory', '1118', 'theory', 'no', '2021-09-30 10:28:04', NULL);
INSERT INTO `subjects` (`id`, `name`, `code`, `type`, `is_active`, `created_at`, `updated_at`) VALUES (9, 'Biology Practical', '1119', 'practical', 'no', '2021-09-30 10:28:19', NULL);


#
# TABLE STRUCTURE FOR: submit_assignment
#

DROP TABLE IF EXISTS `submit_assignment`;

CREATE TABLE `submit_assignment` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `homework_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `docs` varchar(225) NOT NULL,
  `file_name` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: teacher_subjects
#

DROP TABLE IF EXISTS `teacher_subjects`;

CREATE TABLE `teacher_subjects` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `teacher_id` int(11) DEFAULT NULL,
  `description` varchar(100) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `class_section_id` (`class_section_id`),
  KEY `session_id` (`session_id`),
  KEY `subject_id` (`subject_id`),
  KEY `teacher_id` (`teacher_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: template_admitcards
#

DROP TABLE IF EXISTS `template_admitcards`;

CREATE TABLE `template_admitcards` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` varchar(250) DEFAULT NULL,
  `heading` text,
  `title` text,
  `left_logo` varchar(200) DEFAULT NULL,
  `right_logo` varchar(200) DEFAULT NULL,
  `exam_name` varchar(200) DEFAULT NULL,
  `school_name` varchar(200) DEFAULT NULL,
  `exam_center` varchar(200) DEFAULT NULL,
  `sign` varchar(200) DEFAULT NULL,
  `background_img` varchar(200) DEFAULT NULL,
  `is_name` int(1) NOT NULL DEFAULT '1',
  `is_father_name` int(1) NOT NULL DEFAULT '1',
  `is_mother_name` int(1) NOT NULL DEFAULT '1',
  `is_dob` int(1) NOT NULL DEFAULT '1',
  `is_admission_no` int(1) NOT NULL DEFAULT '1',
  `is_roll_no` int(1) NOT NULL DEFAULT '1',
  `is_address` int(1) NOT NULL DEFAULT '1',
  `is_gender` int(1) NOT NULL DEFAULT '1',
  `is_photo` int(11) NOT NULL,
  `is_class` int(11) NOT NULL DEFAULT '0',
  `is_section` int(11) NOT NULL DEFAULT '0',
  `content_footer` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `template_admitcards` (`id`, `template`, `heading`, `title`, `left_logo`, `right_logo`, `exam_name`, `school_name`, `exam_center`, `sign`, `background_img`, `is_name`, `is_father_name`, `is_mother_name`, `is_dob`, `is_admission_no`, `is_roll_no`, `is_address`, `is_gender`, `is_photo`, `is_class`, `is_section`, `content_footer`, `created_at`, `updated_at`) VALUES (1, 'Sample Admit Card', 'BOARD OF SECONDARY EDUCATION, MADHYA PRADESH, BHOPAL', 'HIGHER SECONDARY SCHOOL CERTIFICATE EXAMINATION (10+2) 2014', 'ab12c4b65f53ee621dcf84370a7c5be4.png', '0910482bf79df5fd103e8383d61b387a.png', 'Test', 'Mount Carmel School', 'test dmit card2', 'aa9c7087e68c5af1d2c04946de1d3bd3.png', '782a71f53ea6bca213012d49e9d46d98.jpg', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, NULL, '2020-02-28 07:26:15', NULL);


#
# TABLE STRUCTURE FOR: template_marksheets
#

DROP TABLE IF EXISTS `template_marksheets`;

CREATE TABLE `template_marksheets` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `template` varchar(200) DEFAULT NULL,
  `heading` text,
  `title` text,
  `left_logo` varchar(200) DEFAULT NULL,
  `right_logo` varchar(200) DEFAULT NULL,
  `exam_name` varchar(200) DEFAULT NULL,
  `school_name` varchar(200) DEFAULT NULL,
  `exam_center` varchar(200) DEFAULT NULL,
  `left_sign` varchar(200) DEFAULT NULL,
  `middle_sign` varchar(200) DEFAULT NULL,
  `right_sign` varchar(200) DEFAULT NULL,
  `exam_session` int(1) DEFAULT '1',
  `is_name` int(1) DEFAULT '1',
  `is_father_name` int(1) DEFAULT '1',
  `is_mother_name` int(1) DEFAULT '1',
  `is_dob` int(1) DEFAULT '1',
  `is_admission_no` int(1) DEFAULT '1',
  `is_roll_no` int(1) DEFAULT '1',
  `is_photo` int(11) DEFAULT '1',
  `is_division` int(1) NOT NULL DEFAULT '1',
  `is_customfield` int(1) NOT NULL,
  `background_img` varchar(200) DEFAULT NULL,
  `date` varchar(20) DEFAULT NULL,
  `is_class` int(11) NOT NULL DEFAULT '0',
  `is_section` int(11) NOT NULL DEFAULT '0',
  `content` text,
  `content_footer` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `template_marksheets` (`id`, `template`, `heading`, `title`, `left_logo`, `right_logo`, `exam_name`, `school_name`, `exam_center`, `left_sign`, `middle_sign`, `right_sign`, `exam_session`, `is_name`, `is_father_name`, `is_mother_name`, `is_dob`, `is_admission_no`, `is_roll_no`, `is_photo`, `is_division`, `is_customfield`, `background_img`, `date`, `is_class`, `is_section`, `content`, `content_footer`, `created_at`, `updated_at`) VALUES (1, 'Sample Marksheet', 'BOARD OF SECONDARY EDUCATION, MADHYA PRADESH, BHOPAL', 'BOARD OF SECONDARY EDUCATION, MADHYA PRADESH, BHOPAL', 'f314cec3f688771ccaeddbcee6e52f7c.png', 'e824b2df53266266be2dbfd2001168b8.png', 'HIGHER SECONDARY SCHOOL CERTIFICATE EXAMINATION', 'Mount Carmel School', 'GOVT GIRLS H S SCHOOL', '331e0690e50f8c6b7a219a0a2b9667f7.png', '351f513d79ee5c0f642c2d36514a1ff4.png', 'fb79d2c0d163357d1706b78550a05e2c.png', 1, 1, 1, 1, 1, 1, 1, 1, 1, 1, '', NULL, 0, 0, NULL, NULL, '2020-02-28 07:26:06', NULL);


#
# TABLE STRUCTURE FOR: timetables
#

DROP TABLE IF EXISTS `timetables`;

CREATE TABLE `timetables` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `teacher_subject_id` int(20) DEFAULT NULL,
  `day_name` varchar(50) DEFAULT NULL,
  `start_time` varchar(50) DEFAULT NULL,
  `end_time` varchar(50) DEFAULT NULL,
  `room_no` varchar(50) DEFAULT NULL,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: topic
#

DROP TABLE IF EXISTS `topic`;

CREATE TABLE `topic` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `session_id` int(11) NOT NULL,
  `lesson_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `status` int(11) NOT NULL,
  `complete_date` date NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  KEY `session_id` (`session_id`),
  KEY `lesson_id` (`lesson_id`),
  CONSTRAINT `topic_ibfk_1` FOREIGN KEY (`session_id`) REFERENCES `sessions` (`id`) ON DELETE CASCADE,
  CONSTRAINT `topic_ibfk_2` FOREIGN KEY (`lesson_id`) REFERENCES `lesson` (`id`) ON DELETE CASCADE
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

INSERT INTO `topic` (`id`, `session_id`, `lesson_id`, `name`, `status`, `complete_date`, `created_at`) VALUES (1, 15, 1, 'Physics', 0, '0000-00-00', '2021-10-04 10:51:39');


#
# TABLE STRUCTURE FOR: transport_route
#

DROP TABLE IF EXISTS `transport_route`;

CREATE TABLE `transport_route` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_title` varchar(100) DEFAULT NULL,
  `no_of_vehicle` int(11) DEFAULT NULL,
  `fare` float(10,2) DEFAULT NULL,
  `note` text,
  `is_active` varchar(255) DEFAULT 'no',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: userlog
#

DROP TABLE IF EXISTS `userlog`;

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user` varchar(100) DEFAULT NULL,
  `role` varchar(100) DEFAULT NULL,
  `class_section_id` int(11) DEFAULT NULL,
  `ipaddress` varchar(100) DEFAULT NULL,
  `user_agent` varchar(500) DEFAULT NULL,
  `login_datetime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=25 DEFAULT CHARSET=utf8;

INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (1, 'info@1pixelcoding.com', 'Super Admin', NULL, '127.0.0.1', 'Firefox 91.0, Windows 10', '2021-09-07 10:41:03');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (2, 'info@1pixelcoding.com', 'Super Admin', NULL, '111.119.187.34', 'Firefox 91.0, Windows 10', '2021-09-07 22:47:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (3, 'info@1pixelcoding.com', 'Super Admin', NULL, '111.119.187.34', 'Firefox 91.0, Windows 10', '2021-09-07 22:51:48');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (4, 'info@1pixelcoding.com', 'Super Admin', NULL, '111.119.187.8', 'Firefox 92.0, Windows 10', '2021-09-15 06:35:56');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (5, 'info@1pixelcoding.com', 'Super Admin', NULL, '111.119.187.22', 'Firefox 92.0, Windows 10', '2021-09-25 12:23:02');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (6, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Safari 604.1, iOS', '2021-09-27 13:19:22');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (7, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-27 13:27:22');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (8, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-27 16:14:42');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (9, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-29 10:08:38');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (10, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-30 07:40:32');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (11, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-30 12:10:25');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (12, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-30 12:30:44');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (13, 'info@1pixelcoding.com', 'Super Admin', NULL, '111.119.187.34', 'Firefox 92.0, Windows 10', '2021-09-30 12:31:07');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (14, 'info@1pixelcoding.com', 'Super Admin', NULL, '103.255.7.21', 'Chrome 94.0.4606.61, Windows 10', '2021-09-30 12:39:00');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (15, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-09-30 21:46:38');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (16, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-10-01 08:43:38');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (17, 'irshad@yopmail.com', 'Teacher', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-10-01 09:43:58');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (18, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-10-01 10:44:52');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (19, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Safari 604.1, iOS', '2021-10-01 22:22:55');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (20, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Safari 604.1, iOS', '2021-10-03 20:51:41');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (21, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-10-03 21:47:16');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (22, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-10-04 09:59:19');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (23, 'info@1pixelcoding.com', 'Super Admin', NULL, '111.119.187.43', 'Firefox 92.0, Windows 10', '2021-10-04 11:40:06');
INSERT INTO `userlog` (`id`, `user`, `role`, `class_section_id`, `ipaddress`, `user_agent`, `login_datetime`) VALUES (24, 'info@1pixelcoding.com', 'Super Admin', NULL, '82.0.18.148', 'Opera 79.0.4143.61, Windows 10', '2021-10-04 17:13:23');


#
# TABLE STRUCTURE FOR: users
#

DROP TABLE IF EXISTS `users`;

CREATE TABLE `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `childs` text NOT NULL,
  `role` varchar(30) NOT NULL,
  `verification_code` varchar(200) NOT NULL,
  `lang_id` int(11) NOT NULL,
  `is_active` varchar(255) DEFAULT 'yes',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=299 DEFAULT CHARSET=utf8;

INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (1, 1, 'std1', 'mp1ri8', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (2, 1, 'parent1', 'saqoum', '1', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (3, 2, 'std2', 'mlty4x', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (4, 2, 'parent2', '3mlkkq', '2', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (5, 3, 'std3', 'vbvtzb', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (6, 3, 'parent3', 'p30yyw', '3', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (7, 4, 'std4', 'ee9w06', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (8, 4, 'parent4', 'sdn37b', '4', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (9, 5, 'std5', 'jypzo3', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (10, 5, 'parent5', 'rlf6vp', '5', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (11, 6, 'std6', 'wpvh6y', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (12, 6, 'parent6', '6cx0ye', '6', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (13, 7, 'std7', '9rh6hj', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (14, 7, 'parent7', '4pozto', '7', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (15, 8, 'std8', 'by9fzw', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (16, 8, 'parent8', 'ybdc4q', '8', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (17, 9, 'std9', '9646iq', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (18, 9, 'parent9', '85j0j7', '9', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (19, 10, 'std10', '88sn5l', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (20, 10, 'parent10', 'lv662z', '10', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (21, 11, 'std11', 'roa9r5', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (22, 11, 'parent11', 'rvwgig', '11', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (23, 12, 'std12', 'g5w9yk', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (24, 12, 'parent12', 'yflg97', '12', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (25, 13, 'std13', 'f2a73a', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (26, 13, 'parent13', '1hggkv', '13', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (27, 14, 'std14', 'eu9fze', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (28, 14, 'parent14', 'rt4n2b', '14', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (29, 15, 'std15', 'szvq1t', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (30, 15, 'parent15', 'c38yqt', '15', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (31, 16, 'std16', 'thepxr', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (32, 16, 'parent16', 'xzxq36', '16', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (33, 17, 'std17', 'g9hciv', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (34, 17, 'parent17', 'n1l4kd', '17', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (35, 18, 'std18', 'jb3utb', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (36, 18, 'parent18', '1z15i0', '18', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (37, 19, 'std19', 'x05gqu', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (38, 19, 'parent19', '48kd7m', '19', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (39, 20, 'std20', 'td5h72', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (40, 20, 'parent20', 'nk3pyg', '20', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (41, 21, 'std21', '7toymv', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (42, 21, 'parent21', 'mopxoq', '21', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (43, 22, 'std22', 'bike3w', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (44, 22, 'parent22', 'ceydsp', '22', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (45, 23, 'std23', '1qwb04', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (46, 23, 'parent23', 'dtp51m', '23', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (47, 24, 'std24', 'vintdn', '', 'student', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (48, 24, 'parent24', '99ds72', '24', 'parent', '', 0, 'yes', '2021-09-30 02:02:14', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (49, 25, 'std25', 'yas7jd', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (50, 25, 'parent25', 'i98z0k', '25', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (51, 26, 'std26', 'w6e95v', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (52, 26, 'parent26', 'h94za2', '26', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (53, 27, 'std27', 'awek0s', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (54, 27, 'parent27', '6xz5gf', '27', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (55, 28, 'std28', 'bkb5n0', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (56, 28, 'parent28', 'fydy0a', '28', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (57, 29, 'std29', '2t4g1k', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (58, 29, 'parent29', 'z9p0oi', '29', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (59, 30, 'std30', 'piz6yp', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (60, 30, 'parent30', '6hs08b', '30', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (61, 31, 'std31', '2p2eqr', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (62, 31, 'parent31', 'mhieto', '31', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (63, 32, 'std32', 'g2wtsy', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (64, 32, 'parent32', '6hsnfk', '32', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (65, 33, 'std33', 'w3hyo7', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (66, 33, 'parent33', 'ktdoch', '33', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (67, 34, 'std34', 'x3jdjw', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (68, 34, 'parent34', 'oztk2f', '34', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (69, 35, 'std35', 'cplq5v', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (70, 35, 'parent35', 'c5i0rs', '35', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (71, 36, 'std36', 'q2tb0s', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (72, 36, 'parent36', 't93hok', '36', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (73, 37, 'std37', '6j3etz', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (74, 37, 'parent37', 'a70678', '37', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (75, 38, 'std38', 'vxc5v6', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (76, 38, 'parent38', 'hc7y93', '38', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (77, 39, 'std39', 'yu9a12', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (78, 39, 'parent39', '5wolo2', '39', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (79, 40, 'std40', 'uh41ky', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (80, 40, 'parent40', '6n5u0s', '40', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (81, 41, 'std41', 'ka4606', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (82, 41, 'parent41', 'fut7ar', '41', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (83, 42, 'std42', 'bmq4ul', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (84, 42, 'parent42', '533y3s', '42', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (85, 43, 'std43', '67u2wn', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (86, 43, 'parent43', '8e0zjz', '43', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (87, 44, 'std44', 'h24xo3', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (88, 44, 'parent44', 'i4hzfg', '44', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (89, 45, 'std45', 'ka12lw', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (90, 45, 'parent45', 'y1jedh', '45', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (91, 46, 'std46', 'hi8afy', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (92, 46, 'parent46', '5cotsy', '46', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (93, 47, 'std47', '9r50e0', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (94, 47, 'parent47', '4bdimj', '47', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (95, 48, 'std48', 'ng7fi7', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (96, 48, 'parent48', '8tum61', '48', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (97, 49, 'std49', '3780q6', '', 'student', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (98, 49, 'parent49', 'lh4ksy', '49', 'parent', '', 0, 'yes', '2021-09-30 02:02:35', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (99, 50, 'std50', 'er3wtp', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (100, 50, 'parent50', '1qh240', '50', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (101, 51, 'std51', 'o5sbas', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (102, 51, 'parent51', 'snrxq3', '51', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (103, 52, 'std52', 'lv3qd5', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (104, 52, 'parent52', 'ak7l5d', '52', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (105, 53, 'std53', 'enbzi5', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (106, 53, 'parent53', 'vmachc', '53', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (107, 54, 'std54', '5wrtta', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (108, 54, 'parent54', 'l6mlgj', '54', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (109, 55, 'std55', 'jszkkx', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (110, 55, 'parent55', 'jbfje3', '55', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (111, 56, 'std56', '5pmdyw', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (112, 56, 'parent56', '35957b', '56', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (113, 57, 'std57', '47lxw9', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (114, 57, 'parent57', 'ycxdfc', '57', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (115, 58, 'std58', 'm8hwpm', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (116, 58, 'parent58', 'wbo5w1', '58', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (117, 59, 'std59', '34hipz', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (118, 59, 'parent59', 'cimd3i', '59', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (119, 60, 'std60', 't7wels', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (120, 60, 'parent60', 'zddmjh', '60', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (121, 61, 'std61', 'd24wv2', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (122, 61, 'parent61', '83ev45', '61', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (123, 62, 'std62', 'yz8d9n', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (124, 62, 'parent62', 'bmz327', '62', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (125, 63, 'std63', '87nwlo', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (126, 63, 'parent63', 'dvsfbb', '63', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (127, 64, 'std64', 'm8e6pm', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (128, 64, 'parent64', 'wj0mwe', '64', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (129, 65, 'std65', '2kbdqf', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (130, 65, 'parent65', 'v77njm', '65', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (131, 66, 'std66', 'r3vkw3', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (132, 66, 'parent66', 't5y9i8', '66', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (133, 67, 'std67', 'xtkbbf', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (134, 67, 'parent67', 's45erb', '67', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (135, 68, 'std68', 'kqj0gm', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (136, 68, 'parent68', 'i2wd4c', '68', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (137, 69, 'std69', 'tlshz6', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (138, 69, 'parent69', 'f36qkz', '69', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (139, 70, 'std70', '4yvwv1', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (140, 70, 'parent70', 'iuxzz0', '70', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (141, 71, 'std71', '8r8amd', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (142, 71, 'parent71', 'bgiczr', '71', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (143, 72, 'std72', '7ed89i', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (144, 72, 'parent72', 'xot5yd', '72', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (145, 73, 'std73', 'l8xqtq', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (146, 73, 'parent73', 'vm9rgb', '73', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (147, 74, 'std74', '8c3vuj', '', 'student', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (148, 74, 'parent74', 'eaq2kf', '74', 'parent', '', 0, 'yes', '2021-09-30 02:02:55', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (149, 75, 'std75', 'kbezwe', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (150, 75, 'parent75', 'wgiz60', '75', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (151, 76, 'std76', 'uqtkq9', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (152, 76, 'parent76', 'di2ea3', '76', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (153, 77, 'std77', 'o7woqy', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (154, 77, 'parent77', 'n3zi9t', '77', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (155, 78, 'std78', 'tvl7mw', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (156, 78, 'parent78', '77hk52', '78', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (157, 79, 'std79', '6bozvc', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (158, 79, 'parent79', 'ujqolo', '79', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (159, 80, 'std80', '8p9vzc', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (160, 80, 'parent80', 'mx3aav', '80', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (161, 81, 'std81', 'xaygna', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (162, 81, 'parent81', '99qu4w', '81', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (163, 82, 'std82', 'kgmff0', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (164, 82, 'parent82', 'p14pnv', '82', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (165, 83, 'std83', 'opdylt', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (166, 83, 'parent83', 'stxmhn', '83', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (167, 84, 'std84', '8wqk5j', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (168, 84, 'parent84', 'zvqiiq', '84', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (169, 85, 'std85', '82mjyo', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (170, 85, 'parent85', 'l7nq5u', '85', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (171, 86, 'std86', '4154vb', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (172, 86, 'parent86', 'qutodl', '86', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (173, 87, 'std87', 'd3cv0p', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (174, 87, 'parent87', 'x1it6t', '87', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (175, 88, 'std88', 'tarare', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (176, 88, 'parent88', 'k79gjt', '88', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (177, 89, 'std89', 's5zbw7', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (178, 89, 'parent89', '871tyn', '89', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (179, 90, 'std90', 'ehg2m4', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (180, 90, 'parent90', '3mte6q', '90', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (181, 91, 'std91', '6e5rfy', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (182, 91, 'parent91', 'o54p7t', '91', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (183, 92, 'std92', 'wpsebk', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (184, 92, 'parent92', 'n0s0k7', '92', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (185, 93, 'std93', 'yptma0', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (186, 93, 'parent93', '3qlj7t', '93', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (187, 94, 'std94', 'ftti3g', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (188, 94, 'parent94', 'zuwcz0', '94', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (189, 95, 'std95', '6w1qzh', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (190, 95, 'parent95', 'yptrw4', '95', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (191, 96, 'std96', 'i5ppgl', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (192, 96, 'parent96', 'saehho', '96', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (193, 97, 'std97', '449mks', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (194, 97, 'parent97', 'gl3g2j', '97', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (195, 98, 'std98', 'wfgyn7', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (196, 98, 'parent98', 'saf6zn', '98', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (197, 99, 'std99', 't1mq4x', '', 'student', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (198, 99, 'parent99', 'yn2ndb', '99', 'parent', '', 0, 'yes', '2021-09-30 02:03:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (199, 100, 'std100', 'qx9rx2', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (200, 100, 'parent100', 'ceik0a', '100', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (201, 101, 'std101', 'e5q3fv', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (202, 101, 'parent101', '2x46ql', '101', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (203, 102, 'std102', 'qba3ol', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (204, 102, 'parent102', 'ldsn68', '102', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (205, 103, 'std103', '1f03h4', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (206, 103, 'parent103', 'ypdex3', '103', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (207, 104, 'std104', 'v42rxh', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (208, 104, 'parent104', 'fkg7wy', '104', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (209, 105, 'std105', '3z74n8', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (210, 105, 'parent105', 'ofrpcd', '105', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (211, 106, 'std106', 'pglb9s', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (212, 106, 'parent106', '5x9e0y', '106', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (213, 107, 'std107', '1003gs', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (214, 107, 'parent107', 'cnypbb', '107', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (215, 108, 'std108', '6butek', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (216, 108, 'parent108', 'kcsagg', '108', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (217, 109, 'std109', 'swtvkh', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (218, 109, 'parent109', '1zqwei', '109', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (219, 110, 'std110', '4q12jv', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (220, 110, 'parent110', '68rfvc', '110', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (221, 111, 'std111', 'luxbsw', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (222, 111, 'parent111', '4l1rzo', '111', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (223, 112, 'std112', '74c27m', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (224, 112, 'parent112', 'jjs2h4', '112', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (225, 113, 'std113', 'f4e0oz', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (226, 113, 'parent113', 'vspzfj', '113', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (227, 114, 'std114', 'fc4l3p', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (228, 114, 'parent114', 'tm07zh', '114', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (229, 115, 'std115', 'onf97i', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (230, 115, 'parent115', 'xo365h', '115', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (231, 116, 'std116', '956oew', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (232, 116, 'parent116', 'uefwkv', '116', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (233, 117, 'std117', 'yg06jz', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (234, 117, 'parent117', 'bx6plu', '117', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (235, 118, 'std118', 'ocr47q', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (236, 118, 'parent118', 'ws9cor', '118', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (237, 119, 'std119', '9gkm5i', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (238, 119, 'parent119', 'jylcv6', '119', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (239, 120, 'std120', '7f4rcr', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (240, 120, 'parent120', 'dcz325', '120', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (241, 121, 'std121', 'yfh7s0', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (242, 121, 'parent121', '5dpa2q', '121', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (243, 122, 'std122', 'al1nia', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (244, 122, 'parent122', '8fcr9m', '122', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (245, 123, 'std123', 'w7nfkl', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (246, 123, 'parent123', '3n2diu', '123', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (247, 124, 'std124', '9e4ok0', '', 'student', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (248, 124, 'parent124', '6otdej', '124', 'parent', '', 0, 'yes', '2021-09-30 02:03:39', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (249, 125, 'std125', 'ed21rm', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (250, 125, 'parent125', 'i3wakz', '125', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (251, 126, 'std126', 'sfr72h', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (252, 126, 'parent126', 'yaf9bp', '126', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (253, 127, 'std127', 'i2vdsa', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (254, 127, 'parent127', 'nn3smn', '127', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (255, 128, 'std128', 'p7sb9p', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (256, 128, 'parent128', '8c5s7l', '128', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (257, 129, 'std129', 'uoacuz', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (258, 129, 'parent129', '9i2agd', '129', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (259, 130, 'std130', '8fp2cw', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (260, 130, 'parent130', 'en87i6', '130', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (261, 131, 'std131', '6j34ar', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (262, 131, 'parent131', 'zvvt3l', '131', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (263, 132, 'std132', 'wwv4ix', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (264, 132, 'parent132', 'k9aeq3', '132', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (265, 133, 'std133', 'go2yrn', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (266, 133, 'parent133', '93nda5', '133', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (267, 134, 'std134', 'o3zy8k', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (268, 134, 'parent134', 'htppjj', '134', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (269, 135, 'std135', '4a6uqs', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (270, 135, 'parent135', 'a1l3wl', '135', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (271, 136, 'std136', 'g71b92', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (272, 136, 'parent136', 'pfjrzk', '136', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (273, 137, 'std137', 'is7hz8', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (274, 137, 'parent137', '4t8ima', '137', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (275, 138, 'std138', 'sjug6i', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (276, 138, 'parent138', 'chfz9q', '138', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (277, 139, 'std139', 'pemkb4', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (278, 139, 'parent139', 'lahpjk', '139', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (279, 140, 'std140', '7pzu6p', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (280, 140, 'parent140', '79ktlu', '140', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (281, 141, 'std141', 'xy07hq', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (282, 141, 'parent141', '7dqnr2', '141', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (283, 142, 'std142', '5ayqd4', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (284, 142, 'parent142', 'lt7vh5', '142', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (285, 143, 'std143', 't7psjd', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (286, 143, 'parent143', 'oikmgl', '143', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (287, 144, 'std144', 'l7ther', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (288, 144, 'parent144', 'q6qhv7', '144', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (289, 145, 'std145', 'bjndoz', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (290, 145, 'parent145', 'isr9lr', '145', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (291, 146, 'std146', '9qnqg0', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (292, 146, 'parent146', '9gn25m', '146', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (293, 147, 'std147', 'zvm5i6', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (294, 147, 'parent147', 'rqwqmv', '147', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (295, 148, 'std148', 'vx3iqy', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (296, 148, 'parent148', 'qj4ppp', '148', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (297, 149, 'std149', 'su1oxq', '', 'student', '', 0, 'yes', '2021-09-30 02:04:12', NULL);
INSERT INTO `users` (`id`, `user_id`, `username`, `password`, `childs`, `role`, `verification_code`, `lang_id`, `is_active`, `created_at`, `updated_at`) VALUES (298, 149, 'parent149', 'ot2qc8', '149', 'parent', '', 0, 'yes', '2021-09-30 02:04:12', NULL);


#
# TABLE STRUCTURE FOR: users_authentication
#

DROP TABLE IF EXISTS `users_authentication`;

CREATE TABLE `users_authentication` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `users_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `expired_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: vehicle_routes
#

DROP TABLE IF EXISTS `vehicle_routes`;

CREATE TABLE `vehicle_routes` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `route_id` int(11) DEFAULT NULL,
  `vehicle_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: vehicles
#

DROP TABLE IF EXISTS `vehicles`;

CREATE TABLE `vehicles` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `vehicle_no` varchar(20) DEFAULT NULL,
  `vehicle_model` varchar(100) NOT NULL DEFAULT 'None',
  `manufacture_year` varchar(4) DEFAULT NULL,
  `driver_name` varchar(50) DEFAULT NULL,
  `driver_licence` varchar(50) NOT NULL DEFAULT 'None',
  `driver_contact` varchar(20) DEFAULT NULL,
  `note` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: visitors_book
#

DROP TABLE IF EXISTS `visitors_book`;

CREATE TABLE `visitors_book` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `source` varchar(100) DEFAULT NULL,
  `purpose` varchar(255) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) DEFAULT NULL,
  `contact` varchar(12) NOT NULL,
  `id_proof` varchar(50) NOT NULL,
  `no_of_pepple` int(11) NOT NULL,
  `date` date NOT NULL,
  `in_time` varchar(20) NOT NULL,
  `out_time` varchar(20) NOT NULL,
  `note` text NOT NULL,
  `image` varchar(100) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

#
# TABLE STRUCTURE FOR: visitors_purpose
#

DROP TABLE IF EXISTS `visitors_purpose`;

CREATE TABLE `visitors_purpose` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `visitors_purpose` varchar(100) NOT NULL,
  `description` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

