<form id="frmChangePassword" action="srcChangePassword.php" method="POST">
    <table>

        <tr>
            <td><label for="inOldPassword">Oud wachtwoord  </label></td>
            <td><input type="password" name="inOldPassword" placeholder="Enter your old password"/></td>
            <td>*</td>

        </tr>
		 <tr>
            <td><label for="inNewPassword"> Nieuw wachtwoord</label></td>
            <td><input type="password" name="inNewPassword" placeholder="Enter a new password" /></td>
            <td>*</td>
        </tr>
		 <tr>
            <td><label for="inNewPasswordCheck">Herhaal nieuw wachtwoord </label></td>
            <td><input type="password" name="inNewPasswordCheck" placeholder="Enter a new password again" /></td>
            <td>*</td>
        </tr>
		
        <tr>
            <td></td>
            <td><input id="btnChangePw" type="submit" value="changePw"></td>
        </tr>
    </table>
</form>