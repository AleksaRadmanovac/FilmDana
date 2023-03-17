-- --------------------------------------------------------

--
-- Table structure for table `film`
--

CREATE TABLE `film` (
  `Id` int(11) NOT NULL,
  `Naziv` text NOT NULL,
  `Reditelj` text NOT NULL,
  `DatumDodavanja` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `film`
--

INSERT INTO `film` (`Id`, `Naziv`, `Reditelj`, `DatumDodavanja`) VALUES
(1, 'Rane', 'Srdjan Dragojevic', '2023-03-12'),
(3, 'Taxi Driver', 'Martin Scorcesse', '2023-03-12');

-- --------------------------------------------------------

--
-- Table structure for table `glaszafilm`
--

CREATE TABLE `glaszafilm` (
  `GlasId` int(11) NOT NULL,
  `FilmId` int(11) NOT NULL,
  `Email` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `film`
--
ALTER TABLE `film`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `glaszafilm`
--
ALTER TABLE `glaszafilm`
  ADD PRIMARY KEY (`GlasId`),
  ADD KEY `FilmId` (`FilmId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `film`
--
ALTER TABLE `film`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `glaszafilm`
--
ALTER TABLE `glaszafilm`
  MODIFY `GlasId` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;