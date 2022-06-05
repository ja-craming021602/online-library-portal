<div class="login">
                    <p1>Welcome!</p1>
                    <form name="login" action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
                        <div class="input">
                            <input type="text" name="staffID" placeholder="User ID: <?php echo htmlspecialchars($staff_id); ?>" disabled><br><br>
                            <input type="text" name="name" placeholder="<?php echo htmlspecialchars(implode(' ', $staff_name)); ?>" disabled><br><br>
                            <input type="submit" name="dashboard" class="btn blue clickable" value="Dashboard">
                            <input type="submit" name="logout" class="btn red clickable" value="Logout">
                        </div>
                    </form>
                </div>