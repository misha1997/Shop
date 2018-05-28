<?php namespace app\exceptions;

use app\controllers\ErrorController;
//use libs\Logger;

class PageException extends \Exception {
  public function __construct($code) {
  	if ($code == "ERROR_CLASS" || $code == "ERROR_URL") {
  		$errorController = new ErrorController;
  		$errorController->serverError();
  	}
  }
}