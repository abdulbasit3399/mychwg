

$(document).on('click', '.btn-payment-append', function() {
	$('.donation-amount').val($(this).text());
})


$(document).on('keyup', '.custom-donation-entry', function() {
	$('.donation-amount').val($(this).val());
})

$(document).on('change', '.input__country', function() {

	if($(this).val() == "Canada")
	{
		$('.zip_code').inputmask("a9a-9a9");
	}
	else if($(this).val() == "United States")
	{
		$('.zip_code').inputmask("99999-9999");
	}
	else
	{
		$('.zip_code').inputmask('remove');
	    $('.zip_code').val('').attr("placeholder", "Zip code");
	}


})



