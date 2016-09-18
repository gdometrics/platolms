const elixir = require('laravel-elixir');
const npmRoot = '../../../node_modules/';

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
        '../vendor/Datatables/datatables.min.css',
        npmRoot + 'sweetalert2/dist/sweetalert2.min.css'
    ]);

	// Combine my scripts
	mix.webpack([
        'app.js',
        npmRoot + 'chart.js/dist/Chart.bundle.min.js',
        npmRoot + 'sweetalert2/dist/sweetalert2.min.js'
	]);

	// Cache Bust those!
	mix.version(['public/css/app.css', 'public/js/all.js']);
	
});
