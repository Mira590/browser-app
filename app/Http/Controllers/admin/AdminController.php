<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\DownloadableForm;
use App\Models\Link;
use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function login()
    {

        return view('admin.login.index');
    }

    public function index()
    {
        $user = auth()->user();
        $isAdmin = $user->isAdmin();

        $stats = [
            [
                'label' => 'Applications',
                'value' => Link::query()->count(),
                'description' => 'Portal shortcuts',
                'icon' => 'bx-grid-alt',
                'tone' => 'blue',
                'url' => $isAdmin ? route('admin.link.list') : route('welcome.page'),
            ],
            [
                'label' => 'Downloadable forms',
                'value' => DownloadableForm::query()->count(),
                'description' => 'Available to your team',
                'icon' => 'bx-file',
                'tone' => 'green',
                'url' => $isAdmin ? route('admin.forms.index') : route('welcome.page'),
            ],
            [
                'label' => 'Sliders',
                'value' => Slider::query()->count(),
                'description' => 'Portal banner slides',
                'icon' => 'bx-images',
                'tone' => 'orange',
                'url' => $isAdmin ? route('admin.slider.list') : route('welcome.page'),
            ],
            [
                'label' => 'Team members',
                'value' => User::query()->count(),
                'description' => 'Portal accounts',
                'icon' => 'bx-group',
                'tone' => 'purple',
                'url' => $isAdmin ? route('admin.allUsers') : route('welcome.page'),
            ],
        ];

        $recentLinks = Link::query()->latest()->take(5)->get();
        $recentForms = DownloadableForm::query()->latest()->take(5)->get();

        return view('admin.dashboard.index', compact('user', 'isAdmin', 'stats', 'recentLinks', 'recentForms'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create() {}

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
