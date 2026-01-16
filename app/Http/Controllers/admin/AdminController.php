<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;

class AdminController extends Controller
{
    public function login(){

        return view('admin.login.index');
    }

   public function index()
{
    $user = auth()->user();

    if ($user->isAdmin()) {
        // Admin sees all stats
        $stock = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))->count();
        $data = Item::whereHas('branch', fn($q) => $q->where('name', 'Data_Center'))->count();
        $pc = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'PC'))
            ->count();

        $server = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Server'))
            ->count();
        $router = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Router'))
            ->count();
        $switch = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Switch'))
            ->count();

        $firewall = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Firewall'))
            ->count();
            

        $totalItems = Item::count();
        $totalUsers = \App\Models\User::count();

        return view('admin.dashboard.index', compact('stock', 'data', 'totalItems', 'totalUsers','pc','server','router','switch','firewall'));
    }

    if ($user->isSuperuser()) {
        // Superuser sees only their department or items they manage
       $stock = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))->count();
        $data = Item::whereHas('branch', fn($q) => $q->where('name', 'Data_Center'))->count();
        $totalItems = Item::count();

        $pc = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'PC'))
            ->count();

        $server = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Server'))
            ->count();
        $router = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Router'))
            ->count();
        $switch = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Switch'))
            ->count();

        $firewall = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Firewall'))
            ->count();
            

        return view('admin.dashboard.index', compact('stock', 'data', 'totalItems', 'pc','server','router','switch','firewall'));
    }

    if ($user->isUser()) {
        // User sees only their own items
       $stock = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))->count();
        $data = Item::whereHas('branch', fn($q) => $q->where('name', 'Data_Center'))->count();
        $totalItems = Item::count();

        $pc = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'PC'))
            ->count();

        $server = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Server'))
            ->count();
        $router = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Router'))
            ->count();
        $switch = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Switch'))
            ->count();

        $firewall = Item::whereHas('branch', fn($q) => $q->where('name', 'Stock'))
            ->whereHas('product', fn($q) => $q->where('name', 'Firewall'))
            ->count();
            

        return view('admin.dashboard.index', compact('stock', 'data', 'totalItems', 'pc','server','router','switch','firewall'));
    }
}

    /**
     * Show the form for creating a new resource.
     */
    public function create()

    {
   
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
