var no_of_forms = 0;
var selectedApplicant;
var jsonTest;

function printPermit(type,id){
	// var permit = document.getElementById("sel_permit");
	// var perVal = permit.value;
	var perVal = type;
	var url = "print/"+perVal+"permit.php?id="+id;
	var win = window.open(url, '_blank');
  	win.focus().print();
}

function removeForm(){
	
	document.getElementById('modal_clear_form').style.display='none';
}

function saveForm(){
	document.getElementById("form_permit").submit();
	//document.getElementById('modal_save_form').style.display='none';
	//document.getElementById('modal_form_saved').style.display='block';
}

async function loadForm(){
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
				}).promise().then(insertDataToForms(perVal));
			})
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
				}).promise().then(insertDataToForms(perVal));
			})
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
			w3.includeHTML(function(){
				insertDataToForms(perVal);
			});
		}
		//enable forms button
		$("#btn_save_forms").prop("disabled", false);
		$("#btn_remove_forms").prop("disabled", false);
	}	
}

function insertDataToForms(type){
	document.getElementById("applicant_type").value = type;
	document.getElementById("applicant_id").value = selectedApplicant.id;
	document.getElementById("app_lname").value = selectedApplicant.lname;
	document.getElementById("app_fname").value = selectedApplicant.fname;
	document.getElementById("app_mi").value = selectedApplicant.mi;
	document.getElementById("app_tin").value = selectedApplicant.tin;
	document.getElementById("app_add_no").value = selectedApplicant.add_no;
	document.getElementById("app_street").value = selectedApplicant.street;
	document.getElementById("app_barangay").value = selectedApplicant.barangay;
	document.getElementById("app_municipality").value = selectedApplicant.municipality;
	document.getElementById("app_zip_code").value = selectedApplicant.zip_code;
	document.getElementById("app_tel_no").value = selectedApplicant.tel_no;
}
function showExistingApplicant(){
	var newApplicant = document.getElementById("newApplicant");
	var existingApplicant = document.getElementById("existingApplicant");
	newApplicant.style.display = "none";
	existingApplicant.style.display = "initial";
}

function showNewApplicant(){
	var newApplicant = document.getElementById("newApplicant");
	var existingApplicant = document.getElementById("existingApplicant");
	newApplicant.style.display = "initial";
	existingApplicant.style.display = "none";
}

function dataSelect(data){
	var id = data;
	var str = document.getElementById("dataHandler_"+id).value;
	selectedApplicant = JSON.parse(str);
	if (selectedApplicant.existing_buildings != "true"){
		if (confirm("Select this Applicant?")) {
			document.getElementById("forms_to_fill").style.display = "initial";
			document.getElementById("selectApplicant").style.display = "none";
			document.getElementById("sel_permit").innerHTML = '<option value="building">Building Permit</option>';
		}
	}
	else {
		$.ajax({
			url: "process/get_building.php",
			type: "get",
			data: {
				applicant_id : selectedApplicant.id
			},
			success: function(r){
				var obj = JSON.parse(r);
				var loopCount = obj.length;
				var display = "<ol>";
				var loop = 0;
				while (loop < loopCount){
					display += "<li>Building No. : "+obj[loop].id+" | <button type='button' onclick='selectExist("+obj[loop].id+")'>SELECT</button></li>";
					loop++;
				}
				display += "</ol>";
				document.getElementById("exist_data").innerHTML = display;
			}
		});
		document.getElementById("modal_existing_building").style.display = "initial";
	}
}

function selectExist(id){
	if (confirm("Select this Building?")){
		selectedApplicant.buildingid = id;
		$.ajax({
			url: "process/check_permits.php",
			type: "get",
			data: {
				building_id: id
			},
			success: function(r){
				var obj = JSON.parse(r);
				if (obj.status == "completed_requirements"){
					document.getElementById("sel_permit").innerHTML = '<option value="agricultural">Agricultural Engineering Permit</option><option value="demolition">Demolition Permit</option><option value="electronics">Electronics Permit</option><option value="fencing">Fencing Permit</option><option value="mechanical">Mechanical Permit</option>';
				}
				else if (obj.status == "require_electrical"){
					document.getElementById("sel_permit").innerHTML = '<option value="electrical">Electrical Permit</option>';
				}
				else if (obj.status == "require_sanitary"){
					document.getElementById("sel_permit").innerHTML = '<option value="sanitary">Sanitary/Plumbing Permit</option>';					
				}
				else if (obj.status == "sanitary_electrical_first"){
					document.getElementById("sel_permit").innerHTML = '<option value="electrical">Electrical Permit</option><option value="sanitary">Sanitary/Plumbing Permit</option>';
				}
			}
		});
		document.getElementById("modal_existing_building").style.display = "none";
		document.getElementById("forms_to_fill").style.display = "initial";
		document.getElementById("selectApplicant").style.display = "none";
		document.getElementById("buildingid_holder").innerHTML = "<input type='hidden' name='building_id' value='"+selectedApplicant.buildingid+"'/>";
	}
}

function newData(){
	
	var fname = document.getElementById("fname").value;
	var lname = document.getElementById("lname").value;
	var mi = document.getElementById("mi").value;
	var tin = document.getElementById("tin").value;
	var add_no = document.getElementById("add_no").value;
	var street = document.getElementById("street").value;
	var barangay = document.getElementById("barangay").value;
	var municipality = document.getElementById("municipality").value;
	var zip_code = document.getElementById("zip_code").value;
	var tel_no = document.getElementById("tel_no").value;

	if ((fname!="")&&(lname!="")&&(mi!="")&&(tin!="")&&(add_no!="")&&(street!="")&&(barangay!="")&&(municipality!="")&&(zip_code!="")&&(tel_no!="")) {
		selectedApplicant = {
			fname: fname,
			lname: lname,
			mi: mi,
			tin: tin,
			add_no: add_no,
			street: street,
			barangay: barangay,
			municipality: municipality,
			zip_code: zip_code,
			tel_no: tel_no
		}	
		var ifSubmitted = false;
		$.ajax({
			url: "process/add_applicant.php",
			type: "post",
			data: selectedApplicant,
			beforeSend: function(){
				document.getElementById("modal_adding_applicant").style.display = "initial";	
			},
			success: function(r){
				var obj = JSON.parse(r);

				if (obj.status == "success_add") {
					ifSubmitted = true;
					selectedApplicant.id = obj.id;
				}
			},
			complete: function(){
				if (ifSubmitted) {
					setTimeout(function(){
						alert("Applicant Added. Proceed to Form Application.");
						document.getElementById("selectApplicant").style.display = "none";
						document.getElementById("modal_adding_applicant").style.display = "none";
						document.getElementById("forms_to_fill").style.display = "initial";
						document.getElementById("sel_permit").innerHTML = '<option value="building">Building Permit</option>';
					},2000);
				} else {
					setTimeout(function(){
						alert("Server Error. Please Try Again.");
						document.getElementById("modal_adding_applicant").style.display = "none";
					},2000);
				}
			}
		});
	} else {
		alert("Please Fill up all Fields.");
	}
}

function newBuilding(){
	if (confirm("Do you want to Add New Building?")) {
		document.getElementById("selectApplicant").style.display = "none";
		document.getElementById("modal_existing_building").style.display = "none";
		document.getElementById("forms_to_fill").style.display = "initial";
		document.getElementById("sel_permit").innerHTML = '<option value="building">Building Permit</option>';
	}
}