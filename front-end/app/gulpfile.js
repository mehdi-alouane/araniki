var gulp = require('gulp')
    sass = require('gulp-sass')
    livereload = require('gulp-livereload');

//sass task
gulp.task('sass', function() {
    gulp.src('styles/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('../dist/styles/'))
});

//Watch task
gulp.task('default',function() {
    gulp.watch('styles/**/*.scss',['sass']);
});

//server task
gulp.task('webserver', function(){
	gulp.src('../araniki/web-client/app/')
	.pipe(server({
		defaultFile: 'index.html',
		livereload: true,
		directoryListing : true,
		open: true,
		}));
	});
