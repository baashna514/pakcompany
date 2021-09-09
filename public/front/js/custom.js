$('#cart').on('click', '.delete-header-cart-item', function(e){
  e.preventDefault();
  var id = $(this).attr('data-id');
  // alert(id);
  $.ajax({
      url: '{{ route("header-cart-items.cartItemDeleteItem") }}',
      method: "DELETE",
      data: {_token: '{{ csrf_token() }}', id: id},
      success: function (response) {
          alert('Product removed from cart.');
          $('#cart').empty().append(response);
          $('.total').text($('#total').val());
          $("#checkoutPage-cartItems").load(location.href + " #checkoutPage-cartItems");
          $(".table-responsive").load(location.href + " .table-responsive");
          $.get('{{ route("checkoutPage-cartItems.getItems-onLoad") }}', function(response){
              $('#checkoutPage-cartItems').empty().append(response);
              $('.total').text($('#total').val());
          });
      },
      error: function(data){
          alert('Unable to Delete.');
      }
  });
});