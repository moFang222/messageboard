var $addmessage=$('.add-message');
var $showmessage=$('.show-message');
var $row=$('#row');
$.ajaxSetup({
   headers: { 'X-CSRF-Token' : $('meta[name=_token]').attr('content') }
});
var $container=$('.container');
var $adddiv=$('#adddiv');

var $showdiv=$('#showdiv');
var $template2=$('#template2');
var $showmessagebtn=$('#showmessagebtn');

var $addmessagebtn=$('#addmessagebtn');

var $backbtn=$('#back');

var form = $('#template1').html();
var showlist = $('#template2').html();

$('#tooltip').tooltip();

$showmessagebtn.on('click',function()
{
	$row.removeClass('row');
	$adddiv.remove();
	$showmessagebtn.remove();
	$showmessage.append(showlist);
	$pagelist=$('.pagination li.middle');
	$pagelist.on('click',changetoPage);
	$pagesidePre=$('.pagination li.side.Previous');
	$pagesidePre.on('click',previousPage);
	$pagesideNext=$('.pagination li.side.Next');
	$pagesideNext.on('click',nextPage);
	$Curpageid=$('.t2 h1').attr('id');
	$Curpage=$('.pagination li.middle#page'+$Curpageid);
	$Curpage.addClass('active');//让当前的页面变为active
});

function changetoPage()
{
	$pageid=$(this).data('page');
	$pagelist=$('.pagination li.middle');
	$pagelist.removeClass('active');
	$(this).addClass('active');
	$div2=$('.t2');
	$.ajax(
	{
		type:'POST',
		url:'/',
		data:{pageid:$pageid},
		success:function(data)
		{
			$div2.remove();
			$showmessage.append(data);
		}
	});
}

function previousPage()
{
	var $Curpageid=$('.t2 h1').attr('id');//获取当前的页码
	var $Curpage=$('.pagination li.middle#page'+$Curpageid);
	if($Curpage.prev().attr('class')!="side Previous")
		{
			changetoPage.call($Curpage.prev());
		}
}

function nextPage()
{
	var $Curpageid=$('.t2 h1').attr('id');//获取当前的页码
	var $Curpage=$('.pagination li.middle#page'+$Curpageid);
	if($Curpage.next().attr('class')!="side Next")
		{
			changetoPage.call($Curpage.next());
		}
}

