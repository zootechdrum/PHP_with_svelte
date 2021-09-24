<script>
  export let users

  function removeUser(user) {
    users = users.filter(u => u.id !== user.id)
  }
</script>

<style>
  .contact-card {
    padding:10px;
    box-shadow: 0 2px 8px rgba(0, 0, 0, 0.26);
    max-width: 30rem;
    border-radius: 5px;
    margin: 1rem 0;
  }

  header {
    display: flex;
    justify-content: space-between;
    align-items: center;
  }

  .thumb {
    width: 33%;
    height: 100%;
  }

  img {
    width: 100%;
    height: 100%;
    object-fit: cover;
  }

  .user-data {
    width: 67%;
    display: flex;
    flex-direction: column;
    justify-content: center;
  }

  h1 {
    font-size: 1.25rem;
    font-family: "Roboto Slab", sans-serif;
    margin: 0.5rem 0;
  }

  h2 {
    font-size: 1rem;
    font-weight: normal;
    color: #5a5a5a;
    margin: 0;
    margin-bottom: 0.5rem;
  }

  .description {
    border-top: 1px solid #ccc;
    padding: 1rem;
  }
  
  .redText {
      color:red;
  }
  .contact-card:not(:first-child) {
    margin-top:4px;
  }
  .card-btn-container {
    display: flex;
    justify-content: end;
    margin-right:3px;
    margin-bottom:13px;
  }
</style>
<div>
  {#each users as user}
  <div class="contact-card">
  <header>
    <div class="thumb">
      <img src="{user.imageSource}" alt="{user.imageSource}" />
    </div>
    <div class="user-data">
      <h1>{user.name}</h1>
      <h2>{user.jobTitle}</h2>
    </div>
  </header>
  <div class="description">
    <p class="{user.courseGoal.includes("!") ? "redText" : ""}">{user.courseGoal}</p>
  </div>
  <div class="card-btn-container">
    <button on:click={e => removeUser(user)}>Remove User</button>
  </div>
</div>
  {/each}
</div>
