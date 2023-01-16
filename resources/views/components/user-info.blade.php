@props(['user'])

<div class="flex flex-col lg:items-center lg:flex-row justify-between gap-x-10">
    <img class="hidden lg:block w-10 h-10 rounded-full" src="{{ $user->profile_photo ? asset('storage/' . $user->profile_photo) : asset('./images/profile_template.png')}}"
    alt="">
    <div class="flex w-auto">
        <h3
            class="flex text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold dark:text-gray-200">
            <a href="/users/admin/{{ $user->id }}">{{ $user->name }} {{ $user->last_names }}</a>
        </h3>
    </div>
    <div class="w-auto overflow-hidden flex gap text-md text-center items-center text-zinc-600  transition duration-300 dark:text-gray-200">
        <i class="fa-solid fa-envelope mr-1.5"></i> {{ $user->email }}
    </div>
    <div class="w-auto overflow-hidden flex gap text-md text-center items-center text-zinc-600 transition duration-300 dark:text-gray-200">
        <i class="fa-solid fa-phone mr-1.5"></i> {{ $user->phone_number }}
    </div>
    <div class="w-auto overflow-hidden flex gap text-md text-center items-center text-zinc-600 hover:text-cyan-600 transition duration-300 dark:text-gray-200">
        <i class="fa-solid fa-location-pin mr-1.5"></i> {{ $user->address->name }}
    </div>
    <div class="w-auto overflow-hidden flex gap text-md text-center items-center text-zinc-600 transition duration-300 dark:text-gray-200">
        <i class="fa-solid fa-clock mr-1.5"></i> {{ date('F, Y', strtotime($user->created_at)) }}
    </div>
</div>
