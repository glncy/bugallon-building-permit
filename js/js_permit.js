
$(document).ready(function(){

});

var no_of_forms = 0;

function printPermit(){
	var permit = document.getElementById("sel_permit");
	var perVal = permit.value;
	var url = "print/"+perVal+"permit.html";
	var win = window.open(url, '_blank');
  	win.focus().print();
}

function removeForm(){
	
	document.getElementById('modal_clear_form').style.display='none';
}

function saveForm(){
	document.getElementById('modal_save_form').style.display='none';
	document.getElementById('modal_form_saved').style.display='block';
}

function loadForm(){
			var formToLoad="";
			var permit = document.getElementById("sel_permit");
			var perVal = permit.value;
			/*var form_to_be_added = document.createElement("div");
			form_to_be_added.addClass("form_added_"+perVal);
			$(".form_added_"+perVal).attr("id",perVal+"form");*/
			if(perVal!=""){
				if(perVal=="building"){
					formToLoad="permits/buildingpermit.html";	
					document.getElementById("form").setAttribute("w3-include-html",formToLoad);
					w3.includeHTML(function(){
						//change box 1 selection
						$("#selection").change(function(){
							var sel = this;
							var selVal = this.value;
							var options;
							$("#subselection option:gt(0)").remove();
							$("#typeremarks").prop("disabled",true);
							$("#subselection").attr("disabled",false);
							if(selVal=="residential"){
								options = {"Single":"1","Duplex":"2","Rowhouse/Accessoria":"3","Others":"4"};
							}else if(selVal=="commercial"){
								options = {"Bank":"1","Store":"2","Hotel/Motel, etc.":"3","Office Condominium/Business Office Building":"4","Restaurant, etc.":"5","Shop (e.g. Dress Shop, Tailoring Shop, Barber Shop, etc.)":"6","Gasoline Station":"7","Market":"8","Dormitory or Other Lodging House":"9","Others":"10"};
							}else if(selVal=="industrial"){
								options = {"Factory/Plant":"1","Repair Shop, Machine Shop":"2","Refinery":"3","Printing Press":"4","Warehouse":"5","Others":"6"};
							}else if(selVal=="institutional"){
								options = {"School":"1","Church and Other Religious Structures":"2","Hospital or Similar Structures":"3","Welfare and Charitable Structures":"4","Theater, Auditorium, Gymnasium, Court":"5","Others":"6"};
							}else if(selVal=="agricultural"){
								options = {"Barn(s), Poutry House(s), etc.":"1","Grain":"2","Others":"3"};
							}else if(selVal=="street"){
								options = {"Parks, Plazas, Monuments, Pools, Plant Boxes, etc.":"1","Sidewalks, Promenades, Terraces, Lamposts, Electric Poles, Telephone Poles, etc.":"2","Outdoor ads, Signboards, etc.":"3","Fence Closure":"4"};
							}else if(selVal=="other"){
								$("#subselection option:gt(0)").remove();
								document.getElementById("subselection").selectedIndex="0";
								$("#subselection").attr("disabled",true);
								$("#typeremarks").prop("disabled",false);
							}
							$.each(options,function(key, value){
								$("#subselection").append($("<option></option").attr("value",value).text(key));
							});
						});
						$("#subselection").change(function(){
							var subsel = this;
							var sel = document.getElementById("selection");
							$("#typeremarks").prop("disabled",true);
							if ((sel.value=="residential" && subsel.value=="4")||(sel.value=="commercial" && subsel.value=="10")||(sel.value=="industrial" && subsel.value=="6")||(sel.value=="institutional" && subsel.value=="6")||(sel.value=="agricultural" && subsel.value=="3")) {
								$("#typeremarks").prop("disabled",false);
							}
						});
					});
				}else if(perVal=="sanitary"){
					formToLoad="permits/sanitarypermit.html";
					document.getElementById("form").setAttribute("w3-include-html",formToLoad);
					w3.includeHTML(function(){	
						$("#sel_water_supply").change(function(){
							if(this.value=="4"){
								$("#input_water_supply_others").css("display","block");
							}else{
								$("#input_water_supply_others").css("display","none");
							}
						});
					});
				}else{
					if(perVal=="agricultural"){
						formToLoad="permits/agriculturalpermit.html";
					}else if(perVal=="demolition"){
						formToLoad="permits/demolitionpermit.html";
					}else if(perVal=="electrical"){
						formToLoad="permits/electricalpermit.html";
					}else if(perVal=="electronics"){
						formToLoad="permits/electronicspermit.html";
					}else if(perVal=="fencing"){
						formToLoad="permits/fencingpermit.html";
					}else if(perVal=="mechanical"){
						formToLoad="permits/mechanicalpermit.html";
					}
					document.getElementById("form").setAttribute("w3-include-html",formToLoad);
					w3.includeHTML();
				}
				//enable forms button
				$("#btn_save_forms").prop("disabled", false);
				$("#btn_remove_forms").prop("disabled", false);
			}
			
		}