<?php

namespace escuelaempresa;

use Illuminate\Database\Eloquent\Model;

class study extends Model
{
	protected $table = 'studies';
	
	protected $fillable = ['id_student', 'id_grade'];

	public function student(){
		return $this->belongsTo(student::class, 'id_student');
	}

	public function grade(){
		return $this->belongsTo(grade::class, 'id_grade');
	}

}
