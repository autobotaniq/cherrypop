<div class="window js-window is-modal hidden" data-id="signin">
  <a href="#" class="close js-close icon-Close_icon"></a>
  <div class="content-wrapper">
    <h3 class="title">Sign in</h3>
    <form action="#" class="form" id="cpr-login-form">
      <div class="error error_message" style="color:#ff0000;text-align: center;"></div>
      <div class="form-row-wrapper">
        <label for="login-username">Email or Phone Number</label>
        <input type="text" id="login-username" name="login" placeholder="john.smith@gmail.com">
      </div>
      <div class="form-row-wrapper">
        <label for="login-password">Password</label>
        <input type="password" id="login-password" name="password" placeholder="Password">
        <a href="#" class="promt">Forgot password?</a>
      </div>
      <div class="form-row-wrapper">
        <button class="btn btn-green" type="submit">SIGN IN</button>
      </div>
      <div class="form-row-wrapper row justify-content-between">
        <div class="elem">
          <input type="checkbox" name="rememberme" id="login-remember">
          <label for="login-remember">Remember me</label>
        </div>
        <div class="elem">
          <a href="#">Need help?</a>
        </div>
      </div>
      <div class="form-row-wrapper row align-items-center fblogin">
        <img
          src="data:image/png;base64,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"
          alt="Login via Facebook">
        <a href="#">Login via Facebook</a>
      </div>
    </form>
    <div class="form-row-wrapper">
      <p>New to Cherry Pop Radio? <a href="#" class="js-openModal" data-target="register2">SIGN UP</a></p>
    </div>
  </div>
</div>