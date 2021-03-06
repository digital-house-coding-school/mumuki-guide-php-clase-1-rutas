public function testPrimerRuta(): void {
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 1, "Debería haber una ruta en tu solución por GET");
  
  $rutaInicio = $rutasGet[0];
  
  $this->assertTrue($rutaInicio["route"] == "inicio" || $rutaInicio["route"] == "/inicio", "No esta definida una ruta a /inicio");
  
  $this->assertTrue($rutaInicio["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $resul = $rutaInicio["action"]();
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /inicio debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "bienvenido", "Al ingresar a la ruta /inicio, no se recibe 'Bienvenido', se recibe '$resul'");
}