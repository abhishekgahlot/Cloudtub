<?php

Route::get('/', function()
{
	return View::make('index.index');
});


Route::get('/index.html', function()
{
	return View::make('index.index');
});
Route::get('/index', function()
{
	return View::make('index.index');
});


Route::get('/about', function()
{
	return View::make('index.index');
});

Route::get('/contact', function()
{
	return View::make('index.contact');
});

Route::get('/signup', array('as'=>'signup','before' => 'authcheck',function()
{	if (Auth::check())
	{
    	return Redirect::route('cloud');
    }
	else
	{
	return View::make('index.signup');
	}
}));

Route::get('/signin', array('as'=>'signin','before' => 'authcheck',function()
{
	return View::make('index.signin');

}));


Route::get('/reset', function()
{
	return View::make('index.reset');
});

Route::get('/resetpass/{email}/{code}', function($email,$code)
{
	return View::make('index.resetpass')->with(array('email'=> $email,'code'=>$code));
});




Route::group(array('before' => 'csrf'), function()
{

    Route::post('/signin',array('before' => 'authcheck','uses' => 'Verify@Login'));

    Route::post('/signup',array('before' => 'authcheck','uses' =>'Verify@Register'));

    Route::post('/reset',array('before' => 'authcheck','uses' =>'Verify@Reset'));

    Route::post('/resetpass',array('before' => 'authcheck','uses' =>'Verify@resetPassword'));

});

Route::group(array('before' => 'auth'), function()
{
Route::get('view/{guid}/{file?}','ViewFiles@view');

Route::post('upload','Uploader@Upload');

Route::post('foldercheck','Folder@foldercheck');

Route::get('file/{folder}/{page}',array('uses' => 'Files@showFiles'));

Route::get('thumb/{file}','Files@showThumb');

Route::get('session','Files@session');

Route::get('calendar','ViewFiles@calendar');

Route::get('edit/{key}/{parameters?}','Edit@modify');

Route::get('trash/{parameters}/{key}','Trash@show');

Route::post('settings','Settings@Edit');

Route::get('settings/{request}','Settings@show');

Route::get('basic', 'HomeController@BasicData');

});

Route::get('session','Files@session');


Route::get('cloud', array('as'=>'cloud','before' => 'auth', function()
{
    return View::make('cloud.index');
}));

Route::get('logout',array('as'=>'lougout',function(){

	Auth::logout();
	return Redirect::to('/');

}));

Route::get('verify/{email}/{code}','Verify@Verifyuser');

Route::get('check','HomeController@check');

Route::get('imusify/post/{data}','Imusify@AddSubscribers');

Route::get('download/{uid}','Download@start');

Route::get('download/decrypt/{uid}','Download@de');


/*
Route Filters Really Awesome
*/
Route::filter('authcheck', function()
{
    if (Auth::check())
	{
    	return Redirect::route('cloud');
    }

});
