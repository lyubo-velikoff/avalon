/* jshint -W097 */
/* globals require, console, process */
"use strict";

/* ============================================ *
 *              Import dependencies
 * ============================================ */

var gulp = require("gulp"),
  concat = require("gulp-concat"),
  concatCSS = require("gulp-concat-css"),
  cleanCSS = require("gulp-clean-css"),
  sass = require("gulp-sass"),
  uglify = require("gulp-uglify"),
  rename = require("gulp-rename"),
  maps = require("gulp-sourcemaps"),
  gutil = require("gulp-util"),
  prettyError = require("gulp-prettyerror"),
  ftp = require("vinyl-ftp"),
  runSequence = require("run-sequence");

var config = require("./config.js");

/* ============================================ *
 *               Define Tasks
 * ============================================ */

/* ============ Optimize Scripts =============== */

gulp.task("concatScripts", function () {
  return gulp
    .src(config.scripts.concatScriptsFiles)
    .pipe(prettyError())
    .pipe(maps.init())
    .pipe(concat(config.scripts.scriptConcatOutputFile))
    .pipe(maps.write("./"))
    .pipe(gulp.dest(config.scriptsFolder));
});

gulp.task("minifyScripts", ["concatScripts"], function () {
  return gulp
    .src(config.scripts.scriptMinifyFile)
    .pipe(prettyError())
    .pipe(uglify())
    .pipe(rename(config.scripts.scriptMinifyOutputFile))
    .pipe(gulp.dest(config.scriptsFolder));
});

/* ============ Optimize Css =============== */

gulp.task("compileSass", function () {
  return gulp
    .src(config.styles.sassFiles)
    .pipe(maps.init())
    .pipe(prettyError())
    .pipe(sass().on("error", sass.logError))
    .pipe(maps.write("./"))
    .pipe(gulp.dest(config.cssFolder));
});

gulp.task("concatCss", ["compileSass"], function () {
  return gulp
    .src(config.styles.cssConcatFiles)
    .pipe(prettyError())
    .pipe(concatCSS(config.styles.concatOutputFile))
    .pipe(gulp.dest(config.cssFolder));
});

gulp.task("minifyCss", ["concatCss"], function () {
  return gulp
    .src(config.cssFolder + "/" + config.styles.concatOutputFile)
    .pipe(prettyError())
    .pipe(cleanCSS(config.styles.minifyCssOptions))
    .pipe(rename(config.styles.cssMinifyOutputFile))
    .pipe(gulp.dest(config.cssFolder));
});

/* ============ Serve Files =============== */

gulp.task("serve", ["minifyScripts", "minifyCss"], function () {
  gulp.watch(["wp-content/themes/avalon/**/*.php"]);
  gulp.watch(["wp-content/themes/avalon/assets/scss/**/*.scss"], ["minifyCss"]);
  gulp.watch(
    ["wp-content/themes/avalon/assets/js/**/script.js"],
    ["minifyScripts"]
  );
  gulp.watch(["wp-content/themes/avalon/assets/images/**/*"]);
});

/* ============ Copy Files To Build Folder =============== */

gulp.task("copy", function () {
  return gulp
    .src(
      [
        "wp-content/themes/avalon/*",
        "wp-content/themes/avalon/.htaccess",
        config.cssFolder + "/" + config.styles.cssMinifyOutputFile,
        config.scriptsFolder + "/" + config.scripts.scriptMinifyOutputFile,
        config.imagesFolder,
        config.includesFolder,
        config.fontsFolder
      ],
      { base: "./wp-content/themes/avalon" }
    )
    .pipe(gulp.dest(config.buildFolder));
});

/* ============ Build Project =============== */

gulp.task("default", function (cb) {
  runSequence("minifyCss", "minifyScripts", ["copy"], cb);
});

/* ============================================ *
 *              Deploy
 * ============================================ */

/* FTP settings */
var user = process.env.USER;
var password = process.env.PASSWORD;
var host = process.env.HOST;

var port = 21;
var localFilesGlob = "dist/**/*.*";
var remoteFolder = "/";

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
gulp.task("deploy", ["default"], function () {
  var conn = getFtpConnection();
  return gulp
    .src([localFilesGlob], { base: "./dist", buffer: false })
    .pipe(conn.newer(remoteFolder)) // only upload newer files
    .pipe(conn.dest(remoteFolder));
});
