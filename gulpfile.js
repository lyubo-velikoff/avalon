/* jshint -W097 */
/* globals require, console, process */
"use strict";

/* ============================================ *
 *              Import dependencies
 * ============================================ */


var gulp = require('gulp'),
    concat = require('gulp-concat'),
    concatCSS = require('gulp-concat-css'),
    imagemin = require('gulp-imagemin'),
    cleanCSS = require('gulp-clean-css'),
    sass = require('gulp-sass'),
    uglify = require('gulp-uglify'),
    rename = require('gulp-rename'),
    maps = require('gulp-sourcemaps'),
    notify = require('gulp-notify'),  // unused
    gutil = require('gulp-util'),
    prettyError = require('gulp-prettyerror'),
    connect = require('gulp-connect-php'),
    ftp = require('vinyl-ftp'),
    browserSync = require('browser-sync'),
    runSequence = require('run-sequence'),
    ngrok = require('ngrok'),
    psi = require('psi'),
    qunit = require('gulp-qunit'),
    shell = require('gulp-shell'),
    del = require('del');

var config = require('./config.js');

var reload = browserSync.reload;

/* ============================================ *
 *               Define Tasks
 * ============================================ */


/* ============ Optimize Images =============== */


gulp.task('minifyImages', function() {
    gulp.src(config.imagesFolder)
    .pipe(imagemin())
    .pipe(gulp.dest(config.imagesOutputFolder));
});


/* ============ Optimize Scripts =============== */


gulp.task('concatScripts', function() {
    return gulp.src(config.scripts.concatScriptsFiles)
    .pipe(prettyError())
    .pipe(maps.init())
    .pipe(concat(config.scripts.scriptConcatOutputFile))
    .pipe(maps.write('./'))
    .pipe(gulp.dest(config.scriptsFolder));
});

gulp.task('minifyScripts', ['concatScripts'], function() {
    return gulp.src(config.scripts.scriptMinifyFile)
    .pipe(prettyError())
    .pipe(uglify())
    .pipe(rename(config.scripts.scriptMinifyOutputFile))
    .pipe(gulp.dest(config.scriptsFolder));
});


/* ============ Optimize Css =============== */

gulp.task('compileSass', function() {
    return gulp.src(config.styles.sassFiles)
    .pipe(maps.init())
    .pipe(prettyError())
    .pipe(sass().on('error', sass.logError))
    .pipe(maps.write('./'))
    .pipe(gulp.dest(config.cssFolder));
});

gulp.task('concatCss', ['compileSass'], function() {
    return gulp.src(config.styles.cssConcatFiles)
    .pipe(prettyError())
    .pipe(concatCSS(config.styles.concatOutputFile))
    .pipe(gulp.dest(config.cssFolder));
});

gulp.task('minifyCss', ['concatCss'], function() {
    return gulp.src(config.cssFolder + '/' + config.styles.concatOutputFile)
    .pipe(prettyError())
    .pipe(cleanCSS(config.styles.minifyCssOptions))
    .pipe(rename(config.styles.cssMinifyOutputFile))
    .pipe(gulp.dest(config.cssFolder));
});


/* ============ Serve Files =============== */


gulp.task('serve', ['minifyScripts', 'minifyCss'], function() {
    browserSync({
        proxy: config.browserSyncLocation,
        port: config.globalPort,
        snippetOptions: {
            // this option deals with php errors(prevents browserSync from stop working)
            rule: {
                match: /$/
            }
        },
        notify: false
    });

    gulp.watch(['wp-content/themes/avalon/**/*.php'], reload);
    gulp.watch(['wp-content/themes/avalon/assets/scss/**/*.scss'], ['minifyCss', reload]);
    gulp.watch(['wp-content/themes/avalon/assets/js/**/script.js'], ['minifyScripts', reload]);
    gulp.watch(['wp-content/themes/avalon/assets/images/**/*'], reload);
});


/* ============ Copy Files To Build Folder =============== */



gulp.task('copy', function() {
    console.log(config.scriptsFolder + '/' + config.scripts.scriptMinifyOutputFile);
    return gulp.src([
        'wp-content/themes/avalon/*',
        'wp-content/themes/avalon/.htaccess',
        config.cssFolder + '/' + config.styles.cssMinifyOutputFile,
        config.scriptsFolder + '/' + config.scripts.scriptMinifyOutputFile,
        config.imagesFolder,
        config.includesFolder,
        config.fontsFolder,
    ], { base: './wp-content/themes/avalon' })
    .pipe(gulp.dest(config.buildFolder));
});



/* ============ Clean Build Folder And Minified Scripts and Styles =============== */


gulp.task('clean', function() {
    del([
        'dist',
        config.scriptsFolder + '/' + config.scripts.scriptConcatOutputFile,
        config.scriptsFolder + '/' + config.scripts.scriptMinifyOutputFile,
        config.cssFolder + '/' + config.styles.cssMinifyOutputFile,
        config.cssFolder + '/' + config.styles.concatOutputFile,
        config.cssFolder + '/grid.css',
        config.cssFolder + '/style.css',
        'wp-content/themes/avalon/assets/**/*.map'
    ]);
});


/* ============ Build Project =============== */



gulp.task('default', ['clean'], function(cb) {
    runSequence(
        'minifyCss',
        'minifyScripts',
        ['minifyImages', 'copy'],
        cb
    );
});


/* ============================================ *
 *              Deploy
 * ============================================ */

/* FTP settings */
var user = process.env.USER;
var password = process.env.PASSWORD;
var host = process.env.HOST;

var port = 21;
var localFilesGlob = 'dist/**/*.*';
var remoteFolder = '/';

// helper function to build an FTP connection based on our configuration
function getFtpConnection() {
    return ftp.create({
        host: host,
        port: port,
        user: user,
        password: password,
        parallel: 5,
        log: gutil.log
    });
}

/**
 * Deploy task.
 * Copies the new files to the server
 *
 * Usage: `FTP_USER=someuser FTP_PWD=somepwd gulp ftp-deploy`
 */
gulp.task('deploy', ['default'], function() {
    var conn = getFtpConnection();
    return gulp.src([localFilesGlob], { base: './dist', buffer: false })
    .pipe(conn.newer(remoteFolder)) // only upload newer files
    .pipe(conn.dest(remoteFolder));
});


