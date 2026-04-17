<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    // Khai báo các field được phép gán dữ liệu hàng loạt
    protected $fillable = [
        'student_code',
        'full_name',
        'email',
        'phone',
        'birth_date',
        'gender',
        'address',
        'class_name',
        'major',
        'gpa',
        'status'
    ];

    // Hoặc dùng $guarded để bảo vệ (ngược lại)
    // protected $guarded = ['id'];
}
