<?php
namespace App\Service;

use App\Repositories\User\UserRepository;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class UserService
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepo = $userRepository;
    }

    /**
     * @param $request
     * @return void
     */
    public function create($request)
    {
        $user = [
            'fullname' => $request->fullname,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'address' => $request->address,
            'gender' => $request->gender,
            'birthdate' => $request->birthdate,
            'remember_token' => Str::random(10),
        ];
        $avatar = $request->file('avatar');
        $storedPath = $avatar->move('avatars', $avatar->getClientOriginalName());

        $user['avatar'] = $storedPath;

        $this->userRepo->create($user);
    }
}
