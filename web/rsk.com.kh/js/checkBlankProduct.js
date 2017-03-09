// JavaScript Document

function checkBlank(){		
	
	if(document.formProduct.descript.value=="" || document.formProduct.descript.value==null ||
		document.formProduct.oneMonth.value=="" || document.formProduct.oneMonth.value==null ||
		document.formProduct.threeMonth.value=="" || document.formProduct.threeMonth.value==null ||
		document.formProduct.sixMonth.value=="" || document.formProduct.sixMonth.value==null ||
		document.formProduct.oneYear.value=="" || document.formProduct.oneYear.value==null){
		a = document.getElementById('black_message');
		a.innerHTML = "សូមបំពេញពត៌មានដែលត្រូវបញ្ចូលឲបានច្បាស់លាស់<br/>";
		a.style.border = "1px solid #9D9D9D";
		a.style.background = "#F9F9F9";	
		a.style.padding = "0px 10px";
		a.style.textAlign = "center";
		a.style.color = "#1e455e";
		a.style.fontSize = "17px";
		
		return false;				
	}else{
		return true;	
	}

}