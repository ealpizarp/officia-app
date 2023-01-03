@props(['user'])

<x-card>
    <div class="flex justify-between">
        {{-- <img class="hidden w-48 mr-6 rounded-lg xl:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" /> --}}

        <x-user-info :user="$user"> </x-user-info>

        <div class="grid grid-columns-1">
            <a href="/users/admin/edit/{{ $user->id }}">
                <i class="fa-solid fa-pencil"></i> Edit
            </a>
            <form method="POST" action="/users/{{ $user->id }}">
                @csrf
                @method('DELETE')
                <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                    Delete</button>
            </form>
        </div>
        {{-- <img class="hidden w-48 ml-6 rounded-lg lg:block"
        src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
        alt="" /> --}}
    </div>
</x-card>