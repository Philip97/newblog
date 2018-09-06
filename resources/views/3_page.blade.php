@extends('welcome')
@section('style')
.min_wd{
    min-width: 150px;
}
@endsection
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
            <div class="col green">
                <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                        <p> Materials</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                        <p> Extras</p>
                    </div>
                </div>
            </div>  <!-- end header -->
            <div class="w-100"></div> 
            <div class="col-3 p"></div>
            <div class="col-9 p">
                <h2>We need infotmation about your home</h2> <br>
                <h3>This information will be used to prepare for a cleaning</h3>
            </div>

            <div class="col-3 p">
                <div class="container h-100">
                    <div class="row h-100 justify-content-center align-items-center">
                            <p>Living greatures</p>
                    </div>
                </div>
            </div>
            <div class="col-9 p">
<form action="" method="post">
{{ csrf_field() }}
              <div class="col-11">  
                    <h4>Whot types of flooring in tour home?</h4>
                    <p></p>
                    <div class="row justify-content-around">
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="hardwood"> 
                                <span class="checkbox-custom"></span>
                                <span class="label">Hardwood</span>
                            </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="cork"> 
                                <span class="checkbox-custom"></span>
                                <span class="label">Cork</span>
                            </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="vinyl"> 
                                <span class="checkbox-custom"></span>
                                <span class="label">Vinyl</span>
                            </label>
                        </div>
                         <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="concrete"> 
                                <span class="checkbox-custom"></span>
                                <span class="label">Concrete</span>
                            </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="carpet">
                                <span class="checkbox-custom"></span>
                                <span class="label">Carpet</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="natural_stone">  
                                <span class="checkbox-custom"></span>
                                <span class="label">Natural Stone</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="tile"> 
                                <span class="checkbox-custom"></span>
                                <span class="label">Tile</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                                <input class="checkbox" type="checkbox" name="flooring[]" value="laminate"> 
                                <span class="checkbox-custom"></span>
                                <span class="label">Laminate</span>
                         </label>
                        </div>
                    </div>
                </div> 
                <hr>
                <div class="col-11">  
                    <h4>Whot types of countertops in tour home?</h4>
                    <p>Check all thet apply.</p>
                    <div class="row justify-content-around">
                        <div class="col-3">
                            <label>
                             <input class="checkbox"  type="checkbox" name="countertop[]" value="concrete">
                             <span class="checkbox-custom"></span>
                             <span class="label">Concrete</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input class="checkbox"  type="checkbox" name="countertop[]" value="quartz"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Quartz</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input class="checkbox"  type="checkbox" name="countertop[]" value="formica"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Formica</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input class="checkbox"  type="checkbox" name="countertop[]" value="granite"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Granite</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input  class="checkbox" type="checkbox" name="countertop[]" value="marble"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Marble</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input  class="checkbox" type="checkbox" name="countertop[]" value="tile"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Tile</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input  class="checkbox" type="checkbox" name="countertop[]" value="paper_Stone"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Paper Stone</span>
                         </label>
                        </div>
                        <div class="col-3">
                            <label>
                             <input  class="checkbox" type="checkbox" name="countertop[]" value="butcher_Block"> 
                             <span class="checkbox-custom"></span>
                             <span class="label">Butcher Block</span>
                         </label>
                        </div>
                    </div>
                      <hr>
                </div> 
                
                <div class="col-11"> 
                   
                    <div class="row justify-content-around"> 
                        <p class="min_wd">steel appliances</p>
                        <input id="pet1" type="radio" name="steel" value="1"/>
                        <label class="radio" for="pet1">Yes</label>
                        <input id="pet2" type="radio" name="steel" value="0"/>
                        <label class="radio" for="pet2">No</label>
                    </div>
                    <hr>
                </div>
                <div class="col-11">  
                    <div class="row justify-content-around">
                        <p class="min_wd">Kind of stove</p>
                        <input id="pet3" type="radio" name="stove" value="1"/>
                        <label class="radio" for="pet3">Yes</label>
                        <input id="pet4" type="radio" name="stove" value="0"/>
                        <label class="radio" for="pet4">No</label>
                    </div>
                    <hr>
              </div>
                <div class="col-11">  
                    <div class="row justify-content-around"> 
                        <p class="min_wd">Shower door</p>
                        <input id="pet5" type="radio" name="door" value="1"/>
                        <label class="radio" for="pet5">Yes</label>
                        <input id="pet6" type="radio" name="door" value="0"/>
                        <label class="radio" for="pet6">No</label>
                    </div> 
                    <hr>
               </div>
                <div class="col-11">  
                    <div class="row justify-content-around">
                         <p class="min_wd">Mold or mildew</p>
                        <input id="pet7" type="radio" name="mildew" value="1"/>
                        <label class="radio" for="pet7">Yes</label>
                        <input id="pet8" type="radio" name="mildew" value="0"/>
                        <label class="radio" for="pet8">No</label>
                    </div>
                </div> 
            </div> 
            <div class="col-8">
            <label for="advanced1" class="labl" >Are there areas needing special attention?(optional)</label>
                <textarea id="advanced1" name="attention" rows="3" cols="33" maxlength="900" wrap="hard"></textarea>
            </div>

            <div class="col-8">
            <label for="advanced2" class="labl">Anything else we should to know?(optional)</label>
                <textarea id="advanced2" name="more" rows="3" cols="33" maxlength="900" wrap="hard"></textarea>
            </div>
            <div class="w-100"></div> 

                    <div class="row justify-content-center " >
                        <button type="submit" class="btn btn-success " id="send_materials">3 Steps Left</button>
                    </div>
            </form>

    </div> <!-- // end aling -->
</div>  <!-- //end container -->
@endsection