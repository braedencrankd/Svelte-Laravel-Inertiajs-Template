<script>
  export let text = "";
  export let enabled = false;
</script>

<button
  disabled={!enabled}
  type
  on:click
  class:active={enabled}
  class={`rounded py-2 px-4 font-bold text-white ${
    enabled ? "bg-blue-500 hover:bg-blue-600" : "bg-gray-400"
  }`}
>
  {text}
</button>
