<?php
    require_once('db.php');

    
    function getErrors($errors)
    {
        $errorText = "<b>Исправьте, пожалуйста, следующие ошибки:</b><br>";
        foreach($errors AS $error)
        {
            $errorText .= $error."<br>";
        }
        return $errorText;
    }

    function validation() 
    {
        //Валидация имени и фамилии.
        if (!preg_match("/^[а-яА-Я]+$/",$_POST['name'])) $err[] = "В поле логин могут быть только латинские символы и цифры.";
        if (strlen($_POST['name']) < 2 or strlen($_POST['name']) > 20) $err[] = "Поле логин должно содержать от 2 до 20 символов.";

        if (!preg_match("/^[а-яА-Я]+$/",$_POST['surname'])) $err[] = "В поле логин могут быть только латинские символы и цифры.";
        if (strlen($_POST['surname']) < 2 or strlen($_POST['surname']) > 20) $err[] = "Поле логин должно содержать от 2 до 20 символов.";

        //Проверка почты на уникальность.
        $query = dbQuery("SELECT id FROM users WHERE email='".$_POST['email']."'");
        if (mysqli_num_rows($query) > 0) $err[] = "Такая почта уже зарегистрирована!";


        return count($err) == 0 ? null : getErrors($err);
    }
?>


        
