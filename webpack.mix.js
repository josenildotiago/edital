const mix = require('laravel-mix');

/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

mix.styles([
    'public/plugins/fontawesome-free/css/all.min.css',
    'public/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css',
    'public/plugins/datatables-responsive/css/responsive.bootstrap4.min.css',
    'public/plugins/datatables-buttons/css/buttons.bootstrap4.min.css',
    'public/dist/css/adminlte.min.css',
    'node_modules/jquery-confirm/dist/jquery-confirm.min.css'
], 'public/site/css/style.min.css');

mix.scripts([
    'public/plugins/jquery/jquery.min.js',
    'public/plugins/bootstrap/js/bootstrap.bundle.min.js',
    'public/plugins/datatables/jquery.dataTables.min.js',
    'public/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js',
    'public/plugins/datatables-responsive/js/dataTables.responsive.min.js',
    'public/plugins/datatables-responsive/js/responsive.bootstrap4.min.js',
    'public/plugins/datatables-buttons/js/dataTables.buttons.min.js',
    'public/plugins/datatables-buttons/js/buttons.bootstrap4.min.js',
    'public/plugins/jszip/jszip.min.js',
    'public/plugins/pdfmake/pdfmake.min.js',
    'public/plugins/pdfmake/vfs_fonts.js',
    'public/plugins/datatables-buttons/js/buttons.html5.min.js',
    'public/plugins/datatables-buttons/js/buttons.print.min.js',
    'public/plugins/datatables-buttons/js/buttons.colVis.min.js',
    'public/dist/js/adminlte.min.js',
    'public/dist/js/demo.js',
    'node_modules/jquery-confirm/dist/jquery-confirm.min.js'

], 'public/site/js/script.min.js');