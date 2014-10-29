var gulp         = require('gulp'),
    filter       = require('gulp-filter'),
    notify       = require('gulp-notify'),
    browsersync  = require('browser-sync'),
    bsreload     = browsersync.reload,
    sass         = require('gulp-ruby-sass'),
    autoprefixer = require('gulp-autoprefixer'),
    svgstore     = require('gulp-svgstore'),
    svgmin       = require('gulp-svgmin');
    livereload   = require('gulp-livereload'),

gulp.task('sass', function() {
    return gulp.src('app/assets/sass/global.scss')
        .pipe(sass())
        .on('error', function() {
            notify.onError().apply(this, arguments);
            this.emit('end');
        })
        .pipe(autoprefixer())
        .pipe(gulp.dest('public/css'))
        .pipe(filter('**/*.css'))
        .pipe(bsreload({stream: true}))
        //.pipe(notify({ message: 'Sass gulped!' }))
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
        .pipe(bsreload({stream: true}))
        //.pipe(notify({ message: 'SVGs gulped!' }))
});

gulp.task('default', ['sass', 'svgstore', 'browser-sync'], function() {
    gulp.watch('app/assets/sass/**/*.scss', ['sass']);
    gulp.watch('app/assets/svg/**/*.svg', ['svgstore']);
    gulp.watch('app/views/**/*.blade.php', ['bs-reload']);
});

gulp.task('bs-reload', function() {
    browsersync.reload();
});

gulp.task('browser-sync', function() {
    browsersync({
        proxy: {
            host: 'localhost',
            port: 8000
        }
    });
});

// gulp.task('watch', function() {
//     gulp.watch('app/assets/sass/**/*.scss', ['sass']);
//     gulp.watch('app/assets/svg/**/*.svg', ['svgstore']);

//     livereload.listen();
//     gulp.watch('public/css/**').on('change', livereload.changed);
//     gulp.watch('app/views/includes/svg-defs.svg.php').on('change', livereload.changed);
// });
