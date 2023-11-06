


CREATE TABLE `user` (
  `userID` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `address` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `profile_img` varchar(50) NOT NULL,
  `role` varchar(50) NOT NULL,
  `status` varchar(50) NOT NULL
) 

CREATE TABLE `activities` (
  `id` int(11) NOT NULL PRIMARY KEY AUTO_INCREMENT,
  `activityName` varchar(50) NOT NULL,
  `location` varchar(50) NOT NULL,
  `dateOfActivity` date DEFAULT NULL,
  `timeOfActivity` time DEFAULT NULL,
  `image` varchar(50) NOT NULL,
  `userID` int(11) DEFAULT NULL
)
