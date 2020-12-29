<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;

use Livewire\Livewire;

use Tests\TestCase;

use App\User;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    // @test **//

    function test_config() {

        // dd(config('database.default'));

        User::create([
            'name' => 'Test',
            'email' => 'test@test.com',
            'password' => 'password'
        ]);

        $this->assertTrue(User::where('email','test@test.com')->exists());
    }

    /** @test **/
    function registration_page_contains_livewire_component() {

        $this->get('/register')->assertSeeLivewire('auth.register');

    }

    /** @test **/

    function can_register() {

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','ken@abc.com')
            ->set('password','MyPassword')
            ->set('passwordConfirmation','MyPassword')
            ->call('register')
            ->assertRedirect('/');

        $this->assertTrue(User::where('email','ken@abc.com')->exists());

        $this->assertEquals('ken@abc.com', auth()->user()->email);

    }

    /** @test **/

    function name_is_required() {

        Livewire::test('auth.register')
            ->set('name','')
            ->set('email','')
            ->set('password','MyPassword')
            ->set('passwordConfirmation','MyPassword')
            ->call('register')
            ->assertHasErrors(['name'=>'required']);

    }

    /** @test **/

    function email_is_required() {

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','')
            ->set('password','MyPassword')
            ->set('passwordConfirmation','MyPassword')
            ->call('register')
            ->assertHasErrors(['email'=>'required']);

    }

    /** @test **/

    function email_is_email() {

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','ken.abc')
            ->set('password','MyPassword')
            ->set('passwordConfirmation','MyPassword')
            ->call('register')
            ->assertHasErrors(['email'=>'email']);

    }

    /** @test **/
    function password_required() {

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','asdadadasd')
            ->set('password','')
            ->set('passwordConfirmation','MyPassword2')
            ->call('register')
            ->assertHasErrors(['password'=>'required']);

    }

    /** @test **/
    function password_length_satisfied() {

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','asdadadasd')
            ->set('password','pass')
            ->set('passwordConfirmation','MyPassword2')
            ->call('register')
            ->assertHasErrors(['password'=>'min']);

    }

    /** @test **/
    function passwords_match() {

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','asdadadasd')
            ->set('password','MyPassword1')
            ->set('passwordConfirmation','MyPassword2')
            ->call('register')
            ->assertHasErrors(['password'=>'same']);

    }

    /** @test **/
    function email_is_unique() {

        User::create([
            'name' => 'Ken',
            'email' => 'ken@abc.com',
            'password' => 'aslkdjalsd'
        ]);

        Livewire::test('auth.register')
            ->set('name','Ken')
            ->set('email','ken@abc.com')
            ->set('password','MyPassword1')
            ->set('passwordConfirmation','MyPassword1')
            ->call('register')
            ->assertHasErrors(['email'=>'unique']);

    }

    /** @test **/
    function see_email_must_be_unique_message_as_user_types() {

        User::create([
            'name' => 'Ken',
            'email' => 'ken@abc.com',
            'password' => 'password'
        ]);

        Livewire::test('auth.register')
            ->set('email','ken@abc.co')
            ->assertHasNoErrors()
            ->set('email','ken@abc.com')
            ->assertHasErrors(['email'=>'unique']);

    }

}
