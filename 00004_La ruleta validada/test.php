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
  
  $this->assertTrue(preg_match("/{[a-zA-Z]*}/", $partesRuta[1]) === 1, "La segunda parte de la ruta no esta indicando un parámetro");
  
  $this->assertTrue($ruta["action"] instanceof Closure, "El segundo parámetro de la ruta debe ser una función anónima");
  
  $reflection = new ReflectionFunction($ruta["action"]);
  $arguments  = $reflection->getParameters();
  
  $this->assertTrue(count($arguments) == 1, "La función anónima debe recibir un parámetro");
  
  $resul = $ruta["action"](7);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/7 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta al numero 7", "Al ingresar a la ruta /ruleta/7, no se recibe 'Apuesta al numero 7', se recibe '$resul'");
  
  $resul = $ruta["action"](11);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/11 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta al numero 11", "Al ingresar a la ruta /ruleta/11, no se recibe 'Apuesta al numero 11', se recibe '$resul'");
  
    $resul = $ruta["action"](0);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/0 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "apuesta al numero 0", "Al ingresar a la ruta /ruleta/0, no se recibe 'Apuesta al numero 0', se recibe '$resul'");
  
  $resul = $ruta["action"](-2);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/-2 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "numero invalido", "Al ingresar a la ruta /ruleta/-2, no se recibe 'Numero invalido', se recibe '$resul'");
  
  $resul = $ruta["action"](50);
  
   $this->assertTrue(is_string($resul), "El resultado al ingresar a /ruleta/50 debería ser un string");
  
  $this->assertTrue(strtolower($resul) === "numero invalido", "Al ingresar a la ruta /ruleta/50, no se recibe 'Numero invalido', se recibe '$resul'");
}