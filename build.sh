#!/bin/sh
rm ./mpcx-lightbox/public/css/*
rm ./mpcx-lightbox/public/js/*
rm ./mpcx-lightbox/public/images/*
cat ./src/js/lightbox2gallery.js > ./src/js/tmp.js
cat ./vendor/lightbox/js/lightbox.js >> ./src/js/tmp.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type js ./src/js/tmp.js -o ./mpcx-lightbox/public/js/lightbox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/lightbox/css/lightbox.css -o ./mpcx-lightbox/public/css/lightbox.min.css
cp ./vendor/lightbox/images/* ./mpcx-lightbox/public/images/
rm ./src/js/tmp.js
