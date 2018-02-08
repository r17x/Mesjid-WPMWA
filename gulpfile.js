/****************************************************************
 * Deklarasi Variable untuk package dan library yang di gunakan *
 *                                                              *
 * $ npm install gulp gulp-sass gulp-postcss tailwindcss \      *
 *   browser-sync --save                                        *
 ***************************************************************/

var gulp        = require('gulp'),

    sass        = require('gulp-sass'),

    postcss     = require('gulp-postcss'),

    path        = require('path'),

    atImport    = require('postcss-import'),
   
    tailwindcss = require('tailwindcss'),
   
    browserSync = require('browser-sync').create()
;


/****************************************************************
 postsass(),
 * Deklarasi Variable source, build, configname                 *
 * source : folder yang berisikan file sass,css,scss            *
 * build  : folder untuk menyimpan hasil dari source            * 
 * configname: nama file config tailwindcss yang di dapat dari  *
 * $ node_modules/./bin/tailwindcss init <namaconfig>           *
 * $ # outputnya dalam bentuk <namaconfig>.js                   *
 ***************************************************************/
var source      = 'src';
var build       = '';
var configname  = 'mesjid'; 

/****************************************************************
 *     $ gulp style # untuk menjalankan fungsi dibawah ini      *
 ***************************************************************/
gulp.task( 'style', () => {
    var plugins = [
            require('precss'),
            require('postcss-import'),
            tailwindcss( './' + configname + '.js' ),
            require( 'autoprefixer' ) ,
    ]
    return gulp.src( source + '/*.scss' )
            .pipe( postcss(plugins) )
            .pipe( sass().on('error', sass.logError) )
            .pipe( gulp.dest( build + './' ) );
});

/****************************************************************
 *     $ gulp  # untuk menjalankan fungsi dibawah ini           *
 ***************************************************************/
gulp.task( 'live', ['style'], function()  {
    browserSync.init({
        server: {
            baseDir: './'
        } 
    });

    gulp.watch( `${source}/**/*.scss`, ['style'] );
    gulp.watch( './**/*.html' ).on("change", browserSync.reload);
    gulp.watch( "./**/*.js" ).on("change", browserSync.reload);
});
/****************************************************************
 *     $ gulp  # untuk menjalankan fungsi dibawah ini           *
 ***************************************************************/
gulp.task( 'default', () => {
    let watchList = [
        'scss',
        'css', 
    ];

    watchList.map((ext) => {
        gulp.watch( `${source}/**/*.${ext}`, ['style']);
    });
} );

