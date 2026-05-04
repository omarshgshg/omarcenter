-- قم باستيراد هذا الملف في phpMyAdmin

CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `site_name` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `settings` (`id`, `site_name`) VALUES (1, 'عمر سنتر - عالم الألعاب');

CREATE TABLE IF NOT EXISTS `products` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `price` decimal(10,2) NOT NULL,
  `image_url` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO `products` (`name`, `price`, `image_url`) VALUES
('PlayStation 5 Console', '2400.00', 'https://via.placeholder.com/300x200/222/555?text=PS5'),
('Xbox Series S', '1350.00', 'https://via.placeholder.com/300x200/222/555?text=Xbox'),
('Call of Duty: Black Ops 6', '299.00', 'https://via.placeholder.com/300x200/222/555?text=BO6');
