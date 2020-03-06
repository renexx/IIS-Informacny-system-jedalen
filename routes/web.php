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


Route::get("/","PagesController@index");

Route::get("udaje", "PagesController@udaje");

Route::get("sledovat", "PagesController@sledovat");

Route::get("vstupIS", "PagesController@vstupIS");

//Route::get("loginIS", "PagesController@loginIS");


Route::get("planVodicov", "PagesController@plan");

Route::get("prevadzkyIS", "PagesController@prevadzkyIS");


Route::get("ukoncit", "PagesController@ukoncit");

Route::get("upravit", "PagesController@upravit");

Route::get("adminIS", "PagesController@adminIS");

Route::get("prehladUzivatelia", "PagesController@prehladUzivatelia");

Route::get("prehladObjednavok", "PagesController@prehladObj");

Route::get("prehladOperatori", "PagesController@prehladOperatori");

Route::get("prehladVodici", "PagesController@prehladVodici");

Route::get("vodicIS", "PagesController@vodicIS");

Route::get("about","PagesController@about");

Route::get('operatorIS', "PagesController@operatorIS");

Route::get("home", "PagesController@index");

//Route::get("auth/login", "Auth\LoginController@")
//Route::resource('jedlo', 'JedloController');

Route::get("ukoncit/true/{prevadzka}", "PrevadzkaController@ukoncitObj");
Route::get("ukoncit/false/{prevadzka}", "PrevadzkaController@spustitObj");

Route::prefix('jedlo')->group(function (){
    Route::get("/create/{prevadzka}", "JedloController@create");
    Route::post("/store", "JedloController@store")->name("jedlo.store");
});

Route::prefix('napoj')->group(function (){
    Route::get("/create/{prevadzka}", "NapojController@create");
    Route::post("/store", "NapojController@store")->name("napoj.store");
});


Route::prefix("prevadzky")->group(function(){
    Route::get("/create", "PrevadzkaController@create");
    Route::post("/store", "PrevadzkaController@store")->name("prevadzky.store.submit");
});


Auth::routes();
Route::prefix("admin")->group(function(){
    Route::get("/login","Auth\AdminLoginController@showLoginForm")->name("admin.login");
    Route::post("/login","Auth\AdminLoginController@login")->name("admin.login.submit");
    Route::post("/logout","Auth\AdminLoginController@logout")->name("admin.logout.submit");
    Route::get("/","AdminController@index")->name("admin");
});

Route::prefix("operator")->group(function(){
    //Route::post("/destroy", 'OperatorController@destroy')->name("operator.destroy");
    Route::get("/login","Auth\OperatorLoginController@showLoginForm")->name("operator.login");
    Route::post("/login","Auth\OperatorLoginController@login")->name("operator.login.submit");
    Route::post("/logout","Auth\OperatorLoginController@logout")->name("operator.logout.submit");
    Route::get("/","OperatorController@index")->name("operator.dashboard");

});

Route::prefix("vodic")->group(function(){
    Route::get("/login","Auth\VodicLoginController@showLoginForm")->name("vodic.login");
    Route::post("/login","Auth\VodicLoginController@login")->name("vodic.login.submit");
    Route::post("/logout","Auth\VodicLoginController@logout")->name("vodic.logout.submit");
    Route::get("/","VodicController@index")->name("vodic.dashboard");
});


Route::prefix("menu")->group(function (){
    Route::get("/{oznacenie}", "MenuController@menu");
    Route::get("/IS/{oznacenie}", "MenuController@menuIS");
    Route::get("/IS/create/{oznacenie}", "MenuController@create");
    Route::get("/{oznacenie}/{filter}", "MenuController@filtrovat_stalu");
    Route::post("/store", "MenuController@store")->name("menu.store");
    Route::get("/addJedlo/{oznacenie}/{id_jedlo}", "MenuController@addJedlo");
    Route::get("/addNapoj/{oznacenie}/{id_napoj}", "MenuController@addNapoj");
    Route::get("/removeJedlo/{oznacenie}/{id_jedlo}", "MenuController@removeJedlo");
    Route::get("/removeNapoj/{oznacenie}/{id_napoj}", "MenuController@removeNapoj");
});

Route::prefix("objednavka")->group(function(){
    Route::get("/create/{prevadzka_id}/{polozka_id}/{typ}", "ObjednavkaController@create")->name("objednavka.create");
    Route::post("/store", "ObjednavkaController@store")->name("objednavka.store");
    Route::get("/create/{prevadzka_id}/{polozka_id}", "ObjednavkaController@create")->name("objednavka.create");
    Route::post("/store", "ObjednavkaController@store")->name("objednavka.store");
    Route::get("/update/{id}/{id_vodic}", "ObjednavkaController@update")->name("objednavka.update");
    Route::get("/vybavit/{id}", "ObjednavkaController@vybavit")->name("objednavka.vybavit");
    Route::get("/dorucit/{id}", "ObjednavkaController@dorucit")->name("objednavka.dorucit");
});

//Route::get('/home', 'HomeController@index')->name('home');
Route::resource("jedlo","JedloController");
Route::resource("napoj","NapojController");
Route::resource("prevadzky","PrevadzkaController");
Route::resource("uzivatel","UserController");
Route::resource("operator","OperatorController");
Route::resource("vodic","VodicController");
//Route::resource("objednavka", "ObjednavkaController");
