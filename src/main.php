<?php

use function CatPaw\Core\anyError;

use function CatPaw\Core\asFileName;
use function CatPaw\Core\goffi;
use CatPaw\Core\Unsafe;

interface Contract {
    /**
     * 
     * @param  string       $name
     * @return Unsafe<void>
     */
    function hello(string $name):Unsafe;
}

function main():Unsafe {
    return anyError(function() {
        $goffi = goffi(Contract::class, asFileName(__DIR__, './main.so'))
            ->try($error) or yield $error;

        $goffi->hello("world")
            ->try($error) or yield $error;
    });
}