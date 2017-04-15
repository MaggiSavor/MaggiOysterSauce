$("#menu-toggle").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled");
    });
     $("#menu-toggle-2").click(function(e) {
        e.preventDefault();
        $("#wrapper").toggleClass("toggled-2");
        $('#menu ul').hide();
    });
 
     function initMenu() {
      $('#menu ul').hide();
      $('#menu ul').children('.current').parent().show();
      //$('#menu ul:first').show();
      $('#menu li a').click(
        function() {
          var checkElement = $(this).next();
          if((checkElement.is('ul')) && (checkElement.is(':visible'))) {
            return false;
            }
          if((checkElement.is('ul')) && (!checkElement.is(':visible'))) {
            $('#menu ul:visible').slideUp('normal');
            checkElement.slideDown('normal');
            return false;
            }
          }
        );
      }
    $(document).ready(function() {initMenu();});
	
/*for enabling texfield*/	
function myFunction() {
    document.getElementById("myRadio").disabled = false;
	document.getElementById("myButton").disabled = false;
}

function myFunction2() {
    document.getElementById("myRadio").disabled = true;
	document.getElementById("myButton").disabled = true;
}

document.getElementById("myButton").onclick = function () {
        location.href = "addCreditor.php";
};

// Validating Empty Field
function check_empty() {
	if (document.getElementById('category2').value == "") {
		alert("Fill the Field !");
	} else {
		alert("Category Added Successfully...");
	}
}
//Function To Display Popup
function div_show() {
	document.getElementById('abc').style.display = "block";
}
//Function to Hide Popup
function div_hide(){
	document.getElementById('abc').style.display = "none";
}

//for aJax
function showValue()
{
	if (window.XMLHttpRequest)
	{// code for IE7+, Firefox, Chrome, Opera, Safari
		xmlhttp = new XMLHttpRequest();
	}
	else
	{// code for IE6+, IE5
		xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
	}
	xmlhttp.onreadystatechange=function()
	{
		if (xmlhttp.readyState == 4 && xmlhttp.status == 200)
		{
			document.getElementById("ajaxOutput").innerHTML=xmlhttp.responseText;
		}
	}
var inputObject = document.getElementsByName("target1")[0];
	xmlhttp.open("GET","request.php?alexis="+inputObject.value,true);
	xmlhttp.send();
}

//for Update
function update(update) {
	window.location.href = "updateItem.php?id="+update;
}

//for Delete
function deleteQuery(id) {
			
	var confirmation = confirm("Are you sure you want to DELETE the Item ?")
	if(confirmation == true)
	{
		window.location.href = "index.php?id="+id;
		//window.history.go(1);
	}
}

function update2(update) {
	//window.location.href = "updateItem.php?id="+update;
	var person2 = prompt("How Many Pieces", " ");
	window.location.href = "Order.php?get=" + update + "&get2=" + person2;
}

//for Delete
function deleteQuery2(id) {
			
	var confirmation = confirm("Are you sure you want to Remove the Item ?")
	if(confirmation == true)
	{
		window.location.href = "Order.php?id="+id;
		//window.history.go(1);
	}
}

//for Delete
function deleteQuery3(id) {
			
	var confirmation = confirm("Are you sure you want to Remove the Item ?")
	if(confirmation == true)
	{
		window.location.href = "receive.php?id="+id;
		//window.history.go(1);
	}
}
function goBack() {
    window.location.href = "order.php";
}
function goBack2() {
    window.location.href = "transactionSell.php";
}
//getting item
function getQuery2(get) {
	var person = prompt("How Many Pieces", "1");
	window.location.href = "pickItem2.php?get=" + get + "&get2=" + person;
}
function pickFunction(){
	window.location.href="pickItem.php";
}

function pickFunction2(){
	window.location.href="pickItem2.php";
}
//for printing
function printFunction(){
	window.print();
}

function changeFunction(){
	var value = document.getElementById('supplier').value;
	//window.location.href = "receive.php?supplier=" + value; 
	
	$.post('validate.php',{postname:value},
	function(data){
		$('#result').html(data);
	});
}

