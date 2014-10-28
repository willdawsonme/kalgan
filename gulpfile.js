var gulp = require('gulp'),
    sass = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    minifycss = require('gulp-minify-css'),
    notify = require('gulp-notify'),
    livereload = require('gulp-livereload'),
    svgstore = require('gulp-svgstore'),
    svgmin = require('gulp-svgmin');

gulp.task('sass', function() {
    return gulp.src('app/assets/sass/global.scss')
        .pipe(sass())
        .on('error', function() {
            notify.onError().apply(this, arguments);
            this.emit('end');
        })
        .pipe(autoprefixer())
        .pipe(gulp.dest('public/css'))
        .pipe(notify({ message: 'Sass gulped!' }))
});

gulp.task('svgstore', function() {
    return gulp.src('app/assets/svg/*.svg')
        .pipe(svgmin())
        .pipe(svgstore({
            fileName: 'svg-defs.php',
            prefix: 'shape-',
            inlineSvg: true,
            transformSvg: function (svg, cb) {
                svg.attr({ style: 'display:none' });
                cb(null);
            }
        }))
        .pipe(gulp.dest('app/views/includes/'))
        .pipe(notify({ message: 'SVGs gulped!' }))
});

gulp.task('default', function() {
    gulp.start('sass', 'svgstore', 'watch');
});

gulp.task('watch', function() {
    gulp.watch('app/assets/sass/**/*.scss', ['sass']);
    gulp.watch('app/assets/svg/**/*.svg', ['svgstore']);

    livereload.listen();
    gulp.watch('public/css/**').on('change', livereload.changed);
    gulp.watch('app/views/includes/svg-defs.svg.php').on('change', livereload.changed);
});