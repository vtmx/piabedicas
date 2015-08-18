// Modules Requires
var gulp       = require('gulp');
var sass       = require('gulp-ruby-sass');
var uglify     = require('gulp-uglify');
var concat     = require('gulp-concat');
var livereload = require('gulp-livereload');
var watch      = require('gulp-watch');

// Sass
gulp.task('sass', function() {
	return sass('src/scss/style.scss', { style: 'compressed' }) 
		.on('error', function (err) {
			console.error('Sass Error!', err.message);
		})
		.pipe(concat('style.css'))
		.pipe(gulp.dest('dest/css'))
		.pipe(livereload());
});

// JS
gulp.task('js', function() {
	return gulp.src(['src/js/jquery.js', 'src/js/plugins.js', 'src/js/main.js'])
		.pipe(concat('script.js'))
		.pipe(gulp.dest('dest/js'))
		.pipe(livereload());
});

// PHP
gulp.task('php', function() {
    gulp.src('')
    .pipe(livereload());
});

// Watch
gulp.task('watch', function() {
	livereload.listen();
		gulp.watch(['*.php', '*.html'], ['php']);
		gulp.watch('src/scss/**/*.scss', ['sass']);
		gulp.watch('src/js/**/*.js', ['js']);
});

// Call Task
gulp.task('default', ['sass', 'js', 'php', 'watch']);
