<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    // Chỉ định rõ tên bảng
    protected $table = 'classes';

    // Hoặc dùng $guarded để bảo vệ
    protected $guarded = ['id'];

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

    // Relationship với students
    public function students()
    {
        return $this->hasMany(Student::class, 'class_id');
    }
}
