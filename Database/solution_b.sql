-- Truy vấn đơn hàng

-- 1. Liệt kê các hóa đơn của khách hàng
SELECT users.user_id, users.user_name, orders.order_id FROM users INNER JOIN orders ON users.user_id = orders.user_id;

-- 2. Liệt kê số lượng hóa đơn của khách hàng
SELECT users.user_id, users.user_name, COUNT(orders.order_id) AS total_orders FROM users LEFT JOIN orders ON users.user_id = orders.user_id GROUP BY users.user_id, users.user_name;

-- 3. Liệt kê số sản phẩm trong mỗi đơn hàng
SELECT orders.order_id, COUNT(order_details.product_id) AS total_products FROM orders LEFT JOIN order_details ON orders.order_id = order_details.order_id GROUP BY orders.order_id;

-- 4. Liệt kê thông tin mua hàng của người dùng
SELECT users.user_id, users.user_name, orders.order_id, products.product_name FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
ORDER BY orders.order_id;

-- 5. Liệt kê 7 người dùng có số đơn hàng nhiều nhất
SELECT TOP 7 users.user_id, users.user_name, COUNT(orders.order_id) AS total_orders FROM users
JOIN orders ON users.user_id = orders.user_id
GROUP BY users.user_id, users.user_name
ORDER BY total_orders DESC;

-- 6. Liệt kê 7 người dùng mua sản phẩm có "Samsung" hoặc "Apple"
SELECT DISTINCT TOP 7 users.user_id, users.user_name, orders.order_id, products.product_name FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
WHERE products.product_name LIKE '%Samsung%' OR products.product_name LIKE '%Apple%';

-- 7. Liệt kê danh sách mua hàng với tổng tiền mỗi đơn
SELECT users.user_id, users.user_name, orders.order_id, SUM(products.product_price) AS total_price FROM users
JOIN orders ON users.user_id = orders.user_id
JOIN order_details ON orders.order_id = order_details.order_id
JOIN products ON order_details.product_id = products.product_id
GROUP BY users.user_id, users.user_name, orders.order_id;
