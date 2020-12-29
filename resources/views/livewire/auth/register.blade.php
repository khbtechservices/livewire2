{{--
<!--
  This example requires Tailwind CSS v2.0+

  This example requires some changes to your config:

  ```
  // tailwind.config.js
  module.exports = {
    // ...
    plugins: [
      // ...
      require('@tailwindcss/forms'),
    ]
  }
  ```
-->
--}}
<div class="min-h-screen flex items-center justify-center bg-gray-100 py-12 px-4 sm:px-6 lg:px-8">
    <div class="max-w-md w-full space-y-8">
        <div>
            <img class="mx-auto h-12 w-auto" src="/images/logo3.svg" alt="Pneuma Logo">
            <h2 class="mt-6 text-center text-3xl font-extrabold text-gray-900">
            </h2>

        </div>

        <div class="mt-8 sm:mx-auto sm:w-full sm:max-w-md">
            <div class="bg-white py-8 px-4 shadow sm:rounded-lg sm:px-10">
                <form wire:submit.prevent="register" action="#" method="POST">
                    <input type="hidden" name="remember" value="true">
                    <div class="rounded-md shadow-sm ">

                        <div>
                            <label for="name" class="block text-sm font-medium leading-5 text-gray-700">Name</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model="name" id="name" name="name" type="name" autocomplete="name" required
                                    class="@error('name') border-red-500 @enderror appearance-none rounded-none relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="">
                            </div>
                            @error('name')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mt-6">
                            <label for="email" class="block text-sm font-medium leading-5 text-gray-700">Email address</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model="email" id="email" name="email" type="email" autocomplete="email" required
                                    class="@error('email') border-red-500 @enderror appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-t-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="">
                            </div>
                            @error('email')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mt-6">
                            <label for="password" class="block text-sm font-medium leading-5 text-gray-700">Password</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="password" id="password" name="password" type="password" autocomplete="current-password" required
                                    class="@error('password') border-red-500 @enderror appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="">
                            </div>
                            @error('password')<div class="text-red-600 text-sm mt-1">{{ $message }}</div>@enderror
                        </div>

                        <div class="mt-6">
                            <label for="passwordConfirmation" class="block text-sm font-medium leading-5 text-gray-700">Confirm Password</label>
                            <div class="mt-1 rounded-md shadow-sm">
                                <input wire:model.lazy="passwordConfirmation" id="passwordConfirmation" name="passwordConfirmation" type="password" autocomplete="current-password" required
                                    class="appearance-none rounded-md relative block w-full px-3 py-2 border border-gray-300 placeholder-gray-500 text-gray-900 rounded-b-md focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 focus:z-10 sm:text-sm"
                                    placeholder="">
                            </div>
                        </div>

                        <div class="mt-6">
                            <button type="submit"
                                class="group relative w-full flex justify-center py-2 px-4 border border-transparent text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                                Register
                            </button>
                        </div>
                </form>
                <div class="mt-6">
                    <p class="mt-2 text-center text-sm leading-5 text-gray-600 max-w">
                        <a href="/login" class="font-medium text-indigo-600 hover:text-indigo-500 focus:outline-none focus:underline transition ease-in-out duration-150">
                            Already have an account?
                        </a>
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- <form wire:submit.prevent="register" class="" action="index.html" method="post">

    <div class="">
        <label for="name">Name</label>
        <input wire:model="name" type="text" name="name" id="name" value="">
        @error('name') <span>{{$message}}</span> @enderror
    </div>
    <div class="">
        <label for="email">Email</label>
        <input wire:model="email" type="text" name="email" id="email" value="">
        @error('email') <span>{{$message}}</span> @enderror
    </div>
    <div class="">
        <label for="password">Password</label>
        <input wire:model.lazy="password" type="password" name="password" id="password" value="">
        @error('password') <span>{{$message}}</span> @enderror
    </div>
    <div class="">
        <label for="passwordConfirmation">Password Confirmation</label>
        <input wire:model.lazy="passwordConfirmation" type="password" name="passwordConfirmation" id="passwordConfirmation" value="">
    </div>

    <div class="">
        <input type="submit" name="" value="Register">
    </div>
</form> -->
