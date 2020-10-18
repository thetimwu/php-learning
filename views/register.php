<h1>Create new user</h1>
<form action="/register" method="POST">
    <div class="row">
        <div class="col">
            <div class="form-group">
                <label for="firt name">First Name</label>
                <input type="text" class="form-control" name="first-name" id="first-name" aria-describedby="emailHelp" placeholder="First Name">
            </div>
        </div>
        <div class="col">
            <div class="form-group">
                <label for="last name">Last Name</label>
                <input type="text" class="form-control" name="last-name" id="last-name" aria-describedby="emailHelp" placeholder="Last Name">
            </div>
        </div>
    </div>
    <div class="form-group">
        <label for="exampleInputEmail1">Email address</label>
        <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password</label>
        <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
    </div>
    <div class="form-group">
        <label for="exampleInputPassword1">Password Confirm</label>
        <input type="password" name="password-confirm" class="form-control" id="exampleInputPassword1" placeholder="Password Confirm">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>