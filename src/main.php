<?php

use function CatPaw\Core\anyError;
use function CatPaw\Core\asFileName;
use function CatPaw\Core\goffi;
use CatPaw\Core\Unsafe;

interface Contract {
    /**
     * Create a `.zip` file from any file.
     */
    function compress(string $fileName):void;

    function hello(string $name):string;

    function window():void;
}

function main():Unsafe {
    return anyError(function() {
        $goffi = goffi(Contract::class, asFileName(__DIR__, './lib/goffi/main.so'))
            ->try($error) or yield $error;

        
        // $goffi->compress(asFileName(__DIR__, './main.php'));
        
        $goffi->window();

        // echo $goffi->hello('world').PHP_EOL;
    });
}