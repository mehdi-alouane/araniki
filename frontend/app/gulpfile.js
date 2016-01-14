var gulp = require('gulp');
var	sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');

// Static Server + watching scss/html files
gulp.task('serve', ['sass'], function() {

    browserSync.init({
        server: "./"
    });
    notify : false

    gulp.watch("styles/*.scss", ['sass']);
    gulp.watch("./*.html").on('change', browserSync.reload);
});

// Compile sass into CSS & auto-inject into browsers
gulp.task('sass', function() {
    return gulp.src("styles/*.scss")
        .pipe(sass())
        .pipe(gulp.dest("dist/styles/"))
        .pipe(browserSync.stream());
});

gulp.task('default', ['serve']);

/*
//prefix task

gulp.task('default', function () {
    return gulp.src('dist/styles/app.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('dist/styles/prefixcss'));
});
*/