<?php

use function CatPaw\Core\anyError;

use function CatPaw\Core\asFileName;
use function CatPaw\Core\goffi;
use CatPaw\Core\Unsafe;

interface Contract {
    /**
     * Create a `.zip` file from any file.
     * @param  string       $fileName file to compress.
     * @return Unsafe<void>
     */
    function compress(string $fileName):Unsafe;
}

function main():Unsafe {
    return anyError(function() {
        $goffi = goffi(Contract::class, asFileName(__DIR__, './main.so'))
            ->try($error) or yield $error;

        $goffi->compress(asFileName(__DIR__, './main.php'))
            ->try($error) or yield $error;
    });
}