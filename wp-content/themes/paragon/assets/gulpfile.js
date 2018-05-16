var gulp = require('gulp'),
concat = require('gulp-concat'),
uglify = require('gulp-uglifyjs'),
cssmin = require('gulp-cssmin'),
concatCss = require('gulp-concat-css'),
stylus = require('gulp-stylus');

gulp.task('scripts', function() {
	return gulp.src([
		// 'vendors/*.js'
		'vendors/nprogress.js',
		'vendors/imagesloaded.pkgd.min.js',
		'vendors/isotope.pkgd.min.js',
		'vendors/jquery.fitvids.js',
		'vendors/owl.carousel.min.js',
		'vendors/jquery.removeWhitespace.min.js',
		'vendors/jquery.collagePlus.min.js',
		'vendors/countTo.js',
		'vendors/circle-progress.min.js',
		'vendors/lightcase.js',
		'vendors/jquery.inview.js',
		'vendors/gmap3.min.js',
		'vendors/theia-sticky-sidebar.js',
		'vendors/typed.min.js',
		'vendors/jquery.event.move.js',
		'vendors/jquery.twentytwenty.js',
		])
	.pipe(concat('plugins.min.js'))
	.pipe(uglify())
	.pipe(gulp.dest('scripts/'));
});

gulp.task('css', function () {
	return gulp.src([
		'css/plugins/*.css'
		])
	.pipe(concatCss('plugins.min.css'))
	.pipe(cssmin())
	.pipe(gulp.dest('css/'));
});

gulp.task('stylus', function () {
	return gulp.src('css/*.styl')
	.pipe(stylus({
        compress: true
	}))
	.pipe(gulp.dest('css/'));
});

gulp.task('watch', ['stylus'], function () {
	gulp.watch('css/*.styl');
});

gulp.task('default', ['watch', 'css', 'scripts']);