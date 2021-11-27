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
                                    Service Edit
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

                    <form action="{{ route('services.update', $service->id) }}" method="POST"
                        class="container w-2/2 px-6 space-y-6 sm:px-5 sm:space-y-8" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')


                        <div class="flex flex-wrap">
                            <label for="name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Name') }}:
                            </label>

                            <input id="name" value="{{ $service->name }}" type="text"
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
                            <label for="detail" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Detail') }}:
                            </label>

                            <textarea rows="8" id="detail" type="text"
                                class="form-input border border-green-600 w-full @error('detail') 
                                 border-red-500 @enderror"
                                name="detail">
                                                            {{ $service->detail }}
                                                        </textarea>

                            @error('detail')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Image') }}:
                            </label>
                            <input id="image" type="file"
                                class="form-input border border-green-600 w-full @error('image') 
                                 border-red-500 @enderror"
                                name="image">

                            @error('image')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                            <img src="{{ asset($service->image) }}" width="80px" alt="" srcset="">
                        </div>


                        <div class="flex flex-wrap">
                            <button type="submit"
                                class="mb-5 w-2/2  select-none font-bold whitespace-no-wrap p-3 rounded-lg text-base leading-normal no-underline text-gray-100 bg-yellow-400 hover:bg-yellow-800 sm:py-3">Update</button>
                        </div>

                    </form>



                </section>


            </div>
        </div>
    </main>
@endsection
