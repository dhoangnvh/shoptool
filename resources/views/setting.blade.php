@extends('layouts.master')

@section('header-icon')
  <i class="pe-7s-note2 icon-gradient bg-mean-fruit"></i>
@endsection

@section('header-title')
  Mô tả sản phẩm
@endsection

@section('header-actions')
  
@endsection

@section('content')
  
<div class="main-card mb-3 card">
  <div class="card-body">
    <h5 class="card-title">Cài đặt tiêu đề, mô tả</h5>
    <form class="needs-validation" novalidate="" action="{{ route('setting.store') }}" method="POST">
      @csrf
      {{-- <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="title">Tiêu đề</label>
          <input type="text" class="form-control" id="title" name="title" placeholder="Tiêu đề" value="" required="">
          <div class="invalid-feedback">
            Vui lòng nhập tiêu đề
          </div>
        </div>
      </div> --}}
      <div class="form-row">
        <div class="col-md-12 mb-3">
          <label for="description">Mô tả</label>
          <textarea name="description" class="form-control" id="description" rows="10" required>{{$settingSite->description ?? ''}}</textarea>
          {{-- <div class="invalid-feedback">
            Vui lòng nhập mô tả
          </div> --}}
        </div>
      </div>
      <button class="btn btn-primary" type="submit">Submit form</button>
    </form>
  </div>
</div>

@endsection