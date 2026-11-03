<?php

use App\Models\DownloadableForm;
use App\Models\Link;
use App\Models\Slider;
use App\Models\User;

it('shows portal overview metrics and recent resources on the admin dashboard', function () {
    $admin = User::factory()->create([
        'role' => 'admin',
        'email_verified_at' => now(),
    ]);

    Link::query()->create([
        'name' => 'Staff Directory',
        'path' => 'https://example.test/staff',
    ]);

    Slider::query()->create([
        'title' => 'Portal welcome',
    ]);

    DownloadableForm::query()->create([
        'title' => 'Domain User Form',
        'file_path' => 'domain-user-form.pdf',
    ]);

    $this->actingAs($admin)
        ->get(route('admin.dashboard'))
        ->assertOk()
        ->assertSee('Welcome back, '.$admin->first_name)
        ->assertSee('Portal overview')
        ->assertSee('Staff Directory')
        ->assertSee('Domain User Form')
        ->assertSee('Applications')
        ->assertSee('Manage downloadable forms');
});
