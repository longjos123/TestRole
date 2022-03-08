<?php
namespace App\Repositories\User;

use App\Repositories\BaseRepository;
use Illuminate\Support\Facades\DB;

use App\Repositories\User\UserRepositoryInterface;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{
    public function getModel()
    {
        return \App\Models\User::class;
    }

    public function getUser()
    {
        return $this->model->take(3)->get();
    }

    public function search($value)
    {
        return $this->model->where('fullname', 'LIKE', "%{$value}%")
                           ->where('username', 'LIKE', "%{$value}%")
                           ->get();
    }
}
