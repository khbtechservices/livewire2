<div>
    <div class="md:grid md:grid-cols-5 md:gap-6 mt-3">

        <div class="md:col-span-1">
            <div class="px-4 sm:px-0">
                <h1 class="text-2xl font-semibold text-gray-900">Profile</h1>
            </div>
        </div>

        <div class="mt-5 md:mt-0 md:col-span-4">

            <form wire:submit.prevent="save" action="#" method="POST">
                <div class="shadow sm:rounded-md sm:overflow-hidden">
                    <div class="px-4 py-5 bg-white space-y-6 sm:p-6">

                        <div>

                            <x-input.group label="Name" for="name" :error="$errors->first('name')">

                                <x-input.text wire:model="name" id="name" name="name" />

                            </x-input.group>

                        </div>

                        <div>

                            <x-input.group label="Username" for="username" :error="$errors->first('username')">

                                <x-input.text wire:model="username" id="username" name="username" trailing-add-on="@pneuma.com"/>

                            </x-input.group>

                        </div>

                        <div>

                            <x-input.group label="Birthday" for="birthday" :error="$errors->first('birthday')">

                                <x-input.date wire:model="birthday" id="birthday" name="birthday" placeholder="MM/DD/YYYY" />

                            </x-input.group>

                        </div>

                        <div>

                            <x-input.group label="About" for="about" help-text="A sentence or two about yourself (max 120 chars)." :error="$errors->first('about')">

                                <x-input.textarea-rich wire:model="about" id="about" name="about" />

                            </x-input.group>

                        </div>

                        <div>

                            <x-input.group label="Photo" for="photo" :error="$errors->first('newAvatar')">

                                <x-input.file-upload id="file" wire:model="newAvatar">

                                    <span class="inline-block h-12 w-12 rounded-full overflow-hidden bg-gray-100">

                                        <img
                                            class="inline-block h-12 w-12 rounded-full"
                                            src="{{ $newAvatar ? $newAvatar->temporaryUrl() : auth()->user()->avatarUrl() }}"
                                            alt="Profile Pic"
                                        >

                                    </span>

                                </x-input.file-upload>

                            </x-input.group>

                        </div>

                    </div>

                    <div class="space-x-3 flex justify-end items-center px-4 py-3">

                        <span>
                            <span class="inline-flex text-green-600"
                                x-data="{open: false}"
                                x-init="
                                    @this.on('notify-saved', () => {
                                        setTimeout( () => {open = false}, 2500 );
                                        open = true;
                                    });
                                "
                                x-show.transition.out.duration.1000ms="open"
                                x-ref="this"
                                style="display: none"
                            >Saved!</span>
                        </span>

                        <span class="inline-flex rounded-md shadow-sm">
                            <button type="reset"
                                class="inline-flex justify-center py-2 px-4 border border-transparent border-gray-300 text-gray-700 shadow-sm text-sm font-medium rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 ">
                                Cancel
                            </button>
                        </span>

                        <span class="inline-flex rounded-md shadow-sm">
                            <button type="submit"
                                class="inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Save
                            </button>
                        </span>

                    </div>

                </div>
            </form>
        </div>
    </div>
</div>
