<html>
<head>
	<title>FLOP</title>
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	 <link rel="stylesheet" href="script/main.css">
<!-- <link href='http://fonts.googleapis.com/css?family=Raleway:400,600,700' rel='stylesheet' type='text/css'> -->
<link rel="stylesheet" type="text/css" href="results.css">
<!-- <link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet"> -->

	<style type="text/css">
		li {
			text-decoration:  none;
			color: white;
			border-bottom: 2px white solid;
			width: 60%;
			margin-top: 7px;
			margin-bottom: 7px;
		}
		ul {
			list-style: none;
		}
		a.contact-slide {
			text-decoration: none;
			font-family: Raleway-Light;
			color: white;
			line-height: 3rem;
			letter-spacing: 1px;
		}
	</style>
</head>
<body>

<div class="contactContainer">
	<ul class="contact-list">
		<h1>CONTACTS</h1>
	<li><a class="contact-slide" id="samuel.wu.u1@gmail.com">Samuel Wu</a></li>
	<li><a class="contact-slide" id="pansyhermiacheung@gmail.com">Pansy Cheung</a></li>
	<li><a class="contact-slide" id="justincuaresma@gmail.com">Justin Cuaresma</a></li>
	<li><a class="contact-slide" id="barackobama@obamacare.gov">Barack Obama</a></li>
	<li><a class="contact-slide" id="rayhan_v@me.com">Rayhan Vevaina</a></li>
	<li><a class="contact-slide" id="barackobama@obamacare.gov">Kanye West</a></li>
	<li><a class="contact-slide" id="miley@twerkit.com">Miley Cyrus</a></li>
	    <a href="#"	i class="fa fa-envelope fa-3x"></i>
	</ul>
</div>

	<a href="#" class="submit_btn">
		done!
	</a>


<script type="text/javascript">
	// find out url query params
	var urlParams;
	(window.onpopstate = function() {
    var match,
        pl     = /\+/g,  // Regex for replacing addition symbol with a space
        search = /([^&=]+)=?([^&]*)/g,
        decode = function (s) { return decodeURIComponent(s.replace(pl, " ")); },
        query  = window.location.search.substring(1);

    urlParams = {};
    while (match = search.exec(query)) {
       urlParams[decode(match[1])] = decode(match[2]);
   	}

   		})();

   	$('a.contact-slide').each( function( index ) {
   		var email = $(this).attr('id');
   		$(this).attr('href', 'mailto:'+email+'?Subject=FLOP%21%20New%20event%21&Body=Hey%20there%21%0A%0AI%20created%20a%20new%20event%21%20Let%20me%20know%20which%20days%20work%20for%20you%21%0A%3Ca%20href%3D%22http%3A//atleusdigital.com/flop/sam/justin/inivitee.html%3Fid%3D'+urlParams.id+'%22%3EView%20Flop%3C/a%3E%0A%0ANo%20Flopping%21');
   	})

   	$('.fa').each( function( index ) {
   		$(this).attr('href','mailto:?Subject=FLOP%21%20New%20event%21&Body=Hey%20there%21%0A%0AI%20created%20a%20new%20event%21%20Let%20me%20know%20which%20days%20work%20for%20you%21%0A%3Ca%20href%3D%22http%3A//atleusdigital.com/flop/sam/justin/inivitee.html%3Fid%3D'+urlParams.id+'%22%3EView%20Flop%3C/a%3E%0A%0ANo%20Flopping%21');
   	})

   	$('body').on('click', 'a.submit_btn', function(e) {
		e.preventDefault();
   		window.location = "create_final.php?id="+urlParams.id;
  		});

</script>

</body>
</html>