<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\withFileUploads;

class Profile extends Component
{
    use withFileUploads;

    public $name = '';

    public $username = '';

    public $about = '';

    public $birthday = null;

    public $newAvatar;

    protected $rules = [
        'name' => 'required|max:60',
        'username' => 'required|alpha_num|min:6|max:30',
        'about' => 'max:120',
        'birthday' => 'sometimes',
        'newAvatar' => 'nullable|image|max:20'
    ];


    public function mount() {

        $user = auth()->user();

        $this->name = $user->name;

        $this->username = $user->username;

        $this->about = $user->about;

        $this->birthday = optional($user->birthday)->format('m/d/Y');

    }

    public function save() {

        $data = $this->validate();

        $data['avatar'] = $this->newAvatar ? $this->newAvatar->store('/', 'avatars') : auth()->user()->avatar;

        auth()->user()->update($data);

        // session()->flash('notify-saved');

        $this->emitSelf('notify-saved');

    }

    public function updatedAbout() {
        $this->validate( ['about'=>'max:120'] );
    }

    public function updatedName() {
        $this->validate( ['name' => 'max:60'] );
    }

    public function updatedNewAvatar() {
        $this->validate( ['newAvatar' => 'nullable|image|max:20'] );
    }

    public function updatedUsername() {

        $this->validate( ['username' => 'alpha_num|min:6|max:30'] );

    }

}
