<script>
  import { inertia } from "@inertiajs/inertia-svelte";
  import ApplicationLogo from "@/Components/ApplicationLogo.svelte";
</script>

<div
  class="flex min-h-screen flex-col items-center bg-gray-100 pt-6 sm:justify-center sm:pt-0"
>
  <div>
    <a href="/" use:inertia>
      <ApplicationLogo class="h-20 w-20 fill-current text-gray-500" />
    </a>
  </div>
  <div
    class="mt-6 w-full overflow-hidden bg-white px-6 py-4 shadow-md sm:max-w-md sm:rounded-lg"
  >
    <slot />
  </div>
</div>
