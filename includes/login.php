<style>
input[type="text"] {
  padding: 5px;
  border: solid 1px #dcdcdc;
 
  transition: box-shadow 0.3s, border 0.3s;
}
input[type="password"] {
  padding: 5px;
  border: solid 1px #dcdcdc;
  transition: box-shadow 0.3s, border 0.3s;
}


</style>
<form action="auth" method="post">

<table align="center" width="100%"><tr><td align="right"><h1>Login</h1></td></tr>
<tr>
<td align="right"><b>User Name :</b></td>
<td><input type="text" name="username" value="" id="username" /></td>
</tr>
<tr><td align="right"><b>Password :</b></td>
<td><input type="password" name="password" value="" id="password" /></td>
</tr>
<tr>

<td></td>


<td><input type="submit" name="submit" value="Submit" class="tfbutton">
<input type="reset" name="cancel" value="Cancel" class="tfbutton">
<a href="register" class="tfbutton">Register</a>
<a href="forget" class="tfbutton">Forgot</a></td>
<td></td>
<td></td>
<td></td>
</tr>
</table>
</form>