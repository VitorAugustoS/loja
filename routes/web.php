<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\ProdutoController;
use App\Http\Controllers\VendaController;

Route::get('/', function () {
    return view('welcome');
});

Route::Resources([
	"cliente" => ClienteController::class,
	"produto" => ProdutoController::class,
	"venda" => VendaController::class
]);