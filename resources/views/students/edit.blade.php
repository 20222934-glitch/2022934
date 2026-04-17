@extends('layouts.app')

@section('title', 'Sửa sinh viên')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <h2 class="text-2xl font-bold mb-6">Sửa thông tin sinh viên</h2>

    <form method="POST" action="{{ route('students.update', $student->id) }}">
        @csrf
        @method('PUT')

        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <div>
                <label class="block text-gray-700 font-bold mb-2">Mã sinh viên *</label>
                <input type="text" name="student_code" value="{{ old('student_code', $student->student_code) }}"
                    required class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500" readonly>
                @error('student_code')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Họ tên *</label>
                <input type="text" name="full_name" value="{{ old('full_name', $student->full_name) }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('full_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Email *</label>
                <input type="email" name="email" value="{{ old('email', $student->email) }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('email')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Số điện thoại</label>
                <input type="text" name="phone" value="{{ old('phone', $student->phone) }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Ngày sinh *</label>
                <input type="date" name="birth_date" value="{{ old('birth_date', $student->birth_date) }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('birth_date')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Giới tính *</label>
                <select name="gender" required class="w-full px-3 py-2 border rounded">
                    <option value="Nam" {{ old('gender', $student->gender) == 'Nam' ? 'selected' : '' }}>Nam</option>
                    <option value="Nữ" {{ old('gender', $student->gender) == 'Nữ' ? 'selected' : '' }}>Nữ</option>
                </select>
                @error('gender')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Địa chỉ *</label>
                <input type="text" name="address" value="{{ old('address', $student->address) }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('address')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Lớp *</label>
                <input type="text" name="class_name" value="{{ old('class_name', $student->class_name) }}" required
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('class_name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Ngành học *</label>
                <select name="major" required class="w-full px-3 py-2 border rounded">
                    <option value="Công nghệ thông tin"
                        {{ old('major', $student->major) == 'Công nghệ thông tin' ? 'selected' : '' }}>Công nghệ thông
                        tin</option>
                    <option value="Kỹ thuật phần mềm"
                        {{ old('major', $student->major) == 'Kỹ thuật phần mềm' ? 'selected' : '' }}>Kỹ thuật phần mềm
                    </option>
                    <option value="Hệ thống thông tin"
                        {{ old('major', $student->major) == 'Hệ thống thông tin' ? 'selected' : '' }}>Hệ thống thông tin
                    </option>
                </select>
                @error('major')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">GPA</label>
                <input type="number" step="0.01" name="gpa" value="{{ old('gpa', $student->gpa) }}"
                    class="w-full px-3 py-2 border rounded focus:outline-none focus:border-blue-500">
                @error('gpa')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div>
                <label class="block text-gray-700 font-bold mb-2">Trạng thái *</label>
                <select name="status" required class="w-full px-3 py-2 border rounded">
                    <option value="active" {{ old('status', $student->status) == 'active' ? 'selected' : '' }}>Đang học
                    </option>
                    <option value="inactive" {{ old('status', $student->status) == 'inactive' ? 'selected' : '' }}>Tạm
                        dừng</option>
                    <option value="graduated" {{ old('status', $student->status) == 'graduated' ? 'selected' : '' }}>Đã
                        tốt nghiệp</option>
                </select>
                @error('status')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <div class="mt-6 flex justify-end">
            <a href="{{ route('students.index') }}"
                class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 mr-2">
                Hủy
            </a>
            <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
                Cập nhật
            </button>
        </div>
    </form>
</div>
@endsection