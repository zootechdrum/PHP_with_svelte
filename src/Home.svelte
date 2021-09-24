<script>
    import {onMount} from "svelte";
    const dateUrl = `${HOST}svel/api/index.php?url=Users/index`;

    let items = [];
    const fetchData = async () => {
        const response = await fetch(dateUrl);
        const data =  await response.json();
            console.log(data);
        
        // items = data['articles'];
    }

    onMount(fetchData);


</script>

<style>
    .conatiner  {
        display:grid;
        grid-template-columns:repeat(auto-fill,minmax(1fr, 1fr));
        grid-gap:15px
    }
</style>
    

<div class="conatiner">
        {#each items as item}
            <div class="card">
                <img src="{item.urlToImage}" alt="news article"/>
                <div class="card-body">
                    <h3>{item.title}</h3>
                    <p>{item.description}</p>
                    <a href="{item.url}">Read</a>
                </div>
            </div>
        {/each}
    </div>