<?php require_once './views/layout/header.php'; ?>
    <!-- Start Header Area -->
 <?php require_once './views/layout/menu.php'; ?>  


 <div class="container">
    <div class="row"><div class="col-lg-6">
        <div class="contact-message">
          <h4 class="contact-title">Tell Us Your Project</h4><form method="post" action="/contact#contact_form" id="contact_form" accept-charset="UTF-8" class="contact-form" data-persist-bound="true"><input type="hidden" name="form_type" value="contact"><input type="hidden" name="utf8" value="✓">

<div class="row">
  <div class="col-lg-6 col-md-6 col-sm-6">
    <input type="text" placeholder="Name *" class="" name="contact[name]" id="ContactFormName" value="">
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6">
    <input type="email" placeholder="Email *" class="" name="contact[email]" id="ContactFormEmail" value="">
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6">
    <input type="text" id="ContactFormPhone" name="contact[phone]" placeholder="Phone" value="">
  </div>
  <div class="col-lg-6 col-md-6 col-sm-6">
    <input type="text" id="ContactFormCustomText" name="contact[subject_title]" placeholder="Subject">
  </div>
  <div class="col-12">
    <div class="contact2-textarea text-center">
      <textarea placeholder="Message" class="custom-textarea" name="contact[body]" id="ContactFormMessage"></textarea>
    </div>
    <div class="contact-btn">
      <button class="btn btn-sqr" type="submit">Send Message</button>
    </div>
  </div>
</div></form><script>
  var actCallback = function (response) {
    $('#contactFormSubmit').prop("disabled", false);
    $('#re-captcha').remove();
  };
  var expCallback = function() {
    $('#contactFormSubmit').prop("disabled", true);
  };

  var onloadCallback = function () {
    var widget = grecaptcha.render(document.getElementById("re-captcha"), {
      'sitekey' : "123456789", // Sitekey, Retrieving from reCaptcha
      'theme': "light",
      'callback' : actCallback,
      'expired-callback': expCallback,
    });
  }
</script></div>
      </div><div class="col-lg-6">
        <div class="contact-info">
          <h4 class="contact-title">Contact Us</h4><p>Claritas est etiam processus dynamicus, qui sequitur mutationem consuetudium lectorum. Mirum est notare quam littera gothica, quam nunc putamus parum claram anteposuerit litterarum formas human.</p>
<ul><li><i class="fa fa-fax"></i> Address : No 40 Baria Sreet 133/2 NewYork City</li><li><i class="fa fa-phone"></i> E-mail: info@yourdomain.com</li><li><i class="fa fa-envelope-o"></i> +88013245657</li></ul><div class="working-time">
            <h6>Working Hours</h6><p>Monday – Saturday:08AM – 22PM</p>
</div></div>
      </div></div>
  </div>



 <?php require_once './views/layout/miniCart.php'; ?>

<?php require_once './views/layout/footer.php'; ?>