<?php
use Illuminate\Support\Facades\Route;

Route::resource('product',ProductController::class);
Route::get('panel',[PanelController::class,'index'])->name('panel');
?>