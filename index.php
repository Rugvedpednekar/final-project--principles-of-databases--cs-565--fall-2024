<?php
require_once('includes/php/db.php');

// Initialize variables to handle feedback and results
$results = [];
$message = '';
$confirmation = false;

// Handle form submissions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_POST['submitted'])) {
        switch ($_POST['submitted']) {
            case '1': // Search
                $results = searchAccounts($_POST['search']);
                if (count($results) > 0) {
                    $message = 'Search completed successfully.';
                } else {
                    $message = 'No matching accounts found.';
                }
                break;

            case '2': // Update
                updateAccount($_POST['current-attribute'], $_POST['new-attribute'], $_POST['query-attribute'], $_POST['pattern']);
                $message = 'Account updated successfully.';
                break;

            case '3': // Insert
                insertAccount($_POST['user-id'], $_POST['site-name'], $_POST['url'], $_POST['password'], $_POST['comment']);
                $message = 'Account added successfully.';
                break;

            case '4': // Delete
                // Show confirmation prompt
                if (isset($_POST['confirm']) && $_POST['confirm'] === 'yes') {
                    deleteAccount($_POST['current-attribute'], $_POST['pattern']);
                    $message = 'Account deleted successfully.';
                } else {
                    $confirmation = true; // Set flag for confirmation
                }
                break;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Password Manager | CS 565 Final Project</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Password Manager</h1>
    </header>

    <main>
        <?php if ($message) : ?>
            <p class="message"><?= htmlspecialchars($message) ?></p>
        <?php endif; ?>

        <!-- Insert Form -->
        <section>
            <h2>Insert a New Account</h2>
            <?php require_once "includes/html/insert-form.html"; ?>
        </section>

        <!-- Search Form -->
        <section>
            <h2>Search Accounts</h2>
            <?php require_once "includes/html/search-form.html"; ?>
        </section>

        <!-- Update Form -->
        <section>
            <h2>Update Account Information</h2>
            <?php require_once "includes/html/update-form.html"; ?>
        </section>

        <!-- Delete Form -->
        <section>
            <h2>Delete an Account</h2>
            <?php if ($confirmation) : ?>
                <form method="post">
                    <p>Are you sure you want to delete this account?</p>
                    <input type="hidden" name="submitted" value="4">
                    <input type="hidden" name="current-attribute" value="<?= htmlspecialchars($_POST['current-attribute'] ?? '') ?>">
                    <input type="hidden" name="pattern" value="<?= htmlspecialchars($_POST['pattern'] ?? '') ?>">
                    <button type="submit" name="confirm" value="yes">Yes</button>
                    <button type="submit" name="confirm" value="no">No</button>
                </form>
            <?php else : ?>
                <?php require_once "includes/html/delete-form.html"; ?>
            <?php endif; ?>
        </section>

        <!-- Search Results -->
        <?php if (isset($results) && count($results) > 0) : ?>
            <section>
                <h2>Search Results</h2>
                <table>
                    <thead>
                        <tr>
                            <th>Account ID</th>
                            <th>User ID</th>
                            <th>Site Name</th>
                            <th>URL</th>
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Comment</th>
                            <th>Created At</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $account) : ?>
                            <tr>
                               <td><?= htmlspecialchars($account['account_id'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['user_id'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['site_name'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['url'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['email'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['username'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['decrypted_password'] ?? '') ?></td> <!-- Display the decrypted password -->
                               <td><?= htmlspecialchars($account['comment'] ?? '') ?></td>
                               <td><?= htmlspecialchars($account['created_at'] ?? '') ?></td>

                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </section>
        <?php endif; ?>
    </main>

    <footer>
        <p>&copy; 2024 Password Manager | CS 565 Final Project</p>
    </footer>
</body>
</html>
