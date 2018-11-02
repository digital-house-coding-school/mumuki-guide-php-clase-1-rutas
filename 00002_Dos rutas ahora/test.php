public function testRutaGet(): void {
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 1, "Debería haber una ruta en tu solución por GET");
  
  $rutaInicio = $rutasGet[0];
  
  $this->assertTrue($rutaInicio["route"] == "registracion" || $rutaInicio["route"] == "/registracion", "No esta definida una ruta a /registracion por GET");
  
  $this->assertTrue($rutaInicio["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $resul = $rutaInicio["action"]();
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /registracion debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "registrese", "Al ingresar a la ruta /registracion, no se recibe 'Registrese', se recibe '$resul'");
}

public function testRutaPost(): void {
  $rutasGet = Route::$routesPost;
  
  $this->assertTrue(count($rutasGet) == 1, "Debería haber una ruta en tu solución por POST");
  
  $rutaInicio = $rutasGet[0];
  
  $this->assertTrue($rutaInicio["route"] == "registracion" || $rutaInicio["route"] == "/registracion", "No esta definida una ruta a /registracion por POST");
  
  $this->assertTrue($rutaInicio["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $resul = $rutaInicio["action"]();
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /registracion debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "bienvenido", "Al ingresar a la ruta /registracion, no se recibe 'Bienvenido', se recibe '$resul'");
}