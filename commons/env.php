<?php 

// Biến môi trường, dùng chung toàn hệ thống
// Khai báo dưới dạng HẰNG SỐ để không phải dùng $GLOBALS

define('BASE_URL'       , 'http://localhost:8080/web_nuoc_hoa_nam11/');

define('BASE_URL_ADMIN'       , 'http://localhost:8080/web_nuoc_hoa_nam11/admin/');
define('DB_HOST'    , 'localhost');
define('DB_PORT'    , 3306);
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME'    , 'nuoc_hoa_nam_luxury');  // Tên database

define('PATH_ROOT'    , __DIR__ . '/../');