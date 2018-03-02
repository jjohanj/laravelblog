<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model
{


use Zizaco\Entrust\EntrustPermission;

class Permission extends EntrustPermission
{

}
