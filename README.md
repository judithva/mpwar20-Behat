# Chupi project

> El proyecto más guay habido y por haber.

En cada ejecución de los End Points se obtendrá:

  Un color aleatorio
  http://localhost:8080/v1/color  ó  http://IPlocal:8080/v1/color 
  
  Una palabra aleatoria
  http://localhost:8080/v1/word   ó  http://IPlocal:8080/v1/word 
  
  Una frase molona
  http://localhost:8080/v1/phrase  ó  http://IPlocal:8080/v1/phrase

# Iniciar contenedor
Para poner en marcha Chupi project, previamente se ha de tener instalado [Docker](https://www.docker.com/get-started) y 
realizar los siguientes pasos:
    
    * Levantar el servidor:        
        sudo docker-compose up -d
    * Para saber el nombre de nuestro contenedor en PHP:
        sudo docker ps -a     
    * Para entrar en nuestro contenedor de PHP:
        sudo docker exec -it behatjudithvilela_php-fpm_1 bash
      Ó ejecutar el makefile:
        sudo make interactive
    * Instalar las dependencias:
        composer install  
    * Para ejecutar los tests desde consola:
        vendor/bin/behat 


# Tests
Estructura de los test implementados con Behat:

```scala
|-- Acceptance
|   |-- Color
|   |   `-- randomColor.feature
|   |-- CoolWord
|   |   `-- randomCoolWord.feature
|   |-- FeatureContext.php
|   `-- Phrase
|       `-- randomPhrase.feature
```

 Test doubles: 

```scala
|-- Application
|   |-- chupiTest.php
|   |-- colorTest.php
|   `-- wordTest.php
`-- Infrastructure
    |-- ColorRepositoryEmptyStub.php
    |-- ColorRepositoryInvalidSpy.php
    |-- ColorRepositoryStub.php
    |-- ColorRepositoryValidSpy.php
    |-- CoolWordRepositoryEmptyStub.php
    |-- CoolWordRepositoryInvalidSpy.php
    |-- CoolWordRepositoryStub.php
    `-- CoolWordRepositoryValidSpy.php
```

# Como usar
Para ejecutar el proyecto sólo hay que hacer: `php chupi.php`, y ya tendrás tu palabra molona!
