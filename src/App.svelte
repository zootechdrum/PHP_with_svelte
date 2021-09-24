<script>
  import {v4 as uuidv4} from 'uuid';
  import router from "page";
  import ContactCard from "./ContactCard.svelte";
  import Home from "./Home.svelte"

  let id;
  let name = "Users";
  let courseGoal = "";
  let jobTitle = "computer";
  let formData = "invalid";
  let message = '';
  let imageSource = "https://w7.pngwing.com/pngs/656/402/png-transparent-red-triangle-illustration-geometric-shape-geometry-geometric-graphic-material-text-photography-triangle-thumbnail.png"
  $: users = [];
  $: uppercaseName = name.toUpperCase();

  function nameInput(event) {
    const enteredValue = event.target.value;
    name = enteredValue;
  }
  function onSubmit() {
    if(name.trim().length === 0 ||
       jobTitle.trim().length === 0 ||
       courseGoal.trim().length === 0 ||
       imageSource.trim().length === 0   
    ) {
      formData = 'invalid'
      message = 'Form data is incomplete'
    } else {
      id = uuidv4();
      users = [...users,{id,name,jobTitle,courseGoal,imageSource}];
      formData = 'complete';
    }
  }

</script>

<style>
  h1 {
    color: purple;
  }

  input[type=text] {
    border:none;
    border-bottom: 2px solid red;
    padding: 12px 20px;
    box-sizing:border-box;
    margin-top:5px;
    width:100%;
  }

  .container {
    display:grid;
    grid-template-rows: repeat(4, 100px);
    grid-template-columns: repeat(3,1fr);
  }
  .contact-card {
    grid-row-start: span 4;
  }
  .form-inputs {
    grid-column: span 2;
  }

  button[type="submit"] {
    margin-top: 5px;
  }
</style>
<div class="container">
  <div class="contact-card">
    <Home />
    <ContactCard bind:users/>
  </div>
  <!-- <h1>Hello {uppercaseName}, my age is {age}! -->
    <!-- <button on:click={incrementAge}>Change Age</button> -->
    <div>
  <form class="form-inputs" on:submit|preventDefault={onSubmit}>
    <div>
      <input type="text" bind:value={imageSource} placeholder="Please enter link to source image" />
    </div>
    <div>    
      <input type="text" bind:value={name} />
    </div>
    <div>
    <input type="text" bind:value={courseGoal} placeholder="Please enter course goal" />
    </div>
    <input type="text" bind:value={jobTitle} placeholder="Please enter job title" />
    <div>
    <button type="submit">Add User</button>
    </div>
    </form>
    {#if formData === 'invalid'}
      <h5>{message}</h5>
      {:else}
     <p></p> 
    {/if}
  </div>
</div>