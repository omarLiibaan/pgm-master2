<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});

Route::get('/description', function () {
    return view('about.description');
});*/
/*------------- Appel directe d'une méthode se trouvant dans le controller  */
//Route::get('/','AboutController@bonsoir');


// Route::get('/', 'AboutController@index');
Route::redirect('/', 'login');
Route::get('/about', 'AboutController@about');
Route::get('/contact', 'AboutController@contact');
Route::resource('posts', 'PostsController');

Route::get('sortAsc', 'MembersController@sortAsc');
Route::get('searchmem', 'MembersController@searchmem');
Route::resource('membres', 'MembersController');

Route::get('searchcours', 'CoursController@searchcours');
Route::resource('coursAsso', 'CoursController');

Route::get('searchsai','SaisonsController@searchsai');
Route::resource('saisons', 'SaisonsController');

Route::get('searchteam','TeamsController@searchteam');
Route::resource('equipes', 'TeamsController');

Route::get('searchcats','CatsController@searchcats');
Route::resource('categories', 'CatsController');

Route::get('searchfon','FonctionsController@searchfon');
Route::resource('fonctions', 'FonctionsController');

Route::get('searchevent','EventsController@searchevent');
Route::resource('evenements', 'EventsController');

Route::get('searchmemcours','MembresCoursController@searchmemcours');
Route::resource('membresCours', 'MembresCoursController');


Route::get('facturesCours/{id}/showFacture', 'FacturesCoursController@showFacture');
Route::get('facturesCours/{id}/pdf', 'FacturesCoursController@pdf');
Route::get('facturesCours/{id}/pdfCours', 'FacturesCoursController@pdfCours');
Route::resource('facturesCours', 'FacturesCoursController');

Route::get('mail/send','EmailController@send');
Route::resource('mail','EmailController');

Auth::routes();
Route::get('logout', 'Auth\LoginController@getLogout');

// Route::get('/home', 'HomeController@index')->name('home');
