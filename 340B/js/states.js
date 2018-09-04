 




/////states pagevar HTML = [],
var STATES = [];
var current, jsonData;


jQuery(function(){
    loadAjax('results.json');
});

function loadAjax(file){
    current = file;
    jQuery.ajax({
        url: "http://18.191.224.212/340B/json/"+file,
         type: 'GET',
         dataType: "json",
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
                loadAjax('sectiondata.json');
        	break;
            case 'sectiondata.json':
                console.log(data);
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

    var thisData='';
    jQuery.each( jsonData, function( key, value ) {
        if(value.state===abb){
            console.log(value);
            thisData = value;
        }   
    });
    
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


function createDatabackup(arr) {
    console.log(arr);
    var html='';
    html +='\
    <div class="chart_outr content_outr">\
        <div class="state_headings">\
           <h3>'+arr.state+'</h3>\
                <h5>'+arr.title+'</h5>';
                if(arr.description){
                html +='<h6>'+arr.description+'</h6>';
                }
            html +='</div><div class="tabledata_outr z-depth-2"><table>';
                    jQuery.each( arr.data, function( key, value ) {
                    html +='<tr>\
                        <td>'+value.title+'</td>\
                        <td>'+value.description+'</td>';
                        if(arr.table_rows=='2'){
                            html +='<td>'+value.description2+'</td>';
                        }
                    html +='</tr>';
                    });
                html +='</table>\
            </div>\
        </div>\
   ';
    jQuery('#state_data').html(html);
}


function createData(arr) {
    var html='';
    html +='\
    <div class="chart_outr content_outr">\
     <div class="state_headings">\
              <h3>'+arr.state+'</h3>\
              <h5>'+arr.title+'</h5>\
              <h6>'+arr.description+'</h6>\
        </div>\
        <div class="ques_ans">\
        ';

        jQuery.each( arr.section, function( key, value ) {

        html +=' <div class="inner_data">\
        \<h5>'+value.title+'</h5>\
        ';
          

          html+= '\<h6>Reimbursement Requirements</h6>';
                
            html +='</div><div class="table-responsive">\
          <table> <tr><th></th> <th>Ingredient Cost </th> <th>Dispensing Fee</th> <th>Clarifying Details</th><th>Source(s) </th></tr>';
                    jQuery.each( value.tableonedata, function( key1,value1){
           
                    html +='<tr>\
                        <td>'+value1.question_title +'</td>\
                        <td>'+value1.ingredient_cost+'</td>';
                       
                            html +='<td>'+value1.dispensing_fee+'</td>\
                            <td>'+value1.clarifying_detail+'</td>\
                             <td>'+value1.source+'</td>\
                            ';
                      
                    html +='</tr>';
                    });
                html +='</table>\
                ';
            
                 });
            html +='</div></div>\
   ';
    jQuery('#state_data').html(html);
}

