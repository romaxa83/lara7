<template>
    <div class="bg-gray-100 h-screen" style="min-height: 500px;">
    
    <div @keydown.window.escape="open = false; setTimeout(() => open = true, 1000);" class="fixed inset-0 overflow-hidden">
      <div class="absolute inset-0 overflow-hidden">
        <section @click.away="open = false; setTimeout(() => open = true, 1000);" class="absolute inset-y-0 right-0 pl-10 max-w-full flex sm:pl-16" aria-labelledby="slide-over-heading">
          <transition enter-active-class="transform transition ease-in-out duration-500 sm:duration-700" enter-class="translate-x-full" enter-to-class="translate-x-0" leave-active-class="transform transition ease-in-out duration-500 sm:duration-700" leave-class="translate-x-0" leave-to-class="translate-x-full"><div class="w-screen max-w-2xl" x-description="Slide-over panel, show/hide based on slide-over state." v-if="open">
            <div class="h-full flex flex-col py-6 bg-white shadow-xl overflow-y-scroll">
              <div class="px-4 sm:px-6">
                <div class="flex items-start justify-between">
                  <h2 id="slide-over-heading" class="text-lg font-medium text-gray-900">
                    Panel title
                  </h2>
                  <div class="ml-3 h-7 flex items-center">
                    <button @click="open = false; setTimeout(() => open = true, 1000);" class="bg-white rounded-md text-gray-400 hover:text-gray-500 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                      <span class="sr-only">Close panel</span>
                      <svg class="h-6 w-6" x-description="Heroicon name: outline/x" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"></path>
  </svg>
                    </button>
                  </div>
                </div>
              </div>
              <div class="mt-6 relative flex-1 px-4 sm:px-6">
                <!-- Replace with your content -->
                <div class="absolute inset-0 px-4 sm:px-6">
                  <div class="h-full border-2 border-dashed border-gray-200" aria-hidden="true"></div>
                </div>
                <!-- /End replace -->
              </div>
            </div>
          </div></transition>
        </section>
      </div>
    </div>

    </div>
</template>

<script>
export default {
  data: () => ({
	open: true,
  })
}
</script>
