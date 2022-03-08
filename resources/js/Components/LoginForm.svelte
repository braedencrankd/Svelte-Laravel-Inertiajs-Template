<script>
  import Button from "../Components/Button.svelte";
  import { useForm } from "@inertiajs/inertia-svelte";
  // import { route } from "@/utils";

  let route = window.route;

  let form = useForm({
    email: "johndoe@example.com",
    password: "secret",
    remember: false,
  });

  $: submitEnabled = $form.email !== "" && $form.password !== "" ? true : false;

  function login() {
    $form.post(route("login.store"));
  }
</script>

<form on:submit|preventDefault={login}>
  <div class="mb-4">
    <label class="text-grey-darker mb-2 block text-sm font-bold" for="email">
      Email
    </label>
    <input
      bind:value={$form.email}
      class="text-grey-darker w-full appearance-none rounded border py-2 px-3 shadow"
      id="email"
      type="email"
      name="email"
      placeholder="Email"
    />
  </div>
  <div class="mb-6">
    <label class="text-grey-darker mb-2 block text-sm font-bold" for="password">
      Password
    </label>
    <input
      bind:value={$form.password}
      class="border-red text-grey-darker mb-3 w-full appearance-none rounded border py-2 px-3 shadow"
      id="password"
      type="password"
      placeholder="******************"
    />
    <div class="flex flex-col">
      <p class="text-red mt-6 text-xs italic">Please choose a password.</p>
      <label class="mt-6 flex select-none items-center" for="remember">
        <input
          id="remember"
          bind:checked={$form.remember}
          class="mr-1"
          type="checkbox"
        />
        <span class="text-sm">Remember Me</span>
      </label>
    </div>
  </div>
  <div class="flex items-center justify-between">
    <Button enabled={submitEnabled} type="submit" text="Sign in" />
    <a
      class="text-blue hover:text-blue-darker inline-block align-baseline text-sm font-bold"
      href="/"
    >
      Forgot Password?
    </a>
  </div>
</form>
