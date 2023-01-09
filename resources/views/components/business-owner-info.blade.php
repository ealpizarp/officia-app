@props(['listing', 'address'])

    <div class="flex flex-row justify-between mt-28 mb-28">

    <div class="relative mx-10 max-w-md md:max-w-2xl mt-20 min-w-0 break-words bg-gray-100 w-full mb-6 shadow-lg rounded-xl mt-16">
        <div class="px-6">
            <div class="flex flex-wrap justify-start">
                <div class="w-full flex justify-center">
                    <div class="relative">
                        <img src="https://placeimg.com/192/192/people" class="shadow-xl rounded-full align-middle border-none absolute -m-16 -ml-20 lg:-ml-16 max-w-[150px]"/>
                    </div>
                </div>

            </div>
            <div class="text-center mt-24">
                <h3 class="text-2xl text-slate-700 font-bold leading-normal mb-1">{{$listing->user->name}} {{$listing->user->last_names}}</h3>
                <div class="text-xs mt-0 mb-2 text-slate-400 font-bold uppercase">
                    <i class="fas fa-star text-slate-400 opacity-75 mr-1.5"></i>Ratng
                </div>
            </div>
            <div class="mt-6 py-6 border-t border-slate-200 text-center">
                <div class="flex flex-wrap justify-center">
                    <div class="w-full px-4">
                        <p class="font-light leading-relaxed text-slate-600 mb-4">{{$listing->reasons_to_choose}}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="mx-auto bg-gray-100 shadow-lg rounded-lg mt-10 px-4 max-w-sm ">
        <div class="mb-1 tracking-wide px-4 py-4" >
           <h2 class="text-gray-800 font-semibold mt-1 mb-4">67 Users reviews</h2>
           <div class="border-b -mx-8 px-8 pb-3">
              <div class="flex items-center mt-1">
                 <div class=" w-1/5 text-black tracking-tighter">
                    <span>5 star</span>
                 </div>
                 <div class="w-3/5">
                    <div class="bg-gray-300 w-full rounded-lg h-2">
                       <div class=" w-7/12 bg-yellow-500 rounded-lg h-2"></div>
                    </div>
                 </div>
                 <div class="w-1/5 text-gray-700 pl-3">
                    <span class="text-sm">51%</span>
                 </div>
              </div><!-- first -->
              <div class="flex items-center mt-1">
                 <div class="w-1/5 text-black tracking-tighter">
                    <span>4 star</span>
                 </div>
                 <div class="w-3/5">
                    <div class="bg-gray-300 w-full rounded-lg h-2">
                       <div class="w-1/5 bg-yellow-500 rounded-lg h-2"></div>
                    </div>
                 </div>
                 <div class="w-1/5 text-gray-700 pl-3">
                    <span class="text-sm">17%</span>
                 </div>
              </div><!-- second -->
              <div class="flex items-center mt-1">
                 <div class="w-1/5 text-black tracking-tighter">
                    <span>3 star</span>
                 </div>
                 <div class="w-3/5">
                    <div class="bg-gray-300 w-full rounded-lg h-2">
                       <div class=" w-3/12 bg-yellow-500 rounded-lg h-2"></div>
                    </div>
                 </div>
                 <div class="w-1/5 text-gray-700 pl-3">
                    <span class="text-sm">19%</span>
                 </div>
              </div><!-- thierd -->
              <div class="flex items-center mt-1">
                 <div class=" w-1/5 text-black tracking-tighter">
                    <span>2 star</span>
                 </div>
                 <div class="w-3/5">
                    <div class="bg-gray-300 w-full rounded-lg h-2">
                       <div class=" w-1/5 bg-yellow-500 rounded-lg h-2"></div>
                    </div>
                 </div>
                 <div class="w-1/5 text-black pl-3">
                    <span class="text-sm">8%</span>
                 </div>
              </div><!-- 4th -->
              <div class="flex items-center mt-1">
                 <div class="w-1/5 text-black tracking-tighter">
                    <span>1 star</span>
                 </div>
                 <div class="w-3/5">
                    <div class="bg-gray-300 w-full rounded-lg h-2">
                       <div class=" w-2/12 bg-yellow-500 rounded-lg h-2"></div>
                    </div>
                 </div>
                 <div class="w-1/5 text-gray-700 pl-3">
                    <span class="text-sm">5%</span>
                 </div>
              </div><!-- 5th -->
           </div>
        </div>
        <div class="w-full px-4">
           <h3 class="font-medium tracking-tight">Review this item</h3>
           <p class="text-gray-700 text-sm py-1">
              give your opinion about this item.
           </p>
           <button class="bg-gray-100 border border-gray-400 px-3 py-1 rounded  text-gray-800 mt-2">write a review</button>
        </div>
     </div>


</div>

