<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'classes'; // Chỉ định tên bảng

    protected $fillable = [
        'class_code',
        'class_name',
        'major',
        'course',
        'total_students',
        'homeroom_teacher',
        'academic_year',
        'semester',
        'description',
        'status'
    ];

    // Relationship với students (nếu có)
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
