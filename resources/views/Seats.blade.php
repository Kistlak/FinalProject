<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

    <head>
    
    <script src="https://code.jquery.com/jquery-3.3.1.min.js"
  integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
  crossorigin="anonymous"></script>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    
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

    .dt
    {
        margin-left: 400px;
        margin-right: 400px;   
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

    <form class="form-horizontal" id="form1" method="POST" action="{{ route('seatsinsert') }}" enctype="multipart/form-data">    
    
    {{ csrf_field() }}    
        
        <div class="dt"> <br>
           
    <h4> <span id="success_message" class="text-success"></span> </h4>
    
    <div class="form-group row">
    <label for="example-date-input" class="col-2 col-form-label">Select Date :</label>
    <div class="col-10">
    <input class="form-control" type="date" name="date" placeholder="mm-dd-yyyy" id="example-date-input">
    </div>
    </div>
        
     <div class="form-group">
    <label for="exampleSelect1">Select Time :</label>
    <select name="st" class="form-control" id="exampleSelect1">
      <option>10.30 am</option>
      <option>1.30 pm</option>
      <option>4.30 pm</option>
      <option>7.30 pm</option>
    </select>
    </div>  
 
        </div>
            
      <h2 style="font-size:1.2em;font-family: Times New Roman;"> Choose seats by clicking below seats :</h2>
       
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
      
      <input type="submit" class="btn btn-primary" id="btnShowNew" value="Continue"> <br><br>

       <span id="availability"></span>
    <br />   
                  
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

            $('#btnShowNew').click(function (e) {
                e.preventDefault();

                var items = [];
                $.each($('#place li.' + settings.selectingSeatCss + ' a'), function (index, value) {
                    items.push($(this).attr('title'));
                });

                   //console.log(items);
                   // $(location).attr('href', 'Seats');

                   $.ajax({
                   url:'{{ route('seatprocess') }}',
                   type:"POST",
                   data:{ 
                   _token: "{{ csrf_token() }}", 
                   items: JSON.stringify(items), 
                   date: $('input[name=date]').val(), 
                   st: $('select[name=st]').val()},
                   success:function(data)
                   {
                    console.log(data);
                    //if(!data){console.log('True')}else{console.log('False')};
                    if(data !== '0')
                    {
                     $('#availability').html('<span class="text-danger">Seats not available</span>');
                     $('#btnShowNew').attr("disabled", true);
                    }
                    else
                    {
                     //$('#availability').html('<span class="text-success">Seats Available</span>');
                     
                    $.ajax({ 
                    type: "post", 
                    url: "{{ route('seatsinsert') }}", 
                    data: { 
                    _token: "{{ csrf_token() }}", 
                    items: JSON.stringify(items), 
                    date: $('input[name=date]').val(), 
                    st: $('select[name=st]').val()}, 
                    success: function(data){ 
                    $("form").trigger("reset"); 
                    $('#success_message').fadeIn().html("Text"); 
                    } 
                    });
                     
                    $('#btnShowNew').attr("disabled", false);
                    }
                   }
                  });
  
                }); //btnShowNew

         }); //Final 
    
    </script>
    
    </form>
        
</div> <!-- End Of The Col Class -->
    
</div> <!-- End Of The Row Class -->
		
</div> <!-- End Of The Container Class -->

</body>
    
<!-- Footer -->
@include('footer')
<!-- End Of The Footer -->
    
</html>