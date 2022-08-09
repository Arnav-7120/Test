<!doctype html>
<html>
    <title> Locate US</title>
	<link rel="stylesheet" type="text/css" href="Locateus.css">
    <head>
    <style>
        // Config colors
$bg-color: #FFFFFF
$text-color: #242424
$input-color: #B7B7B7
$btn-color: #A383C9
$container-color: #F8F8F8

$bg-color-gradient: linear-gradient(to bottom, #abbaab , #ffffff)

// Fonts
@import 'https://fonts.googleapis.com/css?family=Libre+Franklin:400,700'
$font-default: 'Libre Franklin', sans-serif
// config global
html,
body
	background: #FFFFFF
	font-family: 'Libre Franklin', sans-serif
	
.container
	background: #F8F8F8
	width: 900px
	height: 650px
	margin: 5% auto
	box-shadow: 0px 0px 10px #C8C7D9
	position: relative
	
	.map
		width: 45%
		float: left
	.contact-form
		width: 53%
		margin-left: 2%
		float: left
		.title
			font-size: 2.5em
			font-family: $font-default
			font-weight: 700
			color: $text-color
			margin: 5% 8%
		.subtitle
			font-size: 1.2em
			font-weight: 400
			margin: 0 4% 5% 8%
		
		input,
		textarea
			width: 330px
			padding: 3%
			margin: 2% 8%
			color: $text-color
			border: 1px solid $input-color
			&::placeholder
				color: $text-color
		.btn-send
			background: $btn-color
			width: 180px
			height: 60px
			color: $container-color
			font-weight: 700
			margin: 2% 8%
			border: none
	
        </style>
        </head>
    <body>
        <div class="container">
            <div class="map">
                <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m12!1m3!1d13249.247068040606!2d151.20960562674117!3d-33.8816236491114!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!5e0!3m2!1spt-BR!2sbr!4v1468899355787" width="100%" height="650px" frameborder="0" style="border:0" allowfullscreen></iframe>
            </div>
            <div class="contact-form">
                <h1 class="title">Contact Us</h1>
                <h2 class="subtitle">We are here assist you.</h2>
                <form action="">
                    <input type="text" name="name" placeholder="Your Name" />
                    <input type="email" name="e-mail" placeholder="Your E-mail Adress" />
                    <input type="tel" name="phone" placeholder="Your Phone Number"/>
                    <textarea name="text" id="" rows="8" placeholder="Your Message"></textarea>
                    <button class="btn-send">Get a Call Back</button>
                </form>
            </div>
        </div>
    </body>
</html>
