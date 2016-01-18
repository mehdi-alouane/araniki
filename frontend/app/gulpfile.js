var gulp = require('gulp');
var	sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var browserSync = require('browser-sync');

// Static Server + watching scss/html files
gulp.task('serve', function() {

    browserSync.init({
        server: "./"
    });
    notify : false

    gulp.watch("styles/*.scss", ['sass']);
    gulp.watch("./*.html").on('change', browserSync.reload);
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
