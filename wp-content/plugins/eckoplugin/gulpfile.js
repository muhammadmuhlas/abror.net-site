'use strict';

var gulp 		= require('gulp'),
	del 		= require('del'),
	concat 		= require('gulp-concat'),
	rename 		= require('gulp-rename'),
	uglify 		= require('gulp-uglify'),
	sass 		= require('gulp-sass'),
	csso 		= require('gulp-csso'),
	watch 		= require('gulp-watch'),
	livereload 	= require('gulp-livereload');


gulp.task('styles', function() {
	return gulp.src('src/sass/*.scss')
		.pipe(sass({outputStyle: 'compressed', unix_newlines: true}).on('error', sass.logError))
		.pipe(rename("eckoplugin.css"))
		.pipe(gulp.dest('assets/css'));
});

gulp.task('scripts', function() {
	return gulp.src(['src/js/eckoplugin.js'])
		.pipe(uglify())
		.pipe(concat('eckoplugin.js'))
		.pipe(gulp.dest('assets/js'));
});


gulp.task('default', function() {
	gulp.start('styles', 'scripts', 'watch');
});


gulp.task('watch', function() {
	gulp.watch('src/sass/*.scss', ['styles']);
	gulp.watch('src/js/*.js', ['scripts']);
	livereload.listen();
	gulp.watch(['*']).on('change', livereload.changed);
});