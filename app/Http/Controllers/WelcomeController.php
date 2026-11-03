<?php

namespace App\Http\Controllers;

use App\Models\DownloadableForm;
use App\Models\Link;
use App\Models\Slider;
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index(Request $request)
    {
        $link = Link::query()->orderBy('id')->paginate(8);
        $sliders = Slider::latest()->get();
        $formCategories = DownloadableForm::CATEGORIES;
        $requestedFormCategory = $request->query('formCategory');
        $activeFormCategory = is_string($requestedFormCategory) && array_key_exists($requestedFormCategory, $formCategories)
            ? $requestedFormCategory
            : 'operation';
        $forms = collect(array_keys($formCategories))->mapWithKeys(function ($category) {
            $paginator = DownloadableForm::query()
                ->where('category', $category)
                ->latest()
                ->paginate(8, ['*'], $category.'FormsPage')
                ->through(function ($form) {
                    return [
                        'name' => $form->title,
                        'extension' => strtoupper(pathinfo($form->file_path, PATHINFO_EXTENSION)),
                        'url' => asset('forms/'.rawurlencode($form->file_path)),
                    ];
                });

            return [$category => $paginator];
        });

        return view('link.welcome', compact('link', 'sliders', 'forms', 'formCategories', 'activeFormCategory'));
    }
}
