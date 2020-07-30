<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1"/>
    <title>Score Tables</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport'/>
    <meta name="viewport" content="width=device-width"/>

    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('assets/img/apple-icon.png') }}"/>
    <link rel="icon" type="image/png" href="{{ asset('assets/img/favicon.png') }}"/>

    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css"
          href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Roboto+Slab:400,700|Material+Icons"/>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css"/>

    <!-- CSS Files -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet"/>
    <link href="{{ asset('assets/css/material-bootstrap-wizard.css') }}" rel="stylesheet"/>

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="{{ asset('assets/css/demo.css') }}" rel="stylesheet"/>
    <meta name="csrf-token" content="{{ csrf_token() }}"/>
</head>

<body>
<div class="image-container set-full-height" style="background-image: url('{{ asset('assets/img/wizard-city.jpg') }}')">


    <!--   Big container   -->
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!--      Wizard container        -->
                <div class="wizard-container">
                    <div class="card wizard-card" data-color="purple" id="wizard">
                        <form action="" method="">
                            <!--        You can switch " data-color="rose" "  with one of the next bright colors: "blue", "green", "orange", "purple"        -->

                            <div class="wizard-header">
                                <h3 class="wizard-title">
                                    Score Table
                                </h3>
                            </div>
                            <div class="wizard-navigation">
                                <ul>
                                    <li><a href="#location" data-toggle="tab">1th week</a></li>
                                    <li><a href="#type" data-toggle="tab">2th week</a></li>
                                    <li><a href="#facilities" data-toggle="tab">3th week</a></li>
                                    <li><a href="#description" data-toggle="tab">4th week</a></li>
                                </ul>
                            </div>

                            <div class="tab-content">
                                <div class="tab-pane" id="location">

                                    <div class="row">
                                        <div class="col-sm-7 ">

                                            <div class="col-6">
                                                <h3>League Table</h3>
                                                <table class="table table-responsive-sm table-bordered">
                                                    <thead>
                                                    <tr>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Teams</th>
                                                        <th scope="col">Played</th>
                                                        <th scope="col">Win</th>
                                                        <th scope="col">Drawn</th>
                                                        <th scope="col">Lost</th>
                                                        <th scope="col">GF</th>
                                                        <th scope="col">GA</th>
                                                        <th scope="col">GD</th>
                                                        <th scope="col">Points</th>
                                                    </tr>
                                                    </thead>
                                                    <tbody>
                                                    @foreach($clubs as $key => $club)
                                                        <tr>
                                                            <th scope="row">{{$key + 1}}</th>
                                                            <td>{{$club->name}}</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                            <td>1</td>
                                                        </tr>
                                                    @endforeach
                                                    </tbody>
                                                </table>
                                            </div>

                                        </div>

                                        <div class="col-sm-5">
                                            <div class="form-group label-floating">
                                                <div class="col-6">
                                                    <h3>League Table</h3>
                                                    <table class="table table-responsive-sm table-bordered">

                                                        <tbody>

                                                        @foreach($matches as $match)
                                                            <tr>
                                                                <th scope="row">{{$match[0]['name']}}</th>
                                                                <td>0</td>
                                                                <td>0</td>
                                                                <td>{{$match[1]['name']}}</td>
                                                            </tr>
                                                        @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>


                                </div>
                                <div class="tab-pane" id="type">

                                </div>
                                <div class="tab-pane" id="facilities">

                                </div>
                                <div class="tab-pane" id="description">

                                </div>
                            </div>
                            <div class="wizard-footer">
                                <div class="pull-left">
                                    <input type='button' class='btn btn-success' id="play"
                                           name='play' value='Play'/>
                                </div>
                                <div class="pull-right">
                                    <input type='button' class='btn btn-next btn-fill btn-primary btn-wd' name='next'
                                           value='Next' disabled/>
                                    <input type='button' class='btn btn-finish btn-fill btn-primary btn-wd'
                                           name='finish' value='Finish'/>
                                </div>
                                <div class="pull-left">
                                    <input type='button' class='btn btn-previous btn-fill btn-default btn-wd'
                                           name='previous' value='Previous'/>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </form>
                    </div>
                </div> <!-- wizard container -->
            </div>
        </div> <!-- row -->
    </div> <!--  big container -->

    <div class="footer">
        <div class="container text-center">
            Gokhan YENER
        </div>
    </div>
</div>

</body>
<!--   Core JS Files   -->
<script src="{{ asset('assets/js/jquery-2.2.4.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/jquery.bootstrap.js') }}" type="text/javascript"></script>

<!--  Plugin for the Wizard -->
<script src="{{ asset('assets/js/material-bootstrap-wizard.js') }}"></script>

<!--  More information about jquery.validate here: http://jqueryvalidation.org/	 -->
<script src="{{ asset('assets/js/jquery.validate.min.js') }}"></script>


<script type="text/javascript">

    $.ajaxSetup({

        headers: {

            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')

        }

    });


    $("#play").click(function (e) {

        e.preventDefault();

        $.ajax({
            type: 'POST',
            url: '{{'play'}}',
            data: {season: Math.round(Math.random()*1000)},
            dataType: 'json',
            success: function (data) {
                console.log(data);

            }, error: function () {
                console.log(data);
            }
        });


    });

</script>

</html>
