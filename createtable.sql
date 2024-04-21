/*顧客情報テーブル
顧客ID.
名前
電話番号
誕生日
メモ
登録年月日
最終来店日
*/


CREATE TABLE `customerInf` (
  `id` int(11) NOT NULL,
  `name` varchar(60) DEFAULT NULL,
  `tel` varchar(160) DEFAULT NULL,
  `birth` date DEFAULT NULL,
  `memo` varchar(160) DEFAULT NULL,
  `uptime` datetime DEFAULT NULL,
  `lastdate` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

/*顧客来店テーブル
来店順ID
顧客ID.
担当者
指名有無
メニュー
所要時間
メモ
来店日
更新日
*/

CREATE TABLE `customerVisitInf` (
  `id` int(11) NOT NULL,
  `name_id` int(11) NOT NULL,
  `stylist_name` varchar(60) DEFAULT NULL,
  `shimei` varchar(5) DEFAULT NULL,
  `menu` varchar(160) DEFAULT NULL,
  `needed_time` varchar(5) DEFAULT NULL,
  `memo` varchar(160) DEFAULT NULL,
  `book_time` datetime DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
