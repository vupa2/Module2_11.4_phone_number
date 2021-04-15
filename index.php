<?php
const VIETTEL_PHONE = ["086", "096", "097", "098", "032", "033", "034", "035", "036", "037", "038", "039"];
const MOBIPHONE_PHONE = ["089", "090", "093", "070", "076", "077", "078", "079"];
const VINAPHONE_PHONE = ["088", "091", "094", "081", "082", "083", "084", "085"];
$viettel = [];
$mobiphone = [];
$vinaphone = [];
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST["classify"])) {
        $phoneNumberArray = explode(",", $_POST["phone_number"]);
        foreach ($phoneNumberArray as $phoneNumber) {
            $number = substr($phoneNumber, 0, 3);
            if (in_array($number, VIETTEL_PHONE)) {
                array_push($viettel, $phoneNumber);
            } elseif (in_array($number, MOBIPHONE_PHONE)) {
                array_push($mobiphone, $phoneNumber);
            } elseif (in_array($number, VINAPHONE_PHONE)) {
                array_push($vinaphone, $phoneNumber);
            }
        }
    }
}
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Classify phone number</title>
    <style>
        body {
            display: flex;
            flex-direction: column;
        }

        .phone_form {
            margin-bottom: 30px;
        }

        table {
            border-collapse: collapse;
        }

        td {
            border: 1px solid black;
        }
    </style>
</head>
<body>
<h3>classify phone number</h3>
<div class="phone_form">
    <form action="index.php" method="post">
        <label>Enter phone number</label>
        <label>
            <textarea name="phone_number" id="" cols="100" rows="10"></textarea>
        </label>
        <button name="classify">Classify</button>
    </form>
</div>
<div>
    <table>
        <caption>List phone</caption>
        <tr>
            <td>Viettel</td>
            <td>Mobiphone</td>
            <td>Vinaphone</td>
        </tr>
        <tr>
            <td>
                <?php
                if (!empty($viettel)) {
                    foreach ($viettel as $phone) {
                        echo $phone . "<br>";
                    }
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($mobiphone)) {
                    foreach ($mobiphone as $phone) {
                        echo $phone . "<br>";
                    }
                }
                ?>
            </td>
            <td>
                <?php
                if (!empty($vinaphone)) {
                    foreach ($vinaphone as $phone) {
                        echo $phone . "<br>";
                    }
                }
                ?>
            </td>
        </tr>
    </table>
</div>
</body>
</html>
