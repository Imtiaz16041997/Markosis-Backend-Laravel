@extends('products.layout')

@section('content')



<div id="router-login-container">
    @include('pages.login')
</div>

<div id="router-register-container">
  @include('pages.register')
 </div>



 <div id="router-product-container">
    @include('pages.product')
 </div>





<!-- Button trigger modal -->


<script>
    const token = localStorage.getItem('token')
    const tokenCheck = !(token == null || token == 'null' || token == "" || !token);
    let page = null
    console.log('login-token',token)

    if(tokenCheck)
        routing('product')
    else
        routing('login')

    function routing(route){

        const token = localStorage.getItem('token')
        const tokenCheck = !(token == null || token == 'null' || token == "" || !token);
        let  executed = false

        if(route == 'register' && !tokenCheck){
            $("#router-register-container").show()
            executed = 'register'
        }

        if(route == 'login' && !tokenCheck){
            $("#router-login-container").show()
            executed = 'login'
        }

        if(route == 'product' && tokenCheck){
            $("#router-product-container").show()
            executed = 'product'
        }


        if(executed == 'register'){
            $("#router-login-container").hide()
            $("#router-product-container").hide()
        }

        if(executed == 'login'){
            $("#router-register-container").hide()
            $("#router-product-container").hide()
        }


        if(executed == 'product'){
            $("#router-login-container").hide()
            $("#router-register-container").hide()
            fetchProducts()
        }

    }


    </script>
@endsection
