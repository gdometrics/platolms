const elixir = require('laravel-elixir');
const bowerDir = './resources/assets/';

require('laravel-elixir-vue');

/*
 |--------------------------------------------------------------------------
 | Elixir Asset Management
 |--------------------------------------------------------------------------
 */

elixir(mix => {
	
	// Compile My Sass
    mix.sass([
    	'app.scss',
        'vendor/bootstrap-dialog/scr/css/bootstrap-dialog.css',
    ]);

	// Combine my scripts
	mix.scripts([
        'vendor/jquery/dist/jquery.min.js',
        'vendor/bootstrap/dist/js/bootstrap.min.js',
        'vendor/bootstrap-dialog/dist/js/bootstrap-dialog.min.js',
        'js/app.js'
	], 'public/js', bowerDir)

	// Combine the styles
	mix.styles([
		'app.css',
	], null, 'public/css');

	// Cache Bust those!
	mix.version(['public/css/all.css', 'public/js/all.js']);
	
});

// elixir(mix => {
//     mix.sass('app.scss')
//        .webpack('app.js');
// });
