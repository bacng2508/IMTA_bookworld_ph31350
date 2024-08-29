<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\Admin\User\StoreUserRequest;
use App\Http\Requests\Admin\User\UpdateUserRequest;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->paginate(10);
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(StoreUserRequest $request)
    {
        $data = $request->validated();
        $data['avatar'] = 'upload/user/avatar/default-avatar.png';
        User::create($data);

        return redirect()->route('admin.users.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Thêm khách hàng thành công');
    }

    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    public function update(User $user, UpdateUserRequest $request)
    {
        $data = $request->validated();
        $user->update($data);

        return back()
            ->with('msg_type', 'success')
            ->with('msg', 'Cập nhật khách hàng thành công');
    }

    public function destroy(User $user)
    {
        if ($user->avatar != 'upload/user/avatar/default-avatar.png') {
            Storage::disk('public')->delete($user->avatar);
        }
        $user->delete();
        return redirect()->route('admin.users.index')
            ->with('msg_type', 'success')
            ->with('msg', 'Xóa khách hàng thành công');
    }
}
