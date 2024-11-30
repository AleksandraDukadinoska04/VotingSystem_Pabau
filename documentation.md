---------VERSIONS----------
PHP Version: 8.2.12
Database: MySQL (managed via PHPMyAdmin)
MySQL Version: 10.4.32-MariaDB
Composer Version: 2.8.3
Node.js Version: v22.11.0
NPM Version: 10.9.0
Git Version: 2.47.0.windows.2


---------SET UP THE PROJECT----------

1. Clone the Project:
git clone (link of the cloned GitHub repository)
cd (your project folder)

2. Importing the Database:
To set up the database for this project, you need to import the SQL file pabau.sql located in the Database folder. This step will create the necessary tables and populate them with initial data.

3.Configure Database Connection:
After importing the SQL file to set up your database, you'll need to configure the database connection in the autoload.php file. Update the following line(5) with your database details 
*$connObj = new Connection("mysql", "your_host", "your_database_name", your_port, "your_database_user", "your_password");

4.Start the Project:
php -S localhost:8000

5.Login as employee:
email: enter any employee email
password: password123


-------------Project Description-----------

This project allows employees of the company to vote for their colleagues in the following categories (Makes Work Fun, Team Player, Culture Champion, Difference Maker) every month. In order to vote, they must be logged in, then select a colleague and a category and enter a comment. A colleague can be voted for in multiple categories, but for one category they can only vote for one colleague, and they cannot vote for themselves. The winners of each category are designated at the end of each month in the end_of_voting.php file, which generates certificates for the winners and sends them to download them, also in that file the certificates folder is emptied and the votes table is emptied so that employees can vote again in the following month. I should mention that a cron job can be set for this document, which would execute the code every day at midnight. This way, new winners can be selected for each category every month and certificates can be generated for them. The website is responsive and is available for tablets, mobile phones and monitors.

