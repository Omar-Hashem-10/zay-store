<?php 


// $conn = mysqli_connect("localhost", "root", "");

// $sql = "CREATE DATABASE IF NOT EXISTS `zay-store`";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE IF NOT EXISTS slider (
//   `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `title` VARCHAR(200) NOT NULL,
//   `sub_title` VARCHAR(200) NOT NULL,
//   `description` VARCHAR(200) NOT NULL,
//   `image` VARCHAR(200) NOT NULL
// )";


// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");


// $sql = "INSERT INTO `slider` (`title`, `sub_title`, `description`, `image`)
// VALUES 
//   (
//     'Zay eCommerce', 
//     'Tiny and Perfect eCommerce Template', 
//     'Zay Shop is an eCommerce HTML5 CSS template with latest version of Bootstrap 5 (beta 1). This template is 100% free provided by TemplateMo website. Image credits go to Freepik Stories, Unsplash and Icons 8.', 
//     '01.jpg'
//   ),
//   (
//     'Proident occaecat',
//     'Aliquip ex ea commodo consequat',
//     'You are permitted to use this Zay CSS template for your commercial websites. You are not permitted to re-distribute the template ZIP file in any kind of template collection websites.',
//     '02.jpg'
//   ),
//   (
//     'Repr in voluptate',
//     'Ullamco laboris nisi ut',
//     'We bring you 100% free CSS templates for your websites. If you wish to support TemplateMo, please make a small contribution via PayPal or tell your friends about our website. Thank you.',
//     '03.jpg'
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE IF NOT EXISTS category (
//   `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `name` VARCHAR(200) NOT NULL,
//   `category_month` VARCHAR(200) ,
//   `image` VARCHAR(200) NOT NULL
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `category` (`name`, `category_month`, `image`) 
// VALUES 
//   (
//     'Watches',
//     'month',
//     '01.jpg'
//   ),
//   (
//     'Shoes',
//     'month',
//     '02.jpg'
//   ),
//   (
//     'Accessories',
//     'month',
//     '03.jpg'
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE IF NOT EXISTS product (
//   `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `title` VARCHAR(200) NOT NULL,
//   `featured_product` VARCHAR(200),
//   `price` SMALLINT,
//   `rating` SMALLINT NOT NULL,
//   `review`SMALLINT,
//   `description` TEXT,
//   `image` VARCHAR(200) NOT NULL,
//   `gender` VARCHAR(200),
//   `category_id` INT NOT NULL,
//   FOREIGN KEY (category_id) REFERENCES category(id)
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);


// $conn = mysqli_connect("localhost", "root", "", "zay-store");


// $sql = "INSERT INTO `category` (`name`, `image`) VALUES('fitness_weights' , '04.jpg')";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `product` (`title`, `description`, `price`, `rating`, `review`, `image`,  `featured_product`, `category_id`) 
// VALUES
//   (
//     'Gym Weight',
//     'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt in culpa qui officia deserunt.',
//     240,
//     3,
//     24,
//     '01.jpg',
//     'featured',
//     4
//   ),
//   (
//       'Apple Watch',
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     480,
//     4,
//     48,
//     '02.jpg',
//     'featured',
//     1
//   ),
//   (
//       'Cloud Nike Shoes',
//     'Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.',
//     360,
//     5,
//     74,
//     '03.jpg',
//     'featured',
//     2
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);


// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `category` (`name`, `image`)
// VALUES
//   (
//     'collar shirts',
//     '05.jpg'
//   ),
//   (
//     'blouses',
//     '06.jpg'
//   ),
//   (
//     'dresss',
//     '07.jpg'
//   ),
//   (
//     'Shirt',
//     '08.jpg'
//   ),
//   (
//     'Blazer',
//     '09.jpg'
//   ),
//   (
//     'Abaya',
//     '10.jpg'
//   ),
//   (
//     'suit',
//     '11.jpg'
//   ),
//   (
//     'Sportswear',
//     '12.jpg'
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `product` (`title`, `rating`, `price`, `image`, `gender`, `category_id`)
// VALUES
//   (
//   'Oupidatat non',
//   3,
//   250,
//   '01.jpg',
//   'women',
//   8
//   ),
//   (
//   'Oupidatat non',
//   4,
//   150,
//   '02.jpg',
//   'women',
//   9
//   ),
//   (
//   'Oupidatat non',
//   5,
//   200,
//   '03.jpg',
//   'women',
//   10
//   ),
//   (
//   'Oupidatat non',
//   4,
//   300,
//   '04.jpg',
//   'men',
//   11
//   ),
//   (
//   'Oupidatat non',
//   3,
//   250,
//   '05.jpg',
//   'men',
//   12
//   ),
//   (
//   'Oupidatat non',
//   5,
//   200,
//   '06.jpg',
//   'women',
//   13
//   ),
//   (
//   'Oupidatat non',
//   4,
//   300,
//   '07.jpg',
//   'men',
//   14
//   ),
//   (
//   'Oupidatat non',
//   5,
//   200,
//   '08.jpg',
//   'women',
//   15
//   ),
//   (
//   'Oupidatat non',
//   3,
//   150,
//   '09.jpg',
//   'women',
//   8
//   )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE IF NOT EXISTS services (
//   `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `name` VARCHAR(200) NOT NULL,
//   `image` VARCHAR(200) NOT NULL
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `services` (`name`, `image`) 
// VALUES
//   (
//     'Delivery Services',
//     'fa fa-truck fa-lg'
//   ),
//   (
//     'Shipping & Return',
//     'fas fa-exchange-alt'
//   ),
//   (
//     'Promotion',
//     'fa fa-percent'
//   ),
//   (
//     '24 Hours Service',
//     'fa fa-user'
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);


// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE IF NOT EXISTS brands (
//   `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `image` VARCHAR(200) NOT NULL
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `brands` (`image`) 
// VALUES 
//   (
//     '01.jpg'
//   ),
//   (
//     '02.jpg'
//   ),
//   (
//     '03.jpg'
//   ),
//   (
//     '04.jpg'
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);


// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE IF NOT EXISTS contact (
//   `id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
//   `name` VARCHAR(200) NOT NULL,
//   `email` VARCHAR(200) NOT NULL,
//   `subject` VARCHAR(200) NOT NULL,
//   `message` TEXT NOT NULL
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `product` (`title`, `rating`, `price`, `image`, `review`,  `description`,`category_id`)
// VALUES
//   (
//     'Apple Watch',
//     5,
//     400,
//     '11.jpg',
//     74,
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     1
//   ),
//   (
//     'Apple Watch',
//     4,
//     300,
//     '11.jpg',
//     80,
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     1
//   ),
//   (
//     'Apple Watch',
//     3,
//     450,
//     '11.jpg',
//     94,
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     1
//   ),
//   (
//     'Apple Watch',
//     5,
//     340,
//     '11.jpg',
//     100,
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     1
//   ),
//   (
//     'Apple Watch',
//     2,
//     150,
//     '11.jpg',
//     50,
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     1
//   ),
//   (
//     'Apple Watch',
//     5,
//     500,
//     '11.jpg',
//     450,
//     'Aenean gravida dignissim finibus. Nullam ipsum diam, posuere vitae pharetra sed, commodo ullamcorper.',
//     1
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `product` (`title`, `rating`, `price`, `image`, `review`,  `description`,`category_id`)
// VALUES
//   (
//     'Cloud Nike Shoes',
//     5,
//     360,
//     '10.jpg',
//     90,
//     'Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.',
//     2
//   ),
//   (
//     'Cloud Nike Shoes',
//     4,
//     400,
//     '10.jpg',
//     85,
//     'Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.',
//     2
//   ),
//   (
//     'Cloud Nike Shoes',
//     3,
//     300,
//     '10.jpg',
//     100,
//     'Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.',
//     2
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "INSERT INTO `product` (`title`, `rating`, `price`, `image`, `review`,  `description`,`category_id`)
// VALUES
//   (
//     'Ray-Ban',
//     5,
//     500,
//     '12.jpg',
//     95,
//     'Curabitur ac mi sit amet diam luctus porta. Phasellus pulvinar sagittis diam, et scelerisque ipsum lobortis nec.',
//     3
//   )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE customer (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `name` VARCHAR(50) NOT NULL,
//     `phone` VARCHAR(20),
//     shipping_address TEXT,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
// );
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");

// $sql = "CREATE TABLE order_items (
//     `id` INT AUTO_INCREMENT PRIMARY KEY,
//     `order_id` INT NOT NULL,
//     `product_id` INT NOT NULL,
//     `quantity` INT NOT NULL,
//     `unit_price` DECIMAL(10, 2) NOT NULL,
//     `size` VARCHAR(50) NULL, 
//     FOREIGN KEY (order_id) REFERENCES orders(id),
//     FOREIGN KEY (product_id) REFERENCES product(id)
// )
// ";

// mysqli_query($conn, $sql);

// mysqli_close($conn);

// $conn = mysqli_connect("localhost", "root", "", "zay-store");


// $sql = "CREATE TABLE orders (
//     id INT AUTO_INCREMENT PRIMARY KEY,
//     customer_id INT NOT NULL,
//     order_date TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     status ENUM('Pending', 'Processing', 'Shipped', 'Delivered', 'Cancelled') DEFAULT 'Pending',
//     total_amount DECIMAL(10, 2) NOT NULL,
//     payment_method ENUM('Credit Card', 'PayPal', 'Bank Transfer', 'Cash on Delivery') DEFAULT 'Credit Card',
//     shipping_address TEXT,
//     shipping_cost DECIMAL(10, 2) DEFAULT 0.00,
//     created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
//     updated_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
//     FOREIGN KEY (customer_id) REFERENCES customer(id)
// )";

// mysqli_query($conn, $sql);

// mysqli_close($conn);