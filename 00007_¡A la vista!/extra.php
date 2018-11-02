$pasePorView = false;

function view($route, $vac = []) {
  global $pasePorView;
  $pasePorView = true;
  return $route;
}

function compact($variable1, $variable2 = null, $variable 3 = null) {

}


class Route {
  public static $routesGet = [];
  public static $routesPost = [];

  public static function get($route, $action) {
    $newRoute = [
      "route" => $route,
      "action" => $action
    ];
    
    Route::$routesGet[] = $newRoute;
  }
  
  public static function post($route, $action) {
    $newRoute = [
      "route" => $route,
      "action" => $action
    ];
    
    Route::$routesPost[] = $newRoute;
  }

}