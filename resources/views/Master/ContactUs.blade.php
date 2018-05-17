@extends('Templates.MasterOtherPages')

@section('content')

    <style>

        p span {
            color: white;
            line-height: 300%;
            background: rgb(0, 0, 0); /* fallback color */
            background: rgba(0, 0, 0, 0.5);
            padding: 8px;
        }

        input[type=text], select {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        textarea {
            width: 100%;
            height:150px;
            padding: 12px 20px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type=submit] {
            width: 800px;
            background-color: #002147;
            color: white;
            padding: 14px 20px;
            margin: 8px 0;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            font-size: 15px;
            font-weight: bold;
        }

        input[type=submit]:hover {
            background-color: #8B008B;
        }

        .form{
            text-align:left;
            margin-left:50px;
            margin-right:50px;
        }

        .req{
            color:red;
        }

        h4{
            font-weight: bold;
        }

        a.tel{
            color:blue;
        }

    </style>

    <div class="col-md-12 col-sm-12 hero-feature"> <!-- Start Of The Col Class -->

        @if(session()->has('Msg'))
            <h4 class="alert alert-success"> {{ session()->get('Msg') }} </h4>
        @endif

        <br>
    <p><span>Contact Our Staff..<span class='spacer'></span><br />
<span class='spacer'></span>Staff can be contacted through phone, Skype or email. <span class='spacer'>
<br>If you have any questions, please send us a Email. For any other concerns, please Call us to contact someone who can help..</a></span></p>

    <div class="form">
        <form class="form-horizontal" method="POST" action="{{ route('cuinsert') }}" enctype="multipart/form-data">

            {{ csrf_field() }}

            <br><strong>
                <label for="text">Your Name : <span class="req">&#42;</span></label>
                <input type="text" class="form-control" name="name"  placeholder="" required="required"/>
                <br/><br/>

                <label for="text">Your Email : <span class="req">&#42;</span></label>
                <input type="text" class="form-control" name="email"  placeholder="" required/>
                <br/><br/>

                <label for="text">Your Contact Number : <span class="req">&#42;</span></label>
                <input type="text" class="form-control" name="num"  placeholder="" required/>
                <br/><br/></strong>

            <b><label for="text">Your Message : <span class="req">&#42;</span></label>
                <textarea name="msg" placeholder="What do you want to know ?" required/></textarea>

                <center><div class="container">
                        <input type="submit" class="btn btn-info btn-lg" value="Send Message" value="Submit"/></button>
                    </div></center></strong>

        </form></div>

    </div> <!-- End Of The Col Class -->

    <div class="col-md-6 col-sm-3 hero-feature"> <!-- Start Of The Col Class -->

        <h2>Contact Info:</h2>

                442 Galle Road<br>
                Colombo 03<br>
                Sri Lanka<br>
                Tel: <a href="tel:+(94) 112565511" class="tel">+(94) 112565511</a><br>
                Fax: <a href="tel:+(94) 112565594" class="tel">+(94) 112565594</a><br>
                Email: <a href="mailto:info@amazingcinema.lk" class="tel">info@AmazingCinema.lk</a>

    </div> <!-- End Of The Col Class -->

    <div class="col-md-6 col-sm-3 hero-feature"> <!-- Start Of The Col Class -->

        <h2>Location:</h2>

        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d3891.261826562567!2d80.10351282115332!3d6.14277880570608!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x75e542ab59cf0460!2sLawyer+and+Notary+Office!5e0!3m2!1sen!2slk!4v1526593778027" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
        <br><br>
    </div> <!-- End Of The Col Class -->

@endsection