var gulp = require('gulp');
var sass = require('gulp-sass');
var livereload = require('gulp-livereload');
var browserSync = require('browser-sync');
var minifyCss = require('gulp-cssnano');

gulp.task('sass', function () {
    return gulp.src('style/sass/*.scss')
        .pipe(sass())
        .pipe(minifyCss())
        .pipe(gulp.dest('style'));
});

gulp.task('watch', function () {
    livereload.listen();
    gulp.watch(['style/sass/*.scss'], ['sass']);
});

gulp.task('default', ['sass', 'watch']);