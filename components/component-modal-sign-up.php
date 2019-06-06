<div class="window js-window is-modal hidden" data-id="register2">
  <a href="#" class="close js-close icon-Close_icon"></a>
  <div class="content-wrapper">
    <h3 class="title steps">Sign up&nbsp;<span class="sup">1/<span>3</span></span></h3>
    <form action="#" class="form" id="cpr-registration-form">
      <div class="form-row-wrapper">
        <label for="register-username">Email or Phone Number</label>
        <input type="text" id="register-username" name="login" placeholder="john.smith@gmail.com" required>
      </div>
      <div class="form-row-wrapper">
        <label for="register-password">Password</label>
        <input type="password" id="register-password" name="password" placeholder="Password" required>
      </div>
      <div class="form-row-wrapper">
        <label for="register-password-repeat">Password again</label>
        <input type="password" id="register-password-repeat" name="password-repeat" placeholder="Password" required>
      </div>
      <div class="form-row-wrapper">
        <button class="btn btn-green js-openModal" data-target="register3">SEE THE PLANS</button>
      </div>
      <div class="form-row-wrapper">
        <p><i class="icon-check green"></i> We'll remind you three days before your trial ends</p>
        <p><i class="icon-check green"></i> No commitments, cancel anytime</p>
      </div>
    </form>
  </div>
</div>

<div class="window larger js-window small-bezel is-modal hidden" data-id="register3">
  <a href="#" class="close js-close icon-Close_icon"></a>
  <div class="content-wrapper">
    <h3 class="title steps">Sign up&nbsp;<span class="sup">2/<span>3</span></span></h3>
    <form action="#" class="form cpr-pricing-plan">
      <div class="error error_message" style="color:#ff0000;text-align: center;"></div>
      <div class="form-radiorow-wrapper">
        <label for="price-basic">
          <span class="radio">
            <input type="radio" name="pricingPlan" id="price-basic" value="basic">
            <span class="title">Basic</span>
          </span>
          <span class="desc">
            <p>FREE to listen to our 70+ music stations</p>
          </span>
        </label>
      </div>
      <div class="form-radiorow-wrapper">
        <label for="price-standart">
          <span class="radio">
            <input type="radio" name="pricingPlan" id="price-standart" value="standart">
            <span class="title">Standart</span>
            <span class="price green">$0.99</span>
          </span>
          <span class="desc">
            <p>
              Access to all our stations<br>
              Saving favorites and create your own shareable playlists<br>
              You can skip songs <br>
              Search our library for genres, songs or artists<br>
              Make suggestions and if licensing permits, we will get it
              added to the library
            </p>
          </span>
        </label>
      </div>
      <div class="form-radiorow-wrapper">
        <label for="price-business">
          <span class="radio">
            <input type="radio" name="pricingPlan" id="price-business" value="business">
            <span class="title">Business</span>
            <span class="price green">$2.99</span>
          </span>
          <span class="desc">
            <p>
              All STANDARD features
              <ul class="green-plus-style">
                <li>Submit short (up to 30sec) commercial/info that we will upload onto your channel(s)</li>
              </ul>
            </p>
          </span>
        </label>
      </div>
      <div class="form-radiorow-wrapper">
        <label for="price-premium">
          <span class="radio">
            <input type="radio" name="pricingPlan" id="price-premium" value="premium">
            <span class="title">Premium</span>
            <span class="price green">$4.99</span>
          </span>
          <span class="desc">
            <p>
              All STANDARD features
              <ul class="green-plus-style">
                <li>Submit short (up to 30sec) commercial/info that we will upload onto your channel(s)</li>
                <li>XXX Radio</li>
                <li>All access to our live videos of our talk and XXX Broadcasts (coming soon)</li>
              </ul>
            </p>
          </span>
        </label>
      </div>
      <div class="form-row-wrapper">
        <button class="btn btn-green cpr_registration-button">Choose Plan</button>
      </div>
    </form>
  </div>
</div>