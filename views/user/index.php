<h1>Users:</h1>

<?php
if (isset($this->error))
echo $this->error;
?>
<form action="<?=URL;?>user/create" method="post">
    <label for="login">Login</label><input type="text" name="login"/><br/>
    <label for="password">Password</label><input type="text" name="password"/><br/>
    <label for="role">Role</label>
    <select name="role" id="role">
        <option value="default">Default</option>
        <option value="admin">Admin</option>
        <option value="owner">Owner</option>
    </select><br/>
    <label for="submit">&nbsp;</label><input type="submit" value="Submit"/>
</form>
<hr/>
<table>
<?php
foreach($this->userlist as $key => $value){
    echo '<tr>';
    echo '<td>'.$value['id'].'</td>';
    echo '<td>'.$value['login'].'</td>';
    echo '<td>'.$value['role'].'</td>';
    echo '<td>
                <a href="'.URL.'user/edit/'.$value['id'].'">Edit</a>
                <a href="'.URL.'user/delete/'.$value['id'].'">Delete</a>
          </td>';
    echo '</tr>';
}

?>
</table>