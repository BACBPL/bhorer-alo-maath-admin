<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::all();
        return view('admin.categories.index', compact('categories'));
    }

    public function createCategory()
    {
        return view('admin.categories.create');
    }

    public function storeCategory(Request $request)
    {
        Category::create([
            'category_name' => $request->category_name,
            'status' => $request->status
        ]);

        return redirect('/admin/categories')
            ->with('success', 'Category Added Successfully');
    }

    public function editCategory($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.categories.edit', compact('category'));
    }

    public function updateCategory(Request $request, $id)
    {
        $category = Category::findOrFail($id);

        $category->update([
            'category_name' => $request->category_name,
            'status' => $request->status
        ]);

        return redirect('/admin/categories')
            ->with('success', 'Category Updated Successfully');
    }

    public function deleteCategory($id)
    {
        $category = Category::findOrFail($id);

        $category->delete();

        return redirect('/admin/categories')
            ->with('success', 'Category Deleted Successfully');
    }

}
