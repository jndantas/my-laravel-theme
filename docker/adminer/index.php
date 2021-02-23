<?php
$_GET["mysql"] = "";
$_GET["username"] = "";

function adminer_object() {

  class AdminerAutoLogin extends Adminer {

    function credentials() {
      return array(getenv('ADMINER_DEFAULT_HOST').":".getenv('ADMINER_DEFAULT_PORT'), getenv('ADMINER_DEFAULT_USER'), getenv('ADMINER_DEFAULT_PASS'));
    }

    function login($login, $password) {
        return true;
    }

  }

  return new AdminerAutoLogin;
}

include "./adminer.php";
