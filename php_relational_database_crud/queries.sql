SELECT 
sellers.id,
sellers.first_name,
sellers.last_name,
sellers.dni,
sellers.birthday,
sellers.hiring_date,
sellers.work_id,
sellers.phone,
GROUP_CONCAT(CONCAT(branches.`state`, "-", branches.city)) AS branchName
FROM sellers
INNER JOIN branch_seller ON branch_seller.id_seller = sellers.id
INNER JOIN branches ON branches.id = branch_seller.id_branch
WHERE active = 1
GROUP BY sellers.id, sellers.first_name, sellers.last_name, sellers.dni, 
sellers.birthday, sellers.hiring_date, sellers.work_id, sellers.phone
ORDER BY  sellers.id DESC

SELECT
branches.city
FROM branches

SELECT
MAX(sellers.id) AS lastId
FROM sellers

SELECT LAST_INSERT_ID() as lastId FROM sellers
LIMIT 1

SELECT * FROM sellers WHERE id=3

UPDATE branch_seller SET id_branch = 3 WHERE id_seller = 24

SELECT 
products.id, 
products.product_name,
category.category_name 
FROM products
INNER JOIN category ON category.id = products.category_id

SELECT 
sales.id,
CONCAT(branches.`state`, "-", branches.city) AS Branch,
CONCAT(sellers.first_name, ' ', sellers.last_name) AS Employee,
sales.sale_date, products.product_name AS Product, sales.quantity,
sales.price, (sales.quantity * sales.price) AS Total 
FROM sales
INNER JOIN branches ON branches.id = sales.branch_id
INNER JOIN sellers ON sellers.id = sales.seller_id
INNER JOIN products ON products.id = sales.product_id
ORDER BY sales.id DESC

SELECT sellers.id, CONCAT(sellers.first_name, " ", sellers.last_name) as seller_name FROM sellers

SELECT 
Branches.id, 
CONCAT(branches.`state`,'-',branches.city) as Branch, 
SUM((sales.quantity* sales.price)) as TotalBranch
FROM sales
INNER JOIN branches ON branches.id = sales.branch_id
GROUP BY branches.id, Branch 
ORDER BY Branch 

SELECT 
CONCAT(sellers.first_name, " ", sellers.last_name) as Seller, 
products.product_name, sales.sale_date, sales.quantity, (sales.quantity*sales.price) as Total 
FROM sales
INNER JOIN sellers ON sellers.id = sales.seller_id
INNER JOIN products ON products.id = sales.product_id
WHERE sales.branch_id = 5

SELECT 
sellers.id,
CONCAT(sellers.first_name, " ", sellers.last_name) AS Seller,
sellers.work_id, 
SUM(sales.quantity * sales.price) AS TotalSold
FROM sales
INNER JOIN sellers ON sellers.id = sales.seller_id
GROUP BY seller_id, Seller, sellers.work_id
ORDER BY Seller

SELECT
CONCAT(branches.`state`, "-", branches.city) AS Branch,
products.product_name, 
sales.sale_date, 
sales.quantity, 
(sales.quantity * sales.price) AS Total
FROM sales
INNER JOIN branches ON branches.id = sales.branch_id
INNER JOIN products ON products.id = sales.product_id
WHERE sales.seller_id = 25

SELECT branch_seller.id_seller, branch_seller.id_branch,
sellers.first_name, sellers.last_name, sellers.dni, sellers.birthday, 
sellers.hiring_date, sellers.work_id, sellers.phone
FROM branch_seller
INNER JOIN sellers ON sellers.id = branch_seller.id_seller
WHERE branch_seller.id_seller = 24

SELECT * FROM category
WHERE category.status = 1

SELECT CONCAT(UPPER(SUBSTRING(sellers.first_name,1,3)), UPPER(SUBSTRING(sellers.last_name,1,1)), "-", YEAR(NOW()))
FROM sellers

INSERT INTO sellers(first_name, last_name, dni, birthday, hiring_date, work_id, phone, status)
 VALUES('jose', 'maria', '1234', '2000-02-02', '2020-02-02', (SELECT CONCAT(CAST((RAND()*1000000) AS DECIMAL(6)),"-",YEAR(NOW())) AS work_id), '1234567890', 1) 

UPDATE sellers set work_id = (SELECT CONCAT(CAST((RAND()*1000000) AS DECIMAL(6)),"-",YEAR(NOW())) AS work_id)
