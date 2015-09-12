// Modules Requires
var gulp        = require('gulp');
var sass        = require('gulp-ruby-sass');
var uglify      = require('gulp-uglify');
var concat      = require('gulp-concat');
var browserSync = require('browser-sync').create();

// Sass
gulp.task('sass', function() {
	return sass('src/scss/style.scss', {
		style: 'compressed',
		sourcemap: true
	})
		.on('error', function (err) {
			console.error('Sass Error!', err.message);
		})
		.pipe(gulp.dest('dest/css'))
		.pipe(browserSync.stream());
});

// Sass
gulp.task('sass-editor', function() {
	return sass('src/scss/style-editor.scss', {
		style: 'compressed',
		sourcemap: true
	})
		.on('error', function (err) {
			console.error('Sass Error!', err.message);
		})
		.pipe(gulp.dest('dest/css'))
		.pipe(browserSync.stream());
});

// JS
gulp.task('js', function() {
	return gulp.src(['src/js/jquery.js', 'src/js/plugins.js', 'src/js/main.js'])
		.pipe(concat('script.js'))
		.pipe(gulp.dest('dest/js'))
		.pipe(browserSync.stream());
});

// PHP
gulp.task('php', function() {
    gulp.src('')
    .pipe(browserSync.stream());
});

// Browser Sync
gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://localhost/piabedicas/"
    });

	gulp.watch(['*.php', '*.html'], ['php']);
	gulp.watch('src/scss/**/*.scss', ['sass']);
	gulp.watch('src/scss/style-editor.scss', ['sass-editor']);
	gulp.watch('src/js/**/*.js', ['js']);
});

// Call Task
gulp.task('default', ['sass', 'sass-editor', 'js', 'php', 'browser-sync']);
