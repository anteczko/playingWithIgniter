<?php helper('form') ?>
<body>
    <div class="row">
        <div class="col col-12">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title">Login user</h5>
                </div>
                <div class="card-body">
                    <form action="\users\loginAction" method="post">
                        <div class="mb-3">
                            <label for="username" class="form-label">Username or Email:</label>
                            <input type="text" name="username" class="form-control"/>
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
