<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    //fetch all users
    // $users = DB::select("select * from users");

    // $users = DB::table('users')->find(2);

    // $users = User::where('id', 1)->first();

    $users = User::all();

    // $users = DB::table('users')->where('id', 1)->get();

    // $user = DB::table('users')->insert([
    //     'name' => 'Henrik',
    //     'email' => 'pepega@gmail.com',
    //     'password' => 'password',
    // ]);
    
    //create new user
    // $user = DB::insert('insert into users (name, email, password) values (?,?,?)', [
    //     'Pepega',
    //     'email@gmail.com',
    //     'mypassword',
    // ]);

    // update user
    // $user = DB::update("update users set email='abc@gmail.com' where id=1");

    // $user = DB::delete("delete from users where id=5");

    // $user = DB::table('users')->where('name', 'Henrik')->update(['email' => 'trihard@gmail.com']);

    // $user = DB::table('users')->where('id', 7)->delete();

    // $user = User::create([
    //     'name' => 'leon',
    //     'email' => 'ada@gmail.com',
    //     'password' => '12345678'
    // ]);

    // $user = User::where('id', 8)->first();
    // $user->update([
    //     'email' => 'leon@gmail.com'
    // ]);

    // $user = User::find(8);
    // $user->update([
    //     'email' => 'ada@gmail.com'
    // ]);

    // $user = User::find(8);
    // $user->delete();

    dd($users);
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
