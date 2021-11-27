@extends('layouts.app')
<style>
    input:checked~.dot {
        transform: translateX(100%);
        background-color: #48bb78;
    }

</style>
@section('content')
    <main class="container mx-auto max-w">
        <div class="flex">
            <div class="w-2/3">
                <section class="flex flex-col break-words bg-white md:border-1 md:rounded-md md:shadow-sm md:shadow-lg">

                    <div class="bg-blue-900 rounded-t mb-0 px-4 py-3 border-0">
                        <div class="flex flex-wrap items-center">
                            <div class=" relative w-full px-4 max-w-full flex-grow flex-1">
                                <h3 class="text-white font-semibold text-lg ">
                                    News Post Edit
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

                    <form action="{{ route('news.update', $news->id) }}" method="POST"
                        class="container w-2/2 px-6 space-y-6 sm:px-5 sm:space-y-8" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex flex-wrap">
                                <label for="title" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('News Title') }}:
                                </label>

                                <input id="title" value="{{ $news->title }}" type="text"
                                    class="form-input border border-green-600 w-full @error('title') 
                                 border-red-500 @enderror"
                                    name="title">

                                @error('title')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                            <div class="flex flex-wrap">
                                <label for="author_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                    {{ __('Author Name') }}:
                                </label>

                                <input id="author_name" value="{{ $news->author_name }}" type="text"
                                    class="form-input border border-green-600 w-full @error('author_name') 
                                 border-red-500 @enderror"
                                    name="author_name">

                                @error('author_name')
                                    <p class="text-red-500 text-xs italic mt-4">
                                        {{ $message }}
                                    </p>
                                @enderror
                            </div>
                        </div>
                        <div class="flex flex-wrap">
                            <label for="image" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Image ') }}:
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
                            <img src="{{ asset($news->image) }}" class="mt-4 h-20" alt="">
                        </div>
                        <div class="flex flex-wrap">
                            <label for="detail" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Description') }}:
                            </label>

                            <textarea name="detail" id="detail" type="text" rows="5"
                                class="ckeditor form-input border border-green-600 border-red w-full @error('detail') 
                                 border-red-500 @enderror"
                                name="detail">{{ $news->detail }}</textarea>

                            @error('detail')
                                <p class="text-red-500 text-xs italic mt-4">
                                    {{ $message }}
                                </p>
                            @enderror
                        </div>
                        <div class="flex flex-wrap">
                            <label for="author_name" class="block text-gray-700 text-sm font-bold mb-2 sm:mb-4">
                                {{ __('Published ') }} :
                            </label>



                            <label for="toggleB" class="flex cursor-pointer ml-5">
                                <!-- toggle -->
                                <p>No</p> &nbsp;
                                <div class="relative">
                                    <!-- input -->
                                    <input type="hidden" name="is_published" value="0">
                                    <input type="checkbox" name="is_published" id="toggleB"
                                        class="sr-only block text-gray-700 text-sm font-bold mb-2 sm:mb-4" value="1"
                                        {{ $news->is_published == '1' ? 'checked' : '0' }}>

                                    <!-- line -->
                                    <div class="block bg-gray-600 w-10 h-5 rounded-full"></div>
                                    <!-- dot -->
                                    <div class="dot absolute left-1 top-1 bg-white w-4 h-3 rounded-full transition">
                                    </div>
                                </div>
                                &nbsp; <p> Yes</p>
                            </label>



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
