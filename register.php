<?php

$name = $email = $password = $confirm_password = $city = $gender = $message = "";
$hobbies = [];
$errName = $errEmail = $errPassword = $errConfirm_password = $errCity = $errGender = $errHobby = $errMessage = "";

if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Asagida tanimlanan variableler ve islevler sadece Post methodu gönderildiginde calisir. 

    function control_input($data) { // girilen inputun tehlikeli seyler barindirmamasini saglar.
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
   
    function validate($value, &$input, &$error, $message) { 
        if (empty($_POST[$value])) { // empty methodu ile postta gönderilen degerin bos olup olmadigini kontrol ediyoruz 
            $error = $message;
            return $error;
        } else {
             $input = control_input($_POST[$value]);
             echo $input."<br>";
        } 
    }

   
    validate("name", $name, $errName, "Please enter a name");
    validate("email", $email, $errEmail, "Please enter an email");
    validate("password", $password, $errPassword, "Please enter a password");
    validate("password2", $confirm_password, $errConfirm_password, "Please enter the password again");
    validate("city", $city, $errCity, "Please choose a city");
    validate("gender", $gender, $errGender, "Please choose a gender");
    validate("message", $message, $errMessage, "Please enter your message");

    if (!isset($_POST['hobby'])) {
        $errHobby = "Please choose a hobby.<br>";
    } else {
        $hobbies = $_POST['hobby'];
    }
    foreach ($hobbies as $hobby) {
       echo control_input($hobby) . "<br>";
   }
}


?>

<form action="register.php" method="POST">
    name: <input type="text" name="name" value="<?= $name;?>" /><?= $errName; ?><br><br>
    email: <input type="email" name="email" value="<?= $email;?>" /><?= $errEmail; ?><br><br>
    password: <input type="password" name="password" /><?= $errPassword; ?><br><br>
    confirm password: <input type="password" name="password2" /><?= $errConfirm_password; ?><br><br>
    city: <select name="city">
        <option value="">Choose a city</option>
        <option value="26" <?php if($city == "26") echo "selected" ?>>Eskisehir</option>
        <option value="34" <?php if($city == "34") echo "selected" ?>>Istanbul</option>
        <option value="06" <?php if($city == "06") echo "selected" ?>>Ankara</option>
    </select><?= $errCity; ?><br><br>
    gender: Man <input type="radio" name="gender" value="man" <?php if($gender == "man") echo "checked" ?>>
    Women <input type="radio" name="gender" value="women" <?php if($gender == "women") echo "checked" ?>><?= $errGender; ?><br><br>
    hobbies:
    <input type="checkbox" name="hobby[]" value="cinema" <?php if(isset($hobbies) && in_array("cinema", $hobbies)) echo "checked" ?>> Cinema
    <input type="checkbox" name="hobby[]" value="books"  <?php if(isset($hobbies) && in_array("books", $hobbies)) echo "checked" ?>> Books
    <input type="checkbox" name="hobby[]" value="music"  <?php if(isset($hobbies) && in_array("music", $hobbies)) echo "checked" ?>> Music
    <?= $errHobby ?><br><br>
    your message: <br><textarea name="message"><?= $message;?></textarea><br>
    <?= $errMessage; ?><br><br>

    <input type="submit" value="Register">
</form>