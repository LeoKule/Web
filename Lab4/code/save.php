<?php
require 'index.php';
function redirectHome(): void
{
    header("Location: /");
    exit();
}

if (false === isset($_POST['email'], $_POST['category'], $_POST['title'], $_POST['description'])) {
    redirectHome();
}
$service = acquireService("Web", __DIR__ . '/WebCredentials.json');
$category = $_POST['category'];
$email = $_POST['email'];
$title = $_POST['title'];
$description = $_POST['description'];

$range = "Лист1";
$dataRow =[
    [
        $category,
        $email,
        $title,
        $description
    ]
];

$spreadSheetId = "1ceiPfXOGNh-zedoupmKJYHBCPTF6vNO9gwC4mv6gv-E";
$body = new Google_Service_Sheets_ValueRange();
$body->setValues($dataRow);
$insert = [
    'insertDataOption' => "INSERT_ROWS"
];
$params = [
    'valueInputOption' => 'RAW'
];
try {
    $service->spreadsheets_values->append(
        $spreadSheetId,
        $range,
        $body,
        $params);
} catch (\Google\Service\Exception $e) {
    echo "Some errors in write data" . $e;
}
redirectHome();