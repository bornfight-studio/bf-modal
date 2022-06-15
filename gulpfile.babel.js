import autoprefixer from "gulp-autoprefixer";
import babelify from "babelify";
import browserify from "browserify";
import browserSync from "browser-sync";
import buffer from "vinyl-buffer";
import cleanCSS from "gulp-clean-css";
import del from "del";
import gulp from "gulp";
import dartSass from "sass";
import gulpSass from "gulp-sass";
import sourcemaps from "gulp-sourcemaps";
import source from "vinyl-source-stream";
import uglify from "gulp-uglify";

import {gulpConfig} from "./config";


/**
 * Set default Sass compiler
 */
const sass = gulpSass(dartSass);

/**
 * browserSync create
 */
const server = browserSync.create();

/**
 * Clean dist task
 */
export const clean = () => del(gulpConfig.paths.cleanPatterns.patterns);

/**
 * Watch SCSS task
 */
export function watchStyles() {
    return gulp.src(gulpConfig.paths.styles.src)
        .pipe(sourcemaps.init())
        .pipe(sass({includePaths: gulpConfig.paths.includes.node_modules}))
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(sourcemaps.write("./"))
        .pipe(gulp.dest(gulpConfig.paths.styles.dest))
        .pipe(server.stream());
}

/**
 * Build SCSS task
 */
export function buildStyles() {
    return gulp.src(gulpConfig.paths.styles.src)
        .pipe(sass({includePaths: gulpConfig.paths.includes.node_modules}))
        .pipe(sass().on("error", sass.logError))
        .pipe(autoprefixer())
        .pipe(cleanCSS({level: {1: {specialComments: 0}}}))
        .pipe(gulp.dest(gulpConfig.paths.styles.dest));
}

/**
 * Watch JS task
 */
export function watchScripts() {
    return browserify(gulpConfig.paths.scripts.main)
        .transform("babelify", {
            global: true,
            presets: ["@babel/preset-env"],
            plugins: [
                "@babel/plugin-syntax-dynamic-import",
                "@babel/proposal-class-properties",
                "@babel/proposal-object-rest-spread"],
        })
        .bundle()
        .pipe(source("bundle.js"))
        .pipe(buffer())
        .pipe(sourcemaps.init({"loadMaps": true}))
        .pipe(sourcemaps.write("."))
        .pipe(gulp.dest(gulpConfig.paths.scripts.dest))
        .pipe(server.stream());
}


/**
 * Build JS task
 */
export function buildScripts() {
    return browserify(gulpConfig.paths.scripts.main)
        .transform("babelify", {
            global: true,
            presets: ["@babel/preset-env"],
            plugins: [
                "@babel/plugin-syntax-dynamic-import",
                "@babel/proposal-class-properties",
                "@babel/proposal-object-rest-spread"],
        })
        .bundle()
        .pipe(source("bundle.js"))
        .pipe(buffer())
        .pipe(uglify({
            compress: {
                pure_funcs: ["console.log"],
            },
        }))
        .pipe(gulp.dest(gulpConfig.paths.scripts.dest));
}


/**
 * Reload task
 */
export function reload(done) {
    server.reload();
    done();
}

/**
 * Server init task
 */
export function serve(done) {
    server.init({
        proxy: gulpConfig.proxy,
        port: gulpConfig.port,
        host: gulpConfig.host,
    });
    done();
}

/**
 * File watcher
 */
export function watchFiles() {
    gulp.watch(gulpConfig.paths.styles.src, gulp.series(watchStyles));
    gulp.watch(gulpConfig.paths.scripts.src, gulp.series(watchScripts, reload));
    gulp.watch(gulpConfig.paths.markup.src, reload);
}


/**
 * Watch task
 */
const watch = gulp.series(clean, gulp.parallel(watchStyles, watchScripts), serve, watchFiles);

/**
 * Build task
 */
export const build = gulp.series(clean, gulp.parallel(buildStyles, buildScripts));

/**
 * Default task
 */
export default watch;
