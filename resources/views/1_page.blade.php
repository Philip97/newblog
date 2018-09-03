@extends('welcome')
@section('style')
    html,
    body {
    height: 100%;
    }
    .wrapper {
    display: table;
    height: 100%;
    }
    .content {
    display: table-row;
    height: 100%;
    }
    .disp-inl {
    display: inline;
    }
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="m-5 disp-inl">
            <h2 class="disp-inl" style="padding-right: 76px;">Get a prise for home cleaning</h2>
        </div>
    </div>
    <form action="" method="post">
        {{ csrf_field() }}
        <div class="row justify-content-center">
        <div class="col-5">

            <div class="form-row row ">
                <div class="form-group col">
                    <select id="inp_bedrooms" class="form-control" name="bedrooms" style="width: 178px">
                        <option selected >Bedrooms...</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group col" style=" padding-right: 82px;">
                    <select id="inp_bathrooms" class="form-control" name="bathrooms" style="width: 180px;">
                        <option selected>Bathrooms...</option>
                        <option value="1">1</option>
                        <option value="2">1.5</option>
                        <option value="3">2</option>
                        <option value="4">2.5</option>
                        <option value="5">3</option>

                    </select>
                </div>
            </div>

            <div class="form-row">
                <div class="form-group " style="padding-left: 4px">
                    <label for="inp_zip">ZIP Code</label>
                    <input type="text" class="form-control" id="inp_zip" value="{{ old('zip') }}" name="zip" placeholder="54321" style="width: 100px; padding: 17.4px; height: 20px; margin-right: 5px">
                </div>
                <div class="form-group col pr-4" style=" padding-right: 58px;">
                    <label for="inp_email">Email</label>
                    <input type="text" class="form-control" id="inp_email" name="inp_email" value="{{ old('inp_email') }}" placeholder="Exapmle&#64;example" style="width: 262px; margin-right: 5px">
                </div>
            </div>
            <div class="row justify-content-center" style="margin-right: 57px">
                <button type="submit" class="btn btn-success m-2" id="send">Continue</button>
                
            </div>
        </div>
    </div>
    </form>
</div>

@endsection
@section('script')
    <!-- {{--<script src="js/js1.js"></script>--}} -->
@endsection