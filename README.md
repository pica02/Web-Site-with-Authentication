E-commerce with Authentication

Description:
This project is an e-commerce system with user authentication functionality. Users can register, log in, and purchase products. Administrators can manage the product catalog and orders.

-Technologies Used:
  Frontend: HTML, CSS, JavaScript
  Backend: PHP
  Database: Text file
  Authentication: SHA hashing
  Development Environment: MAMP

Installation

Clone the repository:

git clone https://www.github.com/pica02/Web-Site-with-Authentication
cd Web-Site-with-Authentication

Configure authentication:
The system saves users in a text file, so ensure that the users.txt file exists and has write permissions.
Passwords are encrypted using SHA before being stored.

Start the local server:
Open MAMP and start Apache and MySQL (even though an SQL database is not used, MySQL may be required for other functionalities).
Move the project files to the htdocs folder in MAMP.
Access the site via http://localhost/Web-Site-with-Authentication.

Usage
Register or log in via register.html or login.php.
Credentials are stored in users.txt and encrypted with SHA.
Browse the product catalog on products.php.
Add products to the cart and complete the purchase.
If you are an administrator, access admin.php to manage products and orders.

Project Structure

/Web-Site-with-Authentication

├── css (Website styles)

├── js (JavaScript scripts)

├── register.html (Registration page)

├── index.php (Main page)

├── login.php (Login page)

├── admin.php (Admin page)

├── products.php (Products page)

├── users.txt (Text file to store users)

├── t-shirt (Project images)

├── prodott (Project images)

└── config.php (Basic configuration)

Contributions

If you want to contribute:
Fork the repository.
Create a new branch with your feature: git checkout -b feature-name
Commit your changes: git commit -m "Added new feature"
Push to your repository: git push origin feature-name
Open a Pull Request.

License
This project is licensed under the MIT License. See the LICENSE file for details.

Contact
For questions or suggestions, contact me on GitHub or via email at gabri.pica@icloud.com.

