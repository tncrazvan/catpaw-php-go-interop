# Refer to [catpaw goffi](https://github.com/tncrazvan/catpaw/blob/master/docs/28.goffi.md) for more details.

Compile the Go program with
```sh
go build -o src/main.so -buildmode=c-shared src/main.go && \
cpp -P ./src/main.h ./src/main.static.h
```
Pull your Php dependencies

```sh
composer update
```

Then run the Php program

```sh
composer prod:start
```

You should see the following in your terminal

```log
> @php -dopcache.enable_cli=1 -dopcache.jit_buffer_size=100M ./bin/start --libraries='./src/lib' --entry='./src/main.php'
hello world
```

# Other notes

This has been tested on
```log
No LSB modules are available.
Distributor ID:	Zorin
Description:	Zorin OS 17
Release:	17
Codename:	jammy
```


Currently only the following primitives are automatically converted from Php to Go
- string
- int
- float
- bool

However Go primitives are not converted yet to Php primitives, although int, float and bool should not require any conversion, only Go strings are a bit less straightforward (I will fix this in the future).


Basically Php doesn't understand the return of this function yet
```go
func hello(name string) string {
    return "hello " + name
}
```
