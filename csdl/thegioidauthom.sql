-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: sql301.epizy.com
-- Thời gian đã tạo: Th6 20, 2020 lúc 10:30 AM
-- Phiên bản máy phục vụ: 5.6.47-87.0
-- Phiên bản PHP: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `epiz_26051777_thegioidauthom`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietanh`
--

CREATE TABLE `tbl_chitietanh` (
  `IDAnh` int(11) NOT NULL,
  `MaSanPham` int(11) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietanh`
--

INSERT INTO `tbl_chitietanh` (`IDAnh`, `MaSanPham`, `HinhAnh`) VALUES
(3, 7, 'cc880c2fb7.jpg'),
(4, 11, '6360eb950a.jpg'),
(5, 12, '8fbcb1a3c4.jpg'),
(6, 13, '2353333916.png'),
(7, 13, '8440af91e2.jpg'),
(8, 14, '11bae3c114.jpg'),
(9, 15, 'c76dadc758.jpg'),
(10, 17, 'eb7a985596.jpg'),
(11, 18, '6ed40dd5c8.jpg'),
(12, 19, '1529c7c17e.jpg'),
(13, 20, '92108d2e6d.jpg'),
(14, 20, '04a3dea317.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_chitietdonhang`
--

CREATE TABLE `tbl_chitietdonhang` (
  `IDDonHang` int(11) NOT NULL,
  `IDKhachHang` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `TongTien` int(11) NOT NULL,
  `Ten` varchar(100) NOT NULL,
  `Ho` varchar(100) NOT NULL,
  `TenCongTy` varchar(255) NOT NULL,
  `Tinh` varchar(100) NOT NULL,
  `MaBuuDien` varchar(11) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `SoDienThoai` varchar(11) NOT NULL,
  `DiaChi` text NOT NULL,
  `GhiChu` text NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1',
  `NgayKhoiTao` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_chitietdonhang`
--

INSERT INTO `tbl_chitietdonhang` (`IDDonHang`, `IDKhachHang`, `IDSanPham`, `sID`, `TenSanPham`, `TongTien`, `Ten`, `Ho`, `TenCongTy`, `Tinh`, `MaBuuDien`, `Email`, `SoDienThoai`, `DiaChi`, `GhiChu`, `HinhAnh`, `Status`, `NgayKhoiTao`) VALUES
(75, 1, 13, '01ja2ahjjgf361edbtfu9au83f', 'Lacoste Live Pour Homme EDT', 930000, 'Linh', 'Huỳnh', '', 'Hồ Chí Minh', '70000', 'linhhuynh.iuh@gmail.com', '0329332354', '93/13/41 Nguyễn Du, Phường 7, Gò Vấp', '', '363d5e6cd4.jpg', 3, '2020-06-20 07:45:36'),
(76, 3, 13, 'feovee9ju471itug8eaqs6p5aj', 'Lacoste Live Pour Homme EDT', 930000, 'Linh', 'Huỳnh', '', 'Hồ Chí Minh', '70000', 'linhhuynh.iuh@gmail.com', '0329332354', '93/13/41 Nguyễn Du, Phường 7, Gò Vấp', 'Giao hàng càng nhanh càng tốt', '363d5e6cd4.jpg', 2, '2020-06-20 07:02:09'),
(77, 3, 14, 'feovee9ju471itug8eaqs6p5aj', 'Chanel Bleu De Chanel Eau De Parfum', 4549997, 'Linh', 'Huỳnh', '', 'Hồ Chí Minh', '70000', 'linhhuynh.iuh@gmail.com', '0329332354', '93/13/41 Nguyễn Du, Phường 7, Gò Vấp', 'Giao hàng càng nhanh càng tốt', '5ecc4fd1da.jpg', 3, '2020-06-20 07:45:44'),
(81, 3, 20, 'e332f7f990f147a3de06b95a2f213538', 'Clive Christian 1872', 5989998, 'Linh', 'Huỳnh', '', 'Hồ Chí Minh', '70000', 'huynhku68@gmail.com', '0394999508', 'hẻm trại hòm , trên nhà nghỉ quỳnh hương 100m', '', 'f7e0ef6a0d.jpg', 4, '2020-06-20 07:45:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_giohang`
--

CREATE TABLE `tbl_giohang` (
  `IDGioHang` int(11) NOT NULL,
  `IDKhachHang` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Gia` int(11) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_giohang`
--

INSERT INTO `tbl_giohang` (`IDGioHang`, `IDKhachHang`, `IDSanPham`, `TenSanPham`, `SoLuong`, `Gia`, `HinhAnh`, `Status`) VALUES
(141, 3, 20, 'Clive Christian 1872', 1, 5989998, 'f7e0ef6a0d.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_khachhang`
--

CREATE TABLE `tbl_khachhang` (
  `IDKhachHang` int(11) NOT NULL,
  `TenTaiKhoan` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `MatKhau` varchar(255) NOT NULL,
  `Status` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_khachhang`
--

INSERT INTO `tbl_khachhang` (`IDKhachHang`, `TenTaiKhoan`, `Email`, `MatKhau`, `Status`) VALUES
(1, 'htal1998', 'linhhuynh.iuh@gmail.com', 'b4f7a4d6d944b224a66e1db4e2a37265', 1),
(2, 'tannguyen', 'tannguyen@gmail.com', '21232f297a57a5a743894a0e4a801fc3', 1),
(3, 'linhhuynh001', 'huynhku68@gmail.com', 'b4f7a4d6d944b224a66e1db4e2a37265', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_lienhe`
--

CREATE TABLE `tbl_lienhe` (
  `IDLienHe` int(11) NOT NULL,
  `TenKH` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `TieuDe` varchar(255) NOT NULL,
  `NoiDung` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_nhanvien`
--

CREATE TABLE `tbl_nhanvien` (
  `IDNhanVien` int(11) NOT NULL,
  `TenNhanVien` varchar(200) NOT NULL,
  `EmailNhanVien` varchar(255) NOT NULL,
  `MatKhau` varchar(100) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL,
  `TrangThai` int(11) DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_nhanvien`
--

INSERT INTO `tbl_nhanvien` (`IDNhanVien`, `TenNhanVien`, `EmailNhanVien`, `MatKhau`, `AnhDaiDien`, `TrangThai`) VALUES
(1, 'Linh Huỳnh', 'linhhuynh.iuh@gmail.com', 'b4f7a4d6d944b224a66e1db4e2a37265', 'f4e6243254.jpg', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_sanpham`
--

CREATE TABLE `tbl_sanpham` (
  `IDSanPham` int(11) NOT NULL,
  `MaSanPham` varchar(100) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `SoLuongGoc` int(11) NOT NULL,
  `SoLuongTon` int(11) NOT NULL,
  `GiaBan` int(11) NOT NULL,
  `GiaGoc` int(11) NOT NULL,
  `GiaKhuyenMai` int(11) NOT NULL,
  `NongDo` varchar(100) NOT NULL,
  `NhomHuong` varchar(100) NOT NULL,
  `XuatXu` varchar(100) NOT NULL,
  `DoLuuHuong` varchar(100) NOT NULL,
  `PhongCach` varchar(100) NOT NULL,
  `DiemNoiBat` text NOT NULL,
  `SanPhamNoiBat` int(11) NOT NULL,
  `LuotXem` int(11) NOT NULL,
  `IDTheLoai` int(11) NOT NULL,
  `IDThuongHieu` int(11) NOT NULL,
  `AnhDaiDien` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_sanpham`
--

INSERT INTO `tbl_sanpham` (`IDSanPham`, `MaSanPham`, `TenSanPham`, `SoLuongGoc`, `SoLuongTon`, `GiaBan`, `GiaGoc`, `GiaKhuyenMai`, `NongDo`, `NhomHuong`, `XuatXu`, `DoLuuHuong`, `PhongCach`, `DiemNoiBat`, `SanPhamNoiBat`, `LuotXem`, `IDTheLoai`, `IDThuongHieu`, `AnhDaiDien`) VALUES
(7, '7e9e497251', 'Armaf Club de nuit Woman', 100, 0, 1450000, 500000, 990000, 'Eau de toilette', 'Cam Bergamot, Cây hoắc hương, Gỗ Bu-lô, Hoa hồng, Hoa nhài, Hương gỗ cay nồng, Hương vani, Long diên', 'Vương quốc Bahrain', '6 đến 8 giờ', 'Nữ Tính, Quyến Rủ', 'Club De Nuit Women của nhã hiệu nước hoa Armaf là một mùi hương nước hoa thuộc nhóm hương trái cây dành cho nữ. Hương đầu là cam bergamot, bưởi, đào, cam. Nốt hương giữa là sự hòa trộn tinh tế của hoa phong lữ, hoa nhài, hoa hồng và vải thiều. Nốt hương cuối là hoắc hương, xạ hương, vanilla và cỏ vertiver. Hương thơm này được các chuyên gia đánh giá tương tự như đàn chị Chanel Coco Mademoiselle đã lừng danh bấy lâu này, nhưng giá cả chỉ bằng 1/3.\r\n\r\n\r\n\r\nArmaf Club De Nuit Women thể hiện một hương thơm tinh tế dành cho người phụ nữ với mùi hương đặc trưng của trái cây và bạc hà. Đó là một biểu hiện của sự sang trọng và quyến rũ khó cưỡng. Tất cả đang hiện có mặt tại Perfume168 – Nước hoa chính hãng .', 1, 16, 6, 4, 'ed11c98073.jpg'),
(8, 'cf17ba23d0', 'Armaf Club De Nuit Intense Man', 100, 0, 1450000, 500000, 990000, 'Eau de toilette', 'Cam Bergamot, Cây hoắc hương, Gỗ Bu-lô, Hoa hồng, Hoa nhài, Hương gỗ cay nồng, Hương vani, Long diên', 'Vương quốc Bahrain', '6 đến 8 giờ', 'Nam tính, mạnh mẽ', 'Nước hoa nam Club de Nuit Intense Man một hương thơm mạnh mẽ, cá tính dành cho chàng trai đam mê hương gỗ cay nồng. Club de Nuit Intense Man của thương hiêu nước hoa Armaf được giới chuyên môn sánh ngang 8-10 với đàn anh Creed Aventus lừng danh. Club de Nuit Intense Man được cho ra mắt vào năm 2015. Hương đặt trưng Quả chanh vàng và Gỗ Bu-lô là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này. Tất cả đang hiện có mặt tại Perfume168 – Nước hoa chính hãng .', 1, 15, 3, 4, '69690a2cd8.jpg'),
(11, 'c3b7f1d4e2', 'Calvin Klein CK Man', 100, 0, 1450000, 650000, 850000, 'Eau de toilette', 'Cây bạc hà, Cây trắc bá, Gỗ đàn hương, Hạnh nhân đắng, Hổ phách, Hương gỗ, Lá ngò thơm, Nhục đậu khấ', 'Mỹ', '3 đến 4 giờ', 'Nam tính, mạnh mẽ, hiện đại', 'Ck MAN được thiết kế theo phong cách tối giản với thân chai thủy tinh vuông vức, tông màu đen vời viền màu bạc kim loại khá nam tính và hiện đại.\r\n\r\nMùi hương của MAN từ hãng Calvein Klein khá trưởng thành và gợi cảm. Bạn có thể bổ sung MAN vào bộ sưu tập nước hoa của mình vì hương thơm thanh khiết của MAN có thể sử dụng hằng ngày. Hãy “thưởng thức” MAN vào buổi sáng để tăng thêm sự tự tin và sảng khoái cho một ngày làm việc của bạn.', 2, 11, 3, 9, '8cbc1fd377.jpg'),
(12, '6a42b02bfa', 'Carolina Herrera 212 Men', 100, 0, 1850000, 1000000, 0, 'Eau de toilette', 'Cam Bergamot, Cây xô thơm, Cỏ hương bài, Gỗ đàn hương, Gỗ Guaiac, Gừng, Hoa oải hương, Hoa sơn chi, ', 'Tây Ban Nha', '4 đến 6 giờ', 'Tinh tế, sắc sảo, năng động', 'Carolina Herrera là một thương hiệu dành cho những người yêu thích sự đơn giản của các thành phần chất lượng và bao bì tối giản. Nước hoa Carolina Herrera vừa gợi cảm vừa mới mẻ, phức tạp và lạc quan.\r\n\r\nCarolina Herrera là thương hiệu thời trang nổi tiếng đến từ Tây Ban Nha, vùng đất nổi tiếng với những lễ hội kỳ lạ trên thế giới. Thương hiệu cung cấp nhiều sản phẩm như gel tắm, kem dưỡng thể, các sản phẩm làm đẹp khác và sản phẩm nước hoa đầu tiên của hãng xuất hiện năm 1988.\r\n\r\nCarolina Herrera 212 Men\r\n\r\n212 Carolina Herrera là lựa chọn tuyệt vời cho những người đàn ông sáng tạo và thanh lịch. Nó thể hiện sự cởi mở với thế giới và phong cách năng động tinh tế của một người đàn ông hiện đại tự tin theo đuổi ước mơ của mình.\r\n\r\nThành phần của 212 Carolina Herrera Men\r\n212 Men là loại nước hoa thứ hai dành cho nam giới đến từ nhà mốt thời trang Carolina Herrera . Ra mắt trên thị trường năm 1999 và lấy cảm hứng từ những thay đổi năng lượng văn hoá và phong cách của New York.\r\n\r\nNét nổi bật của 212 Carolina Herrera Men\r\nNếu hường đầu của Carolina Herrera 212 Women là hương hoa ngọt ngào thì khởi đầu 212 Men là hương thơm từ kết hợp giữa gia vị và loài hoa cùng trái cây, mang một mùi hương nam tính mạnh mẽ. Tầng hương giữa cũng là sự hòa quyện của những quả trái cùng hoa, gừng và hoa sơn chi tạo nên một lớp hương tinh tế hấp dẫn.Sánh cùng hương thơm đó, tầng lớp khép lại của 212 Men là một hương thơm gợi cảm của gỗ đàn hương, gỗ guaiac cùng các hương nhẹ nhàng.\r\n\r\nCarolina Herrera 212 Men\r\n\r\nHình dáng của Carolina Herrera 212 Men như tính chất mà mùi hương đó mang lại. Thể hiện sự sắc sảo trong từng đường nét của 212 Men, kiểu dáng hình trụ hoàn hảo mang màu sắc xám bạc như những vật thể kim loại, óng ánh hiện lên tính nét mạnh mẽ, kiên cường. Gắn kết thân chai và nắp kim loại từ tính có đường viền màu đen tạo điểm nhấn, thể hiện sự tinh tế, mạnh mẽ nhưng không quá khô khan mà lại thanh lịch, khéo léo của người đàn ông.\r\n\r\nTheo như Perfume168 đây là một dòng sản phẩm thích hợp cho nam giới, không quá kiểu cách hay đơn giản lẫn mùi hương và thiết kế vỏ bọc bên ngoài. Nồng độ thuộc dạng Eau De Toilette nên độ lưu hương khoảng 4 giờ đến 6 giờ. Thời lượng lưu hương đủ dùng đối với nam giới và khoảng cách toả hương cũng vừa phải.\r\n\r\n', 1, 37, 3, 10, '532480722c.jpg'),
(13, '0d8960f58d', 'Lacoste Live Pour Homme EDT', 120, 0, 1550000, 450000, 930000, 'Eau de toilette', 'Hương nước biển', 'Pháp', 'Từ 3 đến 6 giờ', 'Từ 3 đến 6 giờ', 'Nước hoa Lacoste Live là một ấn phẩm mới của năm 2014 đã được hãng thời trang Lacoste giới thiệu trong bộ sưu tập thời trang cùng tên Lacoste L!ve.  Với chủ đề nổi bật ở chốn thành thị, nước hoa nam Lacoste Live được lấy cảm hứng từ chiếc áo polo ngắn tay mang nét đặc trưng với cá sấu.\r\n\r\n\r\n\r\nThiết kế kiểu chai nước hoa Lacoste Live như là một khối thủy tinh, màu xanh hải quân, với các cạnh có màu trắng, đen và đỏ, mà cũng có thể được dùng như là nguyên liệu, với ví dụ 32% cường độ màu xanh và 10% tinh khiết màu đỏ ! Nước hoa Lacoste Live có hương dầu tươi mát của chanh, hương giữa là sự pha trộn của màu xanh lá cây và hương biển, hương cuối là cam thảo và gỗ gaiac.\r\n\r\n', 2, 42, 3, 4, '363d5e6cd4.jpg'),
(14, 'fd7cfc5ca9', 'Chanel Bleu De Chanel Eau De Parfum', 100, 0, 4549997, 2990000, 0, 'Eau de toilette', ' Cây bạc hà, Cây hoắc hương, Cỏ hương bài, Gỗ đàn hương, Gỗ tuyết tùng, Gừng, Hổ phách, Hoa nhài, Hồ', 'Pháp', '7 đến 10 giờ', 'Nam tính, sang trọng, thành đạt', 'Chanel Bleu De Chanel Eau De Parfum Men được giới thiệu ra công chúng vào năm 2014 và có lẽ đây chính là sự thành công nhất mà Chanel từng đạt được trong quá trình xây dựng thương hiệu của mình. Nước hoa blue nam – Bleu De Chanel Eau De Parfum  được nhiều người đánh giá cao và được xếp vào loại nước hoa nam được yêu thích nhất năm 2016.\r\n\r\nĐiều này không có gì là quá lạ lẫm bởi hương vị mạnh mẽ, nam tính đầy quyến rũ của chai nước hoa này đem lại khiến ai cũng muốn sở hữu và sử dụng nó thường xuyên mỗi ngày.\r\n\r\nBleu De Chanel Eau De Parfum là sản phẩm mang giá trị và ưu điểm cực kỳ tốt bởi hương thơm tích tạo nên từ nhà pha chế Jacques Polge. Dù là trải nghiệm hay sở hữu được sản phẩm này thì vẫn là lựa chọn vô cùng tuyệt vời đối với cánh đàn ông muốn thể hiện đẳng cấp của mình.\r\n\r\nChanel Bleu De Chanel Eau De Parfum\r\nNếu so với bản Blue De Chanel năm 2010 thì có lẽ đây chính là bản nâng cấp đầy sáng giá và có phần vượt trội rất nhiều của thương hiệu Chanel. Chính vì thế khi được công bố vào mùa hè năm 2014 sản phẩm này đã tạo được tiếng vàng nhờ bàn tay pha chế điêu luyện đầy ma thuật của Jacques Polge.\r\n\r\nThiết kế\r\nChanel Bleu De Chanel Eau De Parfum sở hữu thiết kế mang tính lịch lãm và đầy sang trọng. Với tông màu xanh đen làm chủ đạo mang phong thái sắc lạnh đi cùng các đường nét góc cạnh nhạy bén, nó được tạo ra rất đẹp mắt và tinh xảo và có thể ví như một viên đá Sapphire giá trị.\r\n\r\nNước hoa Chanel Bleu De Chanel Eau De Parfum\r\nNước hoa Chanel Bleu De Chanel Eau De Parfum\r\n\r\nBổ sung thêm vào đó là logo nhãn hiệu Chanel rất hài hòa và cân xứng, tạo ra một bức tranh khá hài hòa về việc bố trí thiết kế.\r\n\r\nĐặc tính hương thơm của nước hoa Blue nam\r\nChanel Bleu De Chanel Eau De Parfum là dòng nước hoa mà Perfume168 mang đến có hương vị khá giống so với phiên bản trước đó, sự cải thiện và nâng cấp làm cho nó nổi bật chính là sự mãnh liệt, nồng nàn đầy màu sắc do kết hợp bởi nồng độ EDP (Eau De Parfum) mang phong cách nồng nàn đầy lôi cuốn.\r\n\r\nKhởi đầu của nước hoa Blue nam với hương vị ngọt ngào đầy hứng khởi đến từ cam Berrgarmot và bưởi, đi cùng sự the mát của bạc hà cho ta cảm giác đầy sảng khát và mát mẻ. Trải qua lớp hương thứ hai chúng ta lại cảm nhận được một điểm nhấn khá đặc biệt, đó là sự ấm áp, pha chút nồng nhiệt lôi cuốn xuất phát từ bạch đậu khấu, hồ tiêu, gừng đúng với bản chất của hương gỗ thơm.\r\n\r\nNhưng có lẽ phần kết thúc đã đem lại sự cân bằng và hài hòa rất xuất sắc, đi qua những hương vị tươi mát và nồng cháy đến từ hai lớp đầu và giữa chúng ta sẽ cảm nhận được sự dịu nhẹ và quyến rũ đến từ hoa nhài và cỏ hương bài từ nước hoa Blue nam.\r\n\r\nNước hoa Chanel Bleu De Chanel Eau De Parfum\r\nNước hoa Chanel Bleu De Chanel Eau De Parfum\r\n\r\nSự sắp xếp về hương vị của Chanel Bleu De Chanel Eau De Parfum rất độc đáo, mang phần khá lôi cuốn người sử dụng và mang một đẳng cấp khác biệt so với những sản phẩm khác. Ngoài ra loại nước hóa Chanel Allure Homme cũng có mùi hương vô cùng quyết rũ, mang đến sự mạnh mẽ, nam tính.\r\n\r\nVà dựa trên tất cả sự pha trộn đầy tinh tế đó, chúng ta có thể nhận ra được vì sao nó được chọn là loại nước hoa Blue nam được yêu thích nhất vào năm 2016. Ai mà chẳng muốn sở hữu được một chai nước hoa có thể lưu hương đạt đến 12 tiếng đồng hồ hay mang bản chất mạnh mẽ, nam tính và đầy lôi cuốn.\r\n\r\nNước hoa Chanel Bleu De Chanel Eau De Parfum\r\nNước hoa Chanel Bleu De Chanel Eau De Parfum\r\n\r\nĐó chính là Chanel Bleu De Chanel Eau De Parfum, một thành công mà Chanel đã đạt được. Đến với nhà Perfume168 để có thể tìm mua nước hoa chính hãng với giá hợp lý nhất nhé. ', 1, 86, 3, 12, '5ecc4fd1da.jpg'),
(15, '34a888afe1', 'Bond Dubai Black Sapphire', 20, 0, 6950000, 5500000, 0, 'Eau de toilette', 'Hương dương xỉ phương đông, Hương phương đông', 'Mỹ', '8 đến 12 giờ', ' Đẳng cấp, hiện đại', '', 1, 89, 6, 14, '67d73bf503.jpg'),
(16, '4cf1d646d8', 'Paco Rabanne Olympea Legend', 100, 0, 2451000, 2000000, 0, 'Eau de Parfum', 'Đậu Tonka, Hổ phách, Hoa cọ, Hoa gừng, Hương vani, Muối, Quả mận', 'Pháp', 'Từ 5 đến 10 giờ.', 'Năng động, tự tin, bản lĩnh', '', 1, 3, 6, 15, '77bd6f5f9f.jpg'),
(17, 'b67132addb', 'Armaf Magnificent Pour Homme', 100, 0, 1450000, 1150000, 0, 'Eau de Parfum', 'Cam Bergamot, Cây hoắc hương, Gỗ Bu-lô, Hoa hồng, Hoa nhài, Hương gỗ cay nồng, Hương vani, Long diên', 'Vương quốc Bahrain', '6 đến 8 giờ', 'Nam tính, mạnh mẽ', '', 2, 0, 3, 4, '195ea7382f.jpg'),
(18, '0af61018fa', 'Club De Nuit Milestone', 100, 0, 1450000, 1150000, 0, 'Eau de Parfum', ' Hương hoa cỏ - gỗ - xạ hương', 'Vương quốc Bahrain', '6 đến 8 giờ', ' Quý phái, Sang trọng', '1 điều thực tế là nhãn hiệu Armaf đến từ Ả Rập chưa bao giờ có 1 mùi hương đặt trưng của mình. Tất cả những mã sản phẩm của nhà này đều được copy mùi hương tương tự những mẫu nước hoa đã lừng danh khác. Và mới đây 2019 cũng không ngoại lệ, Armaf mới cho mắt sản phẩm mới “Club De Nuit Milestone” cũng được lấy từ Mùi hương giống đến 99% của siêu phẩm “Creed Creed Millesime Imperial” còn về giá thì cự hấp dẫn chỉ bằng 1/5 bản gốc.\r\n \r\nNước hoa Club de Nuit Milestone của Armaf là một loại nước hoa unisex được cả nam giới và phụ nữ yêu thích. Club De Nuit Milestone có hương thơm tươi mát, thanh lịch phù hợp khi sử dụng trong môi trường làm việc văn phòng tạo cảm giác dễ chịu với đồng nghiệp, có thể dùng cho cả ban ngày lẫn ban đêm.\r\n \r\n• Hương Đầu: Trái cây, muối biển\r\n• Hương giữa: Hoa Nhài, Oải Hương, Hoa Cam.\r\n• Hương cuối: Iris, cam quýt, chanh Sicilia và Bergamot.\r\n', 2, 0, 3, 4, '7ea0f040f8.jpg'),
(19, '754792af0f', 'Clive Christian X', 100, 0, 5990000, 5000000, 0, 'Eau de parfum', 'Bồ đề, Cỏ hương bài, Gỗ tuyết tùng Virginia, Hổ phách, Hoa diên vĩ, Hoa nhài, Hương dương xỉ phương ', 'Anh Quốc', '8 đến 12 giờ', 'Nam tính, mạnh mẽ, cá tính', 'Nước hoa nam Clive Christian X được cho ra mắt vào năm 2001. Đây là dòng nước hoa Clive Christian thuộc nhóm hương dương xỉ phương đông do Geza Schoen chính là nhà thiết kế nước hoa này.\r\n\r\n\r\nClive Christian X có độ lưu hương lâu 8 đến 12 giờ và độ tỏa hương thuộc dạng rất xa – toả hương trong vòng bán kính trên 2 mét.Clive Christian X thích hợp để sử dụng trong cả ngày lẫn đêm vào mùa thu, đông. Bên cạnh đó, Quế và Gỗ tuyết tùng Virginia là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.\r\n\r\n', 1, 2, 3, 16, '422a6396a1.jpg'),
(20, 'dc4b25afa8', 'Clive Christian 1872', 100, 0, 5989998, 5000000, 0, 'Eau de Parfum', 'Cam Bergamot, Cây đơn sâm, Cây hoắc hương, Cây hương thảo, Gỗ tuyết tùng Virginia, Hổ phách, Hoa anh', 'Anh Quốc', '8 đến 12 giờ', ' Nam tính, bí ẩn, hấp dẫn', 'Nước hoa nam Clive Christian 1872 Men phù hợp với người trên 25 tuổi. Đây là dòng nước hoa Clive Christian này có độ lưu hương rất lâu 8 đến 12 giờ. và độ tỏa hương thuộc dạng rất xa – toả hương trong vòng bán kính trên 2 mét. Clive Christian 1872 Men phù hợp để sử dụng trong cả ngày lẫn đêm vào mùa xuân, hạ.\r\n\r\n\r\nClive Christian 1972 là dòng nước hoa Clive Christian thuộc nhóm hương cam chanh thơm ngát. Bên cạnh đó, Quả chanh xanh và Quả bưởi là hai hương bạn có thể dễ dàng cảm nhận được nhất khi sử dụng nước hoa này.', 1, 4, 3, 16, 'f7e0ef6a0d.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_slider`
--

CREATE TABLE `tbl_slider` (
  `IDSlider` int(11) NOT NULL,
  `MaSlider` varchar(255) NOT NULL,
  `HinhAnh` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_slider`
--

INSERT INTO `tbl_slider` (`IDSlider`, `MaSlider`, `HinhAnh`) VALUES
(6, 'ce01c89ea8', '4715d98726.jpg'),
(10, 'a57090fa25', '4102cf2c95.png');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_theloai`
--

CREATE TABLE `tbl_theloai` (
  `IDTheLoai` int(11) NOT NULL,
  `MaTheLoai` varchar(100) NOT NULL,
  `TenTheLoai` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_theloai`
--

INSERT INTO `tbl_theloai` (`IDTheLoai`, `MaTheLoai`, `TenTheLoai`) VALUES
(3, 'ac85f62daa', 'Nước Hoa Nam'),
(6, 'd5151d0a32', 'Nước Hoa Nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_thuonghieu`
--

CREATE TABLE `tbl_thuonghieu` (
  `IDThuongHieu` int(11) NOT NULL,
  `MaThuongHieu` varchar(100) NOT NULL,
  `TenThuongHieu` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_thuonghieu`
--

INSERT INTO `tbl_thuonghieu` (`IDThuongHieu`, `MaThuongHieu`, `TenThuongHieu`) VALUES
(4, 'ed4c15693c', 'Armaf'),
(5, '60f10756ed', 'Calvin'),
(9, 'b71d60d3f8', 'Calvin Klein'),
(10, 'cb5ff7662e', '212 Carolina Herrera'),
(11, '892972756b', 'Lacoste'),
(12, '07be1c2ab3', 'Chanel'),
(13, '86fae15506', 'Kilian'),
(14, '03574293aa', 'Bond No 9'),
(15, '3098a2fe69', 'Paco Rabanne'),
(16, 'bc589e055c', 'Clive Christian');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tbl_wishlist`
--

CREATE TABLE `tbl_wishlist` (
  `IDWishlist` int(11) NOT NULL,
  `IDSanPham` int(11) NOT NULL,
  `sID` varchar(255) NOT NULL,
  `TenSanPham` varchar(255) NOT NULL,
  `GiaBan` varchar(100) NOT NULL,
  `HinhAnh` varchar(200) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tbl_wishlist`
--

INSERT INTO `tbl_wishlist` (`IDWishlist`, `IDSanPham`, `sID`, `TenSanPham`, `GiaBan`, `HinhAnh`) VALUES
(11, 14, 'mh5tbh0tt6f712ead6k3nncagi', 'Chanel Bleu De Chanel Eau De Parfum', '4549997', '5ecc4fd1da.jpg'),
(24, 7, 'feovee9ju471itug8eaqs6p5aj', 'Armaf Club de nuit Woman', '990000', 'ed11c98073.jpg'),
(28, 20, '43cd45a13b4026dd9a756e7ad79e2943', 'Clive Christian 1872', '5989998', 'f7e0ef6a0d.jpg');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `tbl_chitietanh`
--
ALTER TABLE `tbl_chitietanh`
  ADD PRIMARY KEY (`IDAnh`);

--
-- Chỉ mục cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  ADD PRIMARY KEY (`IDDonHang`);

--
-- Chỉ mục cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  ADD PRIMARY KEY (`IDGioHang`);

--
-- Chỉ mục cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  ADD PRIMARY KEY (`IDKhachHang`);

--
-- Chỉ mục cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  ADD PRIMARY KEY (`IDLienHe`);

--
-- Chỉ mục cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  ADD PRIMARY KEY (`IDNhanVien`);

--
-- Chỉ mục cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  ADD PRIMARY KEY (`IDSanPham`);

--
-- Chỉ mục cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  ADD PRIMARY KEY (`IDSlider`);

--
-- Chỉ mục cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  ADD PRIMARY KEY (`IDTheLoai`);

--
-- Chỉ mục cho bảng `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  ADD PRIMARY KEY (`IDThuongHieu`);

--
-- Chỉ mục cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  ADD PRIMARY KEY (`IDWishlist`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `tbl_chitietanh`
--
ALTER TABLE `tbl_chitietanh`
  MODIFY `IDAnh` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `tbl_chitietdonhang`
--
ALTER TABLE `tbl_chitietdonhang`
  MODIFY `IDDonHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82;

--
-- AUTO_INCREMENT cho bảng `tbl_giohang`
--
ALTER TABLE `tbl_giohang`
  MODIFY `IDGioHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=142;

--
-- AUTO_INCREMENT cho bảng `tbl_khachhang`
--
ALTER TABLE `tbl_khachhang`
  MODIFY `IDKhachHang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `tbl_lienhe`
--
ALTER TABLE `tbl_lienhe`
  MODIFY `IDLienHe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `tbl_nhanvien`
--
ALTER TABLE `tbl_nhanvien`
  MODIFY `IDNhanVien` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `tbl_sanpham`
--
ALTER TABLE `tbl_sanpham`
  MODIFY `IDSanPham` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT cho bảng `tbl_slider`
--
ALTER TABLE `tbl_slider`
  MODIFY `IDSlider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_theloai`
--
ALTER TABLE `tbl_theloai`
  MODIFY `IDTheLoai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `tbl_thuonghieu`
--
ALTER TABLE `tbl_thuonghieu`
  MODIFY `IDThuongHieu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `tbl_wishlist`
--
ALTER TABLE `tbl_wishlist`
  MODIFY `IDWishlist` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
