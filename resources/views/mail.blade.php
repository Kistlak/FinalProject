<html>
<head>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

</head>

<body>

<div class="row">
    <div class="col-md-6 col-md-offset-3">

        <div class="panel">
            <div class="panel-body">
                <div class="media-block">
                    <div class="media-left" style="white-space:nowrap">
                        <div class="invoice-logo col-md-12">
                            <div class="media-left">
                                <img src="https://1.bp.blogspot.com/-7NRmwzg6NFw/WqYbo3ydbRI/AAAAAAAAAxM/x_ei2ATh_1k7yJq9_TaXOTsdh1Mjm2rxQCLcBGAs/s400/PicsArt_03-12-11.46.14.jpg" style="width: 50%;"></br>
                                <small>#403 1/2, Galle Road, Colombo - 06, Sri Lanka.</small></br>
                                <small>http://www.cheapefares.com/</small>
                            </div>
                        </div>
                    </div>
                    <div class="media-body text-right">
                        <h3 class="h1 text-uppercase text-normal mar-no">INVOICE</h3>
                    </div>
                </div>
                <hr class="new-section-sm bord-no">
                <div class="row">
                    <div class="col-xs-6">
                        <address>
                            <strong class="text-main">{{ $Mname }}</strong><br>
                            {{$date}}<br>
                            {{$st}}
                        </address>
                    </div>
                    <div class="col-xs-6">
                        <table class="pull-right invoice-details">
                            <tbody>
                            <tr>
                                <td class="text-main text-bold">Invoice #</td>
                                <td class="text-right text-primary text-bold">Id 1</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Billing Date</td>
                                <td class="text-right">From Date Db</td>
                            </tr>
                            <tr>
                                <td class="text-main text-bold">Amount Due</td>
                                <td class="text-right text-bold text-main">Total</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <hr class="new-section-sm bord-no">
                <div class="table-responsive">
                    <table class="table table-striped invoice-summary">
                        <thead>
                        <tr class="">
                            <th>Description</th>
                            <th class="min-col text-center">Qty</th>
                            <th class="min-col text-center">Price</th>
                            <th class="min-col text-right">Total</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>
                                <strong>Des Db</strong>
                            </td>
                            <td class="text-center">Qty Db</td>
                            <td class="text-center">Price Db}</td>
                            <td class="text-right">Total Db</td>
                        </tr>
                        </tbody>
                    </table>
                    <table class="table invoice-total">
                        <tbody>
                        <tr>
                            <td><strong>TOTAL :</strong></td>
                            <td class="text-bold h4">Total Db</td>
                        </tr>
                        </tbody>
                    </table>
                </div>
</body>
</html>