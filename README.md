# Chupi project

> El proyecto más guay habido y por haber.

En cada ejecución de los End Points se obtendrá:

  Un color aleatorio
  http://localhost:8088/v1/color
  
  Una palabra aleatoria
  http://localhost:8088/v1/word
  
  Una frase molona
  http://localhost:8088/v1/phrase
  

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
