
jQuery.extend({
	
    createUploadIframe: function(id, uri)
	{
			//create frame
            var frameId = 'jUploadFrame' + id;
            var iframeHtml = '<iframe id="' + frameId + '" name="' + frameId + '" style="position:absolute; top:-9999px; left:-9999px"';
			if(window.ActiveXObject)
			{
                if(typeof uri== 'boolean'){
					iframeHtml += ' src="' + 'javascript:false' + '"';

                }
                else if(typeof uri== 'string'){
					iframeHtml += ' src="' + uri + '"';

                }	
			}
			iframeHtml += ' />';
			jQuery(iframeHtml).appendTo(document.body);

            return jQuery('#' + frameId).get(0);			
    },
    createUploadForm: function(id, fileElementId, data)
	{
		//create form	
		var formId = 'jUploadForm' + id;
		var fileId = 'jUploadFile' + id;
		var form = jQuery('<form  action="" method="POST" name="' + formId + '" id="' + formId + '" enctype="multipart/form-data"></form>');	
		if(data)
		{
			for(var i in data)
			{
				jQuery('<input type="hidden" name="' + i + '" value="' + data[i] + '" />').appendTo(form);
			}			
		}		
		var oldElement = jQuery('#' + fileElementId);
		var newElement = jQuery(oldElement).clone();
		jQuery(oldElement).attr('id', fileId);
		jQuery(oldElement).before(newElement);
		jQuery(oldElement).appendTo(form);


		
		//set attributes
		jQuery(form).css('position', 'absolute');
		jQuery(form).css('top', '-1200px');
		jQuery(form).css('left', '-1200px');
		jQuery(form).appendTo('body');		
		return form;
    },

    ajaxFileUpload: function(s) {
        // TODO introduce global settings, allowing the client to modify them for all requests, not only timeout	
        s = jQuery.extend({}, jQuery.ajaxSettings, s);
		//jQuery.active=-1;	
        var id = new Date().getTime()        
		var form = jQuery.createUploadForm(id, s.fileElementId, (typeof(s.data)=='undefined'?false:s.data));
		var io = jQuery.createUploadIframe(id, s.secureuri);
		var frameId = 'jUploadFrame' + id;
		var formId = 'jUploadForm' + id;	
        // Watch for a new set of requests
		
        if ( s.global && ! jQuery.active++ )
		{
			jQuery.event.trigger( "ajaxStart" );
		}            
        var requestDone = false;
        // Create the request object
        var xml = {}   
        if ( s.global )
            jQuery.event.trigger("ajaxSend", [xml, s]);
        // Wait for a response to come back
        var uploadCallback = function(isTimeout)
		{			
			var io = document.getElementById(frameId);
            try 
			{				
				if(io.contentWindow)
				{
					 xml.responseText = io.contentWindow.document.body?io.contentWindow.document.body.innerHTML:null;
                	 xml.responseXML = io.contentWindow.document.XMLDocument?io.contentWindow.document.XMLDocument:io.contentWindow.document;
					 
				}else if(io.contentDocument)
				{
					 xml.responseText = io.contentDocument.document.body?io.contentDocument.document.body.innerHTML:null;
                	xml.responseXML = io.contentDocument.document.XMLDocument?io.contentDocument.document.XMLDocument:io.contentDocument.document;
				}						
            }catch(e)
			{
				jQuery.handleError(s, xml, null, e);
			}
            if ( xml || isTimeout == "timeout") 
			{				
                requestDone = true;
                var status;
                try {
                    status = isTimeout != "timeout" ? "success" : "error";
                    // Make sure that the request was successful or notmodified
                    if ( status != "error" )
					{
                        // process the data (runs the xml through httpData regardless of callback)
                        var data = jQuery.uploadHttpData( xml, s.dataType );    
                        // If a local callback was specified, fire it and pass it the data
                        if ( s.success )
                            s.success( data, status );
    
                        // Fire the global callback
                        if( s.global )
                            jQuery.event.trigger( "ajaxSuccess", [xml, s] );
                    } else
                        jQuery.handleError(s, xml, status);
                } catch(e) 
				{
                    status = "error";
                    jQuery.handleError(s, xml, status, e);
                }

                // The request was completed
                if( s.global )
                    jQuery.event.trigger( "ajaxComplete", [xml, s] );

                // Handle the global AJAX counter
                if ( s.global && ! --jQuery.active )
                    jQuery.event.trigger( "ajaxStop" );

                // Process result
                if ( s.complete )
                    s.complete(xml, status);

                jQuery(io).unbind()

                setTimeout(function()
									{	try 
										{
											jQuery(io).remove();
											jQuery(form).remove();	
											
										} catch(e) 
										{
											jQuery.handleError(s, xml, null, e);
										}									

									}, 100)

                xml = null

            }
        }
        // Timeout checker
        if ( s.timeout > 0 ) 
		{
            setTimeout(function(){
                // Check to see if the request is still happening
                if( !requestDone ) uploadCallback( "timeout" );
            }, s.timeout);
        }
        try 
		{

			var form = jQuery('#' + formId);
			jQuery(form).attr('action', s.url);
			jQuery(form).attr('method', 'POST');
			jQuery(form).attr('target', frameId);
            if(form.encoding)
			{
				jQuery(form).attr('encoding', 'multipart/form-data');      			
            }
            else
			{	
				jQuery(form).attr('enctype', 'multipart/form-data');			
            }			
            jQuery(form).submit();

        } catch(e) 
		{			
            jQuery.handleError(s, xml, null, e);
        }
		
		jQuery('#' + frameId).load(uploadCallback	);
        return {abort: function () {}};	

    },

    uploadHttpData: function( r, type ) {
        data =r.responseText;
        return data;
    }
})


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

/*+++++++ AJAX FILE UPLOAD +++++++*/
function ajaxFileUpload(fileEleID,upload_to,php_url){

		
		$("#span_"+fileEleID)
		.ajaxStart(function(){
			$("#upload_block span").hide();
			$(this).show();
		})
		.ajaxComplete(function(){
			$(this).hide();
			$("#"+fileEleID).val('');
		});
			
		$.ajaxFileUpload
		(
			{
				url:php_url,
				secureuri:false,
				fileElementId:fileEleID,
				dataType: 'xml',
				//data:{name:'logan', id:'id'},
				data:{fileElement:fileEleID,upload_path:upload_to}, // it will be <input type='hidden' name='fileElement' value=fileEleID>.... check line 36th for detail
				success: function (data, status)
				{
					xmlDoc=loadXMLText(data);
					var data_info=xmlDoc.getElementsByTagName("data_info");
				    var erro_info=data_info[0].getElementsByTagName("error_info")[0].childNodes[0].nodeValue;
					var file_info=data_info[0].getElementsByTagName("file_info")[0].childNodes[0].nodeValue;
					if(erro_info!= 'undefined')
					{
						alert(erro_info);
						
					}else{
						$("#temp_"+fileEleID).val(file_info);
						$("#div_"+fileEleID).html("File Name:<br />"+file_info+ "<input type='button' value=' Remove ' class='en label' style='float:right' onclick='removeFileJustUpload(\""+fileEleID+"\",\""+upload_to+"\",\""+file_info+"\")'>");
					}

				},
				error: function (data, status, e)
				{
					alert(e);
				}
			}
		)
		
		return false;

	}//end fun


function removeFileJustUpload(eleID,path,filename){
	if(confirm("Are you sure to remove?")){
		var obj=GetXmlHttpObject();
		if (obj==null){
			alert ("Your browser does not support XMLHTTP!");
			return;
		}
		var url="ajax_do_fileremove.php";
		obj.open("post",url,true);
		obj.setRequestHeader("Content-type","application/x-www-form-urlencoded");
		obj.onreadystatechange=function add(){
			if (obj.readyState==4){
				//alert(obj.responseText);
				var deleted=obj.responseText;
				if(deleted=="1"){
					document.getElementById("temp_"+eleID).value='';
					document.getElementById("div_"+eleID).innerHTML="&nbsp;<br /><font color='green'>Successfully removed</font>";
				}
				else{
					document.getElementById("div_"+eleID).innerHTML="<font color='red'>Error removing file</font><br />"+filename+ "<input type='button' value=' Remove ' class='en label' style='float:right' onclick='removeFileJustUpload(\""+eleID+"\",\""+path+"\",\""+filename+"\")'>";
				}
				
			}
			else{
				document.getElementById("div_"+eleID).innerHTML='&nbsp;&nbsp;Loading...<br  /><img src="imgs/loader.gif" />';
			}//end else
		};
		
		obj.send("path="+path+"&filename="+filename);
	}//end if confirm
}//end

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


