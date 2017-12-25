#!/bin/sh
rm ./wordpress/trunk/public/css/*
rm ./wordpress/trunk/public/js/*
rm ./wordpress/trunk/public/images/*
./vendor/uglifyjs --comments /^!/ ./src/js/images.js -o ./wordpress/trunk/public/js/images.min.js
./vendor/uglifyjs --comments /^!/  ./vendor/lightbox/js/lightbox.js -o ./wordpress/trunk/public/js/lightbox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/lightbox/css/lightbox.css -o ./wordpress/trunk/public/css/lightbox.min.css
cp ./vendor/lightbox/images/* ./wordpress/trunk/public/images/
./vendor/uglifyjs --comments /^!/  ./vendor/fancybox/fancybox.js -o ./wordpress/trunk/public/js/fancybox.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/fancybox/fancybox.css -o ./wordpress/trunk/public/css/fancybox.min.css
./vendor/uglifyjs --comments /^!/  ./vendor/justifiedgallery/jquery.justifiedGallery.js -o ./wordpress/trunk/public/js/justifiedgallery.min.js
java -jar ./vendor/yuicompressor-2.4.8.jar --type css ./vendor/justifiedgallery/justifiedGallery.css -o ./wordpress/trunk/public/css/justifiedgallery.min.css
