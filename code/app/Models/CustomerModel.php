<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\MyModel;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class CustomerModel extends Authenticatable
{
     protected $table = 'customer';
}
