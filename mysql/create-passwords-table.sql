CREATE TABLE passwords (
    password_id INT AUTO_INCREMENT PRIMARY KEY,
    account_id INT NOT NULL,
    encrypted_password VARBINARY(255) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (account_id) REFERENCES accounts(account_id) ON DELETE CASCADE
);
