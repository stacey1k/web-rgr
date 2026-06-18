<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PurchaseRequest;
use Illuminate\Http\Request;

class PurchaseRequestController extends Controller
{
    public function index(Request $request)
    {
        $status = $request->get('status', 'all');
        $query = PurchaseRequest::with('car');
        if ($status !== 'all') {
            $query->where('status', $status);
        }
        $requests = $query->orderBy('created_at', 'desc')->paginate(15);
        return view('admin.purchase-requests.index', compact('requests', 'status'));
    }

    public function show($id)
    {
        $request = PurchaseRequest::with('car', 'user')->findOrFail($id);
        return view('admin.purchase-requests.show', compact('request'));
    }

    public function update(Request $request, $id)
    {
        $tdr = PurchaseRequest::findOrFail($id);
        $validated = $request->validate([
            'status' => 'required|in:new,processed',
        ]);
        $tdr->update(['status' => $validated['status']]);
        return redirect()->route('admin.purchase-requests.index')->with('success', 'Статус заявки обновлён');
    }
}