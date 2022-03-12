<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke(Request $request)
    {
        $query = $request->get('query');
        $results = Product::query()
                 ->where('name', 'LIKE', "%{$query}%")
                 ->paginate(10);
        return view("adminDashboard.search", compact('results'));
    }
}
