<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TestDriveRequest;
use Illuminate\Http\Request;

class TestDriveRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $query = TestDriveRequest::with('car');
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        $requests = $query->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.test-drive-requests.index', compact('requests', 'status'));
    }

    public function show($id)
    {
        $request = TestDriveRequest::with('car', 'user')->findOrFail($id);
        return view('admin.test-drive-requests.show', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $tdr = TestDriveRequest::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:new,processed,confirmed',
        ]);
        $tdr->update(['status' => $validated['status']]);
        return redirect()->route('admin.test-drive-requests.index')->with('success', 'Статус заявки обновлён');
    }
}