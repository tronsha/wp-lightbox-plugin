#!/bin/sh
NODE_EXISTS=1
type node >/dev/null 2>&1 || NODE_EXISTS=0;
if [ $NODE_EXISTS = 1 ]; then
    echo 'Removing old files ...'
    rm ./wordpress/trunk/public/css/*.*
    rm ./wordpress/trunk/public/js/*.*
    rm ./wordpress/trunk/public/images/*.*
    rm ./wordpress/trunk/public/css/colorbox/*/*.*
    rm ./wordpress/trunk/public/css/colorbox/*/images/*.*
    echo '... ready!'
    echo 'Creating minified JavaScript ...'
    ./vendor/uglifyjs -m --comments /^!/ ./src/js/images.js -o ./wordpress/trunk/public/js/images.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/lightbox/dist/js/lightbox.js -o ./wordpress/trunk/public/js/lightbox.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/fancybox/dist/jquery.fancybox.js -o ./wordpress/trunk/public/js/fancybox.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/justifiedgallery/dist/js/jquery.justifiedGallery.js -o ./wordpress/trunk/public/js/justifiedgallery.min.js
    ./vendor/uglifyjs -m --comments /^!/  ./vendor/colorbox/jquery.colorbox.js -o ./wordpress/trunk/public/js/colorbox.min.js
    echo '... ready!'
    echo 'Creating minified CSS ...'
    ./vendor/csso ./vendor/lightbox/dist/css/lightbox.css -o ./wordpress/trunk/public/css/lightbox.min.css
    ./vendor/csso ./vendor/fancybox/dist/jquery.fancybox.css -o ./wordpress/trunk/public/css/fancybox.min.css
    ./vendor/csso ./vendor/justifiedgallery/dist/css/justifiedGallery.css -o ./wordpress/trunk/public/css/justifiedgallery.min.css
    ./vendor/csso ./vendor/colorbox/example1/colorbox.css -o ./wordpress/trunk/public/css/colorbox/0/colorbox.min.css
    ./vendor/csso ./vendor/colorbox/example2/colorbox.css -o ./wordpress/trunk/public/css/colorbox/1/colorbox.min.css
    ./vendor/csso ./vendor/colorbox/example3/colorbox.css -o ./wordpress/trunk/public/css/colorbox/2/colorbox.min.css
    ./vendor/csso ./vendor/colorbox/example4/colorbox.css -o ./wordpress/trunk/public/css/colorbox/3/colorbox.min.css
    ./vendor/csso ./vendor/colorbox/example5/colorbox.css -o ./wordpress/trunk/public/css/colorbox/4/colorbox.min.css
    echo '... ready!'
    echo 'Copy images ...'
    cp ./vendor/lightbox/dist/images/* ./wordpress/trunk/public/images/
    cp ./vendor/colorbox/example1/images/* ./wordpress/trunk/public/css/colorbox/0/images/
    cp ./vendor/colorbox/example2/images/* ./wordpress/trunk/public/css/colorbox/1/images/
    cp ./vendor/colorbox/example3/images/* ./wordpress/trunk/public/css/colorbox/2/images/
    cp ./vendor/colorbox/example4/images/* ./wordpress/trunk/public/css/colorbox/3/images/
    cp ./vendor/colorbox/example5/images/* ./wordpress/trunk/public/css/colorbox/4/images/
    echo '... ready!'
    echo 'Build complete!'
else
    echo 'node.js is required.'
fi
