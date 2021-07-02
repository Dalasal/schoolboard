const { src, dest, watch, series } = require('gulp');
const sass = require('gulp-sass');
const postcss = require('gulp-postcss');
const cssnano = require('cssnano');

// Sass Task
function scssTask(){
  return src('app/scss/style.scss')
    .pipe(sass())
    .pipe(postcss([cssnano()]))
    .pipe(dest('dist'));
}


// Watch Task
function watchTask(){
  watch(['app/scss/**/*.scss'], series(scssTask));
}

// Default Gulp task
exports.default = series(
  scssTask,
  watchTask
);