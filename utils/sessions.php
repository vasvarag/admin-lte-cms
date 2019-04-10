<?php

class Session {
  public static function create($user) {
    $_SESSION["auth"] = true;
    $_SESSION["user"] = $user;
  }

  public static function destroy() {
    unset($_SESSION['auth']);
    unset($_SESSION['user']);
  }
}
