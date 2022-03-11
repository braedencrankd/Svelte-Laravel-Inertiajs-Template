<script>
  import { inertia } from "@inertiajs/inertia-svelte";
  import { page } from "@inertiajs/inertia-svelte";

  let posts = $page.props.posts;
  let user = $page.props.user;
</script>

<div class="bg-gray-50 p-3 shadow-md">
  <a class="hover:underline" href="login" use:inertia>Login</a>
</div>

<main class="flex h-screen flex-col justify-center gap-6">
  <h1 class="text-center text-4xl font-bold text-orange-500">
    Welcome {user != null ? user.name : "Guest"}
  </h1>
  <div class="text-center text-4xl">🎉 🙌</div>
</main>
