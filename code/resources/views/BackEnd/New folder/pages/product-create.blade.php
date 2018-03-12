@extends('layouts.master')
@section('content')
<div class="upload-your-work-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12 banner">
                <img src="{{ asset('assets/images/upload-your-work/banner.png') }}" alt="">
            </div>
            <div class="col-md-12">
                <div class="upload-your-work-wrapper">
                    <div class="description col-md-3">
                    Upload your works
                </div>
                <form action="" class="form-upload-work col-md-6">
                    <div class="form-group">
                        <div class="upload-form__type">
                            <select id="type" class="form-item">
                                <option>Type</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="upload-form__subject">
                            <select id="subject" class="form-item">
                                <option>Subject</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="upload-form__style">
                            <select id="style" class="form-item">
                                <option>Style</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <p class="upload-form__medium">
                            <select id="medium" class="form-item">
                                <option>Medium</option>
                                <option>2</option>
                                <option>3</option>
                                <option>4</option>
                            </select>
                        </p>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="name" value="" placeholder="Name">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="year" value="" placeholder="Year">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="location" value="" placeholder="Location">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="references" value="" placeholder="References">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="width" value="" placeholder="Width">
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="height" value="" placeholder="Height">
                    </div>
                    <div class="form-group">
                        <textarea name="" rows="4" placeholder="Description" id="des"></textarea>
                    </div>
                    <div class="form-group">
                        <input id="uploadFile" type="text" class="form-item" value="" placeholder="Upload image">
                        <div class="fileUpload btn">
                            <span>Browse</span>
                            <input id="uploadBtn" type="file" class="upload" />
                        </div>
                    </div>
                    <div class="form-group-s">
                        <p> </p>
                        <input type="radio" class="for" id="sell" name="for" value="sell">
                        <label for="sell">For sell</label>
                        <input type="radio" class="for" id="bidding" name="for" value="bidding">
                        <label for="bidding">For Bidding</label>
                        <input type="radio" class="for" id="exhibition" name="for" value="exhibition">
                        <label for="ehibition">For Exhibition</label>
                    </div>
                    <div class="form-group">
                        <input type="text" class="form-item" name="price" value="" placeholder="Price">
                    </div>
                    <div class="form-group" id="bidding-start">
                        <input type="text" class="form-item" name="b-start" value="" placeholder="Bidding start">
                    </div>
                    <div class="form-group" id="expiredate">
                        <input id="datepicker" type="text" class="form-item" name="Expiredate" value="" placeholder="Expire date"><i class="fa fa-calendar" aria-hidden="true"></i>
                    </div>
                    <div class="form-group-s">
                        <p>You will enclosed the original certificate of art in shipment?</p>
                        <input type="radio" class="for" name="ques-1" value="yes">
                        <label>Yes</label>
                        <input type="radio" class="for" name="ques-1" value="no">
                        <label>No</label>
                    </div>
                    <div class="form-group-s">
                        <p>You are the copyright owner of this artwork?</p>
                        <input type="radio" class="for" name="ques-2" value="yes">
                        <label>Yes</label>
                        <input type="radio" class="for" name="ques-2" value="no">
                        <label>No</label>
                    </div>
                    <div class="form-group-s">
                        <p>Art is Frame?</p>
                        <input type="radio" class="for" name="ques-3" value="yes">
                        <label>Yes</label>
                        <input type="radio" class="for" name="ques-3" value="no">
                        <label>No</label>
                    </div>
                    <div class="form-group-s">
                        <p>Packing</p>
                        <input type="radio" class="for" name="ques-4" value="cartoon">
                        <label>Cartoon Box</label>
                        <input type="radio" class="for" name="ques-4" value="tube">
                        <label>Tube</label>
                    </div>
                    <div class="form-group">
                        <a href="#" class="upload">Upload</a>
                    </div>
                </form>
                </div>
                
            </div>
        </div>
    </div>
   <div class="container-fluid slider-container">
    <div id="bottom-slider" class="carousel slide" data-ride="carousel">
      <div class="carousel-inner">
        <div class="item active">
          <div class="slider-item-content flex-box flex-center flex-content-center flex-column" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )">
            <h3>Mr.William.Smither</h3>
            <div class="slider-content-wrapper">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                typesetting, remaining essentially unchanged.</p>
            </div>
          </div>
          {{--
          <img src="{{ asset('assets/images/about/slider-mask.png') }}" alt="" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )"> --}}
        </div>
        
        <div class="item">
          <div class="slider-item-content flex-box flex-center flex-content-center flex-column" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )">
            <h3>Mr.William.Smither</h3>
            <div class="slider-content-wrapper">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                typesetting, remaining essentially unchanged.</p>
            </div>
          </div>
          {{--
          <img src="{{ asset('assets/images/about/slider-mask.png') }}" alt="" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )"> --}}
        </div>

        <div class="item">
          <div class="slider-item-content flex-box flex-center flex-content-center flex-column" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )">
            <h3>Mr.William.Smither</h3>
            <div class="slider-content-wrapper">
              <p>Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's
                standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it
                to make a type specimen book. It has survived not only five centuries, but also the leap into electronic
                typesetting, remaining essentially unchanged.</p>
            </div>
          </div>
          {{--
          <img src="{{ asset('assets/images/about/slider-mask.png') }}" alt="" style="background-image: url( {{ asset('assets/images/about/slider.png') }} )"> --}}
        </div>
      </div>

      <a class="left carousel-control" href="#bottom-slider" data-slide="prev">
        <i class="fa fa-angle-left"></i>
        <span class="sr-only">Previous</span>
      </a>
      <a class="right carousel-control" href="#bottom-slider" data-slide="next">
        <i class="fa fa-angle-right"></i>
        <span class="sr-only">Next</span>
      </a>
    </div>
  </div>
</div>
<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/themes/smoothness/jquery-ui.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.11.4/jquery-ui.min.js"></script>
<script>
document.getElementById("uploadBtn").onchange = function() {
    document.getElementById("uploadFile").value = this.value;
};
$(document).ready(function() {
    $("#datepicker").datepicker();

    $('.for').on('change', function() {
        switch ($(this).val()) {
            case 'sell':
                $("#expiredate").hide();
                $("#bidding-start").show();
                break;
            case 'exhibition':
                $("#bidding-start").hide();
                $("#expiredate").show();
                break;
            case 'bidding':
                $("#bidding-start").show();
                $("#expiredate").show();
        }
    });

    $('#expiredate i').click(function() {
        $("#datepicker").focus();
    });
});
</script>

@endsection 
