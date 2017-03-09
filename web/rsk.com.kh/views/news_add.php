
<div style="color:#FF8080"></div>

<form name="formProduct" action="news_add.php" method="post" onSubmit="return checkBlank()">
  <table width="617">
    <tr>
      <td height="39" colspan="3" scope="col"><div id="black_message"></div></td>
    </tr>
    <tr>
    <th width="149" scope="col"><div align="left">បរិយាយ</div></th>
    <th width="378" scope="col"><div align="left">
      <input type="text" name="descript" value="" class="txtbox" onfocus="document.getElementById('tip').style.visibility = 'visible';" onblur="document.getElementById('tip').style.visibility = 'hidden';"/>
    </div></th>
    
    <td style="position:relative"><div id="tip" class="tooltip">"សូមបញ្ចូលឈ្មោះនៃប្រភេទកាសែត រឺទស្សនាវដ្តី"​ ឧទាហរណ៍ៈ ‌រស្មីកម្ពុជា</div></td>
    </tr>
  <tr>
    <td><div align="left">តំលៃ/១ខែ</div></td>
    <td><div align="left">
      <input type="text" name="oneMonth" class="txtbox" onKeyPress="return numbersonly(event, false)"​​ onfocus="document.getElementById('tip1').style.visibility = 'visible';" onblur="document.getElementById('tip1').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip1" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>
    </tr>
  <tr>
    <td><div align="left">តំលៃ/៣ខែ</div></td>
    <td><div align="left">
      <input type="text" name="threeMonth" class="txtbox" onKeyPress="return numbersonly(event, false)" onfocus="document.getElementById('tip2').style.visibility = 'visible';" onblur="document.getElementById('tip2').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip2" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>    
    </tr>
  <tr>
    <td><div align="left">តំលៃ/៦ខែ</div></td>
    <td><div align="left">
      <input type="text" name="sixMonth" class="txtbox" onKeyPress="return numbersonly(event, false)" onfocus="document.getElementById('tip3').style.visibility = 'visible';" onblur="document.getElementById('tip3').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip3" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>
    </tr>
  <tr>
    <td><div align="left">តំលៃ/១ឆ្នាំ</div></td>
    <td><div align="left">
      <input type="text" name="oneYear" class="txtbox" onKeyPress="return numbersonly(event, false)" onfocus="document.getElementById('tip4').style.visibility = 'visible';" onblur="document.getElementById('tip4').style.visibility = 'hidden';"/>
      រៀល
    </div></td>
    <td style="position:relative"><div id="tip4" class="tooltip">"សូមបញ្ចូលតំលៃជាលេខសកល" ឧទាហរណ៍ៈ ‌123456789</div></td>
    </tr>
  <tr>
    <td height="52"><div align="left">ផ្សេងៗ</div></td>
    <td>
      <input type="text" name="other" class="txtbox" onfocus="document.getElementById('tip5').style.visibility = 'visible';" onblur="document.getElementById('tip5').style.visibility = 'hidden';"/></td>
      <td style="position:relative"><div id="tip5" class="tooltip">"ការរៀបរាបើផ្សេងៗ" (បញ្ចូលក៏បាន មិនបាច់ក៏បាន)</div></td>
    </tr>
  <tr>
    <td>&nbsp;</td>
    <td><input type="submit"​ name="submit_product" value="បន្ថែម" class="btn-positive" />
      <input type="submit"​ name="submit_product_again" value="បន្ថែម១ទៀត" class="btn-positive" />
      <input type="submit"​ name="cancel_product" value="មិនបន្ថែម" class="btn-negative" /></td>
    <td>&nbsp;</td>
  </tr>
  </table>

</form> 





