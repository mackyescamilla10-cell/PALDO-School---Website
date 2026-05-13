-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 13, 2026 at 06:02 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `announcements`
--

CREATE TABLE `announcements` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `content` text NOT NULL,
  `date_posted` date DEFAULT NULL,
  `category` varchar(100) DEFAULT NULL,
  `priority` varchar(50) DEFAULT 'normal',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `announcements`
--

INSERT INTO `announcements` (`id`, `title`, `content`, `date_posted`, `category`, `priority`, `created_at`) VALUES
(1, 'New Transfer Student Admission Guidelines - 2026', '<h2>Welcome to PALDO school.</h2>\r\n\r\n<p>We are pleased to announce the opening of our transfer student admission program for the 2026 academic year. If you are a student from another institution seeking to continue your education with us, please take note of the following guidelines:</p>\r\n\r\n<h3>📋 Requirements for Transfer Students:</h3>\r\n<ul>\r\n  <li><strong>Valid Student ID</strong> - Original and photocopy from your current or previous institution</li>\r\n  <li><strong>Official Transcript of Records (TOR)</strong> - Certified copy showing your academic performance</li>\r\n  <li><strong>Certificate of Good Moral Character</strong> - Issued by your previous school</li>\r\n  <li><strong>Medical Certificate</strong> - Proof of good health from a licensed physician</li>\r\n  <li><strong>Vaccination Records</strong> - Complete immunization documentation</li>\r\n  <li><strong>Birth Certificate</strong> - Certified true copy</li>\r\n  <li><strong>2x2 Passport-sized Photos (4 pieces)</strong> - Recent and clear quality</li>\r\n  <li><strong>Parent/Guardian Consent Form</strong> - For students under 18 years old</li>\r\n</ul>\r\n\r\n<h3>🌐 How to Apply Online:</h3>\r\n<ol>\r\n  <li>Visit our official website and navigate to the Admissions section</li>\r\n  <li>Click on Transfer Student Application Form</li>\r\n  <li>Complete all required fields accurately and honestly</li>\r\n  <li>Upload scanned copies of all required documents (PDF format, max 5MB per file)</li>\r\n  <li>Submit your application and save your reference number</li>\r\n  <li>Wait for confirmation email within 5-7 business days</li>\r\n  <li>Schedule your entrance examination and interview</li>\r\n</ol>\r\n\r\n<h3>⏰ Important Dates:</h3>\r\n<ul>\r\n  <li><strong>Application Deadline:</strong> May 31, 2026</li>\r\n  <li><strong>Entrance Examination:</strong> June 15-20, 2026</li>\r\n  <li><strong>Interview Schedule:</strong> June 22-26, 2026</li>\r\n  <li><strong>Results Release:</strong> July 5, 2026</li>\r\n  <li><strong>Enrollment Period:</strong> July 10-25, 2026</li>\r\n</ul>\r\n\r\n<h3>✅ Admission Process:</h3>\r\n<p>All applicants will undergo a comprehensive evaluation including:</p>\r\n<ul>\r\n  <li>Academic records review</li>\r\n  <li>Entrance examination</li>\r\n  <li>Personal interview</li>\r\n  <li>Assessment of fit with our institution values and programs</li>\r\n</ul>\r\n\r\n<h3>📞 Contact Information:</h3>\r\n<p><strong>Admissions Office:</strong><br>\r\n📍 Negros South Road, Binalbagan, Negros Occidental, Philippines<br>\r\n📞 (63+)9123456789 / (63+)9676767676 <br>\r\n✉️ admissions@paldo.edu<br>\r\n🌐 www.paldo.edu</p>\r\n\r\n<p><strong style=\"color: #c41e3a;\">Note:</strong> All documents must be submitted online before the deadline. Late submissions will not be accepted. For inquiries, please contact our Admissions Office during business hours (Monday-Friday, 8:00 AM - 5:00 PM).</p>\r\n\r\n<p><em>We look forward to welcoming new transfer students to our academic community!</em></p>', '2026-05-09', 'Admissions', 'normal', '2026-05-09 14:23:11');

-- --------------------------------------------------------

--
-- Table structure for table `inquiries`
--

CREATE TABLE `inquiries` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `subject` varchar(200) DEFAULT NULL,
  `message` text NOT NULL,
  `status` varchar(50) DEFAULT 'new',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `inquiries`
--

INSERT INTO `inquiries` (`id`, `firstname`, `lastname`, `email`, `phone`, `subject`, `message`, `status`, `created_at`) VALUES
(1, 'Mc', 'Escamilla', 'mackyescamilla10@gmail.com', '09917143294', 'payment', 'how will i pay for this??', 'new', '2026-05-09 14:33:55');

-- --------------------------------------------------------

--
-- Table structure for table `programs`
--

CREATE TABLE `programs` (
  `id` int(11) NOT NULL,
  `name` varchar(150) NOT NULL,
  `description` text DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `level` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `capacity` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `programs`
--

INSERT INTO `programs` (`id`, `name`, `description`, `duration`, `level`, `created_at`, `capacity`) VALUES
(1, 'Elementary Education', 'Comprehensive program covering grades 1-6 with focus on foundational skills, numeracy, and literacy development.', '6 Years', 'Elementary', '2026-05-09 14:11:20', 267),
(2, 'Junior High School', 'Complete junior secondary education program (grades 7-10) preparing students for senior high school and beyond.', '4 Years', 'Junior High', '2026-05-09 14:11:20', 301),
(3, 'Senior High School - STEM', 'Science, Technology, Engineering, and Mathematics track for students interested in science and technical careers.', '2 Years', 'Senior High', '2026-05-09 14:11:20', 67),
(4, 'Senior High School - HUMSS', 'Humanities and Social Sciences track focusing on social sciences, languages, and communication.', '2 Years', 'Senior High', '2026-05-09 14:11:20', 89),
(5, 'Information Technology', 'College-level IT program covering programming, web development, networking, and database management.', '4 Years', 'College', '2026-05-09 14:11:20', 567),
(6, 'Business Administration', 'College-level business program with focus on management, accounting, and entrepreneurship.', '4 Years', 'College', '2026-05-09 14:11:20', 76),
(7, 'Grade 1', 'Foundation year focusing on basic reading, writing, and numeracy skills with play-based learning approach.', '1 Year', 'Elementary', '2026-05-09 14:16:32', 40),
(8, 'Grade 2-3', 'Development of core academic skills with introduction to science and social studies concepts.', '2 Years', 'Elementary', '2026-05-09 14:16:32', 40),
(9, 'Grade 4-6', 'Advanced elementary education focusing on critical thinking, research skills, and academic excellence.', '3 Years', 'Elementary', '2026-05-09 14:16:32', 45),
(10, 'Grade 7-8 (Lower Junior)', 'Foundation for junior high with subjects covering Science, Math, English, and Social Sciences.', '2 Years', 'Junior High', '2026-05-09 14:16:32', 45),
(11, 'Grade 9-10 (Upper Junior)', 'Preparation for senior high with advanced curriculum and career exploration programs.', '2 Years', 'Junior High', '2026-05-09 14:16:32', 45),
(12, 'Senior High School - ABM', 'Accountancy, Business, and Management track for commerce and entrepreneurship-focused students.', '2 Years', 'Senior High', '2026-05-09 14:16:32', 50),
(13, 'Senior High School - GAS', 'General Academic Strand for students seeking flexible curriculum options.', '2 Years', 'Senior High', '2026-05-09 14:16:32', 50),
(14, 'Bachelor of Science in Education', 'Teacher education program preparing future educators across various disciplines.', '4 Years', 'College', '2026-05-09 14:16:32', 60),
(15, 'Bachelor of Science in Nursing', 'Comprehensive nursing program with clinical training and hospital internships.', '4 Years', 'College', '2026-05-09 14:16:32', 55);

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `program` varchar(100) DEFAULT NULL,
  `admission_date` date DEFAULT NULL,
  `status` varchar(50) DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `firstname`, `lastname`, `email`, `phone`, `program`, `admission_date`, `status`, `created_at`) VALUES
(1, 'Mc Neil John', 'Escamilla', 'mackyescamilla10@gmail.com', '09917143294', '', '2026-05-09', 'active', '2026-05-09 12:40:32'),
(2, 'Mc', 'Escamilla', 'mackyescamilla11@gmail.com', '09917143294', 'Bachelor of Science in Education', '2026-05-09', 'active', '2026-05-09 14:37:23');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `announcements`
--
ALTER TABLE `announcements`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `inquiries`
--
ALTER TABLE `inquiries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `programs`
--
ALTER TABLE `programs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `announcements`
--
ALTER TABLE `announcements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `inquiries`
--
ALTER TABLE `inquiries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `programs`
--
ALTER TABLE `programs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
