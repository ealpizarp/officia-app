@extends('guest_layout')

@section('content')
    <section class="h-full mt-32 mx-10">
        <div class="container mx-auto px-4">
            <div
                class="relative flex flex-col min-w-0 break-words bg-gray-100 w-full mb-6 shadow-xl rounded-lg dark:bg-gray-500">
                <div class="px-6">
                    <div class=" relative flex flex-wrap justify-center">
                        <div class="w-full lg:order-2 flex justify-center">
                            <div class="relative">
                                <img alt="..."
                                    src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('./images/profile_template.png') }}"
                                    class="shadow-xl rounded-full h-auto align-middle border-none absolute object-center -m-16 -ml-[4.5rem] max-w-[150px] max-h-[150px]">
                            </div>
                        </div>
                    </div>

                    <div class="text-center mt-28">
                        <h3 class="text-4xl font-semibold leading-normal mb-2 dark:text-gray-200 mb-2">
                            {{ $user->name }} {{ $user->last_names }}
                        </h3>
                        <div class="text-sm leading-normal mt-0 mb-2 text-gray-500 dark:text-gray-200 font-bold uppercase">
                            <i class="fas fa-map-marker-alt mr-2 text-lg text-gray-500 dark:text-gray-200"></i>
                            {{ $user->address->name }}
                        </div>
                        {{dd($rating)}}
                        <div class="flex justify-center items-center flex-col mt-10">
                            <div class="text-left mb-2 text-gray-500 dark:text-gray-200 font-medium ">
                                <i class="fa-solid fa-envelope mr-2 text-lg text-gray-500 dark:text-gray-200"></i>
                                {{ $rating }}
                            </div>
                            <div class="text-left mb-2 text-gray-500 dark:text-gray-200 font-medium ">
                                <i class="fa-solid fa-envelope mr-2 text-lg text-gray-500 dark:text-gray-200"></i>
                                {{ $user->email }}
                            </div>
                            <div class="text-left mb-2 text-gray-500 dark:text-gray-200 font-medium">
                                <i class="fa-solid fa-id-card mr-2 text-lg text-gray-500 dark:text-gray-200"></i>
                                {{ $user->legal_id }}
                            </div>
                        </div>
                        <div class="mt-10 py-10 border-t dark:border-gray-200 dark:text-gray-200 text-center">
                            <div class="flex flex-wrap justify-center">
                                <div class="w-full lg:w-9/12 px-4">
                                    <x-verification-modal></x-verification-modal>
                                    {{-- <p class="mb-4 text-lg leading-relaxed text-blueGray-700">
                                    Model for verification
                                </p> --}}
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </section>
@endsection
