#!/bin/sh
rm ./wordpress/trunk/public/css/*
rm ./wordpress/trunk/public/js/*
rm ./wordpress/trunk/public/images/*
./vendor/uglifyjs -m --comments /^!/ ./src/js/images.js -o ./wordpress/trunk/public/js/images.min.js
./vendor/uglifyjs -m --comments /^!/  ./vendor/lightbox/dist/js/lightbox.js -o ./wordpress/trunk/public/js/lightbox.min.js
./vendor/csso ./vendor/lightbox/dist/css/lightbox.css -o ./wordpress/trunk/public/css/lightbox.min.css
cp ./vendor/lightbox/dist/images/* ./wordpress/trunk/public/images/
./vendor/uglifyjs -m --comments /^!/  ./vendor/fancybox/dist/jquery.fancybox.js -o ./wordpress/trunk/public/js/fancybox.min.js
./vendor/csso ./vendor/fancybox/dist/jquery.fancybox.css -o ./wordpress/trunk/public/css/fancybox.min.css
./vendor/uglifyjs -m --comments /^!/  ./vendor/justifiedgallery/dist/js/jquery.justifiedGallery.js -o ./wordpress/trunk/public/js/justifiedgallery.min.js
./vendor/csso ./vendor/justifiedgallery/dist/css/justifiedGallery.css -o ./wordpress/trunk/public/css/justifiedgallery.min.css
