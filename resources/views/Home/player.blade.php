<?php use App\Classes\BladeHelper; ?>
 
@extends('layout')

@section('title',   $title   )

@section('script')
 
@endsection

@section('contenu')
<div class="row">
	<div class="col-xs-12 text-center"><h4>{{ $name }} - {{ $shards }}</h4> </div>
</div> 
<div class="row">
	<div class="col-xs-12 text-center">
		<div class="btn-group">
			@if($pageprev!="")
				 <a href="{{ url('player') }}/{{ $pageprev }}" class="btn btn-default"><i class="fa fa-chevron-left"></i></a>
			@endif
			@if($pagenext!="")
				<a href="{{ url('player') }}/{{ $pagenext }}" class="btn btn-default"><i class="fa fa-chevron-right"></i></a>
			@endif	

		</div>
	</div>
</div> 
<div class="row">
	<div class="col-xs-12 text-center">&nbsp;</div>
</div> 
<div class="row">
	<table class="table table-bordered table-hover table-striped">
		<thead>
			<tr>
				<th>날짜</th>
				<th>모드</th>
				<th>순위</th>
				<th>&nbsp;</th>
			</tr>
		</thead>
		<tbody>
			@foreach($matches as $match)
			@if($match->isOk())
				<tr>
					<td>{{ $match->getCreatedAt() }}</td>
					<td>{!! $match->getModeHtml() !!}</td>
					<td>{{ $match->extractPlace($name) }}</td>
					<td><a href="{{ url('replay')}}/{{ $match->getId() }}/{{ $match->getShards() }}/{{ $name }}" class='btn btn-default'><i class='fa fa-play'></i>&nbsp;Replay</a></td>
				</tr>
			@endif
			@endforeach
		</tbody>
	</table>
</div>
@if($missing)
	<div class="row">
		<div class="bg-danger col-xs-8 col-xs-offset-2">
		PUBG 서버에 대한 요청으로 인해 게임이 부족합니다. 1초 이내에 다시 검색을 갱신하여 목록을 완료해 주셔서 감사합니다.
		</div>
	</div>
@endif
@endsection