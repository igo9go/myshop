<?php

namespace App\Model\Account;


use Illuminate\Database\Eloquent\Model;

use Zizaco\Entrust\Traits\EntrustUserTrait;

class User extends Model
{
    //
    use EntrustUserTrait; // add this trait to your user model

}
