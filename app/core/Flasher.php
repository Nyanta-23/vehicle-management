<?php

class Flasher
{
  public static function setFlash($message, $action, $type)
  {
    $_SESSION['flash'] = [
      'message' => $message,
      'action' => $action,
      'type' => $type
    ];
  }

  public static function flash()
  {
    if (isset($_SESSION['flash'])) {
      echo '
      <div class="position-fixed bottom-0 end-0  w-50 alert alert-' . $_SESSION['flash']['type'] . ' alert-dismissible fade show" role="alert">
        <h6>' . $_SESSION['flash']['action'] . '</h6>
        <p>' . $_SESSION['flash']['message'] . '</p>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      </div>';
      unset($_SESSION['flash']);
    }
  }
}
