public function testPrimerRuta(): void {
  $rutas = Route::$routes;
  
  $this->assertTrue(count($rutas) == 1, "Debería haber una ruta en tu solución");
}