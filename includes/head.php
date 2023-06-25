<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Kingster &#8211; School, College &amp; University HTML Template SHARED ON THEMELOCK.COM</title>

    <link rel='stylesheet' href='plugins/goodlayers-core/plugins/combine/style.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/goodlayers-core/include/css/page-builder.css' type='text/css' media='all' />
    <link rel='stylesheet' href='plugins/revslider/public/assets/css/settings.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/style-core.css' type='text/css' media='all' />
    <link rel='stylesheet' href='css/kingster-style-custom.css' type='text/css' media='all' />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:700%2C400" rel="stylesheet"
        property="stylesheet" type="text/css" media="all">
    <link rel='stylesheet'
        href='https://fonts.googleapis.com/css?family=Poppins%3A100%2C100italic%2C200%2C200italic%2C300%2C300italic%2Cregular%2Citalic%2C500%2C500italic%2C600%2C600italic%2C700%2C700italic%2C800%2C800italic%2C900%2C900italic%7CABeeZee%3Aregular%2Citalic&amp;subset=latin%2Clatin-ext%2Cdevanagari&amp;ver=5.0.3'
        type='text/css' media='all' />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- contact -->
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
                            '<div class="alert alert-danger"><strong>Something went wrong. Please try again later.</strong></div>'
                        );

                        window.setTimeout(function () {
                            $(".alert").fadeTo(300, 0).slideUp(300, function () {
                                $(this).remove();
                            });
                        }, 4000);
                    }
                    else {
                        $("#success1").html(
                            '<div class="alert alert-success"><strong>' + data.message + " , We will contact you soon." + "</strong></div>"
                        );
                        
                        window.setTimeout(function () {
                            $(".alert").fadeTo(300, 0).slideUp(300, function () {
                                $(this).remove();
                            });
                        }, 4000);
                        $("#contactform")[0].reset();
                    }

                });

                event.preventDefault();
            });
        });
    </script>

    <!-- login -->
    <script>
        $(document).ready(function () {
            $("#loginform").submit(function (event) {
                var formData = {
                    email: $("#email").val(),
                    password: $("#password").val(),
                };
                console.log(formData);
                $.ajax({
                    type: "POST",
                    url: "includes/login-form.php",
                    data: formData,
                    dataType: "json",
                    encode: true,
                }).done(function (data) {
                    console.log(data, "xyz");
                    if (!data.success) {
                        $("#success1").html(
                            '<div class="alert alert-danger"><strong>Invalid credentials, Please try again.</strong></div>'
                        );

                        window.setTimeout(function () {
                            $(".alert").fadeTo(300, 0).slideUp(300, function () {
                                $(this).remove();
                            });
                        }, 4000);
                    }
                    else {
                        $("#loginform")[0].reset();
                        window.location.href = '/saraswati/saraswati/adminIndex.php';
                    }
                });

                event.preventDefault();
            });
        });
    </script>
</head>