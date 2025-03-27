

-- Tạo database mới
CREATE DATABASE [EXE1_2];
GO
USE [EXE1_2];
GO
-- Tạo bảng users
CREATE TABLE users (
    user_id INT IDENTITY(1,1) PRIMARY KEY,
    user_name VARCHAR(25) NOT NULL,
    user_email VARCHAR(55) NOT NULL,
    user_pass VARCHAR(255) NOT NULL,
    updated_at DATETIME,
    created_at DATETIME
);

-- Tạo bảng products
CREATE TABLE products (
    product_id INT IDENTITY(1,1) PRIMARY KEY,
    product_name VARCHAR(255) NOT NULL,
    product_price FLOAT NOT NULL,
    product_description TEXT NOT NULL,
    updated_at DATETIME,
    created_at DATETIME
);

-- Tạo bảng orders
CREATE TABLE orders (
    order_id INT IDENTITY(1,1) PRIMARY KEY,
    user_id INT NOT NULL,
    updated_at DATETIME,
    created_at DATETIME,
    FOREIGN KEY (user_id) REFERENCES users(user_id)
);

-- Tạo bảng order_details
CREATE TABLE order_details (
    order_detail_id INT IDENTITY(1,1) PRIMARY KEY,
    order_id INT NOT NULL,
    product_id INT NOT NULL,
    updated_at DATETIME,
    created_at DATETIME,
    FOREIGN KEY (order_id) REFERENCES orders(order_id),
    FOREIGN KEY (product_id) REFERENCES products(product_id)
);

-- Chèn dữ liệu mẫu
INSERT INTO users (user_name, user_email, user_pass, updated_at, created_at) 
VALUES ('An Na', 'annaI@gmail.com', 'password123', GETDATE(), GETDATE());


INSERT INTO users (user_name, user_email, user_pass, updated_at, created_at) VALUES
('mai Van miaI', 'maivanmiaI@gmail.com', 'password123', GETDATE(), GETDATE()),
('Tran Thi B', 'tranthib@gmail.com', 'password456', GETDATE(), GETDATE()),
('mai Van miaI', 'maivanmiaI@yahoo.com', 'password789', GETDATE(), GETDATE());

INSERT INTO products (product_name, product_price, product_description, updated_at, created_at) VALUES
('Laptop Dell', 1500.00, 'Laptop Dell Core i7', GETDATE(), GETDATE()),
('iPhone 15', 1200.00, 'iPhone 15 Pro Max', GETDATE(), GETDATE()),
('Samsung Galaxy S23', 1100.00, 'Samsung Galaxy S23 Ultra', GETDATE(), GETDATE());

INSERT INTO orders (user_id, updated_at, created_at) VALUES
(1, GETDATE(), GETDATE()),
(2, GETDATE(), GETDATE()),
(3, GETDATE(), GETDATE());

INSERT INTO order_details (order_id, product_id, updated_at, created_at) VALUES
(1, 1, GETDATE(), GETDATE()),
(2, 2, GETDATE(), GETDATE()),
(3, 3, GETDATE(), GETDATE());


-- Truy vấn người dùng

-- 1. Lấy danh sách người dùng theo thứ tự Alphabet (A->Z)
SELECT * FROM users ORDER BY user_name ASC;

-- 2. Lấy 07 người dùng theo thứ tự Alphabet (A->Z)
SELECT TOP 7 * FROM users ORDER BY user_name ASC;

-- 3. Lấy danh sách người dùng có chữ 'a' trong tên
SELECT * FROM users WHERE user_name LIKE '%a%' ORDER BY user_name ASC;

-- 4. Lấy danh sách người dùng có tên bắt đầu bằng 'm'
SELECT * FROM users WHERE user_name LIKE 'm%';

-- 5. Lấy danh sách người dùng có tên kết thúc bằng 'i'
SELECT * FROM users WHERE user_name LIKE '%i';

-- 6. Lấy danh sách người dùng có email Gmail
SELECT * FROM users WHERE user_email LIKE '%@gmail.com';

-- 7. Lấy danh sách người dùng có email Gmail và tên bắt đầu bằng 'm'
SELECT * FROM users WHERE user_email LIKE '%@gmail.com' AND user_name LIKE 'm%';

-- 8. Lấy danh sách người dùng có email Gmail, tên chứa 'i' và độ dài > 5
SELECT * FROM users WHERE user_email LIKE '%@gmail.com' AND user_name LIKE '%i%' AND LEN(user_name) > 5;

-- 9. Lấy danh sách người dùng có chữ 'a', chiều dài 5-9, email Gmail, và tên email chứa 'I'
SELECT * FROM users WHERE user_name LIKE '%a%' AND LEN(user_name) BETWEEN 5 AND 9 AND user_email LIKE '%@gmail.com' AND CHARINDEX('I', UPPER(user_email)) > 0;


-- 10. Lấy danh sách người dùng thỏa một trong các điều kiện phức hợp
SELECT * FROM users WHERE (user_name LIKE '%a%' AND LEN(user_name) BETWEEN 5 AND 9) 
   OR (user_name LIKE '%i%' AND LEN(user_name) < 9) 
   OR (user_email LIKE '%@gmail.com' AND CHARINDEX('i', user_email) > 0);


