-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2021 at 12:10 PM
-- Server version: 10.4.8-MariaDB
-- PHP Version: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sumc_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `sumc_adminuser`
--

CREATE TABLE `sumc_adminuser` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `password` varchar(225) NOT NULL,
  `email` varchar(225) NOT NULL,
  `status` int(11) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_adminuser`
--

INSERT INTO `sumc_adminuser` (`id`, `username`, `password`, `email`, `status`, `date`) VALUES
(1, 'admin', 'YWRtaW4xMjM=', 'admin@design-master.com', 1, '2020-06-16 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_banners`
--

CREATE TABLE `sumc_banners` (
  `id` int(11) NOT NULL,
  `health_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `healthside_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `award_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `awardside_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `partners_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `partnerside_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contact_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `contactside_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `career_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `careerside_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `terms_banner` varchar(255) NOT NULL,
  `privacy_banner` varchar(255) NOT NULL,
  `news_banner` varchar(255) CHARACTER SET utf8 NOT NULL,
  `project_banner` varchar(255) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_banners`
--

INSERT INTO `sumc_banners` (`id`, `health_banner`, `healthside_banner`, `award_banner`, `awardside_banner`, `partners_banner`, `partnerside_banner`, `contact_banner`, `contactside_banner`, `career_banner`, `careerside_banner`, `terms_banner`, `privacy_banner`, `news_banner`, `project_banner`) VALUES
(1, 'uploads/banners/health6.jpg', 'uploads/banners/sidehealth3.jpg', 'uploads/banners/award2.jpg', 'uploads/banners/sidehealth2.jpg', 'uploads/banners/partner4.jpg', 'uploads/banners/sidepartner2.jpg', 'uploads/banners/contact2.jpg', 'uploads/banners/sidecontact1.jpg', 'uploads/banners/career2.jpg', 'uploads/banners/sidecareer1.jpg', 'uploads/banners/terms2.jpg', 'uploads/banners/privacy.jpg', 'uploads/banners/news.jpg', 'uploads/banners/project2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_careers`
--

CREATE TABLE `sumc_careers` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) CHARACTER SET utf8 NOT NULL,
  `position_for` varchar(255) NOT NULL,
  `cv_file` varchar(255) CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_careers`
--

INSERT INTO `sumc_careers` (`id`, `fullname`, `position_for`, `cv_file`, `status`, `created_date`) VALUES
(3, 'padmini beera', 'php', '', 1, '2020-06-24');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_carousels`
--

CREATE TABLE `sumc_carousels` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_carousels`
--

INSERT INTO `sumc_carousels` (`id`, `title`, `image`, `content`, `status`, `ordering`, `created_date`) VALUES
(1, 'CLEAN MANUFACTURING FACILITIES', 'uploads/carousel/a.jpg', '<p>Our medicines are manufactured in a top of the line manufacturing facility. We guarantee the effectiveness and cleanliness of each medicine that goes out of our plants.</p>\r\n', 1, 0, '2021-03-01'),
(2, 'COMPETENT EMPLOYEES', 'uploads/carousel/b.jpg', '<p>Our medicines are manufactured in a top of the line manufacturing facility. We guarantee the effectiveness and cleanliness of each medicine that goes out of our plants.</p>\r\n', 1, 0, '2021-03-01'),
(3, 'RELIABLE MEDICINES', 'uploads/carousel/c.jpg', '<p>Our medicines are manufactured in a top of the line manufacturing facility. We guarantee the effectiveness and cleanliness of each medicine that goes out of our plants.</p>\r\n', 1, 0, '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_company_awards`
--

CREATE TABLE `sumc_company_awards` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `award_image` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_company_awards`
--

INSERT INTO `sumc_company_awards` (`id`, `title`, `award_image`, `status`, `created_date`) VALUES
(32, 'Certificate of Excellence from Siemens - Quarter Market Share', 'uploads/awards/Certificate of Excellence from Siemens - Quarter Market Share.JPG', 1, '2020-12-10'),
(42, 'Award from SIEMENS Healthineers for Best Performance in Installed Base Protection - 2015', 'uploads/awards/WhatsApp Image 2021-01-05 at 10.25.28 AM.jpeg', 1, '2021-01-05'),
(43, 'Award from SIEMENS Healthineers for Best Cash Position - 2017', 'uploads/awards/WhatsApp Image 2021-01-05 at 10.25.27 AM.jpeg', 1, '2021-01-05'),
(44, 'Award from SIEMENS Healthineers for Outstanding Performance In Digital Services - 2019', 'uploads/awards/WhatsApp Image 2021-01-05 at 10.25.27 AM (1)1.jpeg', 1, '2021-01-05');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_company_profile`
--

CREATE TABLE `sumc_company_profile` (
  `id` int(11) NOT NULL,
  `image` varchar(150) NOT NULL,
  `title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `about_us_title` text NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_company_profile`
--

INSERT INTO `sumc_company_profile` (`id`, `image`, `title`, `description`, `about_us_title`, `content`, `status`, `created_date`) VALUES
(1, 'uploads/banners/companyprofile1.jpg', 'Company Overview', '<p>We are a fully-integrated pharmaceutical company, with development, manufacturing and sales capabilities, serving a regional population of 100 million patients and are expanding to reach even more patients globally.</p>\r\n', '', 'We are a fully-integrated pharmaceutical company, with development, manufacturing and sales capabilities, serving a regional population of 100 million patients and are expanding to reach even more patients globally.', 1, '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_company_values`
--

CREATE TABLE `sumc_company_values` (
  `id` int(11) NOT NULL,
  `type` varchar(200) NOT NULL,
  `title` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_company_values`
--

INSERT INTO `sumc_company_values` (`id`, `type`, `title`, `image`, `content`, `status`, `created_date`) VALUES
(1, 'Position', 'Positioning Statement', 'uploads/companyvalues/Positioning-Statement.jpg', '<p>Ensuring Better Health</p>\r\n', 1, '2021-03-02'),
(2, 'Vision', 'Vision Statement', 'uploads/companyvalues/Vision-Statement.jpg', '<p>To improve global access to medicines, by developing, manufacturing and commercializing advanced, high-quality medicines</p>\r\n', 1, '2021-03-02'),
(3, 'Mision', 'Mission Statement', 'uploads/companyvalues/Mission-Statement.jpg', '<p>To become an integrated, world-leading organization focussing on quality and innovation.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>To implement best business practices to deliver sustained performance and maximize value for our patients, customers and stakeholders.</p>\r\n', 1, '2021-03-02'),
(4, 'Values', 'Values', 'uploads/companyvalues/Values.jpg', '<h5><strong>Trust and Integrity</strong></h5>\r\n\r\n<p>Ensuring mutual respect for all</p>\r\n\r\n<h5><strong>Open, Transparent Communication</strong></h5>\r\n\r\n<p>Both within our organisation and to our external partners.</p>\r\n\r\n<h5><strong>Corporate and personal accountability</strong></h5>\r\n\r\n<p>Striving for excellence and exceeding expectations without compromising on quality as a company and as individuals.</p>\r\n\r\n<h5><strong>Encouraging meaningful innovation</strong></h5>\r\n\r\n<p>Developing new products that will improve quality of life for our customers and make a positive difference to their health.</p>\r\n', 1, '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_contact_feedback`
--

CREATE TABLE `sumc_contact_feedback` (
  `id` int(11) NOT NULL,
  `contact_name` varchar(150) NOT NULL,
  `email_id` varchar(255) NOT NULL,
  `company` varchar(150) NOT NULL,
  `subject` varchar(150) NOT NULL,
  `message` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_contact_feedback`
--

INSERT INTO `sumc_contact_feedback` (`id`, `contact_name`, `email_id`, `company`, `subject`, `message`, `status`, `created_date`) VALUES
(1, 'padmini beera', 'beera@design-master.com', 'DM', 'dsdd', 'reer', 1, '2020-06-24 11:31:41');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_contact_us`
--

CREATE TABLE `sumc_contact_us` (
  `id` int(11) NOT NULL,
  `company_name` varchar(255) CHARACTER SET utf8 NOT NULL,
  `banner_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `address` text NOT NULL,
  `mobile_no` varchar(100) NOT NULL,
  `lats` varchar(100) NOT NULL,
  `longs` varchar(100) NOT NULL,
  `working_hrs` varchar(200) NOT NULL,
  `email` varchar(225) NOT NULL,
  `feedback_receiver_email` varchar(255) NOT NULL,
  `career_receiver_email` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_contact_us`
--

INSERT INTO `sumc_contact_us` (`id`, `company_name`, `banner_image`, `address`, `mobile_no`, `lats`, `longs`, `working_hrs`, `email`, `feedback_receiver_email`, `career_receiver_email`, `created_date`, `status`) VALUES
(1, 'AL SULTAN UNITED MEDICAL CO.', '', '<p>Shuwaikh, Free Trade Zone, Block B45,<br />\r\nP.O.Box 867 Safat, Zip Code 13009 Kuwait</p>\r\n', '+965 2461 0588', '29.366305', '48.021003', '<p>Sunday to Thursday :&nbsp;<strong>08:30AM to 04:30PM</strong></p>\r\n\r\n<p>Friday &amp; Saturday :&nbsp;<strong>Closed</strong></p>\r\n', 'info@sultanunited.com', 'info@sultanunited.com', '', '2020-06-14 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sumc_coroporate`
--

CREATE TABLE `sumc_coroporate` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_coroporate`
--

INSERT INTO `sumc_coroporate` (`id`, `title`, `image`, `date`, `status`, `ordering`, `created_date`) VALUES
(1, 'KSP Re-Establishment', 'uploads/coroporate/ksp-old.jpg', '0000-00-00', 1, 0, '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_corporate_responsibility`
--

CREATE TABLE `sumc_corporate_responsibility` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `content2` text NOT NULL,
  `highlights` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_corporate_responsibility`
--

INSERT INTO `sumc_corporate_responsibility` (`id`, `content`, `content2`, `highlights`, `image`, `status`, `created_date`) VALUES
(1, '<h5><strong>Field training at KSP Manufacturing Plant</strong></h5>\r\n\r\n<p>Based on our dedicated mission to support and develop the educational process in the state of Kuwait, which is part of the KSP contribution in serving the society, our manufacturing plant is annually hosting Kuwait University students from faculty of Pharmacy and faculty of Science in all their departments in addition to the Applied Education Authority with the aim of Field training at manufacturing facilities and its various sectors in order to take advantage of the expertise that the KSP abounds in and learn about the latest methods and most recent capabilities used in pharmaceutical industry</p>\r\n\r\n<p>The main goal of the field training program dedicated for university students and the Public Authority for Applied Education and Training members is to provide an opportunity to train students on the practical training courses and to raise the scientific and professional skills and capabilities to be able to communicate with the practical work fields in addition to prepare technical cadres that combine both the theoretical and the applied way of thinking In the field of specialization.</p>\r\n\r\n<p>The field training program includes many discipline, the Department of Planning and Career Development is provided by the relevant academic authority with full commitment to guidelines given to students at the induction meeting which organized by the Competence and Evaluation Department in regards of the labor laws in force in the KSP.Pharmacovigilance and full compliance with health, safety and environment instructions in the workplace.</p>\r\n\r\n<p>KSP Career development department organizes a full training program that includes four seasons&rsquo; courses in order to facilitate student completing process of practical courses required for graduation by coordinating with the dedicated departments of training according to their capabilities &amp; by providing professional trainers from academic authorities</p>\r\n', 'Kuwait Saudi Pharmaceutical Company was keen to do its duty by confirming the availability of pharmaceutical products in Kuwait as well as regional countries, However did not overlook the humanitarian aspect, so that it was keen to provide medicines and grant it as a donation to some countries and poor communities suffering from various crises and wars through its cooperation with some charitable bodies and committees including:', 'Patient Health Fund Society: Which distribute the donations from our end to Iraq, Syria, Yemen and other countries.\r\nKuwait Red Crescent Society: Which distribute the donations to various sectors inside and outside Kuwait.\r\nThe company has cooperated with many embassies inside Kuwait to distribute the donations to poor families to confirm providing them with medicines.\r\nThe company has also cooperated with some companies inside Kuwait to help poor families & people who need medicines.', 'uploads/mazzan/corporate-responsibility.jpg', 1, '2021-03-02'),
(2, '<h5><strong>Field training at KSP Manufacturing Plant</strong></h5>\r\n\r\n<p>Based on our dedicated mission to support and develop the educational process in the state of Kuwait, which is part of the KSP contribution in serving the society, our manufacturing plant is annually hosting Kuwait University students from faculty of Pharmacy and faculty of Science in all their departments in addition to the Applied Education Authority with the aim of Field training at manufacturing facilities and its various sectors in order to take advantage of the expertise that the KSP abounds in and learn about the latest methods and most recent capabilities used in pharmaceutical industry</p>\r\n\r\n<p>The main goal of the field training program dedicated for university students and the Public Authority for Applied Education and Training members is to provide an opportunity to train students on the practical training courses and to raise the scientific and professional skills and capabilities to be able to communicate with the practical work fields in addition to prepare technical cadres that combine both the theoretical and the applied way of thinking In the field of specialization.</p>\r\n\r\n<p>The field training program includes many discipline, the Department of Planning and Career Development is provided by the relevant academic authority with full commitment to guidelines given to students at the induction meeting which organized by the Competence and Evaluation Department in regards of the labor laws in force in the KSP.Pharmacovigilance and full compliance with health, safety and environment instructions in the workplace.</p>\r\n\r\n<p>KSP Career development department organizes a full training program that includes four seasons&rsquo; courses in order to facilitate student completing process of practical courses required for graduation by coordinating with the dedicated departments of training according to their capabilities &amp; by providing professional trainers from academic authorities</p>\r\n', 'Kuwait Saudi Pharmaceutical Company was keen to do its duty by confirming the availability of pharmaceutical products in Kuwait as well as regional countries, However did not overlook the humanitarian aspect, so that it was keen to provide medicines and grant it as a donation to some countries and poor communities suffering from various crises and wars through its cooperation with some charitable bodies and committees including:', 'Patient Health Fund Society: Which distribute the donations from our end to Iraq, Syria, Yemen and other countries.\r\nKuwait Red Crescent Society: Which distribute the donations to various sectors inside and outside Kuwait.\r\nThe company has cooperated with many embassies inside Kuwait to distribute the donations to poor families to confirm providing them with medicines.\r\nThe company has also cooperated with some companies inside Kuwait to help poor families & people who need medicines.', '', 1, '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_diverse`
--

CREATE TABLE `sumc_diverse` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_diverse`
--

INSERT INTO `sumc_diverse` (`id`, `title`, `image`, `content`, `status`, `ordering`, `created_date`) VALUES
(2, 'ORAL LIQUID SECTION', 'uploads/diverse/b.jpg', '<p>We manufacture a wide range of liquid medicines in large quantities as demand dictates.</p>\r\n', 1, 0, '2021-03-01'),
(3, 'LVP & SVP LINE', 'uploads/diverse/c.jpg', '<p>This section can produce I.V. solutions in large quantities to supply hospitals of their needs.</p>\r\n', 1, 0, '2021-03-01'),
(4, 'SEMI-SOLID & TOPICAL LINE', 'uploads/diverse/d.jpg', '<p>From topical ointments to suppositories. We are well equipped to produce in bulk and on time.</p>\r\n', 1, 0, '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_diverse_text`
--

CREATE TABLE `sumc_diverse_text` (
  `id` int(11) NOT NULL,
  `text1` varchar(150) NOT NULL,
  `text2` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_diverse_text`
--

INSERT INTO `sumc_diverse_text` (`id`, `text1`, `text2`, `status`) VALUES
(1, 'DIVERSE PHARMACEUTICAL COMPANY', 'KSPICO is a Pharmaceutical Manufacturing Company with Diversified Manufacturing Facilities.', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sumc_gm_message`
--

CREATE TABLE `sumc_gm_message` (
  `id` int(11) NOT NULL,
  `banner_image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `side_image` varchar(250) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_gm_message`
--

INSERT INTO `sumc_gm_message` (`id`, `banner_image`, `description`, `side_image`, `status`, `created_date`) VALUES
(1, 'uploads/banners/companygm4.jpg', '<p><strong>Today, medical field is ever-changing with technologies emerging faster than any other business. At SUMC, we are committed to provide the best in class healthcare products and services in collaboration with our respectable business partners. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Although we are among the young companies in the medical sector in Kuwait, having dynamic, strong and experienced Management, Sales &amp; Service Team underlie the radical change and the success which we have created in the market. We strongly believe that the cornerstone of SUMC&rsquo;s success lies in its employees!</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Our high standards continue to espouse our Business Partners. We provide solutions for local market needs by selecting well-reputed multinational manufacturers providing innovative and reliable products suiting every healthcare professional. </strong></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>Committed to achieving its mission, SUMC will continue to make every effort to be always present in the front lines devoted to providing those in need the top-in-class solutions to help relieve healthcare related difficulties.&nbsp; </strong></p>\r\n', 'uploads/companygm/3X5A8401.JPG', 1, '2020-06-15');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_healthcategory`
--

CREATE TABLE `sumc_healthcategory` (
  `id` int(11) NOT NULL,
  `category_name` varchar(150) NOT NULL,
  `category_image` varchar(150) NOT NULL,
  `profile_image` varchar(150) NOT NULL,
  `description` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_healthcategory`
--

INSERT INTO `sumc_healthcategory` (`id`, `category_name`, `category_image`, `profile_image`, `description`, `status`, `created_date`) VALUES
(2, 'Diagnostic Imaging', 'uploads/healthcategory/Diagnostic-Imaging2.jpg', 'uploads/healthcategory/diagnostic-banner1.jpg', '<p 335551550=\"\" data-ccp-props=\"{\"><strong>Within Healthcare, Radiology practice has seen an increased adoption of&nbsp;Artificial Intelligence (AI) based solutions in analyzing medical images for&nbsp;the detection, characterization, and monitoring of diseases.&nbsp;​</strong></p>\r\n\r\n<p 335551550=\"\" data-ccp-props=\"{\"><strong>To provide the better care access to the patients, in partnership with SIEMENS HEALTHINEERS, we offer imaging&nbsp;solutions for cardiovascular and radiological departments, thanks to a&nbsp;comprehensive product portfolio designed to meet the needs of&nbsp;diagnostic imaging specialists.&nbsp;</strong></p>\r\n\r\n<p 335551550=\"\" data-ccp-props=\"{\"><strong>Our product portfolio covers the following:</strong></p>\r\n\r\n<ul class=\"listing\">\r\n	<li>Angiography</li>\r\n	<li>Computed Tomography</li>\r\n	<li>Fluoroscopy Equipment</li>\r\n	<li>Imaging for radiation Therapy</li>\r\n	<li>Magnetic Resonance Imaging</li>\r\n	<li>Mammography</li>\r\n	<li>Mobile C-arms</li>\r\n	<li>Molecular imaging</li>\r\n	<li>Radiography System</li>\r\n	<li>Robotic X-ray</li>\r\n	<li>Ultrasound Machines</li>\r\n</ul>\r\n', 1, '2020-06-18'),
(3, 'Laboratory & Point of Care Testing', 'uploads/healthcategory/laboratory-andn-point-of-care-testing1.jpg', 'uploads/healthcategory/laboratory-andn-point-of-care-testing2.jpg', '<p 335551550=\"\" data-ccp-props=\"{\">In partnership with SIEMENS HEALTHINEERS, we offer a spectrum of Immunoassay, Hematology, Urinalysis and Point of&nbsp;care that covers Diabetes , Blood Gas, Cardiology, coagulation in&nbsp;conjunction with automation, informatics and services that serves the need&nbsp;of the laboratory and other critical departments in the hospital&nbsp; to help the&nbsp;physicians to get into their clinical decision which can be done according&nbsp; to&nbsp;the immediate and trustful results that ensures the patient satisfaction.&nbsp;</p>\r\n\r\n<p 335551550=\"\" data-ccp-props=\"{\"><strong>Our product portfolio covers the following:​</strong></p>\r\n\r\n<p><strong><u>LD Lab Diagnostic: ​​</u></strong></p>\r\n\r\n<ul>\r\n	<li>Immunoassay</li>\r\n	<li>Hematology</li>\r\n</ul>\r\n\r\n<p><u><strong>Laboratory Automation:​​</strong></u></p>\r\n\r\n<ul>\r\n	<li>Aptio ​​</li>\r\n</ul>\r\n\r\n<p><u><strong>Point Of Care:​​</strong></u></p>\r\n\r\n<ul>\r\n	<li>Urinalysis</li>\r\n	<li>Blood Gas line</li>\r\n	<li>Diabetology</li>\r\n	<li>Cardiology</li>\r\n	<li>POC informatics ​​</li>\r\n</ul>\r\n', 1, '2020-06-24'),
(4, 'Surgical', 'uploads/healthcategory/Surgical.jpg', '', '<p>In partnership with Medtronic &amp; Bariatric Solutions, SUMC provides&nbsp;highly&nbsp;innovative surgical products to our&nbsp;healthcare clients ensuring the&nbsp;variety and&nbsp;reliability they need to offer their patients the&nbsp;best&nbsp;possible care.&nbsp;​​</p>\r\n\r\n<p>Our product range consists of Electrosurgical&nbsp;Generators, various&nbsp;bariatric&nbsp;and stapling products along with a wide array&nbsp;of&nbsp;surgical&nbsp;solutions.&nbsp;​​</p>\r\n\r\n<p 335551550=\"\" data-ccp-props=\"{\"><strong>Our product portfolio covers the following:</strong></p>\r\n\r\n<ul class=\"listing\">\r\n	<li>Electrosurgical Generators</li>\r\n	<li>Vessel Sealing Devices</li>\r\n	<li>Powered stapling system</li>\r\n	<li>Ultra-Universal Staplers</li>\r\n	<li>Lap tower</li>\r\n</ul>\r\n', 1, '2020-06-24'),
(5, 'Digital Services', 'uploads/healthcategory/Digital-Services.jpg', '', '<p 335551550=\"\" data-ccp-props=\"{\"><strong>In partnership with SIEMENS HEALTHINEERS, SUMC&nbsp;optimizes&nbsp;workflows and increase efficiency&nbsp;through offering customized and scalable IT&nbsp;solutions&nbsp;integrated with Artificial Intelligence.&nbsp;</strong></p>\r\n\r\n<ul role=\"list\">\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"1\" data-buautonum=\"8\" data-charcodes=\"8226\" data-font=\"Arial,Sans-Serif\" data-margin=\"450\" role=\"listitem\">\r\n	<p 335551550=\"\" data-ccp-props=\"{\">Artificial intelligence, big data, and&nbsp;connecting&nbsp;care teams and patients​</p>\r\n	</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"2\" data-buautonum=\"8\" data-charcodes=\"8226\" data-font=\"Arial,Sans-Serif\" data-margin=\"450\" role=\"listitem\">\r\n	<p 335551550=\"\" data-ccp-props=\"{\">Teamplay digital health platform</p>\r\n	</li>\r\n</ul>\r\n', 1, '2020-06-24'),
(6, 'Consumables & Disposables', 'uploads/healthcategory/Consumables image - small box.jpg', '', '<p 335551550=\"\" data-ccp-props=\"{\"><strong>In Partnership with Medtronic, SUMC offers a variety of surgical consumables&nbsp;and&nbsp;disposables that&nbsp;combine quality,&nbsp;convenience and&nbsp;innovation.&nbsp;&nbsp;​</strong></p>\r\n\r\n<p 335551550=\"\" data-ccp-props=\"{\"><strong>Our line of consumables&nbsp;includes&nbsp;premium&nbsp;Surgical Sutures,&nbsp;Hernia&nbsp;Solutions, Laparoscopic&nbsp;Surgery Trocars, Pillcam&nbsp;and other&nbsp;related groups&nbsp;of&nbsp;products.&nbsp;</strong></p>\r\n\r\n<ul role=\"list\">\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"1\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">VersaOne&trade; Access System​</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"2\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">optical trocars</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"3\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">bladed trocars</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"4\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">blunt tip trocars​</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"5\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">VersaOne&trade; Fascial Closure System​</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"6\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">Single Incision and&nbsp;Transanal&nbsp;Surgery</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"7\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">SurgiSleeve&trade; Wound Protector​</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"8\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">Port-Site Closure Devices</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"9\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">bladless&nbsp;trocars</li>\r\n	<li data-aria-level=\"1\" data-aria-posinset=\"10\" data-buautonum=\"8\" data-charcodes=\"216\" data-font=\"Wingdings,Sans-Serif\" data-margin=\"450\" role=\"listitem\">Thoracic trocars</li>\r\n</ul>\r\n', 1, '2020-06-24'),
(7, 'Technical Support', 'uploads/healthcategory/support.png', '', '<p><strong>Delivering a Superior Experience!</strong></p>\r\n\r\n<p>When it comes to Service Agreement, SUMC&rsquo;S approach is&rdquo; Together we Grow&rdquo;.. It&rsquo;s a long term partnership with focusing on Maximum return of Investment for Customer through Enhance Performance and Optimal usage of System. Vastly Experienced Application and Service team not only cater for high uptime&nbsp; of the&nbsp; system also keep customer aware with latest developments on the system and suggesting future upgrade of the system to keep it at per with need of the Day</p>\r\n\r\n<p>We understand each customer is unique, we listen, we take their input and utilizing the high technical expertise of our Service Engineers. We customize Service program with a single goal in mind to achieve the best solution for Customers.</p>\r\n\r\n<p>Our holistic approach of customer service with clinical application ensure unsurpassed lifetime customer support. Our Services cover the following: ​​</p>\r\n\r\n<ul>\r\n	<li>Pre- sale support to Customer for Site planning and requirements.</li>\r\n	<li>Regular after sales technical support​​</li>\r\n	<li>Quality and professional handling of customer&nbsp;inquiries and complaints​​</li>\r\n	<li>Installation and technical operation of all new&nbsp;equipment​​</li>\r\n	<li>Technical support for all equipment under warranty or&nbsp;service contract​​</li>\r\n	<li>Clinical support and Training​​</li>\r\n	<li>24/7 customer support Services</li>\r\n</ul>\r\n', 1, '2020-06-24'),
(8, 'Education', 'uploads/healthcategory/trainingcenter.JPG', '', '<p>In the healthcare sector, making right decisions can be crucial. Since the skills of medical professionals usually have a direct impact on a patient&rsquo;s health, education and training is essential. Training and education present a prime opportunity to expand the knowledge base of our customers and end users.</p>\r\n\r\n<p><strong>SUMC is providing training and education through four different levels:</strong></p>\r\n\r\n<ul>\r\n	<li>In-house application specialists enrolled on our employment</li>\r\n	<li>Contracted free lancers and specialists from different specialties</li>\r\n	<li>Application support from our partners</li>\r\n	<li>SIEMENS Healthineers is providing PEP connect, a personalized education experience with options to manage an institution&rsquo;s workforce education and performance growth as a tool <a href=\"https://pep.siemens-info.com/en-us\">https://pep.siemens-info.com/e</a></li>\r\n</ul>\r\n\r\n<div>In addition to the above, <strong>SUMC </strong>has established&nbsp;<strong>Imaging science Institute (ISI)</strong>&nbsp;with <strong>Dar al Shifa Hospital</strong> . At ISI, our CME accredited classroom and web based training programs are designed to assist healthcare professionals in ensuring improved patient care to the highest, international standards.</div>\r\n', 1, '2020-12-31'),
(9, 'Fertile Soil', '', '', '<p>xx</p>\r\n', 1, '2021-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_healthcategory_images`
--

CREATE TABLE `sumc_healthcategory_images` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_healthcategory_images`
--

INSERT INTO `sumc_healthcategory_images` (`id`, `category_id`, `image`, `created_date`) VALUES
(1, 2, 'uploads/healthcategory/Diagnostic-Imaging2.jpg', '2020-12-31'),
(2, 3, 'uploads/healthcategory/laboratory-andn-point-of-care-testing1.jpg', '2020-12-31'),
(3, 4, 'uploads/healthcategory/Surgical.jpg', '2020-12-31'),
(4, 5, 'uploads/healthcategory/Digital-Services.jpg', '2020-12-31'),
(5, 6, 'uploads/healthcategory/Consumables image - small box.jpg', '2020-12-31'),
(6, 7, 'uploads/healthcategory/support.png', '2020-12-31'),
(8, 8, 'uploads/healthcategory/86309c32-d9a4-4035-9946-4ea2a6a37d15.jpg', '2020-12-31'),
(9, 8, 'uploads/healthcategory/trainingcenter1.JPG', '2020-12-31'),
(10, 9, 'uploads/healthcategory/fertilizer&soil.jpg', '2021-02-28');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_homeslides`
--

CREATE TABLE `sumc_homeslides` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `text_title` varchar(200) NOT NULL,
  `content` varchar(1000) NOT NULL,
  `ordering` int(11) NOT NULL,
  `slide_image` varchar(255) CHARACTER SET latin1 COLLATE latin1_general_ci NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1,
  `created_date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_homeslides`
--

INSERT INTO `sumc_homeslides` (`id`, `title`, `text_title`, `content`, `ordering`, `slide_image`, `status`, `created_date`) VALUES
(1, 'Ensuring Better Health', 'vision', 'To improve global access to medicines, by developing, manufacturing and commercializing advanced, high-quality medicines', 1, 'uploads/homesliders/a1.jpg', 1, '2021-02-28 15:03:42'),
(2, 'Ensuring Better Health', 'mision', 'To implement best business practices to deliver sustained performance and maximize value for our patients, customers and stakeholders.', 2, 'uploads/homesliders/about-us.jpg', 1, '2021-02-28 15:06:53'),
(3, 'Ensuring Better Health', 'Values', 'Striving for excellence and exceeding expectations without compromising on quality as a company and as individuals.', 3, 'uploads/homesliders/c.jpg', 1, '2021-02-28 15:07:41');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_homeslide_text`
--

CREATE TABLE `sumc_homeslide_text` (
  `id` int(11) NOT NULL,
  `text1` varchar(150) NOT NULL,
  `text2` varchar(150) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_homeslide_text`
--

INSERT INTO `sumc_homeslide_text` (`id`, `text1`, `text2`, `status`) VALUES
(1, 'vision', 'To improve global access to medicines, by developing, manufacturing and commercializing advanced, high-quality medicines', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sumc_leaderships`
--

CREATE TABLE `sumc_leaderships` (
  `id` int(11) NOT NULL,
  `title` text NOT NULL,
  `designation` varchar(200) NOT NULL,
  `image` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_leaderships`
--

INSERT INTO `sumc_leaderships` (`id`, `title`, `designation`, `image`, `content`, `status`, `created_date`) VALUES
(2, 'Dr. Rashed Reyadh Khazaal', 'Chairman and Managing Director', 'uploads/leaderships/ahmad-al-awdhi1.jpg', '<p>Joined Mezzan in Sept 2017 and appointed as Chairman and MD in KSP in Sept 2019. Over 15 years of experience in the Gulf&rsquo;s healthcare sector. Mr. Khazal hold a Doctorate of Business Administration in Action learning from University of Liverpool, an MBA in Strategy and General Management from Maastricht School of Management. Graduated from University of Portsmouth in UK with a Degree in Master of Pharmacy, MPHARM.</p>\r\n', 1, '2021-03-02'),
(3, 'Ali Abdulrahman Jassim Alwazzan', 'Vice Chairman', 'uploads/leaderships/Ali-Abdulrahman-Jassim-Alwazzan.jpg', '<p>Mr. Ali Al Wazzan joined KSP in 2019 as a Vice Chairman. Mr. Al Wazzan is the current Executive Director of Investments at Mezzan Holding responsible for acquisitions, disposals, the IPO program, and working with the CEO on strategic change initiatives. Mr. Ali Al Wazzan represents Mezzan Holding on various Boards and is also the Vice Chairman of Kuwait Lube Oil Company from 2010 to date.</p>\r\n\r\n<p>Mr. Ali Al Wazzan took an important part in restructuring some subsidiaries including Mezzan&rsquo;s water business in Qatar, led the acquisition of Unitra Mets Group and several additional important transactions for the company.</p>\r\n\r\n<p>Prior to joining Mezzan, Mr. Ali Al Wazzan worked for Wedian Real Estate/Amlak Holdings (Family Investment office) and Al Watani Investment Company (NBK Capital He also previously served as a non-executive Director of Global Investment House KSCC through its restructuring process from 2010 to 2013.</p>\r\n\r\n<p>Mr. Ali Al Wazzan holds a Bachelor of Business Administration with a minor in Finance from the American University of Beirut.</p>\r\n', 1, '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_mezzan`
--

CREATE TABLE `sumc_mezzan` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_mezzan`
--

INSERT INTO `sumc_mezzan` (`id`, `title`, `image`, `status`, `ordering`, `created_date`) VALUES
(2, 'image1', 'uploads/mazzan/kspic-logo.jpg', 1, 0, '2021-03-01'),
(3, 'image2', 'uploads/mazzan/mezzan-holding-group.jpg', 1, 0, '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_mezzan_group`
--

CREATE TABLE `sumc_mezzan_group` (
  `id` int(11) NOT NULL,
  `content` text NOT NULL,
  `content2` text NOT NULL,
  `highlights` text NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_mezzan_group`
--

INSERT INTO `sumc_mezzan_group` (`id`, `content`, `content2`, `highlights`, `image`, `status`, `created_date`) VALUES
(1, '<p>Mezzan has achieved great growth through the years, as it launched many new products, invested in vertical integration in multiple sectors, diversified commodity distribution, expanded manufacturing operations, food supply and support services around the world. The group provided high-quality products and continuously developed operations throughout the region with its partners, and consumers as a priority.</p>\r\n\r\n<p>Mezzan Holding undertook another approach in the domain of investment and trade by applying an effective governance system at the level of the company and its subsidiaries aimed to service the public better. It aimed at ensuring a long-standing growth strategy locally, regionally, and globally.</p>\r\n\r\n<p>Mezzan Holding was listed on the Kuwait Stock Exchange in 2015, which further transformed the leaders of the company to be more responsible for its growth and development.</p>\r\n\r\n<p>Mezzan focused on consolidating its dominant position in business and product categories by expanding into attractive markets, taking into account global operating standards and the continuous pursuit of investments and acquisition opportunities in the consumer sector in the Gulf and Middle East.</p>\r\n\r\n<p>Mezzan focused on consolidating its dominant position in business and product categories, as well as expanding into attractive markets, taking into account global operating standards, and the continuous pursuit of investments and acquisition opportunities in the consumer sector in the Gulf and the Middle East.</p>\r\n', 'The ambition to grow from local to global entity was a vision deeply entrenched in the values of the Al-Wazzan Group, as it moved from a young strong entity to a larger and powerful one. And so, in 1999, the new entity was established as Mezzan Holding Company, which built its foundation on scientific principles: it was well-versed in market strategy, consumer behavior, provided high-quality products, and relentlessly developed operational services while maintaining distinguished global partnerships.', '1. It operates through 30 integrated subsidiaries\r\n2. One of the 100 companies with influence in the Arab world, Forbes Middle East 2013', 'uploads/mazzan/mezzan-holding-group1.jpg', 1, '2021-03-02');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_mezzan_text`
--

CREATE TABLE `sumc_mezzan_text` (
  `id` int(11) NOT NULL,
  `text1` varchar(150) NOT NULL,
  `image` varchar(200) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_mezzan_text`
--

INSERT INTO `sumc_mezzan_text` (`id`, `text1`, `image`, `status`) VALUES
(1, 'A MEZZAN HOLDING COMPANY', 'uploads/mazzan/mazzan.jpg', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sumc_news`
--

CREATE TABLE `sumc_news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `news_image` varchar(255) CHARACTER SET utf8 NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `news_start_date` date NOT NULL,
  `news_end_date` date NOT NULL,
  `status` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_news`
--

INSERT INTO `sumc_news` (`id`, `title`, `news_image`, `description`, `news_start_date`, `news_end_date`, `status`, `created_date`) VALUES
(2, 'Emergency Radiology conference 2020 in Kuwait', 'uploads/news/news11.jpg', '<p>SUMC had sponsored Pearls in Emergency Radiology conference 2020 located in Kuwait 12-14 February 2020. This conference encompass comprehensive update in the field of emergency #imaging for most common #neurological #cardiovascular #abdominal #musculoskeletal emergencies as well as the related interventional procedures through both lectures and interactive workshops.</p>\r\n', '2020-07-15', '2020-07-18', 1, '2020-06-21'),
(3, 'Annual Conference of Obstetrics and Gynecolog in Kuwait', 'uploads/news/news22.jpg', '<p>SUMC had participated in 24th Annual Conference of Obstetrics and Gynecology in Kuwait 29-30 JULY 2020</p>\r\n', '2020-07-29', '2020-07-30', 1, '2020-07-16'),
(4, 'Cancer Aware Nation (C.A.N) in 18 February 2020', 'uploads/news/news3.jpg', '<p>SUMC proudly sponsored the Cancer Aware Nation (C.A.N) in Kuwait 18 February 2020 to raise awareness of head, neck and thyroid.</p>\r\n', '2020-06-03', '2020-06-04', 1, '2020-07-16');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_privacy`
--

CREATE TABLE `sumc_privacy` (
  `id` int(11) NOT NULL,
  `privacy_content` text CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sumc_privacy`
--

INSERT INTO `sumc_privacy` (`id`, `privacy_content`, `status`) VALUES
(1, '<p>SUMC is committed to protecting your privacy and developing technology that gives you the most powerful and safe online experience. This Statement of Privacy applies to the SUMC site and&nbsp;governs data collection and usage. By using the SUMC site, you consent to the data practices described in this statement.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>COLLECTION OF YOUR PERSONAL INFORMATION</strong></p>\r\n\r\n<p>SUMC collects personally identifiable information, such as your email address, name, and telephone number that you already give us via direct contact.&nbsp;</p>\r\n\r\n<p>Please keep in mind that if you directly disclose personally identifiable information or personally sensitive data through SUMC public message boards, this information may be collected and&nbsp;used by others. Note: SUMC does not read any of your private online communications.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USE OF YOUR PERSONAL INFORMATION</strong></p>\r\n\r\n<p>SUMC collects and uses your personal information to operate the SUMC Web site and deliver the services you have requested. SUMC also uses your personally identifiable information to&nbsp;inform you of other products or services available from SUMC and its affiliates.&nbsp;</p>\r\n\r\n<p>SUMC does not sell, rent or lease its customer lists to third parties. SUMC may, from time to time, contact you on behalf of external business partners about a particular offering that may be of&nbsp;interest to you. In those cases, your unique personally identifiable information (e-mail, name, address, telephone number) is not transferred to the third party.&nbsp;</p>\r\n\r\n<p>SUMC does not use or disclose sensitive personal information, such as race, religion, or political affiliations, without your explicit consent.</p>\r\n\r\n<p>SUMC Web site will disclose your personal information, without notice, only if required to do so by law or in the good faith belief that such action is necessary to: (a) conform to the edicts of&nbsp;the law or comply with legal process served on SUMC or the site; (b) protect and defend the rights or property of SUMC; and, (c) act under exigent circumstances to protect the personal safety&nbsp;of users of SUMC, or the public.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>USE OF COOKIES</strong></p>\r\n\r\n<p>SUMC Web site use &quot;cookies&quot; to help you personalize your online experience. A cookie is a text file that is placed on your hard disk by a Web page server. Cookies cannot be used to run&nbsp;programs or deliver viruses to your computer. Cookies are uniquely assigned to you and can only be read by a web server in the domain that issued the cookie to you.</p>\r\n\r\n<p>One of the primary purposes of cookies is to provide a convenience feature to save you time. The purpose of a cookie is to tell the Web server that you have returned to a specific page. You&nbsp;have the ability to accept or decline cookies. Most Web browsers automatically accept cookies, but you can usually modify your browser setting to decline cookies if you prefer. If you choose&nbsp;to decline cookies, you may not be able to fully experience the interactive features of the SUMC services or Web sites you visit.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>SECURITY OF YOUR PERSONAL INFORMATION</strong></p>\r\n\r\n<p>SUMC secures your personal information from unauthorized access, use or disclosure. SUMC secures the personally identifiable information you provide on computer servers in a controlled,&nbsp;secure environment, protected from unauthorized access, use or disclosure.&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>CHANGES TO THIS STATEMENT</strong></p>\r\n\r\n<p>SUMC will occasionally update this Statement of Privacy to reflect company and customer feedback. SUMC encourages you to periodically review this Statement to be informed of how SUMC&nbsp;is protecting your information.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>CONTACT INFORMATION</strong></p>\r\n\r\n<p>SUMC welcomes your comments regarding this Statement of Privacy. If you feel that SUMC has not adhered to this Statement, please contact SUMC at&nbsp;<a href=\"mailto:info@sultanunited.com\" target=\"_blank\">info@sultanunited.com</a>&nbsp;We will use&nbsp;commercially reasonable efforts to promptly determine and remedy the problem.</p>\r\n', 1);

-- --------------------------------------------------------

--
-- Table structure for table `sumc_projects`
--

CREATE TABLE `sumc_projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) CHARACTER SET utf8 NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `executive_summary` text CHARACTER SET utf8 NOT NULL,
  `image` varchar(255) NOT NULL,
  `videos` text CHARACTER SET utf8 NOT NULL,
  `status` tinyint(4) NOT NULL,
  `show_dates` tinyint(4) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_projects`
--

INSERT INTO `sumc_projects` (`id`, `title`, `start_date`, `end_date`, `description`, `executive_summary`, `image`, `videos`, `status`, `show_dates`, `created_date`) VALUES
(19, 'GENERAL X-RAY', '2020-02-20', '2020-05-31', '', '<p>SUMC had the commitment to deliver&nbsp;and install&nbsp;a high-end, floor-mounted radiography system that comes at an economical price and improves access to care</p>\r\n', '', '', 1, 0, '2020-12-10'),
(24, 'GENERAL X-RAY', '2020-01-15', '2020-04-02', '', '<p>SUMC&nbsp;had provided the private healthcare sector with the general x-ray system for assisting the radiographer to diagnose the patients with the great Image quality.</p>\r\n', '', '', 1, 0, '2020-12-10'),
(25, 'MRI 1.5T SYSTEM', '2019-12-15', '2020-04-02', '', '<p>SUMC undertook installation of&nbsp;the Cutting Edge 1.5T System to the private Healthcare Sector.</p>\r\n', '', '', 1, 0, '2020-12-10'),
(26, '128 SLICE CT SYSTEM', '2019-12-15', '2020-04-02', '', '<p>SUMC had installed&nbsp;the Multislice Dual energy CT system to the private Healthcare Sector.</p>\r\n', '', '', 1, 0, '2020-12-10'),
(27, 'PEDIATRIC CATH-LAB SYSTEM', '2019-07-18', '2019-09-18', '', '<p>SUMC had the commitment to install&nbsp;the new Biplane Angiography system with the Concern of SUMC for providing the suitable environment for the Pediatric patients with providing the latest technology for the Pediatric Catheterization surgery.&nbsp;</p>\r\n', '', '', 1, 0, '2020-12-10'),
(28, 'HYBRID OR', '2018-09-10', '2019-04-18', '', '<p>SUMC had the commitment to install the&nbsp;latest Multiaxis Robotic Angiography system in combination with Operating Room setup</p>\r\n', '', '', 1, 0, '2020-12-10'),
(29, 'SOMATOM FORCE - CT SYSTEM', '2017-07-11', '2017-09-11', '', '<p>SUMC had installed&nbsp;the New CT Dual Source System as part of SUMC role of providing the Ministry Of Health with the Fastest Rotation Technology in the Computed Tomography Industry.&nbsp;</p>\r\n', '', '', 1, 0, '2020-12-13'),
(30, 'MRI 1.5T SYSTEM ', '2016-07-13', '2016-09-04', '', '<p>SUMC had the commitment to install&nbsp;the new 1.5T MRI as part of SUMC role in providing the most updated technology for the private Healthcare Sector.</p>\r\n', '', '', 1, 0, '2020-12-13'),
(31, 'MAMMOGRAPHY SYSTEM ', '2015-05-20', '2015-06-11', '', '<p>SUMC had provided&nbsp;the private Healthcare sector with the premium Mammography System to Enhance everyday screening &amp; diagnostic.</p>\r\n', '', '', 1, 0, '2020-12-13'),
(32, 'GENERAL X-RAY ', '2012-04-24', '2012-05-20', '', '<p>SUMC had the commitment in providing the private healthcare sector with the general x-ray system for assisting the radiographer to diagnose the patients with the great usage quality.</p>\r\n', '', '', 1, 0, '2020-12-13'),
(33, 'RADIOGRAPHY & FLUOROSCOPY SYSTEM', '2012-03-15', '2012-04-29', '', '<p>SUMC undertook installion of&nbsp;the Digital Radiography and Fluoroscopy system to the private sector to provide the latest Technology in Medical Imaging.</p>\r\n', '', '', 1, 0, '2020-12-13'),
(35, 'INTEGRATED SOLUTIONS & TURNKEY PROJECTS', '2015-01-01', '2020-12-20', '', '<p>SUMC has the ability to undertake complete range of Engineering, installation and Construction activities to complete full setup of diagnostic and therapy centres.</p>\r\n', '', '', 1, 0, '2020-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_project_images`
--

CREATE TABLE `sumc_project_images` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_project_images`
--

INSERT INTO `sumc_project_images` (`id`, `project_id`, `image`, `created_date`) VALUES
(1, 8, 'uploads/projects/Rectangle 3.png', '2020-12-01'),
(2, 9, 'uploads/projects/Picture1.png', '2020-12-01'),
(3, 10, 'uploads/projects/Screen Shot 2020-11-02 at 7.16.37 PM.png', '2020-12-01'),
(5, 11, 'uploads/projects/download copy 2.jpeg', '2020-12-01'),
(6, 12, 'uploads/projects/3X5A0274.JPG', '2020-12-03'),
(7, 12, 'uploads/projects/3X5A0275.JPG', '2020-12-03'),
(12, 13, 'uploads/projects/3X5A0354.JPG', '2020-12-03'),
(14, 13, 'uploads/projects/3X5A0360.JPG', '2020-12-03'),
(15, 14, 'uploads/projects/3X5A0362.JPG', '2020-12-03'),
(16, 14, 'uploads/projects/3X5A0366.JPG', '2020-12-03'),
(18, 14, 'uploads/projects/3X5A0371.JPG', '2020-12-03'),
(19, 15, 'uploads/projects/3X5A0304.JPG', '2020-12-03'),
(24, 16, 'uploads/projects/3X5A0323.1.JPG', '2020-12-08'),
(27, 17, 'uploads/projects/3X5A04402.JPG', '2020-12-10'),
(28, 17, 'uploads/projects/3X5A04583.JPG', '2020-12-10'),
(30, 17, 'uploads/projects/11.JPG', '2020-12-10'),
(31, 17, 'uploads/projects/3X5A04663.JPG', '2020-12-10'),
(32, 18, 'uploads/projects/3X5A044021.JPG', '2020-12-10'),
(33, 18, 'uploads/projects/3X5A045831.JPG', '2020-12-10'),
(34, 18, 'uploads/projects/3X5A046631.JPG', '2020-12-10'),
(35, 18, 'uploads/projects/111.JPG', '2020-12-10'),
(36, 19, 'uploads/projects/dfvsdfv.JPG', '2020-12-10'),
(37, 20, 'uploads/projects/123.JPG', '2020-12-10'),
(38, 20, 'uploads/projects/6554.JPG', '2020-12-10'),
(39, 21, 'uploads/projects/3X5A0261.JPG', '2020-12-10'),
(40, 22, 'uploads/projects/6546.JPG', '2020-12-10'),
(41, 23, 'uploads/projects/3X5A03361.JPG', '2020-12-10'),
(42, 23, 'uploads/projects/3X5A03541.JPG', '2020-12-10'),
(43, 24, 'uploads/projects/3X5A02611.JPG', '2020-12-10'),
(44, 25, 'uploads/projects/65461.JPG', '2020-12-10'),
(45, 26, 'uploads/projects/1231.JPG', '2020-12-10'),
(46, 26, 'uploads/projects/65541.JPG', '2020-12-10'),
(47, 27, 'uploads/projects/3X5A03362.JPG', '2020-12-10'),
(48, 27, 'uploads/projects/3X5A03542.JPG', '2020-12-10'),
(51, 19, 'uploads/projects/3X5A0168.JPG', '2020-12-10'),
(54, 28, 'uploads/projects/IMG_4391.JPG', '2020-12-13'),
(55, 28, 'uploads/projects/IEDX5560.JPG', '2020-12-13'),
(56, 29, 'uploads/projects/3X5A02741.JPG', '2020-12-13'),
(57, 29, 'uploads/projects/3X5A02771.JPG', '2020-12-13'),
(58, 30, 'uploads/projects/3X5A0333.JPG', '2020-12-13'),
(59, 24, 'uploads/projects/3X5A0250.JPG', '2020-12-13'),
(60, 31, 'uploads/projects/3X5A0402.JPG', '2020-12-13'),
(64, 33, 'uploads/projects/113.JPG', '2020-12-13'),
(65, 33, 'uploads/projects/221.JPG', '2020-12-13'),
(66, 33, 'uploads/projects/331.JPG', '2020-12-13'),
(67, 32, 'uploads/projects/114.JPG', '2020-12-13'),
(68, 32, 'uploads/projects/222.JPG', '2020-12-13'),
(69, 32, 'uploads/projects/332.JPG', '2020-12-13'),
(70, 25, 'uploads/projects/223.JPG', '2020-12-13'),
(71, 29, 'uploads/projects/333.JPG', '2020-12-13'),
(72, 34, 'uploads/projects/IMG_0372.JPG', '2020-12-20'),
(73, 34, 'uploads/projects/IMG_1180.JPG', '2020-12-20'),
(74, 34, 'uploads/projects/IMG_2467.JPG', '2020-12-20'),
(75, 34, 'uploads/projects/IMG_4381.JPG', '2020-12-20'),
(90, 35, 'uploads/projects/d5191091-9703-4211-86f1-48334730623c.jpg', '2020-12-20'),
(91, 35, 'uploads/projects/IMG_03726.JPG', '2020-12-20'),
(92, 35, 'uploads/projects/IMG_11805.JPG', '2020-12-20'),
(93, 35, 'uploads/projects/IMG_24675.JPG', '2020-12-20');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_project_phaseimages`
--

CREATE TABLE `sumc_project_phaseimages` (
  `id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_project_phaseimages`
--

INSERT INTO `sumc_project_phaseimages` (`id`, `phase_id`, `image`, `created_date`) VALUES
(6, 2, 'uploads/projects/values-1.jpg', '2020-08-13'),
(13, 5, 'uploads/projects/03.jpg', '2020-08-17'),
(15, 6, 'uploads/projects/SUMC Logo With AR & EN Name1.png', '2020-08-24'),
(16, 3, 'uploads/projects/Picture3.jpg', '2020-08-24'),
(17, 7, 'uploads/projects/Picture32.jpg', '2020-08-26'),
(18, 8, 'uploads/projects/98-985335_abstract-paint-splatter-butterfly-wallpapers-hd-abstract-butterflies.jpg', '2020-08-26'),
(19, 9, 'uploads/projects/Picture34.jpg', '2020-09-03'),
(20, 10, 'uploads/projects/Picture36.jpg', '2020-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_project_phases`
--

CREATE TABLE `sumc_project_phases` (
  `id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `phase_title` varchar(255) NOT NULL,
  `description` text CHARACTER SET utf8 NOT NULL,
  `phase_images` text CHARACTER SET utf8 NOT NULL,
  `phase_videos` text CHARACTER SET utf8 NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_project_phases`
--

INSERT INTO `sumc_project_phases` (`id`, `project_id`, `phase_title`, `description`, `phase_images`, `phase_videos`, `created_date`) VALUES
(2, 1, 'Phase 11', 'phase1 description', 'uploads/projects/company-profile.jpg,uploads/projects/company-profile-1.jpg', '', '2020-08-05'),
(3, 2, 'Phase 1', 'This is where our engineers and specialists starts to redesign the location where our machine will be placed in the hospital/center. ', 'uploads/projects/careers.jpg', '', '2020-08-05'),
(4, 2, 'test phase2', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.\r\nLorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.', '', '', '2020-08-13'),
(6, 3, 'phase 1', 'Phase description', '', '', '2020-08-24'),
(7, 4, 'ad1', 'ad1', '', '', '2020-08-26'),
(8, 5, 'eee', 'ewew', '', '', '2020-08-26'),
(9, 6, 'Phase 11', 'Phase 1 - Description1', '', '', '2020-09-03'),
(10, 7, 'September 6 Phase 1', 'September 6 Phase 1', '', '', '2020-09-06');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_project_phasevideos`
--

CREATE TABLE `sumc_project_phasevideos` (
  `id` int(11) NOT NULL,
  `phase_id` int(11) NOT NULL,
  `video` varchar(255) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_project_phasevideos`
--

INSERT INTO `sumc_project_phasevideos` (`id`, `phase_id`, `video`, `created_date`) VALUES
(3, 2, 'uploads/projects/Screen Recording 2020-08-17 at 10.56.17 AM.mov', '2020-08-17'),
(4, 5, 'uploads/projects/SampleVideo_1280x720_1mb (1)1.mp4', '2020-08-17'),
(5, 5, 'uploads/projects/SampleVideo_720x480_2mb.mp4', '2020-08-17'),
(7, 6, 'uploads/projects/SampleVideo_1280x720_5mb.mp4', '2020-08-24'),
(8, 6, 'uploads/projects/102730757 - Multiple issues.mp4', '2020-08-24'),
(9, 6, 'uploads/projects/102730757 - Multiple issues1.mp4', '2020-08-24'),
(11, 3, 'uploads/projects/fc9e0c9f-c0b2-4355-81b1-6d62dbe27cf1.MP4', '2020-08-24'),
(12, 7, 'uploads/projects/102730757 - Multiple issues2.mp4', '2020-08-26'),
(13, 9, 'uploads/projects/epty card anim.mp4', '2020-09-03'),
(14, 10, 'uploads/projects/faisal 3.mp4', '2020-09-06'),
(15, 10, 'uploads/projects/faisal 31.mp4', '2020-09-06'),
(16, 8, 'uploads/projects/faisal 32.mp4', '2020-09-07');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_services`
--

CREATE TABLE `sumc_services` (
  `id` int(11) NOT NULL,
  `title` varchar(150) NOT NULL,
  `image` varchar(150) NOT NULL,
  `profile_image` varchar(150) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL,
  `ordering` int(11) NOT NULL,
  `created_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sumc_services`
--

INSERT INTO `sumc_services` (`id`, `title`, `image`, `profile_image`, `content`, `status`, `ordering`, `created_date`) VALUES
(2, 'HEADQUARTERED IN KUWAIT', 'uploads/services/kuwait-made.jpg', '', '<p>We are Kuwait&rsquo;s only pharmaceutical manufacturing company. The products we manufacture are sold in Kuwait, distributed to most of the Middle East, and reach customers world-wide.</p>\r\n', 1, 1, '2021-03-01'),
(3, 'RECOGNIZED ACROSS THE MIDDLE EAST', 'uploads/services/middle-east-recognized.jpg', '', '<p>Operating to GMP and approved by regional regulatory authorities, our products meet the high demand for medicines in many countries.</p>\r\n', 1, 2, '2021-03-01'),
(4, 'GLOBAL AMBITION', 'uploads/services/we-got-you-covered.jpg', '', '<p>We are continually expanding our product range and our markets, focussing on innovation and value.</p>\r\n', 1, 3, '2021-03-01');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_socialnetworking`
--

CREATE TABLE `sumc_socialnetworking` (
  `id` int(11) NOT NULL,
  `instagram` varchar(225) CHARACTER SET utf8 NOT NULL,
  `twitter` varchar(225) CHARACTER SET utf8 NOT NULL,
  `linked_in` varchar(225) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `sumc_socialnetworking`
--

INSERT INTO `sumc_socialnetworking` (`id`, `instagram`, `twitter`, `linked_in`) VALUES
(1, 'https://www.instagram.com/sumc.kw/', 'https://twitter.com/Sumckw', 'https://www.linkedin.com/company/al-sultan-united-medical-company');

-- --------------------------------------------------------

--
-- Table structure for table `sumc_terms`
--

CREATE TABLE `sumc_terms` (
  `id` int(11) NOT NULL,
  `terms_content` text CHARACTER SET latin1 NOT NULL,
  `status` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sumc_terms`
--

INSERT INTO `sumc_terms` (`id`, `terms_content`, `status`) VALUES
(1, '<p>&nbsp;</p>\r\n\r\n<p><strong>AGREEMENT BETWEEN USER AND SUMC</strong></p>\r\n\r\n<p>The SUMC Web Site is comprised of various Web pages operated by SUMC.</p>\r\n\r\n<p>The SUMC Web Site is offered to you conditioned on your acceptance without modification of the terms, conditions, and notices contained herein. Your use of the SUMC Web Site constitutes your agreement to all such terms, conditions, and notices.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>MODIFICATION OF THESE TERMS OF USE</strong></p>\r\n\r\n<p>SUMC reserves the right to change the terms, conditions, and notices under which the SUMC Web Site is offered, including but not limited to the charges associated with the use of the SUMC Web Site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>NO UNLAWFUL OR PROHIBITED USE</strong></p>\r\n\r\n<p>As a condition of your use of the SUMC Web Site, you warrant to SUMC that you will not use the SUMC Web Site for any purpose that is unlawful or prohibited by these terms, conditions, and notices. You may not use the SUMC Web Site in any manner which could damage, disable, overburden, or impair the SUMC Web Site or interfere with any other party&#39;s use and enjoyment of the SUMC Web Site. You may not obtain or attempt to obtain any materials or information through any means not intentionally made available or provided for through the SUMC Web Sites.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>LIABILITY DISCLAIMER</strong></p>\r\n\r\n<p>The information, software, products, and services included in or available through the sumc web site may include inaccuracies or typographical errors. Changes are periodically added to the information herein. Sumc may make improvements and/or changes in the sumc web site at any time.</p>\r\n\r\n<p>Sumc make no representations about the suitability, reliability, availability, timeliness, and accuracy of the information, software, products, services and related graphics contained on the sumc web site for any purpose. To the maximum extent permitted by applicable law, all such information, software, products, services and related graphics are provided &quot;As is&quot; without warranty or condition of any kind. Sumc hereby disclaim all warranties and conditions with regard to this information, software, products, services and related graphics, including all implied warranties or conditions of merchantability, fitness for a particular purpose, title and non-infringement.</p>\r\n\r\n<p>To the maximum extent permitted by applicable law, in no event shall sumc be liable for any direct, indirect, punitive, incidental, special, consequential damages or any damages whatsoever including, without limitation, damages for loss of use, data or profits, arising out of or in any way connected with the use or performance of the sumc web site, with the delay or inability to use the sumc web site or related services, the provision of or failure to provide services, or for any information, software, products, services and related graphics obtained through the sumc web site, or otherwise arising out of the use of the sumc web site, whether based on contract, tort, negligence, strict liability or otherwise, even if sumc has been advised of the possibility of damages. Because some states/jurisdictions do not allow the exclusion or limitation of liability for consequential or incidental damages, the above limitation may not apply to you. If you are dissatisfied with any portion of the sumc web site, or with any of these terms of use, your sole and exclusive remedy is to discontinue using the sumc web site.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>TERMINATION/ACCESS RESTRICTION</strong></p>\r\n\r\n<p>Use of the SUMC Web Site is unauthorized in any jurisdiction that does not give effect to all provisions of these terms and conditions, including without limitation this paragraph. You agree that no joint venture, partnership, employment, or agency relationship exists between you and SUMC as a result of this agreement or use of the SUMC Web Site. SUMC&rsquo;s performance of this agreement is subject to existing laws and legal process, and nothing contained in this agreement is in derogation of SUMC&rsquo;s right to comply with governmental, court and law enforcement requests or requirements relating to your use of the SUMC Web Site or information provided to or gathered by SUMC with respect to such use. If any part of this agreement is determined to be invalid or unenforceable pursuant to applicable law including, but not limited to, the warranty disclaimers and liability limitations set forth above, then the invalid or unenforceable provision will be deemed superseded by a valid, enforceable provision that most closely matches the intent of the original provision and the remainder of the agreement shall continue in effect. Unless otherwise specified herein, this agreement constitutes the entire agreement between the user and SUMC with respect to the SUMC Web Site and it supersedes all prior or contemporaneous communications and proposals, whether electronic, oral or written, between the user and SUMC with respect to the SUMC Web Site. A printed version of this agreement and of any notice given in electronic form shall be admissible in judicial or administrative proceedings based upon or relating to this agreement to the same extent and subject to the same conditions as other business documents and records originally generated and maintained in printed form. It is the express wish to the parties that this agreement and all related documents be drawn up in English.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>COPYRIGHT AND TRADEMARK NOTICES:</strong></p>\r\n\r\n<p>All contents of SUMC Web Site are: Copyright 2020 by SUMC. All rights reserved.</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><strong>TRADEMARKS</strong></p>\r\n\r\n<p>The names of actual companies and products mentioned herein may be the trademarks of their respective owners.</p>\r\n\r\n<p>The example companies, organizations, products, people, and events depicted herein are fictitious. No association with any real company, organization, product, person, or event is intended or should be inferred.</p>\r\n\r\n<p><strong>Any rights not expressly granted herein are reserved.</strong></p>\r\n\r\n<p>&nbsp;</p>\r\n', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `sumc_adminuser`
--
ALTER TABLE `sumc_adminuser`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_banners`
--
ALTER TABLE `sumc_banners`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_careers`
--
ALTER TABLE `sumc_careers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_carousels`
--
ALTER TABLE `sumc_carousels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_company_awards`
--
ALTER TABLE `sumc_company_awards`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_company_profile`
--
ALTER TABLE `sumc_company_profile`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_company_values`
--
ALTER TABLE `sumc_company_values`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_contact_feedback`
--
ALTER TABLE `sumc_contact_feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_contact_us`
--
ALTER TABLE `sumc_contact_us`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_coroporate`
--
ALTER TABLE `sumc_coroporate`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_corporate_responsibility`
--
ALTER TABLE `sumc_corporate_responsibility`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_diverse`
--
ALTER TABLE `sumc_diverse`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_diverse_text`
--
ALTER TABLE `sumc_diverse_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_gm_message`
--
ALTER TABLE `sumc_gm_message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_healthcategory`
--
ALTER TABLE `sumc_healthcategory`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_healthcategory_images`
--
ALTER TABLE `sumc_healthcategory_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_homeslides`
--
ALTER TABLE `sumc_homeslides`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_homeslide_text`
--
ALTER TABLE `sumc_homeslide_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_leaderships`
--
ALTER TABLE `sumc_leaderships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_mezzan`
--
ALTER TABLE `sumc_mezzan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_mezzan_group`
--
ALTER TABLE `sumc_mezzan_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_mezzan_text`
--
ALTER TABLE `sumc_mezzan_text`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_news`
--
ALTER TABLE `sumc_news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_privacy`
--
ALTER TABLE `sumc_privacy`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_projects`
--
ALTER TABLE `sumc_projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_project_images`
--
ALTER TABLE `sumc_project_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_project_phaseimages`
--
ALTER TABLE `sumc_project_phaseimages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_project_phases`
--
ALTER TABLE `sumc_project_phases`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_project_phasevideos`
--
ALTER TABLE `sumc_project_phasevideos`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_services`
--
ALTER TABLE `sumc_services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_socialnetworking`
--
ALTER TABLE `sumc_socialnetworking`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sumc_terms`
--
ALTER TABLE `sumc_terms`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `sumc_adminuser`
--
ALTER TABLE `sumc_adminuser`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_banners`
--
ALTER TABLE `sumc_banners`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_careers`
--
ALTER TABLE `sumc_careers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumc_carousels`
--
ALTER TABLE `sumc_carousels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumc_company_awards`
--
ALTER TABLE `sumc_company_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `sumc_company_profile`
--
ALTER TABLE `sumc_company_profile`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_company_values`
--
ALTER TABLE `sumc_company_values`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sumc_contact_feedback`
--
ALTER TABLE `sumc_contact_feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_contact_us`
--
ALTER TABLE `sumc_contact_us`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_coroporate`
--
ALTER TABLE `sumc_coroporate`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_corporate_responsibility`
--
ALTER TABLE `sumc_corporate_responsibility`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `sumc_diverse`
--
ALTER TABLE `sumc_diverse`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sumc_diverse_text`
--
ALTER TABLE `sumc_diverse_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_gm_message`
--
ALTER TABLE `sumc_gm_message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_healthcategory`
--
ALTER TABLE `sumc_healthcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `sumc_healthcategory_images`
--
ALTER TABLE `sumc_healthcategory_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sumc_homeslides`
--
ALTER TABLE `sumc_homeslides`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumc_homeslide_text`
--
ALTER TABLE `sumc_homeslide_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_leaderships`
--
ALTER TABLE `sumc_leaderships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumc_mezzan`
--
ALTER TABLE `sumc_mezzan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `sumc_mezzan_group`
--
ALTER TABLE `sumc_mezzan_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_mezzan_text`
--
ALTER TABLE `sumc_mezzan_text`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_news`
--
ALTER TABLE `sumc_news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sumc_privacy`
--
ALTER TABLE `sumc_privacy`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_projects`
--
ALTER TABLE `sumc_projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT for table `sumc_project_images`
--
ALTER TABLE `sumc_project_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `sumc_project_phaseimages`
--
ALTER TABLE `sumc_project_phaseimages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `sumc_project_phases`
--
ALTER TABLE `sumc_project_phases`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `sumc_project_phasevideos`
--
ALTER TABLE `sumc_project_phasevideos`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `sumc_services`
--
ALTER TABLE `sumc_services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `sumc_socialnetworking`
--
ALTER TABLE `sumc_socialnetworking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `sumc_terms`
--
ALTER TABLE `sumc_terms`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
