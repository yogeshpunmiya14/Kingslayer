$(document).ready(function(){
	$(".brand_filter").click(function(obj){
		// alert(1);
		obj.preventDefault();
		id = $(this).attr("for")
		// alert(id);
		$.ajax({
			type:"post",
			data:"brandid="+id,
			url:"brandwise.php",
			success:function(res){
				// console.log(res)
				$(".padding-right").html(res);
			},
			error:function(err){
				console.log(err)
			}
		})
	})

///// cart //////
	$(".add-to-cart").click(function(obj){
		// alert(1);
		obj.preventDefault();
		id = $(this).attr("for")
		// alert(id);
		$.ajax({
			type:"post",
			data:"productid="+id,
			url:"addincart.php",
			success:function(res){
				// console.log(res)
				alert(res);
			},
			error:function(err){
				console.log(err)
			}
		})
	})

	$(".delete-to-cart").click(function(obj){
		var curtag=$(this);
		obj.preventDefault();
		id = $(this).attr("for")
		// alert(id);
		$.ajax({
			type:"post",
			data:"productid="+id,
			url:"deletecart.php",
			success:function(res){
				// console.log(res)
				curtag.parent().parent().parent().parent().parent().fadeOut(500);
			},
			error:function(err){
				console.log(err)
			}
		})
	})
////// cart /////

//login
	$(".btn-register").click(function(){
		// console.log(1)
		formdata = $("#register_form").serialize();
		// console.log(formdata);
		$.ajax({
			type:"post",
			data:formdata,
			url:"register-action.php",
			success:function(res){
				// console.log(res)
				$(".err_register").html(res);
			},
			error:function(err){
				console.log(err)
			}
		})
	})

	$(".btn-login").click(function(){
		// console.log(1)
		formdata = $("#login_form").serialize();
		// console.log(formdata);
		$.ajax({
			type:"post",
			data:formdata,
			url:"login-action.php",
			success:function(res){
				// console.log(res)
				if(res=="ok"){
					window.location.href="index.php";
				}
				else{
					$(".err_login").html(res);					
				}
			},
			error:function(err){
				console.log(err)
			}
		})
	})
//login
///password/////
$(".btn-password").click(function(){
		// console.log(1)
		formdata = $("#password_form").serialize();
		// console.log(formdata);
		$.ajax({
			type:"post",
			data:formdata,
			url:"password-action.php",
			success:function(res){
				// console.log(res)
				$(".err_password").html(res);
			},
			error:function(err){
				console.log(err)
			}
		})
	})
///password//////

/////category////
$(".btn-category").click(function(){
		// console.log(1)
		formdata = $("#category_form").serialize();
		// console.log(formdata);
		$.ajax({
			type:"post",
			data:formdata,
			url:"category-action.php",
			success:function(res){
				// console.log(res)
				$(".err_category").html(res);
			},
			error:function(err){
				console.log(err)
			}
		})
	})
//////brand//////
$(".btn-brand").click(function(){
		// console.log(1)
		formdata = $("#brand_form").serialize();
		// console.log(formdata);
		$.ajax({
			type:"post",
			data:formdata,
			url:"brand-action.php",
			success:function(res){
				// console.log(res)
				$(".err_brand").html(res);
			},
			error:function(err){
				console.log(err)
			}
		})
	})
///////
})