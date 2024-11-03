<div
{{ $attributes }}
        x-transition:enter="ease-in transform"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="ease-in transform"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
class="container flex flex-col mx-auto rounded-lg pt-12 my-5">
    <div class="flex justify-center w-fit h-w-fit m-auto xl:gap-14 lg:justify-normal md:gap-5 draggable bg-white p-10 rounded-lg">
     <div class="flex items-center justify-center w-full lg:p-12">
       <div class="flex items-center xl:p-10">
            {{ $slot }}
       </div>
     </div>
    </div>
  </div>
