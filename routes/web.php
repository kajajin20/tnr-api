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

Route::get('/', function () {
    return view('welcome');
});

Route::get('address/{address}', function ($address) {
  $view = view('address');
  $district_list = DB::table('district')->where('district_name', '=', $address)->get();
	//$district_list = DB::select('select * from district where district_name= ? ', [$address]);
  $district_list = json_decode(json_encode($district_list), true);
  $juso = array();
  for($i=0;$i<count($district_list);$i++){
    $juso[$i]['district'] = $district_list[$i]['district_name'];

    $address_list = DB::select("select dong from address where juso= ?", [$district_list[$i]['district_name']]);
    $address_list = json_decode(json_encode($address_list), true);
    $juso[$i]['address'] = $address_list;
  }
  $view->result = $juso;
	return $view;
});

Route::get('select/{name}/{phone}', function ($name,$phone) {
  $view = view('select');
	$results = DB::select('select * from test where name= ? AND phone = ?', [$name,$phone]);
  $view->result = $results;
	return $view;
});

Route::get('insert/{name}/{phone}', function ($name,$phone) {

	if($phone != '' && $name != ''){
		DB::insert('insert into test (name, phone) values (?, ?)', [$name, $phone]);
	}
	return;
});



Route::get('/showProfile/{id}', 'Controller@showProfile');
