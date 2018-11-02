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
  
  
  
  var_dump($partesRuta);exit;
  
  
  
  $this->assertTrue($rutaInicio["route"] == "registracion" || $rutaInicio["route"] == "/registracion", "No esta definida una ruta a /registracion por GET");
  
  $this->assertTrue($rutaInicio["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $resul = $rutaInicio["action"]();
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /registracion debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "registrese", "Al ingresar a la ruta /registracion, no se recibe 'Registrese', se recibe '$resul'");
}