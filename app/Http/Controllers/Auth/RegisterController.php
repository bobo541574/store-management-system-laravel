<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\DB;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'profile' => ['required', 'mimes:jpeg,png,jpg,svg'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'phone' => ['required', 'numeric'],
            'state' => ['required', 'min:1'],
            'city' => ['required', 'min:1'],
            'township' => ['required', 'min:1'],
            'address' => ['required', 'string'],
            // 'parmenent_state' => ['required', 'min:1'],
            // 'parmenent_city' => ['required', 'min:1'],
            // 'parmenent_township' => ['required', 'min:1'],
            // 'parmenent_address' => ['required', 'string'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        /* Profile Upload */
        $image = $data['profile'];
        $upolad_path = public_path() . '/img/user/';
        $profile = $image->getClientOriginalName();

        file_exists($upolad_path . $profile) ? false : $image->move($upolad_path, $profile);

        /* User ID */
        $user = User::count();
        if ($user < 9 && $user > 0) {
            $uid = "UID0000" . ($user + 1);
        } elseif ($user < 99) {
            $uid = "UID000" . ($user + 1);
        } elseif ($user < 999) {
            $uid = "UID00" . ($user + 1);
        } elseif ($user < 9999) {
            $uid = "UID0" . ($user + 1);
        } elseif ($user >= 9999) {
            $uid = "UID" . ($user + 1);
        } else {
            $uid = "UID00001";
        }

        DB::beginTransaction();

        try {
            $user = User::create([
                'uid' => $uid,
                'name' => $data['name'],
                'email' => $data['email'],
                'profile' => $profile,
                'password' => Hash::make($data['password']),
            ]);

            $user->contacts()->create([
                'phone' => $data['phone'],
                'address' => $data['address'],
                'township_id' => $data['township'],
                'city_id' => $data['city'],
                'state_id' => $data['state'],
                'email' => 'sample9@gmail.com',
            ]);

            if ($data['parmenent_state']) {
                $user->contacts()->create([
                    'phone' => $data['parmenent_phone'] ? $data['parmenent_phone'] : $data['phone'],
                    'address' => $data['parmenent_address'],
                    'township_id' => $data['parmenent_township'],
                    'city_id' => $data['parmenent_city'],
                    'state_id' => $data['parmenent_state'],
                ]);
            }
            DB::commit();

            return $user;
        } catch (\Exception $e) {
            DB::rollBack();

            throw $e;
        }
    }
}