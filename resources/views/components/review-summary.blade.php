@props(['starsAverage', 'numReviews'])

{{-- {{dd($starsAverage[1])}} --}}

<div class="mx-auto bg-gray-100 shadow-lg rounded-lg mt-10 px-4 max-w-sm w-full dark:bg-gray-500">
    <div class="mb-1 tracking-wide px-4 py-4">
        <h2 class="text-gray-800 text-center font-semibold mt-1 mb-4 dark:text-gray-900">{{$numReviews}} Users reviews</h2>
        <div class="border-b dark:border-gray-800 -mx-8 px-8 pb-3">
                <div class="flex items-center mt-1">
                    <div class=" w-1/5 text-black text-gray-700 tracking-tighter dark:text-gray-900">
                        <span>5 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full text-gray-700 rounded-lg h-2 dark:bg-gray-700">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[5], 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-[15px] text-gray-700 pl-3 dark:text-gray-900">
                        <span class="text-sm">{{ number_format((float) $starsAverage[5], 0) }}%</span>
                    </div>
                </div><!-- first -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter text-gray-700 dark:text-gray-900">
                        <span>4 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2 dark:bg-gray-700">
                            <div
                                class="w-[{{ number_format((float) $starsAverage[4], 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3 dark:text-gray-900">
                        <span class="text-sm">{{ number_format((float) $starsAverage[4], 0) }}%</span>
                    </div>
                </div><!-- second -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter text-gray-700 dark:text-gray-900">
                        <span>3 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2 text-gray-700  dark:bg-gray-700">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[3], 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3 dark:text-gray-900">
                        <span class="text-sm">{{ number_format((float) $starsAverage[3], 0) }}%</span>
                    </div>
                </div><!-- thierd -->
                <div class="flex items-center mt-1">
                    <div class=" w-1/5 text-black tracking-tighter text-gray-700 dark:text-gray-900">
                        <span>2 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2 text-gray-700 dark:bg-gray-700">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[2], 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-black pl-3 text-gray-700 dark:text-gray-900">
                        <span class="text-sm">{{ number_format((float) $starsAverage[2], 0) }}%</span>
                    </div>
                </div><!-- 4th -->
                <div class="flex items-center mt-1">
                    <div class="w-1/5 text-black tracking-tighter text-gray-700 dark:text-gray-900">
                        <span>1 star</span>
                    </div>
                    <div class="w-3/5">
                        <div class="bg-gray-300 w-full rounded-lg h-2 dark:bg-gray-700">
                            <div
                                class=" w-[{{ number_format((float) $starsAverage[1], 0) }}%] bg-yellow-500 rounded-lg h-2">
                            </div>
                        </div>
                    </div>
                    <div class="w-1/5 text-gray-700 pl-3 dark:text-gray-900">
                        <span class="text-sm">{{ number_format((float) $starsAverage[1], 0) }}%</span>
                    </div>
                </div><!-- 5th -->
        </div>

    </div>
    <div class="w-full px-4">
        <h3 class="font-medium tracking-tight dark:text-gray-800">Review this item</h3>
        <p class="text-gray-700 text-sm py-1 dark:text-gray-800">
            Tell about the experience of this service
        </p>
        <x-reviews-modal></x-reviews-modal>
    </div>
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
