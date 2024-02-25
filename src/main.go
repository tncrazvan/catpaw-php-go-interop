package main

import "C"

import (
	"archive/zip"
	"fmt"
	"io"
	"os"
)

func main() {}

//export compress
func compress(fileName string) {

	// I have sampled the following code from here: https://golang.cafe/blog/golang-zip-file-example.html
	// and made some minor modifications.

	fmt.Println("creating zip archive " + fileName + ".zip...")
	archive, err := os.Create(fileName + ".zip")
	if err != nil {
		panic(err)
	}
	defer archive.Close()
	zipWriter := zip.NewWriter(archive)

	fmt.Println("opening first file " + fileName + "...")
	f1, err := os.Open(fileName)
	if err != nil {
		panic(err)
	}
	defer f1.Close()

	fmt.Println("writing first file to archive " + fileName + "...")
	w1, err := zipWriter.Create(fileName)
	if err != nil {
		panic(err)
	}
	if _, err := io.Copy(w1, f1); err != nil {
		panic(err)
	}
	fmt.Println("closing zip archive...")
	zipWriter.Close()
}

//export hello
func hello(name string) {
	println("hello " + name)
}
