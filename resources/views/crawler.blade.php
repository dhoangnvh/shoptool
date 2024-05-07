@extends('layouts.master')

@section('header-icon')
<i class="pe-7s-box2 icon-gradient bg-amy-crisp"> </i>
@endsection

@section('header-title')
  Đăng ký sản phẩm
  {{-- <div class="page-title-subheading">This is an example dashboard created using build-in elements and components.</div> --}}
@endsection

@section('header-actions')
  {{-- <button type="button" data-toggle="tooltip" title="Example Tooltip" data-placement="bottom" class="btn-shadow mr-3 btn btn-dark">
  <i class="fa fa-star"></i>
  </button>
  <div class="d-inline-block dropdown">
    <button type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" class="btn-shadow dropdown-toggle btn btn-info">
    <span class="btn-icon-wrapper pr-2 opaMô tả-7">
    <i class="fa fa-business-time fa-w-20"></i>
    </span>
    Buttons
    </button>
    <div tabindex="-1" role="menu" aria-hidden="true" class="dropdown-menu dropdown-menu-right">
      <ul class="nav flex-column">
        <li class="nav-item">
          <a href="javascript:void(0);" class="nav-link">
            <i class="nav-link-icon lnr-inbox"></i>
            <span>
            Inbox
            </span>
            <div class="ml-auto badge badge-pill badge-secondary">86</div>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0);" class="nav-link">
            <i class="nav-link-icon lnr-book"></i>
            <span>
            Book
            </span>
            <div class="ml-auto badge badge-pill badge-danger">5</div>
          </a>
        </li>
        <li class="nav-item">
          <a href="javascript:void(0);" class="nav-link">
          <i class="nav-link-icon lnr-picture"></i>
          <span>
          Picture
          </span>
          </a>
        </li>
        <li class="nav-item">
          <a disabled href="javascript:void(0);" class="nav-link disabled">
          <i class="nav-link-icon lnr-file-empty"></i>
          <span>
          File Disabled
          </span>
          </a>
        </li>
      </ul>
    </div>
  </div> --}}
@endsection

@section('content')

@if (Session::has('success'))
  <div class="alert alert-success">
    <strong>Thành công!</strong> <span>{{ Session::get('success') }}</span>
  </div>
@endif
@if (Session::has('error'))
  <div class="alert alert-danger">
    <strong>Lỗi!</strong> <span>{!! Session::get('error') !!}</span>
  </div>
@endif

<div class="alert alert-success js-alert d-none">
  <strong>Thành công!</strong> <span id="msg-success"></span>
</div>
<div class="alert alert-danger js-alert d-none">
  <strong>Lỗi!</strong> <span id="msg-danger"></span>
</div>

<div class="main-card mb-3 card">
  <div class="card-body">
    <h5 class="card-title">Lấy thông tin sản phẩm</h5>
    <form action="{{ route('crawler.create') }}" method="post">
      @csrf
      <div class="form-row">
        <div class="col-11 mb-3">
          <label for="url">Url sản phẩm</label>
          <input type="text" class="form-control" id="url" name="url" placeholder="Url sản phẩm" value="" required="">
        </div>
        <div class="col-1 mb-3">
          <label for="title">.</label>
          
          <div class="btn btn-primary form-control" id="crawler-btn" data-url="{{ route('crawler.crawler') }}">Lấy thông tin</div>
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-10 mb-3">
          <label for="name">Tên sản phẩm</label>
          <input type="text" class="form-control" id="name" name="name" placeholder="Tên sản phẩm" value="" required="">
        </div>
        <div class="col-md-2 mb-3">
          <label for="price">Giá tiền</label>
          <input type="text" class="form-control" id="price" name="price" placeholder="Giá tiền" value="" required="">
        </div>
      </div>
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="description">Mô tả</label>
          <textarea name="description" class="form-control" id="description" rows="10" required>{{$settingSite->description ?? ''}}</textarea>
        </div>
      </div>

      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="description">Hình ảnh</label>
          <textarea name="images" class="form-control" id="images" rows="10"></textarea>
        </div>
      </div>

      <button class="btn btn-primary" type="submit">Submit form</button>

    </form>
  </div>
</div>

@endsection

@section('js')
<script>
  $(document).ready(function(){
    $("#crawler-btn").click(function(){
      var url = $(this).data('url');
      $.ajax({
        url: url,
        data: {
          'href': $('#url').val()
        },
        success: function(result){
          if (result.name) {
            $('.alert-danger.js-alert').addClass('d-none');
            $('#name').val(result.name);
            $('#price').val(result.price1);
            var images = '';
            for (let img = 0; img < result.imgs.length; img++) {
              let element = result.imgs[img];
              images += element + "\n";
            }

            $('#images').val(images);
          } else {
            $('.alert-danger.js-alert').removeClass('d-none');
            $('.alert-danger.js-alert #msg-danger').text('Không thể lấy thông tin sản phẩm');
          }

        }});
    });
  });
</script>
@endsection