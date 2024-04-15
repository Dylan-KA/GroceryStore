DROP DATABASE IF EXISTS assignment1;
CREATE DATABASE assignment1;
use assignment1;

-- ----------------------------
-- Table structure for products
-- ----------------------------
DROP TABLE IF EXISTS `products`;
CREATE TABLE `products` (
  `product_id` int(10) unsigned DEFAULT NULL,
  `product_name` varchar(20) DEFAULT NULL,
  `unit_price` float(8,2) DEFAULT NULL,
  `unit_quantity` varchar(15) DEFAULT NULL,
  `in_stock` int(10) unsigned DEFAULT NULL,
  `category` varchar(20) DEFAULT NULL,
  `sub_category` varchar(20) DEFAULT NULL,
  `image_address` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- ----------------------------
-- Records of products
-- ----------------------------
BEGIN;
INSERT INTO `products` VALUES (1000, 'Fish Fingers', 2.55, '500 gram', 1500, 'Frozen Food', 'Frozen Meats', 'https://cdn0.woolworths.media/content/wowproductimages/large/096336.jpg');
INSERT INTO `products` VALUES (1001, 'Fish Fingers', 5.00, '1000 gram', 750, 'Frozen Food', 'Frozen Meats', 'https://cdn0.woolworths.media/content/wowproductimages/large/096336.jpg');
INSERT INTO `products` VALUES (1002, 'Hamburger Patties', 2.35, 'Pack 10', 1200, 'Frozen Food', 'Frozen Meats', 'https://cdn0.woolworths.media/content/wowproductimages/large/862590.jpg');
INSERT INTO `products` VALUES (1003, 'Shelled Prawns', 6.90, '250 gram', 300, 'Frozen Food', 'Frozen Meats', 'https://cdn0.woolworths.media/content/wowproductimages/large/218146.jpg');
INSERT INTO `products` VALUES (1004, 'Tub Ice Cream', 1.80, '1 Litre', 800, 'Frozen Food', 'Frozen Deserts', 'https://cdn0.woolworths.media/content/wowproductimages/large/739584.jpg');
INSERT INTO `products` VALUES (1005, 'Tub Ice Cream', 3.40, '2 Litre', 1200, 'Frozen Food', 'Frozen Deserts', 'https://cdn0.woolworths.media/content/wowproductimages/large/040518.jpg  ');

INSERT INTO `products` VALUES (2000, 'Panadol', 3.00, 'Pack 24', 2000, 'Other', 'Medicine', 'https://cdn0.woolworths.media/content/wowproductimages/large/180048.jpg');
INSERT INTO `products` VALUES (2001, 'Panadol', 5.50, 'Bottle 50', 1000, 'Other', 'Medicine', 'https://cdn2.tellmebaby.com.au/wp-content/uploads/2018/09/panadol-suppositories-6-months-5-years-20s.jpg');
INSERT INTO `products` VALUES (2002, 'Bath Soap', 2.60, 'Pack 6', 500, 'Other', 'Other', 'https://cdn0.woolworths.media/content/wowproductimages/large/189540.jpg');
INSERT INTO `products` VALUES (2003, 'Garbage Bags Small', 1.50, 'Pack 10', 500, 'Other', 'Other', 'https://i.ebayimg.com/images/g/mWsAAOSwnxplG120/s-l1200.webp');
INSERT INTO `products` VALUES (2004, 'Garbage Bags Large', 5.00, 'Pack 50', 300, 'Other', 'Other,', 'https://m.media-amazon.com/images/I/81UmLFPDHgL.jpg');
INSERT INTO `products` VALUES (2005, 'Washing Powder', 4.00, '1000 gram', 800, 'Other', 'Other', 'https://cdn0.woolworths.media/content/wowproductimages/large/142359.jpg');
INSERT INTO `products` VALUES (2006, 'Laundry Bleach', 3.55, '2 Litre Bottle', 500, 'Other', 'Other', 'https://cdn0.woolworths.media/content/wowproductimages/large/044100.jpg');

INSERT INTO `products` VALUES (3000, 'Cheddar Cheese', 8.00, '500 gram', 1000, 'Fresh Goods', 'Dairy', 'https://cdn0.woolworths.media/content/wowproductimages/large/033500.jpg');
INSERT INTO `products` VALUES (3001, 'Cheddar Cheese', 15.00, '1000 gram', 1000, 'Fresh Goods', 'Dairy', 'https://cdn0.woolworths.media/content/wowproductimages/large/033500.jpg');
INSERT INTO `products` VALUES (3002, 'T Bone Steak', 7.00, '1000 gram', 200, 'Fresh Goods', 'Meat', 'https://cdn0.woolworths.media/content/wowproductimages/large/675318.jpg');
INSERT INTO `products` VALUES (3003, 'Navel Oranges', 3.99, 'Bag 20', 200, 'Fresh Goods', 'Fruit', 'https://cdn0.woolworths.media/content/wowproductimages/large/259450.jpg');
INSERT INTO `products` VALUES (3004, 'Bananas', 1.49, 'Kilo', 400, 'Fresh Goods', 'Fruit', 'https://cdn0.woolworths.media/content/wowproductimages/large/133211.jpg');
INSERT INTO `products` VALUES (3005, 'Peaches', 2.99, 'Kilo', 500, 'Fresh Goods', 'Fruit', 'https://cdn0.woolworths.media/content/wowproductimages/large/144848.jpg');
INSERT INTO `products` VALUES (3006, 'Grapes', 3.50, 'Kilo', 200, 'Fresh Goods', 'Fruit', 'https://cdn0.woolworths.media/content/wowproductimages/large/855186.jpg');
INSERT INTO `products` VALUES (3007, 'Apples', 1.99, 'Kilo', 500, 'Fresh Goods', 'Fruit', 'https://cdn0.woolworths.media/content/wowproductimages/large/105919.jpg');

INSERT INTO `products` VALUES (4000, 'Earl Grey Tea Bags', 2.49, 'Pack 25', 1200, 'Drinks', 'Tea', 'https://cdn0.woolworths.media/content/wowproductimages/large/041944.jpg');
INSERT INTO `products` VALUES (4001, 'Earl Grey Tea Bags', 7.25, 'Pack 100', 1200, 'Drinks', 'Tea', 'https://cdn0.woolworths.media/content/wowproductimages/large/041944.jpg');
INSERT INTO `products` VALUES (4002, 'Earl Grey Tea Bags', 13.00, 'Pack 200', 800, 'Drinks', 'Tea', 'https://cdn0.woolworths.media/content/wowproductimages/large/041944.jpg');
INSERT INTO `products` VALUES (4003, 'Instant Coffee', 2.89, '200 gram', 500, 'Drinks', 'Coffee', 'https://cdn0.woolworths.media/content/wowproductimages/large/687035.jpg');
INSERT INTO `products` VALUES (4004, 'Instant Coffee', 5.10, '500 gram', 500, 'Drinks', 'Coffee', 'https://cdn0.woolworths.media/content/wowproductimages/large/687035.jpg');
INSERT INTO `products` VALUES (4005, 'Chocolate Bar', 2.50, '500 gram', 300, 'Snacks', 'Chocolate', 'https://m.media-amazon.com/images/I/61W5LYC6kiL.jpg');

INSERT INTO `products` VALUES (5000, 'Dry Dog Food', 5.95, '5 kg Pack', 400, 'Pet Food', 'Dog', 'https://www.petpost.com.au/cdn/shop/products/optimum-puppy-wet-dog-food-with-chicken-rice-vegetables-100g-278320.jpg?');
INSERT INTO `products` VALUES (5001, 'Dry Dog Food', 1.95, '1 kg Pack', 400, 'Pet Food', 'Dog', 'https://www.petpost.com.au/cdn/shop/products/optimum-puppy-wet-dog-food-with-chicken-rice-vegetables-100g-278320.jpg?');
INSERT INTO `products` VALUES (5002, 'Bird Food', 3.99, '500g packet', 200, 'Pet Food', 'Bird', 'https://cdn.metcash.media/image/upload/f_auto,c_limit,w_750,q_auto/igashop/images/363102');
INSERT INTO `products` VALUES (5003, 'Cat Food', 2.00, '500g tin', 200, 'Pet Food', 'Cat', 'https://cdn0.woolworths.media/content/wowproductimages/large/053224.jpg');
INSERT INTO `products` VALUES (5004, 'Fish Food', 2.00, '90g packet', 200, 'Pet Food', 'Fish', 'https://cdn0.woolworths.media/content/wowproductimages/large/360821.jpg');
INSERT INTO `products` VALUES (5004, 'Fish Food', 3.00, '200g packet', 200, 'Pet Food', 'Fish', 'https://cdn0.woolworths.media/content/wowproductimages/large/360822.jpg');

COMMIT;
