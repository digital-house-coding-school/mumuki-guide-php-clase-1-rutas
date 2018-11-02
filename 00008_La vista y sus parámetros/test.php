public function testBienvenida(): void {
  $rutasGet = Route::$routesGet;
  
  $this->assertTrue(count($rutasGet) == 1, "Debería haber una ruta en tu solución por GET");
  
  $ruta = $rutasGet[0];
  $rutaString = $ruta["route"];
  
  $primerCaracter = substr($rutaString, 0, 1);
  
  if ($primerCaracter == "/") {
    $rutaString = substr($rutaString, 1);
  }
  
  $partesRuta = explode("/", $rutaString);
  
  $this->assertTrue(count($partesRuta) == 3, "La ruta debería tener tres partes. La primera indicando el nombre de la ruta, la segunda y la tercera indicando un parámetro. Estas partes deben estar separadas por una /");

  $this->assertTrue($partesRuta[0] == "bienvenido", "La ruta por GET debe ser a /bienvenido");
  
  $this->assertTrue(preg_match("/{[a-zA-Z]+}/", $partesRuta[1]) === 1, "La segunda parte de la ruta no esta indicando un parámetro");
  
  $this->assertTrue(preg_match("/{[a-zA-Z]+}/", $partesRuta[2]) === 1, "La tercer parte de la ruta no esta indicando un parámetro");
  
  $this->assertFalse($partesRuta[1] === $partesRuta[2], "Ambos parametros deben tener un placeholder diferente");
  
  $this->assertTrue($ruta["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $reflection = new ReflectionFunction($ruta["action"]);
  $arguments  = $reflection->getParameters();
  
  $this->assertTrue(count($arguments) == 2, "La función anónima debe recibir dos parámetros");
  
  $resul = $ruta["action"]("Arya", "Stark");
}