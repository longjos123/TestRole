<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\User\UserRepository;
use App\Service\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * @var UserRepository
     */
    protected $userRepo;

    /**
     * @var UserService
     */
    protected $userService;

    /**
     * @param UserRepository $userRepo
     */
    public function __construct(UserRepository $userRepo, UserService $userService)
    {
        $this->userRepo = $userRepo;
        $this->userService = $userService;
    }

    /**
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function index(Request $request)
    {
        $users = User::paginate(3);

        return view('admin.index', compact('users'));
    }

    public function postUser(Request $request)
    {
        $this->userService->create($request);

        return redirect(route('index'));
    }

    public function getSearchAjaxUser(Request $request)
    {
        if($request->get('query')){
            $query = $request->get('query');
            $users = $this->userRepo->search($query);

            return response()->json(['users' => $users], 200);
        }
    }
}
