<?php

require 'vendor/autoload.php';

abstract class HomeChecker
{
  protected $soccessor;

  public abstract function check(HomeStatus $homeStatus);

  public function setSuccessor(HomeChecker $homeChecker)
  {
    $this->soccessor = $homeChecker;
  }

  public function next(HomeStatus $homeStatus)
  {
    if ($this->soccessor) {
      $this->soccessor->check($homeStatus);
    }
  }
}


class Lock extends HomeChecker
{
  public function check(HomeStatus $homeStatus)
  {
    if (!$homeStatus->lock) {
      throw new Exception('Door not locked! Abort, abort');
    }

    $this->next($homeStatus);
  }
}

class Light extends HomeChecker
{
  public function check(HomeStatus $homeStatus)
  {
    if (!$homeStatus->light) {
      throw new Exception('Light not switched off! Abort, abort');
    }

    $this->next($homeStatus);
  }
}

class Alarm extends HomeChecker
{
  public function check(HomeStatus $homeStatus)
  {
    if (!$homeStatus->alarm) {
      throw new Exception('Alarm is off! Abort, abort');
    }

    $this->next($homeStatus);
  }
}

class HomeStatus
{
  public $lock = true;
  public $light = true;
  public $alarm = true;
}

$lock = new Lock;
$light = new light;
$alarm = new alarm;

$lock->setSuccessor($light);
$light->setSuccessor($alarm);

// var_dump($lock);


$homeStatus = new HomeStatus;

($lock)->check($homeStatus);
