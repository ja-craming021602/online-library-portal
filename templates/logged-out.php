<div class="login">
                    <p1>Staff Login</p1>
                    <form name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input">
                            <input type="text" name="staffID" placeholder="Staff ID"><br><br>
                            <input type="password" name="password" placeholder="Password"><br><br>
                            <input type="submit" name="login" class="btn blue clickable" value="Login">
                        </div>
                    </form>
                </div>