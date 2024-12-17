<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Final Project | CS 565 | Passwords Assignment</title>
    <link rel="stylesheet" href="css/style.css">
  </head>
  <body>
    <header>
      <h1>CRUD Operations via a Web Interface</h1>
    </header>
    <nav>
      <ul>
        <li><a href="#search-form">Search</a></li>
        <li><a href="#update-form">Update</a></li>
        <li><a href="#insert-form">Insert</a></li>
        <li><a href="#delete-form">Delete</a></li>
      </ul>
    </nav>
    <form id="clear-results" method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
      <!-- This could be a reset button or a clear function -->
      <button type="submit">Clear Results</button>
    </form>
<?php
require_once "includes/html/search-form.html";
require_once "includes/html/update-form.html";
require_once "includes/html/insert-form.html";
require_once "includes/html/delete-form.html";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    require_once 'db.php';
    $submitted = $_POST['submitted'] ?? null;

    switch ($submitted) {
        case '1': // Search
            $searchTerm = $_POST['search'] ?? '';
            $results = searchEntries($searchTerm);
            echo "<div id='results'>" . print_r($results, true) . "</div>";
            break;
        case '2': // Update
            updateEntry($_POST['current-attribute'], $_POST['new-attribute'], $_POST['query-attribute'], $_POST['pattern']);
            echo "<p>Update successful.</p>";
            break;
        case '3': // Insert
            insertEntry($_POST['user-id'], $_POST['website-name'], $_POST['url'], $_POST['email'], $_POST['username'], $_POST['password'], $_POST['comment']);
            echo "<p>Insert successful.</p>";
            break;
        case '4': // Delete
            deleteEntry($_POST['current-attribute'], $_POST['pattern']);
            echo "<p>Delete successful.</p>";
            break;
    }
}
?>
  </body>
</html>
