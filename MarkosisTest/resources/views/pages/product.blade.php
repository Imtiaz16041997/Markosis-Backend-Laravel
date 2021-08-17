    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabelTitle">Add a Product</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <form action="" method="POST">
            <div class="modal-body">
                    <div class="form-group">
                            <label> Name </label>
                            <input type="text" id="name" name="name" class="form-control" >
                        </div>
                        <div class="form-group">
                            <label> Code </label>
                            <input type="text" name="code" id="code" class="form-control" >
                        </div>


                        <div class="form-group">
                            <label> Unit_Buying_Cost </label>
                            <input type="text" id="unit_buying_cost" name="unit_buying_cost" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Unit_Selling_Cost </label>
                            <input type="text" id="unit_selling_cost" name="unit_selling_cost" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label> Quantity </label>
                            <input type="text" id="quantity" name="quantity" class="form-control">
                        </div>

                        <div class="form-group">
                            <label> Tax_Rate </label>
                            <input type="text" id="tax_rate" name="tax_rate" class="form-control" >
                        </div>

                        <div class="form-group">
                            <label> Sold_Out_Flag </label>
                            <select id="sold_out_flag" class="form-control" name="sold_out_flag">
                                <option value="1">Yes</option>
                                <option value="0">No</option>
                            </select>
                        </div>



                        {{-- <button type="submit" class="btn btn-primary">Submit</button> --}}


            </div>

                <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" name="inserdata" id="saveBtn" class="btn btn-primary">Save Data</button>
                </div>
            </form>
            </div>
            </div>
        </div>


        {{-- ################################################################################Update############################################################################################## --}}


    {{-- ##############################################################################Delete################################################################################################ --}}

    <br>
    <br>
    <!-- Button trigger modal -->

    <div class="container">
        <div class="jumbotron">
            <div class="card">
            <h2 class="text-center"> Product Information </h2>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" onclick="modalType('store')" data-bs-target="#exampleModal">
                        Add a Product
                    </button>

                    <button onclick="logout()" type="button" class="btn pull-right btn-danger">
                        LogOut
                    </button>

                </div>
            </div>


            <div class="card">
                <div class="card-body">

                        <table id="product-table" class="table table-bordered table-dark">
                            <thead>

                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Code</th>
                                    <th scope="col">Buying-Cost</th>
                                    <th scope="col">Selling-Cost</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">Tax-Rate</th>
                                    <th scope="col">Sold-Out</th>
                                    <th scope="col">Created-By</th>
                                    <th scope="col">Create-Date</th>
                                    <th scope="col">Update-Date</th>
                                    <th scope="col">Update </th>
                                    <th scope="col">Delete </th>

                                </tr>
                            </thead>

                            <tbody id="productTable">

                            </tbody>

                        </table>

                        <div id="product-loading" class="text-center hide">
                            Loading..
                        </div>

                        <div class="text-center">
                            <button class="btn btn-info" onclick="paging('prev')">Prev </button>
                            <button class="btn btn-info" onclick="paging('next')"> Next</button>

                        </div>

            </div>

            </div>



        </div>
    </div>

    {{-- ################## Add Button ################ --}}

    <script>

    function deleteProduct(id){
                    console.log('delete',id)


                    const token = localStorage.getItem('token')
                    console.log(token)

    axios.get(`http://localhost:8000/api/product/delete?id=${id}`,{
    headers: {
    'Authorization': `Bearer ${token}`
    }}).then(function(response){

        fetchProducts()

    })


    }

    function modalType(type, id =null){
        if(type == 'store')
            storeProductModal()
        else
            updateProductModal(id)
    }

    let updatingId = null

    function updateProductModal(id){

        $('#exampleModal').modal('toggle');
            $("#exampleModalLabelTitle").text("Update Product")

            updatingId = id


            $("#name").val($(`#name${id}`).data('value'));
            $("#code").val($(`#code${id}`).data('value'));
            $("#unit_buying_cost").val($(`#unit_buying_cost${id}`).data('value'));
            $("#unit_selling_cost").val($(`#unit_selling_cost${id}`).data('value'));
            $("#quantity").val($(`#quantity${id}`).data('value'));
            $("#tax_rate").val($(`#tax_rate${id}`).data('value'));
            $("#sold_out_flag").val($(`#sold_out_flag${id}`).data('value'));

    }


    function storeProductModal(){

            $("#exampleModalLabelTitle").text("Add Product")

            updatingId = null

            $("#name").val('');

            $("#code").val('');
            $("#unit_buying_cost").val('');
            $("#unit_selling_cost").val('');
            $("#quantity").val('');
            $("#tax_rate").val('');
            $("#sold_out_flag").val(1);

    }




    function updateProduct(){



        const token = localStorage.getItem('token')

    console.log(token)
    axios.post('http://localhost:8000/api/product/update',{

    addbtn:$("#addbtn_id").val(),
    name:$("#name").val(),
    code:$("#code").val(),
    unit_buying_cost:$("#unit_buying_cost").val(),
    unit_selling_cost:$("#unit_selling_cost").val(),
    quantity: $('#quantity').val(),
    tax_rate: $('#tax_rate').val(),
    sold_out_flag: $('#sold_out_flag').val(),
    id: updatingId
    },
    {
    headers: {
    'Authorization': `Bearer ${token}`
    }
    }
    ).then(function(){
    $('#exampleModal').modal('toggle');

    fetchProducts();
    })



    }

    function storeProduct(){
        const token = localStorage.getItem('token')

    console.log(token)
    axios.post('http://localhost:8000/api/product/store',{

    addbtn:$("#addbtn_id").val(),
    name:$("#name").val(),
    code:$("#code").val(),
    unit_buying_cost:$("#unit_buying_cost").val(),
    unit_selling_cost:$("#unit_selling_cost").val(),
    quantity: $('#quantity').val(),
    tax_rate: $('#tax_rate').val(),
    sold_out_flag: $('#sold_out_flag').val(),
    },
    {
    headers: {
    'Authorization': `Bearer ${token}`
    }
    }
    ).then(function(){
    $('#exampleModal').modal('toggle');

    fetchProducts();
    })
    }








    function fetchProducts(page = 1)

    {



        const token = localStorage.getItem('token')

        $("#product-table").hide()
        $("#product-loading").show()

    axios.get(`http://localhost:8000/api/product/all?page=${page}`,{
    headers: {
    'Authorization': `Bearer ${token}`
    }}).then(function(response){

    let productHTML = ''

    response.data.product.data.forEach((item) => {

    productHTML += `<tr id="row-id-${item.id}">
        <td>${item.id}</td>
        <td id="name${item.id}" data-value="${item.name}">${item.name}</td>
        <td id="code${item.id}" data-value="${item.code}">${item.code}</td>
        <td id="unit_buying_cost${item.id}" data-value="${item.unit_buying_cost}">${item.unit_buying_cost} </td>
        <td id="unit_selling_cost${item.id}" data-value="${item.unit_selling_cost}">${item.unit_selling_cost} </td>
        <td id="quantity${item.id}" data-value="${item.quantity}">${item.quantity}</td>
        <td id="tax_rate${item.id}" data-value="${item.tax_rate}"> ${item.tax_rate}</td>
        <td id="sold_out_flag${item.id}" data-value="${item.sold_out_flag}"> ${item.sold_out_flag}</td>
        <td>${item.user?item.user.name:''} </td>
        <td>${item.created_at} </td>
        <td>${item.updated_at} </td>

        <td>
            <button type="button" class="btn btn-success updatebtn" onclick="updateProductModal(${item.id})">Update</button>
        </td>

        <td>
            <button type="button" class="btn btn-danger deletebtn" onclick="deleteProduct(${item.id})">Delete</button>
        </td>
        </tr>`

    })

    $("#productTable").html(productHTML)

    $("#product-table").show()
    $("#product-loading").hide()
    })




    }

    $(document).ready(function(){


                $('#saveBtn').on('click',function(e){
                    e.preventDefault()

                    if(updatingId != null)
                        updateProduct()
                    else
                        storeProduct()

                })





                fetchProducts()

    });


    let pageNumber = 1
    function paging(type = 'next'){

        if(type =='next')
            pageNumber += 1
        else
            pageNumber -= 1

        fetchProducts(pageNumber)
    }


    function logout(){
        localStorage.setItem('token',null)
        routing('login')
    }


    </script>
