# test02.com

-mysql

```
mysql> CREATE TABLE user_list(
    -> id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -> name VARCHAR(20) NOT NULL,
    -> pwd VARCHAR(60) NOT NULL,
    -> head_image VARCHAR(30),
    -> join_date DATETIME,
	-> role VARCHAR(20));
	
mysql> CREATE TABLE text_list(
    -> text_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -> author VARCHAR(20) NOT NULL,
    -> text VARCHAR(500) NOT NULL,
    -> join_date DATETIME);
	
mysql> CREATE TABLE comment_list(
    -> comment_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    -> comment VARCHAR(300) NOT NULL,
	-> comment_author VARCHAR(20) NOT NULL,
    -> join_date DATETIME);

设置外键：
mysql> ALTER TABLE comment_list ADD COLUMN text_id INT UNSIGNED;
mysql> ALTER TABLE comment_list ADD FOREIGN KEY (text_id) REFERENCES text_list (text_id)
    -> ON DELETE SET NULL
    -> ON UPDATE CASCADE;
	
mysql> SELECT * FROM user_list;
+----+---------+------------------------------------------+------------+---------------------+------+
| id | name    | pwd                                      | head_image | join_date           | role |
+----+---------+------------------------------------------+------------+---------------------+------+
|  1 | Owen    | 356a192b7913b04c54574d18c28d46e6395428ab | aaa.jpg    | 2017-12-04 20:30:48 | user |
|  2 | hhdidid | 356a192b7913b04c54574d18c28d46e6395428ab | a.jpg      | 2017-12-04 20:39:44 | root |
+----+---------+------------------------------------------+------------+---------------------+------+

mysql> SELECT * FROM text_list;
+---------+---------+-------------------------------------------------------------------------------------------------------------------------------------------+---------------------+
| text_id | author  | text                                                                                                                                      | join_date           |
+---------+---------+-------------------------------------------------------------------------------------------------------------------------------------------+---------------------+
|       1 | Owen    | You are at a wonderful stage of life.You have many wonderful stages of life yet to come,but they are not without their costs and perils.  | 2017-12-04 20:31:32 |
|       2 | hhdidid | You are at a wonderful stage of life.You have many wonderful stages of life yet to come,but they are not without their costs and perils.  | 2017-12-04 21:39:56 |
+---------+---------+-------------------------------------------------------------------------------------------------------------------------------------------+---------------------+

mysql> SELECT * FROM comment_list;
+------------+----------------------+----------------+---------------------+---------+
| comment_id | comment              | comment_author | join_date           | text_id |
+------------+----------------------+----------------+---------------------+---------+
|          2 | I agree.             | hhdidid        | 2017-12-04 20:41:34 |       1 |
|          4 | 66666666666666666666 | Owen           | 2017-12-04 22:01:01 |       2 |
+------------+----------------------+----------------+---------------------+---------+
```

-------------------------------------------------------------------------------------------
### 参考：《Head First PHP&MYSQL》、菜鸟教程、w3school、博客园、CSDN博客...