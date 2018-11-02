public function testRutaRuleta(): void {
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 1, "Debería haber una ruta en tu solución por GET");
  
  $ruta = $rutasGet[0];
  $rutaString = $ruta["route"];
  
  $primerCaracter = substr($rutaString, 0, 1);
  
  if ($primerCaracter == "/") {
    $rutaString = substr($rutaString, 1);
  }
  
  $partesRuta = explode("/", $rutaString);
  
  $this->assertTrue(count($partesRuta) == 2, "La ruta debería tener dos partes. La primera indicando el nombre de la ruta y la segunda indicando un parámetro. Estas partes deben estar separadas por una /");

  $this->assertTrue($partesRuta[0] == "ruleta", "La ruta por GET debe ser a /ruleta");
  
  var_dump(preg_match("\{[a-zA-Z]*\}", $partesRuta[1]));exit;
  
  $this->assertTrue(preg_match("{[a-zA-Z]*}", $partesRuta[1]) === 1, "La segunda parte de la ruta no esta indicando un parámetro");
  
  $this->assertTrue($ruta["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $reflection = new ReflectionFunction($ruta["action"]);
  $arguments  = $reflection->getParameters();
  
  var_dump($arguments);exit;
  
  $resul = $ruta["action"]();
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /registracion debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "registrese", "Al ingresar a la ruta /registracion, no se recibe 'Registrese', se recibe '$resul'");
}