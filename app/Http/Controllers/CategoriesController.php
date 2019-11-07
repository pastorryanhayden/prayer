<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Category;
use App\Request as PrayerRequest;

class CategoriesController extends Controller
{
    public function index(Request $request)
    {
        $user = Auth::user();
        $church = $user->church;
        $categories = $church->categories()->orderBy('title', 'asc')->get();
        return view('settings.categories', compact('church', 'user', 'categories'));
    }
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'category' => 'required | min:4',
        ]);
        $user = Auth::user();
        $church = $user->church;
        $church->categories()->create([
            'title' => $request->category,
        ]);
        return redirect()->back();
    }
    public function update(Request $request, Category $category)
    {
        $validatedData = $request->validate([
            'category' => 'required | min:4',
        ]);
        $category->update([
            'title' => $request->category
        ]);
        $request->session()->flash('changed', 'Category updated');
        return redirect()->back();
    }
    public function destroy(Request $request, Category $category)
    {
        $requests = PrayerRequest::where('category_id', $category->id)->delete();
        $category->delete();
        $request->session()->flash('removed', 'Category removed.');
        return redirect('/settings/categories');
    }
}
