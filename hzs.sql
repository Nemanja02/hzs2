-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 25, 2019 at 08:13 PM
-- Server version: 5.7.27-0ubuntu0.19.04.1
-- PHP Version: 7.2.24-0ubuntu0.19.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hzs`
--

-- --------------------------------------------------------

--
-- Table structure for table `cities`
--

CREATE TABLE `cities` (
  `city_id` int(11) NOT NULL,
  `city_name` varchar(32) NOT NULL,
  `lat` double NOT NULL,
  `long` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cities`
--

INSERT INTO `cities` (`city_id`, `city_name`, `lat`, `long`) VALUES
(1, 'Beograd', 44.81311, 20.46329),
(2, 'Kotez', 44.85227, 20.47196),
(3, 'Kotez', 44.85227, 20.47196),
(4, 'Kotez', 44.85227, 20.47196),
(5, 'Kotez', 44.85227, 20.47196),
(6, 'Leskovac', 42.99633, 21.94855),
(7, 'Leskovac', 42.99633, 21.94855),
(8, 'Leskovac', 42.99633, 21.94855),
(9, 'Novi Sad', 45.2569, 19.8416),
(10, 'Pristina', 42.67181, 21.16243),
(11, 'Pristina', 42.67181, 21.16243),
(12, 'Stark%20Arena', 49.77128, -97.62415),
(13, 'Beograd 11070', 44.81461, 20.4203),
(14, 'Borca', 47.18023, 25.78405),
(15, 'Sava Centar', 44.8064628, 20.4334555),
(16, 'Borca', 44.86969, 20.45413),
(17, 'Kotez', 44.85034, 20.4689381),
(18, 'Štark Arena', 44.81413045, 20.4213862861211),
(19, 'Sava Centar', 44.8064628, 20.4334555),
(20, 'Sava Centar', 44.8064628, 20.4334555),
(21, 'Sava Centar', 44.8064628, 20.4334555),
(22, 'Narodno pozorište', 44.8169855, 20.4608493074681),
(23, 'Cineplexx Usce', 44.8154526, 20.4374781),
(24, 'Petrovaradinska Tvrdjava', 45.25210845, 19.8639470144799),
(25, 'Petrovaradinska Tvrdjava', 45.25210845, 19.8639470144799),
(26, 'Petrovaradinska Tvrdjava', 45.2526149, 19.8736898),
(27, 'Cacak', 43.8939887, 20.3484499090744),
(28, 'Cacak', 43.8939887, 20.3484499090744),
(29, 'Petrovaradinska Tvrdjava', 45.25210845, 19.8639470144799),
(30, 'OOF', -9.8339874, 124.4037514),
(31, 'Racunarski Fakultet', 44.815575, 20.4598337),
(32, 'Kurac', 54.598809, 18.808414),
(33, 'Kurac', 54.598809, 18.808414),
(34, 'Štark Arena\'', 44.81413045, 20.4213862861211),
(35, 'Cineplexx', 44.8154526, 20.4374781),
(36, 'Trg Republike', 44.8162216, 20.4602953),
(37, 'Trg Republike', 44.8162216, 20.4602953),
(38, 'Narodno pozoriste', 44.8169855, 20.4608493074681),
(39, 'Narodno pozoriste', 44.816935, 20.460769),
(40, 'Narodno pozoriste', 44.8169855, 20.4608493074681),
(41, 'aaaaaaa', 0.457798, 101.3945279),
(42, 'aaaaaaa', 0.457798, 101.3945279),
(43, 'Galerija SKC', 44.826546, 20.4018635),
(44, 'Galerija SKC', 44.826546, 20.4018635),
(45, 'Cineplexx', 44.8154526, 20.4374781);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE `events` (
  `id` int(11) NOT NULL,
  `name` varchar(48) CHARACTER SET utf8mb4 COLLATE utf8mb4_croatian_ci NOT NULL,
  `city_id` int(11) NOT NULL,
  `starting_time` int(48) NOT NULL,
  `ending_time` int(48) NOT NULL,
  `description` text NOT NULL,
  `price` float NOT NULL,
  `type` varchar(32) NOT NULL,
  `ticket` text NOT NULL,
  `starred` varchar(3) NOT NULL DEFAULT 'off'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`id`, `name`, `city_id`, `starting_time`, `ending_time`, `description`, `price`, `type`, `ticket`, `starred`) VALUES
(26, 'deadmau5 koncert', 18, 1577307600, 1577325600, 'deadmau5-ova bina \"cube v3\" dolazi u Srbiju', 5000, 'Koncert', 'https://cubev3.com/', 'on'),
(27, 'Sabaton koncert', 21, 1591372800, 1591570800, 'Najveci power metal spektakl do sad!', 5000, 'Koncert', 'https://sabaton.net/tour/', 'off'),
(28, 'Romeo i Julija', 22, 1591372800, 1591570800, 'Sekspirovo najpoznatije delo u Narodnom pozoristu', 300, 'Predstava', 'https://narodnopozoriste.rs/', 'off'),
(30, 'Exit Festival', 26, 1591372800, 1591570800, 'Najveci muzicki festival u Evropi! Ove godine nastupace svetski poznati DJ-evi. Hardwell, Martin Garrix, David Guetta i mnogi drugi! Karte u pretprodaji jeftinije su za 20% od obicnih!', 7000, 'Music Festival', 'https://www.exitfest.org/ulaznice/srbija/', 'on'),
(31, 'Izlozba \"Nadezda Petrovic\"', 28, 1581350400, 1581368400, 'Divna izlozba u ime nase poznate slikarke', 0, 'Izlozba', 'http://nadezdapetrovic.rs/', 'on'),
(35, 'Pendulum Masterclass', 31, 1575144000, 1575147600, 'Rob Swire ce prolaziti kroz projekat trake \"Slam\" i objasnice kako je nastala.', 1000, 'Masterclass', 'https://splice.com/', 'off'),
(37, 'Frozen 2', 35, 1575147600, 1575154800, 'Dizni crtani Frozen 2, u svim Cineplexx bioskopima', 350, 'Film', 'https://cineplexx.rs/', 'on'),
(38, 'House zurka', 37, 1576008000, 1576036800, 'Otvorena zurka sa house muzikom na Trgu Republike.', 0, 'Zurka', 'https://www.google.com/url?sa=i&source=images&cd=&cad=rja&uact=8&ved=2ahUKEwjbrcOA94XmAhWREVAKHdkFARcQjRx6BAgBEAQ&url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DYGZ6KZ9TR-M&psig=AOvVaw3RN6v1FpnL0MIpNGJxGeF7&ust=1574790763004904', 'off'),
(39, 'Elektra', 40, 1575059400, 1575064800, '\"Elektra\" - drama Danila Kisa', 300, 'Predstava', 'https://www.narodnopozoriste.rs/elektra', 'on'),
(41, 'Izlozba ulja na platnu', 44, 1576422000, 1576443600, 'Izlozba najboljih radova', 0, 'Izlozba', 'https://www.skc.org.rs/galerija-skc.html', 'off'),
(42, 'Joker', 45, 1575057600, 1575064800, 'Svetski hit \"Joker\" u svim Cineplexx bioskopima', 400, 'Film', 'https://cineplexx.rs/', 'off');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cities`
--
ALTER TABLE `cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `events`
--
ALTER TABLE `events`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cities`
--
ALTER TABLE `cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- AUTO_INCREMENT for table `events`
--
ALTER TABLE `events`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
