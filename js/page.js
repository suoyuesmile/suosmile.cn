function ajax(curPage, cate, target){
	var xmlhttp;
	var data = '';
	if(window.XMLHttpRequest){
		xmlhttp = new XMLHttpRequest();
	}else{
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange = function(){
		if(xmlhttp.readyState == 4 && xmlhttp.status == 200){
			data = xmlhttp.responseText;
			var obj = eval('(' + data + ')');
			var content = possData(obj);
	        document.getElementById('txt').innerHTML = content;
		}else{
			return "error";
		}
	}
	xmlhttp.open('GET', target+curPage+'&c='+cate, true);
	xmlhttp.send();
}

function possData(obj){
	var content = '';
	for (var i = 0; i < obj.length; i++) {
		content += '<div class="m_list"><div class="date">'+obj[i]["date"]+'</div><a href= "showBoke.php?a='+obj[i]["id"]+'">'+obj[i]["title"]+'</a><div class="pv"><img src="../../images/pv.png" alt="">'+obj[i]["view"]+'</div><div class="rewrite"><img src="../../images/rewrite.png" alt="">'+obj[i]["rewrite"]+'</div></div>';
	}
	return content;
}                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                
 
function selectPage(){
	var cate = GetQueryString('c');
	var oBtn = document.getElementsByTagName('a');
	for (var i = 0; i < oBtn.length; i++) {
		oBtn[i].onclick = function(){
			var index = this.dataset.page;
			ajax(index, cate, '../bokePage.php?i=');
			reloadJs();
		}
	}
}

function GetQueryString(name){
	var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
	var r = window.location.search.substr(1).match(reg);
	if(r!=null)return unescape(r[2]); return null;
}

function reloadJs(){
	var script = document.createElement("script");
	script.src = "../../js/page.js";
	document.body.appendChild(script);
}
function nextPage(){

}
function prevPage(){

}
selectPage();


