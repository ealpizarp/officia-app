@extends('admin_layout')

@section('content')
    <section class="h-full mt-16 mx-10">
        <div class="container mx-auto px-4">
            <div class="relative flex flex-col min-w-0 break-words bg-gray-100 w-full mb-6 shadow-xl rounded-lg">
                <div class="px-6">
                    <div class="text-center mt-8">
                        <h3 class="text-4xl font-semibold leading-normal mb-2 text-blueGray-700">
                            {{ $report->category }}
                        </h3>
                        <div class="text-sm leading-normal mt-5 mb-2 text-gray-500 font-bold uppercase">
                            <i class="fa-solid fa-user mr-2 text-lg text-gray-500"></i>
                            Report made by: {{ $report->user->name }} {{ $report->user->last_names }}
                        </div>
                        <div class="mb-2 text-gray-500 font-medium mt-2">
                            <i class="fa-solid fa-satellite mr-2 text-lg text-gray-500"></i>Category: {{$report->service->name}}
                        </div>
                        {{-- <div class="mb-2 text-gray-500 font-medium">
                            <i class="fa-solid fa-id-card mr-2 text-lg text-gray-500"></i> {{$user->legal_id}}
                        </div> --}}
                    </div>
                    <div class="mt-10 py-10 border-t border-blueGray-200 text-center">
                        <div class="flex flex-wrap justify-center">
                            <div class="w-full lg:w-9/12 px-4">
                                <p class="mb-4 font-medium text-lg leading-relaxed text-gray-700">
                                    {{$report->description}}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
@endsection
