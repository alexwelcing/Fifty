/////states pagevar HTML = [],
var STATES = [];
var current, jsonData;


jQuery(function(){
    loadAjax('results.json');
});

function loadAjax(file){
    current = file;
    jQuery.ajax({
        dataType: "json",
		url: "http://18.191.224.212/340B/json/"+file,
		data: [],
		success: showData
	});	
}


function showData(data, status, xhr) {
	if(data.length){
	    switch(current){
	        case 'results.json':
	            STATES.length = 0;
	            STATES.push('<option value="">Select State</option>');
        		for (var i = 0; i < data.length; i++) {
        			createStates(data[i]);		
        		}
        		jQuery('#states').html(STATES);
                 loadAjax('fifteenstatesdata.json');
        	break;
            case 'fifteenstatesdata.json':
             
                jsonData = data;
            break;
    	}
	}
}


function createStates(arr) {
    var html = '<option value="'+arr.name+'">'+arr.name+'</option>';
    STATES.push(html); 
}

jQuery(document).on('change', '#states', function(){
    var val = jQuery(this).val();
    checkJson(val);     
});

function checkJson(abb){
    console.log(jsonData);
    var thisData='';
    jQuery.each( jsonData, function( key, value ) {
        if(value.state_name===abb){
            thisData = value;
        }   
    });
    console.log(thisData);
    jQuery('#state_data').html('');
    if(!thisData){
        return;
    }
    createData(thisData);
    $("#state_data").show();
    jQuery("#usaTerritories-map").hide();
    jQuery(".chart_outrss").hide();
    
    
    jQuery("#states option").each(function( index ) {
        var chk = jQuery(this).val();
        if(chk==abb){
            jQuery(this).attr('selected', 'selected');
        }
    });
    
}


function createData(arr) {
    var html='';
    html +='\
    <div class="chart_outr content_outr">\
        <div class="state_headings">\
           <h3>'+arr.state_name+'</h3>\
                <h5>'+arr.title+'</h5>';
                if(arr.description){
                html +='<h6>'+arr.description+'</h6>';
                }
            html +='</div>\
     <div class="tabledata_outr z-depth-2"><table>';
             html += '<tr><td></td><td>'+ arr.first_heading+'</td>';
           if(arr.second_heading != ''){
                html += '<td>'+ arr.second_heading+'</td>/'
           }
            html+='</tr>';
                    jQuery.each( arr.faqs, function( key, value ) {
                    html +='<tr>\
                    <td>'+value.category_name+'</td>\
                        <td>'+value.description+'</td>';
                        if(arr.second_heading !=''){
                            if(value.description2 != ''){
                            html +='<td>'+value.description2+'</td>';
                        }else{
                            html +='<td></td>';
                        }
                        }
                    html +='</tr>';
                    });
                html +='</table>\
            </div>\
        </div>\
   ';
    jQuery('#state_data').html(html);
}

