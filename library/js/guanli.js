	//用JavaScript获取HTML元素对象
	var iobj = document.getElementsByName("ids[]");
	//全选
	function selectAll(){
	
		//全选：所有checkbox的checked属性置为true
		for(var i=0;i<iobj.length;i++){
			iobj[i].checked = true;
			var id = iobj[i].value; 
			
		}	
	}


	//反选
	//反选：对象.checked属性若为true，
	//则改成false。若为false，则改成true
	function fselectAll(){
		
		for(var i=0;i<iobj.length;i++){
			//判断每一个iobj[i]的checked属性
			if(iobj[i].checked==true){
				iobj[i].checked=false;
				
			}else{
				iobj[i].checked=true;
				var id = iobj[i].value; 
				
				
			}
			
			
		}
	}
