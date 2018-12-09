-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 08, 2018 at 04:32 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `qlsach`
--

-- --------------------------------------------------------

--
-- Table structure for table `chitiethoadon`
--

CREATE TABLE IF NOT EXISTS `chitiethoadon` (
`MaChiTietHoaDon` int(11) NOT NULL,
  `MaSach` int(11) NOT NULL,
  `SoLuongMua` int(11) NOT NULL,
  `MaHoaDon` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

-- --------------------------------------------------------

--
-- Table structure for table `hoadon`
--

CREATE TABLE IF NOT EXISTS `hoadon` (
`MaHoaDon` int(11) NOT NULL,
  `MaKhachHang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `NgayMua` date NOT NULL,
  `DaMua` int(11) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=2 ;

--
-- Dumping data for table `hoadon`
--

INSERT INTO `hoadon` (`MaHoaDon`, `MaKhachHang`, `NgayMua`, `DaMua`) VALUES
(1, 'kh2', '2018-12-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE IF NOT EXISTS `khachhang` (
  `MaKhachHang` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MatKhau` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `HoTen` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Quyen` int(11) NOT NULL,
  `DiaChi` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL,
  `SoDienThoai` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `Email` varchar(200) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`MaKhachHang`, `MatKhau`, `HoTen`, `Quyen`, `DiaChi`, `SoDienThoai`, `Email`) VALUES
('kh1', '123456', 'Phùng Thị Hiền', 1, 'Cửa Lò Nghệ An', '0971336197', 'phunghien0997@gmail.com'),
('kh2', '123456', 'Mai Văn Thuận', 0, 'Huế', '0333333334', 'maithuan@yahoo.com');

-- --------------------------------------------------------

--
-- Table structure for table `loaisach`
--

CREATE TABLE IF NOT EXISTS `loaisach` (
`MaLoaiSach` int(11) NOT NULL,
  `TenLoaiSach` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=16 ;

--
-- Dumping data for table `loaisach`
--

INSERT INTO `loaisach` (`MaLoaiSach`, `TenLoaiSach`) VALUES
(1, 'Bí Quyết cuộc sống'),
(2, 'Chính trị'),
(3, 'Địa lý'),
(4, 'Hoá học'),
(5, 'Khoa học'),
(6, 'Kinh tế'),
(7, 'Lịch Sử'),
(8, 'Ngoại ngữ'),
(9, 'Ôn thi CĐ-ĐH'),
(10, 'Tâm lý'),
(11, 'Tin Học'),
(12, 'Toán Học'),
(13, 'Văn Học'),
(14, 'Vật lý'),
(15, 'Y học');

-- --------------------------------------------------------

--
-- Table structure for table `sach`
--

CREATE TABLE IF NOT EXISTS `sach` (
`MaSach` int(11) NOT NULL,
  `TenSach` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `MaLoaiSach` int(11) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` bigint(20) NOT NULL,
  `NhaXuatBan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `TacGia` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci AUTO_INCREMENT=57 ;

--
-- Dumping data for table `sach`
--

INSERT INTO `sach` (`MaSach`, `TenSach`, `MaLoaiSach`, `SoLuong`, `Gia`, `NhaXuatBan`, `TacGia`, `image`) VALUES
(1, 'Tìm lại chính mình', 1, 50, 42000, 'Nhà xuất bản Thời Đại', 'Marcia Grad', 'image_sach/b11.jpg'),
(2, 'Tìm lại giá trị cuộc sống', 1, 60, 26000, 'Nhà xuất bản Thời Đại', 'Mark V. Hansen, Jack Canfield', 'image_sach/b12.jpg'),
(3, 'Sứ mệnh yêu thương', 1, 70, 40000, 'Nhà xuất bản Ban Mai', 'Roger Cole', 'image_sach/b14.jpg'),
(4, 'Con sẽ làm được', 1, 60, 23000, 'Nhà xuất bản Ban Mai', 'Donna M.Gennett- Ph.D', 'image_sach/b16.jpg'),
(5, 'Đi tìm ý nghĩa cuộc sống', 1, 55, 37000, 'Nhà xuất bản Thời Đại', 'ERNIE CARWILE', 'image_sach/b17.jpg'),
(6, 'Cảm ơn ký ức', 1, 60, 45000, 'Nhà xuất bản Trẻ', 'CeceliAhern', 'image_sach/b18.jpg'),
(7, 'Hạt Giống Tâm Hồn dành cho sinh viên hoc sinh', 1, 50, 22000, 'Nhà xuất bản Yển Nguyệt', 'Jack Canield-Mark Victor Hansen', 'image_sach/b19.jpg'),
(8, 'Bí mật của may mắn', 1, 60, 18000, 'Nhà xuất bản Trẻ', 'Tổng hợp thành phố Hồ Chí Minh', 'image_sach/b2.jpg'),
(9, 'Hạt Giống Tâm Hồn dành riêng cho phụ nữ', 1, 66, 22000, 'Nhà xuất bản Trẻ', 'Jack Canield-Mark Victor Hansen', 'image_sach/b20.jpg'),
(10, 'Hạt Giống Tâm Hồn dành cho tuổi Teen', 1, 67, 29000, 'Nhà xuất bản Tương Dạ', 'Nhiều tác giả First News tổng hợp và thực hiện', 'image_sach/b21.jpg'),
(11, 'Làm thế nào để con chăm học', 1, 76, 26000, 'Nhà xuất bạn Bách Việt', 'Lê Duyên Hải', 'image_sach/b22.jpg'),
(12, 'Những giá trị cuộc sống', 1, 100, 27000, 'Nhà xuất bạn Yên Nguyệt', 'Diane Tillman', 'image_sach/b24.jpg'),
(13, 'Triết học Phương Đông', 2, 43, 23000, 'Nhà xuất bản Chính trị', 'M.T.STEPANLANTS', 'image_sach/c10.jpg'),
(14, 'Mắt bão - Những năm tháng của tôi tại CIA', 2, 78, 144000, 'Nhà xuất bản Đông Phương', 'George Tenet', 'image_sach/c11.jpg'),
(15, '11 Võ Văn Kiệt - Đổi mới, bản lĩnh và sáng tạo', 2, 79, 55000, 'Nhà xuất bản Phương Đông', 'Võ Văn Kiệt', 'image_sach/c12.jpg'),
(16, 'Các trường phái triết học', 2, 56, 110000, 'Nhà xuất bản Chính trị', 'David E Cooper', 'image_sach/c2.jpg'),
(17, 'Chủ nghĩa Mac-Lênin bàn về TN và công tác TN', 2, 70, 14000, 'Nhà xuất bản Tương Dạ', 'Phạm Đình Nghiệp', 'image_sach/c3.jpg'),
(18, 'Nhận diện chủ nghĩa tự do mới', 2, 60, 16000, 'Nhà xuất bản Yên Nguyệt', 'Nguyễn Văn Thanh', 'image_sach/c5.jpg'),
(19, 'Tư tưởng HCM về dựng nước đi đôi với giữ nước', 2, 55, 56000, 'Nhá xuất băn Quân Đội', 'Viện khoa học xã hội nhân văn quân sự', 'image_sach/c6.jpg'),
(20, 'Cuộc chiến ngầm-Bí sử nhà trắng 2006-2008', 2, 100, 130000, 'Nhà xuất bản Tương Dạ', 'Bob Woodward', 'image_sach/c7.jpg'),
(21, 'Tuyển tập danh tác triết học từ plato đến derrida', 2, 66, 185000, 'Nhà xuất bản Kim Đồng', 'Eorrest E.baird', 'image_sach/c8.jpg'),
(22, 'Những chuyên đề triết học', 2, 60, 19000, 'Nhà xuất bản-Khoa học xã hội', 'Nhà xuất bản-Khoa học xã hội', 'image_sach/c9.jpg'),
(23, 'Bản đồ địa lý thế giới', 3, 50, 34000, 'Nhà xuất bản Kim Đồng', 'Phạm Cao Hoàn', 'image_sach/d1.jpg'),
(24, 'Địa lý hành chính Việt Nam', 3, 67, 30000, 'Nhà xuất bản Kim Đồng', 'Nguyễn Huy', 'image_sach/d2.jpg'),
(25, 'Ôn tập để học tốt địa lý 11', 3, 76, 20000, 'Nhà xuất bản Phương Đông', 'Phạm Thị Sen-Nguyễn Việt Hùng', 'image_sach/d3.jpg'),
(26, 'Đổi mới phương pháp dạy học và kiểm tra địa lý 10', 3, 78, 27000, 'Nhà xuất bản Phương Đông', 'Nguyễn Hải Châu', 'image_sach/d4.jpg'),
(27, 'Atlat địa lý Việt Nam', 3, 70, 19000, 'NXB Giáo dục', 'NXB Giáo dục', 'image_sach/d5.jpg'),
(28, 'Địa lý và bản đồ', 3, 100, 3600, 'NXB Giáo dục', 'Hồ Tiến Huân', 'image_sach/d6.jpg'),
(29, 'Địa lý kinh tế-Xã hội châu âu', 3, 50, 25000, 'Nhà xuất bản Kim Đồng', 'Bùi Thị Hải Yến-Phạm Thị Ngọc Diệp', 'image_sach/d7.jpg'),
(30, 'Hoá học đại cương', 4, 60, 36000, 'NXB khkt', 'NXB khkt', 'image_sach/h1.jpg'),
(31, 'Hoá học 12 nâng cao', 4, 70, 24000, 'Nhà xuất bản Giáo dục', 'Nguyễn Đức Nghĩa', 'image_sach/h2.jpg'),
(32, 'Hướng dẫn sử dụng hiệu quả hoá 12 nâng cao', 4, 100, 36000, 'Nhà xuất bản Hồng Hà', 'Lê Thanh Hải', 'image_sach/h3.jpg'),
(33, 'Hoá học 11 nâng cao', 4, 70, 31000, 'Nhà xuất bản giáo dục', 'Nguyễn Minh An', 'image_sach/h4.jpg'),
(34, 'Hoá học 12', 4, 60, 23000, 'Nhà xuất bản Giáo dục', 'Trần Xuân Bắc', 'image_sach/h5.jpg'),
(35, 'Hoá học đại cương 1', 4, 50, 50000, 'Nhà xuất bản Tự Do', 'Nguyễn Đức Vận', 'image_sach/h6.jpg'),
(36, 'Hoá học đại cương 2', 4, 67, 50000, 'Nhà xuất bản Tự Do', 'Nguyễn Đức Vận', 'image_sach/h7.jpg'),
(37, 'Từ điển tường giải kinh tế thị trường xã hội', 6, 50, 165000, 'Nhà xuất bản Bách Việt', 'Rolf H. Hasse-Hermann Schneider-Klaus Weigelt', 'image_sach/k1.jpg'),
(38, 'Nguồn gốc của khủng hoảng tài chính', 6, 60, 55000, 'Nhà xuất bản Bách Việt', 'George Cooper', 'image_sach/k10.jpg'),
(39, 'Hồ Sơ Nội Bộ', 5, 70, 65000, 'Nhà xuất bản Tương Dạ', 'Lưu Bình', 'image_sach/khoa1.jpg'),
(40, 'Sách của bạn tôi', 5, 60, 48000, 'Nhà xuất bản Tương Dạ', 'Anatole France', 'image_sach/khoa11.jpg'),
(41, 'Thắm sắc hoa đào', 5, 70, 42000, 'Nhà xuất bản Thời đại', 'Vương An Ức', 'image_sach/khoa12.jpg'),
(42, 'Vô chiêu vô thức & viết ngắn tự chọn', 5, 56, 45000, 'Nhà xuất bản Trẻ', 'Phan Cung Việt', 'image_sach/khoa13.jpg'),
(43, 'Vượt qua khủng hoảng kinh tế', 6, 55, 39000, 'Nhà xuất bản Phương Đông', 'Nguyễn Sơn', 'image_sach/k11.jpg'),
(44, 'Chiến lược cạnh tranh mới', 6, 78, 50000, 'Nhà xuất bản Kinh tế', 'Tạ Ngọc Ái', 'image_sach/k12.jpg'),
(45, 'Từ điển nhân vật lịch sử Việt Nam', 7, 76, 78000, 'Nhà xuất bản Kim Đồng', 'Đinh Xuân Lâm, Trương Hữu Quýnh', 'image_sach/l1.jpg'),
(46, 'Chiếc áo Bác Hồ', 7, 100, 24000, 'Nhà xuất bản Phương Đông', 'Ngọc Châu', 'image_sach/l10.jpg'),
(47, 'Thời thanh niên của Bác Hồ', 7, 76, 25500, 'Nhà xuất bản Kinh tế', 'Hồng Hà', 'image_sach/l11.jpg'),
(48, 'Bác Hồ với tuổi trẻ năm châu', 7, 67, 20000, 'Nhà xuất bản Kinh tế', 'Trần Đương', 'image_sach/l12.jpg'),
(49, 'Những mẩu chuyện về đạo đức tác phong của Bác Hồ', 7, 70, 67000, 'Nhà xuất bản Thanh Niên', 'NXB Thanh Niên', 'image_sach/l13.jpg'),
(50, 'Oxford', 8, 60, 97000, 'Nhà xuất bản Ngoại ngữ', 'Oxford University Press', 'image_sach/n1.jpg'),
(51, 'Từ điển Anh-Anh-Việt', 8, 50, 36000, 'Nhà xuất bản thống kê', 'Nhà xuất bản thống kê', 'image_sach/n2.jpg'),
(52, 'Oxford Wordpower Dictionary with CD-ROM', 8, 67, 180000, 'Nhà xuất bản Ngoại ngữ', 'Oxford University Press', 'image_sach/n4.jpg'),
(53, 'Tiếng anh 12', 8, 45, 26000, 'Nhà xuất bản giáo dục', 'Nguyễn Tùng', 'image_sach/n7.jpg'),
(56, 'Tư vấn tâm lý căn bản', 10, 60, 23000, 'Nhà xuất bản Trẻ', 'Nguyễn Thị Như Lan', 'image_sach/t2.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
 ADD PRIMARY KEY (`MaChiTietHoaDon`), ADD KEY `MaSach` (`MaSach`,`MaHoaDon`), ADD KEY `MaHoaDon` (`MaHoaDon`);

--
-- Indexes for table `hoadon`
--
ALTER TABLE `hoadon`
 ADD PRIMARY KEY (`MaHoaDon`), ADD KEY `MaKhachHang` (`MaKhachHang`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
 ADD PRIMARY KEY (`MaKhachHang`);

--
-- Indexes for table `loaisach`
--
ALTER TABLE `loaisach`
 ADD PRIMARY KEY (`MaLoaiSach`);

--
-- Indexes for table `sach`
--
ALTER TABLE `sach`
 ADD PRIMARY KEY (`MaSach`), ADD KEY `MaLoaiSach` (`MaLoaiSach`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
MODIFY `MaChiTietHoaDon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `hoadon`
--
ALTER TABLE `hoadon`
MODIFY `MaHoaDon` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `loaisach`
--
ALTER TABLE `loaisach`
MODIFY `MaLoaiSach` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `sach`
--
ALTER TABLE `sach`
MODIFY `MaSach` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=57;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `chitiethoadon`
--
ALTER TABLE `chitiethoadon`
ADD CONSTRAINT `chitiethoadon_ibfk_1` FOREIGN KEY (`MaSach`) REFERENCES `sach` (`MaSach`),
ADD CONSTRAINT `chitiethoadon_ibfk_2` FOREIGN KEY (`MaHoaDon`) REFERENCES `hoadon` (`MaHoaDon`);

--
-- Constraints for table `hoadon`
--
ALTER TABLE `hoadon`
ADD CONSTRAINT `hoadon_ibfk_1` FOREIGN KEY (`MaKhachHang`) REFERENCES `khachhang` (`MaKhachHang`);

--
-- Constraints for table `sach`
--
ALTER TABLE `sach`
ADD CONSTRAINT `sach_ibfk_1` FOREIGN KEY (`MaLoaiSach`) REFERENCES `loaisach` (`MaLoaiSach`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
