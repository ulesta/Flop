<html>
<head>
	<title>FLOP</title>
	<link rel="stylesheet" href="calendar.css" />
	<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>


<body>

<div class="body_container">
</div>

<div class="calendar-title-container">
		date
</div>

<div class="cal-ajax-container">

</div>
	
	
<a href="#" class="submit_btn">
	done!
</a>



<script type="text/javascript">

	var calID;

	function makeid()
	{
	    var text = "";
	    var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

	    for( var i=0; i < 5; i++ )
	        text += possible.charAt(Math.floor(Math.random() * possible.length));

	    return text;
	}


	var dateArray = [];
	var date = new Date();
	var init_month = date.getMonth()+1;

	$(document).ready(function() {
		$.post( "cal.php", { month: init_month})
  			.done(function( data ) {
   			 $('.cal-ajax-container').html(data);
  		});
  			calID = makeid();
	});


	$( 'body' ).on('click', '.change-month-btn', function(e) {
		e.preventDefault();
		var dir = $(this).data('dir');
		if (dir === "next") {
			init_month++;
			$.post( "cal.php", { month: init_month})
	  			.done(function( data ) {
	   			 $('.cal-ajax-container').html(data);
	   			 $( "a.day-number" ).each(function( index ) {
	   			 		console.log(index);
						if (dateArray.indexOf($(this).data("date")) !== -1 ) {
							console.log("found match!");
							$(this).addClass("selected");
						}
				});
	  		});
		} else {
			init_month--;
			$.post( "cal.php", { month: init_month})
	  			.done(function( data ) {
	   			 $('.cal-ajax-container').html(data);
	   			 $( "a.day-number" ).each(function( index ) {
						if (dateArray.indexOf($(this).data("date"))!== -1 ) {
							$(this).addClass("selected");
						}
				});
	  		});
		}
	});

	var i = 0;
	$('body').on('click', 'a.day-number', function(e) {
		e.preventDefault();
		var $this = $(this);
		console.log("clicked!");
		if ($this.hasClass('selected')) {
			i = dateArray.indexOf($(this).data("date"));
			dateArray.splice(i, 1);
			$this.removeClass('selected');
		}
		else {
			$this.addClass('selected');
			dateArray.push($(this).data("date"));
  			//console.log( index + ": " + $( this ).text() );
		}
	});

	$('body').on('click', 'a.submit_btn', function(e) {
		e.preventDefault();
		console.log("hello");
		$( "a.day-number.selected" ).each(function( index ) {
			
		});

		var elements = ["overlord", "firebender", "apple-123", "google"].join(',');
		dateArray = dateArray.join(',');
		console.log(elements);
		console.log(dateArray);
		
		$.post( "../newEvent.php", { passedArray: dateArray, passedSN: calID })
  			.done(function( data ) {
   			 console.log( "Data Loaded: " + data );
   			 window.location = "contacts.php?id="+calID;
  		});

	});

</script>

</body>
</html>
