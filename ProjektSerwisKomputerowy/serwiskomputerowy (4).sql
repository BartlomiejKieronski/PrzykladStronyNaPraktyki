-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Czas generowania: 05 Cze 2022, 10:47
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
  `id` int(11) DEFAULT NULL,
  `messageText` varchar(250) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

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
(1, 'Jan', 'Nowak', '123', 'JanK@email.com', '123', 'Administrator'),
(2, 'Jan', 'Kowalski', '321', 'jank@email.com', '321', 'Uzytkownik'),
(3, 'Bartłomiej', 'Kieroński', '321', 'Bk@email.com', '4321', 'Pracownik'),
(4, 'Bartłomiej', 'Kieroński', '321', 'Bk@email.com', '150920ccedc34d24031cdd3711e433', 'Uzytkownik'),
(5, 'Bartłomiej', 'Kowalski', '123321331', 'bkieronski460986601@gmail.com', '4d00d79b6733c9cc066584a02ed034', 'Uzytkownik'),
(6, 'Bartłomiej', 'Kowalski', '123321331', 'bkieronski460986601@gmail.com', '6364d3f0f495b6ab9dcf8d3b5c6e0b', 'Uzytkownik'),
(7, 'Jan', 'Kowalski', '321321', 'Bk@email.com', 'caf1a3dfb505ffed0d024130f58c5c', 'Uzytkownik'),
(8, 'Bartłomiej', 'Kowalski', '321123321', 'JanK@email.com', '202cb962ac59075b964b07152d234b', 'Pracownik');

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

INSERT INTO `urzadzenie` (`idUrzadzenia`, `imieWlasciciela`, `nazwiskoWlasciciela`, `adresEmailWlasiciela`, `numerTelefonuWlasciciela`, `markaUrzadzenia`, `typUrzadzenia`, `modelUrzadzenia`, `Problem`, `Diagnoza`, `Stan`, `DataObecna`, `PrzypisanyPracownik`) VALUES
(1, 'Jan', 'Kowalski', 'jank@email.com', '123', 'Huawei', 'Peryferia', 'P30', '', 'Problem', 'Przyjęto', NULL, 3),
(2, 'Jan', 'Kowalski', 'jank@email.com', '321', 'Huawei', 'Telefon', 'P30', '', NULL, NULL, NULL, NULL),
(3, 'Jan', 'Kowalski', 'jank@email.com', '123', 'Huawei', 'PC', 'P30', '', NULL, 'Oczekuje na potwierdzenie naprawy', NULL, 3),
(4, 'Jan', 'Passek', 'jank@email.com', '321312', 'Apple', 'PC', 'P30', 'dsa', NULL, 'przyjęto', '2022-06-03 10:27:20', NULL),
(5, 'Wojtek', 'Passek', 'Wojtek@emial.com', '432234443', 'Apple', 'Tablet', 'Apple', '', NULL, NULL, NULL, NULL),
(6, 'Wojtek', 'Passek', 'Wojtek@emial.com', '432234443', 'Apple', 'Tablet', 'Apple', '', NULL, NULL, NULL, NULL),
(7, 'Wojtek', 'Passek', 'Wojtek@emial.com', '432234443', 'Apple', 'Tablet', 'Apple', '', NULL, NULL, NULL, NULL),
(8, 'Jan', 'Passek', 'Wojtek@emial.com', '123', 'Huawei', 'Tablet', 'Apple', '', NULL, NULL, NULL, NULL),
(9, 'Jan', 'Passek', 'Wojtek@emial.com', '123', 'Huawei', 'Tablet', 'Apple', 'da', NULL, NULL, NULL, NULL),
(10, 'Jan', 'Passek', 'Wojtek@emial.com', '123', 'Huawei', 'Tablet', 'Apple', 'da', NULL, NULL, NULL, NULL),
(11, 'Jan', 'Passek', 'Wojtek@emial.com', '123', 'Huawei', 'Tablet', 'Apple', 'da', NULL, NULL, NULL, NULL),
(12, 'Jan', 'Kowalski', 'jank@email.com', '123', 'Huawei', 'Tablet', 'Apple', 'stan', NULL, 'Do odbioru', '0000-00-00 00:00:00', 8),
(13, 'Jan', 'Kowalski', 'jank@email.com', '123', 'Apple', 'Laptop', 'P30', 'dsa', 'gdhg', 'W czasie naprawy', '2022-06-03 17:36:43', 3),
(14, 'Jan', 'Kowalski', 'jank@email.com', '123', 'Apple', 'Laptop', 'P30', 'dsas', NULL, 'przyjęto', '2022-06-01 05:37:30', 3),
(15, '32', '12', '213123', '321312', 'Apple', 'Laptop', 'P30', '', 'Test', 'przyjęto', '2022-06-02 09:41:54', 3);

--
-- Indeksy dla zrzutów tabel
--

--
-- Indeksy dla tabeli `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`messageid`),
  ADD KEY `id` (`id`);

--
-- Indeksy dla tabeli `owner`
--
ALTER TABLE `owner`
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
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT dla tabeli `urzadzenie`
--
ALTER TABLE `urzadzenie`
  MODIFY `idUrzadzenia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- Ograniczenia dla zrzutów tabel
--

--
-- Ograniczenia dla tabeli `message`
--
ALTER TABLE `message`
  ADD CONSTRAINT `message_ibfk_1` FOREIGN KEY (`id`) REFERENCES `urzadzenie` (`idUrzadzenia`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
