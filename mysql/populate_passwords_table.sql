
INSERT INTO passwords (account_id, encrypted_password) VALUES
(1, AES_ENCRYPT('Password123!', 'MySecureKey123!@#')),
(2, AES_ENCRYPT('SecurePass!@#', 'MySecureKey123!@#'));
