@extends('layouts.app')

@section('content')
    <main class="container mx-auto max-w">
        <div class="flex">
            <div class="w-1/2">
                <section class="flex flex-col break-words bg-white md:border-1 md:rounded-md md:shadow-sm md:shadow-lg">

                    <div class="bg-blue-900 rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class=" relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="text-white font-semibold text-lg ">
                                    Team Create
                                </h3>
                            </div>
                            <a href="{{ URL::previous() }}">
                                <button
                                    class="bg-yellow-500 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                    type="button">
                                    Back
                                </button>
                            </a>
                        </div>
                    </div>

                    <form action="{{ route('teams.store') }}" method="POST"
                        class="container w-2/2 px-6 space-y-6 sm:px-5 sm:space-y-8" enctype="multipart/form-data">
                        @csrf

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-wrap">
                                <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Name') }}:
                                </label>

                                <input id="title" value="{{ old('name') }}" type="text"
                                    class="form-input border border-green-600 w-full @error('name') 
                                 border-red-500 @enderror"
                                    name="name">

                                @error('name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap">
                                <label for="position" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Position') }}:
                                </label>

                                <input id="position" value="{{ old('position') }}" type="text"
                                    class="form-input border border-green-600 w-full @error('position') 
                                 border-red-500 @enderror"
                                    name="position">

                                @error('position')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Image') }}:
                            </label>
                            <input id="image" value="{{ old('image') }}" type="file"
                                class="form-input border border-green-600 w-full @error('image') 
                                 border-red-500 @enderror"
                                name="image">

                            @error('image')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="linkedin" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Linkedin Link') }}:
                            </label>
                            <input id="linkedin" value="{{ old('linkedin') }}" type="url"
                                class="form-input border border-green-600 w-full @error('linkedin') 
                                 border-red-500 @enderror"
                                name="linkedin">

                            @error('linkedin')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="twitter" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Twitter Link') }}:
                            </label>
                            <input id="twitter" value="{{ old('twitter') }}" type="url"
                                class="form-input border border-green-600 w-full @error('twitter') 
                                 border-red-500 @enderror"
                                name="twitter">

                            @error('twitter')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Instagram Link') }}:
                            </label>
                            <input id="instagram" value="{{ old('instagram') }}" type="url"
                                class="form-input border border-green-600 w-full @error('instagram') 
                                 border-red-500 @enderror"
                                name="instagram">

                            @error('instagram')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="facebook" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Facebook Link') }}:
                            </label>
                            <input id="facebook" value="{{ old('facebook') }}" type="url"
                                class="form-input border border-green-600 w-full @error('facebook') 
                                 border-red-500 @enderror"
                                name="facebook">

                            @error('facebook')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>

                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="mb-5 w-3/3  select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-green-500 hover:bg-green-800 sm:py-3">Submit</button>
                        </div>

                    </form>



                </section>


            </div>
        </div>
    </main>
@endsection
