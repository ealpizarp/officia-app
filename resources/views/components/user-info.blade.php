@props(['user'])

<div class="flex flex-col lg:flex-row justify-between gap-x-10">
    <div class="flex w-20">
        <h3
            class="flex text-lg text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold">
            <a href="/users/admin/{{ $user->id }}">{{ $user->name }}</a>
        </h3>
    </div>
    <div class="w-56 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-envelope mr-1.5"></i> {{ $user->email }}
    </div>
    <div class="w-24 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-phone mr-1.5"></i> {{ $user->phone_number }}
    </div>
    <div class="w-32 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-location-pin mr-1.5"></i> {{ $user->address->name }}
    </div>
    <div class="w-30 overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-clock mr-1.5"></i> {{ date('F, Y', strtotime($user->created_at)) }}
    </div>
</div>
