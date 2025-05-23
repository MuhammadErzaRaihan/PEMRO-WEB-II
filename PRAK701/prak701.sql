-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Bulan Mei 2025 pada 03.16
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `prak701`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `penulis` varchar(255) NOT NULL,
  `penerbit` varchar(255) NOT NULL,
  `tahun_terbit` year(4) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `penulis`, `penerbit`, `tahun_terbit`) VALUES
(1, 'The Midnight Library', 'Matt Haig', 'Canongate Books', '2020'),
(2, 'It Ends with Us', 'Colleen Hoover', 'Atria Books', '2016'),
(3, 'It Starts with Us', 'Colleen Hoover', 'Atria Books', '2022'),
(4, 'Tomorrow, and Tomorrow, and Tomorrow', 'Gabrielle Zevin', 'Knopf Publishing Group', '2022'),
(5, 'The Great Gatsby', 'F Scott Fitzgerald', 'Charles Scribners Sons', '1925'),
(6, 'Harry Potter and the Philosopher\'s Stone', 'J.K. Rowling', 'Bloomsbury', '1997'),
(7, 'A Court of Silver Flames', 'Sarah J. Maas', 'Bloomsbury Publishing', '2021'),
(8, 'The Kite Runner', 'Khaled Hosseini', 'Riverhead Books', '2003'),
(9, 'One Hundred Years of Solitude', 'Gabriel Garcia Marquez', 'Editorial Sudamericana', '1967'),
(10, 'Rapijali 1: Mencari', 'Dee Lestari', 'Bentang Pustaka', '2020'),
(11, 'Filosofi Teras', 'Henry Manampiring', 'Penerbit Buku Kompas', '2023');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2025-05-18-084002', 'App\\Database\\Migrations\\Users', 'default', 'App', 1747557656, 1),
(2, '2025-05-18-084032', 'App\\Database\\Migrations\\Buku', 'default', 'App', 1747557656, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Raudatul', 'rdtlsh27@gmail.com', '$2y$10$d4HRhCMMIIr4zPbrNPEV2.XZ98c5Fxvop2fZxgoMPWhFnYGnrCLeS'),
(2, 'Grace', 'grace@gmail.com', '$2y$10$MHM.vn3uvvN1tR8MOaDkMuL5G8EqFm09fTYEnin4RWFCcJgDQvTri'),
(3, 'Dessy', 'dessy@gmail.com', '$2y$10$BNl8pno2Z9P3icFr9tSLq.gDPE8wcSHF3QCrb8fjPk2KHaQLnz/j6'),
(4, 'Bila', 'bila@gmail.com', '$2y$10$0ZrbuGtVnk/R3iyDiGUXROIJdH/wHdG0CbkkI1iH94XawRvk3.jxi'),
(5, 'rrdtlsh', 'rrdtlsh@gmail.com', '$2y$10$rWNPiB2ZYVGasubGb0oZ.ufl1tIwM2Aj0v.QOB0lPsJcZW7Rf59w6'),
(6, 'adisyhptr__', 'adi@gmail.com', '$2y$10$5BZiSw4WggBmDfw2RSZzwuMH5tatzCGr942NFUVGL7FdGrHE5stn6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
