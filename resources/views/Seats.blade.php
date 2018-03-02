<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
    
    <!-- Styles -->
    <link href="{{ asset('jss/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('jss/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('jss/bootstrap-theme.css') }}" rel="stylesheet">
    <link href="{{ asset('jss/bootstrap-theme.min.css') }}" rel="stylesheet">  
    
    <!-- Scripts -->
    <script src="{{ asset('jss/bootstrap.js') }}"></script>
    <script src="{{ asset('jss/bootstrap,mini.js') }}"></script>
    <script src="{{ asset('jss/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    
    <!-- Bootstrap core CSS -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/css/bootstrap.min.css" rel="stylesheet">
    <!--<link rel="stylesheet" type="text/css" href="css/mystyle.css">-->
   
    <title>
    @include('title')
    </title>
    
    <style>
        
	#holder{	
	 height:300px;	 
	 width:800px;
	 background-color:#F5F5F5;
	 border:1px solid #A4A4A4;
	}
        
	 #place {
	 position:relative;
         margin-top:33px;
	 margin-left:35px;
	 }
         
     #place a{
	 font-size:80%;
	 }
         
     #place li
     {
         list-style: none outside none;
         position: absolute;   
     }  
     
     #place li:hover
     {
        background-color:yellow;      
     } 
     
	 #place .seat{
	 background:url("img/Other/Available Seat.png") no-repeat scroll 0 0 transparent;
	 height:30px;
	 width:45px;
	 display:block;	 
	 }
         
      #place .selectedSeat
      { 
	background-image:url("img/Other/Disabled Seat.png");      	 
      }
      
	   #place .selectingSeat
      { 
		background-image:url("img/Other/Booked Seat.png");      	 
      }
      
	  #place .row-3, #place .row-4{
		margin-top:10px;
	  }

	  #seatDescription li{
	  verticle-align:middle;	  
	  list-style: none outside none;
	  padding-left:35px;
	  height:35px;
	  float:left;
          font-family: Times New Roman;
	  font-size:120%;
	  color:#353c47;
	  }

    </style>				

@include('BackToTop')

	</head>
    
    @include('NavMain')
    
<body>
    
<div class="container"> <!-- Start Of The Container Class -->

<div class="row text-center"> <!-- Start Of The Row Class -->

<div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->
    
    <center> 
        
    <form id="form1">

      <h2 style="font-size:1.2em;font-family: Times New Roman;"> Choose seats by clicking the corresponding seat in the layout below:</h2>
       
      <div id="holder"> 
	<ul id="place">
        </ul>    
      </div>
      
      <div style="width:600px;text-align:center;overflow:auto"> <br>
             
	<ul id="seatDescription">
            
<li style="background:url('img/Other/Available Seat.png') no-repeat scroll 0 0 transparent;">Available Seat</li> 
<li style="background:url('img/Other/Booked Seat.png') no-repeat scroll 0 0 transparent;">Booked Seat</li>
<li style="background:url('img/Other/Disabled Seat.png') no-repeat scroll 0 0 transparent;">Disabled Seat</li>
	
        </ul>        
         </div>
      
      <input type="button" class="btn btn-primary" id="btnShowNew" value="Show Selected Seats"> <br><br>
      
    </form>
        
    </center>
    
    <script type="text/javascript">
        
        $(function () {
            var settings = {
                rows: 5,
                cols: 15,
                rowCssPrefix: 'row-',
                colCssPrefix: 'col-',
                seatWidth: 50,
                seatHeight: 50,
                seatCss: 'seat',
                selectedSeatCss: 'selectedSeat',
				selectingSeatCss: 'selectingSeat'
            };

            var init = function (reservedSeat) {
                var str = [], seatNo, className;
                for (i = 0; i < settings.rows; i++) {
                    for (j = 0; j < settings.cols; j++) {
                        seatNo = (j + i * settings.cols + 1);
                        className = settings.seatCss + ' ' + settings.rowCssPrefix + i.toString() + ' ' + settings.colCssPrefix + j.toString();
                        if ($.isArray(reservedSeat) && $.inArray(seatNo, reservedSeat) != -1) {
                            className += ' ' + settings.selectedSeatCss;
                        }
                        str.push('<li class="' + className + '"' +
                                  'style="top:' + (i * settings.seatHeight).toString() + 'px;left:' + (j * settings.seatWidth).toString() + 'px">' +
                                  '<a title="' + seatNo + '">' + seatNo + '</a>' +
                                  '</li>');
                    }
                }
                $('#place').html(str.join(''));
            };

            //case I: Show from starting
            //init();

            //Case II: If already booked
            var bookedSeats = [5, 10, 25, 63];
            init(bookedSeats);


            $('.' + settings.seatCss).click(function () {
			if ($(this).hasClass(settings.selectedSeatCss)){
				alert('You Can Not Book These Seats');
			}
			else{
                $(this).toggleClass(settings.selectingSeatCss);
				}
            });

            $('#btnShowNew').click(function () {
                var str = [], item;
                $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
                    item = $(this).attr('title');                   
                    str.push(item);                   
                });
                alert(str.join(','));
            })
        });
    
    </script>
    
</div> <!-- End Of The Col Class -->
    
</div> <!-- End Of The Row Class -->
		
</div> <!-- End Of The Container Class -->

</body>
    
<!-- Footer -->
@include('footer')
<!-- End Of The Footer -->
    
</html>