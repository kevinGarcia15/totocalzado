$(document).ready(function($) {
    $('.carrito-total').click(function() {
      $('.bolsa').slideToggle();
    });

  });
  simpleCart.currency({
      code: "GTQ" ,
      name: "Quetzal",
      symbol: "Q"
  });

simpleCart({
  cartColumns: [
      { view:'image' , attr:'image', label: 'Img'}, //obtiene la imagen
      { attr: "name", label: "Número"}, //obtiene el nombre
      { attr: "codigo", label: "Codigo"}, //obtiene el nombre
      { attr: "size", label: "Número"}, //obtiene el nombre
      { view: "currency", attr: "price", label: "Precio"},//obtiene el precio
      { view: "decrement", label: false,text: '-'},
      { attr: "quantity", label: "Unidad"}, //obtiene la cantidad del producto
      { view: "increment", label: false ,text: '+'}, //Suma el producto
      { view: "currency", attr: "total", label: "SubTotal" },// Obtiene el precio total del producto
      { view: "remove", text: "Quitar", label: false} //Quita o remueve el producto

  ],
  cartStyle: "table", //puede ser div o table
  checkout: {
      type: "SendForm" ,
      url: "https://totocalzado.com/proventa/pagar" ,
      method: "POST" ,
      success: "success.html" ,
      cancel: "cancel.html" ,
  }
});
