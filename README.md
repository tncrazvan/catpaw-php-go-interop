# Refer to [catpaw goffi](https://github.com/tncrazvan/catpaw/blob/master/docs/28.goffi.md) for more details.

Compile the Go program with
```sh
pushd src/lib/goffi && \
go build -o main.so -buildmode=c-shared main.go && \
cpp -P ./main.h ./main.static.h && \
popd
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
