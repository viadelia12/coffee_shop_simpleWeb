-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Des 2021 pada 14.38
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `username` varchar(35) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`username`, `password`) VALUES
('admin', 'admin123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `best_seller`
--

CREATE TABLE `best_seller` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kategori` varchar(35) DEFAULT NULL,
  `gambar` varchar(225) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `best_seller`
--

INSERT INTO `best_seller` (`id_menu`, `nama`, `harga`, `kategori`, `gambar`) VALUES
(1, 'The Melting Pot', 28000, 'signature', 'The-Melting-Pot.jpg'),
(2, 'Hot Nutella', 27000, 'non-coffee', 'Nuetella.jpg'),
(3, 'Smoothie Paradise Passion', 27000, 'non-coffee', 'Smoothie-Paradise-Passion.jpg'),
(4, 'Queens', 25000, 'signature', 'Queens.jpg'),
(5, 'Iced Caramel Macchiato', 30000, 'espresso ice', 'Ice-Caramel-Macchiato.jpg'),
(6, 'Chocolate Frappe', 26000, 'frappes', 'Chocolate.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id` int(100) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `byk_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id`, `id_menu`, `byk_menu`) VALUES
(11, 1, 2, 1),
(12, 1, 12, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `discount`
--

CREATE TABLE `discount` (
  `discount` varchar(30) NOT NULL,
  `potongan` int(11) DEFAULT NULL,
  `min_order` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `discount`
--

INSERT INTO `discount` (`discount`, `potongan`, `min_order`) VALUES
('BIRTHDAY6', 6000, 21000),
('INDEPENDENCE17', 17000, 40000),
('RAMADHAN20', 20000, 45000),
('XMAS15', 15000, 35000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama` varchar(40) DEFAULT NULL,
  `harga` int(11) DEFAULT NULL,
  `kategori` varchar(35) DEFAULT NULL,
  `gambar` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama`, `harga`, `kategori`, `gambar`) VALUES
(1, 'Americano', 15000, 'Espresso Hot', 'Americano.jpg'),
(2, 'Cappuccino', 20000, 'Espresso Hot', 'Cappuccino.jpg'),
(3, 'Caramel Macchiato', 28000, 'Espresso Hot', 'Caramel-Macchiato.jpg'),
(4, 'Cortado', 22000, 'Espresso Hot', 'Cortado.jpg'),
(5, 'Espresso Macchiato', 18000, 'Espresso Hot', 'Espresso-Macchiato.jpg'),
(6, 'Espresso', 13000, 'Espresso Hot', 'Espresso.jpg'),
(7, 'Flat White', 20000, 'Espresso Hot', 'Flat-White.jpg'),
(8, 'Latte', 20000, 'Espresso Hot', 'Latte.jpg'),
(9, 'Mocha Dark & White', 22000, 'Espresso Hot', 'Mocha-DarkWhite.jpg'),
(10, 'Spanish Latte', 21000, 'Espresso Hot', 'Spanish-Latte.jpg'),
(11, 'Ice Americano', 15000, 'espresso ice', 'Ice-Americano.jpg'),
(12, 'Caramel Macchiato', 30000, 'espresso ice', 'Ice-Caramel-Macchiato.jpg'),
(13, 'Latte', 22000, 'espresso ice', 'Ice-Latte.jpg'),
(14, 'Mocha Dark & White', 25000, 'espresso ice', 'Ice-Mocha-DarkWhite.jpg'),
(15, 'Spanish Latte', 23000, 'espresso ice', 'Ice-Spanish-Latte.jpg'),
(16, 'The Melting Pot', 28000, 'signature', 'The-Melting-Pot.jpg'),
(17, 'Queens', 25000, 'signature', 'Queens.jpg'),
(18, 'Manhattan Special', 30000, 'signature', 'Manhattan-Special.jpg'),
(19, 'Greates of All Time', 27000, 'signature', 'Greates-of-All-Time.jpg'),
(20, 'Caramel Frappe', 25000, 'frappes', 'Caramel.jpg'),
(21, 'Chocolate Frappe', 26000, 'frappes', 'Chocolate.jpg'),
(22, 'Coffee Frappe', 25000, 'frappes', 'Coffee.jpg'),
(23, 'Mocha Frappe', 26000, 'frappes', 'Mocha.jpg'),
(24, 'Toffee Frappe', 25000, 'frappes', 'Toffee.jpg'),
(25, 'Vanilla Frappe', 25000, 'frappes', 'Vanilla.jpg'),
(26, 'Hot Nutella', 27000, 'non-coffee', 'Nuetella.jpg'),
(27, 'Orange Juice', 25000, 'non-coffee', 'Orange-Juice.jpg'),
(28, 'Shaken Iced Tea', 24000, 'non-coffee', 'Shaken-Iced-Tea.jpg'),
(29, 'Smoothie Berry Blast', 25000, 'non-coffee', 'Smoothie-Berry-Blast.jpg'),
(30, 'Smoothie Paradise Passion', 27000, 'non-coffee', 'Smoothie-Paradise-Passion.jpg'),
(31, 'Stash Tea', 22000, 'non-coffee', 'Stash-Tea.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(100) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'afrien', 'afrien123'),
(5, 'novia', 'novia123'),
(6, 'daniel', 'daniel123');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `best_seller`
--
ALTER TABLE `best_seller`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `iduser` (`id`),
  ADD KEY `idmenu` (`id_menu`);

--
-- Indeks untuk tabel `discount`
--
ALTER TABLE `discount`
  ADD PRIMARY KEY (`discount`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `best_seller`
--
ALTER TABLE `best_seller`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
