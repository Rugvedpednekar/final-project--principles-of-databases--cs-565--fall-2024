INSERT INTO accounts (user_id, site_name, url, password, comment) VALUES
(1, 'Netflix', 'https://netflix.com', AES_ENCRYPT('streaming123', 'encryption_key'), 'Family subscription'),
(2, 'Amazon', 'https://amazon.com', AES_ENCRYPT('shopSecure456', 'encryption_key'), 'Shopping account'),
(3, 'Google', 'https://google.com', AES_ENCRYPT('myGooglePass789', 'encryption_key'), 'Main email provider'),
(4, 'Dropbox', 'https://dropbox.com', AES_ENCRYPT('storeFiles101', 'encryption_key'), 'Cloud storage'),
(5, 'Medium', 'https://medium.com', AES_ENCRYPT('writer456', 'encryption_key'), 'Writing platform'),
(6, 'Trello', 'https://trello.com', AES_ENCRYPT('taskBoard202', 'encryption_key'), 'Project management'),
(7, 'Zoom', 'https://zoom.us', AES_ENCRYPT('callMeeting321', 'encryption_key'), 'Video conferencing'),
(8, 'Apple', 'https://apple.com', AES_ENCRYPT('iStoreAccess123', 'encryption_key'), 'Device management'),
(9, 'Etsy', 'https://etsy.com', AES_ENCRYPT('craftShop789', 'encryption_key'), 'Handmade goods'),
(10, 'Coursera', 'https://coursera.org', AES_ENCRYPT('learnOnline123', 'encryption_key'), 'Online learning platform');
