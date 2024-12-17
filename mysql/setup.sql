CREATE DATABASE IF NOT EXISTS passwords;
CREATE USER 'passwords_user'@'localhost' IDENTIFIED BY 'k(D2Whiue9d8yD';
GRANT ALL PRIVILEGES ON passwords.* TO 'passwords_user'@'localhost';
USE passwords;

SOURCE create_users_table.sql
SOURCE create_accounts_table.sql
SOURCE create_passwords_table.sql
SOURCE populate_users_table.sql

