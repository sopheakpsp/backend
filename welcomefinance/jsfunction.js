/*FIX PNG BACKGROUND*/
function correctPNG() // correctly handle PNG transparency in Win IE 5.5 & 6.
                {
                   var arVersion = navigator.appVersion.split("MSIE")
                   var version = parseFloat(arVersion[1])
                   if ((version >= 5.5) && (document.body.filters))
                   {
                      for(var i=0; i<document.images.length; i++)
                      {
                         var img = document.images[i]
                         var imgName = img.src.toUpperCase()
                         if (imgName.substring(imgName.length-3, imgName.length) == "PNG")
                         {
                            var imgID = (img.id) ? "id='" + img.id + "' " : ""
                            var imgClass = (img.className) ? "class='" + img.className + "' " : ""
                            var imgTitle = (img.title) ? "title='" + img.title + "' " : "title='" + img.alt + "' "
                            var imgStyle = "display:inline-block;" + img.style.cssText
                            if (img.align == "left") imgStyle = "float:left;" + imgStyle
                            if (img.align == "right") imgStyle = "float:right;" + imgStyle
                            if (img.parentElement.href) imgStyle = "cursor:hand;" + imgStyle
                            var strNewHTML = "<span " + imgID + imgClass + imgTitle
                            + " style=\"" + "width:" + img.width + "px; height:" + img.height + "px;" + imgStyle + ";"
                            + "filter:progid:DXImageTransform.Microsoft.AlphaImageLoader"
                            + "(src=\'" + img.src + "\', sizingMethod='crop');\"></span>"
                            img.outerHTML = strNewHTML
                            i = i-1
                         }
                      }
                   }   
                }

/*+++++++ GET XML HTTP OBJECT AJAX +++++++*/
	function GetXmlHttpObject(){
		if (window.XMLHttpRequest){
  			// code for IE7+, Firefox, Chrome, Opera, Safari
  			return new XMLHttpRequest();
  		}
		else if (window.ActiveXObject){
  			// code for IE6, IE5
  			return new ActiveXObject("Microsoft.XMLHTTP");
  		}
		else{
			return null;
		}
	}//END
/*===Next and Previous page===*/
	function ajax(condition,file,span_layer,loading){

        var obj_ajax=GetXmlHttpObject();
        if(obj_ajax==null){
            alert("Your browser does not support XMLHTTP!");
            return;
        }
        var url=file+'.php?'+condition;
        //alert(condition+' - '+file+' - '+span_layer+' - '+url);
        obj_ajax.open("get",url,true);
        obj_ajax.onreadystatechange=function add(){
        if (obj_ajax.readyState==4){
            document.getElementById(span_layer).innerHTML=obj_ajax.responseText;
        }else{
            if(loading!=""){
                document.getElementById(span_layer).innerHTML=loading;
            }
        }
        };
        obj_ajax.send(null);
    }
	/*===End Next and Previous page===*/

/*+++++++ Load XML Text +++++++++++*/
	function loadXMLText(txt){
		if (window.DOMParser)
		  {
			  parser=new DOMParser();
			  xmlDoc=parser.parseFromString(txt,"text/xml");
		  }
		else // Internet Explorer
		  {
			  xmlDoc=new ActiveXObject("Microsoft.XMLDOM");
			  xmlDoc.async="false";
			  xmlDoc.loadXML(txt);
		  }
		return xmlDoc;
	}//end
	
/*+++++++ Load XML File +++++++++++*/
	function loadXMLFile(url){
		if (window.XMLHttpRequest)
		  {// code for IE7+, Firefox, Chrome, Opera, Safari
		  	xmlhttp=new XMLHttpRequest();
		  }
		else
		  {// code for IE6, IE5
		  	xmlhttp=new ActiveXObject("Microsoft.XMLHTTP");
		  }
		xmlhttp.open("GET",url,false);
		xmlhttp.send();
		xmlDoc=xmlhttp.responseXML;
		return xmlDoc;
	}//end

/*+++++++ get query string +++++++++++*/
function getquerystring(formname) {

    var form = document.forms[formname];

	var qstr = "";



    function GetElemValue(name, value) {

        qstr += (qstr.length > 0 ? "&" : "")

            + escape(name).replace(/\+/g, "%2B") + "="

            + escape(value ? value : "").replace(/\+/g, "%2B");

			//+ escape(value ? value : "").replace(/\n/g, "%0D");

    }

	

	var elemArray = form.elements;

    for (var i = 0; i < elemArray.length; i++) {

        var element = elemArray[i];

        var elemType = element.type.toUpperCase();

        var elemName = element.name;

        if (elemName) {

            if (elemType == "TEXT"

                    || elemType == "TEXTAREA"

                    || elemType == "PASSWORD"

					|| elemType == "BUTTON"

					|| elemType == "RESET"

					|| elemType == "SUBMIT"

					|| elemType == "FILE"

					|| elemType == "IMAGE"

                    || elemType == "HIDDEN")

                GetElemValue(elemName, element.value);

            else if (elemType == "CHECKBOX" && element.checked)

                GetElemValue(elemName, 

                    element.value ? element.value : "On");

            else if (elemType == "RADIO" && element.checked)

                GetElemValue(elemName, element.value);

            else if (elemType.indexOf("SELECT") != -1)

                for (var j = 0; j < element.options.length; j++) {

                    var option = element.options[j];

                    if (option.selected)

                        GetElemValue(elemName,

                            option.value ? option.value : option.text);

                }

        }

    }

    return qstr;

}//END

/*+++++++ CHECK IE Version +++++++*/
function msieversion(){
      var ua = window.navigator.userAgent
      var msie = ua.indexOf ( "MSIE " )

      if ( msie > 0 )      // If Internet Explorer, return version number
         return parseInt (ua.substring (msie+5, ua.indexOf (".", msie )))
      else                 // If another browser, return 0
         return 0

   }//end function

/*+++++++ KEY ENTER +++++++*/
function keyEnter(e){
	 var key;
	 if(window.event)key = window.event.keyCode;     //IE
	 else
	 key = e.which;     //firefox
	 if (key == 13)return true;else return false;

}//end
   
/*+++++++ SUBMIT BY ENTER +++++++*/
function submitByEnter(frm,act,e){
	if(keyEnter(e)==true){
		submitForm(frm,act);
	}
}//end

/*+++++++ SUBMIT FORM +++++++*/
function submitForm(frm,act){
	document.forms[frm].action=act;
	document.forms[frm].submit();
}//END

/**+++++ enable and disable Element of form +++*/
function enableDisable(enable_id,elements_id){
	//elements_id must be ARRAY
	for(i=0;i<elements_id.length;i++){
		document.getElementById(elements_id[i]).style.display="none";
	}//end for
	document.getElementById(enable_id).style.display="";
	
}//end

/*+++++++ VISIBLE ELEMENT +++++++*/
function visibleElement(frm,controls,option){
	for(i=0;i<controls.length;i++){
		//alert(controls[i]);
		document.forms[frm].elements[controls[i]].disabled=option;
	}
}//end

/*+++++++ GET LIST +++++++*/
function getList(obj,condition,spanname,combo_name,selectItem,table,fieldid,fieldshow,cbstyle,cbclass,dvalue,dselect){
		if (obj==null){
  			alert ("Your browser does not support XMLHTTP!");
  			return;
  		}
		var url="get_list.php?cond="+condition+"&table="+table+"&fieldid="+fieldid+"&fieldshow="+fieldshow+"&combo="+combo_name+"&select="+selectItem+"&cb_style="+cbstyle+"&cb_class="+cbclass+"&dvalue="+dvalue+"&dselect="+dselect;
		obj.open("get",url,true);
		obj.onreadystatechange=function add(){
			if (obj.readyState==4){
				document.getElementById(spanname).innerHTML=obj.responseText;
				//alert(obj.responseText);
			}
		};
		
		obj.send(null);
}//end

/*+++++++ ASING VALUE +++++++*/
function assignValue(frm,element,value){
	document.forms[frm].elements[element].value=value;
}//END

/*+++++++ INT ONLY +++++++*/
function intOnly(myfield, e){
	var key;
	var keychar;
 	if (window.event) key = window.event.keyCode;
	else if (e) key = e.which;
	else return true;
	keychar = String.fromCharCode(key);
	// control keys
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) ) return true;
	// numbers
	else if ((("0123456789").indexOf(keychar) > -1)) return true;
	else return false;
}// END

/*+++++++ INT ONLY +++++++*/
function numOnly(myfield, e){
	var key;
	var keychar;
 	if (window.event) key = window.event.keyCode;
	else if (e) key = e.which;
	else return true;
	keychar = String.fromCharCode(key);
	// control keys
	if ((key==null) || (key==0) || (key==8) || (key==9) || (key==13) || (key==27) ) return true;
	// numbers
	else if ((("0123456789.").indexOf(keychar) > -1)) return true;
	else return false;
}// END

/*+++++++ GET LIST +++++++*/
function removeFile(obj,spanname,path,filename,table,field_name,field_condition,value_condition){
		if (obj==null){
  			alert ("Your browser does not support XMLHTTP!");
  			return;
  		}
		var url="remove_file.php?path="+path+"&filename="+filename+"&table="+table+"&field_name="+field_name+"&field_condition="+field_condition+"&value_condition="+value_condition;
		obj.open("get",url,true);
		obj.onreadystatechange=function add(){
			if (obj.readyState==4){
				document.getElementById(spanname).innerHTML=obj.responseText;
				//alert(obj.responseText);
			}
		};
		
		obj.send(null);
}//end

/*+++++++ CHECKED AND UNCHECK +++++++*/
function selectChk(obj,nme){
		var eles=obj.form.elements;
		for (var zxc0=0;zxc0<eles.length;zxc0++){
		if (eles[zxc0].name&&eles[zxc0].name==nme) eles[zxc0].checked=obj.checked;
		}
}//end fun

/*+++++++ EDIT PROCESS +++++++*/
function edit_pro(frm,chkname,act,obj,obj_id){
			eles=document.forms[frm].elements;
			for (var i=0;i<eles.length;i++){
				if (eles[i].name&&eles[i].name==chkname){
					if(eles[i].checked==true){
						submitForm(frm,act+"&"+obj_id+"="+eles[i].value); 
						return;
					}
					else nocheck=true;
				} 
			}//end for
			if(nocheck==true)alert ("Please select "+obj+" from the list to edit");
}//end fun

/*+++++++ DELETE PROCESS +++++++*/
function delete_pro(frm,chkname,act,obj){
			eles=document.forms[frm].elements;
			for (var i=0;i<eles.length;i++){
				if (eles[i].name&&eles[i].name==chkname){
					if(eles[i].checked==true){
						if(confirm("Are you sure?")){
							submitForm(frm,act)
							return;
						}else{return;}
					}
					else nocheck=true;
				} 
			}//end for
			if(nocheck==true)alert ("Please select "+obj+" from the list to delete");
}//end fun

/*+++++++ Duplicate PROCESS +++++++*/
function duplicate_pro(frm,chkname,act,obj){
			eles=document.forms[frm].elements;
			for (var i=0;i<eles.length;i++){
				if (eles[i].name&&eles[i].name==chkname){
					if(eles[i].checked==true){
							submitForm(frm,act)
							return;
					}
					else nocheck=true;
				} 
			}//end for
			if(nocheck==true)alert ("Please select "+obj+" from the list to duplicate");
}//end fun

/*+++++++ Restore PROCESS +++++++*/
function restore_pro(frm,chkname,act,obj){
			eles=document.forms[frm].elements;
			for (var i=0;i<eles.length;i++){
				if (eles[i].name&&eles[i].name==chkname){
					if(eles[i].checked==true){
							submitForm(frm,act)
							return;
					}
					else nocheck=true;
				} 
			}//end for
			if(nocheck==true)alert ("Please select "+obj+" from the list to restore");
}//end fun

/*+++++++ Empty PROCESS +++++++*/
function empty_pro(frm,chkname,act,obj){
			eles=document.forms[frm].elements;
			for (var i=0;i<eles.length;i++){
				if (eles[i].name&&eles[i].name==chkname){
					if(eles[i].checked==true){
						if(confirm("Are you sure?")){
							submitForm(frm,act)
							return;
						}else{return;}
					}
					else nocheck=true;
				} 
			}//end for
			if(nocheck==true)alert ("Please select "+obj+" from the list to empty");
}//end fun


/*+++++++ SET PERPAGE +++++++*/
function setPerpage(target,startnum,num,num_all){
				if(num=="all"){num=num_all}
				document.location.href=target+"&perpage="+ num+"&paginate="+Math.ceil(startnum/num);
				//alert(target);
}//en

/*+++++++ PROCESS SEARCH +++++++*/
function pro_search(target,fsearch,vsearch){
	if(vsearch!=""){
	location.href=target+"&fsearch="+fsearch+"&vsearch="+vsearch;
	}
	else{
		alert("Please enter a keyword for searching");
	}
}//end






/*+++++++ SEARCH CONTENT +++++++*/

function searchContentOnly(lang,value_keysearch,err_message){
		if(document.asearch.txt_asearch.value=='' || document.asearch.txt_asearch.value.toLowerCase()==value_keysearch){alert(err_message);}
		else{
				document.asearch.action='?page=search&ctype=article&fulltext='+document.asearch.txt_asearch.value+'&lg='+lang;
				document.asearch.submit();
		}
}//end function




function searchContent(lang,value_keysearch,err_message){
		
		
		for (var i=0; i < document.asearch.search_type.length; i++){
			if (document.asearch.search_type[i].checked){
				var rad_val = document.asearch.search_type[i].value;
			}
		}
		if(rad_val=='product'){
		
					document.asearch.action='?page=document&fsearch=fulltext&vsearch='+document.asearch.txt_asearch.value+'&lg='+lang;
					document.asearch.submit();
			
		}else{
			if(document.asearch.txt_asearch.value=='' || document.asearch.txt_asearch.value.toLowerCase()==value_keysearch){alert(err_message);}
			else{
					document.asearch.action='?page=search&ctype=article&fulltext='+document.asearch.txt_asearch.value+'&lg='+lang;
					document.asearch.submit();
			}
		}
}//end function

/*+++++++ SEARCH CONTENT AND PRODUCT +++++++*/
function searchContentProduct(lang,value_keysearch,err_message){
	for (var i=0; i < document.asearch.search_type.length; i++){
   		if (document.asearch.search_type[i].checked){
      		var rad_val = document.asearch.search_type[i].value;
      	}
   	}
	
	if(rad_val=='document'){
		if(document.asearch.txt_asearch.value=='' || document.asearch.txt_asearch.value.toLowerCase()==value_keysearch){alert(err_message);}
		else{
			document.asearch.action='?page=products&ctype=product&fsearch=fulltext&vsearch='+document.asearch.txt_asearch.value+'&lg='+lang;
			document.asearch.submit();
		}
	}
	else{
		if(document.asearch.txt_asearch.value=='' || document.asearch.txt_asearch.value.toLowerCase()==value_keysearch){alert(err_message);}
		else{
				document.asearch.action='?page=search&ctype=article&fulltext='+document.asearch.txt_asearch.value+'&lg='+lang;
				document.asearch.submit();
		}
	}
}//end function

function resetUserPassword(obj,spanname,id){
		if (obj==null){
  			alert ("Your browser does not support XMLHTTP!");
  			return;
  		}
		var url="user_reset_pwd_ajax.php";
		obj.onreadystatechange=function add(){if (obj.readyState==4){document.getElementById(spanname).innerHTML=obj.responseText;obj.close();}};
		obj.open("POST",url,true);
		obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		obj.send("userid="+id);
}//end

function memberUserPassword(obj,spanname,id){
		if (obj==null){
  			alert ("Your browser does not support XMLHTTP!");
  			return;
  		}
		var url="member_reset_pwd_ajax.php";
		obj.onreadystatechange=function add(){if (obj.readyState==4){document.getElementById(spanname).innerHTML=obj.responseText;obj.close();}};
		obj.open("POST",url,true);
		obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		obj.send("member_id="+id);
}//end

function setCookie(c_name,value,exdays)
{
var exdate=new Date();
exdate.setDate(exdate.getDate() + exdays);
var c_value=escape(value) + ((exdays==null) ? "" : "; expires="+exdate.toUTCString());
document.cookie=c_name + "=" + c_value;
}

function getCookie(c_name)
{
var i,x,y,ARRcookies=document.cookie.split(";");
for (i=0;i<ARRcookies.length;i++)
{
  x=ARRcookies[i].substr(0,ARRcookies[i].indexOf("="));
  y=ARRcookies[i].substr(ARRcookies[i].indexOf("=")+1);
  x=x.replace(/^\s+|\s+$/g,"");
  if (x==c_name)
    {
    return unescape(y);
    }
  }
}

/*++++++++function endcode+++++++++++++++*/
function encodeFormData(frmID){
    $("[name='"+frmID+"'] input, [name='"+frmID+"'] textarea").each(function(index,obj)  {
        var input = $(this);
        //alert('Type: ' + input.attr('type') + 'Name: ' + input.attr('name') + 'Value: ' + input.val());
        /*update FCK*/
            var input_name=input.attr('name')+"";
            input_name=input_name.toLowerCase();
            if(input_name.indexOf("txt_description") >=0) {
                var oEditor = FCKeditorAPI.GetInstance(input.attr('name')) ;
                oEditor.UpdateLinkedField();
            }
        /******/
        var new_val=input.val()+"";
        var none_str=new_val.toLowerCase();
		if(new_val!="" && none_str!="none") new_val="ENCODE"+encode64(new_val);	// ================= PLACE TO CHANGE
        if(input_name.indexOf("txt_description") >=0) {
            new_inputnam=input.attr('name');
            new_inputtype=input.attr('type');
            input.remove();
              $("[name='"+frmID+"']").append('<input type="'+new_inputtype+'" name="'+new_inputnam+'" value="'+new_val+'" />');

        }else if((input.attr('type')=='text' || input.attr('type')=='hidden' || input.attr('type')=='textarea') && input.attr('name')!="txt_id" && input.attr('type')=="checkbox"){	// ================= PLACE TO CHANGE
            input.val(new_val); 
        }
     });
}/*end fun*/

function encode64(input) {
	var _keyStr = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/=";
	var output = "";
	var chr1, chr2, chr3, enc1, enc2, enc3, enc4;
	var i = 0;

	input = _utf8_encode(input);

	while (i < input.length) {
		chr1 = input.charCodeAt(i++);
		chr2 = input.charCodeAt(i++);
		chr3 = input.charCodeAt(i++);

		enc1 = chr1 >> 2;
		enc2 = ((chr1 & 3) << 4) | (chr2 >> 4);
		enc3 = ((chr2 & 15) << 2) | (chr3 >> 6);
		enc4 = chr3 & 63;

		if (isNaN(chr2)) {
			enc3 = enc4 = 64;
		} else if (isNaN(chr3)) {
			enc4 = 64;
		}

		output = output +
		_keyStr.charAt(enc1) + _keyStr.charAt(enc2) +
		_keyStr.charAt(enc3) + _keyStr.charAt(enc4);
	} 
	return output;
}/*end fn*/



/*+++++++ frmsubmit +++++++*/
function formSubmit(frm,atc){
		document.forms[frm].action=atc;
		document.forms[frm].submit();
}

function changeSelectItem(obj,url,cmb_id,condition,table,field_value,field_text,current_select,dvalue,dselect){
		if (obj==null){
  			alert ("Your browser does not support XMLHTTP!");
  			return;
  		}
		//var url=url;//+"?cond="+condition+"&table="+table+"&fieldvalue="+field_value+"&fieldtext="+field_text;
		//obj.open("get",url,true);
                obj.open("POST",url,true);
		obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
	        obj.onreadystatechange=function add(){
               
			if (obj.readyState==4){
				//alert(obj.responseText);
				txt=obj.responseText;	
				//get xml
					xmlDoc=loadXMLText(txt);
				//end get xml
				var items=xmlDoc.getElementsByTagName("option");
				//clear old item
				document.getElementById(cmb_id).options.length=0;
				//add default item
				if(dvalue!="" || dvalue!=null){
					var opt = document.createElement("option");
					document.getElementById(cmb_id).options.add(opt);
					opt.value=dvalue;
					opt.text =dselect;
				}
				//end add default item
				if(items.length==0){
					document.getElementById(cmb_id).disabled=true;
				}else{
					for (i=0;i<items.length;i++){
						var _value = items[i].getElementsByTagName("value")[0].childNodes[0].nodeValue;
						var _text =items[i].getElementsByTagName("text")[0].childNodes[0].nodeValue;	
						var opt = document.createElement("option");
						document.getElementById(cmb_id).options.add(opt);
						opt.value=_value;
						opt.text =_text;
						if((current_select+'').toLowerCase()==(_value+'').toLowerCase()) opt.selected = true;
						document.getElementById(cmb_id).disabled=false;
					}//end for
				}//end else
			}
		};
		
		obj.send("cond="+condition+"&table="+table+"&fieldvalue="+field_value+"&fieldtext="+field_text);
}//end









































