<?php

use App\Http\Controllers\FacktourController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\MaincatController;
use App\Http\Controllers\Slider1Controller;
use App\Http\Controllers\Subcat1Controller;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ShopController;
use App\Http\Controllers\ProductimgController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MaghaleController;
use App\Http\Controllers\NazarController;
use App\Http\Controllers\NazarmaghaleController;
use App\Http\Controllers\ProductrangController;
use App\Http\Controllers\SabadController;
use App\Http\Controllers\SizeController;


use App\Models\Product;

use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;



//میدلور برای ادمین فقط ادمین ها بهش دسترسی دارن
Route::middleware(\App\Http\Middleware\CheckUserStatus::class)->group(function () {
Route::get('/home',[ProductController::class,'home']);
Route::get('/sefaresh',[MaincatController::class,'sefaresh']);

Route::get('/maincat',[MaincatController::class,'maincat']);

Route::post('/insertmaincat',[MaincatController::class,'insertMaincat']);

Route::get('/maincatdel/{id}',[MaincatController::class,'maincatdel']);

Route::get('/maincatup/{id}',[MaincatController::class,'maincatup']);
Route::put('/maincatup2',[MaincatController::class,'maincatup2']);

Route::get('/subcat1',[Subcat1Controller::class,'subcat1']);
Route::post('/insertsubcat1',[Subcat1Controller::class,'insertSubcat1']);
Route::get('/subcat1del/{id}',[Subcat1Controller::class,'subcat1del']);
Route::post('/main',[Subcat1Controller::class,'main']);

Route::get('/product',[ProductController::class,'product']);
Route::post('/insertproduct',[ProductController::class,'insertProduct']);
Route::get('/productdel/{id}',[ProductController::class,'productdel']);

Route::get('/productimg/{id}',[ProductimgController::class,'productimg']);
Route::post('/insertproductimg',[ProductimgController::class,'insertproductimg']);
Route::get('/productimgdel/{id}',[ProductimgController::class,'productimgdel']);

Route::get('/productup/{id}',[ProductController::class,'productup']);
Route::put('/productup2',[ProductController::class,'productup2']);

Route::get('/producttakhfif/{id}',[ProductController::class,'producttakhfif']);
Route::put('/producttakhfif2',[ProductController::class,'producttakhfif2']);

Route::get('/producttozihat/{id}',[ProductController::class,'producttozihat']);
Route::put('/producttozihat2',[ProductController::class,'producttozihat2']);

Route::post('/mojod',[ProductController::class,'mojod']);
Route::post('/namojod',[ProductController::class,'namojod']);

Route::get('/sizeproduct/{id}',[SizeController::class,'sizeproduct']);
Route::post('/insertsize',[SizeController::class,'insertsize']);
Route::get('/sizedel/{id}',[SizeController::class,'sizedel']);

Route::get('/productrang/{id}',[ProductrangController::class,'productrang']);
Route::post('/insertproductrang',[ProductrangController::class,'insertproductrang']);
Route::get('/delproductrang/{id}',[ProductrangController::class,'delproductrang']);

Route::get('/slider',[Slider1Controller::class,'slider']);
Route::post('/insertslider',[Slider1Controller::class,'insertSlider']);
Route::get('/sliderdel/{id}',[Slider1Controller::class,'sliderdel']);

Route::get('/maghale',[MaghaleController::class,'maghale']);
Route::post('/maghaleinsert',[MaghaleController::class,'maghaleinsert']);
Route::get('/maghaledel/{id}',[MaghaleController::class,'maghaledel']);

Route::get('/nazarm2',[NazarmaghaleController::class,'nazarm2']);
Route::post('/nmok',[NazarmaghaleController::class,'nmok']);
Route::post('/nmno',[NazarmaghaleController::class,'nmno']);

Route::get('/nazar1',[NazarController::class,'nazar1']);

Route::post('/ok',[NazarController::class,'ok']);
Route::post('/no',[NazarController::class,'no']);

Route::get('/nemayeshsabad/{id}',[SabadController::class,'nemayeshsabad']);

});




Route::post('/searcha',[ProductController::class,'searcha']);

Route::post('/arzan',[ProductController::class,'arzan']);
Route::post('/geran',[ProductController::class,'geran']);
Route::post('/jadid',[ProductController::class,'jadid']);


Route::post('/mojodiha',[ProductController::class,'mojodiha']);


Route::get('/maghaleha',[MaghaleController::class,'maghaleha']);

Route::get('/singlemaghale/{id}',[MaghaleController::class,'singlemaghale']);

Route::post('/nazarmaghale',[NazarmaghaleController::class,'nazarmaghale']);



Route::get('/',[ShopController::class,'index']);

Route::get('/search1',[ShopController::class,'search1']); 

Route::get('/search/{id}',[ShopController::class,'search']); 

Route::get('/singleproduct/{id}',[ShopController::class,'singleproduct']);


Route::post('/sabad',[SabadController::class,'sabad']);
Route::get('/cart/{id}',[SabadController::class,'cart']);
Route::post('/ziad',[SabadController::class,'ziad']);
Route::post('/kam',[SabadController::class,'kam']);
Route::get('/sabaddel/{id}',[SabadController::class,'sabaddel']);


Route::post('/nazar',[NazarController::class,'nazar']);
Route::get('/nazarha',[NazarController::class,'nazarha']);


Route::get('/loginregister',[RegisterController::class,'loginRegister']);
Route::post('/register',[RegisterController::class,'register']);
Route::get('/login2',[LoginController::class,'login2'])->name('login');
Route::post('/login3',[LoginController::class,'login3']);


Route::get('/profile',[ProfileController::class,'profile'])->name('profile');

Route::get('/facktour',[FacktourController::class,'facktour']);
Route::post('/facktourinsert',[FacktourController::class,'facktourinsert']);

Route::get('/search1',[ProductController::class,'search1']);
