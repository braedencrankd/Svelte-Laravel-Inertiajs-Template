<script>
  export let text = "";
  export let enabled = true;
</script>

<button type on:click class:active={enabled} class={$$props.class}>
  {text}
</button>

<style lang="postcss">
  button {
    @apply rounded bg-gray-400 py-2 px-4 font-bold text-white;
  }

  .active {
    @apply bg-blue-500;
  }

  .active:hover {
    @apply bg-blue-600;
  }
</style>
