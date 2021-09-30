<script>
    import router from "page";
    import Login from './pages/Login.svelte';

    let page;

    router('/', () => page = Login);
    router.start();
</script>

<svelte:component this={page} />