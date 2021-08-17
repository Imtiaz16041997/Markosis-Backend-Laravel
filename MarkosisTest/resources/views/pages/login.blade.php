{{-- Login --}}
<div id="login-form-container" class="text-center container animate__animated animate__bounceInDown" >
    <div class="container">


        <br><br><br><br>
        <div class="col-lg-8 m-auto d-block">
        <form action="login" method="POST" id="logForm">
            {{ csrf_field() }}
            <h2 class="text-center text-warning">------| Login Panel |------</h2>
            <br><br>

            <div class="form-group">
                <div class="input-group">
                    <input type="email" class="form-control" name="email" id="inputEmail" placeholder="Email Address" required="required">
                </div>
            </div>

            <br>
            <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" name="password" id="inputPassword" placeholder="Password" required="required">
                </div>
            </div>

            <br>
            <br/>
            <div class="text-center form-group">
                <button type="submit" class="text-center btn btn-outline-primary float-center">Sign In</button>
            </div>
            <br/>


        </form>
    </div>
        <div class="text-center">Already have an account? <a href="javascript:void(0)" onclick="routing('register')">Sign Up here</a>.</div>


    </div>

</div>

<script>

    $("#logForm").submit(function(e){
        e.preventDefault()

        axios.post('http://localhost:8000/api/login',{
            email:$("#inputEmail").val(),
            password:$("#inputPassword").val(),
            device_name: 'habijabi'
        }) .then(function (response){


            const success = response.data.success
            if(success){
                localStorage.setItem('token',response.data.token)
                const token = localStorage.getItem('token')
                routing('product')
                console.log(token)
            }

        }).catch(function(error){
            console.log(error);
        });

    })



</script>
