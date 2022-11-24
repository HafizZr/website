SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";

CREATE TABLE `tbl_user` (
  `id_login` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `nama_pengguna` varchar(255) NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `tbl_user` (`id_login`, `username`, `password`, `nama_pengguna`, `telepon`, `email`, `alamat`) VALUES
(1, 'kenjiro', '202cb962ac59075b964b07152d234b70', 'Fauzan Falah', '089618173609', 'fauzan1892@codekop.com', 'Bekasi'),
(2, 'kenji', '202cb962ac59075b964b07152d234b70', 'M Faiz', '081298669897', 'faiz@gmail.com', 'Bekasi');

ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_login`);


ALTER TABLE `tbl_user`
  MODIFY `id_login` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

