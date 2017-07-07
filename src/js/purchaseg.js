$(".btn-add-center").on("click", function(){
	var id = $(this).attr("data-id");
	$.ajax({
		url: "../../apps/basket.php",
		type: "POST",
		data: ({
			goods: id
		}),
		beforeSend: function() {
			var text = '<div id="error-info"> Опрацювання... </div>';
			$("body").append(text);
		},
		success: function(data){
			function remove(){
				$("#error-info").remove();
			}
			remove();
			var text = '<div id="error-info"> Додано </div>';
			$("body").append(text);
			setTimeout(remove, 2000);
			data = JSON.parse(data);
			if (data == "nologon") {
				$("#ModalSignin").modal('show');
			} else {
				$("#countg").text("").append("<img src='../img/cart.png'> " + data[0] + " товарів");
				$("#summ").text("").append("всього: " + data[1] + " грн");
			}
		}
	})
})