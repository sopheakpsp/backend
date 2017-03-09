
<div style="color:#FF8080"></div>

<form name="formPlace" action="place_add.php" method="post" onSubmit="return black_place()">
  <table width="100%">
    <tr>
      <td height="39" colspan="3" scope="col"><div id="black_message"></div></td>
    </tr>
    <tr>
    <th width="7%" scope="col"><div align="left">ទីតាំង</div></th>
    <th width="26%" scope="col"><div align="left">
      <input type="text" name="pl_name" value="" class="txtbox" onfocus="document.getElementById('tip').style.visibility = 'visible';" onblur="document.getElementById('tip').style.visibility = 'hidden';"/>
    </div></th>
    
    <td width="67%" style="position:relative"><div id="tip" class="tooltip">"សូមកំណត់តំបន់ដែលត្រូវចុះ"​ ឧទាហរណ៍ៈ តំបន់ ក</div></td>
    </tr>
  <tr>
    <td><div align="left">ចាប់ពី</div></td>
    <td><div align="left">
      <input type="text" name="pl_from" class="txtbox"​​ onfocus="document.getElementById('tip1').style.visibility = 'visible';" onblur="document.getElementById('tip1').style.visibility = 'hidden';"/>
    </div></td>
    <td style="position:relative"><div id="tip1" class="tooltip">"តំណត់តំបន់ ក ចាប់ពី" ឧទាហរណ៍ៈ ‌ផ្លូវព្រះមុនីវង្ស វិមានឯករាជ្យ</div></td>
    </tr>
  <tr>
    <td><div align="left">ដល់</div></td>
    <td><div align="left">
      <input type="text" name="pl_to" class="txtbox" onfocus="document.getElementById('tip2').style.visibility = 'visible';" onblur="document.getElementById('tip2').style.visibility = 'hidden';"/>
    </div></td>
    <td style="position:relative"><div id="tip2" class="tooltip">"តំណត់តំបន់ ក ទៅដល់" ឧទាហរណ៍ៈ ‌‌ផ្លូវព្រះមុនីវង្ស វត្តភ្នំ</div></td>    
    </tr>
  <tr>
    <td height="52"><div align="left">ផ្សេងៗ</div></td>
    <td>
      <input type="text" name="pl_other" class="txtbox" onfocus="document.getElementById('tip5').style.visibility = 'visible';" onblur="document.getElementById('tip5').style.visibility = 'hidden';"/></td>
    <td style="position:relative"><div id="tip5" class="tooltip">"ការរៀបរាបើផ្សេងៗ" (បញ្ចូលក៏បាន មិនបាច់ក៏បាន)</div></td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"​ name="submit_place" value="បន្ថែម" class="btn-positive" />
      <input type="submit"​ name="submit_place_again" value="បន្ថែម១ទៀត" class="btn-positive" />
      <a href="#"><input type="button"​ name="cancel_place" value="មិនបន្ថែម" class="btn-negative" /></a></td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form> 





