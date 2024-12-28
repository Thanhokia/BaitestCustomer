<?php

namespace App\Http\Controllers;
use App\Models\Customer;
use Illuminate\Http\Request;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $customers = Customer::select('id', 'email', 'account_type', 'status', 'last_login')
        ->paginate(10); // 10 bản ghi mỗi trang

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('customers.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'email' => 'required|email|unique:customers',
            'password' => 'required|min:6',
            'account_type' => 'required|in:basic,premium,enterprise',
            'status' => 'required|in:active,inactive,banned',
        ]);

        Customer::create([
            'email' => $validated['email'],
            'password' => bcrypt($validated['password']), // Mã hóa mật khẩu
            'account_type' => $validated['account_type'],
            'status' => $validated['status'],
            'last_login' => now(),
        ]);

        return redirect()->route('customers.index')->with('success', 'Khách hàng mới đã được thêm thành công.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.show', compact('customer'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $customer = Customer::findOrFail($id);
        return view('customers.edit', compact('customer'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $customer = Customer::findOrFail($id);

        $validated = $request->validate([
            'email' => 'required|email|unique:customers,email,' . $customer->id,
            'password' => 'nullable|min:6',
            'account_type' => 'required|in:basic,premium,enterprise',
            'status' => 'required|in:active,inactive,banned',
        ]);

        $customer->update([
            'email' => $validated['email'],
            'password' => $validated['password'] ? bcrypt($validated['password']) : $customer->password,
            'account_type' => $validated['account_type'],
            'status' => $validated['status'],
        ]);

        return redirect()->route('customers.index')->with('success', 'Thông tin khách hàng đã được cập nhật.');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $customer = Customer::findOrFail($id);
        $customer->delete();

        return redirect()->route('customers.index')->with('success', 'Khách hàng đã được xóa.');
    }
}
