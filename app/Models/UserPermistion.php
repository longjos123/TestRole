<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserPermistion extends Model{
    use HasFactory;

    protected $table = 'user_permistion';

    protected $fillable = ['user_id', 'per_id', 'created_at', 'updated_at'];
}
