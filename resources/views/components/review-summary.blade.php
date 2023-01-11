@props(['starsAverage', 'listing'])


<div class="mx-auto bg-gray-100 shadow-lg rounded-lg mt-10 px-4 max-w-sm w-full">
    <div class="mb-1 tracking-wide px-4 py-4">
        <h2 class="text-gray-800 text-center font-semibold mt-1 mb-4">67 Users reviews</h2>
        <div class="border-b -mx-8 px-8 pb-3">
            {{-- @if (count($starsAverage) == 0) --}}
                <div class="flex items-center mt-1">
                    <div class=" w-1/5 text-black tracking-tighter">
                        <span>5 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div class=" w-[0%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-[15px] text-gray-700 pl-3">
                        <span class="text-sm">0%</span>
                    </div>
                </div><!-- first -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter">
                        <span>4 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div class="w-[0%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3">
                        <span class="text-sm">0%</span>
                    </div>
                </div><!-- second -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter">
                        <span>3 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div class=" w-[0%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3">
                        <span class="text-sm">0%</span>
                    </div>
                </div><!-- thierd -->
                <div class="flex items-center mt-1">
                    <div class=" w-1/5 text-black tracking-tighter">
                        <span>2 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div class=" w-[0%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-black pl-3">
                        <span class="text-sm">0%</span>
                    </div>
                </div><!-- 4th -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter">
                        <span>1 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div class=" w-[0%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3">
                        <span class="text-sm">0%</span>
                    </div>
                </div><!-- 5th -->
            {{-- @else --}}
                {{-- <div class="flex items-center mt-1">
                    <div class=" w-1/5 text-black tracking-tighter">
                        <span>5 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[4]->average, 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-[15px] text-gray-700 pl-3">
                        <span class="text-sm">{{ number_format((float) $starsAverage[4]->average, 0) }}%</span>
                    </div>
                </div><!-- first -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter">
                        <span>4 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div
                                class="w-[{{ number_format((float) $starsAverage[3]->average, 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3">
                        <span class="text-sm">{{ number_format((float) $starsAverage[3]->average, 0) }}%</span>
                    </div>
                </div><!-- second -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter">
                        <span>3 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[2]->average, 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3">
                        <span class="text-sm">{{ number_format((float) $starsAverage[2]->average, 0) }}%</span>
                    </div>
                </div><!-- thierd -->
                <div class="flex items-center mt-1">
                    <div class=" w-1/5 text-black tracking-tighter">
                        <span>2 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[1]->average, 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-black pl-3">
                        <span class="text-sm">{{ number_format((float) $starsAverage[1]->average, 0) }}%</span>
                    </div>
                </div><!-- 4th -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter">
                        <span>1 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[0]->average, 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3">
                        <span class="text-sm">{{ number_format((float) $starsAverage[0]->average, 0) }}%</span>
                    </div>
                </div><!-- 5th --> --}}
            {{-- @endif --}}
        </div>

    </div>
    @auth
    <div class="w-full px-4">
        <h3 class="font-medium tracking-tight">Review this item</h3>
        <p class="text-gray-700 text-sm py-1">
            Tell about the experience of this service
        </p>
        <x-reviews-modal></x-reviews-modal>
    </div>
    @endauth
</div>


<script>
    $(function() {
        //twitter bootstrap script
        $("button#submit").click(function() {
            console.log("hey");
            $.ajax({
                type: "POST",
                url: "https://quotesondesign.com/wp-json/posts?filter[orderby]=rand&filter[posts_per_page]=1&callback=",
                //data: $("form.contact").serialize(),
                success: function(msg) {
                    $("#message-text").html(msg);
                    $("#form-content").modal("hide");
                },
                error: function() {
                    alert("failure");
                }
            });
        });
    });
</script>
