var gulp = require('gulp');
var	sass = require('gulp-sass');
var	server = require('gulp-server-livereload');
var	minifyCss = require('gulp-minify-css');



//sass task
gulp.task('sass', function() {
    gulp.src('styles/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./dist/'))
});

//Watch task
gulp.task('sass',function() {
    gulp.watch('scss/**/*.scss',['sass']);
});

//server task
gulp.task('webserver', function(){
	gulp.src('../app/')
	.pipe(server({
		defaultFile: 'index.html',
		livereload: true,
		directoryListing : true,
		open: true,
		}));
	});

 // mignify css task
gulp.task('mincss', function() {
  return gulp.src('../dist/*.css')
    .pipe(minifyCss({compatibility: 'ie8'}))
    .pipe(gulp.dest('min-css'));
});
