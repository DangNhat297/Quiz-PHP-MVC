-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th5 11, 2022 lúc 06:55 PM
-- Phiên bản máy phục vụ: 10.4.19-MariaDB
-- Phiên bản PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `ass_php2_quiz`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `answers`
--

CREATE TABLE `answers` (
  `id` int(11) NOT NULL,
  `content` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `question_id` int(11) DEFAULT NULL,
  `is_correct` int(11) DEFAULT NULL,
  `img` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `answers`
--

INSERT INTO `answers` (`id`, `content`, `question_id`, `is_correct`, `img`) VALUES
(382, ' .Vn Times, . Vn Arial, .Vn Courier', 32, 0, ''),
(383, '.Vn Times, Times new roman, Arial', 32, 0, ''),
(384, '.VNI times, Arial, .Vn Avant', 32, 0, ''),
(385, 'Tahoma, Verdana, Times new Roman', 32, 1, ''),
(386, 'Thay thế từ trong văn bản', 33, 0, ''),
(387, 'Thay thế từ trong văn bản bằng từ cho trước', 33, 0, ''),
(388, 'Tự động thay thế từ khóa tắt trong văn bản từ đã được cài đặt trước', 33, 0, ''),
(389, 'Tự động thay thế các từ viết tắt bằng từ đầy đủ', 33, 1, ''),
(390, 'Menu Format, chọn Font', 34, 0, ''),
(391, 'Menu Tools, chọn Options', 34, 1, ''),
(392, 'Menu Edit, chọn Office Clipboard', 34, 0, ''),
(393, 'Menu View, chọn Markup', 34, 0, ''),
(394, 'Nhắp chọn thực đơn lệnh FILE và chọn SAVE.', 35, 0, ''),
(395, 'Nhắp chọn thực đơn lệnh FILE và chọn SAVE AS.', 35, 1, ''),
(396, 'Nhắp chọn thực đơn lệnh FILE và chọn EDIT.', 35, 0, ''),
(397, 'Nhắp chọn thực đơn lệnh EDIT và chọn RENAME', 35, 0, ''),
(398, 'Format/paragraph/line spacing', 36, 0, ''),
(399, 'Nhấn Ctrl + 5 tại dòng đó', 36, 0, ''),
(400, 'Cả hai cách A và B đều đúng', 36, 1, ''),
(401, 'Cả 2 cách A và B đều sai', 36, 0, ''),
(402, 'Dấu xanh là biểu hiện của vấn đề chính tả, dấu đỏ là vấn đề ngữ pháp', 37, 0, ''),
(403, 'Dấu xanh là do bạn đã dùng sai từ tiếng Anh, dấu đỏ là do bạn dùng sai quy tắc ngữ pháp', 37, 0, ''),
(404, 'Dấu xanh là do bạn gõ sai quy tắc ngữ pháp, dấu đỏ là do bạn gõ sai từ tiếng Anh', 37, 1, ''),
(405, 'Dấu xanh đỏ là do máy tính bị virus', 37, 0, ''),
(406, 'Bạn có thể chuyển sang font .Vn times bằng cách bôi đen dòng chữ trên và lựa chọn .Vntimes trong hộp thoại Font, các chữ đó vẫn đọc bình thường', 38, 0, ''),
(407, 'Bạn có thể chuyển sang font .Vn times bằng cách bôi đen dòng chữ trên và lựa chọn .Vntimes trên thanh công cụ, các chữ đó vẫn đọc bình thường', 38, 0, ''),
(408, 'Để chuyển font mà vẫn đọc bình thường, bạn chỉ cần nhấn Format chọn Theme', 38, 0, ''),
(409, 'Bạn cần sử dụng một phần mềm cho phép thực hiện điều này, ví dụ như Vietkey Office hoăc Unikey', 38, 1, ''),
(410, '.Vntime', 39, 0, ''),
(411, 'ABC', 39, 0, ''),
(412, 'Times New Roman', 39, 1, ''),
(413, 'VNI', 39, 0, ''),
(414, 'Bấm Ctrl+C tương đương với nhấn nút Copy trên thanh thực đơn lệnh Standard.', 40, 0, ''),
(415, 'Bấm Ctrl+V tương đương với nhấn nút Paste.', 40, 0, ''),
(416, 'Bấm Ctrl+X tương đương với nhấn nút Cut.', 40, 0, ''),
(417, 'Bấm Ctrl+X tương đương với nhấn nút Cut.', 40, 1, ''),
(418, 'Cho phép chèn dòng chữ, hình ảnh.', 41, 0, ''),
(419, 'Cho phép chèn số trang đánh tự động cho văn bản.', 41, 0, ''),
(420, 'Cho phép chèn số trang theo dạng: [trang hiện thời]/[tổng số trang]', 41, 0, ''),
(421, 'Cho phép thực hiện cả ba điều trên', 41, 1, ''),
(438, 'Chọn Insert  - Duplicate', 42, 0, ''),
(439, 'Chọn Insert  - New Slide', 42, 0, ''),
(440, 'Chọn Insert - Duplicate Slide', 42, 1, ''),
(441, 'Không thực hiện được', 42, 0, ''),
(442, 'Đưa con trỏ văn bản vào giữa', 43, 0, ''),
(443, 'Chọn cả đoạn văn bản cần căn lề', 43, 1, ''),
(444, 'Chọn một dòng bất kỳ trong đoạn văn bản cần căn lề', 43, 1, ''),
(445, 'Cả 3 cách nêu trong câu này đều đúng', 43, 0, ''),
(446, 'Chọn tất cả các đối tượng trên slide và nhấn phím Delete.', 44, 0, ''),
(447, 'Chọn tất cả các đối tượng trên slide và nhấn phím Backspace.', 44, 0, ''),
(448, 'Chọn Edit -&gt;Delete Slide.', 44, 1, ''),
(449, 'Nhấn chuột phải lên slide và chọn Delete.', 44, 0, ''),
(450, 'Ctrl + X', 45, 0, ''),
(451, 'Ctrl + Z', 45, 0, ''),
(452, 'Ctrl + C', 45, 1, ''),
(453, 'Ctrl + V', 45, 0, ''),
(454, 'Nút Yes', 46, 1, ''),
(455, 'Nút No', 46, 0, ''),
(456, 'Nút Cancel', 46, 0, ''),
(457, 'Nút Save', 46, 0, ''),
(458, 'Xóa slide hiện hành', 47, 1, ''),
(459, 'Xóa tập tin có nội dung là bài trình diễn hiện hành', 47, 0, ''),
(460, 'Xóa tất cả các slide trong bài trình diễn đang thiết kế', 47, 0, ''),
(461, 'Xóa tất cả các đối tượng trong slide hiện hành', 47, 0, ''),
(462, 'Chỉ được phép chèn hình ảnh vào giáo án', 48, 0, ''),
(463, 'Chỉ được phép chèn âm thanh vào giáo án', 48, 1, ''),
(464, 'Chỉ được phép chèn phim vào giáo án', 48, 0, ''),
(465, 'Chọn File  - Page Setup', 49, 1, ''),
(466, 'Chọn File  - Print', 49, 0, ''),
(467, 'Chọn File - Print Preview', 49, 0, ''),
(468, 'Chọn File - Properties', 49, 0, ''),
(469, 'Chọn File - Page Setup', 50, 1, ''),
(470, 'Chọn File - Print', 50, 0, ''),
(471, 'Chọn File - Print Preview', 50, 0, ''),
(472, 'Chọn File - Properties', 50, 0, ''),
(473, 'Chọn View - Background', 51, 0, ''),
(474, 'Chọn Format  - Background', 51, 1, ''),
(475, 'Chọn Insert - Background', 51, 0, ''),
(476, 'Chọn Slide Show - Background', 51, 0, ''),
(477, 'Creative Style Sheets', 52, 0, ''),
(478, 'Computer Style Sheets', 52, 0, ''),
(479, 'Cascading Style Sheets', 52, 1, ''),
(480, 'Colorful Style Sheets', 52, 0, ''),
(493, '<style src=”mystyle.css”>', 53, 0, ''),
(494, '<stylesheet>mystyle.css</stylesheet>', 53, 0, ''),
(495, '<link rel=”stylesheet” type=”text/css” href=”mystyle.css”>', 53, 1, ''),
(496, 'Tất cả đều đúng', 53, 0, ''),
(497, 'font', 54, 0, ''),
(498, 'class', 54, 0, ''),
(499, 'style', 54, 1, ''),
(500, 'styles', 54, 0, ''),
(501, 'Trong thẻ <body>', 55, 0, ''),
(502, 'Trong thẻ <head>', 55, 1, ''),
(503, 'Ở cuối file HTML', 55, 0, ''),
(504, 'Ở đầu file HTML', 55, 0, ''),
(505, '<a href=\"url\" new>', 56, 0, ''),
(506, '<a href=\"url\" target=\"new\">', 56, 0, ''),
(507, '<a href=\"url\" target=\"_blank\">', 56, 1, ''),
(508, '<a href=\"url\"blank=\"new\">', 56, 0, ''),
(509, '<table><tr><td>', 57, 1, ''),
(510, '<thead><body><tr>', 57, 0, ''),
(511, '<table><head><tfoot>', 57, 0, ''),
(512, '<table><tr><tt>', 57, 0, ''),
(513, '<tdleft>', 58, 0, ''),
(514, '<td valign=\"left\">', 58, 0, ''),
(515, '<td align=\"left\">', 58, 1, ''),
(516, '<td leftalign>', 58, 0, ''),
(517, '<ul>', 59, 0, ''),
(518, '<list>', 59, 0, ''),
(519, '<ol>', 59, 1, ''),
(520, '<dl>', 59, 0, ''),
(521, '<check>', 60, 0, ''),
(522, '<input type=\"check\">', 60, 0, ''),
(523, '<checkbox>', 60, 0, ''),
(524, '<input type=\"checkbox\">', 60, 1, ''),
(525, '<style src=\"mystyle.css\">', 61, 0, ''),
(526, '<stylesheet>mystyle.css</stylesheet>', 61, 0, ''),
(527, '<link rel=\"stylesheet\" type=\"text/css\" href=\"mystyle.css\">', 61, 1, ''),
(528, '<link rel=\"stylesheet\" style src=\"style.css\" type=type=\"text/css\">', 61, 0, ''),
(529, 'Tổ chức World Wide Web Consortium(W3C)', 62, 1, ''),
(530, 'Mozilla', 62, 0, ''),
(531, 'Google', 62, 0, ''),
(532, 'Microsoft', 62, 0, ''),
(533, 'Tạo một nút lệnh dùng để gửi tin trong form đi', 63, 1, ''),
(534, 'Tất cả các ý kiến trên', 63, 0, ''),
(535, 'Tạo một ô text để nhập dữ liệu', 63, 0, ''),
(536, 'Tạo một nút lệnh dùng để xoá thông tin trong form', 63, 0, ''),
(537, '<input type=\"textfield\">', 64, 0, ''),
(538, '<textinput type=\"text\">', 64, 0, ''),
(539, '<textfield>', 64, 0, ''),
(540, '<input type=\"text\">', 64, 1, ''),
(541, '<td valign=\"left\">', 65, 0, ''),
(542, '<tdleft>', 65, 0, ''),
(543, '<td leftalign>', 65, 0, ''),
(544, '<td align=\"left\">', 65, 1, ''),
(545, 'Tạo một textbox cho phép nhập liệu nhiều dòng', 66, 0, ''),
(546, 'Tạo một ô text để nhập dữ liệu 1 dòng', 66, 0, ''),
(547, 'Tạo một ô nhập mật khẩu', 66, 1, ''),
(548, 'Tất cả các ý trên', 66, 0, ''),
(621, '<table><tr><tt>', 67, 0, 'null'),
(622, '<table><tr><td>', 67, 0, ''),
(623, '<table><head><tfoot>', 67, 1, ''),
(624, '<thead><body><tr>', 67, 0, ''),
(625, '<body style=\"background-color:yellow;\">', 84, 1, ''),
(626, '<body bg=\"yellow\">', 84, 0, ''),
(627, '<background>yellow</background>', 84, 0, ''),
(628, '<body style=\"color:yellow;\">', 84, 0, ''),
(665, '<meta>', 87, 0, ''),
(666, '<title>', 87, 1, ''),
(667, '<head>', 87, 0, ''),
(668, '<input type=\"textarea\">', 88, 0, ''),
(669, '<textarea>', 88, 1, ''),
(670, '<input type=\"textbox\">', 88, 0, ''),
(671, '<body bg=\"background.gif\">', 89, 0, ''),
(672, '<body style=\"background-image:url(background.gif)\">', 89, 1, ''),
(673, '<background img=\"background.gif\">', 89, 0, ''),
(674, '<i>', 90, 0, ''),
(675, '<em>', 90, 1, ''),
(676, '<italic>', 90, 0, ''),
(677, '<b>', 90, 0, ''),
(678, 'Hyperlinks and Text Markup Language', 91, 0, ''),
(679, 'Home Tool Markup Language', 91, 0, ''),
(680, 'Hyper Text Markup Language', 91, 1, ''),
(681, '<a href=\"url\" target=\"new\">', 92, 0, ''),
(682, '<a href=\"url\" new>', 92, 0, ''),
(683, '<a href=\"url\" target=\"_blank\">', 92, 1, ''),
(684, '<check>', 93, 0, ''),
(685, '<checkbox>', 93, 0, ''),
(686, '<input type=\"check\">', 93, 0, ''),
(687, '<input type=\"checkbox\">', 93, 1, ''),
(688, '<ul>', 94, 1, ''),
(689, '<list>', 94, 0, ''),
(690, '<dl>', 94, 0, ''),
(691, '<ol>', 94, 0, ''),
(692, 'tl1', 95, 0, ''),
(693, 'tl2', 95, 0, ''),
(694, 'tl3', 95, 0, ''),
(695, 'tl4', 95, 1, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `questions`
--

CREATE TABLE `questions` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `img` longtext COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `questions`
--

INSERT INTO `questions` (`id`, `name`, `quiz_id`, `img`) VALUES
(32, 'Bạn đã bật Vietkey hoặc Unikey để soạn thảo. Bạn lựa chọn gõ theo kiểu telex và font chữ Unicode. Những font chữ nào sau đây của Word có thể được sử dụng để hiển thị rõ tiếng Việt?', 8, ''),
(33, 'Lệnh Tool/Autocorrect dùng để:', 8, ''),
(34, 'Bạn đang soạn văn bản, gõ bằng bộ gõ Unicode, nhưng các chữ cái cứ tự động cách nhau một ký tự trắng. Bạn cần nhấn chuột vào menu nào để có thể giải quyết trường hợp trên', 8, ''),
(35, 'Khi tệp congvan012005 đang mở, bạn muốn tạo tệp mới tên là cv-02-05 có cùng nội dung với congvan012005 thì bạn phải:', 8, ''),
(36, 'Để dãn khoảng cách giữa các dòng là 1.5 line chọn', 8, ''),
(37, 'Bạn đang gõ văn bản và dưới chân những ký tự bạn đang gõ xuất hiện các dấu xanh đỏ', 8, ''),
(38, 'Bạn đang gõ dòng chữ &quot;Cộng hòa xã hội chủ nghĩa Việt Nam&quot; bằng font chữ Times New Roman, Unicode', 8, ''),
(39, 'Khi bạn đã chọn bộ gõ văn bản là theo chuẩn UNICODE, kiểu gõ là Telex thì phông chữ phải sử dụng là', 8, ''),
(40, 'Cho biết phát biểu nào đưới đây là sai:', 8, ''),
(41, 'Mục HEADER AND FOOTER của MS-Word', 8, ''),
(42, 'Để tạo một slide giống hệt như slide hiện hành mà không phải thiết kế lại, người sử dụng', 9, ''),
(43, 'Để căn lề cho một đoạn văn bản nào đó trong giáo án điện tử đang thiết kế, trước tiên ta phải', 9, ''),
(44, 'Muốn xóa slide hiện thời khỏi giáo án điện tử, người thiết kế phải', 9, ''),
(45, 'Để lưu một đoạn văn bản đã được chọn vào vùng nhớ đệm (clipboard) mà không làm mất đi đoạn văn bản đó ta nhấn tổ hợp phím', 9, ''),
(46, 'Đang thiết kế giáo án điện tử, trước khi thoát khỏi PowerPoint nếu người sử dụng chưa lưu lại tập tin thì máy sẽ hiện một thông báo. Để lưu lại tập tin này ta sẽ kích chuột trái vào nút nào trong bảng thông báo này?', 9, ''),
(47, 'Thao tác chọn Edit - Delete Slide là để', 9, ''),
(48, 'Khi thực hiện thao tác chọn Insert -&gt;Movies and Sounds người sử dụng', 9, ''),
(49, 'Để thiết lập các thông số trang in ta thực hiện', 9, ''),
(50, 'Để thiết lập các thông số trang in ta thực hiện', 9, ''),
(51, 'Để tô màu nền cho một slide trong bài trình diễn ta thực hiện', 9, ''),
(52, 'CSS là viết tắt của?', 10, ''),
(53, 'Muốn liên kết file HTML với file định nghĩa CSS ta dùng dòng nào sau đây?', 10, ''),
(54, 'Thuộc tính nào định nghĩa CSS ngay trong 1 tag?', 10, ''),
(55, 'Đặt dòng liên kết với file CSS ở vùng nào trong file HTML?', 10, ''),
(56, 'Làm sao để khi click chuột vào link thì tạo ra cửa sổ mới?', 10, ''),
(57, 'Đâu là những tag dành cho việc tạo bảng?', 10, ''),
(58, 'Đâu là tag căn lề trái cho nội dung 1 ô trong bảng', 10, ''),
(59, 'Đâu là tag tạo ra 1 danh sách đứng đầu bằng số', 10, ''),
(60, 'Tag nào tạo ra 1 checkbox?', 10, ''),
(61, 'Muốn liên kết xHTML với 1 file định nghĩa CSS ta dùng dòng nào sau đây?', 10, ''),
(62, 'Ai đang làm các chuẩn cho Web?', 11, ''),
(63, 'Thẻ <input type=”Submit” …> dùng để làm gì?', 11, ''),
(64, 'Thẻ HTML nào tạo ra một ô nhập dữ liệu?', 11, ''),
(65, 'Đâu là mã HTML thực hiện căn lề trái cho nội dung 1 ô trong bảng', 11, ''),
(66, 'Thẻ <input type=”Password” …> dùng để làm gì?', 11, ''),
(67, 'Những phần tử HTML nào dùng để định nghĩa cấu trúc của bảng?', 11, ''),
(84, 'Đoạn mã HTML nào thực hiện việc thêm màu nền cho trang web?', 11, ''),
(87, 'Phần tử HTML nào định nghĩa dữ liệu sẽ hiển thị trên thanh tiêu đề của tài liệu?', 11, ''),
(88, 'Thẻ HTML nào tạo ra một ô nhập dữ liệu với nhiều dòng?', 11, ''),
(89, 'Đoạn mã HTML nào thực hiện chèn một ảnh nền vào trang web?', 11, ''),
(90, 'Chọn phần tử HTML được dùng nhấn mạnh nội dung văn bản?', 11, ''),
(91, 'Chuẩn HTML là cho cái gì?', 11, ''),
(92, 'Cách nào bạn có thể mở một liên kết trong một tab mới hoặc một cửa sổ mới?', 11, ''),
(93, 'Thẻ HTML nào tạo ra một checkbox?', 11, ''),
(94, 'Đâu là phần tử HTML tạo ra một danh sách đầu mục bởi dấu chấm?', 11, ''),
(95, 'câu hỏi', 12, '');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `quizs`
--

CREATE TABLE `quizs` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `subject_id` int(11) DEFAULT NULL,
  `duration_minutes` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `status` int(11) DEFAULT NULL,
  `is_shuffle` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `quizs`
--

INSERT INTO `quizs` (`id`, `name`, `subject_id`, `duration_minutes`, `start_time`, `end_time`, `status`, `is_shuffle`) VALUES
(8, 'Trắc nghiệm tin học (Ms Word) - đề 38', 21, 10, '2022-03-20 00:00:00', '2022-04-02 23:59:59', 1, 0),
(9, 'Trắc nghiệm tin học (PowerPoint) - đề 14', 21, 15, '2022-01-30 00:00:00', '2022-02-26 23:59:59', 1, 0),
(10, 'Trắc Nghiệm CSS - Đề 01', 22, 10, '2022-01-30 00:00:00', '2022-02-26 23:59:59', 1, 0),
(11, 'Trắc Nghiệm HTML - đề 01', 22, 15, '2022-01-30 00:00:00', '2022-02-28 23:59:59', 1, 0),
(12, 'Quiz PHP', 24, 30, '2022-01-30 00:00:00', '2022-02-26 23:59:59', 1, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `roles`
--

INSERT INTO `roles` (`id`, `name`) VALUES
(1, 'Quản Trị Viên'),
(2, 'Người Dùng');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quizs`
--

CREATE TABLE `student_quizs` (
  `id` int(11) NOT NULL,
  `student_id` int(11) DEFAULT NULL,
  `quiz_id` int(11) DEFAULT NULL,
  `start_time` datetime DEFAULT NULL,
  `end_time` datetime DEFAULT NULL,
  `score` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quizs`
--

INSERT INTO `student_quizs` (`id`, `student_id`, `quiz_id`, `start_time`, `end_time`, `score`) VALUES
(59, 6, 8, '2022-02-22 23:54:20', '2022-02-22 23:54:40', 4),
(60, 6, 10, '2022-02-22 23:55:12', '2022-02-22 23:55:28', 5),
(61, 6, 11, '2022-02-22 23:55:43', '2022-02-22 23:56:18', 5.33),
(62, 4, 9, '2022-02-22 23:57:06', '2022-02-22 23:57:32', 2),
(63, 4, 10, '2022-02-22 23:57:52', '2022-02-22 23:58:12', 5),
(64, 4, 8, '2022-02-23 09:53:12', '2022-02-23 09:53:30', 2);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_quiz_detail`
--

CREATE TABLE `student_quiz_detail` (
  `student_quiz_id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `answer_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `student_quiz_detail`
--

INSERT INTO `student_quiz_detail` (`student_quiz_id`, `question_id`, `answer_id`) VALUES
(59, 32, 382),
(59, 33, 388),
(59, 34, 391),
(59, 35, 395),
(59, 36, 400),
(59, 37, 403),
(59, 38, 408),
(59, 39, 412),
(59, 40, 415),
(59, 41, 419),
(60, 52, 477),
(60, 53, 495),
(60, 54, 499),
(60, 55, 502),
(60, 56, 507),
(60, 57, 510),
(60, 58, 515),
(60, 59, 518),
(60, 60, 522),
(60, 61, 526),
(61, 62, 529),
(61, 63, 533),
(61, 64, 540),
(61, 65, 544),
(61, 66, 546),
(61, 67, 622),
(61, 84, 627),
(61, 87, 666),
(61, 88, 670),
(61, 89, 672),
(61, 90, 675),
(61, 91, 679),
(61, 92, 683),
(61, 93, 686),
(61, 94, 690),
(62, 42, 438),
(62, 43, 443),
(62, 43, 445),
(62, 44, 447),
(62, 45, 451),
(62, 46, 456),
(62, 47, 460),
(62, 48, 464),
(62, 49, 467),
(62, 50, 469),
(62, 51, 474),
(63, 52, 478),
(63, 53, 495),
(63, 54, 498),
(63, 55, 503),
(63, 56, 507),
(63, 57, 511),
(63, 58, 514),
(63, 59, 519),
(63, 60, 524),
(63, 61, 527),
(64, 32, 382),
(64, 33, 387),
(64, 34, 391),
(64, 35, 395),
(64, 36, 399),
(64, 37, 403),
(64, 38, 407),
(64, 39, 411),
(64, 40, 415),
(64, 41, 419);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `subjects`
--

CREATE TABLE `subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `author_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `subjects`
--

INSERT INTO `subjects` (`id`, `name`, `author_id`) VALUES
(21, 'Tin Học', 1),
(22, 'Xây Dựng Trang Web ', 1),
(24, 'Lập Trình PHP2', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `avatar`, `role_id`) VALUES
(1, 'Nguyễn Đăng Nhật', 'admin@gmail.com', '$2y$10$nax8r7rojebCu6oRHuBgQ.8QIosMPnkeD0vzI65dlzvJ/RimRvzv2', 'default.jpg', 1),
(4, 'Nguyễn Đăng Nhật', 'member@gmail.com', '$2y$10$2HklgKQjmfi2StKd3UZcJO/o0ryygind.32GGLZOmQUKoVrcNXNsi', 'default.jpg', 2),
(6, 'Linh Loi', 'linhloi2k2@gmail.com', '$2y$10$NGwmxBLrpDzUiLB4eAIVVu5mNoesWMervHiKDLcXkBuZDQY2ZFQvi', 'default.jpg', 2);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `answers`
--
ALTER TABLE `answers`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `quizs`
--
ALTER TABLE `quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `answers`
--
ALTER TABLE `answers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=696;

--
-- AUTO_INCREMENT cho bảng `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=96;

--
-- AUTO_INCREMENT cho bảng `quizs`
--
ALTER TABLE `quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT cho bảng `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `student_quizs`
--
ALTER TABLE `student_quizs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT cho bảng `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
