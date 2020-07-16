<?php

require 'vendor/autoload.php';

class LogToFile implements Logger
{
  public function log($data)
  {
    var_dump('log to file ' . $data);
  }
}

class LogToDatabase implements Logger
{
  public function log($data)
  {
    var_dump('log to database ' . $data);
  }
}

class LogToXWebService implements Logger
{
  public function log($data)
  {
    var_dump('log to sass ' . $data);
  }
}

interface Logger
{
  public function log($data);
}

class App
{
  public function useLog($data, Logger $logger = null)
  {
    $newLogger = $logger ?: new LogToFile;
    $newLogger->log($data);
  }
}

(new App)->useLog('hollo');
