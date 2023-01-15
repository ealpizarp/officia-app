
@auth
@if (\Auth::user()->isAdmin())
<a href="/dashboard" class="inline-block text-black border border-gray-200 ml-4 mb-2 mt-2.5 p-2 text-gray-700 bg-highlight_blue hover:bg-cyan-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center mr-2 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-arrow-left"></i> Back
</a>
@elseif (\Auth::user()->isUser())
<a 
href="/user" class="inline-block text-black border-gray-200 ml-4 mb-2 mt-2.5 p-2 text-gray-700 bg-highlight_blue hover:bg-cyan-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center mr-2 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-arrow-left"></i> Back
</a>
@endif
@else
<a 
href="/" class="inline-block text-black border-gray-200 ml-4 mb-2 mt-2.5 p-2 text-gray-700 bg-highlight_blue hover:bg-cyan-600 focus:ring-4 focus:outline-none focus:ring-blue-300 font-medium rounded-lg text-sm text-center inline-flex items-center mr-2 dark:focus:ring-gray-700 dark:bg-gray-800 dark:text-gray-400 dark:border-gray-600 dark:hover:text-white dark:hover:bg-gray-700"><i class="fa-solid fa-arrow-left"></i> Back
</a>
@endauth