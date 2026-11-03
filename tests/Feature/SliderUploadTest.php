<?php

use App\Models\Slider;
use App\Models\User;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\File;

it('allows admins to upload slider pictures', function () {
    $this->actingAs(User::factory()->create([
        'role' => 'admin',
        'email_verified_at' => now(),
    ]));

    $response = $this->post(route('admin.store.slider'), [
        'title' => 'Welcome banner',
        'pic' => UploadedFile::fake()->createWithContent(
            'welcome-banner.png',
            base64_decode('iVBORw0KGgoAAAANSUhEUgAAAAEAAAABCAQAAAC1HAwCAAAAC0lEQVR42mP8/x8AAwMCAO+/l3sAAAAASUVORK5CYII=')
        ),
    ]);

    $slider = Slider::query()->firstOrFail();
    $filePath = public_path('uploads/sliders/'.$slider->pic);

    try {
        $response->assertOk()
            ->assertJson([
                'status' => 'success',
                'message' => 'Slider inserted successfully',
            ]);

        $this->assertFileExists($filePath);
        $this->assertDatabaseHas('sliders', [
            'title' => 'Welcome banner',
            'pic' => $slider->pic,
        ]);
    } finally {
        File::delete($filePath);
    }
});
