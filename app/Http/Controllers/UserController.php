<?php

namespace App\Http\Controllers;

use App\Http\Requests\AddUserFormRequest;
use App\Models\User;
use App\Repositories\User\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @param UserRepository $userRepo
     */
    public function __construct(UserRepository $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
//        $pagesizes = 3;
//        $searchData = $request->except('page');

        $users = $this->userRepo->getAll()->paginate(3);
//        $users = $usersQuery->paginate($pagesizes)->appends($searchData);

        return view('admin.index', compact('users'));
    }

    public function postUser(AddUserFormRequest $request)
    {

    }
}
