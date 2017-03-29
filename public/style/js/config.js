$('.list-country-cities').on('click',function () {
   $('#cities-list').attr('action',$(this).data('country')); 
});