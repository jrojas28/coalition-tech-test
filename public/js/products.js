var Products = function() {
  $('#product-form').on('submit', function(e) {
    e.preventDefault();
    $form = $(this);
    $productHolder = $('#product-holder');
    console.log("Submitting..");

    $.ajax({
      type: 'POST',
      url: '/products',
      data: $form.serialize(),
      success: function(product) {
        var product = JSON.parse(product);
        console.log("Success");
        console.log(product);
        console.log(product['name']);
        $templateCopy = $('#template').clone();
        $templateCopy.removeClass('hidden');
        $templateCopy.find('.name').first().html(product['name']);
        $templateCopy.find('.stock').first().html(product.stock);
        $templateCopy.find('.price').first().html('$' + product.price);
        $templateCopy.find('.timestamp').first().html(product.created_at);
        $templateCopy.find('.total').first().html('$' + Math.round(product.stock * product.price));
        $productHolder.append($templateCopy);
      }
    });
  })
}

$(function() {
  Products();
});