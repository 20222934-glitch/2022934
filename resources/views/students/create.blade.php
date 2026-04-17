@extends('layouts.app')

@section('title', 'Thêm sinh viên mới')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6 max-w-2xl mx-auto">
    <h2 class="text-2xl font-bold mb-6">Thêm sinh viên mới</h2>

    @if ($errors->any())
    <div class="bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded mb-4">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <form action="{{ route('students.store') }}" method="POST">
        @csrf
        
        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Mã sinh viên</label>
            <input type="text" name="student_code" value="{{ old('student_code') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"
                required>
            @error('student_code')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Họ tên</label>
            <input type="text" name="full_name" value="{{ old('full_name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"
                required>
            @error('full_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Giới tính</label>
            <select name="gender"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                <option value="">Chọn giới tính</option>
                <option value="Nam" {{ old('gender') == 'Nam' ? 'selected' : '' }}>Nam</option>
                <option value="Nữ" {{ old('gender') == 'Nữ' ? 'selected' : '' }}>Nữ</option>
            </select>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Ngày sinh</label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"
                required>
            @error('birth_date')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Email</label>
            <input type="email" name="email" value="{{ old('email') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            @error('email')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Địa chỉ</label>
            <input type="text" name="address" value="{{ old('address') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Lớp/Khóa</label>
            <input type="text" name="class_name" value="{{ old('class_name') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"
                required>
            @error('class_name')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Ngành</label>
            <input type="text" name="major" value="{{ old('major') }}"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"
                required>
            @error('major')
            <span class="text-red-500 text-sm">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 font-bold mb-2">Trạng thái</label>
            <select name="status"
                class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500"
                required>
                <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Đang học</option>
                <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Tạm dừng</option>
                <option value="graduated" {{ old('status') == 'graduated' ? 'selected' : '' }}>Tốt nghiệp</option>
            </select>
        </div>

        <div class="flex gap-2">
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Lưu
            </button>
            <a href="{{ route('students.index') }}" class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600">
                Hủy
            </a>
        </div>
    </form>
</div>
@endsection
