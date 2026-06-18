<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Page;
use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index()
    {
        $pages = Page::orderBy('sort_order')->get();
        return view('admin.pages.index', compact('pages'));
    }

    public function create()
    {
        return view('admin.pages.form', ['page' => null]);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'slug' => 'required|unique:pages,slug',
            'title_ru' => 'required',
            'title_en' => 'required',
            'content_ru' => 'required',
            'content_en' => 'required',
            'meta_description_ru' => 'nullable',
            'meta_description_en' => 'nullable',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        Page::create($validated);
        return redirect()->route('admin.pages.index')->with('success', 'Страница создана');
    }

    public function edit(Page $page)
    {
        return view('admin.pages.form', compact('page'));
    }

    public function update(Request $request, Page $page)
    {
        $validated = $request->validate([
            'slug' => 'required|unique:pages,slug,' . $page->id,
            'title_ru' => 'required',
            'title_en' => 'required',
            'content_ru' => 'required',
            'content_en' => 'required',
            'meta_description_ru' => 'nullable',
            'meta_description_en' => 'nullable',
            'is_active' => 'boolean',
            'sort_order' => 'integer',
        ]);

        $validated['is_active'] = $request->boolean('is_active');
        $page->update($validated);
        return redirect()->route('admin.pages.index')->with('success', 'Страница обновлена');
    }

    public function destroy(Page $page)
    {
        $page->delete();
        return redirect()->route('admin.pages.index')->with('success', 'Страница удалена');
    }
}