var gulp = require('gulp');
var sass = require('gulp-sass');
var sourcemaps = require('gulp-sourcemaps');

////

var cssPaths = 'public/css/scss/**/*.scss';

gulp.task('css', function() {
  gulp.src(cssPaths)
    .pipe(sourcemaps.init())
    .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
    .pipe(sourcemaps.write({includeContent: false, sourceRoot: '/css/scss'}))
    .pipe(gulp.dest('public/css'));
});

gulp.task('watch', function () {
  gulp.watch(cssPaths, ['css']);
});

gulp.task('default', ['watch', 'css']);