<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use Illuminate\Http\UploadedFile;

use Illuminate\Support\Facades\Storage;
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
            ->set('user.username', 'foobar')
            ->set('user.about', 'bar')
            ->call('save');

        $user->refresh();

        $this->assertEquals('foobar', $user->username);
        $this->assertEquals('bar', $user->about);

    }

    /** @test **/
    function can_upload_avatar() {

        $user = factory(User::class)->create([
            'username' => Str::random(20)
        ]);

        $file = UploadedFile::fake()->image('avatar.png');

        Storage::fake('avatars');

        Livewire::actingAs($user)
            ->test('profile')
            ->set('upload', $file)
            ->call('save');

        $user->refresh();

        // dd($user);

        Storage::disk('avatars')->assertExists($user->avatar);

        $this->assertNotNull($user->avatar);


    }

    /** @test **/
    // function upload_meets_type_requirement() {
    //
    //     $user = factory(User::class)->create();
    //
    //     $file = UploadedFile::fake()->create('doc.jpg', 20);
    //
    //     // dd($file);
    //
    //     Storage::fake('avatars');
    //
    //     Livewire::actingAs($user)
    //         ->test('profile')
    //         ->set('user.username', Str::random(30))
    //         ->set('upload', $file)
    //         ->call('save')
    //         ->assertHasErrors(['upload' => 'image']);
    //
    // }

    /** @test **/
    // function upload_meets_size_requirement() {
    //
    //     $user = factory(User::class)->create();
    //
    //     $file = UploadedFile::fake()->image('avatar.png')->size(31*1024);
    //
    //     dd($file);
    //
    //     Storage::fake('avatars');
    //
    //     Livewire::actingAs($user)
    //         ->test('profile')
    //         ->set('user.username', Str::random(30))
    //         ->set('upload', $file)
    //         ->call('save')
    //         // ->assertHasErrors(['upload' => 'max']);
    //         ->assertHasErrors('upload');
    //
    // }


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
            ->assertSet('user.username', 'foofoofoo')
            ->assertSet('user.about', 'bar');


    }

    /** @test **/
    function username_is_required() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('user.about', 'bar')
            ->call('save')
            ->assertHasErrors(['user.username' => 'required']);

    }

    /** @test **/
    function username_meets_min_length_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('user.username', Str::random(5))
            ->set('user.about', 'bar')
            ->call('save')
            ->assertHasErrors(['user.username' => 'min']);

    }

    /** @test **/
    function username_meets_max_length_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('user.username', Str::random(31))
            ->set('user.about', 'bar')
            ->call('save')
            ->assertHasErrors(['user.username' => 'max']);

    }

    /** @test **/
    function username_meets_alphanum_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('user.username', 'asdlj!!asdlkad')
            ->set('user.about', 'bar')
            ->call('save')
            ->assertHasErrors(['user.username' => 'alpha_num']);

    }

    /** @test **/
    function about_meets_max_length_requirement() {

        $user = factory(User::class)->create();

        Livewire::actingAs($user)
            ->test('profile')
            ->set('user.username', Str::random(10))
            ->set('user.about', Str::random(150))
            ->call('save')
            ->assertHasErrors(['user.about' => 'max']);

    }

}
