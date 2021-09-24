<?php
/*
   * App Core Class
   * Creates URL & loads core controller
   * URL FORMAT - /controller/method/params
   */
class Core
{
  protected $currentController = 'Pages';
  protected $currentMethod = 'index';

  public function __construct()
  {

    $url = $this->getUrl();
    // Look in controllers for first value
    if (file_exists('../api/controllers/' . ucwords($url[0]) . '.php')) {
      // If exists, set as controller
      $this->currentController = ucwords($url[0]);
      // Unset 0 Index
      unset($url[0]);
    }

    // Require the controller
    require_once '../api/controllers/' . $this->currentController . '.php';

    // // Instantiate controller class
    $this->currentController = new $this->currentController;
    if (isset($url[1])) {
      if (method_exists($this->currentController, $url[1])) {
        $this->currentMethod = $url[1];
        unset($url[1]);
      }
    }
    //If there is anything left in our Url after unsettting the current method and current controller then mass those values 
    //via the call_user_func_array. 
    call_user_func([$this->currentController, $this->currentMethod]);
  }

  public function getUrl()
  {
    if (isset($_GET['url'])) {
      $url = rtrim($_GET['url'], '/');
      $url = filter_var($url, FILTER_SANITIZE_URL);
      $url = explode('/', $url);
      return $url;
    } else {
      echo json_encode("Something Went Wrong");
    }
  }
}
