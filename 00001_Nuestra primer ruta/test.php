public function testPrimerRuta(): void {
  $rutas = Route::$routes;
  
  $this->assertTrue(count($rutas) == 1, "Debería haber una ruta en tu solución");
  
  $rutaInicio = $rutas[0];
  
  $this->assertTrue($rutaInicio["route"] == "inicio" || $rutaInicio["route"] == "/inicio", "No esta definida una ruta a /inicio");
}