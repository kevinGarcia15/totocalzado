$(document).ready(function($) {
    /* Función jQuery para el evento clic en la etiqueta "x" con la clase (.carrito-total)*/
    $('.carrito-total').click(function() {
      //Mostrar los items del carrito
      $('.bolsa').slideToggle();
    });

  });
  simpleCart.currency({
      code: "GTQ" ,
      name: "Quetzal",
      symbol: "Q"
  });

//SIMPLE CART
//Configuraciones básicas, recuerda tu lo puedas adaptar a tu medida
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
      //url: "http://192.168.0.109:80/totocalzado/proventa/pagar" ,
      url: "http://localhost/totocalzado/proventa/pagar" ,
      // http method for form, "POST" or "GET", default is "POST"
      method: "POST" ,
      // url to return to on successful checkout, default is null
      success: "success.html" ,
      // url to return to on cancelled checkout, default is null
      cancel: "cancel.html" ,
  }
});
