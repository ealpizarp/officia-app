
@auth
@if (\Auth::user()->isAdmin())
<a href="/dashboard" class="inline-block text-black ml-4 mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back
</a>
@elseif (\Auth::user()->isUser())
<a 
href="/user" class="inline-block text-black ml-4 mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back
</a>
@else
<a 
href="/" class="inline-block text-black ml-4 mb-2 mt-2"><i class="fa-solid fa-arrow-left"></i> Back
</a>
@endif
@endauth