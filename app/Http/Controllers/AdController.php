<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ad;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class AdController extends Controller
{
    public function create()
    {
        $categories = Category::all(); // Fetch all categories for the dropdown
    return view('ads.create', compact('categories'));
    }
    public function index(Request $request)
    {
        // Get all categories for the dropdown
        $categories = Category::all();

        // Initialize query for ads
        $query = Ad::query();

        // If a category is selected, filter the ads by that category
        if ($request->has('category') && $request->category != '') {
            $query->where('category_id', $request->category);
        }

        // Fetch the ads based on the query
        $ads = $query->get();

        // Return the view with the ads and categories data
        return view('ads.index', compact('ads', 'categories'));
    }

    public function show($id)
    {
        $ad = Ad::with('user')->findOrFail($id);
        return view('ads.show', compact('ad'));
    }

    // public function create()
    // {
    //     $categories = Category::all();
    //     return view('ads.create', compact('categories'));
    // }

    public function store(Request $request)
{
    // Validate incoming request data
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required|string',
        'location' => 'required|string|max:255',
        'category_id' => 'required|exists:categories,id',
        'video' => 'nullable|mimes:mp4,avi,mov|max:51240', // Validate video file type and size
        // 'is_featured' => 'nullable|boolean',
    ]);

    // Create a new Ad instance and save data
    $ad = new Ad();
    $ad->user_id = Auth::id();
    $ad->title = $request->title;
    $ad->description = $request->description;
    $ad->location = $request->location;
    $ad->category_id = $request->category_id;
    $ad->is_featured = $request->has('is_featured');


    // Handle video upload
    if ($request->hasFile('video')) {
        $ad->video = $request->video->store('ads_videos', 'public');
    }

    // Save the advertisement
    $ad->save();

    // Redirect with success message
    return redirect()->route('dashboard')->with('success', 'Ad posted successfully!');
}
    
}
