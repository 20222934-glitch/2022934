@extends('layouts.app')

@section('title', 'Danh sách lớp học')

@section('content')
<div class="bg-white rounded-lg shadow-md p-6">
    <div class="flex justify-between items-center mb-6">
        <h2 class="text-2xl font-bold">Quản lý lớp học</h2>
        <a href="{{ route('classes.create') }}" class="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600">
            + Thêm lớp học
        </a>
    </div>

    <!-- Form tìm kiếm và lọc -->
    <form method="GET" class="mb-6 grid grid-cols-1 md:grid-cols-5 gap-4">
        <input type="text" name="search" placeholder="Tìm kiếm..." value="{{ request('search') }}"
            class="px-3 py-2 border rounded focus:outline-none focus:border-blue-500">

        <select name="course" class="px-3 py-2 border rounded">
            <option value="">Tất cả khóa</option>
            <option value="K62" {{ request('course') == 'K62' ? 'selected' : '' }}>Khóa K62</option>
            <option value="K63" {{ request('course') == 'K63' ? 'selected' : '' }}>Khóa K63</option>
            <option value="K64" {{ request('course') == 'K64' ? 'selected' : '' }}>Khóa K64</option>
        </select>

        <select name="semester" class="px-3 py-2 border rounded">
            <option value="">Tất cả học kỳ</option>
            <option value="1" {{ request('semester') == '1' ? 'selected' : '' }}>Học kỳ 1</option>
            <option value="2" {{ request('semester') == '2' ? 'selected' : '' }}>Học kỳ 2</option>
            <option value="3" {{ request('semester') == '3' ? 'selected' : '' }}>Học kỳ 3</option>
        </select>

        <select name="status" class="px-3 py-2 border rounded">
            <option value="">Tất cả trạng thái</option>
            <option value="active" {{ request('status') == 'active' ? 'selected' : '' }}>Đang hoạt động</option>
            <option value="inactive" {{ request('status') == 'inactive' ? 'selected' : '' }}>Ngừng hoạt động</option>
        </select>

        <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600">
            Tìm kiếm
        </button>
    </form>

    <!-- Bảng danh sách lớp học -->
    <div class="overflow-x-auto">
        <table class="min-w-full bg-white border">
            <thead>
                <tr class="bg-gray-100">
                    <th class="px-4 py-2 border">Mã lớp</th>
                    <th class="px-4 py-2 border">Tên lớp</th>
                    <th class="px-4 py-2 border">Ngành</th>
                    <th class="px-4 py-2 border">Khóa</th>
                    <th class="px-4 py-2 border">GVCN</th>
                    <th class="px-4 py-2 border">Sĩ số</th>
                    <th class="px-4 py-2 border">Học kỳ</th>
                    <th class="px-4 py-2 border">Trạng thái</th>
                    <th class="px-4 py-2 border">Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @forelse($classes as $class)
                <tr class="hover:bg-gray-50">
                    <td class="px-4 py-2 border text-center">{{ $class->class_code }}</td>
                    <td class="px-4 py-2 border">{{ $class->class_name }}</td>
                    <td class="px-4 py-2 border">{{ $class->major }}</td>
                    <td class="px-4 py-2 border text-center">{{ $class->course }}</td>
                    <td class="px-4 py-2 border">{{ $class->homeroom_teacher }}</td>
                    <td class="px-4 py-2 border text-center">
                        <span class="font-semibold text-blue-600">{{ $class->total_students }}</span>
                    </td>
                    <td class="px-4 py-2 border text-center">HK{{ $class->semester }}</td>
                    <td class="px-4 py-2 border text-center">
                        @if($class->status == 'active')
                        <span class="bg-green-100 text-green-800 px-2 py-1 rounded text-sm">Hoạt động</span>
                        @else
                        <span class="bg-red-100 text-red-800 px-2 py-1 rounded text-sm">Ngừng</span>
                        @endif
                    </td>
                    <td class="px-4 py-2 border text-center">
                        <a href="{{ route('classes.show', $class->id) }}"
                            class="text-blue-500 hover:text-blue-700 mr-2">Xem</a>
                        <a href="{{ route('classes.edit', $class->id) }}"
                            class="text-yellow-500 hover:text-yellow-700 mr-2">Sửa</a>
                        <form action="{{ route('classes.destroy', $class->id) }}" method="POST" class="inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="text-red-500 hover:text-red-700"
                                onclick="return confirm('Bạn có chắc muốn xóa lớp này?')">
                                Xóa
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="9" class="px-4 py-2 text-center text-gray-500">
                        Không có dữ liệu lớp học
                    </td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Phân trang -->
    <div class="mt-4">
        {{ $classes->links() }}
    </div>
</div>
@endsection