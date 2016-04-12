#!/bin/sh
wget https://github.com/yui/yuicompressor/releases/download/v2.4.8/yuicompressor-2.4.8.jar
java -jar yuicompressor-2.4.8.jar --type js ./js/lightbox2gallery.js -o ./js/lightbox2gallery.min.js
rm ./yuicompressor-2.4.8.jar
