<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // for filter in index page admin categories index
        $categories = Category::when($request->name, function($query, $value){
            $query->where('name', 'LIKE', '%{$value}%')
            ->orWhere('description', 'LIKE', '%$value%');
        })
        ->when($request->parent_id, function($query, $value){
            $query->where('parent_id', '=', $value);
        })
        ->leftJoin('categories as parents', 'parents.id', '=', 'categories.parent_id')
        ->select([
            'categories.*',
            'parents.name as parent_name'
        ])
        ->get();

        $parents = Category::orderBy('name', 'DESC')->get();
        return view('admin.categories.index', [
            'categories' => $categories,
            'title' => 'Categories List: ',
            'parents' => $parents,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $parents = Category::all();
        return view('admin.categories.create', [
            'parents' => $parents,
            'title' => 'Add Category',
            'category' => new Category(),
            
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Category::create([
            'name' => $request->name,
            'description' => $request->description,
            'status' => $request->status,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ])->save();
        session()->put('success', 'Category Added Successfully!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        $parents = Category::where('id', '<>', $id) // to dont show the same category in the parent selection
        ->get();

        return view('admin.categories.edit', [
            'parents' => $parents,
            'category' => $category,
            'id' => $id,
            'title' => 'Edit ' . $category->name . ' category'
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $category = Category::findOrFail($id);
        $category->update([
            'name' => $request->name,
            'status' => $request->status,
            'description' => $request->description,
            'parent_id' => $request->parent_id,
            'slug' => Str::slug($request->name),
        ]);
        session()->put('success', 'Category Updated Successfully!');
        return redirect()->route('admin.categories.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        session()->put('success', 'Category Deleted Successfully!');
        return redirect()->route('admin.categories.index');
    }
}
