@extends('inspinia.layout.default')



@section('content')


@push('styles')
@endpush


<div class="row">
                <div class="col-lg-12">
                    {{ session('country') }}
                </div>
</div>


                @push('scripts')
                @endpush
@endsection