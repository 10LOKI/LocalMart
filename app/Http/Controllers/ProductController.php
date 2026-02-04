<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index()
    {
        if(!auth() -> user()-> can('view-products'))
        {
            abort(403);
        }
    }
    public function store(Request $request)
    {
        $this -> authorize('create-products');
    }
}
