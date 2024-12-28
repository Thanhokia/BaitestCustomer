<!-- resources/views/customers/edit.blade.php -->

@extends('layouts.app')

@section('title', 'Sửa khách hàng')

@section('content')
    <h1>Sửa thông tin khách hàng</h1>

    <form action="{{ route('customers.update', $customer->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ $customer->email }}" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>

        <div class="form-group">
            <label for="account_type">Loại tài khoản</label>
            <select class="form-control" id="account_type" name="account_type" required>
                <option value="basic" {{ $customer->account_type == 'basic' ? 'selected' : '' }}>Cơ bản</option>
                <option value="premium" {{ $customer->account_type == 'premium' ? 'selected' : '' }}>Premium</option>
                <option value="enterprise" {{ $customer->account_type == 'enterprise' ? 'selected' : '' }}>Doanh nghiệp</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active" {{ $customer->status == 'active' ? 'selected' : '' }}>Kích hoạt</option>
                <option value="inactive" {{ $customer->status == 'inactive' ? 'selected' : '' }}>Không kích hoạt</option>
                <option value="banned" {{ $customer->status == 'banned' ? 'selected' : '' }}>Bị cấm</option>
            </select>
        </div>

        <button type="submit" class="btn btn-warning">Cập nhật khách hàng</button>
    </form>
@endsection
