<?php

class Redirect
{
  public static function to($location)
  {
    header("Location: " . BASE_URL . "$location");
  }

  public static function back()
  {
    header("Location: " . $_SERVER['HTTP_REFERER']);
  }
}
