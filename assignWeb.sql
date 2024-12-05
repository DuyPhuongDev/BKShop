-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost
-- Thời gian đã tạo: Th12 04, 2024 lúc 01:21 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `assignWeb`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart`
--

CREATE TABLE `cart` (
  `cart_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `cart`
--

INSERT INTO `cart` (`cart_id`, `user_id`, `created_at`) VALUES
(1, 36, '2024-12-01 06:26:19');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `cart_items`
--

CREATE TABLE `cart_items` (
  `cart_item_id` int(11) NOT NULL,
  `cart_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `quantity` int(11) NOT NULL,
  `size` varchar(3) NOT NULL,
  `added_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`category_id`, `category_name`) VALUES
(1, 'Áo khoác nam'),
(2, 'Áo khoác nữ'),
(3, 'Áo sơ mi nam'),
(4, 'Quần Jean nam'),
(5, 'Quần lửng nam'),
(6, 'Váy nữ'),
(7, 'Áo nam'),
(8, 'Áo nữ');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `comment`
--

CREATE TABLE `comment` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `news_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('visible','hidden') DEFAULT 'visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `comment`
--

INSERT INTO `comment` (`comment_id`, `user_id`, `content`, `news_id`, `created_at`, `status`) VALUES
(22, 12, 'Test comment 2', 2, '2024-11-25 15:19:58', 'hidden'),
(23, 13, 'Test comment 3', 3, '2024-11-25 15:19:58', 'visible'),
(24, 14, 'Test comment 4', 1, '2024-11-25 15:19:58', 'hidden'),
(25, 15, 'Test comment 5', 2, '2024-11-25 15:19:58', 'visible'),
(26, 16, 'Test comment 6', 3, '2024-11-25 15:19:58', 'hidden'),
(27, 17, 'Test comment 7', 1, '2024-11-25 15:19:58', 'visible'),
(28, 18, 'Test comment 8', 2, '2024-11-25 15:19:58', 'hidden'),
(32, 12, 'Test comment 12', 3, '2024-11-25 15:19:58', 'hidden'),
(33, 13, 'Test comment 13', 1, '2024-11-25 15:19:58', 'visible'),
(34, 14, 'Test comment 14', 2, '2024-11-25 15:19:58', 'hidden'),
(35, 15, 'Test comment 15', 3, '2024-11-25 15:19:58', 'visible'),
(36, 16, 'Test comment 16', 1, '2024-11-25 15:19:58', 'hidden'),
(37, 17, 'Test comment 17', 2, '2024-11-25 15:19:58', 'visible'),
(38, 18, 'Test comment 18', 3, '2024-11-25 15:19:58', 'hidden'),
(41, 36, 'sdadas', 5, '2024-11-26 10:07:21', 'visible'),
(42, 36, 'sdadas', 5, '2024-11-26 10:07:33', 'visible'),
(43, 36, 'huhu', 5, '2024-11-26 10:07:44', 'visible'),
(44, 36, 'huhu', 5, '2024-11-26 10:07:57', 'visible'),
(45, 36, 'haha', 5, '2024-11-26 10:08:00', 'visible'),
(46, 36, 'hihi', 5, '2024-11-26 10:08:17', 'visible'),
(48, 36, 'test cái nữa', 2, '2024-11-27 01:16:33', 'visible'),
(49, 36, 'hihi', 1, '2024-11-28 14:03:40', 'visible'),
(50, 36, 'hihi', 1, '2024-12-03 02:30:30', 'visible');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `topic` varchar(255) NOT NULL,
  `content` text DEFAULT NULL,
  `img_url` varchar(255) NOT NULL,
  `status` enum('visible','hidden') DEFAULT 'visible',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `news`
--

INSERT INTO `news` (`news_id`, `title`, `topic`, `content`, `img_url`, `status`, `created_at`, `updated_at`) VALUES
(1, 'BST hoa tai đầy ma lực của “nữ quỷ hàng hiệu” Park Shin Hye trong “Thẩm phán từ địa ngục”', 'news', 'Áo tweed, túi hiệu là chưa đủ để đo độ xa xỉ của “nữ quỷ” Justitia. BST hoa tai luôn chạm mốc 5 chữ số đến từ các nhà kim hoàn danh tiếng nối dài tủ đồ “tài phiệt” của vị thẩm phán khác thường này.-h4\r\nKhi “nữ quỷ” Justitia sống cuộc đời khác dưới nhân dạng vị thẩm phán Kang Bit Na, cô không chỉ mang đến định nghĩa mới về thực thi công lý. Tủ đồ cứng nhắc của bản gốc đã được thay thế bằng vô số khám phá mới về màu sắc, chất liệu và trên hết là gu thẩm mỹ “tài phiệt” của Justitia. Áo tweed, túi hiệu với số lượng nhiều như trưng bày tại bảo tàng là chưa đủ, nhân vật của Park Shin Hye còn khiến hội tín đồ phải chú ý đến những chi tiết nhỏ – mức giá to trên trang phục: BST hoa tai đến từ các nhà kim hoàn danh tiếng lẫy lừng, thành tố không thể thiếu mỗi khi cô lên hình, dù là khi đang trừng trị những tên tội phạm. Chặng đường phát sóng của “Thẩm phán từ địa ngục” đã kết lại, nhưng một điều chắc chắn rằng hội tín đồ khó mà quên được kho báu trang sức đồ sộ của Justitia, nổi bật nhất là ở những tạo hình sau.\r\n<img>\r\nMặt đá ấn tượng Serpenti SEDUTTORi từ bvlgari-h4\r\nĐá quý là bí quyết cho vẻ ngoài lấp lánh giúp nhận biết giới tinh hoa. Trong lần gặp gỡ đầu tiên với khán giả qua poster chính thức của “Thẩm phán từ địa ngục”, nhân vật của Park Shin Hye thể hiện quyền uy và vị thế phi thường với hoa tai đầu rắn Serpenti Seduttori từ BVLGARI. Sắc đỏ bí ẩn trở thành khung nền tối màu để đôi phụ kiện đính kết theo kỹ thuật pavé (ghép nhiều kim cương nhỏ) thu hút người đối diện, trước khi ra đòn chinh phục với cặp mắt ngọc lục bảo. Giá trị của một item duy nhất đã lên đến 1,3 tỷ đồng.\r\nHoa tai dáng dài Kelly Gavroche từ Hermès-4\r\n“Nữ quỷ hàng hiệu” si mê những chiếc túi Hermès đến mức không thể “an phận” xách trên tay, mà còn muốn tách lẻ phần touret (đai khóa kim loại) trên túi Kelly huyền thoại để biến thành hoa tai. Cô không phải người duy nhất có ý tưởng đó. Hermès đã ra mắt hoa tai Kelly Gavroche để chiều lòng các tín đồ có cùng thị hiếu với nhân vật của Park Shin Hye. Trên đai khóa được khảm nạm 72 viên kim cương lên tới 1.03 carat, thêm hiệu ứng chuyển động với chuỗi mắt xích vàng hồng 18K.\r\nKHUYÊN tai Vintage Alhambra từ Van Cleef & Arpels-h4\r\n<img>\r\nBiểu tượng cỏ bốn lá từ Van Cleef & Arpels chính là nét chấm yểu điệu cần thiết cho bức tranh thời trang tổng thể của Justitia, khẳng định cô gai góc thực thi công lý nhưng vẫn có những khía cạnh mềm mại khi dần học hỏi về tình cảm con người. Lọt vào mắt xanh của cô là phiên bản vàng 18K khắc họa tiết guilloché, viền nạm kim cương.', 'public/img/news/news-1.jpg', 'visible', '2024-11-08 03:22:00', '2024-11-27 01:34:15'),
(2, 'Ca nhiễm tăng, TP.HCM kiểm soát di biến động dân cư ra sao?', 'news', 'TTO - TP.HCM không lập lại các chốt kiểm soát để kiểm tra di biến động dân cư như trước đây. Tuy vậy người dân từ các tỉnh thành đến TP.HCM sẽ phải đăng ký tạm trú tạm vắng để địa phương có biện pháp kiểm soát.-h4\r\n<img>\r\nUBND TP.HCM yêu cầu tăng cường kiểm soát chặt chẽ di biến động dân cư. Các địa phương phải nắm chắc tình hình người dân khi ra, vào địa bàn, người có nguy cơ đang lưu trú, làm việc tại các địa phương, doanh nghiệp như lái xe, phụ xe liên tỉnh, người làm việc ngoài tỉnh về địa phương lưu trú… Từ đó sẽ chủ động các biện pháp quản lý phù hợp.\r\nTuy nhiên trước chủ trương này của thành phố, nhiều người dân bày tỏ sự băn khoăn, không biết liệu thành phố có lập lại các chốt kiểm soát và cần phải chuẩn bị những thủ tục gì khi đến TP.HCM.\r\nTrao đổi về vấn đề này, thượng tá Lê Mạnh Hà - phó trưởng Phòng tham mưu Công an TP.HCM - cho biết TP.HCM không lập lại các chốt kiểm soát để kiểm tra di biến động dân cư như trước đây.\r\nTheo thượng tá Hà, biến động dân cư được hiểu là sự thay đổi về dân cư, thường trú, tạm trú, không phải là lực lượng chức năng kiểm soát người dân đi lại ở các chốt.\r\nHiện nay Công an TP.HCM đang thực hiện các công tác quản lý di biến động dân cư như: đăng ký thường trú, tạm trú, rà soát hộ khẩu, những ai có mặt thực tế ở địa phương. Công an TP cũng đang rà soát, đối sánh các dữ liệu dân cư, cấp mã số định danh cá nhân.\r\nBên cạnh đó ngành công an cũng đang kiểm tra diện thường trú, tạm trú, những người đang lưu trú ở khách sạn, nhà nghỉ... khai báo để quản lý chặt chẽ và thực hiện các chính sách an sinh xã hội.', 'public/img/news/news-2.webp\r\n', 'visible', '2024-11-08 07:57:51', '2024-11-27 01:21:01'),
(3, '50% ca tử vong ở TP.HCM chưa tiêm vắc xin, thành phố đang \"đánh chặn\" số ca chuyển nặng', 'news', 'TTO - Với việc ban hành hướng dẫn gói chăm sóc sức khỏe cho F0 cách ly tại nhà phiên bản 1.6, ngành y tế TP.HCM cho thấy quyết tâm tập trung \"đánh chặn từ xa\" bằng việc kiểm soát F0 cách ly tại cộng đồng không để trở nặng.-h4\r\nKhông phải F0 nào cũng cách ly tại nhà-h4\r\n<img>\r\nTheo thống kê, trong tổng số ca F0 hiện tại có khoảng 70% trường hợp có triệu chứng nhẹ, hoặc không có triệu chứng đang được cách ly chăm sóc tại nhà hoặc khu cách ly tập trung. Làm gì để giảm số ca mắc chuyển nặng? Hướng dẫn mới nhất từ TP.HCM được \"chi tiết hóa\" từ phân loại người F0 nào được cách ly ở nhà; chăm sóc ra sao; nên và không nên làm gì; dấu hiệu cần báo ngay cho y tế và kê đơn, cấp cứu F0 tại nhà...\r\nHướng dẫn lần này quy định rõ hơn về đối tượng được chăm sóc tại nhà khi đảm bảo đủ 2 điều kiện bao gồm không triệu chứng hoặc triệu chứng nhẹ (không có suy hô hấp SpO2 lớn hơn hoặc bằng 96% khi thở khí trời, nhịp thở bằng hoặc dưới 20 lần/phút). Chỉ những F0 có độ tuổi từ 1 - 50 tuổi, không có bệnh nền, không đang mang thai, không béo phì mới được cách ly ở nhà.\r\nNgoài ra quy định này chỉ cho phép một số trường hợp không thỏa các điều kiện nêu trên có thể xem xét cách ly ở nhà nếu có bệnh nền ổn định, bảo đảm tiêm đủ 2 mũi vắc xin hoặc sau 14 ngày kể từ ngày tiêm mũi đầu tiên.\r\nTP Thủ Đức (TP.HCM) là một trong các địa phương được ghi nhận có số ca mắc tăng nhanh gần đây. Ông Nguyễn Văn Chức - giám đốc Trung tâm Y tế TP Thủ Đức - cho biết để \"đánh chặn từ xa\", ngoài 32 trạm y tế cố định, các trạm y tế lưu động, các phường triển khai tổ y tế lưu động đến từng khu phố (trước đây là phường) để kịp thời xử lý các ca F0 chuyển nặng. \"Tổ lưu động của từng khu phố khá đông, bao gồm đủ các ban ngành từ y tế, đoàn thanh niên, dân quân, giáo dục, thành ra việc phản ứng và tiếp cận sẽ được gần người dân hơn\" - ông Chức nói.', 'public/img/news/news-3.webp', 'visible', '2024-11-08 07:58:31', '2024-11-27 01:21:39'),
(4, 'BST The Fairy Tale từ Disney|PNJ: Món quà trang sức đặc biệt tặng nàng công chúa độc nhất', 'news', 'Có lẽ, mỗi cô gái đều ít nhất một lần trong đời ước mơ trở thành nàng công chúa lộng lẫy. Thật ra, ước mơ ấy chẳng xa xôi! Bởi lẽ, trong mắt gia đình hay của một nửa yêu thương, các cô gái đều là nàng công chúa bé bỏng, đáng yêu và xinh đẹp nhất. Và yêu thương sẽ càng thêm ý nghĩa khi ta hành động hoặc trao lời trực tiếp. Disney|PNJ sẽ giúp các bậc phụ huynh và các “chàng hoàng tử” hoàn thành “giấc mơ công chúa” của cô gái yêu thương.\r\n\r\nHãy cùng khám phá xem, món quà lộng lẫy từ Disney|PNJ này có gì đặc biệt nhé!\r\n\r\nQuà tặng độc đáo đầy tinh tế cho nàng công chúa-h4\r\n<img>\r\nBộ sưu tập The Fairy Tale từ Disney|PNJ mang đến những bộ trang sức lấy cảm hứng từ các nàng công chúa nổi tiếng. Một bộ trang sức sẽ bao gồm: mặt dây chuyền, bông tai, dây cổ, vương miện. Điều làm nên sự đặc biệt của bộ trang sức này chính là tính năng convertible – tức là ngoài việc đeo riêng lẻ, các sản phẩm còn có thể lắp ghép với nhau để tạo nên một phiên bản vương miện hoàn chỉnh cùng hàng trăm viên kim cương và đá quý. Chiếc vương miện lộng lẫy này có thể cùng cô công chúa xuất hiện ở ngày tốt nghiệp, lễ trưởng thành hoặc ngày kết hôn,… Đây chắc chắn sẽ là một trong những khoảnh khắc đẹp nhất trong đời nàng công chúa.\r\nĐể xứng tầm với tâm ý được gửi trao của người tặng, Disney|PNJ cũng thiết kế quy cách đóng gói tinh tế và sang trọng cho bộ sản phẩm này. Khi gửi đến khách hàng, bộ trang sức The Fairy Tale được cất giữ trong hộp đựng xanh hoàng gia đẳng cấp, kèm theo thư cảm ơn, giấy chứng nhận và hướng dẫn chi tiết cách sử dụng cũng như khăn lau trang sức.\r\nVới tính chất sang trọng và độc đáo, quý khách lưu ý sản phẩm này cần được đặt hàng trước ít nhất 60 ngày làm việc để đảm bảo quá trình chế tác và giao nhận được thực hiện một cách hoàn hảo.\r\n\r\nBộ trang sức công chúa Lọ Lem – Sự trân trọng tính cách lạc quan và kiên cường-h4\r\n\r\nLựa chọn đầu tiên mà Disney|PNJ mang đến là bộ trang sức Kim cương Vàng trắng 14K Disney|PNJ Cinderella DDMXW000001 được lấy cảm hứng từ câu chuyện cổ tích của nàng Lọ Lem. Đây là món quà để cổ vũ cho những nàng công chúa có tính cách lạc quan, kiên cường và luôn vững tin vào tình yêu đôi lứa.\r\n<img>\r\nTừ câu chuyện tình lãng mạn của nàng Lọ Lem, việc trao tặng bộ trang sức này cho người phụ nữ đặc biệt giúp “hoàng tử” gửi đi thông điệp sâu sắc: “Anh sẽ dùng tất cả yêu thương của mình để che chở cho em suốt cuộc đời này!”. Đó không chỉ là một món quà, mà còn là sự hứa hẹn cho một chuyện tình vĩnh cửu.\r\n\r\nNgoài ý nghĩa tôn vinh tình yêu, bộ trang sức này còn gây ấn tượng bởi vẻ đẹp lộng lẫy, kiêu sa. Vốn dĩ được tạo nên bởi gần 600 viên kim cương tinh tuyển cùng những viên đá sapphire cao cấp, đây sẽ là món quà sang trọng, thể hiện sự trân quý và tâm ý của người trao tặng.\r\n\r\nBộ trang sức nàng tiên cá Ariel – Sự cổ vũ cho tâm hồn khát khao khám phá-h4\r\n\r\nGợi ý thứ 2 là bộ trang sức Kim cương Vàng trắng 14K Disney|PNJ The Little Mermaid DDMXW000002 đại diện cho nàng tiên cá Ariel đầy phóng khoáng. Mang cả đại dương Atlantica huyền ảo vào thiết kế, bộ trang sức này ca ngợi tinh thần độc lập và cá tính của người phụ nữ hiện đại.\r\n<img>\r\nĐây là món quà ngay cả khi gia đình hay “hoàng tử” dành tặng cho nửa kia thì lời nhắn yêu chiều cũng là “Hãy thỏa sức chinh phục ước mơ vì công chúa sẽ luôn có sự cổ vũ của cả nhà!”. Sự quan tâm ủng hộ này sẽ là nguồn động viên to lớn để nàng công chúa vững vàng trong những bước tiến mới của cuộc sống.\r\n\r\nSử dụng gần 800 viên kim cương tinh tuyển kết hợp cùng đá sapphire và đặc biệt là ngọc trai cao cấp, bộ trang sức Kim cương Vàng trắng 14K Disney|PNJ The Little Mermaid DDMXW000002 chắc chắn sẽ làm nổi bật vẻ đẹp lộng lẫy của nàng công chúa. Đặc biệt, bộ trang sức này có thể song hành cùng công chúa trong những sự kiện trọng đại lẫn cuộc sống ngày thường. Thậm chí, đây còn có thể trở thành “bảo bối gia truyền” đầy ý nghĩa đối với gia đình!\r\nNếu các bậc phụ huynh hoặc những chàng hoàng tử đang ấp ủ dự định trao quà cho nàng công chúa thì những bộ trang sức The Fairy Tale từ Disney|PNJ rất xứng đáng được cân nhắc! Hiện tại, khi đặt hàng qua website, PNJ sẽ dành tặng thêm nhiều ưu đãi hấp dẫn. Quý khách có thể xem chi tiết tại đây nhé!', 'public/img/news/news-4.jpg', 'visible', '2024-11-26 06:33:43', '2024-11-27 01:34:04'),
(5, '5 gợi ý trang sức STYLE by PNJ không thể bỏ lỡ tại Black Friday – ngày hội ưu đãi lớn nhất năm', 'news', 'Sự kiện mua sắm lớn nhất năm sắp đến! Bạn đã sẵn sàng để “săn” những món trang sức đẹp lung linh với giá ưu đãi chưa từng có chưa? Nếu bạn đang tìm kiếm những thiết kế độc đáo và thời thượng để tỏa sáng trong những sự kiện cuối năm, thì đừng bỏ qua 5 gợi ý trang sức STYLE by PNJ siêu hot sau đây nhé!\r\n\r\nDây cổ Bạc đính đá STYLE By PNJ Love Potion ZTZTH000004-h4\r\n\r\nĐính kết charm trái tim cùng sắc đá hồng ngọt ngào, dây chuyền bạc STYLE By PNJ Love Potion ZTZTH000004  sẽ khiến bạn trở nên đáng yêu hơn bao giờ hết. Những đường nét uyển chuyển cùng hạt bi li ti tạo nên một tổng thể hài hòa, mang đến cảm giác lãng mạn và dịu dàng cho người đeo.\r\n<img>\r\nMỗi ngày là một món quà, hãy tận hưởng từng khoảnh khắc bạn nhé! Mẫu dây chuyền này như liều “vitamin”, giúp bạn luôn tràn đầy năng lượng và niềm vui. Hãy để những trái tim nhỏ bé trên dây chuyền nhắc nhở bạn rằng bạn xứng đáng với những điều tốt đẹp nhất.\r\nMùa lễ hội cuối năm đang đến! Dù là cuộc gặp mặt nhẹ nhàng hay tham gia bữa “party” sôi động, bạn hãy tỏa sáng cùng sự kết hợp hoàn hảo của một chiếc váy sắc màu cùng đôi bông tai phong cách từ Style by PNJ nhé!\r\n\r\nBông tai Bạc STYLE By PNJ 0000W060061-h4\r\n\r\nBạn là một cô nàng nhí nhảnh, tươi vui và đang tìm kiếm một món phụ kiện để thể hiện cá tính? Bông tai bạc STYLE By PNJ 0000W060061 với hình ảnh chú thỏ tinh nghịch cùng sắc bạc bắt mắt sẽ là lựa chọn “perfect” dành cho outfits của bạn đấy!\r\n<img>\r\nHãy cùng “quẩy” hết mình trong mọi khoảnh khắc với đôi bông tai siêu cool này! Màu sắc nổi bật cùng thiết kế độc đáo của phụ kiện sẽ giúp bạn trở thành tâm điểm mọi ánh nhìn. Mix & match cùng outfit đen, đảm bảo bạn sẽ ‘chất phát ngất’ luôn đấy!\r\n\r\nLắc tay Bạc đính đá STYLE By PNJ DNA ZTXMC000001-h4\r\n\r\nBạn đã sẵn sàng để tạo nên một phong cách thời trang thật sự ấn tượng? Hãy thử kết hợp  chiếc lắc tay Bạc STYLE By PNJ DNA ZTXMC000001 độc đáo này cùng đôi bông tai được giới thiệu bên trên. Sự tương phản giữa hai dây xích vàng – bạc cùng mặt dây ADN cách điệu sẽ khiến bạn trở nên thật “unique”.\r\n<img>\r\nNgoài những món trang sức bling bling trên, STYLE by PNJ còn mang đến cho bạn vô số thiết kế “đỉnh nóc kịch trần” cùng ưu đãi hấp dẫn trong dịp Black Friday này. Khám phá ngay tại đây để “pick” về cho mình những món trang sức iu thích và lung linh dịp cuối năm bạn nhé!', 'public/img/news/news-5.jpg', 'visible', '2024-11-26 06:50:18', '2024-11-27 01:34:20'),
(6, 'Thể lệ áp dụng một số chương trình khuyến mãi tại PNJ', 'sales', 'Cảm ơn quý khách hàng đã và đang đồng hành cùng PNJ trong thời gian qua. Để tri ân, thể hiện sự trân trọng của PNJ cũng như mang đến những trải nghiệm tốt hơn, PNJ thân gửi đến quý khách hàng ưu đãi cho lần mua sắm kế tiếp, mã code sẽ được hệ thống gửi qua tin nhắn.\r\n\r\nChúc quý khách có những trải nghiệm mua sắm tuyệt vời cùng PNJ trong thời gian tới.\r\n\r\nChương trình khuyến mãi Mã Saledeal: 70004764-h4\r\nThời hạn sử dụng: Theo thời hạn chi tiết trong nội dung tin nhắn\r\nGiá trị giảm: Theo thời hạn chi tiết trong nội dung tin nhắn\r\nPhạm vi áp dụng: Đơn hàng đặt hàng qua kênh bán PNJ Hotline và khách mua Online – nhân tại cửa hàng; Không giới hạn phương thức thanh toán và hình thức giao hàng.\r\nNhãn hàng áp dụng: PNJ, PNJSilver, STYLE by PNJ, Disney|PNJ, PNJ Watch, Sanrio\r\nLưu ý thể lệ:\r\nKhông áp dụng đồng thời với bất kì ưu đãi nào khác (Bao gồm CS thẻ VIP, VIP pass giảm giá, quà tặng, Code ưu đãi…) trừ chương trình “Ưu đãi khách hàng mới giảm thêm 1%”\r\nTrường hợp đặt hàng làm lại ni, size,… khách hàng cần đặt cọc 100% giá trị đơn hàng để áp dụng ưu đãi từ chương trình. Đơn hàng phải xuất trước khi mã ưu đãi hết hạn sử dụng.\r\n● Không áp dụng cho các dòng/nhóm sản phẩm: Trang sức dây chuyền, trang sức không gắn đá chất liệu Vàng/Platinum, vàng miếng (bao gồm vàng miếng tài lộc, kim bảo…), nhẫn trơn, trang sức vàng 22k 24k, kim cương rời, đá rời, trang sức bộ lớn, phụ kiện và sản phẩm PNJ Art.', 'public/img/news/news-6.jpg', 'visible', '2024-11-27 01:33:51', '2024-11-27 01:52:39'),
(7, 'Tận Hưởng Ưu Đãi – Trải Nghiệm Tuyệt Vời', 'sales', 'Cảm ơn quý khách hàng đã và đang đồng hành cùng PNJ trong thời gian qua. Để tri ân, thể hiện sự trân trọng của PNJ cũng như mang đến những trải nghiệm tốt hơn, PNJ thân gửi đến quý khách hàng ưu đãi cho lần mua sắm kế tiếp, mã code sẽ được hệ thống gửi qua tin nhắn.\r\n\r\nChúc quý khách có những trải nghiệm mua sắm tuyệt vời cùng PNJ trong thời gian tới.\r\n\r\nThời hạn sử dụng: Theo thời hạn chi tiết trong tin nhắn-h4\r\n\r\nPhạm vi áp dụng: Đơn hàng đặt hàng qua kênh bán PNJ Online (Website, Hotline, Facebook, Zalo,…) và khách mua Online – nhân tại cửa hàng; Không giới hạn phương thức thanh toán và hình thức giao hàng.\r\nMỨC HÓA ĐƠN	ƯU ĐÃI ÁP DỤNG\r\nTừ 200.000đ	100.000đ\r\nTừ 400.000đ	200.000đ\r\nTừ 1.000.000đ	500.000đ\r\nLưu ý:-h4\r\n\r\nKhông áp dụng đồng thời với bất kì ưu đãi nào khác (Bao gồm chính sách thẻ VIP, VIPpass giảm giá, quà tặng, Code ưu đãi…).\r\nTrường hợp khách hàng có nhu cầu đặt làm lại ni, size,… hoặc chờ điều chuyển hàng hóa và muốn giữ ưu đãi từ chương trình, khách hàng cần đặt cọc 100% giá trị đơn hàng để áp dụng ưu đãi từ chương trình. Đơn hàng phải xuất trước khi mã ưu đãi hết hạn sử dụng.\r\nKhông áp dụng cho các dòng/nhóm sản phẩm: Trang sức dây chuyền, trang sức không gắn đá, trang sức vàng tài lộc, nhẫn trơn, trang sức vàng 22k/24k, kim cương rời, đá rời, PNJ Art, phụ kiện và trang sức bộ lớn.\r\nƯu đãi KHÔNG áp dụng cho cộng gộp hóa đơn, ngoại trừ trường hợp:\r\nĐơn hàng Online chứa nhiều sản phẩm có tồn ở các cửa hàng khác nhau;\r\nĐơn hàng mua trang sức hợp kim cao cấp STYLE by PNJ bị tách rời với các chất liệu khác.\r\nMức chiết khấu từ chương trình giảm giá trực tiếp, giảm mã ưu đãi: không được vượt quá 50% giá trị sản phẩm được hưởng ưu đãi.\r\nChương trình áp dụng với các chính sách hiện hành của PNJ như: chính sách hoàn tiền; chính sách giao hàng; chính sách bảo hành thu đổi, chính sách trả góp, chính sách tích điểm thành viên, chính sách bảo mật thông tin khách hàng và quy định đặt cọc (ưu tiên thể lệ áp dụng của từng chương trình).\r\nTrường hợp khách hàng có nhu cầu đổi ni, size sản phẩm có ưu đãi:\r\nĐối với sản phẩm bạc: khách hàng được giữ ưu đãi cho sản phẩm mới chỉ khi đổi trong vòng 72h kể từ khi nhận sản phẩm.\r\nĐối với sản phẩm vàng: khách hàng được giữ ưu đãi cho sản phẩm mới chỉ khi đổi trong vòng 48h kể từ khi nhận sản phẩm.\r\nCác ưu đãi trực tiếp/code (mã) ưu đãi được cấn trừ trực tiếp vào hóa đơn bán hàng và không có giá trị quy đổi thành tiền mặt.', 'public/img/news/news-7.jpg', 'visible', '2024-11-27 01:37:50', '2024-11-27 01:52:43'),
(8, 'Top 6 trang sức có ưu đãi Độc Quyền Online tốt nhất tháng 10/2023', 'sales', 'Các quý cô có thể thỏa sức mua sắm hàng ngàn sản phẩm trang sức trên website với mức giá cực hời nhờ các ưu đãi ĐỘC QUYỀN ONLINE duy nhất trong tháng 10 này.\r\n\r\nHãy cùng điểm qua Top 5 trang sức có ưu đãi Độc Quyền Online tốt nhất tháng 10/2023 chị em nhé!\r\n\r\nƯu đãi Độc Quyền Online tốt nhất tháng 10/2023 nàng nhé!-h4\r\n\r\nƯU ĐÃI THEO DANH MỤC ĐẾN 50%\r\nĐể cổ vũ phái đẹp tự tin tỏa sắc và thỏa sức thể hiện cá tính bản thân, PNJ dành tặng nàng hàng loạt ưu đãi ĐỘC QUYỀN ONLINE cho sản phẩm theo danh mục, áp dụng trong suốt tháng 10 (01/10 – 31/10/2023):\r\n\r\nTrang sức bạc ưu đãi đến 50%\r\nTrang sức vàng ưu đãi đến 35%\r\nBạn có thể xem chi tiết chương trình tại đây: www.pnj.com.vn/khuyen-mai/\r\n\r\nGợi ý sản phẩm:\r\n\r\nNhẫn Vàng 14K đính ngọc trai Freshwater PNJ cánh bướm xếp 2 tầng PFXMX000005-h4\r\n\r\nThiết kế cánh bướm 2 tầng tinh tế, lạ mắt, tạo nên sự nữ tính, quý phái cho người sở hữu sản phẩm. Đặc biệt, viên ngọc trai Freshwater chính là điểm nhấn nổi bật để tăng thêm phần ấn tượng khi nàng diện chiếc nhẫn vàng này. Sản phẩm đang có ưu đãi 25% trong tháng 10, nàng đừng bỏ lỡ!\r\n<img>\r\nNgoài các sản phẩm gợi ý trong bài viết này, bạn có thể lựa chọn cho mình item ưng ý trong hàng ngàn sản phẩm trang sức đang có ưu đãi tại www.pnj.com.vn. Bên cạnh đó, khi mua hàng với PNJ Online, bạn có thể tận hưởng dịch vụ giao nhanh 3 giờ, gửi thiệp online miễn phí,… cực kỳ tiện lợi. Đừng bỏ lỡ loạt ưu đãi quá hấp dẫn của tháng 10 bạn nhé!', 'public/img/news/news-8.jpg', 'visible', '2024-11-27 01:40:49', '2024-11-27 01:41:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `payments`
--

CREATE TABLE `payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `method` varchar(255) NOT NULL,
  `total_price` decimal(10,0) NOT NULL,
  `status` varchar(50) NOT NULL DEFAULT 'Đang vận chuyển',
  `payment_date` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `payments`
--

INSERT INTO `payments` (`payment_id`, `user_id`, `method`, `total_price`, `status`, `payment_date`) VALUES
(12, 36, 'COD', 200000, 'Đã nhận hàng', '2024-11-03 08:23:12'),
(13, 36, 'COD', 400000, 'Đã nhận hàng', '2024-12-03 08:34:28'),
(14, 36, 'VNPay', 550000, 'Đã nhận hàng', '2024-12-03 08:44:53'),
(15, 36, 'VNPay', 550000, 'Đang vận chuyển', '2024-10-03 08:45:24'),
(16, 36, 'VNPay', 200000, 'Đã nhận hàng', '2024-12-03 08:46:39'),
(17, 36, 'COD', 51000, 'Đang vận chuyển', '2024-08-03 08:47:53'),
(18, 36, 'VNPay', 150000, 'Đang vận chuyển', '2024-12-03 08:52:09');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `product_id` int(11) NOT NULL,
  `product_name` varchar(100) NOT NULL,
  `description` text DEFAULT NULL,
  `image_url` text DEFAULT NULL,
  `price` decimal(10,2) NOT NULL,
  `category_id` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`product_id`, `product_name`, `description`, `image_url`, `price`, `category_id`, `created_at`, `updated_at`) VALUES
(2, 'Áo khoác nam đen', '✔️ áo khoác đẹp, phong cách hàn quốc hiện đại giúp bạn phát huy được sự cá tính, năng động của bản thân. \r\n✔️ áo khoác nam là mẫu áo khoác quen thuộc với hầu hết mọi chàng trai  và các nàng rồi đúng không nào, để phù hợp với gu thời trang hiện đại ngày nay các kiểu áo khoác dù được thiết kế đa dạng kiểu dáng lạ mắt mang đến gu thời trang năng động, khỏe khoắn cho người mặc. Các bạn có thể diện áo khoác gió tới công sở, dạo phố, đi học, dã ngoại,.....đề phù hợp đấy. Hãy nhanh chóng chọn cho mình một kiểu áo khoác để thay đổi phong cách hàng ngày của bản thân nào.\r\n📣Chất liệu cúa áo khoác nỉ nam : nỉ cao cấp 2 lớp', 'public/img/products/jean_nam.png', 150000.00, 1, '2024-11-08 02:56:57', '2024-11-23 14:33:35'),
(3, 'Áo Khoác Cardigan Trắng Nâu Túi Gấu Nữ form rộng xinh xắn', 'Áo Khoác Cardigan Trắng Nâu Túi Gấu Nữ form rộng xinh xắn <br>\r\nÁo Khoác Cardigan Túi Gấu Be Nâu\r\n - Form: Freesize, 60-70kg đổ lại mặc oke \r\n- kích thước : dài 63cm, rộng 55cm, tay 54cm, vai 54cm\r\n- Phân loại: be, nâu\r\n- Chất liệu: Nỉ Bông\r\n #cardigan #cardigannamnu #cardiganformrong #aocardigan #aokhoac', 'public/img/products/ao_choang_nu.png', 200000.00, 2, '2024-11-08 02:58:14', '2024-11-23 14:34:02'),
(4, 'ÁO SƠ MI NAM DÀI TAY THỜI TRANG HÀN QUỐC CAO CẤP', 'Áo sơ mi nam dài tay, vải đẹp cao cấp loại 1 trên thị trường.\r\nÁo sơ mi nam cổ bẻ dài tay (sơ mi nam) được thiết kế với form dáng trẻ trung với form áo ôm, rất chuẩn như hình.\r\nChúng tôi hiện nay cung cấp áo sơ mi nam với giá bán lẻ tốt nhất trên thị trường.\r\n--Giá cạnh tranh nhất do chính nhà máy sản xuất với số lượng lớn.\r\n--Chúng tôi không nói sản phẩm của mình có chất lượng cao nhưng phải khẳng định chất lượng sản phẩm vượt trội so với giá tiền. \r\n--Uy tín bán hàng được đặt lên hàng đầu, không kinh doanh chộp giật.\r\n--Vì sản phẩm được sản xuất với số lượng lớn để có giá cạnh tranh nên không thể tránh được sai sót. Nếu quý khách hàng không hài lòng chúng tôi sẵn sàng hỗ trợ đổi trả.\r\n--Rất mong nhận được ý kiến đóng góp của Quý khách hàng để chúng tôi cải thiện chất lượng dịch vụ tốt hơn.', 'public/img/products/ao_so_mi_nam.png', 85000.00, 3, '2024-11-08 02:58:56', '2024-11-23 14:34:09'),
(5, 'Quần baggy nam ống rộng kiểu dáng quần jean nam ống suông cao cấp đẹp', 'THÔNG TIN SẢN PHẨM  Quần jean nam\r\n✔️Chất liệu: 98% cotton, 2% spandex.\r\n\r\n✔️Đặc tính: Co giãn, hút ẩm tốt và thấm hút mồ hôi.\r\n\r\n✔️Hướng dẫn sử dụng: quần baggy nam\r\n\r\n- Giặt ở nhiệt độ bình thường.\r\n\r\n- Không được dùng hóa chất tẩy, ủi ở nhiệt độ thích hợp.\r\n\r\n- Hạn chế sử dụng máy sấy.\r\n ✔️ Sản xuất: Hàng Việt Nam Xuất Khẩu\r\n ✔️ Màu sắc, mẫu mã giống hình 100%\r\n ✔️ Chấp nhận đổi trả nếu có bất cứ vấn đề nào liên quan đến chất lượng', 'public/img/products/jean_nam.png', 79000.00, 4, '2024-11-08 03:09:24', '2024-11-23 14:34:14'),
(6, 'Quần jean baggy nam ống rộng suông cao cấp chất bò đẹp 007', 'THÔNG TIN SẢN PHẨM  Quần jean nam\r\n✔️Chất liệu: 98% cotton, 2% spandex.\r\n\r\n✔️Đặc tính: Co giãn, hút ẩm tốt và thấm hút mồ hôi.\r\n\r\n✔️Hướng dẫn sử dụng: quần baggy nam\r\n\r\n- Giặt ở nhiệt độ bình thường.\r\n\r\n- Không được dùng hóa chất tẩy, ủi ở nhiệt độ thích hợp.\r\n\r\n- Hạn chế sử dụng máy sấy.\r\n ✔️ Sản xuất: Hàng Việt Nam Xuất Khẩu\r\n ✔️ Màu sắc, mẫu mã giống hình 100%\r\n ✔️ Chấp nhận đổi trả nếu có bất cứ vấn đề nào liên quan đến chất lượng', 'public/img/products/24526a479ebbc5730bf0472e5d355170.png', 129000.00, 4, '2024-11-08 03:10:03', '2024-11-23 14:34:20'),
(7, 'Quần sọt nam, quần lửng nam, quần short jean nam màu trắng rách cao cấp 2021 QJNA0002', 'THÔNG TIN CHI TIẾT SẢN PHẨM QUẦN JEAN NAM\r\nQuần sọt nam, quần lửng nam, quần short jean nam màu trắng rách cao cấp 2021 QJNA0002\r\n + Chất liệu vải jean demin cao cấp\r\n + Được thiết kế phù hợp với độ tuổi từ 18 đến 30 tuổi \r\n+ Quần vải jean mềm mại thấm hút mồ hôi tốt, thoải mái khi mặc \r\n+ Quần có thể kết hợp với nhiều loại trang phục để mặc ở nhà hay đi chơi, du lịch,…\r\nCÁCH SỦ DỤNG VÀ BẢO QUẢN QUẦN JEAN NAM ,\r\n+ Giặt bằng máy phơi khô dưới ảnh nắng trực tiếp\r\n + Bảo quản trong nơi khô ráo thoáng mát , tránh nơi ẩm ướt\r\n CÁCH CHỌN SIZE TỪ 28-32 CỦA QUẦN JEAN NAM \r\n+ SIZE 28: cao dưới 1m65, nặng 45 - 50Kg, vòng bụng 79cm \r\n+ SIZE 29: cao dưới 1m68, nặng 50 - 55Kg, vòng bụng 81cm \r\n+ SIZE 30: cao dưới 1m7, nặng 55 - 59Kg, vòng bụng 83cm \r\n+ SIZE 31: cao dưới 1m73, nặng 60 - 64Kg, vòng bụng 85cm \r\n+ SIZE 32: cao dưới 1m78, nặng 65 - 70Kg, vòng bụng 86cm\r\n SHOP…  XIN CAM KẾT \r\n+ Sản phẩm chất lượng tốt, đúng như mô tả \r\n+ Giao hàng ngay khi nhận được đơn\r\n + Đổi, trả với những sản phẩm lỗi do nhà sản xuất \r\n+ Lưu ý: Không nhận đổi trả với lí do không vừa ý ', 'public/img/products/7cf42a990082379716da4356e59ed97c.png', 100000.00, 5, '2024-11-08 03:10:40', '2024-11-23 14:34:35'),
(8, 'Quần đùi thể thao nam GYMKAI, quần short 2 lớp, lót legging lửng, thoải mái vận động', 'QUẦN ĐÙI THỂ THAO NAM GYMKAI, QUẦN SHORT 2 LỚP, LÓT LEGGING LỬNG, THOẢI MÁI VẬN ĐỘNG\r\n- Quần với thiết kế 2 lớp chuyên dụng với lớp trong là quần legging lửng may liền với quần tập gym chắc chắn bên ngoài.\r\n- Chất liệu:\r\n+ Vải ngoài: 100% Polyester Microfiber\r\n+ Vải trong : 95% Polyester 5% Spandex\r\n- Thiết kế 2 lớp chuyên dụng phù hợp với đặc tính vận động khi tập luyện hoặc tham gia hoạt động thể thao.\r\n- Lớp trong với chất liệu thun lạnh co giãn 4 chiều hỗ trợ bó cơ khi tập luyện và vận động, lớp vải ngoài thông hơi thấm hút mồ hôi cực tốt.\r\n- Quần ngoài form ngắn trên gối mang đến vẻ ngoài mạnh mẽ, nam tính khi vận động\r\n- Chất liệu quần đạt tiêu chuẩn xuất khẩu không xù lông, không bai nhão, không phai màu\r\n- Quần có 2 màu : Đen và Xám \r\n- Quần short thể thao nam 2 lớp cao cấp được thiết kế theo đúng form chuẩn của nam giới Việt Nam.\r\n- Thích hợp chơi thể thao, chạy bộ, tập gym, chơi bóng rổ, bóng chuyền, mặc nhà, đi chơi dạo phố,...\r\n- Nơi sản xuất : được thiết kế và may sản xuất trực tiếp tại Việt Nam.', 'public/img/products/d80c30fde4bfcc552714f0fcd95ff469.png', 208000.00, 5, '2024-11-08 03:11:50', '2024-11-23 14:34:39'),
(9, 'Quần lửng nam Fasvin T21438.HN vải gió co giãn mềm mát tiện dụng mặc nhà và thể thao', '=>  Các shop có thương hiệu đều luôn giữ gìn uy tín của mình. Đến với Fasvin bạn cũng sẽ được phục vụ tận tình chu đáo.\r\n\r\n=>  Quần lửng nam Fasvin T21438.HN được chế tạo tại nhà máy của FASVIN với quy trình thu hóa nghiệm ngặt. Các sản phẩm đều được những người thợ lâu năm trong nghề làm ra một cách cẩn thận và chắc chắn. Quần rất đa dụng có thể mặc đi chơi, thể thao hay mặc nhà. \r\n\r\n* KIỂU DÁNG : Quần lửng nam thể thao Fasvin có thiết kế dáng lửng dài đến đầu gối, dài hơn các mẫu quần short thường khoảng 5 cm tạo cảm giác  khoẻ khoắn, năng động nhưng không kém phần lịch sự. Quần có thiết kế đơn giản phù hợp với nhiều lứa tuổi từ thanh niên đến trung niên. Quần lửng thể thao Fasvin được may vừa vặn đứng dáng nên tiện dụng  đi chơi  thể thao, dạo phố hay mặc nhà.\r\n\r\n*CHẤT  LIỆU : Vải gió chun thể thao co giãn 4 chiều (95% Polyester + 5% spandex) thoải mái mềm mát. Đây là loại vải dệt thoi chứ không phải dệt kim nên đứng dáng và lịch sự có thể đi chơi hay mặc nhà tiếp khách. Chất vải thoáng mát và bền chắc thích hợp các hoạt động mạnh mẽ. \r\n\r\n* GIÁ CẢ : Chúng tôi luôn không ngừng cải tiến để có thể tạo ra những sản phẩm có chất lượng tốt với giá cả phải chăng nhất. Hơn nữa luôn có các chương trình khuyến mại dành cho quý khách dùng thử và trải nghiệm sản phẩm mới.\r\n\r\n* CHẤT LƯỢNG: Quần lửng nam đã được kiểm định chất lượng bởi cục tiêu chuẩn chất lượng và có tem hợp quy được dán trên thẻ bài.\r\n\r\n* BẢO QUẢN VÀ SỬ DỤNG : Sản phẩm có thể giặt máy, nhanh khô và không bị bạc màu. Đặc biệt nếu bạn là người bận rộn, bạn không cần là lượt trước khi mặc vì vải đã được tích hợp công nghệ chống nhăn, chống nhàu.\r\n', 'public/img/products/5472f307a0db884dadb06f5d9010d5aa.png', 175000.00, 5, '2024-11-08 03:12:50', '2024-11-23 14:34:43'),
(10, 'Quần Ngố Kaki Nam Túi Hộp Lửng GENVIET Basic Đơn Giản T1303K1026', 'CHÍNH SÁCH MUA HÀNG: \r\n+ Hỗ trợ đổi hàng với những sản phẩm bị lỗi do nhà sản xuất, hoặc những sản phẩm giảm giá dưới 50% mà không vừa size số.\r\n+ Inbox trực tiếp để GENVIET tư vấn size và giải đáp các vấn đề bạn đang quan tâm nhé.\r\n+ Bạn nhận được sản phẩm, vui lòng đánh giá giúp GENVIET nha.\r\n- Chỉ áp dụng đổi với sản phẩm mua nguyên giá.\r\n- Không áp dụng đổi đối với hàng khuyến mại, hàng giảm giá hoặc mua trong chương trình ưu đãi khác.\r\n- Vì lý do sức khỏe, không đổi trả quần áo lót, phụ kiện.\r\n- Sản phẩm chưa qua sử dụng, còn nguyên tem mác, thẻ bài và kèm hóa đơn hoặc biên lai vận chuyển.\r\n------------------------------------------------------\r\nHƯỚNG DẪN GIẶT ỦI\r\n- Không giặt tẩy bằng các chất tẩy rửa mạnh\r\n- Không ngâm nước quá lâu\r\n- Không nên ngâm và giặt chung với sản phẩm khác\r\n- Cách giặt đồ: Lấy 1-2 giọt sữa tắm, dầu gội đầu… đánh bông lên, cho sản phẩm vào -bóp nhẹ, rũ qua sau đó rũ lại bằng nước sạch rồi phơi lên luôn, tránh ngâm lâu.\r\n- Với những sản phẩm chất liệu ren, có phụ kiện không nên giặt sản phẩm cùng với các sản phẩm cầu kì khác như: Có móc, có khóa cứng, có nhiều họa tiết …. sẽ làm ảnh hưởng đến chất liệu sản phẩm. (Sản phẩm ren và lưới hoặc vải mềm mỏng nên giặt bằng tay, nếu giặt máy vui lòng bỏ vào túi lưới để tránh làm hư sợi vải)\r\n- Đối với sản phẩm có chất co giãn mạnh, khi phơi nên phơi ngang, lộn mặt trái sản phẩm khi phơi\r\n- Nên phơi quần áo trong bóng mát, không nên phơi dưới ánh nắng gắt quá lâu tránh mất màu, giòn và rút sợi vải\r\n- Ủi sản phẩm ở nhiệt độ vừa phải.\r\n------------------------------------------------------\r\nMÔ TẢ SẢN PHẨM\r\n T1303K1026 - Quần Ngố GENVIET Kaki Nam Túi Hộp\r\n- Chất liệu: Kaki \r\n-Màu Sắc: hồng đất, xanh ghi, xanh rêu\r\n-Kích cỡ: 27 đến 34\r\nSản phẩm được thiết kế độc quyền bởi thương hiệu thời trang GENVIET  với hệ thống 80 showrooms trên toàn quốc với thương hiệu uy tín, sản phẩm chất lượng mà mang lại vẻ đẹp tuyệt đối cho bạn. GENVIET tin rằng sẽ đem lại sự trải nghiệm tuyệt vời cho các bạn khi sử dụng sản phẩm và dịch vụ của GENVIET\r\n', 'public/img/products/fcdf27ac2a8dc95fcd016f66901213d2.png', 398000.00, 5, '2024-11-08 03:13:29', '2024-11-23 14:34:49'),
(11, 'Váy trắng tiểu thư trễ vai tay bồng dáng dài hai lớp, đầm trắng dự tiệc bánh bèo', 'Váy trễ vai trắng tay bồng dáng dài, đầm trễ vai tiểu thư dự tiệc màu trắng điệu đà\r\n\r\n Màu trắng\r\n\r\nFree sz < 63kg \r\n\r\n\r\n❤️❤️ vblà xưởng may với niềm đam mê mãnh liệt về thiết kế, và phương châm sản phẩm mang giá trị sử dụng cao cho khách hàng , thảo nguyên cũng luôn hướng tới giá trị cốt lõi và bền vững dựa trên cơ sở lợi ích cho khách hàng luôn là hàng đầu .. ! Và rất mong được sự ủng hộ và đặt niềm tin bên shop.\r\n\r\nTrân trọng và cảm ơn rất nhiều !! Các khách hàng yêu quý của shop 😘\r\n', 'public/img/products/4cb7898954c4dc291ef1ad30d820225e.png', 68000.00, 6, '2024-11-08 03:14:31', '2024-11-23 14:34:56'),
(12, '[Mã BMLTA50 giảm đến 50K đơn 99K] Áo thun ba lỗ nam thể thao AJEKA, thun lạnh co giãn 4 chiều', 'Sản phẩm áo thun nam ba lỗ mang đến cho người mặc cảm giác năng động khỏe khoắn,áo phông thun lạnh 3 lỗ được may từ vải thun lạnh cao cấp mềm mịn, Áo thun nam ba lỗ có đủ bảng màu cực hot, giúp bạn thêm nhiều sự lựa chọn. \r\n\r\n- Chất liệu thun lạnh cao cấp, co giãn 4 chiều  thấm hút mồ hôi tốt, phù hợp các hoạt động thể thao, Gym, yoga, đá bóng,... \r\n\r\n- Tỷ mỉ đến từng đường chỉ may, logo 3D nổi chắc chắn cực sang.\r\n\r\n- Bảng màu cực cá tính, bền màu,  chống nhăn,thấm hút cực tốt.\r\n\r\n- Full size từ M – L – XL – XXL-3XL.. chuẩn size theo form người Việt\r\n\r\n\r\n\r\n*CAM KẾT :\r\n\r\n-  Bảo hành 30 ngày  ( 1 đổi 1)  với đường may, túi khóa và độ bền của vải\r\n\r\n-  Sẵn sàng nhận lại hàng nếu Quý khách không hài lòng và hoàn lại tiền 100%\r\n\r\n-  Cam kết chất lượng và mẫu mã sản phẩm giống với hình ảnh\r\n\r\n-  Hoàn tiền hoặc đổi hàng ngay lập tức nếu sản phẩm bị lỗi do sơ suất của nhà sản xuất \r\n\r\n-  Cam kết được đổi hàng trong vòng 30 ngày. (Sản phẩm còn nguyên tem mác và chưa sử dụng )\r\n\r\n 🚛 FREESHIP EXTRA ĐƠN TỪ 50K.\r\n\r\nHướng dẫn chọn size \r\n\r\nSize M : 51-60kg - Cao < 1m65\r\n\r\nSize L : 61-70 kg - 1m66<Cao< 1m70 \r\n\r\nSize XL : 71- 80kg - 1m74<Cao< 1m75\r\n\r\nSize 2XL : 81-90 kg - Cao> 1m7\r\n\r\nSize 3XL : 91-98 kg - Cao >1m7', 'public/img/products/48a84ebf054c419e102d419fda034dd4.png', 109000.00, 7, '2024-11-08 03:15:23', '2024-11-28 17:03:01'),
(13, 'Áo croptop nữ sát nách ba lỗ thun không tay kiểu ôm body tank top vải cotton co giãn tốt', '👉 👉 THÔNG TIN SẢN PHẨM: \r\nÁo ba lỗ croptop nữ  dáng áo 3 lỗ ôm chất liệu thun cotton 100% co dãn mạnh.\r\n-------------------------\r\n-Chất liệu : Thun cotton co giãn 4 chiều loại cao cấp dày dặn nhất, rất mát ạ.\r\n* Lưu ý: \r\n+Tuỳ đợt hàng độ dày mỏng của các màu sẽ khác nhau ( <10% ) vẫn đảm bảo chất lượng cao cấp nhất ạ.\r\n+Chất liệu  cotton nên sẽ có sợi bông ạ.\r\n\r\n-Màu sắc : Trắng - Đen - Vàng Đậm - Muối Tiêu - Xanh Ngọc - Đỏ Cam - Nâu - Đỏ Đô - Màu Ngẫu Nhiên( Màu sắc có thể chênh lệch so với thực tế 5% do ánh sáng và các thiết bị hiển thị màu khác nhau )\r\n\r\n-Size : Freesize 40-55kg\r\n\r\n-Kiểu dáng : Dáng áo ba lỗ croptop ôm, chất liệu 100% cotton co dãn 4 chiều cực tốt, dày dặn và mát.\r\nCó thể phối với quần short ngắn, đóng thùng, áo Cardigan, Blazer,... rất năng động và cá tính ạ\r\n--------------------------\r\n\r\n* Lưu ý: \r\n+Thông số áo là thành phẩm, chất co dãn cực tốt nên dễ fix vừa dáng.\r\n+Áo dáng ôm croptop, các chị em thích mặc ôm thì chọn size thông số vừa người nhé ạ.\r\n----------------------------\r\nChỉ có tại ao _thun_vdr: \r\n\r\n+ Cam kết chịu trách nhiệm với mỗi sản phẩm bán ra, Miễn phí đổi trả hàng lỗi trong thời gian sớm nhất ( Hy hữu thôi chứ  ao _thun_vdr   kiểm hàng kĩ lắm ahihi )\r\n\r\n Lưu ý:  Hàng đổi phải còn nguyên tag, mạc, bao bì; chưa có dấu hiệu sử dụng và lỗi do tác động bên ngoài.\r\n----------------------------\r\n🔴 Cam kết hàng Chất lượng do nhà  ao _thun_vdr  tự sản xuất nên chị em yên tâm về form dáng, đường may và chất liệu nhé.\r\n🔴 Cam kết hình chụp thật, hàng đẹp, Shop sẽ nhận lại hàng và hoàn tiền nếu hàng xấu và không giống hình ạ.\r\n#aobalo #aohaiday #aocoban #aocaocap #kamong #ao #3 #lo #nu #2 #ao3lo #satnach #aosatnach #co #gian #om #ao3lonu #100% #cotton #ao3lotrang #ao3loden #ao #ba #lo #aocroptop#aothun #aothunnu #aothundep #aothunnure\r\n#aothunteen #aothunteensi #aothuncroptop \r\n#aothundinhkimsa #aothungiare', 'public/img/products/c3182e84bfa137bcecbfb1bb51959fb5.png', 110000.00, 8, '2024-11-08 03:16:01', '2024-11-23 14:35:05'),
(14, '[Xả Kho] Áo Ba Lỗ Nam Co Giãn, Thấm Hút Mồ Hôi hàng VNXK(Hà Nội)', '🎁 Áo ba lỗ nam, Áo Lót Nam loại mỏng, chất liệu cotton mỏng\r\n👉👉 MỀM MẠI – KHÔ THOÁNG – MẶC NHƯ KHÔNG MẶC! ----- \r\n➦ Chất vải sợi tự nhiên, rất mềm mại. Thấm hút mồ hôi, thoát hơi và kháng khuẩn rất tốt.\r\n ➦ Kiểu dáng thiết kế trẻ trung, mềm mại\r\n ➦ Rất bền và không phai màu, không bai nhão trong thời dài sử dụng.\r\ni ➦ màu trắng đơn giản, sang trọng\r\n ➦ Mặc thoáng mát, thoải mái không gò bó\r\n➦ Không bai dãn, sổ lông trong quá trình sử dụng \r\n➦ Sản phẩm hot và được ưa chuộng nhất năm\r\n➦  Có các size M (50 - 62KG) , L(60 - 72 KG), 2L(70 - 82KG)\r\n ➦ Chính sách giá ưu đãi tốt nhất thị trường\r\n ➦Áo được thiết kế đơn giản, dễ mặc cho nam giới phong cách năng động và khỏe khoắn hơn.\r\n 👉👉 Mua ngay Áo ba lỗ nam Hà Nội ngay hôm nay để nhận ƯU ĐÃI KHỦNG!!!', 'public/img/products/f4a695003d10825a8ee6337a278600fd.png', 51000.00, 7, '2024-11-08 03:16:43', '2024-11-23 14:35:09'),
(15, 'Quần Jeans Đen Bạc Dáng Rộng Cạp Cao Ống Rộng 2 Túi Vuông Cá Tính Tôn Dáng', 'QUẦN TÚI VUÔNG 301\r\n___\r\n     Chất liệu: Bò / Jeans\r\nBẢNG SIZE THAM KHẢO\r\nXS: Eo 64cm Mông 93cm Dài quần 101cm Đùi 54cm Chu vi gấu quần 42cm\r\nS:   Eo 68cm Mông 96cm Dài quần 102cm Đùi 56cm Chu vi gấu quần 43cm\r\nM:  Eo 72cm Mông 100cm Dài quần 102cm Đùi 58cm Chu vi gấu quần 43.5cm\r\nL:   Eo 76cm Mông 104cm Dài quần 103cm Đùi 60cm Chu vi gấu quần 44cm\r\nXL: Eo 80cm Mông 108cm Dài quần 104cm Đùi 62cm  Chu vi gấu quần 45cm\r\n2XL: Eo 84cm Mông 112cm Dài quần 105cm Đùi 65cm Chu vi gấu quần 45cm\r\n\r\n💓Kích thước trên mô tả được đô thủ công, vì vậy có thể bị sai lệch 1-2cm\r\nINBOX để được hỗ trợ tư vấn size\r\n\r\nCHÍNH SÁCH ĐỔI TRẢ\r\n- Đối với trường hợp xảy ra nhầm lẫn trong đơn hàng hoặc có lỗi phía nhà sản xuất, bạn vui lòng liên hệ cho shop kèm hình ảnh và video bóc hàng để được hỗ trợ đổi hàng miễn phí nhanh chóng.\r\n- Lưu ý: Sản phẩm còn nguyên tag và không có tình trạng đã qua sử dụng.\r\n_________\r\n💓Cam kết nguồn gốc sản phẩm 100% là Hàng QCCC, được nhà Chanh đặt trực tiếp không qua trung gian nên giá cả rất hợp lý\r\n💓Những sản phẩm đăng bán là những sản phẩm được nhà Chanh tuyển chọn qua chất lượng vải, đường may, kiểu dáng nên các bạn hoàn toàn yên tâm khi mua hàng tại nhà Chanh', 'public/img/products/1c686be9cea18b4c687d4199c8a3dcf6.png', 51000.00, 4, '2024-11-08 03:17:17', '2024-11-23 14:35:12'),
(16, 'Quần Jeans Đen Bạc Dáng Rộng Cạp Cao Ống Rộng 2 Túi Vuông Cá Tính Tôn Dáng', 'QUẦN TÚI VUÔNG 301\n___\n     Chất liệu: Bò / Jeans\nBẢNG SIZE THAM KHẢO\nXS: Eo 64cm Mông 93cm Dài quần 101cm Đùi 54cm Chu vi gấu quần 42cm\nS:   Eo 68cm Mông 96cm Dài quần 102cm Đùi 56cm Chu vi gấu quần 43cm\nM:  Eo 72cm Mông 100cm Dài quần 102cm Đùi 58cm Chu vi gấu quần 43.5cm\nL:   Eo 76cm Mông 104cm Dài quần 103cm Đùi 60cm Chu vi gấu quần 44cm\nXL: Eo 80cm Mông 108cm Dài quần 104cm Đùi 62cm  Chu vi gấu quần 45cm\n2XL: Eo 84cm Mông 112cm Dài quần 105cm Đùi 65cm Chu vi gấu quần 45cm\n\n💓Kích thước trên mô tả được đô thủ công, vì vậy có thể bị sai lệch 1-2cm\nINBOX để được hỗ trợ tư vấn size\n\nCHÍNH SÁCH ĐỔI TRẢ\n- Đối với trường hợp xảy ra nhầm lẫn trong đơn hàng hoặc có lỗi phía nhà sản xuất, bạn vui lòng liên hệ cho shop kèm hình ảnh và video bóc hàng để được hỗ trợ đổi hàng miễn phí nhanh chóng.\n- Lưu ý: Sản phẩm còn nguyên tag và không có tình trạng đã qua sử dụng.\n_________\n💓Cam kết nguồn gốc sản phẩm 100% là Hàng QCCC, được nhà Chanh đặt trực tiếp không qua trung gian nên giá cả rất hợp lý\n💓Những sản phẩm đăng bán là những sản phẩm được nhà Chanh tuyển chọn qua chất lượng vải, đường may, kiểu dáng nên các bạn hoàn toàn yên tâm khi mua hàng tại nhà Chanh', 'public/img/products/1c686be9cea18b4c687d4199c8a3dcf6.png', 205000.00, 4, '2024-11-08 03:17:55', '2024-11-23 14:35:17'),
(17, 'Áo choàng bông thú lông mịn mùa đông', ' Tăm tia bao lâu nay cúi cùng shop cũng nhả sêu cho em gom này~~~ đông mà lười là toàn chùm em nó thuii ấm dã man mà xinh xỉu áaaa\r\n\r\nĐi lang thang trong nhà ko sợ lạnh, mà có chẳng may phải chạy ra ngoài thì vẫn ấm áp ạ.\r\nNhìn gấu cưng dễ sợ lunnn á 😚😚 \r\nHeheee sắm 1 e để đi đầu trend nàoooo \r\n\r\n🐶 5 mẫu em đánh số\r\nSize S-M-L-XL\r\nS: 40-47kg\r\nM: 47-54kg\r\nL: 54-60kg\r\nXL: 60-67kg', 'public/img/products/sg-11134201-22100-ofm9emsngjiv6c.png', 240000.00, 8, '2024-11-08 03:18:38', '2024-11-23 14:35:25'),
(18, 'Áo len nam cổ lọ dài tay Gman vải len tăm công nghệ dệt kim cao cấp phong cách hàn quốc', '  1. THÔNG TIN SẢN PHẨM: Áo Len Nam cổ lọ dài tay - thời trang nam\r\n✔️ Áo len nam cổ lọ là món phụ kiện thời trang đơn giản nhưng không kém phần đẹp, thời trang. Các anh có thể mặc đi làm, đi chơi hay đi dự tiệc lại rất dễ phối đồ dù là với quần vải, quần jean, quần kaki hay với các sản phẩm áo măng tô, áo vest.\r\n\r\n✔️ Chất liệu: vải len cotton thiên nhiên mềm mại có bề mặt mềm mịn, thoát mồ hôi giữ ấm, nhanh tạo cảm giác vô cùng thoải mái cho người mặc và đặc biệt là không bị Xù Lông, Không phai màu, Giặt máy tốt. \r\n\r\n✔️ Màu sắc áo len cổ lọ nam : 9 màu\r\nĐEN - TRẮNG - XÁM - GHI - NÂU ĐẤT - XANH THAN - RÊU - ĐỎ ĐÔ - BE \r\n\r\n✔️ Size áo len tay dài : L, XL\r\n\r\n    2. HƯỚNG DẪN CHỌN SIZE ÁO LEN NAM\r\n📍 Size L: Cân nặng 45-65kg, cao dưới 1m70\r\n📍 Size XL: Cân nặng 65-78kg, cao dưới 1m80.\r\n(Nếu bạn gặp khó khăn khi chọn size, vui lòng INBOX, cung cấp chiều cao, cân nặng để SHOP TƯ VẤN SIZE)\r\n\r\n   3.  Mẹo Nhỏ Giúp Bạn Bảo Quản Quần áo nam : \r\n💌  Đối với sản phẩm quần áo mới mua về, nên giặt tay lần đầu tiên để tránh phai màu sang quần áo khác\r\n💌 Khi giặt nên lộn mặt trái ra để đảm bảo độ bền \r\n💌 Sản phẩm phù hợp cho giặt máy (có túi giặt)/giặt tay\r\n💌 Không giặt chung đồ Trắng và đồ Tối màu \r\n\r\n    4. CHÍNH SÁCH\r\n✔️ Cam kết chất lượng và loại mã sản phẩm giống với hình ảnh.\r\n✔️ Trả hàng hoàn tiền trong 3 ngày nếu như sản phẩm không đúng mô tả\r\n✔️ Shop sẽ đổi trả trong các trường hợp: shop giao nhầm size, nhầm màu, nhầm sản phẩm khác, thiếu hàng, áo bị lỗi và các lỗi khác của nhà sản xuất.\r\n✔️ Trong các trường hợp: khách không ưng, mặc không hợp, khách chọn nhầm sản phẩm,... quý khách vui lòng  INBOX để shop hướng dẫn đổi size phù hợp\r\n\r\n    5. LƯU Ý\r\n🍀 Quay video khi mở / bóc / khui sản phẩm để được giải quyết nếu có sự cố\r\n🍀 Màu sắc của sản phẩm thực tế có thể đậm, nhạt hơn ảnh mô tả do ánh sáng và màn hình thiết bị khác nhau.\r\n🍀 Kích thước sản phẩm dung sai cho phép ±2cm.', 'public/img/products/4e738af4c439269f606dc20f38bd69f8.png', 220000.00, 7, '2024-11-08 03:19:22', '2024-11-23 14:35:29'),
(32, 'Áo Khoác Nỉ Hoodie Zip COTTON Thêu NQ30 AM Form Rộng Nam Nữ Unisex', 'Áo Khoác Nỉ Bông NQ30 FORUM Form Rộng Nam Nữ Unisex\r\n\r\nÁo khoác nỉ bông mịn bông dày mặc mùa đông ấm áp, áo có các chi tiết thêu tinh tế, tag tay tag sườn, tag cổ, có bo chun ở tay, nón to trùm đầu, , đặc biệt áo có túi trong ạ\r\n\r\n\r\n\r\nNỉ bên shop là nỉ COTTON nên sẽ không xù mặt ngoài mặc thời gian tính bằng năm nhưng sẽ đổ lông mặt trong các bạn giặt qua vài lần sẽ hết lông thừa bên trong ạ, shop không làm nỉ pha poly vì sẽ xù hết mặt ngoài sau vài lần mặc và giá thành sẽ rẻ hơn 1 nửa so với nỉ COTTON, các bạn nên lưu ý về vấn đề này !!!\r\n\r\n\r\n\r\n- NỈ BÔNG: ẤM ÁP, DÀY DẶN THÍCH HỢP MẶC MÙA ĐÔNG HOẶC CHỐNG NẮNG.\r\n\r\n- NỈ 2 DA (NỈ ÉP HÀN): MỎNG NHƯNG SĂN, THÍCH HỢP MẶC MÙA HÈ MẶC MÁT, KHÔNG ĐỔ LÔNG MẶT TRONG, CÓ CHỐNG TIA UV.\r\n\r\nĐỊNH LƯỢNG VẢI: 380gsm\r\n\r\n\r\n\r\nBảng size chi tiết:\r\n\r\nSize M: dài 70cm, rộng 62cm\r\n\r\nSize L: dài 72cm, rộng 64cm\r\n\r\nSize Xl: dài 74cm, rộng 66cm\r\n\r\n\r\n\r\nBảng size phù hợp 80-90% khách hàng:\r\n\r\nSize M dưới 55kg, cao dưới 1m60\r\n\r\nSize L dưới 65kg, cao dưới 1m70\r\n\r\nSize Xl dưới 75kg, cao dưới 1m75\r\n#aokhoacnu#aokhoacni#aokhoaczip#hoodiezip#aokhoachoodiezip#aokhoacformrong', 'public/img/products/2024_12_03_03_38_45pm.jpg', 269000.00, 1, '2024-12-03 14:38:45', '2024-12-03 14:38:45');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `ratings`
--

CREATE TABLE `ratings` (
  `rating_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `product_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `rating` int(11) DEFAULT NULL CHECK (`rating` between 1 and 5),
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` enum('visible','hidden') DEFAULT 'visible'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `role_id` int(11) NOT NULL,
  `role_name` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`role_id`, `role_name`) VALUES
(1, 'ADMIN'),
(2, 'USER');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(100) NOT NULL,
  `full_name` varchar(100) DEFAULT NULL,
  `avatar_url` varchar(255) DEFAULT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `status` enum('active','banned','deleted') DEFAULT 'active',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`user_id`, `username`, `password`, `email`, `full_name`, `avatar_url`, `phone`, `address`, `role_id`, `status`, `created_at`, `updated_at`) VALUES
(12, 'tester3', '$2y$10$XaOY2qliK7OIKqCTVBm92ebr479JddQIfFEXMAVEa2IFQZBJ/0VxW', 'testsda3@gmail.com', 'Test User 3', 'https://pin.it/2MvAtiRZI', '123456802', 'hcm', 2, 'active', '2024-11-18 14:49:14', '2024-12-03 13:57:47'),
(13, 'tester4', '$2y$10$2vyOlUYGSDUTHAzXcBnRW.jCeK4U.78Q4LBvtc2ASZ4UdSu9/1oou', 'test4@gmail.com', 'Test User 4', 'https://pin.it/2MvAtiRZI', '12345681', 'Ho Chi Minh', 2, 'deleted', '2024-11-18 14:49:14', '2024-11-27 02:09:17'),
(14, 'tester5', '$2y$10$aLn3Y4tL.p7CbjwutJUsO.AZ.GgWfN6Sto2PeT0PP/vHNo0RZquDK', 'test5@gmail.com', 'Test User 5', 'https://pin.it/2MvAtiRZI', '12345682', 'Hai Phong', 2, 'banned', '2024-11-18 14:49:14', '2024-11-27 02:11:01'),
(15, 'tester6', '$2y$10$jkmTodplQUJvtKvBB1o2x.OvUNfgXz0CHm5bDZDeizDJu4y9Dh.Bm', 'test6@gmail.com', 'Test User 6', 'https://pin.it/2MvAtiRZI', '12345683', 'Can Tho', 2, 'active', '2024-11-18 14:49:14', '2024-11-27 02:09:41'),
(16, 'tester7', '$2y$10$n7SS48hxZZ0St2PnKp/jIOlNTd/feBPRgxSMO8ATJXddnSOBD3S2q', 'test7@gmail.com', 'Test User 7', 'https://pin.it/2MvAtiRZI', '12345684', 'Nha Trang', 2, 'deleted', '2024-11-18 14:49:14', '2024-11-27 02:11:06'),
(17, 'tester8', '$2y$10$HpRnW4aeBYUHOqPdLsLjgutcaOsVkyVuRf7j/DdiKfYrtZFg4lDrO', 'test8@gmail.com', 'Test User 8', 'https://pin.it/2MvAtiRZI', '12345685', 'Vung Tau', 2, 'banned', '2024-11-18 14:49:14', '2024-11-27 02:10:02'),
(18, 'tester9', '$2y$10$AkmA2hpz4zP8XGiT18iJ2.cl2SveLor.3Ugd1IApTjyHA70MkaRJ2', 'test9@gmail.com', 'Test User 9', 'https://pin.it/2MvAtiRZI', '12345686', 'Hue', 2, 'banned', '2024-11-18 14:49:14', '2024-11-27 02:11:09'),
(36, 'locbao', '$2y$10$KVW2QrJnhyYmDru8eGIk/Om1PwLPyi79v.jEhMUqN0RQm0xlPv/.G', 'locbao@gmail.com', 'Trần Văn Lộc', 'https://firebasestorage.googleapis.com/v0/b/fir-42a90.appspot.com/o/avatar-people-user-svgrepo-com.svg?alt=media&token=d19e3ab3-4ff0-4088-a0b8-d2d7bfa6c54d', '0231312323', 'Ký túc xá Khu A ĐH Quốc gia TP. Hồ Chí Minh', 2, 'active', '2024-11-24 19:34:04', '2024-12-03 14:29:49'),
(37, 'admin', '$2y$10$ntigj7eu9wh9f.F8NBrXzuDSUH1Swa4ptF/02OL9/tTDAZSge8VDW', 'tesdasdt@gmail.com', 'admin', 'public/img/users/admin.png', '0383811208', 'ha noi', 1, 'active', '2024-11-24 21:27:20', '2024-11-24 21:27:20'),
(38, 'tester', '$2y$10$wN0l4Jm1q55DP2HlqJShReq5RwoLKRuQ5GdonTTV9RGlFhXmzmdya', 't@gmail.com', 'tester', 'https://firebasestorage.googleapis.com/v0/b/fir-42a90.appspot.com/o/avatar-people-user-svgrepo-com.svg?alt=media&token=d19e3ab3-4ff0-4088-a0b8-d2d7bfa6c54d', '0383811208', 'ha noi', 2, 'active', '2024-11-26 00:20:02', '2024-11-26 00:20:02'),
(39, 'haha', '$2y$10$.A6dJ/Zeqgdfu0HvVw.WSuvLQMg.lzD1nmYjAxsH2kBIURuLHEiB2', 'haha@gmail.com', 'tet toacbere', 'public/img/users/haha.png', '0348234728', 'ho chi minh city', 2, 'active', '2024-12-03 12:41:38', '2024-12-03 12:41:38');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`cart_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD PRIMARY KEY (`cart_item_id`),
  ADD KEY `cart_id` (`cart_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Chỉ mục cho bảng `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`comment_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `news_id` (`news_id`);

--
-- Chỉ mục cho bảng `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Chỉ mục cho bảng `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`payment_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`product_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rating_id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`role_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`),
  ADD KEY `role_id` (`role_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `cart`
--
ALTER TABLE `cart`
  MODIFY `cart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  MODIFY `cart_item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `comment`
--
ALTER TABLE `comment`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT cho bảng `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT cho bảng `payments`
--
ALTER TABLE `payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT cho bảng `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rating_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `role_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `cart_items`
--
ALTER TABLE `cart_items`
  ADD CONSTRAINT `cart_items_ibfk_1` FOREIGN KEY (`cart_id`) REFERENCES `cart` (`cart_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `cart_items_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `comment_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE,
  ADD CONSTRAINT `comment_ibfk_2` FOREIGN KEY (`news_id`) REFERENCES `news` (`news_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `payments`
--
ALTER TABLE `payments`
  ADD CONSTRAINT `payments_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`category_id`) ON DELETE CASCADE;

--
-- Các ràng buộc cho bảng `ratings`
--
ALTER TABLE `ratings`
  ADD CONSTRAINT `ratings_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`),
  ADD CONSTRAINT `ratings_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`product_id`);

--
-- Các ràng buộc cho bảng `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `users_ibfk_1` FOREIGN KEY (`role_id`) REFERENCES `roles` (`role_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
