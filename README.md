# NVAN PHP Babel Transpiler
---
## Introduction
This small library is made as an easy and clean way to transpile JS with Babel.

This is not a transpiler as is, it's just a way to call the CLI version of
Babel.

## How to use
After installing the [dependencies](#dependencies), just use composer to include
the library into your project:
```bash
$ composer require nvan/php-babel-transpiler
```

Then, instance the class passing the folder in which the node modules are placed
as the first argument.

Then you can use the functions:
- ```transpile``` to transpile a script passing a string
- ```transpileFile``` to transpile a script passing the route to a file

Both functions will return the transpiled code as a string.

**Full example:**
```php
<?php
// Autoload or include the class

use nvan\BabelTranspiler\Transpiler;

$transpiler = new Transpiler('Path/To/Babel'); // Can be relative or absolute

$transpiledString = $transpiler->transpile('class Test {}');
$transpiledFile = $transpiler->transpileFile('Path/To/File.js');
```

## Dependencies
In order to use this library, you have to install:
- Node.JS: https://nodejs.org/
- Babel CLI (and Core) through npm: https://babeljs.io/docs/en/babel-cli

Babel **should** be installed on a relative path for the project, inside or outside
of it, but you can use an absolute path in any other place too.

**OPTIONAL:** To run the tests of this repository, you have to install first the
```package.json``` file found in ```/tests/BabelDirectory```:

On the root folder of this project do (both Windows, Linux and macOS):

```bash
$ cd tests/BabelDirectory
$ npm install
```

## Support
Please consider placing an issue on this repository explaining the problem
before sending me an email.

If you really need, you can do it: [mduran@nvan.es](mailto:mduran@nvan.es)

## Contributions
You can do a Pull Request to contribute to this project.

Bare in mind that new features are not guatanteed to be added but error
corrections are probably instead.

## Donate
If you'd like to help me improving this projects, buying new hardware or just
buying me a beer, you can donate via PayPal:
[https://paypal.me/maduranma](https://paypal.me/maduranma)
