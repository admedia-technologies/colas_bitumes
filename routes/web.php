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
Route::get('/launch', function () {
    return view('pages.launch');
});
Route::get('/launch/login', function () {
    return view('pages.login');
});
Route::post('/process_login', function () {
    DB::insert('INSERT INTO access_levels(ac_level, title) 
                VALUES(:ac_level, :title)', [
                    'ac_level' => 1,
                    'title' => 'Utilisateur'
                ]);
    DB::insert('INSERT INTO access_levels(ac_level, title) 
                VALUES(:ac_level, :title)', [
                    'ac_level' => 2,
                    'title' => 'Employee'
                ]);
    DB::insert('INSERT INTO access_levels(ac_level, title) 
                VALUES(:ac_level, :title)', [
                    'ac_level' => 3,
                    'title' => 'Admin'
                ]);

    $arrayOfUsers = array(
        array(
        'firstname' => 'John',
        'lastname' => 'Doe',
        'username' => 'johndoe',
        'ac_level' => 1,
        'active' => 1,
        'log_user' => '1'
        ),
        array(
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'username' => 'janedoe',
            'ac_level' => 1,
            'active' => 1,
            'log_user' => '1'
        ),
    );
    /*foreach($arrayOfUsers as $user):
    DB::insert('INSERT INTO utilisateurs(firstname, lastname, username, ac_level, active, log_user) 
                VALUES(:firstname, :lastname, :username, :ac_level, :active, :log_user)', [
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'username' => $user['username'],
                    'ac_level' => $user['ac_level'],
                    'active' => $user['active'],
                    'log_user' => $user['log_user']
                ]);
    endforeach;*/
    $win_username = getenv("username");
    $users = DB::select('SELECT * FROM utilisateurs')[0];
    
    if($win_username==$users->username):
        //redirect('/dashboard');
        return view('pages.dashboard', ['users' => $users]);
    else:
        redirect('/login');
        //return view('pages.login');
    endif;

});
Route::get('/dashboard', function () {
    DB::insert('INSERT INTO access_levels(ac_level, title) 
                VALUES(:ac_level, :title)', [
                    'ac_level' => 1,
                    'title' => 'Utilisateur'
                ]);
    DB::insert('INSERT INTO access_levels(ac_level, title) 
                VALUES(:ac_level, :title)', [
                    'ac_level' => 2,
                    'title' => 'Employee'
                ]);
    DB::insert('INSERT INTO access_levels(ac_level, title) 
                VALUES(:ac_level, :title)', [
                    'ac_level' => 3,
                    'title' => 'Admin'
                ]);

    $arrayOfUsers = array(
        array(
        'firstname' => 'John',
        'lastname' => 'Doe',
        'username' => 'johndoe',
        'ac_level' => 1,
        'active' => 1,
        'log_user' => '1'
        ),
        array(
            'firstname' => 'Jane',
            'lastname' => 'Doe',
            'username' => 'janedoe',
            'ac_level' => 1,
            'active' => 1,
            'log_user' => '1'
        ),
    );
    /*foreach($arrayOfUsers as $user):
    DB::insert('INSERT INTO utilisateurs(firstname, lastname, username, ac_level, active, log_user) 
                VALUES(:firstname, :lastname, :username, :ac_level, :active, :log_user)', [
                    'firstname' => $user['firstname'],
                    'lastname' => $user['lastname'],
                    'username' => $user['username'],
                    'ac_level' => $user['ac_level'],
                    'active' => $user['active'],
                    'log_user' => $user['log_user']
                ]);
    endforeach;*/
    $win_username = getenv("username");
    $users = DB::select('SELECT * FROM utilisateurs')[0];
    
    if($win_username==$users->username):
        return view('pages.dashboard', ['users' => $users]);
    else:
        return view('pages.launch');
    endif;

});
