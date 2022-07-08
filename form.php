<?php
    require_once('modules/db.php');
    require_once('modules/upload.php');
    require_once('modules/validation.php');

    image_upload();  
    file_upload();  

    
    if(isset($_POST['submit'])){
        $errors = validation();
        if (!empty($errors)) echo $errors;      

        $name = trim($_POST['name']);
        $surname = trim($_POST['surname']);
        $birthday = $_POST['birthday'];
        $birthday = str_replace('.', '-', '$birthday');
        $email = trim($_POST['email']);
        $site = trim($_POST['site']);
        $phone = trim($_POST['phone']);
            

        dbQuery("INSERT INTO users SET name='".$name."', surname='".$surname."', birthday='".$birthday."', email='".$email."', site='".$site."', phone='".$phone."'");
        echo 'Спасибо!';
    }

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>testaxi</title>
</head>
<body>
    <form action="" enctype="multipart/form-data" method="POST">
        <p><input type="text" name="name" required> Имя</p>
        <p><input type="text" name="surname" required> Фамилия</p>
        <p><input type="text" name="birthday" placeholder="Дата в форате: дд.мм.гггг"> Дата рождения</p>
        <p><input type="email" name="email"> email</p>
        <p><input type="url" name="site"> Сайт</p>
        <p><input type="text" name="phone" placeholder="Формат: 9031234567" required> Номер телефона</p>
        <p><input type="file" name="image" multiple accept="image/jpeg,image/png"> Фотографии</p>
        <p><input type="file" name="pdf" multiple accept=".pdf"> Документ PDF</p>
        <p><input type="submit" value="Отправить"></p>
    
    </form>
</body>
</html>