-- phpMyAdmin SQL Dump
-- version 4.7.3
-- https://www.phpmyadmin.net/
--
-- Anamakine: localhost:3306
-- Üretim Zamanı: 07 Ara 2017, 16:02:31
-- Sunucu sürümü: 10.2.8-MariaDB-log-cll-lve
-- PHP Sürümü: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Veritabanı: `kitaplrc_ana`
--

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favori_kitaplarim`
--

CREATE TABLE `favori_kitaplarim` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `favori_kitaplarim`
--

INSERT INTO `favori_kitaplarim` (`id`, `kullanici_id`, `kitap_id`) VALUES
(151, 1, 6),
(163, 1, 7),
(162, 3, 10),
(178, 1, 10),
(172, 1, 11),
(174, 1, 13),
(175, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `favori_yazarlarim`
--

CREATE TABLE `favori_yazarlarim` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kategoriler`
--

CREATE TABLE `kategoriler` (
  `id` int(11) NOT NULL,
  `kategori_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `ust_kategori_id` int(11) NOT NULL DEFAULT 0
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kategoriler`
--

INSERT INTO `kategoriler` (`id`, `kategori_adi`, `ust_kategori_id`) VALUES
(1, 'Matematik', 0),
(2, 'Edebiyat', 0),
(3, 'Sosyal', 0),
(4, 'Eğitim', 0),
(5, 'Spor', 0),
(6, 'Yemek', 0);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitaplar`
--

CREATE TABLE `kitaplar` (
  `id` int(11) NOT NULL,
  `kitap_adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(50) COLLATE utf8_turkish_ci NOT NULL DEFAULT 'default.jpg',
  `ozet` text COLLATE utf8_turkish_ci NOT NULL,
  `kitap_link` varchar(110) COLLATE utf8_turkish_ci NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `yayin_evi_id` int(11) NOT NULL,
  `basim_yili` year(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitaplar`
--

INSERT INTO `kitaplar` (`id`, `kitap_adi`, `resim`, `ozet`, `kitap_link`, `yazar_id`, `yayin_evi_id`, `basim_yili`) VALUES
(1, 'denme ', '9.jpg', 'dnenemö dnemem beneme', 'denme', 5, 1, 2000),
(2, 'Php öğrenme', '9.jpg', 'php çok güzel çok aşırı seviyorum', 'kitap_link', 3, 3, 2017),
(3, 'güzellik', '9.jpg', 'falan falan falan falan', 'guzellik', 2, 2, 1990),
(4, 'güzellik', '9.jpg', 'falan falan falan falan', 'guzellik', 2, 2, 1990),
(6, 'Güzel kitap', '9.jpg', 'taaaaa', 'guzel-kitap', 2, 1, 2000),
(7, 'aaa', '9.jpg', 'asdasd', 'aaa', 1, 1, 2017),
(8, 'asdasdas', '9.jpg', 'qasdasdas', 'asdasdas', 4, 1, 1998),
(9, 'qweqwe', '9.jpg', 'rwerwerwe', 'qweqwe', 1, 1, 1999),
(10, 'ASa', 'default.jpg', 'asdasd', 'asa', 5, 3, 1990),
(11, 'ödeal', '11.png', 'belem şey gibin :))', 'odeal', 4, 3, 2017),
(12, 'DOSTLARLA HOŞ SOHBETLER', '12.jpg', 'BIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBI:)ZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZITBIZIT', 'dostlarla-hos-sohbetler', 1, 3, 2017),
(13, 'DOSTLARLA HOŞ SOHBETLER', '13.jpg', 'BİR VAR MIŞ BİR YOK MUŞ GİBİ YAPARIZ?', 'dostlarla-hos-sohbetler', 5, 3, 2017),
(14, 'DOSTLARLA HOŞ SOHBETLER', '14.jpg', '', 'dostlarla-hos-sohbetler', 1, 1, 2017);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_kategorileri`
--

CREATE TABLE `kitap_kategorileri` (
  `id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitap_kategorileri`
--

INSERT INTO `kitap_kategorileri` (`id`, `kitap_id`, `kategori_id`) VALUES
(1, 6, 3),
(26, 7, 5),
(25, 7, 4),
(24, 7, 3),
(23, 7, 2),
(22, 7, 1),
(27, 7, 6),
(71, 8, 2),
(82, 10, 3),
(81, 10, 2),
(80, 10, 1),
(67, 0, 6),
(66, 0, 4),
(64, 9, 3),
(65, 9, 4),
(72, 11, 3),
(73, 12, 3),
(74, 13, 1),
(75, 13, 2),
(76, 13, 3),
(77, 13, 4),
(78, 13, 5),
(79, 13, 6),
(83, 14, 1),
(84, 14, 2),
(85, 14, 3),
(86, 14, 4),
(87, 14, 5),
(88, 14, 6);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kitap_yorumlari`
--

CREATE TABLE `kitap_yorumlari` (
  `id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kitap_yorumlari`
--

INSERT INTO `kitap_yorumlari` (`id`, `kitap_id`, `kullanici_id`, `yorum`, `tarih`) VALUES
(1, 7, 1, 'denneme', '2017-03-10 08:21:45'),
(2, 6, 1, 'bu bir deneme yorumdur', '2017-03-10 12:19:55'),
(3, 6, 1, 'bu bir deneme yorumdur', '2017-03-10 12:28:38'),
(4, 6, 1, 'bu ikinci deneme yorumudur', '2017-03-10 12:28:50'),
(5, 6, 1, 'yorum yorum', '2017-03-10 12:29:40'),
(6, 7, 1, 'yourm youpoesıtğpeıtsdf', '2017-03-11 11:03:19'),
(7, 7, 1, 'asdasdas', '2017-03-11 14:05:32'),
(8, 7, 1, 'ajax deneme', '2017-03-11 14:05:47'),
(9, 7, 1, 'dneme yorum 132', '2017-03-13 13:02:54'),
(10, 7, 1, 'asdsa', '2017-03-13 13:06:31'),
(11, 7, 1, 'asdasd', '2017-03-13 13:15:06'),
(12, 7, 1, 'denemeasda', '2017-03-13 13:19:01'),
(13, 7, 1, 'asdasd', '2017-03-13 13:19:50'),
(14, 7, 1, 'yorum1', '2017-03-13 13:24:31'),
(15, 7, 1, 'asdas', '2017-03-13 13:27:05'),
(16, 7, 1, 'denem yorum4756', '2017-03-13 13:27:56'),
(17, 7, 1, 'denem yorum4756', '2017-03-13 13:28:03'),
(18, 6, 1, 'denme deneme dneme', '2017-03-13 13:28:43'),
(19, 9, 1, 'asdasda', '2017-03-13 13:34:55'),
(20, 9, 1, 'asdasda2', '2017-03-13 13:35:02'),
(21, 9, 1, 'asdasda23', '2017-03-13 13:35:03'),
(22, 9, 1, '1453', '2017-03-13 13:43:24'),
(23, 9, 1, '1453', '2017-03-13 13:43:55'),
(24, 9, 1, 'denenmem dnemem1213212875', '2017-03-13 13:47:17'),
(25, 9, 1, 'qwewqeq1\"1231', '2017-03-13 13:49:54'),
(26, 9, 1, 'sadasaqqwe1231', '2017-03-13 13:53:46'),
(27, 9, 1, 'ASa789+', '2017-03-13 13:54:00'),
(28, 9, 1, '116119484', '2017-03-13 13:54:25'),
(29, 9, 1, 'ASsSASDA', '2017-03-13 13:58:20'),
(30, 9, 1, 'werstdyfdtr', '2017-03-13 13:58:34'),
(31, 9, 1, 'd4a4s5d6a+', '2017-03-13 14:11:21'),
(32, 7, 1, '1,,,,,,,,,,,,,,', '2017-03-17 14:23:26'),
(33, 7, 1, '22*', '2017-03-17 14:23:39'),
(34, 7, 1, 'Deneme telefondan ', '2017-03-27 18:44:55'),
(35, 7, 1, 'İnternetten deneme deneme deneme', '2017-03-27 19:11:37'),
(36, 11, 1, 'belem ne gibi mesela\n', '2017-05-12 13:01:54'),
(37, 11, 1, 'Hacked by anonymous', '2017-05-17 20:14:27'),
(38, 14, 1, 'Harika bi kitap ', '2017-05-17 20:26:25'),
(39, 14, 1, 'kesinlikle harika bir eser mutlaka tavsiye edrim \n', '2017-05-17 20:29:47');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `kullanicilar`
--

CREATE TABLE `kullanicilar` (
  `id` int(11) NOT NULL,
  `kullanici_adi` varchar(50) COLLATE utf8_turkish_ci NOT NULL,
  `sifre` varchar(250) COLLATE utf8_turkish_ci NOT NULL,
  `eposta` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `yetki` int(3) NOT NULL DEFAULT 1
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `kullanicilar`
--

INSERT INTO `kullanicilar` (`id`, `kullanici_adi`, `sifre`, `eposta`, `yetki`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@admin.com', 0),
(2, 'kullanıcı', 'd370f63f5b4fe6af861f8ebc1173ab3a', 'e@q.com', 0),
(3, 'aa', '4124bc0a9335c27f086f24ba207a4912', 'aa@aa.com', 1);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `okuduklarim`
--

CREATE TABLE `okuduklarim` (
  `id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `kitap_id` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `okuduklarim`
--

INSERT INTO `okuduklarim` (`id`, `kullanici_id`, `kitap_id`) VALUES
(71, 3, 10),
(58, 1, 6),
(80, 1, 11),
(81, 1, 13),
(82, 1, 2);

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yayinevleri`
--

CREATE TABLE `yayinevleri` (
  `id` int(11) NOT NULL,
  `adi` varchar(100) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yayinevleri`
--

INSERT INTO `yayinevleri` (`id`, `adi`) VALUES
(1, 'Timaşş'),
(2, 'Can'),
(3, 'Deneme');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazarlar`
--

CREATE TABLE `yazarlar` (
  `id` int(11) NOT NULL,
  `adsoyad` varchar(100) COLLATE utf8_turkish_ci NOT NULL,
  `resim` varchar(100) COLLATE utf8_turkish_ci NOT NULL DEFAULT '0',
  `dogum_yili` date NOT NULL,
  `hayati` text COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazarlar`
--

INSERT INTO `yazarlar` (`id`, `adsoyad`, `resim`, `dogum_yili`, `hayati`) VALUES
(1, 'Musab Şanlı', '0', '1991-01-01', 'dnememe'),
(2, 'Musab Şanlı1', '0', '1991-01-01', 'dnememeee'),
(3, 'Musab Şanlı123', '0', '1992-01-01', 'dnememe123165465'),
(4, 'fatih erdoğan', '0', '1993-01-01', 'denem deneme dnemem'),
(5, 'Mehmet ERDOĞAN', '0', '1991-01-01', 'HAYDAN GELDİM HUYA GİDERİM ...');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yazar_yorumlari`
--

CREATE TABLE `yazar_yorumlari` (
  `id` int(11) NOT NULL,
  `yazar_id` int(11) NOT NULL,
  `kullanici_id` int(11) NOT NULL,
  `yorum` text COLLATE utf8_turkish_ci NOT NULL,
  `tarih` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yazar_yorumlari`
--

INSERT INTO `yazar_yorumlari` (`id`, `yazar_id`, `kullanici_id`, `yorum`, `tarih`) VALUES
(1, 1, 1, 'asdsd', '2017-03-30 13:18:41'),
(2, 1, 1, 'dsfsdfsf', '2017-03-30 13:31:06'),
(3, 1, 1, 'son yorum', '2017-03-30 13:31:43'),
(4, 1, 1, 'deneme deneme\n', '2017-03-30 13:32:46'),
(5, 1, 1, 'asdas', '2017-03-30 13:33:39'),
(6, 3, 1, 'sdfsdf', '2017-04-01 17:54:40'),
(7, 3, 1, 'asdasdasfdas', '2017-04-01 17:54:53');

-- --------------------------------------------------------

--
-- Tablo için tablo yapısı `yetkiler`
--

CREATE TABLE `yetkiler` (
  `yetki_kodu` int(2) NOT NULL,
  `yetki_aciklama` varchar(300) COLLATE utf8_turkish_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_turkish_ci;

--
-- Tablo döküm verisi `yetkiler`
--

INSERT INTO `yetkiler` (`yetki_kodu`, `yetki_aciklama`) VALUES
(0, 'Admin,Yönetici, Bütün Erişimler'),
(1, 'Normal Üye'),
(2, 'Editör');

--
-- Dökümü yapılmış tablolar için indeksler
--

--
-- Tablo için indeksler `favori_kitaplarim`
--
ALTER TABLE `favori_kitaplarim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kategoriler`
--
ALTER TABLE `kategoriler`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitaplar`
--
ALTER TABLE `kitaplar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitap_kategorileri`
--
ALTER TABLE `kitap_kategorileri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kitap_yorumlari`
--
ALTER TABLE `kitap_yorumlari`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `kullanicilar`
--
ALTER TABLE `kullanicilar`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kullanici_adi` (`kullanici_adi`),
  ADD UNIQUE KEY `eposta` (`eposta`);

--
-- Tablo için indeksler `okuduklarim`
--
ALTER TABLE `okuduklarim`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yayinevleri`
--
ALTER TABLE `yayinevleri`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazarlar`
--
ALTER TABLE `yazarlar`
  ADD PRIMARY KEY (`id`);

--
-- Tablo için indeksler `yazar_yorumlari`
--
ALTER TABLE `yazar_yorumlari`
  ADD PRIMARY KEY (`id`);

--
-- Dökümü yapılmış tablolar için AUTO_INCREMENT değeri
--

--
-- Tablo için AUTO_INCREMENT değeri `favori_kitaplarim`
--
ALTER TABLE `favori_kitaplarim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=179;
--
-- Tablo için AUTO_INCREMENT değeri `kategoriler`
--
ALTER TABLE `kategoriler`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- Tablo için AUTO_INCREMENT değeri `kitaplar`
--
ALTER TABLE `kitaplar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- Tablo için AUTO_INCREMENT değeri `kitap_kategorileri`
--
ALTER TABLE `kitap_kategorileri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=89;
--
-- Tablo için AUTO_INCREMENT değeri `kitap_yorumlari`
--
ALTER TABLE `kitap_yorumlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;
--
-- Tablo için AUTO_INCREMENT değeri `kullanicilar`
--
ALTER TABLE `kullanicilar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `okuduklarim`
--
ALTER TABLE `okuduklarim`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;
--
-- Tablo için AUTO_INCREMENT değeri `yayinevleri`
--
ALTER TABLE `yayinevleri`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- Tablo için AUTO_INCREMENT değeri `yazarlar`
--
ALTER TABLE `yazarlar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- Tablo için AUTO_INCREMENT değeri `yazar_yorumlari`
--
ALTER TABLE `yazar_yorumlari`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
