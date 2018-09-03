@extends('welcome')

@section('content')
<div class="container">
    <div class="my_header row justify-content-center top-web">
        <div class="col was">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <p><a href="/">Personal info</a></p>
                </div>
            </div>
        </div>
        <div class="col was">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <p> <a href="/your-home">Your home</a></p>
                </div>
            </div>
        </div>
        <div class="col was">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <p> <a href="/materials">Materials</a></p>
                </div>
            </div>
        </div>
        <div class="col green">
            <div class="container h-100">
                <div class="row h-100 justify-content-center align-items-center">
                    <p> Extras</p>
                </div>
            </div>
        </div>  <!-- end header -->
    </div>
</div>
<div class="container">
    <div class="row justify-content-between">
        <div class="col-7">
            <div class="col-12">
                <form action="" method="post">
                {{ csrf_field() }}
                <h3 style="margin: 45px 0 15px ">Extras</h3>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}">{{ Session::get('message') }}</p>
                    @endif
                <p>You can choose any of these items to be cleaned every 8 weeks</p>
                <div class="row justify-content-around">
                    <span class='extras_span'>
                        <input type="checkbox" id="extras1" class="inp_extras" name="extras[]" value="inside_fridge"
                        @if($extras[0]['inside_fridge'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras1"> </label>
                        Inside Fridge
                    </span>
                    <span class='extras_span'>
                        <input type="checkbox" id="extras2" class="inp_extras" name="extras[]" value="inside_oven"
                        @if($extras[0]['inside_oven'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras2"></label>
                         Inside oven
                    </span>
                    <span class='extras_span'>
                        <input type="checkbox" id="extras3" class="inp_extras" name="extras[]" value="garage_swept"
                        @if($extras[0]['garage_swept'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras3"></label>
                        Garage Swept
                    </span>
                    <span class='extras_span'>
                        <input type="checkbox" id="extras4" class="inp_extras" name="extras[]" value="inside_cabinets"
                        @if($extras[0]['inside_cabinets'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras4"></label>
                        Inside Cabinets
                    </span>
                </div>
            </div>
            <hr>
            <div class="col-9">
               
                <div class="row justify-content-around">
                    <span class='extras_span' style="width: 83px;">
                        <input type="checkbox" id="extras5" class="inp_extras" name="extras[]" value="laundry_wash_s_dry"
                        @if($extras[0]['laundry_wash_s_dry'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras5"></label>
                        Laundry Wash & Dry
                    </span>
                    <span class='extras_span' style="width: 75px;">
                        <input type="checkbox" id="extras6" class="inp_extras" name="extras[]" value="bed_sheet_change"
                        @if($extras[0]['bed_sheet_change'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras6"></label>
                        Bed sheet Change
                    </span>
                    <span class='extras_span'>
                        <input type="checkbox" id="extras7" class="inp_extras" name="extras[]" value="blinds_cleaning"
                        @if($extras[0]['blinds_cleaning'] ?? false )
                            checked="checked"
                        @endif
                        >
                        <label for="extras7"></label>
                        Blinds Cleaning
                    </span>
                </div>
            </div><hr>
            
        </div>
        <div class="col-3" id='my_side_bar'>
            <p class="price_top">Clining price</p>
            <div class="col-12" style="text-align: center;">
                <p>Weekly Cleaning Plan
                    <br>
                     This week
                </p>
                <p class="price_middl">
                   {{ ($order->bedrooms) }} - bed,
                   {{ ($order->bathrooms) }} - bath - 
                   {{ ($order->homeSquare) }} sq. ft.
                 
                </p>
            </div>
            <div class="col-12" style="text-align: center;">
                <div class="col-12">
                    <p>Per cleaning $<span class='add_total'>{{$total[0]}}</span></p>
                </div>
                 <div class="col-12">
                    <p>Initial cleaning $<span class='add_total'>{{$total[0]}}</span></p></p>
                </div>
                 <div class="col-12">
                    <p class="price_bottom">Coupon $0.00</p>
                </div>
            <div class="col-12">
                <p style="display: inline-block;">TODAY'S TOTAL &nbsp</p>
                <p class="blu_col" style="display: inline-block;">$<span class='add_total'>{{$total[0]}}</span></p>
            </div>
            </div>
        </div>
    </div>

        <div class="row ">
            <div class="col-9">
                <p style="margin: 0px">Confirm your cleaning frequency</p>
                <div class="inl_block
                @if($order['frequency'] == 'weekly')
                    blu_col
                @endif
                ">
                    <input type="submit" name="frequency_last" value="weekly" class="last_btn
                    @if($order['frequency'] == 'weekly')
                        blu_col2
                    @endif
                     ">
                    <p class="inl_block">$<span class='weekly'>{{($total[2])}}</span> per cleanig</p>
                </div>
                <div class="inl_block
                @if($order['frequency'] == 'biweekly')
                    blu_col
                @endif
                ">
                    <input type="submit" name="frequency_last" value="biweekly" class="last_btn
                    @if($order['frequency'] == 'biweekly')
                        blu_col2
                    @endif
                ">
                    <p class="inl_block">$<span class='biweekly'>{{($total[3])}}</span> per cleanig</p>
                </div>
                <div class="inl_block 
                @if ($order['frequency'] == 'monthly')
                        blu_col
                    @endif
                ">
                    <input type="submit" name="frequency_last" value="monthly" class="last_btn
                    @if ($order['frequency'] == 'monthly')  
                        blu_col2
                    @endif
                    ">
                    <p class="inl_block">$<span class='monthly'>{{($total[4])}}</span> per cleanig</p>
                </div>
                </form>
            </div>
            <div class="col-3 align-self-center">
                <form method="post" action="pay">
                    {{ csrf_field() }}
                    <div class="row justify-content-center">
                        <label for='pay_div'>
                            <div id="pay_div">
                                <script
                                    src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                    data-key="{{ env('STRIPE_PUB_KEY') }}"
                                    data-name="Stripe Demo"
                                    data-description="Online course about integrating Stripe"
                                    data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                    data-locale="auto"
                                    data-currency="usd">
                                 </script>
                             </div> 
                         </label>
                        <!-- <input type="submit" name="send_mail" value="confirm" class="last_btn" style="margin-top: -30px;" > -->
                    </div>
                </form>
            </div>
        </div>
</div>

<script type="text/javascript">
    $('#pay_div').click(function(e){
        $('button.stripe-button-el')[0].click();
    })
    var inpp = $('.inp_extras').click(function(e){
        var checked_extra = [];
        if($(this).prop("checked")) {
            checked_extra['save'] = $(this).val();
        } else {
            checked_extra['delete'] = $(this).val();
        }
        console.log(checked_extra);
        $.ajax({
            url: '/extras',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {
                      ajaxExtraSave: checked_extra['save'],
                      ajaxExtraDelete: checked_extra['delete'],
                  },
            cache: false,
            dataType: 'json',
            success: function(data){
                $('.add_total').text(data.total[0]);
                $('.weekly').text(data.total[2]);
                $('.biweekly').text(data.total[3]);
                $('.monthly').text(data.total[4]);
                $('.' + data.clicked_btn).text(data.total[0]);
            }
        });
    })
    $('input[name="send_mail"').click(function(e){
        e.preventDefault();
        $.ajax({
            url: '/mail/send',
            type: 'POST',
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            data: {send_mail: 'send_mail'},
            cache: false,
            dataType: 'json',
            success: function(response){
                console.log(response.success);
                alert('please check ypur email');
            }
        })
    })
        $('input[name="frequency_last"').click(function(e){
            e.preventDefault();
            var extras = $('input[type="checkbox"]:checked');
            var checked_extras = [];
            extras.each(function(e){
                checked_extras.push($(this).val());
            })
            var frequency = $(this).val();
            $.ajax({
                url: '/extras',
                type: 'POST',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                data: {extras: checked_extras, frequency_last: frequency},
                cache: false,
                dataType: 'json',
                success: function(data){
                    $('.add_total').text(data.total[0]);
                    $('.weekly').text(data.total[2]);
                    $('.biweekly').text(data.total[3]);
                    $('.monthly').text(data.total[4]);
                    $('.' + data.clicked_btn).text(data.total[0]);

                    $('.blu_col input').removeClass('blu_col2').parent('div').removeClass('blu_col');
                    $('input[value=' + data.clicked_btn +']').addClass('blu_col2').parent('div').addClass('blu_col');
                   
                }
            })
        })
</script>
@endsection
