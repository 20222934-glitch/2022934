@extends('layouts.app')

@section('title', 'Thêm lớp học')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Thêm lớp học mới</h2>

    <form method="POST" action="{{ route('classes.store') }}">
        @csrf

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Mã lớp *</label>
                <input type="text" name="class_code" value="{{ old('class_code') }}" required
                    placeholder="VD: CNTT62-01"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('class_code')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Tên lớp *</label>
                <input type="text" name="class_name" value="{{ old('class_name') }}" required
                    placeholder="VD: Công nghệ thông tin K62"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('class_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Ngành học *</label>
                <select name="major" required class="w-full px-3 py-2 border rounded">
                    <option value="">Chọn ngành</option>
                    <option value="Công nghệ thông tin" {{ old('major') == 'Công nghệ thông tin' ? 'selected' : '' }}>
                        Công nghệ thông tin</option>
                    <option value="Kỹ thuật phần mềm" {{ old('major') == 'Kỹ thuật phần mềm' ? 'selected' : '' }}>Kỹ
                        thuật phần mềm</option>
                    <option value="Hệ thống thông tin" {{ old('major') == 'Hệ thống thông tin' ? 'selected' : '' }}>Hệ
                        thống thông tin</option>
                </select>
                @error('major')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Khóa học *</label>
                <select name="course" required class="w-full px-3 py-2 border rounded">
                    <option value="">Chọn khóa</option>
                    <option value="K62" {{ old('course') == 'K62' ? 'selected' : '' }}>K62</option>
                    <option value="K63" {{ old('course') == 'K63' ? 'selected' : '' }}>K63</option>
                    <option value="K64" {{ old('course') == 'K64' ? 'selected' : '' }}>K64</option>
                </select>
                @error('course')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Giáo viên chủ nhiệm *</label>
                <input type="text" name="homeroom_teacher" value="{{ old('homeroom_teacher') }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('homeroom_teacher')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Năm học *</label>
                <input type="number" name="academic_year" value="{{ old('academic_year', date('Y')) }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('academic_year')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Học kỳ *</label>
                <select name="semester" required class="w-full px-3 py-2 border rounded">
                    <option value="1" {{ old('semester') == '1' ? 'selected' : '' }}>Học kỳ 1</option>
                    <option value="2" {{ old('semester') == '2' ? 'selected' : '' }}>Học kỳ 2</option>
                    <option value="3" {{ old('semester') == '3' ? 'selected' : '' }}>Học kỳ 3</option>
                </select>
                @error('semester')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Sĩ số</label>
                <input type="number" name="total_students" value="{{ old('total_students', 0) }}" min="0"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('total_students')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="col-span-2">
                <label class="block text-gray-700 font-bold mb-2">Mô tả</label>
                <textarea name="description" rows="3"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">{{ old('description') }}</textarea>
                @error('description')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Trạng thái *</label>
                <select name="status" required class="w-full px-3 py-2 border rounded">
                    <option value="active" {{ old('status') == 'active' ? 'selected' : '' }}>Đang hoạt động</option>
                    <option value="inactive" {{ old('status') == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động
                    </option>
                </select>
                @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('classes.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                Hủy
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Lưu lớp học
            </button>
        </div>
    </form>
</div>
@endsection