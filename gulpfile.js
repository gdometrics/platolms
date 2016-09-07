const elixir = require('laravel-elixir');

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
    ]);

	// Combine my scripts
	mix.webpack([
        'app.js'
	]);

	// Cache Bust those!
	mix.version(['public/css/app.css', 'public/js/all.js']);
	
});
