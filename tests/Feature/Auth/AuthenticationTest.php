<?php

use App\Models\User;

test('admin login screen can be rendered and the old login path is unavailable', function () {
    $this->get(route('admin.login'))
        ->assertOk();

    $this->get('/login')->assertNotFound();
    $this->post('/login')->assertNotFound();
    $this->get(route('admin.dashboard'))
        ->assertRedirect(route('admin.login'));
});

test('users can authenticate using the login screen', function () {
    $user = User::factory()->create();

    $response = $this->post(route('admin.login.store'), [
        'username' => $user->username,
        'password' => 'password',
    ]);

    $this->assertAuthenticated();
    $response->assertRedirect(route('admin.dashboard'));
});

test('users can not authenticate with invalid password', function () {
    $user = User::factory()->create();

    $this->post(route('admin.login.store'), [
        'username' => $user->username,
        'password' => 'wrong-password',
    ]);

    $this->assertGuest();
});

test('users can logout', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post('/logout');

    $this->assertGuest();
    $response->assertRedirect(route('admin.login'));
});

test('admin logout redirects to the admin login screen', function () {
    $user = User::factory()->create();

    $response = $this->actingAs($user)->post(route('admin.logout'));

    $this->assertGuest();
    $response->assertRedirect(route('admin.login'));
});
