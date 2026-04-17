@extends('layouts.app')

@section('title', 'Danh sách sinh viên')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Quản lý sinh viên</h2>
        <a href="{{ route('students.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            + Thêm sinh viên
        </a>
    </div>

    <!-- Form tìm kiếm và lọc -->
    <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">
        <input type="text" name="search" placeholder="Tìm kiếm..." value="{{ request('search') }}"
            class="px-3 py-2 border rounded focus:outline-none focus:border-blue-500">

        <select name="class_id" class="px-3 py-2 border rounded">
            <option value="">Tất cả lớp</option>
        </select>

        <select name="major" class="px-3 py-2 border rounded">
            <option value="">Tất cả ngành</option>
        </select>

        <select name="status" class="px-3 py-2 border rounded">
            <option value="">Tất cả trạng thái</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Đang học</option>
            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Đã tốt nghiệp</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tìm kiếm
        </button>
    </form>

    <!-- Bảng danh sách sinh viên -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Mã SV</th>
                    <th class="px-4 py-2 border">Họ tên</th>
                    <th class="px-4 py-2 border">Giới tính</th>
                    <th class="px-4 py-2 border">Ngày sinh</th>
                    <th class="px-4 py-2 border">Email</th>
                    <th class="px-4 py-2 border">Điện thoại</th>
                    <th class="px-4 py-2 border">Ngành</th>
                    <th class="px-4 py-2 border">Trạng thái</th>
                    <th class="px-4 py-2 border">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($students as $student)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $student->student_code }}</td>
                    <td class="px-4 py-2 border">{{ $student->full_name }}</td>
                    <td class="px-4 py-2 border text-center">{{ $student->gender ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border text-center">{{ $student->birth_date ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $student->email ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $student->phone ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border">{{ $student->major ?? 'N/A' }}</td>
                    <td class="px-4 py-2 border text-center">
                        @if($student->status == 'active')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">Đang học</span>
                        @else
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm">Tốt nghiệp</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('students.show', $student->id) }}"
                            class="text-blue-500 hover:text-blue-700 mr-2">Xem</a>
                        <a href="{{ route('students.edit', $student->id) }}"
                            class="text-yellow-500 hover:text-yellow-700 mr-2">Sửa</a>
                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700"
                                onclick="return confirm('Bạn có chắc muốn xóa sinh viên này?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-2 text-center text-gray-500">
                        Không có dữ liệu sinh viên
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="mt-6">
        {{ $students->links() }}
    </div>
</div>
@endsection
