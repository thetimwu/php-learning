<?php

if (isset($_POST['email'])) {
  echo 'Hi';
  class validationInput
  {
    private $username;
    private $email;
    private $password;
    private $errors = [];

    public function __construct($username, $email, $password)
    {
      $this->username = $username;
      $this->email = $email;
      $this->password = $password;
    }

    public function validateUsername()
    {
      if (strlen($this->username) < 3) {
        $this->errors['username'] = 'username too short';
      }
    }

    public function validateEmail()
    {
      if (!filter_var($this->email,  FILTER_VALIDATE_EMAIL)) {
        $this->errors['email']  = 'not valid email format';
      }
    }

    public function validatePassword()
    {
      if (strlen($this->password) < 6) {
        $this->errors['password']  = 'password length less than 6';
      }
    }

    public function getErrors()
    {
      return $this->errors;
    }
  }

  $formHandler = new validationInput($_POST['username'], $_POST['email'], $_POST['password']);

  $formHandler->validateEmail();
  $formHandler->validatePassword();
  $formHandler->validateUsername();

  $errors = $formHandler->getErrors();
  if (count($errors) > 0) {
    foreach ($errors as $key => $val) {
      echo "<p>$key $val</p>";
    }
  }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Document</title>
</head>

<body>
  <p>learning php</p>
  <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
    <label for="username">Username</label>
    <input type="text" name='username'>
    <label for="email">Email</label>
    <input type="text" name='email'>
    <label for="password">Password</label>
    <input type="password" name="password">
    <label for="gender">gender</label>
    <input type="text" name="gender">
    <button type="submit" name="submit">Submit</button>
  </form>
</body>

</html>