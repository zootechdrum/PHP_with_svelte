<script>
        async function verifyCredentials() {
            const res = await fetch("http://localhost/svel/api/index.php?url=Users/index", {
                headers:{'Content-Type': 'application/json'},
                method:'GET',
            })
            const json = await res.json();
            console.log(json);
        }


</script>


<div class="container">
    <form on:submit|preventDefault={verifyCredentials}>
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
                <input type="text" id="name">
                <label for="name">username:</label>
            </div>
            <div class="field">
                <input type="password" id="password">
                <label for="password">password:</label>
            </div>
            </div>
            <div>
                <button class="submit-button" type="submit">Sign in</button>
            </div>
        </div>
    </form>
</div>

<style type="text/scss">
    @import '../styles/vars.scss';
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
      margin-top:14%;
      width:70%;
      text-transform: uppercase;
      font-size: 22px;
      letter-spacing: 2px;
      background-color: $fleetwood-blue;
      border-color: $fleetwood-blue;
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
      height:650px;
      padding:20px;
      box-sizing:border-box;
      border:1px solid rgba(0,0,0,0.5);
      width:30rem;
      color:rgba(255,255,255,0.3);
      min-width:445px;
      box-shadow: $box-shadow-val;
      }
      .login-card-title {
          color:rgba(0,0,0,0.5);
          font-weight: 200;
          letter-spacing: 3px;
      }
      input[type=text], input[type=password] {
          border:none;
          border-bottom: 2px solid black;
          width:70%;
          background: transparent;
      }
      input:focus {
          outline:none;
          padding-bottom:5px;
          border-bottom:2px solid $input-btm-brd-color;
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
          transition: 0.3s all;
          cursor:text;
          font-weight: 300;
          letter-spacing: 1px;
          text-transform: uppercase;
          font-size: 14px;
          transition: 0.2s all;
          z-index:-1;
      }
      input:focus~label {
          font-size:12px;
          top:-24px;
          color:#7F3356;
      }
      input:-webkit-autofill {
          height: 25px;
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
