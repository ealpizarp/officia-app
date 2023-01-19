@props(['listing'])

<x-card class="mt-4 p-2 flex space-x-6">
    <a href="/listings/{{ $listing->id }}/edit">
        <i class="fa-solid fa-pencil"></i> Edit
    </a>

    <form method="POST" action="/listings/{{ $listing->id }}">
        @csrf
        @method('DELETE')
        <button class="text-red-500"><i class="fa-solid fa-trash"></i>
            Delete</button>
    </form>

</x-card>
