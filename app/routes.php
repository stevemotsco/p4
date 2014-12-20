<?php

/* Application Routes */
/* NBaseController is handling before=>csrf filters */

Route::get('/get-environment',function() {
echo "Environment: ".App::environment();
});

Route::get('mysql-test', function() {
# Print environment
echo 'Environment: '.App::environment().'<br>';
# Use the DB component to select all the databases
$results = DB::select('SHOW DATABASES;');
# If the "Pre" package is not installed, you should output using print_r instead
print_r($results);
});
Route::get('/debug', function() {
echo '<pre>';
echo '<h1>environment.php</h1>';
$path = base_path().'/environment.php';
try {
	$contents = 'Contents: '.File::getRequire($path);
	$exists = 'Yes';
}
catch (Exception $e) {
$exists = 'No. Defaulting to `production`';
$contents = '';
}
echo "Checking for: ".$path.'<br>';
echo 'Exists: '.$exists.'<br>';
echo $contents;
echo '<br>';
echo '<h1>Environment</h1>';
echo App::environment().'</h1>';
echo '<h1>Debugging?</h1>';
if(Config::get('app.debug')) echo "Yes"; else echo "No";
echo '<h1>Database Config</h1>';
print_r(Config::get('database.connections.mysql'));
echo '<h1>Test Database Connection</h1>';
try {
$results = DB::select('SHOW DATABASES;');
echo '<strong style="background-color:green; padding:5px;">Connection confirmed</strong>';
echo "<br><br>Your Databases:<br><br>";
print_r($results);
}
catch (Exception $e) {
echo '<strong style="background-color:crimson; padding:5px;">Caught exception: ', $e->getMessage(), "</strong>\n";
}
echo '</pre>';
});

/* Index */
Route::get('/', 'IndexController@getIndex');

/* User (Explicit Routing) */
Route::get('/signup','UserController@getSignup' );
Route::get('/login', 'UserController@getLogin' );
Route::post('/signup', 'UserController@postSignup' ); 
Route::post('/login', 'UserController@postLogin' );
Route::get('/logout', 'UserController@getLogout' );

Route::get('/service', 'ServiceController@getIndex');

Route::get('/event', 'HeventController@getIndex');
Route::get('/event/add', 'HeventController@getCreate');
Route::post('/event/add', 'HeventController@postCreate');
Route::get('/event/edit/{id}', 'HeventController@getEdit');
Route::post('/event/edit/{id}', 'HeventController@postEdit');
Route::post('/event/delete', 'HeventController@postDelete');

#Route::get('/review', 'ServiceController@getIndex');

Route::get('/admin',
    array(
        'before' => 'isadmin', 
        function() {
            // render admin page
        }
    )
);