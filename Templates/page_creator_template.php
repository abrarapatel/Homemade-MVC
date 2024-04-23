<?php
if (isset($_GET['submit'])) {
    $fileName = $_GET['userInput'];
    $this->controller->createPage($fileName);
} elseif (isset($_GET['delete'])) {
    $fileName = $_GET['userInput'];
    if ($fileName != "page_creator") {
        $this->controller->deletePage($fileName);
    } else {
        echo "This file cannot be deleted";
    }
}
?>


<!DOCTYPE html>
<html>

<head>
    <title>Simple Form</title>
</head>

<body>

    <form method="get">
        <label for="userInput">Enter something:</label>
        <input type="text" id="userInput" name="userInput" placeholder="Your text here">
        <br>
        <button type="submit" name="submit">Submit</button>
        <button name="delete">Delete</button>
    </form>
</body>

</html>