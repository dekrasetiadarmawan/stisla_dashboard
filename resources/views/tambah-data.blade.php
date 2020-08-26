@extends('layouts.master')
@section('title', 'Laravel')
@section('content')

<div class="section-body">
    <div class="row">
        <div class="col-12 col-md-12 col-lg-12">

            <div class="card">
                {{-- <div class="card-header">
                  <h4>HTML5 Form Basic</h4>
                </div> --}}
                
                  {{-- <div class="alert alert-info">
                    <b>Note!</b> Not all browsers support HTML5 type input.
                  </div> --}}
                <form action="{{route('crud.simpan')}}" method="POST">
                    @csrf
                    <div class="card-body">
                        <div class="row">

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('kode_barang') class="text-danger" @enderror>Kode Barang @error('kode_barang') | {{$message}} @enderror</label>
                                    <input type="text" name="kode_barang" class="form-control" value="{{ old('kode_barang') }}">
                                </div>
                            </div>

                            <div class="col-md-6">
                                <div class="form-group">
                                    <label @error('nama_barang') class="text-danger" @enderror>Nama Barang @error('nama_barang') | {{$message}} @enderror</label>
                                    <input type="text" name="nama_barang" class="form-control" value="{{ old('nama_barang') }}">
                                </div>
                            </div>
                        </div>

                        <div class="card-footer text-right">
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-secondary" type="reset">Reset</button>
                        </div>

                    </div>
                </form>

        </div>
    </div>
</div>

@endsection

@push('page-scrips')
    
@endpush