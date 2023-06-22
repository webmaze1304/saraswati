<section class="probootstrap-cta">
      <div class="container">
        <div class="row">
          <div class="col-md-12">
            <h2 class="probootstrap-animate" data-animate-effect="fadeInRight">Get your admission now!</h2>
            <a href="#" role="button" class="btn btn-primary btn-lg btn-ghost probootstrap-animate" data-toggle="modal" data-target="#myModal" data-animate-effect="fadeInLeft">Enroll</a>
          </div>
        </div>
      </div>
    </section>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                aria-hidden="true">&times;</span></button>
            <h4 class="modal-title" id="myModalLabel">Saraswati Public School</h4>
          </div>
          <div class="modal-body">
            <div class="probootstrap-animate" id="probootstrap-content">
              <h2>Get In Touch</h2>
              <div id="success1"></div>
              <form action="#" method="post" class="probootstrap-form" id="contactform">
                <div class="form-group">
                  <label for="name">Full Name</label>
                  <input type="text" class="form-control" id="name" name="name">
                </div>
                <div class="form-group">
                  <label for="email">Email</label>
                  <input type="email" class="form-control" id="email" name="email">
                </div>
                <div class="form-group">
                  <label for="phone">Phone</label>
                  <input type="number" class="form-control" id="phone" name="phone">
                </div>
                <div class="form-group">
                  <label for="subject">Subject</label>
                  <input type="text" class="form-control" id="subject" name="subject">
                </div>
                <div class="form-group">
                  <label for="message">Message</label>
                  <textarea cols="30" rows="10" class="form-control" id="message" name="message"></textarea>
                </div>
                <div class="form-group">
                  <input type="submit" class="btn btn-primary btn-lg" id="submit" name="submit" value="Send Message">
                </div>
              </form>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
          </div>
        </div>
      </div>
    </div>

    <script>
        $(document).ready(function () {
            $("#contactform").submit(function (event) {
                var formData = {
                    name: $("#name").val(),
                    email: $("#email").val(),
                    phone: $("#phone").val(),
                    subject: $("#subject").val(),
                    message: $("#message").val(),
                };
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "includes/contact-form.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function (data) {
                    console.log(data, "xyz");
                    if (!data.success) {
                        $("#success1").html(
                            '<div class="alert alert-danger">Something went wrong. Please try again later.</div>'
                        );

                        window.setTimeout(function () {
                            $(".alert").fadeTo(300, 0).slideUp(300, function () {
                                $(this).remove();
                            });
                        }, 4000);
                    }
                    else {
                        $("#success1").html(
                            '<div class="alert alert-success">' + data.message + " , We will contact you soon." + "</div>"
                        );
                        $("#contactform")[0].reset();

                        window.setTimeout(function () {
                            $(".alert").fadeTo(300, 0).slideUp(300, function () {
                                $(this).remove();
                            });
                            $('#exampleModal').modal('hide');
                        }, 4000);

                    }

                });

                event.preventDefault();
            });
        });

    </script>