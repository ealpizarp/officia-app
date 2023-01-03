@props(['user'])

<div>
    <h3 class="text-lg text-zinc-600 hover:text-cyan-600 transition duration-300 font-bold">
        {{-- @auth
        <a href="/listings/admin/{{ $listing->id }}">{{ $listing->title }}</a>
        @else
        <a href="/listings/{{ $listing->id }}">{{ $listing->title }}</a>
        @endauth --}}

        <a href="/users/admin/{{ $user->id }}">{{ $user->name }}</a>
    </h3>
    <div class="text-md mt-4 text-red-700">
        <i class="fa-solid fa-mail"></i> {{ $user->email }}
    </div>
</div>