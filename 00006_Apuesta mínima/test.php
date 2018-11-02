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
  
  $this->assertTrue(count($partesRuta) == 3, "La ruta debería tener tres partes. La primera indicando el nombre de la ruta, la segunda y la tercera indicando un parámetro. Estas partes deben estar separadas por una /");

  $this->assertTrue($partesRuta[0] == "ruleta", "La ruta por GET debe ser a /ruleta");
  
  $this->assertTrue(preg_match("/{[a-zA-Z]+}/", $partesRuta[1]) === 1, "La segunda parte de la ruta no esta indicando un parámetro");
  
  $this->assertTrue(preg_match("/{[a-zA-Z]+/?}/", $partesRuta[2]) === 1, "La tercer parte de la ruta no esta indicando un parámetro optativo");
  
  $this->assertFalse($partesRuta[1] === $partesRuta[2], "Ambos parametros deben tener un placeholder diferente");
  
  $this->assertTrue($ruta["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $reflection = new ReflectionFunction($ruta["action"]);
  $arguments  = $reflection->getParameters();
  
  $this->assertTrue(count($arguments) == 2, "La función anónima debe recibir dos parámetros");
  
  $resul = $ruta["action"](11, 200);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/11/200 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta 200 al numero 11", "Al ingresar a la ruta /ruleta/11/200, no se recibe 'Apuesta 200 al numero 11', se recibe '$resul'");
  
    $resul = $ruta["action"](0, 100);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/0/100 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta 100 al numero 0", "Al ingresar a la ruta /ruleta/0/100, no se recibe 'Apuesta 100 al numero 0', se recibe '$resul'");
  
    $resul = $ruta["action"](36, 500);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/36/500 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta 500 al numero 36", "Al ingresar a la ruta /ruleta/36/500, no se recibe 'Apuesta 500 al numero 36', se recibe '$resul'");
  
  $resul = $ruta["action"](-2,1000);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/-2/1000 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "numero invalido", "Al ingresar a la ruta /ruleta/-2/1000, no se recibe 'Numero invalido', se recibe '$resul'");
  
  $resul = $ruta["action"](50,1000);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/50/1000 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "numero invalido", "Al ingresar a la ruta /ruleta/50/1000, no se recibe 'Numero invalido', se recibe '$resul'");
  
  $resul = $ruta["action"](36);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/36 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta 50 al numero 36", "Al ingresar a la ruta /ruleta/36, no se recibe 'Apuesta 50 al numero 36', se recibe '$resul'");
}