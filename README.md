Compile the Go program with
```sh
cd src && \
go build -o main.so -buildmode=c-shared main.go && \
cpp -P ./main.h ./main.static.h
```

Then run the Php program

```sh
composer prod:start
```

You should see the following iny our terminal

```log
> @php -dopcache.enable_cli=1 -dopcache.jit_buffer_size=100M ./bin/start --libraries='./src/lib' --entry='./src/main.php'
hello world
```