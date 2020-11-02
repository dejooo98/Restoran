-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 02, 2020 at 09:55 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rezervacije`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `basket`
--

CREATE TABLE `basket` (
  `id` int(11) NOT NULL,
  `customer_name` varchar(255) NOT NULL,
  `contact_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `total` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_made` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `basket`
--

INSERT INTO `basket` (`id`, `customer_name`, `contact_number`, `address`, `email`, `total`, `status`, `date_made`) VALUES
(1, 'Dejan', '0642454228', 'ulica123', 'dejan98vgd@gmail.com', '1600', 'pending', '2020-11-02 21:53:31');

-- --------------------------------------------------------

--
-- Table structure for table `food`
--

CREATE TABLE `food` (
  `id` int(11) NOT NULL,
  `food_name` varchar(255) NOT NULL,
  `food_category` varchar(255) NOT NULL,
  `food_price` varchar(255) NOT NULL,
  `food_description` text CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `food`
--

INSERT INTO `food` (`id`, `food_name`, `food_category`, `food_price`, `food_description`) VALUES
(3, 'Salata', 'rucak', '450.00', 'Salata je vrsta hrane, koja se obično jede kao prilog uz glavno jelo, a ređe samostalno. Salata se najčešće pravi od sirovog povrća. Može joj se dodati testenina, kuvano meso, sir, majonez, razni prelivi i slično. U pojedine salate dodaje se i voće, npr. jabuke seckane na kockice.'),
(4, 'Pica', 'rucak', '350.00', 'Pica je specijalitet italijanske kuhinje, najčešće napravljen od tankog, okruglog testa na kome se pored paradajz sosa mogu naći razne vrste sira, mesa, povrća, voća, začina i drugih sastojaka prema ukusu.'),
(5, 'Palacinak', 'dorucak', '350.00', 'Палачинка посластица је пржена у уљу или без уља. Палачинке су округле, могу бити дебеле или танке, а праве се од смесе умешене од брашна и млека или воде, и 1—6 јаја. Палачинка је вероватно најстарији облик хлеба и позната је широм планете, спремана на различите начине'),
(6, 'Pica sa gljivama', 'rucak', '350.00', 'Pica je specijalitet italijanske kuhinje, najčešće napravljen od tankog, okruglog testa na kome se pored paradajz sosa mogu naći razne vrste sira, mesa, povrća, voća, začina i drugih sastojaka prema ukusu.'),
(9, 'Ustipci', 'vecera', '800', 'Uštipci su vrsta hrane koja podseća na krofne, ali su po sastavu često sličniji hlebu. Spravljaju se od brašna, kvasca, soli ili šećera, vode i drugih sastojaka. Mogu da budu slatki i slani. Ponekad sadrže i jabuku, bundevu, meso, razne vrste sira, jogurt, kiselo mleko'),
(10, 'Vegetarijanska pica', 'vecera', '600', 'Predjelo, zakuska ili hors d\'œuvre predstavlja hranu koja se služi pre glavnog jela'),
(11, 'Salata sa povrcem', 'dorucak', '800', 'Salata je vrsta hrane, koja se obično jede kao prilog uz glavno jelo, a ređe samostalno. Salata se najčešće pravi od sirovog povrća. Može joj se dodati testenina, kuvano meso, sir, majonez, razni prelivi i slično. U pojedine salate dodaje se i voće, npr. jabuke seckane na kockice');

-- --------------------------------------------------------

--
-- Table structure for table `globals`
--

CREATE TABLE `globals` (
  `global_id` int(11) NOT NULL,
  `global_amt` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `globals`
--

INSERT INTO `globals` (`global_id`, `global_amt`) VALUES
(1, '2');

-- --------------------------------------------------------

--
-- Table structure for table `items`
--

CREATE TABLE `items` (
  `item_id` int(11) NOT NULL,
  `order_id` varchar(100) NOT NULL,
  `food` varchar(100) NOT NULL,
  `qty` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `items`
--

INSERT INTO `items` (`item_id`, `order_id`, `food`, `qty`) VALUES
(1, '1', 'Krem kolac', '4'),
(2, '2', 'Palacinak', '6'),
(3, '3', 'Palacinak', '1'),
(4, '4', 'Pica', '2'),
(5, '5', 'Palacinak', '1'),
(6, '6', 'Palacinak', '2'),
(7, '7', 'Palacinak', '1'),
(8, '8', 'Salata', '1'),
(9, '8', ' Salata sa povrcem', '1'),
(10, '9', 'Palacinak', '5'),
(11, '9', ' Salata', '5'),
(12, '10', 'Krem kolac', '1'),
(13, '11', 'Salata sa povrcem', '3'),
(14, '12', 'Palacinak', '8'),
(15, '13', 'Krem kolac', '2'),
(16, '14', 'Palacinak', '7'),
(17, '15', 'Salata sa povrcem', '1'),
(18, '1', 'Ustipci', '2');

-- --------------------------------------------------------

--
-- Table structure for table `kontaktforma`
--

CREATE TABLE `kontaktforma` (
  `id` int(11) NOT NULL,
  `ime` varchar(30) NOT NULL,
  `prezime` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `adresa` varchar(50) NOT NULL,
  `poruka` text NOT NULL,
  `vrijeme_porudzbine` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kontaktforma`
--

INSERT INTO `kontaktforma` (`id`, `ime`, `prezime`, `email`, `adresa`, `poruka`, `vrijeme_porudzbine`) VALUES
(1, 'Dejan ', 'Markovic', 'dejan98vgd@gmail.com', 'Ulica br 234', 'Zdravo!', '2020-11-02 20:50:15'),
(2, 'Dejan ', 'Markovic', 'dejan98vgd@gmail.com', 'Ulica br 234', 'Zdravo!', '2020-11-02 20:51:13'),
(3, 'Dejan ', 'Markovic', 'dejan98vgd@gmail.com', 'Ulica br 234', 'Zdravo!', '2020-11-02 20:51:50');

-- --------------------------------------------------------

--
-- Table structure for table `reservation`
--

CREATE TABLE `reservation` (
  `reserve_id` int(11) NOT NULL,
  `no_of_guest` varchar(100) CHARACTER SET utf8 NOT NULL,
  `email` varchar(100) CHARACTER SET utf8 NOT NULL,
  `phone` varchar(100) CHARACTER SET utf8 NOT NULL,
  `date_res` varchar(100) CHARACTER SET utf8 NOT NULL,
  `time` varchar(100) CHARACTER SET utf8 NOT NULL,
  `suggestions` varchar(100) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `reservation`
--

INSERT INTO `reservation` (`reserve_id`, `no_of_guest`, `email`, `phone`, `date_res`, `time`, `suggestions`) VALUES
(1, '3', 'dejan@gmail.com', '0642454228', '2020-09-12', '11:35', 'Sve je super!'),
(2, '2', 'dejan98vgd@gmail.com', '0642454228', '2020-09-22', '16:08', 'Sve najbolje!'),
(3, '1', 'dejan98vgd@gmail.com', '0642454228', '2020-09-24', '10:54', 'OK'),
(4, '2', 'dejan98vgd@gmail.com', '0642454228', '2020-09-25', '16:31', 'Nema komentara!'),
(5, '3', 'dejan98vgd@gmail.com', '0642454228', '2222-02-02', '11:11', 'szsz'),
(6, '4', 'dejan98vgd@gmail.com', '0642454228', '3333-03-31', '15:30', 'dasdsad'),
(7, '3', 'dejan98vgd@gmail.com', '0642454228', '2020-10-31', '12:28', 'qdqs'),
(8, '3', 'dejan98vgd@gmail.com', '0642454228', '2020-11-02', '21:52', 'Zdravoo!');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `basket`
--
ALTER TABLE `basket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `food`
--
ALTER TABLE `food`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `globals`
--
ALTER TABLE `globals`
  ADD PRIMARY KEY (`global_id`);

--
-- Indexes for table `items`
--
ALTER TABLE `items`
  ADD PRIMARY KEY (`item_id`);

--
-- Indexes for table `kontaktforma`
--
ALTER TABLE `kontaktforma`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reservation`
--
ALTER TABLE `reservation`
  ADD PRIMARY KEY (`reserve_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `basket`
--
ALTER TABLE `basket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `food`
--
ALTER TABLE `food`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `globals`
--
ALTER TABLE `globals`
  MODIFY `global_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `items`
--
ALTER TABLE `items`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `kontaktforma`
--
ALTER TABLE `kontaktforma`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `reservation`
--
ALTER TABLE `reservation`
  MODIFY `reserve_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
