<?php

namespace App\Http\Controllers\API;

use Exception;
use App\Models\Category;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Helpers\ResponseFormatter;
use App\Http\Controllers\Controller;
use Illuminate\Auth\Events\Validated;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    public function index() {
        // get all category
        try {
            $category = Category::latest()->get();
            return ResponseFormatter::success(
                $category, 'Data has been take'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
                
            ], 'Authentication Failed', 500);
        }
    }

    public function category($id) {
        try {
            // get data by id
            $category = Category::findOrFail($id);
            return ResponseFormatter::success(
                $category, 'Data category by id'
            );
        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
                
            ], 'Authentication Failed', 500);
        }
    }

    public function store(Request $request) {
        try {
            // validate
            $this->validate($request, [
                'name' => 'required|unique:categories',
                'image' => 'required|image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // storage image
            $image = $request->file('image');
            $image->storeAs('public/category', $image->hashName());

            // storage data
            $category = Category::create([
                'name' => $request->name,
                'slug' => Str::slug($request->name),
                'image' => $image->hashName()
            ]);

            return ResponseFormatter::success(
                $category, 'Data has been add'
            );

        } catch (Exception $error) {
            return ResponseFormatter::error([
                'message' => 'Something went wrong',
                'error' => $error,
                
            ], 'Authentication Failed', 500);
        }
    }

    public function destroy($id) {
        try {
            // get by id
            $category = Category::findOrFail($id);
            // delete image
            Storage::disk('local')->delete('public/category/' . basename($category->image));
            //delete data
            $category->delete();
            return ResponseFormatter::success(
                null, 'Data has been deleted'
            );
        } catch (\Throwable $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    public function update(Request $request, $id)
    {
        try {
            // validate
            $this->validate($request, [
                'name' => 'required|unique:categories',
                'image' => 'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            // get data by id
            $category = Category::findOrFail($id);

            // store image
            if ($request->file('image') == '') {
                $category->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name)
                ]);
            } else {
                // hapus image lama
                Storage::disk('local')->delete('public/category/' . basename($category->image));

                // upload image baru
                $image = $request->file('image');
                $image->storeAs('public/category/', $image->hashName());

                // Update Data
                $category->update([
                    'name' => $request->name,
                    'slug' => Str::slug($request->name),
                    'image' => $image->hashName()
                ]);
            }

            return ResponseFormatter::success(
                $category,
                'Data Category Berhasil Di Update'
            );
            
        } catch (\Throwable $error) {
            return ResponseFormatter::error([
                'message' => 'Something Went Wrong',
                'error' => $error
            ], 'Authentication Failed', 500);
        }
    }

    
}
