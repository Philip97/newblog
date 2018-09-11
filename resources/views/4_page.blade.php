@extends('welcome')

@section('content')
<div id="vueExtras">
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
                            <input @click="useAxios(extras1)" :v-model="extras1" type="checkbox" :id="extras1.id" class="inp_extras" name="extras[]" :value="extras1.value"
                            @if($extras[0]['inside_fridge'] ?? false )
                                checked="checked"
                                :ckeck="extras1.check = true"
                            @endif
                            >
                            <label for="extras1"> </label>
                            Inside Fridge
                        </span>
                        <span class='extras_span'>
                            <input @click="useAxios(extras2)" :v-model="extras2" type="checkbox" :id="extras2.id" class="inp_extras" name="extras[]" :value="extras2.value"
                            @if($extras[0]['inside_oven'] ?? false )
                                checked="checked"
                                :check="extras2.check = true"
                            @endif
                            >
                            <label for="extras2"></label>
                             Inside oven
                        </span>
                        <span class='extras_span'>
                            <input @click="useAxios(extras3)" :v-model="extras3" type="checkbox" :id="extras3.id" class="inp_extras" name="extras[]" :value="extras3.value"
                            @if($extras[0]['garage_swept'] ?? false )
                                checked="checked"
                                :check="extras3.check = true"
                            @endif
                            >
                            <label for="extras3"></label>
                            Garage Swept
                        </span>
                        <span class='extras_span'>
                            <input @click="useAxios(extras4)" :v-model="extras4" type="checkbox" :id="extras4.id" class="inp_extras" name="extras[]" :value="extras4.value"
                            @if($extras[0]['inside_cabinets'] ?? false )
                                checked="checked"
                                :check="extras4.check = true"
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
                            <input @click="useAxios(extras5)" type="checkbox" :v-model="extras5" :id="extras5.id" class="inp_extras" name="extras[]" :value="extras5.value"
                            @if($extras[0]['laundry_wash_s_dry'] ?? false )
                                checked="checked"
                                :check="extras5.check = true"
                            @endif
                            >
                            <label for="extras5"></label>
                            Laundry Wash & Dry
                        </span>
                        <span class='extras_span' style="width: 75px;">
                            <input @click="useAxios(extras6)" type="checkbox" :v-model="extras6" :id="extras6.id" class="inp_extras" name="extras[]" :value="extras6.value"
                            @if($extras[0]['bed_sheet_change'] ?? false )
                                checked="checked"
                                :check="extras6.check = true"
                            @endif
                            >
                            <label for="extras6"></label>
                            Bed sheet Change
                        </span>
                        <span class='extras_span'>
                            <input @click="useAxios(extras7)" :v-model="extras7" type="checkbox" :id="extras7.id" class="inp_extras" name="extras[]" :value="extras7.value"
                            @if($extras[0]['blinds_cleaning'] ?? false )
                                checked="checked"
                                :check="extras7.check = true"
                            @endif
                            >
                            <label for="extras7"></label>
                            Blinds Cleaning
                        </span>
                    </div>
                </div><hr>

                <div class="col-12">
                    <p style="margin: 0px">Confirm your cleaning frequency</p>
                    <div :class="{ blu_col: weekly.clicked, inl_block: tr}">
                        <input type="submit" @click="btnClick(weekly, $event)" :v-model="weekly"
                        @if($order['frequency'] == 'weekly')
                            :attr="init()"
                        @endif
                        name="frequency_last" :value="weekly.value"
                        :class="{ blu_col2: weekly.clicked, last_btn: tr}"
                        >
                        <p class="inl_block">$<span class='weekly'>{{($total[2])}}</span> per cleanig</p>
                    </div>
                    <div :class="{ blu_col: biweekly.blueDiv, inl_block: tr}">
                        <input type="submit" @click="btnClick(biweekly, $event)" :v-model="biweekly" 
                        @if($order['frequency'] == 'biweekly')
                            :attr="init()"
                        @endif
                        name="frequency_last" :value="biweekly.value" 
                        :class="{ blu_col2: biweekly.clicked, last_btn: tr}"
                        >
                        <p class="inl_block">$<span class='biweekly'>{{($total[3])}}</span> per cleanig</p>
                    </div>
                    <div :class="{ blu_col: monthly.clicked, inl_block: tr}">
                        <input type="submit" @click="btnClick(monthly, $event)" :v-model="monthly"
                        @if ($order['frequency'] == 'monthly')  
                            :attr="init()"
                        @endif
                        name="frequency_last" :value="monthly.value"
                        :class="{ blu_col2: monthly.clicked, last_btn: tr}"
                        >
                        <p class="inl_block">$<span class='monthly'>{{($total[4])}}</span> per cleanig</p>
                    </div>
                    </form>
                </div>

            </div>
            <div class="col-3" id='my_side_bar' style="height: 100%;">
                <p class="price_top">Clining price</p>
                <div class="col-12" style="text-align: center;">
                    <p>Your Cleaning Plan:
                        <br> <span></span>
                        <span v-if="!total.total">{{$total[6]}}</span>
                        <span v-else>@{{total.frequency}}</span>
                    </p>
                    <p class="price_middl">
                       {{ ($order->bedrooms) }} - bed,
                       {{ ($order->bathrooms) }} - bath - 
                       {{ ($order->homeSquare) }} sq. ft.
                     
                    </p>
                </div>
                <div class="col-12" style="text-align: center;">
                    <div class="col-12">
                        <p>Per cleaning $
                            <span class='add_total' :v-model="total">
                                <span v-if="!total.total">{{$total[0]}}</span>
                                <span v-else>@{{total.curent}}</span>
                            </span>
                        </p>
                    </div>
                     <div class="col-12">
                        <p>Initial cleaning $
                            <span v-if="!total.total">{{$total[0]}}</span>
                            <span v-else>@{{total.curent}}</span>
                        </p>
                    </div>
                     <div class="col-12">
                        <p class="price_bottom">Coupon $0.00</p>
                    </div>
                <div class="col-12">

                </div>
                <ul style="padding: 0" >
                    <ol v-for="extra in extrasText" style="padding: 0">+ 15 for @{{extra}}</ol>
                </ul >
                <div :class="{today: topLine.visible}">
                    <p style="display: inline-block;">TODAY'S TOTAL &nbsp</p>
                    <p class="blu_col" style="display: inline-block;">$
                        <span v-if="!total.total" >{{$total[0]}}</span>
                        <span v-else v-text="total.curent"></span>
                    </p>
                </div>
                </div>
            </div>
        </div>

            <div class="row ">
            <div class="col-9"></div>
                <!-- <div class="col-3 align-self-center">
                    <form method="post" action="pay">
                        {{ csrf_field() }}
                        <div class="row justify-content-center">
                            <label for='pay_div'>
                                <div id="pay_div">
                                    <input type="submit" name="" id="pay_btn" value="I want pay now">
                                    <script
                                        src="https://checkout.stripe.com/checkout.js" class="stripe-button"
                                        data-key="{{ env('STRIPE_PUB_KEY') }}"
                                        data-name="Stripe Demo"
                                        data-description="Online course about integrating Stripe"
                                        data-image="https://stripe.com/img/documentation/checkout/marketplace.png"
                                        data-locale="auto"
                                        data-currency="usd">
                                     </script>
                                     </input>
                                 </div> 
                             </label>
                        </div>
                    </form>
                </div> -->
            </div>
    </div>
</div>

@endsection

@section('script')
<script src="/js/vue.js"></script>

@endsection