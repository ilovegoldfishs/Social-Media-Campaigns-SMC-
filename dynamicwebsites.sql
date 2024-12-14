-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 10, 2024 at 02:17 PM
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
-- Database: `dynamicwebsites`
--

-- --------------------------------------------------------

--
-- Table structure for table `admintable`
--

CREATE TABLE `admintable` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(30) DEFAULT NULL,
  `AdminEmail` varchar(30) DEFAULT NULL,
  `AdminPassword` varchar(30) DEFAULT NULL,
  `AdminLastLogin` datetime DEFAULT NULL,
  `AdminPhoto` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admintable`
--

INSERT INTO `admintable` (`AdminID`, `AdminName`, `AdminEmail`, `AdminPassword`, `AdminLastLogin`, `AdminPhoto`) VALUES
(1, 'MinMinPaing', 'paing@gmail.com', 'P@ing4578##', '2024-10-10 18:39:36', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `campaigntable`
--

CREATE TABLE `campaigntable` (
  `CampaignID` int(11) NOT NULL,
  `MediaID` int(11) DEFAULT NULL,
  `CamTypeID` int(11) DEFAULT NULL,
  `CampaignName` varchar(70) DEFAULT NULL,
  `CampaignDescription` varchar(100) DEFAULT NULL,
  `CampaignLocation` text DEFAULT NULL,
  `CampaignAim` text DEFAULT NULL,
  `CampaignVision` text DEFAULT NULL,
  `StartDate` datetime DEFAULT NULL,
  `EndDate` datetime DEFAULT NULL,
  `Status` varchar(20) DEFAULT NULL,
  `Budget` int(11) DEFAULT NULL,
  `CreatedAt` datetime DEFAULT NULL,
  `UpdatedAt` datetime DEFAULT NULL,
  `CampaginPhoto1` varchar(255) DEFAULT NULL,
  `CampaginPhoto2` varchar(255) DEFAULT NULL,
  `CampaginPhoto3` varchar(255) DEFAULT NULL,
  `CampaginPhoto4` varchar(255) DEFAULT NULL,
  `Week1` varchar(80) DEFAULT NULL,
  `Week2` varchar(80) DEFAULT NULL,
  `Week3` varchar(80) DEFAULT NULL,
  `Week4` varchar(80) DEFAULT NULL,
  `Week5` varchar(80) DEFAULT NULL,
  `Reward1` varchar(100) DEFAULT NULL,
  `Reward2` varchar(100) DEFAULT NULL,
  `Reward3` varchar(100) DEFAULT NULL,
  `Reward4` varchar(100) DEFAULT NULL,
  `Reward5` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigntable`
--

INSERT INTO `campaigntable` (`CampaignID`, `MediaID`, `CamTypeID`, `CampaignName`, `CampaignDescription`, `CampaignLocation`, `CampaignAim`, `CampaignVision`, `StartDate`, `EndDate`, `Status`, `Budget`, `CreatedAt`, `UpdatedAt`, `CampaginPhoto1`, `CampaginPhoto2`, `CampaginPhoto3`, `CampaginPhoto4`, `Week1`, `Week2`, `Week3`, `Week4`, `Week5`, `Reward1`, `Reward2`, `Reward3`, `Reward4`, `Reward5`) VALUES
(1, 1, 1, 'SafeScroll Campaign', 'A campaign designed to educate teenagers on privacy settings, online etiquette, and recognizing harm', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30557.20907899727!2d96.15836799144745!3d16.794023610508034!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eceaf0f51cc7%3A0xef88d27c500708fa!2sYuzana%20Plaza!5e0!3m2!1sen!2smm!4v1727551818068!5m2!1sen!2smm\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To teach teenagers the importance of setting boundaries online and how to report inappropriate content.', 'Creating a generation that understands the dangers of social media and uses it safely.', '2024-09-29 00:00:00', '2024-10-29 00:00:00', 'active', 1000, '2024-09-28 21:29:49', '2024-09-29 05:53:07', '../image/66f8cf237863b_cms.jpg', '../image/66f8cf23787bb_online.jpg', '../image/66f8cf2378838_privacy-policy.jpg', '../image/66f8cf23788ed_skateboard.jpg', 'Set up privacy settings across all social media accounts.', 'Recognize and report 5 pieces of inappropriate content.', 'Complete a quiz on online etiquette.', 'Create a social media post spreading awareness on safe scrolling.', 'Unfollow 5 suspicious or toxic accounts.', 'Digital badges for completing each challenge.', 'Entry into a giveaway for social media gear (e.g., phone case).', 'Free e-book on \"Safe Social Media Use.\"', 'Gift cards for popular online stores.', 'Certificate of completion from SMC.'),
(2, 1, 2, 'ThinkBeforeYouClick Campaign', 'Helping teens understand the consequences of their online actions, such as sharing personal data or ', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d61104.884710170525!2d96.12868396058174!3d16.823612766670294!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193527b860fb7%3A0x43f5722581c99cb1!2sYankin%20Centre!5e0!3m2!1sen!2smm!4v1727582845733!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To instill mindfulness about what content is shared online.', 'A world where teens actively think before engaging online.', '2024-09-29 00:00:00', '2024-10-29 00:00:00', 'active', 1500, '2024-09-29 06:07:43', NULL, '../image/hand.jpg', '../image/_files.jpg', '../image/_laptop.jpg', '../image/_board.jpg', 'Watch a webinar on cyberbullying and its effects.', 'Share an example of a risky online action and its real-world impact.', 'Write a 200-word reflection on a time you felt unsafe online.', 'Identify and report a phishing attempt.', 'Block 3 spam or fake accounts.', 'Exclusive access to an SMC social media safety toolkit.', 'Virtual meeting with a social media safety expert.', 'Customizable profile themes for social media.', 'Voucher for a mindfulness app subscription.', 'Online safety ambassador badge.'),
(3, 1, 1, 'PausePost Campaign', 'Encouraging teens to pause and reflect before posting on social media, preventing impulsive behavior', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d76895.07737968117!2d96.11865721186493!3d16.81273055567895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1932ee6a48c13%3A0x11e4962d2bf2c025!2sJunction%20Centre%20Zawana!5e0!3m2!1sen!2smm!4v1727583764583!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To reduce impulsive posts that might lead to harm or embarrassment.', 'Teens making thoughtful, meaningful contributions to the online world.', '2024-09-29 00:00:00', '2024-10-31 00:00:00', 'active', 1000, '2024-09-29 06:17:50', '2024-09-29 06:23:30', '../image/66f8d64272e35_good.jpg', '../image/66f8d64273044_email.jpg', '../image/66f8d64273199_sociall.jpg', '../image/66f8d642732c2_subscribe.jpg', 'Write down 3 reasons why you should rethink a post before sharing it.', 'Share an example of a post that you rethought and why.', 'Unfollow 3 accounts that pressure you into impulsive decisions.', 'Take a \"24-hour pause\" before posting any content for a week.', 'Engage in positive content by posting something thoughtful.', 'One-on-one coaching session with an influencer on responsible posting.', 'Digital content creator starter pack.', 'Gift card for a creative design app.', 'Digital safety and empowerment badge.', 'Free entry to a content creation workshop.'),
(4, 3, 4, 'NoMoreCyberbullies Campaign', 'A movement to help teens recognize, prevent, and combat cyberbullying.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d76895.07737968117!2d96.11865721186493!3d16.81273055567895!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1eb70073647e3%3A0x5a14ef9e22b3bc00!2sTaw%20Win%20Centre!5e0!3m2!1sen!2smm!4v1727584102928!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To empower teens to stand up against cyberbullying.', 'Building online communities that are inclusive and free from harassment.', '2024-10-05 00:00:00', '2024-11-29 00:00:00', 'draft', 2000, '2024-09-29 06:30:12', NULL, '../image/_mobilee.jpg', '../image/_pocket.jpg', '../image/_keyboard.jpg', '../image/_reading.jpg', 'Share a story about witnessing or experiencing cyberbullying.', 'Report 5 instances of online harassment.', 'Participate in a group discussion about the effects of cyberbullying.', 'Create a video promoting anti-cyberbullying messages.', 'Support someone who has been bullied by posting a positive comment.', 'Anti-cyberbullying digital badge.', 'Access to a private support group.', 'Personalized mentorship from a counselor.', 'Exclusive anti-cyberbullying merchandise.', 'Donation made to an anti-bullying charity in your name.'),
(5, 1, 1, 'SafeSelfie Campaign', 'Promoting safe photo-sharing habits to protect teens from unintended consequences of sharing images.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d91807.76439403182!2d96.13510604630484!3d16.846132707255983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19145a6a37dd5%3A0xf52016f4bcb6cfb2!2sDagon%20University!5e0!3m2!1sen!2smm!4v1727588892886!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To make teens more aware of who sees their pictures and how they might be used.', 'A culture of smart and secure photo-sharing online.', '2024-09-29 00:00:00', '2024-10-31 00:00:00', 'active', 1000, '2024-09-29 07:33:28', '2024-09-29 07:48:59', '../image/66f8ea4b43e1f_selfie.jpg', '../image/66f8ea4b443e7_share.jpg', '../image/66f8ea4b44458_child.jpg', '../image/66f8ea4b444eb_privacy-policy.jpg', 'Review and update privacy settings for sharing photos.', 'Participate in a seminar on safe photo sharing.', 'Take a \"safe selfie\" and explain why it\'s safe.', 'Report inappropriate image-sharing accounts.', 'Create a video encouraging others to share responsibly.', 'Entry into a smartphone accessory giveaway.', 'Social media photo-editing software package.', 'Custom phone skins or cases for completing the challenge.', 'E-guide on digital photography and online privacy.', 'Featured on SMC’s website as a \"Safe Selfie Ambassador.\"'),
(6, 5, 8, 'DigitalRespect Campaign', 'Encouraging teens to foster respectful online communication and refrain from spreading hate speech.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d91282.80321196205!2d96.11259120777325!3d16.819081355626942!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c193ab700143a9%3A0xd96e3d9bb7a3322d!2sGolden%20Park%20Spa%20Land!5e0!3m2!1sen!2smm!4v1727588511471!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To reduce hate speech and increase empathy online.', 'A respectful and empathetic digital community.', '2024-09-30 00:00:00', '2024-10-30 00:00:00', 'active', 2000, '2024-09-29 07:45:00', NULL, '../image/_handshake.jpg', '../image/_webinar.jpg', '../image/_coffee.jpg', '../image/_mann.jpg', 'Comment positively on 3 posts from people you don\'t know.', 'Share a story about when you saw or experienced disrespect online.', 'Block 2 accounts that spread hate or negativity.', 'Attend a workshop on the impact of online hate.', 'Create a post promoting respectful dialogue.', 'Recognition as a \"Digital Respect Ambassador.\"', 'Invite to an exclusive webinar on social media advocacy.', 'Personalized SMC certificate.', 'SMC-branded merchandise (e.g., t-shirts, mugs).', 'Free course on online communication and empathy.'),
(7, 4, 10, 'MindfulMedia Campaign', 'A campaign that emphasizes mental health and mindful consumption of media, encouraging breaks from s', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d122195.2359987893!2d96.13510604630484!3d16.846132707255983!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c19145a6a37dd5%3A0xf52016f4bcb6cfb2!2sDagon%20University!5e0!3m2!1sen!2smm!4v1727589429637!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To help teens balance their online and offline lives for better mental health.', 'Encouraging a healthy relationship with social media, without addiction or burnout.', '2024-08-01 00:00:00', '2024-09-01 00:00:00', 'completed', 900, '2024-09-29 07:59:36', NULL, '../image/_mental-health.jpg', '../image/_social-media.jpg', '../image/_hands.jpg', '../image/_good.jpg', 'Take a 24-hour break from social media.', 'Write a reflection on how social media affects your mental health.', 'Try a meditation or mindfulness app for a week.', 'Post about the importance of digital detox.', 'Encourage 3 friends to take part in the digital detox challenge.', 'Mindfulness app premium subscription.', 'Virtual mental health seminar tickets.', 'Entry into a raffle for wellness products.', 'Digital wellness ambassador badge.', 'Access to a guided meditation library.'),
(8, 4, 6, 'VerifyBeforeYouShare Campaign', 'Teaching teens to verify news and information before sharing to combat misinformation.', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30560.418221258882!2d96.16098653955078!3d16.774074500000005!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed0c9ef7f96d%3A0x5dd38f3f44db0311!2sOcean%20Super%20Center%203rd%20Floor!5e0!3m2!1sen!2smm!4v1727697943716!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To raise awareness about the dangers of fake news and misinformation.', 'A generation of informed and responsible social media users.', '2024-09-30 00:00:00', '2024-10-10 00:00:00', 'draft', 2000, '2024-09-30 14:06:00', NULL, '../image/_old-newspaper.jpg', '../image/_teach.jpg', '../image/_sharee.jpg', '../image/_book.jpg', 'Share an article and explain how you verified its authenticity.', 'Take a quiz on spotting fake news.', 'Fact-check 5 viral stories or posts.', 'Attend a virtual workshop on media literacy.', 'Create a post promoting fact-checking.', 'Fact-checker certification.', 'Access to a media literacy course.', 'Custom SMC fact-checker badge for social media profiles.', 'Social media shoutout as a \"Verified Influencer.\"', 'Gift card to an online learning platform.'),
(9, 3, 10, 'ScreenSafe Campaign', 'Educating teens about the dangers of excessive exposure to screens and how to protect their eyes and', '<iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d30559.99524198578!2d96.15115883955079!3d16.776705200000006!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x30c1ed79804e4e35%3A0x26fba2499f9e021b!2sVenus%20Shopping%20Center!5e0!3m2!1sen!2smm!4v1727699072143!5m2!1sen!2smm\" width=\"300\" height=\"300\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\" referrerpolicy=\"no-referrer-when-downgrade\"></iframe>', 'To promote healthy screen usage habits.', 'Reducing digital fatigue and enhancing online safety for teens.\r\n', '2024-08-01 00:00:00', '2024-10-01 00:00:00', 'completed', 2400, '2024-09-30 14:25:16', NULL, '../image/_snowman.jpg', '../image/_autumn.jpg', '../image/_eye.jpg', '../image/_silhouette.jpg', 'Take a break every 20 minutes using the \"20-20-20 rule\" for eye care.', 'Use blue light filters on devices.', 'Spend 1 hour outdoors each day.', 'Attend a webinar on digital eye health.', 'Share your personal strategy for managing screen time.', 'Blue light blocking glasses.', 'Screen protector kits.', 'Wellness apps for mental and eye health.', 'Recognition on the SMC website as a \"Screen Safe Advocate.\"', 'Exclusive SMC swag.');

-- --------------------------------------------------------

--
-- Table structure for table `campaigntypetble`
--

CREATE TABLE `campaigntypetble` (
  `CamTypeID` int(11) NOT NULL,
  `CamTypeName` varchar(70) DEFAULT NULL,
  `CamTypeObj` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campaigntypetble`
--

INSERT INTO `campaigntypetble` (`CamTypeID`, `CamTypeName`, `CamTypeObj`) VALUES
(1, 'Awareness Campaign', 'This campaign aims to raise awareness about the dangers of social media, such as cyberbullying, privacy issues, and misinformation.'),
(2, 'Educational Campaign', 'Focuses on providing educational resources, webinars, and tips on safe social media use, often including tutorials on setting up privacy controls, recognizing phishing attempts, etc.'),
(3, 'Challenge Campaign', 'Engages teens by creating interactive challenges for them to complete over a set period (e.g., 5 weeks), encouraging safe practices through tasks and activities.'),
(4, 'Advocacy Campaign', 'Encourages teens to become advocates for safe social media use, empowering them to share information with peers and support positive online behavior.'),
(5, 'Influencer-Led Campaign', 'Involves partnering with teen influencers or role models who use their platforms to promote social media safety and responsible behavior online.'),
(6, 'Social Media Movement Campaign', 'A large-scale movement that uses hashtags, viral content, and user-generated stories to build a community around the cause, encouraging teens to share their experiences and tips.'),
(7, 'Interactive Campaign', 'Engages teens with interactive quizzes, polls, and games related to social media safety, making the learning process fun and engaging.'),
(8, 'Community Engagement Campaign', 'Focuses on creating and fostering an online community where teens can share, learn, and support one another in safe social media practices.'),
(9, 'Corporate Partnership Campaign', 'Collaborates with brands, schools, or other organizations to promote social media safety through joint events, workshops, or sponsorships.'),
(10, 'Reward-Based Campaign', 'Provides teens with incentives and rewards (e.g., digital badges, prizes) for completing challenges or promoting safe behavior online.');

-- --------------------------------------------------------

--
-- Table structure for table `jointable`
--

CREATE TABLE `jointable` (
  `JoinID` int(11) NOT NULL,
  `MemberID` int(11) DEFAULT NULL,
  `CampaignID` int(11) DEFAULT NULL,
  `CardNumber` varchar(20) DEFAULT NULL,
  `Amount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jointable`
--

INSERT INTO `jointable` (`JoinID`, `MemberID`, `CampaignID`, `CardNumber`, `Amount`) VALUES
(1, 1, 6, '7845781289', 100),
(2, 1, 3, '7845781289', 150),
(3, 4, 8, '44784102', 50),
(4, 4, 4, '44784102', 25),
(5, 9, 5, '7845781289', 100),
(6, 9, 7, '44784102', 100);

-- --------------------------------------------------------

--
-- Table structure for table `membertable`
--

CREATE TABLE `membertable` (
  `MemberID` int(11) NOT NULL,
  `firstname` varchar(15) DEFAULT NULL,
  `Surname` varchar(15) DEFAULT NULL,
  `MemberEmail` varchar(30) DEFAULT NULL,
  `MemberPassword` varchar(30) DEFAULT NULL,
  `PhoneNo` varchar(30) DEFAULT NULL,
  `MembersignupDate` datetime DEFAULT NULL,
  `MemberloginDate` datetime DEFAULT NULL,
  `Comment` text DEFAULT NULL,
  `DateofBirth` datetime DEFAULT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `profile` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `membertable`
--

INSERT INTO `membertable` (`MemberID`, `firstname`, `Surname`, `MemberEmail`, `MemberPassword`, `PhoneNo`, `MembersignupDate`, `MemberloginDate`, `Comment`, `DateofBirth`, `Gender`, `profile`) VALUES
(1, 'Emma ', 'Johnson', 'EmmaJohnson@gmail.com', 'Johnson#7845', '123-789-456', '2024-09-28 18:39:23', '2024-10-10 12:29:01', 'Your support can make a real impact. Whether it’s through donations, volunteering, or simply spreading the word, every action counts. Let’s come together and be the change we wish to see in the world. 💪✨', '2003-03-13 00:00:00', 'female', '../image/66fbc1d06c83f_cat.jpg'),
(2, 'Olivia ', 'Smith', 'Oliviasmith@gmail.com', 'Oliviasmith@47', '753-159-456', '2024-10-01 07:44:59', '2024-10-06 20:45:04', 'The organizers did a great job of creating the variety of activities ensured there was something for everyone.', '2002-02-14 00:00:00', 'female', '../image/__portrait.jpg'),
(3, 'Emmi', 'Rio', 'Emmirio@gmail.com', 'Emmi@7848', '789-147-123', '2024-10-03 08:44:29', '2024-10-06 21:09:40', 'I left feeling inspired and eager to return next year. Highly recommended for anyone looking for a unique and enriching experience.', '2000-08-18 00:00:00', 'female', '../image/__2.jpg'),
(4, 'Liam', 'Anderson', 'Liamanderson@gmail.com', 'Anderson#478', '415-785-123', '2024-10-06 16:03:00', '2024-10-06 21:11:02', 'The campaign was a fantastic blend of fun and learning.', '2002-11-12 00:00:00', 'male', '../image/_boy.jpg'),
(5, 'Noah ', 'Bennett', 'Noahbennett@gmail.com', 'Noahbennett@102', '102-481-102', '2024-10-06 16:11:07', '2024-10-06 20:42:07', 'I particularly enjoyed the interactive exhibits, which were both educational and entertaining. Overall, it was a memorable visit that I would highly recommend to others.', '1999-06-16 00:00:00', 'male', '../image/_man (2).jpg'),
(6, 'Ethan ', 'Carter', 'Ethancarter@gmail.com', 'Ethancarter74@', '558-770-110', '2024-10-06 16:21:22', '2024-10-06 21:06:56', NULL, '2000-10-24 00:00:00', 'male', '../image/_sea.jpg'),
(7, 'Sophia', 'Davis', 'Sophiadavis@gmail.com', 'Sophiadavis78@@', '668-774-101', '2024-10-06 16:23:29', NULL, NULL, '1999-05-11 00:00:00', 'female', '../image/_car.png'),
(8, 'Emma ', 'Foster', 'Emmafoster@gmail.com', 'EmmaFoster74%', '110-002-888', '2024-10-06 16:25:30', NULL, NULL, '2002-12-25 00:00:00', 'female', '../image/_girl.jpg'),
(9, 'Olivia', 'Evans', 'OliviaEvans@gmail.com', 'Evansthom47@', '741-510-777', '2024-10-06 16:30:11', '2024-10-06 21:17:09', NULL, '2000-09-19 00:00:00', 'female', '../image/__1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `socialmediatable`
--

CREATE TABLE `socialmediatable` (
  `MediaID` int(11) NOT NULL,
  `MediaName` varchar(30) DEFAULT NULL,
  `MediaLink` varchar(255) DEFAULT NULL,
  `MediaPhoto` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `socialmediatable`
--

INSERT INTO `socialmediatable` (`MediaID`, `MediaName`, `MediaLink`, `MediaPhoto`) VALUES
(1, 'Facebook', 'https://www.facebook.com/', '../image/66fd72ceb43db_facebook.png'),
(2, 'Twitter', 'https://www.twitter.com/', '../image/66fd722c405c9_twitter.png'),
(3, 'Instagram', 'https://www.Instagram.com/', '../image/66fe0632d5ae6_instagram.png'),
(4, 'WhatsApp', 'https://www.whatsapp.com/', '../image/66fd735338aea_whatsapp.png'),
(5, 'SnapChat', 'https://www.snapchat.com/', '../image/66fd735c9b759_snapchat.png'),
(6, 'Discord', 'https://www.discord.com/', '../image/_discord.png'),
(7, 'Telegram', 'https://www.telegram.com/', '../image/_telegram.png'),
(8, 'Linkedin', 'https://www.linkedin.com/', '../image/_linkedin.png'),
(9, 'Messenger', 'https://www.messenger.com/', '../image/_messenger.png');

-- --------------------------------------------------------

--
-- Table structure for table `techniquetable`
--

CREATE TABLE `techniquetable` (
  `TechniqueID` int(11) NOT NULL,
  `TechniqueName` varchar(50) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Feature` text DEFAULT NULL,
  `mediaID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `techniquetable`
--

INSERT INTO `techniquetable` (`TechniqueID`, `TechniqueName`, `Description`, `Feature`, `mediaID`) VALUES
(1, 'Two-Factor Authentication (2FA)', 'A security method requiring users to verify their identity using two different factors before access', 'Combines a password with a one-time code sent to a mobile device or email, Adds an extra layer of security, reducing the risk of unauthorized access.', 1),
(2, 'Strong Password Policy', 'Enforcing the creation and use of complex passwords to secure accounts against brute-force attacks.', 'Requires at least 12 characters, including uppercase, lowercase, numbers, and symbols, Encourages reuse of old passwords.', 2),
(3, 'Privacy Settings Customization', 'Controlling what personal information is visible to others by adjusting privacy settings on social m', 'Allows users to control who can view their posts, personal details, and online activity, Minimizes the risk of unwanted contacts, phishing, and personal data exposure.', 3),
(4, 'End-to-End Encryption (E2EE)', 'A technique that ensures only the sender and recipient of a message can read its content, preventing', 'Encrypts messages during transmission and storage, protecting data even if intercepted, Ensures that', 4),
(5, 'Content Filtering and Moderation', 'Using tools to automatically filter and block inappropriate, harmful, or unwanted content from appea', 'Detects and blocks potentially harmful or explicit content based on pre-set rules , Provides parental control options for younger users, limiting access to age-inappropriate material.', 5),
(6, 'Phishing Detection Tools', 'ools designed to identify and block phishing attempts that aim to steal sensitive information like l', 'Automatically flags suspicious emails, messages, or links and warns the user , Educates users on how to identify common phishing tactics, such as fake login pages.', 1),
(7, 'Session Timeout and Auto-Logout', 'Automatically logging out users after a period of inactivity to prevent unauthorized access.', 'Ensures that forgotten or inactive sessions are securely closed to avoid unauthorized use , Allows users to set custom time limits for session expiration, enhancing account safety.', 8),
(8, 'Biometric Authentication', ' Utilizing unique biological traits like fingerprints, facial recognition, or voice patterns to auth', 'Provides a high level of security by requiring unique physical attributes for account access., Eliminates the need for passwords, reducing the risk of hacking and unauthorized logins.', 7),
(9, 'Virtual Private Network (VPN) Usage', 'Using a VPN to encrypt internet connections and hide the user\'s IP address, ensuring privacy and sec', 'Masks the user\'s online identity, preventing hackers or third parties from tracking their activity., Secures data transmission, especially when using public Wi-Fi networks, protecting against eavesdropping.', 9),
(10, 'Security Alerts and Notifications', 'Real-time notifications alerting users to suspicious activity or unauthorized login attempts on thei', 'Sends immediate alerts when login attempts are made from unknown devices or locations, Allows users to respond by reviewing, changing passwords, or blocking access quickly.', 6);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admintable`
--
ALTER TABLE `admintable`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `campaigntable`
--
ALTER TABLE `campaigntable`
  ADD PRIMARY KEY (`CampaignID`),
  ADD KEY `MediaID` (`MediaID`),
  ADD KEY `CamTypeID` (`CamTypeID`);

--
-- Indexes for table `campaigntypetble`
--
ALTER TABLE `campaigntypetble`
  ADD PRIMARY KEY (`CamTypeID`);

--
-- Indexes for table `jointable`
--
ALTER TABLE `jointable`
  ADD PRIMARY KEY (`JoinID`),
  ADD KEY `MemberID` (`MemberID`),
  ADD KEY `CampaignID` (`CampaignID`);

--
-- Indexes for table `membertable`
--
ALTER TABLE `membertable`
  ADD PRIMARY KEY (`MemberID`);

--
-- Indexes for table `socialmediatable`
--
ALTER TABLE `socialmediatable`
  ADD PRIMARY KEY (`MediaID`);

--
-- Indexes for table `techniquetable`
--
ALTER TABLE `techniquetable`
  ADD PRIMARY KEY (`TechniqueID`),
  ADD KEY `mediaID` (`mediaID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admintable`
--
ALTER TABLE `admintable`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `campaigntable`
--
ALTER TABLE `campaigntable`
  MODIFY `CampaignID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `campaigntypetble`
--
ALTER TABLE `campaigntypetble`
  MODIFY `CamTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jointable`
--
ALTER TABLE `jointable`
  MODIFY `JoinID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `membertable`
--
ALTER TABLE `membertable`
  MODIFY `MemberID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `socialmediatable`
--
ALTER TABLE `socialmediatable`
  MODIFY `MediaID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `techniquetable`
--
ALTER TABLE `techniquetable`
  MODIFY `TechniqueID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `campaigntable`
--
ALTER TABLE `campaigntable`
  ADD CONSTRAINT `campaigntable_ibfk_1` FOREIGN KEY (`MediaID`) REFERENCES `socialmediatable` (`MediaID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `campaigntable_ibfk_2` FOREIGN KEY (`CamTypeID`) REFERENCES `campaigntypetble` (`CamTypeID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jointable`
--
ALTER TABLE `jointable`
  ADD CONSTRAINT `jointable_ibfk_1` FOREIGN KEY (`MemberID`) REFERENCES `membertable` (`MemberID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `jointable_ibfk_2` FOREIGN KEY (`CampaignID`) REFERENCES `campaigntable` (`CampaignID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `techniquetable`
--
ALTER TABLE `techniquetable`
  ADD CONSTRAINT `techniquetable_ibfk_1` FOREIGN KEY (`mediaID`) REFERENCES `socialmediatable` (`MediaID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
