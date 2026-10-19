<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    // get only the logged-in user's categories (through the user relationship)
    // return the categories view, passing the categories to it
    public function index(Request $request){
        // requests the categories data from the current user
        $categ = $request->user()->categories;

        // return the categories that the user have
        return view('categories.index', ['categories' => $categ]);
    }

    // validate: category_name is required, text, max 255, and must be unique
    //           for this user only (look up Rule::unique with ->where())
    //           colour is optional
    // create the category through the user relationship, so user_id fills itself
    // redirect back to the categories page
    public function store(Request $request)
    {
        // request the data and check if it meets the constraints before it can be upped to the database
        $data_stored = $request->validate([
            'category_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('categories', 'category_name')->where('user_id', $request->user()->id)
            ],
            'colour' => [
                'nullable',
                'string',
                'max:50'
            ]
        ]);

        // push that data to the database
        $request->user()->categories()->create($data_stored);

        // return it
        return redirect()->route('categories.index');
    }

    // make sure this category belongs to the logged-in user (abort with 403 if not)
    // validate the same way as store
    // update the category, then redirect back
    public function update(Request $request, Category $category)
    {
        // first thing is to check if the user requesting has the permission/the actual user that has the data
        // if not, abort/cancel the update
        abort_if($category->user_id != $request->user()->id, 403);

        // the data that will be updated
        // the user can only change the name of the category and the colour of said category from the categories
        $data = $request->validate(
            [
                'category_name' => [
                    'required',
                    'string',
                    'max:255',
                    Rule::unique('categories', 'category_name')->where('user_id', $request->user()->id)->ignore($category->id)
                ],
                'colour' => [
                    'nullable',
                    'string',
                    'max:50'
                ]
            ]
        );
        
        // update the category
        $category->update($data);

        // return it to the server
        return redirect()->route('categories.index');
    }

    // make sure this category belongs to the logged-in user (abort with 403 if not)
    // delete it, then redirect back
    public function destroy(Request $request, Category $category)
    {
        // cancel if the accound doesn't have the permission/the correct data
        abort_if($category->user_id != $request->user()->id, 403);    

        // delete the data
        $category->delete();

        // retrn in
        return redirect()->route('categories.index');
    }
}
