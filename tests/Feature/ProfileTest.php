<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Support\Str;
use Livewire\Livewire;

use App\User;


class ProfileTest extends TestCase
{

    use RefreshDatabase;

    /** @test **/
    function can_see_livewire_profile_component_on_profile_page() {

        $user = factory(User::class)->create();
        auth()->login($user);

        $this->actingAs($user)
            ->get('/profile')
            ->assertSuccessful()
            ->assertSeeLivewire('profile');

    }

    /** @test **/
    function can_update_profile() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'foobar')
            ->set('about', 'bar')
            ->call('save');

        $user->refresh();

        $this->assertEquals('foobar', $user->username);
        $this->assertEquals('bar', $user->about);

    }

    /** @test **/
    function success_message_viewable_upon_save() {

        $user = factory(User::class)->create([
            'username' => 'foofoofoo',
            'about' => 'bar'
        ]);

        Livewire::actingAs($user)
            ->test('profile')
            ->call('save')
            ->assertEmitted('notify-saved');

    }

    /** @test **/
    function profile_data_is_prepopulated() {

        $user = factory(User::class)->create([
            'username' => 'foofoofoo',
            'about' => 'bar'
        ]);

        Livewire::actingAs($user)
            ->test('profile')
            ->assertSet('username', 'foofoofoo')
            ->assertSet('about', 'bar');


    }

    /** @test **/
    function username_is_required() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('about', 'bar')
            ->call('save')
            ->assertHasErrors(['username' => 'required']);

    }

    /** @test **/
    function username_meets_min_length_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', Str::random(5))
            ->set('about', 'bar')
            ->call('save')
            ->assertHasErrors(['username' => 'min']);

    }

    /** @test **/
    function username_meets_max_length_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', Str::random(31))
            ->set('about', 'bar')
            ->call('save')
            ->assertHasErrors(['username' => 'max']);

    }

    /** @test **/
    function username_meets_alphanum_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', 'asdlj!!asdlkad')
            ->set('about', 'bar')
            ->call('save')
            ->assertHasErrors(['username' => 'alpha_num']);

    }

    /** @test **/
    function about_meets_max_length_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('username', Str::random(10))
            ->set('about', Str::random(150))
            ->call('save')
            ->assertHasErrors(['about' => 'max']);

    }

}
