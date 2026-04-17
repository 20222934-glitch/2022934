@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')
<div class="bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-4">Chào mừng {{ Auth::user()->name }}</h2>

    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mt-6">
        <div class="border rounded-lg p-4">
            <h3 class="font-bold text-lg mb-2">Thông tin cá nhân</h3>
            <p><strong>Mã SV:</strong> {{ Auth::user()->student_id }}</p>
            <p><strong>Email:</strong> {{ Auth::user()->email }}</p>
            <p><strong>Điện thoại:</strong> {{ Auth::user()->phone ?? 'Chưa cập nhật' }}</p>
            <p><strong>Ngày sinh:</strong> {{ Auth::user()->birth_date ?? 'Chưa cập nhật' }}</p>
            <p><strong>Địa chỉ:</strong> {{ Auth::user()->address ?? 'Chưa cập nhật' }}</p>
        </div>

        <div class="border rounded-lg p-4">
            <h3 class="font-bold text-lg mb-2">Chức năng</h3>
            <ul class="space-y-2">
                <li>📚 Quản lý khóa học</li>
                <li>📝 Xem điểm số</li>
                <li>📅 Lịch học</li>
                <li>💰 Học phí</li>
            </ul>
        </div>
    </div>
</div>
@endsection