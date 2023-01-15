@props(['report'])

<x-card>
    <div class="flex justify-between">
        {{-- <img class="hidden w-48 mr-6 rounded-lg xl:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" /> --}}

        <div class="flex flex-col lg:flex-row justify-between gap-x-10">
            <div class="flex w-40">
                <h3
                    class="flex text-lg text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold">
                    <a href="/reports/{{ $report->id }}">{{ $report->category }}</a>
                </h3>
            </div>
            <div
                class="w-20 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
                <i class="fa-solid fa-user mr-1.5"></i> {{ $report->user->name }}
            </div>
            <div
                class="w-50 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
                <i class="fa-solid fa-satellite mr-1.5"></i> {{ $report->service->name }}
            </div>
            <div
                class="w-30 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
                <i class="fa-solid fa-clock mr-1.5"></i> {{ date('F, Y h:i A', strtotime($report->created_at)) }}
            </div>
        </div>

        <div class="flex justify-center">
            <form method="POST" action="/reports/{{ $report->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                    Delete</button>
            </form>
        </div>

    </div>
</x-card>
