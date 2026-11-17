<?php
    $errors = [];
    $data['name'] = trim($_POST['name'] ?? '');
    $data['age'] = trim($_POST['age'] ?? '');
    $data['email'] = trim($_POST['email'] ?? '');
    $data['checkbox'] = trim($_POST['checkbox'] ?? '');
    $data['date'] = trim($_POST['date'] ?? '');

    if ($_POST){
        if ($data['name'] === '') {
            $errors['name'] = 'Name is required.';
        } elseif (str_word_count($data['name']) < 2) {
            $errors['name'] = 'Name must contain at least 2 words.';
        }

        if ($data['age'] === '') {
            $errors['age'] = 'Age is required.';
        } elseif (filter_var($data['age'], FILTER_VALIDATE_INT) === false) {
            $errors['age'] = 'Age must be an integer.';
        } elseif ($data['age'] < 0 || $data['age'] > 99) {
            $errors['age'] = 'Age must be between 0 and 99.';
        }

        if ($data['email'] === '') {
            $errors['email'] = 'E-mail is required.';
        } elseif (!filter_var($data['email'], FILTER_VALIDATE_EMAIL)) {
            $errors['email'] = 'Invalid e-mail format.';
        }

        if ($data['checkbox'] !== 'on') {
            $errors['checkbox'] = 'You must check this box.';
        }

        if ($data['date'] === '') {
            $errors['date'] = 'Date is required.';
        } else {
            $date = DateTime::createFromFormat('!Y-m-d', $data['date']);
            $today = new DateTime('today');

            if (!$date || $date->format('Y-m-d') !== $data['date']) {
                $errors['date'] = 'Invalid date.';
            } elseif ($date >= $today) {
                $errors['date'] = 'Date must be before today.';
            }
        }

        if (count($errors) === 0) {
            // Save data to database, next week
        }
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="2.php" method="POST" novalidate>
        Name: <input type="text" name="name" value="<?= $data["name"] ?>">
        <?= $errors['name'] ?? '' ?><br>
        <!-- must not be empty, must have at least 2 words -->

        Age: <input type="text" name="age" value="<?= $data["age"] ?>">
        <?= $errors['age'] ?? '' ?><br>
        <!-- must not be empty, must be integer, must be 0-99 -->

        E-mail: <input type="text" name="email" value="<?= $data["email"] ?>">
        <?= $errors['email'] ?? '' ?><br>
        <!-- must not be empty, must be email format -->

        Checkbox: <input type="checkbox" name="checkbox" <?= $data["checkbox"] === "on" ? "checked" : ""?> >
        <?= $errors['checkbox'] ?? '' ?><br>
        <!-- must be checked -->

        Date: <input type="date" name="date" value="<?= $data["date"] ?>">
        <?= $errors['date'] ?? '' ?><br>
        <!-- must be before today -->

        <button type="submit">Save</button>
        <!-- show errors messages next to the field and write the data back to the field -->
    </form>
</body>
</html>