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

            //Admin
mix.scripts(['resources/js/vue.js',
             'resources/js/axios.js',
             'resources/js/jquery.js',
             'resources/js/popper.min.js',
             'resources/js/bootstrap.min.js',
             'resources/js/toastr.min.js',
             'resources/js/app.js'
            ], 'public/js/app.js');

mix.styles(['resources/css/bootstrap.min.css',
             'resources/css/toastr.min.css',
             'resources/css/app.css'
            ], 'public/css/app.css');


            //Vistas
mix.scripts(['resources/js/jquery.js',
            'resources/js/popper.min.js',
            'resources/js/bootstrap.min.js',
            'resources/js/views.js'
            ], 'public/js/views.js');

mix.styles(['resources/css/bootstrap.min.css',
             'resources/css/views.css'
            ], 'public/css/views.css');
