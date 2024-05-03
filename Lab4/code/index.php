<?php ob_start();
require __DIR__ . '/vendor/autoload.php';
$idSheet = "1ceiPfXOGNh-zedoupmKJYHBCPTF6vNO9gwC4mv6gv-E";
// Путь к папке, где хранятся категории
$categories = array("Car", "House", "Other"); ?>
<?php function retrieveInRangeData(string $range, string $IdSheet, Google_Service_Sheets $service): ?array
{
    $response = $service->spreadsheets_values->get($IdSheet, $range);
    return $response->getValues();
}
function acquireService(string $name, string $path) : Google_Service_Sheets
{
    $client = new Google_Client();
    $client->setApplicationName($name);
    $client->setScopes([Google_Service_Sheets::SPREADSHEETS]);
    $client->setAuthConfig($path);
    return new Google_Service_Sheets($client);
}
$path = __DIR__ . '/WebCredentials.json';
$service = acquireService("WEB", $path)
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Лаба 4</title>
</head>
<body>
<div class="form">
    <form action="save.php" class="form" method="post">
        <label>Email</label>
        <label id="email" for="email">
            <input type="email" name="email" required>
        </label>
        <label id="category" for="category">
            Category
            <select name="category">
                <?php
                for ($i = 0; $i < sizeof($categories); $i++) {
                    echo "<option value=\"$categories[$i]\">$categories[$i]</option>";
                }
                ?>
            </select>
        </label>
        <label id="title" for="title">
            Title
            <input type="text" name="title" required>
        </label>
        <label id="description" for="description">
            Description
            <textarea rows="3" name="description"></textarea>
        </label>
        <input type="submit" value="save">
    </form>
</div>
<div class="table">
    <table>
        <thead>
        <?php
        $headers = ['Category', 'Email', 'Title', 'Description'];
        if (null != $headers) {
            foreach ($headers as $item) {
                echo "<th>$item</th>";
            }
        }
        ?>
        </thead>
        <tbody>
        <?php
        $rangeOfAllContent = "Лист1";
        $rowsArray = retrieveInRangeData($rangeOfAllContent, $idSheet, $service);
        if (null != $rowsArray) {
            foreach ($rowsArray as $row) {
                echo "<tr>";
                foreach ($row as $item) {
                    echo "<td>" . $item . "</td>";
                }
                echo "</tr>";
            }
        }?>
        </tbody>
    </table>
</div>
</body>
</html>
