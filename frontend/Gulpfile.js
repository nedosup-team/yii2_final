var path = {
    src: {
        dir:                    'assets/src/',
        fonts:                  'assets/src/fonts/**/*.{eot,ttf,woff,woff2,svg}',
        js:                     'assets/src/javascripts/all.js',
        sass:                   'assets/src/sass/*.sass',
        images:                 'assets/src/images/**/*.{jpg,png,gif}',
    },

    watch: {
        fonts:                  'assets/src/fonts/**/*.{eot,ttf,woff,woff2,svg}',
        js:                     'assets/src/javascripts/**/*.js',
        sass:                   'assets/src/sass/**/*.sass',
        images:                 'assets/src/images/**/*.{jpg,png,gif}'
    },

    built: {
        dir:                    'web/',
        fonts:                  'web/fonts/',
        js:                     'web/javascripts/',
        css:                    'web/stylesheets/',
        images:                 'web/images/'
    }
};

var gulp = require('gulp');
var watch = require('gulp-watch');
var concat = require('gulp-concat');
var sourcemaps = require('gulp-sourcemaps');
var plumber = require('gulp-plumber');
var rigger = require('gulp-rigger');
var uglify = require('gulp-uglify');
var compass = require('gulp-compass');
var imagemin = require('gulp-imagemin');
var cssmin = require('gulp-cssmin');
var debug = require('gulp-debug');
var rm = require('rimraf');

gulp.task('clean', function (cb) {
    rm(path.built.dir, cb);
});

gulp.task('fonts:build', function (cb) {
    gulp.src(path.src.fonts)
        .pipe(debug({title: 'fonts:'}))
        .pipe(gulp.dest(path.built.fonts));
});

gulp.task('images:build', function () {
    gulp.src(path.src.images)
        .pipe(debug({title: 'images:'}))
        .pipe(imagemin({
            progressive: true,
            interlaced: true,
            svgoPlugins: [{removeViewBox: false}]
        }))
        .pipe(gulp.dest(path.built.images));
});



gulp.task('js:build:min', function () {
    gulp.src(path.src.js)
        .pipe(plumber())
        .pipe(debug({title: 'js:'}))
        .pipe(rigger())
        .pipe(uglify())
        .pipe(concat('all.min.js'))
        .pipe(gulp.dest(path.built.js));
});

gulp.task('js:build:default', function () {
    gulp.src(path.src.js)
        .pipe(plumber())
        .pipe(debug({title: 'js:'}))
        .pipe(rigger())
        .pipe(gulp.dest(path.built.js));
});

gulp.task('sass:build', function () {
    gulp.src(path.src.sass)
        .pipe(debug({title: 'sass:'}))
        .pipe(plumber({
            errorHandler: function (error) {
                console.log(error.message);
                this.emit('end');
            }
        }))
        .pipe(compass({
            sass: 'assets/src/sass',
            css: path.built.css,
            image: path.built.images,
            font: path.built.fonts
        }))
        .pipe(gulp.dest(path.built.css));
});

gulp.task('js:build', ['js:build:min', 'js:build:default']);

gulp.task('build', ['fonts:build', 'images:build',  'js:build', 'sass:build']);

gulp.task('watch', function () {
    watch([path.watch.images], function () {
        gulp.start('images:build');
    });

    watch([path.watch.fonts], function () {
        gulp.start('fonts:build');
    });

    watch([path.watch.js], function () {
        gulp.start('js:build');
    });

    watch([path.watch.sass], function () {
        gulp.start('sass:build');
    });

});

gulp.task('images', ['images:build', 'watch']);
gulp.task('fonts', ['fonts:build', 'watch']);
gulp.task('sass', ['sass:build', 'watch']);
gulp.task('js', ['js:build', 'watch']);

gulp.task('default', ['build', 'watch']);

