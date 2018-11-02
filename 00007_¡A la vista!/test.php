public function testPrimerRuta(): void {
  global $pasePorView;
  
  $pasePorView = false;
  
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 1, "Debería haber una ruta en tu solución por GET");
  
  $rutaInicio = $rutasGet[0];
  
  $this->assertTrue($rutaInicio["route"] == "inicio" || $rutaInicio["route"] == "/inicio", "No esta definida una ruta a /inicio");
  
  var_dump($rutaInicio["action"] instanceof Closure);exit;
  
  $this->assertTrue($rutaInicio["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $resul = $rutaInicio["action"]();
  
   $this->assertTrue($pasePorView, "Parece que no llamaste a la función view");
   
   $this->assertTrue($resul == "inicio", "Parecería que no estas retornando el resultado o que enviaste el nombre incorrecto a la función view");
}