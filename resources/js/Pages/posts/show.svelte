<script>
  import { inertia } from "@inertiajs/inertia-svelte";
  import { page } from "@inertiajs/inertia-svelte";

  let post = $page.props.post;
</script>

<main class="container m-6">
  <h1 class="text-4xl font-bold">Show</h1>

  {post.slug}
</main>
