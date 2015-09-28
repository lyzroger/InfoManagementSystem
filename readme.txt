1.Introduction

There are mainly 4 parts.They are login page(login.php), administrator page(administrator.php), sales manager page(salesmanager.php) and manager page(manager.php).

There are 3 tables in my database "coolbook". They are users, product, specialsale.


2.Page Description

add_cate.php: the php script for adding new product & category.

add_special.php: the php script for adding special sale products.

add_user.php: the php script for adding new users.

administrator.css: the css file for administrator.php.

administrator.php: the administrator's home page after login.

del_pro.php: the php script for deleting product.

del_special.php: the php script for deleting special sale product.

del_user.php: the php script for deleting user.

edit_product.css: the css file for edit_product.php.

edit_product.php: the php script for modifying product information.

edit_special.css: the css file for edit_special.php.

edit_special.php: the php script for modifying special sale product information.

edit_user.css: the css file for edit_user.php.

edit_user.php: the php script for modifying user information.

homework3.css: the css file.

homework3.js: the javascript file.

login.html: the html file for login.

login.php: the php script for login, varify the username and password and set up a session. 

logout.php: the php script for user to logout. User will also be automatically logout after 30 minutes.

manager.php: the home page for managers after login.

pro_search.php: the php script for searching the products.

product.css: the css file.

salesmanager.php: the salesmanager home page after login.

special.css: the css file for special.php.

special.php: the php script for showing, adding, modifying and deleting special sale product.

special_search.php: the php script for searching special sale product.

sub_edit_pro.php:the php script for changing product information in database.

sub_edit_special.php:the php script for changing special sale product information in database.

sub_edit_user.php:the php script for changing user information in database.

user_search.php: the php script for searching the users.


3.Database Description

1)users table: 

userid: the id for the users, it is unique and int(10).

username: the name for the user to login, it is unique and varchar(30).	

password: the password for a user to login and varchar(30).

usertype: users can be administrator, manager and sales manager and varchar(15).

firstname: user's firstname and varchar(30).

lastname: user's lastname and varchar(30)

age: user's age and tinyint(4)

salary: user's salary and float.


2)product table

PId: id for a product, it is unique and int(10).

PName: the name for a product and varchar(255).

PPrice: the price for a product, it must be positive and float.

PCate: the category for a product and varchar(255).

	
3)specialsale table:

PId: id for a special sale product. It is the same with the id in product table and int(10).

SPrice: price for a special sale product and float.

Discount: discount for a special sale product and varchar(10).

Startdate: start date of a special sale product. date pattern: yyyy-mm-dd

Enddate: end date of a special sale product. date pattern: yyyy-mm-dd


4.Users

Administrator:
Username:admin         Password:admin

Manager:
Username:manager       Password:manager

SalesManager:
Username:salesmanager  Password:salesmanager


5.Featrue Description:

1)Users have to login using an existed username and matched password.

2)The login.php check the usertype based on the username and direct to the corresponding page.

3)Administrator can modify, add and delete a user.

4)Manager can search and view the reports of products, users and special sale products.

5)Salesmanager can modify, add and delete product and special sale product.

6)Each page can be valided before loading.

7)Users will automatically logout after 30 minutes.

8)New category is created and showed automatically after salesmanager adding or modifying.
