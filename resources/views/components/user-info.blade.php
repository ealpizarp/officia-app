@props(['user'])

<div class="flex flex-row justify-between gap-x-10">
    <h3 class="flex text-lg text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold">
        <a href="/users/admin/{{ $user->id }}">{{ $user->name }}</a>
    </h3>
    <div class="flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-envelope mr-1"></i> {{ $user->email }}
    </div>
    <div class="flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-phone mr-1"></i> {{ $user->phone_number }}
    </div>
    <div class="flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300">
        <i class="fa-solid fa-clock mr-1"></i> {{ $user->created_at }}
    </div>
</div>