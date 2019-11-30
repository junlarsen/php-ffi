# Calling C from PHP

Minimal example showing how to compile and call C from PHP.

In this example, src/lib.c provides a single function named `message` which just prints some text to the terminal.

## Steps

- Compile C library into shared library

```
gcc -c src/lib.c -o bin/phplib.o
ar rcs bin/phplib.a bin/phplib.o
gcc -shared bin/phplib.o -o bin/phplib.so
```

- Create PHP definitions

```php
<?php

$ffi = FFI::cdef(
    'void message();',
    'bin/phplib.so'
);
```

- Call C code from FFI object

```php
$ffi->message();
```