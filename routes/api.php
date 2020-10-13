<?php

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Routing\Router;
use Illuminate\Support\Facades\Hash;

/** @var Router $router */

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
$router->group(
    ['prefix' => 'auth', 'as' => 'auth.'],
    function (Router $router) {
        $router->post('/login', [App\Http\Controllers\Auth\AuthController::class, 'login']);
    }
);
$router->group(
    ['middleware' => 'auth:sanctum'],
    function (Router $router) {
        $router->get('/user', function (Request $request) {
            return $request->user();
        });
        $router->get('/users', [App\Http\Controllers\UserController::class, 'index']);
    }
);
