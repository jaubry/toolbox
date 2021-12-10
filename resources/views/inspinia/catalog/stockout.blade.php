@extends('inspinia.layout.default')



@section('content')


@push('styles')
<link href="{{ asset('assets/inspinia/css/select2.min.css') }}" rel="stylesheet">
<link href="{{ asset('assets/inspinia/css/select2-bootstrap4.min.css') }}" rel="stylesheet">
@endpush


<div class="row">
                <div class="col-lg-2">
                    <div class="ibox ">
                        <div class="ibox-content">
                        {!! Form::open(array('route' => 'catalog.stockout', 'method' => 'post', 'role' => 'form')) !!}
                            <div class="file-manager">
                                <h5>Show:</h5>
                                <div class="form-group">
                            <label class="col-form-label" for="store">Boutique</label>
                            {!! Form::select('store', $lstStores, $selectedStore, [
	                                                	'id' => 'store', 
	                                                	'class' => 'form-control select2',
	                                                	'data-placeholder' => 'Choix d\'un shop...']) !!}
                            <!--<select class="select2 form-control">
                                        <option value="1">Option 1</option>
                                        <option value="2">Option 2</option>
                                        <option value="3">Option 3</option>
                                        <option value="4">Option 4</option>
                                        <option value="5">Option 5</option>
                                    </select>-->
                        </div>
                        {!! Form::close() !!}
                                <div class="hr-line-dashed"></div>
                                <h5 class="tag-title">Ingrédients</h5>
                                <ul class="tag-list" style="padding: 0">
                                    <li><a href="">Family</a></li>
                                    <li><a href="">Work</a></li>
                                    <li><a href="">Home</a></li>
                                    <li><a href="">Children</a></li>
                                    <li><a href="">Holidays</a></li>
                                    <li><a href="">Music</a></li>
                                    <li><a href="">Photography</a></li>
                                    <li><a href="">Film</a></li>
                                </ul>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-10 animated fadeInRight">
                @foreach ($stockoutProducts as $categ => $products)
                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>{{ $categ }} </h5>
                            </div>
                            <div class="ibox-content" style="clear: both;">
                                <div class="tiles">
                                
                                    @foreach ($products as $product)
                                    <div class="tile image popovers " data-action="deact" data-active="0" data-disabled="0" data-product="2927" data-trigger="hover" data-placement="bottom" data-container="body" data-html="true" data-content="Menu ? <b>Oui</b><br/>Prix = <b>45€</b><br/>Code = <b>4NANC</br>" data-original-title="Détails du produit" style="width:110px !important;">
                                        <div class="tile-body">
                                            <img src="{{ $product['image'] }}" alt=""> 
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> {{ $product['name'] }} </div>
                                        </div>
                                    </div>
                                    @endforeach
                                    <!--
                                    <div class="tile image popovers " data-action="deact" data-active="0" data-disabled="0" data-product="2927" data-trigger="hover" data-placement="bottom" data-container="body" data-html="true" data-content="Menu ? <b>Oui</b><br/>Prix = <b>45€</b><br/>Code = <b>4NANC</br>" data-original-title="Détails du produit" style="width:110px !important;">
                                        <div class="tile-body">
                                            <img src="https://www.sushishop.fr/product-12461-200x200/box-nanoblock-diy.png" alt=""> 
                                        </div>
                                        <div class="tile-object">
                                            <div class="name"> Box nanoblock </div>
                                        </div>
                                    </div>-->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach

                <div class="row">
                    <div class="col-lg-12">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>TouchSpin <small>http://www.virtuosoft.eu/code/bootstrap-touchspin/</small></h5>
                            </div>
                            <div class="ibox-content">
                                <p>
                                    A mobile and touch friendly input spinner component for Bootstrap 3. It supports the mousewheel and the up/down keys.
                                </p>

                                <div class="row">
                                    <div class="col-md-4">

                                        <p class="font-bold">
                                            Basic example with empty value
                                        </p>

                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend"><button class="btn btn-white bootstrap-touchspin-down" type="button">-</button></span><input class="touchspin1 form-control" type="text" value="" name="demo1"><span class="input-group-btn input-group-append"><button class="btn btn-white bootstrap-touchspin-up" type="button">+</button></span></div>
                                    </div>
                                    <div class="col-md-4">
                                        <p class="font-bold">
                                            Example with postfix
                                        </p>
                                        <div class="input-group bootstrap-touchspin bootstrap-touchspin-injected"><span class="input-group-btn input-group-prepend"><button class="btn btn-white bootstrap-touchspin-down" type="button">-</button></span><input class="touchspin2 form-control" type="text" value="55" name="demo2"><span class="input-group-addon bootstrap-touchspin-postfix input-group-append"><span class="input-group-text">%</span></span><span class="input-group-btn input-group-append"><button class="btn btn-white bootstrap-touchspin-up" type="button">+</button></span></div>
                                    </div>
                                    <div class="col-md-4">

                                        <p class="font-bold">
                                            Example with vertical button alignment:
                                        </p>
                                        <div class="input-group  bootstrap-touchspin bootstrap-touchspin-injected"><input class="touchspin3 form-control" type="text" value="" name="demo3"><span class="input-group-btn-vertical"><button class="btn btn-white bootstrap-touchspin-up " type="button">+</button><button class="btn btn-white bootstrap-touchspin-down " type="button">-</button></span></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


                    <div class="row">
                        <div class="col-lg-12">
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p1.jpg">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p2.jpg">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p3.jpg">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-fluid fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p1.jpg">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p2.jpg">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p3.jpg">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-fluid fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-file"></i>
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Jan 11, 2014</small>
                                        </div>
                                    </a>
                                </div>

                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p1.jpg">
                                        </div>
                                        <div class="file-name">
                                            Italy street.jpg
                                            <br>
                                            <small>Added: Jan 6, 2014</small>
                                        </div>
                                    </a>

                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p2.jpg">
                                        </div>
                                        <div class="file-name">
                                            My feel.png
                                            <br>
                                            <small>Added: Jan 7, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-music"></i>
                                        </div>
                                        <div class="file-name">
                                            Michal Jackson.mp3
                                            <br>
                                            <small>Added: Jan 22, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="image">
                                            <img alt="image" class="img-fluid" src="img/p3.jpg">
                                        </div>
                                        <div class="file-name">
                                            Document_2014.doc
                                            <br>
                                            <small>Added: Fab 11, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <div class="file">
                                    <a href="#">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="img-fluid fa fa-film"></i>
                                        </div>
                                        <div class="file-name">
                                            Monica's birthday.mpg4
                                            <br>
                                            <small>Added: Fab 18, 2014</small>
                                        </div>
                                    </a>
                                </div>
                            </div>
                            <div class="file-box">
                                <a href="#">
                                    <div class="file">
                                        <span class="corner"></span>

                                        <div class="icon">
                                            <i class="fa fa-bar-chart-o"></i>
                                        </div>
                                        <div class="file-name">
                                            Annual report 2014.xls
                                            <br>
                                            <small>Added: Fab 22, 2014</small>
                                        </div>
                                    </div>
                                </a>
                            </div>

                        </div>
                    </div>
                    </div>
                </div>


                @push('scripts')
                <script src="{{ asset('assets/inspinia/js/select2.full.min.js') }}" type="text/javascript"></script>

                <script type="text/javascript">
                    
	                $(document).ready(function() {
                        $(".select2").select2();



                        $(".tiles .tile").on("click", function(e) {
        e.preventDefault();
        //console.info($(this));
        var productId = $(this).data("product");
        var tileActive = $(this).data("active");
        var tileDisabled = $(this).data("disabled");  
        var tileAction = $(this).data("action");  
        console.info(productId)        
        console.info(tileDisabled)    
        if (tileDisabled=="0") {
            /*
          if (tileAction == "deact") {
            counter = checkedProductToDesactive;
          }
          else {
            counter = checkedProductToReactive;            
          }
          */


          if (tileActive == "0") {
            // select
            $(this).prepend('<div class="corner"> </div><div class="check"> </div>');
            $(this).addClass("selected");
            $(this).data("active", "1");
            
            counter++;
            //$(this).parent().parent().find("h3 div").addClass("list-group-item-warning");

          } else {
            $(this).find(".corner").remove();
            $(this).find(".check").remove();
            $(this).removeClass("selected");
            $(this).data("active", "0");

            counter--;

          }

          /*
          if (tileAction == "deact") {
            checkedProductToDesactive = counter;
            var $btn = $(".btnConfirmProductsDesactive");
            var $span = $btn.find("span");
            if (checkedProductToDesactive > 0) {
              // add number to buttons
              $btn.prop("disabled", false);
              $span.text(checkedProductToDesactive);
            } else {            
              $btn.prop("disabled", true);
              $span.text("0");
            }
          }
          else {
            checkedProductToReactive = counter;
            var $btn = $(".btnConfirmProductsReactive");
            var $span = $btn.find("span");
            if (checkedProductToReactive > 0) {
              $btn.prop("disabled", false);
              $span.text(checkedProductToReactive);
            } else {            
              $btn.prop("disabled", true);
              $span.text("0");
            }
          }
          */
        }

      })




                    });
                </script>

                @endpush
@endsection