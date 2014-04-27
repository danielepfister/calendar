/*

This SQL script will create the database for the calendar webapp. 

The only thing that needs to be changed is the name of the database used.
Change the [DATABASENAME] and remove the []. 

Once finish, run the script in your database. 

*/

USE DATABASENAME;
CREATE TABLE `events` (
  `id` int(11) NOT NULL auto_increment,
  `eventTitle` varchar(999) NOT NULL,
  `schoolYear` varchar(10) NOT NULL,
  `location` varchar(99) NOT NULL,
  `description` longtext,
  `link` longtext,
  `startMonth` int(2) NOT NULL,
  `startDate` int(2) default NULL,
  `startYear` int(4) NOT NULL,
  `endMonth` int(2) default NULL,
  `endDate` int(2) default NULL,
  `endYear` int(4) default NULL,
  `postToHome` tinyint(1) NOT NULL,
  PRIMARY KEY  (`id`),
  UNIQUE KEY `id_UNIQUE` (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=1 DEFAULT CHARSET=latin1;

