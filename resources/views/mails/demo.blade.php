Hello <i>{{ $order->firstName }}</i>,
<p>You ordered cleaning house with next with parameters </p>
 
<p><u>Demo object values:</u></p>
 
<div>
<p><b>Bedrooms:</b>&nbsp;{{ $order->bedrooms }}</p>
<p><b>Bathrooms:</b>&nbsp;{{ $order->bathrooms }}</p>
<p><b>Home Square:</b>&nbsp;{{ $order->homeSquare }}</p>
<p><b>Frequency of cleaning:</b>&nbsp;{{ $order->frequency }}</p>
<p><b>When:</b>&nbsp;{{ $order->date }}</p>
<p><b>Pet:</b>&nbsp;{{ $order->pet }}</p>
<p><b>Adult:</b>&nbsp;{{ $order->adult }}</p>
<p><b>Your dirty makr:</b>&nbsp;{{ $order->dirty }}</p>
<p><b>Steel appliances:</b>&nbsp;{{ $order->steel }}</p>
<p><b>Kind of stove:</b>&nbsp;{{ $order->stove }}</p>
<p><b>Shower door:</b>&nbsp;{{ $order->door }}</p>
<p><b>Mold or mildew:</b>&nbsp;{{ $order->mildew }}</p>
@if($extras->inside_fridge ?? false )
    <p><b>Inside fridge:</b>&nbsp; YES</p>
@endif
@if($extras->inside_oven ?? false )
    <p><b>Inside oven:</b>&nbsp; YES</p>
@endif
@if($extras->garage_swept ?? false )
    <p><b>Garage swept:</b>&nbsp; YES</p>
@endif
@if($extras->inside_cabinets ?? false )
    <p><b>Inside cabinets:</b>&nbsp; YES</p>
@endif
@if($extras->laundry_wash_s_dry ?? false )
    <p><b>laundry wash and dry:</b>&nbsp; YES</p>
@endif
@if($extras->bed_sheet_change ?? false )
    <p><b>Bed sheet change:</b>&nbsp; YES</p>
@endif
@if($extras->blinds_cleaning ?? false )
    <p><b>Blinds cleaning:</b>&nbsp; YES</p>
@endif

<p><b>Flooring:</b>&nbsp; 
@if($countertops->hardwood ?? false )
    hardwood
@endif
@if($countertops->cork ?? false )
    cork
@endif
@if($countertops->vinyl ?? false )
    vinyl
@endif
@if($countertops->concrete ?? false )
    concrete
@endif
@if($countertops->carpet ?? false )
    carpet
@endif
@if($countertops->natural_stone ?? false )
    natural stone
@endif
@if($countertops->tile ?? false )
    tile
@endif
@if($countertops->laminate ?? false )
    laminate
@endif
</p>
<p><b>Countertop:</b>&nbsp; 
@if($countertops->concrete ?? false )
    concrete
@endif
@if($countertops->quartz ?? false )
    quartz
@endif
@if($countertops->formica ?? false )
    formica
@endif
@if($countertops->granite ?? false )
    granite
@endif
@if($countertops->marble ?? false )
    marble
@endif
@if($countertops->tile ?? false )
    tile
@endif
@if($countertops->paper_Stone ?? false )
    paper stone
@endif
@if($countertops->butcher_Block ?? false )
    butcher block
@endif
</p>

</div>
 
<p><u>Your total price{{ $calculate[0] }}</u></p>
 
