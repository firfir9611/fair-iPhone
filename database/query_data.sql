INSERT INTO `iphones` (`id`,`model`,`name`,`stok_spare`,`stok_ready`,`display`,`os`,`rearcam`,`selfie`,`chipset`,`battery`,`dimention`,`launch_at`,`show`,`img`) VALUES 
(0,'ip_15_pro_max','Iphone 15 Pro Max',0,0,'Super Retina OLED, 1242x2688','iOS 18.2.1','12MP(wide), 12MP(tele)','7MP','Apple A17 Pro (3nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45608,1,'img/iPhone_images/ip_15_pro_max.png'),
(1,'ip_15_pro','Iphone 15 Pro',0,0,'Super Retina OLED, 1242x2689','iOS 18.2.2','12MP(wide), 12MP(tele)','7MP','Apple A17 Pro (3nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45609,1,'img/iPhone_images/ip_15_pro.png'),
(2,'ip_15_plus','Iphone 15 Plus',0,0,'Super Retina OLED, 1242x2690','iOS 18.2.3','12MP(wide)','7MP','Apple A16 Bionic (4nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45610,1,'img/iPhone_images/ip_15_plus.png'),
(3,'ip_15','Iphone 15',0,0,'Super Retina OLED, 1242x2691','iOS 18.2.4','12MP(wide)','7MP','Apple A16 Bionic (4nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45611,1,'img/iPhone_images/ip_15.png'),
(4,'ip_14_pro_max','Iphone 14 Pro Max',0,0,'Super Retina OLED, 1242x2692','iOS 18.2.5','12MP(wide), 12MP(tele)','7MP','Apple A16 Bionic (4nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45612,1,'img/iPhone_images/ip_14_pro_max.png'),
(5,'ip_14_pro','Iphone 14 Pro',0,0,'Super Retina OLED, 1242x2693','iOS 18.2.6','12MP(wide), 12MP(tele)','7MP','Apple A16 Bionic (4nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45613,1,'img/iPhone_images/ip_14_pro.png'),
(6,'ip_14_plus','Iphone 14 Plus',0,0,'Super Retina OLED, 1242x2694','iOS 18.2.7','12MP(wide)','7MP','Apple A15 Bionic (5nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45614,1,'img/iPhone_images/ip_14_plus.png'),
(7,'ip_14','Iphone 14',0,0,'Super Retina OLED, 1242x2695','iOS 18.2.8','12MP(wide)','7MP','Apple A15 Bionic (5nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45615,1,'img/iPhone_images/ip_14.png'),
(8,'ip_13_pro_max','Iphone 13 Pro Max',0,0,'Super Retina OLED, 1242x2696','iOS 18.2.9','12MP(wide), 12MP(tele)','7MP','Apple A15 Bionic (5nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45616,1,'img/iPhone_images/ip_13_pro_max.png'),
(9,'ip_13_pro','Iphone 13 Pro',0,0,'Super Retina OLED, 1242x2697','iOS 18.2.10','12MP(wide), 12MP(tele)','7MP','Apple A15 Bionic (5nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45617,1,'img/iPhone_images/ip_13_pro.png'),
(10,'ip_13_plus','Iphone 13 Plus',0,0,'Super Retina OLED, 1242x2691','iOS 18.2.1','12MP(wide)','7MP','Apple A15 Bionic (5nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45631,1,'img/iPhone_images/ip_13_plus.png'),
(11,'ip_13','Iphone 13',0,0,'Super Retina OLED, 1242x2691','iOS 18.2.1','12MP(wide)','7MP','Apple A15 Bionic (5nm)','Li-Ion 3174 mAh (12.08Wh)','157.5x77.4x7.7mm',45631,1,'img/iPhone_images/ip_13.png');

INSERT INTO `unit_colors`(`id`,`color`,`color_code`) VALUES
(1,'Natural Titanium','#8B8589'),
(2,'Blue Titanium','#5A8AA2'),
(3,'Black Titanium','#252525'),
(4,'White Titanium','#E5E5E5'),
(5,'Yellow','#FFFF00'),
(6,'Pink','#FFC0CB'),
(7,'Green','#008000'),
(8,'Blue','#0000FF'),
(9,'Black','#000000'),
(10,'Space Black','#1C1C1C'),
(11,'Gold','#FFD700'),
(12,'Deep Purple','#673AB7'),
(13,'Starlight','#F5F5F5'),
(14,'Silver','#C0C0C0'),
(15,'Purple','#800080'),
(16,'Midnight','#191970'),
(17,'Sierra Blue','#4682B4'),
(18,'Graphite','#4B4B4B'),
(19,'Alpine Green','#556B2F'),
(20,'Red','#FF0000');

INSERT INTO `unit_storages`(`id`,`capacity`) VALUES
(1,'64GB'),
(2,'128GB'),
(3,'256GB'),
(4,'512GB'),
(5,'1TB');





INSERT INTO `wishlists` (`user_id`,`iphone_id`,`rent_plan`,`return_plan`) VALUES
(1,10,'2024-11-10','2024-11-12');
