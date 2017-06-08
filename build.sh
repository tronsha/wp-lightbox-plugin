#!/bin/sh
rm ./wordpress/trunk/public/css/*
rm ./wordpress/trunk/public/js/*
rm ./wordpress/trunk/public/images/*
java -jar ./vendor/yuicompressor-2.4.8.jar --type js ./src/js/images.js -o ./wordpress/trunk/public/js/images.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type js ./vendor/lightbox/js/lightbox.js -o ./wordpress/trunk/public/js/lightbox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/lightbox/css/lightbox.css -o ./wordpress/trunk/public/css/lightbox.min.css
cp ./vendor/lightbox/images/* ./wordpress/trunk/public/images/
java -jar ./vendor/yuicompressor-2.4.8.jar --type js ./vendor/fancybox/fancybox.js -o ./wordpress/trunk/public/js/fancybox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/fancybox/fancybox.css -o ./wordpress/trunk/public/css/fancybox.min.css
