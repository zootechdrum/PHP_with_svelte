<script>

</script>


<div class="container">
    <div class="login-card">
        <div>
            <img class="fleetwood-logo" src="./img/fleetwood-logo.png" alt="fleetwood-logo">
        </div>
        <h1 class="login-card-title">SNAPCLOUD </h1>
        <div class="cloud-container">
            <img class="snap-cloud-icon" src="./img/cloud.png" alt="icon of a cloud">
        </div>
        <div class="input-container">
        <div class="field">
            <input type="text">
            <label for="name">username:</label>
            <div class="line"></div>
        </div>
        <div>
            <input type="text" placeholder="Password">
        </div>
        </div>
        <div>
            <button class="submit-button" type="submit">Sign in</button>
        </div>
    </div>
</div>

<style>
  .container {
      font-family:'Oswald', sans-serif;
      font-weight: 200;
      height:100vh;
      align-items: center;
      justify-content:center;
      vertical-align: center;
      margin-top:-40px;
      display:flex;
  }
  .submit-button {
      margin-top:10%;
      width:70%;
      text-transform: uppercase;
      font-size: 22px;
      letter-spacing: 2px;
      background-color:rgba(30,71,146,1);
      border-color:rgba(30,71,146,1)
  }
  .input-container {
      height:15%;
      display:flex;
      flex-direction: column;
      justify-content: space-between;
  }
  .cloud-container {
      height:6rem;
      justify-content:center;
      align-items: center;
      display: flex;
  }
  .snap-cloud-icon {
      height:60px;
  }
  .fleetwood-logo {
      height:150px;
      width:300px;
  }
  .login-card{
      text-align: center;
      flex-direction:column;
      display:flex;
      height:700px;
      padding:20px;
      box-sizing:border-box;
      border:1px solid rgba(0,0,0,0.5);
      width:500px;
      color:rgba(255,255,255,0.3);
      min-width:445px;
      box-shadow: 3px 50px 30px rgba(0,75,117,0.25);
      }
      .login-card-title {
          color:rgba(0,0,0,0.5);
          font-weight: 200;
          letter-spacing: 3px;
      }
      input[type=text] {
          border:none;
          border-bottom: 2px solid black;
          width:70%;
      }
      input:focus {
          outline:none;
          padding-bottom:5px;
      }
      .field {
          position:relative;
      }
      label {
          font-weight: 300;
          position:absolute;
          top:0;
          left:15%;
          color:#000;
          transition: 0.2s all;
          cursor:text;
          font-weight: 300;
          letter-spacing: 1px;
          text-transform: uppercase;
          font-size: 13px;;
      }
      input:focus~label {
          font-size:12px;
          top:-24px;
          color:#7F3356;
          /* color:rgba(30,71,146,1); */
      }
      input::placeholder {
          letter-spacing: 1px;
          font-family: 'Oswald';
          font-weight: 300;
          text-transform: uppercase;
      }
      .field {
          position:relative;
      }


</style>
