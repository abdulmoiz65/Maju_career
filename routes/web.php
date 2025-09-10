<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin', function() {
    return view('admin.pages.index'); // Ensure folder matches for case sensitivity
});
