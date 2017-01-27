$('#signup').submit(function(e) {
  	 var self = this;
     e.preventDefault();
     if($('#name').val().length<3||$('#name').val().length>15)
     {
	     errorclient('Name Length Should Be 3-15 Characters.');
     }else
     {
	$.get( "check?email="+$('#email').val(), function( data ) {
	  if(data==1)
	  {
	  	errorclient('Email Already Registered.');
		return false;
	  }else
	  {
	  	if($('#password').val().length>40||$('#password').val().length<6)
	  	{
		 	errorclient('Password Length Should Be 6-40 Characters.');
		 }else
		 {
			 self.submit();
		 }
	  }
	});
	}
	return false;
});

function errorclient(errorval)
{
$('#errorclient').empty();
$('#errorclient').html(errorval);
$('#emailis').show();
}

$('#resetpass').submit(function(e) {
  	 var self = this;
     e.preventDefault();

     if($('#np').val()!==$('#npa').val())
     {
	     errorclient('Passwords Do not Match.');
     }else
     {
     	if($('#npa').val().length>40||$('#npa').val().length<6)
	  	{
		 	errorclient('Password Length Should Be 6-40 Characters.');
		 }else
		 {
			 self.submit();
		 }
     }

	return false;
});

