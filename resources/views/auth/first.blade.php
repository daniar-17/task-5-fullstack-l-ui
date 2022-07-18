@extends('layouts.app')

@section('styles_css')
<style>
    .dots-test {
        display: block;
        white-space: nowrap;
        width: 15em;
        overflow: hidden;
        text-overflow: ellipsis;/* This needs to match the color of the anchor tag */
    }
</style>
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="row">
            <div class="col-md-8">
                <div class="row">
                    @foreach ($datas as $item)
                    <div class="col-md-5">
                        <div class="card">
                            <img src="{{asset('db_image/' .$item->image)}}" alt="Gambar" style="width:100%; height:200px;">
                            <div class="container p-3">
                                <h5 class="badge badge-pill badge-secondary">{{ $item->name }}</h5>
                                <h4><b>{{ $item->title }}</b></h4>
                                <p class="dots-test">{{ $item->content }}</p>
                                <a href="{{ url('first_detail/' .$item->id ) }}" class="btn btn-block btn-outline-secondary btn-sm"><u>Read More</u> <i class="fas fa-arrow-circle-right"></i></a>
                            </div>
                        </div>
                        <br>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="col-md-4">
                <div class="alert alert-success" role="alert" style="color: #0f5132; background-color: #d1e7dd; border-color: #badbcc;">
                    <span class="badge badge-pill badge-info">Info</span>
                    Silahkan Login/Register Untuk Membuat Artikel Baru !
                </div>
                <div class="card card-success card-outline">
                    <div class="card-header">
                        <h5 class="card-title m-0"><b><i class="fas fa-check-circle text-success"></i> New Article</b></h5>
                    </div>
                    <div class="card-body">
                        <table id="bootstrap-data-table2" class="table table-striped">
                            <tbody>
                                @foreach ($datas as $item)
                                    @if($loop->index < 3)
                                        <tr>
                                            <th style="width: 10%"><a href="{{ url('first_detail/' .$item->id) }}">{{$loop->iteration}}</a></th>
                                            <td class="font-italic font-weight-bold"><a href="{{ url('first_detail/' .$item->id) }}">{{$item->title}}</a> <div class="badge badge-pill badge-secondary float-right">{{ $item->name }}</div></td>
                                        </tr>
                                    @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>
@endsection
