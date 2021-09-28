<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\LinkController;
use App\Http\Controllers\PdfController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VisitorController;


$api = app("Dingo\Api\Routing\Router");
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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


$api->version('v1', function ($api) {

    $api->get('/sumn', [VisitorController::class, 'index']);
    $api->get('/get-snippets', [AdminController::class, 'getSnippets']);
    $api->get('/get-pdfs', [AdminController::class, 'getPdfs']);
    $api->get('/get-links', [LinkController::class, 'getLinks']);
    $api->post('update_admin_form', [AdminController::class, 'store']);
    $api->post('update_admin_pdf', [PdfController::class, 'pdfUpload']);
    $api->post('update_admin_links', [LinkController::class, 'saveLink']);
    $api->delete('remove-snippet', [AdminController::class, 'deleteSnippet']);
    $api->delete('remove-pdf', [PdfController::class, 'deletePdf']);
    $api->delete('remove-link', [LinkController::class, 'deleteLink']);

});