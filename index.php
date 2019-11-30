<?php

$ffi = FFI::cdef(
    'void message();',
    'bin/phplib.so'
);

$ff->message();