@extends('layouts.frontend')
@section('content')

<div id="main-container">
    <!--h3 id="clothing">Clothing Designer</h3-->
    <h1>Shop Page</h1>
    <div class="row">
    @foreach($products as $product)

        <div class="col-lg-6">
            <img src="{{asset('public/artist-designs/'.$product->art_photo_path)}}"  />
        </div>
    @endforeach
    </div>
  


</div>
@endsection

@push('scripts')

@endpush