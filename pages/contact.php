<head>
    <link href="/NotenNest/css/contact.css" rel="stylesheet">
</head>

<style>
    body {
        background-image: linear-gradient(0deg, rgba(215, 215, 217, 1) 20%, rgba(217, 215, 216, 0) 100%), url('./img/background3.jpg');
        background-repeat: no-repeat;
    }
</style>
<br>
<h1>Kontaktformular</h1>

<div class="col-sm-12">
    <div class="row">
        <div class="col-sm-2"></div>
        <div class="col-sm-8">
            <form>
                <div id="contact_body">
                    <div>
                        <label for="name"></label>
                        <input type="text" name="name" id="name" required="true" placeholder="Name" />
                    </div>

                    <div>
                        <label for="email"></label>
                        <input type="email" name="email" required="true" placeholder="E-Mail" />
                    </div>

                    <div>
                        <label for="subject"></label>
                        <input type="text" name="subject" required="true" placeholder="Betrifft" />
                    </div>

                    <div class="form-kontakt-group">
                        <label for="message"></label>
                        <textarea name="message" id="message" required="true"
                            placeholder="Nachricht eingeben"></textarea>
                    </div>
                </div>

                <div class="text-center">
                    <input type="submit" id="submit_btn" value="Nachricht senden">
                </div>

            </form>
        </div>
        <div class="col-sm-2"></div>
    </div>
</div>