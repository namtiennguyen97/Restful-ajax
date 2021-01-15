<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    public $table='customers';
    public $fillable = [
      'name',
      'phone',
      'image',
      'department_id'
    ];

    public function departmentRelationship(){
        return $this->belongsTo(Department::class,'department_id','id','departments');
    }
}
