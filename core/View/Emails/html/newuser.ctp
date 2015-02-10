<div id="main" style="text-align:center;">
  <table width="600" height="698" style="border: 1px #666 solid; background-color:#FFF;">
    <tr>
      <td width="100%" height="100%" style="vertical-align:text-top";>
      <table width="100%" height="100%">
    	<tr>
        	<td width="100%" height="100%" style="text-align:center;"><img src="https://www.quickbase.com/up/be85ufshv/g/rw/eg/va/hsn_logo_qb.jpg" /></td>        
        </tr>
        <tr>
        <td width="100%" height="100%" style="vertical-align:text-top; text-align:left; padding: 30px;"><span style="font-family: Verdana, Geneva, sans-serif; font-size: 12px; line-height: 13px;">
        <p><?php echo $first_name . ' ' . $last_name ?>,
        </p>
              <p>&nbsp;</p>
              <p>Thank you for registering to use the HIPAA Compliance Portal. </p>
              <p>&nbsp;</p>
              <p>To validate your email address please click the following link:</p>
              <p>&nbsp;</p>
              <p>
<?php
	$routing =  array(
		'controller' => 'users', 
		'action' => 'validate_email', 
		$id, 
		'full_base' => true,
		'?' => array('code' => $code)
	);
	echo $this->Html->link($this->Html->url($routing), $routing);
?>
			  </p>
              <p>&nbsp;</p>
              <p>If the above link does not work copy and paste the address into the address bar of your web browser.</p>
              <p>&nbsp;</p>
              <p>&nbsp;</p>
              <p>Please do not reply to this e-mail.</p></span>
            </td>
        </tr>
      </table>
      </td>
    </tr>
  </table>
</div>