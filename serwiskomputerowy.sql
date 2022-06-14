-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 12 Cze 2022, 10:51
-- Wersja serwera: 10.4.24-MariaDB
-- Wersja PHP: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Baza danych: `serwiskomputerowy`
--

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `message`
--

CREATE TABLE `message` (
  `messageid` int(11) NOT NULL,
  `idUrzadzenia` int(11) DEFAULT NULL,
  `messageText` varchar(250) DEFAULT NULL,
  `idUzytkownika` int(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `message`
--


-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `owner`
--

CREATE TABLE `owner` (
  `Id` int(11) NOT NULL,
  `Imie` varchar(30) NOT NULL,
  `Nazwisko` varchar(30) NOT NULL,
  `NumerTelefonu` varchar(11) NOT NULL,
  `AdresEmail` varchar(50) NOT NULL,
  `Haslo` varchar(30) NOT NULL,
  `typuzytkownika` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `owner`
--

INSERT INTO `owner` (`Id`, `Imie`, `Nazwisko`, `NumerTelefonu`, `AdresEmail`, `Haslo`, `typuzytkownika`) VALUES
(1, 'Jan', 'Nowak', '000000000', 'JanN@email.com', 'Admin', 'Administrator'),
(2, 'Bartłomiej', 'Kieroński', '111111111', 'BartlomiejK@email.com', 'Pracownik1', 'Pracownik'),
(3, 'Jan', 'Kowalski', '123123123', 'JanK@email.com', 'JanK', 'Uzytkownik');

-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `stats`
--

CREATE TABLE `stats` (
  `Id` int(11) NOT NULL,
  `daty` date DEFAULT current_timestamp(),
  `idUzytkownika` int(11) DEFAULT NULL,
  `numery` int(2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `stats`
--


INSERT INTO `stats` (`Id`, `daty`, `idUzytkownika`, `numery`) VALUES
(1, '2022-04-12','2','20'),
(2, '2022-05-12','2','15'),
(3, '2022-06-12','2','18');
-- --------------------------------------------------------

--
-- Struktura tabeli dla tabeli `urzadzenie`
--

CREATE TABLE `urzadzenie` (
  `idUrzadzenia` int(11) NOT NULL,
  `imieWlasciciela` varchar(30) DEFAULT NULL,
  `nazwiskoWlasciciela` varchar(30) DEFAULT NULL,
  `adresEmailWlasiciela` varchar(30) DEFAULT NULL,
  `numerTelefonuWlasciciela` varchar(30) DEFAULT NULL,
  `markaUrzadzenia` varchar(30) DEFAULT NULL,
  `typUrzadzenia` varchar(30) DEFAULT NULL,
  `modelUrzadzenia` varchar(30) DEFAULT NULL,
  `Problem` tinytext DEFAULT NULL,
  `Diagnoza` varchar(250) DEFAULT NULL,
  `Stan` varchar(100) DEFAULT NULL,
  `DataObecna` datetime DEFAULT NULL,
  `PrzypisanyPracownik` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Zrzut danych tabeli `urzadzenie`
--

INSERT INTO `urzadzenie` (`idUrzadzenia`,`imieWlasciciela` ,`nazwiskoWlasciciela`,`adresEmailWlasiciela`,`numerTelefonuWlasciciela`,`markaUrzadzenia`,`typUrzadzenia`,`modelUrzadzenia`, `Problem` ,`Diagnoza` ,`Stan`,`DataObecna`,`PrzypisanyPracownik`) VALUES
(1, 'Jan','Kowalski','JanK@email','123123123','Acer','Laptop','Aspire 15','Problem z klawiaturą','Wymiana klawiatury','Oczekuje na potwierdzenie naprawy','2022-06-12 04:28:25','2');


--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `id` (`idUrzadzenia`);

--
-- Indeksy dla tabeli `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `stats`
--
ALTER TABLE `stats`
  ADD PRIMARY KEY (`Id`);

--
-- Indeksy dla tabeli `urzadzenie`
--
ALTER TABLE `urzadzenie`
  ADD PRIMARY KEY (`idUrzadzenia`);

--
-- AUTO_INCREMENT dla zrzuconych tabel
--

--
-- AUTO_INCREMENT dla tabeli `message`
--
ALTER TABLE `message`
  MODIFY `messageid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `owner`
--
ALTER TABLE `owner`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `stats`
--
ALTER TABLE `stats`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT dla tabeli `urzadzenie`
--
ALTER TABLE `urzadzenie`
  MODIFY `idUrzadzenia` int(11) NOT NULL AUTO_INCREMENT;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`idUrzadzenia`) REFERENCES `urzadzenie` (`idUrzadzenia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
