function validarActividad(){

	var fechainicio = document.getElementById("datetimepicker1").value;
	var fechafin = document.getElementById("datetimepicker2").value;

	var x = fechainicio.split("-");
	var y = fechafin.split("-");

	var año1 = parseInt(x[0]);
	var mes1 = parseInt(x[1]);
	var dia1 = parseInt(x[2]);

	var año2 = parseInt(y[0]);
	var mes2 = parseInt(y[1]);
	var dia2 = parseInt(y[2]);

	var fecha1 = new Date(año1,mes1,dia1);
	var fecha2 = new Date(año2,mes2,dia2);

	if(fecha1 > fecha2){
		alert("La fecha de inicio no debe ser mayor que la de fin");
		return false;
	}

	var horainicio = document.getElementById("datetimepicker3").value;
	var horafin = document.getElementById("datetimepicker4").value;

	var z = horainicio.split(":");
	var w = horafin.split(":");

	var hora1 = parseInt(z[0]);
	var min1 = parseInt(z[1]);
	var seg1 = parseInt(z[2]);

	var hora2 = parseInt(w[0]);
	var min2 = parseInt(w[1]);
	var seg2 = parseInt(w[2]);


	if(hora1>24 || hora2>24){
		alert("Introduce un formato de hora valido");
		return false
	}	

	if(min1>59 || min2>59){
		alert("Introduce un formato de minutos valido");
		return false
	}
	if(seg1>59 || seg2>59){
		alert("Introduce un formato de segundos valido");
		return false;
	}

	if (hora2<hora1 || (hora1==hora2 && min2<=min1)){
		alert("La hora de inicio no debe de ser menor o igual que la hora de fin")
        return false;
    }
    



	
}