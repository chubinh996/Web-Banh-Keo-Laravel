-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th3 02, 2018 lúc 06:00 PM
-- Phiên bản máy phục vụ: 10.1.28-MariaDB
-- Phiên bản PHP: 7.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_shop_doan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin`
--

CREATE TABLE `admin` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL,
  `password` varchar(100) COLLATE utf8mb4_vietnamese_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bills`
--

CREATE TABLE `bills` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_customer` int(11) DEFAULT NULL,
  `date_order` date DEFAULT NULL,
  `total` float DEFAULT NULL COMMENT 'tổng tiền',
  `payment` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'hình thức thanh toán',
  `note` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bills`
--

INSERT INTO `bills` (`id`, `id_customer`, `date_order`, `total`, `payment`, `note`, `created_at`, `updated_at`) VALUES
(13, 13, '2017-03-21', 400000, 'ATM', 'Vui lòng giao hàng trước 5h', '2017-03-21 07:29:31', '2017-03-21 07:29:31'),
(12, 12, '2017-03-21', 520000, 'COD', 'Vui lòng chuyển đúng hạn', '2017-03-21 07:20:07', '2017-03-21 07:20:07');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `bill_detail`
--

CREATE TABLE `bill_detail` (
  `id` int(10) UNSIGNED NOT NULL,
  `id_bill` int(10) NOT NULL,
  `id_product` int(10) NOT NULL,
  `quantity` int(11) NOT NULL COMMENT 'số lượng',
  `unit_price` double NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Đang đổ dữ liệu cho bảng `bill_detail`
--

INSERT INTO `bill_detail` (`id`, `id_bill`, `id_product`, `quantity`, `unit_price`, `created_at`, `updated_at`) VALUES
(18, 15, 62, 5, 220000, '2017-03-24 07:14:32', '2017-03-24 07:14:32'),
(17, 14, 2, 1, 160000, '2017-03-23 04:46:05', '2017-03-23 04:46:05'),
(12, 11, 61, 1, 120000, '2017-03-21 07:16:09', '2017-03-21 07:16:09'),
(11, 11, 57, 2, 150000, '2017-03-21 07:16:09', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `customer`
--

CREATE TABLE `customer` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `gender` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `address` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `phone_number` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `note` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `customer`
--

INSERT INTO `customer` (`id`, `name`, `gender`, `email`, `address`, `phone_number`, `note`, `created_at`, `updated_at`) VALUES
(13, 'Customer 2', 'Nữ', 'user2@gmail.com', 'Hà nội', '23456789', 'Vui lòng giao hàng trước 5h', '2018-01-06 01:26:48', '2017-03-21 07:29:31'),
(11, 'Customer\r\n', 'Nữ', 'user@gmail.com', 'Hà Nội', '234567890-', 'không chú', '2018-01-06 01:26:00', '2017-03-21 07:16:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_of_date`
--

CREATE TABLE `list_of_date` (
  `id` int(10) UNSIGNED NOT NULL,
  `list_from_day` date NOT NULL,
  `list_to_day` date NOT NULL,
  `total_customer` int(11) NOT NULL,
  `total_money_bill_ordered` float NOT NULL,
  `total_product_ordered` int(11) NOT NULL,
  `bill_ordered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `list_of_day`
--

CREATE TABLE `list_of_day` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `total_customer` int(11) NOT NULL,
  `total_money_bill_ordered` float NOT NULL,
  `total_product_ordered` int(11) NOT NULL,
  `bill_ordered` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `id` int(10) NOT NULL,
  `title` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'tiêu đề',
  `content` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'nội dung',
  `image` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL COMMENT 'hình',
  `create_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `update_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `short_description` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`id`, `title`, `content`, `image`, `create_at`, `update_at`, `short_description`) VALUES
(1, 'Candy Shop -Thiên đường bánh kẹo ngoại nhập Hà Nội.', 'Năm nay ta thử làm một khay mứt Tết toàn đồ nhà làm để đãi khách xem sao nhé! Mứt và ô mai thì không thể thiếu rồi, nhất là khi tự làm ở nhà ăn vừa ngon, lại đảm bảo hơn mua ở ngoài nhiều. Bên cạnh đó, bạn cũng có thể làm thêm vài loại bánh để ăn kèm với trà. Hôm nay, ta sẽ thử làm kẹo lạc mời khách siêu dễ, đến cả những bạn hậu đậu, không hay làm bếp cũng có thể làm ngon được đấy!\r\n\r\nNguyên liệu làm kẹo lạc:\r\n\r\n- 200g đường cát\r\n\r\n- 300 - 400g đậu phộng\r\n\r\n- 50g vừng trắng\r\n\r\n- 1/2 quả chanh vắt lấy nước cốt\r\n\r\n- 40ml nước lọc\r\n\r\n- 20ml corn syrup (mua ở hiệu làm bánh)\r\n\r\n- 2 tờ giấy nướng bánh\r\n\r\nCách làm kẹo lạc như sau:\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 1.\r\nBước 1:\r\n\r\n- Cho lạc vào chảo, đặt lên bếp rang trên lửa nhỏ. Đảo đều tay, tránh để đậu phộng bị khét.\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 2.\r\nBước 2:\r\n\r\n- Sau khi đậu phộng đã chín để nguội, bạn dùng tay xát mạnh để loại bỏ vỏ đậu.\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 3.\r\nBước 3:\r\n\r\n- Dùng chày giã hơi nhuyễn lạc hoặc nếu bạn muốn có thể để nguyên hạt lạc khi làm cũng được.\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 4.\r\nBước 4:\r\n\r\n- Bạn cho 200g đường, 40ml nước lọc và 20ml corn syrup cho vào nồi đặt lên bếp nấu trên lửa nhỏ. Bạn chú ý không dùng thìa để khuấy để tránh bị lại đường, bạn chỉ cần lắc nhẹ nồi vài lần khi nấu đường là được.\r\n\r\n- Khi đường bắt đầu đã chuyển màu thì cho thêm 1/2 nước cốt chanh.\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 5.\r\nBước 5:\r\n\r\n- Trút toàn bộ phần lạc đã giã cho vào nước đường, tắt bếp dùng muỗng đảo đều.\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 6.\r\nBước 6:\r\n\r\n- Trải giấy lên mặt phẳng, quét 1 lớp dầu, rắc thêm ít vừng lên. Trút phần lạc lên và dùng một miếng giấy khác cũng đã quét dầu úp lên sau đó cán mỏng.\r\n\r\nC&#244;ng thức kẹo lạc si&#234;u dễ hậu đậu mấy cũng l&#224;m ngon - Ảnh 7.\r\nBước 7:\r\n\r\n- Khi kẹo còn ấm, bạn dùng dao cắt thành từng miếng vuông vừa ăn. Sau đó để kẹo nguội và lấy ra cho vào hộp.\r\n\r\nTrong khay bánh kẹo đãi Tết mà có thêm vài miếng kẹo lạc chính hiệu nhà làm nữa thì hay ho lắm đó!\r\n\r\nCông thức kẹo lạc siêu dễ hậu đậu mấy cũng làm ngon - Ảnh 8.\r\nBên cạnh những bánh nhãn, mứt dừa, ô mai thì kẹo lạc cũng mang đến một hương vị hoà quyện, rất hợp đấy!\r\n\r\nCông thức kẹo lạc siêu dễ hậu đậu mấy cũng làm ngon - Ảnh 9.\r\nTết đã đến rất gần, một đĩa kẹo lạc đãi khách uống cùng tách trà nóng sẽ làm cho câu chuyện đầu năm trở nên vui vẻ và rôm rả hơn đấy!\r\n\r\nCông thức kẹo lạc siêu dễ hậu đậu mấy cũng làm ngon - Ảnh 10.\r\n', 'blog1.jpg', '2018-02-24 08:05:37', '0000-00-00 00:00:00', 'Lọt top 5 cửa hàng bánh kẹo ngoại nhập ở Hà Nội luôn cháy hàng dịp Tết do Foody.vn bình chọn, Candy Shop hứa hẹn là nơi để bạn t...'),
(2, '5 loại bánh kẹo nhập khẩu Mỹ cháy hàng dịp Tết', 'Chúng tôi sẽ tư vấn cải tạo và bố trí nội thất để giúp phòng ngủ của chàng trai độc thân thật thoải mái, thoáng mát và sáng sủa nhất. ', 'blog2.png', '2018-02-24 08:13:27', '0000-00-00 00:00:00', 'Tết càng ngày càng đến gần khiến thị trường bánh kẹo trong nước cũng như bánh kẹo nhập khẩu dần trở nên nóng hơn bao giờ hết...'),
(3, '10 loại bánh nhập khẩu ngon chất lượng giá dưới 100K\r\n', 'Đồ gỗ nội thất ngày càng được sử dụng phổ biến nhờ vào hiệu quả mà nó mang lại cho không gian kiến trúc. Xu thế của các gia đình hiện nay là muốn đem thiên nhiên vào nhà ', 'blog3.jpg', '2018-02-24 08:13:43', '0000-00-00 00:00:00', 'Lựa chọn được loại bánh nhập khẩu vừa ngon vừa rẻ cũng không phải là khó. Dưới đây, Vitamin House muốn chia sẻ đến bạn tổng hợp 4 loại bánh ...'),
(4, 'Top 5 loại bánh kẹo cao cấp nhập khẩu từ Pháp', 'Ngày nay, xu hướng chọn vật dụng làm bằng gỗ để trang trí, sử dụng trong văn phòng, gia đình được nhiều người ưa chuộng và quan tâm. Trên thị trường có nhiều sản phẩm mẫu ', 'blog4.jpg', '2018-02-24 08:14:00', '0000-00-00 00:00:00', 'Bánh kẹo nhập khẩu từ Pháp khá nổi tiếng và được người tiêu dung Việt Nam rất ưu chuộng. Không chỉ thơm ngon mà chúng còn ...'),
(5, '5 loại bánh kẹo nhập khẩu Nhật Bản đang được săn đón 2018', 'Các loại bánh kẹo nhập khẩu từ nhật từ lâu đã trở nên vô cùng quen thuộc với người Việt Nam bởi chất lượng tuyệt vời, mùi vị thơm ngon và giá cả cũng rất phải chăng. Sau đây là 5 loại bánh kẹo nhập khẩu Nhật Bản đang làm mưa làm gió và liên tục cháy hàng trong đầu năm 2018 này.\r\n\r\n1. Kẹo Sữa UHA Nhật Bản\r\n \r\n\r\nKẹo sữa bò UHA mang hương vị rất riêng: ngọt, thơm, béo ngậy nhưng không hề ngấy\r\n \r\nTuy không được trắng như các loại khác nhưng chính màu đục của viên kẹo khiến người ta thích hơn, chứng tỏ độ đậm đặc của sữa cực kỳ cao. Các loại kẹo sữa thông thường nồng độ sữa béo chỉ 3,4% nhưng kẹo sữa bò UHA có chứa tới 10,2%. Ba viên kẹo có chất dinh dưỡng tương đương với một ly sữa tươi 200ml.\r\nKẹo cung cấp hàm lượng protein, canxi và vitamin có sẵn trong sữa bò, giúp trẻ phát triển khỏe mạnh.\r\nVị sữa thơm ngon không hề ngọt gắt, béo ngậy vô cùng kích thích vị giác trẻ, trẻ sẽ không còn lười ăn nữa.\r\nLàm giảm đáng kể cảm giác đói, mức độ béo phì ở một số người.\r\nKẹo sữa bò UHA được sản xuất hoàn toàn bằng sữa bò tươi, quy trình đóng gói khép kín, đảm bảo tuyệt đối về vệ sinh an toàn thực phẩm ở Nhật Bản.\r\nViên kẹo tròn xinh mềm mịn đậm đà hương thơm tan ngay trong miệng. Thích hợp với những buổi nhâm nhi cùng bạn bè, gia đình.\r\nKhông sử dụng chất bảo quản, màu thực phẩm hay hương liệu nhân tạo, tuyệt đối an toàn.\r\n\r\n2. Bánh Quy Moegino Nhật Bản\r\n\r\n\r\nBánh Moegino có 6 loại mỗi loại 2 gói: đậu phộng và mè, gừng và hạnh nhân, matcha và trà ngọc lộ, bơ mật ong và dừa, đậu nành và quả mơ, caramel hạnh nhân.\r\n\r\nBánh Moegino là loại bánh quy giòn thơm được kết hợp từ bột mì và các loại đậu vừng tạo nên vị giòn tan trong miệng đậm đà hương vị Nhật Bản. Hiện nay bạn có thể mua bánh Moegino và Bánh kẹo Nhật Bản HCM dễ dàng tại Việt Nam hoặc trên các website bán đồ nhập khẩu. Bánh gồm 6 loại vị khác nhau: đậu phộng và mè, gừng và hạnh nhân, matcha và trà ngọc lộ, bơ mật ong và dừa, đậu nành và quả mơ, caramel hạnh nhân.\r\n\r\n3. Mochi Trà Xanh Nhân Socola Nhật.\r\n\r\n\r\nBánh Matcha Daifuku là một sản phẩm tuyệt vời với hương vị trà xanh kèm với kem tươi sữa làm nhân\r\n\r\nMochi matcha Daifuku bánh kẹo nhập khẩu nhật bản, được biết đến như một văn hóa ẩm thực của người Nhật. Mochi năm nay có gì khác với những năm cũ, Mochi làm từ 100% từ gạo dẻo, một loại gạo có một không hai tại Nhật Bản. Bạn sẽ thật sự ngạc nhiên với sự cải tiến mới trong hương vị bánh. Vẫn giữ nguyên độ mềm, độ dẻo từ bánh gạo nguyên chất 100% từ hạt gạo dẻo Nhật Bản. Mochi matcha được nghiên cứu nhằm giảm bớt độ ngọt và tăng lượng bột sencha giúp đáp ứng yêu cầu từ nhiều vị khách du lịch đến Nhật. Cả trong và ngoài đất nước, cứ nhắc đến bánh mochi là hầu như ai cũng chỉ nhắc đến vị trí số 1 dành cho Nhật Bản.\r\n\r\n4. Bánh Oreo Crispy Nhật Vị Trà Xanh.\r\n \r\n\r\nTận hưởng hương vị thơm ngon và giàu chất dinh dưỡng với bánh quy Oreo Trà Xanh \r\n \r\nBạn yêu thích những chiếc bánh giòn giòn, thơm thơm của những thương hiệu bánh quy bơ nổi tiếng? Bạn đã thưởng thức nhiều món bánh thơm ngon? Nhưng bạn đã từng nếm thử hương vị ngọt ngào của những chiếc bánh kem trà xanh này chưa?\r\nTừ nhiều năm nay, bánh quy Oreo đã trở thành món ăn quen thuộc của nhiều gia đình Việt. Những chiếc bánh thơm ngon của Oreo xuất hiện rất bình dị như những món ăn nhẹ hàng ngày.\r\nHình dáng bánh đẹp mắt với lớp trong là nhân kem trà xanh được bao bọc bởi lớp bánh tròn mang thông điệp của tình thương yêu, sự bao bọc, chở che, gắn kết giữa con người với con người.\r\nOreo là những chiếc bánh giòn tan thơm mùi sữa, trà xanh, chocolate và lớp kem xanh mềm mịn. Chính hương vị đặc trưng này làm cho bánh quy Oreo ngày nay đã trở thành một món ăn được phổ biến trên toàn thế giới, được mọi lứa tuổi yêu thích và được sử dụng mọi lúc trong ngày – giờ nghỉ, bữa ăn nhẹ, tráng miệng và là món quà ngọt ngào, ý nghĩa trong nhiều dịp đặc biệt.\r\n\r\n5. Kẹo sô cô la Macadamia Meiji.\r\nKẹo Macadamia Meiji  có hương sô cô la và sữa thơm ngon, kết hợp với vị béo ngậy bùi của hạt macadamia... hấp dẫn sẽ mang lại cho bạn những phút giải trí và thưởng thức kẹo thật tuyệt vời bên cạnh bạn bè, người thân.', 'blog5.jpg', '2018-03-02 16:35:15', '0000-00-00 00:00:00', 'Các loại bánh kẹo nhập khẩu từ nhật từ lâu đã trở nên vô cùng quen thuộc với người Việt Nam bởi chất lượng tuyệt vời, mùi vị thơm ...'),
(6, '5 loại bánh kẹo nhập khẩu Nhật Bản đang được săn đón 2018', 'Các loại bánh kẹo nhập khẩu từ nhật từ lâu đã trở nên vô cùng quen thuộc với người Việt Nam bởi chất lượng tuyệt vời, mùi vị thơm ngon và giá cả cũng rất phải chăng. Sau đây là 5 loại bánh kẹo nhập khẩu Nhật Bản đang làm mưa làm gió và liên tục cháy hàng trong đầu năm 2018 này.\r\n\r\n1. Kẹo Sữa UHA Nhật Bản\r\n \r\n\r\nKẹo sữa bò UHA mang hương vị rất riêng: ngọt, thơm, béo ngậy nhưng không hề ngấy\r\n \r\nTuy không được trắng như các loại khác nhưng chính màu đục của viên kẹo khiến người ta thích hơn, chứng tỏ độ đậm đặc của sữa cực kỳ cao. Các loại kẹo sữa thông thường nồng độ sữa béo chỉ 3,4% nhưng kẹo sữa bò UHA có chứa tới 10,2%. Ba viên kẹo có chất dinh dưỡng tương đương với một ly sữa tươi 200ml.\r\nKẹo cung cấp hàm lượng protein, canxi và vitamin có sẵn trong sữa bò, giúp trẻ phát triển khỏe mạnh.\r\nVị sữa thơm ngon không hề ngọt gắt, béo ngậy vô cùng kích thích vị giác trẻ, trẻ sẽ không còn lười ăn nữa.\r\nLàm giảm đáng kể cảm giác đói, mức độ béo phì ở một số người.\r\nKẹo sữa bò UHA được sản xuất hoàn toàn bằng sữa bò tươi, quy trình đóng gói khép kín, đảm bảo tuyệt đối về vệ sinh an toàn thực phẩm ở Nhật Bản.\r\nViên kẹo tròn xinh mềm mịn đậm đà hương thơm tan ngay trong miệng. Thích hợp với những buổi nhâm nhi cùng bạn bè, gia đình.\r\nKhông sử dụng chất bảo quản, màu thực phẩm hay hương liệu nhân tạo, tuyệt đối an toàn.\r\n\r\n2. Bánh Quy Moegino Nhật Bản\r\n\r\n\r\nBánh Moegino có 6 loại mỗi loại 2 gói: đậu phộng và mè, gừng và hạnh nhân, matcha và trà ngọc lộ, bơ mật ong và dừa, đậu nành và quả mơ, caramel hạnh nhân.\r\n\r\nBánh Moegino là loại bánh quy giòn thơm được kết hợp từ bột mì và các loại đậu vừng tạo nên vị giòn tan trong miệng đậm đà hương vị Nhật Bản. Hiện nay bạn có thể mua bánh Moegino và Bánh kẹo Nhật Bản HCM dễ dàng tại Việt Nam hoặc trên các website bán đồ nhập khẩu. Bánh gồm 6 loại vị khác nhau: đậu phộng và mè, gừng và hạnh nhân, matcha và trà ngọc lộ, bơ mật ong và dừa, đậu nành và quả mơ, caramel hạnh nhân.\r\n\r\n3. Mochi Trà Xanh Nhân Socola Nhật.\r\n\r\n\r\nBánh Matcha Daifuku là một sản phẩm tuyệt vời với hương vị trà xanh kèm với kem tươi sữa làm nhân\r\n\r\nMochi matcha Daifuku bánh kẹo nhập khẩu nhật bản, được biết đến như một văn hóa ẩm thực của người Nhật. Mochi năm nay có gì khác với những năm cũ, Mochi làm từ 100% từ gạo dẻo, một loại gạo có một không hai tại Nhật Bản. Bạn sẽ thật sự ngạc nhiên với sự cải tiến mới trong hương vị bánh. Vẫn giữ nguyên độ mềm, độ dẻo từ bánh gạo nguyên chất 100% từ hạt gạo dẻo Nhật Bản. Mochi matcha được nghiên cứu nhằm giảm bớt độ ngọt và tăng lượng bột sencha giúp đáp ứng yêu cầu từ nhiều vị khách du lịch đến Nhật. Cả trong và ngoài đất nước, cứ nhắc đến bánh mochi là hầu như ai cũng chỉ nhắc đến vị trí số 1 dành cho Nhật Bản.\r\n\r\n4. Bánh Oreo Crispy Nhật Vị Trà Xanh.\r\n \r\n\r\nTận hưởng hương vị thơm ngon và giàu chất dinh dưỡng với bánh quy Oreo Trà Xanh \r\n \r\nBạn yêu thích những chiếc bánh giòn giòn, thơm thơm của những thương hiệu bánh quy bơ nổi tiếng? Bạn đã thưởng thức nhiều món bánh thơm ngon? Nhưng bạn đã từng nếm thử hương vị ngọt ngào của những chiếc bánh kem trà xanh này chưa?\r\nTừ nhiều năm nay, bánh quy Oreo đã trở thành món ăn quen thuộc của nhiều gia đình Việt. Những chiếc bánh thơm ngon của Oreo xuất hiện rất bình dị như những món ăn nhẹ hàng ngày.\r\nHình dáng bánh đẹp mắt với lớp trong là nhân kem trà xanh được bao bọc bởi lớp bánh tròn mang thông điệp của tình thương yêu, sự bao bọc, chở che, gắn kết giữa con người với con người.\r\nOreo là những chiếc bánh giòn tan thơm mùi sữa, trà xanh, chocolate và lớp kem xanh mềm mịn. Chính hương vị đặc trưng này làm cho bánh quy Oreo ngày nay đã trở thành một món ăn được phổ biến trên toàn thế giới, được mọi lứa tuổi yêu thích và được sử dụng mọi lúc trong ngày – giờ nghỉ, bữa ăn nhẹ, tráng miệng và là món quà ngọt ngào, ý nghĩa trong nhiều dịp đặc biệt.\r\n\r\n5. Kẹo sô cô la Macadamia Meiji.\r\nKẹo Macadamia Meiji  có hương sô cô la và sữa thơm ngon, kết hợp với vị béo ngậy bùi của hạt macadamia... hấp dẫn sẽ mang lại cho bạn những phút giải trí và thưởng thức kẹo thật tuyệt vời bên cạnh bạn bè, người thân.', 'blog5.jpg', '2018-03-02 16:36:17', '0000-00-00 00:00:00', 'Các loại bánh kẹo nhập khẩu từ nhật từ lâu đã trở nên vô cùng quen thuộc với người Việt Nam bởi chất lượng tuyệt vời, mùi vị thơm ...'),
(7, '5 Kiểu bánh kẹo ngoại nhập mới lạ chào đón 2018', 'Thị trường bánh kẹo ngoại nhập của nước ta đang ngày càng phát triển và nhộn nhịp vào những tháng cuối năm. Dưới đây là 5 món bánh kẹo ngoại nhập chắc chắn bạn phải sắm sửa vào dịp Tết năm nay cho cả gia đình mình.\r\n\r\n1. Milo Cube Thái Lan\r\nMilo Energy Cube là dòng sản phẩm mới của hãng Nestle tại Thái Lan, đang làm mưa làm gió tại thị trường các nước trên thế giới. Với những viên milo vuông vức, đậm đặc, có vị ngọt vừa phải, béo ngậy được cả người lớn lẫn trẻ nhỏ yêu thích. Cảm nhận viên kẹo tan dần trong miệng sẽ mang đến cho bạn sự thú vị và giúp xóa tan mệt mỏi và tiếp thêm năng lượng cho các hoạt động thể chất. Sản phẩm có thể ăn trực tiếp hoặc dùng chung với sữa tươi và sữa đặc.\r\n\r\n\r\nAi là fan Milo nhớ đừng bỏ lỡ “siêu phẩm” vừa mới xuất hiện này nhé!\r\n\r\n2. Bánh Quy Bơ La Trinitaine Pháp\r\n- Bánh quy La Trinitaine ra đời từ năm 1955 tại La Trinité-sur-Mer, bên bờ Đại Tây Dương thuộc miền Bretagne, Tây Bắc nước Pháp. Đây là một trong số rất ít thương hiệu bánh quy bơ Pháp nổi tiếng còn sót lại sử dụng phương pháp nướng bánh cổ truyền cho bạn chiếc bánh thơm ngon đặc sắc.\r\n- Có 2 loại bánh trong cùng một hộp cho bạn thưởng thức trọn vẹn hương vị của dòng bánh quy bơ cao cấp: bánh Galette (tròn mỏng) và Palet (tròn dày).\r\n- Vỏ hộp thiếc dày, đẹp, thiết kế ấn tượng mang đậm nét văn hóa Pháp. Những phong cảnh bậc nhất của nước Pháp được lựa chọn kỹ càng mang lại sự hài hòa, thân thương cho những ai chưa và đã từng biết đến nước Pháp như một chuyến du ngoạn vòng quanh đất nước xinh đẹp này.\r\n\r\n\r\nBánh được làm từ bơ đậm đặc, thơm ngon và giòn tan.\r\n \r\n3. Bánh Ritz Crackers Nhật\r\nBánh crackers Ritz Crackers thuộc dòng bánh kẹo Nhật nhập khẩu có thành phần được lựa chọn kỹ, rất an toàn và bổ dưỡng. Với quy cách đóng gói kín đáo, sản phẩm giúp người dùng dễ bảo quản và dùng được lâu. Bạn cũng có thể mang theo dễ dàng trong những chuyến đi chơi, picnic để cùng chia sẻ với bạn bè. Bánh có hương vị thơm ngon và hấp dẫn, phù hợp với nhiều khẩu vị. Ngoài ra, sản phẩm này còn cung cấp năng lượng, protein và một số vitamin, thích hợp làm món ăn nhẹ bổ dưỡng cho những các bé. \r\n\r\n\r\nBánh Ritz Crackers Nhật giòn Thơm, Cung Cấp Nhiều Năng Lượng – Món Ngon Cho Bé Và Cả Gia Đình.\r\n\r\n- Bánh Ritz creckers chính hãng được nhập khẩu từ Nhật là món bánh ngon và bổ dưỡng cho bé và cả gia đình.\r\n- Bánh ngon, giàu dinh dưỡng, bổ sung nhiều năng lượng cho các bé nhỏ.\r\n- Bánh là sản phẩm rất được ưa chuộng, đảm bảo tiêu chuẩn chất lượng.\r\n \r\n4. Chocolate Hạt Phỉ Kirkland\r\nNếu bạn là tín đồ của chocolate thì không thể nào không biết đến thương hiệu Kirkland hàng đầu nổi tiếng sản xuất các loại bánh và các loại thực phẩm giúp bổ sung sức khỏe cho người già, trẻ em và ngay cả bà mẹ mang bầu.\r\nKhi bạn mở lớp giấy bạc màu đỏ bọc ra, ngay lập tức bạn sẽ cảm nhận được hương vị thơm ngon của loại socola sữa hảo hạng kết hợp cùng những mẩu hạt phỉ giòn bùi được bọc bên ngoài cùng của viên chocolate, tiếp theo là một lớp bánh mỏng, giòn, tan ngay trong miệng. Bên trong lớp vỏ bánh là socola nguyên chất và cuối cùng là hạt phỉ ( nguyên hạt ) thơm ngon.\r\n\r\n\r\nSản phẩm thích hợp làm quà tặng cho bạn bè, hoặc những người thân yêu trong các dịp lễ quan trọng sắp đến\r\n \r\nBên ngoài lớp bánh được bao phủ lớp chocolate đen kết hợp với hạt phỉ mang lại hương vị thơm ngon và chứa nhiều chất dinh dưỡng. Bên cạnh đó vị ngọt dịu từ chocolate và hạt phỉ thơm bùi mang lại mùi thơm quyến rũ mà không một ai có thể từ chối cả.\r\nNgoài ra Chocolate bọc hạt phỉ bổ sung thêm các loại vitamin như vitamin A, B, E và các gốc axit tự do giúp ngăn ngừa lão hóa, giải tỏa cơn stress, căng thẳng cũng như những áp lực mệt mỏi hằng ngày chỉ với một chiếc bánh chocolate ngọt ngào.\r\nSản phẩm với thiết kế màu đỏ cực kì bắt mắt và sang trọng, thích hợp làm quà tặng cho bạn bè, hoặc những người thân yêu trong các dịp lễ quan trọng sắp đến.\r\n\r\n5. Bánh Trứng Nướng Hokkaido Vị Cá\r\nMột sản phẩm mới toanh đến từ Hong Kong, bánh trứng nướng Hokkaido. Bánh được nhập khẩu trực tiếp từ Hong Kong với công nghệ sản xuất hiện đại, đảm bảo yêu cầu chất lượng vệ sinh thực phẩm, không chất béo độc hại.\r\n\r\n\r\nBánh trứng nướng Hokkaido vị cá là một sản phẩm mới toanh đến từ Hong Kong bạn không nên bỏ lỡ\r\n  \r\nNhắc đến bánh kẹo ngoại ngon, không thể nào không nhắc đến bánh trứng nướng Hokkaido vị cá. Bánh trứng giòn tan, thơm ngon hòa quyện với gia vị tôm (cá) mằn mặn mới lạ sẽ khiến bạn không thể nhầm lẫn với các sản phẩm bánh khác. Từng cây bánh giòn tan cùng hương vị độc đáo sẽ giúp bạn lấy lại nguồn năng lượng trong lúc nghỉ ngơi, hoặc khi giải trí cùng gia đình và bạn bè. Là một món ăn vặt vừa không gây béo, vừa thơm ngon, bánh được đóng gói với qui chuẩn mỗi bánh trong 1 túi riêng nên rất dễ bảo quản và sử dụng.\r\n \r\nVitamin house là cửa hàng chuyên bánh kẹo, trái cây, thức uống nhập khẩu từ các quốc gia uy tín. Với quy trình nhập khẩu, bảo quản chặt chẽ đảm bảo mang lại cho khách hàng những sản phẩm chất lượng, cực ngon và lạ miệng. Còn chần chờ gì mà không ghé Vitamin House để có cơ hội thưởng thức các loại bánh kẹo hàng đầu thế giới nhé !', 'blog6.jpg', '2018-03-02 16:36:17', '0000-00-00 00:00:00', 'Thị trường bánh kẹo ngoại nhập của nước ta đang ngày càng phát triển và nhộn nhịp vào những tháng cuối năm. Dưới đây là ...'),
(8, 'Top 5 bánh nhập khẩu cao cấp cho những tín đồ hương vị Socola', 'Socola là hương vị được nhiều tín đồ đam mê đồ ăn ưa thích. Dưới đây là top 5 bánh ngoại cao cấp có hương vị socola đặc sắc mà ban không thể bỏ qua nếu là một tín đồ của đồ ngọt hay làm quà tặng cho những người có niềm đam mê với hương vị ngọt ngào này.\r\n\r\n1. Bánh Quy Socola Kirkland Hộp Thiếc 1.4kg\r\n\r\nChắc hẳn các bạn đã nghe nhiều đến thương hiệu Kirkland nổi tiếng hàng đầu cho ra đời các sản phẩm chăm sóc sức khỏe.\r\n\r\n\r\n\r\nBánh Quy Socola Kirkland Hộp Thiếc\r\n\r\nBánh quy Kirkland Signature European Cookies With Belgian Chocolate được thiết kế với vỏ ngoài sang trọng, tinh tế thu hút sự bắt mắt của mọi người tiêu dùng hiện nay trong đó có trẻ em và ngay cả người lớn. Sản phẩm sẽ giúp bạn truyền tải thông điệp yêu thương đến người nhận.\r\n\r\n\r\n\r\nBánh được thiết kế với vỏ ngoài sang trọng, tinh tế thu hút sự bắt mắt của mọi người tiêu dùng\r\n \r\nNgoài ra, Bánh là sự kết hợp của 15 loại bánh chocolate thơm ngon phủ bánh cookies: Creme Melody, Artisian Crisp, Choco Crisp, Noir Crisp, Shortcake Shell, Starlight, Sweet Heart, Mocha Light; Mocha Dark, Blanc Shortcake Shell, Choco Harlequin, Choco Leaf, Stripped Sensation, Blanc Sensation, Secret Choco. Đây quả là món quà tuyệt vời dành tặng các dịp lễ đặc biệt như lễ tình nhân và tết nguyên đán sắp đến.\r\n\r\nTrong hộp bánh được thiết kế với hình dạng thanh dài của Casanova được phủ đầy dark chocolate và trang trí bằng white chocolate. Ngoài ra còn có hình tròn Celebration được bao phủ bên trong một lớp bên trong kem hạt dẻ hòa quyện cùng với chocolate đen. Kenya lại là 1 bí mật thú vị, nhìn chẳng khác nào 1 thanh chocolate nguyên chất, nhưng cắn vào trong lại phát hiện có 1 lớp cookie được giấu kỹ dưới vỏ bọc chocolate...\r\n\r\n2. Bánh Bông Lan Con Cá Nhân Kem Socola Hộp 8 Cái\r\n\r\nBánh con cá nhân socola & marshmallow là loại bánh lừng danh tại xứ sở Kim Chi, được cả người lớn và trẻ em yêu mến và thường xuyên xuất hiện trong các chương trình truyền hình nổi tiếng.\r\n \r\n\r\n\r\nBánh Bông Lan Con Cá Nhân Kem Socola\r\n \r\nBánh hình con cá mặp ú dễ thương. Design hộp và gói bọc qua bao mùa vẫn ko thay đổi với nắp mở tiện dụng và những hình vẽ đáng yêu đặc trưng.\r\n\r\n\r\n\r\nDesign hộp và gói bọc  với những hình vẽ đáng yêu đặc trưng\r\n\r\n3. Bánh Quy Chocolate Trắng Nhật Bản 12 Bánh\r\n\r\nShiroi Koibito (người tình tuyết trắng) là một loại bánh quy socola mang phong cách châu Âu. Thành phần của bánh là sự hoà quyện của miếng socola thanh tao kẹp giữa và 2 miếng bánh quy đặc biệt thơm ngon.\r\n \r\n\r\n \r\nBánh Quy Chocolate Trắng Nhật Bản\r\n\r\nBánh được chế biến thủ công đặc còn hơn cả bánh quy Pháp. Dưới những công thức ngon lành từ langue de chat cookie and White, chocolate langue de chat cộng kèm những đôi tay tinh xảo và đầy sáng tạo thì bảo đảm rằng mẻ bánh nào ra lò cũng có màu vàng ươm cô đọng tất cả chất béo và thơm lừng ngay chính giữa bánh.\r\n\r\n\r\nBánh được chế biến thủ công đặc sắc còn hơn cả bánh quy Pháp.\r\n\r\nSiroi Koibito không chỉ thơm ngon vị lúa mạch tan chảy nhẹ nhàng trong cuống họng và đọng chất ngay trên đầu lưỡi mà còn đẹp bởi thiết kế tinh khôi bên ngoài vỏ hộp. Đây là một trong những món bánh kẹo nhập rất phù hợp dành cho cả gia đình. Bạn có thể dành tặng nó cho gia đình và bạn bè vào những kì nghĩ tết hay holiday.\r\n\r\n\r\n\r\nĐây là loại bánh thích hợp để làm quà tặng cho gia đình, bạn bè\r\n \r\n4. Bánh Quy Chấm Socola Nutella\r\n\r\nBánh que chấm chocolate Nutella and Go là sự kết hợp giữa bánh que mập ú giòn rụm và sốt chocola đặc quánh & béo ngọt cực kì hấp dẫn.\r\n\r\n\r\n\r\nBánh Quy Chấm Socola Nutella\r\n\r\nHộp bánh que chấm chocolate Nutella & Go! có 2 ngăn với:\r\n- Bánh que chấm chocolate Nutella & Go! mập ú giòn rụm được làm từ bột mì cao cấp kết hợp với chiết xuất mạch nha và dầu thực vật.\r\n- Sốt chocolate kem hạt dẻ Nutella đặc quánh & béo ngọt cực kì hấp dẫn – loại sốt nổi tiếng nhất thế giới là niềm tự hào tuyệt đối của công ty Ferrero và đang ngày càng chiếm được cảm tình đông đảo người dân Việt Nam nhờ hương vị tuyệt vời.\r\n\r\n\r\n\r\nHộp bánh gồm 2 ngăn\r\n \r\n5. Bánh Socola Hình Nấm Nga\r\n                  \r\nNói đến nước Nga, chắc sẽ chẳng ai không liên tưởng ngay đến nước xứ sở xa xôi này với đặc trưng tạo dấu ấn sâu sắc nhất là loại Bánh nấm Nga đã và đang được rất nhiều người cộng đồng dân cư Việt Nam ưa thích. Đây cũng là món quà dùng để biếu tặng đầy ý nghĩa trong những dịp lễ tết trọng đại.\r\n \r\n\r\n\r\nBánh Socola Hình Nấm Nga\r\n\r\nBánh nấm socola Nga là sự kết hợp của bánh quy giòn rụm, mũ nấm đươc làm từ socola đen, socola trắng nguyên chất thơm ngon, ăn kèm với thân bánh quy tạo hương vị riêng mà không hề ngấy hay quá ngọt.\r\nTrên đây là  5 loại bánh nhập khẩu hương vị socola đang được săn đón cuối năm 2017 này. Nếu bạn là một người có niềm đam mê với hương vị ngọt ngào này thì hãy nhanh tay tậu về cho Tết này đi nhé! Ngoài ra, bạn cũng có thể ghé thăm Vitamin House để xem nhiều hơn các loại bánh nhập khẩu từ nhiều nước như: bánh nhập khẩu Đức, Nhật, Pháp, Mỹ…', 'blog8.jpg', '2018-03-02 16:40:11', '0000-00-00 00:00:00', 'ocola là hương vị được nhiều tín đồ đam mê đồ ăn ưa thích. Dưới đây là top 5 bánh ngoại cao cấp có hương vị socola đặc ...'),
(9, 'Săn liền tay 5 kiểu bánh kẹo nhập khẩu Thái Lan mới lạ', 'Nếu bạn là người yêu thích những hương vị ngọt ngào và mới lạ thì hãy nhanh tay săn ngay 5 kiểu bánh kẹo nhập khẩu Thái Lan dưới đây nào:\r\n\r\n1. Kẹo Sữa Kelita Cube\r\n\r\nMilk Cube là dạng kẹo sữa viên thơm thơm béo béo vị sữa lại không quá ngọt ngậy. Milk Cube có hàm lượng chất béo thấp nên các bạn tha hồ ăn mà không sợ tăng cân nhé! Cắn nhẹ một miếng là vị sữa lan trong miệng rất thích bảo đảm các bạn sẽ muốn ăn liên tù tì.\r\n \r\n\r\n\r\nKẹo Sữa Kelita Cube\r\n \r\n2. Milo Cube Thái Lan \r\n\r\nMilo Energy Cube là một trong những sản phẩm bánh nhập khẩu ngon của hãng Nestle tại Thái Lan, đang làm mưa làm gió tại thị trường các nước trên thế giới. Với những viên milo vuông vức, đậm đặc, có vị ngọt vừa phải, béo ngậy được cả người lớn lẫn trẻ nhỏ yêu thích.\r\n\r\n\r\nMilo Cube Thái Lan 275g\r\n\r\nPocky Cookies and Cream 45g là bánh quy nhập khẩu chất lượng cao với vị ngon của lớp kem cookies and cream đậm đà bên ngoài và vị giòn tan của vỏ bánh bên trong. Bánh Quy Glico Pocky Cookies and Cream 45g được làm với hình dáng que dễ thương, ngộ nghĩnh, đáng yêu. Hộp bánh chắc chắn mẫu mã đẹp và  ấn tượng.\r\n\r\n\r\nPocky Cookies & Cream Thái\r\n\r\n4. Pocky Trà Xanh Thái\r\n\r\nBánh Pocky Trà Xanh là bánh quy nhập khẩu chất lượng cao với vị ngon của lớp kem trà xanh đậm đà bên ngoài và vị giòn tan của vỏ bánh bên trong, tạo nên hương vị khó quên cho mỗi chiếc bánh thơm ngon, giòn xốp, thơm bơ, mùi vị hấp dẫn.\r\n\r\n\r\nPocky Trà Xanh Thái\r\n \r\nBánh Pocky Trà Xanh được làm từ nguồn nguyên liệu giàu chất dinh dưỡng, không chỉ cung cấp năng lượng cho cơ thể mà còn có hương vị trà xanh thơm ngon, hấp dẫn. Bánh có độ ngọt vừa phải, có thể dùng làm món ăn vặt, bữa ăn nhẹ để bổ sung dinh dưỡng cho cơ thể. Bánh được làm dạng que ngộ nghĩnh, đáng yêu.\r\n\r\n5. Pocky Socola Glico Thái Lan\r\n\r\nBánh que Pocky Glico là dòng sản phẩm snack que cao cấp của Thái Lan, được rất nhiều các bạn trẻ ở nhiều quốc gia yêu thích. Sản phẩm hấp dẫn bởi sự kết hợp độc đáo giữa những que bánh xốp giòn cùng lớp kem phủ socola đầy hấp dẫn. Từng que bánh thanh mảnh cứng giòn bên trong nhưng lại mềm mịn với lớp kem socola bên ngoài luôn tạo cảm giác thích thú cho người thưởng thức.\r\n\r\n\r\nBánh que Pocky Glico\r\n\r\nVới bánh que Pocky Glico, những cuộc trò chuyện, tán gẫu với bạn bè sẽ trở nên thú vị và ngọt ngào hơn. Sản phẩm được đóng hộp nhỏ gọn, đem lại sự thuận tiện cho bạn khi đem theo bên mình để thưởng thức bất cứ khi nào bạn muốn.\r\n \r\nTrên đây là 5 kiểu bánh kẹo Thái Lan nhập khẩu mới lạ đang được rất nhiều người yêu thích hiện nay. Bạn đã thử hết 5 loại bánh kẹo kể trên chưa? Nếu chưa thì hãy nhanh tay săn ngay những món này về nhà trong dịp Tết này.', 'blog9.jpg', '2018-03-02 16:40:11', '0000-00-00 00:00:00', 'Nếu bạn là người yêu thích những hương vị ngọt ngào và mới lạ thì hãy nhanh tay săn ngay 5 kiểu bánh kẹo nhập khẩu Thái Lan dưới đây nào: ...');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `id_type` int(10) UNSIGNED DEFAULT NULL,
  `description` text COLLATE utf8_unicode_ci,
  `unit_price` float DEFAULT NULL,
  `promotion_price` float DEFAULT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `unit` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `new` tinyint(4) DEFAULT '0',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `short_description` text COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `id_type`, `description`, `unit_price`, `promotion_price`, `image`, `unit`, `new`, `created_at`, `updated_at`, `short_description`) VALUES
(1, 'Bánh Crepe Sầu riêng', 5, '', 150000, 0, '1430967449-pancake-sau-rieng-6.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00', ''),
(2, 'Bánh Crepe Chocolate', 6, '', 180000, 160000, 'crepe-chocolate.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(3, 'Bánh Crepe Sầu riêng - Chuối', 5, '', 150000, 120000, 'crepe-chuoi.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(4, 'Bánh Crepe Đào', 5, '', 160000, 0, 'crepe-dao.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(5, 'Bánh Crepe Dâu', 5, '', 160000, 0, 'crepedau.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(6, 'Bánh Crepe Pháp', 5, '', 200000, 180000, 'crepe-phap.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(7, 'Bánh Crepe Táo', 5, '', 160000, 0, 'crepe-tao.jpg', 'hộp', 1, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(8, 'Bánh Crepe Trà xanh', 5, '', 160000, 150000, 'crepe-traxanh.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(9, 'Bánh Crepe Sầu riêng và Dứa', 5, '', 160000, 150000, 'saurieng-dua.jpg', 'hộp', 0, '2016-10-26 03:00:16', '2016-10-24 22:11:00', NULL),
(11, 'Bánh Gato Trái cây Việt Quất', 3, '', 250000, 0, '544bc48782741.png', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(12, 'Bánh sinh nhật rau câu trái cây', 3, '', 200000, 180000, '210215-banh-sinh-nhat-rau-cau-body- (6).jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(13, 'Bánh kem Chocolate Dâu', 3, '', 300000, 280000, 'banh kem sinh nhat.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(14, 'Bánh kem Dâu III', 3, '', 300000, 280000, 'Banh-kem (6).jpg', 'cái', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(15, 'Bánh kem Dâu I', 3, '', 350000, 320000, 'banhkem-dau.jpg', 'cái', 1, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(16, 'Bánh trái cây II', 3, '', 150000, 120000, 'banhtraicay.jpg', 'hộp', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(17, 'Apple Cake', 3, '', 250000, 240000, 'Fruit-Cake_7979.jpg', 'cai', 0, '2016-10-12 02:00:00', '2016-10-27 02:24:00', NULL),
(18, 'Bánh ngọt nhân cream táo', 2, '', 180000, 0, '20131108144733.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(19, 'Bánh Chocolate Trái cây', 2, '', 150000, 0, 'Fruit-Cake_7976.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(20, 'Bánh Chocolate Trái cây II', 2, '', 150000, 0, 'Fruit-Cake_7981.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(21, 'Peach Cake', 2, '', 160000, 150000, 'Peach-Cake_3294.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(22, 'Bánh bông lan trứng muối I', 1, '', 160000, 150000, 'banhbonglantrung.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(23, 'Bánh bông lan trứng muối II', 1, '', 180000, 0, 'banhbonglantrungmuoi.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(24, 'Bánh French', 1, '', 180000, 0, 'banh-man-thu-vi-nhat-1.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(25, 'Bánh mì Australia', 1, '', 80000, 70000, 'dung-khoai-tay-lam-banh-gato-man-cuc-ngon.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(26, 'Bánh mặn thập cẩm', 1, '', 50000, 0, 'Fruit-Cake.png', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(27, 'Bánh Muffins trứng', 1, '', 100000, 80000, 'maxresdefault.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(28, 'Bánh Scone Peach Cake', 1, '', 120000, 0, 'Peach-Cake_3300.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(29, 'Bánh mì Loaf I', 1, '', 100000, 0, 'sli12.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(30, 'Bánh kem Chocolate Dâu I', 4, '', 380000, 350000, 'sli12.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(31, 'Bánh kem Trái cây I', 4, '', 380000, 350000, 'Fruit-Cake.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(32, 'Bánh kem Trái cây II', 4, '', 380000, 350000, 'Fruit-Cake_7971.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(33, 'Bánh kem Doraemon', 4, '', 280000, 250000, 'p1392962167_banh74.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(34, 'Bánh kem Caramen Pudding', 4, '', 280000, 0, 'Caramen-pudding636099031482099583.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(35, 'Bánh kem Chocolate Fruit', 4, '', 320000, 300000, 'chocolate-fruit636098975917921990.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(36, 'Bánh kem Coffee Chocolate GH6', 4, '', 320000, 300000, 'COFFE-CHOCOLATE636098977566220885.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(37, 'Bánh kem Mango Mouse', 4, '', 320000, 300000, 'mango-mousse-cake.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(38, 'Bánh kem Matcha Mouse', 4, '', 350000, 330000, 'MATCHA-MOUSSE.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(39, 'Bánh kem Flower Fruit', 4, '', 350000, 330000, 'flower-fruits636102461981788938.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(40, 'Bánh kem Strawberry Delight', 4, '', 350000, 330000, 'strawberry-delight636102445035635173.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(41, 'Bánh kem Raspberry Delight', 4, '', 350000, 330000, 'raspberry.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(42, 'Beefy Pizza', 6, 'Thịt bò xay, ngô, sốt BBQ, phô mai mozzarella', 150000, 130000, '40819_food_pizza.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(43, 'Hawaii Pizza', 6, 'Sốt cà chua, ham , dứa, pho mai mozzarella', 120000, 0, 'hawaiian paradise_large-900x900.jpg', 'cái', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(44, 'Smoke Chicken Pizza', 6, 'Gà hun khói,nấm, sốt cà chua, pho mai mozzarella.', 120000, 0, 'chicken black pepper_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(45, 'Sausage Pizza', 6, 'Xúc xích klobasa, Nấm, Ngô, sốtcà chua, pho mai Mozzarella.', 120000, 0, 'pizza-miami.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(46, 'Ocean Pizza', 6, 'Tôm , mực, xào cay,ớt xanh, hành tây, cà chua, phomai mozzarella.', 120000, 0, 'seafood curry_large-900x900.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(47, 'All Meaty Pizza', 6, 'Ham, bacon, chorizo, pho mai mozzarella.', 140000, 0, 'all1).jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(48, 'Tuna Pizza', 6, 'Cá Ngừ, sốt Mayonnaise,sốt càchua, hành tây, pho mai Mozzarella', 140000, 0, '54eaf93713081_-_07-germany-tuna.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(49, 'Bánh su kem nhân dừa', 7, '', 120000, 100000, 'maxresdefault.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(50, 'Bánh su kem sữa tươi', 7, '', 120000, 100000, 'sukem.jpg', 'cái', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(51, 'Bánh su kem sữa tươi chiên giòn', 7, '', 150000, 0, '1434429117-banh-su-kem-chien-20.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(52, 'Bánh su kem dâu sữa tươi', 7, '', 150000, 0, 'sukemdau.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(53, 'Bánh su kem bơ sữa tươi', 7, '', 150000, 0, 'He-Thong-Banh-Su-Singapore-Chewy-Junior.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(54, 'Bánh su kem nhân trái cây sữa tươi', 7, '', 150000, 0, 'foody-banh-su-que-635930347896369908.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(55, 'Bánh su kem cà phê', 7, '', 150000, 0, 'banh-su-kem-ca-phe-1.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(56, 'Bánh su kem phô mai', 7, '', 150000, 0, '50020041-combo-20-banh-su-que-pho-mai-9.jpg', 'hộp', 0, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(57, 'Bánh su kem sữa tươi chocolate', 7, '', 150000, 0, 'combo-20-banh-su-que-kem-sua-tuoi-phu-socola.jpg', 'hộp', 1, '2016-10-13 02:20:00', '2016-10-19 03:20:00', NULL),
(58, 'Bánh Macaron Pháp', 2, 'Thưởng thức macaron, người ta có thể tìm thấy từ những hương vị truyền thống như mâm xôi, chocolate, cho đến những hương vị mới như nấm và trà xanh. Macaron với vị giòn tan của vỏ bánh, béo ngậy ngọt ngào của phần nhân, với vẻ ngoài đáng yêu và nhiều màu sắc đẹp mắt, đây là món bạn không nên bỏ qua khi khám phá nền ẩm thực Pháp.', 200000, 180000, 'Macaron9.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00', NULL),
(59, 'Bánh Tiramisu - Italia', 2, 'Chỉ cần cắn một miếng, bạn sẽ cảm nhận được tất cả các hương vị đó hòa quyện cùng một chính vì thế người ta còn ví món bánh này là Thiên đường trong miệng của bạn', 200000, 0, '234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00', NULL),
(60, 'Bánh Táo - Mỹ', 2, 'Bánh táo Mỹ với phần vỏ bánh mỏng, giòn mềm, ẩn chứa phần nhân táo thơm ngọt, điểm chút vị chua dịu của trái cây quả sẽ là một lựa chọn hoàn hảo cho những tín đồ bánh ngọt trên toàn thế giới.', 200000, 0, '1234.jpg', '', 0, '2016-10-26 17:00:00', '2016-10-11 17:00:00', NULL),
(61, 'Bánh Cupcake - Anh Quốc', 6, 'Những chiếc cupcake có cấu tạo gồm phần vỏ bánh xốp mịn và phần kem trang trí bên trên rất bắt mắt với nhiều hình dạng và màu sắc khác nhau. Cupcake còn được cho là chiếc bánh mang lại niềm vui và tiếng cười như chính hình dáng đáng yêu của chúng.', 150000, 120000, 'cupcake.jpg', 'cái', 1, NULL, NULL, NULL),
(62, 'Bánh Sachertorte', 6, 'Sachertorte là một loại bánh xốp được tạo ra bởi loại&nbsp;chocholate&nbsp;tuyệt hảo nhất của nước Áo. Sachertorte có vị ngọt nhẹ, gồm nhiều lớp bánh được làm từ ruột bánh mì và bánh sữa chocholate, xen lẫn giữa các lớp bánh là mứt mơ. Món bánh chocholate này nổi tiếng tới mức thành phố Vienna của Áo đã ấn định&nbsp;tổ chức một ngày Sachertorte quốc gia, vào 5/12 hằng năm', 250000, 220000, '111.jpg', 'cái', 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `slide`
--

CREATE TABLE `slide` (
  `id` int(11) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `slide`
--

INSERT INTO `slide` (`id`, `image`) VALUES
(1, 'slide1.png'),
(2, 'slide2.png'),
(3, 'slide3.png'),
(4, 'slide4.jpg');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `type_products`
--

CREATE TABLE `type_products` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `description` text COLLATE utf8_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `type_products`
--

INSERT INTO `type_products` (`id`, `name`, `description`, `image`, `created_at`, `updated_at`) VALUES
(1, 'Bánh mặn', 'Nếu từng bị mê hoặc bởi các loại tarlet ngọt thì chắn chắn bạn không thể bỏ qua những loại tarlet mặn. Ngoài hình dáng bắt mắt, lớp vở bánh giòn giòn cùng với nhân mặn như thịt gà, nấm, thị heo ,… của bánh sẽ chinh phục bất cứ ai dùng thử.', 'banh-man-thu-vi-nhat-1.jpg', NULL, NULL),
(2, 'Bánh ngọt', 'Bánh ngọt là một loại thức ăn thường dưới hình thức món bánh dạng bánh mì từ bột nhào, được nướng lên dùng để tráng miệng. Bánh ngọt có nhiều loại, có thể phân loại dựa theo nguyên liệu và kỹ thuật chế biến như bánh ngọt làm từ lúa mì, bơ, bánh ngọt dạng bọt biển. Bánh ngọt có thể phục vụ những mục đính đặc biệt như bánh cưới, bánh sinh nhật, bánh Giáng sinh, bánh Halloween..', '20131108144733.jpg', '2016-10-12 02:16:15', '2016-10-13 01:38:35'),
(3, 'Bánh trái cây', 'Bánh trái cây, hay còn gọi là bánh hoa quả, là một món ăn chơi, không riêng gì của Huế nhưng khi \"lạc\" vào mảnh đất Cố đô, món bánh này dường như cũng mang chút tinh tế, cầu kỳ và đặc biệt. Lấy cảm hứng từ những loại trái cây trong vườn, qua bàn tay khéo léo của người phụ nữ Huế, món bánh trái cây ra đời - ngọt thơm, dịu nhẹ làm đẹp lòng biết bao người thưởng thức.', 'banhtraicay.jpg', '2016-10-18 00:33:33', '2016-10-15 07:25:27'),
(4, 'Bánh kem', 'Với người Việt Nam thì bánh ngọt nói chung đều hay được quy về bánh bông lan – một loại tráng miệng bông xốp, ăn không hoặc được phủ kem lên thành bánh kem. Tuy nhiên, cốt bánh kem thực ra có rất nhiều loại với hương vị, kết cấu và phương thức làm khác nhau chứ không chỉ đơn giản là “bánh bông lan” chung chung đâu nhé!', 'banhkem.jpg', '2016-10-26 03:29:19', '2016-10-26 02:22:22'),
(5, 'Bánh crepe', 'Crepe là một món bánh nổi tiếng của Pháp, nhưng từ khi du nhập vào Việt Nam món bánh đẹp mắt, ngon miệng này đã làm cho biết bao bạn trẻ phải “xiêu lòng”', 'crepe.jpg', '2016-10-28 04:00:00', '2016-10-27 04:00:23'),
(6, 'Bánh Pizza', 'Pizza đã không chỉ còn là một món ăn được ưa chuộng khắp thế giới mà còn được những nhà cầm quyền EU chứng nhận là một phần di sản văn hóa ẩm thực châu Âu. Và để được chứng nhận là một nhà sản xuất pizza không hề đơn giản. Người ta phải qua đủ mọi các bước xét duyệt của chính phủ Ý và liên minh châu Âu nữa… tất cả là để đảm bảo danh tiếng cho món ăn này.', 'pizza.jpg', '2016-10-25 17:19:00', NULL),
(7, 'Bánh su kem', 'Bánh su kem là món bánh ngọt ở dạng kem được làm từ các nguyên liệu như bột mì, trứng, sữa, bơ.... đánh đều tạo thành một hỗn hợp và sau đó bằng thao tác ép và phun qua một cái túi để định hình thành những bánh nhỏ và cuối cùng được nướng chín. Bánh su kem có thể thêm thành phần Sô cô la để tăng vị hấp dẫn. Bánh có xuất xứ từ nước Pháp.', 'sukemdau.jpg', '2016-10-25 17:19:00', NULL);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `full_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `address` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `full_name`, `email`, `password`, `phone`, `address`, `remember_token`, `created_at`, `updated_at`) VALUES
(6, 'Chu bình', 'chubinh996@gmail.com', '$2y$10$rGY4KT6ZSMmLnxIbmTXrsu2xdgRxm8x0UTwCyYCAzrJ320kYheSRq', '23456789', 'Hoàng Diệu 2', NULL, '2017-03-23 07:17:33', '2017-03-23 07:17:33');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `bills`
--
ALTER TABLE `bills`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bills_ibfk_1` (`id_customer`);

--
-- Chỉ mục cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bill_detail_ibfk_2` (`id_product`);

--
-- Chỉ mục cho bảng `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_of_date`
--
ALTER TABLE `list_of_date`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `list_of_day`
--
ALTER TABLE `list_of_day`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `products_id_type_foreign` (`id_type`);

--
-- Chỉ mục cho bảng `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `type_products`
--
ALTER TABLE `type_products`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `bills`
--
ALTER TABLE `bills`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `bill_detail`
--
ALTER TABLE `bill_detail`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `customer`
--
ALTER TABLE `customer`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT cho bảng `list_of_date`
--
ALTER TABLE `list_of_date`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `list_of_day`
--
ALTER TABLE `list_of_day`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=63;

--
-- AUTO_INCREMENT cho bảng `slide`
--
ALTER TABLE `slide`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT cho bảng `type_products`
--
ALTER TABLE `type_products`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_id_type_foreign` FOREIGN KEY (`id_type`) REFERENCES `type_products` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
