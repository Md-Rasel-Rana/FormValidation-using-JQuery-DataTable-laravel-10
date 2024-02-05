<div class="container mt-2">
  <div class="row">
    <div class="col">
      <a href="{{ route('user-lnfo') }}" class="btn btn-lg btn-warning d-grid mx-auto">User Data Info</a>
  </div>
  </div>
</div>
<div class="container mt-5 border border-4">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <h2>Registration Form</h2>
      <form>
        <div class="form-group">
          <label for="firstName">First Name</label>
          <input type="text" class="form-control" id="firstName" name="firstName" value="{{ old('firstName') }}" placeholder="Enter First Name">
        </div>
        <div class="form-group">
          <label for="lastName">Last Name</label>
          <input type="text" class="form-control" id="lastName" name="lastName" value="{{ old('lastName') }}" placeholder="Enter Last Name">
        </div>
        <div class="form-group">
          <label for="email">Email address</label>
          <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Enter email">
          <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
        </div>
        <div class="form-group">
          <label for="password">Password</label>
          <input type="password" class="form-control" id="password" name="password" value="{{ old('password') }}" placeholder="Password">
        </div>
        <button type="submit" onclick="usersave()" class="btn btn-primary">Submit</button>
      </form>
    </div>
  </div>
</div>

<script>
  async function usersave() {
  let FirstName = document.getElementById('firstName').value;
  let LastName = document.getElementById('lastName').value;
  let Email = document.getElementById('email').value;
  let Password = document.getElementById('password').value;
  if(FirstName.length === 0){
    errorToast("First Name Required");  
    return false; // Prevent form submission
  }
 else if(LastName.length === 0){
  errorToast("Last Name Required");  
  return false; // Prevent form submission
  }
  else if(Email.length === 0){
    errorToast("Email Required");  
    return false; // Prevent form submission
  }
  else if(Password.length ===0){
    errorToast("Password Required");  
    return false; // Prevent form submission
  }else{
    try {
        // Send an HTTP POST request to the server
        let response = await axios.post('/user-registration', {
                FirstName: FirstName,
                LastName: LastName,
                Email: Email,
                Password: Password
            });
            console.log(response.data);
            // If the request is successful, show success message
            successToast("User Created Successfully");
  }catch (error) {
            // If there's an error with the request, display an error message
            console.error('Error:', error);
            errorToast("Error Creating User");
        }


        return false;

}
  }
</script>
