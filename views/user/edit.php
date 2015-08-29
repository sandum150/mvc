<h1>User edit:</h1>

<?php
print_r($this->user);

?>
<form action="<?=URL;?>user/editSave/<?=$this->user['id']?>" method="post">
    <label for="login">Login</label><input type="text" name="login" value="<?=$this->user['login']?>"/><br/>
    <label for="password">Password</label><input type="text" name="password"/><br/>
    <label for="role">Role</label>
    <select name="role" id="role">
        <option value="default" <?php if ($this->user['role'] == 'default') echo 'selected' ?>>Default</option>
        <option value="admin" <?php if ($this->user['role'] == 'admin') echo 'selected' ?>>Admin</option>
        <option value="owner" <?php if ($this->user['role'] == 'owner') echo 'selected' ?>>Owner</option>
    </select><br/>
    <label for="submit">&nbsp;</label><input type="submit" value="Submit"/>
</form>