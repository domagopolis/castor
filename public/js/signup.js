$(document).ready(function(){

    $("input#dob").datepicker({ changeMonth: true, changeYear: true, dateFormat: 'dd/mm/yy', maxDate: '-18y' });

    $("select#country").change(function(){
      $.ajax({
        url: domain+"country-states-xml.php?country_id=" + $(this).val(),
        dataType: 'xml',
        type: 'GET',
        error: function(exception,error){
            alert('Error occurred at server while searching for country states.\n'+error+'\nPlease refresh the page to try again.')
   	        },
        success: function(response){
            var options = '<option value="">State/Province</option>';
            $(response).find('states state').each(function() {
                options += '<option value="' + $(this).children('state_province_id').text() + '">' + $(this).children('short_name').text() + '</option>';
                });
            $("select#state").html(options);
            }
        });
    });

    $("input#location").autocomplete(domain+"state-postcodes-xml.php", {extraParams: { state_id: function() {return $("select#state").val();} }, minChars: 3, max: 10, matchContains: true });

  });
