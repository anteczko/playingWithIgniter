<body>
<div class="row">
    <div class="col">
        <div class="card">
            <div class="card-header">
                <h5 class="card-title">Register new user</h5>
            </div>
            <div class="card-body" style="width: 18rem;">
                <form action="\users\registerAction" method="post">
                    <div class="mb-3">
                        <label for="username" class="form-label">Username:</label>
                        <input type="text" name="username" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="password" class="form-label">Password:</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="repeatPassword" class="form-label">Repeat password:</label>
                        <input type="password" name="repeatPassword" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Email adress:</label>
                        <input type="text" name="email" class="form-control">
                    </div>
                    <div class="mb-3">
                        <label for="phoneNumber" class="form-label">Phone number:</label>
                        <input type="text" name="phoneNumber" class="form-control">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
</div>

</body>
</html>
