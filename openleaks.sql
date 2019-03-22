-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 13, 2018 at 10:12 AM
-- Server version: 5.6.21
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `openleaks`
--

-- --------------------------------------------------------

--
-- Table structure for table `submission`
--

CREATE TABLE IF NOT EXISTS `submission` (
`sno` int(200) NOT NULL,
  `id` varchar(100) NOT NULL,
  `f1` varchar(1000) DEFAULT NULL,
  `f2` varchar(1000) DEFAULT NULL,
  `f3` varchar(1000) DEFAULT NULL,
  `f4` varchar(1000) DEFAULT NULL,
  `title` varchar(1000) DEFAULT NULL,
  `org` varchar(1000) DEFAULT NULL,
  `thedate` varchar(100) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `description` varchar(10000) DEFAULT NULL,
  `verified` varchar(10) DEFAULT NULL,
  `views` varchar(100) DEFAULT NULL
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `submission`
--

INSERT INTO `submission` (`sno`, `id`, `f1`, `f2`, `f3`, `f4`, `title`, `org`, `thedate`, `location`, `description`, `verified`, `views`) VALUES
(7, '12689', 'posts/1/456.jpg', 'posts/1/Traffic.docx', '', '', 'Bribing of traffic police', 'Traffic department', '07-03-2018', 'Hyderabad', 'Hyderabad\r\n\r\nOn 7th march a  schocking incident came to light when a traffic cop was caught taking a bribe of 10,000 from a drunk guy and was beahved in a very rude manner when i tried to click a photo if him however i was able to click this poc of him taking the bribe. ', '1', '1'),
(8, '30966', 'posts/2/PNBScam.docx', 'posts/2/image.jpg', '', '', 'Punjab National Bank Scam', 'Punjab National Bank ', '15-02-2018', 'Mumbai', 'A Rs.12,600 crores fraud at Indiaâ€™s biggest state run lender Punjab National Bank has disturbed the nationâ€™s financial sector triggering a massive probe and regulatory changes .The CBI registered a case against jeweler Nirav Modi on Thursday  in connection with the alleged fraud in credit facilities extended by Punjab National Bank causing a loss of Rs.321crores.', '1', '0'),
(9, '9463', 'posts/3/Lawyer.docx', 'posts/3/Wertkin_319.jpg', '', '', 'Ex-Justice Dept. Lawyer is Corrupted', 'Justice Department', '13-1-2018', 'Washington DC', 'A former corporate-fraud prosecutor carried out the â€œmost seriousâ€ example of public corruption by a U.S. Department of Justice attorney in years by stealing more than 40 whistleblower fraud cases in 2016 and trying to sell the secret information to companies under federal investigation', '1', '0'),
(10, '12132', 'posts/4/Caught on camera.docx', 'posts/4/caught on cam1.png', 'posts/4/caught on cam2.png', 'posts/4/caught on cam3.png', 'ACP caught slapping a woman', 'Police Department', '17-2-17', 'Hyderabad', 'In a social issue case, an Assistant Commissioner of Police (ACP) in Hyderabad slapped women accused of theft while a press conference was going on.\r\n	The person was identified as S Ranga Rao, the Begumpet ACP was later transferred to the City Armed Reserved (CAR) headquarters.\r\n	In the presence of  the press, Rao who was apparently interrogating the accused , turning towards the woman, suddenly slapped her in the middle of the conversation.\r\n', '1', '0'),
(11, '9718', 'posts/5/farah1.png', 'posts/5/Farah 2.png', 'posts/5/Farah 3.png', '', 'Farah Khan after working with Jahnavi on Dhadak: Unfair to compare Sridevi and her ', 'Film Industry', '12th March 2018', 'Mumbai', ': Farah Khan, who worked with Sridevi and now choreographed for Jahnavi in the film Dhadak, feels it would be unfair to compare the newcomer with her mother.\r\n	â€œJahnavi is absolutely lovely and she is a very good dancer. She picks up really fast and to compare her to her mother is the most unfair thing I think because Sri by her age was already a veteran and this is Jahnaviâ€™s first film. I love Sri. When I started my career, she really pushed me and I used to do all her shows. But everybody is (a different) individual,â€ Farah told PTI.\r\n	Farah has recreated the popular track Zingat from blockbuster Marathi film Sairat for the Hindi remake version of Karan Johar produced Dhadak, that marks the acting debut of Jahnavi and Shahid Kapoorâ€™s half brother Ishaan Khatter.\r\n', '1', '0');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
`sno` int(100) NOT NULL,
  `id` varchar(1000) NOT NULL,
  `password` varchar(1000) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`sno`, `id`, `password`) VALUES
(1, 'arish', 'iamarish'),
(2, 'moiz', 'iammoiz'),
(3, 'ishaq', 'iamishaq'),
(4, 'naseer', 'iamnaseer'),
(5, 'shabbir', 'iamshabbir'),
(6, 'bari', 'iambari');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `submission`
--
ALTER TABLE `submission`
 ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`sno`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `submission`
--
ALTER TABLE `submission`
MODIFY `sno` int(200) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `sno` int(100) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
