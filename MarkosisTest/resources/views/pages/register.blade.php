    {{-- Register --}}

    <div class=" text-center container animate__animated animate__bounceInDown" >
        <div class="container">
            <br><br><br><br>
            <div class="col-lg-8 m-auto d-block">
            <form action="register" method="POST" id="regForm">
                {{ csrf_field() }}
                <h2 class="text-center text-warning"> ------| Registration Panel |------ </h2>
                <br><br>

                <div class="form-group">
                    <div class="input-group">
                        <input type="text" class="form-control" id="inputName" name="name" placeholder="Name" required="required">
                    </div>
                </div>

                <br/>
                <div class="form-group">
                    <div class="input-group">
                        <input type="email" class="form-control" name="email" id="inputEmailId" placeholder="Email Address" required="required">
                    </div>
                </div>

                <br/>
                <div class="form-group">
                    <div class="input-group">
                        <input type="number" class="form-control" name="phone" id="inputPhone" placeholder="Phone" required="required">
                    </div>
                </div>


                <br/>
                <div class="form-group">
                    <div class="input-group">
                        <input type="password" class="form-control" name="password" id="inputPasswordid" placeholder="Password" required="required">
                    </div>
                </div>
                <br/>

                <div class="form-group">
                <div class="input-group">
                    <input type="password" class="form-control" name="c_password" id="input_C_Password" placeholder="Confirm-Password" required="required">
                </div>
                </div>

                <br/>
                <input type="checkbox" name="agree" id="termAgree"/> agree the terms
                <br/>
            <div class="text-center form-group">
                    <button type="submit" class="text-center btn btn-outline-primary float-center">Sign Up</button>
                </div>
                <br/>
            </form>
            </div>

        <div class="text-center">Already have an account? <a href="javascript:void(0)" onclick="routing('login')"> Login here </a>.</div>
        </div>
    </div>



        <script>

            $("#regForm").submit(function(e){
                e.preventDefault()

                axios.post('http://localhost:8000/api/register',{
                    name:  $("#inputName").val(),
                    email: $("#inputEmailId").val(),
                    phone: $("#inputPhone").val(),
                    password:$("#inputPasswordid").val(),
                    password_confirmation: $("#input_C_Password").val(),
                    device_name: 'abcd_device',
                    agree: $("#termAgree").val()

                }) .then(function (response) {
                    console.log(response);

                    localStorage.setItem('token',response.data.token)
                    routing('product')

                }).catch(function (error) {
                    console.log(error);
                });


            })

        </script>




    {{-- Here write down the only html --}}
