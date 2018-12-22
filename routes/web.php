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

//Request to put the choosen locale into the session
Route::group(['prefix' => LaravelLocalization::setLocale()], function()
{
    /** ADD ALL LOCALIZED ROUTES INSIDE THIS GROUP **/
    Route::get('/', 'Controller@getVideo');


route::get('/feed', 'PostController@myPost');
route::get('/channels', 'controller@channels');
route::get('/feed/search', 'PostController@searchAjax')->name('searchFeed');

Route::get('/user/edit/{id}', 'VinesController@show');

Route::get('/teste', function(){
    return view('testeview');
});

route::get('/test', 'SubController@testfunction');
route::post('/test', 'SubController@testfunction');



route::get('/go/search', 'searchController@searchServer')->name('searchSv');

route::get('/go/preferences', 'searchController@searchPreferences')->name('preferences');


route::get('/go/searchmode', 'searchController@searchMode')->name('searchMode');
route::get('/user/settings', 'HomeController@pSettings')->name('psettings');



route::get('/go/seachall', 'searchController@searchTitle')->name('searchAll');

route::get('/user/control-panel/fast-interaction', 'HomeController@fastinteraction')->name('fastinteraction');

route::get('/user/control-panel/interactionpage', 'HomeController@interactionpage')->name('interactionpage');


route::get('/go/searchtype', 'searchController@searchType')->name('searchType');
route::get('/go/searchtype', 'searchController@searchType')->name('searchType');


route::post('/user/edit/{id}', 'VinesController@update')->name('vinesupdate');

route::post('/user/delet/', 'VinesController@destroy')->name('deleteVine');


route::post('/user/comment', 'CommentController@insert')->name('insertComment');
route::post('/user/commentajax', 'CommentController@storeComment')->name('ajaxComment');


Route::get('/user/comment/del', 'CommentController@destroy')->name('commentDelete');

route::post('/user/setdefault', 'VinesController@setDefault')->name('setDefault');
Route::post('/user/channel/updatesettings', 'VinesController@updateProfile')->name('channelUpdate');

route::post("/report", 'reportController@addReport')->name('addReport');


Route::get('/admin', 'AdminController@admin')    
    ->middleware('is_admin')    
    ->name('admin');

    Route::get('/admin/reports', 'AdminController@reports') 
    ->middleware('is_admin')    
    ->name('adminReport');

    Route::get('/admin/comments', 'AdminController@showComments') 
    ->middleware('is_admin')    
    ->name('adminComments');

    Route::post('/admin/delete-post', 'AdminController@deletePost')    
    ->middleware('is_admin')    
    ->name('adminDelPost');

    Route::post('/admin/delete-comment', 'AdminController@deleteComment')    
    ->middleware('is_admin')    
    ->name('adminDelCom');

 Auth::routes();

Route::get('/user/change-password','HomeController@showChangePasswordForm');

Route::post('/user/settings/changePassword','HomeController@changePassword')->name('changePassword');

 Route::get('/user/control-panel', 'HomeController@index')->name('control-panel');


 Route::get('/user/create-channel', 'ChannelController@index');
 Route::get('/user/upload-vine', 'VinesController@create')->name('upload');
 Route::get('/user/last-interactions', 'HomeController@interactions')->name('last-interactions');
 Route::get('/user/following', 'HomeController@subsPage')->name('subscribespage');


 Route::get('/user/upload-photo', 'VinesController@createPhoto')->name('upload-photo');
 route::post('/user/upload/action/photo', 'vinesController@photoInsert')->name('photoInsert');



 Route::get('/user/vines', 'VinesController@studioList')->name('vines');



 Route::get('/likes-check', 'LikesController@show')->name('checkLike');
 Route::get('/liked-post', 'LikesController@store')->name('like');
 Route::get('/unliked-post', 'LikesController@destroy')->name('unlike');



Route::get('/assister/follows-check', 'SubController@checkFollow')->name('checkFollow');

Route::get('/assister/follows-join', 'SubController@addFollow')->name('joinFollow');

Route::get('/assister/follows-del', 'SubController@unFollow')->name('delFollow');


route::post('/customer/ajaxupdate', 'SubController@Follow');




 Route::get('/user/studio', 'VinesController@showChannel')->name('channel-settings');

 Route::resource('/user/control-panel/channel', 'ChannelController');
 Route::resource('/user/upload/vines', 'VinesController');

 // ROTA QUE CAUSA O CONFLITO
Route::get('/{channel_name}', 'ChannelView@index')->name('channelview');


Route::get('/{channel_name}/multi', function(){
return view('ch-multi');
});
Route::get('/{channel_name}/feed', function(){
return view('ch-feed');
});


Route::get('/account/user/{usernick}', 'searchController@showUser')->name('showUser');
route::get('/{channel}/{vine}', 'ChannelView@show' );


});








