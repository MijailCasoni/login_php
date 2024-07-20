<?php

namespace App\Http\Controllers\pages;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\pages\page;
use App\Models\User;

class HomePage extends Controller
{
  public function index(Request $request)
  {

    $searchTerm = $request->input('search');
    $users = null;

    if ($searchTerm) {
      $users = User::where('name', 'LIKE', "%{$searchTerm}%")
                    ->orWhere('email', 'LIKE', "%{$searchTerm}%")
                    ->with('roles')
                    ->get();
    }

    return view('content.pages.pages-home', compact('users'));
  }
}
