<?php

namespace App\Http\Controllers;

use App\Models\DownloadableForm;
use App\Models\Link;
use App\Models\Slider;

class WelcomeController extends Controller
{
    public function index()
    {
        $link = Link::query()->orderBy('id')->paginate(8);
        $sliders = Slider::latest()->get();
        $forms = DownloadableForm::query()->latest()->paginate(8, ['*'], 'formsPage')->through(function ($form) {
            return [
                'name' => $form->title,
                'extension' => strtoupper(pathinfo($form->file_path, PATHINFO_EXTENSION)),
                'url' => asset('forms/'.rawurlencode($form->file_path)),
            ];
        });

        return view('link.welcome', compact('link', 'sliders', 'forms'));
    }
}
