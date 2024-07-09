<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

require __DIR__.'/auth.php';
require __DIR__.'/individual.php';
require __DIR__.'/company.php';
require __DIR__.'/brand.php';
require __DIR__.'/mockupindividual.php';
require __DIR__.'/mockupcompany.php';
require __DIR__.'/mockupadministrator.php';
require __DIR__.'/mockupprofile.php';