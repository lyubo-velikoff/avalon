/* 

This file contains settings for gulp tasks 

Note: If you are adding more variables please remember to add them to module.exports at the end of the file.

*/


/* ============================================ *
 *                  Folders
 * ============================================ */


var buildFolder = 'dist';
var cssFolder = 'wp-content/themes/avalon/assets/css';
var sassFolder = 'wp-content/themes/avalon/assets/scss';
var scriptsFolder = 'wp-content/themes/avalon/assets/js';
var includesFolder = 'wp-content/themes/avalon/includes/*.php';
var imagesFolder = 'wp-content/themes/avalon/assets/images/**/*';
var fontsFolder = 'wp-content/themes/avalon/assets/fonts/**/*';
var imagesOutputFolder = 'wp-content/themes/avalon/assets/images';


/* ============================================ *
 *             Scripts Variables
 * ============================================ */


var scripts =  {
    concatScriptsFiles: [
        scriptsFolder + '/lib/*.js',
        scriptsFolder + '/script.js'
    ],
    scriptConcatOutputFile: 'app.js',
    scriptMinifyFile: scriptsFolder + '/app.js',
    scriptMinifyOutputFile: 'app.min.js',
};


/* ============================================ *
 *              Styles Variables
 * ============================================ */

var styles = {
    sassFiles: [sassFolder +  '/*.scss'],
    sassOutputFile: 'app.css',
    cssConcatFiles: [
        cssFolder + '/lib/*.css',
        cssFolder + 'grid.css',
        cssFolder + '/style.css'
    ],
    concatOutputFile: 'app.css',
    cssMinifyOutputFile: 'app.min.css',
    minifyCssOptions: {}
};

/* ============================================ *
 *              browserSync
 * ============================================ */


var browserSyncLocation = '127.0.0.1/'; // dont add port if its not needed
var globalPort = 8086; // change this port if its not available


/* ============================================ *
 *              Export Variables
 * ============================================ */


module.exports = {
    browserSyncLocation : browserSyncLocation,
    globalPort : globalPort,
    buildFolder : buildFolder,
    cssFolder : cssFolder,
    sassFolder : sassFolder,
    scriptsFolder : scriptsFolder,
    includesFolder : includesFolder,
    imagesFolder : imagesFolder,
    fontsFolder : fontsFolder,
    imagesOutputFolder : imagesOutputFolder,
    scripts : scripts,
    styles : styles
};
