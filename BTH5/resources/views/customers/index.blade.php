@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Danh sách khách hàng</h1>

    
    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Loại tài khoản</th>
                <th>Trạng thái</th>
                <th>Lần đăng nhập cuối</th>
                <th>Hành động</th>
            </tr>
        </thead>
        <tbody>
            @forelse($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->email }}</td>
                    <td>{{ ucfirst($customer->account_type) }}</td>
                    <td>{{ ucfirst($customer->status) }}</td>
                    <td>{{ $customer->last_login }}</td>
                    <td>
                        <a href="{{ route('customers.show', $customer->id) }}" class="btn btn-info btn-sm">Xem</a>
                        <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-warning btn-sm">Sửa</a>
                        <form action="{{ route('customers.destroy', $customer->id) }}" method="POST" style="display:inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Bạn có chắc muốn xóa?')">Xóa</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="6" class="text-center">Không có khách hàng nào.</td>
                </tr>
            @endforelse
        </tbody>
    </table>

    <!-- Phân trang -->
    <div class="d-flex justify-content-center mt-4">
        <nav aria-label="Pagination">
            <ul class="pagination">
                <!-- Nút trước -->
                <li class="page-item {{ $customers->onFirstPage() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $customers->previousPageUrl() }}" tabindex="-1">Trước</a>
                </li>

                <!-- Các nút số trang -->
                @foreach(range(1, $customers->lastPage()) as $i)
                    @if($i >= $customers->currentPage() - 1 && $i <= $customers->currentPage() + 1)
                        <li class="page-item {{ $i == $customers->currentPage() ? 'active' : '' }}">
                            <a class="page-link" href="{{ $customers->url($i) }}">{{ $i }}</a>
                        </li>
                    @elseif($i == 1 || $i == $customers->lastPage())
                        <li class="page-item">
                            <a class="page-link" href="{{ $customers->url($i) }}">{{ $i }}</a>
                        </li>
                    @elseif($i == $customers->currentPage() - 2 || $i == $customers->currentPage() + 2)
                        <li class="page-item disabled"><span class="page-link">...</span></li>
                    @endif
                @endforeach

                <!-- Nút sau -->
                <li class="page-item {{ !$customers->hasMorePages() ? 'disabled' : '' }}">
                    <a class="page-link" href="{{ $customers->nextPageUrl() }}">Sau</a>
                </li>
            </ul>
        </nav>
    </div>
</div>
@endsection
