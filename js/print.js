//通过class获取节点

function getByClass(oParent, sClass)

{

	var aResult=[];

	var aEle=oParent.getElementsByTagName('*'); 

	for(var i=0;i<aEle.length;i++)

	{

		if(aEle[i].className==sClass)

		{

			aResult.push(aEle[i]);

		}

	}

	return aResult;

}		



//*******************************打印页面

var odocu=document.getElementById('document');

var oGoprint=document.getElementById('goprint');

var oShop=document.getElementById('shop_id');

var oFile=document.getElementById('file');

var aTr=odocu.getElementsByTagName('tr');

/*var aPer=[];                     //每张纸价格*/

var aSub=getByClass(odocu,'sub');  //-

var aAdd=getByClass(odocu,'add');  //+

var aNum=getByClass(odocu,'num');  //份数

var aPages=getByClass(odocu,'pages');  //页数

var aPrice=getByClass(odocu,'price');  //总价

var aAddress=getByClass(odocu,'address');  //地址

var aChange=getByClass(odocu,'change');

var aClose=getByClass(odocu,'close');

var aOdd=getByClass(odocu,'odd');

var aEven=getByClass(odocu,'even');

var len=aOdd.length+aEven.length;

var sinPrice=0;  //一份价格



/*//初始价格
function price(){
	aPer[0]=(aBc[0].value=='black')?0.1:1;  //黑白1角，彩色1元

	sinPrice=aPer[0]*aSd[0].value*aPages[0].innerHTML;

	aPrice[0].innerHTML=Math.round(aNum[0].innerHTML*sinPrice*100)/100;
}*/
	
//未选商家提示
oGoprint.onclick=function(){
	if(oFile.value==""){
		alert("亲还未选择打印文件");
		return false;
	}
	if(oShop.value==-1){
		alert("亲，请选择打印商家");
		return false;
	}
}
		

//+

for( var i=0;i<len;i++){

	aAdd[i].index=i;	

	aAdd[i].onclick=function(){

		aNum[this.index].innerHTML++;

	}

}



//-

for( var i=0;i<len;i++){

	aSub[i].index=i;	

	aSub[i].onclick=function(){

		aNum[this.index].innerHTML--;

		if(aNum[this.index].innerHTML<1){aNum[this.index].innerHTML=1}

		}

}



//chs

/*for( var i=0;i<len;i++){

	aChange[i].index=i;

	aChange[i].onclick=function(){

		aAddress[this.index].style.border='1px solid #3898F8';

		aAddress[this.index].style.backgroundColor='transparent';

		aAddress[this.index].readOnly=false;}

	

	aAddress[i].index=i;	

	aAddress[i].onblur=function(){

		aAddress[this.index].style.border='none';

		aAddress[this.index].readOnly=true;}

}*/



/*//单双页更改

for( var i=0;i<len;i++){

	aSd[i].index=i;

	aSd[i].onchange=function(){

		//计算价格

		price();

	}

}*/



/*//黑彩更改

for( var i=0;i<len;i++){

	aBc[i].index=i;

	aBc[i].onchange=function(){

		//计算价格

		price();

	}

}*/


/*//close

for( var i=0;i<len;i++){

	aClose[i].index=i;

	aClose[i].onclick=function(){

		aTr[this.index+1].style.border='1px solid #3898F8';

		if (!confirm("删除后不可恢复，确认要删除此订单吗？"))

		{ window.event.returnValue = false;  

		  aTr[this.index+1].style.border='none';}

		else {aTr[this.index+1].style.display='none';}}

}*/