-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 03, 2022 at 02:42 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `forum`
--

-- --------------------------------------------------------

--
-- Table structure for table `forums`
--

CREATE TABLE `forums` (
  `id` int(11) UNSIGNED NOT NULL,
  `title` varchar(122) NOT NULL,
  `slug` varchar(122) NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `forums`
--

INSERT INTO `forums` (`id`, `title`, `slug`, `created_at`, `updated_at`, `user_id`) VALUES
(1, 'Lorem ipsum dolor sit amet', 'lorem-ipsum-dolor-sit-amet', '2022-08-26 00:49:33', '2022-08-26 00:49:33', 1),
(2, 'At, si voluptas esset bonum', 'at-si-voluptas-esset-bonum', '2022-08-26 00:49:33', '2022-08-26 00:49:33', 1);

-- --------------------------------------------------------

--
-- Table structure for table `replies`
--

CREATE TABLE `replies` (
  `id` int(11) NOT NULL,
  `topic_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `replies`
--

INSERT INTO `replies` (`id`, `topic_id`, `user_id`, `content`, `views`, `likes`, `dislikes`, `created_at`, `updated_at`) VALUES
(1, 23, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nescio quo modo praetervolavit oratio. Hunc vos beatum; Quo studio Aristophanem putamus aetatem in litteris duxisse? Duo Reges: constructio interrete. Zenonis est, inquam, hoc Stoici. </p>\r\n\r\n<p>Ne in odium veniam, si amicum destitero tueri. Cur id non ita fit? Non est ista, inquam, Piso, magna dissensio. <b>Venit ad extremum;</b> </p>\r\n\r\n<p><a href=\"http://loripsum.net/\" target=\"_blank\">Et nemo nimium beatus est;</a> <b>Nemo igitur esse beatus potest.</b> Iam enim adesse poterit. Si quae forte-possumus. </p>\r\n\r\n', 11, 11, 1, '2022-08-26 01:06:41', '2022-08-26 01:06:41'),
(2, 23, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Peccata paria. Tum Triarius: Posthac quidem, inquit, audacius. Tu vero, inquam, ducas licet, si sequetur; Duo Reges: constructio interrete. <a href=\"http://loripsum.net/\" target=\"_blank\">Teneo, inquit, finem illi videri nihil dolere.</a> </p>\r\n\r\n<p>Hunc vos beatum; Confecta res esset. Nos cum te, M. </p>\r\n\r\n<p><b>Nemo igitur esse beatus potest.</b> <i>Omnes enim iucundum motum, quo sensus hilaretur.</i> Idemne, quod iucunde? Omnia contraria, quos etiam insanos esse vultis. <b>Respondeat totidem verbis.</b> Illa tamen simplicia, vestra versuta. <a href=\"http://loripsum.net/\" target=\"_blank\">Cur haec eadem Democritus?</a> <b>An potest cupiditas finiri?</b> </p>\r\n\r\n', 1111, 0, 0, '2022-08-26 01:06:41', '2022-08-26 01:06:41'),
(3, 23, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tum Torquatus: Prorsus, inquit, assentior; Summum ením bonum exposuit vacuitatem doloris; Sed nimis multa. Duo Reges: constructio interrete. <i>Eadem fortitudinis ratio reperietur.</i> Dici enim nihil potest verius. Non enim iam stirpis bonum quaeret, sed animalis. </p>\r\n\r\n<p>Sed quod proximum fuit non vidit. Sint ista Graecorum; Sed virtutem ipsam inchoavit, nihil amplius. Hoc non est positum in nostra actione. Atqui reperies, inquit, in hoc quidem pertinacem; An nisi populari fama? </p>\r\n\r\n<p><b>Honesta oratio, Socratica, Platonis etiam.</b> <i>Polycratem Samium felicem appellabant.</i> Estne, quaeso, inquam, sitienti in bibendo voluptas? Haec dicuntur inconstantissime. <i>Si qua in iis corrigere voluit, deteriora fecit.</i> <b>Istam voluptatem, inquit, Epicurus ignorat?</b> </p>\r\n\r\n<pre>Aut, si nihil malum, nisi quod turpe, inhonestum, indecorum,\r\npravum, flagitiosum, foedum-ut hoc quoque pluribus nominibus\r\ninsigne faciamus-, quid praeterea dices esse fugiendum?\r\n\r\nAliud est enim poëtarum more verba fundere, aliud ea, quae\r\ndicas, ratione et arte distinguere.\r\n</pre>\r\n\r\n\r\n', 1, 0, 0, '2022-08-26 01:07:45', '2022-08-26 01:07:45'),
(4, 7, 1, '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pauca mutat vel plura sane; <a href=\"http://loripsum.net/\" target=\"_blank\">At enim hic etiam dolore.</a> Ille enim occurrentia nescio quae comminiscebatur; Sed eum qui audiebant, quoad poterant, defendebant sententiam suam. </p>\r\n\r\n<pre>Itaque haec cum illis est dissensio, cum Peripateticis nulla\r\nsane.\r\n\r\nIsta ipsa, quae tu breviter: regem, dictatorem, divitem\r\nsolum esse sapientem, a te quidem apte ac rotunde;\r\n</pre>\r\n\r\n\r\n<p>Frater et T. <a href=\"http://loripsum.net/\" target=\"_blank\">An eiusdem modi?</a> Fortemne possumus dicere eundem illum Torquatum? Quae cum dixisset paulumque institisset, Quid est? Ita graviter et severe voluptatem secrevit a bono. </p>\r\n\r\n<p>Que Manilium, ab iisque M. Bonum valitudo: miser morbus. Duo Reges: constructio interrete. Istic sum, inquit. Eaedem res maneant alio modo. Torquatus, is qui consul cum Cn. </p>\r\n\r\n', 21, 0, 0, '2022-08-26 01:07:45', '2022-08-26 01:07:45');

-- --------------------------------------------------------

--
-- Table structure for table `topics`
--

CREATE TABLE `topics` (
  `id` int(11) NOT NULL,
  `title` varchar(211) NOT NULL,
  `topic_sub_title` text DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `views` int(11) NOT NULL DEFAULT 0,
  `slug` varchar(122) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT 0,
  `dislikes` int(11) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL,
  `forum_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `topics`
--

INSERT INTO `topics` (`id`, `title`, `topic_sub_title`, `user_id`, `views`, `slug`, `likes`, `dislikes`, `created_at`, `updated_at`, `forum_id`) VALUES
(2, 'Quis est tam dissimile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 122, 'quis-est-tam-dissimile', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 1),
(3, 'Nemo nostrum istius generis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 11, 'nemo-nostrum-istius-generis', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 2),
(4, 'Quis est tam dissimile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 122, 'quis-est-tam-dissimile', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 1),
(5, 'Nemo nostrum istius generis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 11, 'nemo-nostrum-istius-generis', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 2),
(6, 'Quis est tam dissimile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 122, 'quis-est-tam-dissimile', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 1),
(7, 'Quis est tam dissimile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 122, 'quis-est-tam-dissimile2', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 1),
(8, 'Nemo nostrum istius generis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 11, 'nemo-nostrum-istius-generis1', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 2),
(9, 'Quis est tam dissimile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 122, 'quis-est-tam-dissimile33', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 1),
(10, 'Nemo nostrum istius generis', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 11, 'nemo-nostrum-istius-generis444', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 2),
(11, 'Quis est tam dissimile', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Quis est tam dissimile homini. Itaque et vivere vitem et mori dicimus arboremque et novellan et vetulam et vigere et senescere. ]', 1, 122, 'quis-est-tam-dissimile5', 0, 0, '2022-08-26 00:53:30', '2022-08-26 00:53:30', 1),
(20, 'test 3', 'test3', 9, 0, 'test-3', 0, 0, '2022-09-02 22:31:24', '2022-09-02 22:31:24', 2),
(21, 'This is my new topic title', 'This is my new topic title .', 9, 0, 'this-is-my-new-topic-title', 0, 0, '2022-09-02 22:33:19', '2022-09-02 22:33:19', 2),
(22, 'Lorem ipsum dolor sit amet, consectetur', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed haec in pueris; <a href=\"http://loripsum.net/\" target=\"_blank\">Quae sequuntur igitur?</a> Eam stabilem appellas. <mark>Nescio quo modo praetervolavit oratio.</mark> </p>\r\n\r\n<p>Sed haec omittamus; <i>Quid est enim aliud esse versutum?</i> Ut aliquid scire se gaudeant? Magna laus. </p>', 9, 0, 'lorem-ipsum-dolor-sit-amet-consectetur', 0, 0, '2022-09-02 22:34:09', '2022-09-02 22:34:09', 2),
(23, 'Proclivi currit oratio. Respondeat', '<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Tollenda est atque extrahenda radicitus. Multoque hoc melius nos veriusque quam Stoici. </p>\r\n\r\n<p>Proclivi currit oratio. Respondeat totidem verbis. Duo Reges: constructio interrete. Qui ita affectus, beatum esse numquam probabis; Hanc ergo intuens debet institutum illud quasi signum absolvere. </p>', 9, 0, 'proclivi-currit-oratio-respondeat', 0, 0, '2022-09-02 22:34:43', '2022-09-02 22:34:43', 2);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) UNSIGNED NOT NULL,
  `first_name` varchar(122) NOT NULL,
  `last_name` varchar(122) NOT NULL,
  `username` varchar(22) NOT NULL,
  `email` varchar(122) NOT NULL,
  `password` varchar(122) NOT NULL,
  `activated` int(11) NOT NULL DEFAULT 0,
  `token` varchar(211) DEFAULT NULL,
  `last_active` datetime NOT NULL,
  `replies_count` int(11) NOT NULL DEFAULT 0,
  `posts_count` int(11) NOT NULL DEFAULT 0,
  `blocked` int(1) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `username`, `email`, `password`, `activated`, `token`, `last_active`, `replies_count`, `posts_count`, `blocked`, `created_at`) VALUES
(1, 'Milan', 'Janković', 'milanj82nis', 'milanj31@gmail.com', '$2y$10$5byf32mIBbdDLMeYyA/1/OCvgVLFiPi5wdQ2Egwo49FrEos/gQl5.', 1, '70eb9eff8200d126ccd83434287aed06', '2022-09-03 09:32:49', 10, 0, 0, '2022-09-01 01:00:06');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `forums`
--
ALTER TABLE `forums`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `replies`
--
ALTER TABLE `replies`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `topics`
--
ALTER TABLE `topics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `forums`
--
ALTER TABLE `forums`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `replies`
--
ALTER TABLE `replies`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `topics`
--
ALTER TABLE `topics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
