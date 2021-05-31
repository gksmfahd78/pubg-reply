<?php use App\Classes\BladeHelper; ?>
@extends('layoutr')

@section('title',   $title   )


@section('script')

var vId = '{!! $id !!}';
var vShards = '{!! $shards !!}';
var vUser = '{!! $user !!}';
var vUrlLoot = "{{ url('itemicon') }}/drop";
var vUrl = '{{ url("json/path") }}/' + vId + "/" + vShards + "/" + vUser;
var vUrlRoot =  "{{ url('/')}}";
var vUrlMap = "{{ url('maplowres') }}/";

function showZoomHelp()
{
	bootbox.alert("컴퓨터에서 마우스 휠을 사용하여 확대/축소할 수 있습니다. 모바일 또는 태블릿과 같은 터치 장치를 사용하여 간단히 축소하거나 두 번 눌러 축소 1로 축소할 수 있습니다.");
}

$(document).ready(function()
{
	$("#social-links ul").addClass("list-inline"); 
});
@endsection

@section('contenu')

<div class="row">
	&nbsp;
</div>
<div class="row" id="controls">
	<div class="btn-group" id="playpause">
		<a class="btn btn-default"  href="javascript:togglePause()"><i id="btnplay" class="fa fa-pause"></i></a>
		<a class="btn btn-default"  href="javascript:resetPlay()"><i   class="fa fa-backward"></i></a>
	</div>
	<div class="btn-group" id="speedfactor">
		<a class="btn btn-default clspeed" id="speed5" href="javascript:setSpeed(5)">x5</a>
		<a class="btn btn-default clspeed active"  id="speed10"  href="javascript:setSpeed(10)">x10</a>
		<a class="btn btn-default clspeed"  id="speed15" href="javascript:setSpeed(15)">x15</a>
		<a class="btn btn-default clspeed"  id="speed20" href="javascript:setSpeed(20)">x20</a>
		<a class="btn btn-default clspeed"  id="speed35" href="javascript:setSpeed(35)">x35</a>
		<a class="btn btn-default"    href="javascript:showZoomHelp()"><i class="fa fa-search-plus"></i></a>
		<a class="btn btn-default" title="Take screenshot"  href="javascript:exportImage()"><i class="fa fa-photo"></i></a> 
		<a class="btn btn-default" title="Go to main menu" href="{{ url('/') }}"><i class="fa fa-home"></i></a> 
	</div>
	<div class="btn-group">		
		<span id="chk"><small>Display names</small>:&nbsp;<input type="checkbox" data-size="mini" data-state="true" name="chkname" id="chkname" checked></span>
		<span id="timer"></span>
		<span id="nbalive"></span>
	</div> 
	<div class="btn-group" id="selNom">
		
	</div>
	<div class="btn-group" id="selNom">
		<?php echo \Share::currentPage("See my PUBG Replay")->facebook()->twitter(); ?>
	</div>
	
</div>
<div class="row">
	&nbsp;
</div>
<div class="row" id="slider">
	<div class="col-xs-12">
		<input class="col-xs-12" type="text" id="sldTimer">
	</div>		
</div>
<div class="row">
	&nbsp;
</div>
<div class="row" id="wait">
	<p>
	<i class="fa fa-refresh fa-spin"></i>&nbsp;로드 중... 몇 초 정도 걸릴 수 있습니다!!
</p>
	<p>
		재생을 표시하는 데 시간이 걸리는 이유는 무엇입니까?
		<ul>
			<li> 플레이어님의 매치에서 원격측정 URL을 추출해야 합니다. </li>
			<li> 원격 측정기를 다운로드 합니다. </li>
			<li> 재생에 필요한 데이터를 추출하기 위해 이 파일을 구문 분석합니다.</li>
			<li> 그런 다음 지도 파일과 데이터를 브라우저에 다운로드합니다.</li>
			<li> <strong> 30 초 </strong>초 정도 걸릴 수 있습니다. 재생 데이터가 서버에 캐시되었기 때문에 다음 보기에는 시간이 적게 걸립니다.</li>
		</ul>
	</p>
</div> 
<div class="row">
	<div col="col-xs-12">
		<div id="container"></div>		 
	</div>
</div> 

@endsection