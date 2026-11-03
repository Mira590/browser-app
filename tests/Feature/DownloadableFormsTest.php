<?php

use App\Models\DownloadableForm;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

it('allows admins to upload forms that appear on the welcome page', function () {
    $this->actingAs(User::factory()->create([
        'role' => 'admin',
        'email_verified_at' => now(),
    ]));

    $response = $this->post(route('admin.forms.store'), [
        'title' => 'Domain User Form',
        'category' => 'it',
        'file' => UploadedFile::fake()->create('domain-user-form.pdf', 10, 'application/pdf'),
    ]);

    $form = DownloadableForm::query()->firstOrFail();
    $filePath = public_path('forms/'.$form->file_path);

    try {
        $response->assertRedirect(route('admin.forms.index'));
        $this->assertFileExists($filePath);
        $this->assertDatabaseHas('downloadable_forms', [
            'title' => 'Domain User Form',
            'category' => 'it',
        ]);
        $this->get(route('welcome.page'))
            ->assertOk()
            ->assertSee('Domain User Form')
            ->assertSee('IT Forms')
            ->assertDontSee('Client hostname:')
            ->assertDontSee('Your IP address:');

        $this->delete(route('admin.forms.destroy', $form))
            ->assertRedirect(route('admin.forms.index'));

        $this->assertDatabaseMissing('downloadable_forms', ['id' => $form->id]);
        $this->assertFileDoesNotExist($filePath);
    } finally {
        File::delete($filePath);
    }
});

it('paginates forms eight at a time using a separate page parameter', function () {
    foreach (range(1, 9) as $number) {
        DownloadableForm::query()->create([
            'title' => 'Test Form '.$number,
            'file_path' => 'test-form-'.$number.'.pdf',
        ]);
    }

    $this->get(route('welcome.page'))
        ->assertOk()
        ->assertSee('Test Form 1')
        ->assertSee('Test Form 8')
        ->assertDontSee('Test Form 9')
        ->assertSee('operationFormsPage=2');

    $this->get(route('welcome.page', ['operationFormsPage' => 2, 'formCategory' => 'operation']))
        ->assertOk()
        ->assertSee('Test Form 9')
        ->assertDontSee('Test Form 1');
});

it('keeps forms in their selected category on the welcome page', function () {
    DownloadableForm::query()->create([
        'title' => 'Operations Checklist',
        'file_path' => 'operations-checklist.pdf',
        'category' => 'operation',
    ]);
    DownloadableForm::query()->create([
        'title' => 'IT Access Request',
        'file_path' => 'it-access-request.pdf',
        'category' => 'it',
    ]);
    DownloadableForm::query()->create([
        'title' => 'HR Leave Request',
        'file_path' => 'hr-leave-request.pdf',
        'category' => 'hr',
    ]);

    $this->get(route('welcome.page', ['formCategory' => 'it']))
        ->assertOk()
        ->assertSee('Operation Forms')
        ->assertSee('IT Forms')
        ->assertSee('HR Forms')
        ->assertSee('IT Access Request')
        ->assertSee('data-category="it"', false)
        ->assertSee('aria-selected="true"', false);
});

it('paginates each form category independently', function () {
    foreach (range(1, 9) as $number) {
        DownloadableForm::query()->create([
            'title' => 'IT Category Form '.$number,
            'file_path' => 'it-category-form-'.$number.'.pdf',
            'category' => 'it',
        ]);
        DownloadableForm::query()->create([
            'title' => 'HR Category Form '.$number,
            'file_path' => 'hr-category-form-'.$number.'.pdf',
            'category' => 'hr',
        ]);
    }

    $this->get(route('welcome.page', ['formCategory' => 'it']))
        ->assertOk()
        ->assertSee('itFormsPage=2');

    $this->get(route('welcome.page', ['formCategory' => 'it', 'itFormsPage' => 2]))
        ->assertOk()
        ->assertSee('IT Category Form 9')
        ->assertSee('hrFormsPage=2')
        ->assertDontSee('operationFormsPage=2');
});

it('paginates forms in the admin panel eight at a time', function () {
    $this->actingAs(User::factory()->create([
        'role' => 'admin',
        'email_verified_at' => now(),
    ]));

    foreach (range(1, 9) as $number) {
        DownloadableForm::query()->create([
            'title' => 'Admin Form '.$number,
            'file_path' => 'admin-form-'.$number.'.pdf',
            'category' => 'hr',
        ]);
    }

    $this->get(route('admin.forms.index'))
        ->assertOk()
        ->assertSee('Admin Form 1')
        ->assertSee('Admin Form 8')
        ->assertDontSee('Admin Form 9')
        ->assertSee('formsAdminPage=2');

    $this->get(route('admin.forms.index', ['formsAdminPage' => 2]))
        ->assertOk()
        ->assertSee('Admin Form 9')
        ->assertDontSee('Admin Form 1');
});
