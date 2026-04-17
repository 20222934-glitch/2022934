@extends('layouts.app')

@section('title', 'Chi tiết lớp học')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Chi tiết lớp học</h2>
        <div>
            <a href="{{ route('classes.edit', $class->id) }}"
                class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600 mr-2">
                Sửa
            </a>
            <a href="{{ route('classes.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Quay lại
            </a>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
        <div class="border rounded-lg p-4">
            <h3 class="font-bold text-lg mb-4 text-blue-600">Thông tin cơ bản</h3>
            <p><strong>Mã lớp:</strong> {{ $class->class_code }}</p>
            <p><strong>Tên lớp:</strong> {{ $class->class_name }}</p>
            <p><strong>Ngành học:</strong> {{ $class->major }}</p>
            <p><strong>Khóa học:</strong> {{ $class->course }}</p>
            <p><strong>Giáo viên chủ nhiệm:</strong> {{ $class->homeroom_teacher }}</p>
            <p><strong>Năm học:</strong> {{ $class->academic_year }}</p>
            <p><strong>Học kỳ:</strong> Học kỳ {{ $class->semester }}</p>
        </div>

        <div class="border rounded-lg p-4">
            <h3 class="font-bold text-lg mb-4 text-blue-600">Thông tin khác</h3>
            <p><strong>Sĩ số:</strong>
                <span class="font-bold text-blue-600">{{ $class->total_students }}</span>
            </p>
            <p><strong>Trạng thái:</strong>
                @if($class->status == 'active')
                <span class="bg-green-100 text-green-800 px-2 py-1 rounded">Đang hoạt động</span>
                @else
                <span class="bg-red-100 text-red-800 px-2 py-1 rounded">Ngừng hoạt động</span>
                @endif
            </p>
            <p><strong>Mô tả:</strong> {{ $class->description ?? 'Chưa có mô tả' }}</p>
            <p><strong>Ngày tạo:</strong> {{ $class->created_at->format('d/m/Y H:i') }}</p>
            <p><strong>Cập nhật lần cuối:</strong> {{ $class->updated_at->format('d/m/Y H:i') }}</p>
        </div>
    </div>

    @if($class->students && $class->students->count() > 0)
    <div class="mt-6">
        <h3 class="font-bold text-lg mb-4 text-blue-600">Danh sách sinh viên trong lớp</h3>
        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border">
                <thead>
                    <tr class="bg-gray-100">
                        <th class="px-4 py-2 border">Mã SV</th>
                        <th class="px-4 py-2 border">Họ tên</th>
                        <th class="px-4 py-2 border">Email</th>
                        <th class="px-4 py-2 border">Điện thoại</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($class->students as $student)
                    <tr>
                        <td class="px-4 py-2 border">{{ $student->student_code }}</td>
                        <td class="px-4 py-2 border">{{ $student->full_name }}</td>
                        <td class="px-4 py-2 border">{{ $student->email }}</td>
                        <td class="px-4 py-2 border">{{ $student->phone }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    @endif
</div>
@endsection