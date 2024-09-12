<?php

namespace App\Http\Controllers;

use App\Models\Log;
use Illuminate\Http\Request;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use App\User;
use Illuminate\Support\Facades\Auth;
use Jenssegers\Agent\Facades\Agent;

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
            if (explode("@", $user->email)[1] !== 'lpkia.ac.id' && explode("@", $user->email)[1] !== 'fellow.lpkia.ac.id') {
                return redirect()->to('/')->with('error', 'Gunakan akun email @lpkia.ac.id untuk akses ke Sistem Hera');
            }
            if ($finduser) {
                Auth::login($finduser);
                //logs
                $browser = Agent::browser();
                $platform = Agent::platform();
                $userIP = request()->ip();

                $logs = Log::create([
                    'user_id'       => Auth::User()->id,
                    'browser'       => $browser,
                    'os'            => $platform,
                    'ip'            => $userIP,
                    'created_at'    => now()
                ]);
                //end logs
                return redirect('/admin/scan-log/myattendances');
            } else {

                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => encrypt('lpkiajaya1984')
                ]);
                $newUser->assignRole('GUEST');
                $newUser->givePermissionTo('view_profile');
                $newUser->givePermissionTo('view_attendances');

                Auth::login($newUser);
                //logs
                $browser = Agent::browser();
                $platform = Agent::platform();
                $userIP = request()->ip();

                $logs = Log::create([
                    'user_id'       => Auth::User()->id,
                    'browser'       => $browser,
                    'os'            => $platform,
                    'ip'            => $userIP,
                    'created_at'    => now()
                ]);
                //end logs
                return redirect('/admin/scan-log/myattendances');
            }
        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
}
