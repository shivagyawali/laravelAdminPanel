@extends('layouts.app')

@section('content')
    <main class="container mt-5 mx-auto  w-3/3 border-red">



        <div class="w-full mb-12 px-4 ">
            <div
                class="relative flex flex-col min-w-0 break-words w-full mb-6 shadow md:shadow-2xl rounded border-green-500">
                <div class="rounded-t mb-0 px-4 py-3 border-0">
                    <div class="flex flex-wrap items-center">
                        <div class="relative w-full px-4 max-w-full flex-grow flex-1">
                            <h3 class="font-semibold text-lg ">
                                Faq Table
                            </h3>
                        </div>
                        <a href="{{ route('faqs.create') }}">
                            <button
                                class="bg-green-500 text-white active:bg-lightBlue-600 font-bold uppercase text-xs px-4 py-2 rounded shadow hover:shadow-md outline-none focus:outline-none mr-1 ease-linear transition-all duration-150"
                                type="button">
                                Add New Faq
                            </button>
                        </a>
                    </div>
                </div>
                <p class="ml-5"></p>
                <div class="block w-full overflow-x-auto">

                    <table class="items-center w-full bg-transparent border-collapse">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left ">
                                    Title
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left ">
                                    Description
                                </th>
                                <th
                                    class="px-6 align-middle border border-solid py-3 text-xs uppercase border-l-0 border-r-0 whitespace-nowrap font-semibold text-left ">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($faqs as $item)
                                <tr>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ $item->title }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        {{ Str::limit($item->details, 100) }}
                                    </td>
                                    <td
                                        class="border-t-0 px-6 align-middle border-l-0 border-r-0 text-xs whitespace-nowrap p-4">
                                        <div class="flex">
                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <a href="{{ route('faqs.edit', $item->id) }}">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                                                        stroke="currentColor">
                                                        <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                                            d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z" />
                                                    </svg>
                                                </a>
                                            </div>

                                            <div class="w-4 mr-2 transform hover:text-purple-500 hover:scale-110">
                                                <form method="POST" action="{{ route('faqs.destroy', $item->id) }}">
                                                    @csrf
                                                    <input name="_method" type="hidden" value="DELETE">
                                                    <button type="submit"
                                                        class="bg-red btn-xs btn-danger btn-flat show_confirm"
                                                        data-toggle="tooltip" title='Delete'>

                                                        <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4"
                                                            viewBox="0 0 20 20" fill="currentColor">
                                                            <path fill-rule="evenodd"
                                                                d="M9 2a1 1 0 00-.894.553L7.382 4H4a1 1 0 000 2v10a2 2 0 002 2h8a2 2 0 002-2V6a1 1 0 100-2h-3.382l-.724-1.447A1 1 0 0011 2H9zM7 8a1 1 0 012 0v6a1 1 0 11-2 0V8zm5-1a1 1 0 00-1 1v6a1 1 0 102 0V8a1 1 0 00-1-1z"
                                                                clip-rule="evenodd" />
                                                        </svg>
                                                    </button>
                                                </form>


                                            </div>
                                        </div>
                                    </td>
                                </tr>

                            @endforeach



                        </tbody>

                    </table>

                </div>

            </div>
            <div class="flex items-center space-x-1">
                {!! $faqs->links() !!}
            </div>
        </div>





    </main>
@endsection
