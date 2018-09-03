<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">

        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <link href="{{ asset('css/app.css') }}" rel="stylesheet">

        <script src="{{ asset('js/app.js') }}"></script>

        <title>HomeClean</title>

        <style>

            #pay_div > button {
                display: none;
            }
            #pay_div {
                height: 44.4px;
                padding: 10px;
                display: inline-block;
                margin: 10px 0 0 0;
                min-width: 151px;
                text-align: center;
                border: 1px solid #000;
                cursor: pointer;
                background-color: inherit;
            }
            #pay_div:after {
                content: "I want pay now";
            }
            .last_btn
            {
                padding: 10px;
                display: inline-block;
                margin: 10px 0 0 0;
                min-width: 151px;
                text-align: center;
                border: 1px solid #000;
                cursor: pointer;
                background-color: inherit;
            }
            .img_span {
                display: inline-flex;
                text-align: center;
                line-height: 115px;
            }
            .class_none {
                display: none;
            }
            .delete_img {
                position: relative;
                left: -82px;
                z-index: 10;
            }
            .del_img {
                background-color: white;
                opacity: 0.6;
                display: inline-block;
                
            }
            .price_middl{
                width: 283px;
                height: 45px;
                line-height: 45px;
                text-align: center;
                position: relative;
                left: -30px;
                border-bottom: 1px solid;
            }
            .price_bottom {
                width: 283px;
                height: 45px;
                line-height: 45px;
                text-align: center;
                position: relative;
                left: -45px;
                border-bottom: 1px solid;
            }
            .price_top{
                width: 283px;
                height: 45px;
                line-height: 45px;
                text-align: center;
                position: relative;
                left: -15px;
                background-color: gray;
            }
            #my_side_bar {
                border: 1px solid black;
                margin-top: 50px;
            }
            input[type=radio],
            input[type=checkbox],
            input[type=file]
             {
                display: none;
            }
            input[name=frequency] + label,
            input[name=date] + label,
            input[name=pet] + label,
            input[name=adult] + label,
            input[name=children] + label,
            input[name=file\[\]] + label,
            input[name=logo] + label
            {
                padding: 10px;
                display: inline-block;
                margin: 10px 0 0 0;
                min-width: 131px;
                text-align: center;
                border: 1px solid #000;
                cursor: pointer;
            }
            input[name=frequency]:checked + label,
            input[name=date]:checked + label,
            input[name=pet]:checked + label,
            input[name=adult]:checked + label,
            input[name=children]:checked + label
             {
                margin: 8px 0 0 0;
                border: solid 2px #4cae4c ;
            }

            input[name=advertis]:checked + label {
                color: green;
            }
            input[name=dirty] + label {
                margin: 5px 0 0 -15pxpx ;
                color: #fff;
                min-width: 2px;
                background: #c5cdd2;
                display: inline-block;
                text-align: center;
                border: 1px solid rgb(108, 117, 125);
                cursor: pointer;
                padding: 5px 30px;
                z-index:2;
            }

            input[name=dirty]:checked + label {
                position: relative;
                box-shadow: 0px 0px 1px 2px rgba(0,0,0,0.75);
                z-index: 6;
            }
            input[name=advertis] + label{
                display: inline-block;
                width: 100%;
                padding-left: 25px;
            }
            input[name=chek] + label,
            input[name=stove] + label,
            input[name=door] + label,
            input[name=mildew] + label,
            input[name=steel] + label
            {
                height: 50px;
                width: 50px;
                min-width: 2px;
                border:none;
                background: url(img/no_checked.png) 100% 100% no-repeat;
                background-size: contain;
                text-align: center;
                line-height: 50px;
            }
            input[name=extras\[\]] + label{
                height: 45px;
                width: 50px;
                min-width: 2px;
                border:none;
                background: url(img/q2.png) 100% 100% no-repeat;
                background-size: contain;
                text-align: center;
                line-height: 50px;
            }
            .extras_span:has(input[name=extras\[\]]:checked){
                color: der;
            }
            input[name=chek]:checked + label,
            input[name=stove]:checked + label,
            input[name=door]:checked + label,
            input[name=mildew]:checked + label,
            input[name=steel]:checked + label {
                background-image: url(img/checked.png);
            }
            span > input[type=checkbox]:checked + label{
                display: inline-block;
                border: 1px solid green;
            }
            .checkbox-custom {
                position: relative;      
                width: 30px;
                height: 30px;            
                border: 2px solid #ccc;
                border-radius: 3px;
            }

            .checkbox-custom,
            .label {
                display: inline-block;
                vertical-align: middle;
            }
            .inl_block {
                display: inline-block;
                width: 140px;
                margin: 0 15px 15px;
            }

            .checkbox:checked + .checkbox-custom::before {
                content: "";            
                display: block;         
                position: absolute;     
                top: 4px;
                right: 4px;
                bottom: 4px;
                left: 4px;
                background: #9b83a9;    
                border-radius: 2px;
            }
            .width_more {
                width: 70px !important;
                background-color: #c5cdd2;
            }
            .pgorressBar {    /* top */
                padding: 20px;
                border: 1px solid;
                border-right: 0px;
            }
            .p {
                padding: 35px;
            }
            .green {
                background-color: limegreen;
            }
            .was {
                background-color: lightgreen;
            }
            .not-error {
                border-color: #4cae4c;
                background-color: #fff;
                box-shadow: 0px 0px 10px 0px rgba(15,250,3,1);
            }
            #dropDown, .dropdown, .dropdown-menu{
                width : 100% !important;
                color: black;
                background-color: #fff;
            }
            
            .lef {
                float: left;
                margin: 20px;
            }
            .rig {
                float: right;
                padding-right: 90px;
                margin: 20px;
            }
            .check_img {
                height: 30px;
                margin: 6px 7px 10px 1px;
            }
            .for_img img{
                width: 125px;
                height: 125px;
                padding: 10px;
            }
            

            .progress_label_last {
                border-radius: 0 5px 5px 0;
            }

            .progress_label_first {
                border-radius:  5px 0 0 5px;
            }

            textarea {
                padding: 10px;
                line-height: 1.5;
                border-radius: 5px;
                border: 1px solid #ccc;
                box-shadow: 1px 1px 1px #999;
                margin-bottom: 30px;
            }

            .textarea-example {
                 font-family: sans-serif;
            }

            .textarea-example div {
                margin-bottom: 20px;
            }

            .labl {
                margin-top: 30px;
            }

            .labl,
            textarea {
                display: block;
                font-size: 12px;
                letter-spacing: 1px;
            }
            #send_materials {
                margin: 30px 0 78px;
            }

            .extras_span{
                width: 55px;
                text-align: center;
            }
            .blu_col{
                color: #0673ff;
            }
            .blu_col2{
                background: #51a4f76e;
            }
            #page2second{
                margin: 30px;
            }
       @yield('style')
        </style>

    </head>
    <body>
    <div class="wrapper">
        <div class="container-fluid    bg-white p-3">
            <div class="row align-items-start justify-content-around">
                <div class="col-5">
                    <h1 class="disp-inl">pure &nbsp;</h1><h2 class="disp-inl"> house cleaning</h2>
                </div>
                <div class="col-4">
                    <h3 class="disp-inl">serving &nbsp;</h3> <h2 class="disp-inl">king country</h2>
                </div>
            </div>
        </div>
        <div class="content">
            @yield("content")
             @if (count($errors) > 0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
             @endif
        </div>

        <div class="container-fluid    bg-white p-3 footer">
            <div class="row align-items-end justify-content-around">
                <div class="col-5">
                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Alias amet at dolorem ea eaque, earum
                        exercitationem fugit illum ipsum libero nihil.
                    </div>
                    <div>Consequuntur perspiciatis reiciendis tempora voluptas. Accusantium cumque quidem saepe soluta?
                        Architecto deserunt dolorum facilis id iste labore minus .
                    </div>
                </div>
                <div class="col-4">
                    <div>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium ad at, corporis dolore error
                        modi nemo officiis quis? Aliquam amet eaq.
                    </div>
                    <div>Blanditiis cumque deleniti similique sit voluptates? Assumenda corporis cum doloremque dolores
                        facere ipsum iure labore neque nisi numquam officiis omnis porro rem, rep.
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="js/one_more.js"></script>
    @yield('script')
    </body>
</html>