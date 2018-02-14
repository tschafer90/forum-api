<?php

namespace App\Models;

use App\Filters\Filterable;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    use Filterable;
}