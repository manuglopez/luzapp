<div class="mt-3 mb-3 flex flex-col p-5 md:flex-row">
    {{--precio minimo--}}
    <div class="m-2 divide-y divide-gray-200 overflow-hidden rounded-t-xl bg-white text-center shadow">
        <div class="bg-pink-900 px-4 py-5 text-2xl tracking-wide text-white sm:px-6">
            Precio Min
        </div>
        <div class="flex flex-row bg-green-300 px-4 py-5 sm:p-6">
                        <span class="inline">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6 text-green-700" fill="none" viewBox="0 0 24 24" stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 17l-4 4m0 0l-4-4m4 4V3" />
</svg>
                        </span>
            <span class="inline text-2xl text-green-700">
                            {{$minPrice}}
                        </span>

        </div>
    </div>
    {{--precio medio--}}
    <div class="m-2 divide-y divide-gray-200 overflow-hidden rounded-t-xl bg-white text-center shadow">
        <div class="bg-pink-900 px-4 py-5 text-2xl tracking-wide text-white sm:px-6">
            Precio Medio
        </div>
        <div class="bg-yellow-200 px-4 py-5 text-2xl sm:p-6">
            {{$averagePrice}}
        </div>
    </div>
    {{--precio Max--}}
    <div class="m-2 divide-y divide-gray-200 overflow-hidden rounded-t-xl bg-white text-center shadow">
        <div class="bg-pink-900 px-4 py-5 text-2xl tracking-wide text-white sm:px-6">
            Precio Max
        </div>
        <div class="flex flex-row bg-red-300 px-4 py-5 sm:p-6">
                        <span class="inline text-red-800">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-6 w-6" fill="none" viewBox="0 0 24 24"
                                 stroke="currentColor">
  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7l4-4m0 0l4 4m-4-4v18"/>
</svg>
                        </span>
            <span class="inline text-2xl">{{$maxPrice}} </span>
        </div>
    </div>
</div>
