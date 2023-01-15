@props(['user'])

<x-card>
    <div class="flex justify-between">
        {{-- <img class="hidden w-48 mr-6 rounded-lg xl:block"
            src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
            alt="" /> --}}

        <x-user-info :user="$user"> </x-user-info>


        @auth
            @if (Auth::user()->isAdmin())
                <form method="POST" action="/users/ban/{{ $user->id }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="flex flex-row gap-8">
                        <label class="relative cursor-pointer">
                            <input id="free_diagnosis" name="free_diagnosis" onchange="this.form.submit()" type="checkbox"
                                value="1" class="sr-only peer" onchange="checkboxState()"
                                @if ($user->available == 0) checked @endif>
                            <div
                                class="w-11 h-6 bg-gray-200 rounded-full peer peer-focus:ring-4 peer-focus:ring-blue-300 dark:peer-focus:ring-blue-800 dark:bg-gray-700 peer-checked:after:translate-x-full peer-checked:after:border-white after:content-[''] after:absolute after:top-0.5 after:left-[2px] after:bg-white after:border-gray-300 after:border after:rounded-full after:h-5 after:w-5 after:transition-all dark:border-gray-600 peer-checked:bg-blue-600">
                            </div>
                            <span class="ml-3 text-sm font-medium text-gray-900 dark:text-gray-300">Ban</span>
                            @error('free_diagnosis')
                                <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                            @enderror
                        </label>

                </form>
                <div class="flex flex-col gap-y-1.5">
                    <a href="/users/{{ $user->id }}/edit">
                        <i class="fa-solid fa-pencil"></i> Edit
                    </a>
                    <form method="POST" action="/users/{{ $user->id }}">
                        @csrf
                        @method('DELETE')
                        <button class="text-red-500"><i class="fa-solid fa-trash"></i>
                            Delete</button>
                    </form>
                </div>
        </div>
        @endif
    @endauth
    {{-- <img class="hidden w-48 ml-6 rounded-lg lg:block"
        src={{ $listing->image ? asset('storage/' . $listing->image) : asset('./images/no-image.png') }}
        alt="" /> --}}
    </div>
</x-card>
