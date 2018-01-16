#!/bin/sh
NODE_EXISTS=1
type node >/dev/null 2>&1 || NODE_EXISTS=0;
if [ $NODE_EXISTS = 1 ]; then
    echo 'Removing old files ...'
    rm ./wordpress/trunk/public/css/*
    rm ./wordpress/trunk/public/js/*
    rm ./wordpress/trunk/public/images/*
    echo '... ready!'
    echo 'Creating minified JavaScript ...'
    ./vendor/uglifyjs -m --comments /^!/ ./src/js/images.js -o ./wordpress/trunk/public/js/images.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/lightbox/dist/js/lightbox.js -o ./wordpress/trunk/public/js/lightbox.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/fancybox/dist/jquery.fancybox.js -o ./wordpress/trunk/public/js/fancybox.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/justifiedgallery/dist/js/jquery.justifiedGallery.js -o ./wordpress/trunk/public/js/justifiedgallery.min.js
    echo '... ready!'
    echo 'Creating minified CSS ...'
    ./vendor/csso ./vendor/lightbox/dist/css/lightbox.css -o ./wordpress/trunk/public/css/lightbox.min.css
    ./vendor/csso ./vendor/fancybox/dist/jquery.fancybox.css -o ./wordpress/trunk/public/css/fancybox.min.css
    ./vendor/csso ./vendor/justifiedgallery/dist/css/justifiedGallery.css -o ./wordpress/trunk/public/css/justifiedgallery.min.css
    echo '... ready!'
    echo 'Copy images ...'
    cp ./vendor/lightbox/dist/images/* ./wordpress/trunk/public/images/
    echo '... ready!'
    echo 'Build complete!'
else
    echo 'node.js is required.'
fi
