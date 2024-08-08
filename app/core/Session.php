<?php

class Session
{
  public static function startSession()
  {
    session_start();
  }

  public static function stopSession()
  {
    session_destroy();
  }
}
