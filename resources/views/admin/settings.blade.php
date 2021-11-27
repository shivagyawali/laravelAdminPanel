@extends('layouts.app')

@section('content')
    <main class="container mx-auto max-w">
        <div class="flex">
            <div class="w-2/3">
                <section class="flex flex-col break-words bg-white md:border-1 md:rounded-md md:shadow-sm md:shadow-lg">

                    <header class="font-semibold bg-gray-200 text-gray-700 py-5 px-6 sm:py-6 sm:px-8 sm:rounded-t-md">
                        {{ __('Settings Page') }}
                    </header>

                    <form class="w-full px-6 space-y-6 sm:px-10 sm:space-y-8" method="POST"
                        action="{{ route('settings.update') }}">
                        @csrf

                        <div class="flex flex-wrap">
                            <label for="details" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Site Details') }}:
                            </label>

                            <textarea id="details" type="text" rows="5"
                                class="form-input border border-green-600 w-full @error('details') 
                                 border-red-500 @enderror"
                                name="details">{{ $settings->details }}</textarea>

                            @error('details')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="phone" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Phone Number') }}:
                            </label>

                            <input id="phone" type="phone"
                                class="form-input border border-green-600 w-full @error('phone') border-red-500 @enderror"
                                name="phone" value="{{ $settings->phone }}">

                            @error('phone')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="email" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Email Address') }}:
                            </label>

                            <input id="email" type="email"
                                class="form-input border border-green-600 w-full @error('email') border-red-500 @enderror"
                                name="email" value="{{ $settings->email }}">

                            @error('email')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="address" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Address') }}:
                            </label>

                            <input id="address" type="address"
                                class="form-input border border-green-600 w-full @error('address') border-red-500 @enderror"
                                name="address" value="{{ $settings->address }}">

                            @error('address')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <label for="facebook" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Facebook Link') }}:
                            </label>

                            <input id="facebook" type="url"
                                class="form-input border border-green-600 w-full @error('facebook') border-red-500 @enderror"
                                name="facebook" value="{{ $settings->facebook }}">

                            @error('facebook')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="facebook" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Instagram Link') }}:
                            </label>

                            <input id="instagram" type="url"
                                class="form-input border border-green-600 w-full @error('instagram') border-red-500 @enderror"
                                name="instagram" value="{{ $settings->instagram }}">

                            @error('instagram')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="facebook" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Tiktok Link') }}:
                            </label>

                            <input id="tiktok" type="url"
                                class="form-input border border-green-600 w-full @error('tiktok') border-red-500 @enderror"
                                name="tiktok" value="{{ $settings->tiktok }}">

                            @error('tiktok')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>


                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="w-full select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-blue-500 hover:bg-yellow sm:py-4">
                                {{ __('Update ') }}
                            </button>

                            <p class="w-full text-xs text-center text-gray-700 my-6 sm:text-sm sm:my-8">

                            </p>
                        </div>
                    </form>

                </section>
            </div>
        </div>
    </main>



@endsection
