package main

import "C"

func main() {}

//export hello
func hello(name string) {
	println("hello " + name)
}
