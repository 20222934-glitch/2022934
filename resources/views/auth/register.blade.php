@extends('layouts.app')

@section('title', 'Đăng ký')

@section('content')
<div class="max-w-md mx-auto bg-white rounded-lg shadow-md p-8">
    <h2 class="text-2xl font-bold mb-6 text-center">Đăng ký tài khoản</h2>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Họ tên *</label>
            <input type="text" name="name" value="{{ old('name') }}" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Mã sinh viên *</label>
            <input type="text" name="student_id" value="{{ old('student_id') }}" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Email *</label>
            <input type="email" name="email" value="{{ old('email') }}" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Số điện thoại</label>
            <input type="text" name="phone" value="{{ old('phone') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Ngày sinh</label>
            <input type="date" name="birth_date" value="{{ old('birth_date') }}"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Địa chỉ</label>
            <textarea name="address" rows="2"
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">{{ old('address') }}</textarea>
        </div>

        <div class="mb-4">
            <label class="block text-gray-700 text-sm font-bold mb-2">Mật khẩu *</label>
            <input type="password" name="password" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <div class="mb-6">
            <label class="block text-gray-700 text-sm font-bold mb-2">Xác nhận mật khẩu *</label>
            <input type="password" name="password_confirmation" required
                class="w-full px-3 py-2 border rounded-lg focus:outline-none focus:border-blue-500">
        </div>

        <button type="submit" class="w-full bg-blue-500 text-white font-bold py-2 px-4 rounded-lg hover:bg-blue-600">
            Đăng ký
        </button>

        <p class="mt-4 text-center text-sm">
            Đã có tài khoản?
            <a href="{{ route('login') }}" class="text-blue-500 hover:text-blue-700">Đăng nhập</a>
        </p>
    </form>
</div>
@endsection