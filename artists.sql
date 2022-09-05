

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `artists`
--

-- --------------------------------------------------------

--
-- Table structure for table `izvodjac`
--

CREATE TABLE `izvodjac` (
  `idIzvodjaca` int(11) NOT NULL,
  `naziv` varchar(255) NOT NULL,
  `muzika` varchar(255) NOT NULL,
  `album` varchar(255) NOT NULL,
  `brojGremija` int(11) NOT NULL,
  `idZanra` int(11) NOT NULL,
  `idKategorije` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `izvodjac`
--

INSERT INTO `izvodjac` (`idIzvodjaca`, `naziv`, `muzika`, `album`, `brojGremija`, `idZanra`, `idKategorije`) VALUES
(12, 'Paparazzi', 'Lady Gaga', 'Alehandro', 6, 8, 1);

-- --------------------------------------------------------

--
-- Table structure for table `kategorija`
--

CREATE TABLE `kategorija` (
  `idKategorije` int(11) NOT NULL,
  `nazivKategorije` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategorija`
--

INSERT INTO `kategorija` (`idKategorije`, `nazivKategorije`) VALUES
(1, 'Record Of The Year'),
(2, 'Album Of The Year'),
(3, 'Song Of The Year'),
(4, 'Best New Artist');

-- --------------------------------------------------------

--
-- Table structure for table `zanr`
--

CREATE TABLE `zanr` (
  `idZanra` int(11) NOT NULL,
  `nazivZanra` varchar(255) NOT NULL,
  `nazivKategorije` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `zanr`
--

INSERT INTO `zanr` (`idZanra`, `nazivZanra`, `nazivKategorije`) VALUES
(1, 'POP', 'SongOfTheYear'),
(2, 'R&B', 'SongOfTheYear'),
(3, 'ROCK', 'SongOfTheYear'),
(4, 'DANCE', 'SongOfTheYear'),
(5, 'COUNTRY', 'SongOfTheYear'),
(6, 'BLUES', 'SongOfTheYear'),
(7, 'RAP', 'SongOfTheYear'),
(8, 'DISCO', 'SongOfTheYear'),
(9, 'FILM&TV', 'SongOfTheYear');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `izvodjac`
--
ALTER TABLE `izvodjac`
  ADD PRIMARY KEY (`idIzvodjaca`),
  ADD UNIQUE KEY `idIzvodajca` (`idIzvodjaca`);

--
-- Indexes for table `kategorija`
--
ALTER TABLE `kategorija`
  ADD PRIMARY KEY (`idKategorije`);

--
-- Indexes for table `zanr`
--
ALTER TABLE `zanr`
  ADD PRIMARY KEY (`idZanra`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `izvodjac`
--
ALTER TABLE `izvodjac`
  MODIFY `idIzvodjaca` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `kategorija`
--
ALTER TABLE `kategorija`
  MODIFY `idKategorije` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `zanr`
--
ALTER TABLE `zanr`
  MODIFY `idZanra` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
