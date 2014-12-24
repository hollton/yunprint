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



		

//*******************************注册

var oFormReg=document.getElementById('formReg');

var oError=document.getElementById('error');

var aError=getByClass(oError,'error');

var oUser=document.getElementById('user');		

var oPsw=document.getElementById('psw');

var oConPsw=document.getElementById('conPsw');		

var oPhone=document.getElementById('phone');		

var oRegiter=document.getElementById('regiter');

var oHlog=document.getElementById('hlog');

var oHreg=document.getElementById('hreg');

var oShopPri=document.getElementById('shopPri');

var oShopAli=document.getElementById('shopAli');

var oSerror0=document.getElementById('serror0');

var oSerror1=document.getElementById('serror1');

var oAgree=document.getElementById('agree');

var onoff=-1;



//用户名判断

function check0() 

	{			

		var re=/^\w{3,20}$/i;

		if(!re.test(oUser.value))

		{

			aError[0].style.display='block';

			oFormReg.style.width='610px';

			onoff=-1;}

		else{

			aError[0].style.display='none';

			//oFormReg.style.width='435px';

			onoff=1;}

	}

	

//密码判断

function check1() 

	{			

		var re=/^\w{5,20}$/i;

		if(!re.test(oPsw.value))

		{

			aError[1].style.display='block';

			oFormReg.style.width='610px';

			onoff=-1;}

		else{

			aError[1].style.display='none';

			//oFormReg.style.width='435px';

			onoff=1;}

	}

	

//确认密码判断

function check2() 

	{	

		if(oPsw.value!==oConPsw.value)

		{

			aError[2].style.display='block';

			oFormReg.style.width='610px';

			onoff=-1;}

		else{

			aError[2].style.display='none';

			//oFormReg.style.width='435px';

			onoff=1;}

	}

	

//手机号判断

function check3() 

	{			

		var re=/^[1][0-9]{10}$/;

		if(!re.test(oPhone.value))

		{

			aError[3].style.display='block';

			oFormReg.style.width='610px';

			onoff=-1;}

		else{

			aError[3].style.display='none';

			//oFormReg.style.width='435px';

			onoff=1;}

	}


//单价判断
function s_check0()
	{
		var re=/^[0-9]+(\.[0-9]+)?$/;

		if(!re.test(oShopPri.value))

		{
			oSerror0.style.display='block';
			onoff=-1;}

		else{
			oSerror0.style.display='none';
			onoff=1;}

	}

//支付宝判断  手机号/邮箱
function s_check1()
	{
		var res=/^[1][0-9]{10}$/;
		var rey=/^[\w]+@[a-z0-9]+\.[a-z]+$/;

		if((!res.test(oShopAli.value))&&(!rey.test(oShopAli.value)))

		{
			oSerror1.style.display='block';
			onoff=-1;}

		else{
			oSerror1.style.display='none';
			onoff=1;}

	}	

//提交判断

oRegiter.onclick=function(){

	if(onoff==-1) { return false; }

	var judge=oUser.value && oPsw.value && oConPsw.value && oPhone.value;

	if(!judge) {alert('信息并不完整哦~');return false;}

}	

	

//关闭

function _close(){

	oHreg.style.display='none';
	
	oHlog.style.display='none';}



//登录

function goLog(){

	oHlog.style.display='block';

	oHreg.style.display='none';}



//注册

function goReg(){

	oHlog.style.display='none';

	oHreg.style.display='block';}

//下一页
function goNext() {
	location='admin_manage.php?judge=1';
}
//上一页
function goLast() {
	location='admin_manage.php?judge=0';
}
//协议

oAgree.onclick=function(){
	oHreg.style.display='block';}