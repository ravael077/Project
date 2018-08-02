create database tcc;

use tcc;

CREATE TABLE `members` (
  `id` int(11) NOT NULL auto_increment,
  `name` varchar(100) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `nohp` varchar(12) NOT NULL,
  `email` varchar(100) NOT NULL,
  PRIMARY KEY  (`id`)
);