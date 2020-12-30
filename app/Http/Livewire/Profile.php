<?php

namespace App\Http\Livewire;

use Livewire\Component;

use Livewire\withFileUploads;

use App\User;

class Profile extends Component
{
    use withFileUploads;

    public $user;

    public $upload;

    protected $rules = [
        'user.name' => 'required|max:60',
        'user.username' => 'required|alpha_num|min:6|max:30',
        'user.about' => 'max:120',
        'user.birthday' => 'sometimes',
        'upload' => 'image|max:30|nullable'
    ];


    public function mount() {

        $this->user = auth()->user();

    }

    public function save() {

        $this->validate();

        $this->user->save();

        if($this->upload) {

            $filename = $this->upload->store('/', 'avatars');

            // $this->user->avatar = $filename;
            //
            // $this->user->save();

            auth()->user()->update([
                'avatar' => $filename
            ]);

        }

        $this->emitSelf('notify-saved');

    }

    public function updatedUpload() {
        $this->validate( ['upload' => 'image|max:30'] );
    }

    public function updatedUserAbout() {
        $this->validate( ['user.about'=>'max:120'] );
    }

    public function updatedUserName() {
        $this->validate( ['user.name' => 'max:60'] );
    }

    public function updatedUserUsername() {

        $this->validate( ['user.username' => 'alpha_num|min:6|max:30'] );

    }

}
