const cervezas = {
	init (opt) {		
		this.opt = opt;		
	},
	load () {
		const select = this.opt.selectCerveza;	 		
		$.getJSON("./assets/js/cervezas.json", (data) => {			
			let items = [];
  			$.each( data, function( key, val ) {  				
  				select.append(`<option value="${key}"
  									   data-id="${key}"
  									   data-nombre="${val.nombre}"
  									   data-origen="${val.origen}"
  									   data-estilo="${val.estilo}"
  									   data-color="${val.color}"
  									   data-punit="${val.punit}"  									   
  									   data-presentacion="${val.presentacion}"
  									   data-descripcion="${val.descripcion}"  									   
  									   data-img="${val.img}" 
  									   >${val.nombre}</option>`);		    			
  			});				
		});

	},
	select () {

		const select       = this.opt.selectCerveza;		
		const option       = select.find(':selected');
		const id           = option.data('id');
		const nombre       = option.data('nombre')		
		const origen       = option.data('origen')		
		const estilo       = option.data('estilo')
		const color        = option.data('color')
		const punit        = option.data('punit')
		const presentacion = option.data('presentacion')
		const descripcion  = option.data('descripcion')
		const img          = (option.data('img') !== undefined ? option.data('img') : 'placeholder.png'  )
		
		this.opt.spanNombre.html(nombre);
		this.opt.spanOrigen.html(origen);
		this.opt.spanEstilo.html(estilo);
		this.opt.spanColor.html(color);
		this.opt.spanPUnit.html(punit);
		this.opt.spanPresentacion.html(presentacion);
		this.opt.spanDescripcion.html(descripcion);
		this.opt.imgBeer.attr('src', './assets/img/'+img);
		
	},
	add () {	


		const select   = this.opt.selectCerveza;		
		const option   = select.find(':selected');	
		const id       = option.data('id');

		if (id === undefined) {
			return
		}

		const punit    = option.data('punit')	
		const nombre   = option.data('nombre')	
		const cantidad = this.opt.inputCantidad.val();		
		const total    = parseFloat(this.opt.spanTotal.html());			
		const cantRows = $("#tablaPedidos > tbody > tr").length + 1;

		const newRow = `
			<tr data-id="${id}" data-cantidad="${cantidad}" data-punit="${punit}">      			
				<td>${cantRows}</td>
      			<td>${nombre}</td>
      			<td>${cantidad}</td>
      			<td>${punit}</td>
      			<td>${punit*cantidad}</td>
      			<td><a href="#" onclick="return cervezas.remove($(this).closest('tr'))"><i class="fa fa-trash"></i>&nbsp;</a></td>
      		</tr>    
		`;

		this.opt.spanTotal.html(total + parseFloat(punit*cantidad))
		this.opt.tablaPedidos.append(newRow);

	},
	remove (row) {
	    // console.log("Remove cerveza del pedido");
		const cantidad = row.data('cantidad');
		const punit = row.data('punit');
		const total = parseFloat(this.opt.spanTotal.html());		
		this.opt.spanTotal.html(total - parseFloat(punit*cantidad))
		row.remove();
		return false;
	}
}