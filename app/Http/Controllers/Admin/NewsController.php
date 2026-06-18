<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::orderBy('published_at', 'desc')->paginate(15);
        return view('admin.news.index', compact('news'));
    }

    public function create()
    {
        return view('admin.news.form');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug',
            'content_ru' => 'required|string',
            'content_en' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Генерация slug, если не указан
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title_ru']);
        }

        // Загрузка изображения
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/news'), $filename);
            $validated['image'] = $filename;
        }

        News::create($validated);
        return redirect()->route('admin.news.index')->with('success', 'Новость создана');
    }

    public function edit(News $news)
    {
        return view('admin.news.form', compact('news'));
    }

    public function update(Request $request, News $news)
    {
        $validated = $request->validate([
            'title_ru' => 'required|string|max:255',
            'title_en' => 'required|string|max:255',
            'slug' => 'nullable|string|max:255|unique:news,slug,' . $news->id,
            'content_ru' => 'required|string',
            'content_en' => 'required|string',
            'published_at' => 'required|date',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:5120',
        ]);

        // Обновление slug
        if (empty($validated['slug'])) {
            $validated['slug'] = Str::slug($validated['title_ru']);
        }

        // Загрузка нового изображения
        if ($request->hasFile('image')) {
            if ($news->image && file_exists(public_path('images/news/' . $news->image))) {
                unlink(public_path('images/news/' . $news->image));
            }
            $file = $request->file('image');
            $filename = time() . '_' . $file->getClientOriginalName();
            $file->move(public_path('images/news'), $filename);
            $validated['image'] = $filename;
        }

        $news->update($validated);
        return redirect()->route('admin.news.index')->with('success', 'Новость обновлена');
    }

    public function destroy(News $news)
    {
        if ($news->image && file_exists(public_path('images/news/' . $news->image))) {
            unlink(public_path('images/news/' . $news->image));
        }
        $news->delete();
        return redirect()->route('admin.news.index')->with('success', 'Новость удалена');
    }
}