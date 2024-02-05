<div class="container mt-2">
    <div class="row">
      <div class="col">
        <a href="{{ url('/') }}" class="btn btn-lg btn-warning d-grid mx-auto">User Create</a>
    </div>
    </div>
  </div>
<div class="container-fluid mt-2">
    <div class="row">
    <div class="col-md-12 col-sm-12 col-lg-12">
        <div class="card px-5 py-5">
            <div class="row justify-content-between ">
                <div class="align-items-center col">
                    <h4>Product</h4>
                </div>
              
            </div>
            <hr class="bg-dark "/>
            <table class="table" id="tableData">
                <thead>
                <tr class="bg-light">
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
                </thead>
                <tbody id="tableList">

                </tbody>
            </table>
        </div>
    </div>
</div>
</div>

<script>

getList();

async function getList() {

    let res= await axios.get("/get-user");

    let tableList=$("#tableList");
    let tableData=$("#tableData");

    tableData.DataTable().destroy();
    tableList.empty();

    res.data.forEach(function (item,index) {
        let row=`<tr>
                    <td>${item['FirstName']}</td>
                    <td>${item['LastName']}</td>
                    <td>${item['Email']}</td>
                    <td>${item['Password']}</td>
                    <td>
                        <button data-id="${item['id']}" class="btn editBtn btn-sm btn-warning">Edit</button>
                        <button data-id="${item['id']}" class="btn deleteBtn btn-sm btn-danger">Delete</button>
                    </td>
                 </tr>`
        tableList.append(row)
    })

    $('.editBtn').on('click', async function () {
           let id= $(this).data('id');
           $("#update-modal").modal('show');
    })

    $('.deleteBtn').on('click',function () {
        let id = $(this).data('id');
        let path = $(this).data('path');

        $("#delete-modal").modal('show');
        $("#deleteID").val(id);
      

    })

    new DataTable('#tableData',{
        order:[[0,'desc']],
        lengthMenu:[5,10,15,20,30]
    });

}


</script>

