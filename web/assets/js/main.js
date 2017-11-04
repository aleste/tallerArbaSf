$( document ).ready(function() {

    cervezas.init({
		inputCantidad    : $("#cantidad"),
		inputPUnit       : $("#precioUnitario"),
		spanTotal        : $("#total"),
		selectCerveza    : $("#selectCerveza"),
		tablaPedidos     : $("#tablaPedidos tbody"),
		tablaPedidosRows : $("#tablaPedidos > tbody > tr"),
		spanNombre       : $("#nombre"),
		spanOrigen       : $("#origen"),
		spanEstilo       : $("#estilo"),
		spanColor        : $("#color"),
		spanPUnit        : $("#punit"),
		spanPresentacion : $("#presentacion"),
		spanDescripcion  : $("#descripcion"),
		imgBeer          : $("#imgBeer")
    })

    cervezas.load();

})
		