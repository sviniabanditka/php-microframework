<?php

namespace App\Http\Models;

use Foxdb\Model;

class User extends Model
{
  public const TABLE = 'users';

  protected $table = self::TABLE;
}