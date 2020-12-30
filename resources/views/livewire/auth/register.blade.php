<div class="">

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
