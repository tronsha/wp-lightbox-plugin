#!/bin/sh
rm ./wordpress/trunk/public/css/*
rm ./wordpress/trunk/public/js/*
rm ./wordpress/trunk/public/images/*
cat ./src/js/lightbox2gallery.js > ./tmp.js
cat ./vendor/lightbox/js/lightbox.js >> ./tmp.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type js ./tmp.js -o ./wordpress/trunk/public/js/lightbox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/lightbox/css/lightbox.css -o ./wordpress/trunk/public/css/lightbox.min.css
cp ./vendor/lightbox/images/* ./wordpress/trunk/public/images/
rm ./tmp.js
cat ./src/js/fancybox2gallery.js > ./tmp.js
cat ./vendor/fancybox/fancybox.js >> ./tmp.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type js ./tmp.js -o ./wordpress/trunk/public/js/fancybox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/fancybox/fancybox.css -o ./wordpress/trunk/public/css/fancybox.min.css
rm ./tmp.js
