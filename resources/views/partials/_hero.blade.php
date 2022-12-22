        <!-- Hero -->
        <section
            class="relative h-72 flex flex-col justify-center align-center text-center items-center space-y-4 mb-4"
        >
            <div
                class="absolute top-0 left-0 w-full h-full bg-no-repeat bg-cover bg-fixed rounded-b-3xl"
                style="background-color: rgba(2, 109, 133, 0.40)">
            </div>

            <div class="relative z-10">
                <h1 class="relative text-6xl font-bold uppercase text-white">
                    O<span class="text-gray-700">FFICIA</span>
                </h1>
                <p class="text-2xl font-bold text-white font-bold my-4">
                    What service are you looking for today?
                </p>
                {{-- <div>
                    <a
                        href="register.html"
                        class="inline-block border-2 border-white text-white py-2 px-4 rounded-xl uppercase mt-2 hover:text-black hover:border-black"
                        >Sign Up to List your property</a
                    >
                </div> --}}
            </div>

            
            <div class=" relative w-3/4">
                @include('partials._search')
            </div>
            
        </section>