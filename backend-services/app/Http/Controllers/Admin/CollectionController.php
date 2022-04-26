<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProductSubCategory;
use Illuminate\Http\Request;
use App\Services\UploadService;

class CollectionController extends Controller
{
    private $uploadService;
    private $availableExtensions;
    private $artworkUploadPath;
    private $default_category_id;

    public function __construct()
    {
        $this->uploadService = new uploadService();
        $this->availableExtensions = config('file-upload-extensions.image');
        $this->artworkUploadPath = config('file-upload-paths.category-images');
        $this->default_category_id = 1;
    }

    public function index()
    {
        $collections = ProductSubCategory::all();
        return view('admin.collections.index', compact('collections'));
    }

    public function add()
    {
        return view('admin.collections.add');
    }

    public function save(Request $request)
    {
        $collectionImage = $this->uploadService->handleUploadedImages($request->collection_image, $this->artworkUploadPath, $this->availableExtensions);
        
        if (!$collectionImage) {
            return response()->json(['message' => 'You have upload incorrect file type.'], 400);
        }
        $data = [
            'name' => $request->name,
            'content' => $request->description,
            'image' => $collectionImage,
            'category_id' => $this->default_category_id,
            'slug' => generateSlug($request->name),
        ];
        
        if (ProductSubCategory::create($data)) return back()->with('success', 'Collection successfully added.');

        return back()->with('error', 'Something went wrong while adding new collection.');
    }

    public function edit($collection_id)
    {
        $collection = ProductSubCategory::where('id', $collection_id)->first();
        return view('admin.collections.edit', compact('collection'));
    }

    public function update(Request $request)
    {
        $status = ProductSubCategory::where(['id' => $request->category_id])->update([
            'name' => $request->name,
            'content' => $request->description,
        ]);
        if ($status) return back()->with('success', 'Collection successfully updated.');
        
        return back()->with('error', 'Something went wrong while updating collection.');
    }

    public function destroy($collection_id)
    {
        if (ProductSubCategory::where('id', $collection_id)->delete()) {
            return back()->with('success', 'Collection deleted successfully.');
        }
        return back()->with('error', 'Something went wrong while deleting collection.');
    }
}