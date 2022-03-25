<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $categories = Category::all();
        $query = $request->get('search');
        $results = Product::query()
                 ->where('name', 'LIKE', "%{$query}%")
                 ->where('description', 'LIKE', "%{$query}%")
                 ->paginate(12);
        return view('publicSite.search', compact('categories', 'results', 'query'));
    }
}
