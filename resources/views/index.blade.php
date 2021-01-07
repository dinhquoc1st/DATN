<!DOCTYPE html>
<html lang="zxx">
   <head>
      <meta charset="UTF-8">
      <meta name="description" content="Fashi Template">
      <meta name="keywords" content="Fashi, unica, creative, html">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <base href="{{asset('')}}">
      <title>Trang chủ</title>
      <!-- Google Font -->
      <link href="https://fonts.googleapis.com/css?family=Muli:300,400,500,600,700,800,900&display=swap" rel="stylesheet">
      <!-- Css Styles -->
      <link rel="stylesheet" href="assets/css/bootstrap.min.css" type="text/css">
      <link rel="stylesheet" href="assets/css/font-awesome.min.css" type="text/css">
      <link rel="stylesheet" href="assets/css/themify-icons.css" type="text/css">
      <link rel="stylesheet" href="assets/css/elegant-icons.css" type="text/css">
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css" type="text/css">
      <link rel="stylesheet" href="assets/css/nice-select.css" type="text/css">
      <link rel="stylesheet" href="assets/css/jquery-ui.min.css" type="text/css">
      <link rel="stylesheet" href="assets/css/slicknav.min.css" type="text/css">
      <link rel="stylesheet" href="assets/css/style.css" type="text/css">
   </head>
   <body>
      <!-- Page Preloder -->
      <div id="preloder">
         <div class="loader"></div>
      </div>
      <!-- Header Section Begin -->
       @include('header')
      <!-- Header End -->
      <!-- Breadcrumb Section Begin -->
       @yield('content')
      <!-- Product Shop Section End -->
      <!-- Partner Logo Section Begin -->
      @include('footer')
      <!-- Footer Section End -->
      <!-- Js Plugins -->
      <script src="assets/js/jquery-3.3.1.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.min.js"></script>
      <script src="assets/js/jquery-ui.min.js"></script>
      <script src="assets/js/jquery.countdown.min.js"></script>
      <script src="assets/js/jquery.nice-select.min.js"></script>
      <script src="assets/js/jquery.zoom.min.js"></script>
      <script src="assets/js/jquery.dd.min.js"></script>
      <script src="assets/js/jquery.slicknav.js"></script>
      <script src="assets/js/owl.carousel.min.js"></script>
      <script src="assets/js/main.js"></script>
      <!-- JavaScript -->
      <script src="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/alertify.min.js"></script>
      <!-- CSS -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/alertify.min.css"/>
      <!-- Default theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/default.min.css"/>
      <!-- Semantic UI theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/semantic.min.css"/>
      <!-- Bootstrap theme -->
      <link rel="stylesheet" href="//cdn.jsdelivr.net/npm/alertifyjs@1.13.1/build/css/themes/bootstrap.min.css"/>
      <script>
         function AddCart(id){
             $.ajax({
                 url: 'AddCart/'+id,
                 type: 'GET',
             }).done(function(response){
                 RenderCart(response);
                 alertify.success("Đã thêm sản phẩm");
             });
         }
         
         $("#change-item-cart").on("click", ".si-close i", function(){
             $.ajax({
                 url: 'DeleteCart/'+$(this).data("id"),
                 type: 'GET',
             }).done(function(response){
                RenderCart(response);
                 alertify.success("Đã xóa sản phẩm");
             });
         });

         function RenderCart(response){
                $("#change-item-cart").empty();
                $("#change-item-cart").html(response);
                $("#total-quanty-show").text($("#total-quanty-card").val());
                
         }
         $(function () {
            $(".js-modal-register").click(function (event) {
                event.preventDefault();
                $("#myModal").modal("show");
            });
            $(".js-btn-login").click(function (e) {
                e.preventDefault();
                $(".error-form").empty();
                let $this = $(this);
                let $domForm = $this.closest("form");
               
                $.ajax({
                    url: "register",
                    data: $domForm.serialize(),
                    method: "POST",
                })
                    .done(function (results) {
                        // ẩn modal
                        $("#myModal").modal("hide");
                        alert("Bạn đã đăng ký thành công");
                        // làm mới lại form khi đăng kí thành công
                        $("#form-register")[0].reset();
                    })
                    .fail(function (data) {
                        var errors = data.responseJSON;
                        $(".error-form er").empty();
                        
                        $.each(errors.errors, function (i, val) {
                            $domForm
                                .find("input[name=" + i + "]")
                                .siblings(".error-form")
                                .text(val[0]);;
                        });
                    });
            });
            });
      </script>
   </body>
</html>