@extends('layouts.app')

@section('title', 'Chi tiết sinh viên')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Chi tiết sinh viên</h2>
        <a href="{{ route('students.index') }}" class="text-blue-500 hover:text-blue-700">≪ Quay lại</a>
    </div>

    <div class="space-y-4">
        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-600 font-semibold">Mã sinh viên:</label>
                <p class="text-gray-900">{{ $student->student_code }}</p>
            </div>
            <div>
                <label class="text-gray-600 font-semibold">Họ tên:</label>
                <p class="text-gray-900">{{ $student->full_name }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-600 font-semibold">Giới tính:</label>
                <p class="text-gray-900">{{ $student->gender ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-gray-600 font-semibold">Ngày sinh:</label>
                <p class="text-gray-900">{{ $student->birth_date ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-600 font-semibold">Email:</label>
                <p class="text-gray-900">{{ $student->email ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-gray-600 font-semibold">Điện thoại:</label>
                <p class="text-gray-900">{{ $student->phone ?? 'N/A' }}</p>
            </div>
        </div>

        <div class="grid grid-cols-2 gap-4">
            <div>
                <label class="text-gray-600 font-semibold">Địa chỉ:</label>
                <p class="text-gray-900">{{ $student->address ?? 'N/A' }}</p>
            </div>
            <div>
                <label class="text-gray-600 font-semibold">Ngành:</label>
                <p class="text-gray-900">{{ $student->major ?? 'N/A' }}</p>
            </div>
        </div>

        <div>
            <label class="text-gray-600 font-semibold">Trạng thái:</label>
            @if($student->status == 'active')
            <span class="bg-green-100 text-green-800 px-3 py-1 rounded">Đang học</span>
            @elseif($student->status == 'inactive')
            <span class="bg-yellow-100 text-yellow-800 px-3 py-1 rounded">Tạm dừng</span>
            @else
            <span class="bg-red-100 text-red-800 px-3 py-1 rounded">Tốt nghiệp</span>
            @endif
        </div>
    </div>

    <div class="flex gap-2 mt-6">
        <a href="{{ route('students.edit', $student->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded hover:bg-yellow-600">
            Sửa
        </a>
        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
            @csrf
            @method('DELETE')
            <button type="submit" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
                onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                Xóa
            </button>
        </form>
        <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
            Quay lại
        </a>
    </div>
</div>
@endsection
