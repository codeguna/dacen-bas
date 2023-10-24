<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\User;
use Illuminate\Support\Facades\Auth;

class GoogleController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

     public function redirectToGoogle()

     { 
         return Socialite::driver('google')->redirect(); 
     }
 
     /** 
      * Create a new controller instance. 
      * 
      * @return void 
      */
 
     public function handleGoogleCallback()
 
     {
 
         try {
             $user = Socialite::driver('google')->user();  
             $finduser = User::where('google_id', $user->id)->first(); 
             // only allow people with @company.com to login
            if (explode("@", $user->email)[1] !== 'lpkia.ac.id') {
                return redirect()->to('/');
            }
             if($finduser){
                 Auth::login($finduser); 
                 return redirect('/admin/scan-log/myattendances');
             }else{
 
                 $newUser = User::create([
                     'name' => $user->name,
                     'email' => $user->email,
                     'google_id'=> $user->id,
                     'password' => encrypt('lpkiajaya1984')
                 ]);
                 $newUser->assignRole('GUEST');
                 $newUser->givePermissionTo('view_profile');
                 $newUser->givePermissionTo('view_attendances');

                 Auth::login($newUser);
                 return redirect('/admin/scan-log/myattendances'); 
             }
         } catch (Exception $e) {
             dd($e->getMessage());
         }
 
     }
}