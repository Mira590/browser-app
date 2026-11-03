<?php

namespace App\Http\Controllers;

use App\Models\DownloadableForm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;

class FormController extends Controller
{
    private const ALLOWED_EXTENSIONS = ['pdf', 'doc', 'docx', 'odt', 'xls', 'xlsx', 'ods'];

    public function index()
    {
        $forms = DownloadableForm::query()->latest()->paginate(8, ['*'], 'formsAdminPage');

        return view('forms.index', compact('forms'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'file' => ['required', 'file', 'mimes:pdf,doc,docx,odt,xls,xlsx,ods', 'max:10240'],
        ]);

        $file = $request->file('file');
        $extension = strtolower($file->guessExtension() ?? '');

        if (! in_array($extension, self::ALLOWED_EXTENSIONS, true)) {
            return back()
                ->withErrors(['file' => 'The uploaded file type is not supported.'])
                ->withInput();
        }

        $filename = Str::uuid().'.'.$extension;
        $formsDirectory = public_path('forms');
        File::ensureDirectoryExists($formsDirectory);
        $file->move($formsDirectory, $filename);

        DownloadableForm::create([
            'title' => $validated['title'],
            'file_path' => $filename,
        ]);

        return redirect()->route('admin.forms.index')->with('status', 'Form uploaded successfully.');
    }

    public function destroy(DownloadableForm $downloadableForm)
    {
        $filePath = public_path('forms/'.$downloadableForm->file_path);
        if (File::exists($filePath) && ! File::delete($filePath)) {
            abort(500, 'The form file could not be deleted.');
        }

        $downloadableForm->delete();

        return redirect()->route('admin.forms.index')->with('status', 'Form deleted successfully.');
    }
}
