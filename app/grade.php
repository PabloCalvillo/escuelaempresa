<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class grade extends Model
{
    protected $table = "grades";

    protected $fillable = ['name', 'level'];
}
