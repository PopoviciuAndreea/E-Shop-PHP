-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 22, 2023 at 09:39 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `magazinelectronice`
--

-- --------------------------------------------------------

--
-- Table structure for table `clienti`
--

CREATE TABLE `clienti` (
  `client_id` int(11) NOT NULL,
  `client_username` varchar(100) NOT NULL,
  `client_password` varchar(50) NOT NULL,
  `client_email` varchar(50) NOT NULL,
  `client_str` varchar(50) NOT NULL,
  `client_oras` varchar(30) NOT NULL,
  `client_tara` varchar(30) NOT NULL,
  `client_codpost` int(10) NOT NULL,
  `client_nrcard` varchar(20) NOT NULL,
  `client_tipcard` varchar(20) NOT NULL,
  `client_dataexp` date NOT NULL,
  `acceptareemail` varchar(2) NOT NULL,
  `client_nume` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clienti`
--

INSERT INTO `clienti` (`client_id`, `client_username`, `client_password`, `client_email`, `client_str`, `client_oras`, `client_tara`, `client_codpost`, `client_nrcard`, `client_tipcard`, `client_dataexp`, `acceptareemail`, `client_nume`) VALUES
(1, 'admin', '$2y$10$mnpqCwRs4IAqkZHFse9MS.u0l2YJVekFmEDtiKbHNoU', 'admin@admin.com', 'Andrei Saguna', 'Sighisoara', 'Romania', 505000, '1234567891234567', 'VISA', '2022-01-11', 'DA', 'ADMIN'),
(2, 'andreea', '$2y$10$c4.hZgV.dI7TO1TfccOJ4e0mrD3PxIgE.btDHE7laDc', 'andreea@yahoo.com', 'Mircea Eliade', 'Cluj-Napoca', 'Romania', 525200, '1234123456785678', 'VISA', '2023-08-15', 'DA', 'Popoviciu Andreea'),
(3, 'maria', '$2y$10$QEoKvZzTZ9M6X4aqlJBRf.I387YQ.u.fFzxAQD495zq', 'maria@gmail.com', 'Libertati, nr.12', 'Tg. Mures', 'Romania', 515100, '1234123411112222', 'VISA', '2023-01-05', 'DA', 'Popescu Maria'),
(4, 'flavius', '$2y$10$qYLazq/5a4lsRajsB6LLYuQYlCq5N9wQl1kTiH1Lygw', 'flavius@email.com', 'Constantin Prezan, nr. 12', 'Cluj-Napoca', 'Romania', 535300, '1234123411113333', 'VISA', '2023-02-10', 'DA', 'Aldea Flavius'),
(5, 'bogdan', '$2y$10$9QnsnnBo2jJKubLloEeouuxjmk2gr4IYkeA/CGvC3jd', 'bogdan@gmail.com', 'Alexandru Vaida Voevod, nr.12', 'Cluj-Napoca', 'Romania', 535300, '1234123455554444', 'VISA', '2022-12-01', 'DA', 'Ionescu Bogdan'),
(6, 'claudia', '$2y$10$TercFFrgiVDkBY4sBk8I2eLpfKcpTD89J20Zcds2DXM', 'claudia@yahoo.com', 'Zoriilor, nr.15', 'Sighisoara', 'Romania', 515100, '1234123455551111', 'VISA', '2022-01-10', 'DA', 'Stan Claudia'),
(7, 'robert', '$2y$10$JPDe7zoiT/irlzFw8JsHG.77B0MTyb8OzqrBMTLFSp7', 'robert@yahoo.com', 'Aurel Mosora, nr. 15', 'Tg. Mures', 'Romania', 525200, '1111222212341234', 'VISA', '2023-05-01', 'DA', 'Hintea Robert'),
(8, 'ioana', '$2y$10$jP0oHMbeOmWYAHHDJhTRAOySkTF4rPyfEydznFigGf3', 'ioana@yahoo.com', 'Mircea Eliade, nr. 20', 'Brasov', 'Romania', 555500, '1111222233331234', 'VISA', '2023-05-10', 'DA', 'Nistor Ioana'),
(9, 'andrei', '$2y$10$5PNE.9tKwWtIopx2CyBUpez/W/MLgB.SvSHV5Gag.9q', 'andrei@yahoo.com', 'Nicolae Iorga, nr. 10', 'Sighisoara', 'Romania', 505000, '5678567812341234', 'VISA', '2023-04-10', 'DA', 'Munteanu Andrei'),
(10, 'patricia', '$2y$10$171/YbWhV1r7HjIwRZ14sOqxOREl9haMH60/4GInFhT', 'patricia@yahoo.com', 'Libertati, nr. 12', 'Tg. Mures', 'Romania', 515100, '1111222244441234', 'VISA', '2023-05-10', 'DA', 'Szasz Patricia'),
(11, 'Iulia', '$2y$10$JvyGtOTCnsXxGU0T/5tyr.tIfdaYfk62/OYFI0SGYaC', 'iulia@yahoo.com', 'Strana nr.1', 'Cluj Napoca', 'Romania', 515100, '1234543212346789', 'VISA', '2024-01-05', 'DA', 'Iulia Maria');

-- --------------------------------------------------------

--
-- Table structure for table `cos`
--

CREATE TABLE `cos` (
  `cos_id` int(11) NOT NULL,
  `cos_clientID` int(11) NOT NULL,
  `cos_produsID` int(11) NOT NULL,
  `cos_cantitate` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `produse`
--

CREATE TABLE `produse` (
  `produs_id` int(11) NOT NULL,
  `produs_nume` varchar(225) NOT NULL,
  `produs_cod` varchar(10) NOT NULL,
  `produs_pret` decimal(10,2) NOT NULL,
  `produs_img` varchar(100) NOT NULL,
  `produs_categorie` varchar(50) NOT NULL,
  `produs_descriere` varchar(225) NOT NULL,
  `produs_desccompl` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `produse`
--

INSERT INTO `produse` (`produs_id`, `produs_nume`, `produs_cod`, `produs_pret`, `produs_img`, `produs_categorie`, `produs_descriere`, `produs_desccompl`) VALUES
(1, 'Laptop ASUS A550V', '12AL12345', '3200.00', 'produse/laptopASUS.jpg', 'Laptop', 'procesor Intel® Core™ i5-6300HQ, 4GB, 1TB ', 'procesor Intel® Core™ i5-6300HQ pana la 3.20 GHz, Skylake, 15.6\", 4GB, 1TB, DVD-RW, nVIDIA® GeForce® GTX 950M 2GB, Free DOS, Blue Gray'),
(2, 'Rucsac Laptop Huawei Matebook', 'RC23LHM123', '149.99', 'produse/rucsacLaptop.png', 'Accesori Laptop', 'Rucsac Laptop 15.6&quot;, Gri', 'Rucsac Laptop Huawei Matebook, 15.6&quot;, Gri, elegant si portabil '),
(3, 'Mouse bluetooth Huawei', 'M123BH123', '164.99', 'produse/MouseBluetooth.png', 'Accesori Laptop', 'Mouse bluetooth Huawei, Olive Green', 'Mouse bluetooth Huawei, Olive Green, Tip standard, Butoane/rotite 4, Tehnologie fara fir, Senzor TOG IR sensor, Dimensiune 107.56 x 60.93 x 29.8mm, Greutate 65'),
(4, 'Mouse Microsoft Modern Wireless', 'MM122MM123', '162.49', 'produse/MouseMicrosoft.png', 'Accesori Laptop', 'Mouse Microsoft Modern, Wireless, Negru', 'Mouse Microsoft Modern, Wireless, Negru, Tip Standard, Butoane/rotite 3+scroll, Tehnologie fara fir, Incarcator 2 baterii AAA, Senzor BlueTrack, Dimensiune(mm) 60.3 x 107.2 x 25.8mm'),
(5, 'Tastatura wireless Microsoft Designer Compact', 'TM123WDC12', '300.00', 'produse/TastaturaMicrosoft.jpg', 'Accesori Laptop', 'Tastatura wireless Microsoft, Bluetooth 5.0, Negru', 'Tastatura wireless Microsoft, Bluetooth 5.0, Negru, Tip standard, Tehnologie wireless, Greutate 0.288 (g), Dimensiune 284.07 x 110.77 x 9.05 mm'),
(6, 'Laptop ASUS Notebook P1512CEA', 'LAN1501234', '2500.00', 'produse/laptopASUS2.jpg', 'Laptop', 'Intel i5-1135G7, 8 GB RAM, 512 GB SSD', 'Laptop ASUS Notebook P1512CEA, 15.6 inch, Intel i5-1135G7 (4 C / 8 T, 3 GHz - 4.2GHz, 8 MB cache, 28 W), 8 GB RAM, 512 GB SSD, Iris Xe Graphics, Free DOS'),
(7, 'Laptop ASUS 15 X1500EA-BQ2298', 'LA15X12345', '2000.00', 'produse/LaptopASUS3.jpg', 'Laptop', 'Intel Core i3-1115G4, Full HD, 8GB, SSD 256GB', 'Laptop ASUS VivoBook 15 X1500EA-BQ2298, Intel Core i3-1115G4 pana la 4.1GHz, 15.6&quot; Full HD, 8GB, SSD 256GB, Intel UHD Graphics, Free DOS, negru'),
(8, 'Laptop Gaming ASUS TUF A15 FA506IHRB-HN089', 'LAGT1234A', '3599.00', 'produse/laptopASUS4.jpg', 'Laptop', 'AMD Ryzen 5 4600H, Full HD, 8GB, SSD 1TB', 'Laptop Gaming ASUS TUF A15 FA506IHRB-HN089, AMD Ryzen 5 4600H pana la 4.0GHz, 15.6&quot; Full HD, 8GB, SSD 1TB, NVIDIA GeForce GTX 1650 4GB, Free DOS, negru'),
(9, 'Tastatura Wireless LOGITECH Touch K400 Plus', 'TWLT123456', '192.50', 'produse/tastatura.jpg', 'Accesori Laptop', 'USB, Layout US INT, negru', 'Tastatura Wireless LOGITECH Touch K400 Plus, USB, Layout US INT, negru, 0.38 kg'),
(10, 'Laptop HUAWEI MateBook D16', 'LHM123D161', '5890.00', 'produse/laptopHUAWEI.jpeg', 'Laptop', 'Intel&reg; Core&trade; i7-12700H, 16GB, SSD 512GB', 'Laptop HUAWEI MateBook D16, Intel&reg; Core&trade; i7-12700H pana la 4.70 GHz pana la 4.7GHz, 16&quot; Full HD 16:10, 16GB, SSD 512GB, Intel Iris&reg; Xe, NFC,Windows 11 Home, Space Gray');

-- --------------------------------------------------------

--
-- Table structure for table `utilizatori`
--

CREATE TABLE `utilizatori` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `utilizatori`
--

INSERT INTO `utilizatori` (`id`, `username`, `password`, `email`) VALUES
(1, 'admin', '$2y$10$Ssi.xmITSDvAqyumqBmho.B5TSy58hnx0KraMlmuBsLZ28Wkyvxbq', 'admin@admin.com'),
(2, 'andreea', '$2y$10$VmTUkzWtcw8zSULGUrH/8OAHrnB82uBBd9l.ei7UWeJSd8KJ8uZFG', 'andreea@yahoo.com'),
(3, 'maria', '$2y$10$4S3L1umR1FJWwoQ710UVeOtsu/F04s7ymyv18Dmd3uTPQerfb83ry', 'maria@gmail.com'),
(4, 'flavius', '$2y$10$9kvEa6gOWxnhpN.MxjEa8urEWExOSYX/dikyk3yfQAgBAbhQgUsLK', 'flavius@email.com'),
(5, 'bogdan', '$2y$10$ghdPCjw9JCZ/quUxrwl3UOLSBcbWVrCxy3VQDYIdxm9pd/geAl1l2', 'bogdan@gmail.com'),
(6, 'claudia', '$2y$10$kPaLzFIC/IsF5YfXLtLG6.CiP7vGp8TyPvoIhg1oLQ7ycjibLekiC', 'claudia@yahoo.com'),
(7, 'robert', '$2y$10$D20igMUgXTqGH/dPRnANBenF8cZ7i/Cswi1synUhKjjOK8rZY0gHO', 'robert@yahoo.com'),
(8, 'ioana', '$2y$10$vLRUyI4yG.8AW71N9bBPPOCwtZ3Ql0mwm1xMLyHjF27GqsMhY7mca', 'ioana@yahoo.com'),
(9, 'andrei', '$2y$10$.MfRz2FgUc04owvlNK3jcu4omvgEcGmeWsUL2HgSTAcL1XQ/DmiU2', 'andrei@yahoo.com'),
(10, 'patricia', '$2y$10$XtsHuvYuGzMrOHVhccQd7OKk7v1V5SdMEMq5LPX4DmrkMhqDvjcwm', 'patricia@yahoo.com'),
(30, 'Iulia', '$2y$10$mfalMhD0cEqj6BDrCEd7geWxXlN6ELhSr517Apc2afgT1G5VkX86C', 'iulia@yahoo.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `clienti`
--
ALTER TABLE `clienti`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `cos`
--
ALTER TABLE `cos`
  ADD PRIMARY KEY (`cos_id`),
  ADD KEY `FOREIGN_KEY_CLIENTID` (`cos_clientID`),
  ADD KEY `FOREIGN_KEY_PRODUSID` (`cos_produsID`);

--
-- Indexes for table `produse`
--
ALTER TABLE `produse`
  ADD PRIMARY KEY (`produs_id`);

--
-- Indexes for table `utilizatori`
--
ALTER TABLE `utilizatori`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `clienti`
--
ALTER TABLE `clienti`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `cos`
--
ALTER TABLE `cos`
  MODIFY `cos_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `produse`
--
ALTER TABLE `produse`
  MODIFY `produs_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `utilizatori`
--
ALTER TABLE `utilizatori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cos`
--
ALTER TABLE `cos`
  ADD CONSTRAINT `FOREIGN_KEY_CLIENTID` FOREIGN KEY (`cos_clientID`) REFERENCES `clienti` (`client_id`),
  ADD CONSTRAINT `FOREIGN_KEY_PRODUSID` FOREIGN KEY (`cos_produsID`) REFERENCES `produse` (`produs_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
