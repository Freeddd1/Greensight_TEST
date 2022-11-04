<?php
  $name = $_POST['name'];
  $lastName = $_POST['lastName'];
  $email = $_POST['email'];
  $password = $_POST['password'];
  $rePassword = $_POST['rePassword'];

  $users = array(
   array(
     "email" => "test1@fred.ru",
      "id" => "1",
      "name" => "test1"
   ),array(
     "email" => "test2@fred.ru",
      "id" => "2",
      "name" => "test2"
   ),array(
     "email" => "test3@fred.ru",
      "id" => "3",
      "name" => "test3"
  )
  );

  foreach ($users as $users ){
    foreach ($users as $key => $value )
    {
      if ($key === 'email' && $email === $value)
      {
        file_put_contents('log\emailCheck.txt', $email . ' уже зарегистрирован');
        $response =
        [
            "status" => false,
            "message" => "Такой email уже зарегистрирован",
        ];
        echo json_encode($response);
        die();
      }
    }
  };

if ($name == "")
{
  $response =
    [
      "status" => false,
      "message" => "Введите имя"
    ];
  echo json_encode($response);
  die();
}

if ($lastName == "")
{
  $response =
    [
      "status" => false,
      "message" => "Введите фамилию"
    ];
  echo json_encode($response);
  die();
}

if ($email == "")
{
  $response =
    [
      "status" => false,
      "message" => "Введите email"
    ];
  echo json_encode($response);
  die();
}

if ($password == "")
{
  $response =
    [
      "status" => false,
      "message" => "Введите пароль"
    ];
  echo json_encode($response);
  die();
}

if ($rePassword == "")
{
  $response =
    [
      "status" => false,
      "message" => "Повторите пароль"
    ];
  echo json_encode($response);
  die();
}

if ($password != $rePassword)
{
  $response =
    [
      "status" => false,
      "message" => "Пароли не совпадают"
    ];
  echo json_encode($response);
  die();
}

if (!strpos($email, '@'))
{
  $response =
    [
      "status" => false,
      "message" => "Email должен содержать @"
    ];
  echo json_encode($response);
  die();
}

else
{
  $response =
      [
        "status" => true
      ];
    echo json_encode($response);
}

?>
