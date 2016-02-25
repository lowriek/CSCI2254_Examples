
CREATE TABLE IF NOT EXISTS `pwdemo` (
  `name` varchar(50) DEFAULT NULL,
  `pass` char(40) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pwdemo`
--

INSERT INTO `pwdemo` (`name`, `pass`) VALUES
('Hi', '94dd9e08c129c785f7f256e82fbe0a30e6d1ae40'),
('asdf', '92429d82a41e930486c6de5ebda9602d55c39986'),
('jamie', '99996b911567c83cce17cdf194f314975c57ddf1'),
('billy', '9d989e8d27dc9e0ec3389fc855f142c3d40f0c50');
