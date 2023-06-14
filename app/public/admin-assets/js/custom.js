$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});

$(document).on('click', 'a.logout', function()
{
	$.ajax({
		url: $(this).attr('href'),
		method: "POST",
		success: function(data)
		{
			document.location.href = '/';
		}
	});

	return false;
});
