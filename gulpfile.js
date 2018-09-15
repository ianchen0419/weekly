var gulp = require('gulp'),
    sass = require('gulp-sass'),
    plumber = require('gulp-plumber'),
    sourcemaps = require('gulp-sourcemaps'),
    browserSync = require('browser-sync');

gulp.task('sass', function(){
    gulp.src('./common/scss/**/*.scss')
        .pipe(plumber())
        .pipe(sourcemaps.init())
        .pipe(sass())
        .pipe(sourcemaps.write('./'))
        .pipe(gulp.dest('./common/css/'));
});
gulp.task('browser-sync', function(){
    browserSync.init({
        server: {
            baseDir: "./"
        }
    });
});
gulp.task('bs-reload', function(){
    browserSync.reload();
});


gulp.task('sass-watch', ['sass','browser-sync'], function(){
    gulp.watch("./**/*.html", ['bs-reload']);
    gulp.watch("./common/scss/**/*.scss", ['bs-reload']);
    gulp.watch("./common/js/*.js", ['bs-reload']);
    var watcher = gulp.watch('./common/scss/**/*.scss', ['sass']);
    watcher.on('change', function(event){
        console.log('コンパイルOK');
    });
});

gulp.task('default', ['sass-watch', 'browser-sync', 'bs-reload']);