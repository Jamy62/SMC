-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 15, 2025 at 03:22 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smcdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintb`
--

CREATE TABLE `admintb` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(30) DEFAULT NULL,
  `AdminUserName` varchar(30) DEFAULT NULL,
  `AdminEmail` varchar(30) DEFAULT NULL,
  `AdminPassword` varchar(20) DEFAULT NULL,
  `AdminPh` varchar(30) DEFAULT NULL,
  `AdminAddress` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintb`
--

INSERT INTO `admintb` (`AdminID`, `AdminName`, `AdminUserName`, `AdminEmail`, `AdminPassword`, `AdminPh`, `AdminAddress`) VALUES
(1, 'Jamy', 'Jamy65', 'jamyll@gmail.com', 'Jfsfew23!@#', '09478564746', '43th Maple street'),
(2, 'Staci George', 'Staci65', 'gerogeStac@gmail.com', 'Stacy763!@23', '094626456', '56th Orange Street'),
(3, 'Elvin Singleton', 'Elvin876', 'Elvin846@gmail.com', 'Elvin53><!4', '0937645633', 'No 67, Pineapple street, Boosh'),
(4, 'Colby Palmer', 'Colby82', 'Colby847@gmail.com', 'Colby763!#.g', '093626545', 'No 867 Coconut Street'),
(5, 'Raleigh Moreno', 'Moren54', 'Moren7434@gmail.com', 'Morent2!@rh', '0946736437', 'No 8736 Handson St');

-- --------------------------------------------------------

--
-- Table structure for table `campaigntb`
--

CREATE TABLE `campaigntb` (
  `CampaignID` int(11) NOT NULL,
  `CampaignName` varchar(30) DEFAULT NULL,
  `CampaignTypeID` int(11) DEFAULT NULL,
  `MediaAppID` int(11) DEFAULT NULL,
  `CampaignImage1` varchar(255) DEFAULT NULL,
  `CampaignImage2` varchar(255) DEFAULT NULL,
  `CampaignImage3` varchar(255) DEFAULT NULL,
  `CampaignAim` varchar(255) DEFAULT NULL,
  `CampaignVision` varchar(255) DEFAULT NULL,
  `CampaignDescription` varchar(255) DEFAULT NULL,
  `CampaignStartDate` date DEFAULT NULL,
  `CampaignEndDate` date DEFAULT NULL,
  `CampaignFee` int(11) DEFAULT NULL,
  `CampaignMap` text DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigntb`
--

INSERT INTO `campaigntb` (`CampaignID`, `CampaignName`, `CampaignTypeID`, `MediaAppID`, `CampaignImage1`, `CampaignImage2`, `CampaignImage3`, `CampaignAim`, `CampaignVision`, `CampaignDescription`, `CampaignStartDate`, `CampaignEndDate`, `CampaignFee`, `CampaignMap`, `Status`) VALUES
(1, 'EduConnect', 1, 1, 'img/_c1.1.jpg', 'img/_c1.2.jfif', 'img/_c1.3.jpg', 'Promote quality education', 'Empower individuals through education', 'Join us in spreading awareness about the importance of education.', '2024-02-09', '2024-02-11', 5000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122212.21886559881!2d96.13113827724608!3d16.819814399999977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1937d3cf979a7%3A0x72baf40b78a5cb6b!2sThiri%20Mingala%20Kabar%20AyePagoda!5e0!3m2!1sen!2smm!4v1702457000433!5m2!1sen!2smm', 'Active'),
(2, 'Mind Matters Initiative', 2, 8, 'img/_c2.1.png', 'img/_c2.2.png', 'img/_c2.3.jpg', 'Break the stigma on mental health', 'A world where mental health is prioritized', 'Let\'s break the silence surrounding mental health and foster support.', '2024-02-08', '2024-02-16', 7000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6095.768655680846!2d97.0397221476112!3d20.75996909459206!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30ce87e9f9057309%3A0xdc20d52479800e9!2z4YCb4YCQ4YCU4YCs4YCU4YCU4YC64YC44oCL4YCQ4YCx4YCs4YC6IOGAn-GAreGAr-GAkOGAmuGAug!5e0!3m2!1sen!2smm!4v1706597258507!5m2!1sen!2smm', 'Active'),
(3, 'EcoGuardians Challenge', 3, 10, 'img/_c2.1.jfif', 'img/_c3.2.jfif', 'img/_c3.3.png', 'Preserve our planet', 'Sustainable living for future generations', 'Participate in activities that contribute to environmental conservation.', '2024-02-27', '2024-02-29', 3000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.467771999109!2d96.17540458072085!3d16.829553416962433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19337a5d07bab%3A0xad1f430c88b45e60!2sBauk%20Htaw%20Railway%20Station!5e0!3m2!1sen!2smm!4v1702457608168!5m2!1sen!2smm', 'Active'),
(4, 'Online Safety Crusade', 4, 3, 'img/_c4.1.jfif', 'img/_c4.2.jfif', 'img/_c4.3.jfif', 'Create a safer online space', 'A digital world free from cyberbullying', 'Join our campaign to prevent cyberbullying and promote online safety.', '2024-03-07', '2024-03-14', 0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.731995268575!2d96.12159092434385!3d16.790004219199048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb037a407765%3A0xe694d78e2ed00813!2sPoint%20car%20alignment%20and%20suspension%20center!5e0!3m2!1sen!2smm!4v1706219842173!5m2!1sen!2smm', 'Active'),
(5, 'Green Tech Revolution', 3, 2, 'img/_c5.1.jfif', 'img/_c5.2.jfif', 'img/_c5.3.jfif', 'Promote sustainable technologies', 'A world where technology coexists harmoniously with the environment', 'Join the movement towards a sustainable future through innovative green technologies.', '2024-02-22', '2024-02-29', 10000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.467771999109!2d96.17540458072085!3d16.829553416962433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19337a5d07bab%3A0xad1f430c88b45e60!2sBauk%20Htaw%20Railway%20Station!5e0!3m2!1sen!2smm!4v1702457608168!5m2!1sen!2smm', 'Active'),
(6, 'BeKind Online Challenge', 4, 3, 'img/_c6.1.png', 'img/_c6.2.jfif', 'img/_c6.3.jfif', 'Encourage kindness in online interactions', 'A digital space where kindness prevails', 'Spread positivity online by participating in challenges that promote kindness and empathy.', '2024-02-07', '2024-03-06', 0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1909.467771999109!2d96.17540458072085!3d16.829553416962433!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19337a5d07bab%3A0xad1f430c88b45e60!2sBauk%20Htaw%20Railway%20Station!5e0!3m2!1sen!2smm!4v1702457608168!5m2!1sen!2smm', 'Active'),
(7, 'Art for Change Festival', 7, 1, 'img/_c7.1.jfif', 'img/_c7.2.jfif', 'img/_c7.3.png', 'Harness the power of art for social change', 'A world where art transforms communities positively', 'Join us in celebrating the impact of art on social change and community building.', '2024-03-08', '2024-03-11', 20000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.731995268575!2d96.12159092434385!3d16.790004219199048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb037a407765%3A0xe694d78e2ed00813!2sPoint%20car%20alignment%20and%20suspension%20center!5e0!3m2!1sen!2smm!4v1706219842173!5m2!1sen!2smm', 'Active'),
(8, 'Fitness for All Challenge', 7, 4, 'img/_c8.1.jfif', 'img/_c8.2.jfif', 'img/_c8.3.jfif', 'Promote fitness and well-being', 'Healthy and active communities for everyone', 'Join the fitness challenge to inspire and encourage a healthier lifestyle for all.', '2024-03-14', '2024-03-28', 8000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.731995268575!2d96.12159092434385!3d16.790004219199048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb037a407765%3A0xe694d78e2ed00813!2sPoint%20car%20alignment%20and%20suspension%20center!5e0!3m2!1sen!2smm!4v1706219842173!5m2!1sen!2smm', 'Active'),
(9, 'Community Connect Initiative', 5, 10, 'img/_c9.1.png', 'img/_c9.2.jfif', 'img/_c9.3.jfif', 'Strengthen community bonds', 'Thriving communities where everyone belongs', 'Join hands in community-building activities to foster stronger connections and a sense of belonging.', '2024-02-16', '2024-02-19', 3000, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3819.731995268575!2d96.12159092434385!3d16.790004219199048!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb037a407765%3A0xe694d78e2ed00813!2sPoint%20car%20alignment%20and%20suspension%20center!5e0!3m2!1sen!2smm!4v1706219842173!5m2!1sen!2smm', 'Active'),
(10, 'Healthy Habits Challenge', 6, 4, 'img/_c10.1.jfif', 'img/_c10.2.png', 'img/_c10.3.jfif', 'Encourage healthy lifestyle choices', 'A community committed to well-being', 'Take part in the Healthy Habits Challenge to promote and adopt healthier lifestyle choices within our community.', '2024-03-08', '2024-04-23', 0, 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122212.21886559881!2d96.13113827724608!3d16.819814399999977!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1937d3cf979a7%3A0x72baf40b78a5cb6b!2sThiri%20Mingala%20Kabar%20AyePagoda!5e0!3m2!1sen!2smm!4v1702457000433!5m2!1sen!2smm', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `campaigntypetb`
--

CREATE TABLE `campaigntypetb` (
  `CampaignTypeID` int(11) NOT NULL,
  `CampaignTypeName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigntypetb`
--

INSERT INTO `campaigntypetb` (`CampaignTypeID`, `CampaignTypeName`) VALUES
(1, 'Education'),
(2, 'Mental Health'),
(3, 'Environmental'),
(4, 'Cyberbullying'),
(5, ' Community Building'),
(6, 'Health and Wellness'),
(7, 'Arts and Creativity');

-- --------------------------------------------------------

--
-- Table structure for table `contacttb`
--

CREATE TABLE `contacttb` (
  `ContactID` int(11) NOT NULL,
  `ContactMessage` varchar(255) DEFAULT NULL,
  `Subject` varchar(30) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contacttb`
--

INSERT INTO `contacttb` (`ContactID`, `ContactMessage`, `Subject`, `MemberID`) VALUES
(1, 'Hi Admins, I\'m experiencing issues with logging in. Can you please assist?', 'Login troubles', 1),
(2, 'I noticed a bug in the website\'s chat feature. Messages aren\'t delivering properly.', 'Chat bug', 1),
(3, 'Dear Admins, I have suggestions for improving the community forums. Can we discuss them?', 'Forum Enhancement Ideas', 2),
(4, 'Urgent: I\'ve found inappropriate content in one of the campaigns. Please take action.', 'Content Concern', 2),
(5, 'Hello Admin Team, I encountered an issue with the newsletter subscription. It\'s not working for me.', 'Newsletter Subscription Proble', 2);

-- --------------------------------------------------------

--
-- Table structure for table `jointb`
--

CREATE TABLE `jointb` (
  `JoinID` int(11) NOT NULL,
  `JoinDate` date DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `PhoneNo` varchar(30) DEFAULT NULL,
  `Description` varchar(30) DEFAULT NULL,
  `PaymentType` varchar(30) DEFAULT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `CampaignID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jointb`
--

INSERT INTO `jointb` (`JoinID`, `JoinDate`, `Status`, `Email`, `PhoneNo`, `Description`, `PaymentType`, `MemberID`, `CampaignID`) VALUES
(2, '2024-02-09', 'Pending', 'aureliaM23@gmail.com', '0967547754', 'I wanna join this too', 'IP', 2, 2),
(3, '2024-03-08', 'Pending', 'jamy12ll@gmail.com', '0974637464', 'I kinda like this', 'IP', 1, 4),
(4, '2024-02-09', 'Pending', 'jamy12ll@gmail.com', '0974637464', 'I am pretty kind and humble', 'MPU', 1, 6),
(5, '2024-03-16', 'Pending', 'jamy12ll@gmail.com', '0974637464', 'I wanna get buff', 'VISA', 1, 8);

-- --------------------------------------------------------

--
-- Table structure for table `mediatb`
--

CREATE TABLE `mediatb` (
  `MediaAppID` int(11) NOT NULL,
  `MediaAppName` varchar(30) DEFAULT NULL,
  `MediaLogo` varchar(255) DEFAULT NULL,
  `MediaLink` varchar(255) DEFAULT NULL,
  `MediaRating` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `mediatb`
--

INSERT INTO `mediatb` (`MediaAppID`, `MediaAppName`, `MediaLogo`, `MediaLink`, `MediaRating`) VALUES
(1, 'Facebook', 'img/_facebook.png', 'https://www.facebook.com/', 4),
(2, 'Reddit', 'img/_reddit.jpg', 'https://www.reddit.com/', 5),
(3, 'X', 'img/_x.png', 'https://twitter.com/', 3),
(4, 'Instagram', 'img/_insta.jpg', 'https://www.instagram.com/', 4),
(5, 'WhatsApp', 'img/_whatsup.png', 'https://www.whatsapp.com/', 5),
(6, 'Youtube', 'img/_yt.jpg', 'https://www.youtube.com/', 5),
(7, 'TikTok', 'img/_tiktok.png', 'https://www.tiktok.com', 4),
(8, 'Telegram', 'img/_telegram.png', 'https://desktop.telegram.org/', 4),
(9, 'Snapchat', 'img/_snapchat.png', 'https://www.snapchat.com/', 2),
(10, 'Pinterest', 'img/_pinterest.png', 'https://www.pinterest.com/', 4);

-- --------------------------------------------------------

--
-- Table structure for table `membertb`
--

CREATE TABLE `membertb` (
  `MemberID` int(11) NOT NULL,
  `MemberFirstName` varchar(30) DEFAULT NULL,
  `MemberLastName` varchar(30) DEFAULT NULL,
  `MemberUserName` varchar(30) DEFAULT NULL,
  `MemberEmail` varchar(30) DEFAULT NULL,
  `MemberPh` varchar(30) DEFAULT NULL,
  `MemberPassword` varchar(30) DEFAULT NULL,
  `MemberRegisterMonth` varchar(20) DEFAULT NULL,
  `MemberProfile` varchar(255) DEFAULT NULL,
  `MemberAddress` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membertb`
--

INSERT INTO `membertb` (`MemberID`, `MemberFirstName`, `MemberLastName`, `MemberUserName`, `MemberEmail`, `MemberPh`, `MemberPassword`, `MemberRegisterMonth`, `MemberProfile`, `MemberAddress`) VALUES
(1, 'Jamy', 'Olive', 'Jamy234', 'jamy12ll@gmail.com', '0974637464', 'Jamy123!@#', 'January', 'img/_p10.png', 'No 163 Ahlone Road\r\nAhlone township'),
(2, 'Aurelia', 'Montgomery', 'AureliaM', 'aureliaM23@gmail.com', '0967547754', 'Aurelia@#233%g', 'January', 'img/_p1.png', '23 Main St, Cityville'),
(3, 'Zephyr', 'Rodriguez', 'ZephyrR43', 'zephyrrodriguez76@gmail.com', '09645643554', 'Zephye614@@f', 'January', 'img/_p2.png', '456 Sunset Blvd, Coral Springs'),
(4, 'Seraphina', 'Chang', 'SeraphinaC54337', 'Sera354@gmail.com', '09274572636', 'Sera!@$rfgfT^54', 'January', 'img/_p3.png', ' 789 Azure Ave, Oceanview'),
(5, 'Orion', 'Bishop', 'OrionB34', 'bishop84@gmail.com', '0926435274', 'Oribsh23@#rvg', 'January', 'img/_p4.png', '101 Galaxy Ln, Starlight City'),
(6, 'Isolde', 'Fleming', 'IsoldeF355', 'Isodif34@gmail.com', '0947364783', 'Isodil243@#@4', 'January', 'img/_p5.png', '202 Whispering Pines, Moonlight Village'),
(7, 'Ajax', 'Harper', 'AjaxHpr35', 'harper76@gmail.com', '0977543565', 'Alxhap34@#.,', 'January', 'img/_p6.png', '303 Thunder Rd, Stormville'),
(8, 'Thalia', 'Zimmerman', 'ThaliaZ783', 'zimmerman@gmail.com', '09473646734', 'Zimm@#F545@', 'January', 'img/_p7.png', '404 Harmony St, Melody Springs'),
(9, 'Lucian', 'Doyle', 'LucianDoy45', 'doyle92@gmail.com', '0934762554', 'Luci23@$33', 'January', 'img/_p8.png', '505 Echo Dr, Harmony Haven'),
(10, 'Selene', 'Nash', 'SeleneNH243', 'nash@gmail.com', '09437366463', 'Nash234@34', 'January', 'img/_p9.png', ' 606 Twilight Blvd, Evening Town');

-- --------------------------------------------------------

--
-- Table structure for table `techniquetb`
--

CREATE TABLE `techniquetb` (
  `TechniqueID` int(11) NOT NULL,
  `TechniqueName` varchar(30) DEFAULT NULL,
  `TechniqueImg` varchar(255) DEFAULT NULL,
  `Status` varchar(30) DEFAULT NULL,
  `Tip1` varchar(255) DEFAULT NULL,
  `Tip2` varchar(255) DEFAULT NULL,
  `Tip3` varchar(255) DEFAULT NULL,
  `MediaAppID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techniquetb`
--

INSERT INTO `techniquetb` (`TechniqueID`, `TechniqueName`, `TechniqueImg`, `Status`, `Tip1`, `Tip2`, `Tip3`, `MediaAppID`) VALUES
(1, 'Privacy Sentinel', 'img/_facebook.png', 'Latest', 'Adjust Privacy Settings: Regularly review and update your privacy settings to control who can see your personal information.', 'Enable Two-Factor Authentication (2FA): Add an extra layer of security by enabling 2FA to protect your account from unauthorized access.', 'Be Mindful of Sharing: Avoid sharing sensitive personal information publicly, and be cautious about accepting friend requests from strangers.', 1),
(2, 'A', 'img/_reddit.jpg', 'Latest', 'Use Pseudonyms: Consider using a ', 'Be Wary of Links: Avoid clicking on ', 'Moderate Subscriptions: Regularly ', 2),
(3, 'Tweet Guardian', 'img/_x.png', 'Latest', 'Secure Your Account: Enable login verification (2FA)', 'Review Followers: Regularly review your followers', 'Think Before You Tweet: Be mindful of the information you share', 3),
(4, 'Profile Protector', 'img/_insta.jpg', 'Latest', 'Private Profile: Set your profile to private', 'Limit Location Sharing: Avoid sharing your precise location', 'Report Suspicious Accounts: Report and block accounts that engage in harassment', 4),
(5, 'TikTok Privacy', 'img/_tiktok.png', 'Latest', 'Check Privacy Settings: Review and adjust your privacy settings to control who can view your videos and interact with you.', 'Use Private Account Option: Consider setting your account to private to limit who can see your content.', 'Report Inappropriate Content: Report and block users who engage in inappropriate behavior.', 7);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintb`
--
ALTER TABLE `admintb`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `campaigntb`
--
ALTER TABLE `campaigntb`
  ADD PRIMARY KEY (`CampaignID`),
  ADD KEY `CampaignTypeID` (`CampaignTypeID`),
  ADD KEY `MediaAppID` (`MediaAppID`);

--
-- Indexes for table `campaigntypetb`
--
ALTER TABLE `campaigntypetb`
  ADD PRIMARY KEY (`CampaignTypeID`);

--
-- Indexes for table `contacttb`
--
ALTER TABLE `contacttb`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `MemberID` (`MemberID`);

--
-- Indexes for table `jointb`
--
ALTER TABLE `jointb`
  ADD PRIMARY KEY (`JoinID`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `CampaignID` (`CampaignID`);

--
-- Indexes for table `mediatb`
--
ALTER TABLE `mediatb`
  ADD PRIMARY KEY (`MediaAppID`);

--
-- Indexes for table `membertb`
--
ALTER TABLE `membertb`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `techniquetb`
--
ALTER TABLE `techniquetb`
  ADD PRIMARY KEY (`TechniqueID`),
  ADD KEY `MediaAppID` (`MediaAppID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintb`
--
ALTER TABLE `admintb`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `campaigntb`
--
ALTER TABLE `campaigntb`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `campaigntypetb`
--
ALTER TABLE `campaigntypetb`
  MODIFY `CampaignTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `contacttb`
--
ALTER TABLE `contacttb`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `jointb`
--
ALTER TABLE `jointb`
  MODIFY `JoinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `mediatb`
--
ALTER TABLE `mediatb`
  MODIFY `MediaAppID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `membertb`
--
ALTER TABLE `membertb`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `techniquetb`
--
ALTER TABLE `techniquetb`
  MODIFY `TechniqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigntb`
--
ALTER TABLE `campaigntb`
  ADD CONSTRAINT `campaigntb_ibfk_1` FOREIGN KEY (`CampaignTypeID`) REFERENCES `campaigntypetb` (`CampaignTypeID`),
  ADD CONSTRAINT `campaigntb_ibfk_2` FOREIGN KEY (`MediaAppID`) REFERENCES `mediatb` (`MediaAppID`);

--
-- Constraints for table `contacttb`
--
ALTER TABLE `contacttb`
  ADD CONSTRAINT `contacttb_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `membertb` (`MemberID`);

--
-- Constraints for table `jointb`
--
ALTER TABLE `jointb`
  ADD CONSTRAINT `jointb_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `membertb` (`MemberID`),
  ADD CONSTRAINT `jointb_ibfk_2` FOREIGN KEY (`CampaignID`) REFERENCES `campaigntb` (`CampaignID`);

--
-- Constraints for table `techniquetb`
--
ALTER TABLE `techniquetb`
  ADD CONSTRAINT `techniquetb_ibfk_1` FOREIGN KEY (`MediaAppID`) REFERENCES `mediatb` (`MediaAppID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
