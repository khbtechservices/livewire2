<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Route;
use Tests\TestCase;

use Livewire\Livewire;

use App\Models\User;

class LoginTest extends TestCase
{
    use RefreshDatabase;


    /** @test **/
    function can_view_login_page() {
        $this->get(route('auth.login'))
            ->assertSuccessful()
            ->assertSeeLivewire('auth.login');
    }

    /** @test **/
    function user_redirected_to_login_page_if_logged_in() {
        auth()->login(
            factory(User::class)->create()
        );

        $this->get(route('auth.login'))
            ->assertRedirect('/');

    }

    /** @test **/
    function can_login() {

        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login');

        $this->assertTrue(
            auth()->user()->is(User::where('email', $user->email)->first())
        );

    }

    /** @test **/
    function is_redirected_to_intended_after_login_prompt_from_auth_guard() {

        Route::get('/intended')->middleware('auth'); //establish route

        $user = factory(User::class)->create();

        $this->get('/intended')->assertRedirect('/login'); //should get redirected to auth.login

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password', 'password')
            ->call('login')
            ->assertRedirect('/intended');

    }

    /** @test */
    public function is_redirected_to_root_after_login()
    {
        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->set('password','password')
            ->call('login')
            ->assertRedirect('/');

    }


    /** @test */
    public function email_is_required()
    {

        Livewire::test('auth.login')
            ->call('login')
            ->assertHasErrors(['email' => 'required']);
    }

    /** @test */
    public function password_is_required()
    {

        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', $user->email)
            ->call('login')
            ->assertHasErrors(['password' => 'required']);
    }

    /** @test */
    public function email_must_be_valid_email()
    {
        // $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email', 'testing.123')
            ->call('login')
            ->assertHasErrors(['email' => 'email']);

    }

    /** @test */
    public function bad_login_attempt_shows_message()
    {
        $user = factory(User::class)->create();

        Livewire::test('auth.login')
            ->set('email',$user->email)
            ->set('password','not-the-correct-password')
            ->call('login')
            ->assertHasErrors('email');

        $this->assertNull(auth()->user());
    }

}
