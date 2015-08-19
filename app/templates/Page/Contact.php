<section class="container_12 clearfix">
  <div class="grid_8 contact_form clearfix">
    <h4><?php echo $page->getParameterById($lng, $page->getIdByRewrite($lng, $lvl1), 'name'); ?></h4>
    <p>Praesent tempus egestas blandit. Nunc euismod volutpat ultrices. Nam fermentum nibh eget mi vehicula dictum.</p>
    <form action="?" enctype="application/x-www-form-urlencoded" method="post">
      <label for="name" class="dropdown_label">Vaše jméno</label>
      <input id="name" class="input" type="text" name="name" value="">
      <label for="email" class="dropdown_label">Váš email</label>
      <input id="email" class="input" type="text" name="email" value="">
      <label for="message" class="dropdown_label">Zpráva</label>
      <textarea id="message" class="textarea" rows="8" name="message"></textarea>
      <script type="text/javascript">
        var RecaptchaOptions = {
          theme : 'custom',
          custom_theme_widget: 'recaptcha_widget'
        };
      </script>
      <div id="recaptcha_widget" style="display:none">
        <div class="captcha">
          <div id="recaptcha_image"></div>
          <div class="recaptcha_reload"><a href="javascript:Recaptcha.reload()"><img src="<?php echo PATH_IMAGE; ?>reCaptcha_reload.png" alt="Reload"></a></div>
          <div class="recaptcha_only_if_image"><a href="javascript:Recaptcha.switch_type('audio')"><img src="<?php echo PATH_IMAGE; ?>reCaptcha_audio.png" alt="Audio code"></a></div>
          <div class="recaptcha_only_if_audio"><a href="javascript:Recaptcha.switch_type('image')"><img src="<?php echo PATH_IMAGE; ?>reCaptcha_image.png" alt="Image code"></a></div>
          <div class="recaptcha_help"><a href="javascript:Recaptcha.showhelp()"><img src="<?php echo PATH_IMAGE; ?>reCaptcha_help.png" alt="Show help"></a></div>
        </div>
        <input id="recaptcha_response_field" class="input" type="text" placeholder="Enter the words above (reCaptcha anti-spam)" name="recaptcha_response_field" value="">
      </div>
      <script type="text/javascript"
      src="http://www.google.com/recaptcha/api/challenge?k=6Lcrl-ESAAAAADkvAs6ZQ6NCYqMXpp-ucPexvRgl">
      </script>
      <noscript>
        <iframe src="http://www.google.com/recaptcha/api/noscript?k=6Lcrl-ESAAAAADkvAs6ZQ6NCYqMXpp-ucPexvRgl"
        height="300" width="500" frameborder="0"></iframe><br>
        <textarea name="recaptcha_challenge_field" rows="3" cols="40">
        </textarea>
        <input type="hidden" name="recaptcha_response_field"
        value="manual_challenge">
      </noscript>
      <button id="contact-submit" class="button red right" type="submit">Submit</button>
    </form>
    <div class="submit_note">
    </div>
  </div>
  <div class="grid_4 sidebar">
    <div class="box">
      <h3>Online Support</h3>
      <div class="box-content widget_online_support">
        <div class="row">
          <img src="<?php echo PATH_IMAGE; ?>johnsdoe.jpg" alt="" class="span6">
          <div class="span6">
            <span class="online_support_title">John S. Doe</span>
            <p>Integer nisl nunc, porta id sodales et, pulvinar et risus.</p>
        </div></div>
        <a href="#" class="button blue big wide"><i class="icomoon-volume-medium"></i>+1 (555) 555 - 35 - 55</a>
        <a href="#">Contact Support Team</a><br>
        <a href="#" class="link_light_gray">Learn more about <strong>Motor</strong></a>
      </div>
    </div>
  </div>
</section>
