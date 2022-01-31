<!DOCTYPE html>
<html lang="en">
<head>
	<title>{{$site->titulo}}</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->	
	<link rel="icon" type="image/png" href="/_t/000/images/icons/favicon.ico"/>
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/_t/000/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/_t/000/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/_t/000/vendor/animate/animate.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/_t/000/vendor/select2/select2.min.css">
<!--===============================================================================================-->
	<link rel="stylesheet" type="text/css" href="/_t/000/css/util.css">
	<link rel="stylesheet" type="text/css" href="/_t/000/css/main.css">
<!--===============================================================================================-->
</head>
<body>
	
	
	<div class="bg-img1 size1 flex-w flex-c-m p-t-55 p-b-55 p-l-15 p-r-15" style="background-image: url('/_t/000/images/bg01.jpg');">
		<div class="wsize1 bor1 bg1 p-t-175 p-b-45 p-l-15 p-r-15 respon1">
			<div class="wrappic1">
				<img src="/imagens/{{$site->logo}}" alt="LOGO">
			</div>

			<p class="txt-center m1-txt1 p-t-33 p-b-68">
				Nosso site esta quase pronto...
			</p>

			{{-- <div class="wsize2 flex-w flex-c hsize1 cd100">
				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 days">35</span>
					<span class="s1-txt1">Dias</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 hours">17</span>
					<span class="s1-txt1">Horas</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 minutes">50</span>
					<span class="s1-txt1">Minutos</span>
				</div>

				<div class="flex-col-c-m size2 how-countdown">
					<span class="l1-txt1 p-b-9 seconds">39</span>
					<span class="s1-txt1">Segundos</span>
				</div>
			</div> --}}

			<form class="flex-w flex-c-m contact100-form validate-form p-t-20">
				<div class="wrap-input100 validate-input where1" data-validate = "Email is required: ex@abc.xyz">
					<input class="s1-txt2 placeholder0 input100" type="text" name="email" placeholder="Seu Email">
					<span class="focus-input100"></span>
				</div>

				
				<button class="flex-c-m s1-txt3 size3 how-btn trans-04 where1">
					Notifique-me
				</button>
				
			</form>

			<p class="s1-txt4 txt-center p-t-10">
				Eu prometo <span class="bor2">nunca</span> mandar spam :-)
			</p>
			
		</div>
	</div>



	

<!--===============================================================================================-->	
	<script src="/_t/000/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
	<script src="/_t/000/vendor/bootstrap/js/popper.js"></script>
	<script src="/_t/000/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script src="/_t/000/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
	<script src="/_t/000/vendor/countdowntime/moment.min.js"></script>
	<script src="/_t/000/vendor/countdowntime/moment-timezone.min.js"></script>
	<script src="/_t/000/vendor/countdowntime/moment-timezone-with-data.min.js"></script>
	<script src="/_t/000/vendor/countdowntime/countdowntime.js"></script>
	<script>
		$('.cd100').countdown100({
			/*Set Endtime here*/
			/*Endtime must be > current time*/
			endtimeYear: 0,
			endtimeMonth: 0,
			endtimeDate: 35,
			endtimeHours: 18,
			endtimeMinutes: 0,
			endtimeSeconds: 0,
			timeZone: "" 
			// ex:  timeZone: "America/New_York"
			//go to " http://momentjs.com/timezone/ " to get timezone
		});
	</script>
<!--===============================================================================================-->
	<script src="/_t/000/vendor/tilt/tilt.jquery.min.js"></script>
	<script >
		$('.js-tilt').tilt({
			scale: 1.1
		})
	</script>
<!--===============================================================================================-->
	<script src="/_t/000/js/main.js"></script>

</body>
</html>