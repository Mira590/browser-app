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
        'file' => UploadedFile::fake()->create('domain-user-form.pdf', 10, 'application/pdf'),
    ]);

    $form = DownloadableForm::query()->firstOrFail();
    $filePath = public_path('forms/'.$form->file_path);

    try {
        $response->assertRedirect(route('admin.forms.index'));
        $this->assertFileExists($filePath);
        $this->get(route('welcome.page'))
            ->assertOk()
            ->assertSee('Domain User Form')
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
        ->assertSee('formsPage=2');

    $this->get(route('welcome.page', ['formsPage' => 2]))
        ->assertOk()
        ->assertSee('Test Form 9')
        ->assertDontSee('Test Form 1');
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
