<!-- resources/views/customers/create.blade.php -->

@extends('layouts.app')

@section('title', 'Thêm khách hàng mới')

@section('content')
    <h1>Thêm khách hàng mới</h1>

    <form action="{{ route('customers.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="password">Mật khẩu</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>

        <div class="form-group">
            <label for="account_type">Loại tài khoản</label>
            <select class="form-control" id="account_type" name="account_type" required>
                <option value="basic">Cơ bản</option>
                <option value="premium">Premium</option>
                <option value="enterprise">Doanh nghiệp</option>
            </select>
        </div>

        <div class="form-group">
            <label for="status">Trạng thái</label>
            <select class="form-control" id="status" name="status" required>
                <option value="active">Kích hoạt</option>
                <option value="inactive">Không kích hoạt</option>
                <option value="banned">Bị cấm</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Thêm khách hàng</button>
    </form>
@endsection
