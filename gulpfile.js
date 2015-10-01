var gulp       = require('gulp'),
    plumber    = require('gulp-plumber'),
    sass       = require('gulp-sass'),
    minify     = require('gulp-minify-css'),
    prefixer   = require('gulp-autoprefixer'),
    onError    = function (error) { console.log(error.toString()); this.emit('end'); };

gulp.task('css', function() {
    return gulp.src('./src/Resources/sass/*.scss')
        .pipe(plumber({ errorHandler: onError }))
        .pipe(sass())
        .pipe(prefixer())
        .pipe(minify())
        .pipe(gulp.dest('./src/Resources/public/css'));
});

gulp.task('watch', ['css'], function () {
    gulp.watch('./src/Resources/sass/**/*.scss', ['css']);
});

gulp.task('default', ['css']);
