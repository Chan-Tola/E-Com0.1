<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $mainCategories = Category::with('children')
            ->whereNull(Category::PARENT_ID)
            ->orderBy(Category::SORT_ORDER)
            ->get();

        $subCategories = Category::with('parent')
            ->whereNotNull(Category::PARENT_ID)
            ->orderBy(Category::PARENT_ID)
            ->orderBy(Category::SORT_ORDER)
            ->get();

        return view('admin.categories.index', compact('mainCategories', 'subCategories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::with('children')
            ->whereNull(Category::PARENT_ID)
            ->orderBy(Category::SORT_ORDER)
            ->get();
        return view('admin.categories.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // note: validate request
        $validated = $request->validate([
            Category::NAME => 'required|string|max:255',
            Category::NAME_KH => 'nullable|string|max:255',
            Category::SLUG => 'required|string|max:255|unique:' . Category::TABLENAME . ',' . Category::SLUG,
            Category::PARENT_ID => 'nullable|exists:' . Category::TABLENAME . ',' . Category::ID,
        ]);
        // note: auto set valu

        $validated[Category::IS_ACTIVE] = true;

        if (isset($validated[Category::PARENT_ID]) && $validated[Category::PARENT_ID]) {
            // note: sub category : Get max sort order wuth the parent id + 1
            $validated[Category::SORT_ORDER] = Category::where(
                Category::PARENT_ID,
                $validated[Category::PARENT_ID]
            )->max(Category::SORT_ORDER) + 1;
        } else {
            $validated[Category::SORT_ORDER] = Category::whereNull(
                Category::PARENT_ID
            )->max(Category::SORT_ORDER) + 1;
        }

        // note: Ensure minimum sort order is 1
        $validated[Category::SORT_ORDER] = max(1, $validated[Category::SORT_ORDER]);

        // note: create category
        Category::create($validated);

        return redirect()->route('category.index')->with('success', 'Created successfully.');
    }

    public function show(string $id) {}


    public function edit(Category $category)
    {
        // $mainCategories = Category::with('children')->whereNull(Category::PARENT_ID);
        // $mainCategoryId = $mainCategories;
        // $mainID = Category::find($id);
        // dd($mainID);
        $parentCategories = Category::whereNull(Category::PARENT_ID)
            ->where('id', '!=', $category->id)
            ->get();

        return view('admin.categories.edit', compact('category', 'parentCategories'));
    }

    public function update(Request $request, Category $category)
    {
        // dd($request->all());
        $validator = Validator::make($request->all(), [
            Category::NAME => 'required|string|max:255',
            Category::NAME_KH => 'nullable|string|max:255',
            Category::SLUG => 'required|string|max:255|unique:' . Category::TABLENAME . ',' . Category::SLUG . ',' . $category->id,
            Category::PARENT_ID => 'nullable|exists:' . Category::TABLENAME . ',' . Category::ID,
        ]);

        if ($validator->fails()) {
            $error = $validator->errors();
            $message = implode(", ", $error->all()); // Added space for better readability
            return back()->with('error', $message);
        }

        $updateData = [
            Category::NAME => $request->{Category::NAME},
            Category::NAME_KH => $request->{Category::NAME_KH},
            Category::SLUG => $request->{Category::SLUG},
            Category::PARENT_ID => $request->{Category::PARENT_ID},
        ];

        if ($category->{Category::PARENT_ID} != $request->{Category::PARENT_ID}) {
            if ($request->{Category::PARENT_ID}) {
                $updateData[Category::SORT_ORDER] = Category::where(
                    Category::PARENT_ID,
                    $request->{Category::PARENT_ID}
                )->max(Category::SORT_ORDER) + 1;
            }
        }   

        $category->update($updateData);

        return redirect()->route('category.index')->with('success', 'Updated successfully.');
    }

    public function destroy($id)
    {
        try {
            $category = Category::findOrFail($id);
            $category->delete();

            return response()->json([
                'success' => true,
                'redirect' => route('category.index')
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Error deleting category: ' . $e->getMessage()
            ], 500);
        }
    }
}
