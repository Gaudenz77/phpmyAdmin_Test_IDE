<?php
// connect to mysql, using php-PDO-Object
$dbHost = getenv('DB_HOST');
$dbName = getenv('DB_NAME');
$dbUser = getenv('DB_USER');
$dbPassword = getenv('DB_PASSWORD');

$dbConnection = new PDO("mysql:host=$dbHost;dbName=$dbName;charset=utf8", $dbUser,  $dbPassword);
// set ERROR-MODE for webDevs ("->" calls function in class-object (new PDO (see above), "::" is a static variable, like a constant-variable)
$dbConnection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 

echo "$dbHost $dbName $dbUser $dbPassword";

// FETCH ALL DATA From `books` with SELECT -statement;
 $query = $dbConnection->query("SELECT * FROM library.books");

    echo "<table>";

// IF"row" === "null", (condition) will be interpreted as "false" by PHP
// While Loop can be left
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    // code...(do something)
    
    echo "<tr>";

    // FOR LOOP give ARRAY of book table conntent in a row

    foreach ($row as $columName => $value) {
        // code...
        echo "<td>$value</td>";
    }
    
    echo "</tr>";
   

}
echo "</table>";
?>

