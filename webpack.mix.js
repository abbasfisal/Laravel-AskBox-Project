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

mix.js('resources/js/app.js', 'public/js')
    .sass('resources/sass/app.scss', 'public/css')
    .styles([
        'public/css/user/uikit.css',
        'public/css/user/style.css',
        'public/css/user/tailwind.css',
    ], 'public/css/user/all.css')
    .scripts([
        'public/js/user/jquery-3.3.1.min.js',
        'public/js/user/tippy.all.min.js',
        'public/js/user/uikit.js',
        'public/js/user/simplebar.js',
        'public/js/user/custom.js',
        'public/js/user/bootstrap-select.min.js',
        'public/js/user/ionicons.js',
    ],'public/js/user/all_min.js')
    .styles([
        'public/css/adminlte.min.css',
        'public/css/md.css'
    ],'public/css/admin/adminlte_md_min.css')
    .sourceMaps();

/*admin css
* <link rel="stylesheet" href="{{asset('css/adminlte.min.css')}}">
    <!-- Material Design Style -->
    <link rel="stylesheet" href="{{asset('css/md.css')}}">
    * */
/*
user
* <script src="{{asset('js/user/jquery-3.3.1.min.js')}}"></script>
<script src="{{asset('js/user/tippy.all.min.js')}}"></script>
<script src="{{asset('js/user/uikit.js')}}"></script>
<script src="{{asset('js/user/simplebar.js')}}"></script>
<script src="{{asset('js/user/custom.js')}}"></script>
<script src="{{asset('js/user/bootstrap-select.min.js')}}"></script>
<script src="{{asset('js/user/ionicons.js')}}"></script>

* */
/*
* <link rel="stylesheet" href="{{asset('css/user/uikit.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/style.css')}}">
    <link rel="stylesheet" href="{{asset('css/user/tailwind.css')}}">

* */
