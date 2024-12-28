<!-- resources/views/customers/show.blade.php -->

@extends('layouts.app')

@section('title', 'Chi tiết khách hàng')

@section('content')
    <h1>Chi tiết khách hàng</h1>

    <table class="table">
        <tr>
            <th>Email</th>
            <td>{{ $customer->email }}</td>
        </tr>
        <tr>
            <th>Loại tài khoản</th>
            <td>{{ $customer->account_type }}</td>
        </tr>
        <tr>
            <th>Trạng thái</th>
            <td>{{ $customer->status }}</td>
        </tr>
        <tr>
            <th>Lần đăng nhập cuối</th>
            <td>{{ $customer->last_login }}</td>
        </tr>
    </table>

    <a href="{{ route('customers.index') }}" class="btn btn-secondary">Quay lại danh sách</a>
@endsection
