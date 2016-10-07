
var gulp = require('gulp'),
	uglify = require('gulp-uglify'),
	cssnano = require('gulp-cssnano'),
	del = require('del'),
	newer = require('gulp-newer');


gulp.task('clean', function () {
    del(['dist']);
});


gulp.task('compressAndCopySite', function () {
    gulp.src('src/js/*.js')
		.pipe(uglify())
		.pipe(newer('dist/js'))
		.pipe(gulp.dest('dist/js'));

    gulp.src('src/css/*.css')
		.pipe(cssnano())
		.pipe(newer('dist/css'))
		.pipe(gulp.dest('dist/css'));
});


gulp.task('copyUncompressedSources', function () {
    gulp.src('src/*.php')
		.pipe(newer('dist'))
		.pipe(gulp.dest('dist'));

	gulp.src('src/php/*.php')
		.pipe(newer('dist/php'))
		.pipe(gulp.dest('dist/php'));

    gulp.src('src/.htaccess')
		.pipe(newer('dist/'))
		.pipe(gulp.dest('dist'));

	gulp.src('src/css/*.ttf')
		.pipe(newer('dist/css'))
		.pipe(gulp.dest('dist/css'));

	gulp.src('src/css/*.jpg')
		.pipe(newer('dist/css'))
		.pipe(gulp.dest('dist/css'));

    gulp.src('src/baguettebox/*.*')
		.pipe(newer('dist/baguettebox'))
		.pipe(gulp.dest('dist/baguettebox'));

    gulp.src('src/under_const/*.*')
		.pipe(newer('dist/under_const'))
		.pipe(gulp.dest('dist/under_const'));
});


gulp.task('copySiteLogin', function () {
	gulp.src('src/login/**/*')
		.pipe(newer('dist/login'))
		.pipe(gulp.dest('dist/login'));
});


gulp.task('compressAndCopyAdmin', function () {
    gulp.src('src/admin/js/*.js')
		.pipe(uglify())
		.pipe(newer('dist/admin/js'))
		.pipe(gulp.dest('dist/admin/js'));

    gulp.src('src/admin/css/*.css')
		.pipe(cssnano())
		.pipe(newer('dist/admin/css'))
		.pipe(gulp.dest('dist/admin/css'));
});


gulp.task('copyUncompressedAdminSources', function () {
    gulp.src('src/admin/*.php')
		.pipe(newer('dist/admin/'))
		.pipe(gulp.dest('dist/admin'));

	gulp.src('src/admin/php/*.php')
		.pipe(newer('dist/admin/php/'))
		.pipe(gulp.dest('dist/admin/php'));

    gulp.src('src/admin/.htaccess')
		.pipe(newer('dist/admin/'))
		.pipe(gulp.dest('dist/admin'));

    gulp.src('src/admin/css/images/**/*')
		.pipe(newer('dist/admin/css/images'))
		.pipe(gulp.dest('dist/admin/css/images'));

    gulp.src('src/admin/css/smoothness/**/*')
		.pipe(newer('dist/admin/css/smoothness'))
		.pipe(gulp.dest('dist/admin/css/smoothness'));

    gulp.src('src/admin/ckeditor/**/*')
		.pipe(newer('dist/admin/ckeditor'))
		.pipe(gulp.dest('dist/admin/ckeditor'));

    gulp.src('src/admin/elFinder-2.1.6/**/*')
		.pipe(newer('dist/admin/elFinder-2.1.6'))
		.pipe(gulp.dest('dist/admin/elFinder-2.1.6'));

    gulp.src('src/admin/phpThumb-1.7.13/**/*')
		.pipe(newer('dist/admin/phpThumb-1.7.13'))
		.pipe(gulp.dest('dist/admin/phpThumb-1.7.13'));
});


gulp.task('copySiteGuest', function () {
	gulp.src('src/guest/**/*')
		.pipe(newer('dist/guest'))
		.pipe(gulp.dest('dist/guest'));
});


gulp.task('copySiteImages', function () {
    gulp.src('src/images/**/*')
		.pipe(newer('dist/images'))
		.pipe(gulp.dest('dist/images'));

	gulp.src('src/guestFS/**/*')
		.pipe(newer('dist/guestFS'))
		.pipe(gulp.dest('dist/guestFS'));
});


gulp.task('build', [
    'compressAndCopySite',
    'copyUncompressedSources',
	'copySiteLogin',
    'compressAndCopyAdmin',
    'copyUncompressedAdminSources',
	'copySiteGuest',
    'copySiteImages'
]);


gulp.task('default', ['build']);