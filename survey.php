<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<title></title>
	<link rel="stylesheet" href="">
</head>
<body>
	 <style type="text/css">
input[type='radio'] {
  -webkit-appearance: none;
  width: 20px;
  height: 20px;
  border: 1px solid darkgray;
  border-radius: 50%;
  outline: none;
  box-shadow: 0 0 5px 0px gray inset;
}
input[type='radio']:hover {
  box-shadow: 0 0 5px 0px orange inset;
}
input[type='radio']:before {
  content: '';
  display: block;
  width: 60%;
  height: 60%;
  margin: 20% auto;
  border-radius: 50%;
}
input[type='radio']:checked:before {
  background: red;
}
 
</style>
</head>
<body>
<div class="container-fluid" style="background-color:#2C3E50">
<div class="row">
<div class="col-md-1"></div>
<div class="col-xs-12 col-md-11">
<?php // include('menu.php'); ?>
</div>
</div>
</div>

<!--start article-->

<div class="container">
  <div class="row">
    <div class="col-md-3"> <br>
      <?php include('menu_l.php'); ?>
    </div>
    <div class="col-md-9"> <br />
     	  <h3 align="center"> ประเมินความพึงพอใจต่อระบบ 
          <br> by.devtai.com
        </h3>
        <form id="formqsys" name="formqsys" method="post" action="s_q_db.php">
    <table width="70%" border="1" align="center" cellpadding="0" cellspacing="0" class="table table-bordered table-hover">
            <tr>
              <td width="75%" rowspan="2" align="center">
              <br>
              <strong>หัวข้อการประเมิน</strong>
              </td>
              <td colspan="5" align="center"><strong>ระดับความพึงพอใจ</strong></td>
            </tr>
            <tr>
              <td width="5%" align="center"><strong>5</strong></td>
              <td width="5%" align="center"><strong>4</strong></td>
              <td width="5%" align="center"><strong>3</strong></td>
              <td width="5%" align="center"><strong>2</strong></td>
              <td width="5%" align="center"><strong>1</strong></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 1.คู่มือการใช้งานระบบอ่านเข้าใจง่ายและปฏิบัติตามคู่มือได้ทันที</td>
              <td height="30" align="center"><input type="radio" name="es_id1"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id1"  value="4" /></td>
              <td height="30" align="center"><input type="radio" name="es_id1"  value="3" /></td>
              <td height="30" align="center"><input type="radio" name="es_id1"  value="2" /></td>
              <td height="30" align="center"><input type="radio" name="es_id1"  value="1" /></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 2.แบบฟอร์มกรอกข้อมูลใช้งานง่าย  มีความเหมาะสม</td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id2"  value="5" required /></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id2"  value="4"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id2"  value="3"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id2"  value="2"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id2"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 3.มีการจัดหมวดหมู่ให้ง่ายต่อการ ค้นหาและทำความเข้าใจ</td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id3"  value="5" required /></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id3"  value="4"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id3"  value="3"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id3"  value="2"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id3"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 4.ข้อความถูกต้องตามหลักภาษา และไวยากรณ์</td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id4"  value="5" required /></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id4"  value="4"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id4"  value="3"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id4"  value="2"/></td>
              <td width="5%" height="30" align="center"><input type="radio" name="es_id4"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 5.ความสวยงาม ความทันสมัย น่าสนใจ</td>
              <td height="30" align="center"><input type="radio" name="es_id5"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id5"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id5"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id5"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id5"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 6.การจัดรูปแบบง่ายต่อการอ่านและการใช้งาน</td>
              <td height="30" align="center"><input type="radio" name="es_id6"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id6"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id6"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id6"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id6"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 7.เมนูต่างๆ ใช้งานได้ง่าย</td>
              <td height="30" align="center"><input type="radio" name="es_id7" value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id7"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id7"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id7"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id7"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 8.สีพื้นหลังกับสีตัวอักษรมีความเหมาะสมต่อการอ่าน</td>
              <td height="30" align="center"><input type="radio" name="es_id8"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id8"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id8"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id8"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id8"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 9.ขนาดตัวอักษร และรูปแบบตัวอักษรอ่านได้ง่ายและเหมาะสม</td>
              <td height="30" align="center"><input type="radio" name="es_id9"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id9" value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id9" value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id9" value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id9" value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 10.ความรวดเร็วในการแสดงผลและการใช้งาน</td>
              <td height="30" align="center"><input type="radio" name="es_id10"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id10"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id10"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id10"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id10"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 11.ความถูกต้องของข้อมูล</td>
              <td height="30" align="center"><input type="radio" name="es_id11"   value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id11"   value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id11"   value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id11"   value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id11"   value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 12.ความถูกต้องในการเชื่อมโยงภายในระบบ</td>
              <td height="30" align="center"><input type="radio" name="es_id12"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id12"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id12"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id12"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id12"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 13.ความปลอดภัยในการใช้งาน</td>
              <td height="30" align="center"><input type="radio" name="es_id13"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id13"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id13"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id13"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id13"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 14.ความสะดวกสบายในการใช้งานได้ทุกที่ทุกเวลา โดยไม่ต้องเข้ามาใช้งานภายมหาวิทยาลัย</td>
              <td height="30" align="center"><input type="radio" name="es_id14"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id14"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id14"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id14"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id14"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 15.สามารถดูข้อมูลย้อนหลังหรือประวัติการฝึกประสบการณ์ได้</td>
              <td height="30" align="center"><input type="radio" name="es_id15"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id15"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id15"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id15"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id15"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 16.สามารถพิมพ์(print)เอกสารได้โดยตรงจากระบบ</td>
              <td height="30" align="center"><input type="radio" name="es_id16"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id16"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id16"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id16"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id16"  value="1"/></td>
            </tr>
            <tr>
              <td height="30">&nbsp; 17.ความพึงพอใจต่อระบบโดยรวม</td>
              <td height="30" align="center"><input type="radio" name="es_id17"  value="5" required /></td>
              <td height="30" align="center"><input type="radio" name="es_id17"  value="4"/></td>
              <td height="30" align="center"><input type="radio" name="es_id17"  value="3"/></td>
              <td height="30" align="center"><input type="radio" name="es_id17"  value="2"/></td>
              <td height="30" align="center"><input type="radio" name="es_id17"  value="1"/></td>
            </tr>
          </table>
          </div>
          </div>
          <div class="row">
          <div class="col-md-3"></div>
          <div class="col-md-6">
          <br /><br />
          <b> ข้อเสนอแนะเพิ่มเติม </b> <br />
           <textarea name="es_complain" cols="80" rows="3" id="es_complain" class="form-control"></textarea>
                <br />

              <button type="submit" name="save" class="btn btn-primary"> ส่งแบบประเมิน </button>
        
          </div>
          </div>
          
        </form>
        <label class="form-label" for="customRange2">Example range</label>
<div class="range">
  <input type="range" class="form-range" min="0" max="5" id="customRange2" />
</div>
<div>
%body
  .vertical-align
    .btns
      %label
        %input{:checked => "", :name => "button-group", :type => "radio", :value => "item"}
          %span.btn.first Never
      %label
        %input{:name => "button-group", :type => "radio", :value => "other-item"}
          %span.btn Sometimes
      %label
        %input{:name => "button-group", :type => "radio", :value => "other-item"}
          %span.btn Often
      %label
        %input{:name => "button-group", :type => "radio", :value => "third"}
          %span.btn Usually 
      %label
        %input{:name => "button-group", :type => "radio", :value => "third"}
          %span.btn.last Always
      
</div>
</body>
</html>