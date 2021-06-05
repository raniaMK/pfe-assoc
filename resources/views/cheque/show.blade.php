{{--@extends('layouts.admin_layout')
@section('content')
    <div class="content-wrapper">
            <div class="border">
                <div class="container">
                    <section class="content">
                        <div class="content">
                            <div class="one">
                                <div class="title">
                                    <div id="bold">OWNERS NAME</div>
                                    <div class="name">COMPANY NAME <br>COMPANY ADDRESS<br> CITY, STATE ZIP</div>
                                </div>
                                <div class="number">
                                    <input type="text" name="montant" id="montant" value="{{$cheque->montant}}" size="8"
                                           disabled="true">dt
                                </div>
                                @csrf
                                <table class="info">
                                    <thead>
                                    <tr>

                                        <th class="chart">Date</th>
                                        <th class="chart">No.Coupon</th>
                                        <th class="chart">CIN</th>
                                        <th class="chart">Nom et Prenom</th>
                                        <th class="chart">validité</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    <tr>
                                        <td class="short" id="discount"><input type="text"
                                                                               value="{{$cheque->created_at->format('d/m/Y')}}"
                                                                               name="Validité" size="15"></td>
                                        <td class="blank long"><input type="text" name="numero" id="numero"
                                                                      value="{{$cheque->numero}}" size="15"></td>
                                        <td class="blank short"><input type="text" name="cin"
                                                                       value="{{$cheque->personne->CIN}}" size="15">
                                        </td>
                                        <td class="blank long des"><input type="text" id="nom" name="nom"
                                                                          value="{{$cheque->personne->nom}}" size="15">
                                        </td>
                                        <td class="short" id="discount"><input type="text" value="{{$cheque->validité}}"
                                                                               name="Validité" size="15"></td>
                                    </tr>
                                    </tbody>
                                    </tr>
                                    </tbody>
                                </table>


                                <table class="qr">
                                    <td>{!! QrCode::size(50)->generate(bcrypt($cheque->personne->CIN.' '.$cheque->created_at)); !!}</td>
                                </table>


                            </div>


                        </div>
                </div>
            </div>
        </div>

        <style>
            body {
                background-color: #a5afae;
                margin: 0;
                overflow: hidden;
            }

            .check {
                position: relative;
                left: 350px;
                background-color: white;
                width: 970px;
                height: 370px;
                border: 5px solid white;
            }

            .border {
                width: 100%;
                height: 80%;
                overflow: auto;
                margin: auto;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                border: 2px solid black;
            }

            .container {
                background-color: #fcfcfc;
                overflow: hidden;
                margin: 3px;
                position: absolute;
                top: 0;
                left: 0;
                bottom: 0;
                right: 0;
                border: 1px solid black;
            }

            .content {
                margin: 5px;
            }

            @import url(https://fonts.googleapis.com/css?family=Damion);
            @import url(https://fonts.googleapis.com/css?family=Mrs+Saint+Delafield);
            /* pattern from subtlepatterns.com */
            /* https://subtlepatterns.com/patterns/sneaker_mesh_fabric.png */
            /* font-family: 'Damion', cursive; */
            * {
                box-sizing: border-box;
                font-family: Helvetica;

            }

            .one {
                width: 100%;
            }

            .title {
                width: 300px;
                text-align: center;
                font-family: Helvetica;
                display: inline-block;
                margin-left: 25px;
                margin-bottom: 40px;


            }

            #bold {
                font-weight: bold;
                font size: 24px;
                text-transform: uppercase;
                letter-spacing: 0.4px;
                line-height: 150%;

            }

            .name {
                text-transform: uppercase;
                font-size: 11px;
                letter-spacing: 0.1px;
            }

            .number {
                font-family: "Courier New";
                font-weight: bold;
                margin-top: 0px;
                font-size: 20px;
                margin-left: 400px;
                display: inline-block;
                position: fixed;
                letter-spacing: 1px;


            }

            .qr {
                margin-bottom: 50px;
                margin-left: 800px;
            }

            .following {
                display: inline-block;
                font-family: Helvetica;
                font-size: 10px;
                text-transform: uppercase;
                border: 1px solid;
                width: 417px;
                margin-left: 16px;
                margin-top: 10px;
                border-collapse: collapse;
            }

            .line {
                text-align: center;
                width: 415px;
                height: 26px;
                font-size: 8px;
                padding: 12;;

            }

            .empty {
                border-top: 1px solid;


            }

            input {
                font-family: Helvetica;
                color: #333;
                background-color: #fcfcfc;
                text-align: center;
                border: none;
                width: auto;
                text-transform: uppercase;
            }

            input[name="reason"], input[name="reason2"] {
                width: 400px;
            }

            .two {
                width: 100%;
                margin-top: 16px;

            }

            .orderof {
                font-family: 'Damion', cursive;
                font-size: 1.5em;
                border-bottom: 1px solid #333;
                float: left;
                width: 75.9%;
                position: relative;
                padding-top: 0;
                padding: 0 0 0 1em;
                margin: 0px 0 2px 2em;
                line-height: 1;
                height: 32px;
                border-right: 1px solid #333;
            }

            .orderof:before {
                font-family: Helvetica;
                font-size: 0.5em;
                content: 'PAY';
                position: absolute;
                left: -3em;
                top: 1.3em;

            }

            input[name="amount"] {
                width: 300px;
                display: inline-table;
                height: 20px;
                font-size: 18px;
                text-transform: uppercase;
                letter-spacing: 0.3px;
                position: fixed;
                top: 158px;
                text-align: left;
            }

            .bd {
                text-align: right;
                text-transform: uppercase;
                font-family: Helvetica;
                font-size: 20px;
                letter-spacing: 8px;
            }

            .dollar {
                text-align: right;
                text-transform: uppercase;
                font-family: Helvetica;
                font-size: 0.5em;
                margin-left: 298px;
                position: fixed;
                top: 162px;
            }

            .info {
                border-collapse: collapse;
                margin-left: 11px;
                text-align: center;
                text-transform: uppercase;
                font-family: Helvetica;
                font-size: 10px;
                border: 1px solid #333;
                display: inline-table;
                width: 80%;
            }

            input[name="date"] {
                font-size: 13px;
                width: 56px;
            }

            input[name="name"] {
                width: 200px;
                font-size: 17px;
            }

            input[name="num"] {
                width: 50px;
                font-size: 13px;
            }

            input[name="description"] {
                width: 200px;
                font-size: 14px;
            }

            input[name="discount"] {
                width: 50px;
                font-size: 13px;
            }

            .row {

            }

            .chart {
                border: 1px solid #333;
                font-weight: normal;
            }

            #discount {
                border-left: 1px dashed;
            }

            .blank {
                height: 40px;
                border: 1px solid #333;
                font-size: 14px;

            }

            .short {
                width: 79px;
            }

            .long {
                width: 300px;
                font-size: 18px;
            }

            .des {
                font-size: 15px;
            }

            .amount {
                text-align: center;
                width: 144px;
                text-align: center;
                text-transform: uppercase;
                font-family: Helvetica;
                font-size: 11px;
                margin-right: 30px;
                float: right;
                display: inline;
                position: absolute;
                right: -7px;
                top: 144px;
            }

            .sign {
                font-family: Helvetica;
                font-size: 15px;
                padding-right: 10px;
                position: fixed;
                display: inline;
                right: 620px;
                top: 209px;
            }

            p {
                text-transform: uppercase;
                font-family: Helvetica;
                font-size: 11px;
                letter-spacing: 0.5px;
                display: inline;
                padding-left: 25px;
                text-align: center;
            }

            .box {

                border: 1px solid #333;
                width: 120px;
                height: 30px;
                float: right;
                clear: both;
                margin-top: 20px;
            }

            .whole {
                border-right: 1px dashed #333;
                height: 28px;
                width: 84px;
                margin-top: 0.7px;
            }

            input[name="whole"] {
                text-align: right;
                width: 72px;
                right: 544px;
                top: 204px;
                font-size: 18px;;
            }

            input[name="cent"] {
                text-align: right;
                width: 23px;
                display: inline;
                font-size: 18px;
                position: absolute;
                margin-left: 12px;;
            }

            .cent {

            }

            .num {
                font-family: 'Damion', cursive;
                font-size: 1.5em;
                float: left;
                border: 2px solid #aaa;
                position: relative;
                margin: 0 0 0 2em;
                padding: 0 0.5em;
                line-height: 0.9em;
            }

            .num:before {
                font-family: Helvetica;
                content: '$';
                font-weight: bold;
                position: absolute;
                left: 1em;
            }

            .dollars {
                font-family: 'Damion', cursive;
                font-size: 1.5em;
                border-bottom: 1px solid #666;
                width: 84%;
                float: left;
                padding: 0 0 0 4em;
                position: relative;
            }

            .dollars:after {
                font-family: Helvetica;
                font-size: 0.5em;
                content: 'DOLLARS';
                position: absolute;
                right: -5em;
                top: 1.7em;
            }

            .add {
                width: 267px;
                margin-left: 80px;
                margin-top: 5px;
            }

            .lines {
                border-bottom: 1px solid #333;
                height: 25px;
                font-size: 13px;
                text-align: center;
                padding: 0;
                margin: 0;
            }

            input[name="address"], input[name="citystate"] {
                font-size: 13px;
                width: 260px;
                text-transform: uppercase;
                padding: 0;
                margin: 0;
            }

            .bank {
                font-size: 9px;
                text-align: center;
                font-family: Helvetica;
                height: 25px;
                padding-top: 10px;
                letter-spacing: 0.5px;
            }

            .signature {
                margin: 0 10px 30px 0.7em;
                width: 40%;
                padding-bottom: -13px;
                right: 10;
                float: right;;
            }

            .sig {
                font-family: 'Mrs Saint Delafield', cursive;
                font-size: 2em;

                border-bottom: 1px solid #333;
                line-height: 0.9em;

            }

            .mp {
                text-align: right;
                font-size: 8px;
                font-weight: bold;
                letter-spacing: -8;
            }
        </style>

    </div>


@endsection--}}
    <!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet"href="style.css">
    <link href="https://fonts.googleapis.com/css?family=Righteous&display=swap" rel="stylesheet">
</head>
<body>
<div class="card-body">
    <div class="header">
        <div class="bottom">
            <p id="doller">{!! QrCode::size(100)->generate(bcrypt($cheque->personne->CIN.' '.$cheque->created_at)); !!}</p>
        </div>
        <br/>
    </div>
    <div class="fotter">
        <div class="in-fotter">
            <label><h2>Nom</h2></label>
            <div class="card">
                <input type="text" class="card-number" id="card-number" value="{{$cheque->personne->nom}}">
            </div>
           <br/>
            <label><h2>Prenom</h2></label>
            <div class="card">
                <input type="text" class="card-number" id="card-number" value="{{$cheque->personne->prenom}}">
            </div>
            <br/>
            <label><h2>Numéro du CIN </h2></label>
            <div class="card">
                <input type="text" class="card-number" id="card-number"value="{{$cheque->personne->CIN}}">
            </div>
            <div class="separator"><label></label></div>
            <div class="cvr">
                <div class="cvr1">
                    <label><strong>Validité</strong></label>
                    <input type="text" class="cvc" value="{{$cheque->validité}}">
                </div>
                <div class="cvr2">
                    <label></label>
                    <input type="text" class="cvc">
                </div>
                    <label><h2>Numéro du cheque</h2></label>
                    <input type="text" class="card-woner"id="card-woner"value="{{$cheque->numero}}">
                <label>Montant</label>
                <input type="text" class="card-woner"id="card-woner"value="{{$cheque->montant}}">
            </div>
        </div>
{{--        <div class="btn">
            <a id="p" href="#">Process Order</a>
        </div>--}}
    </div>
</div>
</body>
</htmL>
<style>
    *{
        margin:0px;
        padding:0px;
        box-sizing:border-box;
    }
    .card-body{
        height:600px;
        width:350px;
        margin:auto;
        margin-top:20px;
        margin-bottom:20px;
        box-shadow:0px 0px 10px 0px;
        border-radius:5px;
        overflow:hidden;
    }
    .header{
        height:150px;
        background:#154c79;
    }
    .top{
        height:70px;
    }
    .top p{
        text-align:center;
        line-height:80px;
        font-size:20px;
        font-family: 'Righteous', cursive;
        color:white;
    }
    .bottom{
        height:80px;
    }
    .bottom p{
        text-align:center;
        font-size:50px;
        line-height:30px;
        color:white;
        font-family: 'Righteous', cursive;
    }
    #doller:hover{
        color:#ffca28;
        transform:scale(1.03);
        transition:0.4s;
    }
    .fotter{
        height:250px;
    }
    .in-fotter{
        height:280px;
        width:215px;
        margin:auto;
        margin-top:20px;
    }
    .paypal{
        height:40px;
        widht:100%;
        border:2px solid lightgray;
    }
    .paypal p{
        font-family:arial;
        line-height:40px;
        float:left;
        margin-left:40px;
        color:gray;
    }
    .paypal img{
        height:20px;
        width:70px;
        float:left;
        margin-top:9px;
    }
    #p{
        text-align:center;
    }
    .or h3{
        color:gray;
    }
    label{
        font-size:11px;
    }
    .card{
        height:40px;
        width:100%;
        border:2px solid lightgray;
    }
    .card-number{
        height:36px;
        width:80%;
        border:none;
    }
    .mscard{
        height:40px;
        width:20%;
        float:right;
    }
    .mscard img{
        height:15px;
        width:28px;
        float:right;
        transform:translate(0px,10px);
        padding-right:2px;
    }
    .cvr{
        height:40px;
        width:100%;
    }
    .cvr1{
        height:60px;
        width:48%;
        float:left;
        margin-right:2%;
    }
    .cvr2{
        height:60px;
        width:48%;
        float:right;
    }
    .cvc{
        height:40px;
        width:100%;
        border:2px solid lightgray;
    }
    .card-woner{
        height:40px;
        widht:215px;
        border:2px solid lightgray;
    }
    #card-woner{
        width:215px;
    }
    .btn{
        height:40px;
        width:80%;
        margin:auto;
        background:#154c79;
        border-radius:20px;
        margin-top:-15px;
    }
    .btn:hover{
        background:#154c79;
        transition:0.3s;
    }
    .btn a{
        text-decoration:none;
        text-align:center;
        padding-left:30%;
    }
    #p{
        color:white;
        line-height:40px;
    }
    //*or css*//
    .separator{
        position: relative;
        text-align: center;
    }

    .separator label{
        background-color:#fff;
        padding: 0 0.4em;
        position: relative;
    }

    .separator:before{
        content: "";
        display: block;
        background: grey;
        width: 16%;
        height:1px;
        position:absolute;
        margin-top:10px;
    }
    .separator label:after{
        content: "";
        display: block;
        background: grey;
        width: 16%;
        height:1px;
        position:absolute;
        margin-left:130px;
        margin-top:-8px;

    }</style>
