<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    // Список пользователей
    public function index()
    {
        $users = User::orderBy('id')->paginate(20);
        return view('admin.users.index', compact('users'));
    }

    // Обновление роли (назначить/снять админа)
    public function update(Request $request, User $user)
    {
        // Запрещаем изменять себя
        if ($user->id === auth()->id()) {
            return redirect()->back()->with('error', 'Вы не можете изменить свои права администратора.');
        }

        $request->validate([
            'is_admin' => 'required|boolean',
        ]);

        $user->is_admin = $request->boolean('is_admin');
        $user->save();

        $status = $user->is_admin ? 'назначен' : 'снят';
        return redirect()->route('admin.users.index')->with('success', "Пользователю {$user->name} статус администратора {$status}.");
    }
}