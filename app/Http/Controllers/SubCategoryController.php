<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\SubCategory;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    public function subCategories(Request $request)
    {
        $query = SubCategory::with('category');

        // Search
        if ($request->filled('search')) {
            $query->where(
                'sub_category_name',
                'LIKE',
                '%' . $request->search . '%'
            );
        }

        // Category Filter
        if ($request->filled('category_id')) {
            $query->where('category_id', $request->category_id);
        }

        $subCategories = $query->get();

        $categories = Category::where('status', 'Active')
    ->where('category_name', 'Service')
    ->get();
        return view(
            'admin.subcategories.index',
            compact('subCategories', 'categories')
        );
    }

    public function createSubCategory()
    {
        $categories = Category::where('status', 'Active')
    ->where('category_name', 'Service')
    ->get();

        return view('admin.subcategories.create', compact('categories'));
    }

    public function storeSubCategory(Request $request)
    {
        SubCategory::create([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'status' => $request->status
        ]);

        return redirect('/admin/subcategories')
            ->with('success', 'Sub Category Added Successfully');
    }

    public function editSubCategory($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $categories = Category::where('status', 'Active')
    ->where('category_name', 'Service')
    ->get();

        return view(
            'admin.subcategories.edit',
            compact('subCategory', 'categories')
        );
    }

    public function updateSubCategory(Request $request, $id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->update([
            'category_id' => $request->category_id,
            'sub_category_name' => $request->sub_category_name,
            'status' => $request->status
        ]);

        return redirect('/admin/subcategories')
            ->with('success', 'Sub Category Updated Successfully');
    }

    public function deleteSubCategory($id)
    {
        $subCategory = SubCategory::findOrFail($id);

        $subCategory->delete();

        return redirect('/admin/subcategories')
            ->with('success', 'Sub Category Deleted Successfully');
    }
}